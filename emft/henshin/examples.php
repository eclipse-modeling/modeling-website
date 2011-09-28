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

# Figure out which example should be displayed:
$example = '';
if (isset($_GET['example'])) {
    $example = preg_replace('/\W/', '', $_GET['example']);
}
if (!empty($example) && file_exists("examples/$example/index.html")) {
    $target = "examples/$example/index.html";
} else {
    $target = "examples/index.html";
}

# Display the target file:
ob_start();
include "$target";
$contents = ob_get_contents();
ob_end_clean();

# Paste your HTML content between the EOHTML markers!	
$html = <<<EOHTML

<div id="maincontent">
$contents
</div>

EOHTML;

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>