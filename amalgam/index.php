<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# index.php
	#
	# Author: 		Richard Gronback
	# Date:			2008-02-12
	#
	# Description: Amalgam project introductory page
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Amalgam";
	$pageKeywords	= "modeling,packaging";
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

	<div id="midcolumn">
		<table width="100%">
		<tr><td>&nbsp;</td></tr>
			<tr>
				<td align="top">
				The Amalgamation project will provide improved packaging, integration, and usability of Modeling project components. See
				the project <a href="http://www.eclipse.org/proposals/amalgamation/">proposal</a> for more detail until this website becomes fully operational.
				</td>
			</tr>
		</table><hr/>
		
		<div class="homeitem">
			<h3>Quick Links</h3>
				<ul class="midlist">
					<li><a href="http://www.eclipse.org/proposals/amalgamation/">Project proposal</a></li>
		</div>
		<div class="homeitem">
			<h3>Events</h3>
			<ul class="midlist">
				<li>Interested in creating a DSL using the Modeling project?  Come see this <a href="http://www.eclipsecon.org/2008/index.php?page=sub/&id=51">talk</a> at <a href="http://www.eclipsecon.org/2008/">EclipseCon 2008</a></li>
			</ul>
		</div>
		<br/>
		
		<hr class="clearer" />
		
	</div>
	
	<div id="rightcolumn">
		<br />
		<div class="sideitem">
			<h6>Getting started</h6>
			<ul>				
				<li>Coming</li>
			</ul>
		</div>
		
		<div class="sideitem">
			<h6>What's New</h6>
			<ul> 
			    <li>January 30, 2008 - Amalgamation project <a href="http://www.eclipse.org/proposals/amalgamation/">created</a></li>
			</ul>
		</div>
	</div>
</div>

EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
