<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "R35_M4",
	
	"BranchAndJDK" => array (
		"emft.eclipse.org=------------,------------",
		"1.0.2=HEAD,/opt/sun-java2-5.0",
		"0.7.5=R0_7_maintenance,/opt/sun-java2-1.4",
		
		"build.eclipse.org=------------,------------",
		"1.0.2=HEAD,/opt/public/common/ibm-java2-ppc-50",
		"0.7.5=R0_7_maintenance,/opt/public/stp/apps/IBMJava2-ppc-142" // bug 178681
	),
	
	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "M200.*/eclipse-SDK-|[SR]-.*200.*/eclipse-SDK-|[MSR]200.*/emf-xsd-SDK-|[MSR]200.*emf-sdo-xsd-SDK-|eclipselink-",

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "mtaal@elver.org,stepper@esc-net.de", // prefil email contact box with comma-sep'd list
	
	"Users" => array("mtaal","mtaal",null) /* build user, eclipse cvs user, IES cvs user */
);

?>
