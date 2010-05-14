<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "R35_RC4",

	"BranchAndJDK" => array (
        "localhost=------------,------------",
        "2.3.0=HEAD,/opt/sun-java2-5.0",
        "2.1.4=R2_1_maintenance,/opt/sun-java2-5.0",
        "2.2.2=R2_2_maintenance,/opt/sun-java2-6.0_64",

        "modeling.eclipse.org=------------,------------",
        "2.3.0=HEAD,/opt/sun-java2-6.0_64",
        "2.1.4=R2_1_maintenance,/opt/sun-java2-5.0",
        "2.2.2=R2_2_maintenance,/opt/sun-java2-6.0_64",

	),

	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I20.*/eclipse-SDK-.*|[SR]-.*20.*/eclipse-SDK-.*|" .
			"2\.6\..+/[ISR]20.*/emf-xsd-SDK-|" .
			"3\.1\..+/[ISR]20.*/mdt-uml2-SDK|" .
			"3\.0\..+/[ISR]20.*/mdt-ocl-.*SDK-|" .
			"1\.4\..+/[ISR]20.*/emf-query-SDK-|" .
			"1\.4\..+/[ISR]20.*/emf-validation-SDK-|" .
			"1\.4\..+/[ISR]20.*/emf-transaction-SDK-|" .
			"3\.0\..+/[ISR]20.*/m2m-qvtoml-runtime-|" .
			"1\.4\..+/[ISR]20.*/gmf-runtime-sdk-|" .
			"3\.6\..+/[ISR]20.*/GEF-SDK-|" .
			"orbitBundles-.*\.map",

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "anthonyh@ca.ibm.com", // prefil email contact box with comma-sep'd list: can't send to gmf-releng@eclipse.org, so use actual recipients

	"Users" => array("ahunter","ahunter","anthonyh") /* build user, eclipse cvs user, IES cvs user */
);

?>
