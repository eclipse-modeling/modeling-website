<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

if ($proj) { 
	header("Location: http://wiki.eclipse.org/index.php/MDT-" . strtoupper($proj)); 
	exit;
}
ob_start();
?>
<div id="midcolumn">

<h1>Documentation</h1>

<?php 

print doSelectProject($projects, $proj, $nomenclature);

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - MDT - Documentation";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
<!-- $Id: docs.php,v 1.3 2006/11/01 02:59:43 nickb Exp $ -->
