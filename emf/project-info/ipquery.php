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
	"XML4J 4.3, org.eclipse.emf.ecore/ecore.jar, Apache Software License, derivative work, 338, EMF",
	"Tomcat 3.2.4, org.eclipse.emf.codegen/codegen.jar, Apache Software License, derivative work, 2335, EMF",
	"SDO 1.0 Specification Interfaces, org.eclipse.emf.ecore.commonj.sdo, Royalty-free license from IBM/BEA (see about.html), unmodified source, 2336, SDO",
	"Geronimo JMS Spec 1.1, /cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.net4j/examples/org.eclipse.net4j.jms.api/lib/geronimo-jms_1.1_spec-1.1.jar, EPL-compatible CDDL, unmodified binary, 2338, Net4j",
	"Apache Commons Codec 1.3, /cvsroot/tools/org.eclipse.orbit/org.apache.commons.codec_1.3.0.v200803061910.jar, EPL 1.0, original jar repackaged as OSGi bundle, 2339, Net4j", 
	"Apache HttpClient 3.1, /cvsroot/tools/org.eclipse.orbit/org.apache.commons.httpclient_3.1.0.v200803061910.jar, EPL 1.0, original jar repackaged as OSGi bundle, 2340, Net4j", 
	"Apache Derby 10.1.2.1, /cvsroot/tools/org.eclipse.orbit/org.apache.derby_10.1.2.1_v200803061811.jar, EPL 1.0, original jar repackaged as OSGi bundle, 2341, Net4j", 
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); doIPQueryPage(); ?>