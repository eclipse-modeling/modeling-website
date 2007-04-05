<?php
/* TODO: support situation when we have components in /technology/emft and /modeling/org.eclipse.emft/ */
$projDetails = array(
	"/technology/emft",
	"/emft/downloads",
	"/emft",
	"EMFT"
);
require_once ("../../includes/buildServer-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/javadoc-common.php");
?>