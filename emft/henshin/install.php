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
$pageTitle 	= "Henshin - Installation";
$pageKeywords	= "EMF, Henshin, model transformation, installation";
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
You can <a href="downloads.php">download</a> the latest version and install it directly.
We recommend though to install Henshin from our update site.
</p>

<p>
<i>You need Eclipse Helios or Indigo to run Henshin.</i>
</p>

<h2>Update Sites</h2>
<p>
You can get the latest version of the source code directly from our SVN repository:
<ul>
<li><b>Releases:</b> <a href="http://download.eclipse.org/modeling/emft/henshin/updates/releases">http://download.eclipse.org/modeling/emft/henshin/updates/releases</a></li>
<li>Nightly Builds: <a href="http://download.eclipse.org/modeling/emft/henshin/updates/nightly">http://download.eclipse.org/modeling/emft/henshin/updates/nightly</a></li>
</ul>
</p>


<h2>Sources</h2>
<p>
You can get the latest version of the source code directly from our SVN repository:
<ul>
<li><a href="http://dev.eclipse.org/svnroot/modeling/org.eclipse.emft.henshin">http://dev.eclipse.org/svnroot/modeling/org.eclipse.emft.henshin</a></li>
</ul>
</p>


<h2>Build Jobs</h2>
<p>
Release and nighly builds are compiled using Hudson jobs:
<ul>
<li>Releases: <a href="https://hudson.eclipse.org/hudson/job/cbi_henshin_release/">https://hudson.eclipse.org/hudson/job/cbi_henshin_release</a></li>
<li>Nightly Builds: <a href="https://hudson.eclipse.org/hudson/job/cbi_henshin_nightly/">https://hudson.eclipse.org/hudson/job/cbi_henshin_nightly</a></li>
</ul>
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
