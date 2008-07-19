<?php

$PR = "modeling";

$isBuildServer = (preg_match("/^(emft|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"]));
$isBuildDotEclipseServer = $_SERVER["SERVER_NAME"] == "build.eclipse.org";
$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$isEclipseCluster = (preg_match("/^(?:www.||download.|download1.|build.)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$writableBuildRoot = $isBuildDotEclipseServer ? "/opt/public/modeling" : "/home/www-data";

if (isset ($_GET["skin"]) && preg_match("/^(Blue|EclipseStandard|Industrial|Lazarus|Miasma|Modern|OldStyle|Phoenix|PhoenixTest|PlainText)$/", $_GET["skin"], $regs))
{
	$theme = $regs[1];
}
else
{
	$theme = "Phoenix";
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/scripts.php";

$Nav->setLinkList(null);
$Nav->addCustomNav("About This Project", "/projects/project_summary.php?projectid=modeling", "_self", 1);
$Nav->addNavSeparator("Modeling", "/modeling/");
$Nav->addCustomNav("EMF", "/modeling/emf/", "_self", 3);
$Nav->addCustomNav("EMFT", "/modeling/emft/", "_self", 3);
$Nav->addCustomNav("GMF", "/modeling/gmf/", "_self", 3);
$Nav->addCustomNav("GMT", "/gmt/", "_self", 3);
$Nav->addCustomNav("MDDi", "/mddi/", "_self", 3);
$Nav->addCustomNav("MDT", "/modeling/mdt/", "_self", 3);
$Nav->addCustomNav("M2M", "/m2m/", "_self", 3);
$Nav->addCustomNav("M2T", "/modeling/m2t/", "_self", 3);
$Nav->addCustomNav("TMF", "/modeling/tmf/", "_self", 3);

$Nav->addNavSeparator("Downloads", "http://www.eclipse.org/modeling/downloads/");
$Nav->addCustomNav("All-In-One Package", "http://www.eclipse.org/downloads/packages/eclipse-modeling-tools-includes-incubating-components/ganymeder", "_self", 2);
$Nav->addCustomNav("Installation", "http://wiki.eclipse.org/Modeling_Project/Installation", "_self", 2);

$Nav->addNavSeparator("Documentation", "http://wiki.eclipse.org/Category:Modeling");
$Nav->addCustomNav("Getting Started", "http://wiki.eclipse.org/Modeling_Documentation", "_self", 2);
$Nav->addCustomNav("Project Plan", "http://wiki.eclipse.org/Modeling_Project_Plan", "_self", 2);
$Nav->addCustomNav("Search CVS", "http://www.eclipse.org/$PR/searchcvs.php?q=days%3A+7", "_self", 2);

$Nav->addNavSeparator("Community", "http://wiki.eclipse.org/Modeling_Corner");
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/Modeling_Project", "_self", 2);
$Nav->addCustomNav("Newsgroups", "http://www.eclipse.org/newsgroups/index_project.php", "_self", 2);
$Nav->addCustomNav("Mailing Lists", "http://www.eclipse.org/mail/index_project.php", "_self", 2);
$Nav->addCustomNav("Modeling Corner", "http://wiki.eclipse.org/Modeling_Corner", "_self", 2);

$bugurl = "https://bugs.eclipse.org";
$collist = "%26query_format%3Dadvanced&amp;column_changeddate=on&amp;column_bug_severity=on&amp;column_priority=on&amp;column_rep_platform=on&amp;column_bug_status=on&amp;column_product=on&amp;column_component=on&amp;column_version=on&amp;column_target_milestone=on&amp;column_short_short_desc=on&amp;splitheader=0";
$Nav->addCustomNav("Open Bugs", "$bugurl/bugs/colchange.cgi?rememberedquery=product%3DModeling%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26bug_status%3DRESOLVED%26resolution%3DFIXED%26resolution%3D---%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id" . $collist, "_self", 2);
$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=Modeling", "_self", 2);

$Nav->addCustomNav("Contributors", "http://www.eclipse.org/$PR/project-info/team.php", "_self", 2);

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/common.css\"/>\n");

$App->Promotion = TRUE; # set true to enable current eclipse.org site-wide promo

?>
