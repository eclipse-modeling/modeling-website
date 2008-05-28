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
	"emf-sdo-xsd-Standalone", # deprecated
	"emf-sdo-xsd-Models", # new
	"emf-sdo-SDK", "xsd-SDK", # deprecated x 2
	"emf-sdo-runtime", # deprecated
	"emf-runtime", "sdo-runtime", # new EMF 2.4.0M5 x 2
	"emf-sourcedoc", "sdo-sourcedoc", "xsd-sourcedoc", # new EMF 2.4.0M5 x 3
);

/* config */

/* $project => sections/Project Name => (prettyname => filename) */
/* only required if using something other than the default 4; otherwise will be generated */
$dls = array(
	/*"/newProj" => array(
		"Project Name" => array( # same as value in _projectCommon.php's $projects array
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	),*/
	"/emf" => array(
		"EMF, SDO, and XSD" => array(
			"<b style=\"color:green\">All-In-One SDK</b> (Runtime, Source, Doc)" => "SDK",
			"Standalone" => "Standalone",			# deprecated EMF 2.3.0
			"Models" => "Models",
			"Automated Tests" => "Automated-Tests",
			"Examples" => "Examples"
		),
		"EMF and SDO" => array(
			"SDK (Runtime, Source, Doc)" => "SDK", 	# deprecated EMF 2.4.0M5
			"Runtimes" => "runtime",					# deprecated EMF 2.4.0M5
			"EMF Sources + Docs" => "sourcedoc",		# new EMF 2.4.0M5
			"EMF Runtime" => "runtime",					# new EMF 2.4.0M5
			"SDO Sources + Docs" => "sourcedoc",		# new EMF 2.4.0M5
			"SDO Runtime" => "runtime"					# new EMF 2.4.0M5
		),
		"XSD" => array(
			"SDK (Runtime, Source, Doc)" => "SDK",	# deprecated EMF 2.4.0M5
			"Sources + Docs" => "sourcedoc",		# new EMF 2.4.0M5
			"Runtime" => "runtime"
		)
	),
);

/* list of valid file prefixes for projects who have been renamed; keys have leading / to match $proj */
/* only required if using something other than the default; otherwise will be generated */
$filePre = array(
	/* "/newproj" => array("emft-newproj", "emf-newproj"), */
	"/emf" => array("emf-sdo-xsd", "emf-sdo", "emf", "sdo", "xsd"),
);
/* alternate method for specifying prefixes - static list */
$filePreStatic = array(
	"/emf" => array(
		"emf-sdo-xsd",
		"emf-sdo-xsd",	# deprecated EMF 2.3.0
		"emf-sdo-xsd",
		"emf-sdo-xsd",
		"emf-sdo-xsd",
		"emf-sdo",		# deprecated EMF 2.4.0M5
		"emf-sdo",		# deprecated EMF 2.4.0M5
		"emf",			# new EMF 2.4.0M5
		"emf",			# new EMF 2.4.0M5
		"sdo",			# new EMF 2.4.0M5
		"sdo",			# new EMF 2.4.0M5
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
	$App->AddExtraHtmlHeader('<link type="application/rss+xml" rel="alternate" title="' . (false===strpos($trans[$projct], "EMF") ? "EMF - " : "") . $trans[$projct] . ' Build Feed" href="http://www.eclipse.org/downloads/download.php?file=/' . $PR . '/feeds/builds-' . $projct . '.xml"/>' . "\n");
}
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
