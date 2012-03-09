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
			<h3>Abstract Syntax Development</h3>
			<ul>
				<li><a href="http://www.eclipse.org/modeling/emf/">Eclipse Modeling Framework</a> (EMF) : a modeling framework and code generation facility for building tools and other applications based on a structured data model.</li>
				<ul>
					<li><a href="http://www.eclipse.org/modeling/emft/?project=cdo">CDO</a> : a technology for distributed shared EMF models and a fast server-based O/R mapping solution. With CDO you can easily enhance your existing models in such a way that saving a resource transparently commits the applied changes to a relational database.</li>
					<li><a href="http://www.eclipse.org/modeling/emft/?project=net4j">Net4j</a> : an extensible client-server system based on the Eclipse Runtime and the Spring Framework. You can easily extend the protocol stack with Eclipse plugins that provide new transport or application protocols.</li>
					<li><a href="http://www.eclipse.org/modeling/emft/?project=teneo">Teneo</a> : a database persistency solution for EMF using Hibernate or EclipseLink. It supports automatic creation of EMF to Relational Mappings and the related database schemas.</li>
					<li><a href="http://www.eclipse.org/modeling/emf/?project=query">Model Query</a> (MQ) : facilitates the process of search and retrieval of model elements of interest in a flexible yet controlled and structured manner.</li>
					<li><a href="http://www.eclipse.org/modeling/emf/?project=transaction">Model Transaction</a> (MT) : provides a model management layer built on top of EMF for managing EMF resources.</li>
					<li><a href="http://www.eclipse.org/modeling/emf/?project=validation">Validation Framework</a> (VF) : provides model constraint definition, traversal, and evaluation for EMF model validation.</li>
				</ul>
			</ul>
		</div>
		<div class="homeitem3col">
			<h3>Concrete Syntax Development</h3>
			<ul>
				<li><a href="/modeling/gmp">Graphical Modeling Project</a> (GMP) : provides a generative components and runtime infrastructures for developing graphical editors based on <a href="/modeling/emf/" target="_top"><b>EMF</b></a> and <a href="/gef" target="_top"><b>GEF</b></a>.</li>
				<ul>
					<li><a href="/modeling/gmp/gmf-tooling">GMF Tooling</a> : provides a model-driven approach to generating graphical editors in Eclipse..</li>
					<li><a href="/modeling/gmp/gmf-runtime">GMF Runtime</a> : an industry proven application framework for creating graphical editors using EMF and GEF.</li>
					<li><a href="/modeling/gmp/gmf-notation">GMF Notation</a> : provides a standard EMF notational meta model.</li>
					<li><a href="/modeling/gmp/graphiti">Graphiti</a> : Graphiti is an Eclipse-based graphics framework to enable easy development of state-of-the-art diagram editors for domain models.</li>
				</ul>
				<li><a href="/modeling/tmf/">Textual Modeling Framework</a> (TMF) : provides tools and frameworks for developing textual syntaxes and corresponding editors based on <a href="/modeling/emf/" target="_top"><b>EMF</b></a>.</li>
				<ul>
					<li><a href="http://www.eclipse.org/modeling/tmf/?project=xtext">Xtext</a> : a powerful framework/tool for developing external textual DSLs based on <a href="http://www.eclipse.org/modeling/emf/" target="_top"><b>EMF</b></a>.</li>
					<li><a href="http://www.eclipse.org/gmt/tcs/">TCS</a> : a component that enables the specification of textual concrete syntaxes for Domain-Specific Languages (DSLs) by attaching syntactic information to metamodels.</li>
				</ul>
			</ul>
		</div>
		<div class="homeitem3col">
			<h3><a href="http://www.eclipse.org/modeling/mdt/">Model Development Tools</a> (MDT)</h3>
			<ul>
				<li><a href="http://www.eclipse.org/modeling/mdt/?project=bpmn2">Business Process Metamodel and Notation 2.x</a> (BPMN2) : 
						an EMF-based implementation of the BPMN 2.x metamodel for the Eclipse platform.</li>
				<li><a href="http://www.eclipse.org/etrice/">eTrice</a> : 
						provides an implementation of the ROOM modeling language together with editors, code generator for Java, C++ and C code and exemplary target middleware.</li>
				<li><a href="http://www.eclipse.org/modeling/mdt/?project=modisco">MoDisco</a> : 
						provides an extensible framework to develop model-driven tools to support use-cases of existing software modernization.</li>
				<li><a href="http://www.eclipse.org/modeling/mdt/?project=ocl">Object Constraint Language</a> (OCL) : 
						defines APIs for OCL expression syntax for implementing queries and constraints.</li>
				<li><a href="http://www.eclipse.org/modeling/mdt/papyrus/">Papyrus</a> : 
						provides an integrated and user-consumable environment for editing any kind of EMF model and particularly supporting UML and related modeling languages such as SysML and MARTE.</li>
				<li><a href="http://www.eclipse.org/sphinx/">Sphinx</a> : 
						provides an extensible platform that eases the creation of integrated modeling tool environments supporting individual or multiple modeling languages (which can be UML-based or native DSLs) and has a particular focus on industrial strength and interoperability.</li>
				<li><a href="http://www.eclipse.org/modeling/mdt/?project=uml2">Unified Modeling Language 2.x</a> (UML2) : 
						an EMF-based implementation of the UML 2.x metamodel for the Eclipse platform.</li>
				<li><a href="http://www.eclipse.org/modeling/mdt/?project=uml2tools">UML2 Tools</a> : 
						a set of GMF-based editors for viewing and editing UML models.</li>
				<li><a href="http://www.eclipse.org/modeling/mdt/?project=xsd">XML Schema Definition</a> (XSD) : 
						a reference library that provides an <a href="http://www.eclipse.org/modeling/mdt/javadoc/?project=xsd&page=org/eclipse/xsd/package-summary.html&anchor=details">API</a> 
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
				<li><a href="http://www.eclipse.org/modeling/m2t/">Model to Text Transformation</a> (M2T) : focuses on technologies for transforming models into text (typically language source code and the resources it consumes)</li>
				<ul>
				    <li><a href="http://www.eclipse.org/acceleo">Acceleo</a> : a template based code generation framework with high quality tooling : complete Editor, Debugger and Profiler.</li>
					<li><a href="http://www.eclipse.org/modeling/m2t/?project=jet">Java Emitter Templates</a> (JET) : provides code generation framework & facilities that are used by EMF. Includes an editor which provides features like syntax coloring, error highlighting and code completion.</li>
					<li><a href="http://www.eclipse.org/modeling/m2t/?project=xpand">Xpand</a> : a statically-typed template language featuring polymorphic template invocation, aspect oriented programming, functional extensions, a flexible type system abstraction, model transformation and validation. Includes an editor which provides features like syntax coloring, error highlighting, navigation, refactoring and code completion.</li>
				</ul>
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
					<li><a href="http://www.eclipse.org/gmt">UMLX</a> : concrete graphical syntax to complement the OMG QVT model transformation language.</li>
					<li><a href="http://www.eclipse.org/gmt">VIATRA2</a> : aims to provide a general-purpose support for the entire life-cycle of engineering model transformations including the specification, design, execution, validation and maintenance of transformations within and between various modeling languages and domains.</li>
					<li><a href="http://www.eclipse.org/gmt/epsilon/">Epsilon</a> : a metamodel-agnostic component for supporting model navigation, creation, and modification operations.</li>
					<li><a href="http://www.eclipse.org/gmt/gems">GEMS</a> : aims to bridge the gap between the communities experienced with visual metamodeling tools, such as the Generic Modeling Environment (GME), and those built around the Eclipse modeling technologies, such as the Eclipse Modeling Framework (EMF) and Graphical Modeling Framework (GMF).</li>
					<li><a href="http://www.eclipse.org/gmt/modisco">MoDisco</a> : an Eclipse GMT component for model-driven reverse engineering. The objective is to allow practical extractions of models from legacy systems. As a GMT component, MoDisco will make good use of other GMT components or solutions available in the Eclipse Modeling Project (EMF, M2M, GMF, TMF, etc), and more generally of any plugin available in the Eclipse environment.</li>
				</ul>
			</ul>
		</div>
		<div class="homeitem3col">
			<h3>Amalgam</h3>
			<ul>
				<li><a href="http://www.eclipse.org/modeling/amalgam">Modeling Amalgamation Project</a> (Amalgam) : provides improved packaging, integration, and usability of Modeling project components.</li>
				<ul>
					<li><a href="http://www.eclipse.org/downloads/packages/eclipse-modeling-tools-includes-incubating-components/galileosr1">
					<img alt="All-In-One Bundle including Eclipse and required dependencies" src="/modeling/images/dl-icon-aio-bundle.gif"/> 
					<b style="color:green">All-In-One</b> Galileo SR1 Modeling Tools Package</a> : an <a href="http://www.eclipse.org/epp">Eclipse Packaging Project</a> that includes most Modeling SDKs.</li>
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
				<li>
				<a href="http://wiki.eclipse.org/Helios">Helios</a>, <a href="http://wiki.eclipse.org/Galileo">Galileo</a>, 
				<a href="http://wiki.eclipse.org/Ganymede">Ganymede</a>, <a href="http://wiki.eclipse.org/Europa">Europa</a>, <a href="http://www.eclipse.org/callisto">Callisto</a> - 
				see 'Models and Model Development Tools' category.</li>
				<li><a href="http://www.eclipse.org/modeling/project-info/team.php">Who`s Who in Modeling?</a></li>
			</ul>
		</div>
	</div>
	
	<div id="rightcolumn">
		<div class="sideitem">
			<h6>News</h6>
			<ul>
				<li><a href="http://www.eclipse.org/downloads/packages/eclipse-modeling-tools-includes-incubating-components/galileosr1">
				<img alt="All-In-One Bundle including Eclipse and required dependencies" src="/modeling/images/dl-icon-aio-bundle.gif"/> 
				<b style="color:green">All-In-One</b> Galileo SR1 Modeling Tools Package</a> is available</a>.</li>
				<li>Domain Specific Modeling <a href="http://eclipsesummit.org/summiteurope2007/index.php?page=detail/&id=32">demo</a> viewlets from <a href="http://eclipsesummit.org/summiteurope2007/index.php">Eclipse Summit Europe 2007</a> are <a href="http://www.eclipse.org/modeling/presentations/ese2007/index.php">posted</a>.</li>
			</ul>
		</div>
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
