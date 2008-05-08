<?php
$isFormatted = !isset($_GET["unformatted"]);
require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php");

$product_id = 67; # MDT 
$committers = array(
	"khussey",
	"jbruck",

	"davidms",
	"elena",
	"emerks",
	"marcelop",
	"nickb",

	"cdamus",
	"cmcgee",
	"vramaswamy",

	"dcarlson",
	"ndowler",

	"gxie",
	"lzhang",
	"mli",
	"pyue",
	"yyang",

	"mgolubev",
);
sort($committers); reset($committers);

$extra_IP = array(
);

$third_party = array(
	"LPG Java Runtime v1.0,/cvsroot/technology/org.eclipse.emft/ocl/plugins/org.eclipse.emf.ocl/lib/lpgjavaruntime.jar,Eclipse Public License Version 1.0,unmodified entire package",
	"LPG Java Runtime v1.0,/cvsroot/tools/org.eclipse.orbit/net.sourceforge.lpg.lpgjavaruntime v1_0,Eclipse Public License Version 1.0,original lpgjavaruntime.jar repackaged as an OSGi bundle",
	"LPG Java Runtime v1.1,/cvsroot/tools/org.eclipse.orbit/net.sourceforge.lpg.lpgjavaruntime v1_1,Eclipse Public License Version 1.0,original lpgjavaruntime.jar repackaged as an OSGi bundle",
);

if (!$isFormatted)
{
	header("Content-type: text/plain\n\n");
	print "Committers (Section 1)\n";
	foreach ($committers as $committer)
	{
		print $committer."\n";
	}
	print "\n";
	print "Developers (Section 2)\n";
	doIPQuery($product_id, false);
	print "\n";
	if (isset($extra_IP) && is_array($extra_IP) && sizeof($extra_IP) > 0)
	{
		print "Additional IP\n";
		foreach ($extra_IP as $ip)
		{
			print "$ip\n";
		} 
	}
	print "\n";
	print "Third Party Software (Section 3)\n";
	if (isset($third_party) && is_array($third_party) && sizeof($third_party) > 0)
	{
		foreach ($third_party as $tp)
		{
			print "$tp\n";
		}
	}
	exit;
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();
?>
<div id="midcolumn">
	<div class="homeitem3col">
		<a name="section1"></a><h3>Committers (Section 1)</h3>
		<ul>
			<li>See list at right.</li>
		</ul>
	</div>
	<div class="homeitem3col">
		<a name="section2"></a><h3>Developers (Section 2)</h3>
		<?php doIPQuery($product_id, true); ?>
		<p>
 		<?php if (isset($extra_IP) && is_array($extra_IP) && sizeof($extra_IP) > 0)
		{
			print "<a name=\"section2a\"></a><b>Additional IP</b>\n";
			print "<ul>\n";
			foreach ($extra_IP as $ip)
			{
				print "<li>$ip</li>\n";
			}
			print "</ul>\n";
		} ?>
	</div>
	<div class="homeitem3col">
		<a name="section3"></a><h3>Third Party Software (Section 3)</h3>
		<ul>
		<?php if (isset($third_party) && is_array($third_party) && sizeof($third_party) > 0)
		{
			foreach ($third_party as $tp)
			{
				print "<li>$tp</li>\n";
			}
		} 
		else
		{
			print "<li>None.</li>\n"; 
		} ?>
		</ul>
	</div>
</div>

<div id="rightcolumn">
	<div class="sideitem">
		<h6>Committers (Section 1)</h6>
		<ul>
<?php foreach ($committers as $committer) 
{
	print "<li><a href=\"/$PR/searchcvs.php?q=author:$committer\">$committer</a></li>\n";
} ?>
		</ul>
	</div>
	<div class="sideitem">
		<h6>Developers (Section 2)</h6>
		<ul>
			<li><a href="#section2">Developers (Section 2)</a></li>
			<?php if (isset($extra_IP) && is_array($extra_IP) && sizeof($extra_IP) > 0) {
				print '<li><a href="#section2a">Additional IP</a></li>'."\n";
			} ?>
		</ul>
	</div>
	<div class="sideitem">
		<h6>Third Party Software (Section 3)</h6>
		<ul>
			<li><a href="#section3">Third Party Software (Section 3)</a></li>
		</ul>
	</div>
	<div class="sideitem">
		<h6>Data</h6>
		<ul>
			<li><a href="?unformatted">View unformatted data</a></li>
		</ul>
	</div>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Model Development Tools";
$pageKeywords = "eclipse,project,graphical,modeling,model-driven";
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/index.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>