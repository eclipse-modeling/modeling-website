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
	$pageTitle 		= "GMF Gallery";
	$pageKeywords	= "graphical,modeling,gallery";
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
				<td align="left"><h1>$pageTitle</h1>
				<h2>More coming soon...</h2><br></td>
				<td align="right"><img align="right" src="http://www.eclipse.org/gmf/images/logo_banner.png" /></td>
			</tr>
		</tbody>
	</table>
	<p>Below are some examples of what can be done using GMF to produce full-feature graphical editors 
	for your <a href="http://www.eclipse.org/emf">EMF</a> model using <a href="http://www.eclipse.org/gef">GEF</a>. Click 
	on each image below for a full size screenshot.</p>
	<hr/>
	<h4>BPMN Diagram Example</h4>
		<p>Using an EMF model derived from the <a href="http://www.bpmn.org/Documents/OMG%20Final%20Adopted%20BPMN%201-0%20Spec%2006-02-01.pdf">BPMN Specification</a>, this basic BPMN diagram was generated.  Below, the same graphical definition is reused with another mapping and tool definition to use BPMN notation for editing a BPEL4WS domain model.</p>
		<a href="bpmn.png" target="_blank"><img height="384" width="512" src="bpmn.png"/></a>
		<br/>
		<hr/>
	<h4>BPMN Notation with BPEL4WS Domain Example</h4>
		<p>Using EMF to create a domain model from the <a href="http://xml.coverpages.org/BPEL4WSv11-Schema-xsd.html">BPEL4WS XSD</a> and using the BPMN-to-BPEL4WS mapping from the BPMN spec, this basic diagram was generated from the same graphical definition used above.  The alternative to this approach would be to transform a BPMN domain model into a BPEL4WS document.</p>
		<a href="bpmn2bpel.png" target="_blank"><img height="384" width="512" src="bpmn2bpel.png"/></a>
		<br/>
		<hr/>
	<h4>ECore Diagram Example</h4>
		<p>Using the GMF ECore editor example, you can visually model and edit any EMF *.ecore model. You can render your 
		 existing models via a simple right-click. Until a separate 
		download for this example is available, you can get it with the rest of GMF's examples <a href="http://download.eclipse.org/modeling/gmf/downloads/index.php">here</a>.</p>
		<a href="cbe_ecore.png" target="_blank"><img height="384" width="512" src="cbe_ecore.png"/></a>
		<br/>
		<hr/>
	<h4>Mindmap Diagram Example</h4>
		<p>From the <a href="http://wiki.eclipse.org/index.php/GMF_Tutorial">GMF Tutorial</a>, a simple mindmap application for Eclipse can be developed using GMF.</p>
		<a href="mindmap.png" target="_blank"><img height="384" width="512" src="mindmap.png"/></a>
		<br/>
		<hr/>
	<h4>UML2 Class Diagram</h4>
		<p>Using the <a href="http://www.eclipse.org/uml2">UML2</a> project as a domain model, by adding a GMF graphical 
		definition for a class diagram, you can generate a visual editor like this one.</p>
		<a href="uml2.png" target="_blank"><img height="384" width="512" src="uml2.png"/></a>
		<br/>
		<hr/>
	<h4>Eclipse Feature/Plugin Diagram</h4>
		<p>Ever want to visualize your features and plug-ins? A quick domain model and reuse of the feature import wizard can allow you to generate diagrams like this.</p>
		<a href="pde.png" target="_blank"><img height="384" width="512" src="pde.png"/></a>
		<br/>
	</div>

</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
