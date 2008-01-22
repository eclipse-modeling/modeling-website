<?php
function doLatest($releases, $label = "Releases")
{
	global $rssfeed, $showMax, $showAll, $sortBy;
	if (sizeof($releases)>0)
	{
		print "<div class=\"homeitem3col\">\n";
		print "<a name=\"latest\"></a><h3>${rssfeed}Latest $label</h3>\n";
		print "<ul class=\"releases\">\n";
		$c = 0;
		foreach ($releases as $rID => $rbranch)
		{
			$ID = preg_replace("/^(\d{12})([IMNRS])$/", "$2$1", $rID);
			$branch = preg_replace("/.$/", "", $rbranch);
			print outputBuild($branch, $ID, $c++);
			if (!$showAll && $c == $showMax && $c < sizeof($releases))
			{
				print showToggle($showAll, $showMax, $sortBy, sizeof($releases));
				break;
			}
			else if ($showAll && sizeof($releases) > $showMax && $c == sizeof($releases))
			{
				print showToggle($showAll, $showMax, $sortBy, sizeof($releases));
			}
		}
		print "</ul>\n";
		print "</div>\n";
	}
}

function reorderAndSplitArray($arr, $buildTypes)
{
	// the first dimension's order is preserved (kept as it is in the config file)
	// sort the second dimension using the IMNRS order in $buildTypes
	// rsort the third dimension

	$new = array();
	$rels = array();
	foreach ($buildTypes as $br => $types)
	{
		foreach ($types as $bt => $names)
		{
			if ($bt == "R" && isset($arr[$br][$bt]))
			{
				$id = $arr[$br][$bt][0];
				$rels[substr($id,1) . $bt] = $br . $bt;
			}
			else if (array_key_exists($br, $arr) && array_key_exists($bt, $arr[$br]) && is_array($arr[$br][$bt]))
			{
				$new[$br][$bt] = $arr[$br][$bt];
				rsort($new[$br][$bt]);
			}
		}
	}
	return array($new,$rels);
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
	global $PR, $suf, $proj, $projct, $filePreStatic, $extraZips, $projects;
	$uu = 0;

	if (!$ziplabel)
	{
		$zips_in_folder = loadDirSimple("$PWD/$branch/$ID/", "(\.zip)", "f");
		$ziplabel = preg_replace("/(.+)\-([^\-]+)(\.zip)/", "$2", $zips_in_folder[0]); // grab first entry
	}

	$cnt=-1; // for use with static prefix list

	if (!isset($dls[$proj]) && isset($dls["/"]))
	{
		$dls[$proj] = $dls["/"];
	}
	if (!isset($dls[$proj]))
	{
		// set default
		$flip = array_flip($projects);
		$dls[$proj] = array($flip[$projct] => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		));
	}

	$echo_out_all = "";
	foreach (array_keys($dls[$proj]) as $z)
	{
		$echo_out = "";
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
			foreach ($tries as $y)
			{
				if (is_file("$PWD/$y"))
				{
					$out = fileFound("$PWD/", $y, $label);
					break;
				}
			}
			if ($out)
			{
				$echo_out .= "<li>\n";
				$echo_out .= $out;
				$echo_out .= "</li>\n";
			}
			else if (!isset($extraZips) || !is_array($extraZips) || !in_array($filePre . $u[0],$extraZips)) // $extraZips defined in downloads/index.php if necessary
			{
				$echo_out .= "<li>\n";
				$echo_out .= $outNotFound;
				$echo_out .= "</li>\n";
			}
			$uu++;
		}
		if ($echo_out) // if the whole category is empty, don't show it (eg., GEF)
		{
			$echo_out_all .= "<li><img src=\"/modeling/images/dl.gif\" alt=\"Download\"/> $z\n<ul>\n" . $echo_out . "</ul>\n</li>\n";
		}
	}

	return $echo_out_all;
}

/* if $styled = 0 or false, return text only */
function showBuildResults($PWD, $path, $styled=1) // given path to /../downloads/drops/M200402021234/
{
	global $downloadPre, $pre, $isBuildServer, $doRefreshPage, $numzips, $PR, $projct, $isBuildDotEclipseServer, $isTech, $isTools;
	$PR2 = ($isTools ? "tools/$PR" : ($isTech ? "technology/$PR" : "$PR")); # to allow for www.eclipse.org/gef/ and download.eclipse.org/tools/gef
	$mid = "$downloadPre/$PR2" . ($projct == "" ? $projct : "/$projct") . "/downloads/drops/";
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
		$md5s = is_dir($PWD . $path . "/checksum") ? loadDirSimple($PWD . $path . "/checksum", ".zip.md5", "f") : loadDirSimple($PWD . $path, ".zip.md5", "f"); // get files count

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
		$link = ($isBuildServer && !$isBuildDotEclipseServer ? "/$PR2/build/log-viewer.php?project=$projct&amp;build=$path" :
				($isBuildServer ? "" : "http://download.eclipse.org/") . $mid.$path."buildlog.txt");
	}

	if (!$link2) // link to console log in progress if it exists
	{
		$ID = substr($path, -14);
		$conlog = "${path}testing/${ID}testing/linux.gtk_consolelog.txt";
		$testlog = ($isBuildServer ? "" : "http://www.eclipse.org") . "/$PR2/downloads/testResults.php?hl=1&amp;project=$projct&amp;ID=" . substr($path, 0, strlen($path) - 1);
		$link2 = (is_file("$PWD$conlog") ? "$mid$conlog" : (is_file("$PWD$testlog") ? "$testlog" : $link));
		$result = (is_file("$PWD$conlog") ? "Testing..." : $result);
	}

	if ($styled)
	{
		$out .= "<a " .
			(preg_match("/FAIL|CAUTION|ERROR/", $result) || $didnotruns > 0 || $errors > 0 || $failures > 0 ? "class=\"fail\" " :
				(preg_match("/Testing|Stalled|Skipped/",$result) || $warnings > 0 ? "class=\"warning\" " :
					"class=\"success\" ") ) .
			"href=\"$link2\">$result";
	}
	else
	{
		$out .= (preg_match("/FAIL|CAUTION|ERROR/", $result) || $didnotruns > 0 || $errors > 0 || $failures > 0 ? "FAILURE / " :
				(preg_match("/Testing|Stalled|Skipped/",$result) || $warnings > 0 ? "WARNING / " :
					"SUCCESS / ") ) .
			"$result";
	}
	if ($errors == 0 && $failures == 0 && $warnings == 0 && !$result)
	{
		$out .= "Success";
	}
	else
	{
		$out  .= ($result && $result != "..."  && $result != "Skipped" ? ": " : "");
		$out2  = "";
		$out2 .= ($didnotruns > 0 ? "$didnotruns DNR, " : "");
		$out2 .= ($errors > 0 ? "$errors E, " : "");
		$out2 .= ($failures > 0 ? "$failures F, " : "");
		$out2 .= ($warnings > 0 ? "$warnings W" : "");
		$out  .= preg_replace("/^(.+), $/","$1",$out2);
	}
	if ($styled)
	{
		$out .= "</a> <a href=\"$link\"><img src=\"/modeling/images/$icon.gif\" alt=\"$icon\"/></a>";
	}

	$replacements = array(
		"SUCCESS / Success" => "SUCCESS",
		"SUCCESS / ..." => "UNKNOWN",
		"FAILURE / FAILED: " => "FAILED"
	);
	foreach ($replacements as $match => $replace)
	{
		if ($out == $match) $out = $replace;
	}

	return $isBuildServer ?
		array(
			str_replace("/modeling/", "http://" . $_SERVER["SERVER_NAME"] . "/modeling/", $out),
			"http://" . $_SERVER["SERVER_NAME"] . $link2,
			"http://" . $_SERVER["SERVER_NAME"] . $link
		) :
		array(
			$out,
			$link2,
			$link
		);
}

function fileFound($PWD, $url, $label) //only used once
{
	global $isBuildServer, $downloadScript, $downloadPre, $PR, $proj, $isTools, $isTech;

	$out = "";
	$mid = "$downloadPre/" . ($isTools ? "tools/$PR" : ($isTech ? "technology/$PR" : "$PR$proj")) . "/downloads/drops/"; // new for www.eclipse.org centralized download.php script
	$md5files = array("$url.md5", preg_replace("#/([^/]+$)#", "/checksum/$1", $url) . ".md5");
	foreach ($md5files as $md5file)
	{
		if (is_file($PWD.$md5file))
		{
			$out .= "<div>" . pretty_size(filesize("$PWD$url")) . " (<a href=\"" . ($isBuildServer ? "" : "http://download.eclipse.org") .
"$mid$md5file\">md5</a>)</div>"; break;
		}
	}
	return $out . "<a href=\"$downloadScript$mid$url\">$label</a>";
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

/* if $styled = 0 or false, return text only */
function getExtraTestsResults($branch, $ID, $styled=1)
{
	global $isBuildServer, $jdk14testsPWD, $jdk50testsPWD, $testsPWD;
	$tests = "";
	$s = array(0 => "");
	$t = array(0 => "");
	if ($isBuildServer && function_exists("getJDKTestResults") && function_exists("getOldTestResults"))
	{
		if (isset($jdk14testsPWD) && $jdk14testsPWD && is_dir($jdk14testsPWD))
		{
			$summary = "";
			$tests = getJDKTestResults("$jdk14testsPWD/", "$branch/$ID/", "jdk14", $summary) . "\n";
			if (!$styled)
			{
				$summary = toPlainTextSummaries($summary);
				$s[0] .= $summary[0];
				$t[0] .= $summary[1];
			}
			else
			{
				$s[] = $summary;
			}
		}
		if (isset($jdk50testsPWD) && $jdk50testsPWD && is_dir($jdk50testsPWD))
		{
			$summary = "";
			$tests .= getJDKTestResults("$jdk50testsPWD/", "$branch/$ID/", "jdk50", $summary) . "\n";
			if (!$styled)
			{
				$summary = toPlainTextSummaries($summary);
				$s[0] .= $summary[0];
				$t[0] .= $summary[1];
			}
			else
			{
				$s[] = $summary;
			}
		}
		if (isset($testsPWD) && $testsPWD && is_dir($testsPWD))
		{
			$summary = "";
			$tests .= getOldTestResults("$testsPWD/", "$branch/$ID/", $summary) . "\n";
			if (!$styled)
			{
				$summary = toPlainTextSummaries($summary);
				$s[0] .= $summary[0];
				$t[0] .= $summary[1];
			}
			else
			{
				$s[] = $summary;
			}
		}
	}
	return array($s, $t, $tests);
}

function toPlainTextSummaries($summary)
{
	global $debug;
	if ($debug > 0) print htmlspecialchars($summary)."<br/>";

	$miniSummary  = "";
	$textSummary  = "";
	// <a href="/modeling/emf/build/log-viewer.php?jdk50test=2.2.4/R200710030400/200710030422/" class="warning">511 W, 3 D</a>
	// <a href="/modeling/emf/build/log-viewer.php?jdk50test=2.2.4/R200710030400/200710030422/"><img src="/modeling/images/check.gif" alt="OK"/></a>
	// <a href="/modeling/emf/build/log-viewer.php?jdk50test=2.4.0/N200712241351/200712241410/">...</a>
	$pattern = "#<a href=\"[^\"]+\?([^\"]+)=([^\"]+)\"(| class=\"[^\"]+\")>([^<]+)</a>#";
	preg_match_all($pattern, $summary, $out, PREG_SET_ORDER);
	/* [1] => jdk50test
	   [2] => /modeling/emf/build/log-viewer.php?jdk50test=2.2.4/R200710030400/200710030422/
       [4] => 511 W, 3 D
    */
    if (sizeof($out) > 0)
    {
	    if ($debug > 0) { print "\n-------1-------\n<br/><pre>"; print_r($out); print "</pre><br/>\n"; }
    	foreach ($out as $set)
    	{
    		$miniSummary .= " [" . strtoupper(str_replace("test", "", $set[1])) . ": " . $set[4] . "]";
    		$textSummary .= strtoupper(str_replace("test", "", $set[1])) . " Test\t" . $set[4] . " (" . str_replace("../../..", "", $set[2]) . "testlog.txt)\n";
    	}
    }

	$patterns = array(
		// <a href="../../../modeling/emf/tests/2.2.4/R200710030400/200710030422/results/svt.html"><img src="/modeling/images/check.gif" alt="OK"/></a>
		"#<a href=\"([^\"]+/results/([^\"]+).html)\"><img src=\"[^\"]+/images/([^\"]+).gif\" alt=\"([^\"]+)\"\/></a>#",

		// <a href="../../../modeling/emf/tests/2.4.0/N200712241351/200712241410/testlog.txt"><img src="/modeling/images/not.gif" alt="FAILED"/></a>
		"#<a href=\"([^\"]+/modeling/emf/(tests)/[^\"]+)\"><img src=\"[^\"]+/images/([^\"]+).gif\" alt=\"([^\"]+)\"\/></a>#",

		// <a href="../../../modeling/emf/tests/2.2.4/R200710030400/200710030432/results/svt.html" class="fail">1 F</a>
		"#<a href=\"([^\"]+/results/([^\"]+).html)\" class=\"[^\"]+\">([^\<]+)</a>#",
	);
	foreach ($patterns as $pattern)
	{
		preg_match_all($pattern, $summary, $out, PREG_SET_ORDER);
		/* [1] => ../../../modeling/emf/tests/2.2.4/R200710030400/200710030422/results/bvt.html
	       [2] => bvt
	       [3] => check
	       [4] => OK
	    */
	    if (sizeof($out) > 0)
	    {
		    if ($debug > 0) { print "\n-------2-------\n<br/><pre>"; print_r($out); print "</pre><br/>\n"; }
	    	foreach ($out as $set)
	    	{
	    		$miniSummary .= " [" . strtoupper($set[2]) . ": " . $set[4] . "]";
	    		$textSummary .= strtoupper($set[2]) . " Test\t" . $set[4] . " (" . str_replace("../../../modeling/emf/tests/", "", $set[1]) . ")\n";
	    	}
	    }
	}

	return array($miniSummary,$textSummary);
}

function outputBuild($branch, $ID, $c)
{
	global $PWD, $isBuildServer, $dls, $filePre, $proj, $sortBy, $projct, $jdk14testsPWD, $jdk50testsPWD, $testsPWD, $deps, $PR;
	$pre2 = (is_dir("$PWD/$branch/$ID/eclipse/$ID/") ? "eclipse/$branch/$ID/" : "");

	$zips_in_folder = loadDirSimple("$PWD/$branch/$ID/", "(\.zip)", "f");
	$ziplabel = (sizeof($zips_in_folder) < 1) ? $ID :
		preg_replace("/(.+)\-([^\-]+)(\.zip)/", "$2", $zips_in_folder[0]); // grab first entry

	// generalize for any relabelled build, thus 2.0.1/M200405061234/*-2.0.2.zip is possible; label = 2.0.2
	$IDlabel = $ziplabel;

	$opts = loadBuildConfig("$PWD/$branch/$ID/build.cfg", $deps);

	$ret = "<li>\n";
	$buildResults = showBuildResults("$PWD/", "$branch/$ID/");
	$extraTestsResults = getExtraTestsResults($branch, $ID);
	$ret .= "<div>" . $buildResults[0] .  join("", preg_replace("/^(.+)$/", "<span>$1</span>", $extraTestsResults[0])) . "</div>";
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

	if (!isset($filePre[$proj]) && isset($filePre["/"]))
	{
		$filePre[$proj] = $filePre["/"];
	}
	if (!isset($filePre[$proj]))
	{
		$topProj = preg_replace("#.+/(.+)#","$1", $PR);
		$filePre[$proj] = $topProj == "emft" ?
			array("emft-" . $projct, "emf-" . $projct) :
			array($topProj . "-" . $projct);
	}
	$ret .= createFileLinks($dls, $PWD, $branch, $ID, $pre2, $filePre[$proj], $ziplabel);

	$ret .= $extraTestsResults[2];
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
	global $isBuildServer, $downloadPre, $PR, $deps, $proj, $projct, $isTools, $isTech;

	$PR2 = ($isTools ? "tools/$PR" : ($isTech ? "technology/$PR" : "$PR")); # to allow for www.eclipse.org/gef/ and download.eclipse.org/tools/gef
	$mid = "$downloadPre/$PR2" . ($proj != "/" ? $proj : "") . "/downloads/drops/";
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
				preg_match("/.+-SDK-(incubation-|)(.+).zip/", $buildfile[$z], $reg);
				if ($reg && is_array($reg) && sizeof($reg) > 0) {
					$vanity = trim(preg_replace("/(\d+\.\d+|\d+\.\d+\.\d+) ([NIMRS]\d+)/","$2",$buildID[$z]));
					if ($vanity != $reg[2])
					{
						$vanity = $reg[2] . " " . $vanity;
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

	$thresh = sizeof($oldrels) > 5 ? ceil(sizeof($oldrels)/3) : 6;
	print "<div class=\"homeitem3col\">\n";
	print "<h3><a name=\"archives\"></a>Archived Releases</h3>\n";
	print "<p>Older " . project_name($proj) . " releases have been moved to archive.eclipse.org, and can be accessed here:</p>";
	print '<table cellspacing="0" cellpadding="0" border="0" style="margin:0"><tr valign="top">'."\n";
	print "<td><ul id=\"archives\">\n";
	$cnt=-1;
	foreach (array_keys($oldrels) as $z)
	{
		$cnt++;
		if ($cnt % $thresh == 0)
		{
			print "</ul></td><td><ul id=\"archives\">\n";
		}
		if (!$z || $oldrels[$z] === null)
		{
			$cnt--; # spacer
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
	print "</td>";
	print "</tr></table>\n";
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
		else if (preg_match("/<testsuite.+failures=\"(\d+)\" errors=\"(\d+)\".+/", $line, $matches))
		{
			return array($matches[2], $matches[1], 0);
		}
		else if (false!==strpos($line,"<testsuites></testsuites>") || false!==strpos($line,"Failed to invoke suite")) // no tests run!
		{
			return array(0, 0, 1);
		}
	}
	return array(0, 0, 0); # Errors, Failures, DNRs
}
?>