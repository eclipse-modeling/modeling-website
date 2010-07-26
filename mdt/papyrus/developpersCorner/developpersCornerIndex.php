<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'
/*******************************************************************************
 * Copyright (c) 2009 Eclipse Foundation and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 * Sébastien Gérard, CEA LIST
 *    
 *******************************************************************************/

	#
	# Begin: page-specific settings.
	$pageTitle 		= "Papyrus Developper Corner";
	$pageKeywords	= "papyrus, developpers, documents, cookbook, examples";
	$pageAuthor		= "Sebastien Gerard";
		
	# Paste your HTML content between the EOHTML markers!	
	ob_start();
	?>
	<div id="midcolumn">
		<h1>Get involved!</h1>
		
		<p>
			There are many ways to help us developing and bringing to the community the Papyrus tool:  
		</p>
		<h3>Reporting bug or enhancement</h3>
		<p>
			<ul>
    		 	<li>Download one of the latest Papyrus release or milestones. Take it for a test drive before next release and report any bugs you find.</li>
    		 	<li>Report Enhancements: Got an idea for a killer feature? Or maybe something you use often could use some tweaking? Post an enhancement request!</li>
   			</ul>
   			
   			You can achieve this going to the Eclipse bugzilla: <a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=MDT&amp;version=0.7.0&amp;component=Papyrus&amp;rep_platform=All&amp;op_sys=All"/>New Bug</a>
		</p>
				
		<h3>Fix Bugs or Implement Enhancements</h3>
		<p>	
		Is there some bug that really bothers you? Instead of just reporting it, fix it and submit a patch on the Papyrus bugzilla.
			<ul>
				<li>To learn how the bug-fixing process works, check out the <a href="http://wiki.eclipse.org/Bug_Reporting_FAQ">bug reporting FAQ:</a></li>
				<li>To learn about the lifecycle of bugzilla entries, check out the <a href="http://wiki.eclipse.org/Development_Resources/HOWTO/Bugzilla_Use">development process</a></li>	
			</ul>
		</p>
	</div>	
	<?
	$html = ob_get_clean();

	# Generate the web page
	$App->generatePage('Nova', $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>