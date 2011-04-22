<?php

/*******************************************************************************
 * Copyright (c) 2009 Eclipse Foundation and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *    
 *******************************************************************************/

	// project root
	$PR = "facet";
	$PR_www = "modeling/emft/facet";
	$projectName = "EMFFacet";
	$projects = array("EMFFacet" => "emffacet");
	//$projects = array();
	//$defaultProj = "modisco";

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
	
	# If you want to override the eclipse.org navigation, uncomment below.
	# $Nav->setLinkList(array());
	
	# Break the navigation into sections
	$Nav->addCustomNav("About This Project", "http://www.eclipse.org/projects/project_summary.php?projectid=modeling.emft.emf-facet", "", 1);
	$Nav->addCustomNav("Home", "/modeling/emft/facet/index.php", "_self", 1);
	$Nav->addCustomNav("Downloads", "/modeling/emft/facet/downloads/index.php", "_self", 1);
	$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/EMF_Facet/", "_blank", 1);

	//$Nav->addCustomNav("Support", "/project/support.php", "_blank", 3);
	//$Nav->addCustomNav("Getting Involved", "/project/developers", "_blank", 3);

	# Define keywords, author and title here, or in each PHP page specifically
	$pageKeywords	= "modeling, EMF, facet";
	$pageAuthor		= "Gr�goire DUPE";
	# $pageTitle 		= "Xtext";


	# top navigation bar
	# To override and replace the navigation with your own, uncomment the line below.
	# $Menu->setMenuItemList(array());
	# $Menu->addMenuItem("Home", "/project", "_self");
	# $Menu->addMenuItem("Download", "/project/download.php", "_self");
	# $Menu->addMenuItem("Documentation", "/project/documentation.php", "_self");
	# $Menu->addMenuItem("Support", "/project/support.php", "_self");
	# $Menu->addMenuItem("Developers", "/project/developers", "_self");
	
	# To define additional CSS or other pre-body headers
	//$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/default/style.css"/>');
	
	# To enable occasional Eclipse Foundation Promotion banners on your pages (EclipseCon, etc)
	$App->Promotion = TRUE;
	
	# If you have Google Analytics code, use it here
	# $App->SetGoogleAnalyticsTrackingCode("YOUR_CODE");
?>