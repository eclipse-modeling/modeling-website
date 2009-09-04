<?php
$Nav->setLinkList(null);

$PR = "modeling/emft";
$projectName = "EMFT";
$defaultProj = "/compare";

$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
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
		"compare" => "org.eclipse.emf.compare",
		"search" => "org.eclipse.emf.search",
		"jcrm" => "org.eclipse.emf.jcrm",
		"mwe" => "org.eclipse.emf.mwe",
		"teneo" => "org.eclipse.emf.teneo",
		"cdo" => "org.eclipse.emf.cdo",
		"net4j" => "org.eclipse.emf.net4j",
		"ecoretools" => "org.eclipse.emf.ecoretools",
		"temporality" => "org.eclipse.emf.temporality",
		"mint" => "org.eclipse.emf.mint",
		"emf4net" => "org.eclipse.emf.emf4net",
		"emfatic" => "org.eclipse.emf.emfatic",
		"eef" => "org.eclipse.emf.eef"
		/* add more here */
	)
);

$projects = array(
	"Compare" => "compare",
	"Ecore Tools" => "ecoretools",
	"Mint" => "mint",
	"Search" => "search",
	"EMFatic" => "emfatic",
	"EEF" => "eef",
	"Modeling Workflow" => "mwe",

	// graduated
	"Teneo" => "teneo",
	"CDO" => "cdo",
	"Net4j" => "net4j",

    // no builds yet
	"EMF4Net" => "emf4net",
	"JCR Management" => "jcrm",
	"Temporality" => "temporality",
);

$bugcoms = array_flip($projects);
$bugcoms = preg_replace("/ /", "%20", $bugcoms);

$extraprojects = array(); //components with only downloads, no info yet, "prettyname" => "directory"
$nodownloads = array("coordinated","jcrm","temporality", "emf4net", "emfatic"); //components with only information, no downloads, or no builds available yet, "projectkey"
$nonewsgroup = array(); //components without newsgroup
$nomailinglist = array(); //components without mailinglist
$incubating = $projects; // ALL components are incubating
$hasmoved = array(
	"teneo" => "emf", "net4j" => "emf",	"cdo" => "emf", "compare" => "emf" , 
	"query" => "emf", "transaction" => "emf", "validation" => "emf",
	"eodm" => "mdt", "ocl" => "mdt",
	"jet" => "m2t", "jeteditor" => "m2t"); // components which have moved, and to where
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
	if (in_array($projects[$z], $nodownloads))
	{
		$Nav->addCustomNav("<acronym title='$z has no downloads yet.'><i style='color:gray'>" . $z . "</i></acronym>", "$rooturl/?project=$projects[$z]", "_self",  2);
		
	}
	else if (isset($hasmoved[$projects[$z]]))
	{
		$Nav->addCustomNav("<acronym title='$z has graduated to " . strtoupper($hasmoved[$projects[$z]]) . ".'><i style='color:silver'>" . $z . "</i></acronym>", "http://www.eclipse.org/modeling/" . $hasmoved[$projects[$z]] . "/?project=" . $projects[$z], "_self", 2);
	}
	else
	{
		$Nav->addCustomNav($z, "$rooturl/?project=$projects[$z]", "_self",  2);
	}
}

$Nav->addNavSeparator("Downloads", "$downurl/$PR/downloads/?project=$proj");
$Nav->addCustomNav("Update Manager", "$rooturl/updates/", "_self", 2);

$Nav->addNavSeparator("Documentation", "http://wiki.eclipse.org/EMFT");
$Nav->addCustomNav("Plan", "http://www.eclipse.org/projects/project-plan.php?projectid=modeling.emft", "_self", 2);
$Nav->addCustomNav("Release Notes", "http://www.eclipse.org/$PR/news/relnotes.php?project=$proj&amp;version=HEAD", "_self", 2);
$Nav->addCustomNav("Search CVS", "http://www.eclipse.org/$PR/searchcvs.php?q=file%3A+org.eclipse.emf%25%2F" . ($proj?"org.eclipse.emf.".$proj."%2F":"") . "+days%3A+7", "_self", 2);

$Nav->addNavSeparator("Community", "http://wiki.eclipse.org/Modeling_Corner");
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/" . $projectName, "_self", 2);
$Nav->addCustomNav("Newsgroup", "$rooturl/newsgroup-mailing-list.php", "_self", 2);
$Nav->addCustomNav("Modeling Corner", "http://wiki.eclipse.org/Modeling_Corner", "_self", 2);
$collist = "%26query_format%3Dadvanced&amp;column_changeddate=on&amp;column_bug_severity=on&amp;column_priority=on&amp;column_rep_platform=on&amp;column_bug_status=on&amp;column_product=on&amp;column_component=on&amp;column_version=on&amp;column_target_milestone=on&amp;column_short_short_desc=on&amp;splitheader=0";
$Nav->addCustomNav("Open Bugs", "$bugurl/bugs/colchange.cgi?rememberedquery=product%3D" . $projectName . (isset ($bugcoms[$proj]) ? "%26component=$bugcoms[$proj]" : "") . "%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26bug_status%3DRESOLVED%26resolution%3DFIXED%26resolution%3D---%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id" . $collist, "_self", 2);
$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=" . $projectName . (isset ($bugcoms[$proj]) ? "&amp;component=$bugcoms[$proj]" : ""), "_self", 2);
$Nav->addCustomNav("Contributors", "http://www.eclipse.org/$PR/project-info/team.php", "_self", 2);
unset ($bugcoms);

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/common.css\"/>\n");
addGoogleAnalyticsTrackingCodeToHeader();
$App->Promotion = TRUE; # set true to enable current eclipse.org site-wide promo
?>
