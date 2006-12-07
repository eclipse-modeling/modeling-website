<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
$App = new App();
$Nav = new Nav();
$Menu = new Menu();
include ($App->getProjectCommon());

internalUseOnly();

require ($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

$previewOnly = (isset ($_GET["previewOnly"]) && $_GET["previewOnly"] ? 1 : 0);

ob_start();

$opts = array ();
foreach ($cvsprojs as $z)
{
	$opts[] = "$z/";
}

$components = components($cvscoms);
foreach ($components as $z)
{
	$opts[] = "$z[0]/$z[1]";
}

print "<div id=\"midcolumn\">\n";

print "<h1>Release Notes - Delete a Release</h1>\n";

$cvsproj = (isset ($_GET["cvsproject"]) ? $_GET["cvsproject"] : "");
$rel = (isset ($_GET["release"]) ? $_GET["release"] : "");
$rels = array ();

$result = wmysql_query("SELECT `project`, `component`, `vanityname` FROM `releases` WHERE `buildtime` >= NOW() - INTERVAL 1 MONTH AND (`project`, `component`) IN(" . join(",", preg_replace("@^(.+)/(.*)$@", "('$1', '$2')", $opts)) . ") ORDER BY `project`, `component`, `buildtime` DESC");
if ($result)
{
	while ($row = mysql_fetch_row($result))
	{
		$rels["$row[0]/$row[1]"][] = "$row[2]";
	}
}

$result = "";
if ($cvsproj && $rel && isset ($rels[$cvsproj]) && is_numeric($item = array_search($rel, $rels[$cvsproj])))
{
	$regs = null;
	if (preg_match("@^(.+)/(.*)$@", $cvsproj, $regs))
	{
		$query = "DELETE FROM `releases` WHERE `project` = '$regs[1]' AND `component` = '$regs[2]' AND `vanityname` = '$rel' AND `buildtime` >= NOW() - INTERVAL 1 MONTH";
		$rel = $regs[1] . ($regs[2] ? "/" . $regs[2] : "") . "/" . $rel;
		if ($previewOnly)
		{
			$result = "<ul><li>" . $query . "</li></ul>";
		}
		else
		{
			wmysql_query($query);
			unset ($rels[$cvsproj][$item]);
			if (mysql_affected_rows($connect))
			{
				$result = "<ul><li>Release $rel deleted.</li></ul>";
			}
		}
	}
}

if (!$result)
{
	print "<script type=\"text/javascript\">\n";
	print "projs = new Array();\n";
	foreach (array_keys($rels) as $z)
	{
		print "\tprojs[\"$z\"] = new Array();\n";
		foreach ($rels[$z] as $y)
		{
			print "\t\tprojs[\"$z\"].push(\"$y\");\n";
		}
	}
	print "</script>\n";

	print "<div class=\"homeitem3col\">\n";
	print "<h3>Delete a Release</h3>\n";
	print "<form method=\"get\" action=\"\">\n";

	print "<p>\n";
	print "<label for=\"cvsproject\">$nomenclature: </label>\n";
	print "<select name=\"cvsproject\" id=\"cvsproject\" onchange=\"javascript:fillselect()\">\n";
	print "<option>-- Select a project --</option>\n";
	print join("", preg_replace("/^(.+)$/", "<option value=\"$1\">$1</option>\n", array_keys($rels)));
	print "</select>\n";
	print "</p>\n";

	print "<p>\n";
	print "<label for=\"release\">Release: </label>\n";
	print "<select name=\"release\" id=\"release\">\n";
	print "</select>\n";
	print "</p>\n";

	print "<p>\n";
	print '<input type="hidden" name="previewOnly" value="' . $previewOnly . '"/>' . "\n";
	print "<input type=\"submit\" value=\"" . ($previewOnly ? "Preview" : "Go!") . "\"/>\n";
	print "</p>\n";

	print "</form>\n";

}
else
{
	print "<div class=\"homeitem3col\">\n";
	print "<h3>Delete a Release</h3>\n";
	print $result;

}
print "</div>\n";

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = (isset ($pageTitle) ? $pageTitle : "Eclipse Modeling - Release Notes - Delete a Release");
$pageKeywords = "";
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<script type="text/javascript" src="/modeling/includes/removeRelease-common.js"></script>' . "\n"); //ie doesn't understand self closing script tags
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
