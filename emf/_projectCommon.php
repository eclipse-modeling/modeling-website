<?php
$Nav->setLinkList(null);

$PR = "modeling/emf";
$projectName = "EMF";
$defaultProj = "/emf";

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
	$theme = "solstice";
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
		"compare" => "org.eclipse.emf.compare",
		"query" => "org.eclipse.emf.query",
		"query2" => "org.eclipse.emf.query",
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
	"Compare" => "compare",
	"Model Query" => "query",
	"Model Query 2" => "query2",
	"Model Transaction" => "transaction",
	"Net4j" => "net4j",
	"QTV All-In-One" => "emfqtv",
	"SDO" => "sdo",
	"Teneo" => "teneo",
	"Validation Framework" => "validation",
);

/* if set, both home and download page will redirect to a different landing page */
$emf_download_redirects = array("teneo" => "http://wiki.eclipse.org/Teneo/Hibernate/Download_and_Install", 
	"cdo" => "http://www.eclipse.org/cdo/downloads/",
	"compare" => "http://www.eclipse.org/emf/compare/downloads/");
$emf_home_redirects = array("teneo" => "http://wiki.eclipse.org/Teneo",
	"cdo" => "http://www.eclipse.org/cdo/",
	"compare" => "http://www.eclipse.org/emf/compare");

$extraprojects = array("QTV All-In-One" => "emfqtv"); //components with only downloads, no info yet, "prettyname" => "directory"
$nodownloads =   array("emfqtv"); //components with only information, no downloads, or no builds available yet, "projectkey"
$nonewsgroup =   array("query","query2","transaction","validation","emfqtv", "net4j","teneo","cdo","compare", "sdo"); //components without newsgroup
$nomailinglist = array("query","query2","transaction","validation","emfqtv", "net4j","teneo","cdo", "compare", "sdo"); //components without mailinglist
$incubating =    array("query2"); // components which are incubating - EMF will never have incubating components -- see EMFT
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

$Nav->addCustomNav("About This Project", "/projects/project_summary.php?projectid=" . str_replace("/", ".", $PR), "", 1);
$Nav->addNavSeparator($projectName, "$rooturl/");

foreach (array_keys(array_diff($projects, $extraprojects)) as $z)
{
	$Nav->addCustomNav($z, "$rooturl/?project=$projects[$z]", "_self", 2);
}

$Nav->addNavSeparator("Downloads", "$downurl/$PR/downloads/?project=$proj");
$Nav->addCustomNav("Installation", "http://wiki.eclipse.org/EMF/Installation", "_self", 2);
$Nav->addCustomNav("Update Manager", "$rooturl/updates/", "_self", 2);

$Nav->addNavSeparator("Documentation", "$rooturl/docs/");
$Nav->addCustomNav("Getting Started", "http://help.eclipse.org/ganymede/index.jsp?topic=/org.eclipse.emf.doc/references/overview/EMF.html", "_self", 2);
$Nav->addCustomNav("FAQ", "http://wiki.eclipse.org/index.php/EMF/FAQ", "_self", 2);
$Nav->addCustomNav("Plan", "http://www.eclipse.org/projects/project-plan.php?projectid=modeling.emf", "_self", 2);
if (!$proj || $proj == "emf" || $proj == "sdo")
{
	$Nav->addCustomNav("Release Notes", "http://www.eclipse.org/$PR/news/relnotes.php?project=" . ($proj?$proj:"emf") . "&amp;version=HEAD", "_self", 2);
	$Nav->addCustomNav("Search CVS", "http://www.eclipse.org/$PR/searchcvs.php?q=project%3A+org.eclipse.emf".($proj=="sdo"?".ecore.sdo":"")."+days%3A+7", "_self", 2);
}
else
{
	$Nav->addCustomNav("Release Notes", "http://www.eclipse.org/$PR/news/relnotes.php?project=$proj&amp;version=HEAD", "_self", 2);
	$Nav->addCustomNav("Search CVS", "http://www.eclipse.org/$PR/searchcvs.php?q=file%3A+org.eclipse." . strtolower($projectName) . "%2F" . ($proj?"org.eclipse.emf.".$proj."%2F":"") . "+days%3A+7", "_self", 2);
}
$Nav->addNavSeparator("Community", "http://wiki.eclipse.org/Modeling_Corner");
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/" . $projectName, "_self", 2);
$Nav->addCustomNav("Newsgroups", "$rooturl/newsgroup-mailing-list.php", "_self", 2);
$Nav->addCustomNav("Modeling Corner", "http://wiki.eclipse.org/Modeling_Corner", "_self", 2);

$bugcoms = array(); foreach ($projects as $l => $p){ $bugcoms[$p] = $p; }
$bugcoms["emf"] = implode("%26component=", array("Core", "Doc", "Edit", "Mapping", "Tools", "XML/XMI")); /* for emf, show all the emf (sub)components */
$collist = "&columnlist=changeddate%2Cbug_severity%2Cpriority%2Crep_platform%2Cbug_status%2Cproduct%2Ccomponent%2Cversion%2Ctarget_milestone%2short_desc";
$Nav->addCustomNav("Open Bugs", "$bugurl/bugs/buglist.cgi?bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&product=" . $projectName . (isset ($bugcoms[$proj]) ? "&component=$bugcoms[$proj]" : "") . "&query_format=advanced&order=bug_status%2Ctarget_milestone%2Cbug_id$collist", "_self", 2);
$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=" . $projectName . (isset ($bugcoms[$proj]) ? "&amp;component=$bugcoms[$proj]" : ""), "_self", 2);
$Nav->addCustomNav("Contributors", "http://www.eclipse.org/$PR/project-info/team.php", "_self", 2);
unset ($bugcoms);

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/common.css\"/>\n");
addGoogleAnalyticsTrackingCodeToHeader();
$App->Promotion = TRUE; # set true to enable current eclipse.org site-wide promo
?>
