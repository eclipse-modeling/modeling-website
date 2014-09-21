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
	$pageTitle 		= "Eclipse Modeling Project";
	$pageKeywords	= "modeling, UML, UML2, MDD, MDA, model-driven";
	$pageAuthor		= "Richard Gronback";
	
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML

<div id="maincontent">
	<div id="midcolumn">
		<h1>Getting started</h1>
		<h2>1. Download</h2>
		<p>Download the latest <a href="http://eclipse.org/downloads/packages/eclipse-modeling-tools/lunar"><b>Eclipse Luna Release - Modeling Tools</a></b></p>
		<h2>2. Learn about it</h2>
		<p>Follow <b><a href="http://eclipsesource.com/blogs/tutorials/emf-tutorial/">this tutorial</a></b> and learn <b><a href="http://eclipsesource.com/blogs/tutorials/emf-tutorial/">"What every Eclipse developer should know about EMF"</a></b>. Additionally have a look at the <a href="docs/">documentation</a></p>
		<h2>3. Explore</h2>
		<p>EMF (core) is a common standard for data models, many technologies and frameworks are based on. This includes <b><a href=../server.php>server solutions</a></b>, <b><a href=../server.php>persistence frameworks</a></b>, <b><a href=../ui.php>UI frameworks</a></b> and <b><a href=../transformation.php>support for transformations</a></b>. Please have a look at the <b><a href="../">modeling project for an overview of EMF technologies</a></b>.</p>
	</div>
</div>

<div id="rightcolumn">
	
		<div class="sideitem">
			<h6>News on Twitter</h6>
		<a class="twitter-timeline" href="https://twitter.com/hashtag/eclipsemf" data-widget-id="503883842478809088">#eclipsemf Tweets</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
