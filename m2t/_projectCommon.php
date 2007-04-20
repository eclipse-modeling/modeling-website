<?php

$Nav->setLinkList(null);

$PR = "modeling/m2t";

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
$cvsprojs = array (
	"xsd" => "org.eclipse.xsd"
);

/* sub-projects/components in cvs for projects/components above (if any) */
/* "cvsname" => array("shortname" => "cvsname") */
$cvscoms = array (
	"org.eclipse.emft" => array (
		"jet" => "jet",
		"jeteditor" => "jeteditor"
	),
	"org.eclipse.m2t" => array (
		"jet" => "org.eclipse.jet",
		/* add more here */
	)
);

$projects = array (
	"JET" => "jet",
	"MTL" => "mtl",
	"Xpand" => "xpand",
	"M2T Core" => "m2tcore",
	"M2T Shared" => "m2tshared"
);

$level = array (
	"jet" => 2,
	"mtl" => 2,
	"xpand" => 2,
	"m2tcore" => 2,
	"m2tshared" => 2
);

/* TODO: 
 * 		remove from $emft_redirects (don't bounce to emft) 
 * 		& from $extraprojects (show on homepage) 
 * 		when builds are ready
 * 
 * 		when/if newsgroups move, remove from $nomailinglist and $nonewsgroup; 
 * 		if don't move, will probably have to hack newsgroup-mailing-list.php to point to emft newsgroup(s)
 * 
 * 		also, update links in build-common.php
 */
$emft_redirects = $isBuildServer ? null : array("jet");
$extraprojects = array (); //projects with only downloads, no info yet, "prettyname" => "directory"
$nodownloads = array ("jet","mtl","xpand","m2tcore","m2tshared"); //projects with only information, no downloads, or no builds available yet, "projectkey"
$nonewsgroup = array ("jet","mtl","xpand","m2tcore","m2tshared"); //projects without newsgroup
$nomailinglist = array ("jet","mtl","xpand","m2tcore","m2tshared"); //projects without mailinglist
$incubating = array("jet","mtl","xpand","m2tcore","m2tshared"); // projects which are still incubating

$nomenclature = "Component"; //are we dealing with "components" or "projects"?

$regs = null;
$proj = (isset ($_GET["project"]) && preg_match("/^(" . join("|", $projects) . ")$/", $_GET["project"], $regs) ? $regs[1] : "");

$Nav->addNavSeparator("M2T", "$rooturl/");
foreach (array_keys($projects) as $z)
{
	$Nav->addCustomNav($z, "$rooturl/?project=$projects[$z]", "_self", $level[$projects[$z]]);
}

$bugcoms = array_flip($projects);
$bugcoms = preg_replace("/ /", "%20", $bugcoms);

$buildtypes = array(
	"R" => "Release",
	"S" => "Stable",
	"I" => "Integration",
	"M" => "Maintenance",
	"N" => "Nightly"
);

$Nav->addNavSeparator("Downloads", "$downurl/$PR/downloads/?project=$proj");
$Nav->addCustomNav("Update Manager", "$rooturl/updates/", "_self", 2);

$Nav->addNavSeparator("Documentation", "$rooturl/docs.php?project=$proj");
$Nav->addCustomNav("FAQ", "$rooturl/faq.php?project=$proj", "_self", 2);
$Nav->addCustomNav("Plan", "http://wiki.eclipse.org/index.php/M2T_Plan_1.0", "_self", 2);

$Nav->addCustomNav("Release Notes", "http://www.eclipse.org/$PR/news/relnotes.php?project=$proj&amp;version=HEAD", "_self", 2);
$Nav->addCustomNav("Search CVS", "http://www.eclipse.org/$PR/searchcvs.php?q=file%3A+org.eclipse.m2t%2F" . ($proj?"org.eclipse.".$proj."%2F":"") . "+days%3A+7", "_self", 2);

$Nav->addNavSeparator("Community", "http://wiki.eclipse.org/index.php/Modeling_Corner");
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/index.php/".($proj?"M2T-" . strtoupper($proj):"Model_to_Text_%28M2T%29"), "_self", 2);
$Nav->addCustomNav("Newsgroups", "$rooturl/newsgroup-mailing-list.php", "_self", 2);
$Nav->addCustomNav("Modeling Corner", "http://wiki.eclipse.org/index.php/Modeling_Corner", "_self", 2);
$collist = "%26query_format%3Dadvanced&amp;column_changeddate=on&amp;column_bug_severity=on&amp;column_priority=on&amp;column_rep_platform=on&amp;column_bug_status=on&amp;column_product=on&amp;column_component=on&amp;column_version=on&amp;column_target_milestone=on&amp;column_short_short_desc=on&amp;splitheader=0";
$Nav->addCustomNav("Open Bugs", "$bugurl/bugs/colchange.cgi?rememberedquery=product%3DM2T" . (isset ($bugcoms[$proj]) ? "%26component=$bugcoms[$proj]" : "") . "%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id" . $collist, "_self", 2);
$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=M2T" . (isset ($bugcoms[$proj]) ? "&amp;component=$bugcoms[$proj]" : ""), "_self", 2);
$Nav->addCustomNav("Contributors", "$rooturl/eclipse-project-ip-log.csv", "_self", 2);

unset ($bugcoms);

include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/scripts.php";
?>
