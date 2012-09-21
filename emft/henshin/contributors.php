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
$pageTitle 	= "Henshin - Contributors";
$pageKeywords	= "EMF, Henshin, model transformation, installation";
$pageAuthor	= "Christian Krause";

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
<h1>$pageTitle</h1>

<p>
Henshin is a joint project by developers at
the <a href="http://www.uni-marburg.de/index_html-en?set_language=en">Philipps-University</a> in Marburg,
the <a href="http://www.hpi.uni-potsdam.de/willkommen.html?L=1">Hasso&nbsp;Plattner Institute</a> in Potsdam,
the <a href="http://www.tu-berlin.de/menue/home/parameter/en/">Technical University of Berlin</a>, and others.
</p>

<p>
Contributors:
<ul>
<li>Enrico Biermann</li>
<li>Gregor Bonifer</li>
<li><a href="http://www.mathematik.uni-marburg.de/~sjurack/">Stefan Jurack</a></li>
<li><a href="http://www.hpi.uni-potsdam.de/giese/personen/dr_christian_krause.html">Christian Krause</a> (project leader)</li>
<li>Felix Rieger</li>
<ul>
</p>

</div>
</div>

EOHTML;

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
