<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "R35_RC4",
	
	"BranchAndJDK" => array (
		"modeling.eclipse.org=------------,------------",
        "1.6.0=HEAD,/opt/sun-java2-5.0",
        "1.5.1=R1_5_maintenance,/opt/sun-java2-5.0",
        "1.4.1=R1_4_maintenance,/opt/sun-java2-5.0",
        "1.3.1=R1_3_maintenance,/opt/sun-java2-5.0",
        "1.2.1=R1_2_maintenance,/opt/sun-java2-5.0",
		"1.1.1=R1_1_maintenance,/opt/sun-java2-5.0",
		
		"build.eclipse.org=------------,------------",
        "1.4.0=HEAD,/opt/public/common/ibm-java2-ppc-50",
        "1.3.1=R1_3_maintenance,/opt/public/common/ibm-java2-ppc-50",
        "1.2.3=R1_2_maintenance,/opt/public/common/ibm-java2-ppc-50",
		"1.1.3=R1_1_maintenance,/opt/public/common/ibm-java2-ppc-50",
		#"1.0.3=R1_0_maintenance,/opt/public/stp/apps/IBMJava2-ppc-142" // bug 178681
	),

	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I20.*/eclipse-SDK-|[SR]-.*20.*/eclipse-SDK-|" .
			"2\.8\..+/[ISR]20.*/emf-xsd-SDK-|" .
			"1\.6\..+/[ISR]20.*/emf-query-SDK-|" .
			"1\.6\..+/[ISR]20.*/emf-validation-SDK-|" .
			"4\.0\..+/[ISR]20.*/mdt-uml2-SDK|" .
			"4\.0\..+/[ISR]20.*/mdt-ocl-.*SDK-",
	
	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "anthonyh@ca.ibm.com", // prefil email contact box with comma-sep'd list
	
    "Users" => array("ahunter","ahunter",NULL) /* build user, eclipse cvs user, IES cvs user */
);

?>
