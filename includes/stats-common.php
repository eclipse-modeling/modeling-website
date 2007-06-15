<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

$project = "`project` LIKE '%%' AND `component` LIKE '%%'";
$result = wmysql_query("SELECT `project`, `component` FROM `file_downloads` GROUP BY `project`, `component`");
while ($row = mysql_fetch_row($result))
{
	$p[$row[0]] = "`project` = '$row[0]'";
	$p["$row[0]/$row[1]"] = "`project` = '$row[0]' AND `component` = '$row[1]'";
}

$pname = "All Projects";
if (isset($_GET["p"]) && isset($p[$_GET["p"]]))
{
	$project = $p[$_GET["p"]];
	$pname = htmlspecialchars($_GET["p"]);
}

$result = wmysql_query("SELECT MIN(`day`), MAX(`day`) + INTERVAL 1 DAY FROM `file_downloads` WHERE $project");
$row = mysql_fetch_row($result);
list($start, $end) = $row;
/* $userstart and $userend are the dates provided by the user, as long as they look like a date
 * they do not need to be within the daterange for which we have stats or otherwise valid, they are only used for the id of the query on the page
 * we fix the $start and $end dates before we use them, but because the client doesn't know we fixed them, it'll be confused if the id is fixed too
 * thus, the clientside query ids coorespond to the query that was sent by the client, not the query that was performed on the server
 */
list($userstart, $userend) = $row;

$v = array("start", "end");

foreach ($v as $z)
{
	if (isset($_GET[$z]) && preg_match("/^\d{4}-\d\d-\d\d$/", $_GET[$z]))
	{
		$tmp = strtotime($_GET[$z]);
		if ($tmp > strtotime($start) && $tmp < strtotime($end))
		{
			$$z = $_GET[$z];
		}
		$tmp = "user$z";
		$$tmp = $_GET[$z];
	}
}

/* these are used repeatedly in the queries below */
$dayrange = '`day` >= \'%2$s\' AND `day` < \'%3$s\'';
$rangedays = 'DATEDIFF(\'%3$s\', \'%2$s\')';
$rangefmt = 'CONCAT(DATE_FORMAT(\'%2$s\', \'%%Y-%%m-%%d\'), \' through \', DATE_FORMAT(\'%3$s\', \'%%Y-%%m-%%d\'))';

/* this is the heart of the stats engine, it allows us to add or remove queries with ease
 *
 * query indices may be arbitrary (although they aren't really user visible)
 * each query must contain a "name", "sql", and "trendsql" entry
 * "name" is the vanity name which is presented to the user
 * "sql" is the query which is executed for non-trending queries, sprintf("sql", $limit) is called before executing the query
 * "trendsql" is the query which is executed for trending queries and must be suitable for repeated UNION with itself with various dateranges, you will want to use $dayrange and $rangefmt (see below), sprintf("trendsql", $limit, $start, $end) is called before executing the query
 *
 * both "sql" and "trendsql" must select two columns, the first of which is the label for that row of data, and the second of which is the value for that row, additional columns may be selected if necessary, but they will not be presented to the user
 *
 * additionally, a query may contain the "note" and "showpercent" entries
 * "note" is useful if you'd like to make a disclaimer about the results of a particular query, or other small bits of static information
 * "showpercent" can be set to false if showing the raw value of each row divided into the total number of downloads as a percentage doesn't make any sense
 */
$queries = array(
	0 => array(
		"name" => "Popular Files",
		"sql" => "SELECT `filename`, SUM(`number`) AS `pop` FROM `file_downloads` NATURAL JOIN `distfiles` WHERE $project GROUP BY `filename` ORDER BY `pop` DESC LIMIT %u",
		"trendsql" => "(SELECT CONCAT(`filename`, ' for ', $rangefmt), SUM(`number`) AS `pop` FROM `file_downloads` NATURAL JOIN `distfiles` WHERE $dayrange AND $project GROUP BY `filename` ORDER BY `pop` DESC LIMIT 10)"
	),
	1 => array(
		"name" => "Downloads Page vs Update Manager",
		"sql" => "SELECT IF(`filetype` = 'zip', 'Downloads Page', 'Update Manager'), SUM(`number`) AS `pop` FROM `file_downloads` NATURAL JOIN `distfiles` WHERE $project GROUP BY `filetype` ORDER BY `pop` DESC LIMIT %u",
		"trendsql" => "(SELECT CONCAT(IF(`filetype` = 'zip', 'Downloads Page', 'Update Manager'), ' for ', $rangefmt) AS `desc`, SUM(`number`) AS `pop` FROM `file_downloads` NATURAL JOIN `distfiles` WHERE $dayrange AND $project GROUP BY `filetype` ORDER BY `desc` LIMIT 10)"
	),
	2 => array(
		"name" => "Release Types",
		"sql" => "SELECT CONCAT(`name`, ' builds'), SUM(`number`) AS `pop` FROM `file_downloads` NATURAL JOIN `distfiles` NATURAL JOIN `releasetypes` WHERE `type` IS NOT NULL AND $project GROUP BY `type` ORDER BY `pop` DESC LIMIT %u",
		"trendsql" => "(SELECT CONCAT(CONCAT(`name`, ' builds'), ' for ', $rangefmt), SUM(`number`) AS `pop` FROM `file_downloads` NATURAL JOIN `distfiles` NATURAL JOIN `releasetypes` WHERE `type` IS NOT NULL AND $dayrange AND $project GROUP BY `type` ORDER BY `pop` DESC LIMIT 10)"
	),
	3 => array(
		"name" => "Project Popularity",
		"sql" => "SELECT `projects`, SUM(`number`) AS `pop` FROM `file_downloads` NATURAL JOIN `distfiles` WHERE `projects` IS NOT NULL AND $project GROUP BY `projects` ORDER BY `pop` DESC LIMIT %u",
		"trendsql" => "(SELECT CONCAT(`projects`, ' for ', $rangefmt), SUM(`number`) AS `pop` FROM `file_downloads` NATURAL JOIN `distfiles` WHERE `projects` IS NOT NULL AND $dayrange AND $project GROUP BY `projects` ORDER BY `pop` DESC LIMIT 10)"
	),
	4 => array(
		"name" => "Bundle Popularity",
		"sql" => "SELECT `bundle`, SUM(`number`) AS `pop` FROM `file_downloads` NATURAL JOIN `distfiles` WHERE `bundle` IS NOT NULL AND $project GROUP BY `bundle` ORDER BY `pop` DESC LIMIT %u",
		"trendsql" => "(SELECT CONCAT(`bundle`, ' for ', $rangefmt), SUM(`number`) AS `pop` FROM `file_downloads` NATURAL JOIN `distfiles` WHERE `bundle` IS NOT NULL AND $dayrange AND $project GROUP BY `bundle` ORDER BY `pop` DESC LIMIT 10)"
	),
	5 => array(
		"name" => "Release Popularity",
		"sql" => "SELECT `releasename`, SUM(`number`) AS `pop` FROM `file_downloads` NATURAL JOIN `distfiles` WHERE `releasename` != '' AND $project GROUP BY `releasename` ORDER BY `pop` DESC LIMIT %u",
		"trendsql" => "(SELECT CONCAT(`releasename`, ' for ', $rangefmt), SUM(`number`) AS `pop` FROM `file_downloads` NATURAL JOIN `distfiles` WHERE `releasename` != '' AND $dayrange AND $project GROUP BY `releasename` ORDER BY `pop` DESC LIMIT 10)"
	),
	6 => array(
		"name" => "Downloads by Country",
		"sql" => "SELECT `countryname`, SUM(`number`) AS `pop` FROM `country_downloads` NATURAL JOIN `populations` WHERE $project GROUP BY `country` ORDER BY `pop` DESC LIMIT %u",
		"trendsql" => "(SELECT CONCAT(`countryname`, ' for ', $rangefmt), SUM(`number`) AS `pop` FROM `country_downloads` NATURAL JOIN `populations` WHERE $dayrange AND $project GROUP BY `country` ORDER BY `pop` DESC LIMIT 10)"
	),
	7 => array(
		"name" => "Downloads/1000 people, by Country",
		"sql" => "SELECT `countryname`, SUM(`number`)/(`population`/1000) AS `pop` FROM `country_downloads` NATURAL JOIN `populations` WHERE $project GROUP BY `country` ORDER BY `pop` DESC LIMIT %u",
		"trendsql" => "(SELECT CONCAT(`countryname`, ' for ', $rangefmt), SUM(`number`)/(`population`/1000) AS `pop`, `day` FROM `country_downloads` NATURAL JOIN `populations` WHERE $dayrange AND $project GROUP BY `country` ORDER BY `pop` DESC LIMIT 10)",
		"note" => "Countries with unknown populations are not shown. Country codes are wildy inconsistent, and sometimes do not even map 1-1 between different sources, as a result, some countries are not shown here and some may have incorrect populations stored.",
		"showpercent" => false
	),
	8 => array(
		"name" => "Downloads by Weekday",
		"sql" => "SELECT DAYNAME(`day`) AS `weekday`, SUM(`number`) AS `pop` FROM `file_downloads` WHERE $project GROUP BY `weekday` ORDER BY `pop` DESC LIMIT %u",
		"trendsql" => "(SELECT CONCAT(DAYNAME(`day`), ' for ', $rangefmt), ROUND(SUM(`number`)) FROM `file_downloads` WHERE $dayrange AND $project GROUP BY DATE_FORMAT(`day`, '%%w'))"
	),
	9 => array(
		"name" => "Downloads per Day",
		"sql" => "SELECT '$start through $end', `pop`/DATEDIFF('$end', '$start') FROM (SELECT SUM(`number`) AS `pop` FROM `file_downloads` WHERE $project) AS `tmp` LIMIT %u",
		"trendsql" => "SELECT $rangefmt, ROUND(`pop`/$rangedays) FROM (SELECT SUM(`number`) AS `pop` FROM `file_downloads` WHERE $dayrange AND $project) AS `tmp`",
		"showpercent" => false
	)
);

/* the possible trends to use
 * "value"s are a relative time measure accepted by strtotime()
 * "name"s are what the user sees
 * trend indices may be arbitrary (although they aren't really user visible)
 */
$trends = array(
	-1 => array(
		"name" => "No trending",
		"value" => "0"
	),
	0 => array(
		"name" => "Trending per year",
		"value" => "+1 year"
	),
	1 => array(
		"name" => "Trending per quarter",
		"value" => "+3 month"
	),
	2 => array(
		"name" => "Trending per month",
		"value" => "+1 month"
	),
	3 => array(
		"name" => "Trending per 7 days",
		"value" => "+1 week"
	),
	4 => array(
		"name" => "Trending per day",
		"value" => "+1 day"
	)
);

$views = array(
	"homeitem3col" => "3 Columns",
	"homeitem" => "4 Columns"
);

$limit = 30;
if (isset($_GET["l"]) && preg_match("/^\d+$/", $_GET["l"]) && $_GET["l"] > 0 && $_GET["l"] < (pow(2, 64) - 1))
{
	$limit = $_GET["l"];
}

$query = 0;
if (isset($_GET["q"]) && preg_match("/^(?:" . join("|", array_keys($queries)) . ")$/", $_GET["q"]))
{
	$query = $_GET["q"];
}

$trend = -1;
if (isset($_GET["t"]) && preg_match("/^(?:" . join("|", array_keys($trends)) . ")$/", $_GET["t"]))
{
	$trend = $_GET["t"];
	/* larger result sets than 100 tend to become overwhelming and we can't seem to union more than ~128 queries anyways */
	$limit = ($limit > 100 ? 100 : $limit);
}

ob_start();

print "<div id=\"midcolumn\">\n";

print "<h1>Download Stats</h1>\n";

print "<div class=\"homeitem3col\">\n";
print "<h3>Select a query</h3>\n";
print "<div id=\"querybox\">\n";
print "<form method=\"get\" action=\"stats.php\" onsubmit=\"javascript:return checkprepend(this);\">\n";

print "<select name=\"p\">\n";
print "<option value=\"All Projects\">All Projects</option>\n";
foreach (array_keys($p) as $z)
{
	$sel = ($pname == $z ? " selected=\"selected\"" : "");
	$sp = "&#160;&#160;&#160;";
	$vanityname = (preg_match("#/#", $z) ? "$sp$sp$z" : "$sp$z");
	print "<option value=\"$z\"$sel>$vanityname</option>\n";
}
print "</select>\n";
print "<br/>\n";

print "<input type=\"text\" name=\"start\" value=\"$start\"/>\n";
print "through\n";
print "<input type=\"text\" name=\"end\" value=\"$end\"/>\n";
print "<br/>\n";

print "<select name=\"q\">\n";
foreach (array_keys($queries) as $z)
{
	$sel = ($query == $z ? " selected=\"selected\"" : "");
	print "<option value=\"$z\"$sel>{$queries[$z]["name"]}</option>\n";
}
print "</select>\n";

print "<select name=\"t\">\n";
foreach (array_keys($trends) as $z)
{
	$sel = ($trend == $z ? " selected=\"selected\"" : "");
	print "<option value=\"$z\"$sel>{$trends[$z]["name"]}</option>\n";
}
print "</select>\n";

print "<input type=\"submit\" value=\"Go!\"/>\n";
print "<input type=\"hidden\" id=\"brief\" name=\"b\" value=\"false\"/>";
print "</form>\n";
print "</div>\n";
print "</div>\n";

ob_start();
print "<div class=\"homeitem3col open\" id=\"" . query_id($pname, $userstart, $userend, $query, $trend) . "\">\n";
/* "this" in an href is the window (not the object), so we use onclick instead (where we get the anchor we wanted) */
print "<h3>";
print "<a href=\"javascript:void(0);\" onclick=\"javascript:rm(this)\" class=\"close\" title=\"Close\">[ X ]</a>";
$star = (isset($queries[$query]["note"]) ? " *" : "");
print "<a href=\"javascript:void(0);\" onclick=\"javascript:toggle(this, false)\" class=\"down\">$pname - {$queries[$query]["name"]} - {$trends[$trend]["name"]}$star</a>";
print "</h3>\n";

print "<ul class=\"stats\">\n";
$result = wmysql_query("SELECT SUM(`number`) AS `total` FROM `file_downloads`");
$row = mysql_fetch_row($result);
$total = $row[0];

if ($trend == -1)
{
	$result = wmysql_query(sprintf($queries[$query]["sql"], $limit));
}
else
{
	$startts = strtotime($start);
	if ($trend == 0)
	{
		$startts = strtotime(preg_replace("/\d\d$/", "01", $start)); //align the date on the first of a month
	}

	for ($ts = $startts; $ts < strtotime($end); $ts = strtotime($trends[$trend]["value"], $ts))
	{
		$d[] = strftime("%Y-%m-%d", $ts);
	}
	$d[] = $end;

	for ($i = 0; $i < sizeof($d) - 1 && $i < $limit; $i++)
	{
		$q[] = sprintf($queries[$query]["trendsql"], $limit, $d[$i], $d[$i + 1]);
	}
	$result = wmysql_query(join(" UNION ", $q));
}

$max = -1;
$last = "";
$dat = array();
while ($row = mysql_fetch_row($result))
{
	$tmp = preg_replace("/^.+ for /", "", $row[0]);
	if ($tmp != $last && sizeof($dat) > 0)
	{
		$dat[sizeof($dat) - 1]["sep"] = true;
	}
	$last = $tmp;

	$dat[] = $row;
	$max = max($max, $row[1]);
}

$lastsep = true;
$first = true;
foreach ($dat as $row)
{
	$name = $row[0];
	if (!$lastsep)
	{
		$name = preg_replace("/ for .+$/", "", $name);
	}
	else if ($first && $trend == -1)
	{
		$name = "$name for $start through $end";
		$first = false;
	}
	$lastsep = isset($row["sep"]);
	$liclass = (isset($row["sep"]) && $trend != -1 ? " class=\"sep\"" : "");
	if (isset($queries[$query]["showpercent"]) && !$queries[$query]["showpercent"])
	{
		$percent = "";
		$value = $row[1];
	}
	else
	{
		$percent = round($row[1]*100/$total, 2) . "% ";
		$value = "($row[1])";
	}
	print "<li$liclass><div class=\"bar\" style=\"width: " . round($row[1]*100/$max) . "%\">&#160;</div><span>$percent$value</span><div class=\"name\">$name</div></li>\n";
}
print "</ul>\n";

if (isset($queries[$query]["note"]))
{
	print "<p>* {$queries[$query]["note"]}</p>\n";
}

print "</div>\n";
$graph = ob_get_contents();
ob_end_clean();

if (isset($_GET["b"]) && $_GET["b"] === "true") //brief page, for ajax
{
	ob_end_clean();
	header("Content-Type: application/xml");
	print "<?xml version=\"1.0\"?>\n";
	print "<data xmlns=\"http://www.w3.org/1999/xhtml\">\n";
	print $graph;
	print "</data>\n";
}
else
{
	print $graph;
	print "<div id=\"placeholder\"></div>\n"; //we always insert before an element, when there's no results, we need a placeholder at the end to insert before
	print "</div>\n";

	print "<div id=\"rightcolumn\">\n";

	print "<div class=\"sideitem\">\n";
	print "<h6><a id=\"pagelink\" href=\"" . $_SERVER["PHP_SELF"] . "?" . htmlspecialchars($_SERVER["QUERY_STRING"]) . "\">Link to this view <img src=\"/modeling/images/link.png\" alt=\"\"/></a></h6>\n";
	print "</div>\n";

	print "<div class=\"sideitem\" id=\"viewopts\">\n";
	print "<h6>View options</h6>\n";
	print "<form action=\"\" method=\"get\">\n";
	print "<select id=\"view\" onchange=\"javascript:set_view(this.options[this.selectedIndex].value)\">\n";
	foreach (array_keys($views) as $z)
	{
		print "<option value=\"$z\">$views[$z]</option>\n";
	}
	print "</select>\n";
	print "</form>\n";
	print "</div>\n";

	print "<div class=\"sideitem\" id=\"progressbox\">\n";
	print "<h6>Progress</h6>\n";
	print "<p id=\"progress\">Done.</p>\n";
	print "</div>\n";

	print "</div>\n";
	$html = ob_get_contents();
	ob_end_clean();

	$pageTitle = "Eclipse Modeling - Download Stats";
	$pageKeywords = ""; // TODO: add something here
	$pageAuthor = "Neil Skrypuch";

	# Generate the web page
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/stats.css"/>' . "\n");
	$App->AddExtraHtmlHeader('<script type="text/javascript" src="/modeling/includes/stats.js"></script>' . "\n");

	ob_start();
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
	$html = ob_get_contents();
	ob_end_clean();

	print preg_replace("#<body>#", "<body onload=\"javascript:init()\">", $html);
}

/* we need to somehow identify each of the queries once they're embedded into the page, and using the query itself works well, with a few caveats...
 * in particular, the valid characters for the id tag are quite limited, we get around this by urlencoding the query, and then replacing %s with :s, which can be easily reversed client side
 */
function query_id($pname, $userstart, $userend, $query, $trend)
{
	$params = array(
		"p" => "pname",
		"start" => "userstart",
		"end" => "userend",
		"q" => "query",
		"t" => "trend"
	);
	$q = array();

	foreach (array_keys($params) as $z)
	{
		$q[] = "$z=" . $$params[$z];
	}

	/* %s aren't valid in id tags, so we convert to :, then we can convert back client side */
	/* we work around the + vs %20 silliness by always using %20 */
	return preg_replace("/%/", ":", preg_replace("/\+/", "%20", urlencode(join("&", $q))));
}
?>
