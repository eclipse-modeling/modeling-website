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
				The Amalgamation project provides product-based <a href="http://www.eclipse.org/modeling/amalgam/downloads/">downloads</a>.  A p2 repository is produced for each 
				build and is accessible from the build's download page.  
				<br/><br/>
				For example, enter the following URL for DSL Toolkit build I20081215-1608 to install any of its features or bundles: <a href="http://download.eclipse.org/modeling/amalgam/dsltk/downloads/drops/I20081215-1608/">http://download.eclipse.org/modeling/amalgam/dsltk/downloads/drops/I20081215-1608/</a>
				</td>
			</tr>
		</table><hr/>
		
		
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
		   
	</div>
	
</div>

<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Modeling Amalgamation Project";
$pageKeywords = "eclipse,modeling,model-driven";
$pageAuthor = "Richard C. Gronback";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="http://www.eclipse.org/modeling/includes/index.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
