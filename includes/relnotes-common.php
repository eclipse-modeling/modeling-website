<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
$App = new App();
$Nav = new Nav();
$Menu = new Menu();
include ($App->getProjectCommon());

require ($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

if (!isset ($cvsprojs) || !is_array($cvsprojs))
{
	$cvsprojs = array ();
}

$projectsf = array_flip($projects);
$components = array ();

if (isset ($cvscoms) && is_array($cvscoms))
{
	foreach (array_keys($cvscoms) as $z)
	{
		foreach (array_keys($cvscoms[$z]) as $y)
		{
			/* $proj = array($cvsproj, $cvscom) */
			$components[$y] = array (
				$z,
				$cvscoms[$z][$y]
			);
		}
	}
}

$cvscom = "%";
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

if (isset ($cvscoms) && is_array($cvscoms) && isset ($cvscoms[$proj]) && is_array($cvscoms[$proj]))
{
	$tmp = array_keys($cvscoms[$proj]);
	$cvscom = $cvscoms[$proj][$tmp[0]];
}

if (isset ($_GET["project"]) && $_GET["project"])
{
	if (preg_match("/^(?:" . join("|", array_keys($cvsprojs)) . ")$/", $_GET["project"]))
	{
		$proj = $_GET["project"];
		$cvsproj = $cvsprojs[$proj];
	}
	else
		if (preg_match("/^(?:" . join("|", array_keys($components)) . ")$/", $_GET["project"]))
		{
			$proj = $_GET["project"];
			$cvsproj = $components[$proj][0];
			$cvscom = $components[$proj][1];
		}
}

ob_start();

/*** side items ***/
print<<<XML
<div id="rightcolumn">

	<div class="sideitem">
	<h6>Search CVS</h6>
XML;
print '	<form action="http://www.eclipse.org/' . (isset ($PR) ? $PR : "modeling") . '/searchcvs.php" method="get" name="bugform" target="_blank">' . "\n";
print<<<XML
	<p>
		<label for="bug">Bug ID: </label><input size="7" type="text" name="q" id="q"/>
		<input type="submit" value="Go!"/>
	</p>
	</form>
	</div>
XML;
if (isset ($extraSideItems) && $extraSideItems)
{
	print $extraSideItems;
}
print<<<XML
</div>
XML;

print "<div id=\"midcolumn\">\n";
print "<h1>Release Notes</h1>\n";

$result = wmysql_query("SELECT `vanityname`, `branch` FROM `releases` WHERE `type` = 'R' AND `project` = '$cvsproj' AND `component` LIKE '$cvscom' ORDER BY `vanityname` DESC");
$vpicker = array ();
if ($result)
{
	while ($row = mysql_fetch_row($result))
	{
		$vpicker[] = $row[0];
	}
	if (sizeof($vpicker) > 0)
	{
		unset ($vpicker[sizeof($vpicker) - 1]);
	}
}
$rbuild = true;
$extra_build = false;
$version = pick_version($vpicker, $rbuild, $cvsproj, $cvscom, $connect, $extra_build);
$preversion = relminus($version, $cvsproj, $cvscom, $rbuild);

$outerversion = version_picker($vpicker, $rbuild, $version, $preversion, $cvsproj, $cvsprojs, $cvscom, $components, $nomenclature, $projectsf, $proj);

if ($extra_build)
{
	$branch = "'$version'";
	$sql = "SELECT CONVERT_TZ(`buildtime`, 'EST', 'GMT'), `vanityname`, `type` FROM `releases` WHERE `project` = '$cvsproj' AND `component` LIKE '$cvscom' AND ((`buildtime` > (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$preversion' AND `project` = '$cvsproj' AND `component` LIKE '$cvscom') AND `branch` = $branch) OR `vanityname` = '$preversion') ORDER BY `buildtime` DESC, FIELD(`type`, 'R', 'S', 'M', 'I', 'N')";
}
else
{
	$branch = "(SELECT `branch` FROM `releases` WHERE `vanityname` = '$version' AND `project` = '$cvsproj' AND `component` LIKE '$cvscom')";
	$sql = "SELECT CONVERT_TZ(`buildtime`, 'EST', 'GMT'), `vanityname`, `type` FROM `releases` WHERE `project` = '$cvsproj' AND `component` LIKE '$cvscom' AND ((`buildtime` <= (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$version' AND `project` = '$cvsproj' AND `component` LIKE '$cvscom') AND `buildtime` > (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$preversion' AND `project` = '$cvsproj' AND `component` LIKE '$cvscom') AND `branch` = $branch) OR `vanityname` = '$preversion') ORDER BY `buildtime` DESC, FIELD(`type`, 'R', 'S', 'M', 'I', 'N')";
}
$result = wmysql_query($sql);
$rels = array ();
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

print "<div class=\"homeitem3col\">\n";
if (sizeof($rels))
{
	print "<h3>$projectsf[$proj] " . (preg_match("/\Q$outerversion\E/", $version) ? "" : "$outerversion ") . "$version" . ($rbuild ? " release" : "") . "</h3>\n";
	for ($i = 0; $i < (sizeof($rels) - 1); $i++)
	{
		$sql = "SELECT `bugid`, `title` FROM `cvsfiles` FORCE INDEX (PRIMARY) NATURAL JOIN `commits` NATURAL JOIN `bugs` NATURAL JOIN `bugdescs` WHERE `date` <= '" . $rels[$i][0] . "' AND `date` >= '" . $rels[$i +1][0] . "' AND `project` = '$cvsproj' AND `component` LIKE '$cvscom' AND `branch` = $branch GROUP BY `bugid` DESC";
		$result = wmysql_query($sql);
		$num = mysql_num_rows($result);

		print "<ul>\n";
		print "<li class=\"outerli\">" . $rels[$i][1] . ($num > 1 ? " ($num bugs fixed)" : "") . "\n";
		print "<ul>\n";
		while ($row = mysql_fetch_row($result))
		{
			print "<li><a href=\"/$PR/searchcvs.php?q=$row[0]\"><img src=\"/modeling/images/delta.gif\"/></a> <a href=\"https://bugs.eclipse.org/bugs/show_bug.cgi?id=$row[0]\">$row[0]</a> $row[1]</li>\n";
		}
		if ($num == 0)
		{
			print "<li>No bugs fixed for this release.</li>\n";
		}
		print "</ul>\n";
		print "</li>\n";
		print "</ul>\n";
	}
}
else
{
	print $connect ? "<h4>There are no builds in $projectsf[$proj] $version yet</h4>\n" : "<h4>Error: could not connect to database!</h4>\n"; 
}
print "</div>\n";

print "</div>\n";
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - MDT - Release Notes";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/relnotes.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

/* find the previous release in the correct branch */
function relminus($version, $cvsproj, $cvscom, $rbuild = true)
{
	$whr = "`project` = '$cvsproj' AND `component` LIKE '$cvscom'";
	if ($rbuild) //$rbuild implies !$extra_build
	{
		$tries = array (
			"SELECT `vanityname` FROM `releases` WHERE `branch` = (SELECT `branch` FROM `releases` WHERE `vanityname` = '$version' AND $whr) AND `buildtime` < (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$version' AND $whr) AND `type` = 'R' AND $whr ORDER BY `buildtime` DESC LIMIT 1",
			"SELECT `vanityname` FROM `releases` WHERE `branch` = 'HEAD' AND `buildtime` < (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$version' AND $whr) AND `type` = 'R' AND $whr ORDER BY `buildtime` DESC LIMIT 1"
		);

		return try_queries($tries);
	}
	else
	{
		$tries = array (
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
	$builds = array ();
	$result = wmysql_query("SELECT `vanityname` FROM `releases` WHERE `project` = '$cvsproj' AND `component` LIKE '$cvscom' AND `buildtime` > (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$preversion' AND `project` = '$cvsproj' AND `component` LIKE '$cvscom') AND `buildtime` <= (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$version' AND `project` = '$cvsproj' AND `component` LIKE '$cvscom') AND `branch` = (SELECT `branch` FROM `releases` WHERE `vanityname` = '$version' AND `project` = '$cvsproj' AND `component` LIKE '$cvscom') ORDER BY `buildtime` DESC, FIELD(`type`, 'R', 'S', 'M', 'I', 'N')");
	while ($row = mysql_fetch_row($result))
	{
		$builds[] = "<option value=\"$row[0]\">&nbsp;&nbsp;&nbsp;$row[0]</option>\n";
	}
	unset ($builds[0]); //the release build

	return $builds;
}

function pick_version($vpicker, & $rbuild, $cvsproj, $cvscom, $connect, & $extra_build)
{
	if (!$connect)
	{
		return "HEAD";
	}
	if (isset ($_GET["version"]))
	{
		if (preg_match("/^(?:" . join("|", $vpicker) . ")$/", $_GET["version"]))
		{
			$version = $_GET["version"];
		}
		else
		{
			$tmp = mysql_real_escape_string($_GET["version"], $connect);
			$result = wmysql_query("SELECT COUNT(*) FROM `releases` WHERE `vanityname` = '$tmp' AND `project` = '$cvsproj' AND `component` LIKE '$cvscom' AND `type` != 'R'");
			$row = mysql_fetch_row($result);
			if ($row[0] > 0)
			{
				$version = $tmp;
				$rbuild = false;
			}
		}

		if (!isset ($version))
		{
			$result = wmysql_query("SELECT `branch` FROM `releases` WHERE `project` = '$cvsproj' AND `component` LIKE '$cvscom' GROUP BY `branch`");
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

function version_picker($vpicker, $rbuild, $version, $preversion, $cvsproj, $cvsprojs, $cvscom, $components, $nomenclature, $projectsf, $proj)
{
	print "<div class=\"homeitem3col\">\n";
	print "<h3>Filters</h3>\n";
	print "<form id=\"vpicker\" action=\"relnotes.php\" method=\"get\">\n";

	print "<p>\n";
	print "<label for=\"project\">$nomenclature: </label>\n";
	print "<select name=\"project\" id=\"project\" onchange=\"javascript:document.getElementById('vpicker').submit()\">\n";
	foreach (array_keys(array_merge($cvsprojs, $components)) as $z)
	{
		$tmp[$z] = $projectsf[$z];
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
	print join("", $tmp2);
	print "</select>\n";
	print "</p>\n";

	print "<p>\n";
	print "<label for=\"version\">Version: </label>\n";
	print "<select name=\"version\" id=\"version\" onchange=\"javascript:document.getElementById('vpicker').submit()\">\n";
	$vpicker = preg_replace("/^(.+)$/", "<option value=\"$1\">$1</option>\n", $vpicker);
	if ($rbuild)
	{
		$builds = builds($version, $preversion, $cvsproj, $cvscom);
		print extra_builds($version, $cvsproj, $cvscom, false);
		print join("", preg_replace("/(value=\"$version\")>(.+<\/option>)/", "$1 selected=\"selected\">$2" . join("", $builds), $vpicker));
		$outerversion = "";
	}
	else
	{
		$result = wmysql_query("SELECT `vanityname` FROM `releases` WHERE `project` = '$cvsproj' AND `component` LIKE '$cvscom' AND `type` = 'R' AND `buildtime` >= (SELECT `buildtime` FROM `releases` WHERE `vanityname` = '$version' AND `project` = '$cvsproj' AND `component` LIKE '$cvscom') ORDER BY `buildtime` LIMIT 1");
		$row = mysql_fetch_row($result);
		$outerversion = $row[0];
		if ($outerversion)
		{
			$builds = builds($outerversion, relminus($row[0], $cvsproj, $cvscom), $cvsproj, $cvscom);
			$builds = preg_replace("/(value=\"$version\")/", "$1 selected=\"selected\"", $builds);
			print extra_builds($version, $cvsproj, $cvscom, false);
			print join("", preg_replace("/(value=\"$row[0]\">.+<\/option>)/", "$1" . join("", $builds), $vpicker));
		}
		else //we're looking at builds with no R build above them
			{
			print extra_builds($version, $cvsproj, $cvscom);
			print join("", $vpicker);
		}
	}
	print "</select>\n";
	print "</p>\n";

	print "<p>\n";
	print "<input type=\"submit\" value=\"Go!\"/>\n";
	print "</p>\n";

	print "</form>\n";
	print "</div>\n";

	return $outerversion;
}

/* HEAD and Rx_y_maintenance builds that don't have an R build yet */
function extra_builds($version, $cvsproj, $cvscom, $showinner = true)
{
	$extra = array ();
	$items = array ();
	$branches = array("HEAD");

	$result = wmysql_query("SELECT `branch` FROM `releases` WHERE `project` = '$cvsproj' AND `component` LIKE '$cvscom' AND `branch` != 'HEAD' GROUP BY `branch` DESC");
	while ($row = mysql_fetch_row($result))
	{
		$branches[] = $row[0];
	}

	foreach ($branches as $z)
	{
		$result = wmysql_query("SELECT `branch`, `vanityname`, (SELECT MAX(`buildtime`) FROM `releases` WHERE `type` = 'R' AND `project` = '$cvsproj' AND `component` LIKE '$cvscom' AND `branch` = '$z') AS `tmp`, `buildtime` FROM `releases` WHERE `project` = '$cvsproj' AND `component` LIKE '$cvscom' AND `branch` = '$z' HAVING `buildtime` > IF(`tmp` IS NOT NULL, `tmp`, '1000-01-01 00:00:00') ORDER BY `buildtime` DESC");
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
?>
