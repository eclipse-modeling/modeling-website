<?php

require_once ("../../../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");

$App = new App();
$Nav = new Nav();
$Menu = new Menu();

include($App->getProjectCommon());
include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

ob_start();
print '<div id="midcolumn">';
########################################################################

if (isset($_GET["table"]))
{
	$pageTitle = $_GET["table"];
	print '<h1>' . $_GET["table"] . '</h1>' . "\n";
	$result = wmysql_query("SELECT * FROM " . $_GET["table"] . ";");
	if ($result && mysql_num_rows($result) > 0)
	{
		print '<table border="1"><tr>' ."\n";
		for ($index = 0; $index < mysql_num_fields($result); $index++) {
			print "<th>" . mysql_field_name($result, $index) . "</th>\n";
		}

		print "</tr>\n";
		while ($row = mysql_fetch_row($result))
		{
			print "<tr>\n";
			for ($index = 0; $index < mysql_num_fields($result); $index++) {
				print "<td>" . $row[$index] . "</td>\n";
			}

			print "</tr>\n";
		}

		print "</table><br>\n";
	}
}
else
{
	$pageTitle = "MYSQL Tables";
	$tables = wmysql_query("SHOW TABLES;");
	if ($tables && mysql_num_rows($tables) > 0)
	{
		while ($table = mysql_fetch_row($tables))
		{
			print '<h1><a href="mysql.php?table=' . $table[0] . '">' . $table[0] . '</a></h1>' . "\n";
			$fields = wmysql_query("DESCRIBE " . $table[0] . ";");
			if ($fields && mysql_num_rows($fields) > 0)
			{
				print '<table border="1"><tr>' ."\n";
				for ($index = 0; $index < mysql_num_fields($fields); $index++) {
					print "<th" . ($index==1 ? ' width="200">' : ">") . mysql_field_name($fields, $index) . "</th>\n";
				}

				print "</tr>\n";
				while ($field = mysql_fetch_row($fields))
				{
					print "<tr>\n";
					for ($index = 0; $index < mysql_num_fields($fields); $index++) {
						print "<td>" . $field[$index] . "</td>\n";
					}

					print "</tr>\n";
				}

				print "</table><br>\n";
			}
		}
	}
}

########################################################################
print '</div>';
$html= ob_get_contents();
ob_end_clean();

$pageKeywords= "";
$pageAuthor= "Eike Stepper";
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="http://' . ($isBuildServer ? $_SERVER["SERVER_NAME"] : "www.eclipse.org") . '/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
