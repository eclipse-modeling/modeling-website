<?php
require_once ("../../includes/buildServer-common.php");

$pageTitle = "Eclipse Modeling - TMF - Release Notes";

require ($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-common.php");
$streams = array(
	"xtext" => array(
		"0.7.x" => "HEAD",
	),
);
?>
