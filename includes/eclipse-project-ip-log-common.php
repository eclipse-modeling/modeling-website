<?php
require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
$projName = strtoupper(preg_replace("#.+/#","",$PR));
ob_start();
?>
<div id="midcolumn">

	<div class="homeitem">
		<h3>Generated IP Log</h3>
		<p>New for Ganymede, the IP log can now be generated from Bugzilla. There are two version available:</p>
		
		<ul>
			<li><a href="http://www.eclipse.org/<?php print $PR; ?>/project-info/ipquery.php">Modeling IP Log</a> (note <a href="http://www.eclipse.org/<?php print $PR; ?>/project-info/ipquery.php#Note">Data Inclusion limitations</a>)</li>
			<li><a href="http://www.eclipse.org/projects/ip_log.php?projectid=<?php print str_replace("/",".",$PR); ?>">Foundation IP Log</a> (under development -- see <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=220977">bug 220977</a>)</li>
		</ul>			
		
	</div>
	
	<div class="homeitem">
		<h3>Static IP Log(s)</h3>
		<p>Overall IP log, listing all committers and contributors. <b style='color:red'>These are most likely out of date.</b></p>
		<ul>
			<li><?php print $projName; ?> <a href="eclipse-project-ip-log.csv">IP Log</a></li>
		</ul>
		
		<?php 
		$out = "";
		$out .= " 
		<p>Individual per-component IP Logs:</p>
		
		<ul>";
		$gotOne=false;
		foreach ($projects as $name => $prefix){
			$out .= '<li>' . $name . (is_file($prefix.'/eclipse-project-ip-log.csv') ? ' <a href="'.$prefix.'/eclipse-project-ip-log.csv">IP Log</a>' : ': <i>n/a</i>') . '</li>';
			$gotOne = $gotOne || is_file($prefix.'/eclipse-project-ip-log.csv') ? true : false;	
		}
		$out .= "</ul>";
		if ($gotOne)
		{
			print $out;
		}

print "</div>\n";
print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - $projName - IP Log";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
