<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

if ($proj) { 
	header("Location: http://wiki.eclipse.org/index.php/MDT-" . strtoupper($proj) . "-FAQ"); 
	exit;
}
ob_start();
?>
<div id="midcolumn">

<h1>Frequently Asked Questions</h1>
<p>If you have questions that you would like to see answered in future versions of this FAQ, please post them to the <a href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.modeling.mdt">MDT newsgroup</a>.</p>

<p>If you'd like to add your questions and answers to the FAQ, please edit the appropriate <a href="http://wiki.eclipse.org/index.php/MDT">Wiki page</a>.</p>

<?php

print doSelectProject($projects, $proj, $nomenclature);

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - MDT - FAQs";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
<!-- $Id: faq.php,v 1.4 2006/11/01 02:59:26 nickb Exp $ -->
