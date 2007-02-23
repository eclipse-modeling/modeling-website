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
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# $Nav->addNavSeparator("My Page Links", 	"downloads.php");
	# $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);
	
	$Nav->addNavSeparator("Downloads", "http://www.eclipse.org/downloads/index_project.php");
	$Nav->addCustomNav("EMF", "/modeling/emf/downloads/", "_self", 3);
	$Nav->addCustomNav("EMFT", "/emft/downloads/", "_self", 3);
	$Nav->addCustomNav("GMF", "http://download.eclipse.org/modeling/gmf/downloads/", "_self", 3);
	$Nav->addCustomNav("GMT", "/gmt/download/", "_self", 3);
	$Nav->addCustomNav("MDDi", "/mddi/download.php", "_self", 3);
	$Nav->addCustomNav("MDT", "/modeling/mdt/downloads/", "_self", 3);

	# End: page-specific settings
	#
		
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
		<td align="right"><img height="200" width="298" src="http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.png">
		</td>
		</table>
		<div class="homeitem3col">
			<h3>Abstract Syntax Development</h3>
			<ul>
				<li><a href="http://www.eclipse.org/modeling/emf/">Eclipse Modeling Framework</a> (EMF) : a modeling framework and code generation facility for building tools and other applications based on a structured data model.</li>
				<ul>
					<li><a href="http://www.eclipse.org/emft/projects/cdo/">CDO</a> : a technology for distributed shared EMF models and a fast server-based O/R mapping solution. With CDO you can easily enhance your existing models in such a way that saving a resource transparently commits the applied changes to a relational database.</li>
					<li><a href="http://www.eclipse.org/emft/projects/net4j/">Net4j</a> : an extensible client-server system based on the Eclipse Runtime and the Spring Framework. You can easily extend the protocol stack with Eclipse plugins that provide new transport or application protocols.</li>
					<li><a href="http://www.eclipse.org/emft/projects/teneo/">Teneo</a> : a database persistency solution for EMF using Hibernate or JPOX/JDO 2.0. It supports automatic creation of EMF to Relational Mappings and the related database schemas.</li>
					<li><a href="http://www.eclipse.org/emft/projects/query/">Model Query</a> (MQ) : facilitates the process of search and retrieval of model elements of interest in a flexible yet controlled and structured manner.</li>
					<li><a href="http://www.eclipse.org/emft/projects/transaction/">Model Transaction</a> (MT) : provides a model management layer built on top of EMF for managing EMF resources.</li>
					<li><a href="http://www.eclipse.org/emft/projects/validation/">Validation Framework</a> (VF) : provides model constraint definition, traversal, and evaluation for EMF model validation.</li>
				</ul>
			</ul>
		</div>
		<div class="homeitem3col">
			<h3>Concrete Syntax Development</h3>
			<ul>
				<li><a href="http://www.eclipse.org/gmf">Graphical Modeling Framework</a> (GMF) : provides a generative component and runtime infrastructure for developing graphical editors based on <a href="http://www.eclipse.org/modeling/emf/" target="_top"><b>EMF</b></a> and <a href="http://www.eclipse.org/gef" target="_top"><b>GEF</b></a>.</li>
				<li><a href="">Textual Modeling Framework</a> (TMF) : awaiting proposal.</li>
			</ul>
		</div>
		<div class="homeitem3col">
			<h3><a href="http://www.eclipse.org/modeling/mdt/" style="color:white">Model Development Tools</a></h3>
			<ul>
				<li><a href="http://www.eclipse.org/modeling/mdt/?project=eodm">EMF Ontology Definition Metamodel</a> (EODM) : 
					an implementation of RDF(S)/OWL metamodels of the <a href="http://www.omg.org/ontology">Ontology Definition Metamodel (ODM)</a> using 
					EMF with additional parsing, inference, model transformation and editing functions.</li>
				<li><a href="http://www.eclipse.org/modeling/mdt/?project=ocl">Object Constraint Language</a> (OCL) : 
						defines APIs for OCL expression syntax for implementing queries and contraints.</li>
				<li><a href="http://www.eclipse.org/modeling/mdt/?project=uml2">Unified Modeling Language 2.x</a> (UML2) : 
						an EMF-based implementation of the UML 2.x metamodel for the Eclipse platform.</li>
				<li><a href="http://www.eclipse.org/modeling/mdt/?project=uml2tools">UML2 Tools</a> : 
						a set of GMF-based editors for viewing and editing UML models.</li>
				<li><a href="http://www.eclipse.org/modeling/mdt/?project=xsd">XML Schema Infoset Model</a> (XSD) : 
						a reference library that provides an <a href="http://www.eclipse.org/modeling/emf/emf/xsd/javadoc?org/eclipse/xsd/package-summary.html#details">API</a> 
						for use with any code that examines, creates or modifies <a href="http://www.w3.org/TR/XMLSchema-0">W3C XML Schema</a>.</li>
			</ul>
		</div>
		<div class="homeitem3col">
			<h3>Model Transformation</h3>
			<ul>
				<li><a href="http://www.eclipse.org/m2m/">Model to Model Transformation</a> (M2M) : will deliver an extensible framework for model-to-model transformation languages, with an exemplary implementation of the <a href="http://www.omg.org/technology/documents/modeling_spec_catalog.htm#MOF_QVT">QVT</a> Core language.</li>
				<ul>
					<li><a href="http://www.eclipse.org/m2m/atl/">Atlas Transformation Language (ATL)</a> : a model transformation language and toolkit.</li>
				</ul>
				<li><a href="http://www.eclipse.org/proposals/m2t/">Model to Text Transformation</a> (M2T) : focuses on technologies for transforming models into text (typically language source code and the resources it consumes)</li>
				<ul>
					<li><a href="http://www.eclipse.org/emft/projects/jet/">Java Emitter Templates</a> (JET) : provides code generation framework & facilities that are used by EMF.</li>
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
					<li><a href="http://www.eclipse.org/gmt/mofscript/">MOFScript</a> : aims at developing tools and frameworks for supporting model to text transformations, e.g., to support generation of implementation code or documentation from models.</li>
					<li><a href="http://www.eclipse.org/gmt/oaw/">openArchitecture Ware (oAW)</a> : a suite of tools and components assisting with model driven software development built upon a modular MDA/MDD generator framework implemented in Java(TM) supporting arbitrary import (design) formats, meta models, and output (code) formats.</li>
					<li><a href="http://www.eclipse.org/gmt">UMLX</a> : concrete graphical syntax to complement the OMG QVT model transformation language.</li>
					<li><a href="http://www.eclipse.org/gmt">VIATRA2</a> : aims to provide a general-purpose support for the entire life-cycle of engineering model transformations including the specification, design, execution, validation and maintenance of transformations within and between various modeling languages and domains.</li>
					<li><a href="http://www.eclipse.org/gmt/epsilon/">Epsilon</a> : a metamodel-agnostic component for supporting model navigation, creation, and modification operations.</li>
					<li><a href="http://www.eclipse.org/gmt/gems">GEMS</a> : aims to bridge the gap between the communities experienced with visual metamodeling tools, such as the Generic Modeling Environment (GME), and those built around the Eclipse modeling technologies, such as the Eclipse Modeling Framework (EMF) and Graphical Modeling Framework (GMF).</li>
					<li><a href="http://www.eclipse.org/gmt/modisco">MoDisco</a> : an Eclipse GMT component for model-driven reverse engineering. The objective is to allow practical extractions of models from legacy systems. As a GMT component, MoDisco will make good use of other GMT components or solutions available in the Eclipse Modeling Project (EMF, M2M, GMF, TMF, etc), and more generally of any plugin available in the Eclipse environment.</li>
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
				<li><a href="http://wiki.eclipse.org/index.php/Modeling_Project">Modeling Project Wiki</a></li>
				<li><a href="http://wiki.eclipse.org/index.php/Modeling_Corner">Modeling Corner</a></li>
				<li><a href="http://www.eclipse.org/callisto">Callisto</a> - see 'Models and Model Development Tools' category.</li>
			</ul>
		</div>
	</div>
	
	<div id="rightcolumn">
		<div class="sideitem">
			<h6>News</h6>
			<ul>
				<li>Attend <a href="http://eclipsezilla.eclipsecon.org/buglist.cgi?query_format=advanced&short_desc_type=allwordssubstr&short_desc=&product=EclipseCon+2007&track_id=7&long_desc_type=substring&long_desc=&keywords_type=allwords&keywords=&bug_status=SCHEDULED&bug_status=RESOLVED&resolution=ACCEPTED&emailtype1=substring&email1=&emailreporter2=1&emailcc2=1&emailtype2=substring&email2=&bugidtype=include&bug_id=&cmdtype=doit&order=Reuse+same+sort+as+last+time&field0-0-0=noop&type0-0-0=noop&value0-0-0=">presentations on modeling projects</a> at <a href="http://www.eclipsecon.org/">EclipseCon 2007</a>.</li>
				<li>M2T project completes its <a href="http://www.eclipse.org/proposals/m2t/">Creation Review</a>.</li>
				<li><a href="http://www.eclipse.org/m2m/">M2M project</a> approved and provisioned.</li>
			</ul>
		</div>
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
