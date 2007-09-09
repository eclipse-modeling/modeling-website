<?php
require_once ("../../includes/buildServer-common.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");

$App = new App();
$Nav = new Nav();
$Menu = new Menu();
include ($App->getProjectCommon());

$projectName = explode("/",$PR); $projectName = strtoupper($projectName[1]); 

if ($isWWWserver) {
	$PWD = $App->getDownloadBasePath() . "/$PR/";
	$jdPWD = "/downloads/download.php?file=/$PR/";
} else {
	$PWD = "../../../$PR/";
	$jdPWD = $PWD;
}

ob_start();

print '<div id="midcolumn">
<div class="homeitem3col">
<h3>RSS Feeds</h3>
<ul>
';

print '<li><b>' . $projectName . ' Build Feeds</b>' . "\n";
$feeds = loadDirSimple(".", "builds-.+\.xml", "f");
sort($feeds);
reset($feeds);
foreach ($feeds as $feed) {
	if (false === strpos($feed, "-N.xml"))
	{
		$trans = array_flip($projects); 
		print '<ul><li><a href="' . $jdPWD . 'feeds/' . $feed . '">' . $trans[preg_replace("/builds-(.+).xml/", "$1", $feed)] . '</a></li></ul>' . "\n";
	}
}
print '</li>' . "\n";

print "</ul>\n";

print "</div></div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = $projectName . " - RSS Feeds";
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
