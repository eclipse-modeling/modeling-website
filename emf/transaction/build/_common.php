<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "RC2_34",
	
	"BranchAndJDK" => array (
		"emf.torolab.ibm.com=------------,------------",
        "1.3.0=HEAD,/opt/sun-java2-5.0",
        "1.2.2=R1_2_maintenance,/opt/sun-java2-5.0",
		"1.1.3=R1_1_maintenance,/opt/sun-java2-5.0",
		#"1.0.3=R1_0_maintenance,/opt/sun-java2-1.4",
		
		"emft.eclipse.org=------------,------------",
        "1.3.0=HEAD,/opt/sun-java2-5.0",
        "1.2.2=R1_2_maintenance,/opt/sun-java2-5.0",
		"1.1.3=R1_1_maintenance,/opt/sun-java2-5.0",
		#"1.0.3=R1_0_maintenance,/opt/sun-java2-1.4",
		
		"build.eclipse.org=------------,------------",
        "1.3.0=HEAD,/opt/public/common/ibm-java2-ppc-50",
        "1.2.2=R1_2_maintenance,/opt/public/common/ibm-java2-ppc-50",
		"1.1.3=R1_1_maintenance,/opt/public/common/ibm-java2-ppc-50",
		#"1.0.3=R1_0_maintenance,/opt/public/stp/apps/IBMJava2-ppc-142" // bug 178681
	),

	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I200.*/eclipse-SDK-|[SR]-.*200.*/eclipse-SDK-|[ISR]200.*/emf-sdo-xsd-SDK-|[ISR]200.*/emf-query-SDK-|[ISR]200.*/emf-validation-SDK-|[ISR]200.*/mdt-ocl-.*SDK-",
	
	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "cdamus@zeligsoft.com, nickboldt@gmail.com", // prefil email contact box with comma-sep'd list
	
    "Users" => array("cdamus","cdamus",NULL) /* build user, eclipse cvs user, IES cvs user */
);

?>
