<?php 
require_once ("../../includes/buildServer-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/updates-common.php");

$PRS = array(
	"EMFT (JET, JET Editor)" => "technology/emft"
);

function notes()
{
	print "<p><i style=\"color:red\"><b>NOTE:</b> not all M2T projects have migrated to the M2T Update Manager site yet, so you'll have to use the older sites until that time.</i></p>\n";
}

update_manager("M2T", "Eclipse Modeling", $PRS, true);
?>
