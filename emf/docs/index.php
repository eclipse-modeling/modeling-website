<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

echo "<div id=\"midcolumn\">\n";
$contents = file("docs.xml");
$matches = null;
foreach ($contents as $line) { 
	if (false !== strpos($line, "<!-- DO NOT REMOVE: placeholder for wiki content -->"))
	{
		// insert wiki content
		$wiki_contents = file("http://wiki.eclipse.org/index.php/Category:EMF");
		$collecting = false;
		foreach ($wiki_contents as $wline)
		{
			$matches = null;
			if (false !== strpos($wline, "printfooter"))
			{
				break;
			}
			if ($collecting && preg_match_all("#<a href=\"/index.php/([^\"]+)\" title=\"([^\"]+)\">([^\<\>]+)</a>#", $wline, $matches, PREG_SET_ORDER))
			{
				if (is_array($matches) && sizeof($matches)>0)
				{
					foreach ($matches as $match)
					{
						print "<li><a href=\"http://wiki.eclipse.org/index.php/".$match[1]."\" title=\"".$match[2]."\">".$match[3]."</a></li>\n";
					}
				}
			}
			// find start line
			if (false !== strpos($wline, "Articles in category \"EMF\""))
			{ 
				$collecting = true;
			}
		}
	} 
	else
	{
		print $line;
	}
}
echo "</div>\n";

print "<div id=\"rightcolumn\">\n";

print '<div class="sideitem">'."\n". '<h6>Documentation News</h6>';
getNews(4, "docs");
print ' <ul>
			<li><a href="/' . $PR . '/news-whatsnew.php">Older news</a></li>
		</ul>
	</div>
';
print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - EMF - Documents";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/emf/includes/docs.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

<!-- $Id: index.php,v 1.4 2007/03/21 18:27:09 nickb Exp $ -->
