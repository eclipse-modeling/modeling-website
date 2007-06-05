<?php
require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
$projName = strtoupper(preg_replace("#.+/#","",$PR));
ob_start();
?>
<div id="midcolumn">

<h1>IP Log</h1>
<p>Overall IP log, listing all committers and contributors:</p>
<ul>
	<li><?php print $projName; ?> <a href="eclipse-project-ip-log.csv">IP Log</a></li>
</ul>

<?php 
$out = "";
$out .= " 
<p>Individual per-component IP Logs:</p>

<ul>";
$gotOne=false;
foreach ($projects as $name => $prefix){
	$out .= '<li>' . $name . (is_file($prefix.'/eclipse-project-ip-log.csv') ? ' <a href="'.$prefix.'/eclipse-project-ip-log.csv">IP Log</a>' : ': <i>n/a</i>') . '</li>';
	$gotOne = $gotOne || is_file($prefix.'/eclipse-project-ip-log.csv') ? true : false;	
}
$out .= "</ul>";
if ($gotOne)
{
	print $out;
}

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - $projName - IP Log";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
