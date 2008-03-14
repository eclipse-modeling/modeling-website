<?php
require_once ("../../includes/buildServer-common.php");

$pageTitle = "Eclipse Modeling - M2T - Release Notes";

require ($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-common.php");
$streams = array(
	"jet" => array(
		"0.9.0" => "HEAD",
		"0.8.0" => "R0_8_maintenance",
		"0.7.0" => "R0_7_maintenance",
	),
	"xpand" => array(
		"0.7.0" => "HEAD",
	),
);
?>
