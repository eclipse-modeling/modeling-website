<?php

require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

require_once($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/scripts.php");
$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
$isBuildServer = (preg_match("/^(emft|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"])) || $isEMFserver;
internalUseOnly(); 

include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

require_once("/home/data/httpd/eclipse-php-classes/system/dbconnection_downloads_ro.class.php");

header("Content-Type: text/html");

$query = stripslashes($_POST["query"]);
echo '
<html>
<head></head>
<body>
<table><form method=post><tr valign="top"><td align="left">
   <pre style="font-size:12px">Query:<br><i style="font-size:11px">separate multiple queries with semi-colon (";")
  -&gt; <a href="https://dev.eclipse.org/committers/committertools/dbo_downloads_schema.php">database schema</a> (fields, tables, constraints)</i></pre>
   <textarea style="font-size:12px" name=query rows=40 cols=60>'.$query.'</textarea><br/>
   <input type=submit name="Submit" style="font-size:12px">
   <!-- sample queries -->
   <pre style="font-size:12px;color:navy"></pre>
</td><td>&nbsp;&nbsp;</td>
<td>';
	if (false!==strpos($query,";")) {
		$queries = explode(";",$query);
	} else {
		$queries = array($query);
	}
	foreach ($queries as $i => $query) { 
		if ($query) { 
			echo "<pre>Results".(sizeof($queries)>1?"[".($i+1)."]":"").":</pre>\n";
			echo "<pre style=\"color:blue\">";
			# Connect to database
			$dbc  = new DBConnectionDownloads();
			$dbh  = $dbc->connect();

			$rs   = mysql_query($query, $dbh);
			
			if(mysql_errno($dbh) > 0) {
				echo "There was an error processing the query.</pre>\n".
				# Mysql disconnects automatically, but I like my disconnects to be explicit.
				$dbc->disconnect();
				$dbh = null;
				$dbc = null;
			} else {
				while($myrow = mysql_fetch_assoc($rs)) {
					echo "<hr noshade size=1/>";
					foreach ($myrow as $k => $v) { 
						echo "$k => $v\n";
					}
				}
				echo "</pre>";
				$dbc->disconnect();
				$rs  = null;
				$dbh = null;
				$dbc = null;
			}
		}
	}

	echo '
</td></tr></form></table>
</body>
</html>
';

?>
