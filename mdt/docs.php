<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

$file = $_SERVER["DOCUMENT_ROOT"] . "/$PR/$proj/docs.php";
if ($proj && is_file($file) && is_readable($file))
{
	include($file);
}
$docs = (is_array($docs) && sizeof($docs) > 0 ? $docs : array());
?>
<div id="midcolumn">
	<h1>Documentation</h1>
	<?php
	print doSelectProject($projects, $proj, $nomenclature);

	foreach (array_keys($docs) as $z)
	{
		print "<div class=\"homeitem3col\">\n";
		print "<h3><a name=\"" . anchor($z) . "\"></a>$z</h3>\n";
		print "<ul>\n";
		foreach (array_keys($docs[$z]) as $y)
		{
			print "<li>\n";
			print "$y\n";
			print "<ul><li>" . $docs[$z][$y] . "</li></ul>\n";
			print "</li>\n";
		}
		print "</ul>\n";
		print "</div>\n";
	}

	if (sizeof($docs) == 0 && $proj)
	{
		print "<div class=\"homeitem3col\">\n";
		print "<h3>" . project_name($proj) . " currently doesn't have any documentation</h3>\n";
		print "</div>\n";
	}
	?>
</div>

<?php
if (sizeof($docs) > 0)
{
?>
<div id="rightcolumn">
	<div class="sideitem">
		<h6>Index</h6>
		<ul>
		<?php
		foreach (array_keys($docs) as $z)
		{
			print "<li><a href=\"#" . anchor($z) . "\">$z</a></li>\n";
		}
		?>
		</ul>
	</div>
</div>
<?php
}

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - MDT - Project Documents";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/' . $PR . '/includes/docs.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

function javadoc($rels)
{
	global $projects, $proj, $PR;

	$project = project_name($proj);

	$ret = array();
	foreach ($rels as $z)
	{
		$ret["<a href=\"http://download.eclipse.org/$PR/$z/javadoc/\">$project $z</a>"] = "Javadoc for the $z release of the $project project.";
	}

	return $ret;
}

/* return a legal anchor based on an arbitrary string */
function anchor($str)
{
	return preg_replace("/[^a-zA-Z]/", "", $str);
}
?>
<!-- $Id: docs.php,v 1.2 2006/10/30 22:03:05 nickb Exp $ -->
