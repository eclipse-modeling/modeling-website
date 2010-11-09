<?php
$PR = "modeling/m2m";
$projectName = "M2M";
$defaultProj = "/atl";

$isBuildServer = (preg_match("/^(emft|modeling|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"]));
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
	"org.eclipse.m2m" => array (
		"atl" => "org.eclipse.atl",
		"qvtoml" => "org.eclipse.qvtoml",
		"qvtd" => "org.eclipse.qvt.declarative",
		/* add more here */
	)
);

$projects = array(
	"ATL" => "atl",
	"Operational QVT" => "qvtoml",
	"QVT Declarative" => "qvtd"
);

$bugcoms = array_flip($projects);
$bugcoms = preg_replace("/ /", "%20", $bugcoms);

$extraprojects = array(); //components with only downloads, no info yet, "prettyname" => "directory"
$nodownloads = array(); //components with only information, no downloads, or no builds available yet, "projectkey"
$nonewsgroup = array("atl"); //components without newsgroup
$nomailinglist = array("atl"); //components without mailinglist
$incubating = array("qvtd"); // components that are incubating
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

$Nav->setLinkList(array());
$Nav->addCustomNav("About This Project", "/projects/project_summary.php?projectid=" . str_replace("/", ".", $PR), "", 1);
$Nav->addNavSeparator($projectName, "$rooturl/");

# after moving to modeling index.php format, use this
/*foreach (array_keys(array_diff($projects, $extraprojects)) as $z)
{
	$Nav->addCustomNav($z, "$rooturl/?project=$projects[$z]", "_self", 2);
}*/

# and remove this
foreach (array_keys(array_diff($projects, $extraprojects)) as $z)
{
	$Nav->addCustomNav($z, "http://wiki.eclipse.org/M2M/" . strtoupper($projects[$z]), "_self", 2);
}

$Nav->addNavSeparator("Downloads", "$downurl/$PR/downloads/?project=$proj");
if ($projct == "atl") {
$Nav->addCustomNav("Update Manager", "$rooturl/atl/updates/", "_self", 2);
$Nav->addCustomNav("Old Update Manager (ATL < 3.2)", "$rooturl/updates/", "_self", 2);
} else {
$Nav->addCustomNav("Update Manager", "$rooturl/updates/", "_self", 2);
}
$Nav->addNavSeparator("Documentation", "http://wiki.eclipse.org/Model_to_Model_Transformation_(M2M)");
$Nav->addCustomNav("Plan", "http://www.eclipse.org/projects/project-plan.php?projectid=modeling.m2m", "_self", 2);
#$Nav->addCustomNav("Plan", "$rooturl/docs/plans/m2m_project_plan_1_1.html", "_self", 2);
$Nav->addCustomNav("Release Notes", "http://www.eclipse.org/$PR/news/relnotes.php?project=$proj&amp;version=HEAD", "_self", 2);
$Nav->addCustomNav("Search CVS", "http://www.eclipse.org/$PR/searchcvs.php?q=file%3A+org.eclipse." . strtolower($projectName) . "%2F" . ($proj?"org.eclipse.".$proj."%2F":"") . "+days%3A+7", "_self", 2);

$Nav->addNavSeparator("Community", "http://wiki.eclipse.org/Modeling_Corner");
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/Model_to_Model_Transformation_(M2M)", "_self", 2);
$Nav->addCustomNav("Newsgroup", "news://news.eclipse.org/eclipse.modeling.m2m", "_self", 2);
$Nav->addCustomNav("Modeling Corner", "http://wiki.eclipse.org/Modeling_Corner", "_self", 2);
$collist = "&columnlist=changeddate%2Cbug_severity%2Cpriority%2Crep_platform%2Cbug_status%2Cproduct%2Ccomponent%2Cversion%2Ctarget_milestone%2short_desc";
$Nav->addCustomNav("Open Bugs", "$bugurl/bugs/buglist.cgi?bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&product=" . $projectName . (false && isset ($bugcoms[$proj]) ? "&component=$bugcoms[$proj]" : "") . "&query_format=advanced&order=bug_status%2Ctarget_milestone%2Cbug_id$collist", "_self", 2);
$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=" . $projectName, "_self", 2);
$Nav->addCustomNav("Contributors", "http://www.eclipse.org/$PR/project-info/team.php", "_self", 2);

//if ($projct == "atl")
//{	
//	$Nav->addNavSeparator("ATL", "/atl");
//	$Nav->addCustomNav("Download", "http://www.eclipse.org/modeling/m2m/downloads/?project=atl", "_self", 3);
//	$Nav->addCustomNav("Old Downloads", "/m2m/atl/download/index-old.php", "_self", 2);
//	$Nav->addCustomNav("Documentation", "/atl/documentation", "_self", 3);
//	$Nav->addCustomNav("Support", "/atl/support", "_self", 3);
//	$Nav->addCustomNav("Getting Involved", "/atl/developers", "_self", 3);
//}
unset ($bugcoms);

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/common.css\"/>\n");
addGoogleAnalyticsTrackingCodeToHeader();
$App->Promotion = TRUE; # set true to enable current eclipse.org site-wide promo
?>
