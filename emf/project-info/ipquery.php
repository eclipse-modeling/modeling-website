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
);

# added according to https://bugs.eclipse.org/bugs/show_bug.cgi?id=227333#c26
$third_party_works_with = array(
	"asm.jar 1.5.3, , <a href=\"http://asm.objectweb.org/license.html\">ObjectWeb License</a>, used for build/test; optional at runtime; not in CVS; not shipped, 2427, teneo",
	"bcel-5.1.jar, , <a href=\"http://jakarta.apache.org/bcel/\">Apache</a> 2.0, used for build/test; optional at runtime; not in CVS; not shipped, 2435, teneo",
	"cglib-2.1.3.jar, , Apache 2.0, used for build/test; optional at runtime; not in CVS; not shipped, 2428, teneo",
	"commons-collections.jar 2.1.1, , Apache 2.0, used for build/test; optional at runtime; not in CVS; not shipped, 2429, teneo",
	"commons-logging.jar 1.0.4, , Apache 2.0, used for build/test; optional at runtime; not in CVS; not shipped, 2436, teneo",
	"dom4j-1.6.1.jar, , <a href=\"http://www.dom4j.org/license.html\">BSD style</a>, used for build/test; optional at runtime; not in CVS; not shipped, 2430, teneo",
	"hibernate3.jar 3.2.5 GA, , LGPL 2.1, used for build/test; optional at runtime; not in CVS; not shipped, 2431, teneo",
	"jdo2-api-2.0.jar, , Apache 2.0, used for build/test; optional at runtime; not in CVS; not shipped, 2394, teneo", # also 2433
	"jpox-1.1.7.jar, org.eclipse.emf.teneo.jpox.libraries, Apache 2.0, used for build/test; optional at runtime; not in CVS; not shipped, 2393, teneo",
	"jpox-1.1.9.jar, org.eclipse.emf.teneo.jpox.libraries, Apache 2.0, used for build/test; optional at runtime; not in CVS; not shipped, 2434, teneo",
	"jta.jar, , <a href=\"http://java.sun.com/products/jta/index.html\">Sun Binary License</a>, used for build/test; optional at runtime; not in CVS; not shipped, 2432, teneo",

	"asm.jar 1.5.3, org.eclipse.emf.cdo.server.hibernate.libraries, <a href=\"http://asm.objectweb.org/license.html\">ObjectWeb License</a>, used for build/test; optional at runtime; not in CVS; not shipped, 2418, cdo",
	"cglib-2.1.3.jar, org.eclipse.emf.cdo.server.hibernate.libraries, Apache 2.0, used for build/test; optional at runtime; not in CVS; not shipped, 2419, cdo",
	"commons-collections-2.1.1.jar, org.eclipse.emf.cdo.server.hibernate.libraries, Apache 2.0, used for build/test; optional at runtime; not in CVS; not shipped, 2420, cdo",
	"hibernate3.jar 3.2.5 GA, org.eclipse.emf.cdo.server.hibernate.libraries, LGPL 2.1, used for build/test; optional at runtime; not in CVS; not shipped, 2422, cdo",
	"jta.jar, org.eclipse.emf.cdo.server.hibernate.libraries, <a href=\"http://java.sun.com/products/jta/index.html\">Sun Binary License</a>, used for build/test; optional at runtime; not in CVS; not shipped, 2423, cdo",

	"hsqldb.jar 1.8.0.8, org.eclipse.net4j.db.hsqldb, <a href=\"http://hsqldb.org/web/hsqlLicense.html\">HSQL License</a>, used for build/test; optional at runtime; not in CVS; not shipped, 2424, net4j",
	"mysql-connector-java-5.1.5-bin.jar, org.eclipse.net4j.db.mysql, GPL v2, used for build/test; optional at runtime; not in CVS; not shipped, 2425, net4j",

	# not yet shipped or part of the build, only ref'd in CVS
	#"spring-2.5.4/spring-beans.jar, runtime plugins dir, , not distributed; required for build, , cdo",
	#"spring-2.5.4/spring-context.jar, runtime plugins dir, , not distributed; required for build, , cdo",
	#"spring-2.5.4/spring-core.jar, runtime plugins dir, , not distributed; required for build, , cdo",
);

if (isset($_GET["emf"])){ 
	$components = array("emf", "core", "doc", "edit", "mapping", "tools", "xml/xmi"); 
} 
require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); doIPQueryPage(); ?>