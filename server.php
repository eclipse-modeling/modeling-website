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
	$pageTitle 		= "Server and Storage";
	$pageKeywords	= "modeling, UML, UML2, MDD, MDA, model-driven";
	$pageAuthor		= "Richard Gronback";
	
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML


<div id="maincontent">
	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<table>
		<tr>
		<td><p><a href="/emf/">EMF (Core)</a> allows you to generate classes based on a data model, a.k.a. the domain model. In many applications - no matter whether it is a tool or a business application - instances of the domain model need to be  stored efficiently and versioned. Moreover, such applications often have to enable multiple users to access and modify domain model instances concurrently and hence require a client-server architecture as well as support for transactions. The following technologies provide the necessary infrastructure to cater for such scenarios in your project.</p>
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
	{Title:'CDO', 
		Description:'The CDO (Connected Data Objects) Model Repository is a distributed shared model framework for EMF models and meta models. CDO is also a model runtime environment with a focus on orthogonal aspects like model scalability, transactionality, persistence, distribution, queries and more. 		CDO has a 3-tier architecture supporting EMF-based client applications, featuring a central model repository server and leveraging different types of pluggable data storage back-ends like relational databases, object databases and file systems. The default client/server communication protocol is implemented with the Net4j Signalling Platform.',
		URL:'http://eclipse.org/cdo',
		Logo:'https://projects.eclipse.org/sites/default/files/Logo-CDO.png'
	},
	{Title:'EMFStore', 
		Description:'EMFStore is a model repository for the Eclipse Modeling Framework (EMF) and features collaborative editing and versioning of models. Existing versioning systems such as git or SVN are focused on textual artifacts and do not work well for models. EMFStore is specifically designed for models and allows semantic versioning of models. As a result, it supports merging and conflict detection more effectively. EMFStore can be used for EMF Model instances and can be integrated into any kind of existing application too.',
		URL:'http://eclipse.org/emfstore',
		Logo:'http://projects.eclipse.org/sites/default/files/emfstoreSmall.png'
	},
	{Title:'Net4j', 
		Description:'Net4j is an extensible client-server system based on the Eclipse Runtime and the Spring Framework. You can easily extend the protocol stack with Eclipse plugins that provide new transport or application protocols. Net4js focus on performance and scalability is featured by non-blocking I/O, zero-copy signals and multiplexed binary protocols. Net4j was originally developed to support the CDO technology for distributed shared and persistent EMF models but can also multiplex your own user-supplied application protocols through the same socket connection.',
		URL:'http://wiki.eclipse.org/Net4j',
		Logo:'http://www.eclipse.org/cdo/images/Logo-Net4j.png'
	},
	{Title:'Teneo', 
		Description:'Teneo is a database persistency solution for EMF using Hibernate or EclipseLink. It supports automatic creation of EMF to Relational Mappings. EMF Objects can be stored and retrieved using advanced queries (HQL or EJB-QL).',
		URL:'http://wiki.eclipse.org/Teneo#teneo',
		Logo:'http://www.eclipse.org/modeling/images/modeling_pos_logo_fc_med.jpg'
	},
	{Title:'Model Transaction', 
		Description:'The transaction component provides a model management layer built on top of EMF for managing EMF resources. It provides API that include extensions to the EditingDomain and related APIs of the EMF.Edit framework, and an internal model of transactions. It consists of two layers: a non-Eclipse core, providing primarily the "transaction model", and an Eclipse workspace integration layer.',
		URL:'http://eclipse.org/modeling/emf/downloads/?project=transaction',
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
