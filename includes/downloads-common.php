<?php

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
if (isset($dls[$proj]) && is_array($dls[$proj]))
{
	foreach (array_keys($dls[$proj]) as $z)
	{
		$numzips += sizeof($dls[$proj][$z]);
	}
}

// include extras-$proj.php
$file = $_SERVER["DOCUMENT_ROOT"] . "/$PR/downloads/extras" . preg_replace("#^/#", "-", $proj) . ".php";
if (file_exists($file))
{
	include_once($file);
}

$hadLoadDirSimpleError = 1; //have we echoed the loadDirSimple() error msg yet? if 1, omit error; if 0, echo at most 1 error
$sortBy = (isset($_GET["sortBy"]) && preg_match("/^(date)$/", $_GET["sortBy"], $regs) ? $regs[1] : "");
$showAll = (isset($_GET["showAll"]) && preg_match("/^(1)$/", $_GET["showAll"], $regs) ? $regs[1] : "0");
$showMax = (isset($_GET["showMax"]) && preg_match("/^(\d+)$/", $_GET["showMax"], $regs) ? $regs[1] : ($sortBy == "date" ? "10" : "5"));
$doRefreshPage = false;

$PWD = getPWD("$projct/downloads/drops"); // see scripts.php

if ($isBuildServer || false != strpos($_SERVER["HTTP_HOST"], "fullmoon")) //internal
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
	"emf" => "<a href=\"http://www.eclipse.org/modeling/emf/?project=emf#emf\">EMF</a>",
	"net4j" => "<a href=\"http://www.eclipse.org/emft/projects/net4j/#net4j\">Net4j</a>",
	"ocl" => "<a href=\"http://www.eclipse.org/modeling/mdt/?project=ocl#ocl\">OCL</a>",
	"lpg" => "<a href=\"http://download.eclipse.org/tools/orbit/downloads/\">LPG</a>",
	"uml2" => "<a href=\"http://www.eclipse.org/modeling/mdt/?project=uml2#uml2/\">UML2</a>",
	"query" => "<a href=\"http://www.eclipse.org/modeling/emf/?project=query#query\">Query</a>",
	"transaction" => "<a href=\"http://www.eclipse.org/modeling/emf/?project=transaction#transaction\">Transaction</a>",
	"validation" => "<a href=\"http://www.eclipse.org/modeling/emf/?project=validation#validation\">Validation</a>",
	"gef" => "<a href=\"http://www.eclipse.org/gef/\">GEF</a>",
	"gmf" => "<a href=\"http://www.eclipse.org/gmf/\">GMF</a>",
	"orbit" => "<a href=\"http://www.eclipse.org/orbit/\">Orbit</a>",
	"wtp" => "<a href=\"http://www.eclipse.org/wtp/\">WTP</a>"
);

// TODO: move this out into the per-project or per-component pages
/* shortname => array("product", "component") */
$bugzilla_pairs = array(
	"emf" => array("EMF", ""),
	"xsd" => array("MDT", "XSD"),
	"ocl" => array("MDT", "OCL"),
	"eodm" => array("MDT", "EODM"),
	"uml2" => array("MDT", "UML2"),
	"uml2tools" => array("MDT", "UML2%20Tools"),
	"compare" => array("EMFT", "Compare"),
	"teneo" => array("EMFT", "Teneo"),
	"cdo" => array("EMFT", "CDO"),
	"net4j" => array("EMFT", "NET4J"),
	"mwe" => array("EMFT", "MWE"),
);

print "<div id=\"midcolumn\">\n";
print "<h1>Downloads</h1>\n";

if (is_array($projects) && sizeof($projects) > 1)
{
	print doSelectProject($projectArray, $proj, $nomenclature, "homeitem3col", $showAll, $showMax, $sortBy);
}

$branches = loadDirSimple($PWD, ".*", "d");
rsort($branches);
$buildTypes = getBuildTypes($branches, $buildtypes);

$builds = getBuildsFromDirs();
if ($sortBy != "date")
{
	$builds = reorderArray($builds, $buildTypes);
}
else
{
	krsort($builds);
}

if (function_exists("doRequirements"))
{
	call_user_func("doRequirements");
}

$rssfeed = "<a href=\"http://www.eclipse.org/downloads/download.php?file=/$PR/feeds/builds-$projct.xml\"><img style=\"float:right\" alt=\"Modeling Build Feed\" src=\"/modeling/images/rss-atom10.gif\"/></a>";

if (sizeof($builds) == 0)
{
	print "<div class=\"homeitem3col\">\n";
	print "<h3>${rssfeed}Builds</h3>\n";
	print "<ul class=\"releases\">\n";
	if (is_array($projectArray) && !in_array($projct, $projectArray))
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

if (function_exists("requirementsNote"))
{
	requirementsNote();
}

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

$extras = array("doBleedingEdge");

foreach ($extras as $z)
{
	if (function_exists($z))
	{
		call_user_func($z);
	}
}

print "<div class=\"sideitem\">\n";
print "<h6>Additional Info</h6>\n";
print "<ul>\n";
print "<li><a href=\"http://www.eclipse.org/$PR/faq.php\">FAQs</a></li>\n";
print "<li><a href=\"#archives\">Archived Releases</a></li>\n";
print "<li><a href=\"http://www.eclipse.org/modeling/downloads/build-types.php\">About Build Types</a></li>\n";
print "<li><a href=\"http://www.eclipse.org/modeling/downloads/verifyMD5.php\">Using md5 Files</a></li>\n";
print "<li><a href=\"https://bugs.eclipse.org/bugs/buglist.cgi?product={$bugzilla_pairs[$projct][0]}&amp;component={$bugzilla_pairs[$projct][1]}&amp;bug_status=UNCONFIRMED&amp;bug_status=NEW&amp;bug_status=ASSIGNED&amp;bug_status=REOPENED\">Open Bugs</a></li>\n";
print "<li><a href=\"http://www.eclipse.org/$PR/news/relnotes.php?project=$projct&amp;version=HEAD\">Release Notes</a></li>\n";
print "</ul>\n";
print "</div>\n";

print "<div class=\"sideitem\">\n";
print "<h6>Getting Sources</h6>\n";
print "<ul>\n";
print "<li><a href=\"http://www.eclipse.org/modeling/emf/docs/misc/cvsdoc/emfcvsug.html\">CVS + Eclipse</a></li>\n";
print "<li><a href=\"http://wiki.eclipse.org/index.php/CVS_Source_From_Mapfile\">CVS + Map File + Script</a></li>\n";
print "<li><a href=\"http://www.eclipse.org/$PR/downloads/?project=$projct\">SDK zip</a> or <a href=\"http://www.eclipse.org/$PR/updates/\">Update Manager</a> (org.*.source_x.y.z.*/*src.zip)</li>\n";
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
print "<li><a href=\"?project=$projct&amp;showAll=$showAll&amp;showMax=$showMax&amp;sortBy=$newsort\">By " . ucfirst($newsort) . "</a></li>\n";
print "</ul>\n";
print "</div>\n";

$f = $_SERVER["DOCUMENT_ROOT"] . "/$PR/build/sideitems-common.php";
if ($isBuildServer && file_exists($f))
{
	include_once($f);
}

if ($isBuildServer && function_exists("sidebar"))
{
	sidebar();
}

if (isset($incubating) && in_array($projct, $incubating))
{
?>
<div class="sideitem">
   <h6>Incubation</h6>
   <p>This component is currently in its <a href="http://www.eclipse.org/projects/dev_process/validation-phase.php">Validation (Incubation) Phase</a>.</p> 
   <div align="center"><a href="http://www.eclipse.org/projects/what-is-incubation.php"><img 
        align="center" src="http://www.eclipse.org/images/egg-incubation.png" 
        border="0" /></a></div>
 </div>
<?php 
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

function getBuildTypes($branches, $buildtypes)
{
	$arr = array();

	foreach ($branches as $branch)
	{
		foreach (array_keys($buildtypes) as $z)
		{
			if (!array_key_exists($branch, $arr))
			{
				$arr[$branch] = array();
			}

			// [2.0][N]
			$arr[$branch][$z] = "$branch {$buildtypes[$z]} Build";
		}
	}

	return $arr;
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
	global $PR, $suf, $proj, $projct, $filePreStatic, $extraZips;
	$uu = 0;
	$echo_out = "";

	if (!$ziplabel)
	{
		$zips_in_folder = loadDirSimple("$PWD/$branch/$ID/", "(\.zip)", "f");
		$ziplabel = preg_replace("/(.+)\-([^\-]+)(\.zip)/", "$2", $zips_in_folder[0]); // grab first entry
	}

	$cnt=-1; // for use with static prefix list
	foreach (array_keys($dls[$proj]) as $z)
	{
		$echo_out .= "<li><img src=\"/modeling/images/dl.gif\" alt=\"Download\"/> $z\n<ul>\n";
		foreach ($dls[$proj][$z] as $label => $u)
		{
			$cnt++;
			if (!is_array($u)) // for compatibilty with uml2, where there's no "RT" value in $u
			{
				$u = $u ? array("-$u") : array("");
			}

			// support EMF page with three different valid prefixes which can
			// overlap when searched using dynamic check below
			if ($filePreStatic && is_array($filePreStatic) && array_key_exists($proj,$filePreStatic))
			{
				$filePreProj = array($filePreStatic[$proj][$cnt]); // just one value to check
			}

			$tries = array();
			foreach ($u as $ux)
			{
				foreach ($filePreProj as $filePre)
				{
					$tries[] = "$branch/$ID/$pre2$filePre$ux-$ziplabel.zip"; // for compatibilty with uml2, where there's no "runtime" value in $ux
					$tries[] = "$branch/$ID/$filePre$ux-$ziplabel.zip"; // for compatibilty with uml2, where there's no "runtime" value in $ux
					$tries[] = "$branch/$ID/$pre2$filePre$ux-incubation-$ziplabel.zip"; // for compatibilty with uml2, where there's no "runtime" value in $ux
					$tries[] = "$branch/$ID/$filePre$ux-incubation-$ziplabel.zip"; // for compatibilty with uml2, where there's no "runtime" value in $ux
				}
			}
			$outNotFound = "<i><b>$pre2</b>$filePre";
			if (sizeof($u) > 1 ) {
				$outNotFound .= "</i>{"; foreach ($u as $ui => $ux) { $outNotFound .= ($ui>0 ? "," : "") . $ux; } $outNotFound .= "}<i>";
			}
			else
			{
				$outNotFound .= $u[0];
			}
			$outNotFound .= "-$ziplabel.zip ...</i>";
			$out = "";
			foreach ($tries as $z)
			{
				if (is_file("$PWD/$z"))
				{
					$out = fileFound("$PWD/", $z, $label);
					break;
				}
			}
			if ($out)
			{
				$echo_out .= "<li>\n";
				$echo_out .= $out;
				$echo_out .= "</li>\n";
			}
			else if (!isset($extraZips) || !is_array($extraZips) || !in_array($u[0],$extraZips)) // $extraZips defined in downloads/index.php if necessary
			{
				$echo_out .= "<li>\n";
				$echo_out .= $outNotFound;
				$echo_out .= "</li>\n";
			}
			$uu++;
		}
		$echo_out .= "</ul>\n</li>\n";
	}

	return $echo_out;
}

function showBuildResults($PWD, $path) // given path to /../downloads/drops/M200402021234/
{
	global $pre, $isBuildServer, $doRefreshPage, $numzips, $PR, $projct, $isBuildDotEclipseServer;
	$mid = "../../../$PR/$projct/downloads/drops/"; // this is a symlink on the filesystem!

	$out = "";

	$warnings = 0;
	$errors = 0;
	$failures = 0;
	$didnotruns = 0;

	$result = "";
	$icon = "";

	$indexHTML = "";
	$compilelogSummary = "";

	$link = "";
	$link2 = "";

	clearstatcache();
	if ($isBuildServer && is_file("$PWD${path}buildlog.txt")) // if the log's too big, don't open it!
	{
		if (grep("/BUILD FAILED/", "$PWD${path}buildlog.txt"))
		{
			$icon = "not";
			$result = "FAILED"; // BUILD
		}
	}

	if (is_file("$PWD${path}index.html") || is_file("$PWD${path}index.php"))
	{
		$indexHTML = is_file("$PWD${path}index.html") ? file_get_contents("$PWD${path}index.html") : "";
		$zips = loadDirSimple($PWD . $path, ".zip", "f"); // get files count
		$md5s = loadDirSimple($PWD . $path, ".zip.md5", "f"); // get files count

		if ((sizeof($zips) >= $numzips && sizeof($md5s) >= $numzips))
		{
			//check testresults/chkpii/ for results
			if (is_file("$PWD${path}testresults/chkpii/org.eclipse.nls.summary.txt"))
			{
				$chkpiiResults = file_get_contents("$PWD${path}testresults/chkpii/org.eclipse.nls.summary.txt");
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
					$link = "$pre$mid${path}testresults/chkpii/";
					$link2 = "$pre$mid${path}testresults/chkpii/";
				}
			}

			// check JUnit results
			$files = loadDirSimple("$PWD${path}testresults/xml/", ".xml", "f");
			$out = "";
			$noProblems = true;
			foreach ($files as $file)
			{
				$results = getTestResultsJUnitXML("$PWD${path}testresults/xml/" . $file);
				if ($results && is_array($results))
				{
					$errors += $results[0];
					$failures += $results[1];
					$didnotruns += $results[2];
					$icon = "not";
					$results = null;
				}
			}

			//check compilelogs/summary.txt for results
			if (is_file("$PWD${path}compilelogs/summary.txt"))
			{
				$compilelogSummary = file_get_contents("$PWD${path}compilelogs/summary.txt");
				$link2 = ($isBuildServer ? "" : "http://www.eclipse.org") . "/$PR/downloads/testResults.php?hl=1&amp;project=$projct&amp;ID=" . substr($path, 0, strlen($path) - 1);
				if ($compilelogSummary)
				{
					$m = null;
					if (preg_match("/(\d+)P, (\d+)W, (\d+)E, (\d+)F/", $compilelogSummary, $m))
					{
						$warnings += $m[2];
						$errors += $m[3];
						$failures += $m[4];
					}
				}
			}

			if ($errors)
			{
				$icon = "not";
				$result = "ERROR";
			}
			else if ($didnotruns)
			{
				$icon = "not";
				$result = "CAUTION";
			}
			else
			{
				$icon = ($warnings ? "check-maybe" : "check");
				$result = "";
			}

			//parse out the check/fail icons in index.html, if we haven't failed already
			if ($icon != "not" && $indexHTML)
			{
				if (preg_match("/<font size=\"-1\" color=\"#FF0000\">skipped<\/font>/", $indexHTML))
				{
					$icon = "check-maybe";
					$result = "Skipped";
				}
				else if (preg_match("/(?:<!-- Examples -->.*FAIL\.gif|FAIL\.gif.*<!-- Automated Tests -->)/s", $indexHTML))
				{
					$icon = "not";
					$result = "FAILED";
				}
				else if (preg_match("/<!-- Automated Tests -->.*FAIL\.gif.*<!-- Examples -->/s", $indexHTML))
				{
					$icon = "check-tests-failed";
					$result = "TESTS FAILED";
				}
			}
		}
	}

	if (!$icon)
	{
		// display in progress icon & link to log
		$result = "...";
		$icon = "question";
	}

	clearstatcache();
	if ($isBuildServer && $icon == "question" && is_file("$PWD${path}buildlog.txt"))
	{
		if ($isBuildServer && grep("/\[start\] start\.sh finished on: /", "$PWD${path}buildlog.txt"))
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
				$icon = "check-maybe";
				$result = "Stalled!";
			}
			else if ($result != "FAILED" && !$mightHavePassed)
			{
				$icon = "not";
				$result = "FAILED";
			}
		}
	}

	if (!$result && !is_dir("$PWD${path}testresults/xml/"))
	{
		$result = "Skipped";
		$icon = "check-maybe";
	}

	if (!$link) // return a string with icon, result, and counts (if applic)
	{
		$link = ($isBuildServer && !$isBuildDotEclipseServer ? "/$PR/build/log-viewer.php?project=$projct&amp;build=$path" :
				($isBuildServer ? "" : "http://download.eclipse.org/") . $mid.$path."buildlog.txt");
	}

	if (!$link2) // link to console log in progress if it exists
	{
		$ID = substr($path, -14);
		$conlog = "${path}testing/${ID}testing/linux.gtk_consolelog.txt";
		$testlog = ($isBuildServer ? "" : "http://www.eclipse.org") . "/$PR/downloads/testResults.php?hl=1&amp;project=$projct&amp;ID=" . substr($path, 0, strlen($path) - 1);
		$link2 = (is_file("$PWD$conlog") ? "$mid$conlog" : (is_file("$PWD$testlog") ? "$testlog" : $link));
		$result = (is_file("$PWD$conlog") ? "Testing..." : $result);
	}

	$out .= "<a " .
		(preg_match("/FAIL|CAUTION|ERROR/", $result) || $didnotruns > 0 || $errors > 0 || $failures > 0 ? "class=\"fail\" " :
			(preg_match("/Testing|Stalled|Skipped/",$result) || $warnings > 0 ? "class=\"warning\" " :
				"class=\"success\" ") ) .
		"href=\"$link2\">$result";
	if ($errors == 0 && $failures == 0 && $warnings == 0 && !$result)
	{
		$out .= "Success";
	}
	else
	{
		$out  .= ($result && $result != "..." ? ": " : "");
		$out2  = "";
		$out2 .= ($didnotruns > 0 ? "$didnotruns DNR, " : "");
		$out2 .= ($errors > 0 ? "$errors E, " : "");
		$out2 .= ($failures > 0 ? "$failures F, " : "");
		$out2 .= ($warnings > 0 ? "$warnings W" : "");
		$out  .= preg_replace("/^(.+), $/","$1",$out2);
	}
	$out .= "</a> <a href=\"$link\"><img src=\"/modeling/images/$icon.gif\" alt=\"$icon\"/></a>";

	return $out;
}

function fileFound($PWD, $url, $label) //only used once
{
	global $isBuildServer, $downloadScript, $downloadPre, $PR, $proj;

	$mid = "$downloadPre/$PR$proj/downloads/drops/"; // new for www.eclipse.org centralized download.php script

	return (is_file("$PWD$url.md5") ? "<div>" . pretty_size(filesize("$PWD$url")) . " (<a href=\"" . ($isBuildServer ? "" : "http://download.eclipse.org") .
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
	global $downloadScript, $downloadPre, $PR, $proj, $projct;

	foreach ($packs as $name => $packPre)
	{
		foreach ($cols as $alt => $packMid)
		{
			print "<li><img src=\"/modeling/images/dl.gif\" alt=\"$alt\"/> $alt: ";
			$ret = array();
			if (sizeof($subcols) > 2)
			{
				print "<ul>\n";
				$cnt = 0;
				foreach ($subcols as $alt2 => $packMid2)
				{
					if ($cnt > 0 && $cnt % 2 == 0)
					{
						print "<li>" . join(", ", $ret) . "</li>\n";
						$ret = array();
					}
					$ret[] = "<a href=\"" . ($isArchive ? "http://archive.eclipse.org" : $downloadScript) .
						"$downloadPre/$PR$proj/downloads/drops/$folder$packPre$packMid-$packMid2$packSuf\">$alt2</a>";
					$cnt++;
				}
				if (sizeof($ret) > 0)
				{
					print "<li>" . join(", ", $ret) . "</li>\n";
				}
				print "</ul>\n";
			}
			else
			{
				foreach ($subcols as $alt2 => $packMid2)
				{
					$ret[] = "<a href=\"" . ($isArchive ? "http://archive.eclipse.org" : $downloadScript) .
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
	$maxfilesize = 1*1024*1024; // 1M file limit
	$filec = array();
	if (is_file($file) && is_readable($file))
	{
		if (filesize($file) < ($maxfilesize))
		{
			$filec = file($file);
		}
		else
		{
			exec("tail -n4000 $file", $filec);
		}
	}

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
	global $PWD, $isBuildServer, $dls, $filePre, $proj, $sortBy, $projct, $jdk14testsPWD, $jdk50testsPWD, $testsPWD, $deps;
	$pre2 = (is_dir("$PWD/$branch/$ID/eclipse/$ID/") ? "eclipse/$branch/$ID/" : "");

	$zips_in_folder = loadDirSimple("$PWD/$branch/$ID/", "(\.zip)", "f");
	$ziplabel = (sizeof($zips_in_folder) < 1) ? $ID :
		preg_replace("/(.+)\-([^\-]+)(\.zip)/", "$2", $zips_in_folder[0]); // grab first entry

	// generalize for any relabelled build, thus 2.0.1/M200405061234/*-2.0.2.zip is possible; label = 2.0.2
	$IDlabel = $ziplabel;

	$tests = "";
	$s = array();
	if ($isBuildServer && function_exists("getJDKTestResults") && function_exists("getOldTestResults"))
	{
		if (isset($jdk14testsPWD) && $jdk14testsPWD && is_dir($jdk14testsPWD))
		{
			$summary = "";
			$tests = getJDKTestResults("$jdk14testsPWD/", "$branch/$ID/", "jdk14", $summary) . "\n";
			$s[] = $summary;
		}
		if (isset($jdk50testsPWD) && $jdk50testsPWD && is_dir($jdk50testsPWD))
		{
			$summary = "";
			$tests .= getJDKTestResults("$jdk50testsPWD/", "$branch/$ID/", "jdk50", $summary) . "\n";
			$s[] = $summary;
		}
		if (isset($testsPWD) && $testsPWD && is_dir($testsPWD))
		{
			$summary = "";
			$tests .= getOldTestResults("$testsPWD/", "$branch/$ID/", $summary) . "\n";
			$s[] = $summary;
		}
	}
	$summary = join("", preg_replace("/^(.+)$/", "<span>$1</span>", $s));

	$opts = loadBuildConfig("$PWD/$branch/$ID/build.cfg", $deps);

	$ret = "<li>\n";
	$ret .= "<div>" . showBuildResults("$PWD/", "$branch/$ID/") . "$summary</div>";
	$ret .= "<a href=\"javascript:toggle('r$ID')\">" .
		"<i>" . ($sortBy == "date" && $IDlabel != $branch ? "$branch / " : "") . "$IDlabel</i> " .
		"(" . IDtoDateStamp($ID, !$isBuildServer) . ")" .
		"</a>" .
		"<a name=\"$ID\"></a> " .
		"<a href=\"?showAll=1&amp;hlbuild=$ID" .
		($sortBy == "date" ? "&amp;sortBy=date" : "") .
		"&amp;project=$projct#$ID\">" .
		"<img alt=\"Link to this build\" src=\"/modeling/images/link.png\"/>" .
		"</a>" .
		((isset($opts["noclean"]) && $opts["noclean"]) || is_dir("$PWD/$branch/$ID/eclipse/$ID") ? " <span class=\"noclean\">noclean</span> <img alt=\"Purge releng materials before promoting this build!\" src=\"/modeling/images/bug.png\"/>" : "");

	$ret .= "<ul id=\"r$ID\"" . (($c == 0 && !isset($_GET["hlbuild"])) || isset($_GET["hlbuild"]) && $ID == $_GET["hlbuild"] ? "" : " style=\"display: none\"") . ">\n";
	$ret .= createFileLinks($dls, $PWD, $branch, $ID, $pre2, $filePre[$proj], $ziplabel);

	$ret .= $tests;
	$ret .= getBuildArtifacts("$PWD", "$branch/$ID");
	$ret .= "</ul>\n";
	$ret .= "</li>\n";

	return $ret;
}

function loadBuildConfig($file, $deps)
{
	$lines = (is_file($file) && is_readable($file) ? file($file) : array());

	$opts = array();
	foreach ($lines as $z)
	{
		$regs = null;
		if (preg_match("/^((?:" . join("|", array_keys($deps)) . ")(?:DownloadURL|File|BuildURL))=(.{2,})$/", $z, $regs))
		{
			$opts[$regs[1]] = $regs[2];
		}
		else if (preg_match("#^(buildAlias|noclean)=(.+)$#", $z, $regs))
		{
			$opts[$regs[1]] = trim($regs[2]);
		}
		else if (preg_match("#^(javaHome)=(.+)$#", $z, $regs))
		{
			$rp = realpath($regs[2]);
			$opts[$regs[1]] = ($rp && $rp != $regs[2] ? preg_replace("#.+/([^/]+)#", "$1", $regs[2]) . " (" . preg_replace("#.+/([^/]+)#", "$1", $rp) . ")" : preg_replace("#.+/([^/]+)#", "$1", $regs[2]));
		}
	}
	return $opts;
}

function getBuildArtifacts($dir, $branchID)
{
	global $isBuildServer, $downloadPre, $PR, $deps, $proj, $projct;

	$mid = "$downloadPre/$PR$proj/downloads/drops/";
	$file = "$dir/$branchID/build.cfg";
	$havedeps = array();
	$opts = loadBuildConfig($file, $deps);
	foreach (array_keys($deps) as $z)
	{
		$builddir[$z] = (isset($opts["${z}DownloadURL"]) ? $opts["${z}DownloadURL"] : ""). (isset($opts["${z}BuildURL"]) ? $opts["${z}BuildURL"] : ""); if ($builddir[$z] == "/downloads") { $builddir[$z] = null; }
		# Eclipse: R-3.2.1-200609210945 or S-3.3M2-200609220010 or I20060926-0935 or M20060919-1045
		# Other: 2.2.1/R200609210005 or 2.2.1/S200609210005
		$buildID[$z] = isset($opts["${z}BuildURL"]) ? str_replace("/", " ", preg_replace("/.+\/drops\/(.+)/", "$1", $opts["${z}BuildURL"])) : "";
		$buildfile[$z] = $builddir[$z] . "/" . (isset($opts["${z}File"]) ? $opts["${z}File"] : "");
		$builddir[$z] = $builddir[$z] ? (!preg_match("/^http/", $builddir[$z]) ? "http://www.eclipse.org/downloads/download.php?file=$builddir[$z]" : $builddir[$z]) : "";
		$buildfile[$z] = (!preg_match("/^http/", $buildfile[$z]) ? "http://www.eclipse.org/downloads/download.php?file=$buildfile[$z]" : $buildfile[$z]);
		if ($builddir[$z]) {
		    $havedeps[$z] = $z;
		}
	}

	$ret = "";

	if (is_array($havedeps))
	{
		$details = array(
			"Config File" => "build.cfg",
			"Map File" => "directory.txt",
			"Build Log" => "buildlog.txt"
		);

		$link = ($isBuildServer ? "" : "http://download.eclipse.org");

		$ret .= "<li>\n";
		$ret .= "<img src=\"/modeling/images/dl-deps.gif\" alt=\"Upstream dependencies used to build this driver\"/> Build Dependencies\n";
		$ret .= "<ul>\n";
		if (sizeof($opts) > 0)
		{
			$ret .= (isset($opts["javaHome"]) && $opts["javaHome"] ? "<li>{$opts["javaHome"]}</li>" : "");
			foreach (array_keys($havedeps) as $z)
			{
				$vanity = $buildID[$z];
				preg_match("/.+-SDK-(.+).zip/", $buildfile[$z], $reg);
				if ($reg && is_array($reg) && sizeof($reg) > 0) {
					$vanity = preg_replace("/(\d+\.\d+|\d+\.\d+\.\d+) ([NIMRS]\d+)/","$2",$buildID[$z]);
					if ($vanity != $reg[1])
					{
						$vanity = $reg[1] . " " . $vanity;
					}
				}
				if ($vanity == " downloads") {
					$vanity="";
				}
				$ret .= "<li>".($builddir[$z]?"<div><a href=\"$builddir[$z]\">Build Page</a></div>":"")."$deps[$z] <a href=\"$buildfile[$z]\">$vanity</a></li>\n";
			}
		}
		else
		{
			$ret .= "<li><i>Missing or empty build.cfg!</i></li>\n";
		}
		$ret .= "</ul>\n";
		$ret .= "</li>\n";

		$ret .= "<li>\n";
		$ret .= "<img src=\"/modeling/images/dl-more.gif\" alt=\"More info about this build\"/> Build Details\n";
		$ret .= "<ul>\n";

		$version = (isset($opts["buildAlias"]) ? $opts["buildAlias"] : (preg_match("#(.+)/([IM]\d+)#", $branchID, $matches) ? $matches[2]: "HEAD"));
		$ret .= "<li><a href=\"http://www.eclipse.org/$PR/news/relnotes.php?project=$projct&amp;version=$version\">Changes In This Build</a></li>\n";
		$ret .= "<li><a href=\"" . ($isBuildServer ? "" : "http://www.eclipse.org") . "/$PR/downloads/testResults.php?hl=1&amp;project=$projct&amp;ID=$branchID\">Test Results &amp; Compile Logs</a></li>\n";
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
	global $projct;
	$ret = "<li><a href=\"" . $_SERVER["PHP_SELF"] . "?project=".$projct."&amp;showAll=" . ($showAll == "1" ? "" : "1") . "&amp;showMax=$showMax&amp;sortBy=$sortBy\">" . ($showAll != "1" ? "show all $count" : "show only $showMax") . "...</a></li>\n";
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
		if (!$z || $oldrels[$z] === null)
		{
			print "<br/>"; # spacer
		}
		else if (!is_array($oldrels[$z]))
		{
			print "<li><a href=\"http://archive.eclipse.org/$PR$proj/downloads/drops/$z/R$oldrels[$z]/\">$z</a> (" . IDtoDateStamp($oldrels[$z], 0) . ")</li>\n";
		}
		else // optional syntax with hardcoded datestamp and URL, like for old EMF/SDO/XSD 1.x builds
		{
			print "<li><a href=\"" . $oldrels[$z][1] . "\">$z</a> (" . $oldrels[$z][0] . ")</li>\n";
		}
	}
	print "</ul>\n";
	print "</div>\n";
}

function getTestResultsJUnitXML($file)
{
	$data = file($file);
	foreach ($data as $line)
	{
		// <testsuite errors="0" failures="0" ...>
		$matches = null;
		if (preg_match("/<testsuite errors=\"(\d+)\" failures=\"(\d+).+\"/", $line, $matches))
		{
			return array($matches[1], $matches[2], 0);
		}
		else if (false!==strpos($line,"<testsuites></testsuites>")) // no tests run!
		{
			return array(0, 0, 1);
		}
	}
	return array(0, 0, 0);
}
?>
