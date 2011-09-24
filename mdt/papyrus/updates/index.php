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
<!--<img src="../images/backgroundMainPapyrus.png" alt="Papyrus Logo"/>-->
<h1>Papyrus Update Sites</h1>

<h3>Recommended installation, using Eclipse Modeling Package:</h3>
<p align="JUSTIFY">
<ul>
<li>You can download <a href= "http://www.eclipse.org/downloads/packages/eclipse-modeling-tools-includes-incubating-components/heliosr">Eclipse Modeling Package</a> for your own platform.</li>
<li>Use the discovery interface ("Help" => "Install Modeling Component") and select Papyrus.</li>
<li>Proceed through installation steps.</li>
<li>Papyrus is now ready to use!</li>
</ul>
</p>

<h3>How to add the Papyrus update site</h3>
<p align="JUSTIFY">

<h4>Installation using update sites:</h4>
There are several different ways to add a new update site to the list of sites available from the Install Manager. 
In all cases, the site location (i.e. the Web URL or the archived Update Site provided above) is the only required item.
<p align="JUSTIFY">
To add the Papyrus site, one of the procedures described from the <a href="http://help.eclipse.org/galileo/index.jsp?topic=/org.eclipse.platform.doc.user/tasks/tasks-129.htm">Install Manager documentation</a> must be followed.
</p>  

<!-- RS: no update site for release for now... Only one nightly update site -->

<p>
<h4>Main update site: (Recommended)</h4>
<ul>
<li><a href="http://download.eclipse.org/modeling/mdt/papyrus/updates/releases/maintenance/indigo">http://download.eclipse.org/modeling/mdt/papyrus/updates/releases/maintenance/indigo</a> <br><font color='#808080'>(Papyrus 0.8.1 Indigo SR1 Update)</font></li>
</ul>
<p>
<h4>Previous releases update sites:</h4>
<ul>
<li><a href="http://download.eclipse.org/modeling/mdt/papyrus/updates/releases/indigo">http://download.eclipse.org/modeling/mdt/papyrus/updates/releases/indigo</a> <br><font color='#808080'>(Papyrus 0.8.0 for Indigo Release Update)</font></li>
</ul>
<ul>
<li><a href="http://download.eclipse.org/modeling/mdt/papyrus/updates/releases/helios">http://download.eclipse.org/modeling/mdt/papyrus/updates/releases/helios</a> <br><font color='#808080'>(Eclipse Helios Update)</font></li>
</ul>
<p>
<h4>Development update sites (version 0.8.2):</h4>
<ul>
<li><a href="http://download.eclipse.org/modeling/mdt/papyrus/updates/nightly/indigo">http://download.eclipse.org/modeling/mdt/papyrus/updates/nightly/indigo</a> <br><font color='#808080'>(Eclipse Indigo Update)</font></li>
</ul>
<ul>
<li><a href="http://download.eclipse.org/modeling/mdt/papyrus/extra/updates/nightly/indigo">http://download.eclipse.org/modeling/mdt/papyrus/extra/updates/nightly/indigo</a> <br><font color='#808080'>(Papyrus extra plugins Update (contains MARTE profile))</font></li>
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