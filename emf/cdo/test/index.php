<?php
	
require_once($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 

$App = new App(); 
$Nav = new Nav(); 
$Menu = new Menu(); 

include($App->getProjectCommon());
include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

ob_start();
print '<div id="midcolumn">';
########################################################################

$pageTitle = 'Test Page';
print "<h1>" . $pageTitle . "</h1>\n";
print '$_SERVER["PHP_SELF"]: ' . $_SERVER["PHP_SELF"] . "<br/>\n";
print '__FILE__: ' . __FILE__ . "<br/>\n";
print "<br/>\n";
require_once("include.php"); 

########################################################################
print '</div>';
$html = ob_get_contents();
ob_end_clean();

$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Eike Stepper";

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/index.css\"/>\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, "Eclipse Modeling - " . $pageTitle, $html);
?>
