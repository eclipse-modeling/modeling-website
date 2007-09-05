<?php
require_once ("../../includes/buildServer-common.php");

$pageTitle = "Eclipse Modeling - EMF - Release Notes";

if (isset($_GET["project"]) && $_GET["project"] == "xsd")
{
	header("Location: http://www.eclipse.org/modeling/mdt/news/relnotes.php?project=xsd&version=HEAD");
	exit;
}

// bleeding edge for emf only
if (isset($_GET["project"]) && $_GET["project"] == "emf")
{
	require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/emf/downloads/extras-emf.php");
	$extras = array("doBleedingEdge");
}

$streams = array(
	"query" => array(
		"1.2.x" => "HEAD",
		"1.1.x" => "R1_1_maintenance",
		"1.0.x" => "R1_0_maintenance"
	),
	"transaction" => array(
		"1.2.x" => "HEAD",
		"1.1.x" => "R1_1_maintenance",
		"1.0.x" => "R1_0_maintenance"
	),
	"validation" => array(
		"1.2.x" => "HEAD",
		"1.1.x" => "R1_1_maintenance",
		"1.0.x" => "R1_0_maintenance"
	)
);

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-common.php");
?>
