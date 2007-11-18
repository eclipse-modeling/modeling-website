<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "v20071108",
	
	"BranchAndJDK" => array (
		"emft.eclipse.org=------------,------------",
		"0.8.0=HEAD,/opt/sun-java2-5.0",
		
		"build.eclipse.org=------------,------------",
		"0.8.0=HEAD,/opt/public/common/ibm-java2-ppc-50"
	),
	
	"Mapfile_Rule_Default" => 1, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "michael.golubev@borland.com", // prefil email contact box with comma-sep'd list
	
	"Users" => array ("mgolubev","mgolubev",null) /* build user, eclipse cvs user, IES cvs user */
);

?>
