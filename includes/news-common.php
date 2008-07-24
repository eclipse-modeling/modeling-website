<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

function allnews($project, $cvsprojs, $cvscoms, $proj, $newAndNoteworthy = "")
{
	global $App, $Nav, $Menu, $PR, $extras;

	ob_start();

	print "<div id=\"midcolumn\">\n";

	print "<h1>News</h1>";
	print "<a name=\"site\"></a><div class=\"homeitem3col\">\n";
	print "<h3>Site News</h3>\n";
	getNews(-1, "all");
	print "</div>\n";

	print "<div class=\"homeitem3col\">\n";
	print '<a name="build"></a><h3><a href="/'.($PR == 'technology/emft' ? 'emft' : $PR) . '/feeds/"><img style="float:right" alt="Build Feeds" src="/modeling/images/rss-atom10.gif"/></a>Build News</h3>'."\n";
	build_news($cvsprojs, $cvscoms, $proj, -1);
	print "</div>\n";

	print "</div>\n";
	
	print "<div id=\"rightcolumn\">\n";

	$extras = (isset($extras) && is_array($extras) ? $extras : array());
	
	foreach ($extras as $z)
	{
		if (function_exists($z))
		{
			call_user_func($z);
		}
	}
	
	print "<div class=\"sideitem\">\n";

	print "<h6>News</h6>\n";
	print "<ul>\n";
	print "<li><a href=\"#site\">Site News</a></li>\n"; 
	print "<li><a href=\"#build\">Build News</a></li>\n"; 
	print "<li><a href=\"news/\">Release Notes</a></li>\n";
	if (isset($newAndNoteworthy) && $newAndNoteworthy) 
	{
		print "<li><a href=\"$newAndNoteworthy\">New And Noteworthy</a></li>\n";
	} 
	print "</ul>\n";
	print "</div>\n";
	print "</div>\n";

	$html = ob_get_contents();
	ob_end_clean();

	$pageTitle = "Eclipse Modeling - $project - Site News";
	$pageKeywords = "";
	$pageAuthor = "Neil Skrypuch, Nick Boldt";
	
	$App->generatePage(isset($theme) ? $theme : "", $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
}
?>
