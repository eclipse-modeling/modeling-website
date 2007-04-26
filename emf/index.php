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

foreach ($projects as $z)
{
	$descriptions[$z]["short"] = file_contents("$z/project-info/project-page-paragraph.html");
	$descriptions[$z]["long"] = file_contents("$z/project-info/overview.html");
}
?>

<div id="midcolumn">
	<h1>Eclipse Modeling Framework Project (EMF)</h1>
	<img style="float:right" src="/modeling/emf/images/emf_logo.png" border=""/>
<?php
	$files = array(
		"project-info/project-page-paragraph.html",
		"project-info/overview.html"
	);

	foreach ($files as $z)
	{
		if (file_exists($z))
		{
			include($z);
		}
		else
		{
			print "<p>No $z found!.</p>";
		}
	}

	$tmp = array_flip($projects); // pop $proj to first position, reverse name/values so that we can have two projects w/ the same vanity name
	$homepageProjects = $proj ? array("selected" => $tmp[$proj]) : array("selected" => "none"); 
	foreach ($projects as $label => $z) 
	{
		$homepageProjects[$z] = $label;
	} 
	$cnt = 0;
	foreach ($homepageProjects as $y => $z) 
	{
		if ($z == "none") {
			$cnt++;
		}
		else
		{
			if ( (is_dir("../".$projects[$z]) || is_dir($projects[$z])) && !in_array($projects[$z],$extraprojects))
			{
				print "<div class=\"homeitem".($y == "selected" ? "3col" : "")."\">\n";
				print "<a name=\"$projects[$z]\"></a>\n";
				print "<h3>";
				print "$z</h3>\n";
				print $descriptions[$projects[$z]][($y == "selected" ? "long" : "short")];
				print "<ul class=\"extras\">";
				if (!isset($hasmoved) || !array_key_exists($y,$hasmoved))
				{
					if ($y != "selected" && $y != $proj)
					{
						print "<li><a href=\"?project=$projects[$z]#$projects[$z]\">More...</a></li>\n";
					}
					$pz = $projects[$z] == "sdo" ? "emf" : $projects[$z]; /* special case */
					print "<li><a href=\"/$PR/downloads/?project=$pz\">Downloads</a></li>\n";
				}
				print "</ul>\n";
				print "</div>\n";
				$cnt++;
			}
			if ($cnt % 2){
				print "<div class=\"homeitem3col\" style=\"border: 0px\"></div>\n"; // "line breaks" to keep columns 2x2
			}
		} 
	}
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
		<?php build_news($cvsprojs, $cvscoms, $projct); ?>
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
			<li>Web: <a href="http://www.eclipse.org/modeling/mdt/">MDT</a>, <a href="http://www.eclipse.org/modeling/mdt/?project=uml2#uml2">UML2</a>, <a href="http://www.eclipse.org/emft">EMFT</a></li>
			<li>Wiki: <a href="http://wiki.eclipse.org/index.php/Category:MDT">MDT</a>, <a href="http://wiki.eclipse.org/index.php/MDT-UML2-UML">UML2</a>, <a href="http://wiki.eclipse.org/index.php/EMFT">EMFT</a></li>
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
<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - " . strtoupper($projct) . " Home";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/index.css\"/>\n");
$trans = array_flip($projects);
$App->AddExtraHtmlHeader('<link type="application/rss+xml" rel="alternate" title="EMF '.$trans[$projct].' Build Feed" href="http://www.eclipse.org/downloads/download.php?file=/'.$PR.'/feeds/builds-'.$projct.'.xml"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
