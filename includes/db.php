<?php

if (is_file($writableRoot . "parsecvs-dbaccess.php") && preg_match("@^/$PR/build/@", $_SERVER["PHP_SELF"]))
{
	require_once($writableRoot . "parsecvs-dbaccess.php");
	$connect = mysql_connect($dbhost, $dbuser, $dbpass);
	if ($connect)
	{
		mysql_select_db((isset($db) && $db ? $db : "modeling"), $connect) or die(mysql_error());
	}
	else
	{
		$connect = null;
	}
}
else if (is_file($writableRoot . "searchcvs-dbaccess.php"))
{
	require_once $writableRoot . "searchcvs-dbaccess.php";
	$connect = mysql_connect($dbhost, $dbuser, $dbpass);
	if ($connect)
	{
		mysql_select_db((isset($db) && $db ? $db : "modeling"), $connect) or die(mysql_error());
	}
	else
	{
		$connect = null;
	}
}
else
{
	$connect = null;
}

function wmysql_query($sql)
{
	global $writableRoot;
	$res = null;
	if (is_file($writableRoot . "searchcvs-dbaccess.php"))
	{
		#print $sql . "\n";
		$res = mysql_query($sql) or die("$sql\n" . mysql_error());
	}
	return $res;
}
?>
