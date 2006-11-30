<?php
$pageTitle = "Eclipse Modeling - EMFT - Release Notes";

/* sub-projects/components in cvs for projects/components above (if any) */
/* "cvsname" => array("shortname" => "cvsname") */
$cvscoms = array(
	"org.eclipse.emft" => array(
		"cdo" => "cdo",
		"jet" => "jet",
		"jeteditor" => "jeteditor",
		"net4j" => "net4j",
		"query" => "query",
		"teneo" => "teneo",
		"transaction" => "transaction",
		"validation" => "validation"
	)
);

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-common.php");
?>
