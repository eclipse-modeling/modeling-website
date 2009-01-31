<?php
$Nav->setLinkList(null);
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/CDO", "", 1);

$PR = "modeling/emf/cdo";
$projectName = "CDO";

$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"])) || (preg_match("/^(emft|modeling)\.eclipse\.org$/", $_SERVER["SERVER_NAME"]));
$isBuildServer = (preg_match("/^(emft|modeling|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"])) || $isEMFserver;
$isBuildDotEclipseServer = $_SERVER["SERVER_NAME"] == "build.eclipse.org";
$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$isEclipseCluster = (preg_match("/^(?:www.||download.|download1.|build.)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$debug = (isset ($_GET["debug"]) && preg_match("/^\d+$/", $_GET["debug"]) ? $_GET["debug"] : -1);
$writableRoot = ($isBuildServer ? $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/" : "/home/data/httpd/writable/www.eclipse.org/");
$writableBuildRoot = $isBuildDotEclipseServer ? "/opt/public/modeling" : "/home/www-data";

$rooturl = "http://" . $_SERVER["HTTP_HOST"] . "/$PR";
$downurl = ($isBuildServer ? "" : "http://www.eclipse.org");
$bugurl = "https://bugs.eclipse.org";

if (isset ($_GET["skin"]) && preg_match("/^(Blue|EclipseStandard|Industrial|Lazarus|Miasma|Modern|OldStyle|Phoenix|PhoenixTest|PlainText|Nova)$/", $_GET["skin"], $regs))
{
	$theme = $regs[1];
}
else
{
	$theme = "Nova";
}


include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/scripts.php";

$regs = null;
$proj = "cdo";

$Nav->addNavSeparator($projectName, "$rooturl/");

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/common.css\"/>\n");
addGoogleAnalyticsTrackingCodeToHeader();
$App->Promotion = TRUE; # set true to enable current eclipse.org site-wide promo
?>
