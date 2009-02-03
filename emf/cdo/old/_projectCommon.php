<?php
$Nav->setLinkList(null);

$PR = "modeling/emf/cdo";
$projectName = "CDO";
$defaultProj = "/cdo";

$proj = "emf";
$comp = "cdo";

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

/* projects/components in cvs */
/* "proj" => "cvsname" */
$cvsprojs = array (); /* should always be empty */

/* sub-projects/components in cvs for projects/components above (if any) */
/* "cvsname" => array("shortname" => "cvsname") */
$cvscoms = array(
	"org.eclipse.emf" => array (
		"emf" => "org.eclipse.emf",

		"cdo" => "org.eclipse.emf.cdo",
		"query" => "org.eclipse.emf.query",
		"transaction" => "org.eclipse.emf.transaction",
		"emfqtv" => "org.eclipse.emf.emfqtv",
		"net4j" => "org.eclipse.emf.net4j",
		"sdo" => "org.eclipse.emf.ecore.sdo",
		"teneo" => "org.eclipse.emf.teneo",
		"validation" => "org.eclipse.emf.validation",

)
);

$projects = array(
	"EMF (Core)" => "emf",

	"CDO" => "cdo",
	"Model Query" => "query",
	"Model Transaction" => "transaction",
	"Net4j" => "net4j",
	"QTV All-In-One" => "emfqtv",
	"SDO" => "sdo",
	"Teneo" => "teneo",
	"Validation Framework" => "validation",
);

$extraprojects = array("QTV All-In-One" => "emfqtv"); //components with only downloads, no info yet, "prettyname" => "directory"
$nodownloads =   array("emfqtv"); //components with only information, no downloads, or no builds available yet, "projectkey"
$nonewsgroup =   array("query","transaction","validation","emfqtv", "net4j","teneo","cdo", "sdo"); //components without newsgroup
$nomailinglist = array("query","transaction","validation","emfqtv", "net4j","teneo","cdo", "sdo"); //components without mailinglist
$incubating =    array(); // components which are incubating - EMF will never have incubating components -- see EMFT
$nomenclature = "Component"; //are we dealing with "components" or "projects"?

include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/scripts.php";

$regs = null;
$proj = (isset($_GET["project"]) && preg_match("/^(" . join("|", $projects) . ")$/", $_GET["project"], $regs) ? $regs[1] : getProjectFromPath($PR));
$projct= preg_replace("#^/#", "", $proj);

$buildtypes = array(
	"R" => "Release",
	"S" => "Stable",
	"I" => "Integration",
	"M" => "Maintenance",
	"N" => "Nightly"
);

function formatDate($date)
{
	if (is_string($date)) $date = strtotime($date);
	return date("Y-m-d", $date);
}

function daysBetween($from, $until)
{
	if (is_string($from)) $from = strtotime($from);
	if (is_string($until)) $until = strtotime($until);
	$offset = floor($until / 86400) - floor($from / 86400) + 1; 
	return $offset;
}

$Nav->addCustomNav("About This Project", "/projects/project_summary.php?projectid=" . str_replace("/", ".", $PR), "", 1);

$Nav->addNavSeparator("CDO", "$rooturl");
$Nav->addCustomNav("Team", "$rooturl/project-info/team.php", "", 1);
$Nav->addCustomNav("Downloads", "/modeling/emf/downloads/?project=cdo", "", 1);

$Nav->addNavSeparator("Resources", "$rooturl/resources");
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/CDO", "", 1);

$Nav->addNavSeparator("Tools", "$rooturl/tools");
$Nav->addCustomNav("MYSQL Tables", "$rooturl/tools/mysql.php", "", 1);

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/common.css\"/>\n");
addGoogleAnalyticsTrackingCodeToHeader();
$App->Promotion = TRUE; # set true to enable current eclipse.org site-wide promo

?>
