<?php
$writableRoot = ($isBuildServer ? $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/" : "/home/data/httpd/writable/www.eclipse.org/");

if (preg_match("@^/$PR/build/@", $_SERVER["PHP_SELF"]) || preg_match("@^/modeling/build/updatestats\.php$@", $_SERVER["PHP_SELF"]))
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
			mysql_select_db((isset($db) && $db ? $db : "modeling"), $connect) or die(mysql_error($connect));
			break;
		}
		else
		{
			print "<div class=\"qerror\">" . mysql_error($connect) . "</div>";
		}
	}
}

function wmysql_query($sql, $c = -1)
{
	global $connect;
	if ($c === -1)
	{
		$c = $connect;
	}

	if ($c !== null)
	{
		if (isset($_GET["showsql"]) && $_GET["showsql"] == "showsql")
		{
			print "<ul><li>$sql</li></ul>\n";
		}

		if (!($res = mysql_query($sql, $c)))
		{
			print "<div class=\"qerror\">" . mysql_error($c) . "</div>";
		}
	}
	return $res;
}
?>
