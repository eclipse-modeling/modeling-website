<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# index.php
	#
	# Author: 		Richard Gronback
	# Date:			2006-05-11
	# Modification: 2008-01-16 Removed restriction to add new projects without Board consent, as per vote this day. [Richard Gronback]
	#
	# Description: Modeling project charter
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
	<div id="midcolumn"><br>
		<h1>Eclipse Modeling Project Charter</h1>		
		<hr>
		
		<h2>Overview</h2>
		<p>This charter was developed in accordance with the <a href="http://www.eclipse.org/projects/dev_process/proposal-phase.php">Eclipse Development Process</a> 
		and will outline the mission, scope, organization, and development process for the Eclipse Modeling Project.
			This document extends the <a href="http://www.eclipse.org/org/processes/Eclipse_Standard_TopLevel_Charter_v1.0.html">Eclipse Standard Top-Level Charter v1.0</a>, and includes the required content and overrides which follow. 
			It is anticipated that as the standard charter is updated, this charter will incorporate the changes and make adjustments as seen fit by the PMC, and 
		with approval from the EMO and board of directors.</p>

		<h2>Mission</h2>
		<p>The Eclipse Modeling Project will focus on the evolution and promotion 
of model-based development technologies within the Eclipse community. It will 
unite projects falling into this classification to bring holistic model-based development 
capabilities to Eclipse.</p>
		
		<h2>Scope</h2>
      <p>The items below delineate the scope of the Modeling project.  
They do not do so uniquely, as other roughly equivalent terms and concepts could 
have been chosen to define the domain of modeling in the context of software 
development.</p>
         
         <blockquote>   
		        <h3>Abstract Syntax Development</h3>
		        <p>Included in the scope of the project is a framework to support the definition of
		abstract syntax for modeling languages that support business, system,
		and software modeling, using an industry standard modeling
		facility or language. The framework for developing abstract syntax
		will support editing, validating, testing, querying, and refactoring
		models created with the modeling facility. This includes the
		production of general-purpose modeling languages in addition to
		application domain specific models.</p>
		            
		        <p>The underlying modeling facility must support the production 
		of a wide range of models, not all of which will themselves be suited for 
		inclusion within the Modeling project.  Only those models and modeling languages 
		of broad cross-domain utility fall within the scope of the Modeling project 
		itself.  For example, implementations of the Object Constraint Language (OCL) 
		and Unified Modeling Language (UML) specifications are appropriately maintained 
		within the Modeling project. In contrast, it is expected that users will create 
		and maintain languages for narrowly defined problem domains using the project 
		facilities, but that these languages and models will not be of interest to the 
		general modeling community. A section below includes a more complete list of 
		standard languages within the scope of the Modeling project.</p>
				
				<h3>Concrete Syntax Development</h3>
				<p>Support for the production of textual and graphical concrete syntax for an
		abstract syntax is within the scope of the project. Both manual and
		generative approaches to the production of these are to be supported.
		As examples, graphical editing for the Unified Modeling Language (UML)
		as well as editing of UML models using textual notation 
		fall within the scope of the project. Furthermore, the
		production of editors for any Domain-Specific Language (DSL) is within scope.</p>
				
			<p>With respect to support of textual notation in
		the form of Eclipse editors, the Modeling project will focus on the
		generative aspect to producing these editors, targeting the facilities
		provided by the platform.</p>
				
				<h3>Model Transformation</h3>
				<p>The transformation of models using a transformation definition and
		associated technologies falls within the scope of the project.
		The support of industry standards is expected in this area,
		specifically the OMG's Query, View, Transformation (QVT) specification.</p>
				
				<h3>Model to Text Generation</h3>
				<p>Text generation from a model, typically source code of some programming
		language, including the merger of user changes to generated
		output, is within the scope of the project. Alternative
		mechanisms have been requested by the community and along with support
		for patterns, falls within the scope of the project.</p>
						
				<h3>Industry Standards</h3>
				<p>The importance of supporting industry standards is critical to the success
		of the Modeling project, and to Eclipse in general. The role of the
		Modeling project in the support of industry standards is to enable
		their creation and maintenance within the Eclipse community.
		Furthermore, as standards bodies such as the OMG have a strong modeling
		focus, the Modeling project needs to facilitate communication and
		outreach through its PMC and project contributors to foster a good
		working relationship with external organizations.</p>
				<p>The following industry standards are within the scope of the Modeling project and are either supported by current modeling
		projects, or are anticipated to be supported in the future:</p>
				<ul>
					<li>Object Management Group (OMG) <a href="http://www.omg.org/technology/documents/modeling_spec_catalog.htm">standards</a>
					 	<ul>
					  		<li>Meta-Object Facility (MOF)</li>
					  		<li>Unified Modeling Language (UML) and UML Profiles not falling within the scope of other projects</li>
					  		<li>Model-Driven Architecture (MDA) related specifications</li>
					  		<li>Query, View, Transformation (QVT)</li>
					  		<li>MOF to Text (MOF2T)</li>
					  		<li>Diagram Interchange Specification (DIS)</li>
					  		<li>XML Metadata Interchange (XMI)</li>
						</ul>
					</li>
					<li>Business Process Modeling Notation (BPMN)</li>
					<li>Business Process Definition Metamodel (BPDM)</li>
				  	<li>XML Schema Definition (XSD)</li>
				</ul>
				
				<h3>Domain-Specific Modeling</h3>
				<p>The support of industry standards and specifications are an important
		aspect to the scope of the Modeling project, but not to the exclusion
		of the emerging trend of Domain-Specific Languages (DSLs). The Eclipse Modeling Project will
		provide leadership in delivering these capabilities through its
		projects and in working with others within the Eclipse and external
		communities.</p>
			<p>The generative production of editors for textual notations is an essential
		component of DSL support within Eclipse, and required if Eclipse is to
		be used as a "language workbench." The Modeling project will provide,
		within its scope, the generative aspect of producing these editors to
		complement graphical editors for a modeled domain.</p>
				
				<h3>Out of Scope</h3>
				<p>Clearly, there are some things that are <b>not</b>
		in the scope of the Modeling Project. In particular, there are certain
		DSLs and industry-based models that the Modeling Project should support
		creation of at a fundamental level, but that are not appropriate to be
		housed within the project. Specific examples are listed below:</p>
				<ul>
					<li>A home for DSLs based on EMF which do not pertain to the modeling domain,
		e.g. the Java EMF Model (JEM) created for the Visual Editor (VE)
		project and used by the WebTools project.</li>
					<li>UML Profiles falling within the scope of other projects.</li>
					<li>A number of OMG standards that fall into the modeling realm are not considered to be within the scope of this project:
						<ul>
							<li>Software Process Engineering Metamodel (SPEM), as it is part of the proposed Beacon project.</li>
							<li>Common Warehouse Metamodel (CWM), as it is likely to be included in DTP.</li>
							<li>UML Testing Profile, as it is included in the TPTP project.</li>
							<li>Reusable Asset Specification (RAS)</li>
							<li>etc...</li>
						</ul>
					</li>
					<li>As mentioned above, in support of textual notation editor generation, the
		Modeling project will work with the Platform or other teams, and not
		itself focus on the development of general purpose text editor
		frameworks.</li>
					<li>In the area of model transformation, XSL does
		not fall within the scope of the Modeling project and is provided
		within the context of the WebTools Project (WTP).</li>
				</ul>
</blockquote>

		<h2>Project Management Committee (PMC)</h2>
		<p>The content found in this section of the standard charter is sufficient for the Modeling project, with the exception of those subsections found
			here related to the project's Requirements, Architecture, and Planning Groups.</p>
	<blockquote>		
		<h3>Requirements Group</h3>
		<p>The Requirements Group is formed at the discretion of the PMC. The Requirements Group gathers requirements for the project 
			and communicates them to all members of the Project, including the PMC. The Requirements Group will accomplish its objectives 
			by working closely with the development teams and the PMC.</p>
		
		<h3>Architecture Group</h3>
		<p>The Architecture Group is formed at the discretion of the PMC. The Architecture Group is responsible for development, articulation 
			and maintenance of the Project Architecture, as well as for providing an explicit description of the architecture and communicating 
			this description to all members of the Project, and for releasing it as part of the project deliverables. The Architecture Group will 
			accomplish its objectives by working closely with the development teams and the PMC.</p>
		
		<h3>Planning Group</h3>
		<p>The Planning Group is formed at the discretion of the PMC. The Planning Group assists the PMC in establishing the Project plan 
			in conjunction with available Project resources, coordinating relationships between Project participants and with other Eclipse projects. 
			The Planning Group helps to ensure that projects have enough contributors, filling vacancies in roles and facilitating code or other 
			donations by individuals or companies. The Planning Group will accomplish its objectives by working closely with the development teams and the PMC.</p>
	</blockquote>	
		<h2>Roles</h2>
		<p>The content found in this section of the <a href="http://www.eclipse.org/org/processes/Eclipse_Standard_TopLevel_Charter_v1.0.html">standard charter</a> is sufficient for the Modeling project, with the exception of those items listed below.</p>
	<blockquote>
		<h3>Committers</h3>
		<p>It is the responsibility of the Committers to maintain the accuracy of the version numbers of their plug-ins in accordance with the published <a href="http://www.eclipse.org/equinox/documents/plugin-versioning.html">guidelines</a>.</p>
	</blockquote>
		<h2>Projects</h2>
		<p>The content found in this section of the <a href="http://www.eclipse.org/org/processes/Eclipse_Standard_TopLevel_Charter_v1.0.html">standard charter</a> is sufficient for the Modeling project.
		  
			The modeling project considers it a core mandate to continue the development of reusable infrastructure components which are independent of the higher level components as shown in the architecture diagram below.  The architectural separation will ensure the infrastructure components can be used on their own without requiring the complete modeling platform and will ensure that other Eclipse Foundation Top level projects can continue to consume these components from the project. 
		
			Below is a diagram representing the projects found in the Modeling project, as well as those under recruitment by the PMC.</p>
			
			<img src="modeling.png"/>
			
		<p>
			[1] The PMC will look to the EMO's judgement as to which cases would benefit from board review.
			Note that the diagram is an architectural/dependency rendering, not a specification of the scope, i.e., the text not the diagram is normative.
			</p>
		<h2>Infrastructure</h2>
		<p>The content found in this section of the <a href="http://www.eclipse.org/org/processes/Eclipse_Standard_TopLevel_Charter_v1.0.html">standard charter</a> is sufficient for the Modeling project, with the exception of those items listed below.</p>
		
		<p>To the greatest extend possible, the PMC will facilitate the use of common infrastructure and process by all projects within the Modeling project, e.g. build, IP tracking, etc... This
			should include a continuous build mechanism, cascading builds, and common reporting infrastructure.</p>
		
		<h2>Development Process</h2>
		<p>The content found in this section of the <a href="http://www.eclipse.org/org/processes/Eclipse_Standard_TopLevel_Charter_v1.0.html">standard charter</a> is sufficient for the Modeling project, with the exception of those items listed below.</p>
			
		<blockquote>			
		<h3>Tests</h3>
		<p>It is expected that contributors to the project provide a test with each contribution. It will fall to the responsibility of the Committers
		to ensure that adequate tests are provided for each commit to the source repository.</p>
		
		<h3>Release Cycle</h3>
		<p>Each project will coordinate their release cycles and be respectful of their dependent projects, particularly in the context of a larger
		Eclipse coordinated release cycle. Projects are expected to publish their milestone plans.</p>
		</blockquote>
		
		<b>Notes:</b><br/>
		[1] The Board of Directors voted on 2008-01-16 and approved the removal of this sentence from the charter, "To ensure the scope of the project remains consistent within the modeling mission, the PMC will seek Eclipse board approval for the creation of new projects."

	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
