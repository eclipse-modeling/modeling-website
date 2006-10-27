<?php

/* used for sidebar entry */
$NLpacks = array(
	"1.0.x" => "NL10x"
);

function doLanguagePacks()
{
	global $downloadScript, $downloadPre;
	
?>
<div class="homeitem3col">
	<a name="NLS"></a>
	
	<h3>Language Packs</h3>

	<p>IBM is pleased to contribute translations for the Eclipse Tools UML2 Project.</p>
	<ul>
		<li>
			<a href="javascript:toggle('lang1_0')">1.0.x Language Packs</a><a name="NL10x"></a>
			<ul id="lang1_0">
					<?php
					$packs = array(
						"1.0.x NLS Translation Packs" => "NLpacks-",
					);
					$cols = array(
						"UML2 OCL" => "ocl"
					);
					$subcols = array(
						"SDK" => "SDK-",
						"Runtime" => "runtime-"
					);
					$packSuf = "1.0.0.zip";
					$folder = "NLS/";
					doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder, true); ?>
				<li>

					<p>The language packs contain NL fragments and features for:</p>
					<ul>
						<li>NLpack1 - German, Spanish, French, Italian, Japanese, Korean, Portuguese (Brazil), Traditional Chinese, Simplified Chinese</li>
						<li>NLpack2 - Czech, Hungarian, Polish, Russian</li>
						<li>NLpack2a - Danish, Dutch, Finnish, Greek, Norwegian, Portuguese, Swedish and Turkish</li>
						<li>NLpackBidi - Arabic</li>
					</ul>
					<p>Each language pack zip contains 4 other zips (one for each of the language groups above). Unpack these zips into your Eclipse directory before starting Eclipse.</p>
					<p>These translations are based on UML2 OCL 1.0.0. The NLS translation fragment packs should work with all subsequent 1.0.x maintenance releases, with any new strings remaining untranslated.</p>
				</li>
			</ul>
		</li>
	</ul>
</div>

<?php
}

function showArchived()
{
	global $PR;
	$oldrels = array(
		"1.1.0" => "200507070914",
		"1.0.3" => "200506221634",
		"1.0.2" => "200503231914",
		"1.0.1" => "200409171820",
		"1.0.0" => "200406281334"
	);

	print "<div class=\"homeitem3col\">\n";
	print "<h3>Archived Releases<a name=\"archives\"> </a></h3>\n";
	print "<p>Older UML2 releases have been moved to archive.eclipse.org, and can be accessed here:</p>";
	print "<ul id=\"archives\">\n";
	foreach (array_keys($oldrels) as $z)
	{
		print "<li><a href=\"http://archive.eclipse.org/$PR/downloads/drops/$z/R$oldrels[$z]\">$z</a> (" . IDtoDateStamp($oldrels[$z], 0) . ")</li>\n";
	}
	print "</ul>\n";
	print "</div>\n";
}

function showNotes()
{
?>
	<div class="homeitem3col">
		<h3>Questions?</h3>
		<p>If you have problems downloading the drops, contact the <a href="mailto:webmaster@eclipse.org">webmaster</a>.</p>
		<p>These are the minimum required downloads for using EMF, SDO and XSD:</p>
		<ul>
			<li>To use <b class="uml2">UML2 OCL</b> alone, you require both the UML2 OCL &amp; <a href="/emf/downloads/">EMF</a> Runtimes.</li>
			<li>To use <b class="uml2">UML2 OCL</b> w/ XSD models, you require three Runtimes: UML2 OCL, <a href="/emf/downloads/">EMF</a> &amp; <a href="/emf/downloads/">XSD</a>.</li>
		</ul>
		<p>All downloads are provided under the terms and conditions of the <a href="http://www.eclipse.org/legal/epl/notice.html">Eclipse Foundation Software User Agreement</a> unless otherwise specified.</p>
	</div>
<?php
}
?>
