<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();
?>
<div id="midcolumn">

<h1><?php print ($proj ? project_name($proj) . " " : ""); ?>Frequently Asked Questions</h1>
<p>If you have questions that you would like to see answered in future versions of this FAQ, please post them to the <a href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.modeling.mdt">MDT newsgroup</a>.</p>
<p>Last modified on August 2, 2006.</p>

<?php

print doSelectProject($projects, $proj, $nomenclature);

$file = $_SERVER["DOCUMENT_ROOT"] . "/$PR/$proj/faq.php";
if ($proj && is_file($file) && is_readable($file))
{
	include($file);
}
$questions = (is_array($questions) && sizeof($questions) > 0 ? $questions : array());

if (sizeof($questions) > 0)
{
	print "<div class=\"homeitem3col\">\n";
	print "<h3>FAQ Index</h3>\n";
	print "<ul>\n";
	$i = 1;
	foreach (array_keys($questions) as $z)
	{
		print "<li><a href=\"#q" . $i++ . "\">$z</a></li>\n";
	}
	print "</ul>\n";
	print "</div>\n";

	$i = 1;
	foreach (array_keys($questions) as $z)
	{
		print "<div class=\"homeitem3col\">\n";
		print "<a name=\"q" . $i++ . "\"></a><h3>$z</h3>\n";
		print "$questions[$z]\n";
		print "</div>\n";
	}

	print "</div>\n";
}
else if ($proj)
{
	print "<div class=\"homeitem3col\">\n";
	print "<h3>" . project_name($proj) . " doesn't have any FAQs yet</h3>\n";
	print "</div>\n";
}

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - MDT - Project FAQ";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
<!-- $Id: faq.php,v 1.1 2006/10/27 19:04:09 khussey Exp $ -->
