<?php
require_once ("../includes/buildServer-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/news-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

allnews("MDT", $cvsprojs, $cvscoms, $proj);
?>
