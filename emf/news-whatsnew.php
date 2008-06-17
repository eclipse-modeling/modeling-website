<?php
require_once ("../includes/buildServer-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/news-common.php");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/emf/downloads/extras-emf.php");
$extras = array("doBleedingEdge");

allnews("EMF", $cvsprojs, $cvscoms, $proj, "http://wiki.eclipse.org/EMF#New_.26_Noteworthy");
?>
