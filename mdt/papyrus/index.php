<?php
/*******************************************************************************
 * Copyright (c) 2009 Eclipse Foundation and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors: Sébastien Gérard, CEA LIST
 *    
 *******************************************************************************/

	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/mdt/papyrus/style.css"/>');
	
	$localVersion = false;
	
	# Define these here, or in _projectCommon.php for site-wide values
	$pageKeywords	= "eclipse, project, payrus, uml, sysml, marte, mde, mda, idm, dsl, dsml";
	$pageAuthor		= "Sebastien Gerard";
	$pageTitle 		= "Papyrus home";
	
	
	// 	# Paste your HTML content between the EOHTML markers!
	$html = file_get_contents('modeling/mdt/papyrus/description/_index.html');

	# Generate the web page
	$App->generatePage($theme, $Menu, null, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>