<?php
require_once ("../../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

/* zips that are allowed to be absent from the downloads page (eg., new ones added mid-stream) */
$extraZips = array(
	"mdt-ocl-standalone",
	"xsd-SDK", # deprecated
	"xsd-sourcedoc", # new EMF 2.4.0M5 x 3
);

/* config */

/* $project => sections/Project Name => (prettyname => filename) */
/* only required if using something other than the default 4; otherwise will be generated */
$dls = array(
	/*"/newProj" => array(
		"Project Name" => array( # same as value in _projectCommon.php's $projects array
			"<acronym title=\"Click to download archived All-In-One p2 Repo Update Site\"><img alt=\"Click to download archived All-In-One p2 Repo Update Site\" src=\"/modeling/images/dl-icon-update-zip.gif\"/> <b style=\"color:green\">All-In-One Update Site</b></acronym>" => "Update",
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	),*/
	"/uml2" => array(
		"UML2" => array(
			"<acronym title=\"Click to download archived All-In-One p2 Repo Update Site\"><img alt=\"Click to download archived All-In-One p2 Repo Update Site\" src=\"/modeling/images/dl-icon-update-zip.gif\"/> <b style=\"color:green\">All-In-One Update Site</b></acronym>" => "Update",
			"SDK (Runtime, Source, Examples)" => "SDK",
			"Runtime" => array("-runtime",""), // multiple prefixes supported
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	),
	"/ocl" => array(
		"OCL" => array(
			"<acronym title=\"Click to download archived All-In-One p2 Repo Update Site\"><img alt=\"Click to download archived All-In-One p2 Repo Update Site\" src=\"/modeling/images/dl-icon-update-zip.gif\"/> <b style=\"color:green\">All-In-One Update Site</b></acronym>" => "Update",
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests",
			"Stand-alone" => "standalone"
		)
	),
	"/xsd" => array(
		"XSD" => array(
			"<acronym title=\"Click to download archived All-In-One p2 Repo Update Site\"><img alt=\"Click to download archived All-In-One p2 Repo Update Site\" src=\"/modeling/images/dl-icon-update-zip.gif\"/> <b style=\"color:green\">All-In-One Update Site</b></acronym>" => "Update",
			"<acronym title=\"Click to download archived All-In-One p2 Repo Update Site\"><img alt=\"Click to download archived All-In-One p2 Repo Update Site\" src=\"/modeling/images/dl-icon-update-zip.gif\"/> <b style=\"color:green\">All-In-One Update Site</b></acronym>" => "Update",
			"SDK (Runtime, Source, Doc)" => "SDK",	# deprecated EMF 2.4.0M5
			"Sources + Docs" => "sourcedoc",		# new EMF 2.4.0M5
			"Runtime" => "runtime" //,
			//"Examples" => "examples",
			//"Automated Tests" => "automated-tests"
		)
	)
);

/* list of valid file prefixes for projects who have been renamed; keys have leading / to match $proj */
/* only required if using something other than the default; otherwise will be generated */
$filePre = array(
	/* "/newproj" => array("mdt-newproj"), */
	"/eodm" => array("emft-eodm","mdt-eodm"),
	"/uml2" => array("uml2","mdt-uml2"),
	"/ocl" => array("emft-ocl","mdt-ocl"),
	"/xsd" => array("xsd","mdt-xsd")
);

$filePreStatic = array(
	"/xsd" => array(
		"emf-xsd",		# new EMF 2.4.0M5
		"emf-sdo-xsd",	# deprecated EMF 2.4.0M5
		"xsd",			# deprecated EMF 2.4.0M5
		"xsd",			# new EMF 2.4.0M5
		"xsd"
	)
);

/* define showNotes(), $oldrels, doLanguagePacks() in extras-$proj.php (or just extras.php for flat projects) if necessary, downloads-common.php will include them */
/* end config */

if ($isBuildServer) { include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/mdt/build/sideitems-common.php"; }
require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/downloads-common.php");

$html = ob_get_contents();
ob_end_clean();

$trans = array_flip($projects);
$pageTitle = "Eclipse Modeling - MDT - $trans[$projct] - Downloads";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch, Nick Boldt";

# Generate the web page
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
$App->AddExtraHtmlHeader('<link type="application/rss+xml" rel="alternate" title="MDT '.$trans[$projct].' Build Feed" href="http://www.eclipse.org/modeling/download.php?file=/'.$PR.'/feeds/builds-'.$projct.'.xml"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
