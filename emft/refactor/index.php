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
	$pageTitle 		= "EMF Refactor";
	$pageKeywords	= "EMF, Refactor, model refactoring, refactoring";
	$pageAuthor		= "Thorsten Arendt";
	
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
	<img style="float:right" src="/images/emfrefactor.png" alt="" style="border-width:0px"/>
	
	<p>
	EMF Refactor is an open source component under <a href="http://www.eclipse.org/modeling/emft/">Eclipse EMFT</a> to provide extensible tool support for generating and applying refactorings of EMF based
models, e.g. UML EMF models.
	</p>
	
	<p>
	EMF Refactor will consist of 
	<ul>
		<li>a <strong>Refactoring Generation Module</strong> for specifying EMF model refactorings using several model transformation approaches,
		<li>a <strong>Structured Suite</strong> of predefined EMF model refactorings, and
		<li>a <strong>Refactoring Application Module</strong> for applying EMF model refactorings in a uniform and user-friendly way.
	</ul>
	</p>
	
	<p>
	A first community technical preview is targeted in spring 2010.
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
   			<div align="center"><a href="/projects/what-is-incubation.php"><img align="center" src="/images/egg-incubation.png"  border="0" alt="Incubation" /></a></div>
 			</div>
	<!--	
		<h6>Related links</h6>
		<ul>
		<li><a href="#">Link</a> - descriptive text</li>
		<li><a href="#">Link</a> - descriptive text</li>
		</ul>
		</div>

		<div class="sideitem">
		<h6>Related links</h6>
		<ul>
		<li><a href="#">Link</a> - descriptive text</li>
		<li><a href="#">Link</a> - descriptive text</li>
		</ul>
		-->
		
		</div>
	</div>
	
	
</div>

EOHTML;

	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
