<?php

$numzips = $numzips - 1; // the editor zip is new, so don't require it

/* used for sidebar entry */
$NLpacks = array(
	"0.7.x" => "NLS0.7.x"
);

$oldrels = array(
	"JET 0.7.2" => array("2007/02/08 11:15","http://archive.eclipse.org/modeling/m2t/jet/downloads/drops/0.7.2/R200702081115/"),
	"JET 0.7.1" => array("2006/09/21 08:20","http://archive.eclipse.org/modeling/m2t/jet/downloads/drops/0.7.1/R200609210820/"),
	"JET 0.7.0" => array("2006/06/26 09:42","http://archive.eclipse.org/modeling/m2t/jet/downloads/drops/0.7.0/R200606260942/"),
	null,
	"JET Editor 0.8.0" => array("2007/03/03 00:36","http://archive.eclipse.org/modeling/m2t/jet/downloads/drops/0.8.0/I200703030036/"),
	"JET Editor 0.7.2" => array("2007/01/04 22:00","http://archive.eclipse.org/modeling/m2t/jet/downloads/drops/0.7.2/M200701042200/"),
	"JET Editor 0.7.0" => array("2006/10/05 02:45","http://archive.eclipse.org/modeling/m2t/jet/downloads/drops/0.7.0/R200610050245/")
);

function doLanguagePacks()
{
	global $downloadScript, $downloadPre;
	
?>
<div class="homeitem3col">
	<a name="NLS"></a>
	
	<h3>Language Packs</h3>

	<p>IBM is pleased to contribute translations for the Eclipse Modeling To Text (M2T) subcomponent JET.</p>
	<ul>
		<li>
			<a href="javascript:toggle('lang0_7')">0.7.x Language Packs</a><a name="NLS0.7.x"></a>
			<ul id="lang0_7">
					<?php
					$packs = array(
						"0.7.x NLS Translation Packs" => "NLpacks-",
					);
					$cols = array(
						"JET" => "jet"
					);
					$subcols = array(
						"SDK" => "SDK-0.7.0",
						"Runtime" => "runtime-0.7.0"
					);
					$packSuf = ".zip";
					$folder = "NLS/0.7/";
					doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder, false); ?>
				<li>

					<p>The language packs contain NL fragments and features for:</p>
					<ul>
						<li>NLpack1 - German, Spanish, French, Italian, Japanese, Korean, Portuguese (Brazil), Traditional Chinese, Simplified Chinese</li>
						<li>NLpack2 - Czech, Hungarian, Polish, Russian</li>
						<li>NLpack2a - Danish, Dutch, Finnish, Greek, Norwegian, Portuguese, Swedish and Turkish</li>
						<li>NLpackBidi - Arabic</li>
					</ul>
					<p>Each language pack zip contains 4 other zips (one for each of the language groups above). Unpack these zips into your Eclipse directory before starting Eclipse.</p>
					<p>These translations are based on JET 0.7.0. The NLS translation fragment packs should work with all subsequent 0.7.x maintenance releases, with any new strings remaining untranslated.</p>
				</li>
			</ul>
		</li>
	</ul>
</div>

<?php
}

function showNotes()
{
?>
	<div class="homeitem3col">
		<h3>Questions?</h3>
		<p>If you have problems downloading the drops, contact the <a href="mailto:webmaster@eclipse.org">webmaster</a>.</p>
		<p>These are the minimum required downloads for using JET:</p>
		<ul>
			<li>To use JET, you require both the JET &amp; <a href="/modeling/emf/downloads/?project=emf">EMF</a> Runtimes.</li>
		</ul>
		<p>All downloads are provided under the terms and conditions of the <a href="http://www.eclipse.org/legal/epl/notice.html">Eclipse Foundation Software User Agreement</a> unless otherwise specified.</p>
	</div>
<?php
}
?>
