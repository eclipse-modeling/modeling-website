<?php
$product_id = 42; # EMFT
$committers = array( # taken from http://www.eclipse.org/projects/project_summary.php?projectid=modeling.emft
	"lbigearde",
	"jlescot", 
	"estepper", 
	"rbihler", 
	"nickb",
	"cbrun",
	"sboehme",
	"gcannente",
	"jcote",
	"seberle",
	"pfriese",
	"mgarcia",
	"lgoubet",
	"jlescot",
	"emerks",
	"pnehrer",
	"pschonbac",
	"mtaal",
	"ttonelli",
	"cdaly",
	"sefftinge",
	"bkolb",
	"drizov",
	"dsciamma",
	"jkohnlein",
	"jmusset",
	"ssmith",
	"kthoms",
	"atoulme",
	"mvoelter",
);

$extra_IP = array(
);

$third_party = array(
	"Apache Commons Logging Jar 1.0.4, maintained in Orbit, Apache License 2.0, unmodified entire package, 1946, search",
	"Apache Commons Line Interface 1.0, maintained in Orbit, Apache License 2.0, unmodified entire package, 1947, search",
	"Apache Commons Lang 2.1, maintained in Orbit, Apache License 2.0, unmodified entire package, 1948, search",
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); doIPQueryPage(); ?>