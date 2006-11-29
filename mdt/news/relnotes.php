<?php
/* projects/components in cvs */
/* "proj" => "cvsname" */
$cvsprojs = array(
	"uml2-uml" => "org.eclipse.uml2",
	"xsd" => "org.eclipse.xsd"
);

/* sub-projects/components in cvs for projects/components above (if any) */
/* "cvsname" => array("shortname" => "cvsname") */
$cvscoms = array(
	"org.eclipse.emft" => array(
		"uml2-ocl" => "ocl",
		"eodm" => "eodm"
	)
);

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-common.php");
?>
