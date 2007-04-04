<?php

require_once ("../../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

/* temporary redirect for emft projects */
if (isset($_GET["project"]) && in_array($_GET["project"],$emft_redirects))
{
	header("Location: http://www.eclipse.org/emft/downloads/?project=" . $_GET["project"]);
	exit;
}
else if (isset($_GET["project"]) && $_GET["project"]=="sdo")
{
	$_GET["project"]="emf"; /* special case */
}
ob_start();

/* config */

/* project => sections => (prettyname => filename) */
$dls = array(
	"/emf" => array(
		"EMF, SDO, and XSD" => array(
			"SDK (runtimes, source, docs)" => "SDK",
			"Standalone" => "Standalone",
			"Models" => "Models",
			"Automated Tests" => "Automated-Tests",
			"Examples" => "Examples"
		),
		"EMF and SDO" => array(
			"SDK (runtime, source, docs)" => "SDK",
			"Runtimes" => "runtime"
		),
		"XSD" => array(
			"SDK (runtime, source, docs)" => "SDK",
			"Runtime" => "runtime"
		)
	)
);

/* list of valid file prefixes for projects who have been renamed  */
/* keys have leading / to match $proj */
$filePre = array(
	"/emf" => array("emf-sdo-xsd", "emf-sdo", "xsd")
);
/* alternate method for specifying prefixes - static list */
$filePreStatic = array( 
	"emf-sdo-xsd",
	"emf-sdo-xsd",
	"emf-sdo-xsd",
	"emf-sdo-xsd",
	"emf-sdo-xsd",
	"emf-sdo",
	"emf-sdo",
	"xsd",
	"xsd"
);


/* define showNotes(), $oldrels, doLanguagePacks() in extras-$proj.php (or just extras.php for flat projects) if necessary, downloads-common.php will include them */
/* end config */

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/downloads-common.php");

$html = ob_get_contents();
ob_end_clean();

$trans = array_flip($projects);
$pageTitle = "Eclipse Modeling - ".(false===strpos($trans[$projct],"EMF")?"EMF ":"").$trans[$projct]." - Downloads";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch, Nick Boldt";

# Generate the web page
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
$App->AddExtraHtmlHeader('<link type="application/rss+xml" rel="alternate" title="'.(false===strpos($trans[$projct],"EMF")?"EMF ":"").$trans[$projct].' Build Feed" href="http://www.eclipse.org/downloads/download.php?file=/'.$PR.'/feeds/builds-'.$projct.'.xml"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
