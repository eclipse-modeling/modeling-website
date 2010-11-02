<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "R35_M5",

	"BranchAndJDK" => array (
		"modeling.eclipse.org=------------,------------",
        "0.9.patch=R0_9_maintenance,/opt/sun-java2-5.0",
        "1.1.1=HEAD,/opt/sun-java2-5.0",
        "1.2.0=HEAD,/opt/sun-java2-5.0",

	),

	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I201.*/eclipse-SDK-|[SR]-.*201.*/eclipse-SDK-|[ISR]201.*/emf-xsd-SDK-|[ISR]201.*/emf-sdo-xsd-SDK-|[ISR]201.*/mdt-uml2-SDK-",

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "pelder@ca.ibm.com", // prefil email contact box with comma-sep'd list

	"Users" => array("pelder","pelder","pelder") /* build user, eclipse cvs user, IES cvs user */
);

?>
