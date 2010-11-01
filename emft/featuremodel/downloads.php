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
	# $Nav->addNavSeparator("My Page Links", 	"downloads.php");
	# $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);

	# End: page-specific settings
	#
		
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML

<div id="maincontent">

	<div id="midcolumn">
		<h1>$pageTitle</h1>
		
        <h2>EMF Feature Model Update Sites (0.7.0)</h2>

        <div class="homeitem">
        <h3>Using Eclipse 3.4's Install Manager</h3>
            <p>To install these plugins, point your Install Manager at this site. 
            <!-- For more on how to do this, <a href="http://www.eclipse.org/modeling/emf/docs/misc/UsingUpdateManager/UsingUpdateManager.html">click here</a>. -->
            </p>
            <ul>
                <li>Help &gt; Software Updates... &gt; Available Software &gt; Add Site...
                <ul>
                    <li><b><a href="http://download.eclipse.org/modeling/emft/featuremodel/update-site">http://download.eclipse.org/modeling/emft/featuremodel/update-site<br/>
                    </li>
                </ul>
            </ul>
        </div>

        <h3>Archived Update Sites</h3>
            <a href="http://www.eclipse.org/downloads/download.php?file=/modeling/emft/featuremodel/org.eclipse.featuremodel.updatesite_0.7.0.zip">Archived Updatesite</a>
        
        <h3>Update Sites</h3>
            <a href="http://www.eclipse.org//modeling/emft/featuremodel/update-site">Updatesite</a>
        
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
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
