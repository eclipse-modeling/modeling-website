<?php

require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

/* temporary redirect for emft projects */
if (isset($_GET["project"]) && isset($emft_redirects) && is_array($emft_redirects) && in_array($_GET["project"],$emft_redirects))
{
	header("Location: http://www.eclipse.org/emft/projects/?project=" . $_GET["project"]);
	exit;
}

include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

/*if ($isWWWserver && class_exists("Poll"))
{
	# Enable polls on this page: Polls are good for 3 months!
	$App->usePolls();

	$Poll = new Poll(1, "What do you think of our new look?");
	$Poll->addOption(1, "Phoen-tast-ix!");
	$Poll->addOption(2, "Easier to use");
	$Poll->addOption(3, "Too purple!");
	$Poll->addOption(4, "Meh.");
	# $Poll->noGraph();  # uncomment to disable bar graph
	$pollHTML = $Poll->getHTML();
} */   

ob_start();
?>

<div id="midcolumn">
	<h1>Eclipse Modeling Framework Project (EMF)</h1>
	<img style="float:right" src="/modeling/emf/images/emf_logo.png" alt=""/>
	<?php
	include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/index-common.php");
	?>
</div>

<div id="rightcolumn">
	<div class="sideitem">
		<h6>News</h6>
		<?php getNews(4, "whatsnew"); ?>
		<ul>
			<li><a href="/<?php print $PR; ?>/news-whatsnew.php">Older news</a></li>
		</ul>
	</div>

	<div class="sideitem">
		<h6><a href="/modeling/emf/feeds/"><img style="float:right" alt="Build Feeds" src="/modeling/images/rss-atom10.gif"/></a>
		<?php echo $tmp && array_key_exists($proj,$tmp) && $tmp[$proj] ? $tmp[$proj] . " " : ""; ?>Build News</h6>
		<?php /* suppress SDO events */
			  build_news(array_diff($cvsprojs,array("org.eclipse.emf.ecore.sdo")), $cvscoms, $projct); ?>
		<ul>
			<li><a href="/<?php print $PR; ?>/news-whatsnew.php#build">Other build news</a></li>
		</ul>
	</div>

<?php if ($isWWWserver && class_exists("Poll")) { ?>
	<div class="sideitem">
	<h6>Poll</h6>
	<?php echo $pollHTML; ?>
	</div>
<?php } ?>

	<div class="sideitem">
		<h6>Modeling Corner</h6>
		<p>Want to <a href="http://wiki.eclipse.org/index.php/Modeling_Corner">contribute</a> models, projects, files, ideas, utilities, or code to 
		<a href="http://www.eclipse.org/modeling/emf/">EMF</a> or any other part of the <a href="http://www.eclipse.org/modeling/">Modeling Project</a>? 
		Now you can!</p>
		<p>Have a look, post your comments, submit a link, or just read what others have written. <a href="http://wiki.eclipse.org/index.php/Modeling_Corner">Details here</a>.</p>
	</div>

	<div class="sideitem">
		<h6>Plans</h6>
		<ul>
			<!-- <li><a href="http://wiki.eclipse.org/index.php/Callisto_Coordinated_Maintenance">Callisto 3.2.x Maintenance</a></li> -->
			<li><a href="http://wiki.eclipse.org/index.php/Europa_Simultaneous_Release">Europa 3.3 Plan</a></li>
			<li><a href="http://www.eclipse.org/eclipse/development/eclipse_project_plan_3_3.html">Eclipse 3.3 Plan</a></li>
			<li><a href="http://www.eclipse.org/modeling/emf/docs/dev-plans/emf_project_plan_2.3.html">EMF 2.3 Plan</a></li>
		</ul>
	</div>

	<a name="related"></a>
	<div class="sideitem">
		<h6>Related links</h6>
		<ul>
			<li><a href="http://www.eclipse.org/modeling">Eclipse Modeling</a></li>
			<li>Web: <a href="http://www.eclipse.org/emft/">EMFT</a>, 
			<a href="http://www.eclipse.org/modeling/mdt/">MDT</a>, 
			<a href="http://www.eclipse.org/modeling/m2t/">M2T</a></li>
			<li>Wiki: <a href="http://wiki.eclipse.org/index.php/Category:EMFT">EMFT</a>, 
			<a href="http://wiki.eclipse.org/index.php/Category:MDT">MDT</a>, 
			<a href="http://wiki.eclipse.org/index.php/Category:M2T">M2T</a></li>
			<li><a href="http://www.eclipse.org/modeling/emf/docs/misc/UsingUpdateManager/UsingUpdateManager.html">Using Update Manager</a></li>
			<li><a href="http://www.eclipse.org/newsgroups">Eclipse newsgroups</a></li>
		</ul>
	</div>
	
	<?php
	if ($isEMFserver)
	{
		include_once($_SERVER["DOCUMENT_ROOT"] . "/$PR/build/sideitems-common.php");
	}
	?>

</div>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-2566337-6";
urchinTracker();
</script>

<?php
$html = ob_get_contents();
ob_end_clean();

$trans = array_flip($projects);
$pageTitle = "Eclipse Modeling - EMF - Home";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/index.css\"/>\n");
if ($projct) 
{
    $App->AddExtraHtmlHeader('<link type="application/rss+xml" rel="alternate" title="EMF '.$trans[$projct].' Build Feed" href="http://www.eclipse.org/downloads/download.php?file=/'.$PR.'/feeds/builds-'.$projct.'.xml"/>' . "\n");
}
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
