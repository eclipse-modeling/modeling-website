<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/downloads-scripts.php");

if (is_array($projects))
{
	$projectArray = getProjectArray($projects, $extraprojects, $nodownloads, $PR);
	$proj = "/" . (isset($_GET["project"]) && preg_match("/^(?:" . join("|", $projects) . ")$/", $_GET["project"]) ? $_GET["project"] :	""); # default
}
else
{
	$proj = "";
}

if ((!$proj || $proj == "/") && isset($defaultProj)) { $proj = $defaultProj; }
$projct = preg_replace("#^/#", "", $proj);
if (strstr($PR, "/") !== false)
{
	list($topProj, $parentProj) = explode("/", $PR); # modeling, emf
}
else
{
	list($topProj, $parentProj) = array("NONE", $PR); # NONE, gef
}

if (isset($projct) && isset($hasmoved) && is_array($hasmoved) && array_key_exists($projct,$hasmoved))
{
	header("Location: http://www.eclipse.org/modeling/" . $hasmoved[$projct] . "/downloads/?" . $_SERVER["QUERY_STRING"]);
	exit;
}

$numzips = isset($extraZips) ? 0 - sizeof($extraZips) : 0; // if extra zips (new zips added later), reduce the "required" count when testing a build
if (isset($dls[$proj]) && is_array($dls[$proj]))
{
	foreach (array_keys($dls[$proj]) as $z)
	{
		$numzips += sizeof($dls[$proj][$z]);
	}
}

# store an array of paths to hide
$hiddenBuilds = is_readable($_SERVER["DOCUMENT_ROOT"] . "/$PR/downloads/hidden.txt") ? file($_SERVER["DOCUMENT_ROOT"] . "/$PR/downloads/hidden.txt") : array();

// include extras-$proj.php or extras-$PR.php
$files = array ($_SERVER["DOCUMENT_ROOT"] . "/$PR/downloads/extras-" . $projct . ".php", $_SERVER["DOCUMENT_ROOT"] . "/$PR/downloads/extras-" . $PR . ".php");
foreach ($files as $file)
{
	if (file_exists($file))
	{
		include_once($file);
		break;
	}
}

$hadLoadDirSimpleError = 1; //have we echoed the loadDirSimple() error msg yet? if 1, omit error; if 0, echo at most 1 error
$sortBy = (isset($_GET["sortBy"]) && preg_match("/^(date)$/", $_GET["sortBy"], $regs) ? $regs[1] : "");
$showAll = (isset($_GET["showAll"]) && preg_match("/^(1)$/", $_GET["showAll"], $regs) ? $regs[1] : "0");
$showMax = (isset($_GET["showMax"]) && preg_match("/^(\d+)$/", $_GET["showMax"], $regs) ? $regs[1] : ($sortBy == "date" ? "10" : "5"));
$showBuildResults = !isset($_GET["light"]) && !isset($_GET["nostatus"]); // suppress display of status to render page faster
$doRefreshPage = false;

$PWD = getPWD("$projct/downloads/drops"); // see scripts.php
$isTools = isset($_GET["tools"]);
$isTech = isset($_GET["tech"]);
if (preg_match("#/(tools|technology)/#", $PWD, $m))
{
	$isTools = $m[1] == "tools";
	$isTech = $m[1] == "technology";
}

if ($isBuildServer || false != strpos($_SERVER["HTTP_HOST"], "fullmoon")) //internal
{
	$downloadScript = "../../../";
	$downloadPre = "../../..";
}
else // all others
{
	$downloadScript = getdownloadScript();
	$downloadPre = "";
}

/* these are possible deps, the actual deps must be a subset of these and are read from build.cfg */
/* See also:
	 genBuildDetails.sh (depNames array),
	 downloads-common.php ($deps array), and
     build-common.php (<b style="font-size:small">Mirror</b> & function findCatg())
*/
$deps = array(
	"eclipse" => "<a href=\"http://www.eclipse.org/eclipse/\">Eclipse</a>",

	"emf" => "<a href=\"http://www.eclipse.org/modeling/emf/?project=emf#emf\">EMF</a>",
	"emfruntime" => "<a href=\"http://www.eclipse.org/modeling/emf/?project=emf#emf\">EMF</a>",
	"net4j" => "<a href=\"http://www.eclipse.org/modeling/emf/?project=net4j#net4j\">Net4j</a>",
	"query" => "<a href=\"http://www.eclipse.org/modeling/emf/?project=query#query\">Query</a>",
	"teneo" => "<a href=\"http://www.eclipse.org/modeling/emf/?project=teneo#teneo\">Teneo</a>",
	"transaction" => "<a href=\"http://www.eclipse.org/modeling/emf/?project=transaction#transaction\">Transaction</a>",
	"validation" => "<a href=\"http://www.eclipse.org/modeling/emf/?project=validation#validation\">Validation</a>",

	"compare" => "<a href=\"http://www.eclipse.org/modeling/emft/?project=compare#compare\">Compare</a>",
	"mwe" => "<a href=\"http://www.eclipse.org/modeling/emft/?project=mwe#mwe\">MWE</a>",
	"ocltools" => "<a href=\"http://www.eclipse.org/modeling/emft/?project=ocltools#ocltools\">OCL Tools</a>",
	"mint" => "<a href=\"http://www.eclipse.org/modeling/emft/?project=mint#mint\">Mint</a>",
	"search" => "<a href=\"http://www.eclipse.org/modeling/emft/?project=search#search\">Search</a>",

	"ocl" => "<a href=\"http://www.eclipse.org/modeling/mdt/?project=ocl#ocl\">OCL</a>",
	"uml2" => "<a href=\"http://www.eclipse.org/modeling/mdt/?project=uml2#uml2/\">UML2</a>",
	"uml2tools" => "<a href=\"http://www.eclipse.org/modeling/mdt/?project=uml2tools#uml2tools\">UML2 Tools</a>",

	"dltk" => "<a href=\"http://www.eclipse.org/dltk/\">DLTK</a>",
	"dltkindex" => "<a href=\"http://www.eclipse.org/dltk/\">DLTK</a> (H2 Index)",
	"dltkcore" => "<a href=\"http://www.eclipse.org/dltk/\">DLTK</a> (Core)",
	"dltkrse" => "<a href=\"http://www.eclipse.org/dltk/\">DLTK</a> (RSE)",
	"dltkmylyn" => "<a href=\"http://www.eclipse.org/dltk/\">DLTK</a> (Mylyn)",
	"dltktests" => "<a href=\"http://www.eclipse.org/dltk/\">DLTK</a> (Tests)",
	"dtp" => "<a href=\"http://www.eclipse.org/dtp/\">DTP</a>",
	"gef" => "<a href=\"http://www.eclipse.org/gef/\">GEF</a>",
	"gmf" => "<a href=\"http://www.eclipse.org/gmf/\">GMF</a>",
	"rse" => "<a href=\"http://www.eclipse.org/dsdp/tm/\">RSE</a>",
	"orbit" => "<a href=\"http://download.eclipse.org/tools/orbit/downloads/\">Orbit</a>", "lpg" => "<a href=\"http://download.eclipse.org/tools/orbit/downloads/\">LPG</a>",
	"wtp" => "<a href=\"http://www.eclipse.org/wtp/\">WTP</a>",
	"wtpwst" => "<a href=\"http://www.eclipse.org/wtp/\">WTP</a> (WST)",
	"mtl" => "<a href=\"http://www.eclipse.org/modeling/m2t/?project=mtl#mtl\">MTL</a>",
	"xpand" => "<a href=\"http://www.eclipse.org/modeling/m2t/?project=xpand#xpand/\">Xpand</a>",
	"xtext" => "<a href=\"http://www.eclipse.org/modeling/tmf/?project=xtext#xtext\">Xtext</a>",
	"xsdruntime" => "<a href=\"http://www.eclipse.org/modeling/mdt/?project=xsd#xsd\">XSD</a>",
	"qvto" => "<a href=\"http://www.eclipse.org/modeling/m2m/?project=qvtoml#qvtoml\">Operational QVT</a>",
	"qvtoml" => "<a href=\"http://www.eclipse.org/modeling/m2m/?project=qvtoml#qvtoml\">Operational QVT</a>",
	"eclipselink" => "<a href=\"http://www.eclipse.org/eclipselink/\">EclipseLink</a>",
	"subversive" => "<a href=\"http://www.eclipse.org/subversive/\">Subversive</a>",
);

print "<div id=\"midcolumn\">\n";
print "<h1>Downloads</h1>\n";

if (is_array($projects) && sizeof($projects) > 1)
{
	print doSelectProject($projectArray, $proj, $nomenclature, "homeitem3col", $showAll, $showMax, $sortBy);
}

$branches = loadDirSimple($PWD, ".*", "d");
rsort($branches);
$buildTypes = getBuildTypes($branches, $buildtypes);

$builds = getBuildsFromDirs();
$releases = array();
if ($sortBy != "date")
{

	$builds = reorderAndSplitArray($builds, $buildTypes);
	$releases = $builds[1];
	$builds = $builds[0];
}
else
{
	// Sort builds by version (key in $builds) i.e. 2.10.0 > 2.9.2
	krsort($builds, SORT_NATURAL); reset($builds);
}

if (function_exists("doRequirements"))
{
	call_user_func("doRequirements");
}

$rssfeed = "<a href=\"" . ($projct ? "$downloadScript/$PR/feeds/builds-$projct.xml" : "/$PR/feeds/builds-$PR.xml") . "\"><img style=\"float:right\" alt=\"Modeling Build Feed\" src=\"/modeling/images/rss-atom10.gif\"/></a>";

if (sizeof($builds) == 0 && sizeof($releases) == 0)
{
	print "<div class=\"homeitem3col\">\n";
	print "<h3>${rssfeed}Builds</h3>\n";
	print "<ul class=\"releases\">\n";
	if (is_array($projectArray) && !in_array($projct, $projectArray))
	{
		print "<li><i><b>Sorry!</b></i> There are no builds yet available for this component.</li>";
	}
	else
	{
		print "<li><i><b>Error!</b></i> No builds found on this server!</li>";
	}
	print "</ul>\n";
	print "</div>\n";
}

if ($sortBy != "date")
{
	doLatest($releases, "Releases");

	$c = 0;
	foreach ($builds as $branch => $types)
	{
		foreach ($types as $type => $IDs)
		{
			print "<div class=\"homeitem3col\">\n";
			print "<h3>$rssfeed" . $buildTypes[$branch][$type] . "s</h3>\n";
			print "<ul class=\"releases\">\n";
			$i = 0;
			foreach ($IDs as $ID)
			{
				print outputBuild($branch, $ID, $c++);
				$i++;

				if (!$showAll && $i == $showMax && $i < sizeof($IDs))
				{
					print showToggle($showAll, $showMax, $sortBy, sizeof($IDs));
					break;
				}
				else if ($showAll && sizeof($IDs) > $showMax && $i == sizeof($IDs))
				{
					print showToggle($showAll, $showMax, $sortBy, sizeof($IDs));
				}
			}
			print "</ul>\n";
			print "</div>\n";
		}
	}
}
else if ($sortBy == "date")
{
	doLatest($builds, "Builds");
}

if ($doRefreshPage)
{ ?>
<script type="text/javascript">
	setTimeout('document.location.reload()', 60*1000); // refresh every 60 seconds if there's a build in progress
</script>
<?php }

if (function_exists("requirementsNote"))
{
	requirementsNote();
}

if (isset($oldrels) && is_array($oldrels) && sizeof($oldrels) > 0)
{
	showArchived($oldrels);
}

$extras = array("doLanguagePacks", "showNotes");

foreach ($extras as $z)
{
	if (function_exists($z))
	{
		call_user_func($z);
	}
}

print "</div>\n";




?>
<div id="rightcolumn">
		<div class="sideitem">
			<h6>News on Twitter</h6>
		<a id="twitter-timeline" href="https://twitter.com/hashtag/eclipsemf" >#eclipsemf Tweets</a>

		</div>
	</div>
	</div>
<?php



print<<<EOHTML
<div class="sideitem">
	<h6>IP Log</h6>
	<p>See committer/contributor <a href="/$PR/eclipse-project-ip-log.php">IP log</a>.</p>
</div>
EOHTML;


print "</div>\n";


?>
