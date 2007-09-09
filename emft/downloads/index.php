<?php

require_once ("../../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

/* config */

/* project => sections => (prettyname => filename) */
$dls = array(
	"/compare" => array(
		"Compare" => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	),
	"/jcrm" => array(
		"JCR Management" => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	),
	"/mwe" => array(
		"Model Workflow Engine" => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	),
	"/teneo" => array(
		"Teneo" => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	),
	"/cdo" => array(
		"CDO" => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	),
	"/net4j" => array(
		"Net4j" => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	),
	"/search" => array(
		"Search" => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	)
);

/* list of valid file prefixes for projects who have been renamed  */
/* keys have leading / to match $proj */
$filePre = array(
	"/compare" => array("emft-compare", "emf-compare"),
	"/jcrm" => array("emft-jcrm", "emf-jcrm"),
	"/mwe" => array("emft-mwe", "emf-mwe"),
	"/teneo" => array("emft-teneo", "emf-teneo"),
	"/cdo" => array("emft-cdo", "emf-cdo"),
	"/net4j" => array("emft-net4j", "emf-net4j"),
	"/search" => array("emft-search", "emf-search")
);

/* define showNotes(), $oldrels, doLanguagePacks() in extras-$proj.php (or just extras.php for flat projects) if necessary, downloads-common.php will include them */
/* end config */

if ($isBuildServer) { include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/emft/build/sideitems-common.php"; }
require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/downloads-common.php");

$html = ob_get_contents();
ob_end_clean();

$trans = array_flip($projects);
$pageTitle = "Eclipse Modeling - EMFT - $trans[$projct] - Downloads";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch, Nick Boldt";

# Generate the web page
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
$App->AddExtraHtmlHeader('<link type="application/rss+xml" rel="alternate" title="EMFT '.$trans[$projct].' Build Feed" href="http://www.eclipse.org/downloads/download.php?file=/modeling/emft/feeds/builds-'.$projct.'.xml"/>' . "\n");
//$App->AddExtraHtmlHeader('<link type="application/rss+xml" rel="alternate" title="EMFT '.$trans[$projct].' Build Feed" href="http://www.eclipse.org/downloads/download.php?file=/'.$PR.'/feeds/builds-'.$projct.'.xml"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
