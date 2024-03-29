<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 

$App = new App();
$Nav = new Nav(); 
$Menu = new Menu();

include($App->getProjectCommon());

#
# Begin: page-specific settings.  Change these. 
$pageTitle 	= "Henshin";
$pageKeywords	= "EMF, Henshin, model transformation, state space analysis";
$pageAuthor	= "Christian Krause";

# Load project description from a separate file:
ob_start();
include 'description.html';
$description = ob_get_contents();
ob_end_clean();


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
	<img style="float:right" src="henshin_small.png" alt="" style="border-width:0px"/>
	
	$description
				
	<div class="homeitem">
		<h3>News</h3>
		<ul>
		<li><span class="dates">06-11-2012</span>: Version 0.9.4 released with lots of bug-fixes and new features.</li>
		<li><span class="dates">19-06-2012</span>: Version 0.9.2 released with new interpreter API, performance improvements and bugfixes, support for IteratedUnits, logging, profiling and more.</li>
		<li><span class="dates">03-04-2012</span>: Version 0.9.0 released!</li>
		<li><span class="dates">17-10-2011</span>: Update 0.8.0 R201110170738 released which adds support for parameter types in the interpreter wizard</li>
		<li><span class="dates">21-09-2011</span>: Henshin SDK 0.8.0 released</li>
		</ul>
		<a href="https://twitter.com/#!/henshintool"><img src="followus.png"></a>
	</div>
	
	<h3>Screenshots</h3>
	
	<a href="http://wiki.eclipse.org/Henshin_Transformation_Rules"><img height="120" src="http://wiki.eclipse.org/images/b/bc/Henshin_example_transformation_rule.png"></a>
	&nbsp;&nbsp;&nbsp;
	<a href="http://wiki.eclipse.org/Henshin_Statespace_Explorer"><img height="120" src="http://wiki.eclipse.org/images/4/4e/Statespace-explorer-phil-win32.png"></a>
	
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
		<div class="sideitem">
		<h6>Incubation</h6>
		<div align="center"><a href="/projects/what-is-incubation.php"><img align="center" src="egg-incubation.png" border="0" alt="Incubation" /></a></div>
		</div>
	</div>
	
</div>

EOHTML;

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
