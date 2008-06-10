<?php
$product_id = 8; # EMF 
$committers = array(
 	# taken from http://www.eclipse.org/projects/project_summary.php?projectid=modeling.emf
	"davidms" => "emf, sdo",
	"emerks" => "PMC, emf, sdo",
	"marcelop" => "emf, sdo, releng",
	"nickb" => "emf, sdo, releng",
	"khussey" => "emf",
	"cdamus" => "query, validation, transaction",
	"estepper" => "net4j, cdo",
	"smcduff" => "cdo",
	"mtaal" => "teneo", 
	"seberle" => "teneo",
	"ssmith" => "teneo",
	
//	"fbudinsky" => "inactive",
//	"bportier" => "inactive",
//	"elena" => "inactive",
);

$extra_IP = array(
);

$third_party = array(
	"XML4J 4.3, org.eclipse.emf.ecore/ecore.jar, Apache Software License, derivative work, 338, emf",
	"Tomcat 3.2.4, org.eclipse.emf.codegen/codegen.jar, Apache Software License, derivative work, 2335, emf",
	"SDO 1.0 Specification Interfaces, org.eclipse.emf.ecore.commonj.sdo, Royalty-free license from IBM/BEA (see about.html), unmodified source, 2336, sdo",
	"Geronimo JMS Spec 1.1, /cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.net4j/examples/org.eclipse.net4j.jms.api/lib, EPL-compatible CDDL, unmodified binary, 2338, sdo",
	"Apache Commons Codec 1.3, /cvsroot/tools/org.eclipse.orbit/org.apache.commons.codec, EPL 1.0, original jar repackaged as OSGi bundle, 2339, net4j", 
	"Apache HttpClient 3.1, /cvsroot/tools/org.eclipse.orbit/org.apache.commons.httpclient, EPL 1.0, original jar repackaged as OSGi bundle, 2340, net4j", 
	"Apache Derby 10.1.2.1, /cvsroot/tools/org.eclipse.orbit/org.apache.derby, EPL 1.0, original jar repackaged as OSGi bundle, 2341, net4j", 
	"JMS Spec 1.1 (Glassfish) (PB CQ1614), CDDL, , , 2338, net4j",

	# for Ganymede 2008, these two are not included in delivered code; may need to re-add for Io 2009		
	#"jpox-1.1.7.jar 1.1.7, , Apache 2.0, not distributed; required for build, 2393, teneo",
	#"jdo2-api-2.0.jar 2.0, , Apache 2.0, not distributed; required for build, 2394, teneo", 

	
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); doIPQueryPage(); ?>