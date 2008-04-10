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
	$pageTitle 		= "Graphical Modeling Framework Draft 1.0 Plan";
	$pageKeywords	= "eclipse,project,graphical,modeling,model-driven";
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
	<div id="midcolumn"><br/>
		<table border="0" cellpadding="2" cellspacing="0" width="100%">
			<tbody>
				<tr>
					<td align="left"><h1>$pageTitle</h1></td>
					<td align="right"><img align="right" src="http://www.eclipse.org/gmf/images/logo_banner.png" /></td>
				</tr>
			</tbody>
		</table><hr/>
		<p>Last revised 07:55 EST Apr. 24, 2006</p>

		
<p><i>Please send comments about this draft plan to
the </i><a href="mailto:gmf-dev@eclipse.org">gmf-dev@eclipse.org</a> <i>developer
mailing list.</i></p>
<p>This document lays out the feature and API set for the initial
release of the Eclipse Graphical Modeling Framework Project, version
1.0.0.</p>
<ul>
	<li><a href="#Deliverables">Release deliverables</a></li>
	<li><a href="#Milestones">Release milestones</a></li>
	<li><a href="#TargetOperatingEnvironments">Target operating
	environments</a></li>
	<li><a href="#Compatibility">Compatibility and dependencies</a></li>
	<li><a href="#Features">Features and capabilities</a></li>
</ul>
<p>This project plan and associated requirements are the result of an
open and transparent process and includes input from those who have
expressed an interest in the project. That said, the success of the
project and its deliverables is soley dependent upon the contributions
from its community membership. If you are interested in contributing to
the project in the delivery of its stated goals, you are more than
welcome!</p>

<p>The first part of the plan deals with the important matters of
release deliverables, release milestones, target operating environments,
compatibilities and dependencies. These are all things that need to be
clear for any release, even if no features were to change.&nbsp;</p>
<p>The remainder of the plan consists of themes for the project's
milestones, with more detail on these and future capabilities found on
the project <a href="http://www.eclipse.org/gmf/requirements.php">requirements</a>
document. Each plan item covers a feature or API that is to be added to
the Graphical Modeling Framework, or some aspect of the project that is
to be improved.</p>
<p>As this plan represents the goals for the initial release of the
Graphical Modeling Framework, it is expected and hoped that the project
will acquire additional requirements, a vibrant user community, and most
importantly, a plug-in developer community to utilize the framework.
With this, it is expected that the plan will be adjusted during the
development cycle in order to accomodate the community to as great an
extent as possible.</p>

<h2><a name="Deliverables"></a>Release deliverables</h2>
<p>The release deliverables have the same form as is found in most Eclipse projects,
namely:</p>
<ul>
	<li>Graphical Modeling Framework source code release, available as versions tagged "R1_0" in the project's <a
		href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.gmf/?cvsroot=Modeling_Project">CVS
	repository</a>.</li>
	<li>Graphical Modeling Framework SDK (includes runtime and tooling
	components, with sources) (downloadable).</li>
	<li>Graphical Modeling Framework runtime binary distribution
	(downloadable).</li>
	<li>Graphical Modeling Framework examples (downloadable).</li>
	<li>Graphical Modeling Framework documentation (downloadable).</li>
	<li>Graphical Modeling Framework tests (downloadable).</li>
</ul>
<h2><a name="Milestones"></a>Release milestones</h2>
<p>Release milestone occurring at roughly 6 week intervals and follow
the Platform milestone releases by approximately 2 weeks; that is, until
the final 3.2 release of the Platform, upon which GMF and other projects
will release simultaneously. As GMF is dependent upon the EMF and GEF
projects, which are scheduled to release milestones within 1 week of Platform milestones, 
GMF will deliver its milestones within the following week. Note that the
GMF project milestones begin at M3 in order to align milestone numbering
with that of the others and avoid compatibility confusion. The
milestones are:</p>
<ul>
	<li>Friday Nov 18, 2005 - Milestone 3 (1.0 M3) - stable build</li>
	<li>Friday Jan 13, 2006 - Milestone 4 (1.0 M4) - stable build</li>
	<li>Friday Mar 03, 2006 - Milestone 5 (1.0 M5) - stable build (API freeze)</li>
	<li>Friday Apr 14, 2006 - Milestone 6 (1.0 M6/RC0) - stable build</li>
</ul>
<p>Lock down and testing then begins with M6, and progress through a
series of test-fix passes against candidates releases. Furthermore, the
GMF project will need to complete the review process for leaving
incubation and becoming a "real" Eclipse Technology project prior to the
1.0 release. Release candidate builds are planned as follows (M6 is
release candidate 0):</p>
<ul>
	<li>Friday April 21, 2006 - Release Candidate 1 - (1.0 RC1)</li>
	<li>Friday May 05, 2006 - Release Candidate 2 - (1.0 RC2)</li>
	<li>Friday May 19, 2006 - Release Candidate 3 - (1.0 RC3)</li>
	<li>Wednesday May 31, 2006 - Release Candidate 4 - (1.0 RC4)</li>
	<li>Tuesday June 20, 2006 - Release Candidate 5 - (1.0 RC5)</li>
	<li>Wednesday June 28, 2006 - Release Candidate 6 - (1.0 RC6)</li>
</ul>
<p>As these milestones are dependent upon the Platform, they may be
altered in order to conform to the published plan. All release deliverables
will be available for download as soon as the release has been tested
and validated in the target operating configurations listed below.</p>
<h2><a name="TargetOperatingEnvironments"></a>Target Operating
Environments</h2>
<p>In order to remain current, each Eclipse release targets reasonably
current versions of the underlying operating environments.</p>
<p>The Eclipse Graphical Modeling Project depends upon on the Platform
and other projects, which are mostly "pure" Java. The 3.2 release of the
Eclipse Platform Project is written and compiled against version 1.5 of
the Java Platform APIs (i.e., Java SE 5), and targeted to run on version
1.5 of the Java Runtime Environment, Standard Edition. GMF will target
the same Java version as the Platform.</p>
<p>Eclipse Platform SDK 3.2 will be tested and validated on a number of
reference platforms, listed <a
	href="http://www.eclipse.org/eclipse/development/eclipse_project_plan_3_2.html#TargetOperatingEnvironments">here</a>
(this list is updated over the course of the release cycle). The Eclipse
Graphical Modeling Project will be tested and validated against a subset
of those listed for the platform. Those available will be presented on
the project download site.</p>

<h4>Internationalization</h4>
<p>The Eclipse Platform is designed as the basis for internationalized
products. The user interface elements provided by the Eclipse SDK
components, including dialogs and error messages, are externalized. The
English strings are provided as the default resource bundles. As a
result, the Graphical Modeling Framework project will provide English
strings in its default bundles and be localized to a subset of those
locales offered by the Platform. This plan will be updated to indicate
which locales will be provided and the timeframe for availability.</p>
<h2><a name="Compatibility"></a>Compatibility and Dependencies</h2>
<h3>Compatibility of Release 1.0</h3>
<p>The Graphical Modeling Framework Project will be developed in
parallel, and released simultaneously, with the following projects. As
stated above, each milestone release of the Graphical Modeling Framework
Project will be compatible with the corresponding milestones for each of
these projects, and delivered the appropriate offset.</p>
<ul>
	<li>Eclipse Platform SDK version 3.2</li>
	<li>Eclipse Modeling Framework (EMF) version 2.2</li>
	<li>Graphical Editing Framework (GEF) version 3.2</li>
</ul>
<p>Therefore, the Graphical Modeling Framework initial release will be
compatible with these versions and will publish binary and source
compatibilities with migration guides on subsequent releases. </p>
<h3>API Contract</h3>
<p>It is a goal of the Graphical Modeling Framework Project to avoid
provisional APIs. APIs published for the 1.0 release will be carefully
reviewed prior to release, making use of "internal" packages for
unsupported and variable implementation classes. Client plug-ins that
directly depend on anything other than what is specified in the
published API are inherently unsupportable and receive no guarantees
about future compatibility. Refer to <i><a
	href="http://www.eclipse.org/articles/Article-API%20use/eclipse-api-usage-rules.html">How
to Use the Eclipse API</a></i> for information about how to write
compliant plug-ins.</p>


<h2><a name="Features">Features and Capabilities</a></h2>
<p>A list of project requirements and agreed upon implementation
timeframes is found in <a
	href="http://www.eclipse.org/gmf/requirements.php">this</a> document.
For the milestones listed in this document, a set of overall themes is
used to indicate what major set of functionalities is to be concentrated
on for each. These themes are presented below, while the requirements
document and associated Bugzilla entries are left to those wanting more
detailed information on each.</p>
<h4>M3 Theme: Clean</h4>
<p>By clean, we mean that all artifacts need to be properly copyrighted,
cleansed of commercial names (in the case of contributions), follow the
prescribed naming conventions, utilize no deprecated APIs, etc. The build
process needs to be automated with all build artifacts installing
properly with download archives and the update manager. Basic
functionality will be present, although the following milestone will
focus on this aspect.</p>
<h4>M4 Theme: Functional</h4>
<p>By functional, we mean it should work end-to-end, with particular
attention paid to those <a
	href="http://www.eclipse.org/gmf/requirements.php">requirements</a> we
targeted for M1 during the kickoff meeting. With this, a comprehensive
tutorial will be provided to enable community usage and feedback.</p>
<h4>M5 Theme: Bootstrapped</h4>
<p>Our graphical surfaces for definition and mapping should be
bootstrapped by this time, representing one aspect of "exemplary tools"
by the project, not to mention the "consume our own output" aspect.</p>
<h4>M6 Theme: Ready to Hatch</h4>
<p>Meaning that we should be ready for transitioning out of incubation
(see <a
	href="http://www.eclipse.org/org/processes/Guidelines_for_Eclipse_Development_Process/">guidelines</a>
to better understand what this involves). A big part of this will be
focusing on our APIs (eliminate provisional APIs), review of extension
points and their documentation, etc. Of course, another aspect of this
milestone and the progression toward the release of 1.0 will be in
localization, documentation, bug fixes (no P1, few if any P2), and
product polish.</p>

<p>A more detailed endgame plan will be posted here as the Graphical
Modeling Framework Project and rest of the Platform 3.2 release train
plans firm up in the coming weeks.</p><br/>
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
