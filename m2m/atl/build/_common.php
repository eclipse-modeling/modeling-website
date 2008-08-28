<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "RC2_34",
	
	"BranchAndJDK" => array (
		"emft.eclipse.org=------------,------------",
		"2.1.0=HEAD,/opt/sun-java2-5.0",
		"2.0.0=R2_0_maintenance,/opt/sun-java2-5.0",
		
		"build.eclipse.org=------------,------------",
		"2.1.0=HEAD,/opt/public/common/ibm-java2-ppc-50",
		"2.0.0=R2_0_maintenance,/opt/public/common/ibm-java2-ppc-50",
	),
	
	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "william.piers@obeo.fr", // prefil email contact box with comma-sep'd list
	
	"Users" => array("wpiers","wpiers",null) /* build user, eclipse cvs user, IES cvs user */
);

?>
