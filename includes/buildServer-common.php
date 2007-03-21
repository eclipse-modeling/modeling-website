<?php
	# allows server-specific path assignment, eg., for build.eclipse.org
	if ($_SERVER["SERVER_NAME"] == "build.eclipse.org")
	{
		$_SERVER['DOCUMENT_ROOT'] = "/opt/public/modeling";
		$writableBuildRoot = "/opt/public/modeling"; 
	}
	else
	{
		#$_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'];
		$writableBuildRoot = "/home/www-data"; 
		
	}
?>
