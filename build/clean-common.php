<?php
# $PR = "modeling/mdt";
# $proj = "/uml2";
# $projct = "uml2";
# $topProj = "mdt";
# $componentName = "UML2";

$showAll=null;
$showMax=null;
$sortBy=null;

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
require_once($_SERVER['DOCUMENT_ROOT'] . "/modeling/build/_common.php");

$topProj = preg_replace("#.+/(.+)#","$1", $PR);

// suppress projects which can't be built this way
array_push($nodownloads,"xsd");

internalUseOnly();
ob_start();

$debugb = isset($_GET["debugb"]) ? 1 : 0;
$previewOnly = isset($_GET["previewOnly"]) ? 1 : 0;

$trans = array_flip($projects);

$projctFromPath = getProjectFromPath($PR);
if (is_array($projects))
{
	$projectArray = getProjectArray($projects, $extraprojects, $nodownloads, $PR);
	$tmp = array_keys($projectArray);
	$proj = "/" . (isset($_GET["project"]) && preg_match("/^(?:" . join("|", $projects) . ")$/", $_GET["project"]) ? $_GET["project"] : $projctFromPath);
}
else
{
	$proj = "";
}

$projct = preg_replace("#^/#", "", $proj);

if ($projct != $projctFromPath && is_dir($_SERVER['DOCUMENT_ROOT'] . "/" . $PR . $proj . "/build/"))
{
	header("Location: /" . $PR . $proj . "/build/clean.php");
}

$componentName = isset($trans[$projct]) ? $trans[$projct] : $projct;
$PWD = getPWD("$projct/downloads/drops");

print "<div id=\"midcolumn\">\n";
print "<h1>Clean Build(s): " . $componentName . "</h1>\n";

if (is_array($projects) && sizeof($projects) > 1)
{
	print doSelectProject($projectArray, $proj, $nomenclature, "homeitem3col", $showAll, $showMax, $sortBy);
}
?>

<div class="homeitem3col">
<h3>Clean Build(s)</h3>
<?php
if (!isset ($_POST["process"]) || !$_POST["process"] == "cleanOrDelete")
{ // page one, the form
	print "<p>To clean temp files from one or more builds" .
			//", or to delete failed builds," . // TODO enable delete option
			" please complete the following form and click the Clean button.";
}
else
{
	print "<p>Your clean is " . ($previewOnly ? "<b>NOT</b> " : "") . "in progress" . ($previewOnly ? ", but the command is displayed below for preview" : "") .
	". <a href=\"?z" . ($debugb ? "&amp;debugb=1" : "") . ($previewOnly ? "&amp;previewOnly=1" : "") . "\">Clean another?</a></p>";
}

if (!isset($options))
{
	$options = array();
}
else
{
}

$buildIDs = array ();
$buildIDs2 = array ();

foreach ($options["BranchAndJDK"] as $br)
{

	$bits = explode("=", $br);
	$BR = $bits[0];
	// define which build types to show:
	$dir = "$PWD/$BR";
	if (is_dir($dir))
	{
		$buildIDs = loadDirSimple($dir, "([MISR]+\d{12})", "d"); // include N builds
		foreach ($buildIDs as $k => $bid)
		{
			$buildIDs2[substr($bid, 1) . substr($bid, 0, 1)] = $BR . "/" . $bid
			. (is_dir("$dir/$bid") ? " | " . pretty_size(dirsize("$dir/$bid")) : "");
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

if (!isset ($_POST["process"]) || !$_POST["process"] == "cleanOrDelete")
{ // page one, the form
?>

<form method=POST name="cleanForm">
	<input type="hidden" name="process" value="cleanOrDelete" />
	<input type="hidden" name="basedir" value="<?php print $PWD; ?>" />
	<table border="0">
			<tr>
				<td>&#160;</td>
				<td><b>Build Version/ID &amp;<br/> Size On Disk</b><br/>
				<small>
					choose build(s) (use <em>CTRL</em> <br>
					for multiple selections)</small></td>
				<td>&#160;</td>
				<td colspan=2>
				<select style="font-size:9px" name="build_Version_And_BuildID[]" size="8" multiple="multiple">
					<?php displayOptions($buildIDs,false,0); ?>
				</select></td>
			</tr>

			<tr>
				<td colspan="3">&#160;</td>
				<td>
				<p><input type="radio" name="build_cleanOrDelete" value="clean" checked="true"> Clean 
				<!-- or <input type="radio" name="build_cleanOrDelete" value="delete"> Delete --> <!-- TODO enable delete option -->
				selected build(s) ?</p>
				</td>
				<td width="300"><small><a id="divToggle_cleanOrDelete" name="divToggle_cleanOrDelete" href="javascript:toggleDetails('cleanOrDelete')">[+]</a></small>
					<div id="divDetail_cleanOrDelete" name="divDetail_cleanOrDelete" style="display:none;border:0">
					<small>
					Cleaning a build will remove its temporary files from the selected build folder(s). 
					<!-- Deleting will remove entire build folder(s). --> <!-- TODO enable delete option -->
					</small>
					</div>
				</td>
			</tr>
			<tr>
				<td>&#160;</td>
				<td><b>Email?</td>
				<td>&#160;</td>
				<td><input name="build_Email" size="25" value="<?php //echo $options["EmailDefault"]; ?>"></td>
				<td width="300"><small><a id="divToggle_email" name="divToggle_email" href="javascript:toggleDetails('email')">[+]</a></small>
					<div id="divDetail_email" name="divDetail_email" style="display:none;border:0">
					<small>Add your email (or comma-separated emails) to be notified when done. See <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=210396">bug 210396</a>.
					</small>
					</div>
				</td>
			</tr>

			<!-- TODO enable delete option -->
			<!-- <tr>
				<td>&#160;</td>
				<td colspan=5><p><b>Note</b>: Please ensure that any build(s) you intend to delete are no longer needed. <b style="color:red">There is no undelete!</b></p>

				</td>
			</tr> -->
			<tr>
				<td>&#160;</td>
				<td colspan=2 align=center><input type="button" value="<?php print $previewOnly?"Preview Only":"Clean"; ?>" onclick="doSubmit()"></td>
			</tr>
			<tr>
				<td>&#160;</td>
			</tr>
	</table>
</form>
<script language="javascript">
function doSubmit() {
	answer = true;
	/* TODO enable delete option */
	/*
	field=document.forms.cleanForm.elements["build_Version_And_BuildID[]"];
	field2=document.forms.cleanForm.elements["build_cleanOrDelete"];
	if (field.options[field.selectedIndex].value.indexOf("R")>0 && field2.length>1 && field2[1].checked) {
		answer = confirm(
			'Are you sure you want to delete a Release build?');
		if (answer) { field.focus(); }
	}*/
	if (answer) {
			document.forms.cleanForm.submit();
	} else {
		// do nothing...
	} 
}

function toggleDetails(id)
{
  toggle=document.getElementById("divToggle_" + id);
  detail=document.getElementById("divDetail_" + id);
  if (toggle.innerHTML=="[+]")
  {
    toggle.innerHTML="[-]";
    detail.style.display="";
  }
  else
  {
    toggle.innerHTML="[+]";
    detail.style.display="none";
  }
}

onload=loadSelects;

function loadSelects() {
	field=document.forms.cleanForm.elements["build_Version_And_BuildID[]"];
	field.selectedIndex=-1;		
	// preselect the ?versionAndBuildID= value, if available
	versionAndBuildID="<?php print isset($_GET['versionAndBuildID']) ? $_GET['versionAndBuildID'] : ''; ?>"; 
	if (versionAndBuildID)
	{
		for (i=0; i<field.length; i++)
		{
			if (field.options[i].text.indexOf(versionAndBuildID)>=0)
			{
				field.selectedIndex=i;
				break;
			}
					
		}
	}
}
</script>
<?php
}
else
{ // page two, form submission results

	$logdir = "/home/www-data/promo_logs/";
	$logwebdir = "/promo_logs/";
	$logfile = "clean_log_" . $projct . "_" . date("Y-m-d-H.i.s") . ".txt";

	if (!$previewOnly)
	{
		print '<p>Logfile is <a href="' . $logwebdir . $logfile . '">' . $logdir . $logfile . '</a></p>';
	}
?>
	<ul>
		Here's what you submitted:</li>
<?php
		print "<ul>\n";
		foreach ($_POST as $k => $v)
		{
			if (strstr($k, "build_") && !strstr($k, "_Sel") && (is_array($v) || trim($v) != "")) // build_Version_And_BuildID sets $v to an array; all others are strings
			{
				$lab = str_replace("_", " ", substr($k, 6));
				$val = $k == "build_Version_And_BuildID" ? $v : (false !== strpos($v, ",") ? explode(",", $v) : $v);

				print "<li>";
				print (is_array($val) ?
				"<b>" . $lab . ":</b>" . "<ul>\n<li><small>" . join("</small></li>\n<li><small>", $val) . "</small></li>\n</ul>\n" :
				"<div>" . $val . "</div>" . "<b>" . $lab . ":</b>");
				print "</li>\n";
			}
		}
		print "<li><div>" . $_SERVER["REMOTE_ADDR"] . "</div><b>Your IP:</b></li>\n";
		print "</ul>\n";
		print "</ul>\n";
?>

<?php
	// fire the shell script...
	/** see http://ca3.php.net/manual/en/function.exec.php **/

	// create the log dir before trying to log to it
	$preCmd = 'mkdir -p ' . $logdir . ';';

	$cmd = '/bin/bash -c "exec /usr/bin/nohup /usr/bin/setsid '. $workDir . 'modeling/scripts/cleanBuildFolder.sh -y -basedir ' . $_POST["basedir"];
	
	$chosen = isset($_POST["build_Version_And_BuildID"]) ? $_POST["build_Version_And_BuildID"] : array();
	if (!is_array($chosen)) $chosen = array($chosen); // cast to array if not already
	foreach ($chosen as $choose)
	{
		$BR = explode(" | ", $choose); $cmd .= " " . $BR[0];
	}
	
	$cmd .= 
	#(isset($_POST["build_cleanOrDelete"]) && $_POST["build_cleanOrDelete"] == "delete" ? ' -delete' : '') . # TODO enable delete option
	(isset($_POST["build_Email"]) && $_POST["build_Email"] != "" ? ' -email ' . $_POST["build_Email"] : '') .
	' >> ' . $logdir . $logfile . ' 2>&1 &"'; // logging to unique files

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
} // end else

print "</div>\n</div>\n";

print "<div id=\"rightcolumn\">\n";
print "<div class=\"sideitem\">\n";
print "<h6>Options</h6>\n";
print "<ul>\n";
print "<li><a href=\"?project=$projct&amp;previewOnly=1\">preview clean</a></li>\n";
print "<li><a href=\"?project=$projct&amp;\">normal clean</a></li>\n";
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

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = $componentName . " - Clean Build(s)";
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

/************************** METHODS *****************************************/

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

function getServerName()
{
	$s = null;
	exec("hostname -f",$s);
	return is_array($s) && sizeof($s) > 0 ? $s[0] : "";
}

?>