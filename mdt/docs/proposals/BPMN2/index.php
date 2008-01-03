<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

$pageTitle 		= "BPMN2 Component Proposal";
$pageKeywords	= "BPMN2";
$pageAuthor		= "Kenn Hussey";

ob_start();
?>
    <div id="maincontent">
	<div id="midcolumn">

<h1>MDT BPMN2</h1>
</p>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/projects/fragments/proposal-page-header.php");
generate_header("BPMN2");
?>

<h2>Introduction</h2>

<p>BPMN2 is a proposed open source component of the <a href="http://www.eclipse.org/modeling/mdt/">Model Development Tools (MDT)</a> subproject to provide a metamodel implementation based on the forthcoming <a href="http://www.omg.org/cgi-bin/doc?bmi/2007-6-5">Business Process Model and Notation (BPMN) 2.0</a> OMG specification.</p>

<p>This component is in the Pre-Proposal Phase (as defined in the <a href="http://www.eclipse.org/projects/dev_process/development_process.php">Eclipse Development Process</a>) and this document is written to declare its intent and scope. This proposal is written to solicit additional participation and input from the Eclipse community. You are invited to comment on and/or join in the development of the component. Please send all feedback to the <a href="news://news.eclipse.org/eclipse.modeling.mdt">eclipse.modeling.mdt</a> newsgroup.</p>

<h2>Background</h2>

<p>The importance of supporting industry standards is critical to the success of the <a href="http://www.eclipse.org/modeling/">Modeling</a> project, and to Eclipse in general. The role of the Modeling project in the support of industry standards is to enable their creation and maintenance within the Eclipse community. Furthermore, as standards bodies such as the OMG have a strong modeling focus, the Modeling project needs to facilitate communication and outreach through its PMC and project contributors to foster a good working relationship with external organizations.</p>

<p>The primary goal of the <a href="http://www.omg.org/cgi-bin/doc?dtc/2007-06-03">Business Process Modeling Notation (BPMN)</a> specification is to provide a notation that is readily understandable by all business users, from the business analysts that create the initial drafts of the processes, to the technical developers responsible for implementing the technology that will perform those processes, and finally, to the business people who will manage and monitor those processes. BPMN created a standardized bridge for the gap between the business process design and process implementation. The <a href="http://www.omg.org/cgi-bin/doc?dtc/2007-07-01">Business Process Definition Metamodel (BPDM)</a> specification, on the other hand, provides an explicit metamodel and serialization mechanism for BPMN concepts.</p>

<p>The <a href="http://www.omg.org/cgi-bin/doc?bmi/2007-6-5">Business Process Model and Notation (BPMN) 2.0</a> specification is still at the <a href="http://www.omg.org/gettingstarted/process2-RFP.htm">Request For Proposal (RFP)</a> process stage. The BPMN 2.0 specification will reconcile the BPMN and BPDM standards into a single language that defines the notation, metamodel, and interchange format for Business Process Diagrams (BPD) and represent the amalgamation of best practices within the business modeling community. The intent of BPMN 2.0 is to standardize a business process modeling notation, metamodel, and interchange format in the face of many different modeling notations and viewpoints. In doing so, BPMN 2.0 will provide a simple means of communicating process information to other business users, process implementers, customers, and suppliers.</p>

<h2>Scope</h2>

The objectives of the proposed BPMN2 component are to provide

<ul>

<li>an open source "reference" implementation of the BPMN 2.0 specification</li>

<li>an EMF-based foundation on which business process modeling tools can be built</li>

<li>a basis for integrating and interchanging artifacts between business process modeling tools</li>

<li>a forum for engaging the community in validation of the BPMN 2.0 specification</li>

<li>an opportunity for increased collaboration between <a href="http://www.eclipse.org">Eclipse</a> and the <a href="http://www.omg.org">OMG</a></li>

</ul>

<h2>Relationship with Other Eclipse Projects/Components</h2>

<p>The <a href="http://www.eclipse.org/stp/bpmn/index.php">BPMN</a> subproject of the <a href="http://www.eclipse.org/stp/">SOA Tools Platform (STP)</a> project provides an editor and set of tools to model business process diagrams using the BPMN notation. The metamodel used by this subproject, however, is not compliant with the BPMN specification. It is our intent to work closely with the STP project team to reconcile these differences.</p>

<p>Obvious integrations between this and other Modeling subprojects/components will be explored as the component evolves.</p>

<h2>Organization</h2>

<h3>Initial Committers</h3>

The initial committers for this component would be:

<ul>

<li>Kenn Hussey (<a href="http://www.embarcadero.com/">Embarcadero Technologies</a>), proposed component lead</li>

<li>Yves Yang (<a href="http://www.soyatec.com/">Soyatec</a>)</li>

</ul>

<h3>Code Contributions</h3>

This component will not include an initial code contribution. An implementation of the BPMN 2.0 metamodel consisting of Java packages within the org.eclipse.bpmn2.* namespace will be generated and customized using <a href="http://www.eclipse.org/modeling/emf/">EMF</a> as the standard emerges in response to the <a href="http://www.omg.org/cgi-bin/doc?bmi/2007-6-5">OMG RFP</a>.

<h3>Interested Parties</h3>

Thus far, interest in this component has been expressed by <a href="http://www.embarcadero.com/">Embarcadero Technologies</a>, <a href="http://www.soyatec.com/">Soyatec</a>, <a href="http://www.w4global.com/">W4</a>, and <a href="http://www.adaptive.com/">Adaptive</a>.

<h3>Developer Community</h3>

The team of initial committers will explore statements of interest from additional developers experienced with BPMN 2.0 or willing to gain such experience.

<h3>User Community</h3>

It is expected that the user community for this component will consist primarily of developers, given that it is essentially a foundation for building business process modeling tools.

<h2>Tentative Plan</h2>

The first major release of this component would be tentatively scheduled for June 2009, as part of the annual simultaneous release.

      </div>
  </div>
<?php
	$html = ob_get_contents();
	ob_end_clean();

	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
