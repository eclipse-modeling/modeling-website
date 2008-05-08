<?php
#
# Script for retrieving product_id
#

# Load up the classfile
require_once "/home/data/httpd/eclipse-php-classes/system/dbconnection_bugs_ro.class.php";

# Connect to database
$dbc 	= new DBConnectionBugs();
$dbh 	= $dbc->connect();
					
# NOTE: product_id = 29 is GMF, bug_status = 5 is RESOLVED, resolution = 2 is FIXED, 'contributed' keyword id = 22	
					
$sql_info = "SELECT 
					products.id, 
					products.name
			FROM 
					products 
			ORDER BY products.id";
	
	$rs = mysql_query($sql_info, $dbh);
	
	if(mysql_errno($dbh) > 0) {
		echo "There was an error processing this request: " . $sql_info . " : ";
		
		# For debugging purposes - don't display this stuff in a production page.
		echo mysql_error($dbh);
		
		# Mysql disconnects automatically, but I like my disconnects to be explicit.
		$dbc->disconnect();
		exit;
	}

	while($myrow = mysql_fetch_assoc($rs)) {
		print $myrow['id'] . ", " . $myrow['name'] . "\n";
	}
	
	$dbc->disconnect();
	
	$rs 		= null;
	$dbh 		= null;
	$dbc 		= null;
?>