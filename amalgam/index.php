<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

ob_start();
?>

	<div id="midcolumn">
		<h1>Modeling Amalgamation Project</h1>
		<p>
				The Amalgamation project provides improved packaging, integration, and usability of Modeling project components. 
				The project is focused on providing a consumable and integrated Eclipse Modeling Tools package and ease the discovery of the modeling technologies 
				through specific code and examples.
		</p>
		
		<div class="homeitem" style="clear: both">
			<h3>Quick Links</h3>
				<ul class="midlist">
					<li>Amalgam <a href="http://wiki.eclipse.org/ModelingAmalgam">Wiki</a> is the main source of information about the project.</li>
					<li><a href="http://www.eclipse.org/epp/download.php">Downloads</a> page.</li>
					<li><a href="http://www.eclipse.org/projects/project-plan.php?projectid=modeling.amalgam">Project Plan</a> for the current release.</li>
					<li><a href="http://www.eclipse.org/proposals/amalgamation/">Project proposal</a></li>
		</div>
		<div class="homeitem" style="clear: both">
			<h3>Events</h3>
			<ul class="midlist">
			    <li><b>2010</b>A new team is forged  : Cedric Brun (lead), Peter Friese and Artem Tikhomirov</li>
				<li><a href="http://www.eclipsecon.org/2009/">EclipseCon 2009</a> tutorial <a href="http://www.eclipsecon.org/2009/sessions?id=443">Domain-Specific Language Development using Modeling Amalgam</a> accepted.</li>
				<li><a href="https://www.eclipsecon.org/summiteurope2008/">Eclipse Summit Europe</a> talk <a href="https://www.eclipsecon.org/submissions/ese2008/view_talk.php?id=25">Modeling Amalgam as a DSL Toolkit</a> accepted.</li>
				<li><a href="http://www.eclipseworld.net/programday3pm.html#704">Developing and Using Domain-Specific Languages</a> at <a href="http://www.eclipseworld.net/">Eclipse World 2008</a>.</li>
				<li><a href="http://www.eclipsecon.org/2008/index.php?page=sub/&id=51">Eclipse Modeling Project as a DSL Toolkit</a> at <a href="http://www.eclipsecon.org/2008/">EclipseCon 2008</a></li>
			</ul>
		</div>
		<div class="homeitem" style="clear: both">
			<h3>Packages</h3>
			<ul class="midlist">
				<li><a href="http://www.eclipse.org/epp/download.php">Eclipse Modeling Tools</a> package from the 
				<a href="http://www.eclipse.org/epp">Eclipse Packaging Project</a> is maintained by Amalgam and represents the Eclipse Modeling Platform SDK. From this package you can easily discover and install all the modeling technologies.</li>
				<!--<li><a href="http://www.eclipse.org/modeling/amalgam/downloads/">DSL Toolkit</a> is a product definition that includes tooling required for a Toolsmith to produce MDSD applications.  Currently, it includes 
				EMF, GMF, QVTO, Xpand, MWE, OCL, UML2 Tools, and Teneo components.</li>
				<li><a href="http://www.eclipse.org/modeling/amalgam/downloads/">Modeler</a> is a product definition that includes the bare essentials for diagramming in UML and BPMN.</li>
				-->
			</ul>
		</div>
		<br/>
		
		<hr class="clearer" />
		
	</div>	 
	
	<div id="rightcolumn">
		<br />
		<div class="sideitem">
		   <h6>Incubation</h6>
		   <p>Amalgam is currently in the <a href="http://www.eclipse.org/projects/dev_process/validation-phase.php">Validation (Incubation) Phase</a>.</p> 
		   <div align="center"><a href="http://www.eclipse.org/projects/what-is-incubation.php"><img 
		        align="center" src="http://www.eclipse.org/images/egg-incubation.png" border="0"/></a>
		   </div>
		</div>
		
		<div class="sideitem">
			<h6>DSL Toolkit Book</h6>
			
			<p align="center">
				<a href="http://www.informit.com/store/product.aspx?isbn=0321580540"><img src="http://www.informit.com/ShowCover.aspx?isbn=0321580540&type=f"/></a>
			</p>
		</div>
		   
		<div class="sideitem">
			<h6>Getting started</h6>
			<ul>				
				<li><a href="http://wiki.eclipse.org/ModelingAmalgam">Amalgam Wiki</a></li>
			</ul>
		</div>
		
		<div class="sideitem">
			<h6>What's New</h6>
			<ul> 
			<li> <tt>03/2010</tt> a  new media to <a href="http://model-driven-blogging.blogspot.com/2010/03/eclipse-amalgamation-20.html">discover and install modeling components </a></li>
			<li> <tt>10/2009</tt> a new team is forged</li>
			</ul>
		</div>
	</div>


<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Modeling Amalgamation Project";
$pageKeywords = "eclipse,project,graphical,modeling,model-driven";
$pageAuthor = "Richard C. Gronback, Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="http://www.eclipse.org/modeling/includes/index.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
