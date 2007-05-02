<?php
	# allows server-specific path assignment, eg., for build.eclipse.org
	$isBuildDotEclipseServer = $_SERVER["SERVER_NAME"] == "build.eclipse.org";
	$_SERVER['DOCUMENT_ROOT'] = $isBuildDotEclipseServer ? "/opt/public/modeling" : $_SERVER['DOCUMENT_ROOT'];
?>
