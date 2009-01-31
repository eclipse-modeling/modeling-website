<?php
	
require_once ("../../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");  $App = new App(); 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  $Nav = new Nav();
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");  $Menu = new Menu(); 

$Nav->setLinkList(null);
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/CDO", "", 1);

ob_start();
?>

<div id="midcolumn">
	<h1>CDO Model Repository</h1>
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
	
</div>
<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - EMF - CDO Model Repository";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Eike Stepper";

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/index.css\"/>\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
