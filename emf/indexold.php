<?php

require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

/* redirect for emf projects */
if (isset($_GET["project"]) && isset($emf_home_redirects) && is_array($emf_home_redirects) && array_key_exists($_GET["project"],$emf_home_redirects))
{
    header("Location: " . $emf_home_redirects[$_GET["project"]]);
	/*header("Location: http://www.eclipse.org/emft/projects/?project=" . $_GET["project"]);*/
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
		<h6>Buy The Book</h6>
		
		<p align="center">
			<a href="http://www.informit.com/title/9780321331885"><img src="/modeling/emf/images/book/EMF-2nd-Ed-Cover-Small.jpg"/></a>
		</p>
		<ul>
		<li><a href="http://www.informit.com/title/9780321331885">View Details &amp; Order</a>
		<li><a href="/modeling/emf/images/book/EMF-2nd-Ed-Covers-Large.jpg">View Front &amp; Back Covers</a>
		<li><a href="http://wiki.eclipse.org/EMF_Book_Errata">View &amp; Add Errata</a>
		</ul>
	</div>


	<div class="sideitem">
		<h6>News on Twitter</h6>
		<a class="twitter-timeline" href="https://twitter.com/hashtag/eclipsemf" data-widget-id="503883842478809088">#eclipsemf Tweets</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>

	

<?php if ($isWWWserver && class_exists("Poll")) { ?>
	<div class="sideitem">
	<h6>Poll</h6>
	<?php echo $pollHTML; ?>
	</div>
<?php } ?>

	
	
	<?php
	if ($isEMFserver)
	{
		include_once($_SERVER["DOCUMENT_ROOT"] . "/$PR/build/sideitems-common.php");
	}
	?>

</div>
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
    $App->AddExtraHtmlHeader('<link type="application/rss+xml" rel="alternate" title="EMF '.$trans[$projct].' Build Feed" href="http://www.eclipse.org/modeling/download.php?file=/'.$PR.'/feeds/builds-'.$projct.'.xml"/>' . "\n");
}
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
