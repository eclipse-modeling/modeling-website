<?php
$pageTitle = "Eclipse Modeling - EMF - Release Notes";

$cvsprojs = array(
	"emf" => "org.eclipse.emf",
	"xsd" => "org.eclipse.xsd"
);

if (isset($_GET["project"]) && $_GET["project"] == "xsd")
{
	header("Location: http://www.eclipse.org/modeling/mdt/news/relnotes.php?project=xsd&version=HEAD");
	exit;
}

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/relnotes-common.php");
?>
