<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

$newsgroups = array();
foreach ($projects as $name => $suf) {
	if (!isset($nonewsgroup) || !in_array($suf, $nonewsgroup))
	{
		$newsgroups[$name] = array("modeling.emf.".$suf);
	}
}
$newsgroups["EMF &amp; SDO"] = array("tools.emf"); /* override */
$newsgroups["XSD"] = array("technology.xsd","tools.emf"); /* override */

$mailinglists = array();
foreach ($projects as $name => $suf) {
	if (!isset($nomailinglist) || !in_array($suf, $nomailinglist))
	{
		$mailinglists[$name] = array("emf-".$suf.".dev");
	}
}
$mailinglists["EMF &amp; SDO"] = array("emf-dev"); /* override */
$mailinglists["XSD"] = array("emf-dev", "mdt-xsd.dev"); /* override */

require_once($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/newsgroup-mailing-list-common.php");

?>