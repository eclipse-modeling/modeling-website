<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

ob_start();
?>

<div id="midcolumn">
	<h1>Textual Modeling Framework</h1>
	<?php
	include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/index-common.php");
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
		<h6>News</h6>
		<?php getNews(4, "whatsnew", file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/modeling/tmf/news/news.xml")); ?>
		<ul>
			<li><a href="/modeling/tmf/news-whatsnew.php">Older news</a></li>
		</ul>
	</div>

	<div class="sideitem">
		<h6><a href="/modeling/tmf/feeds/"><img style="float:right" alt="Build Feeds" src="/modeling/images/rss-atom10.gif"/></a>
		<?php 
		$tmp = array_flip($projects);
		print ($tmp && isset($tmp[$proj]) && $tmp[$proj] ? $tmp[$proj] . " " : "");
		?>
		Build News</h6>
		<?php build_news($cvsprojs, $cvscoms, $proj); ?>
		<ul>
			<li><a href="/modeling/tmf/news-whatsnew.php#build">Other build news</a></li>
		</ul>
	</div>

	<div class="sideitem">
		<h6>Modeling Corner</h6>
		<p>Want to <a href="http://wiki.eclipse.org/index.php/Modeling_Corner">contribute</a> models, projects, files, ideas, utilities, or code to 
		<a href="http://www.eclipse.org/modeling/tmf/">TMF</a> or any other part of the <a href="http://www.eclipse.org/modeling/">Modeling Project</a>? 
		Now you can!</p>
		<p>Have a look, post your comments, submit a link, or just read what others have written. <a href="http://wiki.eclipse.org/index.php/Modeling_Corner">Details here</a>.</p>
	</div>

	<div class="sideitem" id="related">
		<h6>Related links</h6>
		<ul>
			<li><a href="http://www.eclipse.org/modeling/">Eclipse Modeling</a></li>
			<li>Web: <a href="http://www.eclipse.org/emf/">EMF</a>, 
			<a href="http://www.eclipse.org/modeling/gmf/">GMF</a>, 
			<a href="http://www.eclipse.org/modeling/m2t/">M2T</a></li>
			<li>Wiki: <a href="http://wiki.eclipse.org/index.php/Category:EMF">EMF</a>, 
			<a href="http://wiki.eclipse.org/index.php/Category:GMF">GMF</a>,
			<a href="http://wiki.eclipse.org/index.php/Category:M2T">M2T</a></li>
			<li><a href="http://www.eclipse.org/modeling/emf/docs/misc/UsingUpdateManager/UsingUpdateManager.html">Using Update Manager</a></li>
			<li><a href="http://www.eclipse.org/newsgroups/">Eclipse newsgroups</a></li>
		</ul>
	</div>
</div>
<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - TMF - Home";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch, Nick Boldt, Sven Efftinge";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/index.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
