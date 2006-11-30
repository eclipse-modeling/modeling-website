<?php

	$debug = (isset($_GET["debug"]) && preg_match("/^\d+$/", $_GET["debug"]) ? $_GET["debug"] : -1);
  
	if (isset($_GET["skin"]) && preg_match("/^(Blue|EclipsStandard|Industrial|Lazarus|Miasma|OldStyle|Phoenix|PlainText)$/", $_GET["skin"], $regs))
	{
		$theme = $regs[1];
	}
	else
	{
		$theme = "Phoenix";
	}

	$Nav->setLinkList(null);

	$rooturl = "http://www.eclipse.org/emft";
	$downurl = (preg_match("/^(emf\.torolab\.ibm\.com|emft.eclipse.org)$/", $_SERVER["SERVER_NAME"], $regs) ? "http://$regs[1]/emft" : "http://www.eclipse.org/emft");
	$bugurl = "https://bugs.eclipse.org";

	$projects = array(
		"CDO" => "cdo",
		"EODM" => "eodm",
		"JET" => "jet",
		"JET Editor" => "jeteditor",
		"Net4j" => "net4j",
		"OCL" => "ocl",
		"Query" => "query",
		"Teneo" => "teneo",
		"Transaction" => "transaction",
		"Validation" => "validation"
	);

	$extraprojects = array(); //projects with only downloads, no info yet, "prettyname" => "directory"
	$nodownloads = array(); //projects with only information, no downloads, or no builds available yet, "projectkey"
	$nomenclature = "Component"; //are we dealing with "components" or "projects"?
	
	$regs = null;
	$proj = (isset($_POST["build_Project"]) && preg_match("/^(" . join("|", $projects) . ")$/", $_POST["build_Project"], $regs)) ? $regs[1] :
			(isset($_GET["project"]) && preg_match("/^(" . join("|", $projects) . ")$/", $_GET["project"], $regs) ? $regs[1] :
			"");

	$PR = "modeling/emft";
	
	$Nav->addNavSeparator("EMFT", "$rooturl/");
	foreach (array_keys($projects) as $z)
	{
		$Nav->addCustomNav($z, "$rooturl/projects/$projects[$z]/?project=$projects[$z]#$projects[$z]", "_self", 2);
	}

	$Nav->addNavSeparator("Downloads", "$downurl/downloads/?project=" . $proj);
	$Nav->addCustomNav("Update Manager", "$rooturl/updates/", "_self", 2);
	
	$Nav->addNavSeparator("Documentation", "http://wiki.eclipse.org/index.php/EMFT");
	$Nav->addCustomNav("Release Notes", "http://www.eclipse.org/modeling/emft/news/relnotes.php?project=" . $proj, "_self", 2);
	$Nav->addCustomNav("Search CVS", "http://www.eclipse.org/modeling/emft/searchcvs.php?q=file%3A+org.eclipse.emft%2F" . $proj . "+days%3A+7", "_self", 2);

	$Nav->addNavSeparator("Community", "http://wiki.eclipse.org/index.php/Modeling_Corner");
	$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/index.php/EMFT", "_self", 2);
	$Nav->addCustomNav("Newsgroup", "news://news.eclipse.org/eclipse.technology.emft", "_self", 2);
	$Nav->addCustomNav("Modeling Corner", "http://wiki.eclipse.org/index.php/Modeling_Corner", "_self", 2);
	$collist = "%26query_format%3Dadvanced&amp;column_changeddate=on&amp;column_bug_severity=on&amp;column_priority=on&amp;column_rep_platform=on&amp;column_bug_status=on&amp;column_product=on&amp;column_component=on&amp;column_version=on&amp;column_target_milestone=on&amp;column_short_short_desc=on&amp;splitheader=0";
	$Nav->addCustomNav("Open Bugs", "$bugurl/bugs/colchange.cgi?rememberedquery=product%3DEMFT%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id" . $collist, "_self", 2);
	$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=EMFT", "_self", 2);
	$Nav->addCustomNav("Contributors", "$rooturl/eclipse-project-ip-log.csv", "_self", 2);

	include_once $_SERVER["DOCUMENT_ROOT"] . "/emft/includes/scripts.php"; 
?>
