<?php

	# Set the theme for your project's web pages.
	# See the Committer Tools "How Do I" for list of themes
	# https://dev.eclipse.org/committers/
	# Optional: defaults to system theme 
	$theme = "Nova";
	

	# Define your project-wide Nav bars here.
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# these are optional
	$Nav->setLinkList(array());
	$Nav->addNavSeparator("Amalgam", 	"/amalgam");
	$Nav->addCustomNav("Download", "http://www.eclipse.org/downloads/packages/", "_self", 3);
	$Nav->addCustomNav("Documentation", "http://wiki.eclipse.org/ModelingAmalgam", "_self", 3);
	$Nav->addCustomNav("Support", "/modeling/amalgam/support", "_self", 3);
	$Nav->addCustomNav("Getting Involved", "/modeling/amalgam/developers", "_self", 3);
	
	$pageKeywords	= "acceleo, dsl, modeling, domain specific language, textual, emf, package, diagram, modeler";
	$pageAuthor		= "Obeo";
	$pageTitle 		= "Modeling Amalgamation";

	$Menu->setMenuItemList(array());
	$Menu->addMenuItem("Home", "/modeling/amalgam", "_self");
	$Menu->addMenuItem("Download", "http://www.eclipse.org/downloads/packages/", "_self");
	$Menu->addMenuItem("Documentation", "http://wiki.eclipse.org/ModelingAmalgam", "_self");
	$Menu->addMenuItem("Support", "/modeling/amalgam/support", "_self");
	$Menu->addMenuItem("Developers", "/modeling/amalgam/developers", "_self");
	
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="style_amalgam.css"/>' . "\n\t");
	
	$App->Promotion = TRUE;

	$App->SetGoogleAnalyticsTrackingCode("UA-16777490-1");
?>
