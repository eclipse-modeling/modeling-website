<html>
	<head></head>
	<body>
	
Committers (Section 1)<br/>
<br/>
ahunter<br/>
atikhomirov<br/>
bblajer<br/>
crevells<br/>
mfeldman<br/>
rgronback<br/>
sshaw<br/>
vramaswamy<br/>
ldamus<br/>
mmostafa<br/>
dstadnik<br/>
ashatalin<br/>
rdvorak<br/>
<br/>
Developers (Section 2)<br/>
<br/>
		<b>component, bug #, contributor, size, description</b><br/>
		<?php
			#
			# Scripts for retrieving IP log information.
			#
		
			# Load up the classfile
			require_once "/home/data/httpd/eclipse-php-classes/system/dbconnection_bugs_ro.class.php";
			
			# Connect to database
			$dbc 	= new DBConnectionBugs();
			$dbh 	= $dbc->connect();
								
			# NOTE: product_id = 29 is GMF, bug_status = 5 is RESOLVED, resolution = 2 is FIXED, 'contributed' keyword id = 22	
								
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
								bugs.product_id = 29
						ORDER BY profiles.login_name";
														
			
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
				echo $myrow['name'] . "," . "<a href=\"https://bugs.eclipse.org/bugs/show_bug.cgi?id=" . $myrow['bug_id'] . "\">" . $myrow['bug_id'] . "</a>" . "," . $myrow['login_name'] . "," . $myrow['size'] . "," . str_replace(",", " ", $myrow['short_desc']) . " (" . str_replace(",", " ", $myrow['description']) . ")<br/>";
			}
			
			$dbc->disconnect();
		
			$rs 		= null;
			$dbh 		= null;
			$dbc 		= null;
		?>
<br/>	
xPand template engine (org.eclipse.gmf.xpand, org.eclipse.gmf.xpand.editor), originally developed by Sven Efftinge for oAW component in GMT project, was refactored for application in GMF by Artem Tikhomirov.
<br/>
Third Party Software (Section 3)<br/>
<br/>
org.apache.batik_1.6,cvsroot/modeling/org.eclipse.gmf/plugins/org.apache.batik,Apache License Version 2.0 January 2004,unmodified entire package<br/>
org.apache.xerces_2.8,maintained in Orbit,Apache License Version 2.0 January 2004,unmodified entire package<br/>
LPG-V1.1 java runtime from http://sourceforge.net/projects/lpg,EPL v1.0<br/>
	</body>
</html>