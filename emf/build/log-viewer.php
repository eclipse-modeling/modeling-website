<?php 

/* Override default settings for EMF because it's non-standard and supports other params, like ?jdk50test= */
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App= new App(); $Nav= new Nav(); $Menu= new Menu(); include_once ($App->getprojectCommon());
internalUseOnly();
if (is_array($projects))
{
	$projectArray= getProjectArray($projects, $extraprojects, $nodownloads, $PR);
	$tmp= array_keys($projectArray);
	$proj= "/" . (isset ($_GET["project"]) && preg_match("/^(?:" . join("|", $projects) . ")$/", $_GET["project"]) ? $_GET["project"] : $projectArray[$tmp[0]]);
}
else
{
	$proj= "";
}
$projct= preg_replace("#^/#", "", $proj);

print "/$PR/${projct}/downloads";

/* from $_GET */
$params = array(
	"build" => "#^\d+\.\d+\.\d+/[IMNRS]\d{12}/$#",
	"test" => "#^\d+\.\d+\.\d+/[IMNRS]\d{12}/\d{12}/$#",
	"jdk13test" => "#^\d+\.\d+\.\d+/[IMNRS]\d{12}/\d{12}/$#",
	"jdk14test" => "#^\d+\.\d+\.\d+/[IMNRS]\d{12}/\d{12}/$#",
	"jdk50test" => "#^\d+\.\d+\.\d+/[IMNRS]\d{12}/\d{12}/$#"
);

/* check these files, %s replaced with param from above */
$files = array(
	"build" => array($_SERVER['DOCUMENT_ROOT'] . "/$PR/${projct}/downloads/drops/%sbuildlog.txt"),
	"test" => array($_SERVER['DOCUMENT_ROOT'] . "/$PR/${projct}/oldtests/%stestlog.txt"),
	"jdk13test" => array($_SERVER['DOCUMENT_ROOT'] . "/$PR/${projct}/jdk13tests/%stestlog.txt"),
	"jdk14test" => array($_SERVER['DOCUMENT_ROOT'] . "/$PR/${projct}/jdk14tests/%stestlog.txt"),
	"jdk50test" => array($_SERVER['DOCUMENT_ROOT'] . "/$PR/${projct}/jdk50tests/%stestlog.txt")
);

/* replace these values with key */
$reps = array(
	"o.e.$projct" => "org.eclipse.$projct",
	"o.e.e.$projct" => "org.eclipse.emf.$projct",
	"o.e.mdt" => "org.eclipse.mdt",
	"o.e.e.r.build" => "org.eclipse.$projct.releng.build",
	"o.e.m.c.r" => "org.eclipse.modeling.common.releng",
	"o.e.r" => "org.eclipse.releng",
	"dd" => "/home/www-data/build/$PR/${projct}/downloads/drops",
	"dte" => "download.eclipse.org/technology",
	"dto" => "download.eclipse.org/tools",
	"dm" => "download.eclipse.org/modeling",
	"tests" => "/home/www-data/oldtests", // new path
	"jdk13tests" => "/home/www-data/jdk13tests",
	"jdk14tests" => "/home/www-data/jdk14tests",
	"jdk50tests" => "/home/www-data/jdk50tests"
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/build/log-viewer-common.php");

?>
