<?php
require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

function getComponents($project, $doDownloadLink = false)
{
	$components = loadDirSimple("../" . $project, ".*", "d");
	sort($components); reset($components);
	$excludes = array("downloads", "CVS", "build", "docs", "faq", "feeds", "images", "includes", "javadoc", "news", "project-info", "updates", "tests");
	$out = "";
	foreach ($components as $component)
	{
		if (!in_array($component,$excludes))
		{
			if ($out) 
			{
				$out .= ", ";
			}
			$out .= $doDownloadLink ? "<a href=\"../$project/downloads/?project=$component\"><img src=\"/modeling/images/dl.gif\"></a>" : "";
			$out .= "<a href=\"../$project/?project=$component#$component\">$component</a>";
		}
	}
	return $out;
}

ob_start(); ?>

<script language="javascript">
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
</script>

<div id="midcolumn">

	<div class="homeitem" style="clear:both">
	<h3>All-In-One Download</h3>
	
	<p><table cellpadding="2"><tr><td>
		The simplest way to get started with Eclipse Modeling is to download the <a href="http://www.eclipse.org/downloads/packages/eclipse-modeling-tools-includes-incubating-components/ganymeder"><b style="color:green">All-In-One</b> Ganymede Modeling Tools Package</a>.
	</td><td align="right"><a href="http://www.eclipse.org/downloads/packages/eclipse-modeling-tools-includes-incubating-components/ganymeder"><img border="0" src="http://www.eclipse.org/modeling/images/modeling_about.png" alt="Modeling and Model development"></a></td></tr></table> 
	<ul>
		<li style="border:0px;padding:2px"><a href="http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/ganymede/R/eclipse-modeling-ganymede-incubation-win32.zip">Windows 32bit</a></li>
		<li style="border:0px;padding:2px"><a href="http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/ganymede/R/eclipse-modeling-ganymede-incubation-linux-gtk.tar.gz">Linux 32bit</a></li>
		<li style="border:0px;padding:2px"><a href="http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/ganymede/R/eclipse-modeling-ganymede-incubation-linux-gtk-x86_64.tar.gz">Linux 64bit</a></li>
		<li style="padding:2px"><a href="http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/ganymede/R/eclipse-modeling-ganymede-incubation-macosx-carbon.tar.gz">Mac OSx</a></li>
		<div style="float:right"><a href="http://www.eclipse.org/downloads/packages/eclipse-modeling-tools-includes-incubating-components/ganymeder">more info</a></div>
	</ul>
	<br/>
	<p><table cellpadding="2"><tr><td>
		If your platform is not listed, you can <a href="http://download.eclipse.org/eclipse/downloads/">get a copy of Eclipse from its download site</a>, then update it using the <a href="http://download.eclipse.org/releases/ganymede/"><b style="color:green">All-In-One</b> Ganymede Update Site</a>.
	</td>
	<td><a href="http://download.eclipse.org/eclipse/downloads/"><img border="0" width="32" src="http://www.eclipse.org/downloads/images/classic2.jpg" alt="Java, RCP and Plugin development"></a></td></tr></table> 
	<br/>	
	<br/>
	</div>

	<div class="homeitem" style="clear:none">
	<h3>Individual Project Downloads</h3>
	
	<p><table cellpadding="2"><tr><td>
		Or, you can download individual Modeling Project components via their download sites. Click <small>[+]</small> to show contained components & links to individual component downloads. Note that some newly provisioned components may not yet have published a release.
	</td><td align="right"><a href="http://www.eclipse.org/downloads/packages/eclipse-modeling-tools-includes-incubating-components/ganymeder"><img border="0" src="http://www.eclipse.org/modeling/images/modeling_about.png" alt="Modeling and Model development"></a></td></tr></table> 
	<p><ul>
<?php 	$projects = array("emf","emft","mdt","m2m","m2t");
		foreach ($projects as $project)
		{ 
			$projectU = strtoupper($project);
			$components = getComponents("$project", true);
			print <<<HTML
		<li style="border:0px;padding:2px">
			<div style="float: right"><small><a id="divToggle_detailD$project" name="divToggle_detailD$project" href="javascript:toggleDetails('detailD$project')">[+]</a></small></div>
			<a href="http://www.eclipse.org/modeling/$project/downloads/">$projectU Downloads</a>
			<div id="divDetail_detailD$project" name="divDetail_detailD$project" style="display:none;border:0">
				<small><blockquote>$components</blockquote></small>
			</div>
		</li>
HTML;
		} ?>
		<li style="padding:2px"><a href="http://www.eclipse.org/modeling/gmf/downloads/">GMF Downloads</a></li>
	</ul> 
	</div>

	<div class="homeitem" style="clear:both">
	<h3>All-In-One Update Site</h3>
	<p><table cellpadding="2"><tr valign="top"><td>
		If you already have Eclipse installed, you can update it using the 
		<a href="http://download.eclipse.org/releases/ganymede/"><b style="color:green">All-In-One</b> Ganymede Update Site</a>. 
		Note that this site also includes other <a href="http://wiki.eclipse.org/Ganymede#Projects">projects</a>, many of which use or extend Modeling projects.
		
	<ul><li><a href="http://download.eclipse.org/releases/ganymede/"><b style="color:green">All-In-One</b> Ganymede Update Site</a></li>
	<li><a href="http://wiki.eclipse.org/Ganymede#Projects">List Of Projects In Ganymede</a></li>
	<li><a href="http://www.eclipse.org/projects/listofprojects.php">All Eclipse Projects</a></li>
		 
	</td><td valign="top" align="right">
	<a href="http://www.eclipse.org/downloads/packages/eclipse-modeling-tools-includes-incubating-components/ganymeder"><img border="0" src="http://www.eclipse.org/modeling/images/modeling_about.png" alt="Modeling and Model development"></a><br/>
	<a href="http://www.eclipse.org/downloads/packages/eclipse-ide-java-and-report-developers/ganymeder"><img border="0" width="32" src="http://www.eclipse.org/birt/images/jee-birt.jpg" alt="JEE and BIRT reporting and development"></a><br/>
	<a href="http://www.eclipse.org/downloads/packages/eclipse-rcpplug-developers/ganymeder"><img border="0" width="32" src="http://www.eclipse.org/downloads/images/rcp.jpg" alt="RCP and Plugin development"></a><br/>
	<a href="http://www.eclipse.org/downloads/packages/eclipse-ide-cc-developers/ganymeder"><img border="0" width="32" src="http://www.eclipse.org/downloads/images/c.jpg" alt="C/C++ development"></a><br/>
	<a href="http://www.eclipse.org/downloads/packages/eclipse-ide-java-ee-developers/ganymeder"><img border="0" width="32" src="http://www.eclipse.org/downloads/images/jee.jpg" alt="Java and Web development"></a><br/>
	<a href="http://www.eclipse.org/downloads/packages/eclipse-ide-java-developers/ganymeder"><img border="0" width="32" src="http://www.eclipse.org/downloads/images/java.jpg" alt="Java development"></a><br/>
	<a href="http://www.eclipse.org/downloads/packages/eclipse-classic-34/ganymeder"><img border="0" width="32" src="http://www.eclipse.org/downloads/images/classic2.jpg" alt="Java, RCP and Plugin development"></a><br/>
	</td></tr></table>
	
	
	</div>

	<div class="homeitem" style="clear:none">
	<h3>Individual Project Update Sites</h3>
	
	<p><table cellpadding="2"><tr><td>
		Or, for bleeding edge updates, use the Modeling projects' update sites. Click <small>[+]</small> to show contained components. Note that some newly provisioned components may not yet have published a release.
	</td><td align="right"><a href="http://www.eclipse.org/downloads/packages/eclipse-modeling-tools-includes-incubating-components/ganymeder"><img border="0" src="http://www.eclipse.org/modeling/images/modeling_about.png" alt="Modeling and Model development"></a></td></tr></table> 
	<p><ul>
<?php 	$projects = array("emf","emft","mdt","m2m","m2t");
		foreach ($projects as $project)
		{ 
			$projectU = strtoupper($project);
			$components = getComponents("$project");
			print <<<HTML
		<li style="border:0px;padding:2px">
			<div style="float: right"><small><a id="divToggle_detailU$project" name="divToggle_detailU$project" href="javascript:toggleDetails('detailU$project')">[+]</a></small></div>
			<a href="http://www.eclipse.org/modeling/$project/updates/">$projectU Updates</a>
			<div id="divDetail_detailU$project" name="divDetail_detailU$project" style="display:none;border:0">
				<small><blockquote>$components</blockquote></small>
			</div>
		</li>
HTML;
		} ?>
		<li style="padding:2px"><a href="http://www.eclipse.org/modeling/gmf/updates/">GMF Updates</a></li>
	</ul> 
	</div>
</div>

<div id="rightcolumn">
	<div class="sideitem">
	   <h6>Incubation</h6>
	   <p>Components with version less than 1.0 are in their <a href="http://www.eclipse.org/projects/dev_process/validation-phase.php">Validation (Incubation) Phase</a>.</p> 
	   <div align="center"><a href="http://www.eclipse.org/projects/what-is-incubation.php"><img 
	        align="center" src="http://www.eclipse.org/images/egg-incubation.png" 
	        border="0" /></a></div>
	
	</div>
	<div class="sideitem">
		<h6>More Downloads</h6>
		<ul>
			<li><a href="http://www.eclipse.org/downloads/packages/">All Ganymede Packages</a></li>
			<li><a href="http://download.eclipse.org/eclipse/downloads/">Eclipse Platform Downloads</a></li>
		</ul>
	</div>
	
	<div class="sideitem">
		<h6>More Modeling</h6>
		<ul>
			<li><a href="http://www.eclipse.org/mddi/">MDDi</a> <a href="http://www.eclipse.org/mddi/download.php">Downloads</a></li>
			<li><a href="http://www.eclipse.org/gmt/">GMT</a> <a href="http://www.eclipse.org/gmt/download/">Downloads</a></li>
			<li><a href="http://www.eclipse.org/modeling/tmf/">TMF</a> <acronym title="No downloads yet!"><span style="color:gray">Downloads</span></acronym></li>
			<li><a href="http://wiki.eclipse.org/Modeling_Corner">Modeling Corner</a></li>
		</ul>
	</div>
	
	<div class="sideitem">
		<h6>More Info</h6>
		<ul>
			<li><a href="http://www.eclipse.org/downloads/packages/compare-packages">What's In The Ganymede Packages</a></li>
			<li><a href="http://wiki.eclipse.org/Equinox_p2_Update_UI_Users_Guide">How To Update Eclipse</a></li>
			<li><a href="http://wiki.eclipse.org/Modeling_Project/Installation">Previous Modeling Releases</a></li>
		</ul>
	</div>
	
	
</div>

<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - Downloads";
$pageKeywords = ""; 
$pageAuthor = "";
$App->Promotion = FALSE;
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
$App->generatePage("Lazarus", $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
	