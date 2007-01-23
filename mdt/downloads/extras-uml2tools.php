<?php

$oldrels = array(
	//"1.0.0" => "200606261119"
);

function showNotes()
{
?>
	<div class="homeitem3col">
		<h3>Questions?</h3>
		<p>If you have problems downloading the drops, contact the <a href="mailto:webmaster@eclipse.org">webmaster</a>.</p>
		<p>These are the minimum required downloads for using UML2:</p>
		<ul>
			<li>To use <b class="uml2">UML2 Tools</b> alone, you require both the UML2 Tools &amp; <a href="/emf/downloads/">EMF</a> Runtimes.</li>
			<li>To use <b class="uml2">UML2 Tools</b> w/ XSD models, you require three Runtimes: UML2 Tools, <a href="/emf/downloads/">EMF</a> &amp; <a href="/modeling/mdt/downloads/?project=xsd">XSD</a>.</li>
			<li>You will also require GMF to be installed, as well as its prerequisite dependencies. To know which Eclipse, EMF, UML2, GMF, etc. drivers were used to build a given release, see <b>Build Dependencies</b> 
				for any build listed above.</li>
		</ul>
		<p>All downloads are provided under the terms and conditions of the <a href="http://www.eclipse.org/legal/epl/notice.html">Eclipse Foundation Software User Agreement</a> unless otherwise specified.</p>
	</div>
<?php
}
?>
