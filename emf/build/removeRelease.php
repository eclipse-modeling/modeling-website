<?php
/*

mysql modeling -u root -p
SHOW TABLES;
SELECT * FROM tags WHERE tagname LIKE '%something%';
DELETE FROM tags WHERE tagname = 'something';
DELETE FROM releases WHERE (project = 'org.eclipse.emf' OR project = 'org.eclipse.xsd') AND component = '' AND vanityname = 'I200701180000';

*/

require_once ("../../includes/buildServer-common.php");
$opts = array ("org.eclipse.emf.ecore.sdo/", "org.eclipse.xsd/");
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/removeRelease-common.php");
?>
