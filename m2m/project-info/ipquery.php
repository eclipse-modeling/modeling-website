<?php
$product_id = 71; # M2M
$committers = array(
 	# taken from http://www.eclipse.org/projects/project_summary.php?projectid=modeling.m2m
 	"qglineur" => "qvt",
 	"mbarbero" => "atl",
 	"sboyko" => "qvt",
 	"radvorak" => "qvt",
 	"aigdalov" => "qvt",
	"fjouault" => "atl, inf, qvt",
	"wpiers" => "atl",
	"dwagelaar" => "atl",

	"fallilaire" => "atl",
	"mbohlen" => "atl",
	"mfeldman" => "qvt",
);

$extra_IP = array(
);

$third_party = array(
	"ANTLR Runtime v3.0.0, cvsroot/tools/org.eclipse.orbit/org.antlr.runtime v3_0_0, Eclipse Public License Version 1.0, original antlrruntime.jar repackaged as an OSGi bundle, 1548, atl",
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); 
if (isset($_GET["ganymede"])){ 
	$components = array("atl", "qvt");
	$committers = filterCommitters($committers, $components); 
}
doIPQueryPage(); ?>