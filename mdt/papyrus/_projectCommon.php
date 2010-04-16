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

	# Set the theme for your project's web pages.
	# See http://eclipse.org/phoenix/
	$theme = "Nova";
	

	# Define your project-wide Navigation here
	# This appears on the left of the page if you define a left nav
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# these are optional
	
	$Nav->setLinkList(array());
	$Nav->addNavSeparator("Papyrus", 	"/Modeling/mdt/papyrus");
	$Nav->addCustomNav("Download", "/Modeling/mdt/papyrus/download.php", "_self", 3);
	$Nav->addCustomNav("Documentation", "/Modeling/mdt/papyrus/documentation.php", "_blank", 3);
	$Nav->addCustomNav("Support", "/Modeling/mdt/papyrus/support.php", "_blank", 3);
	$Nav->addCustomNav("Getting Involved", "/Modeling/mdt/papyrus/developers", "_blank", 3);

	# Define keywords, author and title here, or in each PHP page specifically
	$pageKeywords	= "papyrus, dsl, modeling, domain specific language, graphical, uml, sysml";
	$pageAuthor		= "Sebastien Gerard";
	$pageTitle 		= "Papyrus";


	# top navigation bar
	# To override and replace the navigation with your own, uncomment the line below.
	# $Menu->setMenuItemList(array());
	# $Menu->addMenuItem("Home", "/project", "_self");
	# $Menu->addMenuItem("Download", "/project/download.php", "_self");
	# $Menu->addMenuItem("Documentation", "/project/documentation.php", "_self");
	# $Menu->addMenuItem("Support", "/project/support.php", "_self");
	# $Menu->addMenuItem("Developers", "/project/developers", "_self");
	
	# To define additional CSS or other pre-body headers
	# $App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/default/style.css"/>');
	
	# To enable occasional Eclipse Foundation Promotion banners on your pages (EclipseCon, etc)
	$App->Promotion = TRUE;
	
	# If you have Google Analytics code, use it here
	# $App->SetGoogleAnalyticsTrackingCode("YOUR_CODE");
?>