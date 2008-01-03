<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

$pageTitle 		= "IMM Component Proposal";
$pageKeywords	= "IMM";
$pageAuthor		= "Kenn Hussey";

ob_start();
?>
    <div id="maincontent">
	<div id="midcolumn">

<h1>MDT IMM</h1>
</p>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/projects/fragments/proposal-page-header.php");
generate_header("IMM");
?>

<h2>Introduction</h2>

<p>IMM is a proposed open source component of the <a href="http://www.eclipse.org/modeling/mdt/">Model Development Tools (MDT)</a> subproject to provide metamodel/profile implementations based on the forthcoming <a href="http://www.omg.org/cgi-bin/doc?ab/2005-12-2">Information Management Metamodel (IMM)</a> OMG specification.</p>

<p>This component is in the Pre-Proposal Phase (as defined in the <a href="http://www.eclipse.org/projects/dev_process/development_process.php">Eclipse Development Process</a>) and this document is written to declare its intent and scope. This proposal is written to solicit additional participation and input from the Eclipse community. You are invited to comment on and/or join in the development of the component. Please send all feedback to the <a href="news://news.eclipse.org/eclipse.modeling.mdt">eclipse.modeling.mdt</a> newsgroup.</p>

<h2>Background</h2>

<p>The importance of supporting industry standards is critical to the success of the <a href="http://www.eclipse.org/modeling/">Modeling</a> project, and to Eclipse in general. The role of the Modeling project in the support of industry standards is to enable their creation and maintenance within the Eclipse community. Furthermore, as standards bodies such as the OMG have a strong modeling focus, the Modeling project needs to facilitate communication and outreach through its PMC and project contributors to foster a good working relationship with external organizations.</p>

<p>The OMG’s <a href="http://www.omg.org/technology/documents/formal/cwm.htm">Common Warehouse Metamodel (CWM)</a> has been successful and is mature and stable, with widespread and increasing adoption by vendors and customers for metadata interchange: most widely in the area of relational database information. Unfortunately, the uptake has been somewhat hampered by CWM’s name - many of the potential uses of CWM have no connection with building or managing data warehouses. It is in effect a core standard for representing the management of any form of information resource: it has been recognized as such by being made one of MDA’s ‘cornerstone’ standards (the others being MOF and UML).</p>

<p>The <a href="http://www.omg.org/cgi-bin/doc?ab/2005-12-2">Information Management Metamodel (IMM)</a> specification is still at the <a href="http://www.omg.org/gettingstarted/process2-RFP.htm">Request For Proposal (RFP)</a> process stage. The RFP proposes the name Information Management Metamodel (IMM) instead of CWM in light of the fact that, with the advent of MDA, there is now far more emphasis on modeling compared to when CWM was originated - as primarily a means of interchange only.</p>

<p>IMM is a "standard" metamodel to address the needs of Information Management. This includes the scope of the existing Common Warehouse Metamodel (CWM) standard but is extended to cover the following areas:

<ul>

<li>Metamodel for Information Management (IMM)</li>

<li>UML2 Profile for Relational Data Modeling, with a mapping to the IMM metamodel and SQL DDL</li>

<li>UML2 Profile for Logical (Entity Relationship) Data Modeling, with a mapping to the IMM metamodel</li>

<li>UML2 Profile for XML Data Modeling, with a mapping to the IMM metamodel and XML Schema</li>

<li>UML2 Profile for Record Modeling, with a mapping to the IMM metamodel and COBOL Copybooks</li>

<li>A standardized ‘Information Engineering’ data modeling notation with a mapping to the IMM metamodel</li>

</ul>

<p>Using tools that support IMM, end-users will be able to not only model the business information in a consistent manner but also enable traceability among OO, Data, and XML models. This traceability is critical to improve semantic accuracy of information and promote reuse without locking developers into a particular tool but enabling use of tools of their choice while retaining interoperability. As the existing CWM standard will morph into IMM, the capability to provide data lineages (source to target maps) will continue to be available and enhanced. In a nutshell, IMM will enable modeling and interchange of the complete information lifecycle.</p>

<h2>Scope</h2>

The objectives of the proposed IMM component are to provide

<ul>

<li>an open source "reference" implementation of the IMM specification</li>

<li>an EMF-based foundation on which information management modeling tools can be built</li>

<li>a basis for integrating and interchanging artifacts between information management modeling tools</li>

<li>a forum for engaging the community in validation of the IMM specification</li>

<li>an opportunity for increased collaboration between <a href="http://www.eclipse.org">Eclipse</a> and the <a href="http://www.omg.org">OMG</a></li>

</ul>

<h2>Relationship with Other Eclipse Projects/Components</h2>

<p>The Model Base subproject of the <a href="http://www.eclipse.org/dtp/">Data Tools Platform (DTP)</a> project provides an <a href="http://www.eclipse.org/datatools/project_modelbase/modelbase_doc/uml/SQLModel/root.html">SQL model</a> that is in fact being used as the basis for the relational modeling subset of the IMM standard. An <a href="http://wiki.eclipse.org/index.php/Talk:Model_Base">effort</a> was made to enhance this model to accommodate comments/requests made by the OMG, but it is unclear whether the results were complete or satisfactory. It is our intent to work closely with the DTP project team to reconcile these differences.</p>

<p>The XSD component of the <a href="http://www.eclipse.org/mdt/">Model Developement Tools (MDT)</a> subproject provides an <a href="http://www.eclipse.org/modeling/mdt/?project=xsd">XSD metamodel</a> that is in fact being used as the basis for the XML schema modeling subset of the IMM standard. It is our intent to work closely with the XSD component team to ensure that the profile developed as part of this new component will be alligned with the existing metamodel.</p>

<p>Obvious integrations between this and other Modeling subprojects/components will be explored as the component evolves.</p>

<h2>Organization</h2>

<h3>Initial Committers</h3>

The initial committers for this component would be:

<ul>

<li>Kenn Hussey (<a href="http://www.embarcadero.com/">Embarcadero Technologies</a>), proposed component lead</li>

<li>Dave Carlson (<a href="http://www.xmlmodeling.com/">XML Modeling</a>)</li>

<li>Nick Dowler (<a href="http://www.adaptive.com/">Adaptive</a>)</li>

</ul>

<h3>Code Contributions</h3>

This component will not include an initial code contribution. An implementation of the IMM metamodels/profiles consisting of Java packages within the org.eclipse.imm.* namespace will be developed using <a href="http://www.eclipse.org/modeling/emf/">EMF</a> and <a href="http://www.eclipse.org/modeling/mdt/?project=uml2">UML2</a> as the standard emerges in response to the <a href="http://www.omg.org/cgi-bin/doc?ab/2005-12-2">OMG RFP</a>.

<h3>Interested Parties</h3>

Thus far, interest in this component has been expressed by <a href="http://www.embarcadero.com/">Embarcadero Technologies</a>, <a href="http://www.xmlmodeling.com/">XML Modeling</a>, and <a href="http://www.adaptive.com/">Adaptive</a>.

<h3>Developer Community</h3>

The team of initial committers will explore statements of interest from additional developers experienced with IMM or willing to gain such experience.

<h3>User Community</h3>

It is expected that the user community for this component will consist primarily of developers, given that it is essentially a foundation for building information management modeling tools.

<h2>Tentative Plan</h2>

The first release of this component, focused on the data (conceptual, logical, and relational) and XML schema (XSD) modeling subsets of the IMM specification, would be tentatively scheduled for June 2009, as part of the annual simultaneous release.

      </div>
  </div>
<?php
	$html = ob_get_contents();
	ob_end_clean();

	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
