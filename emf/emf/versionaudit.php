<?php
require_once ("../../includes/buildServer-common.php");

$dirs = array(
	"HEAD" => "/opt/public/modeling/searchcvs/cvssrc/emf-org.eclipse.emf",
	"R2_3_maintenance" => "/opt/public/modeling/searchcvs/cvssrc_branches/emf-org.eclipse.emf-R2_3_maintenance",
	"R2_2_maintenance" => "/opt/public/modeling/searchcvs/cvssrc_branches/emf-org.eclipse.emf-R2_2_maintenance",
	"R2_1_maintenance" => "/opt/public/modeling/searchcvs/cvssrc_branches/emf-org.eclipse.emf-R2_1_maintenance",
	"R2_0_maintenance" => "/opt/public/modeling/searchcvs/cvssrc_branches/emf-org.eclipse.emf-R2_0_maintenance"
);

include_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/versionaudit-common.php");
?>
