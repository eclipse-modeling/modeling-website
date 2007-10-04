<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

$dirName = str_replace("/index.php","",$_SERVER["SCRIPT_NAME"]);
$dirName = explode("/",$dirName); $dirName = $dirName[sizeof($dirName)-1];
$files = loadDirSimple(".", ".*", $dirName!='branding'?"f":"d");
print '<div id="midcolumn">

<div class="homeitem3col">
<h3>Branding Materials '.($dirName!='branding'?' - ' . ucfirst($dirName):'').'</h3>
<ul>
';
if (sizeof($files)>0) { 
	sort($files);
	foreach ($files as $file) { 
		if ($file != "CVS" && $file !="index.php")
		print '<li><a href="'.$file.'">'.ucfirst(str_replace("_"," ",$file)).'</a></li>'."\n";
	}
} else {
	print "<li>No branding materials found!</li>\n";
}
print '</ul>
</div>

</div>';

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Branding Materials";
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>