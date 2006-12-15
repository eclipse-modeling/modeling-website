<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

function allnews($project, $cvsprojs, $cvscoms, $proj)
{
	global $App, $Nav, $Menu;

	ob_start();

	print "<div id=\"midcolumn\">\n";

	print "<div class=\"homeitem3col\">\n";
	print "<h3>All News</h3>\n";
	getNews(-1, "all");
	print "</div>\n";

	print "<a name=\"build\"></a><div class=\"homeitem3col\">\n";
	print "<h3>All Build News</h3>\n";
	build_news($cvsprojs, $cvscoms, $proj, -1);
	print "</div>\n";

	print "</div>\n";

	$html = ob_get_contents();
	ob_end_clean();

	$pageTitle = "Eclipse Modeling - $project - All News";
	$pageKeywords = "";
	$pageAuthor = "Neil Skrypuch";
	
	$App->generatePage(isset($theme) ? $theme : "", $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
}
?>
