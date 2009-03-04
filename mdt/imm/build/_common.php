<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "R35_M5",
	
	"BranchAndJDK" => array (
		"emf.torolab.ibm.com=------------,------------",
		"0.0.7=HEAD,/opt/sun-java2-5.0",
		
		"build.eclipse.org=------------,------------",
		"0.0.7=HEAD,/opt/public/common/ibm-java2-ppc-50"
	),
	
	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "Kenn.Hussey@embarcadero.com", // prefil email contact box with comma-sep'd list
	
	"Users" => array ("khussey", "khussey", "khussey") /* build user, eclipse cvs user, IES cvs user */
);

?>
