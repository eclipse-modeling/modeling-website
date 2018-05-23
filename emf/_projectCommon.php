<?php
$Nav->setLinkList(null);

$PR = "modeling/emf";
$projectName = "EMF";
$defaultProj = "/emf";

$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"])) || (preg_match("/^(emft|modeling)\.eclipse\.org$/", $_SERVER["SERVER_NAME"]));
$isBuildServer = (preg_match("/^(emft|modeling|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"])) || $isEMFserver;
$isBuildDotEclipseServer = $_SERVER["SERVER_NAME"] == "build.eclipse.org";
$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$isEclipseCluster = (preg_match("/^(?:www.||download.|download1.|build.)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$debug = (isset ($_GET["debug"]) && preg_match("/^\d+$/", $_GET["debug"]) ? $_GET["debug"] : -1);
$writableRoot = ($isBuildServer ? $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/" : "/home/data/httpd/writable/www.eclipse.org/");
$writableBuildRoot = $isBuildDotEclipseServer ? "/opt/public/modeling" : "/home/www-data";

$rooturl = "http://" . $_SERVER["HTTP_HOST"] . "/$PR";
$downurl = ($isBuildServer ? "" : "http://www.eclipse.org");
$bugurl = "https://bugs.eclipse.org";

if (isset ($_GET["skin"]) && preg_match("/^(Blue|EclipseStandard|Industrial|Lazarus|Miasma|Modern|OldStyle|Phoenix|PhoenixTest|PlainText|Nova)$/", $_GET["skin"], $regs))
{
	$theme = $regs[1];
}
else
{
	$theme = "solstice";
}

/* projects/components in cvs */
/* "proj" => "cvsname" */
$cvsprojs = array (); /* should always be empty */

/* sub-projects/components in cvs for projects/components above (if any) */
/* "cvsname" => array("shortname" => "cvsname") */
$cvscoms = array(
	"org.eclipse.emf" => array (
		"emf" => "org.eclipse.emf",

		"cdo" => "org.eclipse.emf.cdo",
		"compare" => "org.eclipse.emf.compare",
		"query" => "org.eclipse.emf.query",
		"query2" => "org.eclipse.emf.query",
		"transaction" => "org.eclipse.emf.transaction",
		"emfqtv" => "org.eclipse.emf.emfqtv",
		"net4j" => "org.eclipse.emf.net4j",
		"sdo" => "org.eclipse.emf.ecore.sdo",
		"teneo" => "org.eclipse.emf.teneo",
		"validation" => "org.eclipse.emf.validation",

	)
);

$projects = array(
	"EMF (Core)" => "emf",
	"Model Query" => "query",
	"Model Query 2" => "query2",
	"Model Transaction" => "transaction",
	"Validation Framework" => "validation",
);

/* if set, both home and download page will redirect to a different landing page */
$emf_download_redirects = array("teneo" => "http://wiki.eclipse.org/Teneo/Hibernate/Download_and_Install", 
	"cdo" => "http://www.eclipse.org/cdo/downloads/",
	"compare" => "http://www.eclipse.org/emf/compare/downloads/");
$emf_home_redirects = array("teneo" => "http://wiki.eclipse.org/Teneo",
	"cdo" => "http://www.eclipse.org/cdo/",
	"compare" => "http://www.eclipse.org/emf/compare");

$extraprojects = array("QTV All-In-One" => "emfqtv"); //components with only downloads, no info yet, "prettyname" => "directory"
$nodownloads =   array("emfqtv"); //components with only information, no downloads, or no builds available yet, "projectkey"
$nonewsgroup =   array("query","query2","transaction","validation","emfqtv", "net4j","teneo","cdo","compare", "sdo"); //components without newsgroup
$nomailinglist = array("query","query2","transaction","validation","emfqtv", "net4j","teneo","cdo", "compare", "sdo"); //components without mailinglist
$incubating =    array("query2"); // components which are incubating - EMF will never have incubating components -- see EMFT
$nomenclature = "Component"; //are we dealing with "components" or "projects"?

include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/scripts.php";

$regs = null;
$proj = (isset($_GET["project"]) && preg_match("/^(" . join("|", $projects) . ")$/", $_GET["project"], $regs) ? $regs[1] : getProjectFromPath($PR));
$projct= preg_replace("#^/#", "", $proj);

$buildtypes = array(
	"R" => "Release",
	"S" => "Stable",
	"I" => "Integration",
	"M" => "Maintenance",
	"N" => "Nightly"
);











$Nav->addNavSeparator("Home", "/modeling/emf");
$Nav->addNavSeparator("Getting started", "/modeling/emf/gettingstarted.php");
$Nav->addNavSeparator("Documentation", "$rooturl/docs/");
$Nav->addCustomNav("Tutorials and Articles", "$rooturl/docs/", "_self", 2);
$Nav->addCustomNav("Javadoc", "$downurl/$PR/javadoc", "_self", 2);

$Nav->addNavSeparator("Downloads", "http:/download.eclipse.org/modeling/emf/emf/builds/index.html");
$Nav->addCustomNav("Core", "http:/download.eclipse.org/modeling/emf/emf/builds/index.html", "_self", 2);
$Nav->addCustomNav("Query", "/modeling/emf/downloads/index.php?project=query", "_self", 2);
$Nav->addCustomNav("Transaction", "/modeling/emf/downloads/index.php?project=transaction", "_self", 2);
$Nav->addCustomNav("Validation", "/modeling/emf/downloads/index.php?project=validation", "_self", 2);

$Nav->addNavSeparator("Support", "/modeling/support.php");

$Nav->addNavSeparator("Community", "http://wiki.eclipse.org/Modeling_Corner");

$Nav->addCustomNav("Newsgroups", "$rooturl/newsgroup-mailing-list.php", "_self", 2);
$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=" . $projectName . (isset ($bugcoms[$proj]) ? "&amp;component=$bugcoms[$proj]" : ""), "_self", 2);

$Nav->addCustomNav("About This Project", "/projects/project_summary.php?projectid=emf");

$App->AddExtraHtmlHeader('<meta name="twitter:dnt" content="on">');

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/common.css\"/>\n");

$App->AddExtraHtmlHeader('<script src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>');
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
