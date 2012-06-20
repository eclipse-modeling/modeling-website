<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	$pageTitle 		= "EMF Refactor - Downloads";
	$pageKeywords	= "EMF, Refactor, model refactoring, refactoring";
	$pageAuthor		= "Thorsten Arendt";
	
	$html = <<<EOHTML

<div id="maincontent">

	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<p>
	<h2>Supported Refactorings</h2>
		
	<h3>Ecore Refactorings</h3>
	<ol class="midlist">
    	<li>Add EParameter</li>
    	<li>Create Referenced EClass</li>
    	<li>Create Sub EClass</li>
    	<li>Create Super EClass</li>    	
    	<li>Move EAttribute</li>
    	<li>Move EOperation</li>
    	<li>Pull Up EAttribute</li>
    	<li>Pull Up EOperation</li>
    	<li>Push Down EAttribute</li>
    	<li>Push Down EOperation</li>
    	<li>Remove EParameter</li>
    	<li>Remove Empty Referenced EClass</li>
    	<li>Remove Empty Sub EClass</li>
    	<li>Remove Empty Super EClass</li>
    	<li>Rename EAttribute</li>
    	<li>Rename EClass</li>
    	<li>Rename EDataType</li>
    	<li>Rename EEnumLiteral</li>
    	<li>Rename EOperation</li>
    	<li>Rename EPackage</li>
    	<li>Rename EParameter</li>
    	<li>Rename EReference</li>
	</ol>
	
	<h3>UML2EMF Refactorings</h3>
	<ol class="midlist">
    	<li>Add Parameter</li>
    	<li>Create Class with Attributes from Parameter list</li>
    	<li>Create Associated Class</li>
    	<li>Create Subclass</li>
    	<li>Create Superclass</li> 
    	<li>Extract Class</li>
    	<li>Extract Subclass</li>  
    	<li>Extract Superclass</li> 
    	<li>Inline Class</li>
    	<li>Introduce Parameter Object</li>
    	<li>Hide Attribute</li>	
    	<li>Move Attribute</li>
    	<li>Move Operation</li>
    	<li>Pull Up Attribute</li>
    	<li>Pull Up Operation</li>
    	<li>Push Down Attribute</li>
    	<li>Push Down Operation</li>
    	<li>Remove Parameter</li>
    	<li>Remove Empty Associated Class</li>
    	<li>Remove Empty Subclass</li>
    	<li>Remove Empty Superclass</li>
    	<li>Remove Isolated State</li>
    	<li>Remove Superclass</li>
    	<li>Rename Actor</li>
    	<li>Rename Attribute</li>
    	<li>Rename Class</li>
    	<li>Rename Operation</li>
    	<li>Rename State</li>
    	<li>Rename Use Case</li>
    	<li>Show Attribute</li>
	</ol>
	
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

