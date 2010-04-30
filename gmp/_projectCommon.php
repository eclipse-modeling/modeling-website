<?php
$Nav->setLinkList(null);

$PR = "modeling/gmf";
$projectName = "GMF";
$defaultProj = "/gmf";

$isGMFserver = true; // (preg_match("/^ltahunter61(?:\.ottawa\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
$isBuildServer = (preg_match("/^(emft|modeling|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"])) || $isGMFserver;
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
$cvscoms = array (
	"org.eclipse.gmf" => array (
		"gmf" => "org.eclipse.gmf",
                "gmf-tooling" => "org.eclipse.gmf",
                "gmf-notation" => "org.eclipse.gmf",
                "gmf-runtime" => "org.eclipse.gmf",
                "graphiti" => "org.eclipse.gmf",
                /* add more here */
	)
);

$projects = array (
	"GMF" => "gmf",
	"GMF Tooling" => "gmf-tooling",
	"GMF Runtime" => "gmf-runtime",
	"GMF Notation" => "gmf-notation",
	"Graphiti" => "graphiti",
);

$extraprojects = array(); //components with only downloads, no info yet, "prettyname" => "directory"
$nodownloads = array("graphiti"); //components with only information, no downloads, or no builds available yet, "projectkey"
$nonewsgroup = array(""); //components without newsgroup
$nomailinglist = array(""); //components without mailinglist
$incubating = array("graphiti"); // components which are still incubating
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
$Nav->addCustomNav("Update Manager", "$rooturl/updates/", "_self", 2);

$Nav->addNavSeparator("Documentation", "http://wiki.eclipse.org/GMF_Documentation");
$Nav->addCustomNav("Getting Started", "http://wiki.eclipse.org/GMF_Documentation", "_self", 2);
$Nav->addCustomNav("FAQ", "$rooturl/faq.php?project=$proj", "_self", 2);
$Nav->addCustomNav("Plan", "http://www.eclipse.org/projects/project-plan.php?projectid=modeling.gmf", "_self", 2);
$Nav->addCustomNav("Release Notes", "http://www.eclipse.org/$PR/news/relnotes.php?project=$proj&amp;version=HEAD", "_self", 2);
$Nav->addCustomNav("Search CVS", "http://www.eclipse.org/$PR/searchcvs.php?q=file%3A+org.eclipse.gmf%2F" . (false && $proj?"org.eclipse.gmf.".$proj."%2F":"") . "+days%3A+7", "_self", 2);

$Nav->addNavSeparator("Community", "http://www.eclipse.org/$PR/development/");
$Nav->addCustomNav("How To Contribute", "http://www.eclipse.org/$PR/development/", "_self", 2);
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/Graphical_Modeling_Framework", "_self", 2);
$Nav->addCustomNav("Newsgroup", "http://dev.eclipse.org/newslists/news.eclipse.modeling.gmf/maillist.html", "_self", 2);
$Nav->addCustomNav("Mailing List", "https://dev.eclipse.org/mailman/listinfo/gmf-releng", "_self", 2);
$Nav->addCustomNav("Modeling Corner", "http://wiki.eclipse.org/Modeling_Corner", "_self", 2);

$bugcoms = array_flip($projects);
$bugcoms = preg_replace("/ /", "%20", $bugcoms);
$collist = "&columnlist=changeddate%2Cbug_severity%2Cpriority%2Crep_platform%2Cbug_status%2Cproduct%2Ccomponent%2Cversion%2Ctarget_milestone%2short_desc";
$Nav->addCustomNav("Open Bugs", "$bugurl/bugs/buglist.cgi?bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&product=" . $projectName . (false && isset ($bugcoms[$proj]) ? "&component=$bugcoms[$proj]" : "") . "&query_format=advanced&order=bug_status%2Ctarget_milestone%2Cbug_id$collist", "_self", 2);
$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=" . $projectName . (false && isset ($bugcoms[$proj]) ? "&amp;component=$bugcoms[$proj]" : ""), "_self", 2);
$Nav->addCustomNav("Contributors", "http://www.eclipse.org/$PR/project-info/team.php", "_self", 2);
unset ($bugcoms);

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/common.css\"/>\n");
addGoogleAnalyticsTrackingCodeToHeader();
$App->Promotion = TRUE; # set true to enable current eclipse.org site-wide promo
?>
