<?php 
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "ATL Update Sites";
	$pageKeywords	= "";
	$pageAuthor		= "William Piers";
	
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML
	
	<div id="midcolumn">
		<h1>M2M ATL Update Sites</h1>

		<div class="homeitem3col">
			<p>To install these plugins, point your Install Manager at this site.</p>

			<ul>
				<li>Help &gt; Software Updates... &gt; Available Software &gt; Add Site...
				<ul>		<li>
						Location: http://download.eclipse.org/modeling/m2m/atl/updates/releases/3.2<br/>
(or): http://download.eclipse.org/modeling/m2m/atl/updates/milestones/3.2<br/>
(or): http://download.eclipse.org/modeling/m2m/atl/updates/interim/3.2</li>
				</ul>
			</li>
		</ul>
	</div>
	
		
EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
