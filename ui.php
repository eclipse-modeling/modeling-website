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
	$pageTitle 		= "User Interface";
	$pageKeywords	= "emf, UI, forms, modeling, UML, UML2, MDD, MDA, model-driven";
	$pageAuthor		= "Richard Gronback";
	
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML


<div id="maincontent">
	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<table>
		<tr>
		<td><p>In an application, no matter whether it is a tool or a business application, end-users need to be enabled to conveniently display and modify instances of the domain model. Typical representations of the data are forms or property sheets. The following technologies provide support to efficiently implement user interfaces for EMF domain models in your project. If you prefer a graphical visualization, please take a look at the graphical modeling frameworks.</p>
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
	{Title:'EMF Client Platform', 
		Description:'The EMF Client Platform is a framework for building EMF-based client applications. The goal is to provide reusable, adaptable and extensible UI components to develop applications based on a given EMF model. All components can be used stand-alone and be embedded into your own application. To get started, ECP provides a demo application, which integrates all provided components. This demo application allows you to get started by only providing your EMF model. ',
		URL:'http://eclipse.org/ecp',
		Logo:'http://eclipse.org/ecp/public/images/ecp.png'
	},
	{Title:'EMF Forms', 
		Description:'EMF Forms provides a new way of developing form-based UIs. Instead of manually coding form-based layouts, it allows you to describe the UI with a simple model instead of with code. The approach allows you to more efficiently produce and iteratively refine form-based UIs that conform to a uniform look and feel. EMF Forms also lowers the technical entry barrier to creating form-based UIs. The UI description is interpreted by a rendering engine and allows you to switch between the UI technology stack to Swing, SWT, JavaFX or Web just by replacing the renderer. EMF Forms is a new subcomponent of the EMF Client Platform.',
		URL:'http://eclipse.org/ecp/emfforms',
		Logo:'http://eclipse.org/ecp/emfforms/public/images/logo.png'
	},
	{Title:'Extended Editing Framework', 
		Description:'The Extended Editing Framework is a presentation framework for the Eclipse Modeling Framework. It allows user to create rich user interfaces to edit EMF models. ',
		URL:'http://eclipse.org/eef/',
		Logo:'http://projects.eclipse.org/sites/default/files/eefv2-resized.png'
	}
]});
    document.getElementById("content").innerHTML = html;
}());
</script>
		
		
		
		
		

	</div>
	
	
	<div id="rightcolumn">
		<div class="sideitem">
			<h6>News on Twitter</h6>
		<a id="twitter-timeline" href="https://twitter.com/hashtag/eclipsemf" data-widget-id="503883842478809088">#eclipsemf Tweets</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</div>
</div>



EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
