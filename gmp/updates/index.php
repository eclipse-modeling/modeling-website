<?php 
if ($_SERVER["SERVER_NAME"] != "www.eclipse.org") {
	header("Location: http://www.eclipse.org/modeling/gmf/updates/");
}
require_once ("../../includes/buildServer-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/updates-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/gmf/build/sideitems-common.php");

$PRS = array();

function notes()
{
	print "<p><i style=\"color:red\"><b>NOTE:</b> not all GMF updates have migrated to the new Update Manager site yet, " .
			"so you'll have to use the older sites until that time. See links at right.</i></p>\n";
}

update_manager("GMF", "Eclipse Modeling", $PRS, false);
?>
