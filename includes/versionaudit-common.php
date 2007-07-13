<?php
/*
 * A plugin/feature version checking auditor with support for cli and www mode.
 */
define("LOGGER_FAIL", 0);
define("LOGGER_OK", 1);
define("LOGGER_INFO", 2);

$verbosity = 0;
$cli = isset($argv); // $argv is only defined when running in cli mode

/* in cli mode, you'll need to have the includes directory (with db.php) in the current directory, then invoke this script directly, rather than one of the placeholders */
if ($cli)
{
	require("includes/db.php");

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
}
else
{
	header("Content-type: text/plain");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

	require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

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
			print "$b wasn't a valid branch, please try again with a valid branch, such as:\n";
			print join("\n", preg_replace("/^(.+)$/", "- $1", array_keys($dirs))) . "\n";
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
	foreach (glob("$dir/plugins/org.eclipse.*") as $plugdir)
	{
		$plugin = basename($plugdir);

		$deps = array();
		$checked = array();
		$queue = array($plugin);
		$versions = array();
		$vcache = array();

		if ($tmp = plugin_version($plugdir))
		{
			$fails = 0;
			$vanityname = preg_replace("/\.qualifier$/", "", $tmp);
			$version = convert_version($tmp);

			$p = ($com == "" ? $proj : "$proj/$com");
			$result = wmysql_query("SELECT COUNT(*) FROM `cvsfiles` NATURAL JOIN `commits` WHERE `project` = '$proj' AND `branch` = '$branch' AND `cvsname` REGEXP '^/cvsroot/(tools|modeling)/$p/plugins/$plugin/' AND `date` >= (SELECT `buildtime` FROM `releases` WHERE `project` = '$proj' AND `component` = '$com' AND `vanityname` = '$vanityname' AND `branch` = '$branch')");
			$row = mysql_fetch_row($result);
			if ($row[0] == 0)
			{
				logger(LOGGER_OK, "no commits found >= $p/plugins/$plugin/ $vanityname\n");
			}
			else
			{
				$msg = "$row[0] commit(s) found >= $plugin $vanityname\n";
				$msg .= "     --> $plugin must be > $vanityname\n";
				logger(LOGGER_FAIL, $msg);
				$fails++;
			}

			while (sizeof($queue) > 0)
			{
				foreach (array_keys($queue) as $z)
				{
					$actual = preg_replace("/-feature$/", "", $queue[$z]);
					depgrep($dir, $actual);
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
			}
			//print_r($deps);

			$f = "doc/$proj.doc/build.xml";
			if (is_file("$dir/$f"))
			{
				$versions["$proj.doc"] = doc_version($dir, $proj);
			}
			else
			{
				logger(LOGGER_INFO, "couldn't find $f\n");
			}

			foreach (array_keys($versions) as $z)
			{
				if (preg_match("/\.doc(?:-feature)?$/", $z) && $version - $versions[$z] <= 999)
				{
					$v1 = $vcache[$versions[$z]];
					$v2 = $vcache[$version];
					logger(LOGGER_OK, "$z (" . preg_replace("/\.\d+$/", "", $v1) . ") >= $plugin (" . preg_replace("/\.\d+$/", "", $v2) . "), ignoring service versions (actual version were $v1 and $v2, respectively)\n");
				}
				else if ($versions[$z] >= $version)
				{
					logger(LOGGER_OK, "$z (" . $vcache[$versions[$z]] . ") >= $plugin ($vcache[$version])\n");
				}
				else
				{
					$msg = "$z (" . $vcache[$versions[$z]] . ") < $plugin ($vcache[$version])\n";
					$msg .= "     --> $z must be >= $vcache[$version]\n";
					logger(LOGGER_FAIL, $msg);
					$fails++;
				}
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
		print "$branch: $branchfails failure(s)\n";
		ksort($issues);
		print join("\n", array_keys($issues)) . "\n\n";
		$issues = array();
	}
}

/* find features which include or depend on the given plugin within the given directory */
function depgrep($dir, $plugin)
{
	global $deps, $checked, $queue;

	foreach (glob("$dir/{plugins,features}/*-feature/{,org.eclipse.*.sdk/}feature.xml", GLOB_BRACE) as $z)
	{
		if (preg_match("/<(?:includes|plugin)[^>]+id=\"\Q$plugin\E\"/s", file_get_contents($z)))
		{
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
