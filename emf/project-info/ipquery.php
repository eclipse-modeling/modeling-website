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
	"Tomcat 3.2.4, org.eclipse.emf.codegen/codegen.jar, Apache Software License, derivative work, 2335",
	"XML4J 4.3, org.eclipse.emf.ecore/ecore.jar, Apache Software License, derivative work, 338",
	"SDO 1.0 Specification Interfaces, org.eclipse.emf.ecore.commonj.sdo, Royalty-free license from IBM/BEA (see about.html), unmodified source, 2336",
	"Geronimo JMS Spec 1.1, /cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.net4j/examples/org.eclipse.net4j.jms.api/lib/geronimo-jms_1.1_spec-1.1.jar, dual license: EPL-compatible CDDL, unmodified source, 2338",
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); doIPQueryPage(); ?>