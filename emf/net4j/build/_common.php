<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "M7_34",
	
	"BranchAndJDK" => array (
		"emft.eclipse.org=------------,------------",
		"0.8.0=HEAD,/opt/sun-java2-5.0",
		"0.7.3=R0_7_maintenance,/opt/sun-java2-1.4",
		
		"build.eclipse.org=------------,------------",
		"0.8.0=HEAD,/opt/public/common/ibm-java2-ppc-50",
		"0.7.3=R0_7_maintenance,/opt/public/stp/apps/IBMJava2-ppc-142" // bug 178681
	),
	
	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I200.*/eclipse-SDK-|[SR]-.*200.*/eclipse-SDK-",

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "stepper@esc-net.de", // prefil email contact box with comma-sep'd list
	
	"Users" => array("estepper","estepper",null) /* build user, eclipse cvs user, IES cvs user */
);

?>
