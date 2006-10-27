<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

function allnews($project)
{
	global $App, $Nav, $Menu;

	ob_start();

	print "<div id=\"midcolumn\">\n";
	print "<h1>All News</h1>\n";
	getNews(-1, "all", "vert");
	print "</div>\n";

	$html = ob_get_contents();
	ob_end_clean();

	$pageTitle = "Eclipse Tools - $project - All News";
	$pageKeywords = ""; // TODO: add something here
	$pageAuthor = "Neil Skrypuch";

	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
}
?>
