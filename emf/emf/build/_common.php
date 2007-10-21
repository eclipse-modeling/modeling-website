<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "v20070614",
	
	"BranchAndJDK" => array (
	"emf.torolab.ibm.com=------------,------------",
        "2.4.0=HEAD,/opt/sun-java2-5.0",
	"2.3.2=R2_3_maintenance,/opt/sun-java2-5.0",
        "2.2.5=R2_2_maintenance,/opt/sun-java2-1.4",
        "2.1.4=R2_1_maintenance,/opt/sun-java2-1.4",
	"2.0.7=R2_0_maintenance,/opt/sun-java2-1.4",
		
	"build.eclipse.org=------------,------------",
        "2.4.0=HEAD,/opt/public/common/ibm-java2-ppc-50",
        "2.3.2=R2_3_maintenance,/opt/public/common/ibm-java2-ppc-50",
        "2.2.5=R2_2_maintenance,/opt/public/stp/apps/IBMJava2-ppc-142",
        "2.1.4=R2_1_maintenance,/opt/public/stp/apps/IBMJava2-ppc-142"
	"2.0.7=R2_0_maintenance,/opt/public/stp/apps/IBMJava2-ppc-142" // 178681
	),
	
	"Mapfile_Rule_Default" => 1, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "", // prefil email contact box with comma-sep'd list
	
	"Users" => array("nickb","nickb","nboldt") /* build user, eclipse cvs user, IES cvs user */
);

?>
