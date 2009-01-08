<?php
require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start(); ?>
<div id="midcolumn">
	<div class="homeitem3col">
		<h3>File Types</h3>
		
		<ul>
		<li><div style="float:right"><img alt="All-In-One Bundle including Eclipse and required dependencies" src="/modeling/images/dl-icon-aio-bundle.gif"/> </div><b style="color:green">All-In-One Bundle</b> - Some projects may produce an aggregate zip or bundle, containing SDK, requirements, and the Eclipse platform. Where applicable, choose the version that matches your platform (eg., Windows, Linux GTK, Mac OS X). 
		[<a href="http://eclipse.org/modeling/downloads/">Modeling</a>, <a href="http://www.eclipse.org/pdt/downloads/">PDT</a>]</li> 

		<li><div style="float:right"><img alt="All-In-One SDK Zip" src="/modeling/images/dl-icon-aio-sdk.gif"/> </div><b style="color:green">All-In-One SDK</b> - 
		Some projects may produce multiple SDKs. This composite SDK will thus contain multiple SDKs in one convenient download. 
		[<a href="http://www.eclipse.org/modeling/emf/downloads/">EMF</a>, <a href="http://www.eclipse.org/gef/downloads/">GEF</a>]</li>

		<li><div style="float:right"><img alt="Archived Update Site" src="/modeling/images/dl-icon-update-zip.gif"/> </div><b style="color:green">Archived Update Site</b> - 
		These zips contains the an archived update site for a single build, including all features and plugins from the runtime and SDK. 
		To install, download the zip, point Eclipse's Install Manager at this <b>Local</b> Update Site, and select the features you want to install. [<a href="http://wiki.eclipse.org/Modeling_Project/Installation">Modeling</a>, <a href="http://wiki.eclipse.org/PDT/Installation">PDT</a>]</li>

		<li><b>SDK</b> - 
		These zips are for developers wishing to extend the project. They contain the runtime plugins, source and documentation to assist in using, developing, building on top of the project. The contents of this zip can also be obtained from a remote, archived, or local update site.</li>
		<li><b>Runtime</b> - 
		Runtime zips contain only the features and plugins required to run the project as an end-user. There is no source, documentation or 
		developer files. They are to be used for normal customer installation. The contents of this zip can also be obtained from a remote, archived, or local update site.</li>
		<li><b>Examples</b> - 
		These zips contains examples, including source and can be imported into the workspace as an existing project. Examples may also be included in the SDK feature, and thus SDK zip, or may be contained separately, at the project's discretion.</li>

		<li><b>Automated Tests</b> - 
		These zips contain the project's automated JUnit tests, along with the plugins required to run them with Eclipse.</li>

		<li><b>Standalone</b> - 
		It seems that there is life outside Eclipse. These zips were created to simplify the use of EMF in this scenario. Each zip contains a "readme" document that explains its purpose and how you can use its contents. [<a href="http://www.eclipse.org/modeling/emf/downloads/">EMF</a>]</li>
		<li><b>Models</b> - 
		It seems that there is life outside Eclipse. These zip were created to simplify the use of EMF in this scenario. Each zip contains a "readme" document that explains its purpose and how you can use its contents. [<a href="http://www.eclipse.org/modeling/emf/downloads/">EMF</a>]</li>
		</ul>
		
	</div>

	<div class="homeitem3col">
		<h3>Release Types</h3>

		<ul>
		<li><b style="font-size:25px">R</b><b>eleases</b> - 
		Releases are builds 
		that have been declared major releases by the development team - for example 
		&quot;R1.0&quot;. Releases are the right builds for people who want to 
		be on a stable, tested release, and don't need the latest greatest features 
		and improvements. Release builds always have an &quot;R&quot; at the beginning 
		of the name i.e. R1.0, R2.0 etc. Non-release 
		builds are named according to the date of the build - for example 20011027 
		is the build from Oct 27, 2001.</li>

		<li><b style="font-size:25px">S</b><b>table Builds</b> - 
		Stable builds are integration 
		builds that have been found to be stable enough for most people to use, such as Milestones and Release Candidate builds, eg., 2.5.0M4 or 1.2.0RC1. 
		 
		The latest stable build is the right build for people who want to stay up 
		to date with what is going on in the latest development stream, and don't 
		mind putting up with a few problems in order to get the latest greatest 
		features and bug fixes. The latest stable build is the one the development 
		team likes people to be using, because of the valuable and timely feedback.</li>

		<li><b style="font-size:25px">I</b><b>ntegration Builds</b> -
		Periodically, component 
		teams version off their work in what they believe is a stable, consistent 
		state, and they update the build configuration to indicate that the next 
		integration build should take this version of the component. Integration 
		builds are built from these stable component versions that have been specified 
		by each component team as the best version available. Integration builds 
		may be promoted to stable builds after a few days of testing. Integration 
		builds are built whenever new stable component versions are released into 
		the build, generally once a week.</li>

		<li><b style="font-size:25px">M</b><b>aintenance Builds</b> - 
        Periodically builds for maintenance
        of the current release will be performed. They will not necessarily be stable builds. When the maintenace is finalized and released, it will be moved up to a Release build.
         If the build name starts with an &quot;M&quot; i.e. M20031110, then it has not been tested for stability, but will contain only minor fixes relative to its prior Release, and thus should be considered 
         sufficiently stable for daily use. 
         If it is a release candidate, i.e. 0.5.0.1RC1, then it is a stable maintenance build. Generally, these will be built as a type "<b>S</b>" build, rather than a type "<b>M</b>" build.</li>

		<li><b style="font-size:25px">N</b><b>ightly Builds</b> -
		Nightly builds are produced 
		over night from whatever has been released into the HEAD stream of the 
		CVS repository. They are completely untested and will almost always have 
		major problems. Many will not work at all. These drops are normally only 
		useful to developers actually working on this project.
		<b>Note:</b> Nightly builds are produced only as requested, and not necessarily every night, by developers to build what was in HEAD.</li>
		</ul>

	</div>

</div>
<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - Build Types";
$pageKeywords = ""; 
$pageAuthor = "Neil Skrypuch";

$App->generatePage("Phoenix", $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
