<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# index.php
	#
	# Author: 		Richard Gronback
	# Date:			2007-10-14
	#
	# Description: ESE 2007 Demo Viewlets
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Eclipse Modeling Project";
	$pageKeywords	= "modeling, GMF, EMF, QVT, Xpand, Teneo, MDD, MDA, model-driven";
	$pageAuthor		= "Richard Gronback";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# $Nav->addNavSeparator("My Page Links", 	"downloads.php");
	# $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);

	# End: page-specific settings
	#
		
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML

<div id="maincontent">
	<div id="midcolumn"><br>
		<h1>Domain Specific Modeling with the Eclipse Modeling Project</h1>
		Ed and I performed a <a href="http://eclipsesummit.org/summiteurope2007/index.php?page=detail/&id=32">demo</a> at Eclipse Summit Europe 2007 that showed aspects of EMF, GMF, QVT OML, MDT OCL, Teneo, and M2T Xpand.  It was a bit rushed, but we promised to post viewlets for the demo for those wishing to take another look.  Below are links to a series of viewlets that covered the basic content of the demo:
		
		<ol>
		<li><a href="ProjectAndDomain.html">Creating a Project and Domain Model</a></li>
		<li><a href="DynamicInstance.html">Creating a Dynamic Instance Model</a></li>
		<li><a href="XpandTemplate.html">Creating an Xpand Template</a></li>
		<li><a href="Mindmap2Requirements.html">Creating a QVT Transformation to Create a Requirements Model from a Mindmap</a></li>
		<li><a href="DeriveOCL.html">Using OCL to Implement a Derived Reference</a></li>
		<li><a href="MindmapDiagram.html">Developing a Mindmap Diagram</a></li>
		<li><a href="RunDiagram.html">Running the Mindmap Diagram</a></li>
		<li><a href="Hibernate.html">Using Teneo to Persist Requirements with Hibernate</a></li>
		</ol>
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
