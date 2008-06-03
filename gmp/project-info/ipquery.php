<?php
$product_id = 29; # GMF 
$committers = array(
 	# taken from http://www.eclipse.org/projects/project_summary.php?projectid=modeling.gmf
	"aboyko" => "runtime",
	"ahunter" => "runtime",
	"crevells" => "runtime",
	"ldamus" => "runtime",
	"nickb" => "releng",

	"bblajer" => "lite runtime",
	"mfeldman" => "releng",
	"rdvorak" => "tooling (model audits/metrics)",
	"dstadnik"  => "tooling",
	"rgronback" => "PMC, tooling",
	"ashatalin" => "tooling",
	"atikhomirov" => "tooling",

	//"mmostafa" => "runtime (inactive)",
	//"sshaw" => "runtime (inactive)",
	//"vramaswamy" => "runtime (inactive)",
);

$extra_IP = array(
	"xPand template engine (org.eclipse.gmf.xpand, org.eclipse.gmf.xpand.editor), originally developed by Sven Efftinge for oAW component in GMT project, was refactored for application in GMF by Artem Tikhomirov."
);

$third_party = array(
	"org.apache.batik_1.6, cvsroot/modeling/org.eclipse.gmf/plugins/org.apache.batik, Apache License Version 2.0 January 2004, unmodified entire package, 2124, gmf",
	"org.apache.xerces_2.8, maintained in Orbit, Apache License Version 2.0 January 2004, unmodified entire package, 248, gmf",
	"LPG-V1.1 java runtime, http://sourceforge.net/projects/lpg, EPL v1.0, ?, 302, gmf",
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); doIPQueryPage(); ?>