<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "M7_34",
	
	"BranchAndJDK" => array (
		"emft.eclipse.org=------------,------------",
		"0.8.0=HEAD,/opt/sun-java2-5.0",
		"0.7.5=R0_7_maintenance,/opt/sun-java2-1.4",
		
		"build.eclipse.org=------------,------------",
		"0.8.0=HEAD,/opt/public/common/ibm-java2-ppc-50",
		"0.7.5=R0_7_maintenance,/opt/public/stp/apps/IBMJava2-ppc-142" // bug 178681
	),
	
	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "mtaal@elver.org", // prefil email contact box with comma-sep'd list
	
	"Users" => array("mtaal","mtaal",null) /* build user, eclipse cvs user, IES cvs user */
);

?>
