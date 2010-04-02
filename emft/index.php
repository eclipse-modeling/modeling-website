<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

/* redirect for emft projects */
if (isset($_GET["project"]) && isset($emft_home_redirects) && is_array($emft_home_redirects) && array_key_exists($_GET["project"],$emft_home_redirects))
{
        header("Location: " . $emft_home_redirects[$_GET["project"]]);
        exit;
}

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

ob_start();
?>

<div id="midcolumn">
	<h1>Eclipse Modeling Framework Technology (EMFT)</h1>
	<?php
	include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/index-common.php");

	print "<div class=\"homeitem\">\n";

	print "<h3>Old Projects</h3>\n"; 
	print "<p>Looking for an old EMFT project? The following projects graduate as part of <a href=\"http://wiki.eclipse.org/Ganymede\">Ganymede</a>:</p>\n";
	print "<ul id=\"oldprojs\">\n";
	print '<li>Teneo graduates to <a href="http://www.eclipse.org/modeling/emf/?project=teneo#teneo">Eclipse Modeling Framework (EMF)</a>.</li>'."\n";
	print '<li>Net4j graduates to <a href="http://www.eclipse.org/modeling/emf/?project=net4j#net4j">Eclipse Modeling Framework (EMF)</a>.</li>'."\n";
	print '<li>CDO graduates to <a href="http://www.eclipse.org/modeling/emf/?project=cdo#cdo">Eclipse Modeling Framework (EMF)</a>.</li>'."\n";
	print "</ul>\n";

	print "</div>\n";
	?>
</div>

<div id="rightcolumn">
	<div class="sideitem">
	   <h6>Incubation</h6>
	   <p>Some components are currently in their <a href="http://www.eclipse.org/projects/dev_process/validation-phase.php">Validation (Incubation) Phase</a>.</p> 
	   <div align="center"><a href="http://www.eclipse.org/projects/what-is-incubation.php"><img 
	        align="center" src="http://www.eclipse.org/images/egg-incubation.png" 
	        border="0" /></a></div>
	</div>

	<div class="sideitem">
		<h6>Buy The Book</h6>
		
		<p align="center">
			<a href="http://www.informit.com/store/product.aspx?isbn=9780321331885"><img src="/modeling/emf/images/book/EMF-2nd-Ed-Cover-Small.jpg"/></a>
		</p>
		<ul>
		<li><a href="http://www.informit.com/store/product.aspx?isbn=9780321331885">View Details &amp; Order</a>
		<li><a href="/modeling/emf/images/book/EMF-2nd-Ed-Covers-Large.jpg">View Front &amp; Back Covers</a>
		</ul>
	</div>

	<div class="sideitem">
		<h6>News</h6>
		<?php getNews(4, "whatsnew", file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/modeling/emft/news/news.xml")); ?>
		<ul>
			<li><a href="/modeling/emft/news-whatsnew.php">Older news</a></li>
		</ul>
	</div>

	<div class="sideitem">
		<h6><a href="/modeling/emft/feeds/"><img style="float:right" alt="Build Feeds" src="/modeling/images/rss-atom10.gif"/></a>
		<?php 
		$tmp = array_flip($projects);
		print ($tmp && isset($tmp[$proj]) && $tmp[$proj] ? $tmp[$proj] . " " : "");
		?>
		Build News</h6>
		<?php build_news($cvsprojs, $cvscoms, $proj); ?>
		<ul>
			<li><a href="/modeling/emft/news-whatsnew.php#build">Other build news</a></li>
		</ul>
	</div>

	<div class="sideitem">
		<h6>Modeling Corner</h6>
		<p>Want to <a href="http://wiki.eclipse.org/index.php/Modeling_Corner">contribute</a> models, projects, files, ideas, utilities, or code to 
		<a href="http://www.eclipse.org/modeling/emft/">EMFT</a> or any other part of the <a href="http://www.eclipse.org/modeling/">Modeling Project</a>? 
		Now you can!</p>
		<p>Have a look, post your comments, submit a link, or just read what others have written. <a href="http://wiki.eclipse.org/index.php/Modeling_Corner">Details here</a>.</p>
	</div>

	<div class="sideitem" id="related">
		<h6>Related links</h6>
		<ul>
			<li><a href="http://www.eclipse.org/modeling/">Eclipse Modeling</a></li>
			<li>Web: <a href="http://www.eclipse.org/emf/">EMF</a>, 
			<a href="http://www.eclipse.org/modeling/mdt/">MDT</a>, 
			<a href="http://www.eclipse.org/modeling/m2t/">M2T</a></li>
			<li>Wiki: <a href="http://wiki.eclipse.org/index.php/Category:EMF">EMF</a>, 
			<a href="http://wiki.eclipse.org/index.php/Category:MDT">MDT</a>, 
			<a href="http://wiki.eclipse.org/index.php/Category:M2T">M2T</a></li>
			<li><a href="http://www.eclipse.org/modeling/emf/docs/misc/UsingUpdateManager/UsingUpdateManager.html">Using Update Manager</a></li>
			<li><a href="http://www.eclipse.org/newsgroups/">Eclipse newsgroups</a></li>
			<li><a href="http://wiki.eclipse.org/Modeling_Project_Releng">EMFT Release Engineering</a></li>
		</ul>
	</div>

</div>
<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - EMFT - Home";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch, Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/index.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
