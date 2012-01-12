<?php
if ($_SERVER["SERVER_NAME"] != "www.eclipse.org") {
	header("Location: http://www.eclipse.org/modeling/tmf/updates/");
}
require_once ("../../includes/buildServer-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/tmf/updates/updates-common.php");

$PRS = array(
"TMF Xtext" => "modeling/tmf/xtext"
);

$siteXMLs = array("Releases (R)" => "releases/",
				 "Milestones &amp; RCs (S)" => "milestones/",
				 "Nightly Builds (N)" => "nightly/");


function notes()
{
}

update_manager("TMF", "Eclipse Modeling", $PRS, false, true, $siteXMLs);
?>
