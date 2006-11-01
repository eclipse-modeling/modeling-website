<?php

/* used for sidebar entry */
$NLpacks = array(
	"2.0.x" => "NL20x",
	"1.1.x" => "NL11x",
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
			<a href="javascript:toggle('lang2_0')">2.0.x Language Packs</a><a name="NL20x"></a>
			<ul id="lang2_0">
					<?php 
					$packs = array(
						"2.0.x NLS Translation Packs" => "NLpacks-",
					);
					$cols = array(
						"UML2" => "uml2"
					);
					$subcols = array(
						"SDK" => "SDK-",
						"Runtime" => "runtime-"
					);
					$packSuf = "2.0.zip";
					$folder = "2.0.0/";
					doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder); ?>
				<li>
					<p>The language packs contain the following translations:</p>
					<ul>
						<li>NLpack1 - German, Spanish, French, Italian, Japanese, Korean, Portuguese (Brazil), Traditional Chinese, Simplified Chinese</li>
						<li>NLpack2 - Czech, Hungarian, Polish, Russian</li>
						<li>NLpack2a - Danish, Dutch, Finnish, Greek, Norwegian, Portuguese, Swedish and Turkish</li>
						<li>NLpackBidi - Arabic, Hebrew (EMF runtime only)</li>
					</ul>
					<p>Each language pack zip contains 4 other zips (one for each of the language groups above). Unpack these zips into your Eclipse directory before starting Eclipse.</p>
					<p>These translations are based on UML2 2.0.0. The NLS translation fragment packs should work with all subsequent 2.0 maintenance releases, with any new strings remaining untranslated.</p>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:toggle('lang1_1')">1.1.x Language Packs</a><a name="NL11x"></a>
			<ul id="lang1_1" style="display: none">
					<?php
					$packs = array(
						"1.1.x NLS Translation Packs" => "NLpacks-"
					);
					$cols = array(
						"UML2" => "uml2"
					);
					$subcols = array(
						"SDK" => "SDK-",
						"Runtime" => "runtime-"
					);
					$packSuf = "1.1.1.zip";
					$folder = "1.1.1/";
					doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder); ?>
				<li>
					<p>The language packs contain the following translations:</p>
					<ul>
						<li>NLpack1 - German, Spanish, French, Italian, Japanese, Korean, Portuguese (Brazil), Traditional Chinese, Simplified Chinese</li>
						<li>NLpack2 - Czech, Hungarian, Polish, Russian</li>
						<li>NLpackBidi - Arabic</li>
					</ul>
					<p>Each language pack zip contains 6 other zips (two for each of the language groups above: an NLS translation fragment pack and a feature overlay). Unpack both these zips (for every language group you need) into your Eclipse directory before starting Eclipse. In particular, the feature overlay must actually write into the existing feature directories.</p>
					<p>These translations are based on UML2 1.1.1. The NLS translation fragment packs should work with all subsequent 1.1 maintenance releases, with any new strings remaining untranslated. The feature overlays will need to be reissued for each subsequent release.</p>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:toggle('lang1_0')">1.0.x Language Packs</a><a name="NL10x"></a>
			<ul id="lang1_0" style="display: none">
					<?php
					$packs = array(
						"1.0.x NLS Translation Packs" => "NLpacks-",
					);
					$cols = array(
						"UML2" => "uml2"
					);
					$subcols = array(
						"SDK" => "SDK-",
						"Runtime" => "runtime-"
					);
					$packSuf = "1.0.2.zip";
					$folder = "1.0.2/";
					doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder, true); ?>
				<li>
					<p>The language packs contain the following translations:</p>
					<ul>
						<li>NLpack1 - German, Spanish, French, Italian, Japanese, Korean, Portuguese (Brazil), Traditional Chinese, Simplified Chinese</li>
						<li>NLpack2 - Czech, Hungarian, Polish, Russian</li>
					</ul>
					<p>Each language pack zip contains 2 zips (one for each of the language groups above). Each language pack is distributed as a feature which you can install by downloading the zip file, unzipping it into your Eclipse directory and restarting Eclipse.</p>
					<p>These translations are based on UML2 1.0.2 but should work with all subsequent 1.0 maintenance releases. If new strings are added to UML2 after 1.0.2, they will not show up as translated in the 1.0.x stream when you install this language pack.</p>
				</li>
			</ul>
		</li>
	</ul>
</div>

<?php
}

$oldrels = array(
	"1.1.0" => "200507070914",
	"1.0.3" => "200506221634",
	"1.0.2" => "200503231914",
	"1.0.1" => "200409171820",
	"1.0.0" => "200406281334"
);

function showNotes()
{
?>
	<div class="homeitem3col">
		<h3>Questions?</h3>
		<p>If you have problems downloading the drops, contact the <a href="mailto:webmaster@eclipse.org">webmaster</a>.</p>
		<p>These are the minimum required downloads for using EMF, SDO and XSD:</p>
		<ul>
			<li>To use <b class="uml2">UML2</b> alone, you require both the UML2 &amp; <a href="/emf/downloads/">EMF</a> Runtimes.</li>
			<li>To use <b class="uml2">UML2</b> w/ XSD models, you require three Runtimes: UML2, <a href="/emf/downloads/">EMF</a> &amp; <a href="/emf/downloads/">XSD</a>.</li>
		</ul>
		<p>All downloads are provided under the terms and conditions of the <a href="http://www.eclipse.org/legal/epl/notice.html">Eclipse Foundation Software User Agreement</a> unless otherwise specified.</p>
	</div>
<?php
}
?>
