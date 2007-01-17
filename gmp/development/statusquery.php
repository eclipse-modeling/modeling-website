<?php
	#
	# Script for retrieving active items per assignee.
	#

	# Load up the classfile
	require_once "/home/data/httpd/eclipse-php-classes/system/dbconnection_bugs_ro.class.php";
	
	# Connect to database
	$dbc 	= new DBConnectionBugs();
	$dbh 	= $dbc->connect();
	
	$target = str_replace("_", " ", $_GET['target']);
	if( $target == "" ) {
	   $target = "2.0 M3";
	}
	$product = str_replace("_", " ", $_GET['product']);
	if( $product == "" ) {
	   $product = "GMF";
	}
						
	# NOTE: product_id = 29 is GMF
						
	$sql_info = "SELECT 
						bugs.bug_id,
						bugs.assigned_to,
						bugs.short_desc, 
						bugs.priority,
						bugs.bug_severity,
						bugs.target_milestone,
						bugs.bug_status,
						profiles.realname,
						profiles.login_name,
						products.name
				FROM 
						bugs
						INNER JOIN profiles ON profiles.userid = bugs.assigned_to
						INNER JOIN products ON products.id = bugs.product_id
				WHERE
						products.name = '" . $product . "' AND bugs.target_milestone = '" . $target . "'
				ORDER BY profiles.realname, bugs.target_milestone, bugs.bug_status, bugs.priority";
	
	$rs = mysql_query($sql_info, $dbh);
	
	if(mysql_errno($dbh) > 0) {
		echo "There was an error processing this request";
		
		# For debugging purposes - don't display this stuff in a production page.
		echo mysql_error($dbh);
		
		# Mysql disconnects automatically, but I like my disconnects to be explicit.
		$dbc->disconnect();
		exit;
	}
	
	$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
	$xml .= "<?xml-stylesheet type=\"text/xsl\" href=\"status.xsl\"?>";
	$xml .= "<items project=\"" . $product . "\" range=\"" . $target . "\">";
	
	while($myrow = mysql_fetch_assoc($rs)) {
		$xml .= "<item assignee=\"" . $myrow['realname'] . "\" id=\"" . $myrow['bug_id'] . "\" priority=\"" . $myrow['priority'] . "\" severity=\"" . $myrow['bug_severity'] . "\" status=\"" . $myrow['bug_status'] . "\">";
		$xml .= "  <description><![CDATA[" . $myrow['short_desc'] . "]]></description>";
		$xml .= "</item>";
	}
	
	$xml .= "</items>";
	
	$dbc->disconnect();

	$rs 		= null;
	$dbh 		= null;
	$dbc 		= null;
	
	echo $xml;

?>