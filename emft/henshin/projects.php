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
$pageTitle 	= "Henshin - Projects";
$pageKeywords	= "EMF, Henshin, model transformation, projects";
$pageAuthor	= "Christian Krause";
	
# Add page-specific Nav bars here
# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
# $Nav->addNavSeparator("My Page Links", 	"downloads.php");
# $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);
# End: page-specific settings
#

$html = <<<EOHTML

<div id="maincontent">
<div id="midcolumn">

<h1>$pageTitle</h1>

<p>
This page gives an overview about projects which use Henshin.
</p>

<h2>SPELL</h2>
<p>
The <a href="http://wwwen.uni.lu/snt">Interdisciplinary Centre for Security, Reliability and Trust (SnT)</a>
at the University of Luxembourg uses Henshin for automatic translations of programming languages for 
satellite technology - a field that is highly relevant to Luxembourg-based SES, one of the world's 
leading satellite operators. Recently, SES has been working on developing the open-source-software 
SPELL (Satellite Procecure Execution Language and Library), a standardised satellite control language. 
The challenge is to convert all of the control procedures in existence that are being used in different 
programming languages over to SPELL. Henshin is used as underlying model transformation engine to automate this 
process and to guarantee a high-quality translation through automatic consistency testing.
<br>
<br>
For further information see the annual <a href="http://www.uni.lu/content/download/52106/624943/version/1/file/SnT_AR2011_final_web.pdf">SnT report 2011</a>, pages 14-15.
<br>
Contact: Frank Hermann, University of Luxembourg, frank.hermann[at]uni.lu.
</p>

</div>
</div>

EOHTML;

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>