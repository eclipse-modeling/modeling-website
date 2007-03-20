<?php
	# allows server-specific path assignment, eg., for build.eclipse.org
	$_SERVER['DOCUMENT_ROOT'] = $_SERVER["SERVER_NAME"] == "build.eclipse.org" ? "/opt/public/modeling" : $_SERVER['DOCUMENT_ROOT'];
?>
