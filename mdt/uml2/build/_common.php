<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "R35_M5",

	"BranchAndJDK" => array (
		"modeling.eclipse.org=------------,------------",
		"3.2.0=HEAD,/opt/sun-java2-5.0",
		"3.1.1=R3_1_maintenance,/opt/sun-java2-5.0"

		"build.eclipse.org=------------,------------",
		"3.2.0=HEAD,/opt/public/common/ibm-java2-ppc-50",
		"3.1.1=R3_1_maintenance,/opt/public/common/ibm-java2-ppc-50"
	),

	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I200.*/eclipse-SDK-.*-linux-gtk.tar.gz|[SR]-.*200.*/eclipse-SDK-.*-linux-gtk.tar.gz|" . 
			"2\.5\..+/[ISR]200.*/emf-xsd-SDK-|" ,

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "kenn.hussey@gmail.com", // prefil email contact box with comma-sep'd list

	"Users" => array ("khussey", "khussey", NULL) /* build user, eclipse cvs user, IES cvs user */
);

?>
