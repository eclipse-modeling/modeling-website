<?php
require_once ("../../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();
?>

<div id="midcolumn">
	<h1>Ganymede Amalgam Packages</h1>
	<table width="100%">
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td align="top">
			Amalgam packages used to come in two flavors: the Eclipse Packaging Project style in the case of the Eclipse Modeling Tools download, and custom 
			Eclipse product bundles tailored to specific modeler audiences. Since Helios, the Amalgam project primary focus is on the EPP Eclipse Modeling Tools download.</td>
		</tr>
		<tr>
			<td align="top">
			<i>As you can see from the egg image to the right, Amalgam is a project in incubation.  Each of the downloads below <b>contains code from an incubating Eclipse project or component</b>.</i>
			</td>
		</tr>
	</table><hr/>
	
	<table width="100%">
		<tr>
			<td><img align="top" src="http://www.eclipse.org/modeling/images/modeling_about.png"></td>
			<td colspan="5" width="200"><b>Eclipse Modeling Tools</b></td>
		</tr>
		<tr>
			<td/>
			<td colspan="5">An all-in-one modeling package delivered by the <a href="http://www.eclipse.org/epp">Eclipse Packaging Project</a> that includes the full SDKs for most Modeling projects. Based on the Ganymede SR1 release.</td>
		</tr>
		<tr>
			<td/>
			<td><a href="http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/ganymede/SR1/eclipse-modeling-ganymede-SR1-incubation-win32.zip">Windows</a></td>
			<td><a href="http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/ganymede/SR1/eclipse-modeling-ganymede-SR1-incubation-macosx-carbon.tar.gz">Mac OS X</a></td>
			<td><a href="http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/ganymede/SR1/eclipse-modeling-ganymede-SR1-incubation-linux-gtk.tar.gz">Linux 32bit</a></td>
			<td><a href="http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/ganymede/SR1/eclipse-modeling-ganymede-SR1-incubation-linux-gtk-x86_64.tar.gz">Linux 64bit</a></td>
		</tr>
		<tr/><tr/><tr/>
		<tr>
			<td><img align="top" src="http://www.eclipse.org/modeling/images/modeling_about.png"></td>
			<td colspan="5" width="200"><b>DSL Toolkit</b></td>
		</tr>
		<tr>
			<td/>
			<td colspan="5">A set of modeling technologies delivered as an Eclipse product that focuses on the needs of a modeling Toolsmith; that is, it provides EMF, GMF, OCL, QVT, Xpand, UML and other capabilities.</td>
		</tr>		
		<tr>
			<tr>
			<td/>
			<td><a href="http://www.eclipse.org/downloads/download.php?file=/modeling/amalgam/dsltk/downloads/drops/S20090703-0844/dsltk-1.0.0M8-incubation-win32.win32.x86.zip">Windows</a></td>
			<td><a href="http://www.eclipse.org/downloads/download.php?file=/modeling/amalgam/dsltk/downloads/drops/S20090703-0844/dsltk-1.0.0M8-incubation-macosx-cocoa-x86.tar.gz">Mac OS X</a></td>
			<td><a href="http://www.eclipse.org/downloads/download.php?file=/modeling/amalgam/dsltk/downloads/drops/S20090703-0844/dsltk-1.0.0M8-incubation-linux-gtk-x86.tar.gz">Linux 32bit</a></td>
			<td><a href="http://www.eclipse.org/downloads/download.php?file=/modeling/amalgam/dsltk/downloads/drops/S20090703-0844/dsltk-1.0.0M8-incubation-linux-gtk-x86_64.tar.gz">Linux 64bit</a></td>
		</tr>	
	</table>

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