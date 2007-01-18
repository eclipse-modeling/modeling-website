<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getprojectCommon());

internalUseOnly(); 

/* from $_GET */
$params = array(
	"build" => "#^\d+\.\d+\.\d+/[IMNRS]\d{12}/$#"
);

/* check these files, %s replaced with param from above */
$files = array(
	"build" => array($_SERVER['DOCUMENT_ROOT'] . "/$PR/${proj}/downloads/drops/%sbuildlog.txt")
);

/* replace these values with key */
$reps = array(
	"o.e.$proj" => "org.eclipse.$proj",
	"o.e.e.$proj" => "org.eclipse.emf.$proj",
	"o.e.mdt" => "org.eclipse.mdt",
	"o.e.m.c.r" => "org.eclipse.modeling.common.releng",
	"o.e.r" => "org.eclipse.releng",
	"dd" => "/home/www-data/build/$PR/${proj}/downloads/drops",
	"dte" => "download.eclipse.org/technology",
	"dto" => "download.eclipse.org/tools",
	"dm" => "download.eclipse.org/modeling"
);

/* apply span class="key" */
$hl = array(
	"error" => "/(fail(?:ure)?|error|warning|could not|No such|cannot|usage:)/iS", //S for study (huge speed boost here)
	"fail" => "/(BUILD FAILED)/",
	"success" => "/(BUILD SUCCESSFUL)/"
);

/* remove these lines */
$filter = array(
	"/^\[CVS .+\] U.+$/" => "",
	"/^s+\n$/" => ""
);

foreach (array_keys($params) as $z)
{
	if (isset($_GET[$z]) && preg_match($params[$z], $_GET[$z]))
	{
		foreach ($files[$z] as $y)
		{
			$f = sprintf($y, $_GET[$z]);
			$args[] = "$z=" . $_GET[$z];
			if (!is_file($f) || !is_readable($f))
			{
				print "<b>Error:</b> " . (is_numeric($debug) && $debug > 0 ? $f : preg_replace("#.+/$PR/(.+)#","$1",$f)) . " is not a file or is not readable.\n";
				exit;
			}
		}
	}
}

$offset = isset($_GET["offset"]) && is_numeric($_GET["offset"]) ? $_GET["offset"] : 0; 
$step = isset($_GET["step"]) && is_numeric($_GET["step"]) ? $_GET["step"] : 50; // how many lines to display?
$maxlines = exec("wc -l $f"); $maxlines = preg_replace("/[\t\ \n]*(\d+)[\t\ \n]+.+/","$1",$maxlines);

if (isset($f))
{
	if ($offset>0)
	{
		exec("head -n" . ($step + $offset) . " $f | tail -n$step", $log);
	}
	else
	{
		exec("head -n" . $step . " $f", $log);
	}
}
else
{
	print "Found nothing, quitting...\n";
	exit;
}

ob_start();

print "<div id=\"midcolumn\">\n";

options($args, $f);

/* batching all of these into one preg_replace is worth a very large (nearly an order of magnitude) speed boost */
$matches = preg_replace("/^(.+)$/", "!($1)!", array_values($reps));
$replacements = preg_replace("/^(.+)$/", "<abbr title=\"\\\$1\">$1</abbr>", array_keys($reps));

$matches = array_merge($matches, $hl);
$replacements = array_merge($replacements, preg_replace("/^(.+)$/", "<span class=\"$1\">\\\$1</span>", array_keys($hl)));

$matches = array_merge($matches, array_keys($filter));
$replacements = array_merge($replacements, $filter);

$log = preg_replace($matches, $replacements, $log);

$i = $offset;
foreach ($log as $z)
{
	$i++;
	if ($z)
	{
		print "<pre><a name=\"l$i\" href=\"#l$i\">$i</a>" . wordwrap($z) . "</pre>\n";
	}
}

options($args, $f);

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - Log Viewer";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/log-viewer.css\"/>\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

function options($args, $f)
{
	global $offset,$step,$maxlines,$proj;
	print "<div class=\"options\">\n";
	print "<a href=\"?project=$proj&amp;" . join("&amp;", $args) . "&amp;step=$step\">&lt;&lt; 0 - $step</a>";
	if ($offset - $step >= 0) 
	{	
		print "<a href=\"?project=$proj&amp;" . join("&amp;", $args) . "&amp;offset=" . ($offset - $step) . "&amp;step=$step\">&lt; " . ($offset - $step) . " to ". ($offset). "</a>";
	}
	else
	{
		print "<a href=\"?project=$proj&amp;" . join("&amp;", $args) . "&amp;step=$step\">&lt; 0 - $step</a>";
		
	}

	$step2 = $maxlines - $offset - $step;
	if ($offset + $step + $step <= $maxlines)
	{
		print "<a href=\"?project=$proj&amp;" . join("&amp;", $args) . "&amp;offset=" . ($offset + $step) . "&amp;step=$step\">" . ($offset + $step) . " to ". ($offset + $step + $step). " &gt;</a>";
	}
	else if ($offset + $step <= $maxlines && $step2 > 0)
	{
		print "<a href=\"?project=$proj&amp;" . join("&amp;", $args) . "&amp;offset=" . ($offset + $step) . "&amp;step=$step2\">" . ($offset + $step) . " to ". ($maxlines). " &gt;</a>";
	}
	else
	{
		print "<a href=\"?project=$proj&amp;" . join("&amp;", $args) . "&amp;offset=" . ($maxlines - $step) . "&amp;step=$step\">" . ($maxlines - $step) . " to " . ($maxlines) . " &gt;</a>";
	}
	print "<a href=\"?project=$proj&amp;" . join("&amp;", $args) . "&amp;offset=" . ($maxlines - $step) . "&amp;step=$step\">" . ($maxlines - $step) . " to " . ($maxlines) . " &gt;&gt;</a>";
	print "<a href=\"" . preg_replace("#^".$_SERVER['DOCUMENT_ROOT']."#", "", $f) . "\">unformatted log (" . trim(pretty_size(filesize("$f"))) . ")</a>";
	print "</div>\n";
}

function pretty_size($bytes)
{
	$sufs = array("B", "K", "M", "G", "T", "P"); //we shouldn't be larger than 999.9 petabytes any time soon, hopefully
	$suf = 0;

	while ($bytes >= 1000)
	{
		$bytes /= 1024;
		$suf++;
	}

	return sprintf("%3.1f%s", $bytes, $sufs[$suf]);
}

?>
