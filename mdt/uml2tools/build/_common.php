<?php
$options = array (
	"BaseBuilderBranch" => "M4_33",
	
	"BranchAndJDK" => array (
		"1.0.0=HEAD,/opt/sun-java2-5.0|selected"
	),
	
	"Mapfile_Rule_Default" => 1, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "michael.golubev@borland.com", // prefil email contact box with comma-sep'd list
	
	"Users" => array ("mgolubev","mgolubev",null) /* build user, eclipse cvs user, IES cvs user */
);

?>
