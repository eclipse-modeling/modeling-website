<?php  																														
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	
require_once($_SERVER['DOCUMENT_ROOT'] . "/projects/common/project-info.class.php");
$App = new App(); $Nav = new Nav(); $Menu = new Menu(); 
$projectInfo = new ProjectInfo("modeling");
$projectInfo->generate_common_nav( $Nav );		
include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

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
		<p>The Modeling Project charter is posted <a href="http://www.eclipse.org/modeling/modeling-charter.php">here</a> and inherits from the <a href="http://www.eclipse.org/org/processes/Eclipse_Standard_TopLevel_Charter_v1.0.html">Eclipse Standard Top-Level Charter v1.0</a>.</p>
		<div class="homeitem3col">
			<h3>Abstract Syntax Development</h3>
			<ul>
				<li><a href="http://www.eclipse.org/emf">Eclipse Modeling Framework</a> (EMF) : a modeling framework and code generation facility for building tools and other applications based on a structured data model.</li>
				<ul>
					<li><a href="http://www.eclipse.org/emft/projects/query">Model Query</a> (MQ) : facilitates the process of search and retrieval of model elements of interest in a flexible yet controlled and structured manner.</li>
					<li><a href="http://www.eclipse.org/emft/projects/transaction">Model Transaction</a> (MT) : provides a model management layer built on top of EMF for managing EMF resources.</li>
					<li><a href="http://www.eclipse.org/emft/projects/validation">Validation Framework</a> (VF) : provides model constraint definition, traversal, and evaluation for EMF model validation.</li>
					<li><a href="http://www.eclipse.org/emft/projects/cdo/">CDO</a> : a technology for distributed shared EMF models and a fast server-based O/R mapping solution. With CDO you can easily enhance your existing models in such a way that saving a resource transparently commits the applied changes to a relational database.</li>
					<li><a href="http://www.eclipse.org/emft/projects/net4j/">Net4j</a> : an extensible client-server system based on the Eclipse Runtime and the Spring Framework. You can easily extend the protocol stack with Eclipse plugins that provide new transport or application protocols.</li>
				</ul>
			</ul>
		</div>
		<div class="homeitem3col">
			<h3>Concrete Syntax Development</h3>
			<ul>
				<li><a href="http://www.eclipse.org/gmf">Graphical Modeling Framework</a> (GMF) : provides a generative component and runtime infrastructure for developing graphical editors based on <a href="http://www.eclipse.org/emf" target="_top"><b>EMF</b></a> and <a href="http://www.eclipse.org/gef" target="_top"><b>GEF</b></a>.</li>
				<li><a href="">Textual Modeling Framework</a> (TMF) : awaiting proposal.</li>
			</ul>
		</div>
		<div class="homeitem3col">
			<h3>Model Development Tools</h3>
			<ul>
				<li><a href="http://www.eclipse.org/uml2">Unified Modeling Language 2</a> (UML2) : an EMF-based implementation of the UML 2.x metamodel for the Eclipse platform.</li>
				<ul>
					<li><a href="http://www.eclipse.org/emft/projects/ocl">Object Constraint Language</a> (OCL) : defines APIs for OCL expression syntax for implementing queries and contraints.</li>
				</ul>
				<li><a href="http://www.eclipse.org/xsd">XML Schema Infoset Model</a> (XSD) : a reference library that provides an <a href="http://download.eclipse.org/tools/emf/xsd/javadoc?org/eclipse/xsd/package-summary.html#details">API</a> for use with any code that examines, creates or modifies <a href="http://www.w3.org/TR/XMLSchema-0">W3C XML Schema</a>.</li>
				<li><a href="http://www.eclipse.org/emft/projects/eodm">EMF Ontology Definition Metamodel</a> (EODM) : is an implementation of RDF(S)/OWL metamodels of the <a href="http://www.omg.org/ontology">Ontology Definition Metamodel (ODM)</a> using EMF with additional parsing, inference, model transformation and editing functions.</li>
			</ul>
		</div>
		<div class="homeitem3col">
			<h3>Model Transformation</h3>
			<ul>
				<li><a href="http://www.eclipse.org/proposals/m2m/">Model to Model Transformation</a> (M2M) : will deliver an extensible framework for model-to-model transformation languages, with an exemplary implementation of the <a href="http://www.omg.org/technology/documents/modeling_spec_catalog.htm#MOF_QVT">QVT</a> Core language.</li>
				<li><a href="">Model to Text Transformation</a> (M2T) : awaiting proposal</li>
				<ul>
					<li><a href="http://www.eclipse.org/emft/projects/jet">Java Emitter Templates</a> (JET) : provides code generation framework & facilities that are used by EMF.</li>
					<li><a href="http://www.eclipse.org/emft/projects/jeteditor/">JET Editor</a> : leverages Eclipse text editor framework to provide this capability via features like syntax coloring, error highlighting and code completion.</li>
				</ul>
			</ul>
		</div>
		<div class="homeitem3col">
			<h3>Model Integration</h3>
			<ul>
				<li><a href="http://www.eclipse.org/mddi">Model Driven Development integration</a> (MDDi) : produces an extensible framework and exemplary tools dedicated to integration of modeling tools in Eclipse.</li>
			</ul>
		</div>
		<div class="homeitem3col">
			<h3>Technology and Research</h3>
			<ul>
				<li><a href="http://www.eclipse.org/gmt">Generative Modeling Technologies</a> (GMT) : research-oriented project focused on producing prototypes in the area of Model Driven Engineering (MDE).</li>
				<ul>
					<li><a href="http://www.eclipse.org/gmt/am3/">Atlas MegaModel Management (AM3)</a> : the goal is to provide a practical support for modeling in the large. The objective is to deal with global resource management in a model-engineering environment. We base this activity on the concept of a "megamodel".</li>
					<li><a href="http://www.eclipse.org/gmt/amw/">Atlas Model Weaver (AMW)</a> : a tool for representing correspondences between models. The correspondences are stored in a model, called weaving model. It is created conforming to a weaving metamodel.</li>
					<li><a href="http://www.eclipse.org/gmt/atl/">Atlas Transformation Language (ATL)</a> : aims at providing a set of transformation tools for GMT. These include some sample ATL transformations, an ATL transformation engine, and an IDE for ATL (ADT: ATL Development Tools).</li>
					<li><a href="http://dev.eclipse.org/viewcvs/indextech.cgi/~checkout~/gmt-home/doc/fuut/index.html">Fuut-je</a> : a prototype model-driven code and text generation tool for GMT.</li>
					<li><a href="http://www.eclipse.org/gmt/mofscript/">MOFScript</a> : aims at developing tools and frameworks for supporting model to text transformations, e.g., to support generation of implementation code or documentation from models.</li>
					<li><a href="http://www.eclipse.org/gmt/oaw/">openArchitecture Ware (oAW)</a> : a suite of tools and components assisting with model driven software development built upon a modular MDA/MDD generator framework implemented in Java(TM) supporting arbitrary import (design) formats, meta models, and output (code) formats.</li>
					<li><a href="http://dev.eclipse.org/viewcvs/indextech.cgi/~checkout~/gmt-home/subprojects/UMLX/index.html>UMLX</a> : concrete graphical syntax to complement the OMG QVT model transformation language.</li>
					<li><a href="http://dev.eclipse.org/viewcvs/indextech.cgi/~checkout~/gmt-home/subprojects/VIATRA2/index.html">VIATRA2</a> : aims to provide a general-purpose support for the entire life-cycle of engineering model transformations including the specification, design, execution, validation and maintenance of transformations within and between various modeling languages and domains.</li>
				</ul>
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
	
	<div id="rightcolumn">
		<div class="sideitem">
			<h6>Events</h6>
			<ul>
				<li>Callisto webinar <a href="http://adobedev.breezecentral.com/p17835008/">recording</a> - covering modeling frameworks EMF & GMF.</li>
			</ul>
		</div>
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
