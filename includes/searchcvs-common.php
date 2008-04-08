<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

/* Supported querystring parameters:
 *   q           - REQUIRED; search terms as outlined in http://wiki.eclipse.org/index.php/Search_CVS#Parameter_List
 *   totalonly   - OPTIONAL; if set, display only a count of the # of deltas found; overrides showbuglist
 *   showbuglist - OPTIONAL; if set, display csv list of bugs found
 *   bugfilter   - OPTIONAL; if set, filter results if `bugid` defined for each commit; values: "hasbug" or "nobug"
 *   fullpath    - OPTIONAL; if set, show full file path rather than just the filename
 */

$pagesize = (isset($_GET["showbuglist"]) ? 10000 : 25); //results per page; need more than 25 for meaningful results if showing just list of bugs
$fullpath = (isset($_GET["fullpath"]) ? 1 : 0); // show full path in listing? (useful when searching for changes across projects by author or date range)
$scroll = 5; //+- pages to show in nav
$days = 7;
$page = (isset($_GET["p"]) && preg_match("/^\d+$/", $_GET["p"]) ? $_GET["p"] : 1);
$offset = ($page - 1) * $pagesize;

$where = "WHERE `date` >= DATE_SUB(CURDATE(), INTERVAL $days DAY)";
$order = "ORDER BY `date` DESC";

$extraf = array(
	array("regex" => "/author: ?(\S+)/", "sql" => "`author` LIKE '%%%s%%'", "sqlpart" => "where"),
	array("regex" => "/file: ?(\S+)/", "sql" => "`cvsname` LIKE '%%%s%%'", "sqlpart" => "where"),
	array("regex" => "/days: ?(\d+)/", "sql" => "`date` >= DATE_SUB(CURDATE(), INTERVAL %d DAY)", "sqlpart" => "where"),
	array("regex" => "/(?:project|module): ?(\S+)/", "sql" => "`project` LIKE '%s'", "sqlpart" => "where"),
	array("regex" => "/startdate: ?(\d{4}-\d\d-\d\d(?: \d\d:\d\d(?::\d\d)?)?)/", "sql" => "`date` >= '%s'", "sqlpart" => "where"),
	array("regex" => "/enddate: ?(\d{4}-\d\d-\d\d(?: \d\d:\d\d(?::\d\d)?)?)/", "sql" => "`date` <= '%s'", "sqlpart" => "where"),
	array("regex" => "/branch: ?(\S+)/", "sql" => "`branch` LIKE '%%%s%%'", "sqlpart" => "where"),
	array("regex" => "/bugid: ?(\d+)/", "sql" => "`bugid` = %d", "sqlpart" => "where")
);

if (!isset($_GET["q"]))
{
	$_GET["q"] = "";
}
$q = (get_magic_quotes_gpc() ? $_GET["q"] : addslashes($_GET["q"]));

/* needs db write access
$ip = $_SERVER["REMOTE_ADDR"];
$referer = (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "");
$pagename = $_SERVER["PHP_SELF"];
wmysql_query("INSERT INTO `stats` SET `q` = '$q', `ip` = '$ip', `referer` = '$referer', `time` = NOW(), `page` = '$pagename', `pagenum` = '$page'");
*/

$bugid = "";
$extra = array("where" => array(), "having" => array());
foreach ($extraf as $z)
{
	while (preg_match($z["regex"], $q, $regs))
	{
		$extra[$z["sqlpart"]][] = sprintf($z["sql"], $regs[1]);
		if (preg_match("#^/bugid:#", $z["regex"]))
		{
			$bugid = $regs[1];
		}
		$q = preg_replace($z["regex"], "", $q);
	}
}

/* Static list of mappings - needs to be updated when more top-level projects are added. See http://dev.eclipse.org/viewcvs/ for current list. */
$cvsroots = array(
	"birt" => "BIRT_Project",
	"datatools" => "Datatools_Project",
	"dsdp" => "DSDP_Project",
	"eclipse" => "Eclipse_Project",
	"modeling" => "Modeling_Project",
	"org.eclipse" => "Eclipse_Website",
	"stp" => "STP_Project",
	"technology" => "Technology_Project",
	"tools" => "Tools_Project",
	"tptp" => "TPTP_Project",
	"webtools" => "WebTools_Project"
);

$regs = array();
$et = "";
$having = "";
$ec = "";
/* this *could* be put into $extraf, but it would change the semantics slightly, in that any number searched for would be treated as a bug #, which i think is undesirable */
if (preg_match("/^\s*\[?(\d+)\]?\s*$/", $_GET["q"], $regs))
{
	$_GET["q"] = $regs[1];
	$where = "WHERE `bugid` = $regs[1]";
	$et = "Bug #";
	$bugid = $regs[1];
}
else if (preg_match("/(\S)/", $q, $regs) || sizeof($extra["where"]) + sizeof($extra["having"]) > 0)
{
	$match = "'1'";
	if (sizeof($regs) > 0)
	{
		$match = "MATCH(`message`) AGAINST('$q'" . (preg_match("/\".+\"/", $q) ? " IN BOOLEAN MODE" : "") . ")";
	}
	$where = "WHERE " . ($match ? $match : "1");
	if (isset($_GET["bugfilter"]))
	{
		if ($_GET["bugfilter"] == "hasbug")
		{
			$where .= " AND `bugid` > 0";
		}
		else if ($_GET["bugfilter"] == "nobug")
		{
			$where .= " AND `bugid` IS NULL";
		}
	}
	$where .= (sizeof($extra["where"]) > 0 ? " AND " . join($extra["where"], " AND ") : "");
	$having = (sizeof($extra["having"]) > 0 ? " HAVING " . join($extra["having"], " AND ") : "");
	$ec = ", $match AS `relevance`";
	$order = "ORDER BY `relevance` DESC, `date` DESC";
}
?>
<div id="midcolumn">
<div class="homeitem3col">
	<h3>Search</h3>
	<div id="searchdiv">
		<form action="" method="get">
			<input type="text" size="60" id="qb" name="q"<?php print ($_GET["q"] ? " value=\"" . sanitize($_GET["q"], "text") . "\"" : ""); ?>/>
			<input type="submit" value="Go!"/>
			<br/>
			<label for="project">Project: </label>
			<select id="project" name="project" onchange="javascript:setquery();">
			<option selected="selected" value="0">-- Select a project --</option>
			<?php
			$result = wmysql_query("SELECT `project` FROM `cvsfiles` GROUP BY `project`");
			while ($row = mysql_fetch_row($result))
			{
				print "<option value=\"1\">$row[0]</option>\n";
			}
			?>
			</select>
			<input type="checkbox" value="Y" name="fullpath" <?php print $fullpath ? 'checked="checked"' : ''; ?>/> Show full paths?
		</form>
	</div>
</div>
<?php

$sql = "SELECT SQL_CALC_FOUND_ROWS `cvsname`, `revision`, `date`, `author`, `message`, `keyword_subs`, `bugid`, `branch`$ec FROM `cvsfiles` NATURAL JOIN `commits` NATURAL LEFT JOIN `bugs` $where GROUP BY `fid`, `revision`, `bugid` $having $order LIMIT $offset, $pagesize";
$result = wmysql_query($sql);

$count = wmysql_query("SELECT FOUND_ROWS()"); //mysql_num_rows() doesn't do what we want here
$rows = 0;
if ($count)
{
	$row = mysql_fetch_row($count);
	$rows = $row[0];
}

$title = "<span>$rows results total</span>Showing results " . ($offset + 1) . "-" . ($offset + $pagesize > $rows ? $rows : $offset + $pagesize) . " for " . ($_GET["q"] == "" ? "last $days days of commits" : "$et" . sanitize($_GET["q"], "text"));
$title = ($rows == 0 ? "No results found for " . sanitize($_GET["q"], "text") . "" : $title);

print "<div class=\"homeitem3col\">\n";
print "<h3>$title</h3>\n";

dopager($rows, $page, $pagesize);

print "<ul>\n";

$bugs = array();
if ($result)
{
	while ($row = mysql_fetch_assoc($result))
	{
		$cvsroot = preg_replace("#^/cvsroot/([^\/]+)/.+#", "$1", $row["cvsname"]);
		$file = basename($row["cvsname"], ",v");
		$row["cvsname"] = preg_replace("#^/cvsroot/[^\/]+/(.+),v$#", "$1", $row["cvsname"]);
		print "<li>\n";
		print "<div>{$row['date']}</div>";
		if ($row["bugid"] && !in_array($row["bugid"], $bugs))
		{
			$bugs[] = $row["bugid"];
		}
		print ($row["bugid"] ? "[<a href=\"https://bugs.eclipse.org/bugs/show_bug.cgi?id={$row['bugid']}\">{$row['bugid']}</a>] " : "");
		print "<a href=\"" . cvsfile($cvsroot, $row["cvsname"]) . "\"><abbr title=\"{$row['cvsname']}\">" . ($fullpath ? $row['cvsname'] : $file) . "</abbr></a> ({$row['branch']} " . showrev($cvsroot, $row["cvsname"], $row['revision']) . ")";
		print "<ul>\n";
		print "<li><div>{$row['author']}</div>" . pretty_comment($row["message"], $q) . "</li>";
		print "</ul>\n";
		print "</li>\n";
	}
}
print "</ul>\n";

dopager($rows, $page, $pagesize);

print "</div>\n";
print "</div>\n";
if ($connect)
{
	mysql_close($connect);
}
?>
<div id="rightcolumn">
	<div class="sideitem">
		<h6>Help</h6>
		<p><a href="http://wiki.eclipse.org/index.php/Search_CVS">Consult the wiki</a>, or try these examples:</p>
		<ul>
			<li><a href="?q=%5B155286%5D<?php print $fullpath ? '&amp;fullpath' : ''; ?>">[155286]</a></li>
			<li><a href="?q=98877+file%3A+ChangeAdapter<?php print $fullpath ? '&amp;fullpath' : ''; ?>">98877 file: ChangeAdapter</a></li>
			<li><a href="?q=file%3A+org.eclipse.emf%2F+days%3A+7<?php print $fullpath ? '&amp;fullpath' : ''; ?>">file: org.eclipse.emf/ days: 7</a></li>
			<li><a href="?q=days%3A200+author%3Amerks<?php print $fullpath ? '&amp;fullpath' : ''; ?>">days:200 author:merks</a></li>
			<li><a href="?q=branch%3A+R2_1_+file%3A+.xml<?php print $fullpath ? '&amp;fullpath' : ''; ?>">branch: R2_1_ file: .xml</a></li>
			<li><a href="?q=static+dynamic+project%3A+org.eclipse.emf<?php print $fullpath ? '&amp;fullpath' : ''; ?>">static dynamic project: org.eclipse.emf</a></li>
			<li><a href="?q=%22package+protected%22<?php print $fullpath ? '&amp;fullpath' : ''; ?>">"package protected"</a></li>
			<li><a href="?q=Neil+Skrypuch<?php print $fullpath ? '&amp;fullpath' : ''; ?>">Neil Skrypuch</a></li>
		</ul>
		<p>See also the complete <a href="http://wiki.eclipse.org/index.php/Search_CVS#Parameter_List">Parameter List</a> or the <a href="http://build.eclipse.org/modeling/build/schema.php">Database Schema</a>.</p>
	</div>
	<div class="sideitem">
		<h6>Generate Changeset</h6>
		<?php changesetForm($bugid); ?>
	</div>
</div>
<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - Search CVS";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/searchcvs.css"/>' . "\n");
$App->AddExtraHtmlHeader('<script type="text/javascript" src="/modeling/includes/searchcvs.js"></script>' . "\n"); //hack for ie which doesn't understand self closing script tags
if (isset($_GET["totalonly"]))
{
	header("Content-Type: text/plain");
	print $rows . "\n";
}
else if (isset($_GET["showbuglist"]))
{
	header("Content-Type: text/csv");
	print join(",", $bugs) . "\n";
}
else
{
	ob_start();
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
	$html = ob_get_contents();
	ob_end_clean();
	print preg_replace("/<body>/", "<body onload=\"document.getElementById('qb').focus()\">", $html);
}

function pretty_comment($str, $hl)
{
	$str = htmlspecialchars($str);
	$str = preg_replace("/\n/", "<br/>", $str);
	$hl = words($hl);

	for ($i = 0; $i < sizeof($hl); $i++)
	{
		$str = preg_replace("/\b(\Q$hl[$i]\E)\b([^=]|\Z)/i", "<span class=\"hl$i\">$1</span>$2", $str);
	}

	$str = preg_replace("/^(\Q*** empty log message ***\E)$/", "<span class=\"empty\">$1</span>", $str);

	return $str;
}

function showrev($cvsroot, $file, $rev)
{
	$link = "<a href=\"" . cvsfile($cvsroot, $file) . "\">$rev</a>";
	if (!preg_match("/^1\.1$/", $rev)) // "1.10" == "1.1" returns true, curiously enough
	{
		$oldrev = cvsminus($rev);
		$link = "<a href=\"" . cvsfile($cvsroot, $file, $rev, $oldrev) . "\">$rev &gt; $oldrev</a>";
	}

	return $link;
}

function cvsfile($cvsroot, $file, $rev = "", $oldrev = "")
{
	global $cvsroots;

	$ext = "";
	$params = "";
	if ($rev && $oldrev)
	{
		$ext = ".diff";
		$params = "r1=$oldrev&amp;r2=$rev&amp;";
	}
	$params .= (preg_match("/\.php$/", $file) && $ext != ".diff" ? "content-type=text/plain&amp;" : "");
	return "http://dev.eclipse.org/viewcvs/index.cgi/~checkout~/$file$ext?${params}cvsroot=" . $cvsroots[$cvsroot];
}

function sanitize($str, $type = "url")
{
	$tmp = urlencode(urldecode((get_magic_quotes_gpc() ? stripslashes($str) : $str)));
	return ($type == "url" ? $tmp : htmlspecialchars(urldecode($tmp)));
}

function pagelink($page, $selected, $linktext = "")
{
	global $fullpath;
	$innertext = ($linktext ? $linktext : $page);
	$text = (!$selected ? "<a href=\"?q=" . sanitize($_GET["q"]) . "&amp;p=$page" . ($fullpath ? '&amp;fullpath' : '') . "\">$innertext</a>" : $innertext);
	return "<span" . ($selected ? " class=\"selected\"" : "") . ">$text</span>";
}

function dopager($rows, $page, $pagesize)
{
	$startpage = ($page - 5 < 1 ? 1 : $page - 5);
	$endpage = ($page + 5 > $rows/$pagesize ? ceil($rows/$pagesize) : $page + 5);

	if ($rows > 0)
	{
		print "<div class=\"pager\">\n";
		print ($page > 1 ? pagelink($page - 1, false, "Previous") : "");
		for ($i = $startpage; $i <= $endpage; $i++)
		{
			print pagelink($i, $i == $page);
		}
		print ($page < ceil($rows/$pagesize) ? pagelink($page + 1, false, "Next") : "");
		print "</div>\n";
	}
}

function words($str)
{
	$str = stripslashes($str);
	$list = array();

	preg_match_all("/\"([^\"]+)\"/", $str, $regs);
	foreach ($regs[1] as $word)
	{
		$word = addslashes($word);
		$list[] = $word;
		$str = preg_replace("/\Q$word\E/", "", $str);
	}

	$regs = null;
	preg_match_all("/(\w+)/", $str, $regs);
	foreach ($regs[1] as $word)
	{
		$list[] = addslashes($word);
	}

	return $list;
}
?>
