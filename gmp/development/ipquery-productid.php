<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php");

header("Content-type: text/plain\n\n");
doProductIDQuery();
print "\n";
exit;

?>