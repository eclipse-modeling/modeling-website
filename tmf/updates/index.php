<?php 
if ($_SERVER["SERVER_NAME"] != "www.eclipse.org") {
	header("Location: http://www.eclipse.org/modeling/tmf/updates/");
}
require_once ("../../includes/buildServer-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/updates-common.php");

$PRS = array(
"TMF Xtext" => "modeling/tmf/xtext",
);

function notes()
{
}

update_manager("TMF", "Eclipse Modeling", $PRS, false);
?>
