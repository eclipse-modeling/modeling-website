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
	$pageTitle 		= "Professional Support";
	$pageKeywords	= "EMF, support, training, modeling, UML, UML2, MDD, MDA, model-driven";
	$pageAuthor		= "Richard Gronback";
	
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML


<div id="maincontent">
	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<table>
		<tr>
		<td><p>Open-source software is free of licensing fees. Furthermore, it is easy to adapt and enhance with new features. Nevertheless, using open-source frameworks is not free. Like in closed-source software, not everybody is an expert on every framework. The total cost of ownership includes training, adoption, enhancement and maintenance of a framework. It might take significantly more time for somebody new to the project to extend a certain feature than for a person who is familiar with the framework. Furthermore, software has to be maintained. Even if this can be done literally by everybody for open-source software, a professional maintenance agreement with fixed response times is often mandatory in an industrial setting to ensure productivity. The following vendors offer training, professional support, sponsored development and implementation services. Please raise a BR in the modeling project, if you want to be listed here.</p>
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
	{Title:'EclipseSource', 
		Description:'Professional training, developer support, sponsored development, implementation services for EMF and all related technologies - ',
		URL:'http://developer.eclipsesource.com/technology/modeling/',
		Logo:'https://eclipsesource.com/wp-content/uploads/2016/09/es-logo-sticky.png'
	},
	{Title:'ES-Computersysteme', 
		Description:'Consulting for Modeling, professional training, workshops and development for CDO - ',
		URL:'http://www.esc-net.de',
		Logo:'http://projects.eclipse.org/sites/default/files/Logo-CDO.png'
	},
	{Title:'Obeo', 
    Description:'Since 2008 Obeo has been one of the ten strategic members of the Eclipse Foundation. Our leading position is the result of an unwavering contribution to numerous successful projects. We bring you the expertise of an Eclipse leader: training, custom development (plug-ins, Eclipse technologies integration,...), support and maintenance to ensure the success of your projects, consulting and coaching.  - ',
		URL:'https://www.obeo.fr/en/services',
		Logo:'https://www.obeo.fr/images/logos/logo_obeo.png'
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
