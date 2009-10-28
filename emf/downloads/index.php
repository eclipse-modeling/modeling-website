<?php

require_once ("../../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

/* temporary redirect for emft projects, except on build servers if downloads folder exists */
if (isset($_GET["project"]) && isset($emft_redirects) && is_array($emft_redirects) && in_array($_GET["project"],$emft_redirects))
{
	header("Location: http://www.eclipse.org/emft/downloads/?project=" . $_GET["project"]);
	exit;
}
else if (isset($_GET["project"]) && $_GET["project"]=="sdo")
{
	$_GET["project"]="emf"; /* special case */
}
ob_start();

/* zips that are allowed to be absent from the downloads page (eg., new ones added/removed mid-stream) */
$extraZips = array(
	"emf-xsd-Update",
	"emf-xsd-SDK", 
	"emf-xsd-Models", 
	"emf-xsd-Automated-Tests", 
	"emf-xsd-Examples", # new 2.5.0M4 x 5
	
	"emf-sdo-xsd-Update",
	"emf-sdo-xsd-SDK", 
	"emf-sdo-xsd-Standalone",
	"emf-sdo-xsd-Models", 
	"emf-sdo-xsd-Automated-Tests", 
	"emf-sdo-xsd-Examples", 
						# deprecated 2.5.0M4 x 6
	
	"emf-sdo-SDK", 
	"emf-sdo-runtime", 	# deprecated 2.5.0M4 x 2

	"emf-runtime", 
	"emf-sourcedoc", 	# new 2.4.0M5 x 2
	
	"sdo-runtime", 
	"sdo-sourcedoc", 	# deprecated 2.5.0M4 x 2

	"xsd-SDK", 			# deprecated 2.4.0M5
	"xsd-sourcedoc", 	# new EMF 2.4.0M5 x 2
	"sdo-runtime",		
	"sdo-sourcedoc",  	# new EMF 2.4.0M5 x 2
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
	"/query2" => array(
		"Model Query 2 (Incubating)" => array( # same as value in _projectCommon.php's $projects array
			"<acronym title=\"Click to download archived All-In-One p2 Repo Update Site\"><img alt=\"Click to download archived All-In-One p2 Repo Update Site\" src=\"/modeling/images/dl-icon-update-zip.gif\"/> <b style=\"color:green\">All-In-One Update Site</b></acronym>" => "Update",
			"SDK (Runtime, Source)" => "SDK",
			"Automated Tests" => "Automated-Tests"
		)
	),
	"/teneo" => array(
		"Teneo Hibernate" => array( # same as value in _projectCommon.php's $projects array
			"<acronym title=\"Click to download archived All-In-One p2 Repo Update Site\"><img alt=\"Click to download archived All-In-One p2 Repo Update Site\" src=\"/modeling/images/dl-icon-update-zip.gif\"/> <b style=\"color:green\">All-In-One Update Site</b></acronym>" => "Update",
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests (Hibernate and EclipseLink)" => "automated-tests"
		),
		"Teneo EclipseLink" => array( # same as value in _projectCommon.php's $projects array
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples"
		)
	),
	"/emf" => array(
		"EMF and XSD" => array(
			"<acronym title=\"Click to download archived All-In-One p2 Repo Update Site\"><img alt=\"Click to download archived All-In-One p2 Repo Update Site\" src=\"/modeling/images/dl-icon-update-zip.gif\"/> <b style=\"color:green\">All-In-One Update Site</b></acronym>" => "Update",
			"<img alt=\"All-In-One SDK Zip\" src=\"/modeling/images/dl-icon-aio-sdk.gif\"/> All-In-One SDK (Runtime, Source, Doc)" => "SDK",
			"Models" => "Models",					
			"Automated Tests" => "Automated-Tests",
			"Examples" => "Examples"
		),
		"EMF, SDO, and XSD" => array(
			"<acronym title=\"Click to download archived All-In-One p2 Repo Update Site\"><img alt=\"Click to download archived All-In-One p2 Repo Update Site\" src=\"/modeling/images/dl-icon-update-zip.gif\"/> <b style=\"color:green\">All-In-One Update Site</b></acronym>" => "Update",
			"<img alt=\"All-In-One SDK Zip\" src=\"/modeling/images/dl-icon-aio-sdk.gif\"/> All-In-One SDK (Runtime, Source, Doc)" => "SDK",	# deprecated EMF 2.5.0M4
			"Standalone" => "Standalone",			# deprecated EMF 2.3.0
			"Models" => "Models",					# deprecated EMF 2.5.0M4
			"Automated Tests" => "Automated-Tests",	# deprecated EMF 2.5.0M4
			"Examples" => "Examples"				# deprecated EMF 2.5.0M4
		),
		"EMF and SDO" => array(
			"SDK (Runtime, Source, Doc)" => "SDK", 	# deprecated EMF 2.4.0M5
			"Runtimes" => "runtime",				# deprecated EMF 2.4.0M5
		),
		"EMF" => array(
			"EMF Runtime" => "runtime",				# new EMF 2.4.0M5
			"EMF Sources + Docs" => "sourcedoc",	# new EMF 2.4.0M5
		),
		"SDO" => array(
			"SDO Runtime" => "runtime",				# deprecated EMF 2.5.0M4
			"SDO Sources + Docs" => "sourcedoc",	# deprecated EMF 2.5.0M4
		),
		"XSD" => array(
			"SDK (Runtime, Source, Doc)" => "SDK",	# deprecated EMF 2.4.0M5
			"Runtime" => "runtime",
			"Sources + Docs" => "sourcedoc",		# new EMF 2.4.0M5
		)
	),
);

/* list of valid file prefixes for projects who have been renamed; keys have leading / to match $proj */
/* only required if using something other than the default; otherwise will be generated */
$filePre = array(
	/* "/newproj" => array("emft-newproj", "emf-newproj"), */
	"/emf" => array("emf-sdo-xsd", "emf-sdo", "emf", "sdo", "xsd"),
	"/teneo" => array("emft-teneo","emf-teneo"),
	"/cdo" => array("emft-cdo","emf-cdo"),
	"/compare" => array("emft-compare","emf-compare"),
	"/net4j" => array("emft-net4j","emf-net4j"),
);
/* alternate method for specifying prefixes - static list */
$filePreStatic = array(
	"/teneo" => array(
		"emf-teneo",
		"emf-teneo",
		"emf-teneo",
		"emf-teneo",
		"emf-teneo",

		"emf-teneo-eclipselink",
		"emf-teneo-eclipselink",
		"emf-teneo-eclipselink"
	),
	"/emf" => array(
		"emf-xsd",
		"emf-xsd",
		"emf-xsd",
		"emf-xsd",
		"emf-xsd",

		"emf-sdo-xsd",	# deprecated EMF 2.5.0M4
		"emf-sdo-xsd",	# deprecated EMF 2.5.0M4
		"emf-sdo-xsd",	# deprecated EMF 2.3.0
		"emf-sdo-xsd",	# deprecated EMF 2.5.0M4
		"emf-sdo-xsd",	# deprecated EMF 2.5.0M4
		"emf-sdo-xsd",	# deprecated EMF 2.5.0M4
		
		"emf-sdo",		# deprecated EMF 2.4.0M5
		"emf-sdo",		# deprecated EMF 2.4.0M5
		
		"emf",			# new EMF 2.4.0M5
		"emf",			# new EMF 2.4.0M5

		"sdo",			# new EMF 2.4.0M5, deprecated EMF 2.5.0M4
		"sdo",			# new EMF 2.4.0M5, deprecated EMF 2.5.0M4
		
		"xsd",			# deprecated EMF 2.4.0M5
		"xsd",			# new EMF 2.4.0M5
		"xsd"
	)
);

/* define showNotes(), $oldrels, doLanguagePacks() in extras-$proj.php (or just extras.php for flat projects) if necessary, downloads-common.php will include them */
/* end config */

if ($isBuildServer) { include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/emf/build/sideitems-common.php"; }
require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/downloads-common.php");

$html = ob_get_contents();
ob_end_clean();

$trans = array_flip($projects);
$pageTitle = "Eclipse Modeling - " . (false===strpos($trans[$projct], "EMF") ? "EMF " : "") . $trans[$projct] . " - Downloads";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch, Nick Boldt";

# Generate the web page
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
if ($projct)
{
	$App->AddExtraHtmlHeader('<link type="application/rss+xml" rel="alternate" title="' . (false===strpos($trans[$projct], "EMF") ? "EMF - " : "") . $trans[$projct] . ' Build Feed" href="http://www.eclipse.org/modeling/download.php?file=/' . $PR . '/feeds/builds-' . $projct . '.xml"/>' . "\n");
}
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
