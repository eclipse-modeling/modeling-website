<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	$pageTitle 		= "EMF Refactor - Publications";
	$pageKeywords	= "EMF, Refactor, model refactoring, refactoring";
	$pageAuthor		= "Thorsten Arendt";
	
	$html = <<<EOHTML

<div id="maincontent">

	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<p>
		

	<br>
	<h2>Conference and Workshop Proceedings</h2>
	<ul>
	<b>2012</b>
	<li>Thorsten Arendt, Gabriele Taentzer: 
	<a href="downloads/AT2012.pdf"><i>Integration of Smells and Refactorings within the Eclipse Modeling Framework</i></a>.
	Proceedings of <a href="http://refactoring.info/WRT12/">Fifth Workshop on Refactoring Tools (WRT 2012)</a>
	co-located with ICSE 2012, June 1 2012 in Rapperswil, Switzerland. To appear in ACM Digital Library 2012.
	</li>
	<b>2011</b>
	<li>Thorsten Arendt, Sieglinde Kranz, Florian Mantz, Nikolaus Regnat, Gabriele Taentzer: 
	<a href="downloads/AKMRT2011.pdf"><i>Towards Syntactical Model Quality Assurance in Industrial Software Development: 
	Process Definition and Tool Support</i></a>.
	Proceedings of <a href="http://http://se2011.ipd.kit.edu">Software Engineering 2011</a>, 
	February 21-25 2011 in Karlsruhe, Germany. Volume 183 of LNI, pages 63-74, GI, 2011.
	</li>
	<b>2010</b>
	<li>Thorsten Arendt, Florian Mantz, Gabriele Taentzer: 
	<a href="downloads/AMT2010.pdf"><i>EMF Refactor: Specification and Application of Model Refactorings within the Eclipse Modeling Framework</i></a>.
	Proceedings of <a href="http://rmod.lille.inria.fr/benevol/">9th BElgian-NEtherlands software eVOLution seminar (BENEVOL 2010)</a>,
	December 17 2010 in Lille, France.
	</li>
	<b>2009</b>
	<li>Thorsten Arendt, Florian Mantz, Lars Schneider, Gabriele Taentzer: 
	<a href="downloads/AMST2009.pdf"><i>Model Refactoring in Eclipse by LTK, EWL, and EMF Refactor: A Case Study</i></a>.
	Proceedings of <a href="http://www.modse.fr/modsemccm09/doku.php">Model-Driven Software Evolution, Workshop Models and Evolution (MoDSE-MCCM 2009)</a>, 
	co-located with MoDELS 2009, October 4 2009 in Denver, USA.
	</li>
	</ul>
	
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

