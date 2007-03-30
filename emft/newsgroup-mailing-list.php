<?php 
require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

$newsgroups = array("EMFT" => array("technology.emft"));
$mailinglists = array("EMFT" => array("emft-dev"));

require_once($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/newsgroup-mailing-list-common.php");

?>