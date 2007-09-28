<?php
/* REMINDER: 
   When adding new projects to the database, you must insert a 0.0.0 release as a basis from which 
   to compare, or you won't get anything returned from your query.

  	INSERT INTO `releases` SET `project` = 'org.eclipse.mdt', `component` = 'org.eclipse.uml2tools', `vanityname` = '0.0.0', `buildtime` = DATE_SUB(NOW(), INTERVAL 1 YEAR), `branch` = 'HEAD', `type` = 'R';
  	
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

if (isset($proj) && isset($hasmoved) && is_array($hasmoved) && array_key_exists($proj,$hasmoved))
{
	header("Location: http://www.eclipse.org/modeling/" . $hasmoved[$proj] . "/news/relnotes.php?project=" . $proj . "&version=HEAD");
	exit;
}

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

if (!isset($cvsprojs) || !is_array($cvsprojs))
{
	$cvsprojs = array();
}

$projectsf = array_flip(array_diff($projects, $extraprojects, $nodownloads)); // suppress entries if no downloads or extra project (like qtv-all-in-one)
$components = components($cvscoms);

/* set defaults */
$cvscom = "";
$tmp = array_keys($cvsprojs);
if (sizeof($tmp) > 0)
{
	$proj = $tmp[0];
	$cvsproj = $cvsprojs[$tmp[0]];
}
else
{
	$tmp = array_keys($cvscoms);
	$tmp2 = array_keys($cvscoms[$tmp[0]]);
	$proj = $tmp2[0];
	$cvsproj = $tmp[0];
	$cvscom = $cvscoms[$tmp[0]][$tmp2[0]];
}

pick_project($proj, $cvsproj, $cvsprojs, $cvscom, $cvscoms, $components);

ob_start();

$header = "";
$header .= "<div id=\"midcolumn\">\n";
$header .= "<h1>Release Notes</h1>\n";

$vpicker = array();
$result = wmysql_query("SELECT CONCAT(LEFT(`vanityname`, 4), 'x') AS `tmp` FROM `releases` WHERE `type` = 'R' AND `project` = '$cvsproj' AND (`component` LIKE '$cvscom') AND `vanityname` LIKE '_._._' AND `vanityname` != '0.0.0' GROUP BY `tmp` DESC");
if ($result)
{
	$c = 0;
	while ($row = mysql_fetch_row($result))
	{
		$vpicker[] = $row[0];
	}
}

/* figuring out what branch goes with what z.y.x stream is tricky, we guess based on a few assumptions:
 * - all streams have a maintenance branch
 * - HEAD always cooresponds to the newest stream
 * - a descending sort of the z.y.x stream names lines up with a descending sort of the branch names (less HEAD, which is always on top)
 *
 * if that doesn't work out, guessing can be removed by defining $streams in each placeholder file (as necessary), like so:
$streams = array(
	"transaction" => array(
		"1.2.x" => "HEAD",
		"1.1.x" => "R1_1_maintenance",
		"1.0.x" => "R1_0_maintenance"
	)
);
 * streams that are dead (that is, they're not HEAD and they were never branched) can be specified with a value of ""
 */
$latest = array("HEAD");
$result = wmysql_query("SELECT `branch` FROM `releases` WHERE `project` = '$cvsproj' AND (`component` LIKE '$cvscom') AND `branch` != 'HEAD' GROUP BY `branch` DESC");
if ($result)
{
	while ($row = mysql_fetch_row($result))
	{
		$latest[] = $row[0];
	}
}

if (isset($streams) && is_array($streams) && isset($streams[$proj]))
{
	$streams = $streams[$proj];
}
else
{
	if (sizeof($vpicker) == sizeof($latest))
	{
		$streams = array_combine($vpicker, $latest);
	}
	else
	{
		$streams = array();
		debug("oops, " . sizeof($vpicker) . " != " . sizeof($latest) . ", you should define \$streams[\"$proj\"] in {$_SERVER["PHP_SELF"]}");
	}
}

$vpicker_all = $vpicker;
$version_requested = $_GET["version"];
if (!isset($_GET["version"]) || (preg_match("/^\d\.\d\.x$/", $_GET["version"]) && !isset($streams[$_GET["version"]])))
{
	if (sizeof($vpicker) > 0)
	{
		$_GET["version"] = $vpicker[0];
	}
	else
	{
		$_GET["version"] = "HEAD";
	}
}

$sql = "SELECT `vanityname`, `branch` FROM `releases` WHERE `type` = 'R' AND `project` = '$cvsproj' AND (`component` LIKE '$cvscom') ORDER BY `vanityname` DESC";
$result = wmysql_query($sql);
if ($result)
{
	while ($row = mysql_fetch_row($result))
	{
		$vpicker[] = $row[0];
	}
	if (sizeof($vpicker) > 0)
	{
		unset($vpicker[sizeof($vpicker) - 1]);
	}
}

$bugs = array();
$tnum_overall = 0;
if (preg_match("/^\d\.\d\.x$/", $_GET["version"]))
{
	$selected = $_GET["version"];
	$v = preg_replace("/x$/", "_", $_GET["version"]);
	$result = wmysql_query("SELECT `vanityname` FROM `releases` WHERE `type` = 'R' AND `project` = '$cvsproj' AND (`component` LIKE '$cvscom') AND `vanityname` LIKE '$v' ORDER BY `buildtime` DESC");
	if ($streams[$_GET["version"]] !== "")
	{
		$versions = array($streams[$_GET["version"]]);
	}
	else //a dead stream (not HEAD, and no associated branch)
	{
		$versions = array();
	}

	$tmp = array_flip($vpicker);
	while ($row = mysql_fetch_row($result))
	{
    	if (isset($tmp[$row[0]]))
		{
			$versions[] = $row[0];
		}
	}

	$c = 0;
	foreach ($versions as $z)
	{
		$_GET["version"] = $z;
		$header = ($c == 0 ? $header : "");
		release_notes($vpicker, $cvsproj, $cvscom, $cvsprojs, $components, $projectsf, $proj, $header, $c == 0, $selected);
		$c++;
	}
}
else
{
	release_notes($vpicker, $cvsproj, $cvscom, $cvsprojs, $components, $projectsf, $proj, $header);
}

if (isset($_GET["bugzonly"]))
{
	ob_end_clean();
	print sizeof($bugs) . ";" . join(",", $bugs) . "\n";
	exit;
}

print "</div>\n";

/*** side items ***/
print "<div id=\"rightcolumn\">\n";

$extras = (isset($extras) && is_array($extras) ? $extras : array());

foreach ($extras as $z)
{
	if (function_exists($z))
	{
		call_user_func($z);
	}
}

print <<<XML
	<div class="sideitem">
	<h6>Search CVS</h6>
XML;
print '	<form action="http://www.eclipse.org/' . (isset($PR) ? $PR : "modeling") . '/searchcvs.php" method="get" name="bugform" target="_blank">' . "\n";
print <<<XML
	<p>
		<label for="bug">Bug ID: </label><input size="7" type="text" name="q" id="q"/>
		<input type="submit" value="Go!"/>
	</p>
	</form>
	</div>
XML;

print "<div class=\"sideitem\">\n";
print "<h6>Generate Changeset</h6>\n";
changesetForm();
print "</div>\n";

require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-sideitems.php");
print sideItemReleases($version_requested, $tnum_overall);
print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = (isset($pageTitle) ? $pageTitle : "Eclipse Modeling - Release Notes");
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/relnotes.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

function release_notes($vpicker, $cvsproj, $cvscom, $cvsprojs, $components, $projectsf, $proj, &$header, $initial = true, $selected = null)
{
	global $connect, $PR, $bugs, $tnum_overall;

	$rbuild = true;
	$extra_build = false;
	$version = pick_version($vpicker, $rbuild, $cvsproj, $cvscom, $connect, $extra_build); # R2_0_maintenance, 2.0.5, ...
	$preversion = relminus($version, $cvsproj, $cvscom, $rbuild); # 2.0.5, 2.0.4, ...
	$outerversion = version_picker($vpicker, $rbuild, $version, $preversion, $cvsproj, $cvsprojs, $cvscom, $components, $projectsf, $proj, $initial, $selected);
	$header .= $outerversion[0];
	$outerversion = $outerversion[1];

	$canConvertTZ = checkIfCanConvertTZ();

	if ($extra_build)
	{
		$branch = "'$version'";
		$sql = "SELECT " . ($canConvertTZ ? "CONVERT_TZ(`buildtime`, 'EST', 'GMT')" : "`buildtime`") . ", `vanityname`, `type` FROM `releases` WHERE `project` = '$cvsproj' AND (`component` LIKE '$cvscom') AND ((`buildtime` > (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$preversion' AND `project` = '$cvsproj' AND (`component` LIKE '$cvscom')) AND `branch` = $branch) OR `vanityname` = '$preversion') ORDER BY `buildtime` DESC, FIELD(`type`, 'R', 'S', 'M', 'I', 'N')";
	}
	else
	{
		$branch = "(SELECT `branch` FROM `releases` WHERE `vanityname` = '$version' AND `project` = '$cvsproj' AND (`component` LIKE '$cvscom'))";
		$sql = "SELECT " . ($canConvertTZ ? "CONVERT_TZ(`buildtime`, 'EST', 'GMT')" : "`buildtime`") . ", `vanityname`, `type` FROM `releases` WHERE `project` = '$cvsproj' AND (`component` LIKE '$cvscom') AND ((`buildtime` <= (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$version' AND `project` = '$cvsproj' AND (`component` LIKE '$cvscom')) AND `buildtime` > (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$preversion' AND `project` = '$cvsproj' AND (`component` LIKE '$cvscom')) AND `branch` = $branch) OR `vanityname` = '$preversion') ORDER BY `buildtime` DESC, FIELD(`type`, 'R', 'S', 'M', 'I', 'N')";
	}
	$result = wmysql_query($sql);
	$rels = array();
	if ($result)
	{
		while ($row = mysql_fetch_row($result))
		{
			$rels[] = $row;
		}
	}
	if (!$rbuild && isset($rels[0]) && isset($rels[0][2]) && $rels[0][2] == "R")
	{
		array_shift($rels);
	}

	if (sizeof($rels))
	{
		$tnum = 0;
		$header2 = "";
		for ($i = 0; $i < (sizeof($rels) - 1); $i++)
		{
			$sql = "SELECT `bugid`, `title` FROM `cvsfiles` FORCE INDEX (PRIMARY) NATURAL JOIN `commits` NATURAL JOIN `bugs` NATURAL JOIN `bugdescs` WHERE `date` <= '" . $rels[$i][0] . "' AND `date` >= '" . $rels[$i+1][0] . "' AND `project` = '$cvsproj' AND (`component` LIKE '$cvscom') AND `branch` = $branch GROUP BY `bugid` DESC";
			$result = wmysql_query($sql);
			$num = mysql_num_rows($result);
			$tnum += $num;

			$header2 .= "<ul>\n";
			$header2 .= "<li class=\"outerli\"><a href=\"?project=$proj&amp;version=" . $rels[$i][1] . "\"><acronym title=\"" . str_replace(" ", "&#160;", $rels[$i][0]) . "&#160;GMT\">" . $rels[$i][1] . "</acronym></a>" . ($num > 1 ? " ($num bugs fixed) <a href=\"?project=$proj&amp;version=" . $rels[$i][1] . "&amp;bugzonly\"><img src=\"/modeling/images/checklist.gif\"/></a>" : "") . "\n";
			$header2 .= "<ul>\n";
			while ($row = mysql_fetch_row($result))
			{
				$header2 .= "<li><a href=\"/$PR/searchcvs.php?q=$row[0]\"><img src=\"/modeling/images/delta.gif\"/></a> <a href=\"https://bugs.eclipse.org/bugs/show_bug.cgi?id=$row[0]\">$row[0]</a> $row[1]</li>\n";
				$bugs[] = $row[0];
			}
			if ($num == 0)
			{
				$header2 .= "<li>No bugs fixed for this release.</li>";
			}
			$header2 .= "</ul>\n";
			$header2 .= "</li>\n";
			$header2 .= "</ul>\n";
		}

		if (isset($_GET["bugzonly"]))
		{
			return;
		}
		$header .= "<div class=\"homeitem3col\">\n" . "<h3>$projectsf[$proj] " . (preg_match("/\Q$outerversion\E/", $version) ? "" : "$outerversion ") . "$version" . ($rbuild ? " release" : "") . " ($tnum bugs fixed) <a href=\"?project=$proj&amp;version=$version&amp;bugzonly\"><img src=\"/modeling/images/checklist.gif\"/></a></h3>\n" . $header2;
		$tnum_overall += $tnum;
	}
	else
	{
		//TODO: don't say 'nothing found' if $tnum_overall > 0
		$header .= "<div class=\"homeitem3col\">\n<h3>No builds found for $projectsf[$proj] $version</h3><p>" . ($connect ? "No builds found for $projectsf[$proj] $version. Try <a href=\"http://www.eclipse.org/modeling/mdt/searchcvs.php?q=file%3A$proj+days%3A7\">Search CVS</a> instead or choose another branch/version." : "Error: could not connect to database!") . "</p>\n";
	}
	print $header;
	print "</div>\n";
}

/* find the previous release in the correct branch */
function relminus($version, $cvsproj, $cvscom, $rbuild = true)
{
	$whr = "`project` = '$cvsproj' AND (`component` LIKE '$cvscom')";
	if ($rbuild) //$rbuild implies !$extra_build
	{
		$tries = array(
			"SELECT `vanityname` FROM `releases` WHERE `branch` = (SELECT `branch` FROM `releases` WHERE `vanityname` = '$version' AND $whr) AND `buildtime` < (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$version' AND $whr) AND `type` = 'R' AND $whr ORDER BY `buildtime` DESC LIMIT 1",
			"SELECT `vanityname` FROM `releases` WHERE `branch` = 'HEAD' AND `buildtime` < (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$version' AND $whr) AND `type` = 'R' AND $whr ORDER BY `buildtime` DESC LIMIT 1"
		);

		return try_queries($tries);
	}
	else
	{
		$tries = array(
			"SELECT `vanityname` FROM `releases` WHERE `buildtime` < (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$version' AND $whr) AND `branch` = (SELECT `branch` FROM `releases` WHERE `vanityname` = '$version' AND $whr) AND $whr ORDER BY `buildtime` DESC, FIELD(`type`, 'R', 'S', 'M', 'I', 'N') LIMIT 1",
			"SELECT `vanityname` FROM `releases` WHERE `buildtime` < (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$version' AND $whr) AND $whr ORDER BY `buildtime` DESC, FIELD(`type`, 'R', 'S', 'M', 'I', 'N') LIMIT 1",
			"SELECT `vanityname` FROM `releases` WHERE `branch` = '$version' AND `type` = 'R' AND $whr ORDER BY `buildtime` DESC LIMIT 1",
			"SELECT `vanityname` FROM `releases` WHERE `branch` = 'HEAD' AND `type` = 'R' AND $whr ORDER BY `buildtime` DESC LIMIT 1"
		);

		return try_queries($tries);
	}
}

function builds($version, $preversion, $cvsproj, $cvscom)
{
	$builds = array();
	$result = wmysql_query("SELECT `vanityname` FROM `releases` WHERE `project` = '$cvsproj' AND (`component` LIKE '$cvscom') AND `buildtime` > (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$preversion' AND `project` = '$cvsproj' AND (`component` LIKE '$cvscom')) AND `buildtime` <= (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$version' AND `project` = '$cvsproj' AND (`component` LIKE '$cvscom')) AND `branch` = (SELECT `branch` FROM `releases` WHERE `vanityname` = '$version' AND `project` = '$cvsproj' AND (`component` LIKE '$cvscom')) ORDER BY `buildtime` DESC, FIELD(`type`, 'R', 'S', 'M', 'I', 'N')");
	while ($row = mysql_fetch_row($result))
	{
		$builds[] = "<option value=\"$row[0]\">&nbsp;&nbsp;&nbsp;$row[0]</option>\n";
	}
	unset($builds[0]); //the release build

	return $builds;
}

function pick_version($vpicker, &$rbuild, $cvsproj, $cvscom, $connect, &$extra_build)
{
	$strict = isset($_GET["strict"]);

	if (!$connect)
	{
		return "HEAD";
	}
	if (isset($_GET["version"]))
	{
		if (preg_match("/^(?:" . join("|", $vpicker) . ")$/", $_GET["version"]))
		{
			$version = $_GET["version"];
		}
		else
		{
			$tmp = mysql_real_escape_string($_GET["version"], $connect);
			$result = wmysql_query("SELECT COUNT(*) FROM `releases` WHERE `vanityname` = '$tmp' AND `project` = '$cvsproj' AND (`component` LIKE '$cvscom') AND `type` != 'R'");
			$row = mysql_fetch_row($result);
			if ($row[0] > 0 || $strict)
			{
				$version = $tmp;
				$rbuild = false;
			}
		}

		if (!isset($version))
		{
			$result = wmysql_query("SELECT `branch` FROM `releases` WHERE `project` = '$cvsproj' AND (`component` LIKE '$cvscom') GROUP BY `branch`");
			$branches = array();
			while ($row = mysql_fetch_row($result))
			{
				$branches[] = $row[0];
			}

			if (preg_match("/^(?:" . (join("|", $branches) . ")$/"), $_GET["version"]))
			{
				$version = $_GET["version"];
				$rbuild = false;
				$extra_build = true;
			}
			else if (sizeof($vpicker) > 0)
			{
				foreach ($vpicker as $z)
				{
					if (!preg_match("/x$/", $z))
					{
						$version = $z;
						break;
					}
				}
			}
			else
			{
				$version = "HEAD";
				$rbuild = false;
				$extra_build = true;
			}
		}
	}
	else if (isset($vpicker[0]))
	{
		$version = $vpicker[0];
	}
	else
	{
		$version = "HEAD";
		$rbuild = false;
		$extra_build = true;
	}

	return $version;
}

function version_picker($vpicker, $rbuild, $version, $preversion, $cvsproj, $cvsprojs, $cvscom, $components, $projectsf, $proj, $dohtml = true, $selected = null)
{
	global $nomenclature;

	$selected = ($selected == null ? $version : $selected);

	$out = "";
	$out .= "<div class=\"homeitem3col\">\n";
	$out .= "<h3>Filters</h3>\n";
	$out .= "<form id=\"vpicker\" action=\"relnotes.php\" method=\"get\">\n";

	$out .= "<p>\n";
	$out .= "<label for=\"project\">$nomenclature: </label>\n";
	$out .= "<select name=\"project\" id=\"project\" onchange=\"javascript:document.getElementById('vpicker').submit()\">\n";
	foreach (array_keys(array_merge($cvsprojs, $components)) as $z)
	{
		if (array_key_exists($z,$projectsf))
		{
			$tmp[$z] = $projectsf[$z];
		}
	}

	/* fix the order */
	foreach (array_keys($projectsf) as $z)
	{
		if (isset ($tmp[$z]))
		{
			$tmp2[] = "<option value=\"$z\">$tmp[$z]</option>\n";
		}
	}
	$tmp2 = preg_replace("/( value=\"$proj\")/", "$1 selected=\"selected\"", $tmp2);
	$out .= join("", $tmp2);
	$out .= "</select>\n";
	$out .= "</p>\n";

	$out .= "<p>\n";
	$out .= "<label for=\"version\">Version: </label>\n";
	$out .= "<select name=\"version\" id=\"version\" onchange=\"javascript:document.getElementById('vpicker').submit()\">\n";
	$vpicker = preg_replace("/^(.+)$/", "<option value=\"$1\">$1</option>\n", $vpicker);
	if ($rbuild)
	{
		$builds = array();
		if ($version == $selected)
		{
			$builds = builds($version, $preversion, $cvsproj, $cvscom);
		}
		$out .= extra_builds($version, $cvsproj, $cvscom, false);
		$out .= join("", preg_replace("/(value=\"$selected\")>(.+<\/option>)/", "$1 selected=\"selected\">$2" . join("", $builds), $vpicker));
		$outerversion = "";
	}
	else
	{
		$result = wmysql_query("SELECT `vanityname` FROM `releases` WHERE `project` = '$cvsproj' AND (`component` LIKE '$cvscom') AND `type` = 'R' AND `buildtime` >= (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$version' AND `project` = '$cvsproj' AND (`component` LIKE '$cvscom')) ORDER BY `buildtime` LIMIT 1");
		$row = mysql_fetch_row($result);
		$outerversion = $row[0];
		if ($outerversion)
		{
			$builds = builds($outerversion, relminus($row[0], $cvsproj, $cvscom), $cvsproj, $cvscom);
			$builds = preg_replace("/(value=\"$selected\")/", "$1 selected=\"selected\"", $builds);
			$out .= extra_builds($version, $cvsproj, $cvscom, false);
			$out .= join("", preg_replace("/(value=\"$row[0]\">.+<\/option>)/", "$1" . join("", $builds), $vpicker));
		}
		else //we're looking at builds with no R build above them
		{
			$out .= extra_builds($version, $cvsproj, $cvscom, $selected == $version);
			$out .= join("", preg_replace("/(value=\"$selected\")>(.+<\/option>)/", "$1 selected=\"selected\">$2", $vpicker));
		}
	}
	$out .= "</select>\n";
	$out .= "</p>\n";

	$out .= "<p>\n";
	$out .= "<input type=\"submit\" value=\"Go!\"/>\n";
	$out .= "</p>\n";

	$out .= "</form>\n";
	$out .= "</div>\n";

	if ($dohtml)
	{
		return array($out, $outerversion);
	}
	else
	{
		return array("", $outerversion);
	}
}

/* HEAD and Rx_y_maintenance builds that don't have an R build yet */
function extra_builds($version, $cvsproj, $cvscom, $showinner = true)
{
	$extra = array();
	$items = array();
	$branches = array("HEAD");

	$result = wmysql_query("SELECT `branch` FROM `releases` WHERE `project` = '$cvsproj' AND (`component` LIKE '$cvscom') AND `branch` != 'HEAD' GROUP BY `branch` DESC");
	while ($row = mysql_fetch_row($result))
	{
		$branches[] = $row[0];
	}

	foreach ($branches as $z)
	{
		$result = wmysql_query("SELECT `branch`, `vanityname`, (SELECT MAX(`buildtime`) FROM `releases` WHERE `type` = 'R' AND `project` = '$cvsproj' AND (`component` LIKE '$cvscom') AND `branch` = '$z') AS `tmp`, `buildtime` FROM `releases` WHERE `project` = '$cvsproj' AND (`component` LIKE '$cvscom') AND `branch` = '$z' HAVING `buildtime` > IF(`tmp` IS NOT NULL, `tmp`, '1000-01-01 00:00:00') ORDER BY `buildtime` DESC");
		while ($row = mysql_fetch_row($result))
		{
			$extra[$row[0]][] = $row[1];
		}
	}

	foreach (array_keys($extra) as $z)
	{
		$items[] = "<option value=\"$z\">$z</option>\n";
		if ($showinner)
		{
			foreach ($extra[$z] as $y)
			{
				$items[] = "<option value=\"$y\">&nbsp;&nbsp;&nbsp;$y</option>\n";
			}
		}
	}
	$items = preg_replace("/(value=\"$version\")/", "$1 selected=\"selected\"", $items);
	return join("", $items);
}

function try_queries($tries)
{
	foreach ($tries as $z)
	{
		$result = wmysql_query($z);
		if ($result && ($row = mysql_fetch_row($result)))
		{
			return $row[0];
		}
	}
}

function checkIfCanConvertTZ()
{
	$sql = "SELECT CONVERT_TZ(`buildtime`, 'EST', 'GMT') FROM `releases` LIMIT 1";
	$result = wmysql_query($sql);
	if ($result)
	{
		while ($row = mysql_fetch_row($result))
		{
			if (!$row[0] || $row[0] == "NULL")
			{
				return false;
			}
		}
		return true;
	}
	else
	{
		return false;
	}
}

?>
