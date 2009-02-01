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
	$branches = wmysql_query("SELECT " .
		"Branch, " .
		"SUM(LinesPlus) AS Added, " . 
		"SUM(LinesMinus) AS Removed, " . 
		"COUNT(fid) AS Files, " . 
		"MIN(date) AS FromDate, " . 
		"MAX(date) AS UntilDate " . 
		"FROM commits " . 
		"WHERE Author = '" . $row[0] . "' " . 
		"GROUP BY Branch " . 
		"ORDER BY UntilDate DESC");

	if ($branches && mysql_num_rows($branches) > 0)
	{
		$rows = mysql_num_rows($branches);
		$totalSum = 0;
		$totalLPF = 0;

		print '<p><table border="1" width="100%" align="right">' . "\n";
		print '<tr>' .
			'<td align="left"><b>Branch</b></td>' .
			'<td><b>Begin</b></td>' .
			'<td><b>Days</b></td>' .
			'<td><b>Files</b></td>' .
			'<td><b>Lines</b></td>' .
			'<td><b>&empty;</b></td>' .
			'</tr>' . "\n";
			
		while ($branch = mysql_fetch_row($branches))
		{
			$sum = $branch[1] + $branch[2];
			$lpf = $sum / $branch[3];
			$begin = formatDate($branch[4]);
			$days = daysBetween($branch[4], $branch[5]);

			print '<tr>' .
				'<td align="left"><a href="commits.php?committerid='. $_GET["committerid"] . '&branch=' . $branch[0] . '">' . $branch[0] . '</a></td>' .
				'<td>' . $begin . '</td>' .
				'<td>' . $days . '</td>' .
				'<td>' . $branch[3] . '</td>' .
				'<td>' . $sum . '</td>' .
				'<td>' . round($lpf) . '</td>' .
				'</tr>' . "\n";

			$totalSum += $sum;
			$totalLPF += $lpf;
		}

		print '<tr>' .
			'<td>&nbsp;</td>' .
			'<td>&nbsp;</td>' .
			'<td>&nbsp;</td>' .
			'<td>&nbsp;</td>' .
			'<td><b>' . $totalSum . '</b></td>' .
			'<td><b>' . round($totalLPF / $rows) . '</b></td>' .
			'</tr>' . "\n";
		print "</table><br/><br/>\n";
	}

	print '<h1>Bugzilla Activity</h1>';
	$bugs = wmysql_query("SELECT " .
			"bugdescs.bugid, " .
			"SUM(LinesPlus) AS Added, " . 
			"SUM(LinesMinus) AS Removed, " . 
			"COUNT(commits.fid) AS Files, " . 
			"Title " . 
			"FROM commits JOIN bugs JOIN bugdescs " . 
			"WHERE Author = '" . $row[0] . "' AND commits.fid = bugs.fid AND bugs.bugid = bugdescs.bugid " . 
			"GROUP BY BugID " . 
			"ORDER BY BugID");

	if ($bugs && mysql_num_rows($bugs) > 0)
	{
		$rows = mysql_num_rows($bugs);
		$totalSum = 0;
		$totalLPF = 0;

		print '<p><table border="1" width="100%" align="right">' . "\n";
		print '<tr>' .
				'<td align="left"><b>ID</b></td>' .
				'<td align="left"><b>Summary</b></td>' .
				'<td><b>Files</b></td>' .
				'<td><b>Lines</b></td>' .
				'<td><b>&empty;</b></td>' .
				'</tr>' . "\n";

		while ($bug = mysql_fetch_row($bugs))
		{
			$sum = $bug[1] + $bug[2];
			$lpf = $sum / $bug[3];

			print '<tr>' .
					'<td align="left"><a href="' . $bugurl . '/' . $bug[0] . '">' . $bug[0] . '</a></td>' .
					'<td>' . $bug[4] . '</td>' .
					'<td>' . $bug[3] . '</td>' .
					'<td>' . $sum . '</td>' .
					'<td>' . round($lpf) . '</td>' .
					'</tr>' . "\n";

			$totalSum += $sum;
			$totalLPF += $lpf;
		}

		print '<tr>' .
				'<td>&nbsp;</td>' .
				'<td>&nbsp;</td>' .
				'<td>&nbsp;</td>' .
				'<td><b>' . $totalSum . '</b></td>' .
				'<td><b>' . round($totalLPF / $rows) . '</b></td>' .
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
