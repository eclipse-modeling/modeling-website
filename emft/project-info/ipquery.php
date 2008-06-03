<?php
$product_id = 42; # EMFT
$committers = array( # taken from http://www.eclipse.org/projects/project_summary.php?projectid=modeling.emft
	"emerks" => "PMC",
	"nickb" => "releng",

	"drizov" => "emf4net",
	"rbihler" => "emf4net",
	"mboettger" => "emf4net",
	
	"sboehme" => "jrcm",
	
	"jcote" => "temporality",
	 
	"ttonelli" => "servus",
	
	"mgarcia" => "emfatic",
	"cdaly" => "emfatic",

	//"ahaase" => "mwe",
	//"fallilaire" => "mwe",
	"pfriese" => "mwe",
	"pschonbac" => "mwe",
	"sefftinge" => "mwe",
	"bkolb" => "mwe",
	//"jkohnlein" => "mwe",
	//"kthoms" => "mwe",
	//"mvoelter" => "mwe",

	"lbigearde" => "search",

	"cbrun" => "compare",
	//"jmusset" => "compare",
	"lgoubet" => "compare",
	//"atoulme" => "compare",

	"jlescot" => "ecoretools",
	"gcannente" => "ecoretools",
	"dsciamma" => "ecoretools",

	"pnehrer" => "mint",

	//"seberle" => "teneo",
	//"ssmith" => "teneo",
	"mtaal" => "teneo, cdo, texo",

	"estepper" => "net4j, cdo",
	"smcduff" => "cdo, temporality",
);

$extra_IP = array(
);

$third_party = array(
	"Apache Commons Logging Jar 1.0.4, maintained in Orbit, Apache License 2.0, unmodified entire package, 1946, search",
	"Apache Commons Line Interface 1.0, maintained in Orbit, Apache License 2.0, unmodified entire package, 1947, search",
	"Apache Commons Lang 2.1, maintained in Orbit, Apache License 2.0, unmodified entire package, 1948, search",
	
	"Apache Commons Logging Jar 1.0.4, Orbit, Apache License 2.0, , 224",
	"LPG Runtime and Generated OCL Parser 1, Orbit, , , 303",
	"Apache Tomcat 3.2.4, Historical Approval, Apache License 2.0, , 336",
	"org.apache.ant 1.6.5, Orbit, Apache License 2.0, , 1525",
	"org.apache.commons.logging 1.0.4.v200701082340, Orbit, Apache License 2.0, , 1526",
	"Apache Commons Line Interface 1.0, Orbit, Apache License 2.0, , 1527",
	"jpox-1.1.7.jar 1.1.7, , Apache 2.0, , 1555",
	"jdo2-api-2.0.jar 2.0, , Apache 2.0, not distributed; required for build, 1556",
	"JMS Spec 1.1 (Glassfish) (PB CQ1614), CDDL, , , 1769",
	"jackrabbit-jcr-rmi Jar 1.3, Orbit, , , 1858",
	"JavaCC from CVS (20070207) 4.0+, , New BSD, , 1863",
	"ANTLR runtime 3.0 (PB CQ1921), Orbit, , , 2218",
	"jcr-1.0.jar 1.0, , Day Spec License, , 2241",
	"wsdl4j-1.6.2.jar 1.6.2, Orbit, , , 2300"
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); 
if (isset($_GET["ganymede"])){ 
	$components = array("search", "compare", "ecoretools", "mint", 
						"teneo", "net4j", "cdo"); 
	$committers = filterCommitters($committers, $components); 
}
doIPQueryPage(); ?>