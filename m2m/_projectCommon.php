<?php

$PR = "modeling/m2m";
$projectName = "M2M";

$isBuildServer = (preg_match("/^(emft|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"]));
$isBuildDotEclipseServer = $_SERVER["SERVER_NAME"] == "build.eclipse.org";
$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$isEclipseCluster = (preg_match("/^(?:www.||download.|download1.|build.)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$debug = (isset ($_GET["debug"]) && preg_match("/^\d+$/", $_GET["debug"]) ? $_GET["debug"] : -1);
$writableRoot = ($isBuildServer ? $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/" : "/home/data/httpd/writable/www.eclipse.org/");
$writableBuildRoot = $isBuildDotEclipseServer ? "/opt/public/modeling" : "/home/www-data";

$rooturl = "http://" . $_SERVER["HTTP_HOST"] . "/$PR";
$downurl = ($isBuildServer ? "" : "http://www.eclipse.org");
$bugurl = "https://bugs.eclipse.org";

if (isset ($_GET["skin"]) && preg_match("/^(Blue|EclipseStandard|Industrial|Lazarus|Miasma|Modern|OldStyle|Phoenix|PhoenixTest|PlainText)$/", $_GET["skin"], $regs))
{
	$theme = $regs[1];
}
else
{
	$theme = "Phoenix";
}

/* projects/components in cvs */
/* "proj" => "cvsname" */
$cvsprojs = array (); /* should always be empty */

/* sub-projects/components in cvs for projects/components above (if any) */
/* "cvsname" => array("shortname" => "cvsname") */
$cvscoms = array(
	"org.eclipse.m2m" => array (
		"atl" => "org.eclipse.m2m.atl",
		"qvto" => "org.eclipse.m2m.qvto",
		"qvtr" => "org.eclipse.m2m.qvtr",
		/* add more here */
	)
);

$projects = array(
	"ATL" => "atl",
	"Operational QVT" => "qvto",
	"Relational QVT" => "qvtr"
);

$bugcoms = array_flip($projects);
$bugcoms = preg_replace("/ /", "%20", $bugcoms);

$extraprojects = array(); //components with only downloads, no info yet, "prettyname" => "directory"
$nodownloads = array("qvto","qvtr"); //components with only information, no downloads, or no builds available yet, "projectkey"
$nonewsgroup = array("atl"); //components without newsgroup
$nomailinglist = array("atl"); //components without mailinglist
$incubating = array("qvto", "qvtr"); // components that are incubating
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
$Nav->addNavSeparator($projectName, "$rooturl/");

# after moving to modeling index.php format, use this
/*foreach (array_keys(array_diff($projects, $extraprojects)) as $z)
{
	$Nav->addCustomNav($z, "$rooturl/?project=$projects[$z]", "_self", 2); 
}*/

# and remove this
$Nav->addCustomNav("ATL", "http://www.eclipse.org/m2m/atl/", "_self", 2); 
$Nav->addCustomNav("Procedural QVT", "http://wiki.eclipse.org/M2M/Operational_QVT_Language_(QVTO)", "_self", 2); 
$Nav->addCustomNav("Declarative QVT", "http://wiki.eclipse.org/M2M/Relational_QVT_Language_(QVTR)", "_self", 2); 

$Nav->addNavSeparator("Downloads", "$downurl/$PR/downloads/?project=$proj");
$Nav->addCustomNav("Update Manager", "$rooturl/updates/", "_self", 2);

#$Nav->addNavSeparator("Documentation", "$rooturl/docs.php?project=$proj");
#$Nav->addCustomNav("FAQ", "$rooturl/faq.php?project=$proj", "_self", 2);
#$Nav->addCustomNav("Plan", "$rooturl/docs/plans/m2m_project_plan_1_1.html", "_self", 2);

$Nav->addCustomNav("Release Notes", "http://www.eclipse.org/$PR/news/relnotes.php?project=$proj&amp;version=HEAD", "_self", 2);
$Nav->addCustomNav("Search CVS", "http://www.eclipse.org/$PR/searchcvs.php?q=file%3A+org.eclipse." . strtolower($projectName) . "%2F" . ($proj?"org.eclipse.".$proj."%2F":"") . "+days%3A+7", "_self", 2);

$Nav->addNavSeparator("Community", "http://wiki.eclipse.org/Modeling_Corner");
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/Model_to_Model_Transformation_(M2M)", "_self", 2);
$Nav->addCustomNav("Newsgroup", "news://news.eclipse.org/eclipse.modeling.m2m", "_self", 2);
$Nav->addCustomNav("Modeling Corner", "http://wiki.eclipse.org/Modeling_Corner", "_self", 2);
$collist = "%26query_format%3Dadvanced&amp;column_changeddate=on&amp;column_bug_severity=on&amp;column_priority=on&amp;column_rep_platform=on&amp;column_bug_status=on&amp;column_product=on&amp;column_component=on&amp;column_version=on&amp;column_target_milestone=on&amp;column_short_short_desc=on&amp;splitheader=0";
$Nav->addCustomNav("Open Bugs", "$bugurl/bugs/colchange.cgi?rememberedquery=product%3D" . $projectName . "%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id" . $collist, "_self", 2);
$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=" . $projectName, "_self", 2);
$Nav->addCustomNav("Contributors", "http://www.eclipse.org/$PR/project-info/team.php", "_self", 2);

if ($projct == "atl")
{
	$Nav->addNavSeparator("ATL", "/m2m/atl/");
	$Nav->addCustomNav("Use Cases", "/m2m/atl/usecases/", "_self", 2);
	$Nav->addCustomNav("Basic Examples", "/m2m/atl/basicExamples_Patterns/", "_self", 2);
	$Nav->addCustomNav("Transformations", "/m2m/atl/atlTransformations/", "_self", 2);
	$Nav->addCustomNav("Old Downloads", "/m2m/atl/download/", "_self", 2);
	$Nav->addCustomNav("Documentation", "/m2m/atl/doc/", "_self", 2);
	$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/M2M/Atlas_Transformation_Language_(ATL)", "_self", 2);
	$Nav->addCustomNav("Publications", "/m2m/atl/publication.php", "_self", 2);
}

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/common.css\"/>\n");

unset ($bugcoms);
?>
