<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "RC2_34",

	"BranchAndJDK" => array (
		"emf.torolab.ibm.com=------------,------------",
		"2.2.0=HEAD,/opt/sun-java2-5.0",
		"2.1.1=R2_1_maintenance,/opt/sun-java2-5.0",
		"2.0.5=R2_0_maintenance,/opt/sun-java2-1.4",

		"build.eclipse.org=------------,------------",
		"2.2.0=HEAD,/opt/public/common/ibm-java2-ppc-50",
		"2.1.1=R2_1_maintenance,/opt/public/common/ibm-java2-ppc-50",
		"2.0.5=R2_0_maintenance,/opt/public/stp/apps/IBMJava2-ppc-142" // bug 178681
	),

	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I200.*/eclipse-SDK-|[SR]-.*200.*/eclipse-SDK-|[ISR]200.*/emf-sdo-xsd-SDK-",

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "jbruck@ca.ibm.com", // prefil email contact box with comma-sep'd list

	"Users" => array ("nickb", "nickb", "nboldt") /* build user, eclipse cvs user, IES cvs user */
);

?>
