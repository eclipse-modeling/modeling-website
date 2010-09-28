<?php 
if ($_SERVER["SERVER_NAME"] != "www.eclipse.org") {
	header("Location: http://www.eclipse.org/modeling/mdt/updates/");
}
require_once ("../../includes/buildServer-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/updates-common.php");

$PRS = array(
	"EMF (XSD)" => "modeling/emf"
);

function notes()
{
	print "<p><i style=\"color:red\"><b>NOTE:</b> For XSD, use the <a href=\"/modeling/emf/updates/\">EMF Update Site</a>.</i></p>\n";
	print "<p><i>For MoDisco, use the <a href=\"http://wiki.eclipse.org/MoDisco/Updates\">MoDisco Update Site</a>.</i></p>\n";
}

update_manager("MDT", "Eclipse Modeling", $PRS, true);
?>
