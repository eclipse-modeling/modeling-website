<?php

require_once ("../../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");

$App = new App();
$Nav = new Nav();
$Menu = new Menu();

include($App->getProjectCommon());
include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

ob_start();

print<<<EOHTML
<div id="midcolumn">
	<h1>Meet The $projectName Team</h1>
EOHTML;

$query= "SELECT DISTINCT Name, Role, Company, Location, Website, PhotoURL FROM developers NATURAL JOIN groups NATURAL JOIN teams " .
		"WHERE committer = 1 AND project LIKE '%$comp' ORDER BY SUBSTRING_INDEX(Name,' ',-1)";

$result= wmysql_query($query);
if ($result && mysql_num_rows($result) > 0)
{
	print '<p><table border="0" width="100%">' . "\n";
	while ($row = mysql_fetch_row($result))
	{
		# [did, CommitterID, Name, Email, Role, Company, Location, Website, PhotoURL]
		print '<tr><td width="33%" height="200" align="center" valign="bottom">' .
		($row[5] && (preg_match("#https+://#", $row[5]) || is_file($_SERVER['DOCUMENT_ROOT'] . $row[5])) ?
				'<img border="0" src="' . $row[5] . '" style="" height="120"/>' : '<img border="0" src="/modeling/images/team/eclipseface.png"/>') .
				"</td><td>" . 
		($row[4] ? '<a href="' . $row[4] . '">' . $row[0] . '</a>' : $row[0]) .	'<br/>' .
		($row[1] ? $row[1] . "<br/>" : "") .
		($row[2] ? $row[2] . "<br/>" : "") .
		($row[3] ? $row[3] . "<br/>" : "") .
			'</td></tr>' . "\n";
	}

	print "</table>\n";
}

print<<<EOHTML
</div>
EOHTML;

$html= ob_get_contents();
ob_end_clean();

$pageTitle= "Eclipse Modeling - " . ($projectName && $projct != "modeling" ? $projectName . " -" : "") . " Meet The Team";
$pageKeywords= "";
$pageAuthor= "Eike Stepper";
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="http://' . ($isBuildServer ? $_SERVER["SERVER_NAME"] : "www.eclipse.org") . '/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
