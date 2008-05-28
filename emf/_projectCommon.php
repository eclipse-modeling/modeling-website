<?php

$Nav->setLinkList(null);

$PR = "modeling/emf";
$projectName = "EMF";

$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
$isBuildServer = (preg_match("/^(emft|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"])) || $isEMFserver;
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
	"org.eclipse.emf" => array (
		"emf" => "org.eclipse.emf",
		"sdo" => "org.eclipse.emf.ecore.sdo",
		"query" => "org.eclipse.emf.query",
		"transaction" => "org.eclipse.emf.transaction",
		"validation" => "org.eclipse.emf.validation",
		"emfqtv" => "org.eclipse.emf.emfqtv",
		"net4j" => "org.eclipse.emf.net4j",
		"teneo" => "org.eclipse.emf.teneo",
		"cdo" => "org.eclipse.emf.cdo",
	)
);

$projects = array(
	"EMF (Core)" => "emf",
	"Model Query" => "query",
	"Model Transaction" => "transaction",
	"Validation Framework" => "validation",
	"QTV All-In-One" => "emfqtv",
	"Teneo" => "teneo",
	"CDO" => "cdo",
	"Net4j" => "net4j",
	"SDO" => "sdo",
);

$bugcoms = array();
foreach ($projects as $l => $p) 
{
	$bugcoms[$p] = $p;
}
/* for emf, show all the emf (sub)components */
$bugcoms["emf"] = implode("%26component=", array("Core", "Doc", "Edit", "Mapping", "Tools", "XML/XMI"));

$extraprojects = array("QTV All-In-One" => "emfqtv"); //components with only downloads, no info yet, "prettyname" => "directory"
$nodownloads = array("emfqtv"); //components with only information, no downloads, or no builds available yet, "projectkey"
$nonewsgroup = array("sdo","query","transaction","validation", "emfqtv", "net4j","teneo","cdo"); //components without newsgroup
$nomailinglist = array("sdo","query","transaction","validation", "emfqtv", "net4j","teneo","cdo"); //components without mailinglist
$incubating = array(); // components which are incubating - EMF will never have incubating components -- see EMFT
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
$Nav->addCustomNav("Getting Started", "http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.emf/org.eclipse.emf/doc/org.eclipse.emf.doc/references/overview/EMF.html?root=Modeling_Project&amp;view=co", "_self", 2);
if (!$proj || $proj == "emf" || $proj == "sdo" || !in_array($proj,$bugcoms))
{
	$Nav->addCustomNav("FAQ", "http://wiki.eclipse.org/index.php/EMF-FAQ", "_self", 2);
	$Nav->addCustomNav("Release Notes", "http://www.eclipse.org/$PR/news/relnotes.php?project=" . ($proj?$proj:"emf") . "&amp;version=HEAD", "_self", 2);
	$Nav->addCustomNav("Search CVS", "http://www.eclipse.org/$PR/searchcvs.php?q=project%3A+org.eclipse.emf".($proj=="sdo"?".ecore.sdo":"")."+days%3A+7", "_self", 2);
}
else
{
	$Nav->addCustomNav("FAQ", "http://wiki.eclipse.org/index.php/EMF-".$bugcoms[$proj]."-FAQ", "_self", 2);
	$Nav->addCustomNav("Release Notes", "http://www.eclipse.org/$PR/news/relnotes.php?project=$proj&amp;version=HEAD", "_self", 2);
	$Nav->addCustomNav("Search CVS", "http://www.eclipse.org/$PR/searchcvs.php?q=file%3A+org.eclipse." . strtolower($projectName) . "%2F" . ($proj?"org.eclipse.emf.".$proj."%2F":"") . "+days%3A+7", "_self", 2);
}
$Nav->addNavSeparator("Community", "http://wiki.eclipse.org/Modeling_Corner");
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/" . $projectName, "_self", 2);
$Nav->addCustomNav("Newsgroups", "$rooturl/newsgroup-mailing-list.php", "_self", 2);
$Nav->addCustomNav("Modeling Corner", "http://wiki.eclipse.org/Modeling_Corner", "_self", 2);
$collist = "%26query_format%3Dadvanced&amp;column_changeddate=on&amp;column_bug_severity=on&amp;column_priority=on&amp;column_rep_platform=on&amp;column_bug_status=on&amp;column_product=on&amp;column_component=on&amp;column_version=on&amp;column_target_milestone=on&amp;column_short_short_desc=on&amp;splitheader=0";
$Nav->addCustomNav("Open Bugs", "$bugurl/bugs/colchange.cgi?rememberedquery=product%3D" . $projectName . (isset ($bugcoms[$proj]) ? "%26component=$bugcoms[$proj]" : "") . "%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26bug_status%3DRESOLVED%26resolution%3DFIXED%26resolution%3D---%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id" . $collist, "_self", 2);
$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=" . $projectName . (isset ($bugcoms[$proj]) ? "&amp;component=$bugcoms[$proj]" : ""), "_self", 2);
$Nav->addCustomNav("Contributors", "http://www.eclipse.org/$PR/project-info/team.php", "_self", 2);

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/common.css\"/>\n");

$App->Promotion = FALSE; # set true to enable current eclipse.org site-wide promo

unset ($bugcoms);
?>
