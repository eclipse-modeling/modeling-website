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

<ul>
<li><a href="http://www.springerlink.com/content/qrlj332wxhn01227/">Henshin: 
Advanced Concepts and Tools for In-place EMF Model Transformations</a>.
Proceedings of <a href="http://models2010.ifi.uio.no/">MoDELS'10</a>, 
Lecture Notes in Computer Science, 2010, Volume&nbsp;6394/2010, 121-135, DOI: 10.1007/978-3-642-16145-2_9.
</li>
<li><a href="http://journal.ub.tu-berlin.de/eceasst/article/view/528">Visual Modeling of Controlled 
EMF Model Transformation using HENSHIN</a>.
Proceedings of <a href="http://grabats2010.inf.mit.bme.hu/">GraBaTs'10</a>, 
Electronic Communications of the EASST, 2010, Volume&nbsp;32.
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
