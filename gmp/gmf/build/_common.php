<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "M7_34",

	"BranchAndJDK" => array (
		"emf.torolab.ibm.com=------------,------------",
        "2.1.0=HEAD,/opt/sun-java2-5.0",
        
		"emft.eclipse.org=------------,------------",
        "2.1.0=HEAD,/opt/sun-java2-5.0",
	),

	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I200.*/eclipse-SDK-|[SR]-.*200.*/eclipse-SDK-|[ISR]200.*/emf-sdo-xsd-SDK-|mdt-uml2-SDK|[ISR]200.*/mdt-ocl-.*SDK-|[ISR]200.*/emf-query-SDK-|[ISR]200.*/emf-validation-SDK-|[ISR]200.*/emf-transaction-SDK-|[ISR]200.*/GEF-ALL-|orbitBundles-",

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "gmf-releng@eclipse.org,nickboldt@gmail.com", // prefil email contact box with comma-sep'd list
	"Users" => array("mfeldman","mfeldman",NULL), /* build user, eclipse cvs user, IES cvs user */
);

?>
