<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
$App= new App();
$Nav= new Nav();
$Menu= new Menu();
include ($App->getProjectCommon());
function update_manager($shortname, $longname, $extra_PRS= array ())
{
	global $App, $Nav, $Menu, $theme, $PR;
	$PRS= array (
		$shortname => $PR,
		
	);
	$PRS= array_merge($PRS, $extra_PRS);
	ob_start();
?>
	<div id="midcolumn">
		<h1><?php print $shortname; ?> Update Manager Site</h1>

<?php

	if (function_exists("doRequirements"))
	{
		call_user_func("doRequirements");
	}
?>
		<div class="homeitem3col">
			<h3>Using Update Manager</h3>
			<p>To install these plugins, point your Eclipse Update Manager at this site. For more on how to do this, <a href="http://www.eclipse.org/modeling/emf/docs/misc/UsingUpdateManager/UsingUpdateManager.html">click here</a>. <a href="http://www.eclipse.org/downloads/download.php?file=/<?php print $PR; ?>/updates/site.xml&amp;format=xml">Mirrors</a> <a href="http://www.eclipse.org/downloads/download.php?file=/<?php print $PR; ?>/updates/site-interim.xml&amp;format=xml">available</a>.</p>
		
		<?php

	if (function_exists("notes"))
	{
		notes();
	}
?>
		
		<ul>
			<li>
				Help
				<ul>
					<li>
						Software Updates
						<ul>
							<li>
								Find and Install...
								<ul>
									<li>
										Search for new features to install
										<ul>
										<?php

	foreach ($PRS as $label => $thisPR)
	{
?> 
											<li>
											Add Update Site...<br/>
											* Name: <b><?php print $label; ?> Update Manager Site</b><br/>
											* URL: <b><a href="http://download.eclipse.org/<?php print $thisPR; ?>/updates/site.xml" target="_um">http://download.eclipse.org/<?php print $thisPR; ?>/updates/site.xml</a></b> (Releases)<br/>
											&#160;&#160;&#160;&#160;(or): <b><a href="http://download.eclipse.org/<?php print $thisPR; ?>/updates/site-interim.xml" target="_um">http://download.eclipse.org/<?php print $thisPR; ?>/updates/site-interim.xml</a></b> (I, M and S Builds)
											</li>
										<?php

	}
?>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	</div>
	<?php

	print "<div id=\"rightcolumn\">\n";
	$extras= array (
		"doBleedingEdge"
	);
	foreach ($extras as $z)
	{
		if (function_exists($z))
		{
			call_user_func($z);
		}
	}
	print "</div>\n";
	$html= ob_get_contents();
	ob_end_clean();
	$pageTitle= "$longname - $shortname - Update Manager";
	$pageKeywords= ""; // TODO: add something here
	$pageAuthor= "Neil Skrypuch, Nick Boldt";
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
	$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
}
?>
