<?php
require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

if ($proj) { 
	header("Location: http://wiki.eclipse.org/index.php/MDT-" . strtoupper($proj)); 
	exit;
}
ob_start();
?>
<div id="midcolumn">

<h1>Documentation</h1>

<?php 

print doSelectProject($projects, $proj, $nomenclature, "homeitem3col");

?>
</div>
<div id="rightcolumn">
	<div class="sideitem">
	<h6>See Also</h6>
	<ul><li><a href="http://wiki.eclipse.org/index.php/MDT">MDT Wiki</a></li>
	<li><a href="http://www.eclipse.org/modeling/mdt/javadoc/">Javadocs</a></li>
	</ul>
	</div>
</div>

<?php

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - MDT - Documentation";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
<!-- $Id: docs.php,v 1.7 2007/04/05 19:13:25 nickb Exp $ -->
