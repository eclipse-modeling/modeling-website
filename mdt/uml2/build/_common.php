<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "M4_33",
	
	"BranchAndJDK" => array (
		"emf.torolab.ibm.com=------------,------------",
		"2.1.0=HEAD,/opt/sun-java2-5.0",
		"2.0.4=R2_0_maintenance,/opt/sun-java2-1.4",
		
		"build.eclipse.org=------------,------------",
		"2.1.0=HEAD,/opt/public/common/ibm-java2-ppc-50",
		"2.0.4=R2_0_maintenance,/opt/public/stp/apps/IBMJava2-ppc-142" // bug 178681
	),
	
	"Mapfile_Rule_Default" => 1, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "khussey@ca.ibm.com,jbruck@ca.ibm.com", // prefil email contact box with comma-sep'd list
	
	"Users" => array ("khussey","khussey","khussey") /* build user, eclipse cvs user, IES cvs user */
);

?>
