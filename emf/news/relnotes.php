<?php
require_once ("../../includes/buildServer-common.php");

$pageTitle = "Eclipse Modeling - EMF - Release Notes";

if (isset($_GET["project"]) && $_GET["project"] == "xsd")
{
	header("Location: http://www.eclipse.org/modeling/mdt/news/relnotes.php?project=xsd&version=HEAD");
	exit;
}

// bleeding edge for emf only
if (isset($_GET["project"]) && $_GET["project"] == "emf")
{
	require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/emf/downloads/extras-emf.php");
	$extras = array("doBleedingEdge");
}

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-common.php");
?>
