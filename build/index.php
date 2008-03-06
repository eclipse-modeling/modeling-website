<?php // all builds aggregated in one view, with links and dates of updates to map files

require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
$hadLoadDirSimpleError = 1; //have we echoed the loadDirSimple() error msg yet? if 1, omit error; if 0, echo at most 1 error
require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/downloads-scripts.php");
$pageTitle = "Eclipse Modeling Builds";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Nick Boldt";
$theme = "Phoenix";

ob_start();

print "<div id=\"midcolumn\">\n";
$sortBy =  "";
if (isset($_GET["sortBy"]) && preg_match("#version#", $_GET["sortBy"], $m))
{
	$sortBy = $m[0];
}

print "<h1>$pageTitle</h1>";

// get builds in /home/www-data/build/
$buildDir = "/home/www-data/build";
$dirs = array_flatten_values(findDir($buildDir, "drops"));
# reorder
foreach ($dirs as $dir)
{
	preg_match("#.+/([^/]+)/([^/]+)/downloads/drops/(\d+\.\d+\.\d+)#", $dir, $m);
	if ($m[2] != "xsd")
	{
		$dirsSorted[$m[3] . ":" . $m[1] . ":" . $m[2]] = $dir;
	}
}
$dirs = $dirsSorted; krsort($dirs); reset($dirs); #print "<pre>"; print_r($dirs); print "</pre>"; 
$mapLinks = array();
$latestBuilds = array();
$prevPr = "";
foreach ($dirs as $key => $dir)
{
	list($version, $parent, $pr) = explode(":",$key);
	$builds = loadDirSimple($dir, "[NIMRS]\d{12}", "d");
	if (sizeof($builds) > 0)
	{
		if ($sortBy != "version" && ($pr != $prevPr && $prevPr))
		{
			print "</ul>\n";	
			print "</div>";
		}
		if ($sortBy == "version" || ($sortBy != "version" && ($pr != $prevPr || !$prevPr)))
		{
			print "<div class=\"homeitem3col\">\n";
			print "<h3><a name=\"" . $pr . "\"></a>" . strtoupper($pr) . ($sortBy == "version" ? " " . $version : "") . "</h3>\n";
			print "<ul>\n";
		}
		$prevPr=$pr;
		usort($builds, "sortBuildIDByDatestamp"); reset($builds);
		foreach ($builds as $build)
		{
			$results = showBuildResults($buildDir, str_replace($buildDir, "", $dir) . "/" . $build . "/", 1);
			$buildDirLink = preg_replace("#http://download.eclipse.org|//modeling/downloads/drops/|modeling/build|buildlog.txt#","",$results[2]);
			$mapLink = "http://www.eclipse.org/modeling/searchcvs.php?q=file%3A$pr.map+days%3A14";
			print "<li><div>" . preg_replace("#http://www.eclipse.org/modeling/downloads/testResults.php?#", 
				$buildDirLink,preg_replace("#http://download.eclipse.org|//modeling/downloads/drops/|modeling/build#", "", $results[0])) . 
				" &#160 &#160 &#160 <a href=\"${buildDirLink}directory.txt\">Map</a> " .
				"| <a href=\"$mapLink\">Changes</a></div>" .
				"<a href=\"" . $buildDirLink . "\">" . ($sortBy != "version" ? $version . " / ": "") . "$build</a></li>\n";
			$mapLinks[$pr] = $mapLink;
			if (!isset($latestBuilds[$pr]))
			{
				$latestBuilds[$pr] = array($version, $build, $buildDirLink);
			}
		}
		if ($sortBy == "version")
		{
			print "</ul>\n";	
			print "</div>";
		}		
	}
}
if ($sortBy != "version")
{
	print "</ul>\n";	
	print "</div>";
}
print "<p>&#160;</p>\n";

print "</div>\n"; // midcolumn

print "<div id=\"rightcolumn\">\n";
print "<div class=\"sideitem\">\n";
print "<h6>Latest Builds &amp; Maps</h6>\n";
print "<ul>\n";
foreach ($latestBuilds as $pr => $lb) print "<li>[<a href=\"" . $mapLinks[$pr] . "\">M</a>] <a href=\"" . $lb[2] . "directory.txt\">" . formatProjectName($pr) . " " . $lb[0] . " " . $lb[1] . "</a></li>\n";
print "</ul>\n";
print "</div>\n";

print "<div class=\"sideitem\">\n";
print "<h6>Search CVS</h6>\n";
print "<ul>\n";
foreach ($mapLinks as $pr => $maplink) print "<li><a href=\"" . $mapLinks[$pr] . "\">$pr.map</a></li>\n";
print "</ul>\n";
print "</div>\n";

$relengs = array(
	"gef" => "gef-org.eclipse.gef.releng",

	"atl" => "m2m-org.eclipse.atl.releng",
	
	"jet" => "m2t-org.eclipse.jet.releng",
	
	"emf" => "emf-org.eclipse.emf.releng",
	"query" => "emf-org.eclipse.emf.query.releng",
	"transaction" => "emf-org.eclipse.emf.transaction.releng",
	"validation" => "emf-org.eclipse.emf.validation.releng",

	"eodm" => "mdt-org.eclipse.eodm.releng",
	"ocl" => "mdt-org.eclipse.ocl.releng",
	"uml2" => "mdt-org.eclipse.uml2.releng",
	"uml2tools" => "mdt-org.eclipse.uml2tools.releng",
	
	"cdo" => "emft-org.eclipse.emf.cdo.releng",
	"compare" => "emft-org.eclipse.emf.compare.releng",
	"ecoretools" => "emft-org.eclipse.emf.ecoretools.releng",
	"mint" => "emft-org.eclipse.emf.mint.releng",
	"mwe" => "emft-org.eclipse.emf.mwe.releng",
	"net4j" => "emft-org.eclipse.emf.net4j.releng",
	"search" => "emft-org.eclipse.emf.search.releng",
	"teneo" => "emft-org.eclipse.emf.teneo.releng",
);
ksort($relengs); reset($relengs);

print "<div class=\"sideitem\">\n";
print "<h6>Update Search CVS</h6>\n";
print "<ul>\n";
foreach ($relengs as $key => $path) print "<li><a href=\"http://build.eclipse.org/modeling/build/updateSearchCVS.php?previewOnly=0&amp;projects%5B%5D=cvssrc%2F$path\">" . $key . "</a></li>\n";
print "</ul>\n";
print "</div>\n";

print "<div class=\"sideitem\">\n";
print "<h6>Sort</h6>\n";
print "<ul><a href=\"?sortBy=" . ($sortBy == "version" ? "" : "version") . "\">" . ($sortBy != "version" ? "By project, version &amp; date" : "By project &amp; date") . "</ul>\n";
print "</div>\n";

print "<div class=\"sideitem\">\n";
print "<h6>About</h6>\n";
print "<p>Updated:<br/>" . date("Y-m-d H:i T") . "</p>\n";
print "</div>\n";

print "</div>\n"; // rightcolumn

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

# Generate the web page
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

function findDir($parent, $pattern, $nest=0)
{
	$found = array();
	$dirs = loadDirSimple($parent, ".*", "d");
	
	if (in_array($pattern, $dirs))
	{
		#print "[$nest] Found " . sizeof($dirs) . " dirs; " . (in_array($pattern, $dirs) ? "matching pattern '$pattern' found in '$parent'" : "") ."<br/>\n";
		$subs = loadDirSimple($parent . "/" . $pattern, "\d+\.\d+\.\d+", "d");
		foreach ($subs as $sub)
		{
			$found[] = $parent . "/" . $pattern . "/" . $sub;
		}
	}
	else
	{
		$nest++;
		foreach ($dirs as $dir)
		{
			$subdir = $parent . "/" . $dir;
			#print "[$nest] Check $subdir...<br/>\n"; 
			if (is_dir($subdir))
			{
				$newDirs = findDir($subdir, $pattern, $nest);
				if (sizeof($newDirs)>0)
				{
					$found[] = $newDirs;
				}
			}
		}
	}
	return $found;
}

/* Thanks to http://ca.php.net/manual/en/function.array-walk-recursive.php#48181 */
function array_flatten_values() { 
     global $outarray; 
     $outarray = array(); 
     function array_walk_recphp4(&$val,$key) { 
         global $outarray; 
         if (is_array($val)) array_walk($val,'array_walk_recphp4'); 
         else { 
             $outarray[] = $val; 
         } 
     } 
     $params = func_get_args(); 
     foreach ($params as $subarr) { 
         array_walk_recphp4($subarr, ''); 
     } 
     return $outarray; 
 } 
 
function sortBuildIDByDatestamp($a, $b)
{
	$a = substr($a,1);
	$b = substr($b,1);
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? 1 : -1;
}

function formatProjectName($pr)
{
	$lim=6;
	$pr = strtoupper($pr);
	return strlen($pr)<=$lim ? $pr : substr($pr,0,$lim-1) . "'" . substr($pr,strlen($pr)-1);
}
?>