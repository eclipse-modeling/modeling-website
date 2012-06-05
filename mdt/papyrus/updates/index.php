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

<object type="application/x-shockwave-flash"data="PapyrusInstallation&UpdateProcedure.swf" width="400" height="350"> 
<param name="movie" value="PapyrusInstallation&UpdateProcedure.swf" /> 
<param name="wmode" value="transparent" /> 
<param name="quality" value="high"/>
</object>


<h1>Papyrus Installation Guide</h1>
<ul>
<li>The most basic procedure for installing Papyrus consists in installing the <a href= "http://www.eclipse.org/downloads/packages/eclipse-modeling-tools-includes-incubating-components/heliosr">Eclipse Modeling Package</a> for your own platform.</li>
<li>Then, you have to use the discovery interface ("Help" => "Install Modeling Component") and select Papyrus.</li>
<li>Proceed through installation steps. Once the installation is completed, you will be asked to restart your eclipse platform and then Papyrus is ready to use!</li>
</ul>
</p>


<h1>Papyrus Update Sites</h1>

<p align="JUSTIFY">
Eclipse provides also facilities for adding new software to the platform or updating software in the system. 
In all cases, the site location (i.e. the Web URL or the archived Update Site provided above) is the only required item to update or insatll a software within Eclipse.
<p align="JUSTIFY">
To add the Papyrus site, one of the procedures described from the <a href="http://help.eclipse.org/galileo/index.jsp?topic=/org.eclipse.platform.doc.user/tasks/tasks-129.htm">Install Manager documentation</a> must be followed.
</p>  

<h4>Update sites for Papyrus release versions:</h4>
<h5>Papyrus release 0.8.2 (Indigo) (Recommended):</h5>
<ul>
<li><a href="http://download.eclipse.org/modeling/mdt/papyrus/updates/releases/maintenance/indigo">http://download.eclipse.org/modeling/mdt/papyrus/updates/releases/maintenance/indigo</a> <br><font color='#808080'>(Papyrus 0.8.x / Eclipse Indigo)</font></li>
</ul>
<h5>Papyrus release 0.7.3 (Helios):</h5>
<ul>
<li><a href="http://download.eclipse.org/modeling/mdt/papyrus/updates/releases/helios">http://download.eclipse.org/modeling/mdt/papyrus/updates/releases/helios</a> <br><font color='#808080'>(Papyrus 0.7.3 / Eclipse Helios)</font></li>
</ul>

<h4>Update sites for Papyrus nightly builds:</h4>
<p>
For advanced users and pioneers, you can access the latest commits done within Papyrus by accessing its nightly builds...
</p>
<h5>Papyrus nightly builds, version 0.9.x (Juno):</h5>
<ul>
<li><a href="http://download.eclipse.org/modeling/mdt/papyrus/updates/nightly/juno">http://download.eclipse.org/modeling/mdt/papyrus/updates/nightly/juno</a> <br><font color='#808080'>(Papyrus 0.9.x / Eclipse Juno)</font></li>
</ul>
<h5>Papyrus nightly builds, version 0.8.x (Indigo):</h5>
<ul>
<li><a href="http://download.eclipse.org/modeling/mdt/papyrus/updates/nightly/indigo">http://download.eclipse.org/modeling/mdt/papyrus/updates/nightly/indigo</a> <br><font color='#808080'>(Papyrus 0.8.x / Eclipse Indigo)</font></li>
</ul>
</div>

<?php

// Right Part
//include($_SERVER['DOCUMENT_ROOT'] . "/mdt/papyrus/right_column.php");


$html = ob_get_contents();
ob_end_clean();

# Generate the web page
//$App->AddExtraHtmlHeader("<link rel='alternate' type='application/rss+xml' title='Papyrus News' href='news/papyrusNewsArchive.rss'>");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>