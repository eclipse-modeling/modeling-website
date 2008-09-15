<?php
require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

function getComponents($project, $doDownloadLink = false)
{
	$components = loadDirSimple("../" . $project, ".*", "d");
	sort($components); reset($components);
	$excludes = array("downloads", "CVS", "build", "docs", "faq", "feeds", "images", "includes", "javadoc", "news", "project-info", "updates", "tests");
	$out = "";
	$cnt=0;
	foreach ($components as $component)
	{
		if (!in_array($component,$excludes))
		{
			if ($out) 
			{
				$out .= ", ";
			}
			if ($cnt % 5 == 0)
			{
				$out .= "<br/>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;";
			}
			$cnt++;
			$out .= $doDownloadLink ? "<a href=\"../$project/downloads/?project=$component\">$component</a>" : 
				"<a href=\"../$project/?project=$component#$component\">$component</a>";
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

	<h1>All-In-One Solutions</h1>

	<p><table cellpadding="2"><tr valign="top">
		<td><img src="/modeling/images/modeling_install_all-in-one.jpg"></td>
		<td>The simplest way to get started with Eclipse Modeling is to download the <br/><a href="http://www.eclipse.org/downloads/packages/eclipse-modeling-tools-includes-incubating-components/ganymeder"><b style="color:green">All-In-One</b> Ganymede Modeling Tools Package</a>.		
			<p>
			<blockquote>	
			<ul>
				<li style="border:0px;padding:2px"><a href="http://www.eclipse.org/modeling/download.php?file=/technology/epp/downloads/release/ganymede/R/eclipse-modeling-ganymede-incubation-win32.zip">Windows 32bit</a></li>
				<li style="border:0px;padding:2px"><a href="http://www.eclipse.org/modeling/download.php?file=/technology/epp/downloads/release/ganymede/R/eclipse-modeling-ganymede-incubation-linux-gtk.tar.gz">Linux 32bit</a></li>
				<li style="border:0px;padding:2px"><a href="http://www.eclipse.org/modeling/download.php?file=/technology/epp/downloads/release/ganymede/R/eclipse-modeling-ganymede-incubation-linux-gtk-x86_64.tar.gz">Linux 64bit</a></li>
				<li style="border:0px;padding:2px"><a href="http://www.eclipse.org/modeling/download.php?file=/technology/epp/downloads/release/ganymede/R/eclipse-modeling-ganymede-incubation-macosx-carbon.tar.gz">Mac OSx</a></li>
				<li style="padding:2px"><a href="http://download.eclipse.org/eclipse/downloads/">Other Platforms...</a></li>
		
			</ul>
			</blockquote>
			</p>
			<p>
				If you already have Eclipse installed, you can update it using the <br/>
				<a href="http://download.eclipse.org/releases/ganymede/"><b style="color:green">All-In-One</b> Ganymede Update Site</a>. 
			</p>
		</td>
	</tr></table></p>

	<hr noshade="noshade" size="1" width="98%"/>

	<h1>Downloads By Project</h1>

	<p><table cellpadding="2"><tr valign="top">
		<td><img src="/modeling/images/modeling_install_individual.jpg"></td>
		<td>
		Or, you can download individual components from their download sites. 
		<p>
			<blockquote>	
			<ul>
<?php 	$projects = array("emf","emft","mdt","m2m","m2t");
		foreach ($projects as $project)
		{ 
			$projectU = strtoupper($project);
			$components = getComponents("$project", true);
			print <<<HTML
				<li style="border:0px;padding:3px">
					<a href="http://www.eclipse.org/modeling/$project/downloads/">$projectU</a>
					$components
				</li>
HTML;
		} ?>
				<li style="border:0px;padding:3px"><a href="http://www.eclipse.org/modeling/gmf/downloads/">GMF</a></li>
			</ul>
			</blockquote>
		</p>
		</td>
	</tr></table></p> 

	<hr noshade="noshade" size="1" width="98%"/>

	<h1>Project Update Sites</h1>
	
	<p><table cellpadding="2"><tr valign="top">
		<td><img src="/modeling/images/modeling_install_bleeding-edge.jpg"></td>
		<td>For bleeding edge updates, use one or more of these update sites. 
		<p>
			<blockquote>
			<ul>
<?php 	$projects = array("emf","emft","mdt","m2m","m2t");
		foreach ($projects as $project)
		{ 
			$projectU = strtoupper($project);
			print <<<HTML
				<li style="border:0px;padding:3px">
					<a href="http://www.eclipse.org/modeling/$project/updates/">$projectU</a>
				</li>
HTML;
		} ?>
				<li style="border:0px;padding:3px"><a href="http://www.eclipse.org/modeling/gmf/updates/">GMF</a></li>
			</ul>
			</blockquote>
		</p> 
	</td>
	</tr></table></p> 
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
			<li><a href="http://wiki.eclipse.org/Ganymede#Projects">Who's Who In Ganymede</a></li>
			<li><a href="http://www.eclipse.org/downloads/packages/compare-packages">What's In The Ganymede Packages</a></li>
			<li><a href="http://wiki.eclipse.org/Equinox_p2_Update_UI_Users_Guide">How To Update Eclipse</a></li>
			<li><a href="http://wiki.eclipse.org/Modeling_Project/Installation">Previous Modeling Releases</a></li>
			<li><a href="http://www.eclipse.org/projects/listofprojects.php">All Eclipse Projects</a></li>
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
	