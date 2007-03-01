<?php
$options = array (
	"BaseBuilderBranch" => "M4_33",
	
	"BranchAndJDK" => array (
		"1.1.0=HEAD,/opt/sun-java2-5.0",
		#"1.0.3=R1_0_maintenance,/opt/sun-java2-1.4"
	),
	
	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "cdamus@ca.ibm.com", // prefil email contact box with comma-sep'd list
	
	"Users" => array("cdamus","cdamus","cdamus") /* build user, eclipse cvs user, IES cvs user */
);

?>
