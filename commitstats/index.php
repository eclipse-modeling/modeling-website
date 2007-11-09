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
	preg_match("#(activecommitters|inactivecommitters|totalcommitters|pcactive|commits|loc|alocpc)#",$_GET["sortBy"],$matches);
	if (isset($matches) && isset($matches[1]))
	{
		$sortBy=$matches[1];
	}
}
if (isset($_GET["showCommitters"]))
{
	preg_match("#(active|inactive|all|none)#",$_GET["showCommitters"],$matches);
	if (isset($matches) && isset($matches[1]))
	{
		$showCommitters=$matches[1];
	}
	}

if (isset($_GET["showColor"]) && $_GET["showColor"] == "false")
{
	$showColor = false;
}
else
{
	$showColor = true;
}

# array to use when foreaching
$array = $commits;

# calculate missing data - approx LOC per commit
$alocpc = array(); 
foreach ($commits as $company => $v)
{
	$alocpc[$company] = $loc[$company]/$commits[$company];
}

# calculate missing data - inactive committers
$num_committers_inactive = array(); 
foreach ($num_committers as $company => $v)
{
	$num_committers_inactive[$company] = $num_committers[$company] - $num_committers_active[$company];
}
$num_committers_inactive_total = $num_committers_total - $num_committers_active_total;

# calculate missing data - inactive committers
$percent_active = array(); 
foreach ($num_committers as $company => $v)
{
	$percent_active[$company] = $num_committers_active[$company]/$num_committers[$company];
}

# define sort table
if ($sortBy=="activecommitters")
{
	arsort($num_committers_active); reset($num_committers_active); $array = $num_committers_active;
}
else if ($sortBy=="inactivecommitters")
{
	arsort($num_committers_inactive); reset($num_committers_inactive); $array = $num_committers_inactive;
}
else if ($sortBy=="totalcommitters")
{
	arsort($num_committers); reset($num_committers); $array = $num_committers;
}
else if ($sortBy=="pcactive")
{
	arsort($percent_active); reset($percent_active); $array = $percent_active;
}
else if ($sortBy=="commits")
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

# begin rendering HTML

$row = 0;
# header / column sorts
print "<table><tr bgcolor=\"". bgcol($row). "\">" .
	"<th valign=\"bottom\"><a href=\"?sortBy=&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Company</a></th>" . 
	"<th colspan=\"2\"><a href=\"?sortBy=activecommitters&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Active<br>Committers</a></th>" . 
	"<th colspan=\"2\"><a href=\"?sortBy=inactivecommitters&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Inactive<br>Committers</a></th>" . 
	"<th colspan=\"2\"><a href=\"?sortBy=totalcommitters&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Total<br>Committers</a></th>" . 
	"<th colspan=\"1\"><a href=\"?sortBy=pcactive&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Percent<br>Active</a></th>" . 
	"<th colspan=\"2\"><a href=\"?sortBy=commits&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Commits<br/>($year)</a></th>" . 
	"<th colspan=\"2\"><a href=\"?sortBy=loc&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Lines of Code<br/>(last 9 months)</a></th>" . 
	"<th colspan=\"1\"><a href=\"?sortBy=alocpc&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Approx. LOC<br/>per Commit</a></th>" . 
"</tr>\n";
foreach($array as $company => $v)
{
	$row++;
	print "<tr bgcolor=\"". bgcol($row). "\">" . 
		"<td>$company</td>" . 
		"<td align=\"right\"><a href=\"javascript:toggle('" . $company . "_active_committers')\">" . number($num_committers_active[$company], 
			null, array(7 => "<b style=\"color:red\">VAL</b>")
			) . "</a></td><td align=\"right\">(" . percent($num_committers_active[$company]/$num_committers_active_total) . ")</td>" .
			 
		"<td align=\"right\"><a href=\"javascript:toggle('" . $company . "_inactive_committers')\">" . number($num_committers_inactive[$company], 
			array(7 => "<b style=\"color:red\">VAL</b>"), array(2 => "<b style=\"color:green\">VAL</b>")
			) . "</a></td><td align=\"right\">(" . percent(($num_committers_inactive[$company])/$num_committers_inactive_total) . ")</td>" .
			 
		"<td align=\"right\"><a href=\"javascript:toggle('" . $company . "_committers')\">" . number($num_committers[$company], 
			null, array(7 => "<b style=\"color:red\">VAL</b>")
			) . "</a></td><td align=\"right\">(" . percent($num_committers[$company]/$num_committers_total) . ")</td>" .
			 
		"<td align=\"right\">" . percent($percent_active[$company], 100, 
			array(90 => "<b style=\"color:green\">VAL</b>", 70 => "<b style=\"color:blue\">VAL</b>"), array(25 => "<b style=\"color:red\">VAL</b>", 60 => "<b style=\"color:orange\">VAL</b>")
			). "</td>" .
		"<td align=\"right\">" . number($commits[$company]) . "</td><td align=\"right\">(" . percent($commits[$company]/$num_commits_total) . ")</td>" . 
		"<td align=\"right\">" . number($loc[$company]) . "</td><td align=\"right\">(" . percent($loc[$company]/$num_loc_total). ")</td>" .
		"<td align=\"right\">" . round($alocpc[$company]). "</td>" .
	"</tr>\n";
	$row++;
	
	ksort($committers[$company]); reset($committers[$company]); 
	
	# active committers
	print "<tr id=\"" . $company . "_active_committers\" style=\"display:" . ($showCommitters == "active" ? "" : "none") . "\" bgcolor=\"". bgcol2($row). "\">\n";
	print "<td colspan=\"13\" style=\"padding:6px\">";
	print "<div style=\"float:right\"><a href=\"javascript:toggle('" . $company . "_active_committers')\">[x]</a></div>";
	print "<a href=\"javascript:toggle('" . $company . "_active_committers')\"><b>$company Active Committers</b></a><br/>\n";
	print "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tr><td valign=\"top\" style=\"padding-left:8px\">\n"; 
	
	$cnt=0;
	$split_thresh = $num_committers_active[$company] > 5 ? ceil($num_committers_active[$company]/3) : 5;
	$had_active_committer = false;
	foreach($committers[$company] as $committer_name => $committer_loc)
	{
		if ($committer_loc >= 11)
		{
			$had_active_committer = true;
			$cnt++;
			if ($cnt % $split_thresh == 1) 
			{
				print "</td><td></td><td valign=\"top\" style=\"padding-left:8px\">\n"; 
			}
			print str_pad($cnt,2,"0",STR_PAD_LEFT) . ". $committer_name&#160;(" . number($committer_loc,null,array(1 => "<b style=\"color:red\">VAL</b>", 11 => "<b style=\"color:orange\">VAL</b>")) . " LOC)<br/>";
		}
	}
	if (!$had_active_committer)
	{
		print "<i" . ($showColor ? " style=\"color:red\"" : "") . ">No Active Committers!</i>";
	}	
	print "</td></tr></table></td></tr>\n";
	$row++;
	
	# inactive committers
	print "<tr id=\"" . $company . "_inactive_committers\" style=\"display:" . ($showCommitters == "inactive" ? "" : "none") . "\" bgcolor=\"". bgcol2($row). "\">\n";
	print "<td colspan=\"13\" style=\"padding:6px\">";
	print "<div style=\"float:right\"><a href=\"javascript:toggle('" . $company . "_inactive_committers')\">[x]</a></div>";
	print "<a href=\"javascript:toggle('" . $company . "_inactive_committers')\"><b>$company Inactive Committers</b></a><br/>\n";
	print "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tr><td valign=\"top\" style=\"padding-left:8px\">\n"; # inactive
	
	$cnt=0;
	$split_thresh = $num_committers_inactive[$company] > 5 ? ceil($num_committers_inactive[$company]/3) : 5;
	$had_inactive_committer = false;
	foreach($committers[$company] as $committer_name => $committer_loc)
	{
		if ($committer_loc < 11)
		{
			$had_inactive_committer = true;
			$cnt++;
			if ($cnt % $split_thresh == 1) 
			{
				print "</td><td></td><td valign=\"top\" style=\"padding-left:8px\">\n"; 
			}
			print str_pad($cnt,2,"0",STR_PAD_LEFT) . ". $committer_name&#160;(" . number($committer_loc,null,array(2 => "<b style=\"color:red\">VAL</b>", 11 => "<b style=\"color:orange\">VAL</b>")) . " LOC)<br/>";
		}
	}
	if (!$had_inactive_committer)
	{
		print "<i" . ($showColor ? " style=\"color:green\"" : "") . ">No inactive committers!</i>";
	}
	print "</td></tr></table></td></tr>\n";
	$row++;
	
	# all (total) committers
	print "<tr id=\"" . $company . "_committers\" style=\"display:" . ($showCommitters == "all" ? "" : "none") . "\" bgcolor=\"". bgcol2($row). "\">\n";
	print "<td colspan=\"13\" style=\"padding:6px\">";
	print "<div style=\"float:right\"><a href=\"javascript:toggle('" . $company . "_committers')\">[x]</a></div>";
	print "<a href=\"javascript:toggle('" . $company . "_committers')\"><b>$company Total Committers</b></a><br/>\n";
	print "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tr><td valign=\"top\" style=\"padding-left:8px\">\n"; # all
	
	$cnt=0;
	$split_thresh = $num_committers[$company] > 5 ? ceil($num_committers[$company]/3) : 5;
	foreach($committers[$company] as $committer_name => $committer_loc)
	{
		$cnt++;
		if ($cnt % $split_thresh == 1) 
		{
			print "</td><td></td><td valign=\"top\" style=\"padding-left:8px\">\n"; 
		}
		print str_pad($cnt,2,"0",STR_PAD_LEFT) . ". $committer_name&#160;(" . number($committer_loc,null,array(1 => "<b style=\"color:red\">VAL</b>", 11 => "<b style=\"color:orange\">VAL</b>")) . " LOC)<br/>";
	}
	print "</td></tr></table></td></tr>\n";
	$row++;
}

# footer / totals
$row++;
print "<tr bgcolor=\"". bgcol($row). "\">" . 
		"<th>Total</th>" . 
		"<th colspan=\"1\" align=\"right\">".number($num_committers_active_total)."</th><th colspan=\"1\"></th>" . 
		"<th colspan=\"1\" align=\"right\">".number($num_committers_inactive_total)."</th><th colspan=\"1\"></th>" .
		"<th colspan=\"1\" align=\"right\">".number($num_committers_total)."</th><th colspan=\"1\"></th>" .
		"<th colspan=\"1\"></th>" .
		"<th colspan=\"1\" align=\"right\">".number($num_commits_total)."</th><th colspan=\"1\"></th>" . 
		"<th colspan=\"1\" align=\"right\">".number($num_loc_total)."</th><th colspan=\"1\"></th>" . 
		"<th colspan=\"1\"></th>" . 
	"</tr>\n";
print "</table>\n";

print "<p>&#160;</p>\n";
print "<p><small>This automatically collected information may not represent true activity and should not be used as sole indicator of individual or project behavior. See the <a href=\"http://wiki.eclipse.org/index.php/Commits_Explorer\">wiki page</a> about known data anamolies.</p>\n";
print "<p>&#160;</p>\n";
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
print "<h6>Sort By</h6>\n";
print "<ul>\n";
print "<li><a " . ($sortBy == "" ? "name" : "href") . "=\"?sortBy=&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Company Name</a></li>\n";
print "<li><a " . ($sortBy == "activecommitters" ? "name" : "href") . "=\"?sortBy=activecommitters&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Active Committers</a></li>\n";
print "<li><a " . ($sortBy == "inactivecommitters" ? "name" : "href") . "=\"?sortBy=inactivecommitters&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Inactive Committers</a></li>\n";
print "<li><a " . ($sortBy == "totalcommitters" ? "name" : "href") . "=\"?sortBy=totalcommitters&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Total Committers</a></li>\n";
print "<li><a " . ($sortBy == "active" ? "name" : "href") . "=\"?sortBy=pcactive&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Percent Active</a></li>\n";
print "<li><a " . ($sortBy == "commits" ? "name" : "href") . "=\"?sortBy=commits&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Commits</a></li>\n";
print "<li><a " . ($sortBy == "loc" ? "name" : "href") . "=\"?sortBy=loc&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Lines of Code</a></li>\n";
print "<li><a " . ($sortBy == "alocpc" ? "name" : "href") . "=\"?sortBy=alocpc&amp;showCommitters=$showCommitters&amp;showColor=$showColor\">Approx. LOC per Commit</a></li>\n";
print "</ul>\n";
print "</div>\n";

print "<div class=\"sideitem\">\n";
print "<h6>Show</h6>\n";
print "<ul>\n";
print "<li><a " . ($showCommitters == "active" ? "name" : "href") . "=\"?sortBy=$sortBy&amp;showCommitters=active&amp;showColor=$showColor\">Active Committers</a></li>\n";
print "<li><a " . ($showCommitters == "inactive" ? "name" : "href") . "=\"?sortBy=$sortBy&amp;showCommitters=inactive&amp;showColor=$showColor\">Inactive Committers</a></li>\n";
print "<li><a " . ($showCommitters == "all" ? "name" : "href") . "=\"?sortBy=$sortBy&amp;showCommitters=all&amp;showColor=$showColor\">Total Committers</a></li>\n";
print "<li><a " . ($showCommitters == "" ? "name" : "href") . "=\"?sortBy=$sortBy&amp;showCommitters=&amp;showColor=$showColor\">No Committers</a></li>\n";
print "</ul>\n";
print "<ul>\n";
print "<li><a href=\"?sortBy=$sortBy&amp;showCommitters=$showCommitters&amp;showColor=" . ($showColor ? "0" : "1") . "\">Toggle Color</a></li>\n";
print "</ul>\n";
print "</div>\n";

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Stats By Company, Commits and LOC";
$pageKeywords = ""; 
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

# see colorize()
function number($num, $thresh_upper=null, $thresh_lower=null)
{
	$val = number_format($num);
	return colorize($num, $val, $thresh_upper, $thresh_lower);
}

# see colorize()
function percent($num, $mult=100, $thresh_upper=null, $thresh_lower=null)
{
	$val = (round($num*100*$mult)/100);
	return colorize($val, $val . "%", $thresh_upper, $thresh_lower);
}

# define number-based threshholds to assign colour, 
# eg: $thresh_upper=array(90 => "<b style=\"color:green\">VAL</b>"), $thresh_lower=array(10 => "<b style=\"color:red\">VAL</b>")
function colorize($val, $str, $thresh_upper=null, $thresh_lower=null)
{
	global $showColor;
	if ($showColor)
	{
		if ($thresh_upper && is_array($thresh_upper))
		{
			foreach ($thresh_upper as $lim => $fmt)
			{
				if ($val >= $lim)
				{
					return preg_replace("#VAL#",$str,$fmt);
				}
			}
		}
		if ($thresh_lower && is_array($thresh_lower))
		{
			foreach ($thresh_lower as $lim => $fmt)
			{
				if ($val <= $lim)
				{
					return preg_replace("#VAL#",$str,$fmt);
				}
			}
		}
	}
	return $str;
}

function bgcol($row)
{
	return $row % 2 == 0 ? "#EEEEEE" : "#FFFFFF"; 
}

function bgcol2($row)
{
	return $row % 2 == 0 ? "#EEEEEE" : "#DDDDDD"; 
}

?>