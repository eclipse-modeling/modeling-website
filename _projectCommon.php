<?php

$PR = "modeling";

$isBuildServer = (preg_match("/^(emft|modeling|build)\.eclipse\.org$|^localhost$/", $_SERVER["SERVER_NAME"]));
$isBuildDotEclipseServer = $_SERVER["SERVER_NAME"] == "build.eclipse.org";
$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$isEclipseCluster = (preg_match("/^(?:www.||download.|download1.|build.)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$writableBuildRoot = $isBuildDotEclipseServer ? "/opt/public/modeling" : "/home/www-data";

if (isset ($_GET["skin"]) && preg_match("/^(Blue|EclipseStandard|Industrial|Lazarus|Miasma|Modern|OldStyle|Phoenix|PhoenixTest|PlainText|Nova)$/", $_GET["skin"], $regs))
{
	$theme = $regs[1];
}
else
{
	$theme = "solstice";
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/scripts.php";

$Nav->setLinkList(null);


$Nav->addNavSeparator("Technologies", "/modeling/");
$Nav->addCustomNav("EMF (Core)", "/modeling/emf/");
$Nav->addCustomNav("Server and Storage", "/modeling/server.php", "_self", 3);
$Nav->addCustomNav("User Interface", "/modeling/ui.php", "_self", 3);
$Nav->addCustomNav("Graphical Modeling", "/modeling/graphical.php", "_self", 3);
$Nav->addCustomNav("Modeling Tools", "/modeling/tools.php", "_self", 3);
$Nav->addCustomNav("Transformation", "/modeling/transformation.php", "_self", 3);
$Nav->addCustomNav("Textual Modeling", "/modeling/textual.php", "_self", 3);
$Nav->addCustomNav("More...", "/modeling/more.php", "_self", 3);



$Nav->addNavSeparator("Downloads");
$Nav->addCustomNav("Eclipse Modeling Tools", "http://eclipse.org/downloads/packages/eclipse-modeling-tools/lunar", "_self", 2);



$Nav->addNavSeparator("Support", "/modeling/support.php");

$Nav->addNavSeparator("Community", "/modeling/");




$Nav->addCustomNav("Newsgroups", "http://www.eclipse.org/newsgroups/index_project.php", "_self", 2);
$Nav->addCustomNav("Mailing Lists", "http://www.eclipse.org/mail/index_project.php", "_self", 2);






$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/common.css\"/>\n");
$App->AddExtraHtmlHeader("
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55011482-1', 'auto');
  ga('send', 'pageview');

</script>");




addGoogleAnalyticsTrackingCodeToHeader();
$App->Promotion = TRUE; # set true to enable current eclipse.org site-wide promo
?>
