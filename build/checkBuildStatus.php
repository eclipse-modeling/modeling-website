<?php
/* Copyright (c) 2007 IBM, made available under EPL v1.0
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

$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
$isBuildServer = (preg_match("/^(emft|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"])) || $isEMFserver;
$isBuildDotEclipseServer = $_SERVER["SERVER_NAME"] == "build.eclipse.org";
$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$isEclipseCluster = (preg_match("/^(?:www.||download.|download1.|build.)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$debug = (isset ($_GET["debug"]) && preg_match("/^\d+$/", $_GET["debug"]) ? $_GET["debug"] : -1);
$writableRoot = ($isBuildServer ? $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/" : "/home/data/httpd/writable/www.eclipse.org/");
$writableBuildRoot = $isBuildDotEclipseServer ? "/opt/public/modeling" : "/home/www-data";

$data = loadHttpGetVars();
$PR = isset($data["top"]) ?  "modeling/" . $data["top"] : "";
$projct = isset($data["project"]) ?  $data["project"] : "";
$html = isset($_GET["html"]);

require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/buildServer-common.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/scripts.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/downloads-scripts.php");
$hadLoadDirSimpleError = 1;

header($html ? "Content-Type: text/html\n\n" : "Content-Type: text/plain\n\n");
if (sizeof($data)<4)
{
	echo "Must specify top project, sub project (component), version, and buildID:\n\n" .
		"  " . $_SERVER['SCRIPT_NAME'] . "?top=emf&amp;project=query&amp;version=1.1.0&amp;buildID=R200706201159\n" .
		"  " . $_SERVER['SCRIPT_NAME'] . "?top=emf&amp;project=query&amp;version=1.1.0&amp;buildID=R200706201159&amp;html\n";
	exit;
}

if (is_readable("/home/www-data/build/modeling/" . $data["top"] . "/" . $data["project"] . "/downloads/drops/" . $data["version"] . "/" . $data["buildID"] . "/"))
{
	$buildResults = showBuildResults("/home/www-data/build/modeling/" . $data["top"] . "/" . $data["project"] . "/downloads/drops/", $data["version"] . "/" . $data["buildID"] . "/", $html);
	if ($html)
	{
		print $buildResults[0] . "<br/>\n";
		print '<a href="' . $buildResults[1] . '">Test Results</a>' . "<br/>\n";
		print '<a href="' . $buildResults[2] . '">Build Log</a>' . "<br/>\n";
	}
	else
	{
		print "Status\t" . $buildResults[0] ."\n";
		print "Test Results\t" . $buildResults[1] ."\n";
		print "Build Log\t" . $buildResults[2] ."\n";
	}
}
else
{
	print "STATUS UNKNOWN for modeling/" . $data["top"] . "/" . $data["project"] . "/downloads/drops/" . $data["version"] . "/" . $data["buildID"] . "\n";
}

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
			if ($debug > 0)
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
