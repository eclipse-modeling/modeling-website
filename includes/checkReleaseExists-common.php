<?php

#ini_set("display_errors","1");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
$App = new App();
$Nav = new Nav();
$Menu = new Menu();
include ($App->getProjectCommon()); # varies with project - emf, emft, mdt, etc.

require ($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

$proj = "";
$cvsproj = "";
$cvscom = "";
if (!function_exists("components"))
{
	header("Content-type: text/plain");
	print "Error: this script must be run from a web root such as /modeling/mdt/ or /modeling/emf, not from /modeling/includes/";
	exit;
}

$components = components($cvscoms);
pick_project($proj, $cvsproj, $cvsprojs, $cvscom, $cvscoms, $components);

$version = (isset ($_GET["version"]) ? $_GET["version"] : "");

if ($version && ($cvsproj || $cvscom))
{
	header("Content-type: text/plain");
	$version = (get_magic_quotes_gpc() ? $version : addslashes($version));
	$query = "SELECT COUNT(*) FROM `releases` WHERE `project` = '$cvsproj' AND `component` = '$cvscom' AND `vanityname` = '$version'";
	$result = wmysql_query($query);
	if ($result)
	{
		$row = mysql_fetch_row($result);
		print (isset ($row[0]) && $row[0] !== "" ? $row[0] : $query) . "\n";
	} else
	{
		print "Error: could not connect to database!\n";
		print "\nQuery was:\n\n$query\n";
	}
} else
{
	ob_start();
	
	$script = explode("/",$_SERVER["SCRIPT_NAME"]); $script = $script[sizeof($script)-1];

	print '<div id="midcolumn">
<h1>checkReleaseExists - API Reference</h1>

<div class="homeitem3col">'."\n";
	print "<h3>INPUT</h3>\n<ul><li>" . $script . "?project=<i style=\"color:blue\">{project or component}</i>&amp;version=<i style=\"color:blue\">{buildID or buildAlias}</i></li></ul><br/>\n";
	print "<h3>EXAMPLE</h3>\n<ul><li>" . $script . "?project=uml2&amp;version=2.1M3</li></ul><br/>\n";
	print '<h3>OUTPUT</h3>'."\n".'<ul><li><b style="color:red">0</b> (not found)</li><li><b style="color:green">1</b> (found)</li></ul><br/>' . "\n";

	print "</div>\n";
	print "</div>\n";

	$html = ob_get_contents();
	ob_end_clean();

	$pageTitle = isset ($pageTitle) ? $pageTitle : "Eclipse Modeling - Check Release Exists";
	$pageKeywords = "";
	$pageAuthor = "";

	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

}
?>
