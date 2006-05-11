<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# index.php
	#
	# Author: 		Richard Gronback
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
		<h3>About Modeling (provisioning still in progress)...</h3>
		<p>The Eclipse Modeling Project focuses on the evolution and promotion of model-based 
development technologies within the Eclipse community by providing a unified set of modeling frameworks, tooling, and standards implementations.</p>
		<div class="homeitem3col">
			<h3>Framework Projects</h3>
			<ul>
				<li><a href="http://www.eclipse.org/emf">EMF</a>. Eclipse Modeling Framework: a modeling framework and code generation facility for building tools and other applications based on a structured data model.</li>
				<li><a href="http://www.eclipse.org/gmf">GMF</a>. Graphical Modeling Framework: provides a generative component and runtime infrastructure for developing graphical editors based on <a href="http://www.eclipse.org/emf" target="_top"><b>EMF</b></a> and <a href="http://www.eclipse.org/gef" target="_top"><b>GEF</b></a>.</li>
				<li><a href="http://www.eclipse.org/emft/projects/validation">VF</a>. Validation Framework: provides model constraint definition, traversal, and evaluation for EMF model validation.</li>
				<li><a href="http://www.eclipse.org/mddi">MDDi</a>. Model Driven Development integration: produces an extensible framework and exemplary tools dedicated to integration of modeling tools in Eclipse.</li>
			</ul>
		</div>
		<div class="homeitem3col">
			<h3>Standards Implementations</h3>
			<ul>
				<li><a href="http://www.eclipse.org/uml2">UML2</a>. Unified Modeling Language 2: an EMF-based implementation of the UML� 2.x metamodel for the Eclipse platform.</li>
				<li><a href="http://www.eclipse.org/emft/projects/ocl">OCL</a>. Object Constraint Language: defines APIs for OCL expression syntax for implementing queries and contraints.</li>
				<li><a href="http://www.eclipse.org/xsd">XSD</a>. XML Schema Infoset Model: a reference library that provides an <a href="http://download.eclipse.org/tools/emf/xsd/javadoc?org/eclipse/xsd/package-summary.html#details">API</a> for use with any code that examines, creates or modifies <a href="http://www.w3.org/TR/XMLSchema-0">W3C XML Schema</a>.</li>
				<li><a href="http://www.eclipse.org/emft/projects/eodm">EODM</a>. EMF Ontology Definition Metamodel is an implementation of RDF(S)/OWL metamodels of the <a href="http://www.omg.org/ontology">Ontology Definition Metamodel (ODM)</a> using EMF with additional parsing, inference, model transformation and editing functions.</li>
			</ul>
		</div>
		<div class="homeitem3col">
			<h3>Model Technology and Research Projects</h3>
			<ul>
				<li><a href="http://www.eclipse.org/emft/projects/jet">JET</a>. Java Emitter Templates: provides code generation framework & facilities that are used by EMF.</li>
				<li><a href="http://www.eclipse.org/emft/projects/query">MQ</a>. Model Query: facilitates the process of search and retrieval of model elements of interest in a flexible yet controlled and structured manner.</li>
				<li><a href="http://www.eclipse.org/emft/projects/transaction">MT</a>. Model Transaction: provides a model management layer built on top of EMF for managing EMF resources.</li>
				<li><a href="http://www.eclipse.org/gmt">GMT</a>. Generative Modeling Tools: research-oriented project focused on producing prototypes in the area of Model Driven Engineering (MDE).</li>
				<li><a href="http://www.eclipse.org/mddi">MDDi</a>. Model Driven Development integration: produces an extensible framework and exemplary tools dedicated to integration of modeling tools in Eclipse.</li>
			</ul>
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
			<h6>Related links</h6>
			<ul>
				<li><a href="http://www.eclipse.org/callisto">Callisto</a> - see 'Models and Model Development Tools' category.</li>
			</ul>
		</div>
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
