<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();
?>
<div id="midcolumn">
	<div class="homeitem3col">
		<h3>UML2 Release Notes</h3>
		<ul>
			<li class="outerli">
				<a name="1.1.0"></a>UML2 Release Build 1.1.0
				<ul>
					<li>
						No new Bugzillas closed or revised in this build.
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="1.1RC4"></a>1.1RC4
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=102038"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=102038">102038</a>
						EMOF2Ecore example needs to handle &quot;*&quot; for upper bounds
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="1.1RC3"></a>1.1RC3
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77405"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77405">77405</a>
						[Plan Item] Eclipse 3.1 / EMF 2.1 Compatibility
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=100821"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=100821">100821</a>
						UnionEObjectEList needs to implement EStructuralFeature.Setting
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="1.1RC2"></a>1.1RC2
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77405"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77405">77405</a>
						[Plan Item] Eclipse 3.1 / EMF 2.1 Compatibility
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77413"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77413">77413</a>
						[Plan Item] Improved Documentation
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=99464"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=99464">99464</a>
						ChangeCommand should dispose its change recorder
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=99791"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=99791">99791</a>
						Suboptimal code in org.eclipse.uml2.internal.operation
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=100006"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=100006">100006</a>
						UML2ExtendedMetaData should delegate to global package registry
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=100019"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=100019">100019</a>
						UML2 plug-ins should be JAR'd
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=100133"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=100133">100133</a>
						NPE with existing profile
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=100214"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=100214">100214</a>
						Derived union getters should use eIsSet(EStructuralFeature)
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=100314"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=100314">100314</a>
						Cache adapter should not handle containment when &quot;adapting&quot;
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200506091529"></a>I200506091529
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77405"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77405">77405</a>
						[Plan Item] Eclipse 3.1 / EMF 2.1 Compatibility
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=98119"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98119">98119</a>
						ownedElement seems not to work for Component
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=98333"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98333">98333</a>
						Convert plug-in manifests to bundle manifests (MANIFEST.MF)
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=98361"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98361">98361</a>
						Compiler warnings
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=98678"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98678">98678</a>
						Add a convenience method for creating a Dependency
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="1.1RC1"></a>1.1RC1
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77405"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77405">77405</a>
						[Plan Item] Eclipse 3.1 / EMF 2.1 Compatibility
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=96427"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=96427">96427</a>
						Enum literal names shouldn't be &quot;sanitized&quot; during profile definition
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=96453"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=96453">96453</a>
						Use of the cache adapter by UML2 should NOT be optional
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=97242"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=97242">97242</a>
						Convenience method for creating operations
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=97558"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=97558">97558</a>
						NPE in Package::getAppliedVersion(Profile) when profile not defined
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=97571"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=97571">97571</a>
						UML2Util message substitution assumes presence of a QualifiedTextProvider
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=97585"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=97585">97585</a>
						Stack Overflow in computing members of classifiers with generalization cycles
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=98043"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98043">98043</a>
						Exceptions occur trying to import incomplete UML2 models
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="1.1M5a"></a>1.1M5a
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77405"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77405">77405</a>
						[Plan Item] Eclipse 3.1 / EMF 2.1 Compatibility
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=96069"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=96069">96069</a>
						Source plugins have no manifest.mf
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=96427"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=96427">96427</a>
						Enum literal names shouldn't be &quot;sanitized&quot; during profile definition
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=96453"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=96453">96453</a>
						Use of the cache adapter by UML2 should be optional
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=96607"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=96607">96607</a>
						Return type of methods in ActivityPartition not correct
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="1.1M5"></a>1.1M5
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77230"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77230">77230</a>
						[NLS] Enumeration literals not translated
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77408"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77408">77408</a>
						[Plan Item] EMF Generator Extensions
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=94901"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=94901">94901</a>
						Impossible to set associations for nested classes
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200505051002"></a>I200505051002
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77408"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77408">77408</a>
						[Plan Item] EMF Generator Extensions
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=93164"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=93164">93164</a>
						Inconsistent behavior between Model.isApplied(Profile) and Model.apply(Profile)
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=93495"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=93495">93495</a>
						applying profile to model owning that profile
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200504281128"></a>I200504281128
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77405"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77405">77405</a>
						[Plan Item] Eclipse 3.1 / EMF 2.1 Compatibility
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=92304"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=92304">92304</a>
						End-line characters are lost in XMI
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200504210935"></a>I200504210935
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77405"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77405">77405</a>
						[Plan Item] Eclipse 3.1 / EMF 2.1 Compatibility
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200504141411"></a>I200504141411
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77412"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77412">77412</a>
						[Plan Item] More Examples
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=90989"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=90989">90989</a>
						Extension creation prerequisites inconsistent
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="1.1M4"></a>1.1M4
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77405"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77405">77405</a>
						[Plan Item] Eclipse 3.1 / EMF 2.1 Compatibility
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77412"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77412">77412</a>
						[Plan Item] More Examples
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200503311223"></a>I200503311223
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77410"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77410">77410</a>
						[Plan Item] Migration Framework
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=89371"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=89371">89371</a>
						Element#setValue(Stereotype, String, Object) should convert string values
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200503181411"></a>I200503181411
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=87961"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=87961">87961</a>
						Optional resource localization
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=87962"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=87962">87962</a>
						NamedElement query utility
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=88323"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=88323">88323</a>
						Need for easy way to get element type counts in a model
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=88367"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=88367">88367</a>
						Properties files should contain # NLS_MESSAGEFORMAT_VAR
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200503171237"></a>I200503171237
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77410"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77410">77410</a>
						[Plan Item] Migration Framework
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77412"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77412">77412</a>
						[Plan Item] More Examples
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=87373"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=87373">87373</a>
						Transition to EPL
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=87919"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=87919">87919</a>
						The 'Profile &gt; Apply...' action should work with profiles from resources loaded in the resource set
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=87948"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=87948">87948</a>
						Input stream not closed in UML2Operations#getResourceBundle(EObject, Locale)
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=87958"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=87958">87958</a>
						nsURI for profile Ecore packages should be more descriptive
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="1.1M3"></a>1.1M3
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77405"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77405">77405</a>
						[Plan Item] EMF 2.1 Compatibility
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200502181408"></a>I200502181408
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77412"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77412">77412</a>
						[Plan Item] More Examples
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=85053"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=85053">85053</a>
						Unused Icons
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=85223"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=85223">85223</a>
						NullPointer in Cross Reference
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200502101338"></a>I200502101338
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
				<a name="I200501271034"></a>I200501271034
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77405"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77405">77405</a>
						[Plan Item] EMF 2.1 Compatibility
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77412"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77412">77412</a>
						[Plan Item] More Examples
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=82946"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=82946">82946</a>
						BIDI:Uml editor is not RTL
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200501201111"></a>I200501201111
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77412"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77412">77412</a>
						[Plan Item] More Examples
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200501130821"></a>I200501130821
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77412"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77412">77412</a>
						[Plan Item] More Examples
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=82720"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=82720">82720</a>
						Children of operations in UML2 editor
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="1.1M2"></a>1.1M2
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77405"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77405">77405</a>
						[Plan Item] EMF 2.1 Compatibility
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77410"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77410">77410</a>
						[Plan Item] Migration Framework
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77412"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77412">77412</a>
						[Plan Item] More Examples
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200412091035"></a>I200412091035
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77406"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77406">77406</a>
						[Plan Item] Resource Localization
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=78296"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=78296">78296</a>
						[Plan Item] Instance Creation Support
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200412021147"></a>I200412021147
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=78296"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=78296">78296</a>
						[Plan Item] Instance Creation Support
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=79999"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=79999">79999</a>
						Update javadoc for StereotypeOperation::createExtension
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200411181412"></a>I200411181412
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77405"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77405">77405</a>
						[Plan Item] EMF 2.1 Compatibility
					</li>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77411"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77411">77411</a>
						[Plan Item] Update Site Support
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="1.1M1"></a>1.1M1
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77405"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77405">77405</a>
						[Plan Item] EMF 2.1 Compatibility
					</li>
				</ul>
			</li>

			<li class="outerli">
				<a name="I200411041431"></a>I200411041431
				<ul>
					<li>
						<a href="http://www.eclipse.org/emf/searchcvs.php?q=77405"><img src="/uml2/images/delta.gif" alt="CVS Delta"/></a> <a target="bugz" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=77405">77405</a>
						[Plan Item] EMF 2.1 Compatibility
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
