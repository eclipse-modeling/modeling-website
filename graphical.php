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
	$pageTitle 		= "Graphical Modeling";
	$pageKeywords	= "modeling, UML, UML2, MDD, MDA, model-driven";
	$pageAuthor		= "Richard Gronback";
	
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML


<div id="maincontent">
	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<table>
		<tr>
		<td><p>The domain model often needs to be visualized in a graphical way, such as in a diagram editor.  This is especially true when implementing tools. The following frameworks provide support to implement graphical views for your EMF-based domain model that can be embedded into your tool or application.</p>
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
	{Title:'GMF Tooling', 
		Description:'GMF Tooling is a Model Driven Architecture approach to domain of graphical editors. By defining a tooling, graphical and mapping model definition, one can generate a fully functional graphical editor in Eclipse.',
		URL:'http://eclipse.org/gmf-tooling/',
		Logo:'http://wiki.eclipse.org/images/3/3d/Gmf_logo_banner.png'
	},
	{Title:'GMF Runtime', 
		Description:'The GMF Runtime is an industry proven application framework for creating graphical editors using EMF and GEF. The GMF Runtime provides many features that one would have to code by hand if using EMF and GMF directly.',
		URL:'http://www.eclipse.org/modeling/gmp/',
		Logo:'http://wiki.eclipse.org/images/3/3d/Gmf_logo_banner.png'
	},
	{Title:'GMF Notation', 
		Description:'The GMF Notation Project provides a standard EMF notational meta model.',
		URL:'http://www.eclipse.org/modeling/gmp/',
		Logo:'http://wiki.eclipse.org/images/3/3d/Gmf_logo_banner.png'
	},
	{Title:'Graphiti', 
		Description:'Eclipse provides a modeling infrastructure evolving around the Eclipse Modeling Framework (EMF) for which offering graphical representations and editing possibilities is essential. Graphiti is an Eclipse-based graphics framework that enables rapid development of state-of-the-art diagram editors for domain models. Graphiti can use EMF-based domain models very easily but can deal with any Java-based objects on the domain side as well.',
		URL:'http://eclipse.org/graphiti/',
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
