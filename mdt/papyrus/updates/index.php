<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# template.php
	#
	# Author: 		Freddy Allilaire
	# Date:			2005-12-05
	#
	# Description: Type your page comments here - these are not sent to the browser
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Papyrus Update Sites";
	$pageKeywords	= "papyrus, dsl, modeling, domain specific language, graphical, uml, sysml, Update Site";
	$pageAuthor		= "Remi Schnekenburger";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# $Nav->addNavSeparator("My Page Links", 	"downloads.php");
	# $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);

	# End: page-specific settings
	#
	
	//include('../news/scripts/news.php');
	//$papyrusnews = get_papyrusnews(7);
		
ob_start();
?>

<!-- Middle part -->
<div id="midcolumn">
<img style="float:right" src="../images/Papyrus.gif" alt="Papyrus Logo"/>
<h1>Papyrus Update Sites</h1>
<h3>How to add the Papyrus update site</h3>
<p align="JUSTIFY">

There are several different ways to add a new update site to the list of sites available from the Install Manager. 
In all cases, the site location (i.e. the Web URL or the archived Update Site provided above) is the only required item.
<p align="JUSTIFY">
To add the Papyrus site, one of the procedures described from the <a href="http://help.eclipse.org/galileo/index.jsp?topic=/org.eclipse.platform.doc.user/tasks/tasks-129.htm">Install Manager documentation</a> must be followed.
</p>  

<!-- RS: no update site for release for now... Only one nightly update site -->
<!--
<p>
<h4>Main update site:</h4>
<ul>
<li><a href="http://download.eclipse.org/modeling/mdt/papyrus/updates/release/">http://download.eclipse.org/modeling/mdt/papyrus/updates/release/</a> <br><font color='#808080'>(Eclipse Galileo Update)</font></li>
</ul>

<h4>Development update sites:</h4>
<ul>
<li><a href="http://download.eclipse.org/modeling/mdt/papyrus/updates/milestones/">http://download.eclipse.org/modeling/mdt/papyrus/updates/milestones/</a> <br><font color='#808080'>(Eclipse Helios Update)</font></li>
<li><a href="http://download.eclipse.org/modeling/mdt/papyrus/updates/integration/">http://download.eclipse.org/modeling/mdt/papyrus/updates/integration/</a> <br><font color='#808080'>(Eclipse Helios Update)</font></li>
<li><a href="http://download.eclipse.org/modeling/mdt/papyrus/updates/nightly/">http://download.eclipse.org/modeling/mdt/papyrus/updates/nightly/</a> <br><font color='#808080'>(Eclipse Helios Update)</font></li>
</ul>
</p>
-->
<p>
<h4>Development update sites:</h4>
<ul>
<li><a href="http://download.eclipse.org/modeling/mdt/papyrus/updates/nightly/">http://download.eclipse.org/modeling/mdt/papyrus/updates/nightly/</a> <br><font color='#808080'>(Eclipse Helios Update)</font></li>
</ul>
</p>

<?php

// Right Part
//include($_SERVER['DOCUMENT_ROOT'] . "/mdt/papyrus/right_column.php");


$html = ob_get_contents();
ob_end_clean();

# Generate the web page
//$App->AddExtraHtmlHeader("<link rel='alternate' type='application/rss+xml' title='Papyrus News' href='news/papyrusNewsArchive.rss'>");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>