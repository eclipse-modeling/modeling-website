<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();
?>
<div id="midcolumn">
	<div class="homeitem3col">
	<h3>UML2 Release Notes</h3>
		<ul>
			<li class="outerli">
				<a name="1.0.3"></a>UML2 Release Build 1.0.3
				<ul>
					<li>
						No new Bugzillas closed or revised in this build.
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200506091144"></a>M200506091144
				<ul>
					<li>
						No new Bugzillas closed or revised in this build.
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200506021024"></a>M200506021024
				<ul>
					<li>
						No new Bugzillas closed or revised in this build.
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200505261342"></a>M200505261342
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=96427"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=96427">96427</a>
						Enum literal names shouldn't be &quot;sanitized&quot; during profile definition
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Tools - UML2 - Release Notes";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/relnotes.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
