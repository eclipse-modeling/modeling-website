<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "R35_RC4",

	"BranchAndJDK" => array (
        "localhost=------------,------------",
        "1.5.0=HEAD,/opt/sun-java2-5.0",
        "1.4.1=R1_4_maintenance,/opt/sun-java2-5.0",

        "modeling.eclipse.org=------------,------------",
        "1.5.0=HEAD,/opt/sun-java2-6.0_64",
        "1.4.1=R1_4_maintenance,/opt/sun-java2-6.0_64",

	),

	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I2010.*eclipse-SDK-.*x86_64.*|[SR]-.*2010.*/eclipse-SDK-3.6.*x86_64*|" .
			"2\.6\..+/[ISR]20.*/emf-xsd-SDK-",

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "anthonyh@ca.ibm.com", // prefil email contact box with comma-sep'd list: can't send to gmf-releng@eclipse.org, so use actual recipients

	"Users" => array("ahunter","ahunter","anthonyh") /* build user, eclipse cvs user, IES cvs user */
);

?>
