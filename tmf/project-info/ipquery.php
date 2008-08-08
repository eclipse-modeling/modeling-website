<?php
$product_id = 42; # EMFT
$committers = array( # taken from http://www.eclipse.org/projects/project_summary.php?projectid=modeling.emft
	"sefftinge" => "Xtext lead",
	"pfriese" => "Xtext",
	"dhuebner" => "Xtext",
	"jkohnlein" => "Xtext",
	"bkolb" => "Xtext",
	"pschonbac" => "Xtext"
);

$extra_IP = array(
);

$third_party = array(
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); 
doIPQueryPage(); ?>