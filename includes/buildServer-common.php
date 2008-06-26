<?php

# allows server-specific path assignment, eg., for build.eclipse.org
$isBuildDotEclipseServer = $_SERVER["SERVER_NAME"] == "build.eclipse.org";
if ($isBuildDotEclipseServer)
{
	if (isset ($_GET["debug"]))
	{
		ini_set('display_errors', 1);
		ini_set('error_reporting', E_ALL);
	}
	
	$docRootOverrides = array (
		"/opt/public/cbi",
		"/opt/public/modeling/public_html",
		"/opt/public/modeling",
		
	);
	foreach ($docRootOverrides as $dr)
	{
		if (is_dir($dr))
		{
			$_SERVER['DOCUMENT_ROOT'] = $dr;
			break;
		}
	}
}
?>