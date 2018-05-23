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
		<h1>Eclipse Modeling Framework (EMF)</h1>
	<img style="float:right" src="/modeling/emf/images/emf_logo.png" alt=""/>
	<p>
The EMF project is a modeling framework and code generation facility for building 
tools and other applications based on a structured data model. From a model 
specification described in XMI, EMF provides tools and runtime support to 
produce a set of Java classes for the model, along with a set of adapter 
classes that enable viewing and command-based editing of the model, and 
a basic editor.</p>
<p>EMF (core) is a common standard for data models, many technologies and frameworks are based on. This includes <b><a href=../server.php>server solutions</a></b>, <b><a href=../server.php>persistence frameworks</a></b>, <b><a href=../ui.php>UI frameworks</a></b> and <b><a href=../transformation.php>support for transformations</a></b>. Please have a look at the <b><a href="../">modeling project for an overview of EMF technologies</a></b>.</p>


 



<h3>EMF (Core)</h3>
<p>EMF consists of three fundamental pieces:</p>

<ul>
	<li><b>EMF</b> - The core EMF framework includes a <a href="http://download.eclipse.org/modeling/emf/emf/javadoc?org/eclipse/emf/ecore/package-summary.html#details">meta
	model (Ecore)</a> for describing models and runtime support for the
	models including change notification, persistence support with
	default XMI serialization, and a very efficient reflective API for
	manipulating EMF objects generically.</li>

	<li class="outerli"><b>EMF.Edit -</b> The EMF.Edit framework includes generic
	reusable classes for building editors for EMF models. It
	provides
		<ul>
			<li>Content and label provider classes, property source support,
			and other convenience classes that allow EMF models to be displayed
			using standard desktop (JFace) viewers and property sheets.</li>

			<li>A command framework, including a set of generic command
			implementation classes for building editors that support fully
			automatic undo and redo.</li>
		</ul>
	</li>

	<li><b>EMF.Codegen</b> - The EMF code generation facility is
	capable of generating everything needed to build a complete editor
	for an EMF model. It includes a GUI from which generation options
	can be specified, and generators can be invoked. The generation
	facility leverages the JDT (Java Development Tooling) component of
	Eclipse.</li>
</ul>

<p>Three levels of code generation are supported:</p>

<ul>
	<li><b>Model</b> - provides Java interfaces and implementation
	classes for all the classes in the model, plus a factory and
	package (meta data) implementation class.</li>

	<li><b>Adapters</b> - generates implementation classes (called
	ItemProviders) that adapt the model classes for editing and
	display.</li>

	<li><b>Editor</b> - produces a properly structured editor that
	conforms to the recommended style for Eclipse EMF model editors and
	serves as a starting point from which to start customizing.</li>
</ul>

<p>All generators support regeneration of code while preserving user
modifications. The generators can be invoked either through the GUI
or headless from a command line.</p>

<p>Want to learn more about how easy it is to use this exciting new
technology to help you boost your Java programming productivity,
application compatibility and integration? Start by reading the <a
href="gettingstarted.php">getting started</a>,
followed by <a href="docs/">more documentation</a>,
and then sit back and watch your applications write themselves!
Well, not completely, but this wouldn't be a sales pitch if there
weren't a little bit of exaggeration.</p>

</div>
	
	
	<div id="rightcolumn">
	<div class="sideitem">
                <h6>Buy The Book</h6>

                <p align="center">
                        <a href="http://www.informit.com/title/9780321331885"><img src="/modeling/emf/images/book/EMF-2nd-Ed-Cover-Small.jpg"/></a>
                </p>
                <ul>
                
                </ul>
        </div>
		<div class="sideitem">
			<h6>News on Twitter</h6>
		<a id="twitter-timeline" href="https://twitter.com/hashtag/eclipsemf" data-widget-id="503883842478809088">#eclipsemf Tweets</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
