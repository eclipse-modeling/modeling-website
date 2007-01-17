<?php                                                                                                               
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/app.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/nav.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/menu.class.php"); 
require_once($_SERVER['DOCUMENT_ROOT'] . "/projects/common/project-info.class.php");
$App = new App(); $Nav = new Nav(); $Menu = new Menu(); 
$projectInfo = new ProjectInfo("modeling.gmf");
$projectInfo->generate_common_nav( $Nav );
include ($App->getProjectCommon()); 
	#*****************************************************************************
	#
	# template.php
	#
	# Author: 		
	# Date:			2005-06-16
	#
	# Description: Type your page comments here - these are not sent to the browser
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "GMF Developer Resources";
	$pageKeywords	= "developer,resources,modeling,graphical";
	$pageAuthor		= "Richard C. Gronback";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# $Nav->addNavSeparator("My Page Links", 	"downloads.php");
	# $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);

	# End: page-specific settings
	#
		
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML

<div id="maincontent">
	<div id="midcolumn">
	<table border="0" cellpadding="2" cellspacing="0" width="100%">
		<tbody>
			<tr>
				<td align="left"><h1>$pageTitle</h1><br></td>
				<td align="right"><img align="right" src="http://www.eclipse.org/gmf/images/logo_banner.png" /></td>
			</tr>
		</tbody>
	</table>
	<hr/>
	
	
		<div class="homeitem">
			<h3>Development Tools</h3>
				<ul class="midlist">
					<li><b><a
										href="http://dev.eclipse.org/viewcvs/index.cgi">CVS Repository</a></b><br/>GMF development is managed in a CVS <a
										href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.gmf/?cvsroot=Technology_Project">repository</a>.
									Both "pserver" and "extssh" are supported. See <a
										href="http://dev.eclipse.org/cvshowto.html">Using Eclipse with
									CVS</a> for instructions.</li>
					<li><b><a
										href="http://www.eclipse.org/webtools/development/apiscanner/apiscanner.html">Eclipse API Scanner</a></b><br/>Describe the API of a component and scan plug-ins for API
									violations (from the <a href="http://www.eclipse.org/webtools"
										target="_top">WebTools</a> project).</li>
					<li><a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=GMF"><b>Bug Reports</b></a><br/>Eclipse uses <a target="_top"
										href="http://bugzilla.mozilla.org/">Bugzilla</a> for bug
									tracking. View <a
										href="http://dev.eclipse.org/bugs/buglist.cgi?bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&email1=&emailtype1=substring&emailassigned_to1=1&email2=&emailtype2=substring&emailreporter2=1&bugidtype=include&bug_id=&changedin=&votes=&chfieldfrom=&chfieldto=Now&chfieldvalue=&product=GMF&short_desc=&short_desc_type=allwordssubstr&long_desc=&long_desc_type=allwordssubstr&keywords=&keywords_type=anywords&field0-0-0=noop&type0-0-0=noop&value0-0-0=&cmdtype=doit&order=Reuse+same+sort+as+last+time">all
									open</a> GMF bug reports or <a target="_top"
										href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=GMF">open
									new</a> bugs. View <a href="https://bugs.eclipse.org/bugs/describecomponents.cgi?product=GMF">this</a> report to see a list of component owners.</li>
					<li><b><a href="http://www.eclipse.org/webtools/development/piitools/piitools.html">Check
									Unused Properties Tool</a></b> <br>
									Scan property files for unused messages (from the <a
										href="http://www.eclipse.org/webtools" target="_top">WebTools</a>
									project).</li>
					<li><b><a
										href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=GMF&bug_severity=enhancement">Feature
									Requests</a></b> <br>
									Use Bugzilla to submit new features using severity setting of
									'enhancement'.</li>
					<li><b><a
										href="http://dev.eclipse.org/viewcvs/index.cgi/%7Echeckout%7E/platform-core-home/downloads.html">Core
									Tools</a></b> <br>
									Useful utilities from the Platform team. Consider adding their
									update <a
										href="http://dev.eclipse.org/viewcvs/index.cgi/%7Echeckout%7E/platform-core-home/updates
									">site</a>
									to your configuration.</li>
					<li><b><a
										href="http://download.eclipse.org/eclipse/downloads/drops/R-3.1-200506271435/download.php?dropFile=org.eclipse.releng.tools_3.1.0.zip">Release
									Engineering Tool</a></b> <br>
									Use this tool with the project's release engineering build
									process.</li>
					<li><b><a
										href="http://www.eclipse.org/org/processes/dashboard/dashboard_detail.php?project=GMF">Project
									Dashboard</a></b> <br>
									View generated project statistics.</li>
					<li><b><a
										href="https://dev.eclipse.org/committers">Eclipse Committer
									Tools</a></b> <br>
									Information on infrastructure status, file path information,
									FAQs, etc. [login required]</li>
		</div>
		<div class="homeitem">
			<h3>Development Resources</h3>
				<ul class="midlist">
					<li><b><a
										href="http://wiki.eclipse.org/index.php/GMF_Development_Guidelines">Development
									Guidelines</a></b> <br>
									Learn what's involved in developing and contributing
									enhancements or new capabilities for GMF.</li>
					<li><b><a
										href="http://dev.eclipse.org/viewcvs/index.cgi/*checkout*/org.eclipse.gmf/releng/org.eclipse.gmf.releng.builder/readme.html?cvsroot=Technology_Project">Build
									Process</a></b> <br>
									The GMF continuous build process is modeled after other Eclipse
									project build processes. The build process is documented <a
										href="http://dev.eclipse.org/viewcvs/index.cgi/*checkout*/org.eclipse.gmf/releng/org.eclipse.gmf.releng.builder/readme.html?cvsroot=Technology_Project">here</a>
									with more documentation in development.</li>
					<li><b><a
										href="http://help.eclipse.org/help30/topic/org.eclipse.platform.doc.isv/reference/misc/api-usage-rules.html">API
									Guidelines</a></b> <br>
									Look <a
										href="http://help.eclipse.org/help30/topic/org.eclipse.platform.doc.isv/reference/misc/api-usage-rules.html">here</a>
									for general Eclipse API rules of engagement. Other resources
									include a draft of <a
										href="http://www.eclipse.org/org/processes/Eclipse%20Quality%20APIs%20v2.pdf">Eclipse
									Quality APIs</a>, and works by Jim des Rivieres: <a
										href="http://www.eclipse.org/eclipse/development/java-api-evolution.html">Evolving
									Java-based APIs</a> and an EclipseCon presentation <a
										href="http://www.eclipsecon.org/2005/presentations/EclipseCon2005_12.2APIFirst.pdf">API
									First</a>.</li>
					<li><b><a
										href="http://dev.eclipse.org/conventions.html">Conventions and
									Guidelines</a></b> <br>
									Look <a href="http://dev.eclipse.org/conventions.html">here</a>
									and <a
										href="http://help.eclipse.org/help30/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/misc/naming.html">here</a>
									for the for the coding standards, naming conventions, and other
									guidelines used by the Platform. GMF will use these conventions
									until such time as deviation is required.</li>
					<li><b>Architectural Overview</b> <br>
									A high level summary of the components and their architecture.</li>
					<li><b><a
										href="http://www.eclipse.org/gmf/requirements.php">Project
									Requirements</a></b> <br>
									Look here for a list of the project requirements and their
									priorities.</li>
					<li><b><a
										href="http://www.eclipse.org/modeling/modeling-charter.php">Charter</a></b>
									<br>
									As a Modeling project, the GMF project abides by the
									Modeling Project charter found <a
										href="http://www.eclipse.org/modeling/modeling-charter.php">here</a>.</li>
					<li><b><a
										href="http://www.eclipse.org/gmf/development/contributors.php">Contributors
									and Committers</a></b> <br>
									List of Eclipse GMF Project contributors and committers.</li>
		</div>
	</div>

	<div id="rightcolumn">
		<div class="sideitem">
			<h6>GMF 1.0</h6>
			<ul>
				<li><a href="http://download.eclipse.org/modeling/gmf/downloads/index.php">Downloads</a></li>
				<li><a href="http://www.eclipse.org/gmf/development/plan.php">Project Plan</a></li>
				<li><a href="http://www.eclipse.org/gmf/requirements.php">Requirements</a></li>
			</ul>
		</div>
		<div class="sideitem">
			<h6>Mailing Lists</h6> GMF mailing lists are meant for discussion of development of the GMF project only. For all other questions please use the <a href="news://news.eclipse.org/eclipse.modeling.gmf">newsgroup</a>.
			<ul>
				<li><a href="https://dev.eclipse.org/mailman/listinfo/gmf-dev">gmf-dev</a></li>
				<li><a href="https://dev.eclipse.org/mailman/listinfo/gmf-releng">gmf-releng</a></li>
			</ul>
		</div>
		<div class="sideitem">
			<h6>Related Projects</h6>
			<ul>
				<li><a href="http://www.eclipse.org/emf/">EMF</a> - Eclipse Modeling Framework</li>
				<li><a href="http://www.eclipse.org/gef/">GEF</a> - Graphical Editing Framework</li>
				<li><a href="http://www.eclipse.org/gmt/">GMT</a> - Generative Model Transformer</li>
				<li><a href="http://www.eclipse.org/uml2/">UML2</a> - Unified Modeling Language 2</li>
			</ul>
		</div>
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
