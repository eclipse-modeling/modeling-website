<?php

$options = array (
	"BranchAndJDK" => array (
		"2.1.0=HEAD,/opt/sun-java2-5.0|selected",
		"2.0.2=R2_0_maintenance,/opt/sun-java2-1.4"
		#,"1.1.2=R1_1_maintenance,/opt/sun-java2-1.4"
	)
);

#TODO move this up one level into /modeling/
require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/mdt/build/promo-common.php");

?>
