<?php
/**
 * MUST DEFINE ARRAYS IN ORDER TO INCLUDE THIS PAGE:
 * 
 * 	$emails = array (
		"emf" => "codeslave@ca.ibm.com,emerks@ca.ibm.com,marcelop@ca.ibm.com,davidms@ca.ibm.com,khussey@ca.ibm.com,walkerp@us.ibm.com"
	);
	$users = array (// runs as, access IES map file repo as, ssh as
		"emf" => array (
			"nickb@emf.torolab.ibm.com",
			"nickb",
			"nboldt"
		)
	);
 */
 
 // TODO: migrate function in EMF/UML2 promo page to here

# $PR = "modeling/mdt";
# $proj = "/uml2"; 
# $projct = "uml2";

require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
$App = new App();
$Nav = new Nav();
$Menu = new Menu();
include ($App->getProjectCommon());
internalUseOnly();

// temporarily suppress unsupported projects
$nodownloads = array ("xsd");  

ob_start();

$debugb = isset ($_GET["debugb"]) ? 1 : 0;
$previewOnly = isset ($_GET["previewOnly"]) ? 1 : 0;

$projctFromPath = getProjectFromPath($PR);
if (is_array($projects))
{
	$projectArray = getProjectArray($projects, $extraprojects, $nodownloads, $PR);
	$tmp = array_keys($projectArray);

	$proj = "/" . (isset ($_GET["project"]) && preg_match("/^(?:" . join("|", $projects) . ")$/", $_GET["project"]) ? $_GET["project"] : $projctFromPath);
}
else
{
	$proj = "";
}

$projct = preg_replace("#^/#", "", $proj);

if ($projct != $projctFromPath && is_dir($_SERVER['DOCUMENT_ROOT'] . "/" . $PR . $proj . "/build/"))
{
	header("Location: /" . $PR . $proj . "/build/promo.php");
}

print "<div id=\"midcolumn\">\n";
print "<h1>Promoting MDT</h1>\n";

if (is_array($projects) && sizeof($projects) > 1)
{
	print doSelectProject($projectArray, $proj, $nomenclature, "homeitem3col", $showAll, $showMax, $sortBy);
}
?>

<div class="homeitem3col">
<h3>Promote A Build</h3>

<?php


if (!isset ($_POST["process"]) || !$_POST["process"] == "build")
{ // page one, the form
	print "<p>To promote, please complete the following form and click the Promote button.</p>";
}
else
{
	print "<p>Your promotion is " . ($previewOnly ? "<b>NOT</b> " : "") . "in progress" . ($previewOnly ? ", but the command is displayed below for preview" : "") .
	". <a href=\"?z" . ($debugb ? "&amp;debugb=1" : "") . ($previewOnly ? "&amp;previewOnly=1" : "") . "\">Promote another?</a></p>";
}
?>

<p>
<?php

$workDir = "/home/www-data/build/";

if (!isset ($options))
{
	$options = array ();
}
else
{
	$options["BranchIES"] = array (
		"HEAD",
		"R3_2_maintenance"
	);
}

/** done customizing, shouldn't have to change anything below here **/

//print "Branches:"; print_r($options["Branch"]);
$buildIDs = array ();
$buildIDs2 = array ();

foreach ($options["BranchAndJDK"] as $br)
{

	$bits = explode("=", $br);
	$BR = $bits[0];
	// define which build types to show:
	$dir = "$workDir$PR/$projct/downloads/drops/$BR";
	if (is_dir($dir))
	{
		$buildIDs = loadDirSimple($dir, "([MISR]+\d{12})", "d"); // include N builds
		foreach ($buildIDs as $k => $bid)
		{
			if (is_dir($dir . "/$bid/testresults/xml"))
			{ // no point adding them to the list if there's no data available!
				$buildcfgs = getBuildConfig("$dir/$bid/");
				if ($buildcfgs["branch"]) // looking in build.cfg for "branch=..."
				{
					$buildIDs2[substr($bid, 1) . substr($bid, 0, 1)] = $BR . "/" . $bid . " | " . (isset($buildcfgs["branchCVS"]) ? $buildcfgs["branchCVS"] : $buildcfgs["branch"]);
				}
			}
		}
	}
}

$buildIDs = $buildIDs2;
if (sizeof($buildIDs) < 1)
{
	$buildIDs = array (
		"No builds found!"
	);
}
krsort($buildIDs);
reset($buildIDs);

if (!isset ($_POST["process"]) || !$_POST["process"] == "build")
{ // page one, the form
?>

<table>
	<form method=POST name="promoForm">
			<input type="hidden" name="process" value="build" />
			<tr>
				<td>&#160;</td>
				<td><b>Build Version, ID &amp; Branch</b></td>
				<td>&#160;</td>
				<td colspan=2>
				<select style="font-size:9px" name="build_Version_Build_ID_And_Branch" size="8">
					<?php displayOptions($buildIDs,false,0); ?>
				</select></td>
			</tr>

			<tr valign="top">
				<td>&#160;</td>
				<td><b>Options</b><br><small></small></td>
				<td>&#160;</td>
				<td colspan="2">
				<?php if (isIES()) { ?>
				<p><input type="checkbox" name="build_Update_IES_Map_File" value="Yes" checked="checked"> Update IES Map File? 
				<small><select style="font-size:9px" name="build_IES_CVS_Branch" size="1">
					<?php displayOptions($options["BranchIES"],false,0); ?>
				</select></small></p>
				<?php } ?>
				<p><input type="checkbox" name="build_Announce_In_Newsgroup" value="Yes" checked="checked"> Announce In Newsgroup?</p>
				<p><input type="checkbox" name="build_Update_Coordinated_Update_Site" value="Yes"> Update Coordinated Update Site? 
				<small><select style="font-size:9px" name="build_Coordinated_Site_Name" size="1">
					<?php displayOptions(array("europa","callisto"),false,0); ?>
				</select></small></p>
				<!-- TODO: implement this in promoteToEclipse.sh for MDT builds -->
				<!-- <p><input type="checkbox" name="build_Close_Bugz_Only" value="Yes" onclick="doOnclickBugzonly(this.checked)"> Move Assigned Bugs to Fixed? (-bugzonly)</p> -->
				</td>
			</tr>

			<tr>
				<td>&#160;</td>
				<td><b>Email Address</b><br><small>optional</small></td>
				<td>&#160;</td>
				<td><input name="build_Email" size=25 value="<?php echo $options["EmailDefault"]; ?>"></td>
				<td><small>If you would like to be<br>notified when promotion done</small></td>
			</tr>

			<tr>
				<td>&#160;</td>
				<td colspan=5><p><b>Note</b>: Please ensure the build you intend to promote was done using the <br/>
				<a target="_check" class="highlight" href="/<?php echo $PR; ?>/<?php echo $projct; ?>/build/">latest (or appropriate) driver(s)</a>, 
				and that the <a target="_check" href="/<?php echo $PR; ?>/downloads/?project=<?php echo $projct; ?>&amp;sortBy=date&amp;hlbuild=0#latest" class="highlight">all tests have passed</a>.</p>
				
				<p><b>When done, don't forget to change any ASSIGNED bugzillas to FIXED.</b></p>

				</td>
			</tr>
			<tr>
				<td>&#160;</td>
				<td colspan=2 align=center><input type="button" value="<?php print $previewOnly?"Preview Only":"Promote"; ?>" onclick="doSubmit()"></td>
			</tr>
			<tr>
				<td>&#160;</td>
			</tr>
	</form>
</table>
<script language="javascript">
function doSubmit() {
	answer = true;
	with (document.forms.promoForm) { 
		if (build_Version_Build_ID_And_Branch.options[build_Version_Build_ID_And_Branch.selectedIndex].value.indexOf("N")==0) {
			answer = confirm(
				'Are you sure you want to promote a Nightly build?');
			if (answer) { build_Version_Build_ID_And_Branch.focus(); }
		}
	}
	if (answer) { 
			document.forms.promoForm.submit();
	} else {
		// do nothing...
	}
}

function doOnclickBugzonly(booln) {
	with (document.forms.promoForm) {
		build_Update_IES_MAP_File.disabled=booln;
		build_IES_CVS_Branch.disabled=booln;
		build_Announce_In_Newsgroup.disabled=booln;
		build_Update_Coordinated_Update_Site.disabled=booln;
		build_Coordinated_Site_Name.disabled=booln;
		build_Email.disabled=booln;
	} 
}

onload=loadSelects;

function loadSelects() {
	with (document.forms.promoForm) { 
		build_Version_Build_ID_And_Branch.selectedIndex=0;
	}
}
</script>
<?php
}
else
{ // page two, form submission results

	$BR = explode(" | ", $_POST["build_Version_Build_ID_And_Branch"]);
	$cvsbranch = $BR[1];
	$BR = explode("/", $BR[0]);
	$ID = $BR[1];
	$BR = $BR[0];
	// echo "got: cvsbranch: $cvsbranch, ID: $ID, BR: $BR<br/>";

	$logdir = "/home/www-data/promo_logs/";
	$logfile = "promo_log_" . ($_POST["build_Close_Bugz_Only"] != "" ? 'bugzonly_' : '') . $BR . "." . $ID . "_" . date("YmdHis") . ".txt";

	if (!$previewOnly)
	{
		print '<p>Logfile is '.$logdir.$logfile.'</p>';
	}
?>
	<ul>
		<li><a href="/<?php print $PR; ?>/downloads/?project=<?php print $projct; ?>&amp;sortBy=date&amp;hlbuild=0#latest">You can view, explore, or download your build here</a>.
			Here's what you submitted:</li>
<?php
		print "<ul>\n";
		foreach ($_POST as $k => $v)
		{
			if (strstr($k, "build_") && trim($v) != "" && !strstr($k, "_Sel"))
			{
				$lab = str_replace("_", " ", substr($k, 6));
				$val = false !== strpos($v, ",") ? explode(",", $v) : $v;

				print "<li>";
				print (is_array($val) ? "<b>" .
				$lab . ":</b>" . "<ul>\n<li>" . join("</li>\n<li>", $val) . "</li>\n</ul>\n" : "<div>" .
				$val . "</div>" . "<b>" . $lab . ":</b>");
				print "</li>\n";
			}
		}
		print "<li><div>" . $_SERVER["REMOTE_ADDR"] . "</div><b>Your IP:</b>\n";
		print "</ul>\n";
?>
	</ul>
		
	<p><b>NOTE:</b> If you are redirected to a fullmoon mirror, you may not see the new build for at least an hour.</p>

<?php
	// fire the shell script...
	/** see http://ca3.php.net/manual/en/function.exec.php **/

	// create the log dir before trying to log to it
	$preCmd = 'mkdir -p ' . $logdir . ';';

	$cmd = ('/bin/bash -c "exec /usr/bin/nohup /usr/bin/setsid ssh ' . $options["Users"][0] . '@' . getServerName() . 
	' \"cd ' .
		$workDir . 'modeling/scripts; ./promoteToEclipse.sh' . // one script, not two.
	' -sub ' . $projct .
	' -Q' .
	' -cvsbranch ' . $cvsbranch .
	' -branch ' . $BR .
	' -buildID ' . $ID .
	' -user ' . $options["Users"][1] .
	 ($_POST["build_Update_IES_MAP_File"]   != "" ? ' -userIES ' . $options["Users"][2] : '') .
	 ($_POST["build_IES_CVS_Branch"]        != "" ? ' -branchIES ' . $_POST["build_IES_CVS_Branch"] : '') .
	 ($_POST["build_Close_Bugz_Only"]       != "" ? ' -bugzonly' : '') .
	 ($_POST["build_Update_IES_MAP_File"]   != "" ? '' : ' -noies') .
	 ($_POST["build_Announce_In_Newsgroup"] != "" ? ' -announce' : '') .
	 ($_POST["build_Update_Coordinated_Update_Site"] != "" ? ' -coordsite ' . $_POST["build_Coordinated_Site_Name"] : '') .
	 ($_POST["build_Email"] != "" ? ' -email ' . $_POST["build_Email"] : '') .
	' \"' .
	' >> ' . $logdir . $logfile . ' 2>&1 &"'); // logging to unique files

	if ($previewOnly)
	{
		print '</div><div class="homeitem3col">' . "\n";
		print "<h3>Build Command (Preview Only)</h3>\n";
		print "<p><small><code>$preCmd</code></small></p>";
	}
	else
	{
		exec($preCmd);
		$f = fopen($logdir . $logfile, "w");
		fputs($f, preg_replace("/\ \-/", "\n  -", $cmd) . "\n\n");
		fclose($f);
	}

	if ($previewOnly)
	{
		print "<p><small><code>" . preg_replace("/\ \-/", "<br> -", $cmd) . "</code></small></p>";
	}
	else
	{
		exec($cmd); // disable here to prevent operation
	}
}

print "</div>\n</div>\n";

print "<div id=\"rightcolumn\">\n";
print "<div class=\"sideitem\">\n";
print "<h6>Options</h6>\n";
print "<ul>\n";
#print "<li><a href=\"?debugb=1\">debug promo</a></li>\n";
print "<li><a href=\"?previewOnly=1\">preview promo</a></li>\n";
#print "<li><a href=\"?debugb=1&previewOnly=1\">preview debug promo</a></li>\n";
print "<li><a href=\"?\">normal promo</a></li>\n";
print "</ul>\n";
print "</div>\n";


if ($isBuildServer && is_file($_SERVER['DOCUMENT_ROOT'] . "/$PR/build/sideitems-common.php"))
{
	include_once $_SERVER['DOCUMENT_ROOT'] . "/$PR/build/sideitems-common.php";
	if (function_exists("sidebar"))
	{
		sidebar();
	}
}

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "EMF - Promote a Build";
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

/************************** METHODS *****************************************/

function displayCheckboxes($label, $options, $verbose = false, $checked = false)
{
	if ($options["reversed"])
	{
		// pop that item out
		array_shift($options);
		$options = array_reverse($options);
	}

	foreach ($options as $o => $option)
	{
		$opt = $option;
		$isSelected = false;
		if (!preg_match("/\-\=[\d\.]+/", $opt))
		{
			if (strstr($opt, "="))
			{ // split line so that foo=bar becomes <input type="checkbox" name="bar" value="Y">foo
				$matches = null;
				preg_match("/([^\=]+)\=([^\=]*)/", $opt, $matches);
				print "\n\t<input " . ($checked ? "checked " : "") . "type=\"checkbox\" " . "name=\"" . $label . "_" . trim($matches[2]) . "\" value=\"Y\">" . ($verbose ? trim($matches[2]) . " | " : "") . trim($matches[1]);
			}
			else
			{ // turn foo into <input type="checkbox" name="foo" value="Y">foo</option>
				print "\n\t<input " . ($checked ? "checked " : "") . "type=\"checkbox\" " . "name=\"" . $label . "_" . $opt . "\" value=\"Y\">" . $opt;
			}
			print "<br/>\n";
		}
	}
}

function displayOptions($options, $verbose = false, $selected = -1)
{
	if ($options["reversed"])
	{
		// pop that item out
		array_shift($options);
		$options = array_reverse($options);
	}

	foreach ($options as $o => $option)
	{
		$opt = $option;
		$isSelected = false;
		if (!preg_match("/\-\=[\d\.]+/", $opt))
		{
			if (strstr($opt, "|selected"))
			{ // remove the |selected keyword
				$isSelected = true;
				$opt = substr($opt, 0, strpos($opt, "|selected"));
			}
			if (strstr($opt, "="))
			{ // split line so that foo=bar becomes <option value="bar">foo</option>
				$matches = null;
				preg_match("/([^\=]+)\=([^\=]*)/", $opt, $matches);
				print "\n\t<option " . ($isSelected || $selected == $o ? "selected " : "") . "value=\"" . trim($matches[2]) . "\">" . ($verbose ? trim($matches[2]) . " | " : "") . trim($matches[1]) . "</option>";
			}
			else
			{ // turn foo into <option value="foo">foo</option>
				print "\n\t<option " . ($isSelected || $selected == $o ? "selected " : "") . "value=\"" . $opt . "\">" . $opt . "</option>";
			}
		}
	}
}

function loadOptionsFromFile($file1)
{ // fn not used
	$sp = array ();
	if (is_file($file1))
	{
		$sp = file($file1);
	}
	$options = loadOptionsFromArray($sp);
	return $options;
}

function loadOptionsFromRemoteFiles($file1, $file2)
{
	$sp1 = file($file1);
	if (!$sp1)
	{
		$sp1 = array ();
	}
	$sp2 = file($file2);
	if (!$sp2)
	{
		$sp2 = array ();
	}
	$options = loadOptionsFromArray(array_merge($sp1, $sp2));
	return $options;
}

function loadOptionsFromRemoteFile($file1)
{ // fn not used
	$sp1 = file($file1);
	if (!$sp1)
	{
		$sp1 = array ();
	}
	$options = loadOptionsFromArray($sp1);
	return $options;
}

function loadOptionsFromArray($sp)
{
	global $debug; 
	$options = array ();
	$doSection = "";

	foreach ($sp as $s)
	{
		$matches = null;
		if (strpos($s, "#") === 0)
		{ // skip, comment line
		}
		else
			if (preg_match("/\[([a-zA-Z\_\|]+)\]/", $s, $matches))
			{ // section starts
				if (strlen($s) > 2)
				{
					$isReversed = false;
					if (strstr($s, "|reversed"))
					{ // remove the |reversed keyword
						$isReversed = true;
						$doSection = trim($matches[1]);
						$doSection = substr($doSection, 0, strpos($doSection, "|reversed"));
					}
					else
					{
						$doSection = trim($matches[1]);
					}
					if ($debug > 0)
						print "Section: $s --> $doSection<br>";

					$options[$doSection] = array ();
					if ($isReversed)
					{
						$options[$doSection]["reversed"] = $isReversed;
					}
				}
			}
			else
				if (!preg_match("/\[([a-zA-Z\_]+)\]/", $s, $matches))
				{
					if (strlen($s) > 2)
					{
						if ($debug > 0)
							print "Loading: $s<br>";
						$options[$doSection][] = trim($s);
					}
				}
	}

	return $options;
}

function getBranches($options)
{
	foreach ($options["Branch"] as $br => $branch)
	{
		$arr[getValueFromOptionsString($branch, "name")] = getValueFromOptionsString($branch, "value");
	}
	return $arr;
}

function getProperties($file = null)
{
	$arr = array();
	if (is_file($file))
	{
		$file = file($file);
	}
	if (is_array($file))
	{
		foreach ($file as $i => $line)
		{
			$arr[getValueFromOptionsString($line, "name")] = getValueFromOptionsString($line, "value");
		}
	}
	return $arr;
}

function isIES()
{
	global $workDir, $projct;
	$propertiesFile = $workDir. "modeling/scripts/promoteToEclipse.$projct.properties";
	$arr = getProperties($propertiesFile);
	if (sizeof($arr) > 0 && array_key_exists("IES",$arr))
	{
		return ($arr["IES"]-0);
	}
	return false;
}

function getValueFromOptionsString($opt, $nameOrValue)
{
	if (strstr($opt, "|selected"))
	{ // remove the |selected keyword
		$opt = substr($opt, 0, strpos($opt, "|selected"));
	}
	if (strstr($opt, "="))
	{ // split the name=value pairs, if present
		if ($nameOrValue == "name" || $nameOrValue === 0)
		{
			$opt = substr($opt, 0, strpos($opt, "="));
		}
		else
			if ($nameOrValue == "value" || $nameOrValue == 1)
			{
				$opt = substr($opt, strpos($opt, "=") + 1);
			}
	}
	return $opt;
}

function getprojRelengBranch($branches, $br_id)
{ // { 2.1.0=HEAD|selected, 2.0.3=R2_0_maintenance, ... }, 2.0.3/M200506021148
	if (false === strpos($br_id, "/") || sizeof($branches) < 1)
	{
		return "HEAD";
	}
	$BR = explode("/", $br_id);
	$BR = $BR[0]; // 2.0.3
	foreach ($branches as $br)
	{
		if (false !== strpos($br, $BR) && false !== strpos($br, "=") && false === strpos($br, "-"))
		{
			$cvsBranch = explode("=", $br);
			$cvsBranch = $cvsBranch[1]; // HEAD|selected, R2_0_maintenance
			if (false === strpos($cvsBranch, "|"))
			{
				return $cvsBranch; // R2_0_maintenance
			}
			else
			{
				$cvsBranch = explode("|", $cvsBranch);
				return $cvsBranch[0]; // HEAD
			}
		}
	}
	return "HEAD";
}

function getBuildConfig($dir)
{
	$results = array ();
	// get data from build.cfg, turn into array of name/value pairs
	if (!is_file($dir . "build.cfg"))
	{
		return $results;
	}
	$data = file($dir . "build.cfg");
	foreach ($data as $line)
	{
		$bits = explode("=", $line);
		if (sizeof($bits) == 2)
		{
			$results[$bits[0]] = $bits[1];
		}
	}
	return $results;
}

function getProjectFromPath($PR)
	{
		
		return preg_replace("#/".$PR."/([^/]+)/build/.+#", "$1", $_SERVER["PHP_SELF"]);

	}
	
function getServerName() 
{
	$s = null;
	exec("hostname -f",$s);
	return is_array($s) && sizeof($s) > 0 ? $s[0] : "";
}
?>
