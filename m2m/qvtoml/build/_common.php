<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "R35_RC4",

	"BranchAndJDK" => array (
		"emft.eclipse.org=------------,------------",
		"3.0.0=HEAD,/opt/sun-java2-5.0",
		"2.0.1=R2_0_maintenance,/opt/sun-java2-5.0",

		"modeling.eclipse.org=------------,------------",
		"3.0.0=HEAD,/opt/sun-java2-5.0",
		"2.0.1=R2_0_maintenance,/opt/sun-java2-6.0_64",
		
		"build.eclipse.org=------------,------------",
		"3.0.0=HEAD,/opt/public/common/ibm-java2-ppc-50",
		"2.0.1=R2_0_maintenance,/opt/public/common/ibm-java2-ppc-50"
	),

	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I200.*/eclipse-SDK-|[SR]-.*200.*/eclipse-SDK-|[ISR]200.*/emf-xsd-SDK-|[ISR]200.*/emf-sdo-xsd-SDK-|[ISR]200.*/mdt-ocl-.*SDK-",

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "dvorak.radek@gmail.com", // prefil email contact box with comma-sep'd list

	"Users" => array ("radvorak","radvorak",null) /* build user, eclipse cvs user, IES cvs user */
);

?>
