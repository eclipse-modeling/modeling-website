<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "M5_34",
	
	"BranchAndJDK" => array (
		"emf.torolab.ibm.com=------------,------------",
		"0.5.0=HEAD,/opt/sun-java2-5.0",
		
		"build.eclipse.org=------------,------------",
		"0.5.0=HEAD,/opt/public/common/ibm-java2-ppc-50"
	),
	
	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "dcarlson@xmlmodeling.com", // prefil email contact box with comma-sep'd list
	
	"Users" => array ("dcarlson", "dcarlson", "dcarlson") /* build user, eclipse cvs user, IES cvs user */
);

?>
