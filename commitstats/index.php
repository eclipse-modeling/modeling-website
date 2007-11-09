<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

$theme = "Phoenix";

include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

print "<div id=\"midcolumn\">\n";

print "<h1>Commit stats per company for all Eclipse projects</h1>\n";

$year = 2007;
$commits_file = "data/_data.php";
require_once($commits_file);

if (isset($_GET["sortBy"]))
{
	preg_match("#(commits|loc|alocpc)#",$_GET["sortBy"],$matches);
	if (isset($matches) && isset($matches[1]))
	{
		$sortBy=$matches[1];
	}
}

# array to use when foreaching
$array = $commits;

$alocpc = array(); # approx LOC per commit
foreach ($commits as $company => $v)
{
	$alocpc[$company] = $loc[$company]/$commits[$company];
}

if ($sortBy=="commits")
{
	arsort($commits); reset($commits); $array = $commits;
}
else if ($sortBy=="loc")
{
	arsort($loc); reset($loc); $array = $loc;
}
else if ($sortBy=="alocpc")
{
	arsort($alocpc); reset($alocpc); $array = $alocpc;
}

$row = 0;
print "<table><tr bgcolor=\"". bgcol($row). "\">" .
	"<th valign=\"bottom\">Company</th>" . 
	"<th colspan=\"2\">Commits<br/>($year)</th>" . 
	"<th colspan=\"2\">Lines of Code<br/>(last 9 months)</th>" . 
	"<th colspan=\"1\">Approx. LOC<br/>per Commit</th>" . 
"</tr>\n";
foreach($array as $company => $v)
{
	$row++;
	print "<tr bgcolor=\"". bgcol($row). "\">" . 
		"<td>$company</td>" . 
		"<td align=\"right\">" . number_format($commits[$company]) . "</td><td align=\"right\">(" . percent($commits[$company]/$num_commits_total) . "%)</td>" . 
		"<td align=\"right\">" . number_format($loc[$company]) . "</td><td align=\"right\">(" . percent($loc[$company]/$num_loc_total). "%)</td>" .
		"<td align=\"right\">" .  percent($alocpc[$company],1). "</td>" .
	"</tr>\n";
}
$row++;
print "<tr bgcolor=\"". bgcol($row). "\">" . 
		"<th>Total</th>" . 
		"<th colspan=\"1\" align=\"right\">".number_format($num_commits_total)."</th><th colspan=\"1\"></th>" . 
		"<th colspan=\"1\" align=\"right\">".number_format($num_loc_total)."</th><th colspan=\"1\"></th>" . 
		"<th colspan=\"1\"></th>" . 
	"</tr>\n";
print "</table>\n";

print "<p>&nbsp;</p>\n";
print "<p><small>This automatically collected information may not represent true activity and should not be used as sole indicator of individual or project behavior. See the <a href=\"http://wiki.eclipse.org/index.php/Commits_Explorer\">wiki page</a> about known data anamolies.</p>\n";
print "<p>&nbsp;</p>\n";
print "</div>\n";

print "<div id=\"rightcolumn\">\n";

print "<div class=\"sideitem\">\n";
print "<h6>About</h6>\n";
print "<p>Queries used:\n";
print "<ol>\n";
print "<li><a href=\"http://dash.eclipse.org/dash/commits/web-api/commit-summary.php?company=x&login=y&year=$year\">summary</a></li>\n";
print "<li><a href=\"http://dash.eclipse.org/dash/commits/web-api/commit-active-committers.php?company=IBM\">active-committers</a><br/>(once per company)</li>\n";
print "</ol>\n";
print "<p>Data last collected:<br/>" . date("Y-m-d H:i:s T",filemtime($commits_file)) . "</p>\n";
print "</div>\n";

print "<div class=\"sideitem\">\n";
print "<h6>Sort</h6>\n";
print "<ul>\n";
print "<li><a " . ($sortBy == "" ? "name" : "href") . "=\"?sortBy=\">By Company</a></li>\n";
print "<li><a " . ($sortBy == "commits" ? "name" : "href") . "=\"?sortBy=commits\">By Commits</a></li>\n";
print "<li><a " . ($sortBy == "loc" ? "name" : "href") . "=\"?sortBy=loc\">By LOC</a></li>\n";
print "<li><a " . ($sortBy == "alocpc" ? "name" : "href") . "=\"?sortBy=alocpc\">Approx. LOC per Commit</a></li>\n";
print "</ul>\n";
print "</div>\n";

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Stats By Company, Commits and LOC";
$pageKeywords = ""; 
$pageAuthor = "Nick Boldt";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

function percent($num,$mult=100)
{
	return (round($num*100*$mult)/100);
}

function bgcol($row)
{
	return $row % 2 == 0 ? "#EEEEEE" : "#FFFFFF"; 
}

?>