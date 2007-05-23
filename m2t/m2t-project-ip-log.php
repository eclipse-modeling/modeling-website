<?php
require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

if ($proj) { 
    header("Location: http://wiki.eclipse.org/index.php/M2T-" . strtoupper($proj) . "-IP Log"); 
    exit;
}
ob_start();
?>
<div id="midcolumn">

<h1>IP Log</h1>
<p>IP Logs are maintained for each individual M2T component:</p>

<table>
<tr>
<td>Component</td><td>IP Log</td>
</tr>
<tr>
<td>JET</td><td><a href="jet/eclipse-project-ip-log.csv">JET IP Log</a></td>
</tr>
<tr>
<td>XPand</td><td><a href="xpand/eclipse-project-ip-log.csv">XPand IP Log</a></td>
</tr>
<tr>
<td>MTL</td><td><a href="mtl/eclipse-project-ip-log.csv">MTL IP Log</a></td>
</tr>
<tr>
<td>M2T Core</td><td><a href="m2tcore/eclipse-project-ip-log.csv">M2T Core IP Log</a></td>
</tr>
<tr>
<td>M2T Shared</td><td><a href="m2tshared/eclipse-project-ip-log.csv">M2T Shared IP Log</a></td>
</tr>
</table>
<p>If you'd like to add your questions and answers to the FAQ, please edit the appropriate <a href="http://wiki.eclipse.org/index.php/M2T">Wiki page</a>.</p>

<?php

print doSelectProject($projects, $proj, $nomenclature, "homeitem3col");

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - M2T - IP Log";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
