<?php
$product_id = 8; # EMF 
$committers = array(
 	# taken from http://www.eclipse.org/projects/project_summary.php?projectid=modeling.emf
	"davidms" 	  => "emf, core, doc, edit, mapping, tools, xml/xmi, sdo",
	"emerks" => "PMC, emf, core, doc, edit, mapping, tools, xml/xmi, sdo",
	"marcelop" 	  => "emf, core, doc, edit, mapping, tools, xml/xmi, sdo, releng",
	"nickb" 	  => "emf, core, doc, edit, mapping, tools, xml/xmi, sdo, releng",
	"khussey" 	  => "emf, core, doc, edit, mapping, tools, xml/xmi",
	
	"cdamus" => "query, validation, transaction",

	"estepper" => "net4j, cdo",
	"smcduff" => "cdo",
	"mtaal" => "teneo, cdo", 

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
	
	"JMS Spec Version: 1.1 (Glassfish), /cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.net4j/examples/org.eclipse.net4j.jms.api, EPL-compatible CDDL, unmodified binary, 2338, net4j",
	"Apache Commons Codec 1.3, /cvsroot/tools/org.eclipse.orbit/org.apache.commons.codec, EPL 1.0, original jar repackaged as OSGi bundle, 2339, net4j", 
	"Apache HttpClient 3.1, /cvsroot/tools/org.eclipse.orbit/org.apache.commons.httpclient, EPL 1.0, original jar repackaged as OSGi bundle, 2340, net4j", 
	"Apache Derby 10.1.2.1, /cvsroot/tools/org.eclipse.orbit/org.apache.derby, EPL 1.0, original jar repackaged as OSGi bundle, 2341, net4j", 

	# may need these according to https://bugs.eclipse.org/bugs/show_bug.cgi?id=227333#c26
	#"hsqldb.jar, org.eclipse.net4j.db.hsqldb, , not distributed; required for build, , net4j",
	#"mysql-connector-java-5.1.5-bin.jar, org.eclipse.net4j.db.mysql, , not distributed; required for build, , net4j",

	# may need these according to https://bugs.eclipse.org/bugs/show_bug.cgi?id=227333#c26
	#"asm.jar, org.eclipse.emf.cdo.server.hibernate.libraries, , not distributed; required for build, , cdo",
	#"cglib-2.1.3.jar, org.eclipse.emf.cdo.server.hibernate.libraries, , not distributed; required for build, , cdo",
	#"commons-collections-2.1.1.jar, org.eclipse.emf.cdo.server.hibernate.libraries, , not distributed; required for build, , cdo",
	#"dom4j-1.6.1.jar, org.eclipse.emf.cdo.server.hibernate.libraries, , not distributed; required for build, , cdo",
	#"hibernate3.jar, org.eclipse.emf.cdo.server.hibernate.libraries, , not distributed; required for build, , cdo",
	#"jta.jar, org.eclipse.emf.cdo.server.hibernate.libraries, , not distributed; required for build, , cdo",

	# not yet shipped or part of the build, only ref'd in CVS
	#"spring-2.5.4/spring-beans.jar, runtime plugins dir, , not distributed; required for build, , cdo",
	#"spring-2.5.4/spring-context.jar, runtime plugins dir, , not distributed; required for build, , cdo",
	#"spring-2.5.4/spring-core.jar, runtime plugins dir, , not distributed; required for build, , cdo",

	# for Ganymede 2008, these two are not included in delivered code; may need to re-add for Io 2009		
	#"jpox-1.1.7.jar 1.1.7, org.eclipse.emf.teneo.jpox.libraries, Apache 2.0, not distributed; required for build, 2393, teneo",
	#"jdo2-api-2.0.jar 2.0, , Apache 2.0, not distributed; required for build, 2394, teneo", 

);

if (isset($_GET["emf"])){ 
	$components = array("emf", "core", "doc", "edit", "mapping", "tools", "xml/xmi"); 
} 
require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); doIPQueryPage(); ?>