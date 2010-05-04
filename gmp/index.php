<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

ob_start();
?>
	<div id="midcolumn">
        	<h1>Graphical Modeling Project (GMP)</h1>
        	<?php
        	include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/index-common.php");
        	?>
	</div>

	<div id="rightcolumn">
		<br />
		<!-- <div>
			<a href="http://www.eclipse.org/callisto/"><img src="http://www.eclipse.org/callisto/images/callistosmall.gif" border=0 alt="The Next Total Eclipse" title="Callisto"></a>
		</div> -->
		<div class="sideitem">
			<h6>Getting started</h6>
			<ul>				
				<li><a
					href="http://wiki.eclipse.org/index.php/GMF_Tutorial"
					target="_self">Tutorial</a></li>
				<li><a href="http://wiki.eclipse.org/index.php/GMF_Development_Guidelines">Development Guidelines</a></li>
				<li><a href="http://www.eclipse.org/modeling/gmp/development/index.php">Developer Resources</a></li>
				<li><a href="http://help.eclipse.org/ganymede/index.jsp">Online Documentation</a></li>
				<li><a href="http://www.eclipse.org/modeling/gmp/downloads/">Downloads</a></li>
			</ul>
		</div>
		
	<div class="sideitem">
		<h6>News</h6>
		<?php getNews(4, "whatsnew", file_get_contents($_SERVER["DOCUMENT_ROOT"] . "http://www.eclipse.org/modeling/gmp/news/news.xml")); ?>
		<ul>
			<li><a href="http://www.eclipse.org/modeling/gmp/news-whatsnew.php">Older news</a></li>
		</ul>
	</div>

	<div class="sideitem">
		<h6><a href="/modeling/gmp/feeds/"><img style="float:right" alt="Build Feeds" src="http://www.eclipse.org/modeling/images/rss-atom10.gif"/></a>
		<?php 
		$tmp = array_flip($projects);
		print ($tmp && isset($tmp[$proj]) && $tmp[$proj] ? $tmp[$proj] . " " : "");
		?>
		Build News</h6>
		<?php build_news($cvsprojs, $cvscoms, $proj); ?>
		<ul>
			<li><a href="http://www.eclipse.org/modeling/gmp/news-whatsnew.php#build">Other build news</a></li>
		</ul>
	</div>

</div>

<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Graphical Modeling Framework";
$pageKeywords = "eclipse,project,graphical,modeling,model-driven";
$pageAuthor = "Richard C. Gronback, Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="http://www.eclipse.org/modeling/includes/index.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
