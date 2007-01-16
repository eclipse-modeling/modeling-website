<?php

$pageTitle = "Eclipse Modeling - MDT - Release Notes";

// temporary hack
if (isset($_GET["project"]))
{
	if ($_GET["project"] == "uml2") { $_GET["project"] = "uml2-uml"; }
	if ($_GET["project"] == "ocl")  { $_GET["project"] = "uml2-ocl"; }
}

require ($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-common.php");
?>
