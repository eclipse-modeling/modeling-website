<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "R35_M5",

	"BranchAndJDK" => array (
		"emf.torolab.ibm.com=------------,------------",
		"3.1.0=HEAD,/opt/sun-java2-5.0",
		"3.0.1=R3_0_maintenance,/opt/sun-java2-5.0",
		"2.2.2=R2_2_maintenance,/opt/sun-java2-5.0",
		"2.1.1=R2_1_maintenance,/opt/sun-java2-5.0",
		"2.0.5=R2_0_maintenance,/opt/sun-java2-1.4",

		"emft.eclipse.org=------------,------------",
		"3.1.0=HEAD,/opt/sun-java2-5.0",
		"3.0.1=R3_0_maintenance,/opt/sun-java2-5.0",
		"2.2.2=R2_2_maintenance,/opt/sun-java2-5.0",
		"2.1.1=R2_1_maintenance,/opt/sun-java2-5.0",
		"2.0.5=R2_0_maintenance,/opt/sun-java2-1.4",

		"modeling.eclipse.org=------------,------------",
		"3.1.0=HEAD,/opt/sun-java2-5.0",
		"3.0.1=R3_0_maintenance,/opt/sun-java2-5.0",
		"2.2.2=R2_2_maintenance,/opt/sun-java2-5.0",
		"2.1.1=R2_1_maintenance,/opt/sun-java2-5.0",
		"2.0.5=R2_0_maintenance,/opt/sun-java2-1.4",

		"build.eclipse.org=------------,------------",
		"3.1.0=HEAD,/opt/public/common/ibm-java2-ppc-50",
		"3.0.1=R3_0_maintenance,/opt/public/common/ibm-java2-ppc-50",
		"2.2.2=R2_2_maintenance,/opt/public/common/ibm-java2-ppc-50",
		"2.1.1=R2_1_maintenance,/opt/public/common/ibm-java2-ppc-50",
		"2.0.5=R2_0_maintenance,/opt/public/stp/apps/IBMJava2-ppc-142" // bug 178681
	),

	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I200.*/eclipse-SDK-.*-linux-gtk.tar.gz|[SR]-.*200.*/eclipse-SDK-.*-linux-gtk.tar.gz|" . 
			"2\.5\..+/[ISR]200.*/emf-xsd-SDK-|" ,

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "jbruck@ca.ibm.com", // prefil email contact box with comma-sep'd list

	"Users" => array ("jbruck", "jbruck", "jbruck") /* build user, eclipse cvs user, IES cvs user */
);

?>
