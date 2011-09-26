<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 

$App = new App();
$Nav = new Nav();
$Menu = new Menu();

include($App->getProjectCommon());    

$pageTitle 	= "Henshin - Examples";
$pageKeywords	= "EMF, Henshin, model transformation, examples";
$pageAuthor	= "Christian Krause";

$target = 'examples/index.html';

ob_start();
include "$target";
$contents = ob_get_contents();
ob_end_clean();

# Paste your HTML content between the EOHTML markers!	
$html = <<<EOHTML

<div id="maincontent">
<div id="midcolumn">
$contents
</div>
</div>

EOHTML;

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
