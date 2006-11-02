<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

$pre = "../";

// Process query string
$params = array();
if (preg_match("/^(\d\.\d(?:\.\d)?)$/", $_GET["version"], $regs))
{
	$params["version"] = $regs[1];
}
else
{
	$params["version"] = "";
}

if ($params["version"] && is_file("release-notes" . $params["version"] . ".php"))
{
	header("Location: http://www.eclipse.org/$PR/news/release-notes" . $params["version"] . ".php");
	exit;
}

if (preg_match("/^(" . join($projects, "|") . ")$/", $_GET["project"], $regs))
{
	$params["project"] = $regs[1];
}
else
{
	$params["project"] = "";
}
/*
 * To work, this script must be run with a version of PHP4 which
 * includes the Sablotron XSLT extension compiled into it
 * 
 * Params in stylesheet:
 *  
 * 	<xsl:param name="project"></xsl:param> <!-- this is used for multiple projects in the same file -->
 * 	<xsl:param name="version"></xsl:param>
 */

if ($params["project"])
{
	// define XML and XSL sources 
	$ver = $params["version"];
	$XMLfile = "release-notes-{$params["project"]}" .  ($ver == "" ? "" : "-$ver") . ".xml";
	$XMLfile = (is_file($XMLfile) ? $XMLfile : "release-notes-{$params["project"]}.xml");
	$XSLfile = "release-notes.xsl";
	
	$processor = xslt_create();
	$fileBase = 'file://' . getcwd() . '/';
	xslt_set_base($processor, $fileBase);
	$result = xslt_process($processor, $fileBase . $XMLfile, $fileBase . $XSLfile, NULL, array(), $params);
	
	if (!$result)
	{
		echo "Trying to parse $XMLfile with $XSLfile...<br/>";
		echo "ERROR #" . xslt_errno($processor) . " : " . xslt_error($processor);
	}
	echo $result; 
}
else
{
	print doSelectProject($projects, $proj, $nomenclature);
}

$html = ob_get_contents();
ob_end_clean();
$html = preg_replace('/^\Q<?xml version="1.0" encoding="ISO-8859-1"?>\E/', "", $html);
$html = preg_replace("/<(link|div) xmlns:\S+/", "<$1", $html);

$pageTitle = "Eclipse Modeling - MDT - Release Notes";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/relnotes.css"/>' . "\n");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/toggle.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
<!-- $Id: release-notes.php,v 1.3 2006/11/02 01:52:22 nickb Exp $ -->
