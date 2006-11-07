<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

function update_manager($shortname, $longname)
{
	global $App, $Nav, $Menu, $theme, $PR;

	ob_start();
	?>
	<div id="midcolumn">
		<h1><?php print $shortname; ?> Update Manager Site</h1>
		<p>To install these plugins, point your Eclipse Update Manager at this site. For more on how to do this, <a href="http://www.eclipse.org/emf/docs.php?doc=docs/UsingUpdateManager/UsingUpdateManager.html">click here</a>. <a href="http://www.eclipse.org/downloads/download.php?file=/<?php print $PR; ?>/updates/site.xml&amp;format=xml">Mirrors available</a>.
		</p>
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
											<li>
											Add Update Site...<br/>
											* Name: <b><?php print $shortname; ?> Update Manager Site</b><br/>
											* URL: <b><a href="http://download.eclipse.org/<?php print $PR; ?>/updates/site.xml" target="_um">http://download.eclipse.org/<?php print $PR; ?>/updates/site.xml</a></b> (Releases)<br/>
											(or): <b><a href="http://download.eclipse.org/<?php print $PR; ?>/updates/site-interim.xml" target="_um">http://download.eclipse.org/<?php print $PR; ?>/updates/site-interim.xml</a></b> (I, M and S Builds)
											</li>
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
	<?php
	$html = ob_get_contents();
	ob_end_clean();

	$pageTitle = "$longname - $shortname - Update Manager";
	$pageKeywords = ""; // TODO: add something here
	$pageAuthor = "Neil Skrypuch";

	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
}
?>
