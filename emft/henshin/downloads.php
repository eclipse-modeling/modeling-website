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
		
# Paste your HTML content between the EOHTML markers!	
$html = <<<EOHTML

<div id="maincontent">

<div id="midcolumn">
<h1>$pageTitle</h1>
		
<p>

<h3>Version 0.6.0.I201009090000 (released 9 Sep. 2010)</h3>
<ol>
<li>Runtime: 
<a href="http://www.eclipse.org/downloads/download.php?file=/modeling/emft/henshin/downloads/drops/0.6.0/I201009090000/henshin-runtime-incubation_0.6.0.I201009090000.zip">henshin-runtime-incubation_0.6.0.I201009090000.zip</a> 
</li>
<li>SDK (Runtime + Source): 
<a href="http://www.eclipse.org/downloads/download.php?file=/modeling/emft/henshin/downloads/drops/0.6.0/I201009090000/henshin-sdk-incubation_0.6.0.I201009090000.zip">henshin-sdk-incubation_0.6.0.I201009090000.zip</a> 
</li>
</ol>


<h3>Version 0.5.1.I201003091626 (released 4 May 2010)</h3>
<ol>
<li>Runtime: 
<a href="http://www.eclipse.org/downloads/download.php?file=/modeling/emft/henshin/downloads/drops/0.5.1/I201003091626/henshin-runtime-incubation_0.5.1.I201003091626.zip">henshin-runtime-incubation_0.5.1.I201003091626.zip</a> 
</li>
<li>SDK (Runtime + Source): 
<a href="http://www.eclipse.org/downloads/download.php?file=/modeling/emft/henshin/downloads/drops/0.5.1/I201003091626/henshin-sdk-incubation_0.5.1.I201003091626.zip">henshin-sdk-incubation_0.5.1.I201003091626.zip</a> 
</li>
</ol>


<h3>Version 0.5.0.I201003102034</h3>
<ol>
<li>Runtime: 
<a href="http://www.eclipse.org/downloads/download.php?file=/modeling/emft/henshin/downloads/drops/0.5.0/I201003102034/henshin-runtime-incubation_0.5.0.I201003102034.zip">henshin-runtime-incubation_0.5.0.I201003102034.zip</a> 
</li>
<li>SDK (Runtime + Source): 
<a href="http://www.eclipse.org/downloads/download.php?file=/modeling/emft/henshin/downloads/drops/0.5.0/I201003102034/henshin-sdk-incubation_0.5.0.I201003102034.zip">henshin-sdk-incubation_0.5.0.I201003102034.zip</a> 
</li>
</ol>

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
