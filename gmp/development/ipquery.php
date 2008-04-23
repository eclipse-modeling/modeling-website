<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

$committers = array(
	"ahunter",
	"ashatalin",
	"atikhomirov",
	"bblajer",
	"crevells",
	"dstadnik",
	"ldamus",
	"mfeldman",
	"mmostafa",
	"rdvorak",
	"rgronback",
	"sshaw",
	"vramaswamy",
);
?>
<div id="midcolumn">
	<div class="homeitem3col">
		<h3>Committers (Section 1)</h3>
		<ul>
<?php foreach ($committers as $committer) 
{
	print "<li><a href=\"/$PR/searchcvs.php?q=author:$committer\"$committer</a></li>\n";
} ?>
		</ul>
	</div>
	<div class="homeitem3col">
		<h3>Developers (Section 2)</h3>
		<b>component, bug #, contributor, size, description</b><br/>
<?php
	$product_id = 29; # GMF 
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); 
?>

<br/>	
xPand template engine (org.eclipse.gmf.xpand, org.eclipse.gmf.xpand.editor), originally developed by Sven Efftinge for oAW component in GMT project, was refactored for application in GMF by Artem Tikhomirov.

	</div>
	<div class="homeitem3col">
		<h3>Third Party Software (Section 3)</h3>
		<ul>
			<li>org.apache.batik_1.6,cvsroot/modeling/org.eclipse.gmf/plugins/org.apache.batik,Apache License Version 2.0 January 2004,unmodified entire package</li>
			<li>org.apache.xerces_2.8,maintained in Orbit,Apache License Version 2.0 January 2004,unmodified entire package</li>
			<li>LPG-V1.1 java runtime from http://sourceforge.net/projects/lpg,EPL v1.0</li>
		</ul>
	</div>
</div>

<div id="rightcolumn">
	<div class="sideitem">
		<h6>Search CVS By Author</h6>
		<ul>
<?php foreach ($committers as $committer) 
{
	print "<li><a href=\"/$PR/searchcvs.php?q=author:$committer\"$committer</a></li>\n";
} ?>
		</ul>
	</div>
</div>
			

<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Graphical Modeling Framework";
$pageKeywords = "eclipse,project,graphical,modeling,model-driven";
$pageAuthor = "Richard C. Gronback, Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/index.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
