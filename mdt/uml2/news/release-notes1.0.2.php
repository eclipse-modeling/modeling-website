<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();
?>
<div id="midcolumn">
	<div class="homeitem3col">
	<h3>UML2 Release Notes</h3>
		<ul>
			<li class="outerli">
				<a name="1.0.2"></a>UML2 Release Build 1.0.2
				<ul>
					<li>
						No new Bugzillas closed or revised in this build.
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="1.0.2RC2"></a>1.0.2RC2
				<ul>
					<li>
						No new Bugzillas closed or revised in this build.
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="1.0.2RC1"></a>1.0.2RC1
				<ul>
					<li>
						No new Bugzillas closed or revised in this build.
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200502101233"></a>M200502101233
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=84580"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=84580">84580</a>
						Wrong visibility in Namespace#importElement(VisibilityKind, PackageableElement)
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=84780"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=84780">84780</a>
						eIsSet for Operation::type causes proxy resolution
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200411250729"></a>M200411250729
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=79475"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=79475">79475</a>
						on contaiment lists, addAll != add
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200411181041"></a>M200411181041
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=78515"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=78515">78515</a>
						Stereotypes can't be applied to elements owned by template parameters
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200411111057"></a>M200411111057
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=78324"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=78324">78324</a>
						Availability of subclasses for stereotype properties in editor
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200411041050"></a>M200411041050
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77231"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77231">77231</a>
						StackOverflowError in Package#visibleMembers()
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200410281516"></a>M200410281516
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77032"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77032">77032</a>
						New Child/Sibling menu items should be sorted
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="M200410211504"></a>M200410211504
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=75306"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=75306">75306</a>
						OpaqueExpression#stringValue() should return OpaqueExpression#getBody()
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=75309"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=75309">75309</a>
						ClassCastException in UML2PropertyDescriptor
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=75332"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=75332">75332</a>
						UML2Handler should not canonicalize same document proxies
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=75334"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=75334">75334</a>
						Import from Ecore fails for features with unspecified upper bounds
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=75578"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=75578">75578</a>
						Should disallow application of profiles with duplicate Ecore package nsURIs
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=76537"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=76537">76537</a>
						Invalid characters in stereotype property names
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=76610"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=76610">76610</a>
						Provide a GenPackage option to generate an IDisposable item provider adapter factory.
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
