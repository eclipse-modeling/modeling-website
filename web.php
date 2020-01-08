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
	$pageTitle 		= "Modeling in the web";
	$pageKeywords	= "emf, UI, forms, modeling, UML, UML2, model-driven, web, html, javascript, json, angular, react";
	$pageAuthor		= "Richard Gronback";
	
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML


<div id="maincontent">
	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<table>
		<tr>
		<td><p>More and more modeling tools are being migrated to the web/cloud using technologies such as <a href="https://www.eclipse.org/emfcloud/">EMF.cloud</a>, <a href="https://www.eclipse.org/glsp/">GLSP</a>, <a href="https://eclipse.org/che">Eclipse Che</a>, Monaco, <a href="https://eclipsesource.com/blogs/2019/12/24/eclipse-theia-ide-faq/">Eclipse Theia</a>, or LSP. The following Eclipse technologies allow you to develop modeling tools and model-based application in the web.</p>
		</td>
		<td align="right"><img src="https://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg">
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
    {Title:'EMF.cloud', 
		Description:'EMF.cloud is the web version of EMF. The umbrella project for web-related modeling components makes the benefits of EMF available in a web- and cloud based scenario. Further, it supports migrating existing EMF-based tools to the browser.',
		URL:'https://www.eclipse.org/emfcloud/',
		Logo:'https://www.eclipse.org/emfcloud/images/logo.png'
	},
	{Title:'GLSP', 
		Description:'The Graphical Language Server Platform (GLSP) enables diagram editors in the web/browser. It integrates well with existing graphical modeling editors based on EMF, but also supports the development of browser-based diagram editors from scratch. GLSP-based diagram editors can be hosted stand-alone or embedded into web-based tools such as <a href="https://eclipsesource.com/technology/eclipse-theia/">Eclipse Theia</a>',
		URL:'https://www.eclipse.org/glsp/',
		Logo:'https://www.eclipse.org/glsp/images/logo.png'
	},
	{Title:'JSON Forms', 
		Description:'JSON Forms is alternative renderer engine for EMF Forms. It allows to efficiently build form-based web UIs and is especially suited for the creation of data-centric modeling tools. JSON Forms eliminates the need to write HTML templates and Javascript for data binding by hand in order to create customizable forms. It does so by leveraging the capabilities of JSON and JSON schema and providing a simple and declarative way of describing forms. Forms are then rendered with a UI framework, currently one that is based on React or plain HTML. If you already use EMF Forms, there is an exporter to transfer data models and view models to the JSON Forms format.',
		URL:'http://jsonforms.io',
		Logo:'https://www.eclipse.org/modeling/images/jsonformslogo.svg'
	},
	
]});
    document.getElementById("content").innerHTML = html;
}());
</script>
		
		
		
		
		

	</div>
	
	
	<div id="rightcolumn">
		<div class="sideitem">
			<h6>News on Twitter</h6>
		<a id="twitter-timeline" href="https://twitter.com/hashtag/eclipsemf" >#eclipsemf Tweets</a>

		</div>
	</div>
</div>
<script>(function() {
if (getCookie("eclipse_cookieconsent_status") === "allow") {
      createTimeline();
  }
})()</script>



EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

