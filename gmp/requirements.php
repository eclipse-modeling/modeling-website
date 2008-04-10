<?php                                                                                                               
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/app.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/nav.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/menu.class.php"); 
require_once($_SERVER['DOCUMENT_ROOT'] . "/projects/common/project-info.class.php");
$App = new App(); $Nav = new Nav(); $Menu = new Menu(); 
$projectInfo = new ProjectInfo("modeling.gmf");
$projectInfo->generate_common_nav( $Nav );
include ($App->getProjectCommon()); 
	#*****************************************************************************
	#
	# index.php
	#
	# Author: 		Richard C. Gronback
	# Date:			2005-12-01
	#
	# Description: 
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "GMF Project Requirements";
	$pageKeywords	= "eclipse,project,graphical,modeling,model-driven";
	$pageAuthor		= "Richard C. Gronback";
	
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
	<div id="midcolumn"><br/>
		<table border="0" cellpadding="2" cellspacing="0" width="100%">
			<tbody>
				<tr>
					<td align="left"><h1>$pageTitle</h1></td>
					<td align="right"><img align="right" src="http://www.eclipse.org/gmf/images/logo_banner.png" /></td>
				</tr>
				<tr>
		<td align="left" valign="top" colspan="2"><b>Note:</b> This document is deprecated but
		maintained for historical reference. The requirements listed here now have corresponding Bugzilla entries,
		which are linked next to each item below. To see a list of all GMF plan items in Bugzilla, use <a
			href="https://bugs.eclipse.org/bugs/buglist.cgi?query_format=advanced&short_desc_type=allwordssubstr&short_desc=%5Breq%5D&classification=Modeling&product=GMF&long_desc_type=allwordssubstr&long_desc=&bug_file_loc_type=allwordssubstr&bug_file_loc=&status_whiteboard_type=allwordssubstr&status_whiteboard=&keywords_type=allwords&keywords=&bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&bug_status=RESOLVED&bug_status=VERIFIED&bug_status=CLOSED&emailtype1=substring&email1=&emailtype2=substring&email2=&bugidtype=include&bug_id=&votes=&chfieldfrom=&chfieldto=Now&chfieldvalue=&cmdtype=doit&order=Reuse+same+sort+as+last+time&field0-0-0=noop&type0-0-0=noop&value0-0-0=">this</a>
		link.</td>
	</tr>
			</tbody>
		</table>
		<hr/>
<table border="0" cellspacing="5" cellpadding="2" width="100%">
	<tr>
		<td align="left" valign="top" colspan="2" bgcolor="#595791"><b><font
			color="#ffffff" face="Arial,Helvetica">Document Information</font></b></td>
	</tr>	
	<tr>
		<td align="left" valign="top" colspan="2">This document describes the
		high-level requirements for the Graphical Modeling Framework (GMF)
		project and provides an indication of their relative priority and
		reference information. Additionally, this document contains a number
		of outstanding questions regarding the project which will require
		discussion on the mailing list and/or newsgroup.&nbsp; This is a
		living document maintained in the GMF CVS repository and will likely
		evolve into several documents or alternative format as the project
		progresses.</td>
	</tr>
</table>

<table>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Change History</b></font></p>

		<font color="#999999">0.1.0&nbsp;&nbsp;&nbsp;&nbsp;24 April
		2005&nbsp;&nbsp;&nbsp;&nbsp;<a
			href="mailto:richard.gronback@borland.com">Richard Gronback</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Document
		creation, including requirements from the newsgroup, <a
			href="mailto:dan.massey@borland.com">Dan Massey</a>, and <a
			href="mailto:artem.tikhomirov@borland.com">Artem Tikhomirov</a>.</font><br />

		<font color="#999999">0.2.0&nbsp;&nbsp;&nbsp;&nbsp;09 May
		2005&nbsp;&nbsp;&nbsp;&nbsp;<a
			href="mailto:richard.gronback@borland.com">Richard Gronback</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Added
		requirements posted to newsgroup by <a
			href="mailto:dleroux@ca.ibm.com">Daniel Leroux</a>.</font> <br />

		<font color="#999999">0.3.0&nbsp;&nbsp;&nbsp;&nbsp;09 May
		2005&nbsp;&nbsp;&nbsp;&nbsp;<a
			href="mailto:richard.gronback@borland.com">Richard Gronback</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Updated/Added
		requirements based on newsgroup post by <a
			href="mailto:voelter@acm.org">Markus Voelter</a>.</font> <br />

		<font color="#999999">0.3.1&nbsp;&nbsp;&nbsp;&nbsp;01 July
		2005&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
			href="mailto:richard.gronback@borland.com">Richard Gronback</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Refined
		image export requirement based on newsgroup post by <a
			href="mailto:constantine.plotnikov@gmail.com">Constantine Plotnikov</a>.</font>
		<br />

		<font color="#999999">0.8.0&nbsp;&nbsp;&nbsp;&nbsp;23 July
		2005&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
			href="mailto:richard.gronback@borland.com">Richard Gronback</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Incorporated
		changes discussed during GMF <a href="kickoff.php">Kickoff Meeting</a>.</font>

		</td>
	</tr>
	<tr></tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Contents</b></font></p>
		<div class="indent"><a href="#overview">Overview</a></div>
		<div class="indent"><a href="#hlreqs">High-Level Requirements</a></div>
		<div class="indent"><a href="#tools">Exemplary Tools</a></div>
		<div class="indent"><a href="#scenarios">Usage Scenarios</a></div>
		<div class="indent"><a href="#interop">Interoperability</a></div>
		<div class="indent"><a href="#outstanding">Outstanding Items</a></div>
		</td>
	</tr>
</table>


<div class="section"><a name="overview"></a>

<table border="0" cellspacing="5" cellpadding="2" width="100%">
	<tr>
		<td align="left" valign="top" colspan="2" bgcolor="#595791"><b><font
			color="#ffffff" face="Arial,Helvetica">Overview</font></b></td>
	</tr>
	<tr>
		<td>
		<p dir="ltr">Graphical Modeling Framework project will provide the
		fundamental infrastructure and components for developing visual design
		and modeling surfaces in Eclipse. In essence, GMF will form a
		generative bridge between EMF and GEF, whereby a diagram definition
		will be linked to a domain model as input to the generation of a
		visual editor. The project aims to provide this framework, in addition
		to exemplary tools for select domain models which illustrate its
		capabilities.</p>

		<p class="indent" dir="ltr" style="MARGIN-RIGHT: 0px">The original
		Project Proposal for GMF is maintained <a
			href="http://www.eclipse.org/proposals/eclipse-gmf/index.html"
			target="_blank">here</a> for reference.&nbsp; The Creation Review
		presentation is maintained <a
			href="http://www.eclipse.org/proposals/eclipse-gmf/GMF_Creation_Review.ppt">here</a>.&nbsp;
		Feedback has been incorporated into this document based on postings to
		the GMF <a href="news://news.eclipse.org/eclipse.modeling.gmf">newsgroup</a>.</p>
		<p>Each requirement below has two markers: the first indicates its
		relative priority [<font color="#0066ff">H</font> | <font
			color="#0066ff">M</font> | <font color="#0066ff">L</font>] in terms
		of importance to the community, while the second indicates the current
		milestone the feature is targeted for release. At this stage, they are
		only specified as either [<font color="green">M1</font>] or [<font
			color="red">M+</font>] to indicate they are targeted for the first
		major milestone, or afterwards. More refinement will be applied to
		these requirements in the form of a project plan during the M1
		implementation phase. The determination of M1 items and the expected
		delivery date (Q4 2005) was made during the <a href="kickoff.php">Kickoff
		Meeting</a>.</p>
		</td>
	</tr>
</table>
</div>

<div class="section"><a name="hlreqs"></a></div>
<table border="0" cellspacing="5" cellpadding="2" width="100%">
	<tr>
		<td align="left" valign="top" colspan="2" bgcolor="#595791"><b><font
			color="#ffffff" face="Arial,Helvetica">High-Level Requirements</font></b></td>
	</tr>
	<tr>
		<td>
		<p>The initial requirements for GMF are presented here.&nbsp; Each
		requirement has a priority indicator and may include references to
		indicate its source or other relevant information.&nbsp; These
		requirements are called out in the related Usage Scenarios below, and
		are to be used to create milestone target feature sets for the
		project.&nbsp; The requirements are broken down into categories which
		more or less correspond to the anticipated components of GMF, with the
		exception of the General Requirements.</p>
		</td>
	</tr>
</table>

<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>General
		Requirements</b></font></p>
		</td>
	</tr>
</table>
<ul>
	<li>Extensibility
	<ul>
		<li>GMF must adhere to the extensibility best practices of
		Eclipse.&nbsp; The generated plug-ins, the runtime framework, the
		genmodel, generator, wizards, etc. should all be designed/implemented
		with extensibility in mind.</li>
	</ul>
	</li>
	<li>Interoperability
	<ul>
		<li>GMF has the potential to interoperate with a number of other
		Eclipse projects and, potentially, support external standards and
		tooling frameworks. See the <a href="#interop">Interoperability</a>
		section below.</li>
	</ul>
	</li>
	<li>Compatibility
	<ul>
		<li>GMF should leverage the latest (pure) version of platform and
		dependent projects, Java edition, utilize MANIFEST.MF files, etc.</li>
	</ul>
	</li>
	<li>Testing
	<ul>
		<li>Unit tests will be written and maintained for appropriate code
		segments.</li>
		<li>GMF should support and be tested on all the platforms supported by
		Eclipse or, minimally, by the EMF and GEF projects.</li>
	</ul>
	</li>
	<li>Documentation
	<ul>
		<li>Standard help, exsd files, tutorials, and samples will be
		provided.</li>
	</ul>
	</li>
	<li>Internationalization/Localization
	<ul>
		<li>GMF should be localized to the main locales supported by the
		platform or, minimally, by EMF and GEF.</li>
	</ul>
	</li>
	<li>Performance
	<ul>
		<li>The GMF runtime, designer, and generated components should be
		tested for performance characteristics and follow <a
			href="http://www.eclipse.org/eclipse/development/performance/index.html">published</a>
		guidelines.</li>
	</ul>
	</li>
</ul>

<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Diagram Definition</b></font></p>
		</td>
	</tr>
</table>

<ul>
	<li>A diagram definition may be mapped to zero or more domain models.
	In other words, a digram may contain elements which represent
	information from multiple domain models. [<font color="#0066ff">H</font>][<font
		color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114175">114175</a>]</li>
	<li>A diagram may contain multiple references to a single domain model
	element, potentially with each having a different diagram
	representation. [<font color="#0066ff">M</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114179">114179</a>]</li>
	<li>A diagram may have elements added from other referenced diagram
	definitions. [<font color="#0066ff">M</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114178">114178</a>]</li>
	<li>Metamodels
	<ul>
		<li>A diagramming metamodel will be provided to allow for diagram
		definitions. [<font color="#0066ff">H</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114177">114177</a>]

		
		<li>A mapping metamodel will be provided to allow for diagram to
		domain model mapping definitions. [<font color="#0066ff">H</font>][<font
			color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114107">114107</a>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114174">114174</a>]</li>
	</ul>
	</li>
	<li>Diagram groups
	<ul>
		<li>Diagram definitions should support a logical grouping of diagrams,
		as required by the UML, for example. [<font color="#0066ff">M</font>][<font
			color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114180">114180</a>]</li>
	</ul>
	</li>
	<li>Wizards
	<ul>
		<li>GMF Project [<font color="#0066ff">H</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114107">114107</a>]
		<ul>
			<li>Creates a project containing one or more domain models and
			associated diagram definition(s). The domain models may already exist
			and be referenced from other projects in the workspace.</li>
			<li>The domain models may be created from scratch or imported
			*.ecore, *.emf, xsd, etc. files.</li>
			<li>The required mapping models will be created.</li>
		</ul>
		</li>
		<li>Diagram Definition [<font color="#0066ff">H</font>][<font
			color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114181">114181</a>]
		<ul>
			<li>Creates a new diagram definition model and mapping model(s) based
			on selected domain model(s).</li>
			<li>Provides an option to create a default set of diagram elements
			for selected domain elements in an "interview" format, where the
			toolsmith is walked through each and is allowed to select from common
			diagram definition options.[<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114182">114182</a>]</li>
			<li>It should be possible to create a diagram definition which is not
			yet tied to any particular domain model.[<font color="green">M1</font>]</li>
		</ul>
		</li>
		<li>Domain Model [<font color="#0066ff">H</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114183">114183</a>]
		<ul>
			<li>Allows for the creation of a new EMF model using a graphic
			editor, leveraging an ECore modeling surface provided by GMF.</li>
		</ul>
		</li>
		<li>Diagram Generation Model [<font color="#0066ff">H</font>][<font
			color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114184">114184</a>]
		<ul>
			<li>Creates a new generation model from existing Diagram Definition.[<font
				color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114184">114184</a>]</li>
		</ul>
		</li>
		<li>Diagram Mapping Model [<font color="#0066ff">H</font>][<font
			color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114186">114186</a>]
		<ul>
			<li>Allows an existing diagram definition to be mapped to another
			domain model.</li>
		</ul>
		</li>
	</ul>
	</li>
	<li>Notation Definition
	<ul>
		<li>An editing environment for diagram notation definition will be
		provided, to specify:
		<ul>
			<li>Nodes [<font color="#0066ff">H</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114188">114188</a>]
			<ul>
				<li>Shape definitions, including geometric, custom, and image file.</li>
			</ul>
			</li>
			<li>Links [<font color="#0066ff">H</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114188">114188</a>]
			<ul>
				<li>Connector elements to indicate relationship/flow/etc.</li>
			</ul>
			</li>
			<li>Decorators [<font color="#0066ff">M</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114188">114188</a>]
			<ul>
				<li>Text and icons for Node and Link elements.</li>
			</ul>
			</li>
			<li>Properties [<font color="#0066ff">H</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114188">114188</a>]
			<ul>
				<li>Attributes of an element to be displayed in a properties view.</li>
			</ul>
			</li>
		</ul>
		</li>
		<li>A graphical surface for diagram definitions will be provided
		(bootstrapped). [<font color="#0066ff">M</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114185">114185</a>]
		<ul>
			<li>Provide a WYSIWYG capability for diagram definition. [<font
				color="#0066ff">L</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114187">114187</a>]</li>
		</ul>
		</li>
		<li>A graphical surface for mapping definitions will be provided
		(bootstrapped). [<font color="#0066ff">L</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114199">114199</a>]</li>
	</ul>
	</li>
	<li>Tooling Definition
	<ul>
		<li>Along with diagram defintion and domain model mapping, the
		designer should allow for the definition of those runtime options
		supported (as listed below), such as palette configuration, overview
		support, etc. [<font color="#0066ff">H</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114197">114197</a>]</li>
	</ul>
	</li>
	<li>Semantic Definition
	<ul>
		<li>Constraints <b></b> <a href="#outstanding">[<b>?</b>]</a>
		<ul>
			<li>Diagram and/or domain models may have constraints added which
			need to be manifested as feedback in the graphical editor. For
			example, a constraint indicating that circular relationships are not
			allowed should be indicated in the UI while attempting to make such a
			connection. [<font color="#0066ff">M</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114192">114192</a>]</li>
			<li>Constraints may be defined in the diagram and/or domain models
			that are more appropriately checked in a batch mode, as is done with
			the EMF validation framework. GMF should allow for constraints to be
			enforced using this or similar framework. [<font color="#0066ff">M</font>][<font
				color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114189">114189</a>]</li>
			<li>Provide support for the Object Constraint Language (<a
				href="http://www.omg.org/cgi-bin/doc?ptc/2003-10-14">OCL</a>). [<font
				color="#0066ff">M</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114193">114193</a>]</li>
		</ul>
		</li>
		<li>Expressions
		<ul>
			<li>Diagram elements may not map directly to domain model elements,
			but rather be a derived value of some expression or query. For
			example, a hierarchical or flat view representation of a UML class as
			defined in "<a
				href="http://www.amazon.com/exec/obidos/tg/detail/-/0201675188/qid=1115154614/sr=8-1/ref=sr_8_xs_ap_i1_xgl14/002-5361459-4046423?v=glance&amp;s=books&amp;n=507846">The
			UML Profile for Framework Architectures</a>" requires information
			from an entire class hierarchy for representation on a diagram. [<font
				color="#0066ff">M</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114194">114194</a>]</li>
		</ul>
		</li>
		<li>Validation
		<ul>
			<li>Diagrams which may be well-formed may also need to be checked for
			certain best practices or <a
				href="http://www.amazon.com/exec/obidos/tg/detail/-/0521616786/qid=1115204692/sr=8-1/ref=sr_8_xs_ap_i1_xgl14/002-5361459-4046423?v=glance&s=books&n=507846">style</a>
			considerations. GMF will provide an extensible means by which to
			define audit and metric rules/constraints to be run on model
			instances. [<font color="#0066ff">M</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114196">114196</a>]</li>
		</ul>
		</li>
		<li>Multiple constraint/query/expression languages (e.g. XPath/XQuery,
		BSH, Groovy, Java, OCL, etc.) should supported through well-defined
		interfaces and/or extension points. <a href="#outstanding">[<b>?</b>]</a>
		[<font color="#0066ff">L</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114190">114190</a>]</li>
	</ul>
	</li>
	<li>Templates
	<ul>
		<li>A number of templates should be provided to jumpstart Graphical
		DSL development. [<font color="#0066ff">L</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114195">114195</a>]</li>
	</ul>
	</li>
	<li>Model synchronicity
	<ul>
		<li>In order to maintain synchronicity between linked models,
		refactoring-like support to span designer definition, mapping, and
		domain models should be provided. [<font color="#0066ff">H</font>][<font
			color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114198">114198</a>]</li>
		<li>Lightweight transaction support will allow for consistent changes
		to multiple models. [<font color="#0066ff">H</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114188">114188</a>]</li>
	</ul>
	</li>
</ul>

<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Generation
		Framework</b></font></p>
		</td>
	</tr>
</table>
<ul>
	<li>Generation Model
	<ul>
		<li>Runtime Definition
		<ul>
			<li>A generator model should allow for the definition of those code
			generation options supported, such as package namespace, RCP option,
			etc. [<font color="#0066ff">H</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114191">114191</a>]</li>
		</ul>
		</li>
	</ul>
	</li>
	<li>Generation
	<ul>
		<li>Generation of code from model definition(s) should maximize
		plug-in extensibility. [<font color="#0066ff">H</font>][<font
			color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114201">114201</a>]</li>
		<li>Generation option to target RCP application. [<font
			color="#0066ff">L</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114200">114200</a>]</li>
		<li>Generation option to target an Eclipse view, in addition to
		editor. [<font color="#0066ff">H</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114202">114202</a>]</li>
		<li>Utilize EMF.Edit commands (and others) to greatest extent
		possible. [<font color="#0066ff">H</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114204">114204</a>]</li>
		<li>Undo/Redo functionality should be respected. [<font
			color="#0066ff">H</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114205">114205</a>]</li>
		<li>Regeneration of code should not overwrite customizations. [<font
			color="#0066ff">H</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114203">114203</a>]</li>
		<li>Unit tests for the plug-in should be optionally generated. [<font
			color="#0066ff">L</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114206">114206</a>]</li>
		<li>Eclipse builders should be utilized as appropriate to generate
		incrementally. [<font color="#0066ff">L</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114209">114209</a>]</li>
		<li>When working with domain models, the generation of EMF model,
		edit, and editor plug-ins should optionally accompany diagram plug-in
		generation. [<font color="#0066ff">L</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114208">114208</a>]</li>
		<li>Method of generation should be flexible. <a href="#outstanding">[<b>?</b>]</a>
		<ul>
			<li>Default JET option. [<font color="#0066ff">H</font>][<font
				color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114207">114207</a>]</li>
			<li>Alternative template engine. [<font color="#0066ff">L</font>][<font
				color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114207">114207</a>]</li>
		</ul>
		</li>
	</ul>
	</li>
</ul>

<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Runtime Framework</b></font></p>
		</td>
	</tr>
</table>
<ul>
	<li>Editor
	<ul>
		<li>The runtime environment should support the following capabilities:
		<ul>
			<li>Palette
			<ul>
				<li>Palette customizer [<font color="#0066ff">L</font>][<font
					color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114217">114217</a>]</li>
				<li>Sticky tool [<font color="#0066ff">M</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114220">114220</a>]</li>
			</ul>
			</li>
			<li>Properties [<font color="#0066ff">H</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114246">114246</a>]</li>
			<li>Overview (bird's eye view) [<font color="#0066ff">H</font>][<font
				color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114213">114213</a>]</li>
			<li>Zoom +/- [<font color="#0066ff">M</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114215">114215</a>]</li>
			<li>Navigator [<font color="#0066ff">M</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114214">114214</a>]</li>
			<li>Outline [<font color="#0066ff">H</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114211">114211</a>]</li>
			<li>Decorators [<font color="#0066ff">M</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114212">114212</a>]</li>
			<li>Keyboard bindings [<font color="#0066ff">L</font>][<font
				color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114216">114216</a>]</li>
			<li>Direct editing [<font color="#0066ff">H</font>][<font
				color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114219">114219</a>]
			<ul>
				<li>Text validation/parser plug-in [<font color="#0066ff">H</font>][<font
					color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114219">114219</a>]</li>
				<li>Marker support [<font color="#0066ff">H</font>][<font
					color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114226">114226</a>]</li>
				<li>Content assist [<font color="#0066ff">L</font>][<font
					color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114235">114235</a>]</li>
			</ul>
			</li>
			<li>Drag and drop [<font color="#0066ff">H</font>][<font
				color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114224">114224</a>]</li>
			<li>Layout [<font color="#0066ff">L</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114238">114238</a>]
			<ul>
				<li>A number of layout strategies may be appropriate for a
				particular diagram and the runtime framework should provide for this
				and for the addition of layout plug-ins to be added via extension
				point.</li>
			</ul>
			</li>
			<li>Alignment [<font color="#0066ff">L</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114236">114236</a>]
			<ul>
				<li>Align selected nodes to top, bottom, right, left, center. [<font
					color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114236">114236</a>]</li>
				<li>Set width, height of elements. [<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114237">114237</a>]</li>
			</ul>
			</li>
			<li>Support standard graphical editor facilities (actions, rulers,
			guides) provided by GEF. [<font color="#0066ff">L</font>][<font
				color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114221">114221</a>]</li>
			<li>Provide support for compartments/subcompartments. [<font
				color="#0066ff">M</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114228">114228</a>]</li>
			<li>Feedback (in status line) for constraint violation, advice, etc.
			[<font color="#0066ff">M</font>][<font color="red">M+</font>]</li>
			<li>Filter views [<font color="#0066ff">L</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114225">114225</a>]
			<ul>
				<li>Filter by element type, property, or regular expression. [<font
					color="#0066ff">M</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114225">114225</a>]</li>
				<li>Hide/Show individual elements. [<font color="#0066ff">M</font>][<font
					color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114232">114232</a>]</li>
			</ul>
			</li>
		</ul>
		</li>
	</ul>
	</li>
	<li>Persistence
	<ul>
		<li>Diagrams are stored in files using XML/XMI capability of EMF. [<font
			color="#0066ff">H</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114230">114230</a>]
		<ul>
			<li>Alternative persistence mechanisms should be made available via
			extension points. [<font color="#0066ff">L</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114233">114233</a>]</li>
		</ul>
		</li>

	</ul>
	</li>
	<li>Delete behavior (diagram, domain, both?) [<font color="#0066ff">L</font>][<font
		color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114231">114231</a>]</li>
	<li>Export
	<ul>
		<li>Printing [<font color="#0066ff">M</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114222">114222</a>]</li>
		<li>Image [<font color="#0066ff">M</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114227">114227</a>]
		<ul>
			<li>Raster: jpeg, gif, bmp, etc.</li>
			<li>Vector: emf, wmf, svg, eps, etc.</li>
		</ul>
		</li>
	</ul>
	<ul>
		<li>General transformation
		<ul>
			<li>Interchange
			<ul>
				<li>UML via Diagram Interchange Specification [<font color="#0066ff">L</font>][<font
					color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114229">114229</a>]</li>
			</ul>
			</li>
		</ul>
		</li>
	</ul>
	</li>
	<li>Team integration [<font color="#0066ff">M</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114223">114223</a>]
	<ul>
		<li>Diagrams should provide team support extensions. [<font
			color="#0066ff">M</font>][<font color="red">M+</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114223">114223</a>]</li>
		<li>Diagram updates based on domain model changes should be minimized.
		[<font color="#0066ff">M</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114239">114239</a>]</li>
	</ul>
	</li>
	<li>The runtime should provide functionality for use with non-generated
	editors. [<font color="#0066ff">H</font>][<font color="green">M1</font>][<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=114241">114241</a>]</li>
</ul>

<div class="section"><a name="tools"></a>

<table border="0" cellspacing="5" cellpadding="2" width="100%">
	<tr>
		<td align="left" valign="top" colspan="2" bgcolor="#595791"><b><font
			color="#ffffff" face="Arial,Helvetica">Exemplary Tools</font></b></td>
	</tr>
	<tr>
		<td>
		<p>A number of potential GMF-based applications are appropriate to
		illustrate the framework and become exemplary tools in their own
		right.&nbsp; Below are a number of recommendations, with the first two
		as mentioned in the Project Proposal.&nbsp; Some of these are also
		used in the usage scenarios.</p>
		</td>
	</tr>
</table>
</div>
<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>UML2 Modeling</b></font></p>
		</td>
	</tr>
</table>

<ul>
	<li>This application of GMF&nbsp;will provide a visual diagramming
	capability for the <a href="http://www.eclipse.org/uml2">UML2</a>
	metamodel implementation in Eclipse.&nbsp;</li>
</ul>

<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>ECore Modeling</b></font></p>
		</td>
	</tr>
</table>

<ul>
	<li>To allow for visual domain model (DSL) creation using ECore as a
	metamodel, a GMF-generated diagram surface is planned.&nbsp; This
	capability will serve as&nbsp;a reasonable first implementation for GMF
	and ease the development of EMF models.</li>
</ul>

<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>BPEL4WS Modeling</b></font></p>
		</td>
	</tr>
</table>
<ul>
	<li>BPEL4WS has a defined <a
		href="http://schemas.xmlsoap.org/ws/2003/03/business-process/BPEL4WS.xsd"
		target="_blank">XSD</a> which can be imported to EMF.&nbsp;&nbsp;There
	is no associated notation provided, while mappings exist from <a
		href="http://www.bpmn.org/" target="_blank">BPMN</a> and <a
		href="http://www.omg.org/cgi-bin/doc?bei/03-01-06" target="_blank">BPDM</a>.&nbsp;
	One of these or a proprietary notation could be mapped to the XSD,
	possibly combining aspects of WSDL to provide a rich BPEL4WS modeling
	environment.</li>
</ul>
<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Business Rules
		Modeling</b></font></p>
		</td>
	</tr>
</table>
<ul>
	<li>Business rules have no standard notation, although many examples
	exist.&nbsp; Furthermore, many rule engine models are possible for
	implementation in EMF, as one is shown <a
		href="http://www.eclipse.org/articles/Article-Rule%20Modeling%20With%20EMF/article.html"
		target="_blank">here</a> .</li>
</ul>
<div class="section"><a name="scenarios"></a>
<table border="0" cellspacing="5" cellpadding="2" width="100%">
	<tr>
		<td align="left" valign="top" colspan="2" bgcolor="#595791"><b><font
			color="#ffffff" face="Arial,Helvetica">Usage Scenarios</font></b></td>
	</tr>
	<tr>
		<td>
		<p>The following scenarios illustrate the planned capabilities of GMF,
		as outlined above. In these scenarios, a 'toolsmith' is someone in an
		organization that uses GMF to develop tooling utilized by a 'user' (or
		'end user').</p>
		</td>
	</tr>
</table>
<table border="0" cellspacing="5" cellpadding="2" width="100%"
	summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>BPEL4WS</b></font></p>
		</td>
	</tr>
	<tr>
		<td />
		<td>
		<p>A toolsmith is interested in creating a visual modeling tool for <a
			href="ftp://www6.software.ibm.com/software/developer/library/ws-bpel.pdf">BPEL4WS</a>.
		The specification provides no visual notation, but does come with an <a
			href="http://schemas.xmlsoap.org/ws/2003/03/business-process/BPEL4WS.xsd">XSD</a>
		which will make short work of creating a domain model using EMF. The
		toolsmith is aware that BPMN provides a mapping to BPEL4WS and is
		itself a general notation for modeling business processes. However,
		the <a href="http://www.bpmi.org/BPMN.htm">specification</a> does not
		come with a formal definition.</p>
		</td>
	</tr>
	<tr>
		<td />
		<td>
		<ul>
			<li>The toolsmith launches Eclipse and creates an empty project.</li>
			<li>Using the Diagram Definition wizard, the toolsmith is presented
			with a blank modeling surface upon which to model BPMN. Note: this
			diagram definition surface is one page in a multi-page editor.
			<ul>
				<li>The toolsmith intends to fully model the BPMN and potentially
				reuse the definition later to map to another domain model.</li>
				<li>The toolsmith defines the diagram elements in terms of the
				provided diagram definition metamodel using the BPMN specification
				as a guide.</li>
				<li>Switching to the tooling definition page, the toolsmith
				configures the palette, selects options for overview, outline,
				layout, alignment, etc.</li>
			</ul>
			</li>
			<li>With a notation model available, the toolsmith moves to specify
			the domain model of BPEL4WS. Using the Domain Model wizard, the
			toolsmith creates an EMF model from the supplied XSD, which opens in
			the graphical editor. Note: BPEL4WS is dependent upon WSDL, which is
			also present in the model.</li>
			<li>After reviewing the model of BPEL4WS and reviewing the mapping to
			BPMN provided in the specification, the toolsmith creates a new
			Diagram Mapping Model using the wizard.
			<ul>
				<li>The toolsmith defines the mappings from the previously defined
				diagram elements and properties to the new domain model elements. As
				expected, the mapping provided has some gaps, which allows the
				toolsmith to get creative ;-)</li>
			</ul>
			</li>
			<li>Using the Diagram Generation Model wizard, the toolsmith creates
			a generation model to select options for the code generator.
			<ul>
				<li>The toolsmith selects "Generate All" to produce a full set of
				domain and diagram plug-ins.</li>
			</ul>
			</li>
			<li>The toolsmith runs the new plug-ins in a runtime instance to test
			their capabilities.</li>
			<li>Not satisfied with the provided layout algorithms, the toolsmith
			decides to write a custom layout algorithm and adds it as a new
			plug-in via the provided extension point. This layout now appears in
			the tooling definition page.</li>
		</ul>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Business Rules
		Modeling</b></font></p>
		</td>
	</tr>
	<tr>
		<td />
		<td>
		<p>To complement the new BPEL4WS modeling environment, the toolsmith
		is now interested in creating a visual modeling tool for business
		rules.</p>
		</td>
	</tr>
	<tr>
		<td />
		<td>
		<ul>
			<li>TODO: finish this scenario.</li>
		</ul>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Mind Map</b></font></p>
		</td>
	</tr>
	<tr>
		<td />
		<td>
		<p>A toolsmith is interested in adding a <a target="_blank"
			href="http://www.google.com/search?hl=en&amp;q=mind+map"> Mind Map</a>
		capability to Eclipse, but with the added ability to switch the
		representation to either a <a target="_blank"
			href="http://www.google.com/search?hl=en&amp;lr=&amp;q=gantt+chart">Gantt
		chart</a> view, or a dependency view. In this scenario, the toolsmith
		is starting from a blank slate, with no existing domain model or
		notation definition.</p>
		</td>
	</tr>
	<tr>
		<td />
		<td>
		<ul>
			<li>The toolsmith launches Eclipse and the 'GMF Project' wizard.
			<ul>
				<li>The wizard steps the toolsmith through the creation of a new EMF
				model for the domain, and three diagram definitions for the Mind
				Map, Gantt Chart, and Dependency diagrams.</li>
				<li>Upon completion, the graphical domain modeling surface is
				presented for development of the mind map domain model.</li>
				<li>In the project, the toolsmith sees an *.ecore file, an ecore
				*.dgEcore diagram file, three *.gmfd diagram definition files with
				associated *.gmft tool definition files, and three *.gmfm mapping
				files.</li>
			</ul>
			</li>
			<li>The toolsmith models the elements, attributes, and relationships
			for the mind map domain model using the modeling surface, which
			resembles an enhanced UML Class diagram. It is a fairly simple model,
			with Topics, CallOuts, Relationships, etc. Task elements are also
			associated with Topics, which was the motivation for including an
			optional Gantt chart view.
			<ul>
				<li>The toolsmith then selects OCL as the constraint language for
				the model and proceeds to refine the model by adding constraints.
				<ul>
					<li>A constraint is added which specifies that the target of a
					Relationship may not be the same element as the source.</li>
					<li>Another constraint is added to disallow cyclic dependencies
					(where 'dependency' is one type of Relationship).</li>
				</ul>
				</li>
			</ul>
			</li>
			<li>Satisified with the domain model, the toolsmith opens the diagram
			definition for the mind map.
			<ul>
				<li>The toolsmith fills in general properties for the diagram and
				opens the palette.</li>
				<li>A new Node element is added to the definition.
				<ul>
					<li>A rounded rectangle shape is specified for the node. (lots of
					options here: SVG, WYSIWYG primitive shape editor, etc.)</li>
					<li>Using the mapping interface, a connection is made between the
					new shape and the Topic element from the domain model.</li>
					<li>A text label is added to the node using a tool from the
					palette, with the option to center at the bottom of the node. A
					mapping is made to the 'name' attribute of the Topic element.</li>
					<li>The toolsmith then adds a new Connector element to the diagram
					definition, mapping it to the 'dependency' enumerated type of
					Relationship element in the domain model.
					<ul>
						<li>The new Connector element 'source' and 'target' are
						correspondingly mapped to the Relationship 'source' and 'target'
						attributes.</li>
						<li>Graphic display properties of the Connector are specified and
						similar actions are taken to define the other types of
						Relationships.</li>
					</ul>
					</li>
				</ul>
				</li>
				<li>In the tooling definition page, the toolsmith defines the
				runtime options for the mind map diagram.
				<ul>
					<li>The toolsmith decides to put Relationship links in their own
					drawer on the toolbar.</li>
					<li>Options for the overview, flyover, and properties views are
					selected.</li>
				</ul>
				</li>
				<li>Note: an option here would have been to run the Diagram
				Definition wizard, which would walk the toolsmith through a selected
				domain model to create a quick set of default diagram elements.</li>
			</ul>
			</li>
			<li>Anxious to see the capabilities of GMF, the toolsmith decides to
			produce a Diagram Generator model of the mind map diagram definition
			at this time using the toolbar action.
			<ul>
				<li>The toolsmith selects "Generate All" and lauches a runtime
				workspace to test the new mind map.
				<ul>
					<li>In a new project, the toolsmith creates a Mind Map using the
					provided wizard.</li>
					<li>The toolsmith is able to create a new Topic and Subtopics.</li>
					<li>The toolsmith attempts to create a Relationship of type
					'dependency' between a Topic and itself, which is disallowed.</li>
					<li>The toolsmith tests the undo and redo features successfully.</li>
				</ul>
				</li>
			</ul>
			</li>

		</ul>
		</td>
	</tr>
</table>
</div>

<div class="section"><a name="interop"></a>
<table border="0" cellspacing="5" cellpadding="2" width="100%">
	<tr>
		<td align="left" valign="top" colspan="2" bgcolor="#595791"><b><font
			color="#ffffff" face="Arial,Helvetica">Interoperability</font></b></td>
	</tr>
	<tr>
		<td>
		<p>The GMF project has the potential to interoperate with or leverage
		capabilities from several Eclipse projects, most notably the Graphical
		Editing Framework (GEF) and Eclipse Modeling Framework (EMF)
		projects.&nbsp; It is anticipated that the GMF team will work closely
		with these other teams and potentially contribute to them in order to
		meet the goals of the project.&nbsp; GMF should not duplicate
		functionality, nor add functionality which is more appropriately
		housed in another Eclipse project.</p>

		<p>Each of those anticipated to be complementary or a dependency of
		GMF is listed below:</p>
		</td>
	</tr>
</table>
</div>
<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b><a
			href="http://www.eclipse.org/emf/" target="_top">EMF</a> (Eclipse
		Modeling Framework)</b></font></p>
		</td>
	</tr>
</table>

<ul>
	<li>EMF models are planned to be the primary source of mapped domain
	models for use in defining diagrams in GMF.&nbsp; Furthermore, diagram
	definitions and mapping models are themselves to be based on EMF.</li>
	<li>Diagram persistence is to leverage EMF's XML/XMI mechanism, while
	alternative persistence may be desireable.&nbsp; Persistence to a
	relational database is likely to be required, as found in <a
		href="http://mdr.netbeans.org/" target="_blank">MDR</a>, and as
	possible using <a href="http://www.sympedia.org/cdo/" target="_blank">CDO</a>.&nbsp;
	<a href="http://www-106.ibm.com/developerworks/java/library/j-sdo/"
		target="_blank">SDO</a> capabilities are already available in EMF.</li>
	<li>EMF currently has no facility for model constraint definition,
	using OCL for example.&nbsp; This is a known limitation and a
	discussion item on the EMF newsgroup.&nbsp; On this topic, the
	University of Kent has an EMF facility for their <a
		href="http://www.cs.kent.ac.uk/projects/ocl/index.html"
		target="_blank">OCL</a> library.</li>
	<li>EMF currently employs just the JET (Java Emitter Template) engine
	for code generation.&nbsp; A goal of GMF is to provide a flexible means
	by which alternative template engines may be used.</li>
</ul>

<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b><a
			href="http://www.eclipse.org/gef/" target="_top">GEF</a> (Graphical
		Editing Framework)</b></font></p>
		</td>
	</tr>
</table>

<ul>
	<li>The GEF project will serve as the base of GMF's Runtime Framework
	and be the target for the generator.&nbsp; It is likely that work done
	in GMF will be donated to the GEF project.</li>
</ul>

<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b><a
			href="http://www.eclipse.org/uml2/" target="_top">UML2</a> (Unified
		Modeling Language)</b></font></p>
		</td>
	</tr>
</table>

<ul>
	<li>The UML2 project represents one popular domain model requested for
	use in GMF.&nbsp; This project will require the use of the <a
		href="http://www.omg.org/cgi-bin/doc?ptc/2003-09-01" target="_blank">Diagram
	Interchange Specification</a> for diagram persistence, which is also
	under consideration as the general diagram definition model for GMF.</li>
</ul>

<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b><a
			href="http://www.eclipse.org/gmt/" target="_top">GMT</a> (Generative
		Model Transformer)</b></font></p>
		</td>
	</tr>
</table>

<ul>
	<li>The GMT project may provide the necessary means by which to
	transform models, should it be determined such capabilities are
	required for GMF.</li>
</ul>

<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b><a
			href="http://www.eclipse.org/ve/" target="_top">VE</a> (Visual
		Editor)</b></font></p>
		</td>
	</tr>
</table>

<ul>
	<li>There has been interest expressed in the newsgroup in providing
	WYSIWYG capabilities in GMF using the VE project.</li>
	<li>The VE project team has expressed interest in working with GMF, as
	they have developed capabilities that are similar in function to what
	GMF requires, including a common diagram model.&nbsp; This will require
	further investigation, and is planned.</li>
</ul>

<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b><a
			href="http://www.eclipse.org/ecf/" target="_top">ECF</a> (Eclipse
		Communication Framework)</b></font></p>
		</td>
	</tr>
</table>

<ul>
	<li>The ECF project already supports the shared editing of <a
		href="http://www.eclipse.org/ecf/plan.html#prss" target="_top">EMF/SDO</a>
	models, which should potentially be leveraged as an option in GMF.</li>
</ul>

<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b><a
			href="http://www.eclipse.org/proposals/eclipse-mddi/index.html"
			target="_top">MDDi</a> (Model Driven Development Integration) <em><font
			color="#0066ff">Proposed</font></em></b></font></p>
		</td>
	</tr>
</table>

<ul>
	<li>The MDDi project aims to introduce dynamic aspects to EMF models,
	it can potentially be leveraged by GMF for required semantic
	descriptions.</li>
	<li>GMF is already referenced by the MDDi project as complementing its
	"methodological integration view" where generation of MDDi-specific
	elements could be provided by GMF.</li>
</ul>

<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b><a
			href="http://www.eclipse.org/mylar" target="_top">Mylar</a> </b></font></p>
		</td>
	</tr>
</table>

<ul>
	<li>It is conceivable that the Mylar degree-of-interest (DOI) model can
	extend beyond the navigation views of a model and to the graphical
	(GEF-based) models as well. This will require
	further&nbsp;investigation.</li>
</ul>

<p>In addition to interoperability with other Eclipse projects, a number
of other interchange/integration possibilities exist for GMF, such as:</p>


<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b><a
			href="http://www.omg.org/" target="_blank">OMG</a></b></font> (Object
		Management Group)</p>
		</td>
	</tr>
</table>
<ul>
	<li>A number of specifications are likely to be adhered with in GMF and
	its associated projects. The UML, OCL, DIS, etc. all provide an
	opportunity for GMF to promote OMG specifications.</li>
</ul>

<table border="0" cellspacing="5" cellpadding="2" width="90%" summary="">
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>
		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b><a
			href="http://lab.msdn.microsoft.com/teamsystem/Workshop/DSLTools/"
			target="_blank">Microsoft DSL Tools</a></b></font></p>
		</td>
	</tr>
</table>
<ul>
	<li>A potential to transform and leverage diagram and domain model
	definitions in both GMF and Microsoft's DSL Tools exist.</li>
</ul>

<div class="section"><a name="outstanding"></a>

<table border="0" cellspacing="5" cellpadding="2" width="100%">
	<tr>
		<td align="left" valign="top" colspan="2" bgcolor="#595791"><b><font
			color="#ffffff" face="Arial,Helvetica">Outstanding Items</font></b></td>
	</tr>
	<tr>
		<td>
		<p>The following items are in need of discussion and resolution:</p>
		<ul>
			<li>
			<div>Constraints</div>
			<ul>
				<li>If OCL is used, what about providing an alternative syntax, such
				as the Business Modeling (BM) syntax mentioned in Appendix C of "<a
					href="http://www.amazon.com/exec/obidos/tg/detail/-/0321179366/qid=1115036607/sr=8-1/ref=sr_8_xs_ap_i1_xgl14/002-5361459-4046423?v=glance&amp;s=books&amp;n=507846">The
				Object Constraint Language, Second Edition</a>"?</li>
			</ul>
			</li>
			<li>
			<div>Large Diagram Performance</div>
			<ul>
				<li>
				<div>Investigate the performance characteristics of large diagrams
				in single file versus multiple.</div>
				</li>
			</ul>
			</li>
		</ul>
		</td>
	</tr>
</table>		
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
