<?php 
require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

$newsgroups = array("MDT (main)" => array("modeling.mdt"));
foreach ($projects as $name => $suf) {
	if (!isset($nonewsgroup) || !in_array($suf, $nonewsgroup))
	{
		$newsgroups[$name] = array("modeling.mdt.".$suf);
	}
}
$newsgroups["UML2"][] = "tools.uml2"; /* add old one */
$newsgroups["XSD"] = array("technology.xsd","tools.emf"); /* override */
$newsgroups["Papyrus"] = array("papyrus"); /* override */
$newsgroups["MST"] = array("mst"); /* override */
$newsgroups["MoDisco"] = array("modisco"); /* override */

$mailinglists = array("MDT (main)" => array("mdt.dev"));
foreach ($projects as $name => $suf) {
	if (!isset($nomailinglist) || !in_array($suf, $nomailinglist))
	{
		$mailinglists[$name] = array("mdt-".$suf.".dev");
	}
}
array_unshift($mailinglists["XSD"],"emf-dev"); /* override */

require_once($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/newsgroup-mailing-list-common.php");

?>