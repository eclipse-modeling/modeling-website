<?php

$numzips = $numzips - 2; // the stand-alone & models zips are new

$testsPWD = "";
$jdk13testsPWD = "";
$jdk14testsPWD = "";
$jdk50testsPWD = "";
if ($isEMFserver)
{
	$testsPWD 	   = "/home/www-data/oldtests";   // path on emf.torolab ONLY
	$jdk13testsPWD = "/home/www-data/jdk13tests"; // path on emf.torolab ONLY
	$jdk14testsPWD = "/home/www-data/jdk14tests"; // path on emf.torolab ONLY
	$jdk50testsPWD = "/home/www-data/jdk50tests"; // path on emf.torolab ONLY
}

$NLpacks = array(
	"2.2.x" => "NLS2.2.x",
	"2.1.x" => "NLS2.1.x",
	"2.0.x" => "NLS2.0.x"
);

$oldrels = array(
	"2.2.2" => "200702131851",
	"2.2.1" => "200609210005",
	"2.2.0" => "200606271057",
	"2.1.1" => "200509281310",
	"2.1.0" => "200507070200",
	"2.0.5" => "200511291418",
	"2.0.4" => "200509300951",
	"2.0.3" => "200506091052",
	"2.0.2" => "200503151315",
	"2.0.1" => "200409171617",
	"2.0.0" => "200406280827",
	"1.x" => array("2003","http://www.eclipse.org/modeling/emf/downloads/dl-emf1x.html")
);

function doBleedingEdge ()
{
	print '<div class="sideitem">'."\n". '<h6>The Bleeding Edge</h6>';
	getNews(4, "bleedingedge", null, true);
	print ' <ul>
				<li><a href="../docs/#whatsnew">More from the Edge</a></li>
			</ul>
		</div>
	';	
}

function requirementsNote()
{ ?>
<div class="homeitem3col">
<h3>Usage notes</h3>
<ul>
	<li><i><b>Please note:</b></i><a name="emfruntimenote">&#160;</a>Use of XSD requires the EMF Runtime (RT) Package, or the complete SDK.</li>
	<li><i><b>Please note:</b></i><a name="xsdruntimenote">&#160;</a>Use of XML Schema (XSD) models with EMF or SDO, requires the XSD Runtime (RT) Package, or the complete SDK.</li>
</ul>
</div>
<?php }

function doRequirements()
{
?>
<div class="homeitem3col">
	<h3>Requirements</h3>
	<p><b>First-time users</b> can get started quickly by simply downloading the
	<b style="color:green">All-In-One SDK</b> bundle (includes source, runtime and docs
	for <b class="emf">EMF</b>, <b class="xsd">XSD</b>, and <b class="sdo">SDO</b>).
	Specific build dependencies and JDK version used for a given release are shown
	<?php print strpos($_SERVER["PHP_SELF"],"/updates/")!==false ? 'on the <a href="/modeling/emf/downloads/">downloads</a> page' : 'below'; ?> - 
	under <b>Build Dependencies</b>. </p>
	<p>Note that Eclipse is only required if you intend to use the UI - for runtime-only use, only a JDK is required.</p>

	
	<ul id="requirements">
		<li>
			<div align="right">
			<table width="310" border="0" cellspacing="1" cellpadding="1">
				<tr valign="top">
					<td><img src="/modeling/images/new.gif" border="0" align="left" valign="top"/></td>
					<td><table style="border:0px" cellspacing="0" cellpadding="2"><tr><td>EMF 2.3.0 contains significant, though binary  
			compatible, changes from previous releases. See <a href="http://www.eclipse.org/modeling/emf/docs/#whatsnew">The Bleeding Edge</a> for details (also at right).</td></tr></table></td>
				</tr>
			</table>
			</div>
			<a href="javascript:toggle('req2_3_0')">EMF 2.3.0</a>
			<ul id="req2_3_0">
				<li>Eclipse 3.3.0</li>
				<li>Java 5.0</li>
			</ul>
		</li>

		<li>
			<a href="javascript:toggle('req2_2_0')">EMF 2.2.4-2.2.2, 2.2.1, 2.2.0</a>
			<ul id="req2_2_0" style="display: none">
				<li>Eclipse 3.2.2, 3.2.1 or 3.2.0</li>
				<li>Java 1.4.2 or 5.0 - if Sun 1.4.2, <a href="/modeling/emf/downloads/install.php">click here</a>.</li>
			</ul>
		</li>

		<li>
			<a href="javascript:toggle('req2_1_0')">EMF 2.1.2, 2.1.1, 2.1.0</a>
			<ul id="req2_1_0" style="display: none">
				<li>Eclipse 3.1.2, 3.1.1, 3.1.0, respectively</li>
				<li>Java 1.4.2 - if Sun, <a href="/modeling/emf/downloads/install.php">click here</a>.</li>
			</ul>
		</li>

		<li>
			<a href="javascript:toggle('req2_0_0')">EMF 2.0.5-2.0.2, 2.0.1, 2.0.0</a>
			<ul id="req2_0_0" style="display: none">
				<li>Eclipse 3.0.2, 3.0.1, 3.0.0, respectively</li>
				<li>Java 1.4.2 - if Sun, <a href="/modeling/emf/downloads/install.php">click here</a>.</li>
			</ul>
		</li>

		<li>
			<a href="javascript:toggle('req1_x')">EMF 1.x</a>
			<ul id="req1_x" style="display: none">
				<li>Eclipse 2.x</li>
				<li>Java 1.3.1</li>
			</ul>
		</li>
	</ul>
</div>

<?php
}

function doLanguagePacks()
{
	global $downloadScript, $downloadPre; ?>
<div class="homeitem3col">
	<a name="NLS"></a>
	
	<h3>Language Packs</h3>

	<p>IBM is pleased to contribute translations for the Eclipse Modeling Framework.</p>
	<ul>
		<li>
			<a href="javascript:toggle('lang2_2')">2.2.x Language Packs</a><a name="NLS2.2.x"></a>
			<ul id="lang2_2">
					<?php
					$packs = array (
						"2.2.x NLS Translation Packs" => "NLpacks-"
					);
					$cols = array (
						"EMF, SDO" => "emf-sdo"
					);
					$subcols = array (
						"2.2.1 SDK" => "SDK-2.2.1",
						"2.2.1 Runtime" => "runtime-2.2.1",
						"2.2.0 SDK" => "SDK-2.2",
						"2.2.0 Runtime" => "runtime-2.2"
					);
					$packSuf = ".zip";
					$folder = "NLS/2.2/";
					doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder); ?>
				<li>
					<p>The language packs contain the following translations:</p>
					<ul>
						<li>NLpack1 - German, Spanish, French, Italian, Japanese, Korean, Portuguese (Brazil), Traditional Chinese, Simplified Chinese</li>
						<li>NLpack2 - Czech, Hungarian, Polish, Russian</li>
						<li>NLpack2a - Danish, Dutch, Finnish, Greek, Norwegian, Portuguese, Swedish and Turkish</li>
						<li>NLpackBidi - Arabic</li>
					</ul>
					<p>Each language pack zip contains 4 other zips (one for each of the language groups above). Unpack these zips into your Eclipse directory before starting Eclipse.</p>
					<p>These translations are based on EMF 2.2.1 and 2.2.0, respectively.</p>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:toggle('lang2_1')">2.1.x Language Packs</a><a name="NLS2.1.x"></a>
			<ul id="lang2_1" style="display: none">
					<?php
					$packs = array (
						"2.1.x NLS Translation Packs" => "NLpacks-"
					);
					$cols = array (
						"EMF, SDO" => "emf-sdo"
					);
					$subcols = array (
						"SDK" => "SDK-",
						"Runtime" => "runtime-"
					);
					$packSuf = "2.1.zip";
					$folder = "NLS/2.1/";
					doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder); ?>
				<li>
					<p>The language packs contain the following translations:</p>
					<ul>
						<li>NLpack1 - German, Spanish, French, Italian, Japanese, Korean, Portuguese (Brazil), Traditional Chinese, Simplified Chinese</li>
						<li>NLpack2 - Czech, Hungarian, Polish, Russian</li>
						<li>NLpackBidi - Arabic</li>
					</ul>
					<p>Each language pack zip contains 6 other zips (two for each of the language groups above: an NLS translation fragment pack and a feature overlay). Unpack both these zips (for every language group you need) into your Eclipse directory before starting Eclipse. In particular, the feature overlay must actually write into the existing feature directories.</p>
					<p>These translations are based on EMF 2.1.1. The NLS translation fragment packs should work with all subsequent 2.1 maintenance releases, with any new strings remaining untranslated. The feature overlays will need to be reissued for each subsequent release.</p>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:toggle('lang2_0')">2.0.x Language Packs</a><a name="NLS2.0.x"></a>
			<ul id="lang2_0" style="display: none">
					<?php
					$packs = array (
						"2.0.x NLS Translation Packs" => "NLpacks-",
					);
					$cols = array (
						"EMF, SDO" => "emf-sdo"
					);
					$subcols = array (
						"SDK" => "SDK-",
						"Runtime" => "runtime-"
					);
					$packSuf = "2.0.zip";
					$folder = "NLS/2.0/";
					doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder, true); ?>
				<li>
					<p>The language packs contain the following translations:</p>
					<ul>
						<li>NLpack1 - German, Spanish, French, Italian, Japanese, Korean, Portuguese (Brazil), Traditional Chinese, Simplified Chinese</li>
						<li>NLpack2 - Czech, Hungarian, Polish, Russian</li>
					</ul>
					<p>Each language pack zip contains 2 zips (one for each of the language groups above). Each language pack is distributed as a feature which you can install by downloading the zip file, unzipping it into your Eclipse directory and restarting Eclipse.</p>
					<p>These translations are based on the EMF, SDO and XSD 2.0.2 builds but should work with all subsequent 2.0 maintenance releases. If new strings are added to EMF, SDO or XSD after 2.0.2, they will not show up as translated in the 2.0.x stream when you install this language pack.</p>
				</li>
			</ul>
		</li>
	</ul>
</div>

<?php }

function getJDKTestResults($testsPWD, $path, $type, &$status) //type is "jdk50" or "jdk14"
{
	global $pre, $isEMFserver, $PR;
	$mid = "../../../$PR/${type}tests/"; // this is a symlink on the filesystem!

	// one <li> per test. if all passed, green check + link to log; if failures, red number (of failures) + link to log
	// $testsPWD is path to root of tests; $path defines 2.0/I200405501234/ ... also need to then check subdirs

	$ret = "";
	$tests = ($type == "jdk50" || $type == "jdk13" ? array("build", "junit") : array("build", "junit", "standalone"));
	$testDirs = array();
	if (is_dir($testsPWD . $path) && is_readable($testsPWD . $path))
	{
		$testDirs = loadDirSimple($testsPWD . $path, "\d{12}", "d"); // get dirs
		rsort($testDirs);
		reset($testDirs);
	}

	if (!isset($testDirs[0]) || !is_file("$testsPWD$path$testDirs[0]/testlog.txt"))
	{
		return;
	}

	$file = "$testsPWD$path$testDirs[0]/testlog.txt";

	$f = (is_file($file) && is_readable($file) ? file($file) : array());

	$cnt = 0;
	foreach ($tests as $t)
	{
		$stat = "";
		$sty = "";
		$linksty = "";
		$testlog = ($isEMFserver ? "/$PR/build/log-viewer.php?${type}test=$path$testDirs[0]/" : "$pre$mid$path$testDirs[0]/testlog.txt");
		if ($cnt === 0 || preg_match("/^[^EFP]+$/", $cnt)) // nothing, or no E or F or P
		{
			$cnt = ($type == "jdk50" ? getJDK50TestResultsFailureCount($f, $t) : 
					($type == "jdk14" ? getJDK14TestResultsFailureCount($f, $t) : getJDK13TestResultsFailureCount($f, $t) ));
			if ($cnt === "...") //not done (yet)
			{
				$stat = "<a href=\"$testlog\">...</a>";
			}
			else if ($cnt === "") //empty log file
			{
				$stat = "empty log";
			}
			else if (preg_match("/FAILED/", $cnt)) //build failed
			{
				$stat = "<a href=\"$testlog\"><img src=\"/modeling/images/not.gif\" alt=\"BUILD FAILED!\"/></a>";
			}
			else if ($cnt === 0) //all passed, 0 F, E, and N
			{
				$stat = "<a href=\"$testlog\"><img src=\"/modeling/images/check.gif\" alt=\"Passed!\"/></a>";
			}
			else //something else
			{
				$sty = (preg_match("/[EF]/", $cnt) ? "errors" : "warnings");
				$linksty = preg_match("/[EF]/", $cnt) ? "style=\"font-weight:bold;color:red\" " : "";
				$stat = "<a " . $linksty . "href=\"$testlog\">$cnt</a>";
			}
		}
		else // if we failed on the build, the JUnit stuff won't run (if javacFailOnError=true in runJDK14Tests.xml)
		{
			$stat = "<a " . $linksty . "href=\"$testlog\"><img src=\"/modeling/images/question.gif\" alt=\"Did Not Run - Previous Test Failed!\"/></a>";
		}
		$ret .= "<li" . ($sty != "" ? " class=\"$sty\"" : "") . "><div>$stat</div>" . preg_replace("/^(.)/e", "chr(ord(\"$1\")-32)", $t) . "</li>\n";

		$status .= " ".$stat;
	}

	global $isEMFserver;
	$tmp = preg_replace("/^(.+?)(\d)(\d)$/e", "strtoupper(\"$1\") . \" $2.$3\"", $type) . " Tests";
	if (is_file("$testsPWD$path$testDirs[0]/testlog.txt"))
	{
		$tmp = "<a  " . $linksty . "href=\"" . ($isEMFserver ? "/$PR/build/log-viewer.php?${type}test=$path$testDirs[0]/" : "$pre$mid$path$testDirs[0]/testlog.txt") . "\">$tmp</a>";
	}

	return "<li>$tmp<ul>$ret</ul></li>";
}

function getOldTestResults($testsPWD, $path, &$status) // given a build ID, determine any test results for BVT, FVT, SVT
{
	global $pre, $isEMFserver, $PR;
	$mid = "../../../$PR/tests/"; // this is a symlink on the filesystem!

	// $testsPWD is path to root of tests; $path defines 2.0/I200405131234/ ... also need to then check subdirs

	$ret = "";
	$tests = array("bvt", "fvt", "svt");
	$testDirs = array();
	if (is_dir($testsPWD . $path) && is_readable($testsPWD . $path))
	{
		$testDirs = loadDirSimple($testsPWD . $path, "\d{12}", "d"); // get dirs
		rsort($testDirs);
		reset($testDirs);
	}
	if (!isset($testDirs[0]) || !is_file("$testsPWD$path$testDirs[0]/testlog.txt"))
	{
		return;
	}

	$logs = array();
	foreach ($tests as $t)
	{
		if (is_file("$testsPWD$path$testDirs[0]/results/$t.html"))
		{
			$logs[$t] = "results/$t.html";
		}
	}
	
	if (sizeof($logs) < 1)
	{
		$logs["..."] = "testlog.txt";
	}
	foreach ($logs as $t => $log)
	{
		$stat = "";
		$sty = "";
		$linksty = "";
		$cnt = getTestResultsFailureCount($testsPWD . $path, $testDirs, $log);
		$testlog = "$pre$mid$path$testDirs[0]/$log";
		if ($cnt === "")
		{
			$stat = "<a href=\"" . ($isEMFserver ? "/$PR/build/log-viewer.php?test=$path$testDirs[0]/" : "$pre$mid$path$testDirs[0]/testlog.txt") . "\">...</a> ";
		}
		else if (preg_match("/FAILED/", $cnt)) //build failed
		{
			$stat = "<a href=\"$testlog\"><img src=\"/modeling/images/not.gif\" alt=\"BUILD FAILED!\"/></a>";
		}
		else if ($cnt === 0)
		{
			$stat = "<a href=\"$testlog\"><img src=\"/modeling/images/check.gif\" alt=\"Passed!\"/></a>";
		}
		else
		{
			$sty = "errors"; // it's always a failure here (see below)
			$linksty = "style=\"font-weight:bold;color:red\" ";
			$stat = " <a " . $linksty . "href=\"$testlog\">$cnt F</a> ";
		}
		$ret .= "<li" . ($sty != "" ? " class=\"$sty\"" : "") . "><div>$stat</div>" . strtoupper($t) . "</li>\n";

		$status .= $stat;
	}

	global $isEMFserver;
	$tmp = "Old Tests";
	if (is_file("$testsPWD$path$testDirs[0]/testlog.txt"))
	{
		$tmp = "<a " . $linksty . "href=\"" . ($isEMFserver ? "/$PR/build/log-viewer.php?test=$path$testDirs[0]/" : "$pre$mid$path$testDirs[0]/testlog.txt") . "\">$tmp</a>";
	}
	return "<li>$tmp<ul>$ret</ul></li>";
}

function getJDK13TestResultsFailureCount($f, $type = "")
{
	$issues = array("fail" => 0, "error" => 0, "note" => 0, "deprecate" => 0); //counts
	$steps = array(1 => "/runJUnitTests:/"); //possible steps and delimiters
	$parse = array(
		0 => array("type" => "build", "regex" => array("/\[javac\] (\d+) (fail|error)/", "/\[javac\].+(deprecate)/")),
		1 => array("type" => "junit", "regex" => array("/\[java\] There (?:was|were) (\d+) (fail|error)/")),
		2 => array("type" => "standalone", "regex" => array("/\[java\] There (?:was|were) (\d+) (fail|error)/"))
	);

	return getGenericTestResultsFailureCount($f, $type, $issues, $steps, $parse);
}

function getJDK14TestResultsFailureCount($f, $type = "")
{
	$issues = array("fail" => 0, "error" => 0, "note" => 0, "deprecate" => 0); //counts
	$steps = array(1 => "/runJUnitTests:/", 2 => "/runStandAloneJUnitTests:/"); //possible steps and delimiters
	$parse = array(
		0 => array("type" => "build", "regex" => array("/\[javac\] (\d+) (fail|error)/", "/\[javac\].+(deprecate)/")),
		1 => array("type" => "junit", "regex" => array("/\[java\] There (?:was|were) (\d+) (fail|error)/")),
		2 => array("type" => "standalone", "regex" => array("/\[java\] There (?:was|were) (\d+) (fail|error)/"))
	);

	return getGenericTestResultsFailureCount($f, $type, $issues, $steps, $parse);
}

function getJDK50TestResultsFailureCount($f, $type = "")
{
	$issues = array("fail" => 0, "error" => 0, "warning" => 0, "note" => 0, "deprecate" => 0); //counts
	$steps = array(1 => "/runJunitTests:/"); //possible steps and delimiters
	$parse = array(
		0 => array("type" => "build", "regex" => array("/\[javac\] (\d+) (fail|error|warning)/", "/\[javac\].+(deprecate)/")),
		1 => array("type" => "junit", "regex" => array("/\[java\] There (?:was|were) (\d+) (fail|error)/"))
	);

	return getGenericTestResultsFailureCount($f, $type, $issues, $steps, $parse);
}

/* TODO: investigate if lines with "fail" also have "error" in them, if not, then the old version was letting them slip through and was most likely a bug */
function getGenericTestResultsFailureCount($f, $type, $issues, $steps, $parse)
{
	$step = 0;
	$failed = false;
	$isDone = false;

	if (sizeof($f) == 0)
	{
		return "";
	}

	foreach ($f as $line)
	{
		$m = null;
		foreach (array_keys($steps) as $z)
		{
			if (preg_match($steps[$z], $line))
			{
				$step = $z;
			}
		}

		if (preg_match("/BUILD FAILED/", $line))
		{
			$failed = true;
			$isDone = true;
			break;
		}

		foreach (array_keys($parse) as $z)
		{
			if ($step == $z && $type == $parse[$z]["type"])
			{
				foreach ($parse[$z]["regex"] as $y)
				{
					if (preg_match($y, $line, $m))
					{
						if (sizeof($m) == 2) //1 match
						{
							$issues[$m[1]]++;
						}
						else if (sizeof($m) == 3) //2 matches
						{
							$issues[$m[2]] += $m[1];
						}
					}
				}
			}
		}

		if (preg_match("/finished on:/", $line))
		{
			$isDone = true;
		}
	}

	if (!$isDone)
	{
		return "...";
	}

	return parseIssues($issues, $failed);
}

function parseIssues($issues, $failed)
{
	$count = array_sum($issues);

	if ($count == 0 && !$failed)
	{
		return 0;
	}
	else
	{
		$items = array();
		foreach (array_keys($issues) as $z)
		{
			if ($issues[$z] > 0)
			{
				$items[] = $issues[$z] . " " . strtoupper(substr($z, 0, 1));
			}
		}

		if (sizeof($items) == 0 && $failed)
		{
			return "FAILED";
		}
		return join(", ", $items);
	}
}

function getTestResultsFailureCount($path, $testDirs, $file)
{
	$num = "";
	$file = "$path$testDirs[0]/$file";
	
	if (preg_match("/testlog\.txt/", $file))
	{
		$num = (grep("/BUILD FAILED/", $file) ? "FAILED" : "");
	}
	else
	{
		if (is_file($file) && is_readable($file))
		{
			$f = file_contents($file);
			$regs = null;
			$num = preg_match_all("/>failed</", $f, $regs);
		}
	}
	return $num;
}
?>
