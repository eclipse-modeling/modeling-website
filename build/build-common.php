<?php

# $PR = "modeling/mdt";
# $proj = "/uml2"; 
# $projct = "uml2";
# $topProj = "mdt";
# $componentName = "UML2"; 

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
require_once($_SERVER['DOCUMENT_ROOT'] . "/modeling/build/_common.php");

$topProj = preg_replace("#.+/(.+)#","$1", $PR);

// suppress projects which can't be built this way
if (isset($nodownloads)) array_push($nodownloads,"xsd");  

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
	header("Location: /" . $PR . $proj . "/build/");
}

$componentName =  $trans[$projct];

print "<div id=\"midcolumn\">\n";
print "<h1>New " . strtoupper($topProj) . " Component Build: ". $componentName . "</h1>\n";

if (is_array($projects) && sizeof($projects) > 1)
{
	print doSelectProject($projectArray, $proj, $nomenclature, "homeitem3col", $showAll, $showMax, $sortBy);
}
?>

<div class="homeitem3col">
<h3>Run A Build</h3>
<?php	
if (!isset ($_POST["process"]) || !$_POST["process"] == "build")
{ // page one, the form
	print "<p>To run a build, please complete the following form and click the Build button.</p>";
} 
else 
{ 
	print "<p>Your build is ".($previewOnly?"<b>NOT</b> ":"")."in progress".($previewOnly?", but the command is displayed below for preview":"").
		". <a href=\"?project=$projct".($debugb?"&amp;debugb=1":"").($previewOnly?"&amp;previewOnly=1":"")."\">Build another?</a></p>";
}

if (!isset($options)) 
{ 
	$options = array(); 	
} 
else
{
	$options = array_merge($options, loadOptionsFromFile($dependenciesURLsFile));	
	$options["BranchIES"] = array ("HEAD","R3_2_maintenance");
	$options["RunTests"] = array ("JUnit Tests=JUnit");
}	
$options["BuildType"] = array("Release=R","Stable=S","Integration=I","Maintenance=M","Nightly=N|selected");

if (!isset ($_POST["process"]) || !$_POST["process"] == "build")
{ // page one, the form
?>

<table>
	<form method=POST name="buildForm">
			<input type="hidden" name="process" value="build" />
			<tr>
				<td colspan="4"></td>
				<td colspan="2">
					<div id="note" name="note" style="border:0;font-style:italic;font-weight:bold" readonly="readonly">&#160;</div>
				</td>
			</tr>
			
			<tr>
				<td><img src="/modeling/images/numbers/1.gif" /></td>
				<td>&#160;</td>
				<td><b>Branch, Subproject &amp; Type</b></td>
				<td>&#160;</td>
				<input name="build_Branch" type="hidden" size="8" maxlength="10" onchange="this.value=this.value.replace(/[^0-9\.]/g,'');"/>
				<input name="build_Java_Home" type="hidden" size="20"/>
				<td colspan=3><select name="build_CVS_Branch" onchange="doBranchSelected(this)">
				<?php displayOptionsTriplet($options["BranchAndJDK"]); ?>
				</select> 
				<select name="build_Build_Type">
				<?php displayOptions($options["BuildType"]); ?>
				</select></td>
			</tr>

			<tr>
				<td colspan="2"></td>
				<td colspan="4">
					<div name="fullURL" id="fullURL" style="border:0;font-size:9px;" readonly="readonly">&#160;</div>
				</td>
			</tr>
			
			<tr valign="top">
				<td><img src="/modeling/images/numbers/2.gif" /></td>
				<td>&#160;</td>
				<td><b>Dependency URLs</b><br>
				
					<small>
					choose URLs (use <em>CTRL</em> <br> 
					for multiple selections)</small>
					<table>
						<tr><td><b>Public</b></td><td><b>Mirror</b></td></tr>
						<?php $buildServer = array("www.eclipse.org","emf.torolab.ibm.com","emft.eclipse.org","build.eclipse.org"); ?>
						<tr>						
							<td> &#149; <a href="http://download.eclipse.org/eclipse/downloads/">Eclipse</a></td>
							<td> &#149; <a href="http://fullmoon/downloads/">Eclipse</a></td>
						</tr>
						<tr>						
							<td> &#149; <a href="http://<?php print $buildServer[0]; ?>/modeling/emf/downloads/?project=emf&amp;showAll=&amp;sortBy=date&amp;hlbuild=0#latest">EMF</a></td>
							<td> &#149; <a href="http://<?php print $buildServer[1]; ?>/modeling/emf/downloads/?project=emf&amp;showAll=&amp;sortBy=date&amp;hlbuild=0#latest">EMF</a></td>
						</tr>						
						<tr>						
							<td> &#149; <a href="http://<?php print $buildServer[0]; ?>/modeling/mdt/downloads/?project=uml2&amp;sortBy=date&amp;hlbuild=0#latest">UML2</a></td>
							<td> &#149; <a href="http://<?php print $buildServer[1]; ?>/modeling/mdt/downloads/?project=uml2&amp;sortBy=date&amp;hlbuild=0#latest">UML2</a></td>
						</tr>						
						<tr>						
							<td> &#149; <a href="http://<?php print $buildServer[0]; ?>/modeling/mdt/downloads/?project=ocl&amp;sortBy=date&amp;hlbuild=0#latest">OCL</a></td>
							<td> &#149; <a href="http://<?php print $buildServer[1]; ?>/modeling/mdt/downloads/?project=ocl&amp;sortBy=date&amp;hlbuild=0#latest">OCL</a></td>
						</tr>						
						<tr>						
							<td> &#149; <a href="http://<?php print $buildServer[0]; ?>/modeling/emf/downloads/?project=query&amp;sortBy=date&amp;hlbuild=0#latest">MQ</a>, 
										<a href="http://<?php print $buildServer[0]; ?>/modeling/emf/downloads/?project=transaction&amp;sortBy=date&amp;hlbuild=0#latest">MT</a>, 
										<a href="http://<?php print $buildServer[0]; ?>/modeling/emf/downloads/?project=validation&amp;sortBy=date&amp;hlbuild=0#latest">VF</a>
							</td>
							<td> &#149; <a href="http://<?php print $buildServer[1]; ?>/modeling/emf/downloads/?project=query&amp;sortBy=date&amp;hlbuild=0#latest">MQ</a>,
										<a href="http://<?php print $buildServer[1]; ?>/modeling/emf/downloads/?project=transaction&amp;sortBy=date&amp;hlbuild=0#latest">MT</a>,
										<a href="http://<?php print $buildServer[1]; ?>/modeling/emf/downloads/?project=validation&amp;sortBy=date&amp;hlbuild=0#latest">VF</a> 
							</td>
						</tr>						
						<tr>						
							<td> &#149; <a href="http://<?php print $buildServer[0]; ?>/modeling/emft/downloads/?project=net4j&amp;sortBy=date&amp;hlbuild=0#latest">Net4j</a></td>
							<td> &#149; <a href="http://<?php print $buildServer[2]; ?>/modeling/emft/downloads/?project=net4j&amp;sortBy=date&amp;hlbuild=0#latest">Net4j</a></td>
						</tr>		
						<tr><td colspan="2"><hr noshade="noshade" size="1" width="100%"/></td>				
						<tr>						
							<td colspan="2"> &#149; <a href="http://download.eclipse.org/tools/gef/downloads/">GEF</a>, 
										<a href="http://download.eclipse.org/modeling/gmf/downloads/">GMF</a>, 
										<a href="http://download.eclipse.org/tools/orbit/downloads/">Orbit</a>,
										<a href="http://download.eclipse.org/webtools/downloads/">WTP</a>,
										<a href="http://www.eclipse.org/emft/projects/mwe/#mwe">MWE</a></td>
						</tr>						
					</table>							
            <p><small>&#160;&#160;-- AND/OR --</small></p>
				</td>
				<td>&#160;</td>
				<td colspan=2>
				<small>
				<select multiple="multiple" style="font-size:9px" name="build_Dependencies_URL[]" size="18" onchange="showfullURL(this.options[this.selectedIndex].value);">
				<?php displayURLs($options["DependenciesURL"]); ?>
				</select></td>
			</tr>
			<tr valign="top">
				<td colspan=2>&#160;</td>
				<td><small>
					paste full URL(s), one per<br>
					line or comma separated<br>
					(new values will be stored)</small>
				</td>
				<td>&#160;</td>
				<td colspan=2>
				<textarea name="build_Dependencies_URL_New" cols="50" rows="4"></textarea>
				</td>
			</tr>
			<tr><td colspan="6">&#160;</td></tr>

			<tr>
				<td rowspan="1" valign="top"><img src="/modeling/images/numbers/3.gif" /></td>
				<td rowspan="1">&#160;</td>
				<td colspan=1><a href="http://wiki.eclipse.org/index.php/Platform-releng-basebuilder">Basebuilder</a> Branch:</td>
				<td>&#160;</td>
				<td><input size="15" name="build_basebuilder_branch" value="<?php echo $options["BaseBuilderBranch"]; ?>">
				</td>
				<td width="350"><small><a id="divToggle_relengBasebuilder" name="divToggle_relengBasebuilder" href="javascript:toggleDetails('relengBasebuilder')">[+]</a></small>
					<div id="divDetail_relengBasebuilder" name="divDetail_relengBasebuilder" style="display:none;border:0">
					<small>
					Enter Tag or Branch, eg., 
						<acronym title="Eclipse 3.4.x">v20071108</acronym>, 
						<acronym title="Eclipse 3.3.x">v20070614</acronym>, 
						<acronym title="Eclipse 3.2.x">r322_v20070104</acronym>, 
						<acronym title="Eclipse 3.1.x">R3_1_maintenance</acronym> :: <a href="http://wiki.eclipse.org/index.php/Platform-releng-basebuilder">wiki</a>
					</small>
					</div>
				</td>
			</tr>

			<tr>
				<td valign="top" rowspan="2" valign="top"><img src="/modeling/images/numbers/4.gif" /></td>
				<td rowspan="2">&#160;</td>
				<td><b>Build Alias</b><br><small>required for S and R builds</small></td>
				<td>&#160;</td>
				<td><input name="build_Build_Alias" size=8></td>
				<td width="300"><small><a id="divToggle_buildAlias" name="divToggle_buildAlias" href="javascript:toggleDetails('buildAlias')">[+]</a></small>
					<div id="divDetail_buildAlias" name="divDetail_buildAlias" style="display:none;border:0">
					<small>
					Eg., to label a milestone as "0.7.0M4" instead of "S200712120000". You must include the version -- "M4" is not valid.
					</small>
					</div>
				</td>
			</tr>

			<tr valign="top">
				<td valign="middle"><b>Mapfile &amp; Tagging</b></td>
				<td>&#160;</td>
				<td><select name="build_Mapfile_Rule" size="1">
				<?php 	$options["MapfileRule"] = array (
							"Use Map=use-false",
							"Generate Map=gen-false");
						displayOptions($options["MapfileRule"]); ?>
				</select> 
				</td>
				<td><small><a id="divToggle_MapfileRule" name="divToggle_MapfileRule" href="javascript:toggleDetails('MapfileRule')">[+]</a></small>
				<div id="divDetail_MapfileRule" name="divDetail_MapfileRule" style="display:none;border:0">
				<table><tr valign="top"><td><small>Use Map</small></td><td><small> : </small></td><td><small>Extract static <?php echo $projct; ?>.map file from CVS and use that for build. Tag(s) listed in mapfile MUST EXIST ALREADY.</small></td></tr>
						<tr valign="top"><td><small>Generate Map</small></td><td><small> : </small></td><td><small>Generate map file using branch (eg., R1_0_maintenance).</small></td></tr>
				</table>
				</div>
				</td>
			</tr> 

			<tr><td colspan="6">&#160;</td></tr>


			<tr>
				<td rowspan="1"><img src="/modeling/images/numbers/5.gif" /></td>
				<td rowspan="1">&#160;</td>
				<td><b>Run Tests</b></td>
				<td>&#160;</td>
				
				<td colspan="1">
				<?php displayCheckboxes("build_Run_Tests",$options["RunTests"]); ?>
				</td>
				<td width="300"><small><a id="divToggle_RunTests" name="divToggle_RunTests" href="javascript:toggleDetails('RunTests')">[+]</a></small>
					<div id="divDetail_RunTests" name="divDetail_RunTests" style="display:none;border:0">
					<small>
					If yes to JUnit Tests, tests will be performed during build
				to validate results and will be refected in build results on
				download page and build detail pages.
					</small>
					</div>
				</td>
			</tr> 

			<tr>
				<td><img src="/modeling/images/numbers/6.gif" /></td>
				<td>&#160;</td>
				<td><b>Email?</b></td>
				<td>&#160;</td>
				<td colspan="1"><input name="build_Email" size="20" maxlength="80"/></td>
				<td width="300"><small><a id="divToggle_email" name="divToggle_email" href="javascript:toggleDetails('email')">[+]</a></small>
					<div id="divDetail_email" name="divDetail_email" style="display:none;border:0">
					<small>Add your email (or comma-separated emails) to be notified when done. See <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=210396">bug 210396</a>.
					</small>
					</div>
				</td>
			</tr>

<?php if ($debugb) { ?>
			<tr>
				<td colspan="6"><hr noshade size=1/></td>
			</tr>
			<tr valign="top">
				<td><img src="/modeling/images/numbers/6.gif" /></td>
				<td>&#160;</td>
				<td colspan="5"><table>
					<tr>
						<td colspan=3><b>Debug Options:</b></td>
					</tr>
					<tr>
						<td colspan=1>org.eclipse.*.common.releng branch:<br><small>-commonRelengBranch</small></td>
						<td>&#160;</td>
						<td><input size="15" name="build_common_releng_branch" value=""></td><td><small> Enter Tag/Branch/Version, eg., build_200409171617, R1_0_maintenance</small></td>
					</tr>
					<tr>
						<td colspan=1>org.eclipse.*.releng branch:<br><small>-projRelengBranch</small></td>
						<td>&#160;</td>
						<td><input size="15" name="build_proj_releng_branch" value=""></td><td><small> Enter Tag/Branch/Version, eg., build_200409171617, R1_0_maintenance</small></td>
					</tr>
					<tr>
						<td colspan=1>org.eclipse.* branch:<br><small>-branch</small></td>
						<td>&#160;</td>
						<td><input size="15" name="build_Branch_Override" value=""></td><td><small> Enter Tag/Branch/Version, eg., build_200409171617, R1_0_maintenance</small></td>
					</tr>
					<tr>
						<td colspan=1>Keep tempfiles?<br><small>-noclean</small></td>
						<td>&#160;</td>
						<td><input type="checkbox" name="build_noclean" value="Y" checked></td>
					</tr>
				</table></td>
			</tr>
<?php } ?>

			<tr>
				<td>&#160;</td>
				<td colspan=2 align=center><input type="button" value="<?php if ($previewOnly) { print "Preview Only"; } else { print "Build"; } ?>" onclick="doSubmit()"></td>
			</tr>
			<tr>
				<td>&#160;</td>
			</tr>
	</form>
</table>
<script language="javascript">

function showfullURL(val)
{
	fullURL = document.getElementById('fullURL');
	fullURL.innerHTML = val ? "&#160;--&gt; " + val + " &lt;--" : "&#160;";
}

function setNote(val) 
{
    note = document.getElementById('note');
	if (val == "emf" || val == "net4j") 
		note.innerHTML = "Requires 1 SDK: Eclipse"
	else if (val == "eodm" || val == "uml2" || val == "xsd" || val == "compare" || val == "teneo")
		note.innerHTML = "Requires 2 SDKs: Eclipse & EMF"
	else if (val == "ocl") 
		note.innerHTML = "Requires 4 SDKs: Eclipse, EMF, UML2, Orbit"
	else if (val == "cdo") 
		note.innerHTML = "Requires 3 SDKs: Eclipse, EMF, Net4j"
	else if (val == "query" || val == "validation") 
		note.innerHTML = "Requires 3 SDKs: Eclipse, EMF, OCL"
	else if (val == "transaction") 
		note.innerHTML = "Requires 3 SDKs: Eclipse, EMF, Validation"
	else if (val == "mwe")
		note.innerHTML = "Requires 4 SDKs: Eclipse, EMF, Orbit, WTP"
	else if (val == "search")
		note.innerHTML = "Requires 5 SDKs: Eclipse, EMF, UML2, OCL, GMF"
	else
		note.innerHTML = "Requires at least 2 SDKs: Eclipse, EMF, ..."
}

function branchToDivNum() 
{
  return document.forms.buildForm.build_Branch.value.substring(0,3).replace(".","");
}

function setCheckbox(field,bool) 
{
	if (document.forms.buildForm && document.forms.buildForm.elements[field] && document.forms.buildForm.elements[field].type=="checkbox")
	{
		document.forms.buildForm.elements[field].checked=bool;
	}
}

function doBranchSelected(field) {
  val=field.options[field.selectedIndex].text;
  pickDefaultBranch(val);
  pickDefaultJavaHome(val);
}

function pickDefaultBranch(val) {
	with (document.forms.buildForm) { 
		if (val.indexOf(" | ")>0) { 
			build_Branch.value=val.substring(val.indexOf(" | ")+3,val.lastIndexOf(" | ")); // since the text label shown in the select box is not available for POST, store it here
		} else {
			build_Branch.value=val; // since the text label shown in the select box is not available for POST, store it here
		}
	}
}

function checkdisabled(obj) 
{
	return !obj.disabled;
}

function pickDefaultJavaHome(val) {
	with (document.forms.buildForm) { 
		if (val.indexOf(" | ")>0) { 
			build_Java_Home.value=val.substring(3+val.lastIndexOf(" | ")); // since the text label shown in the select box is not available for POST, store it here
		} else {
			build_Java_Home.value=val; // since the text label shown in the select box is not available for POST, store it here
		}
		return build_Java_Home.value;
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

function doSubmit() {
  answer = true;
  with (document.forms.buildForm) { 
	  tofocus="build_Run_Tests_JUnit";
	  if (!elements[tofocus]){
	    tofocus="build_Run_Tests_JUnit";
	  }
	  if (elements[tofocus] && elements[tofocus].checked==false // if not running JUnit tests
			&& build_Build_Type.options[build_Build_Type.selectedIndex].value!='N' // and not a Nightly
		) {
		answer = confirm(
			'Are you sure you want to run a '+build_Build_Type.options[build_Build_Type.selectedIndex].text+"\n"+
			'build without running JUnit tests?');
	  } else {
	    tofocus=null;
	  }
  }
  if (answer) { 
	document.forms.buildForm.submit();
  } else if (tofocus) {
	document.forms.buildForm.elements[tofocus].focus();
  }
}

function doOnLoadDefaults() {
  field=document.forms.buildForm.build_CVS_Branch;   doBranchSelected(field);
  field=document.forms.buildForm.build_Mapfile_Rule; 
  field.selectedIndex=<?php echo isset($options["Mapfile_Rule_Default"]) ? $options["Mapfile_Rule_Default"] : 1; ?> 
  setNote('<?php echo $projct; ?>');
  setCheckbox("build_Run_Tests_JUnit",true);
}

setTimeout('doOnLoadDefaults()',1000);

</script>
<?php 
} 
else 
{ // page two, form submission results
	
	/****************************** END OF PAGE ONE / START OF PAGE TWO **********************************/

	$newDependencies = splitDependencies($_POST["build_Dependencies_URL_New"]);
	$dependencyURLs = getDependencyURLs($_POST["build_Dependencies_URL"],$newDependencies,$dependenciesURLsFile);	

	$buildTimestamp = date("YmdHi");

	$ID = $_POST["build_Build_Type"].$buildTimestamp;
	$BR = $_POST["build_Branch"]; # 2.1.0
		
	$BR_suffix = "_".str_replace(".","",substr($BR,0,3));
	$_POST["build_Branch"] = ($_POST["build_Branch"]?$_POST["build_Branch"]:$_POST["build_CVS_Branch"]); # 2.1.0 or HEAD?
		
	$logfile = '/downloads/drops/'.$BR.'/'.$ID.'/buildlog.txt';

	if (!$previewOnly)
	{
		print '<p>Logfile is <a href="/'.$PR.$proj.$logfile.'">'.$workDir.$PR.$proj.$logfile.'</a></p>';
	}
?>

	<ul>
		<li><a href="/<?php print $PR; ?>/downloads/?project=<?php print $projct; ?>&amp;sortBy=date&amp;hlbuild=0#latest">You can view, explore, or download your build here</a>.
		Here's what you submitted:</li>

<?php
		print "<ul>\n";
		$i=2;
		foreach ($_POST as $k => $v)
		{
			if (strstr($k, "build_") && trim($v) != "" && !strstr($k, "_Sel"))
			{
				$lab = str_replace("_", " ", substr($k, 6));
				$val = $k == "build_Dependencies_URL_New" ? $newDependencies : $v;
				print "<li>";
				print (is_array($val) ?
				"<b>" . $lab . ":</b>" . "<ul>\n<li><small>" . join("</small></li>\n<li><small>", $val) . "</small></li>\n</ul>\n" : 
				"<div>" . $val . "</div>" . "<b>" . $lab . ":</b>");
				print "</li>\n";
				$i++;
			}
		}

		print "<li><div>" . $_SERVER["REMOTE_ADDR"] . "</div><b>Your IP:</b></li>\n";
		print "</ul>\n";
		print "</ul>\n";

		$branches = getBranches($options);

		if ($branches["HEAD"] == $_POST["build_CVS_Branch"]) { $_POST["build_CVS_Branch"] = "HEAD"; }
		
	// fire the shell script...

	/** see http://ca3.php.net/manual/en/function.exec.php **/

	// create the log dir before trying to log to it
	$preCmd = 'mkdir -p '.$workDir.$PR.$proj.'/downloads/drops/'.$BR.'/'.$ID.'/eclipse ;';
	$topProjActual = $topProj == "emft" ? "emf" : $topProj; // when we're building EMFT but it's actually in EMF cvs repo
	$cmd = ($isBuildDotEclipseServer ? '' : '/bin/bash -c "exec /usr/bin/nohup /usr/bin/setsid '.$workDir.'modeling/scripts/start.sh') .
	' -proj ' . $topProjActual . ' -sub '.$projct.
	' -version '.$BR.
	' -branch '.($_POST["build_Branch_Override"]!=""?$_POST["build_Branch_Override"]:$_POST["build_CVS_Branch"]).
	$dependencyURLs.
	($_POST["build_Run_Tests_JUnit"]=="Y" || $_POST["build_Run_Tests_JUnit".$BR_suffix]=="Y" ?' -antTarget run':' -antTarget runWithoutTest').
	($_POST["build_Build_Alias"]?' -buildAlias '.$_POST["build_Build_Alias"]:"").	// 2.0.2, for example
	' -mapfileRule '.$_POST["build_Mapfile_Rule"]. // pass in use-false, gen-true, gen-false
	' -buildType '.$_POST["build_Build_Type"].
	' -javaHome '.$_POST["build_Java_Home"].
	' -downloadsDir '.$downloadsDir. // use central location
	' -buildDir '.$workDir.$PR.$proj.'/downloads/drops/'.$BR.'/'.$ID.
	' -writableBuildRoot '.$writableBuildRoot.
	' -buildTimestamp '.$buildTimestamp.
	($_POST["build_Email"]!=""?' -email '.$_POST["build_Email"]:'').
	' -basebuilderBranch '.($_POST["build_basebuilder_branch"]!=""?$_POST["build_basebuilder_branch"]:$options["BaseBuilderBranch"]).
	($_POST["build_common_releng_branch"]!=""?' -commonRelengBranch '.$_POST["build_common_releng_branch"]:'').
	($_POST["build_proj_releng_branch"]!=""?' -projRelengBranch '.$_POST["build_proj_releng_branch"]:'').
	($_POST["build_emf_old_tests_branch"]!=""?' -emfOldTestsBranch '.$_POST["build_emf_old_tests_branch"]:'').
	($_POST["build_noclean"]=="Y"?' -noclean':'').
	($isBuildDotEclipseServer ? '' : ' >> '.$workDir.$PR.$proj.$logfile.' 2>&1 &"');	// logging to unique files
	if ($previewOnly)
	{
		print '</div><div class="homeitem3col">'."\n";
		print "<h3>Build Command (Preview Only)</h3>\n";
		if (!$isBuildDotEclipseServer){
			print "<p><small><code>$preCmd</code></small></p>";
		}
	}
	else if (!$isBuildDotEclipseServer)
	{
		exec($preCmd);
	}
	if ($previewOnly)
	{
		print "<p><small><code>".preg_replace("/\ \-/","<br> -",$cmd)."</code></small></p>";
	}
	else if (!$isBuildDotEclipseServer)
	{
		exec($cmd);
	}
			
	if (!$previewOnly && $isBuildDotEclipseServer)
	{
		$lockfile = "/opt/public/modeling/tmp/" . $topProj . "-" . $projct . "_" . $BR . ".lock.txt"; // mdt-eodm_2.0.0.lock.txt
		// check if lock file exists for this build type
		if (is_file($lockfile))
		{
			print '</div><div class="homeitem3col">'."\n";
			print "<h3><b style=\"color:orange;background-color:white\">&#160;WARNING!&#160;</b> Another build is already in progress.</h3>\n";
			print "<p>Lockfile: <u>$lockfile</u></p>";
			print "<p><small><code>";
			foreach (file($lockfile) as $line) 
			{ 
				print "$line\n"; 
			}
			print "</code></small></p>";
					
		}
		else // create lockfile
		{
			print '</div><div class="homeitem3col">'."\n";
			$fp = fopen($lockfile, "w");
			fputs($fp, $cmd . "\n");
			fclose($fp);
			$fp = null;
			$fp = file($lockfile);
			if (is_array($fp) && sizeof($fp)>0)
			{
				print "<h3><b style=\"color:green;background-color:white\">&#160;OK!&#160;</b> Build will start in one minute.</h3>\n";
				print "<p>Lockfile: <u>$lockfile</u></p>";
				print "<p><small><code>".preg_replace("/\ \-/","<br> -",$cmd)."</code></small></p>";
			}
			else
			{
				print "<h3><b style=\"color:red;background-color:white\">&#160;ERROR!&#160;</b> Could not write to lockfile!</h3>\n";
				print "<p>Lockfile: <u>$lockfile</u></p>";
				print "<p><small><code>".preg_replace("/\ \-/","<br> -",$cmd)."</code></small></p>";
			}
		}
		if (is_file($lockfile))
		{
			if (!chmod($lockfile, 0666))
			{
				print "<p><b style=\"color:red;background-color:white\">&#160;ERROR!&#160;</b> Could not set permission on lockfile; must delete manually. Contact codeslave{at}ca.ibm.com for assistance.</p>";
			}
		}
	}
} // end else

print "</div>\n</div>\n";

print "<div id=\"rightcolumn\">\n";

print "<div class=\"sideitem\">\n";
print "<h6>Options</h6>\n";
print "<ul>\n";
print "<li><a href=\"?project=$projct&amp;debugb=1\">debug build</a></li>\n";
print "<li><a href=\"?project=$projct&amp;previewOnly=1\">preview build</a></li>\n";
print "<li><a href=\"?project=$projct&amp;debugb=1&previewOnly=1\">preview debug build</a></li>\n";
print "<li><a href=\"?project=$projct\">normal build</a></li>\n";
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

$pageTitle = $componentName . " - New Build";
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

/************************** METHODS *****************************************/

// if user submitted values by text entry, split them on newline, space or comma and return as an array
function splitDependencies($entered) {
	if (false!==strpos($entered,"\n")) {
		$entered = explode("\n",$entered);
	} else if (false!==strpos($entered," ")) {
		$entered = explode(" ",$entered);
	} else if (false!==strpos($entered,",")) {
		$entered = explode(",",$entered);
	} else {
		$entered = array($entered); // cast to array
	}
	return $entered;
}

// if user submitted values by selection, collect them
// if user submitted values by text entry, collect them and write back into file for storage
// return a string in the form "-URL http://... -URL http://..."
function getDependencyURLs($chosen, $entered, $file) {
	if (!$chosen) $chosen = array();
	if (!is_array($chosen)) $chosen = array($chosen); // cast to array if not already 
	
	$origSize = 0;
	$newSize = 0;
	
	// load values from $entered into $chosen
	if ($entered) {
		$lines = trimmed_read($file);
		$origSize = sizeof($lines);
//		foreach ($lines as $line) print "<i>. $line</i><br/>\n";
		foreach ($entered as $url) {
			// add to $chosen
			$urlFixed = trim($url);
			if ($urlFixed) {
				$urlFixed = preg_replace("#.+://((fullmoon|fullmoon.+|emf.torolab.ibm.com|emft.eclipse.org|build.eclipse.org)[^/]+)/#","http://download.eclipse.org/",$urlFixed);
				$urlFixed = preg_replace("#.+&url=([^&=]+).*#","$1",$urlFixed);
				$urlFixed = preg_replace("#http://www.eclipse.org/downloads/download.php\?file=/#","http://download.eclipse.org/",$urlFixed);
				$chosen[] = $urlFixed;
			}
			// add to file, if it exists and is writable
			if (is_writable($file) && sizeof($lines)>0) {
				$catg = findCatg($urlFixed);
				if ($catg && $urlFixed && !in_array("$catg=$urlFixed",$lines)) {
					$lines[] = "$catg=$urlFixed"; // don't add a blank entry!
				}
			}					
		}
		$newSize = sizeof($lines);
	}
	
	rsort($lines); reset($lines);
	$lines = array_unique($lines); // remove duplicate entries

//	foreach ($chosen as $e) print "<i>. $e</i><br/>\n";
	if ($newSize > $origSize) {
		updateDependenciesFile($file,$lines);
	}
	
	$ret = "";
	foreach ($chosen as $choice) {
		if ($choice) $ret .= " -URL ".$choice;
	}
	return $ret;
}

function findCatg($url) {
	$matches = array(
		"13wtp" => "emft-mwe-",
		"12wtp" => "wtp-",
		"11gmf" => "GMF-",
		"10gef" => "GEF-",
		"09net4j" => "emft-net4j-",
		"08validation" => "emf-validation-|emft-validation-",
		"07transaction" => "emf-transaction-|emft-transaction-",
		"06query" => "emf-query-|emft-query-",
		"05ocl" => "mdt-ocl-|emft-ocl-",
		"04orbit" => "orbit-",
		"03uml2" => "mdt-uml2-|uml2-",
		"02emf" => "emf-sdo-xsd-",
		"01eclipse" => "eclipse-",
		"99other" => "/"
	);
	foreach ($matches as $catg => $match) { 
		if (false!==strpos($url,$match) || preg_match("#(".$match.")#",$url)) {
			return $catg;
		}
	}
}

function updateDependenciesFile($file,$lines) {
	if (is_writable($file) && $lines && sizeof($lines)>0) {
		$f = fopen($file, "w");
		foreach ($lines as $line) {
			fwrite($f,$line."\n");
		}
		fclose($f);
	}	
}
function displayCheckboxes($label,$options,$divSuffix="") {
	$matches = null;
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
			{  // split line so that foo=bar becomes <input type="checkbox" name="bar" value="Y">foo
				$matches=null;
				preg_match("/([^\=]+)\=([^\=]*)/",$opt,$matches);
				print "\n\t<input id=\"".$label."_".trim($matches[2]).$divSuffix."\" type=\"checkbox\" "."name=\"".$label."_".trim($matches[2]).$divSuffix."\" value=\"Y\">".trim($matches[1]);
			} else { // turn foo into <input type="checkbox" name="foo" value="Y">foo</option>
				print "\n\t<input id=\"".$label."_".$opt.$divSuffix."\" type=\"checkbox\" "."name=\"".$label."_".$opt.$divSuffix."\" value=\"Y\">".$opt;
			}
			print "<br/>\n";
		}
	}
}

function displayOptionsTriplet($options) {
	$matches = null;
	if ($options["reversed"]) {
		// pop that item out
		array_shift($options);
		$options = array_reverse($options);
	}

	$showValues = true;
	foreach ($options as $o => $option) {
		$opt = $option;
		$isSelected = false;
		if (!preg_match("/\-\=[\d\.]+/",$opt)) { 
			if (strstr($opt,"|selected")) {  // remove the |selected keyword
				$isSelected=true;
				$opt = substr($opt,0,strpos($opt,"|selected"));
			}
			if (false!==substr($opt,"=")) {  // split line so that foo=bar becomes <option value="bar">foo</option>
				$matches = null;
				preg_match("/([^\=]+)\=([^\=]+)\,([^\,]+)/",$opt,$matches);
				if (false !== strpos($matches[2],"--"))
				{
					$showValues =  ($matches[1] == $_SERVER["SERVER_NAME"]); 
				}
				else if ($showValues)
				{
					print "\n\t<option ".($isSelected?"selected ":"")."value=\"".trim($matches[2])."\">".
				  			trim($matches[2])." | ".trim($matches[1])." | ".trim($matches[3])."</option>";
				}
			} else { // turn foo into <option value="foo">foo</option>
				print "\n\t<option ".($isSelected?"selected ":"")."value=\"".$opt."\">".$opt."</option>";
			}
		}
	}
}

// compare project index, then datestamps
function compareURLs($a, $b) {
   $aPF = substr($a,0,strpos($a,"="));
   $bPF = substr($b,0,strpos($b,"="));
   $aDS = preg_replace("/.+([0-9]{12}|[0-9]{8}\-[0-9]{4}).+/","$1",$a);
   $bDS = preg_replace("/.+([0-9]{12}|[0-9]{8}\-[0-9]{4}).+/","$1",$b);
   return $aPF == $bPF ? ($aDS < $bDS ? 1 : -1) : ($aPF > $bPF ? 1 : -1);  
}

function displayURLs($options,$verbose=false) {
	if ($options["reversed"]) {
		// pop that item out
		array_shift($options);
		$options = array_reverse($options);
	}

	usort($options, "compareURLs"); reset($options);
	//sort($options); reset($options);
	
	$matches=null;
	$currCatg="";
	foreach ($options as $o => $option) {
		$opt = $option;
		if (strstr($opt,"=")) {  // split line so that foo=bar becomes <option value="bar">foo</option>
			$matches=null;preg_match("/([^\=]+)\=([^\=]*)/",$opt,$matches);
			$catg = substr(trim($matches[1]), 2);
			if ($catg!=$currCatg) {
				if ($currCatg!="") 
					print "\n\t<option "."value=\""."\"></option>";
				print "\n\t<option "."value=\""."\"> -- ".$catg." -- </option>";
				$currCatg=$catg;
			}	
			print "\n\t<option "."value=\"".trim($matches[2])."\">".substr(trim($matches[2]),6+strpos(trim($matches[2]),"drops"))."</option>";
		} else if (strstr($opt,"http") && strstr($opt,"drops")) { // turn http://foo/bar.zip into <option value="http://foo/bar.zip">bar.zip</option>
			print "\n\t<option "."value=\"".$opt."\">".
				substr($opt,6+strpos($opt,"drops"))."</option>";
		} else { // turn foo into <option value="foo">foo</option>
			print "\n\t<option "."value=\"".$opt."\">".$opt."</option>";
		}
	}
}

function trimmed_read($file) {		
	$lines = array();
	if (is_writable($file) && is_readable($file)) { 
		$f = fopen($file, "r");
		if ($f) {
			while (!feof($f) && ($line = trim(fgets($f, 4096))) ) $lines[] = $line;
			fclose($f);
		} else die( "Problem reading from: $file");
	}
	return $lines;
}

function loadOptionsFromFile($file1)
{ 
	$sp = array ();
	if (is_file($file1))
	{
		$sp = file($file1);
	}
	$options = loadOptionsFromArray($sp);
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
			if (preg_match("/\[([a-zA-Z0-9\_\|]+)\]/", $s, $matches))
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
	foreach ($options["BranchAndJDK"] as $br => $branch)
	{
		$arr[getValueFromOptionsString($branch, "name")] = getValueFromOptionsString($branch, "value");
	}
	return $arr;
}


?>