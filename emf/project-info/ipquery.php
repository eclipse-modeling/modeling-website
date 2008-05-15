<?php
$product_id = 8; # EMF 
$committers = array(
	"davidms",
	"elena",
	"emerks",
	"marcelop",
	"nickb",
	"fbudinsky",
	"bportier",
	"khussey",
	"cdamus",
);

$extra_IP = array(
);

$third_party = array(
	"Tomcat 3.2.4, org.eclipse.emf.codegen/codegen.jar, Apache Software License, derivative work",
	"XML4J 4.3, org.eclipse.emf.ecore/ecore.jar, Apache Software License, derivative work",
	"SDO 1.0 Specification Interfaces, org.eclipse.emf.ecore.commonj.sdo, Royalty-free license from IBM/BEA (see about.html), unmodified source",
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); doIPQueryPage(); ?>