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

$pageTitle = 'Meet The ' . $projectName . ' Team';
print '<h1>' . $pageTitle . '</h1>';

$email_all = null;
$result = wmysql_query("SELECT CommitterID, PhotoURL, Name, Company, Location, Role, Website, EMail " .
	"FROM developers WHERE Role LIKE '%$comp%' ORDER BY did");

if ($result && mysql_num_rows($result) > 0)
{
	print '<p><table border="0" width="100%">' . "\n";
	while ($row = mysql_fetch_row($result))
	{
		print '<tr><td width="25%" height="130" align="center" valign="top">' .
		($row[1] && (preg_match("#https+://#", $row[1]) || is_file($_SERVER['DOCUMENT_ROOT'] . $row[1])) ?
				'<img border="0" src="' . $row[1] . '" style="" height="120"/>' : '<img border="0" src="/modeling/images/team/eclipseface.png"/>') .
				'</td><td align="left" valign="top">' . 
		($row[2] ? "<b>" . $row[2] . "</b><br/>" : "") .
		($row[3] ? $row[3] . "<br/>" : "") .
		($row[4] ? $row[4] . "<br/>" : "") .
		'<br/>' . "\n" .
		($row[5] ? "<i>" . $row[5] . "</i><br/>" : "") .
		($row[7] ? '<a href="mailto:' . $row[7] . '?subject=[CDO] "><img border="0" src="/modeling/emf/cdo/images/email.gif" alt="EMail"/></a>&nbsp;' : "") .
		($row[6] ? '<a href="' . $row[6] . '" target="_blank"><img border="0" src="/modeling/emf/cdo/images/website.gif" alt="WebSite"/></a>&nbsp;' : "") .
		($row[0] ? '<a href="statistics.php?committerid=' .$row[0] . '"><img border="0" src="/modeling/emf/cdo/images/statistics.gif" alt="Statistics"/></a>&nbsp;' : "") .
			'</td></tr>' . "\n";

		if ($row[7])
		{
			if ($email_all != null)
			{
				$email_all .= ",";
			}

			$email_all .= $row[7];
		}
	}

	print "</table><br/><br/>\n";
}

if ($email_all)
{
	print '<a href="mailto:' . $email_all . '?subject=[CDO] "><img border="0" src="/modeling/emf/cdo/images/email_all.gif" alt="EMail All"/></a>';
}

########################################################################
print '</div>';
$html= ob_get_contents();
ob_end_clean();

$pageKeywords= "";
$pageAuthor= "Eike Stepper";
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="http://' . ($isBuildServer ? $_SERVER["SERVER_NAME"] : "www.eclipse.org") . '/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, "Eclipse Modeling - " . $pageTitle, $html);
?>
