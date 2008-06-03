<?php
$product_id = 87; # M2T
$committers = array(
 	# taken from http://www.eclipse.org/projects/project_summary.php?projectid=modeling.m2t
	"pelder" => "PMC, jet",
	"nboldt" => "releng",
	"bkolb" => "",
	"cbrun" => "",
	"sefftinge" => "",
	"lgoubet" => "", 
	"jkohnlein" => "",
	"pschonbac" => "",
	"jmusset" => "",
	"ahaase" => "",
);

$extra_IP = array(
);

$third_party = array(
	"Tomcat 3.2.4, cvsroot/modeling/org.eclipse.m2t/org.eclipse.jet/plugins/org.eclipse.jet.core/src/org/eclipse/jet/internal/core/parser/jasper, Apache Software License 1.1, derivative work, 336, jet",
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); 
if (isset($_GET["ganymede"])){ 
	$components = array("jet"); 
	$committers = filterCommitters($committers, $components); 
}
doIPQueryPage(); ?>