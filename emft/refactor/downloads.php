<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	$pageTitle 		= "EMF Refactor - Downloads";
	$pageKeywords	= "EMF, Refactor, model refactoring, refactoring";
	$pageAuthor		= "Thorsten Arendt";
	
	$html = <<<EOHTML

<div id="maincontent">

	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<p>
<h2>Releases</h2>
<ul class="midlist">
    <li><a href="downloads/refactor-0.6.0.20111019150545.jar">refactor-0.6.0.20111019150545.jar</a> (released 19. Oct 2011 15:06)</li>
</ul>
		<h3>Version 0.5.0 (released Jan 11, 2011)
		<ul class="midlist">
    		<li><a href="downloads/refactor-0.5.0.20110111155417.jar">refactor-0.5.0.20110111155417.jar</a> (released Jan 11, 2011 15:54)</li>
		</ul>
		
		<h2>How to's</h2>
		<ul class="midlist">
			<li><a href="downloads/manual_application.pdf" target="_blank">How to apply EMF model refactorings</a></li>
			<li><a href="downloads/manual_generation.pdf" target="_blank">How to generate new EMF model refactorings using Java code</a></li>
			<li><a href="downloads/manual_henshin.pdf" target="_blank">How to generate new EMF model refactorings using Henshin transformations</a></li>
		</ul>
		</p>	
	</div>
	
	<div id="rightcolumn">
		<div class="sideitem">	
   		<h6>Incubation</h6>
		<p>This component is currently in its <a href="http://www.eclipse.org/projects/dev_process/validation-phase.php">Validation (Incubation) Phase</a>.</p>
   			<div align="center"><a href="/projects/what-is-incubation.php"><img align="center" src="/images/egg-incubation.png"  border="0" alt="Incubation" /></a></div>
 		</div>
		
	</div>
		
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>