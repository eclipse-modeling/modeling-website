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

$tmp = $projects;
if ($proj)
{
	$vanityname = array_search($proj, $projects);
	desc_proj($proj, $vanityname, $descriptions, "homeitem3col");
	unset($tmp[$vanityname]);
}

foreach (array_diff($tmp, $extraprojects) as $y => $z)
{
	desc_proj($z, $y, $descriptions);
}

function desc_proj($project, $vanityname, $descriptions, $divclass = "homeitem")
{
	global $PR, $hasmoved, $incubating, $nodownloads;

	static $cnt = 1;

	$sty = ($cnt % 2 ? " style=\"clear: both\"" : ""); // clear each odd box to keep columns 2x2
	print "<div id=\"$project\" class=\"$divclass\"$sty>\n";
	$inc = "";
	if (isset($incubating) && in_array($project, $incubating))
	{
		$inc .= '<a href="http://www.eclipse.org/projects/what-is-incubation.php">';
		$inc .= '<img style="float:right" src="/modeling/images/egg-icon.png" alt="Validation (Incubation) Phase"/>';
		$inc .= '</a>';
	}
	print "<h3>$inc$vanityname</h3>\n";
	print $descriptions[$project][($divclass == "homeitem" ? "short" : "long")];
	if (!(isset($hasmoved) && isset($hasmoved[$project])))
	{
		print "<ul class=\"extras\">";
		if ($divclass == "homeitem")
		{
			print "<li><a href=\"?project=$project#$project\">More...</a></li>\n";
		}
		$pz = ($project == "sdo" ? "emf" : $project); /* special case */
		if (array_search($project, $nodownloads) !== false)
		{
			print "<li>Downloads coming soon!</li>\n";
		}
		else
		{
			print "<li><a href=\"/$PR/downloads/?project=$pz\">Downloads</a></li>\n";
		}
		print "</ul>\n";
	}
	print "</div>\n";

	if ($divclass == "homeitem")
	{
		$cnt++;
	}
}
?>
