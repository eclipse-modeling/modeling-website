<?php
$Nav->setLinkList(null);

$PR = $PR == "technology/emft" ? $PR : "modeling/emft"; # override for when using old repo

$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
$isBuildServer = (preg_match("/^(emft|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"])) || $isEMFserver;
$isBuildDotEclipseServer = $_SERVER["SERVER_NAME"] == "build.eclipse.org";
$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$isEclipseCluster = (preg_match("/^(?:www.||download.|download1.|build.)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$debug = (isset ($_GET["debug"]) && preg_match("/^\d+$/", $_GET["debug"]) ? $_GET["debug"] : -1);
$writableRoot = ($isBuildServer ? $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/" : "/home/data/httpd/writable/www.eclipse.org/");
$writableBuildRoot = $isBuildDotEclipseServer ? "/opt/public/modeling" : "/home/www-data";

$rooturl = "http://www.eclipse.org/emft";
$downurl = ($isBuildServer ? "/emft" : "http://www.eclipse.org/emft");
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
	"JET" => "jet",
	"JET Editor" => "jeteditor",
	"Compare" => "compare",
	"JCR Management" => "jcrm",
	"CDO" => "cdo",
	"Net4j" => "net4j",
	"Teneo" => "teneo",
	"Query" => "query",
	"Transaction" => "transaction",
	"Validation" => "validation",
	"Coordinated All-In-One" => "coordinated",
	/* moved, shuffle to bottom */
	"EODM" => "eodm",
	"OCL" => "ocl"
);

$cvsprojs = array();

/* sub-projects/components in cvs for projects/components above (if any) */
/* "cvsname" => array("shortname" => "cvsname") */
$cvscoms = array(
	"org.eclipse.emft" => array(
		"jet" => "jet",
		"jeteditor" => "jeteditor",
		"cdo" => "cdo",
		"net4j" => "net4j",
		"teneo" => "teneo",
		"query" => "query",
		"transaction" => "transaction",
		"validation" => "validation",
		"coordinated" => "coordinated"
	),
	"org.eclipse.emf" => array (
		"compare" => "org.eclipse.emf.compare",
		"jcrm" => "org.eclipse.emf.jcrm"
	)
	
);

$bugcoms = array_flip($projects);
$bugcoms = preg_replace("/ /", "%20", $bugcoms);

$extraprojects = array(
	"JCR Management" => "jcrm",
	"Coordinated All-In-One" => "coordinated"); //components with only downloads, no info yet, "prettyname" => "directory"
$nodownloads = array("coordinated","jcrm","compare"); //components  with only information, no downloads, or no builds available yet, "projectkey"
$nonewsgroup = array (); //components  without newsgroup
$nomailinglist = array (); //components  without mailinglist
$incubating = array("cdo","eodm","jet","jeteditor","net4j","teneo","jcrm","compare"); // components which are still incubating
$hasmoved = array("eodm" => "mdt", "ocl" => "mdt"); // components which have moved, and to where
$nomenclature = "Component"; //are we dealing with "components" or "projects"?

$regs = null;
$proj = (isset ($_POST["build_Project"]) && preg_match("/^(" . join("|", $projects) . ")$/", $_POST["build_Project"], $regs)) ? 
	$regs[1] : (isset ($_GET["project"]) && preg_match("/^(" . join("|", $projects) . ")$/", $_GET["project"], $regs) ? 
		$regs[1] : (preg_match("#/emft/projects/(.+)/index.php#", $_SERVER["SCRIPT_NAME"], $regs) ? 
			$regs[1] : ""));


$Nav->addNavSeparator("EMFT", "$rooturl/");
foreach (array_keys($projects) as $z)
{
	if (!in_array($projects[$z],$extraprojects)) 
	{
		if (!array_key_exists($projects[$z],$hasmoved))
		{
			$Nav->addCustomNav($z, "$rooturl/projects/$projects[$z]/", "_self", 2);				
		} 
		else
		{
			$Nav->addCustomNav($z, "http://www.eclipse.org/modeling/" . $hasmoved[$projects[$z]] . "/?project=" . $projects[$z], "_self", 2);
		}
	}
}

if (!array_key_exists($proj,$hasmoved))
{
	$Nav->addNavSeparator("Downloads", "$downurl/downloads/?project=" . $proj);
	$Nav->addCustomNav("Update Manager", "$rooturl/updates/", "_self", 2);
}
else
{
	$Nav->addNavSeparator("Downloads", "http://www.eclipse.org/modeling/" . $hasmoved[$proj] . "/downloads/?project=" . $proj);
	$Nav->addCustomNav("Update Manager", "http://www.eclipse.org/modeling/" . $hasmoved[$proj] . "/updates/", "_self", 2);
}

if (!array_key_exists($proj,$hasmoved))
{
	$Nav->addNavSeparator("Documentation", "http://wiki.eclipse.org/index.php/EMFT");
	$Nav->addCustomNav("Release Notes", "http://www.eclipse.org/modeling/emft/news/relnotes.php?project=" . ($proj?$proj:"teneo") . "&amp;version=HEAD", "_self", 2);
	$Nav->addCustomNav("Search CVS", "http://www.eclipse.org/modeling/emft/searchcvs.php?q=file%3A+org.eclipse.emft%2F" . ($proj?$proj."%2F":$proj) . "+days%3A+7", "_self", 2);
} 
else
{
	$Nav->addNavSeparator("Documentation", "http://www.eclipse.org/modeling/" . $hasmoved[$proj] . "/docs.php?project=$proj");
	$Nav->addCustomNav("Release Notes", "http://www.eclipse.org/modeling/" . $hasmoved[$proj] . "/news/relnotes.php?project=" . $proj . "&amp;version=HEAD", "_self", 2);
	$Nav->addCustomNav("Search CVS", "http://www.eclipse.org/modeling/" . $hasmoved[$proj] . "/searchcvs.php?q=file%3A+org.eclipse.mdt%2Forg.eclipse.".$proj."%2F+days%3A+7", "_self", 2);
}

$Nav->addNavSeparator("Community", "http://wiki.eclipse.org/index.php/Modeling_Corner");

if (!array_key_exists($proj,$hasmoved))
{
	$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/index.php/EMFT", "_self", 2);
	$Nav->addCustomNav("Newsgroup", "http://www.eclipse.org/modeling/emft/newsgroup-mailing-list.php", "_self", 2);
} 
else
{
	$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/index.php/".($proj?"MDT-" . strtoupper($proj):"Model_Development_Tools_%28MDT%29"), "_self", 2);
	$Nav->addCustomNav("Newsgroups", "http://www.eclipse.org/modeling/" . $hasmoved[$proj] . "/newsgroup-mailing-list.php", "_self", 2);
}

$Nav->addCustomNav("Modeling Corner", "http://wiki.eclipse.org/index.php/Modeling_Corner", "_self", 2);

$collist = "%26query_format%3Dadvanced&amp;column_changeddate=on&amp;column_bug_severity=on&amp;column_priority=on&amp;column_rep_platform=on&amp;column_bug_status=on&amp;column_product=on&amp;column_component=on&amp;column_version=on&amp;column_target_milestone=on&amp;column_short_short_desc=on&amp;splitheader=0";
if (!array_key_exists($proj,$hasmoved))
{
	$Nav->addCustomNav("Open Bugs", "$bugurl/bugs/colchange.cgi?rememberedquery=product%3DEMFT%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id" . $collist, "_self", 2);
	$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=EMFT", "_self", 2);
	$Nav->addCustomNav("Contributors", "$rooturl/eclipse-project-ip-log.csv", "_self", 2);
} 
else
{
	$Nav->addCustomNav("Open Bugs", "$bugurl/bugs/colchange.cgi?rememberedquery=product%3DMDT" . (isset ($bugcoms[$proj]) ? "%26component=$bugcoms[$proj]" : "") . "%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id" . $collist, "_self", 2);
	$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=MDT" . (isset ($bugcoms[$proj]) ? "&amp;component=$bugcoms[$proj]" : ""), "_self", 2);
	$Nav->addCustomNav("Contributors", "http://www.eclipse.org/modeling/" . $hasmoved[$proj] . "/eclipse-project-ip-log.csv", "_self", 2);
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/scripts.php";
?>
