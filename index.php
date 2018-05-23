<?php  																														
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	
if (is_file($_SERVER['DOCUMENT_ROOT'] . "/projects/common/project-info.class.php")) 
{
	require_once($_SERVER['DOCUMENT_ROOT'] . "/projects/common/project-info.class.php");
}
$App = new App(); $Nav = new Nav(); $Menu = new Menu(); 
if (class_exists("ProjectInfo"))
{
	$projectInfo = new ProjectInfo("modeling");
	$projectInfo->generate_common_nav( $Nav );
}		
include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# index.php
	#
	# Author: 		Richard Gronback (with edits by Nick Boldt)
	# Date:			2006-05-11
	#
	# Description: Modeling project homepage
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Eclipse Modeling Project";
	$pageKeywords	= "modeling, UML, UML2, MDD, MDA, model-driven";
	$pageAuthor		= "Richard Gronback";
	
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML

<div id="maincontent">
	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<table>
		<tr>
		<td><p>The Eclipse Modeling Project focuses on the evolution and promotion of model-based 
development technologies within the Eclipse community by providing a unified set of modeling frameworks, tooling, and standards implementations.</p>
		<p>The Modeling Project charter is posted <a href="http://www.eclipse.org/modeling/modeling-charter.php">here</a> and inherits from the <a href="http://www.eclipse.org/org/processes/Eclipse_Standard_TopLevel_Charter_v1.0.html">Eclipse Standard Top-Level Charter v1.0</a>.</p>
		</td>
		<td align="right"><img src="http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg">
		</td>
		</table>
		<div class="homeitem3col">
			<h2>Modeling: Faster, Smarter, Better</h2>
				<p>The bewildering complexity of modern software begs for a fresh approach focusing on high-level design, delegating menial tasks to tools and frameworks.  From a concise description of your problem domain, a complete solution can be inferred.</p>
			<h2>What is Eclipse Modeling?</h2>
				<p>Eclipse Modeling is an integrated assortment of extensible tools and frameworks for solving everyday problems.  At its core lies the Eclipse Modeling Framework, a rich abstraction for describing, composing, and manipulating structured information. Around this core, onion-like technology layers provide powerful facilities to address most everything you need.</p>
			<h2>Why use Modeling?</h2>
			<p>
				<ul>
					<li>To produce high-quality results quickly.</li>
					<li>To reuse tried, tested, and true solutions effectively.</li>
        			<li>To specify complex structured information concisely.</li>
        			<li>To design rich textual and graphical notations easily.</li>
        			<li>To implement powerful runtime solutions efficiently.</li>
        			<li>To exploit industrial standards interoperably.</li>
   
		</div>
		
		<hr class="clearer" />
<!--
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
			<h6>News on Twitter</h6>
		<a id="twitter-timeline" href="https://twitter.com/hashtag/eclipsemf" data-widget-id="503883842478809088">#eclipsemf Tweets</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</div>
</div>

<script>(function() {
if (getCookie("eclipse_cookieconsent_status") === "allow") {
      createTimeline();
  }
})()</script>

EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
