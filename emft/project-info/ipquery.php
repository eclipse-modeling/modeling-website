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

);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); doIPQueryPage(); ?>