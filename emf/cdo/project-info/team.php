<?php

require_once ("../../../includes/buildServer-common.php");
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

print '<h1>Meet The ' . $projectName . 'Team</h1>';

$result = wmysql_query("SELECT CommitterID, PhotoURL, Name, Company, Location, Role, Website, EMail FROM developers WHERE Role LIKE '%$comp%' ORDER BY SUBSTRING_INDEX(Name,' ',-1)");
if ($result && mysql_num_rows($result) > 0)
{
	print '<p><table border="0" width="100%">' . "\n";
	while ($row = mysql_fetch_row($result))
	{
		print '<tr><td width="25%" height="130" align="center" valign="top">' .
		($row[1] && (preg_match("#https+://#", $row[1]) || is_file($_SERVER['DOCUMENT_ROOT'] . $row[1])) ?
				'<img border="0" src="' . $row[1] . '" style="" height="120"/>' : '<img border="0" src="/modeling/images/team/eclipseface.png"/>') .
				'</td><td align="left" valign="top">' . 
		($row[2] ? $row[2] . "<br/>" : "") .
		($row[3] ? $row[3] . "<br/>" : "") .
		($row[4] ? $row[4] . "<br/>" : "") .
		($row[5] ? "<br/>" . $row[5] : "") .
		'</td><td>' . "\n";
		($row[0] ? $row[0] . "<br/>" : "") .
		($row[6] ? '<a href="' . $row[6] . '"><img border="0" src="/modeling/emf/cdo/images/website.gif"/></a>&nbsp;" : "") .
		($row[7] ? '<a href="' . $row[7] . '"><img border="0" src="/modeling/emf/cdo/images/email.gif"/></a>&nbsp;" : "") .
		($row[0] ? '<a href="' . $_SERVER["PHP_SELF"] . "?committerid=" .$row[0] . '"><img border="0" src="/modeling/emf/cdo/images/statistics.gif"/></a>&nbsp;" : "") .
			'</td></tr>' . "\n";
	}

	print "</table>\n";
}

########################################################################
print '</div>';
$html= ob_get_contents();
ob_end_clean();

$pageTitle= "Eclipse Modeling - " . ($projectName && $projct != "modeling" ? $projectName . " -" : "") . " Meet The Team";
$pageKeywords= "";
$pageAuthor= "Eike Stepper";
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="http://' . ($isBuildServer ? $_SERVER["SERVER_NAME"] : "www.eclipse.org") . '/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
