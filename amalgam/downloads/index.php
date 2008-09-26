<?php
require_once ("../../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();
?>

<div id="midcolumn">
	<h1>Amalgam Packages</h1>
	<table width="100%">
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td align="top">
			Amalgam packages come in two flavors: the Eclipse Packaging Project style in the case of the Eclipse Modeling Tools download, and custom 
			Eclipse product bundles tailored to specific modeler audiences.  This page provides links to the latest milestone build for each.
			</td>
		</tr>
	</table><hr/>
	
	<div class="homeitem3col">
	<table width="100%">
		<tr>
			<td><img align="top" src="http://www.eclipse.org/modeling/images/modeling_about.png"></td>
			<td>Eclipse Modeling Tools package</td>
			<td><a href="http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/ganymede/SR1/eclipse-modeling-ganymede-SR1-incubation-win32.zip">Windows</a></td>
			<td><a href="http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/ganymede/SR1/eclipse-modeling-ganymede-SR1-incubation-macosx-carbon.tar.gz">Mac OS X</a></td>
			<td><a href="http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/ganymede/SR1/eclipse-modeling-ganymede-SR1-incubation-linux-gtk.tar.gz">Linux 32bit</a></td>
			<td><a href="http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/ganymede/SR1/eclipse-modeling-ganymede-SR1-incubation-linux-gtk-x86_64.tar.gz">Linux 64bit</a></td>
		</tr>
		<tr>
			<td><img align="top" src="http://www.eclipse.org/modeling/images/modeling_about.png"></td>
			<td>DSL Toolkit</td>
			<td><a href="http://download1.eclipse.org/modeling/amalgam/dsltk/downloads/drops/I200809231534/dsltk-incubation.win32.win32.x86.zip">Windows</a></td>
			<td><a href="http://download1.eclipse.org/modeling/amalgam/dsltk/downloads/drops/I200809231534/dsltk-incubation.macosx.carbon.x86.tar.gz">Mac OS X</a></td>
			<td><a href="http://download1.eclipse.org/modeling/amalgam/dsltk/downloads/drops/I200809231534/dsltk-incubation.linux.gtk.x86.tar">Linux 32bit</a></td>
			<td/>
		</tr>
		<tr>
			<td><img align="top" src="http://www.eclipse.org/modeling/images/modeling_about.png"></td>
			<td>Modeler</td>
			<td><a href="http://download1.eclipse.org/modeling/amalgam/modeler/downloads/drops/I200809231520/modeler-incubation.win32.win32.x86.zip">Windows</a></td>
			<td><a href="http://download1.eclipse.org/modeling/amalgam/modeler/downloads/drops/I200809231520/modeler-incubation.macosx.carbon.x86.tar.gz">Mac OS X</a></td>
			<td><a href="http://download1.eclipse.org/modeling/amalgam/modeler/downloads/drops/I200809231520/modeler-incubation.linux.gtk.x86.tar">Linux 32bit</a></td>
			<td/>
		</tr>
	</table>
	</div>

</div>

<div id="rightcolumn">
	<br />
	<div class="sideitem">
	   <h6>Incubation</h6>
	   <p>Amalgam is currently in the <a href="http://www.eclipse.org/projects/dev_process/validation-phase.php">Validation (Incubation) Phase</a>.</p> 
	   <div align="center"><a href="http://www.eclipse.org/projects/what-is-incubation.php"><img 
	        align="center" src="http://www.eclipse.org/images/egg-incubation.png" border="0"/></a>
	   </div>
	</div>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - Amalgam - Downloads";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Richard Gronback";

# Generate the web page
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
