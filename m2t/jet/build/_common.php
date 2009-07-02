<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "R35_M5",

	"BranchAndJDK" => array (
		"emf.torolab.ibm.com=------------,------------",
        "1.0.1=HEAD,/opt/sun-java2-5.0",
        "0.9.3=R0_9_maintenance,/opt/sun-java2-5.0",

		"emft.eclipse.org=------------,------------",
        "1.0.1=HEAD,/opt/sun-java2-5.0",
        "0.9.3=R0_9_maintenance,/opt/sun-java2-5.0",

		"modeling.eclipse.org=------------,------------",
        "1.0.1=HEAD,/opt/sun-java2-5.0",
        "0.9.3=R0_9_maintenance,/opt/sun-java2-5.0",

	),

	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I200.*/eclipse-SDK-|[SR]-.*200.*/eclipse-SDK-|[ISR]200.*/emf-xsd-SDK-|[ISR]200.*/emf-sdo-xsd-SDK-|[ISR]200.*/mdt-uml2-SDK-",

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "pelder@ca.ibm.com", // prefil email contact box with comma-sep'd list

	"Users" => array("pelder","pelder","pelder") /* build user, eclipse cvs user, IES cvs user */
);

?>
