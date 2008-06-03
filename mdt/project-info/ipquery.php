<?php
$product_id = 67; # MDT 
$committers = array(
 	# taken from http://www.eclipse.org/projects/project_summary.php?projectid=modeling.mdt

	"khussey" => "PMC, uml2",
	"jbruck" => "uml2",

	"davidms" => "xsd",
	"emerks" => "xsd",
	"marcelop" => "xsd",
	"nickb" => "xsd, releng",

	"cdamus" => "ocl",

	"dcarlson" => "imm, sbvr",

	"lzhang" => "eodm",
	"yyang" => "eodm",

	"tfesenko" => "uml2tools",
	"sgribovsk" => "uml2tools",
	"mgolubev" => "uml2tools",
);

$extra_IP = array(
);

$third_party = array(
	"LPG Java Runtime v1.0,/cvsroot/technology/org.eclipse.emft/ocl/plugins/org.eclipse.emf.ocl/lib/lpgjavaruntime.jar,Eclipse Public License Version 1.0,unmodified entire package, 1080, ocl",
	"LPG Java Runtime v1.0,/cvsroot/tools/org.eclipse.orbit/net.sourceforge.lpg.lpgjavaruntime v1_0,Eclipse Public License Version 1.0,original lpgjavaruntime.jar repackaged as an OSGi bundle, 1080, ocl",
	"LPG Java Runtime v1.1,/cvsroot/tools/org.eclipse.orbit/net.sourceforge.lpg.lpgjavaruntime v1_1,Eclipse Public License Version 1.0,original lpgjavaruntime.jar repackaged as an OSGi bundle, 1081, ocl",
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); 
if (isset($_GET["ganymede"])){ 
	$components = array("ocl", "uml2", "uml2tools", "xsd"); 
	$committers = filterCommitters($committers, $components);
} 
doIPQueryPage(); ?>