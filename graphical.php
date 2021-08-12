<?php  																														
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	
if (is_file($_SERVER['DOCUMENT_ROOT'] . "/projects/common/project-info.class.php")) 
{
	require_once($_SERVER['DOCUMENT_ROOT'] . "/projects/common/project-info.class.php");
}
$App = new App(); $Nav = new Nav(); $Menu = new Menu(); 
if (class_exists("ProjectInfo"))
{
	$projectInfo = new ProjectInfo("modeling");
	$projectInfo->generate_common_nav( $Nav );
}		
include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# index.php
	#
	# Author: 		Richard Gronback (with edits by Nick Boldt)
	# Date:			2006-05-11
	#
	# Description: Modeling project homepage
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Graphical Modeling";
	$pageKeywords	= "modeling, UML, UML2, MDD, MDA, model-driven";
	$pageAuthor		= "Richard Gronback";
	
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML


<div id="maincontent">
	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<table>
		<tr>
		<td><p>The domain model often needs to be visualized in a graphical way, such as in a diagram editor.  This is especially true when implementing tools. The following frameworks provide support to implement graphical views for your EMF-based domain model that can be embedded into your tool or application.</p>
		</td>
		<td align="right"><img src="http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg">
		</td>
		</table>
		<div class="homeitem3col">
		  <h2>GLSP</h2>
            <table>
                <tbody><tr>
                <td style="padding-right:20px">
                <img width="100" margin-right="20" src="https://www.eclipse.org/glsp/images/logo.png">
                </td>
                <td>
                <p>
                    The Graphical Language Server Platform (GLSP) enables diagram editors in the web/browser. It integrates well with existing graphical modeling editors based on EMF, but also supports the development of browser-based diagram editors from scratch. GLSP-based diagram editors can be hosted stand-alone or embedded into web-based tools such as <a href="https://eclipsesource.com/technology/eclipse-theia/">Eclipse Theia</a>
                <a href="https://www.eclipse.org/glsp/">Learn more...</a>
                </p></td>
                </tr>
                </tbody></table>
          <h2>Eclipse Sirius</h2>
                <table>
                <tbody><tr>
                <td style="padding-right:20px">
                <a href="https://www.eclipse.org/sirius"><img width="100" margin-right="20" src="https://www.eclipse.org/sirius/common_assets/images/logos/logo_sirius.png"></a>
                </td>
                <td>
                <p>Create complete graphical modeling workbenches for your specific visual notation and your own domain concepts with minimum technical knowledge.</p>
                <p>Target either a <b>Desktop</b> or a <b>Web</b> tool featuring graphical views, form, tree based editors, validation rules and get it to your users in a matter of hours.
                <a href="https://www.eclipse.org/sirius">Learn more...</a>
                </p>
               </td>
                </tr>
                </tbody></table>
          <h2>Graphiti</h2>
          <table>
		<tbody><tr>
		<td style="padding-right:20px">
		</td>
		<td>
		<p>
			Graphiti provides a modeling infrastructure evolving around the Eclipse Modeling Framework (EMF) for which offering graphical representations and editing possibilities is essential. Graphiti is an Eclipse-based graphics framework that enables rapid development of state-of-the-art diagram editors for domain models. Graphiti can use EMF-based domain models very easily but can deal with any Java-based objects on the domain side as well.
		<a href="http://eclipse.org/graphiti/">Learn more...</a>
		</p></td>
		</tr>
		</tbody></table>
    </div>
    <hr class="clearer" />
  </div>

	
	
	<div id="rightcolumn">
		<div class="sideitem">
			<h6>News on Twitter</h6>
		<a id="twitter-timeline" href="https://twitter.com/hashtag/eclipsemf" >#eclipsemf Tweets</a>
		</div>
	</div>
</div>
<script>(function() {
if (getCookie("eclipse_cookieconsent_status") === "allow") {
      createTimeline();
  }
})()</script>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
