<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "R35_M5",

	"BranchAndJDK" => array (
		"emf.torolab.ibm.com=------------,------------",
        "2.3.0=HEAD,/opt/sun-java2-5.0",
        "2.2.x=R2_2_maintenance,/opt/sun-java2-5.0",
        
		"emft.eclipse.org=------------,------------",
        "2.3.0=HEAD,/opt/sun-java2-5.0",
        "2.2.x=R2_2_maintenance,/opt/sun-java2-5.0",
        
        "modeling.eclipse.org=------------,------------",
        "2.3.0=HEAD,/opt/sun-java2-6.0_64",
        "2.2.x=R2_2_maintenance,/opt/sun-java2-6.0_64",
	),

	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I200.*/eclipse-SDK-|[SR]-.*200.*/eclipse-SDK-|" .
			"2\.5\..+/[ISR]200.*/emf-xsd-SDK-|" .
			"3\.0\..+/[ISR]200.*/mdt-uml2-SDK|" .
			"1\.3\..+/[ISR]200.*/mdt-ocl-.*SDK-|" .
			"1\.3\..+/[ISR]200.*/emf-query-SDK-|" .
			"1\.3\..+/[ISR]200.*/emf-validation-SDK-|" .
			"1\.3\..+/[ISR]200.*/emf-transaction-SDK-|" .
			"2\.0\..+/[ISR]200.*/m2m-qvtoml-SDK-|" .
			"[ISR]200.*/GEF-|" .
			"orbitBundles-",

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "richard.gronback@borland.com,anthonyh@ca.ibm.com", // prefil email contact box with comma-sep'd list: can't send to gmf-releng@eclipse.org, so use actual recipients
	"Users" => array("nickb","nickb",NULL), /* build user, eclipse cvs user, IES cvs user */
);

?>
