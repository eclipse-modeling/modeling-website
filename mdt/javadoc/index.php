<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
$App = new App();
$Nav = new Nav();
$Menu = new Menu();
include ($App->getProjectCommon());
ob_start();

if ($isWWWserver) {
	$PWD = "/home/data/httpd/download.eclipse.org/modeling/mdt/";
	$jdPWD = "/downloads/download.php?file=/modeling/mdt/";
} else {
	$PWD = "../../../modeling/mdt/";
	$jdPWD = $PWD;
}
$subprojs = loadDirSimple($PWD, "(.+)", "d");

print '<div id="midcolumn">
<div class="homeitem3col">
<h3>Javadoc</h3>
<ul>
';

if (sizeof($subprojs) > 0) {
	sort($subprojs);
	reset($subprojs);
	foreach ($subprojs as $subproj) {
		if (in_array($subproj, $projects)) {
			$trans = array_flip($projects);
			print '<li><b> ' . $trans[$subproj] . '</b>' . "\n";
			$vers = loadDirSimple("$PWD$subproj/javadoc/", "(\d\.\d|\d\.\d\.\d+)", "d");
			rsort($vers);
			reset($vers);
			foreach ($vers as $ver) {
				if (preg_match("/[^0-9.]/", $ver) > 0) {
					$vers2 = loadDirSimple("$PWD$subproj/javadoc/" . $ver, "", "d");
					rsort($vers2);
					reset($vers2);
					if (sizeof($vers2) > 0) {
						print "<ul>\n";
					}
					foreach ($vers2 as $ver2) {
						print '<li><a href="' . $jdPWD . $subproj . '/javadoc/' . $ver . '/' . $ver2 . '/">' . $ver . ' ' . $ver2 . '</a></li>' . "\n";
					}
					if (sizeof($vers2) > 0) {
						print "</ul>\n";
					}
				} else {
					print '<ul><li><a href="' . $jdPWD . $subproj . '/javadoc/' . $ver . '/">' . $subproj . ' ' . $ver . '</a></li></ul>' . "\n";
				}
			}
			print '</li>' . "\n";
		}
	}
} else {
	print "<li>No javadoc found!</li>";
}
print "</ul>\n";

print "</div></div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "MDT - Javadoc";
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>