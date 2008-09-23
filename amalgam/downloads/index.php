<?php
require_once ("../../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();
?>

<div id="midcolumn">
	<h1>Amalgam Packages</h1>
	<table border="1" width="100%">
	<tr>
	  <th>Package</th>
	  <th>Windows</th>
	  <th>Linux 32 GTK</th>
	  <th>Mac OS X</th>
	</tr>
	<tr>
	 <td>DSL Toolkit (I200809231534)</td>
	 <td style="background-color: rgb(204, 255, 204);">
	   <a href="http://download1.eclipse.org/modeling/amalgam/dsltk/downloads/drops/I200809231534/dsltk--incubation.win32.win32.x86.zip">package</a> 
	 </td>
	 <td style="background-color: rgb(204, 255, 204);">
	   <a href="http://download1.eclipse.org/modeling/amalgam/dsltk/downloads/drops/I200809231534/dsltk-incubation.linux.gtk.x86.tar">package</a> 
	 </td>
	 <td style="background-color: rgb(204, 255, 204);">
	   <a href="http://download1.eclipse.org/modeling/amalgam/dsltk/downloads/drops/I200809231534/dsltk-incubation.macosx.carbon.x86.tar.gz">package</a> 
	 </td>
	</tr>
	<tr>
	 <td>Modeler (I200809231520)</td>
	 <td style="background-color: rgb(204, 255, 204);">
	   <a href="http://download1.eclipse.org/modeling/amalgam/modeler/downloads/drops/I200809231520/modeler-incubation.win32.win32.x86.zip">package</a> 
	 </td>
	 <td style="background-color: rgb(204, 255, 204);">
	   <a href="http://download1.eclipse.org/modeling/amalgam/modeler/downloads/drops/I200809231520/modeler-incubation.linux.gtk.x86.tar">package</a> 
	 </td>
	 <td style="background-color: rgb(204, 255, 204);">
	   <a href="http://download1.eclipse.org/modeling/amalgam/modeler/downloads/drops/I200809231520/modeler-incubation.macosx.carbon.x86.tar.gz">package</a> 
	 </td>
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
