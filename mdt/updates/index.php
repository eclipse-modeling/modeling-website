<?php 
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/updates-common.php");

$PRS = array(
	"EMF (XSD)" => "modeling/emf"
);

function notes()
{
	print "<p><i style=\"color:red\"><b>NOTE:</b> not all MDT projects have migrated to the MDT Update Manager site yet, so you'll have to use the older sites until that time.</i></p>\n";
}

update_manager("MDT", "Eclipse Modeling", $PRS);
?>
