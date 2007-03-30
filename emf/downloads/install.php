<?php
require_once ("../../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();
?>
<div id="midcolumn">
	<div class="homeitem3col">
		<h3>Download &amp; Installation Requirements - <b style="color:#eeff00">PLEASE READ!</b></h3>
		<p><b>First-time users</b> can get started quickly by simply downloading the combined <b style="color:#B51464">ALL</b> SDK bundle (includes Source, Runtime and Docs for <b style="color:#BF5FBF">EMF</b>, <b style="color:#18187D">XSD</b>, and <b style="color:#C7568E">SDO</b>). <a href="http://www.eclipse.org/modeling/downloads/build-types.php">What Build Type do I want?</a></p>
		<p>EMF, SDO and XSD 2.0.x - 2.2.x require <a href="http://www.eclipse.org/downloads/" target="_eclipse">Eclipse 3.0.x - 3.2.x</a> and <b>JDK 1.4</b>. As of Eclipse 3.2, you can also use a <b>JDK 5.0</b>, since this bug only exists in the <b>Sun JDK 1.4</b>.</p>
		<p>EMF, SDO and XSD 2.3.x requires <a href="http://www.eclipse.org/downloads/" target="_eclipse">Eclipse 3.3.x</a> and <b>JDK 5.0</b>, so this issue does not apply.</p>
		<p>Note that the full Eclipse SDK is only required <i>if you intend to use the EMF, SDO or XSD graphical interfaces</i>, (ie., views, wizards, extensions) which are built for Eclipse. For <i>runtime-only applications</i>, only a JDK is required.</p>
		<p>EMF, SDO and XSD are built against the latest Eclipse SDKs, eg., EMF 2.3.0 with Eclipse 3.3.0, and is thus generally as compatible with a previous Eclipse release as Eclipse itself is with previous releases. For more on runtime compatibilty, see <a href="http://wiki.eclipse.org/index.php/EMF_2.3_JVM_Requirements">EMF 2.3 JVM Requirements</a>.</p>
		<p>To see or download the Eclipse build used for a particular package, choose a build and scroll down to see its <b>Build Dependencies</b>. For older, archived builds, click the link under <b>Build Name</b> and check the <b>Requirements</b> section.</p>

	</div>

	<div class="homeitem3col" id="crimsonbug">
		<h3>XSD Model Loading: Crimson DOM Bug, Workaround &amp; Download</h3>
		
		<p>If you use the <b>IBM JDK 1.4</b> or a <b>5.0 JDK</b> instead of the <b>SUN JDK 1.4</b>, this workaround is not required.</p>
		
		<p><b>If you <b style="color:red">will NOT</b> be loading or importing model(s) from XML Schema</b>, or do not plan to use the XSD plugin, but intend to generate models from Rose, annotated java code, or using pre-existing ecore file(s), this workaround is also not required. EMF &amp; SDO will work fine without Xerces.</p>

		<p><b>If you <b style="color:green">will be</b> loading or importing model(s) from XML Schema</b>, you need to be aware of the following bug &amp; its workaround.</p>

		<ul>
			<li>The Crimson DOM implementation in (some versions of) the Sun JDK 1.4 has a bug in the implementation of <tt>hasAttributeNS</tt>. 
			This bug can be seen, <i>when importing a model from XML Schema</i>, as either:
				<ul>
					<li>a null pointer exception, or</li>
					<li>the error message "Specify a valid XML Schema and try loading again".</li>
				</ul>
			</li>
            
			<li>To avoid this, use the following to control the JAXP implementation:
				<pre style="background-color:yellow"><b>&lt;eclipse-install-dir&gt;</b>eclipse.exe -vmargs <br/>&#160;&#160;&#160;-D<a href="http://java.sun.com/j2se/1.4.2/docs/guide/standards/index.html">java.endorsed.dirs</a>=<b>&lt;path-to-your-xerces-jars-folder&gt;</b></pre>
			</li>

			<li>For your convenience, here are some links to XML4J and Xerces2-J, for anyone wishing to use Eclipse 3.0M8 or later.
				<ul>
				<li><a target="_xml" href="http://alphaworks.ibm.com/tech/xml4j"><img border="0" alt="Other Download" src="/modeling/images/dl.gif"/></a>
				<a target="_xml" href="http://alphaworks.ibm.com/tech/xml4j">Download XML4J from IBM alphaWorks</a></li>
				<li><a target="_xml" href="http://xml.apache.org/xerces2-j/download.cgi"><img border="0" alt="Other Download" src="/modeling/images/dl.gif"/></a>
				<a target="_xml" href="http://xml.apache.org/xerces2-j/download.cgi">Download Xerces2-J from apache.org</a></li>
				</ul>
			</li>

		</ul>
		
		<p>Please do NOT open any bugs or post comments to the newsgroup regarding the absence of Xerces in the Eclipse plugin directory or that the above workaround no longer works.</p>
		
	</div>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - EMF Installation";
$pageKeywords = ""; //TODO: add something here
$pageAuthor = "Neil Skrypuch, Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
