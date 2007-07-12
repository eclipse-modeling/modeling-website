<?php

$dirs = array();
if (isset($_GET["project"]) && $_GET["project"] == "sdo")
{
	$dirs = array(
		"HEAD" => "/opt/public/modeling/searchcvs/cvssrc/org.eclipse.emf.ecore.sdo",
		"R2_2_maintenance" => "/opt/public/modeling/searchcvs/cvssrc_branches/org.eclipse.emf.ecore.sdo-R2_2_maintenance",
		"R2_1_maintenance" => "/opt/public/modeling/searchcvs/cvssrc_branches/org.eclipse.emf.ecore.sdo-R2_1_maintenance",
		"R2_0_maintenance" => "/opt/public/modeling/searchcvs/cvssrc_branches/org.eclipse.emf.ecore.sdo-R2_0_maintenance"
	);
}
else if (isset($_GET["project"]) && $_GET["project"] == "emf")
{
	$dirs = array(
		"HEAD" => "/opt/public/modeling/searchcvs/cvssrc/org.eclipse.emf",
		"R2_2_maintenance" => "/opt/public/modeling/searchcvs/cvssrc_branches/org.eclipse.emf-R2_2_maintenance",
		"R2_1_maintenance" => "/opt/public/modeling/searchcvs/cvssrc_branches/org.eclipse.emf-R2_1_maintenance",
		"R2_0_maintenance" => "/opt/public/modeling/searchcvs/cvssrc_branches/org.eclipse.emf-R2_0_maintenance"
	);
}

include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/versionaudit-common.php");
?>
