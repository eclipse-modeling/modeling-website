<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
$App= new App();
$Nav= new Nav();
$Menu= new Menu();
include ($App->getProjectCommon());
function update_manager($shortname, $longname, $extra_PRS = array (), $isIncubating = false, $replace = false, $siteXMLs = array("Releases (R)" => "releases/", "Milestones &amp; RCs (S)" => "milestones/", "Interim Builds (I &amp; M)" => "interim/"))
{
	global $App, $Nav, $Menu, $theme, $PR;
	$PRS = array (
		$shortname => $PR,

	);
	$PRS = $replace ? $extra_PRS : array_merge($PRS, $extra_PRS);

	ob_start();
?>
	<div id="midcolumn">
		<h1><?php print $shortname; ?> Update Sites</h1>

<?php

	if (function_exists("doRequirements"))
	{
		call_user_func("doRequirements");
	}

	if (function_exists("notes"))
	{
		notes();
	}
?>
	<div class="homeitem3col">
		<h3>Using Eclipse 3.4M6+ (p2 Install Manager)</h3>
		<p>To install these plugins, point your Install Manager at this site. 
		<!-- For more on how to do this, <a href="http://www.eclipse.org/modeling/emf/docs/misc/UsingUpdateManager/UsingUpdateManager.html">click here</a>. --> 
		</p>

		<ul>
			<li>Help &gt; Software Updates... &gt; Available Software &gt; Add Site...
			<ul><?php
	foreach ($PRS as $label => $thisPR)
	{
		print <<<EOHTML
				<li>
											
EOHTML;
		$cnt=0;
		foreach ($siteXMLs as $type => $sitexml)
		{
			print !$cnt ? "Location: " : "&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;(or): ";
			print "<b><a href=\"http://download.eclipse.org/$thisPR/updates/$sitexml\">http://download.eclipse.org/$thisPR/updates/<acronym title=\"$type\">$sitexml</acronym></a></b></acronym>";
			print $cnt < sizeof($siteXMLs) - 1 ? "<br/>\n" : "";
			$cnt++;
		}
		print "			</li>\n";
	} ?>
				</ul>
			</li>
		</ul>
	</div>

	<div class="homeitem3col">
		<h3>Using Eclipse 3.4M5 (Update Manager)</h3>
		<p>To install these plugins, point your Update Manager at this site. For more on how to do this, <a href="http://www.eclipse.org/modeling/emf/docs/misc/UsingUpdateManager/UsingUpdateManager.html">click here</a>. </p>

		<ul>
			<li>Help &gt; Software Updates &gt; Find and Install... &gt; Search for new features to install
										<ul>
										<?php

	foreach ($PRS as $label => $thisPR)
	{
		print <<<EOHTML
											<li>
											Add Update Site...<br/>
											* Name: <b>$label Update Site</b><br/>
EOHTML;
		$cnt=0;
		foreach ($siteXMLs as $type => $sitexml)
		{
			print !$cnt ? "* URL: " : "&#160;&#160;&#160;&#160;&#160;(or): ";
			print "<b><a href=\"http://download.eclipse.org/$thisPR/updates/$sitexml\">http://download.eclipse.org/$thisPR/updates/<acronym title=\"$type\">$sitexml</acronym></a></b>";
			print $cnt < sizeof($siteXMLs) - 1 ? "<br/>\n" : "";
			$cnt++;
		}
		print "</li>\n";
	}
?>
										</ul>
			</li>
		</ul>
	</div>
	</div>
	<?php

	print "<div id=\"rightcolumn\">\n";

	if (isset($isIncubating) && $isIncubating)
	{
	print '
		<div class="sideitem">
		   <h6>Incubation</h6>
		   <p>Some components are currently in their <a href="http://www.eclipse.org/projects/dev_process/validation-phase.php">Validation (Incubation) Phase</a>.</p>
		   <div align="center"><a href="http://www.eclipse.org/projects/what-is-incubation.php"><img
		        align="center" src="http://www.eclipse.org/images/egg-incubation.png"
		        border="0" /></a></div>
		</div>
		';
	}

	$extras= array (
		"doBleedingEdge", "sidebar"
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
	$pageTitle= "$longname - $shortname - Updates";
	$pageKeywords= ""; // TODO: add something here
	$pageAuthor= "Neil Skrypuch, Nick Boldt";
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
	$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
}

// deprecated URLs
function update_manager_old($shortname, $longname, $extra_PRS = array (), $isIncubating = false, $replace = false, $siteXMLs = array("Releases" => "site.xml","I, M, and S Builds" => "site-interim.xml"))
{
	return update_manager($shortname, $longname, $extra_PRS, $isIncubating, $replace, $siteXMLs);
}

?>
