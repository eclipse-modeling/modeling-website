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

$result = wmysql_query("SELECT CommitterID, PhotoURL, Name, Company, Location, Role, Website, EMail FROM developers WHERE CommitterID = '" . $_GET["committerid"] . "'");
if ($result && mysql_num_rows($result) > 0)
{
	$row = mysql_fetch_row($result);
	$pageTitle = $projectName . ' Statistics For ' . $row[2];

	print '<h1>' . $pageTitle . '</h1>';
	print '<p><table border="0" width="100%">' . "\n";
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
	($row[6] ? '<a href="' . $row[6] . '" target="_blank"><img border="0" src="/modeling/emf/cdo/images/website.gif" alt="Web Site"/></a>&nbsp;' : "") .
			'</td></tr>' . "\n";
	print "</table><br/><br/>\n";

	print '<h1>CVS Activity</h1>';
	$branches = wmysql_query("SELECT Branch, SUM(LinesPlus), SUM(LinesMinus), COUNT(date) FROM commits WHERE Author = '" . $row[0] . "' GROUP BY Branch ORDER BY Branch");
	$rows = mysql_num_rows($branches);
	if ($branches && $rows > 0)
	{
		$totalCommits = 0;
		$totalPlus = 0;
		$totalMinus = 0;
		$totalSum = 0;
		$totalLPC = 0;

		print '<p><table border="1" width="100%" align="right">' . "\n";
		print '<tr>' .
			'<td align="left"><b>Branch</b></td>' .
			'<td><b>Commits</b></td>' .
			'<td><b>Added</b></td>' .
			'<td><b>Removed</b></td>' .
			'<td><b>LOC</b></td>' .
			'<td><b>LOC / Commit</b></td>' .
			'</tr>' . "\n";
			
		while ($branch = mysql_fetch_row($branches))
		{
			$sum = $branch[1] + $branch[2];
			$lpc = $sum / $branch[3];
			print '<tr>' .
			'<td align="left"><a href="commits.php?committerid='. $_GET["committerid"] . '&branch=' . $branch[0] . '">' . $branch[0] . '</a></td>' .
			'<td>' . number_format($branch[3], 0) . '</td>' .
			'<td>' . number_format($branch[1], 0) . '</td>' .
			'<td>' . number_format($branch[2], 0) . '</td>' .
			'<td>' . number_format($sum, 0) . '</td>' .
			'<td>' . number_format($lpc, 2) . '</td>' .
			'</tr>' . "\n";

			$totalCommits += $branch[3];
			$totalPlus += $branch[1];
			$totalMinus += $branch[2];
			$totalSum += $sum;
			$totalLPC += $lpc;
		}

		print '<tr>' .
			'<td>&nbsp;</td>' .
			'<td><b>' . number_format($totalCommits, 0) . '</b></td>' .
			'<td><b>' . number_format($totalPlus, 0) . '</b></td>' .
			'<td><b>' . number_format($totalMinus, 0) . '</b></td>' .
			'<td><b>' . number_format($totalSum, 0) . '</b></td>' .
			'<td><b>&empty; ' . number_format($totalLPC / $rows, 2) . '</b></td>' .
			'</tr>' . "\n";
		print "</table><br/><br/>\n";
	}
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
