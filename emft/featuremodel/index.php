<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# template.php
	#
	# Author: 		Denis Roy
	# Date:			2005-06-16
	#
	# Description: Type your page comments here - these are not sent to the browser
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "EMF Feature Model";
	$pageKeywords	= "EMF, feature model";
	$pageAuthor		= "Holger Papajewski";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
  $Nav->setLinkList( array() );
  $Nav->addNavSeparator( "EMF Feature Model", "/modeling/emft/featuremodel/" );
	$Nav->addCustomNav("About This Project", 	"/projects/project_summary.php?projectid=modeling.emft.featuremodel","",2);
	# $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);

	# End: page-specific settings
	#
		
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML

<div id="maincontent">
	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<p>
		EMF Feature Model is a proposed open source project under the Eclipse Modeling Framework 
		Technology Project (EMFT).
    </p>
		<p>
		During the last years Feature Modeling has become the "standard" for variability management 
		in the field of Software Product Lines. Feature Models are easy to understand and provide a 
		generic way to represent variability information, independent of a specific application 
		domain. Several independent projects using the Eclipse platform / EMF have each defined 
		their own meta model for feature models. Although these meta models have considerable 
		structural differences, their core semantics are similar. A brief description of feature 
		models can be found at <a href="http://en.wikipedia.org/wiki/Feature_model" target="_blank">Wikipedia</a>. 
		The EMF Feature Model project will define a standard representation of Feature 
		Models inside the Eclipse platform. The intent is to provide a uniform representation for 
		variability information for tools based on the Eclipse Modeling Framework. This will allow 
		easy and consistent access to variability-related information, such as variation points 
		and variant decisions, in DSLs, M2M transformations, and other contexts where variability 
		information is produced or consumed.
    </p>
    
    <p>
    The objectives of the EMF Feature Model project are the following:
    </p>
		<ul>
    <li>Define <strong>Feature Meta Model</strong></li>
    <li>Define an extensible <strong>Evaluation Engine Framework</strong> and provide an exemplary engine implementation</li>
    <li>Provide extensible <strong>Editors and Visualizations</strong> for the EMF Feature Models</li>
		</ul>

    <p>
    A first version of the EMF Feature Model is available in the public SVN at:
    </p>
    <ul>
    <li><a href="http://dev.eclipse.org/svnroot/modeling/org.eclipse.emft.featuremodel">http://dev.eclipse.org/svnroot/modeling/org.eclipse.emft.featuremodel</a></li>
    </ul>

    <p>
    This first release acts as base for public discussion at 
    <a href="https://dev.eclipse.org/mailman/listinfo/featuremodel-dev">EMF feature Model mailing list</a>.
    </p>
    
    <p>
   	<i>More information here soon...</i>
	  </p>
    

  <!--		
		
		<div class="homeitem">
			<h3>Narrow column</h3>
			<ul>
				<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
				<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
				<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
			</ul>
		</div>
		<div class="homeitem">
			<h3>Narrow column</h3>
			<ul>
				<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
				<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
				<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
			</ul>
		</div>
		<div class="homeitem3col">
			<h3>This is a wide column</h3>
			<ul>
				<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
				<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
				<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
			</ul>
		</div>
		<hr class="clearer" />
		<p>Some free text</p>
		<ul class="midlist">
			<li>list of items in free text</li>
			<li>list of items in free text</li>
			<li>list of items in free text</li>
		</ul>
		<ol>
			<li>Ordered list</li>
			<li>Ordered list</li>
			<li>Ordered list</li>
		</ol>
		
		-->
		
	</div>
		
	<div id="rightcolumn">
		<div class="sideitem">
      <h6>Incubation</h6>
      <div align="center"><a href="/projects/what-is-incubation.php"><img 
        align="center" src="/images/egg-incubation.png" 
        border="0" alt="Incubation" /></a></div>
    </div>

		<!--
		<div class="sideitem">
			<h6>Related links</h6>
			<ul>
				<li><a href="#">Link</a> - descriptive text</li>
				<li><a href="#">Link</a> - descriptive text</li>
				<li><a href="#">Link</a> - descriptive text</li>
				<li><a href="#">Link</a> - descriptive text</li>
				<li><a href="#">Link</a> - descriptive text</li>
			</ul>
		</div>
		-->
	</div>
	
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
