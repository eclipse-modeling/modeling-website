<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# template.php
	#
	# Author: 		Denis Roy
	# Date:			2005-06-16
	#
	# Description: Type your page comments here - these are not sent to the browser
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Xtext";
	$pageKeywords	= "DSLs, oAW, Xtext, Eclipse, MDD, MDSD";
	$pageAuthor		= "Sven Efftinge";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	$Nav->addCustomNav("Projectplan", "projectplan.php");
	$Nav->addNavSeparator("Xtext (from oAW 4.3)", 	"http://www.openarchitectureware.org");
	$Nav->addCustomNav("Download", "http://www.eclipse.org/gmt/oaw/download/");
	$Nav->addCustomNav("Documentation", "http://www.eclipse.org/gmt/oaw/doc/4.2/html/contents/xtext_reference.html");

	# End: page-specific settings
	#
		
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML

	<div id="midcolumn">
	  <p>Xtext is framework/tool for the development of external textual DSLs. Just Describe your very own DSL using Xtext’s simple EBNF grammar language. The generator shipped with Xtext creates a parser, an AST-meta model (implemented in EMF) as well as a full-featured Eclipse Text Editor from that.</p>
	  <p>The Framework integrates with technology from Eclipse Modeling such as EMF, GMF, M2T and parts of EMFT. Development with Xtext is optimized for short turnarounds, so that adding new features to an existing DSL can be done in a second.</p> 
	  <p>Language development has never been so easy.</p>
	</div>

EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
