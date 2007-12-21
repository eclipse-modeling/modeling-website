<?php
require_once ("../../includes/buildServer-common.php");

$pageTitle = "Eclipse Modeling - M2M - Release Notes";

$streams = array(
	"atl" => array(
		"2.0.x" => "HEAD",
	),
);

require ($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-common.php");
?>
