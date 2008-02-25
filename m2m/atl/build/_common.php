<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "M4_34",
	
	"BranchAndJDK" => array (
		"emft.eclipse.org=------------,------------",
		"2.0.0=HEAD,/opt/sun-java2-5.0",
		"2.1.0=R2_1_0_dev,/opt/sun-java2-5.0",
		
		"build.eclipse.org=------------,------------",
        	"2.0.0=HEAD,/opt/sun-java2-5.0",
	),
	
	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "william.piers@obeo.fr", // prefil email contact box with comma-sep'd list
	
	"Users" => array("wpiers","wpiers",null) /* build user, eclipse cvs user, IES cvs user */
);

?>
