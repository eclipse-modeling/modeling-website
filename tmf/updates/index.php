<?php
if ($_SERVER["SERVER_NAME"] != "www.eclipse.org") {
	header("Location: http://www.eclipse.org/modeling/tmf/updates/");
}
require_once ("../../includes/buildServer-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/tmf/updates/updates-common.php");

$PRS = array(
"Xtext" => "modeling/tmf/xtext"
);

$siteXMLs = array("Releases" => "composite/releases/",
				 "Milestones" => "composite/milestones/",
				 "Nightly" => "composite/nightly/");

$MP_id = 1073;

function notes()
{
}

update_manager("TMF", "Eclipse Modeling", $PRS, false, true, $siteXMLs, $MP_id);
?>
