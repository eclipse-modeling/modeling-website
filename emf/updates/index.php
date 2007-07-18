<?php 
if ($_SERVER["SERVER_NAME"] != "www.eclipse.org") {
	header("Location: http://www.eclipse.org/modeling/emf/updates/");
}
require_once ("../../includes/buildServer-common.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/emf/downloads/extras-emf.php");

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/updates-common.php");

update_manager("EMF", "Eclipse Modeling");
?>
