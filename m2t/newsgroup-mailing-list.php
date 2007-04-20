<?php 
require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

$newsgroups = array("M2T (main)" => array("modeling.m2t"));
foreach ($projects as $name => $suf) {
	if (!isset($nonewsgroup) || !in_array($suf, $nonewsgroup))
	{
		$newsgroups[$name] = array("modeling.m2t.".$suf);
	}
}

$mailinglists = array("M2T (main)" => array("m2t-dev"));
foreach ($projects as $name => $suf) {
	if (!isset($nomailinglist) || !in_array($suf, $nomailinglist))
	{
		$mailinglists[$name] = array("m2t-".$suf.".dev");
	}
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/newsgroup-mailing-list-common.php");

?>