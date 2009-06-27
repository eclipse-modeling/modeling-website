<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "R35_RC4",

	"BranchAndJDK" => array (
		"emft.eclipse.org=------------,------------",
		"3.0.0=HEAD,/opt/sun-java2-5.0",
		"2.0.1=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.2=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.3=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.4=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.5=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.6=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.7=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.8=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.9=R2_0_maintenance,/opt/sun-java2-5.0",

		"modeling.eclipse.org=------------,------------",
		"3.0.0=HEAD,/opt/sun-java2-5.0",
		"2.0.1=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.2=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.3=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.4=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.5=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.6=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.7=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.8=R2_0_maintenance,/opt/sun-java2-5.0",
		"2.0.9=R2_0_maintenance,/opt/sun-java2-5.0",
	),

	/* define a regular expression to be used to collect the most recent
	 * matching dependencies for running a build. See also releng-common/tools/scripts/start_cron.sh
	 * and /home/www-data/build/requests/dependencies.urls.txt
	 * */
	"regex" => "I200.*/eclipse-SDK-|[SR]-.*200.*/eclipse-SDK-|" .
			"2.5.0/[ISR]200.*/emf-xsd-SDK-|" .
			"[NISR]200.*/emf-net4j-SDK-|" .
			"[ISRM]200.*/emf-teneo-SDK-",

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "stepper@esc-net.de,smcduff@hotmail.com,mtaal@elver.org,stefan.winkler-et@fernuni-hagen.de,vroldan@opencanarias.com,dietisheim@puzzle.ch,ibrahim.sallam@objectivity.com", // prefil email contact box with comma-sep'd list

	"Users" => array("estepper","estepper",null) /* build user, eclipse cvs user, IES cvs user */
);

?>
