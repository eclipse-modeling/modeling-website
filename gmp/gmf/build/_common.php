<?php
require_once ("../../../includes/buildServer-common.php");

$options = array (
	"BaseBuilderBranch" => "M5_34",

	"BranchAndJDK" => array (
		"emf.torolab.ibm.com=------------,------------",
        "2.1.0=HEAD,/opt/sun-java2-5.0",
        
		"emft.eclipse.org=------------,------------",
        "2.1.0=HEAD,/opt/sun-java2-5.0",
	),

	"Mapfile_Rule_Default" => 0, // 0: "Use Map, No Tagging=use-false" or 1:"Generate Map, No Tagging=gen-false"

	"EmailDefault" => "max.feldman@borland.com", // prefil email contact box with comma-sep'd list

	"Users" => array("mfeldman","mfeldman",NULL) /* build user, eclipse cvs user, IES cvs user */
);

?>
