<?php
require_once ("../../includes/buildServer-common.php");

$pageTitle = "Eclipse Modeling - EMF - Release Notes";

if (isset($_GET["project"]) && $_GET["project"] == "xsd")
{
	header("Location: http://www.eclipse.org/modeling/mdt/news/relnotes.php?project=xsd&version=HEAD");
	exit;
}

require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/emf/downloads/extras-emf.php");
$extras = array("doBleedingEdge");

$streams = array(
	"emf" => array(
		"2.5.x" => "HEAD",
		"2.4.x" => "R2_4_maintenance",
		"2.3.x" => "R2_3_maintenance",
		"2.2.x" => "R2_2_maintenance",
		"2.1.x" => "R2_1_maintenance",
		"2.0.x" => "R2_0_maintenance"
	),
	"cdo" => array(
		"2.0.x" => "HEAD",
		"1.0.x" => "R1_0_maintenance",
		"0.7.x" => "R0_7_maintenance"
	),
	"net4j" => array(
		"2.0.x" => "HEAD",
		"1.0.x" => "R1_0_maintenance",
		"0.7.x" => "R0_7_maintenance"
	),
	"query" => array(
		"1.3.x" => "HEAD",
		"1.2.x" => "R1_2_maintenance",
		"1.1.x" => "R1_1_maintenance",
		"1.0.x" => "R1_0_maintenance"
	),
	"sdo" => array(
		"2.5.x" => "HEAD",
		"2.4.x" => "R2_4_maintenance",
		"2.3.x" => "R2_3_maintenance",
		"2.2.x" => "R2_2_maintenance",
		"2.1.x" => "R2_1_maintenance",
		"2.0.x" => "R2_0_maintenance"
	),
	"transaction" => array(
		"1.3.x" => "HEAD",
		"1.2.x" => "R1_2_maintenance",
		"1.1.x" => "R1_1_maintenance",
		"1.0.x" => "R1_0_maintenance"
	),
	"validation" => array(
		"1.3.x" => "HEAD",
		"1.2.x" => "R1_2_maintenance",
		"1.1.x" => "R1_1_maintenance",
		"1.0.x" => "R1_0_maintenance"
	)
);

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-common.php");
?>
