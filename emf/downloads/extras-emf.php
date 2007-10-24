<?php

$numzips = isset($numzips) ? $numzips - 2 : 0; // the stand-alone & models zips are new

$testsPWD = "";
$jdk14testsPWD = "";
$jdk50testsPWD = "";
if (isset($isEMFserver) && $isEMFserver)
{
	$testsPWD 	   = "/home/www-data/oldtests";   // path on emf.torolab ONLY
	$jdk14testsPWD = "/home/www-data/jdk14tests"; // path on emf.torolab ONLY
	$jdk50testsPWD = "/home/www-data/jdk50tests"; // path on emf.torolab ONLY
}

$NLpacks = array(
	"2.2.x" => "NLS2.2.x",
	"2.1.x" => "NLS2.1.x",
	"2.0.x" => "NLS2.0.x"
);

$oldrels = array(
    "2.3.0" => "200706262000",
	"2.2.3" => "200705141058",
	"2.2.2" => "200702131851",
	"2.2.1" => "200609210005",
	"2.2.0" => "200606271057",
	"2.1.2" => "200601191349",
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

function doRequirements()
{
	global $PR,$projct;
	if (!isset($projct) || !$projct) { $projct = "emf"; }
	$isUpdate = strpos($_SERVER["PHP_SELF"],"/updates/")!==false;
	$reqNotePrefix = $isUpdate ? "/$PR/downloads/?project=$projct" : ""; 
?>
<div class="homeitem3col">
	<h3>Getting Started</h3>
		<p style="padding-left:10px"><b>First-time users</b> can get started quickly by simply downloading the latest
		<b style="color:green">All-In-One SDK</b> bundle, which includes source, runtime and docs
		for EMF, SDO, and <a href="http://eclipse.org/modeling/mdt/downloads/index.php?project=xsd&showAll=0&showMax=5">XSD</a> (now part of the <a href="http://eclipse.org/modeling/mdt/?project=xsd">MDT</a> project).
		<?php echo $isUpdate ? "" : 'Or, use Eclipse\'s <a href="/'.$PR.'/updates/">Update Manager</a>. '; ?> See also the <a href="http://wiki.eclipse.org/index.php/EMF-FAQ#What_version_of_Eclipse_do_I_need_for_EMF.2C_SDO_and_XSD.3F_Which_EMF_version_will_run_on_my_Eclipse_version.3F">FAQ</a> &amp; <a href="http://wiki.eclipse.org/index.php/EMF_2.3_JVM_Requirements">JVM Reqs</a>.</p>
		
	<h2 style="padding-left:10px">Minimum Requirements</h2>
	<table cellpadding="2" cellspacing="4" border="0" style="padding-left:10px">
	<tr align="left"><th>EMF</th><th><a href="http://download.eclipse.org/eclipse/downloads/">Eclipse</a><a href="<?php echo $reqNotePrefix; ?>#req_note_1">*</a></th><th>Java</th>
		<th>Notes</th>
	</tr>
	<tr><td>2.4</td><td>3.4</td><td>5.0</td>
		<td rowspan="5" valign="top">
			<ul>
				<li style="border:0;padding:1px"><a name="req_note_1">*</a> Eclipse is only required for EMF's tools. 
					For runtime-only use, only a JRE is required.</li>
				<li style="border:0;padding:1px"><a name="req_note_2">**</a> EMF 2.3.x contains significant, though binary compatible, 
					<a href="http://www.eclipse.org/modeling/emf/docs/#whatsnew">changes from previous releases</a>.</li>
				<li style="border:0;padding:1px"><a name="req_note_3">***</a> If you are using Sun's 1.4 JRE, please see 
					<a href="http://www.eclipse.org/modeling/emf/downloads/install.php">this note</a>.</li>
			</ul>
		</td>
	</tr>
	<tr><td>2.3<a href="<?php echo $reqNotePrefix; ?>#req_note_2">**</a></td><td>3.3</td><td>5.0</td></tr>
	<tr><td>2.2</td><td>3.2</td><td>1.4.2<a href="<?php echo $reqNotePrefix; ?>#req_note_3">***</a></td></tr>
	<tr><td>2.1</td><td>3.1</td><td>1.4.2<a href="<?php echo $reqNotePrefix; ?>#req_note_3">***</a></td></tr>
	<tr><td>2.0</td><td>3.0</td><td>1.3.1</td></tr>
	</table>
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
			<ul id="lang2_2" style="display: none">
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
					doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder, true); ?>
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
					doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder, true); ?>
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
	$tests = ($type == "jdk50" ? array("build", "junit") : array("build", "junit", "standalone"));
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
			$cnt = ($type == "jdk50" ? getJDK50TestResultsFailureCount($f, $t) : getJDK14TestResultsFailureCount($f, $t));
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
				$linksty = preg_match("/[EF]/", $cnt) ? " class=\"fail\"" :
					(preg_match("/[W]/", $cnt) ? " class=\"warning\"" :
						" class=\"success\"");
				$stat = "<a href=\"$testlog\"$linksty>$cnt</a>";
			}
		}
		else // if we failed on the build, the JUnit stuff won't run (if javacFailOnError=true in runJDK14Tests.xml)
		{
			$stat = "<a href=\"$testlog\"><img src=\"/modeling/images/question.gif\" alt=\"Did Not Run - Previous Test Failed!\"/></a>";
		}
		$ret .= "<li" . ($sty != "" ? " class=\"$sty\"" : "") . "><div>$stat</div>" . preg_replace("/^(.)/e", "chr(ord(\"$1\")-32)", $t) . "</li>\n";

		$status .= " $stat";
	}

	global $isEMFserver;
	$tmp = preg_replace("/^(.+?)(\d)(\d)$/e", "strtoupper(\"$1\") . \" $2.$3\"", $type) . " Tests";
	if (is_file("$testsPWD$path$testDirs[0]/testlog.txt"))
	{
		$tmp = "<a href=\"" . ($isEMFserver ? "/$PR/build/log-viewer.php?${type}test=$path$testDirs[0]/" : "$pre$mid$path$testDirs[0]/testlog.txt") . "\"$linksty>$tmp</a>";
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
			$linksty = " class=\"fail\"";
			$stat = " <a href=\"$testlog\"$linksty>$cnt F</a> ";
		}
		$ret .= "<li" . ($sty != "" ? " class=\"$sty\"" : "") . "><div>$stat</div>" . strtoupper($t) . "</li>\n";

		$status .= $stat;
	}

	global $isEMFserver;
	$tmp = "Old Tests";
	if (is_file("$testsPWD$path$testDirs[0]/testlog.txt"))
	{
		$tmp = "<a href=\"" . ($isEMFserver ? "/$PR/build/log-viewer.php?test=$path$testDirs[0]/" : "$pre$mid$path$testDirs[0]/testlog.txt") . "\"$linksty>$tmp</a>";
	}
	return "<li>$tmp<ul>$ret</ul></li>";
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
			$f = file_get_contents($file);
			$regs = null;
			$num = preg_match_all("/>failed</", $f, $regs);
		}
	}
	return $num;
}
?>
