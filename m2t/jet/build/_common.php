<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "M4_34",

	"BranchAndJDK" => array (
		"emf.torolab.ibm.com=------------,------------",
        "0.9.0=HEAD,/opt/sun-java2-5.0",
		"0.8.2=R0_8_maintenance,/opt/sun-java2-5.0",
		"0.7.3=R0_7_maintenance,/opt/sun-java2-5.0",

		"build.eclipse.org=------------,------------",
        "0.9.0=HEAD,/opt/sun-java2-5.0",
        "0.8.2=R0_8_maintenance,/opt/sun-java2-5.0",
        "0.7.3=R0_7_maintenance,/opt/sun-java2-5.0",
	),

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "pelder@ca.ibm.com", // prefil email contact box with comma-sep'd list

	"Users" => array("nickb","nickb","nboldt") /* build user, eclipse cvs user, IES cvs user */
);

?>
