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
	$pageTitle 		= "Addtional Modeling Frameworks";
	$pageKeywords	= "modeling, UML, UML2, MDD, MDA, model-driven";
	$pageAuthor		= "Richard Gronback";
	
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML


<div id="maincontent">
	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<table>
		<tr>
		<td><p>Some technologies do not fit into a certain category or are a category unto themselves. These technologies provide great features for a variety of use cases, such as comparing model instances, querying models or applying reverse engineering (the extraction of models from code). The following list of technologies is a great proof of the variety and power of the EMF ecosystem. </p>
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
	{Title:'EMF Compare', 
		Description:'EMF Compare brings model comparison to the EMF framework, this tool provides generic support for any kind of metamodel in order to compare and merge models. The objectives of this component are to provide a stable and efficient generic implementation of model comparison and to provide an extensible framework for specific needs.', 
		URL:'http://www.eclipse.org/emf/compare/#compare',
		Logo:'http://www.eclipse.org/emf/compare/images/logos/logo.png'
	},
	{
		Title:'EMF Diff/Merge',
		Description:'EMF Diff/Merge is a diff/merge tool for models. Its main purpose is to help build higher-level tools that need to merge models based on consistency rules. Typical usages include model refactoring, iterative model transformations, bridges between models or modeling tools, collaborative modeling environments, or versioning systems.',
		URL:'http://www.eclipse.org/diffmerge/',
		Logo:'https://projects.eclipse.org/sites/default/files/EDM_Logo_Small.png'
	},
	
	{Title:'Dawn', 
		Description:'Dawn is a sub-component of Connected Data Objects project and achieves to create collaborative network solutions for user interfaces basing on CDO. E.g. it provides collaborative access for GMF diagrams. Beside the real time shared editing Dawn provides conflict visualisation and handling and other useful feature for collaborative modeling. In addition to this, Dawn will also provide a Web-Viewer which allows to view every diagram change online.', 
		URL:'http://wiki.eclipse.org/Dawn',
		Logo:'http://www.eclipse.org/cdo/images/Logo-Dawn.png'
	},
	{Title:'Amalgam', 
		Description:'The Amalgamation project provides improved packaging, integration, and usability of Modeling project components. The project is focused on providing a consumable and integrated Eclipse Modeling Tools package and ease the discovery of the modeling technologies through specific code and examples.', 
		URL:'http://www.eclipse.org/modeling/amalgam/',
		Logo:'http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg'
	},
	{Title:'Validation Framework', 
		Description:'The validation component provides the following capabilities: Constraint Definition - Provides API for defining constraints for any EMF meta-model (batch and live constraints), Customizable model traversal algorithms - Extensibility API to support meta-models that require custom strategies for model traversal, Constraint parsing for languages - Provides support for parsing the content of constraint elements defined in specific languages. The validation framework provides support for two languages: Java and OCL, Configurable constraint bindings to application contexts - API support to define "client contexts" that describe the objects that need to be validated and to bind them to constraints that need to be enforced on these objects, Validation listeners - Support for listening to validation events.', 
		URL:'http://www.eclipse.org/modeling/emf/downloads/?project=validation',
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
