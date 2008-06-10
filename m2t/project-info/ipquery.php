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
	"Tomcat 3.2.4, cvsroot/modeling/org.eclipse.m2t/org.eclipse.jet/plugins/org.eclipse.jet.core/src/org/eclipse/jet/internal/core/parser/jasper, Apache Software License 1.1, derivative work, 2335, jet",
	"Tomcat 3.2.4, Historical Approval, Apache 2.0, moved to M2T per CQ 2335, 336, jet",
);

if (isset($_GET["ganymede"])){ 
	$components = array("jet"); 
}
require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); 
doIPQueryPage(); ?>