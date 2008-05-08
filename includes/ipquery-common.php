<?php
#
# Script for retrieving IP log information.
#

# Load up the classfile
require_once "/home/data/httpd/eclipse-php-classes/system/dbconnection_bugs_ro.class.php";

function doIPQuery($product_id, $isFormatted = true)
{
	# Connect to database
	$dbc 	= new DBConnectionBugs();
	$dbh 	= $dbc->connect();
						
	# NOTE: bug_status = 5 is RESOLVED, resolution = 2 is FIXED, 'contributed' keyword id = 22
	# for product_id, use:	
	# 8, EMF
	# 12, GMT
	# 29, GMF
	# 40, MDDi
	# 42, EMFT
	# 63, Modeling
	# 67, MDT
	# 71, M2M
	# 87, M2T
	# 105, Amalgam
	# 106, TMF
					
	$sql_info = "SELECT 
						attachments.filename,
						attachments.description,
						attachments.ispatch,
						attachments.bug_id,
						attachments.submitter_id,
						LENGTH(attach_data.thedata) AS size,
						bugs.short_desc,
						components.name,
						profiles.login_name
				FROM 
						attachments, attach_data, bugs, components, keywords, profiles 
				WHERE
						attachments.ispatch = 1 AND 
						attachments.isobsolete = 0 AND
						attachments.bug_id = bugs.bug_id AND 
						attachments.attach_id = attach_data.id AND 
						components.id = bugs.component_id AND 
						bugs.bug_id = keywords.bug_id AND 
						keywords.keywordid = 22 AND 
						profiles.userid = attachments.submitter_id AND 
						bugs.product_id = $product_id
				ORDER BY
						profiles.login_name";
												
	
	$rs = mysql_query($sql_info, $dbh);
	
	if(mysql_errno($dbh) > 0) {
		echo "There was an error processing this request: " . $sql_info . " : ";
		
		# For debugging purposes - don't display this stuff in a production page.
		echo mysql_error($dbh);
		
		# Mysql disconnects automatically, but I like my disconnects to be explicit.
		$dbc->disconnect();
		exit;
	}

	if ($isFormatted)
	{	
		print "		<table>\n			<tr><th>Component</th><th>Bug #</th><th>Contributor</th><th>Size</th><th>Description</th></tr>\n";
	}
	$bgcol = "#FFFFFF";
	while($myrow = mysql_fetch_assoc($rs)) {
		if ($isFormatted)
		{	
			$bgcol = "#FFFFFF" ? "#EEEEEE" : "#FFFFFF";
			$shortname = explode("@", $myrow['login_name']); $shortname = $shortname[0];
			print "<tr align=\"top\"><td><small style=\"font-size:8px\">" . $myrow['name'] . "</small></td><td nowrap=\"nowrap\">" .
				"<a href=\"/modeling/searchcvs.php?q=" . $myrow['bug_id'] . "\"><img src=\"/modeling/images/delta.gif\" border=\"0\" alt=\"Search CVS for bug " . $myrow['bug_id'] . "\"></a>&#160;" .  
				"<a href=\"https://bugs.eclipse.org/bugs/show_bug.cgi?id=" . $myrow['bug_id'] . "\">" . $myrow['bug_id'] . "</a>" . 
				"</td><td><acronym title=\"" . $myrow['login_name'] . "\">$shortname</acronym></td><td>" . $myrow['size'] . "</td>" .
				"<td width=\"100%\"><small style=\"font-size:8px\">" . str_replace(",", " ", $myrow['short_desc']) . "<br/>" . str_replace(",", " ", $myrow['description']) . "</small></td></tr>\n";
		}
		else
		{
			print $myrow['name'] . "," . $myrow['bug_id'] . "," . $myrow['login_name'] . "," . $myrow['size'] . "," . str_replace(",", " ", $myrow['short_desc']) . " (" . str_replace(",", " ", $myrow['description']) . ")\n";
		}
	}
	if ($isFormatted)
	{	
		print "		</table>\n";
	}
	
	$dbc->disconnect();
	
	$rs 		= null;
	$dbh 		= null;
	$dbc 		= null;
}

function doProductIDQuery()
{
	# Connect to database
	$dbc 	= new DBConnectionBugs();
	$dbh 	= $dbc->connect();
						
	$sql_info = "SELECT 
					products.id, 
					products.name
			FROM 
					products 
			ORDER BY
					products.id";
	
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
}
?>