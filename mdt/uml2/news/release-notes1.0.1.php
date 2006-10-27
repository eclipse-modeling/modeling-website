<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();
?>
<div id="midcolumn">
	<div class="homeitem3col">
	<h3>UML2 Release Notes</h3>
		<ul>
			<li class="outerli">
				<a name="1.0.1"></a>UML2 Release Build 1.0.1
				<ul>
					<li>
						No new Bugzillas closed or revised in this build.
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200409151313"></a>M200409151313
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=73759"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73759">73759</a>
						Editing an applied stereotypes causes CPU overload for 10 seconds
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=73765"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73765">73765</a>
						Property#setNavigable(true) bug
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=73773"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73773">73773</a>
						Memory leak in ElementItemProvider
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=73804"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73804">73804</a>
						Memory leaks in CacheAdapter
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=73931"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73931">73931</a>
						IndexOutOfBounds exceptions in StereotypeOperations
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200409090936"></a>M200409090936
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=73343"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73343">73343</a>
						Proxies not handled correctly by subset/superset features
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200409021420"></a>M200409021420
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=73057"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73057">73057</a>
						Subset/Superset resolving ELists don't resolve
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200408261949"></a>M200408261949
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=72166"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72166">72166</a>
						UUIDs should not be displayed in cell editors
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=72478"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72478">72478</a>
						Boolean attributes should be stored in eFlags
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=72730"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72730">72730</a>
						Packageable elements (except for classes) in *.metamodel.uml2 should have private visibility
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200408191227"></a>M200408191227
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=71868"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71868">71868</a>
						Support frozen Ecore instances for improved performance
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=71940"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71940">71940</a>
						Problem with Port::required
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=72166"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72166">72166</a>
						UUIDs should not be displayed in cell editors
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200408121021"></a>M200408121021
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=70924"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70924">70924</a>
						Javadoc for UML2 does not contain links to EMF
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=71415"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71415">71415</a>
						Combo box not appearing for Boolean properties
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=71680"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71680">71680</a>
						Association::relatedElement should not contain nulls
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=71833"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71833">71833</a>
						Can't apply stereotype to a package in a component
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200407291003"></a>M200407291003
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=70589"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70589">70589</a>
						Basic profile contains two stereotypes named 'Create'
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200407211153"></a>M200407211153
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=69692"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69692">69692</a>
						NullPointerException in ProfileOperations#getEPackage(...)
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=69693"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69693">69693</a>
						UML2 resources should not be contributed via fragments
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=69699"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69699">69699</a>
						Null pointer exception
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=69878"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69878">69878</a>
						UML2 resources should be saved with xmi:type (instead of xsi:type)
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=69918"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69918">69918</a>
						UML2-to-Ecore: UML2 Aggregation=composite does not map to ecore containment=true
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=69974"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69974">69974</a>
						Parameters listed twice
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=70178"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70178">70178</a>
						StructuredActivityNode#setActivity(Activity) throws UnsupportedOperationException
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=70242"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70242">70242</a>
						Namespace URIs for profile Ecore packages not unique
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=70272"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70272">70272</a>
						TVT3.0: New UML2 model has non-externalized strings
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=70438"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70438">70438</a>
						Improve class loader lookup algorithm for EPackageRegistryImpl
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

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/uml2/includes/relnotes.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
<!-- $Id: release-notes1.0.1.php,v 1.1 2006/10/27 19:04:10 khussey Exp $ -->
