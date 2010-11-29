<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "M2M ATL Update Sites";
	$pageKeywords	= "";
	$pageAuthor		= "William Piers";
	
	# End: page-specific settings
	#

	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML

<div id="midcolumn">
<h1>M2M ATL Update Sites</h1>

		<div class="homeitem3col">
			<p>To install these plugins, point your Install Manager at this site.</p>

			<ul>
				<li>Help &gt; Software Updates... &gt; Available Software &gt; Add Site...
				<ul>		<li>
						Location: <b>http://download.eclipse.org/modeling/m2m/atl/updates/releases/3.2</b><br/>
(or): <b>http://download.eclipse.org/modeling/m2m/atl/updates/milestones/3.2</b><br/>
(or): <b>http://download.eclipse.org/modeling/m2m/atl/updates/interim/3.2</b></li>
				</ul>
			</li>
		</ul>
			</div>
</div>

EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>