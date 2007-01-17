<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

ob_start();

foreach ($projects as $z)
{
	$descriptions[$z]["short"] = file_contents("$z/project-info/project-page-paragraph.html");
	$descriptions[$z]["long"] = file_contents("$z/project-info/overview.html");
}
?>

<div id="midcolumn">
	<h1>Model Development Tools (MDT)</h1>
	<?php

	$files = array(
		"project-info/project-page-paragraph.html",
		"project-info/overview.html"
	);

	foreach ($files as $z)
	{
		if (file_exists($z))
		{
			include($z);
		}
		else
		{
			print "<p>No $z found!.</p>";
		}
	}

	foreach (array_keys($projects) as $z)
	{
		print "<div class=\"homeitem3col\">\n";
		print "<a name=\"$projects[$z]\"></a>\n";
		print "<h3>$z</h3>\n";
		print $descriptions[$projects[$z]][($proj == $projects[$z] ? "long" : "short")];
		print "<ul class=\"extras\">\n";
		if ($proj != $projects[$z])
		{
			print "<li><a href=\"?project=$projects[$z]#$projects[$z]\">More...</a></li>\n";
		}
		print "<li><a href=\"/$PR/downloads/?project=$projects[$z]\">Downloads</a></li>\n";
		print "</ul>\n";
		print "</div>\n";
	}
	?>
</div>

<div id="rightcolumn">
	<div class="sideitem">
		<h6>News</h6>
		<?php getNews(4, "whatsnew"); ?>
		<ul>
			<li><a href="/<?php print $PR; ?>/news-whatsnew.php">Older news</a></li>
		</ul>
	</div>

	<div class="sideitem">
		<h6>Build News</h6>
		<?php build_news($cvsprojs, $cvscoms, $proj); ?>
		<ul>
			<li><a href="/<?php print $PR; ?>/news-whatsnew.php#build">Older build news</a></li>
		</ul>
	</div>

	<a name="related"></a>
	<div class="sideitem">
		<h6>Related links</h6>
		<ul>
			<li><a href="http://www.eclipse.org/modeling">Eclipse Modeling</a></li>
			<li>Web: <a href="http://www.eclipse.org/emf">EMF</a>, <a href="http://www.eclipse.org/emft">EMFT</a></li>
			<li>Wiki: <a href="http://wiki.eclipse.org/index.php/Category:EMF">EMF</a>, <a href="http://wiki.eclipse.org/index.php/EMFT">EMFT</a></li>
			<li><a href="http://www.eclipse.org/modeling/emf/docs/misc/UsingUpdateManager/UsingUpdateManager.html">Using Update Manager</a></li>
			<li><a href="http://www.eclipse.org/newsgroups">Eclipse newsgroups</a></li>
			<li><a href="http://wiki.eclipse.org/index.php/EMFT_Procedures">MDT Build &amp; Promote</a></li>
		</ul>
	</div>
	
	<?php
	if ($isEMFserver)
	{
		$file = $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/actions-common.php";
		if (is_file($file) && is_readable($file))
		{
			include($file);
		}
	}
	?>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - MDT - Home";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/index.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
<!-- $Id: index.php,v 1.13 2007/01/17 23:47:55 nickb Exp $ -->
