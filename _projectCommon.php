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
$Nav->addCustomNav("Web Modeling", "/modeling/web.php", "_self", 3);
$Nav->addCustomNav("More...", "/modeling/more.php", "_self", 3);



$Nav->addNavSeparator("Downloads");
$Nav->addCustomNav("Eclipse Modeling Tools", "http://eclipse.org/downloads/packages/eclipse-modeling-tools/lunar", "_self", 2);



$Nav->addNavSeparator("Support", "/modeling/support.php");

$Nav->addNavSeparator("Community", "/modeling/");




$Nav->addCustomNav("Newsgroups", "http://www.eclipse.org/newsgroups/index_project.php", "_self", 2);
$Nav->addCustomNav("Mailing Lists", "http://www.eclipse.org/mail/index_project.php", "_self", 2);





$App->AddExtraHtmlHeader('<meta name="twitter:dnt" content="on">');
$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/common.css\"/>\n");
$App->AddExtraHtmlHeader("<script src = 'https://code.jquery.com/jquery-1.9.0.min.js' type='text/javascript'></script>");

$App->AddExtraHtmlHeader('<script>
// via https://stackoverflow.com/questions/5968196/check-cookie-if-cookie-exists
function getCookie(name) {
var dc = document.cookie;
var prefix = name + "=";
var begin = dc.indexOf("; " + prefix);
if (begin === -1) {
  begin = dc.indexOf(prefix);
  if (begin !== 0) return null;
} else {
  begin += 2;
  var end = document.cookie.indexOf(";", begin);
  if (end === -1) {
    end = dc.length;
  }
}

return decodeURI(dc.substring(begin + prefix.length, end));
}

function createTimeline() {
	$.getScript(
          "https://platform.twitter.com/widgets.js",
          function () { createWidget() }
        );
}


function createWidget() {
var twitterContainer = document.getElementById("twitter-timeline");
twttr.widgets.createTimeline(
  "503883842478809088",
  twitterContainer,
  {
    height: 400
  }
);
twitterContainer.innerText = "";
}


</script>');




addGoogleAnalyticsTrackingCodeToHeader();
$App->Promotion = TRUE; # set true to enable current eclipse.org site-wide promo
?>
