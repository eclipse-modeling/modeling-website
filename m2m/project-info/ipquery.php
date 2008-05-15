<?php
$product_id = 71; # M2M
$committers = array(
	"fallilaire",
	"mbarbero",
	"mbohlen",
	"fjouault",
	"wpiers",
	"dwagelaar",
);

$extra_IP = array(
);

$third_party = array(
	"ANTLR Runtime v3.0.0, cvsroot/tools/org.eclipse.orbit/org.antlr.runtime v3_0_0, Eclipse Public License Version 1.0, original antlrruntime.jar repackaged as an OSGi bundle",
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); doIPQueryPage(); ?>