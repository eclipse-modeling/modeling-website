<?php

/**
 * [Bug 474734] [security] xss vulnerability on mmt website
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