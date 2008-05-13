<?php
$product_id = 29; # GMF 
$committers = array(
	"ahunter",
	"ashatalin",
	"atikhomirov",
	"bblajer",
	"crevells",
	"dstadnik",
	"ldamus",
	"mfeldman",
	"mmostafa",
	"rdvorak",
	"rgronback",
	"sshaw",
	"vramaswamy",
);

$extra_IP = array(
	"xPand template engine (org.eclipse.gmf.xpand, org.eclipse.gmf.xpand.editor), originally developed by Sven Efftinge for oAW component in GMT project, was refactored for application in GMF by Artem Tikhomirov."
);

$third_party = array(
	"org.apache.batik_1.6,cvsroot/modeling/org.eclipse.gmf/plugins/org.apache.batik,Apache License Version 2.0 January 2004,unmodified entire package",
	"org.apache.xerces_2.8,maintained in Orbit,Apache License Version 2.0 January 2004,unmodified entire package",
	"LPG-V1.1 java runtime from http://sourceforge.net/projects/lpg,EPL v1.0",
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); doIPQueryPage(); ?>