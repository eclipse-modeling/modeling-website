<?php
require_once ("../../includes/buildServer-common.php");

$pageTitle = "Eclipse Modeling - GMF - Release Notes";

$streams = array(
	"gmf" => array(
		"2.1.x" => "HEAD",
		"2.0.x" => "R2_0_maintenance",
		"1.0.x" => "R1_0_maintenance",
	),
);

require ($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-common.php");
?>
