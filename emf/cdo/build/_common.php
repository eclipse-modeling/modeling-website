<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "RC2_34",
	
	"BranchAndJDK" => array (
		"emft.eclipse.org=------------,------------",
		"2.0.0=HEAD,/opt/sun-java2-5.0",
		"2.0.0=simon_merge_238414,/opt/sun-java2-5.0",
		"1.0.1=R1_0_maintenance,/opt/sun-java2-5.0",
		
		"build.eclipse.org=------------,------------",
		"2.0.0=HEAD,/opt/public/common/ibm-java2-ppc-50",
		"2.0.0=simon_merge_238414,/opt/public/common/ibm-java2-ppc-50",
		"1.0.1=R1_0_maintenance,/opt/public/common/ibm-java2-ppc-50"
	),
	
	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I200.*/eclipse-SDK-|[SR]-.*200.*/eclipse-SDK-|[ISR]200.*/emf-sdo-xsd-SDK-|[ISR]200.*/emf-net4j-SDK-|[ISR]200.*/emf-teneo-SDK-",

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "stepper@esc-net.de,smcduff@hotmail.com,mtaal@elver.org", // prefil email contact box with comma-sep'd list
	
	"Users" => array("estepper","estepper",null) /* build user, eclipse cvs user, IES cvs user */
);

?>
