<?php
require_once ("../../includes/buildServer-common.php");

$dirs = array(
	"HEAD" => "/opt/public/modeling/searchcvs/cvssrc/org.eclipse.xsd",
	"R2_2_maintenance" => "/opt/public/modeling/searchcvs/cvssrc_branches/org.eclipse.xsd-R2_2_maintenance",
	"R2_1_maintenance" => "/opt/public/modeling/searchcvs/cvssrc_branches/org.eclipse.xsd-R2_1_maintenance",
	"R2_0_maintenance" => "/opt/public/modeling/searchcvs/cvssrc_branches/org.eclipse.xsd-R2_0_maintenance"
);

include_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/versionaudit-common.php");
?>
