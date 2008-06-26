<?php
	# allows server-specific path assignment, eg., for build.eclipse.org
	$isBuildDotEclipseServer = $_SERVER["SERVER_NAME"] == "build.eclipse.org";
	if ($isBuildDotEclipseServer && isset($_GET["debug"]))
	{
		ini_set('display_errors', 1); ini_set('error_reporting', E_ALL);
	}
	$_SERVER['DOCUMENT_ROOT'] = $isBuildDotEclipseServer ? "/opt/public/modeling" : $_SERVER['DOCUMENT_ROOT'];
	if (!is_dir ($_SERVER['DOCUMENT_ROOT']))
	{
		$_SERVER['DOCUMENT_ROOT'] = $isBuildDotEclipseServer ? "/opt/public/cbi" : $_SERVER['DOCUMENT_ROOT'];
	}
 ?>