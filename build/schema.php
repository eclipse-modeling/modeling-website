<?php
require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

require_once($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/scripts.php");
$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
$isBuildServer = (preg_match("/^(emft|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"])) || $isEMFserver;
internalUseOnly();

include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

$_query0 = "SHOW TABLES";

$tables = array();
$pageTitle = "Search CVS - Database Schema";

print "<div id=\"midcolumn\">\n";

print "<h1>$pageTitle</h1>";

print "<div class=\"homeitem3col\">\n";
print "<h3>Tables</h3>\n";
$result = mysql_query($_query0,$_dbh);
if (!$result)
{
  	print "<p><ul><li><i>MySQL Error: ".mysql_error()."</i></li></ul></p>\n";
}
else
{
	print "<p><ul>\n";
  	while($row = mysql_fetch_row($result))
  	{
  		$tables[] = $row[0];
    	print "<li><a href=\"#" . $row[0] . "\">" . ucfirst($row[0]) . "</a></li>\n";
  	}
	print "</ul></p>\n";
}

print "</div>\n";


$desc_cols = array("Field", "Type", "Null", "Key", "Default", "Extra");

foreach ($tables as $tablename)
{
	$_query1 = "DESCRIBE $tablename";
	print "<div class=\"homeitem3col\">\n";
	print "<h3><a name=\"$tablename\"></a>" . ucfirst($tablename) . " Table</h3>\n";
	$result = mysql_query($_query1,$_dbh);
	if (!$result)
	{
	  	print "<p><ul><li><i>MySQL Error: ".mysql_error()."</i></li></ul></p>\n";
	}
	else
	{
		print "<p><blockquote><table border=\"1\" cellspacing=\"0\" cellpadding=\"2\"><tr>\n";
  		foreach ($desc_cols as $col)
  		{
    			print "<th>$col</th>\n";
  		}
		print "</tr>\n";
		while($row = mysql_fetch_assoc($result))
	  	{
			print "<tr>\n";
	  		foreach ($desc_cols as $col)
	  		{
    				print "<td>" . $row[$col] . "</td>\n";
	  		}
			print "</tr>\n";
	  	}
	  	print "</table></blockquote></p>&#160;\n";
	}
	print "</div>";
}

print "</div>\n"; // midcolumn

print "<div id=\"rightcolumn\">\n";

print "<div class=\"sideitem\">\n";
print "<h6>About</h6>\n";
print "<p>Updated:<br/>" . date("Y-m-d H:i T") . "</p>\n";
print "</div>\n";

print "</div>\n"; // rightcolumn

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>