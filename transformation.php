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
	$pageTitle 		= "Model Transformation";
	$pageKeywords	= "modeling, UML, UML2, MDD, MDA, model-driven";
	$pageAuthor		= "Richard Gronback";
	
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML


<div id="maincontent">
	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<table>
		<tr>
		<td><p>In several scenarios, instances of domain models in EMF need to be transformed into other models or into a textual representation. Therefore, there are dedicated  frameworks and tools that allow you to develop <b>model-to-model transformations</b> on the one hand and, on the other hand, <b>model-to-text transformations</b>. With <b>model-to-model transformation</b< data/model instances, conforming to one EMF Model can be transformed to data/model instances conforming to another EMF Model. This is useful for data import/export and data exchange or for deriving data from existing data for use in a different context. The following list contains several frameworks supporting this use case for EMF. With <b>model-to-text transformations</b>, models can be transformed into a textual representation, e.g., source code of a specific language. In EMF, a number of frameworks is available to support this use case</p>
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
	{Title:'Acceleo', 
		Description:'Acceleo is a pragmatic implementation of the Object Management Group (OMG) MOF Model to Text Language (MTL) standard. You do not need to be an expert to start using the plug-ins and create your first code generator : using the provided example projects and the powerful completion feature of the Acceleo editor, it is very easy to get started and understand the basic principles.',
		URL:'http://www.eclipse.org/acceleo/',
		Logo:'http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg'
	},
	{Title:'ATL', 
		Description:'ATL (ATL Transformation Language) is a model transformation language and toolkit. In the field of Model-Driven Engineering (MDE), ATL provides ways to produce a set of target models from a set of source models.',
		URL:'http://eclipse.org/atl/',
		Logo:'http://projects.eclipse.org/sites/default/files/logoATL-transparent.png'
	},
	{Title:'JET', 
		Description:'JET is typically used in the implementation of a "code generator". A code-generator is an important component of Model Driven Development (MDD). The goal of MDD is to describe a software system using abstract models (such as EMF/ECORE models or UML models), and then refine and transform these models into code. Although is possible to create abstract models, and manually transform them into code, the real power of MDD comes from automating this process. Such transformations accelerate the MDD process, and result in better code quality. The transformations can capture the "best practices" of experts, and can ensure that a project consistently employes these practices.',
		URL:'http://www.eclipse.org/modeling/m2t/?project=jet',
		Logo:'http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg'
	},
	{Title:'Xpand', 
		Description:'Xpand is a statically-typed template language featuring: polymorphic template invocation, aspect oriented programming, functional extensions, a flexible type system abstraction, model transformation, model validation and much more',
		URL:'http://wiki.eclipse.org/Xpand',
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
