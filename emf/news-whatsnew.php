<?php
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/news-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

allnews("EMF", $cvsprojs, $cvscoms, $proj);
?>
