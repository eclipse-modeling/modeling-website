<?php
if (is_file("../../../includes/buildServer-common.php"))
{
	require_once ("../../../includes/buildServer-common.php");
}
else if (is_file($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/buildServer-common.php"))
{
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/buildServer-common.php");
}

$options = array (
	"BaseBuilderBranch" => "RC2_34",

	"BranchAndJDK" => array (
	"emf.torolab.ibm.com=------------,------------",
	"2.5.0=HEAD,/opt/sun-java2-5.0",
	"2.4.2=R2_4_maintenance,/opt/sun-java2-5.0",
	"2.3.3=R2_3_maintenance,/opt/sun-java2-5.0",
	"2.2.5=R2_2_maintenance,/opt/sun-java2-1.4",
	"2.1.4=R2_1_maintenance,/opt/sun-java2-1.4",
	"2.0.7=R2_0_maintenance,/opt/sun-java2-1.4",

	"emft.eclipse.org=------------,------------",
	"2.5.0=HEAD,/opt/sun-java2-5.0",
	"2.4.2=R2_4_maintenance,/opt/sun-java2-5.0",
	"2.3.3=R2_3_maintenance,/opt/sun-java2-5.0",
	"2.2.5=R2_2_maintenance,/opt/sun-java2-1.4",
	"2.1.4=R2_1_maintenance,/opt/sun-java2-1.4",
	"2.0.7=R2_0_maintenance,/opt/sun-java2-1.4",

	"build.eclipse.org=------------,------------",
	"2.5.0=HEAD,/opt/public/common/ibm-java2-ppc-50",
	"2.4.2=R2_4_maintenance,/opt/public/common/ibm-java2-ppc-50",
	"2.3.3=R2_3_maintenance,/opt/public/common/ibm-java2-ppc-50",
	"2.2.5=R2_2_maintenance,/opt/public/stp/apps/IBMJava2-ppc-142",
	"2.1.4=R2_1_maintenance,/opt/public/stp/apps/IBMJava2-ppc-142",
	"2.0.7=R2_0_maintenance,/opt/public/stp/apps/IBMJava2-ppc-142" // 178681
	),

	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */ 	
	"regex" => "I200.*/eclipse-SDK-|[SR]-.*200.*/eclipse-SDK-",

	"Mapfile_Rule_Default" => 1, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "davidms@ca.ibm.com", // prefil email contact box with comma-sep'd list

	"Users" => array("nickb","nickb","nboldt") /* build user, eclipse cvs user, IES cvs user */
);

?>
