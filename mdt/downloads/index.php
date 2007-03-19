<?php
$_SERVER['DOCUMENT_ROOT'] = $_SERVER["SERVER_NAME"] == "build.eclipse.org" ? "/opt/public/modeling" : $_SERVER['DOCUMENT_ROOT'];
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

/* config */

/* project => sections => (prettyname => filename) */
$dls = array(
	"/eodm" => array(
		"EODM" => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	),
	"/uml2" => array(
		"UML2" => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => array("-runtime",""), // multiple prefixes supported
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	),
	"/ocl" => array(
		"OCL" => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests",
			"Stand-alone" => "standalone"
		)
	),
	"/uml2tools" => array(
		"UML2 Tools" => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	),
	"/xsd" => array(
		"XSD" => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime" //,
			//"Examples" => "examples",
			//"Automated Tests" => "automated-tests"
		)
	)
);

/* list of valid file prefixes for projects who have been renamed  */
/* keys have leading / to match $proj */
$filePre = array(
	"/eodm" => array("emft-eodm","mdt-eodm"),
	"/uml2" => array("uml2","mdt-uml2"),
	"/ocl" => array("emft-ocl","mdt-ocl"),
	"/uml2tools" => array("mdt-uml2tools"),
	"/xsd" => array("xsd","mdt-xsd")
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
$App->AddExtraHtmlHeader('<link type="application/rss+xml" rel="alternate" title="MDT '.$trans[$projct].' Build Feed" href="http://www.eclipse.org/downloads/download.php?file=/'.$PR.'/feeds/builds-'.$projct.'.xml"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
