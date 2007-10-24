<?php                                                                                                               
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/app.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/nav.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/menu.class.php"); 
require_once($_SERVER['DOCUMENT_ROOT'] . "/projects/common/project-info.class.php");
$App = new App(); $Nav = new Nav(); $Menu = new Menu(); 
$projectInfo = new ProjectInfo("modeling.gmf");
$projectInfo->generate_common_nav( $Nav );
include ($App->getProjectCommon()); # All on the same line to unclutter the user's desktop' 
	#*****************************************************************************
	#
	# index.php
	#
	# Author: 		Richard C. Gronback
	# Date:			2005-12-01
	#
	# Description: 
	#
	#
	#****************************************************************************

#
# Begin: page-specific settings.  Change these. 
$pageTitle = "Graphical Modeling Framework";
$pageKeywords = "eclipse,project,graphical,modeling,model-driven";
$pageAuthor = "Richard C. Gronback";

# Add page-specific Nav bars here
# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
# $Nav->addNavSeparator("My Page Links", 	"downloads.php");
# $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);

# End: page-specific settings
#

# Paste your HTML content between the EOHTML markers!	
$html =<<<EOHTML
<div id="maincontent">
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
					<img src="http://www.eclipse.org/gmf/images/logo_banner.png" />
				</td>
			</tr>
		</table><hr/>
		
		<div class="homeitem">
			<h3>Quick Links</h3>
				<ul class="midlist">
					<li><a href="http://wiki.eclipse.org/index.php/Graphical_Modeling_Framework" target="_blank"><b>Wiki</b></a> | Find a set of <a href="http://wiki.eclipse.org/index.php/Graphical_Modeling_Framework_FAQ">FAQs</a> and other information.</li>
					<li><a href="news://news.eclipse.org/eclipse.modeling.gmf" target="_blank"><b>Newsgroup</b></a> | For general questions and community discussion.</li>
					<li><a href="http://dev.eclipse.org/mailman/listinfo/gmf-dev" target="_blank"><b>Mailing List</b></a> | For project development discussions.</li>
					<li><a href="http://bugs.eclipse.org/bugs" target="_blank"><b>Bugs</b></a> | View <a href="http://dev.eclipse.org/bugs/buglist.cgi?bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&email1=&emailtype1=substring&emailassigned_to1=1&email2=&emailtype2=substring&emailreporter2=1&bugidtype=include&bug_id=&changedin=&votes=&chfieldfrom=&chfieldto=Now&chfieldvalue=&product=GMF&short_desc=&short_desc_type=allwordssubstr&long_desc=&long_desc_type=allwordssubstr&keywords=&keywords_type=anywords&field0-0-0=noop&type0-0-0=noop&value0-0-0=&cmdtype=doit&order=Reuse+same+sort+as+last+time">all open</a> issues.</li>
					<li><a href="http://wiki.eclipse.org/index.php/GMF_Project_Plan"><b>Project Plan</b></a> | Also, view a list of project <a href="http://www.eclipse.org/gmf/requirements.php">requirements</a>.</li>
		</div>
		<div class="homeitem">
			<h3>Events</h3>
			<ul class="midlist">
				<li>Attend <a href="http://www.eclipsecon.org/2007/index.php?page=sub/&id=3624">Extending your DSM by leveraging the GMF Runtime</a> at <a href="http://www.eclipsecon.org/">EclipseCon 2007</a>.</li>		
				<li>Attend <a href="http://www.eclipsecon.org/2007/index.php?page=sub/&id=3739">GMF Best Practices</a> at <a href="http://www.eclipsecon.org/">EclipseCon 2007</a>.</li>
				<li>Attend <a href="http://www.eclipsecon.org/2007/index.php?page=sub/&id=3627">MDSD from Frontend to Code using Eclipse Modeling Technologies</a> at <a href="http://www.eclipsecon.org/">EclipseCon 2007</a>.</li>
				<li><a href="http://www.eclipse.org/callisto/webinars.php" target="_blank"><b>Callisto Webinar</b></a> to feature Modeling projects (EMF & GMF). View <a href="http://adobedev.breezecentral.com/p17835008/">recording</a>.</li>
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
		<div>
			<a href="http://www.eclipse.org/callisto/"><img src="http://www.eclipse.org/callisto/images/callistosmall.gif" border=0 alt="The Next Total Eclipse" title="Callisto"></a>
		</div>
		<div class="sideitem">
			<h6>Getting started</h6>
			<ul>				
				<li><a
					href="http://wiki.eclipse.org/index.php/GMF_Tutorial"
					target="_self">Tutorial</a></li>
				<li><a href="http://wiki.eclipse.org/index.php/GMF_Development_Guidelines">Development Guidelines</a></li>
				<li><a href="http://www.eclipse.org/gmf/development/index.php">Developer Resources</a></li>
				<li><a href="http://help.eclipse.org/help33/index.jsp">Online Documentation</a></li>
				<li><a href="http://download.eclipse.org/modeling/gmf/downloads/index.php">Downloads</a></li>
			</ul>
		</div>
		
		<div class="sideitem">
			<h6>What's New</h6>
			<ul> 
			    <li>Jan 3rd: GMF 2.0M4 available for <a href="http://download.eclipse.org/modeling/gmf/downloads/drops/S-2.0M4-200701030300/index.php">download</a></li>
			    <li>Attend <a href="http://eclipsezilla.eclipsecon.org/buglist.cgi?query_format=advanced&short_desc_type=allwordssubstr&short_desc=&product=EclipseCon+2007&track_id=7&long_desc_type=substring&long_desc=&keywords_type=allwords&keywords=&bug_status=SCHEDULED&bug_status=RESOLVED&resolution=ACCEPTED&emailtype1=substring&email1=&emailreporter2=1&emailcc2=1&emailtype2=substring&email2=&bugidtype=include&bug_id=&cmdtype=doit&order=Reuse+same+sort+as+last+time&field0-0-0=noop&type0-0-0=noop&value0-0-0=">presentations on modeling projects</a> at <a href="http://www.eclipsecon.org/">EclipseCon 2007</a>.</li>		
			</ul>
		</div>
	</div>
</div>


EOHTML;

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>



