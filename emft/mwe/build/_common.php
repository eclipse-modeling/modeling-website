<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "RC2_34",
	
	"BranchAndJDK" => array (
		"emft.eclipse.org=------------,------------",
		"0.7.0=HEAD,/opt/sun-java2-5.0",
		
		"build.eclipse.org=------------,------------",
		"0.7.0=HEAD,/opt/public/common/ibm-java2-ppc-50"
	),
	"regex" => "[ISR]200.*/eclipse-SDK-|[SR]-.*200.*/eclipse-SDK-|[SR]200.*/emf-runtime-|[SR]200.*/orbit-R*",
	
	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "dennis.huebner@itemis.de", // prefil email contact box with comma-sep'd list
	
	"Users" => array("dhubner","dhubner",null) /* build user, eclipse cvs user, IES cvs user */
);

?>
