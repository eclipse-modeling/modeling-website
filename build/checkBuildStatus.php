<?php
/* Copyright (c) 2007 ibm, made available under EPL v1.0
 * Contributors Nick Boldt
 *
 * The common parameter parsing module for the REST web-api
 * for retrieving data from the database. This is NOT part
 * of the public web-api.
 *
 * top=name
 * project=name
 * version=x.y.z
 * buildID=AyyyymmddHHMM, where A = {N, I, M, S, R}
 *
 * All 4 values are required.
 */

ini_set('display_errors', 1); ini_set('error_reporting', E_ALL);
$debug = isset($_GET["debug"]) ? $_GET["debug"] : 0;
$data = loadHttpGetVars();
$PR = isset($data["top"]) ?  "modeling/" . $data["top"] : "";
$projct = isset($data["project"]) ?  $data["project"] : "";
$hadLoadDirSimpleError = 1; //have we echoed the loadDirSimple() error msg yet? if 1, omit error; if 0, echo at most 1 error
require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/scripts.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/downloads-scripts.php");

if (sizeof($data)<4)
{
	echo "Must specify project, component, version, and buildID: ?html&amp;top=emf&amp;project=query&amp;version=1.1.0&amp;buildID=R200706201159\n\n";
	exit;
}

$html = isset($_GET["html"]);

header($html ? "Content-Type: text/html\n\n" : "Content-Type: text/plain\n\n");
print showBuildResults("/home/www-data/build/modeling/" . $data["top"] . "/" . $data["project"] . "/downloads/drops/", $data["version"] . "/" . $data["buildID"] . "/", $html);

/**********************************************************************************************************************************/

function loadHttpGetVars()
{
	global $debug;
	$data = array();
	$input_patterns = array(
		/* regex => array(http get vars) */
		"#([a-z0-9]+)#" => array("top","project"),
		"#([0-9\.]{5})#" => array("version"),
		"#([NIMSR][0-9]{12})#" => array("buildID"),
	);

	foreach($input_patterns as $regex => $httpfieldnames)
	{
		foreach ($httpfieldnames as $httpfieldname)
		{
			$param = isset($_GET[$httpfieldname]) ? $_GET[$httpfieldname] : null;
			if ($debug)
			{
				print "<pre>     [$regex][$httpfieldname] Got \$param = $param     </pre>\n";
			}
			if ($param)
			{
				if (preg_match($regex, $param, $matches))
				{
		  			$data[$httpfieldname] = $param;
		  		}
			}
		}
	}
	return $data;
}


?>
