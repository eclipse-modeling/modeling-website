<?php
$options = array (
	"BaseBuilderBranch" => array (
		"M3_33"
	),
	
	"BranchAndJDK" => array (
		"1.1.0=HEAD,/opt/sun-java2-5.0",
		"1.0.2=R1_0_maintenance,/opt/sun-java2-1.4"
	)
);

#TODO move this up one level into /modeling/
require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/mdt/build/build-common.php");
?>
