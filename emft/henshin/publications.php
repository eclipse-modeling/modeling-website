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
$pageTitle 	= "Henshin - Publications";
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

<br>
<h2>Conference and Workshop Proceedings</h2>
<ul>
<li>Thorsten Arendt, Enrico Biermann, Stefan Jurack, Christian Krause, Gabriele Taentzer:
<a href="http://www.springerlink.com/content/qrlj332wxhn01227/">Henshin: Advanced Concepts and Tools for In-place EMF Model Transformations</a>.
Proceedings of <a href="http://models2010.ifi.uio.no/">MoDELS'10</a>, 
Lecture Notes in Computer Science, 2010, Volume&nbsp;6394/2010, 121-135, DOI: 10.1007/978-3-642-16145-2_9.
</li>
<li>Claudia Ermel, Enrico Biermann, Johann Schmidt, Angeline Warning:
<a href="http://journal.ub.tu-berlin.de/eceasst/article/view/528">Visual Modeling of Controlled EMF Model Transformation using Henshin</a>.
Proceedings of <a href="http://grabats2010.inf.mit.bme.hu/">GraBaTs'10</a>, 
Electronic Communications of the EASST, 2010, Volume&nbsp;32.
</li>
<li>Stefan Jurack, Johannes Tietje: 
<a href="http://arxiv.org/abs/1111.4752v1">Solving the TTC 2011 Reengineering Case with Henshin</a>.
Proceedings of <a href="http://planet-research20.org/ttc2011/">TTC'11</a>, 
Electronic Proceedings in Theoretical Computer Science (EPTCS), 2011, Volume&nbsp;74.
</li>
<li>Stefan Jurack, Johannes Tietje: 
<a href="http://arxiv.org/abs/1111.4756v1">Saying Hello World with Henshin - A Solution to the TTC 2011 Instructive Case</a>.
Proceedings of <a href="http://planet-research20.org/ttc2011/">TTC'11</a>, 
Electronic Proceedings in Theoretical Computer Science (EPTCS), 2011, Volume&nbsp;74.
</li>
</ul>

<br>

<h2>Other Documents</h2>
<ul>
<li><a href="documents/henshin_mcrl2.pdf">Instance-aware Model Checking of Graph Transformation Systems using Henshin and mCRL2</a>.
Unpublished article.
</li>
</ul>

<br>
<br>

<i>If you would like to see your Henshin-related paper here too,
please contact us on our <a href="https://dev.eclipse.org/mailman/listinfo/henshin-dev">mailing list</a>.</i>

</div>
</div>

EOHTML;

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
