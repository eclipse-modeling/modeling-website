<?php

/* TODO: remove dependency on build.options.txt: 
 * 	branch can be all dirs available, then rsorted(); 
 * 	buildType can be hardcoded in _projectCommon.php */

if (is_array($projects))
{
	$projectArray = getProjectArray($projects, $extraprojects, $nodownloads, $PR);
	$tmp = array_keys($projectArray);
	$proj = "/" . (isset($_GET["project"]) && preg_match("/^(?:" . join("|", $projects) . ")$/", $_GET["project"]) ? $_GET["project"] : $projectArray[$tmp[0]]);
}
else
{
	$proj = "";
}

$projct = preg_replace("#^/#", "", $proj);

$numzips = 0;
foreach (array_keys($dls[$proj]) as $z)
{
	$numzips += sizeof($dls[$proj][$z]);
}

$file = $_SERVER["DOCUMENT_ROOT"] . "/$PR/downloads/extras" . preg_replace("#^/#", "-", $proj) . ".php";
if (file_exists($file))
{
	include($file);
}

$hadLoadDirSimpleError = 1; //have we echoed the loadDirSimple() error msg yet? if 1, omit error; if 0, echo at most 1 error
$sortBy = (isset($_GET["sortBy"]) && preg_match("/^(date)$/", $_GET["sortBy"], $regs) ? $regs[1] : "");
$showAll = (isset($_GET["showAll"]) && preg_match("/^(1)$/", $_GET["showAll"], $regs) ? $regs[1] : "0");
$showMax = (isset($_GET["showMax"]) && preg_match("/^(\d+)$/", $_GET["showMax"], $regs) ? $regs[1] : ($sortBy == "date" ? "10" : "5"));
$doRefreshPage = false;

$PWD = getPWD("$proj/downloads/drops"); // see scripts.php
$buildOptionsFile = $_SERVER["DOCUMENT_ROOT"] . "/$PR/" . "build.options.txt"; // read only

if (preg_match("/(?:emf|fullmoon)\./", $_SERVER["HTTP_HOST"])) //internal
{
	$downloadScript = "../../../";
	$downloadPre = "../../..";
}
else // all others
{
	$downloadScript = "http://www.eclipse.org/downloads/download.php?file=";
	$downloadPre = "";
}

/* these are possible deps, the actual deps must be a subset of these and are read from build.cfg */
$deps = array(
	"eclipse" => "<a href=\"http://www.eclipse.org/eclipse/\">Eclipse</a>",
	"emf" => "<a href=\"http://www.eclipse.org/emf/\">EMF</a>",
	"jet" => "<a href=\"http://www.eclipse.org/emft/projects/jet/#jet\">Jet</a>",
	"net4j" => "<a href=\"http://www.eclipse.org/emft/projects/net4j/#net4j\">Net4j</a>",
	"ocl" => "<a href=\"http://www.eclipse.org/modeling/mdt/?project=uml2-ocl#uml2-ocl\">OCL</a>",
	"uml2" => "<a href=\"http://www.eclipse.org/modeling/mdt/?project=uml2-uml#uml2-uml/\">UML2</a>",
	"validation" => "<a href=\"http://www.eclipse.org/emft/projects/validation/#validation\">Validation</a>"
);

print "<div id=\"midcolumn\">\n";
print "<h1>Downloads</h1>\n";

if (is_array($projects))
{
	print doSelectProject($projectArray, $proj, $nomenclature, "homeitem3col", $showAll, $showMax, $sortBy);
}

if (function_exists("requirementsNote"))
{
	requirementsNote();
}

if (($options = loadOptionsFromFile($buildOptionsFile)) && is_array($options["Branch"]))
{
	$buildTypes = getBuildTypes($options);
}

$builds = getBuildsFromDirs();
if ($sortBy != "date")
{
	$builds = reorderArray($builds, $buildTypes);
}
else
{
	krsort($builds);
}

if (sizeof($builds) == 0)
{
	print "<div class=\"homeitem3col\">\n";
	print "<h3>${rssfeed}Builds</h3>\n";
	print "<ul class=\"releases\">\n";
	if (is_array($projectArray) && !in_array($projct,$projectArray))
	{
		print "<li><i><b>Sorry!</b></i> There are no builds yet available for this component.</li>";
	}
	else 
	{
		print "<li><i><b>Error!</b></i> No builds found on this server!</li>";
	}
	print "</ul>\n";
	print "</div>\n";
}

if ($sortBy != "date")
{
	$c = 0;
	foreach ($builds as $branch => $types)
	{
		foreach ($types as $type => $IDs)
		{
			print "<div class=\"homeitem3col\">\n";
			print "<h3>$rssfeed" . $buildTypes[$branch][$type] . "s</h3>\n";
			print "<ul class=\"releases\">\n";
			$i = 0;
			foreach ($IDs as $ID)
			{
				print outputBuild($branch, $ID, $c++);
				$i++;

				if (!$showAll && $i == $showMax && $i < sizeof($IDs))
				{
					print showToggle($showAll, $showMax, $sortBy, sizeof($IDs));
					break;
				}
				else if ($showAll && sizeof($IDs) > $showMax && $i == sizeof($IDs))
				{
					print showToggle($showAll, $showMax, $sortBy, sizeof($IDs));
				}
			}
			print "</ul>\n";
			print "</div>\n";
		}
	}
}
else if ($sortBy == "date")
{
	print "<div class=\"homeitem3col\">\n";
	print "<a name=\"latest\"></a><h3>${rssfeed}Latest Builds</h3>\n";
	print "<ul class=\"releases\">\n";
	$c = 0;
	foreach ($builds as $rID => $rbranch)
	{
		$ID = preg_replace("/^(\d{12})([IMNRS])$/", "$2$1", $rID);
		$branch = preg_replace("/.$/", "", $rbranch);
		print outputBuild($branch, $ID, $c++);

		if (!$showAll && $c == $showMax && $c < sizeof($builds))
		{
			print showToggle($showAll, $showMax, $sortBy, sizeof($builds));
			break;
		}
		else if ($showAll && sizeof($builds) > $showMax && $c == sizeof($builds))
		{
			print showToggle($showAll, $showMax, $sortBy, sizeof($builds));
		}
	}
	print "</ul>\n";
	print "</div>\n";
}

if ($doRefreshPage)
{ ?>
<script type="text/javascript">
	setTimeout('document.location.reload()', 60*1000); // refresh every 60 seconds if there's a build in progress
</script>
<?php }

if (isset($oldrels) && is_array($oldrels) && sizeof($oldrels) > 0)
{
	showArchived($oldrels);
}

$extras = array("doLanguagePacks", "showNotes");

foreach ($extras as $z)
{
	if (function_exists($z))
	{
		call_user_func($z);
	}
}

print "</div>\n";

print "<div id=\"rightcolumn\">\n";

print "<div class=\"sideitem\">\n";
print "<h6>Additional Info</h6>\n";
print "<ul>\n";
print "<li><a href=\"http://www.eclipse.org/$PR/faq.php\">FAQs</a></li>\n";
print "<li><a href=\"http://www.eclipse.org/emf/downloads/build-types.php\">About Build Types</a></li>\n";
print "<li><a href=\"http://www.eclipse.org/emf/downloads/verifyMD5.php\">Using md5 Files</a></li>\n";
print "<li><a href=\"http://www.eclipse.org/$PR/news/release-notes.php\">Release Notes</a></li>\n";
print "</ul>\n";
print "</div>\n";

if (isset($NLpacks) && is_array($NLpacks))
{
	print "<div class=\"sideitem\">\n";
	print "<h6>Language Packs</h6>\n";
	print "<ul>\n";
	foreach (array_keys($NLpacks) as $z)
	{
		print "<li><a href=\"#$NLpacks[$z]\">$z</a></li>\n";
	}
	print "</ul>\n";
	print "</div>\n";
}

print "<div class=\"sideitem\">\n";
print "<h6>Sort</h6>\n";
$newsort = ($sortBy == "date" ? "type" : "date");
print "<ul>\n";
print "<li><a href=\"?showAll=$showAll&amp;showMax=$showMax&amp;sortBy=$newsort\">By " . ucfirst($newsort) . "</a></li>\n";
print "</ul>\n";
print "</div>\n";

if (function_exists("sidebar"))
{
	sidebar();
}

print "</div>\n";

function reorderArray($arr, $buildTypes)
{
	// the first dimension's order is preserved (kept as it is in the config file)
	// sort the second dimension using the IMNRS order in $buildTypes
	// rsort the third dimension

	$new = array();
	foreach ($buildTypes as $br => $types)
	{
		foreach ($types as $bt => $names)
		{
			if (array_key_exists($br, $arr) && array_key_exists($bt, $arr[$br]) && is_array($arr[$br][$bt]))
			{
				$new[$br][$bt] = $arr[$br][$bt];
				rsort($new[$br][$bt]);
			}
		}
	}

	return $new;
}

function getBuildsFromDirs() // massage the builds into more useful structures
{
	global $PWD, $sortBy;

	$branchDirs = loadDirSimple($PWD, ".*", "d");
	$buildDirs = array();

	foreach ($branchDirs as $branch)
	{
		if ($branch != "OLD")
		{
			$buildDirs[$branch] = loadDirSimple("$PWD/$branch", "[IMNRS]\d{12}", "d");
		}
	}

	$builds_temp = array();
	foreach ($buildDirs as $br => $dirList)
	{
		foreach ($dirList as $dir)
		{
			$ty = substr($dir, 0, 1); //first char

			if ($sortBy != "date")
			{
				$builds_temp[$br][$ty][] = $dir;
			}
			else
			{
				$dttm = substr($dir, 1); // last 12 digits
				$a = $dttm . $ty;
				$b = $br . $ty;

				$builds_temp[$a] = $b;
			}
		}
	}

	return $builds_temp;
}

function getBuildTypes($options)
{
	$arr = array();
	foreach ($options["Branch"] as $br => $branch)
	{
		foreach ($options["BuildType"] as $bt => $buildType)
		{
			$v = getValueFromOptionsString($branch, "value");
			if (!array_key_exists($v, $arr))
			{
				$arr[$v] = array();
			}
			$regs = null;
			if (preg_match("/^(.+)=([^\|]+)(?:\|selected)?$/", $buildType, $regs))
			{
				// [2.0][N]
				$arr[$v][$regs[2]] = "$v $regs[1] Build";
			}
		}
	}

	return $arr;
}

function getValueFromOptionsString($opt, $nameOrValue)
{
	$regs = null;
	if (preg_match("/^(.+)=([^\|]+)(?:\|selected)?$/", $opt, $regs))
	{
		return (preg_match("/^(?:name|0)$/", $nameOrValue) ? $regs[1] : $regs[2]);
	}
}

function loadOptionsFromFile($file)
{
	return (is_readable($file) ? loadOptionsFromArray(file($file)) : array());
}

/* TODO: this function and it's partners in crime should really be cleaned up */
function loadOptionsFromArray($sp)
{
	$doSection = null;
	foreach ($sp as $s)
	{
		if (preg_match("/^[^#].{2,}/", $s))
		{
			$matches = null;
			if (preg_match("/\[([a-zA-Z_]+)((?:\|reversed)?)\]/", $s, $matches))
			{
				$doSection = $matches[1];

				if ($matches[2] == "|reversed") //FIXME: reversed does nothing right now, apparently it's supposed to work
				{
					$options[$doSection]["reversed"] = true;
				}
			}
			else
			{
				$options[$doSection][] = trim($s); //TODO: this looks like a bug, $doSection could be ""
			}
		}
	}

	return $options;
}

function IDtoDateStamp($ID, $style) // given N200402121441, return date("D, j M Y -- H:i (O)")
{
	$styles = array('Y/m/d H:i', "D, j M Y -- H:i (O)", 'Y/m/d');
	$m = null;
	if (preg_match("/(\d{4})(\d\d)(\d\d)(?:_)?(\d\d)(\d\d)/", $ID, $m))
	{
		$ts = mktime($m[4], $m[5], 0, $m[2], $m[3], $m[1]);
		return date($styles[$style], $ts);
	}

	return "";
}

function createFileLinks($dls, $PWD, $branch, $ID, $pre2, $filePreProj, $ziplabel = "") // the new way - use a ziplabel pregen'd from a dir list!
{
	global $PR, $suf, $proj;
	$uu = 0;
	$echo_out = "";

	if (!$ziplabel)
	{
		$zips_in_folder = loadDirSimple("$PWD/$branch/$ID/", "(\.zip)", "f");
		// for testing, you can find a list of files like this:
		// `find /home/www-data/emf-build/tools/emf/downloads/drops/2.0.1 -type f -maxdepth 2 -name *.zip -name *emf-sdo-xsd-SDK*`

		$ziplabel = preg_replace("/(.+)\-([^\-]+)(\.zip)/", "$2", $zips_in_folder[0]); // grab first entry
	}

	foreach (array_keys($dls[$proj]) as $z)
	{
		$echo_out .= "<li><img src=\"http://" . $_SERVER["HTTP_HOST"] . "/$PR/images/dl-mdt.gif\" alt=\"Download\"/> $z\n<ul>\n";
		foreach ($dls[$proj][$z] as $label => $u)
		{
			$echo_out .= "<li>\n";
			if ($u) // for compatibilty with uml2, where there's no "RT" value in $u
			{
				$u = "-$u";
			}

			$tries = array();
			foreach ($filePreProj as $filePre)
			{
				$tries[] = "$branch/$ID/$pre2$filePre$u-$ziplabel.zip"; // for compatibilty with uml2, where there's no "runtime" value in $u
				$tries[] = "$branch/$ID/$filePre$u-$ziplabel.zip"; // for compatibilty with uml2, where there's no "runtime" value in $u
			}
			
			$out = "...";
			foreach ($tries as $z)
			{
				if (is_file("$PWD/$z"))
				{
					$out = fileFound("$PWD/", $z, $label);
					break;
				}
			}
			$echo_out .= $out;

			$echo_out .= "</li>\n";
			$uu++;
		}
		$echo_out .= "</ul>\n</li>\n";
	}

	return $echo_out;
}

function showBuildResults($PWD, $path) // given path to /../downloads/drops/M200402021234/
{
	global $pre, $isEMFserver, $numzips, $PR, $projct;
	$mid = "../../../$PR/$projct/downloads/drops/"; // this is a symlink on the filesystem!

	$out = "";
	
	$warnings = 0;
	$errors = 0;

	$result = "";
	$icon = "";

	$indexHTML = "";
	$testResultsPHP = "";

	$link = "";
	$link2 = "";

	clearstatcache();
	if ($isEMFserver && is_file("$PWD${path}buildlog.txt") && filesize("$PWD${path}buildlog.txt") < (3*1024*1024)) // if the log's too big, don't open it!
	{
		if (grep("/BUILD FAILED/", "$PWD${path}buildlog.txt"))
		{
			$icon = "not";
			$result = "FAILED"; // BUILD
		}
	}

	if (is_file("$PWD${path}index.html"))
	{
		$indexHTML = file_contents("$PWD${path}index.html");
		$zips = loadDirSimple($PWD . $path, ".zip", "f"); // get files count
		$md5s = loadDirSimple($PWD . $path, ".zip.md5", "f"); // get files count

		if ((sizeof($zips) >= $numzips && sizeof($md5s) >= $numzips))
		{
			if (is_file("$PWD${path}testresults/chkpii/org.eclipse.nls.summary.txt"))
			{
				$chkpiiResults = file_contents("$PWD${path}testresults/chkpii/org.eclipse.nls.summary.txt");
				// eg, file contains:
				//htm: 6 E, 0 W
				//xml: 1 E, 1 W
				//properties: 0 E, 2 W
				$regs = null;
				preg_match_all("/^\S+: (\d+) E, (\d+) W$/m", $chkpiiResults, $regs);
				for ($i = 0; $i < sizeof($regs[0]); $i++)
				{
					$errors += $regs[1][$i];
					$warnings += $regs[2][$i];
					$icon = "not";
					$link = "$pre$mid${path}testresults/chkpii/org.eclipse.nls.summary.txt";
					$link2 = "$pre$mid${path}testresults/chkpii/";
				}
			}

			//check testResults.php for results
			if ($icon != "not")
			{
				if (is_file("$PWD${path}testResults.php"))
				{
					$testResultsPHP = file("$PWD${path}testResults.php");
					$link2 = "$pre$mid${path}testResults.php";
					foreach ($testResultsPHP as $tr)
					{
						if (preg_match("/<td>(\d*)<\/td><td>(\d*)<\/td><\/tr>/", $tr))
						{
							$rows = explode("<tr>", $tr); // break into pieces
							foreach ($rows as $r => $row)
							{
								$m = null;
								if (preg_match("/<td>(\d*)<\/td><td>(\d*)<\/td><\/tr>/", $row, $m))
								{
									$errors   += $m[1];
									$warnings += $m[2];
								}
							}
						}
					}
				}
			}

			if ($icon == "")
			{
				if ($errors)
				{
					$icon = "not";
					$result = "COMPILER ERROR";
				}
				else
				{
					$icon = ($warnings ? "check-maybe" : "check");
					$result = "";
				}
			}

		}
		else 
		{
			// should we report this status? or is this problematic when mirrors are propagating?
			// $icon = "not";
			// $result = "MISSING FILES?";
		}

		// parse out the check/fail icons in index.html, if we haven't failed already
		if ($icon != "not")
		{
			if (preg_match("/<font size=\"-1\" color=\"#FF0000\">skipped<\/font>/", $indexHTML))
			{
				$result = "Skipped";
				$icon = "check-maybe";
			}
			else if (preg_match("/(?:<!-- Examples -->.*FAIL\.gif|FAIL\.gif.*<!-- Automated Tests -->)/s", $indexHTML))
			{
				$icon = "not";
				$result = "FAILED";
			}
			else if (preg_match("/<!-- Automated Tests -->.*FAIL\.gif.*<!-- Examples -->/s", $indexHTML))
			{
				$result = "TESTS FAILED";
				$icon = "check-tests-failed";
			}
		}
	}

	if (!$icon)
	{
		// display in progress icon & link to log
		$result = "...";
		$icon = "question";
	}

	global $doRefreshPage;
	clearstatcache();
	if ($isEMFserver && $icon == "question" && is_file("$PWD${path}buildlog.txt") && filesize("$PWD${path}buildlog.txt") < (3*1024*1024))
	{
		if ($isEMFserver && grep("/\[start\] start\.sh finished on: /", "$PWD${path}buildlog.txt"))
		{
			$icon = "not"; //display failed icon - not in progress anymore!
			$result = "FAILED"; // BUILD
		}

		if ($result != "FAILED" && strtotime("now") - filemtime("$PWD${path}buildlog.txt") < 7200)
		{
			$doRefreshPage = true;
		}
		else
		{
			$mightHavePassed = false;
			if (grep("/BUILD SUCCESSFUL/", "$PWD${path}buildlog.txt"))
			{
				$mightHavePassed = true;
			}
			else if (grep("/BUILD FAILED/", "$PWD${path}buildlog.txt"))
			{
				$icon = "not"; //display failed icon
				$result = "FAILED"; // BUILD
			}

			if ($result != "FAILED" && $mightHavePassed)
			{
				$result = "Stalled!";
				$icon = "check-maybe";
			}
			else if ($result != "FAILED" && !$mightHavePassed)
			{
				$icon = "not";
			}
		}
	}

	if (!$link) // return a string with icon, result, and counts (if applic)
	{
		$link = ($isEMFserver ? "/$PR/build/log-viewer.php?project=$projct&amp;build=$path" : "http://download.eclipse.org/"."$mid${path}buildlog.txt");
	}

	if (!$link2) // link to console log in progress if it exists
	{
		$ID = substr($path, -14);
		$conlog = "${path}testing/${ID}testing/linux.gtk_consolelog.txt";
		$testlog = "${path}testResults.php";
		$link2 = (is_file("$PWD$conlog") ? "$mid$conlog" : (is_file("$PWD$testlog") ? "$mid$testlog" : $link));
		$result = (is_file("$PWD$conlog") ? "Testing..." : $result);
	}
	$link2 = ($isEMFserver ? "" : "http://download.eclipse.org/") . $link2;
	
	$out .= "<a href=\"$link2\">$result";
	$out .= ($errors == 0 && $warnings == 0) && !$result ? "Success" : "";
	$out .= ($errors > 0 || $warnings > 0) && $result ? ": " : "";
	$out .= ($errors > 0 ? "$errors E, $warnings W" : ($warnings > 0 ? "$warnings W" : ""));
	$out .= "</a> <a href=\"$link\"><img src=\"http://" . $_SERVER["HTTP_HOST"] . "/$PR/images/$icon.gif\" alt=\"$icon\"/></a>";

	return $out;
}

function fileFound($PWD, $url, $label) //only used once
{
	global $isEMFserver, $downloadScript, $downloadPre, $PR, $proj;

	$mid = "$downloadPre/$PR$proj/downloads/drops/"; // new for www.eclipse.org centralized download.php script

	return (is_file("$PWD$url.md5") ? "<div>" . pretty_size(filesize("$PWD$url")) . " (<a href=\"" . ($isEMFserver ? "" : "http://download.eclipse.org") . 
"$mid$url.md5\">md5</a>)</div>" : "") . "<a href=\"$downloadScript$mid$url\">$label</a>";
}

function pretty_size($bytes)
{
	$sufs = array("B", "K", "M", "G", "T", "P"); //we shouldn't be larger than 999.9 petabytes any time soon, hopefully
	$suf = 0;

	while ($bytes >= 1000)
	{
		$bytes /= 1024;
		$suf++;
	}

	return sprintf("%3.1f%s", $bytes, $sufs[$suf]);
}

function doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder, $isArchive = false)
{
	global $downloadScript, $downloadPre, $PR, $proj;

	foreach ($packs as $name => $packPre)
	{
		foreach ($cols as $alt => $packMid)
		{
			print "<li><img src=\"http://" . $_SERVER["HTTP_HOST"] . "/$PR/images/dl-mdt.gif\" alt=\"$alt\"/> $alt: ";
			$ret = array();
			if (sizeof($subcols)>2) 
			{
			  print "<ul>\n";
			  $cnt=0;
  			foreach ($subcols as $alt2 => $packMid2)
  			{
  			  if ($cnt > 0 && $cnt % 2 == 0) 
  			  {
      			print "<li>".join(", ", $ret)."</li>\n";
      			$ret = array();
          }
 	  			$ret[] = "<a href=\"" . ($isArchive ? "http://archive.eclipse.org/" : $downloadScript) .
					"$downloadPre/$PR$proj/downloads/drops/$folder$packPre$packMid-$packMid2$packSuf\">$alt2</a>";
 					$cnt++;
				}
				if (sizeof($ret)>0) 
				{
      			print "<li>".join(", ", $ret)."</li>\n";
				}
			  print "</ul>\n";
			}
			else
			{
  			foreach ($subcols as $alt2 => $packMid2)
  			{
  				$ret[] = "<a href=\"" . ($isArchive ? "http://archive.eclipse.org/" : $downloadScript) .
					"$downloadPre/$PR$proj/downloads/drops/$folder$packPre$packMid-$packMid2$packSuf\">$alt2</a>";
				}
			print join(", ", $ret);
			}
			print "</li>\n";
		}
	}
}

function grep($pattern, $file)
{
	$filec = (is_file($file) && is_readable($file) ? file($file) : array());

	foreach ($filec as $z)
	{
		if (preg_match($pattern, $z))
		{
			$filec = array();
			return true;
		}
	}

	$filec = array();
	return false;
}

function outputBuild($branch, $ID, $c)
{
	global $PWD, $isEMFserver, $dls, $filePre, $proj, $sortBy;
	$pre2 = (is_dir("$PWD/$branch/$ID/eclipse/$ID/") ? "eclipse/$branch/$ID/" : "");

	$zips_in_folder = loadDirSimple("$PWD/$branch/$ID/", "(\.zip)", "f");
	// for testing, you can find a list of files like this:
	// `find /home/www-data/emf-build/tools/emf/downloads/drops/2.0.1 -type f -maxdepth 2 -name *.zip -name *emf-sdo-xsd-SDK*`
	$ziplabel = (sizeof($zips_in_folder) < 1) ? $ID :
		preg_replace("/(.+)\-([^\-]+)(\.zip)/", "$2", $zips_in_folder[0]); // grab first entry

	// generalize for any relabelled build, thus 2.0.1/M200405061234/*-2.0.2.zip is possible; label = 2.0.2
	$IDlabel = $ziplabel;

	$ret = "<li>\n";
	$ret .= "<div>" . showBuildResults("$PWD/", "$branch/$ID/") . "</div>";
	$ret .= "<a href=\"javascript:toggle('r$ID')\"><i>" . ($sortBy == "date" && $IDlabel != $branch ? "$branch / " : "") . 
		"$IDlabel</i> (" . IDtoDateStamp($ID, ($isEMFserver ? 0 : 1)) . ")</a><a name=\"$ID\"> </a> <a href=\"?showAll=1&amp;hlbuild=$ID" . 
		($sortBy == "date" ? "&amp;sortBy=date" : "") . ($proj ? "&amp;project=" . 
		preg_replace("#^/#", "", $proj) : "") . "#$ID\"><img alt=\"Link to this build\" src=\"../images/link.png\"/></a>";

	$ret .= "<ul id=\"r$ID\"" . (($c == 0 && !isset($_GET["hlbuild"])) || $ID == $_GET["hlbuild"] ? "" : " style=\"display: none\"") . ">\n";
	$ret .= createFileLinks($dls, $PWD, $branch, $ID, $pre2, $filePre[$proj], $ziplabel);

	//$ret .= $tests;
	$ret .= getBuildArtifacts("$PWD", "$branch/$ID");
	$ret .= "</ul>\n";
	$ret .= "</li>\n";

	return $ret;
}

function getBuildArtifacts($dir, $branchID)
{
	global $isEMFserver, $downloadPre, $PR, $deps, $proj;

	$mid = "$downloadPre/$PR$proj/downloads/drops/";
	$file = "$dir/$branchID/build.cfg";
	$lines = (is_file($file) && is_readable($file) ? file($file) : array());
	$havedeps = array();

	foreach ($lines as $z)
	{
		$regs = null;
		if (preg_match("/^((" . join("|", array_keys($deps)) . ")(?:DownloadURL|File|BuildURL))=(.+)$/", $z, $regs))
		{
			$opts[$regs[1]] = $regs[3];
			$havedeps[$regs[2]] = true;
		}
		else if (preg_match("#^(javaHome)=.+/(.+)$#", $z, $regs))
		{
			$opts[$regs[1]] = $regs[2];
		}
	}

	foreach (array_keys($havedeps) as $z)
	{
		$builddir[$z] = (isset($opts["${z}DownloadURL"]) ? $opts["${z}DownloadURL"] : ""). (isset($opts["${z}BuildURL"]) ? $opts["${z}BuildURL"] : "");
		# Eclipse: R-3.2.1-200609210945 or S-3.3M2-200609220010 or I20060926-0935 or M20060919-1045
		# Other: 2.2.1/R200609210005 or 2.2.1/S200609210005
		$buildID[$z] = isset($opts["${z}BuildURL"]) ? str_replace("/", " ", preg_replace("/.+\/drops\/(.+)/", "$1", $opts["${z}BuildURL"])) : "";
		$buildfile[$z] = $builddir[$z] . "/" . (isset($opts["${z}File"]) ? $opts["${z}File"] : "");
		$builddir[$z] = (!preg_match("/^http/", $builddir[$z]) ? "http://www.eclipse.org/downloads/download.php?file=$builddir[$z]" : $builddir[$z]);
		$buildfile[$z] = (!preg_match("/^http/", $buildfile[$z]) ? "http://www.eclipse.org/downloads/download.php?file=$buildfile[$z]" : $buildfile[$z]);
	}

	$ret = "";
		
	if (is_array($havedeps))
	{
		$details = array(
			"Config File" => "build.cfg",
			"Map File" => "directory.txt",
			"Build Log" => "buildlog.txt"
		);
		
		$link = ($isEMFserver ? "" : "http://download.eclipse.org");
		
		$ret .= "<li>\n";
		$ret .= "<img src=\"http://" . $_SERVER["HTTP_HOST"] . "/$PR/images/dl-deps.gif\" alt=\"Upstream dependencies used to build this driver\"/> Build Dependencies\n";
		$ret .= "<ul>\n";
		if (sizeof($opts) > 0)
		{
			$ret .= (isset($opts["javaHome"]) && $opts["javaHome"] ? "<li>{$opts["javaHome"]}</li>" : "");
			foreach (array_keys($havedeps) as $z)
			{
				$ret .= "<li><div><a href=\"$builddir[$z]\">Build Page</a></div>$deps[$z] <a href=\"$buildfile[$z]\">$buildID[$z]</a></li>\n";
			}
		}
		else
		{
			$ret .= "<li><i>Missing or empty build.cfg!</i></li>\n";
		}
		$ret .= "</ul>\n";
		$ret .= "</li>\n";

		$ret .= "<li>\n";
		$ret .= "<img src=\"http://" . $_SERVER["HTTP_HOST"] . "/$PR/images/dl-more.gif\" alt=\"More info about this build\"/> Build Details\n";
		$ret .= "<ul>\n";
		$ret .= "<li><a href=\"$link$mid${branchID}/testResults.php\">Test Results &amp; Compile Logs</a></li>\n";
		foreach (array_keys($details) as $label)
		{
			$details[$label] = preg_replace("/^(.+)$/", "<a href=\"$link$mid$branchID/$1\">$label</a>", $details[$label]);
		}
		$ret .= "<li>" . join(", ", $details) . "</li>\n";
		$ret .= "</ul>\n";
		$ret .= "</li>\n";
	}
	return $ret;
}

function showToggle($showAll, $showMax, $sortBy, $count)
{
	$ret = "<li><a href=\"" . $_SERVER["PHP_SELF"] . "?showAll=" . ($showAll == "1" ? "" : "1") . "&amp;showMax=$showMax&amp;sortBy=$sortBy\">" . ($showAll != "1" ? "show all $count" : "show only $showMax") . "...</a></li>\n";

	return $ret;
}

function showArchived($oldrels)
{
	global $PR, $proj;

	print "<div class=\"homeitem3col\">\n";
	print "<h3><a name=\"archives\"></a>Archived Releases</h3>\n";
	print "<p>Older " . project_name($proj) . " releases have been moved to archive.eclipse.org, and can be accessed here:</p>";
	print "<ul id=\"archives\">\n";
	foreach (array_keys($oldrels) as $z)
	{
		if (!is_array($oldrels[$z]))
		{
			print "<li><a href=\"http://archive.eclipse.org/$PR$proj/downloads/drops/$z/R$oldrels[$z]/\">$z</a> (" . IDtoDateStamp($oldrels[$z], 0) . ")</li>\n";			
		}
		else // optional syntax with hardcoded datestamp and URL, like for old EMF/SDO/XSD 1.x builds
		{
			print "<li><a href=\"".$oldrels[$z][1]."\">$z</a> (" . $oldrels[$z][0] . ")</li>\n";
		}
	}
	print "</ul>\n";
	print "</div>\n";
}
?>
