<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/searchcvs-dbaccess.php";
$connect = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db(isset($db) && $db ? $db : "modeling", $connect) or die(mysql_error());

function wmysql_query($sql)
{
	#print $sql . "\n";
	$res = mysql_query($sql) or die("$sql\n" . mysql_error());
	return $res;
}
?>
