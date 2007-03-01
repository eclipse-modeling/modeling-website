<?php
$options = array (
	"BaseBuilderBranch" => "M4_33",
	
	"BranchAndJDK" => array (
		"2.1.0=HEAD,/opt/sun-java2-5.0|selected",
		#"2.0.2=R2_0_maintenance,/opt/sun-java2-1.4",
		#"1.1.2=R1_1_maintenance,/opt/sun-java2-1.4"
	),
	
	"Mapfile_Rule_Default" => 1, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "khussey@ca.ibm.com,jbruck@ca.ibm.com", // prefil email contact box with comma-sep'd list
	
	"Users" => array ("khussey","khussey","khussey") /* build user, eclipse cvs user, IES cvs user */
);

?>
