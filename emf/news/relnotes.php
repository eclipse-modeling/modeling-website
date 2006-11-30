<?php
$pageTitle = "Eclipse Modeling - EMF - Release Notes";

$cvsprojs = array (
	"emf" => "org.eclipse.emf",
	"xsd" => "org.eclipse.xsd"
);

if (isset ($_GET["project"]) && ($_GET["project"] == "emf" || $_GET["project"] == "xsd"))
{
	include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/emf/emf/news/relnotes-common-emf.php";
}

require ($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-common.php");
?>
