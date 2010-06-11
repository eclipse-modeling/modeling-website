<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "R35_M7",
	
	"BranchAndJDK" => array (
		"emft.eclipse.org=------------,------------",
		"3.1.0=HEAD,/opt/sun-java2-5.0",
		"3.0.0=R3_0_0_maintenance,/opt/sun-java2-5.0",
		"0.8.0=R0_8_maintenance,/opt/sun-java2-5.0",
		"0.7.0=R0_7_maintenance,/opt/sun-java2-5.0",
		
		"build.eclipse.org=------------,------------",
		"3.1.0=HEAD,/opt/sun-java2-5.0",
		"3.0.0=R3_0_0_maintenance,/opt/sun-java2-5.0",
		"0.8.0=R0_8_maintenance,/opt/sun-java2-5.0",
		"0.7.0=R0_7_maintenance,/opt/sun-java2-5.0",
		
		"modeling.eclipse.org=------------,------------",
		"3.1.0=HEAD,/opt/sun-java2-5.0",
		"3.0.0=R3_0_0_maintenance,/opt/sun-java2-5.0",
		"0.8.0=R0_8_maintenance,/opt/sun-java2-5.0",
		"0.7.0=R0_7_maintenance,/opt/sun-java2-5.0",
	),
	
	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "laurent.goubet@obeo.fr", // prefil email contact box with comma-sep'd list
	
	"Users" => array("cbrun","cbrun",null) /* build user, eclipse cvs user, IES cvs user */
);

?>
