<?php
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
	"/uml2-uml" => array(
		"UML2 UML" => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	),
	"/uml2-ocl" => array(
		"UML2 OCL" => array(
			"SDK (Runtime, Source)" => "SDK",
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	),
	"/uml2-tools" => array(
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
			"Runtime" => "runtime",
			"Examples" => "examples",
			"Automated Tests" => "automated-tests"
		)
	)
);

/* file prefixes - also defines the DL image to use, and image alt tag */
/* keys have leading / to match $proj */
/* for flat projects, use a key of "" (yes, that works) */
$filePre = array(
	"/eodm" => array(
		"emft-eodm",
		"emft-eodm",
		"emft-eodm",
		"emft-eodm"
	),
	"/uml2-uml" => array(
		"uml2",
		"uml2",
		"uml2",
		"uml2"
	),
	"/uml2-ocl" => array(
		"emft-ocl",
		"emft-ocl",
		"emft-ocl",
		"emft-ocl"
	),
	"/uml2-tools" => array(
		"uml2-tools",
		"uml2-tools",
		"uml2-tools",
		"uml2-tools"
	),
	"/xsd" => array(
		"xsd",
		"xsd",
		"xsd",
		"xsd"
	)
);

/* these keys must match the values in $filePre */
$suf = array(
	"emft-eodm" => "eodm",
	"uml2" => "uml2",
	"emft-ocl" => "ocl",
	"uml2-tools" => "uml2-tools",
	"xsd" => "xsd"
);

$rssfeed = "";

$debug = -1;

/* define showNotes(), showArchived(), doLanguagePacks() in extras-$proj.php (or just extras.php for flat projects) if necessary, downloads-common.php will include them */
/* end config */

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/downloads-common.php");

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - MDT - Downloads";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

# Generate the web page
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

/************************** METHODS *****************************************/

/* extra sidebar stuff appended at the bottom */
function sidebar()
{
	global $PR, $isEMFserver;

	if ($isEMFserver)
	{
	?>
	<div class="sideitem">
		<h6>Actions</h6>
		<ul>
			<li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/build.php">New Build</a></li>
			<li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/secure/patch.php">New Test</a></li>
			<li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/secure/promo.php">Promote</a></li>
		</ul>
	</div>

	<div class="sideitem">
		<h6>Info</h6>
		<ul>
			<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=MDT&amp;bug_status=ASSIGNED">Assigned Bugs</a></li>
			<li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/downloads/downloads.php">Download Stats</a></li>
		</ul>
	</div>
	<?php
	}
}
?>
