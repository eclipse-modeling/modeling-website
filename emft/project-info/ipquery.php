<?php

/**
 * Bug 477734 - [SECURITY] Xss + SQL INJECTION
 *
 * SQL injection is a code injection technique,
 * used to attack data-driven applications, in which malicious
 * SQL statements are inserted into an entry field for execution
 * (e.g. to dump the database contents to the attacker).
 *
 * Cross-Site Scripting (XSS) vulnerabilities are a type of
 * computer security vulnerability typically found in Web applications.
 * XSS vulnerabilities enable attackers to inject client-side script
 * into Web pages viewed by other users.
 *
 * Given the severity of this bug, we added an exit() at the top
 * of this file to stop it from being executed on our servers.
 *
 * The owner(s) of this website should review every request to MYSQL before
 * removing the exit() on this page.
 *
 */
exit();

$product_id = 42; # EMFT
$committers = array( # taken from http://www.eclipse.org/projects/project_summary.php?projectid=modeling.emft
	"emerks" => "PMC",
	"nickb" => "releng",

	"drizov" => "emf4net",
	"rbihler" => "emf4net",
	"mboettger" => "emf4net",

	"sboehme" => "jcrm",

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

	"mtaal" => "texo",

	"smcduff" => "temporality",
);

$extra_IP = array(
);

$third_party = array(
	"Apache Commons Logging Jar 1.0.4, Orbit, Apache 2.0, ?, 224, ",

	"JavaCC from CVS (20070207) 4.0+, , New BSD, , 1863, emfatic",
	"ANTLR runtime 3.0 (PB CQ1921), Orbit, , , 2218, emfatic",

	"jackrabbit-jcr-rmi Jar 1.3, Orbit, , , 1858, jcrm",
	"jcr-1.0.jar 1.0, , Day Spec License, , 2241, jcrm",

	"org.apache.ant 1.6.5, Orbit, Apache 2.0, ?, 1525, mwe",
	"org.apache.commons.logging 1.0.4.v200701082340, Orbit, Apache 2.0, ?, 1526, mwe",
	"Apache Commons Line Interface 1.0, Orbit, Apache 2.0, ?, 1527, mwe",

	"Apache Commons Logging Jar 1.0.4, Orbit, Apache 2.0, unmodified entire package, 1946, search",
	"Apache Commons Line Interface 1.0, Orbit, Apache 2.0, unmodified entire package, 1947, search",
	"Apache Commons Lang 2.1, Orbit, Apache 2.0, unmodified entire package, 1948, search",

	"wsdl4j-1.6.2.jar 1.6.2, Orbit, , , 2300, servus",

	/* Stuff that has moved to another project */

	//"Apache Commons Codec 1.3, /cvsroot/tools/org.eclipse.orbit/org.apache.commons.codec, EPL 1.0, original jar repackaged as OSGi bundle, 2339, net4j",
	//"Apache HttpClient 3.1, /cvsroot/tools/org.eclipse.orbit/org.apache.commons.httpclient, EPL 1.0, original jar repackaged as OSGi bundle, 2340, net4j",
	//"Apache Derby 10.1.2.1, /cvsroot/tools/org.eclipse.orbit/org.apache.derby, EPL 1.0, original jar repackaged as OSGi bundle, 2341, net4j",
	//"JMS Spec 1.1 (Glassfish) (PB CQ1614), CDDL, , , 1769, net4j",

	//"jpox-1.1.7.jar 1.1.7, , Apache 2.0, , 1555, teneo",
	//"jdo2-api-2.0.jar 2.0, , Apache 2.0, not distributed; required for build, 1556, teneo",

	//"LPG Runtime and Generated OCL Parser 1, Orbit, , moved to MDT per CQ 1080, 303, ocl",
	//"Apache Tomcat 3.2.4, Historical Approval, Apache 2.0, moved to M2T per CQ 2335, 336, jet",
);

if (isset($_GET["ganymede"])){
	$components = array("search", "compare", "ecoretools", "mint");
}
require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php");
doIPQueryPage(); ?>