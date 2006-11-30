<?php

$pageTitle = "Eclipse Modeling - MDT - Release Notes";

/* projects/components in cvs */
/* "proj" => "cvsname" */
$cvsprojs = array (
	"uml2-uml" => "org.eclipse.uml2",
	"xsd" => "org.eclipse.xsd"
);

/* sub-projects/components in cvs for projects/components above (if any) */
/* "cvsname" => array("shortname" => "cvsname") */
$cvscoms = array (
	"org.eclipse.emft" => array (
		"uml2-ocl" => "ocl",
		"eodm" => "eodm"
	)
);

if (isset ($_GET["project"]) && $_GET["project"] == "xsd")
{
	include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/mdt/xsd/news/relnotes-common-xsd.php";
}

require ($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-common.php");
?>
