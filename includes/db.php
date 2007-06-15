<?php
$writableRoot = ($isBuildServer ? $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/" : "/home/data/httpd/writable/www.eclipse.org/");

if (preg_match("@^/$PR/build/@", $_SERVER["PHP_SELF"]) || preg_match("@^/modeling/emf/downloads/updatestats\.php$@", $_SERVER["PHP_SELF"]))
{
	$accessfiles[] = "parsecvs-dbaccess.php";
}
$accessfiles[] = "searchcvs-dbaccess.php";

$connect = null;
foreach ($accessfiles as $z)
{
	if (is_file("$writableRoot$z"))
	{
		require_once("$writableRoot$z");
		if ($tmp = mysql_connect($dbhost, $dbuser, $dbpass))
		{
			$connect = $tmp;
			mysql_select_db((isset($db) && $db ? $db : "modeling"), $connect) or die(mysql_error());
			break;
		}
		else
		{
			print "<div class=\"qerror\">" . mysql_error() . "</div>";
		}
	}
}

function wmysql_query($sql)
{
	global $connect;

	if ($connect !== null)
	{
		if (isset($_GET["showsql"]) && $_GET["showsql"] == "showsql")
		{
			print "<ul><li>$sql</li></ul>\n";
		}

		if (!($res = mysql_query($sql, $connect)))
		{
			print "<div class=\"qerror\">" . mysql_error() . "</div>";
		}
	}
	return $res;
}
?>
