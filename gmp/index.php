<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

ob_start();
?>
<div id="midcolumn">
		<table width="100%">
		<tr><td>&nbsp;</td></tr>
			<tr>

				<td width="50%" align="top">
				The Eclipse Graphical Modeling Framework (GMF) provides a generative component and 
				runtime infrastructure for developing graphical editors based on <a href="http://www.eclipse.org/emf" target="_top"><b>EMF</b></a> 
				and <a href="http://www.eclipse.org/gef" target="_top"><b>GEF</b></a>.
				The project aims to provide these components, in addition to
				exemplary tools for select domain models which illustrate its capabilities. 
				</td>
				 <td align="right">
					<img src="images/logo_banner.png" />
				</td>
			</tr>
		</table><hr/>
		
		<div class="homeitem">
			<h3>Quick Links</h3>
				<ul class="midlist">
					<li><a href="http://wiki.eclipse.org/index.php/Graphical_Modeling_Framework"><b>Wiki</b></a> | Find a set of <a href="http://wiki.eclipse.org/index.php/Graphical_Modeling_Framework_FAQ">FAQs</a> and other information.</li>
					<li><a href="news://news.eclipse.org/eclipse.modeling.gmf" target="_blank"><b>Newsgroup</b></a> | For general questions and community discussion.</li>
					<li><a href="http://dev.eclipse.org/mailman/listinfo/gmf-dev" target="_blank"><b>Mailing List</b></a> | For project development discussions.</li>
					<li><a href="http://bugs.eclipse.org/bugs" target="_blank"><b>Bugs</b></a> | View <a href="http://dev.eclipse.org/bugs/buglist.cgi?bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&email1=&emailtype1=substring&emailassigned_to1=1&email2=&emailtype2=substring&emailreporter2=1&bugidtype=include&bug_id=&changedin=&votes=&chfieldfrom=&chfieldto=Now&chfieldvalue=&product=GMF&short_desc=&short_desc_type=allwordssubstr&long_desc=&long_desc_type=allwordssubstr&keywords=&keywords_type=anywords&field0-0-0=noop&type0-0-0=noop&value0-0-0=&cmdtype=doit&order=Reuse+same+sort+as+last+time">all open</a> issues.</li>
					<li><a href="http://wiki.eclipse.org/index.php/GMF_Project_Plan"><b>Project Plan</b></a> (draft for 2.1)</li>
		</div>
		<div class="homeitem">
			<h3>Events</h3>
			<ul class="midlist">
				<li><a href="http://www.eclipsecon.org/2008/index.php?page=sub/&id=337">Introduction to the Graphical Modeling Framework</a> tutorial at <a href="http://www.eclipsecon.org/2008/">EclipseCon 2008</a></li>
				<li><a href="http://www.eclipsecon.org/2008/index.php?page=sub/&id=48">Using GMF and M2M for Model-driven-development</a> tutorial at <a href="http://www.eclipsecon.org/2008/">EclipseCon 2008</a></li>
				<li><a href="http://www.eclipsecon.org/2008/index.php?page=sub/&id=320">GMF Exemplary MDD</a> long talk at <a href="http://www.eclipsecon.org/2008/">EclipseCon 2008</a></li>
				<li><a href="http://www.eclipsecon.org/2008/index.php?page=sub/&id=184">Migrating your Graphical Editor to the Eclipse Graphical Modeling Framework</a> long talk at <a href="http://www.eclipsecon.org/2008/">EclipseCon 2008</a></li>
				<li><a href="http://www.eclipsecon.org/2008/index.php?page=sub/&id=387">Bitter GMF, or how we did UML with GMF</a> short talk at <a href="http://www.eclipsecon.org/2008/">EclipseCon 2008</a></li>
				<li>Subscribe to events and milestones <a target="_blank" href="feed://www.google.com/calendar/feeds/gmfdev%40gmail.com/public/basic"><img src="http://www.google.com/calendar/images/xml.gif" border=0></a>
						<a target="_blank" href="webcal://www.google.com/calendar/ical/gmfdev%40gmail.com/public/basic.ics"><img src="http://www.google.com/calendar/images/ical.gif" border=0></a></li>
			</ul>
		</div>
		<br/>
		
		<hr class="clearer" />
		
		<div class="homeitem3col">
		<h3>What can you do with GMF?&nbsp;<a href="./gallery/index.php"><img src="http://www.eclipse.org/images/more.gif" alt="More..." /></a></h3>
			<table width="100%">
			<tr>
 				<td colspan="2"><p>Well, if you've taken a look at the <a target="_blank" href="http://www.eclipse.org/modeling/mdt/uml2/docs/articles/Getting_Started_with_UML2/article.html">Getting Started with UML2</a> article and had trouble visualizing the model, GMF can help. On the left is the generated environment for working with a domain model (any EMF-based model), while on the right is a view of a graphical editor generated with GMF. To see more of what you can do with GMF, click the thumbnails below or <a href="./gallery/index.php">this link</a> to visit our gallery.</p>
 				</td>
 			</tr>
 			<tr><td colspan="2" align="center"><a href="./gallery/index.php"><img src="./images/gallery_thumb.png"/></a></td></tr>
 			<tr><td align="center"><b>Before GMF</b></td><td align="center"><b>After GMF</b></td></tr>
 			</table>
		</div>
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
				<li><a href="http://www.eclipse.org/modeling/gmf/development/index.php">Developer Resources</a></li>
				<li><a href="http://help.eclipse.org/help33/index.jsp">Online Documentation</a></li>
				<li><a href="http://www.eclipse.org/modeling/gmf/downloads/">Downloads</a> <div style="float:right"><small><i>(<a href="http://download.eclipse.org/modeling/gmf/downloads/index-old.php">old downloads</a>)</i></small></div></li>
			</ul>
		</div>
		
	<div class="sideitem">
		<h6>News</h6>
		<?php getNews(4, "whatsnew", file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/modeling/gmf/news/news.xml")); ?>
		<ul>
			<li><a href="/modeling/gmf/news-whatsnew.php">Older news</a></li>
		</ul>
	</div>

	<div class="sideitem">
		<h6><a href="/modeling/gmf/feeds/"><img style="float:right" alt="Build Feeds" src="/modeling/images/rss-atom10.gif"/></a>
		<?php 
		$tmp = array_flip($projects);
		print ($tmp && isset($tmp[$proj]) && $tmp[$proj] ? $tmp[$proj] . " " : "");
		?>
		Build News</h6>
		<?php build_news($cvsprojs, $cvscoms, $proj); ?>
		<ul>
			<li><a href="/modeling/gmf/news-whatsnew.php#build">Other build news</a></li>
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
