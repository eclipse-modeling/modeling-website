<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "RC2_34",

	"BranchAndJDK" => array (
		"emft.eclipse.org=------------,------------",
		"0.7.0=HEAD,/opt/sun-java2-5.0",

		"build.eclipse.org=------------,------------",
		"0.7.0=HEAD,/opt/public/common/ibm-java2-ppc-50",

		
	),

	/* define a regular expression to be used to collect the most recent 
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt 
	 * */
	"regex" => "[SR]200.*/eclipse-SDK-|[SR]-.*200.*/eclipse-SDK-|[SR]200.*/emf-xsd-SDK-|[SR]200.*/emf-sdo-xsd-SDK-|[SR]200.*/emft-compare-SDK-|[ISR]200.*/m2t-xpand-|[ISR]200.*/emft-mwe-SDK-",

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "xtext-dev@eclipse.org", // prefil email contact box with comma-sep'd list: xtext-dev@eclipse.org
	//the email above will be also used if cron autobuild fails
	"Users" => array (
		"dhubner",
		"dhubner",
		null
	) /* build user, eclipse cvs user, IES cvs user */

	
);
?>
