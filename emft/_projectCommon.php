<?php
$Nav->setLinkList(null);

$PR = "modeling/emft";

$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
$isBuildServer = (preg_match("/^(emft|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"])) || $isEMFserver;
$isBuildDotEclipseServer = $_SERVER["SERVER_NAME"] == "build.eclipse.org";
$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$isEclipseCluster = (preg_match("/^(?:www.||download.|download1.|build.)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$debug = (isset ($_GET["debug"]) && preg_match("/^\d+$/", $_GET["debug"]) ? $_GET["debug"] : -1);
$writableRoot = ($isBuildServer ? $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/" : "/home/data/httpd/writable/www.eclipse.org/");
$writableBuildRoot = $isBuildDotEclipseServer ? "/opt/public/modeling" : "/home/www-data";

$rooturl = "http://www.eclipse.org/modeling/emft";
$downurl = ($isBuildServer ? "/modeling/emft" : "http://www.eclipse.org/modeling/emft");
$bugurl = "https://bugs.eclipse.org";

if (isset ($_GET["skin"]) && preg_match("/^(Blue|EclipseStandard|Industrial|Lazarus|Miasma|Modern|OldStyle|Phoenix|PhoenixTest|PlainText)$/", $_GET["skin"], $regs))
{
	$theme = $regs[1];
}
else
{
	$theme = "Phoenix";
}

$projects = array(
	"Compare" => "compare",
	"Search" => "search",
	"JCR Management" => "jcrm",
	"Teneo" => "teneo",
	"CDO" => "cdo",
	"Net4j" => "net4j",
	"Model Workflow" => "mwe"
	);

$cvsprojs = array();

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
		"net4j" => "org.eclipse.emf.net4j"
		)
	
);

$bugcoms = array_flip($projects);
$bugcoms = preg_replace("/ /", "%20", $bugcoms);

$extraprojects = array(); //components with only downloads, no info yet, "prettyname" => "directory"
$nodownloads = array("coordinated","jcrm","search","mwe"); //components  with only information, no downloads, or no builds available yet, "projectkey"
$nonewsgroup = array (); //components  without newsgroup
$nomailinglist = array (); //components  without mailinglist
$incubating = array("cdo","net4j","teneo","jcrm","compare","search"); // components which are still incubating
$hasmoved = array(
				"query" => "emf", "transaction" => "emf", "validation" => "emf", 
				"eodm" => "mdt", "ocl" => "mdt", 
				"jet" => "m2t", "jeteditor" => "m2t"); // components which have moved, and to where
$nomenclature = "Component"; //are we dealing with "components" or "projects"?

$regs = null;
$proj = (isset($_GET["project"]) && preg_match("/^(" . join("|", $projects) . ")$/", $_GET["project"], $regs) ? $regs[1] : "");

$buildtypes = array(
	"R" => "Release",
	"S" => "Stable",
	"I" => "Integration",
	"M" => "Maintenance",
	"N" => "Nightly"
);

$Nav->addNavSeparator("EMFT", "$rooturl/");
foreach (array_keys(array_diff($projects, $extraprojects)) as $z)
{
	if (!isset($hasmoved[$projects[$z]]))
	{
		$Nav->addCustomNav($z, "$rooturl/?project=$projects[$z]#$projects[$z]", "_self", 2);				
	} 
	else
	{
		$Nav->addCustomNav($z, "http://www.eclipse.org/modeling/" . $hasmoved[$projects[$z]] . "/?project=" . $projects[$z], "_self", 2);
	}
}

$collist = "%26query_format%3Dadvanced&amp;column_changeddate=on&amp;column_bug_severity=on&amp;column_priority=on&amp;column_rep_platform=on&amp;column_bug_status=on&amp;column_product=on&amp;column_component=on&amp;column_version=on&amp;column_target_milestone=on&amp;column_short_short_desc=on&amp;splitheader=0";
$Nav->addNavSeparator("Downloads", "$downurl/downloads/?project=" . $proj);
$Nav->addCustomNav("Update Manager", "$rooturl/updates/", "_self", 2);

$Nav->addNavSeparator("Documentation", "http://wiki.eclipse.org/EMFT");
$Nav->addCustomNav("Release Notes", "http://www.eclipse.org/modeling/emft/news/relnotes.php?project=" . ($proj?$proj:"teneo") . "&amp;version=HEAD", "_self", 2);
$Nav->addCustomNav("Search CVS", "http://www.eclipse.org/modeling/emft/searchcvs.php?q=file%3A+org.eclipse.emf%25%2F" . ($proj?$proj."%2F":$proj) . "+days%3A+7", "_self", 2);

$Nav->addNavSeparator("Community", "http://wiki.eclipse.org/Modeling_Corner");
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/EMFT", "_self", 2);
$Nav->addCustomNav("Newsgroup", "http://www.eclipse.org/modeling/emft/newsgroup-mailing-list.php", "_self", 2);
$Nav->addCustomNav("Modeling Corner", "http://wiki.eclipse.org/Modeling_Corner", "_self", 2);
$Nav->addCustomNav("Open Bugs", "$bugurl/bugs/colchange.cgi?rememberedquery=product%3DEMFT". ($proj?"%26component%3D".$proj:"")."%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id" . $collist, "_self", 2);
$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=EMFT" . ($proj?"&amp;component=".$proj:""), "_self", 2);
$Nav->addCustomNav("Contributors", "/modeling/emft/project-info/team.php", "_self", 2);

include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/scripts.php";

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/common.css\"/>\n");
?>
