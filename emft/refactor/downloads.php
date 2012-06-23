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
		
<h3>Version 0.6.0</h3>
<ul class="midlist">
    <li><a href="downloads/refactor-0.6.0.20111019171158.jar">refactor-0.6.0.20111019171158.jar</a> (released 19. Okt 2011 17:12)</li>
</ul>
		<h3>Version 0.5.0</h3>
		<ul class="midlist">
    		<li><a href="downloads/refactor-0.5.0.20110111155417.jar">refactor-0.5.0.20110111155417.jar</a> (released Jan 11, 2011 15:54)</li>
		</ul>
		
		<h2>How to's</h2>
		<ul class="midlist">
			<li><a href="downloads/manual_application.pdf" target="_blank">How to apply EMF model refactorings</a></li>
			<li><a href="downloads/manual_generation.pdf" target="_blank">How to generate new EMF model refactorings using Java code</a></li>
			<li><a href="downloads/manual_henshin.pdf" target="_blank">How to generate new EMF model refactorings using Henshin transformations</a></li>
		</ul>
		<h2>Specials</h2>
		<h3>Besser modellieren - Qualit&auml;tssicherung von UML-Modellen</h3>
		This download area is dedicated to the article 'Besser modellieren - Qualit&auml;tssicherung von UML-Modellen' 
		submitted to the <a href="http://www.sigs-datacom.de/fachzeitschriften/objektspektrum.html" target="_blank">OBJEKTspektrum</a> magazine on June 20, 2012.
		<ul class="midlist">
			<li><a href="downloads/Papyrus.zip" target="_blank">Plugins bundle for UML modeling environment Papyrus</a></li>
			<li><a href="downloads/ExampleProjectPapyrus.zip" target="_blank">Example project for UML modeling environment Papyrus</a></li>
			<li><a href="downloads/RSA755.zip" target="_blank">Plugins bundle for UML modeling environment IBM Rational Software Architect v7.5.5</a></li>
			<li><a href="downloads/ExampleProjectRSA755.zip" target="_blank">Example project for UML modeling environment IBM Rational Software Architect v7.5.5</a></li>
		</ul>
		<b>Papyrus:</b> Please install the Eclipse Modeling Tools from <a href="http://www.eclipse.org/downloads" target="_blank">www.eclipse.org/downloads</a></li>.
		Start Eclipse and install the UML modeling environment Papyrus (<i>Install Modeling Components > Papyrus</i>) as well as the reporting tool BIRT 
		(<i>Help > Install New Software... > Work with: http://download.eclipse.org/birt/update-site/3.7-interim/ > Select All > Next > ...</i>). 
		Download <i>Papyrus.zip</i> from above, unzip it
		into the plugins directory of your Eclipse installation and restart Eclipse. Download <i>ExampleProjectPapyrus.zip</i> from above and import the example
		project <i>VehicleRentalCompany</i> into your workspace.
		<br/>
		<b>IBM RSA v7.5.5:</b> Download <i>RSA755.zip</i> from above, unzip it
		into the plugins directory of your RSA installation and restart IBM RSA. Download <i>ExampleProjectRSA755.zip</i> from above and import the example
		project <i>VRC</i> into your workspace.
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

