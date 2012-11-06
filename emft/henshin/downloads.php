<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 

$App = new App();
$Nav = new Nav();
$Menu = new Menu();

include($App->getProjectCommon());

#
# Begin: page-specific settings.  Change these. 
$pageTitle 	= "Henshin - Downloads";
$pageKeywords	= "EMF, Henshin, model transformation, Downloads";
$pageAuthor	= "Christian Krause";
	
# Add page-specific Nav bars here
# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
# $Nav->addNavSeparator("My Page Links", 	"downloads.php");
# $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);
# End: page-specific settings
#

$drops = "http://www.eclipse.org/downloads/download.php?file=/modeling/emft/henshin/downloads/drops";
$html = <<<EOHTML

<div id="maincontent">
<div id="midcolumn">

<h1>$pageTitle</h1>

<p>
We recommend to use the <a href="install.php">update sites</a> for installation!
If you want to download Henshin as compiled archives, see below.
</p>

<h2>Latest Stable Release</h2>
<p>
<table>
<tr>
<td>
<a href="$drops/0.9.4/R201211061446/Henshin-SDK-Incubation-0.9.4.zip"><img src="go-bottom.png"></a>
</td>
<td>
<a href="$drops/0.9.4/R201211061446/Henshin-SDK-Incubation-0.9.4.zip">Henshin SDK 0.9.4</a>
</td>
</tr>
</table>
</p>

<h2>Latest Nightly Build</h2>
<p>
<table>
<tr>
<td>
<a href="$drops/0.9.5/N-SNAPSHOT/Henshin-SDK-Incubation-N-SNAPSHOT.zip"><img src="go-bottom.png"></a>
</td>
<td>
<a href="$drops/0.9.5/N-SNAPSHOT/Henshin-SDK-Incubation-N-SNAPSHOT.zip">Henshin SDK 0.9.5 SNAPSHOT</a>
</td>
</tr>
</table>
</p>

</div>
</div>

EOHTML;

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>