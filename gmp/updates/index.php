<?php 
if ($_SERVER["SERVER_NAME"] != "www.eclipse.org") {
	header("Location: http://www.eclipse.org/modeling/gmf/updates/");
}
require_once ("../../includes/buildServer-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/updates-common.php");

$PRS = array(
);

function notes()
{
}

update_manager("GMF", "Eclipse Modeling", $PRS, true);
?>
