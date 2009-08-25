<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "R35_M7",
	
	"BranchAndJDK" => array (
		"emft.eclipse.org=------------,------------",
		"3.1.0=HEAD,/opt/sun-java2-5.0",
		"3.0.1=R3_0_maintenance,/opt/sun-java2-5.0",
		"2.0.2=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.1=R2_0_maintenance,/opt/sun-java2-5.0",
		
		"modeling.eclipse.org=------------,------------",
		"3.1.0=HEAD,/opt/sun-java2-5.0",
		"3.0.1=R3_0_maintenance,/opt/sun-java2-5.0",
		"2.0.2=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.1=R2_0_maintenance,/opt/sun-java2-5.0",
		
		"build.eclipse.org=------------,------------",
		"3.1.0=HEAD,/opt/public/common/ibm-java2-ppc-50",
		"3.0.1=R3_0_maintenance,/opt/public/common/ibm-java2-ppc-50",
		"2.0.2=R2_0_maintenance,/opt/public/common/ibm-java2-ppc-50",
		"2.0.1=R2_0_maintenance,/opt/public/common/ibm-java2-ppc-50",
	),
	
	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "william.piers@obeo.fr", // prefil email contact box with comma-sep'd list
	
	"Users" => array("wpiers","wpiers",null) /* build user, eclipse cvs user, IES cvs user */
);

?>
