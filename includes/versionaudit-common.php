<?php
/*
 * A plugin/feature version checking auditor with support for cli and www mode.
 */
define("LOGGER_FAIL", 0);
define("LOGGER_OK", 1);
define("LOGGER_INFO", 2);

require_once ("buildServer-common.php");

$verbosity = 0;
$cli = isset($argv); // $argv is only defined when running in cli mode

/* in cli mode, you'll need to have the includes directory (with db.php) in the current directory, then invoke this script directly, rather than one of the placeholders */
if ($cli)
{
	$require_db = "includes/db.php";

	$dirs = array();
	for ($i = 1; $i < sizeof($argv); $i++)
	{
		$m = null;
		if (preg_match("/^-(v+)$/", $argv[$i], $m))
		{
			$verbosity = strlen($m[1]);
		}
		else if (is_dir($argv[$i]))
		{
			$dirs[] = $argv[$i];
		}
		else
		{
			print "$argv[$i] wasn't a directory or a verbosity flag, I don't know what to do with it!\n";
			exit(-4);
		}
	}

	$html = false;
}
else
{
	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

	$require_db = $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php";

	if (isset($_GET["verbosity"]) && preg_match("/^\d+$/", $_GET["verbosity"]))
	{
		$verbosity = $_GET["verbosity"];
	}

	/* here we inherit $dirs from the placeholder file that includes us */
	if (isset($_GET["branch"]))
	{
		$b = $_GET["branch"];
		if (isset($dirs[$b]))
		{
			$dirs = array($dirs[$b]);
		}
		else
		{
			header("Content-type: text/html");
			print "<pre>$b wasn't a valid branch, please try again with a valid branch, such as:\n";
			print join("\n", preg_replace("/^(.+)$/", "- <a href=\"?branch=$1\">$1</a>", array_keys($dirs))) . "</pre>\n";
			exit(-5);
		}
	}
	
	foreach ($dirs as $dir)
	{
		if (!is_dir($dir))
		{
			print "$dir wasn't a directory, please amend the definition of \$dirs in {$_SERVER["PHP_SELF"]}\n";
			exit(-4);
		}
	}

	if (isset($_GET["html"]))
	{
		$html = true;
		header("Content-type: text/html");
	}
	else
	{
		$html = false;
		header("Content-type: text/plain");
	}
}

if (!isset($dirs) || !is_array($dirs) || sizeof($dirs) == 0)
{
	print "I need to know what project/component you'd like me to audit!\n\n";
	if ($cli)
	{
		print "For example:\n";
		print "\tphp $argv[0] org.eclipse.emf\n\n";
		print "You may also add -v or -vv for greater verbosity.\n";
	}
	else
	{
		print "Make sure \$dirs is defined in {$_SERVER["PHP_SELF"]} and contains a list of branches => directories you'd like to process.\n";
	}
	exit(-1);
}

ob_start();

foreach ($dirs as $dir)
{
	$r = trim(file_get_contents("$dir/CVS/Repository"));
	$m = null;
	if (preg_match("#^(org\.eclipse\.[^/]+)(?:/([^/]+))?$#", $r, $m))
	{
		$proj = $m[1];
		$com = (isset($m[2]) ? $m[2] : "");
		logger(LOGGER_INFO, "found $proj/$com\n");
	}
	else
	{
		$msg = "I couldn't figure out what project/component that is, quitting...\n";
		$msg .= "     --> make sure $dir/CVS/Repository exists and is correct\n";
		logger(LOGGER_FAIL, $msg);
		exit(-3);
	}

	$branch = "HEAD";
	if (is_file("$dir/CVS/Tag"))
	{
		$branch = preg_replace("/^./", "", trim(file_get_contents("$dir/CVS/Tag")));
		logger(LOGGER_INFO, "detected branch $branch\n");
	}
	else
	{
		logger(LOGGER_INFO, "no CVS/Tag file found, assuming HEAD branch\n");
	}

	$branchfails = 0;
	$issues = array();
	require_once($require_db);
	foreach (glob("$dir/{plugins,tests,examples}/org.eclipse.*", GLOB_BRACE) as $plugdir)
	{
		$plugin = basename($plugdir);
		$type = preg_replace("#^.+/([^/]+)/$plugin$#", "$1", $plugdir); //plugins, tests, or examples

		$deps = array();
		$checked = array();
		$queue = array($plugin);
		$versions = array();
		$lastversions = array();
		$vcache = array();
		$fails = 0;

		if (preg_match("/-feature$/", $plugin))
		{
			logger(LOGGER_INFO, "skipping $plugdir as it looks like a feature, not a plugin\n\n");
			continue;
		}

		if ($tmp = plugin_version($plugdir))
		{
			$vanityname = preg_replace("/\.qualifier$/", "", $tmp);
			$version = convert_version($tmp);

			$lastdir = preg_replace("#cvssrc(?:_branches)?(/" . basename($dir) . ")#", "cvssrc_branches$1-latest", $dir);
			$lastplugdir = preg_replace("#cvssrc(?:_branches)?(/" . basename($dir) . ")#", "cvssrc_branches$1-latest", $plugdir);
			$lastversion = preg_replace("/\.qualifier$/", "", plugin_version($lastplugdir));

			$p = ($com == "" ? $proj : "$proj/$com");

			/* it's quite possible for us to end up with changes in a branch (say R2_1_maintenance) with the plugin only being versioned at 2.1.0, of course 2.1.0 wasn't released from the R2_1_maintenance branch, so we'll never find it there
			 * keep trying to find the last build in progressively less picky ways... */
			$lastbuild = array(
				"(SELECT MAX(`buildtime`) FROM `releases` WHERE `project` = '$proj' AND `component` = '$com' AND `branch` = '$branch' AND `type` = 'R')",
				"(SELECT `buildtime` FROM `releases` WHERE `project` = '$proj' AND `component` = '$com' AND `vanityname` = '$vanityname' AND `type` = 'R')",
				"(SELECT MIN(`buildtime`) FROM `releases` WHERE `project` = '$proj' AND `component` = '$com' AND `type` = 'R')",
				"'2000-01-01'"
			);
			$result = wmysql_query("SELECT `bugid`, `cvsname`, `date` FROM `cvsfiles` NATURAL JOIN `commits` NATURAL LEFT JOIN `bugs` WHERE `project` = '$proj' AND `branch` = '$branch' AND `cvsname` LIKE '/cvsroot/modeling/$p/$type/$plugin/%' AND `date` >= COALESCE(" . join(", ", $lastbuild) . ")");
			if (mysql_num_rows($result) == 0)
			{
				logger(LOGGER_OK, "no commits found >= $p/$type/$plugin/ $vanityname\n");
			}
			else
			{
				$plugtext = $plugin;
				if ($html)
				{
					$result2 = wmysql_query("SELECT MIN(`date`) FROM `cvsfiles` NATURAL JOIN `commits` WHERE `project` = '$proj' AND `branch` = '$branch' AND `cvsname` LIKE '/cvsroot/modeling/$p/$type/$plugin/%' AND `date` >= COALESCE(" . join(", ", $lastbuild) . ")");
					$row2 = mysql_fetch_row($result2);
					$plugtext = "<a href=\"http://www.eclipse.org/modeling/emf/searchcvs.php?q=" . urlencode("file: $p/$type/$plugin startdate: $row2[0] branch: $branch") . "\">$plugin</a>";
				}
				$msg = mysql_num_rows($result) . " commit(s) found >= $plugtext $lastversion, currently at $vanityname\n";
				while ($row = mysql_fetch_row($result))
				{
					$msg .= "     ref: http://www.eclipse.org/modeling/emf/searchcvs.php?q=";
					if ($row[0])
					{
						$msg .= "$row[0]\n";
					}
					else
					{
						$msg .= urlencode("file: $row[1] startdate: $row[2] enddate: $row[2]") . "\n";
					}
				}
				if ($version > convert_version($lastversion))
				{
					logger(LOGGER_OK, $msg);
				}
				else
				{
					$msg .= "     --> $plugin must be > $vanityname\n";
					logger(LOGGER_FAIL, $msg);
					$fails++;
				}
			}

			while (sizeof($queue) > 0)
			{
				foreach (array_keys($queue) as $z)
				{
					$actual = preg_replace("/-feature$/", "", $queue[$z]);
					$fails += depgrep($dir, $actual, $vanityname, $plugin);
					unset($queue[$z]);
				}
			}

			$f = "doc/$proj.doc-feature/feature.xml";
			if (is_file("$dir/$f"))
			{
				$deps["$proj.doc-feature"] = "$dir/$f";
			}
			else
			{
				logger(LOGGER_INFO, "couldn't find $f\n");
			}

			foreach (array_keys($deps) as $z)
			{
				$versions[$z] = convert_version(feature_version($deps[$z]));
				$lastversions[$z] = convert_version(feature_version(preg_replace("#cvssrc(?:_branches)?(/" . basename($dir) . ")#", "cvssrc_branches$1-latest", $deps[$z])));
			}
			//print_r($deps);

			$f = "doc/$proj.doc/build.xml";
			if (is_file("$dir/$f"))
			{
				$versions["$proj.doc"] = doc_version($dir, $proj);
				$lastversions["$proj.doc"] = doc_version($lastdir, $proj);
			}
			else
			{
				logger(LOGGER_INFO, "couldn't find $f\n");
			}

			if ($version > convert_version($lastversion))
			{
				foreach (array_keys($versions) as $z)
				{
					if (preg_match("/\.doc(?:-feature)?$/", $z) && $version - $versions[$z] <= 999)
					{
						$v1 = $vcache[$versions[$z]];
						$v2 = $vcache[$version];
						logger(LOGGER_OK, "$z (" . preg_replace("/\.\d+$/", "", $v1) . ") >= $plugin (" . preg_replace("/\.\d+$/", "", $v2) . "), ignoring service versions (actual versions were $v1 and $v2, respectively)\n");
					}
					else if ($versions[$z] > $lastversions[$z])
					{
						if ($versions[$z] - $lastversions[$z] == 1 || $versions[$z] - $lastversions[$z] == 1000)
						{
							logger(LOGGER_OK, "$z last released at " . $vcache[$lastversions[$z]] . ", currently at " . $vcache[$versions[$z]] . "\n");
						}
						else
						{
							$msg = "$z last released at " . $vcache[$lastversions[$z]] . ", currently at " . $vcache[$versions[$z]] . "\n";
							$msg .= "     --> $z must be incremented only once per release cycle (last released at " . $vcache[$lastversions[$z]] . ", currently at " . $vcache[$versions[$z]] . ")\n";
							logger(LOGGER_FAIL, $msg);
							$fails++;
						}
					}
					else
					{
						$msg = "$z last released at " . $vcache[$lastversions[$z]] . ", currently at " . $vcache[$versions[$z]] . ", but $plugin has been incremented\n";
						$msg .= "     --> $z must be > " . $vcache[$versions[$z]] . "\n";
						logger(LOGGER_FAIL, $msg);
						$fails++;
					}
				}
			}
			else
			{
				logger(LOGGER_OK, "$plugin last released at $lastversion, currently at $vcache[$version]\n");
			}

			if ($fails == 0)
			{
				logger(LOGGER_OK, "$plugdir appears to be fine\n\n");
			}
			else if ($verbosity >= LOGGER_OK)
			{
				print "\n";
			}
		}
		else if (!preg_match("/-feature$/", $plugdir))
		{
			logger(LOGGER_INFO, "couldn't find a MANIFEST.MF for $plugdir\n");
		}
		$branchfails += $fails;
	}

	/* we don't use the logger() interface here because we always want these to show, and we don't want a prepended tag */
	if ($branchfails == 0)
	{
		print "$branch: ok\n\n";
	}
	else
	{
		print "$branch: $branchfails failure(s): commit plugin/feature fixes to CVS, then run http://build.eclipse.org/modeling/build/updateSearchCVS.php to refresh database.\n";
		ksort($issues);
		print join("\n", array_keys($issues)) . "\n\n";
		$issues = array();
	}
}

$content = ob_get_contents();
ob_end_clean();

if ($html)
{
	print "<pre>\n";
	print preg_replace("#(?<!href=\")(https?://[^ \n\t]+)#", "<a href=\"$1\">$1</a>", $content);
	print "</pre>\n";
}
else
{
	print $content;
}

/* find features which include or depend on the given plugin within the given directory */
function depgrep($dir, $plugin, $vanityname, $origplugin)
{
	global $deps, $checked, $queue;

	foreach (glob("$dir/{plugins,features,tests,examples}/*-feature/{,org.eclipse.*.sdk/}feature.xml", GLOB_BRACE) as $z)
	{
		$regs = null;
		if (preg_match("/<(?:includes|plugin)[^>]+id=\"\Q$plugin\E\"[^>]+version=\"([^\"]+)\"/s", file_get_contents($z), $regs))
		{
			if ($plugin === $origplugin)
			{
				if ($vanityname !== $regs[1] && $regs[1] !== "0.0.0")
				{
					$msg = "$plugin is at $vanityname, but $z wants $regs[1]\n";
					$msg .= "     --> $plugin must be $vanityname in $z\n";
					logger(LOGGER_FAIL, $msg);
				}
				else
				{
					logger(LOGGER_OK, "$z wants $regs[1]\n");
				}
			}

			$m = null;
			if (preg_match("#/([^/]+)/feature\.xml$#", $z, $m))
			{
				$deps[$m[1]] = $z;
				if (!isset($checked[$m[1]]))
				{
					$checked[$m[1]] = true;
					$queue[] = $m[1];
				}
			}
		}
	}
}

/* parse the feature version out of a feature.xml file */
function feature_version($file)
{
	$m = null;
	if (preg_match("/<feature[^>]+version=\"([^\"]+)\"/s", file_get_contents($file), $m))
	{
		return $m[1];
	}
}

/* parse the bundle version out of a MANIFEST.MF file (or plugin.xml if we can't find a MANIFEST.MF) */
function plugin_version($plugdir)
{
	$ret = false;

	$m = null;
	if (is_file("$plugdir/META-INF/MANIFEST.MF"))
	{
		if (preg_match("#^Bundle-Version:\s+(.+)$#m", file_get_contents("$plugdir/META-INF/MANIFEST.MF"), $m))
		{
			$ret = $m[1];
		}
	}
	else if (is_file("$plugdir/plugin.xml"))
	{
		if (preg_match("#<plugin[^>]+version\s*=\s*\"([^\"]+)\"[^>]+>#s", file_get_contents("$plugdir/plugin.xml"), $m))
		{
			$ret = $m[1];
		}
	}
	else
	{
		logger(LOGGER_FAIL, "couldn't find a MANIFEST.MF or plugin.xml for $plugdir!\n");
	}

	return $ret;
}

/* convert a version number like 2.3.0.qualifier to 2*10^6 + 3*10^3 + 0, so they can be compared numerically
 * also associate the two values in $vcache so the operation can be reversed easily */
function convert_version($version)
{
	global $vcache;

	$version = preg_replace("/\.qualifier$/", "", $version);
	list($major, $minor, $patch) = split("\.", $version);

	$num = ($major * pow(10, 6) + $minor * pow(10, 3) + $patch);
	$vcache[$num] = $version;

	return $num;
}

/* we need to check 2 different files for the doc plugin, so we'll just add it's version directly */
function doc_version($dir, $proj)
{
	global $fail;

	$v1 = null;
	$v2 = null;

	$m = null;
	if (preg_match("#<property\s+name=\"pluginVersion\"\s+value=\"([^\"]+)\"\s*/>#", file_get_contents("$dir/doc/$proj.doc/build.xml"), $m))
	{
		$v1 = $m[1];
	}

	$v2 = plugin_version("$dir/doc/$proj.doc");

	if ($v1 !== null && $v2 !== null)
	{
		if ("$v1.qualifier" === $v2 || $v1 === $v2)
		{
			return convert_version($v2);
		}
		else
		{
			$msg = "$dir/doc/$proj.doc is not internally consistent! ($v1 != $v2)\n";
			$msg .= "     --> the versions in build.xml (currently $v1) and META-INF/MANIFEST.MF (currently $v2) must match\n";
			logger(LOGGER_FAIL, $msg);
		}
	}
	else
	{
		$msg = "couldn't find all version information for $dir/doc/$proj.doc!\n";
		if ($v1 === null)
		{
			$msg .= "     --> build.xml must have a <property name=\"pluginVersion\" value=\"x.x.x\"/>\n";
		}
		if ($v2 === null)
		{
			$msg .= "     --> META-INF/MANIFEST.MF must have a Bundle-Version: x.x.x\n";
		}
		logger(LOGGER_FAIL, $msg);
	}
}

/* wrapper for output, prepends a label and controls output based on the verbosity level */
function logger($type, $msg)
{
	global $verbosity, $issues;

	$labels = array(
		LOGGER_FAIL => "[ fail ]",
		LOGGER_OK => "[  ok  ]",
		LOGGER_INFO => "[ info ]"
	);

	if ($type <= $verbosity)
	{
		print $labels[$type] . " $msg";
		$m = null;
		if (preg_match_all("/^(     -->.+)$/m", $msg, $m))
		{
			foreach ($m[1] as $z)
			{
				$issues[$z] = true;
			}
		}
	}
}
?>
