<?php
require_once ("../../includes/buildServer-common.php");

$pageTitle = "Eclipse Modeling - MDT - Release Notes";

$streams = array(
	"xsd" => array(
		"2.4.x" => "HEAD",
		"2.3.x" => "R2_3_maintenance",
		"2.2.x" => "R2_2_maintenance",
		"2.1.x" => "R2_1_maintenance",
		"2.0.x" => "R2_0_maintenance"
	),
	"ocl" => array(
		"1.2.x" => "HEAD",
		"1.1.x" => "R1_1_maintenance",
		"1.0.x" => "R1_0_maintenance"
	),
	"uml2" => array(
		"2.1.x" => "R2_1_maintenance",
		"2.0.x" => "R2_0_maintenance",
		"1.1.x" => "",
		"1.0.x" => ""
	)
);

require ($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-common.php");
?>
