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
			<li>To use UML2 Tools, you require both the UML2 Tools &amp; <a href="/modeling/emf/downloads/?project=emf">EMF</a> Runtimes.</li>
			<li>To use UML2 Tools with XSD models, you will also require the <a href="/modeling/mdt/downloads/?project=xsd">XSD</a> Runtime.</li>
			<li>You will also require GMF to be installed, as well as its prerequisite dependencies. To know which Eclipse, EMF, UML2, GMF, etc. drivers were used to build a given release, see <b>Build Dependencies</b> 
				for any build listed above.</li>
		</ul>
		<p>All downloads are provided under the terms and conditions of the <a href="http://www.eclipse.org/legal/epl/notice.html">Eclipse Foundation Software User Agreement</a> unless otherwise specified.</p>
	</div>
<?php
}
?>
