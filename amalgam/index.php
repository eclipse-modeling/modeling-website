<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

ob_start();
?>

	<div id="midcolumn">
		<table width="100%">
		<tr><td>&nbsp;</td></tr>
			<tr>
				<td align="top">
				The Amalgamation project provides improved packaging, integration, and usability of Modeling project components. See
				the project <a href="http://www.eclipse.org/proposals/amalgamation/">proposal</a> for more detail until this website becomes fully operational.
				</td>
			</tr>
		</table><hr/>
		
		<div class="homeitem">
			<h3>Quick Links</h3>
				<ul class="midlist">
					<li><a href="http://www.eclipse.org/proposals/amalgamation/">Project proposal</a></li>
		</div>
		<div class="homeitem">
			<h3>Events</h3>
			<ul class="midlist">
				<li><a href="https://www.eclipsecon.org/summiteurope2008/">Eclipse Summit Europe</a> talk <a href="https://www.eclipsecon.org/submissions/ese2008/view_talk.php?id=25">Modeling Amalgam as a DSL Toolkit</a> accepted.</li>
				<li><a href="http://www.eclipseworld.net/programday3pm.html#704">Developing and Using Domain-Specific Languages</> at <a href="http://www.eclipseworld.net/">Eclipse World 2008</a>.</li>
				<li><a href="http://www.eclipsecon.org/2008/index.php?page=sub/&id=51">Eclipse Modeling Project as a DSL Toolkit</a> at <a href="http://www.eclipsecon.org/2008/">EclipseCon 2008</a></li>
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
			<h6>Getting started</h6>
			<ul>				
				<li>Coming</li>
			</ul>
		</div>
		
		<div class="sideitem">
			<h6>What's New</h6>
			<ul> 
				<li>Book draft <a href="http://my.safaribooksonline.com/9780321591364">Eclipse Modeling Project: A Domain-Specific Language Toolkit</a> available on Safari rough cuts.
				<li>Amalgam DSL Toolkit and Modeler <a href="http://www.eclipse.org/modeling/amalgam/downloads/">downloads</a> available</li>
			    <li>January 30, 2008 - Amalgamation project <a href="http://www.eclipse.org/proposals/amalgamation/">created</a></li>
			</ul>
		</div>
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
