<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 

$App = new App();
$Nav = new Nav();
$Menu = new Menu();

include($App->getProjectCommon());

#
# Begin: page-specific settings.  Change these. 
$pageTitle 	= "Henshin - Downloads";
$pageKeywords	= "EMF, Henshin, model transformation, Downloads";
$pageAuthor	= "Christian Krause";
	
# Add page-specific Nav bars here
# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
# $Nav->addNavSeparator("My Page Links", 	"downloads.php");
# $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);

# End: page-specific settings
#
		

$drops = "http://www.eclipse.org/downloads/download.php?file=/modeling/emft/henshin/downloads/drops";
$html = <<<EOHTML

<div id="maincontent">

<div id="midcolumn">
<h1>$pageTitle</h1>

<h2>Latest Stable Release</h2>
<p>
<table>
<tr>
<td>
<a href="$drops/0.7.0/R201102111655/Henshin-SDK-Incubation_0.7.0.zip"><img src="go-bottom.png"></a>
</td>
<td>
<a href="$drops/0.7.0/R201102111655/Henshin-SDK-Incubation_0.7.0.zip">Henshin SDK 0.7.0</a>
</td>
</tr>
</table>
</p>

<h2>Nightly Builds</h2>
<p>
<table>
<tr>
<td>
<a href="$drops/0.7.0/N-SNAPSHOT/Henshin-SDK-Incubation-N-SNAPSHOT.zip"><img src="go-bottom.png"></a>
</td>
<td>
<a href="$drops/0.7.0/N-SNAPSHOT/Henshin-SDK-Incubation-N-SNAPSHOT.zip">Henshin SDK SNAPSHOT</a>
</td>
</tr>
</table>
</p>


<!--
		
<div class="homeitem">
<h3>Narrow column</h3>
<ul>
<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
</ul>
</div>
		
<div class="homeitem">
<h3>Narrow column</h3>
<ul>
<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
</ul>
</div>
<div class="homeitem3col">
<h3>This is a wide column</h3>
<ul>
<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
<li><a href="#">Link</a>. Teaser text <a href="#">'Reference'</a><span class="dates">02/05/05</span></li>
</ul>
</div>
<hr class="clearer" />
<p>Some free text</p>
<ul class="midlist">
<li>list of items in free text</li>
<li>list of items in free text</li>
<li>list of items in free text</li>
</ul>
<ol>
<li>Ordered list</li>
<li>Ordered list</li>
<li>Ordered list</li>
</ol>
		
-->

</div>
</div>


EOHTML;

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
