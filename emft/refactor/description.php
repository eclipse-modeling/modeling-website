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
	$pageTitle 		= "EMF Refactor";
	$pageKeywords	= "EMF, Refactor, model refactoring, refactoring";
	$pageAuthor		= "Thorsten Arendt";
	
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

    <div id="midcolumn">
	
	<p>
	EMF Refactor is an open source component under <a href="http://www.eclipse.org/modeling/emft/">Eclipse EMFT</a> to provide extensible tool support for generating and applying refactorings of EMF based
models, e.g. UML EMF models.
	</p>
	
	<p>
	EMF Refactor will consist of 
	<ul>
		<li>a <strong>Refactoring Generation Module</strong> for specifying EMF model refactorings using several model transformation approaches,
		<li>a <strong>structured suite</strong> of predefined EMF model refactorings, and
		<li>a <strong>Refactoring Application Module</strong> for applying EMF model refactorings in a uniform and user-friendly way.
	</ul>
	</p>
	
	<p>
	A first community technical preview is targeted in spring 2010.
	</p>
		
	<p>
	<i>More information here soon...</i>
	</p>

	
		
	</div>	
</div>

EOHTML;

	# Generate the web page
	$App->generatePage($theme, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
