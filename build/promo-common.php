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
 
# $PR = "modeling/mdt";
# $proj = "/uml2"; 
# $projct = "uml2";
# $topProj = "mdt";
# $componentName = "UML2"; 

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
	header("Location: /" . $PR . $proj . "/build/promo.php");
}

$componentName =  $trans[$projct];

print "<div id=\"midcolumn\">\n";
print "<h1>Promote a Build: " . $componentName . "</h1>\n";

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
	print "<p>To promote a build, please complete the following form and click the Promote button.</p>";
}
else
{
	print "<p>Your promotion is " . ($previewOnly ? "<b>NOT</b> " : "") . "in progress" . ($previewOnly ? ", but the command is displayed below for preview" : "") .
	". <a href=\"?z" . ($debugb ? "&amp;debugb=1" : "") . ($previewOnly ? "&amp;previewOnly=1" : "") . "\">Promote another?</a></p>";
}

if (!isset($options))
{
	$options = array();
}
else
{
	$options["BranchIES"] = array (
		"HEAD",
		"R3_3_maintenance"
	);
}

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
			$buildcfgs = getBuildConfig("$dir/$bid/");
			if ($buildcfgs["branch"]) // looking in build.cfg for "branch=..."
			{
				$buildIDs2[substr($bid, 1) . substr($bid, 0, 1)] = $BR . "/" . $bid . " | " . (isset($buildcfgs["branchCVS"]) ? $buildcfgs["branchCVS"] : $buildcfgs["branch"])
					. (is_dir($dir . "/$bid/testresults/xml") ? '' : ' ** NO TEST RESULTS **');
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

<form method=POST name="promoForm">
	<input type="hidden" name="process" value="build" />
	<table border="0">
			<tr>
				<td>&#160;</td>
				<td><b>Build Version,<br/>ID &amp; Branch</b></td>
				<td>&#160;</td>
				<td colspan=2>
				<select style="font-size:9px" name="build_Version_Build_ID_And_Branch" size="8">
					<?php displayOptions($buildIDs,false,0); ?>
				</select></td>
			</tr>

			<tr>
				<td>&#160;</td>
				<td><b>Options</b><br><small></small></td>
				<td>&#160;</td>
				<td><p>&#160; &#160; &#160; Use Properties File From 
				<small><select style="font-size:9px" name="build_Use_Properties_File" size="1">
					<?php displayOptions(array("CVS", "Local"), false, 0); ?>
				</select></small></p>
				</td>
				<td width="300"><small><a id="divToggle_propertiesfile" name="divToggle_propertiesfile" href="javascript:toggleDetails('propertiesfile')">[+]</a></small>
					<div id="divDetail_propertiesfile" name="divDetail_propertiesfile" style="display:none;border:0">
					<small>
					You can either use the properties file that's local to the promote script, in /home/www-data/build/modeling/scripts/, or extract the latest from CVS for the branch of build you're promoting (eg., HEAD, R0_7_maintenance).
					</small>
					</div>
				</td>
			</tr>
			<?php if (isIES() || $projct == "emf") { #TODO: remove this hack once EMF runs as a modeling build ?>
			<tr>
				<td colspan="3">&#160;</td>
				<td colspan="2"><p><input type="checkbox" name="build_Update_IES_Map_File" value="Yes" checked="checked"> Update IES Map File? 
				<small><select style="font-size:9px" name="build_IES_CVS_Branch" size="1">
					<?php displayOptions($options["BranchIES"],false,0); ?>
				</select></small></p></td></tr>
			<?php } ?>
			<tr>
				<td colspan="3">&#160;</td>
				<td>
				<p><input type="checkbox" name="build_Update_Coordinated_Update_Site" value="Yes"> Contribute to  
				<small><select style="font-size:9px" name="build_Coordinated_Site_Name" size="1">
					<?php displayOptions(array("ganymede", "europa"), false, 0); ?>
				</select></small> update site?</p>
				</td>
				<td width="300"><small><a id="divToggle_coordinated" name="divToggle_coordinated" href="javascript:toggleDetails('coordinated')">[+]</a></small>
					<div id="divDetail_coordinated" name="divDetail_coordinated" style="display:none;border:0">
					<small>
					This will create all the required coordinated update site contributions for your component. You need to be a member of the <i>callisto-dev</i> group in order to update your file in CVS. If you're not, see <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=212325">bug 212325</a>.
					See also <a href="http://wiki.eclipse.org/Ganymede">Ganymede</a>, <a href="http://wiki.eclipse.org/Europa">Europa</a>.
					</small>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="3">&#160;</td>
				<td>
				<p><input type="checkbox" name="build_Close_Bugz_Only" value="Yes" onclick="doOnclickBugzonly(this.checked)"> Move Assigned Bugs to Fixed? (<a href="http://wiki.eclipse.org/Modeling_Project_Releng/Releasing#Automatically_Fixing_Assigned_Bugs">-bugzonly</a>)</p>
				</td>
				<td width="300"><small><a id="divToggle_bugzonly" name="divToggle_bugzonly" href="javascript:toggleDetails('bugzonly')">[+]</a></small>
					<div id="divDetail_bugzonly" name="divDetail_bugzonly" style="display:none;border:0">
					<small>
					This currently only works on the emf.torolab server. See <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=191571">bug 191571</a>.
					</small>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="3">&#160;</td>
				<td>
				<p><input type="checkbox" name="build_Store_SDK_As_Dependency" value="Yes" onclick=""> Add SDK As Dependency?</p>
				</td>
				<td width="300"><small><a id="divToggle_addSDK" name="divToggle_addSDK" href="javascript:toggleDetails('addSDK')">[+]</a></small>
					<div id="divDetail_addSDK" name="divDetail_addSDK" style="display:none;border:0">
					<small>
					This flag adds your new build to the list of available builds 
					to be used as a dependency for others (eg., to add UML2 or OCL as a dependency for Query). See <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=207007">bug 207007</a>. 
					</small>
					</div>
				</td>
			</tr>

			<tr>
				<td>&#160;</td>
				<td><b>Announce?</td>
				<td>&#160;</td>
				<td><p><input type="checkbox" name="build_Announce_In_Newsgroup" value="Yes" checked="checked"> Announce In Newsgroup?</p></td>
				<td width="300"><small><a id="divToggle_announce" name="divToggle_announce" href="javascript:toggleDetails('announce')">[+]</a></small>
					<div id="divDetail_announce" name="divDetail_announce" style="display:none;border:0">
					<small>
					You can configure how to announce, how long to delay, and where to annouce in your properties file.
					</small>
					</div>
				</td>
			</tr>
			<tr>
				<td>&#160;</td>
				<td><b>Email?</td>
				<td>&#160;</td>
				<td><input name="build_Email" size="25" value="<?php echo $options["EmailDefault"]; ?>"></td>
				<td width="300"><small><a id="divToggle_email" name="divToggle_email" href="javascript:toggleDetails('email')">[+]</a></small>
					<div id="divDetail_email" name="divDetail_email" style="display:none;border:0">
					<small>Add your email (or comma-separated emails) to be notified when done. See <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=210396">bug 210396</a>.
					</small>
					</div>
				</td>
			</tr>

			<tr>
				<td>&#160;</td>
				<td colspan=5><p><b>Note</b>: Please ensure the build you intend to promote was done using the <br/>
				<a target="_check" class="highlight" href="/<?php echo $PR; ?>/<?php echo $projct; ?>/build/">latest (or appropriate) driver(s)</a>, 
				and that the <a target="_check" href="/<?php echo $PR; ?>/downloads/?project=<?php echo $projct; ?>&amp;sortBy=date&amp;hlbuild=0#latest" class="highlight">all tests have passed</a>.</p>
				
				</td>
			</tr>
			<tr>
				<td>&#160;</td>
				<td colspan=2 align=center><input type="button" value="<?php print $previewOnly?"Preview Only":"Promote"; ?>" onclick="doSubmit()"></td>
			</tr>
			<tr>
				<td>&#160;</td>
			</tr>
	</table>
</form>
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

function doOnclickBugzonly(booln) {
	with (document.forms.promoForm) {
		<?php if (isIES() || $projct == "emf") { #TODO: remove this hack once EMF runs as a modeling build ?>
		build_Update_IES_Map_File.disabled=booln;
		build_IES_CVS_Branch.disabled=booln;
		<?php } ?>
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
	$cvsbranch = explode(" ",$BR[1]); $cvsbranch = trim($cvsbranch[0]);
	$BR = explode("/", $BR[0]);
	$ID = $BR[1];
	$BR = $BR[0];
	$relengProject = 
		$projct == "emf" ? "org.eclipse.emf/org.eclipse.emf.releng/scripts" : 
		($PR=="modeling/emf" || $PR=="modeling/emft" ? 
			"org.eclipse.emf/org.eclipse.emf.$projct.releng" : 
			"org.eclipse.$topProj/org.eclipse.$projct.releng"
		);
	#echo "got: cvsbranch: $cvsbranch, ID: $ID, BR: $BR, relengProject: $relengProject<br/>";
	

	$logdir = "/home/www-data/promo_logs/";
	$logfile = "promo_log_" . $projct . "_" . $BR . "." . $ID . "_" . date("Y-m-d-H.i.s") . ($_POST["build_Close_Bugz_Only"] != "" ? '_bugzonly' : '') . ".txt";

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
		
	<p><b>NOTE:</b> Due to mirror replication delays, you may not see the new build for at least an hour.</p>

<?php
	// fire the shell script...
	/** see http://ca3.php.net/manual/en/function.exec.php **/

	// create the log dir before trying to log to it
	$preCmd = 'mkdir -p ' . $logdir . ';';

	$cmd = ('/bin/bash -c "exec /usr/bin/nohup /usr/bin/setsid ssh ' . $options["Users"][0] . '@' . getServerName() . 
	' \"cd ' . $workDir . ($projct == "emf" ? 'emf' : 'modeling') . '/scripts; ./promoteToEclipse.sh' . #TODO: remove this hack once EMF runs as a modeling build

	($_POST["build_Use_Properties_File"] == "CVS" ? 
		" -c $relengProject/promoteToEclipse.$projct.properties,$cvsbranch" : ' -sub ' . $projct) .

	' -Q' .
	' -cvsbranch ' . $cvsbranch .
	' -branch ' . $BR .
	' -buildID ' . $ID .
	' -user ' . $options["Users"][1] .
	($_POST["build_Update_IES_Map_File"]   != "" ? ' -userIES ' . $options["Users"][2] : '') .
	($_POST["build_Update_IES_Map_File"]   != "" && $_POST["build_IES_CVS_Branch"] != "" ? ' -branchIES ' . $_POST["build_IES_CVS_Branch"] : '') .
	($_POST["build_Close_Bugz_Only"]       != "" ? ' -bugzonly' : '') .
	($_POST["build_Store_SDK_As_Dependency"] != "" ? ' -addSDK ' . $dependenciesURLsFile : '') .
	($_POST["build_Update_IES_Map_File"]   != "" ? '' : ' -noIES') .
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
} // end else

print "</div>\n</div>\n";

print "<div id=\"rightcolumn\">\n";
print "<div class=\"sideitem\">\n";
print "<h6>Options</h6>\n";
print "<ul>\n";
print "<li><a href=\"?project=$projct&amp;previewOnly=1\">preview promo</a></li>\n";
print "<li><a href=\"?project=$projct&amp;\">normal promo</a></li>\n";
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

$pageTitle = $componentName . " - Promote a Build";
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