<?php 
require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

$newsgroups = array();
foreach ($projects as $name => $suf) {
	if (!isset($nonewsgroup) || !in_array($suf, $nonewsgroup))
	{
		$newsgroups[$name] = array("modeling.emf.".$suf);
	}
}
if (array_key_exists("EMF (Core)", $newsgroups)) { unset($newsgroups["EMF (Core)"]); } /* override */ 
$newsgroups["EMF"] = array("tools.emf"); /* override */
$newsgroups["XSD"] = array("technology.xsd","tools.emf"); /* override */

$mailinglists = array();
foreach ($projects as $name => $suf) {
	if (!isset($nomailinglist) || !in_array($suf, $nomailinglist))
	{
		$mailinglists[$name] = array("emf-".$suf.".dev");
	}
}
if (array_key_exists("EMF (Core)", $mailinglists)) { unset($mailinglists["EMF (Core)"]); } /* override */ 
$mailinglists["EMF"] = array("emf-dev"); /* override */
$mailinglists["XSD"] = array("emf-dev", "mdt-xsd.dev"); /* override */

require_once($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/newsgroup-mailing-list-common.php");

?>