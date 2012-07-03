<?php

/*******************************************************************************
 * Copyright (c) 2009 Eclipse Foundation and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 * Sebastien Gerard, CEA LIST
 *    
 *******************************************************************************/

	// project root
	$PR = "modeling/mdt/papyrus";
	$PR_www = "modeling/mdt/papyrus";
	$projectName = "Papyrus";
	$projects = array("Papyrus" => "papyrus");
	//$projects = array();
	//$defaultProj = "papyrus";

	$extraprojects = array(); //components with only downloads, no info yet, "prettyname" => "directory"
	$nodownloads = array(); //components with only information, no downloads, or no builds available yet, "projectkey"
	$nonewsgroup = array(); //components without newsgroup
	$nomailinglist = array(); //components without mailinglist
	$incubating = true; // components which are incubating
	$nomenclature = "Project"; //are we dealing with "components" or "projects"?
	
	$buildtypes = array(
		"R" => "Release",
		"S" => "Stable",
		"I" => "Integration",
		"M" => "Maintenance",
		"N" => "Nightly"
	);
	
	include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/scripts.php";
	

	# Set the theme for your project's web pages.
	# See http://eclipse.org/phoenix/
	$theme = "Nova";
	

	# Define your project-wide Navigation here
	# This appears on the left of the page if you define a left nav
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# these are optional
	
	$Nav->setLinkList(array());
	$Nav->addNavSeparator("Papyrus", 	"/modeling/mdt/papyrus");
	$Nav->addCustomNav("Getting started", "/modeling/mdt/papyrus/updates/index.php", "_self", 3);
	$Nav->addCustomNav("Downloads", "/modeling/mdt/papyrus/downloads/index.php", "_self", 3);
	$Nav->addCustomNav("Documentation", "/modeling/mdt/papyrus/usersCorner/usersCornerIndex.php", "_self", 3);
	$Nav->addCustomNav("Support", "/modeling/mdt/papyrus/support/index.php", "_self", 3);
	$Nav->addCustomNav("Getting involved", "/modeling/mdt/papyrus/developpersCorner/developpersCornerIndex.php", "_self", 3);

	# Define keywords, author and title here, or in each PHP page specifically
	$pageKeywords	= "papyrus, dsl, modeling, domain specific language, graphical, uml, sysml";
	$pageAuthor		= "Sebastien Gerard, R�mi Schnekenburger";
	$pageTitle 		= "Papyrus";


	# top navigation bar
	# To override and replace the navigation with your own, uncomment the line below.
	$Menu->setMenuItemList(array());
	$Menu->addMenuItem("Home", "/modeling/mdt/papyrus", "_self");
	$Menu->addMenuItem("Getting started", "/modeling/mdt/papyrus/updates/index.php", "_self");
	$Menu->addMenuItem("Downloads", "/modeling/mdt/papyrus/downloads/index.php", "_self");
	$Menu->addMenuItem("Documentation", "/modeling/mdt/papyrus/usersCorner/usersCornerIndex.php", "_self");
	$Menu->addMenuItem("Support", "/modeling/mdt/papyrus/support/index.php", "_self");
	$Menu->addMenuItem("Getting involved", "/modeling/mdt/papyrus/developpersCorner/developpersCornerIndex.php", "_self");
	
	# To define additional CSS or other pre-body headers
	# $App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/default/style.css"/>');
	
	# To enable occasional Eclipse Foundation Promotion banners on your pages (EclipseCon, etc)
	$App->Promotion = TRUE;
	
	# If you have Google Analytics code, use it here
	# $App->SetGoogleAnalyticsTrackingCode("YOUR_CODE");
?>