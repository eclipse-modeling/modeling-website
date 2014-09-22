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
	$pageTitle 		= "Modeling Tools";
	$pageKeywords	= "modeling, UML, UML2, MDD, MDA, model-driven";
	$pageAuthor		= "Richard Gronback";
	
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML


<div id="maincontent">
	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<table>
		<tr>
		<td><p><a href="/emf/">EMF (Core)</a> and many related frameworks are designed to support the creation of applications and tools based on a given data model. However, there are also ready-to-use tools based on those technologies targeted to end-users rather than to framework users. The following tools cover a variety of use cases, including UML Modeling and languages for embedded development, and support the creation and editing of  EMF models.</p>
		</td>
		<td align="right"><img src="http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg">
		</td>
		</table>
		<div class="container-fluid">
		<div id="content"></div>
  </div>
<script type="text/javascript" src="ejs_production.js"></script>
	<script>
(function () {
	// Render the template using the specified data.
    var html = new EJS({url: "projects.ejs"}).render({projects: [
	{Title:'Business Process Metamodel and Notation', 
		Description:'BPMN2 is an EMF-based implementation of the BPMN 2.x metamodel for the Eclipse platform.',
		URL:'http://wiki.eclipse.org/MDT-BPMN2',
		Logo:'http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg'
	},
	{Title:'EcoreTools', 
        Description:'A flexible graphical modeler to design .ecore models.',
        URL:'https://www.eclipse.org/ecoretools/',                 
		Logo:'https://www.eclipse.org/ecoretools/images/logos/logo.png'
    },
	{Title:'eTrice', 
		Description:'eTrice provides an implementation of the ROOM modeling language together with editors, code generator for Java, C++ and C code and exemplary target middleware.',
		URL:'http://www.eclipse.org/etrice/',
		Logo:'http://projects.eclipse.org/sites/default/files/eTRICE-logo_200x200.jpg'
	},
	{Title:'MoDisco', 
		Description:'provides an extensible framework to develop model-driven tools to support use-cases of existing software modernization.',
		URL:'http://www.eclipse.org/MoDisco/',
		Logo:'http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg'
	},
	{Title:'Object Constraint Language (OCL)', 
		Description:'OCL defines APIs for OCL expression syntax for implementing queries and constraints.',
		URL:'http://www.eclipse.org/modeling/mdt/?project=ocl',
		Logo:'http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg'
	},
	{Title:'Papyrus', 
		Description:'Papyrus provides an integrated and user-consumable environment for editing any kind of EMF model and particularly supporting UML and related modeling languages such as SysML and MARTE.',
		URL:'http://www.eclipse.org/etrice/',
		Logo:'http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg'
	},
	{Title:'Sphinx', 
		Description:'provides an extensible platform that eases the creation of integrated modeling tool environments supporting individual or multiple modeling languages (which can be UML-based or native DSLs) and has a particular focus on industrial strength and interoperability.',
		URL:'http://www.eclipse.org/sphinx/',
		Logo:'http://www.eclipse.org/sphinx/images/sphinx_logo_300.png'
	},
	{Title:'Unified Modeling Language 2.x', 
		Description:'(UML2) is an EMF-based implementation of the UML 2.x metamodel for the Eclipse platform.',
		URL:'http://www.eclipse.org/modeling/mdt/?project=uml2',
		Logo:'http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg'
	},
	{Title:'UML 2 Tools', 
		Description:'UML 2 Tools is a set of GMF-based editors for viewing and editing UML models.',
		URL:'http://www.eclipse.org/modeling/mdt/?project=uml2tools',
		Logo:'http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg'
	},
	{Title:'XML Schema Definition (XSD)', 
		Description:'(XSD) is a reference library that provides an API for use with any code that examines, creates or modifies W3C XML Schema.',
		URL:'http://www.eclipse.org/modeling/mdt/?project=xsd',
		Logo:'http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg'
	}
	
]});
    document.getElementById("content").innerHTML = html;
}());
</script>
		
		
		
		
		

	</div>
	
	
	<div id="rightcolumn">
		<div class="sideitem">
			<h6>News on Twitter</h6>
		<a class="twitter-timeline" href="https://twitter.com/hashtag/eclipsemf" data-widget-id="503883842478809088">#eclipsemf Tweets</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</div>
</div>



EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
