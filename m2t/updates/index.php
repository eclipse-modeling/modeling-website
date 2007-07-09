<?php 
require_once ("../../includes/buildServer-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/updates-common.php");

$PRS = array(
);

function notes()
{
}

update_manager("M2T", "Eclipse Modeling", $PRS, true);
?>
