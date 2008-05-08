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
	sort($committers); reset($committers);
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

$pageTitle = "Graphical Modeling Framework";
$pageKeywords = "eclipse,project,graphical,modeling,model-driven";
$pageAuthor = "Richard C. Gronback, Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/index.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>


<html>
	<head></head>
	<body>
	
Committers (Section 1)<br/>
<br/>
mgolubev<br/>
<br/>
Developers (Section 2)<br/>
<br/>
		<b>component, bug #, contributor, size, description</b><br/>
		<?php
			#
			# Scripts for retrieving IP log information.
			#
		
			# Load up the classfile
			require_once "/home/data/httpd/eclipse-php-classes/system/dbconnection_bugs_ro.class.php";
			
			# Connect to database
			$dbc 	= new DBConnectionBugs();
			$dbh 	= $dbc->connect();
								
			# NOTE: product_id = 67 is MDT, bug_status = 5 is RESOLVED, resolution = 2 is FIXED, 'contributed' keyword id = 22	
								
			$sql_info = "SELECT 
								attachments.filename,
								attachments.description,
								attachments.ispatch,
								attachments.bug_id,
								attachments.submitter_id,
								LENGTH(attach_data.thedata) AS size,
								bugs.short_desc,
								components.name,
								profiles.login_name
						FROM 
								attachments, attach_data, bugs, components, keywords, profiles
						WHERE
								attachments.ispatch = 1 AND 
								attachments.isobsolete = 0 AND
								attachments.bug_id = bugs.bug_id AND 
								attachments.attach_id = attach_data.id AND 
								components.id = bugs.component_id AND 
								bugs.bug_id = keywords.bug_id AND 
								keywords.keywordid = 22 AND 
								profiles.userid = attachments.submitter_id AND 
								bugs.product_id = 67
						ORDER BY profiles.login_name";
														
			
			$rs = mysql_query($sql_info, $dbh);
			
			if(mysql_errno($dbh) > 0) {
				echo "There was an error processing this request: " . $sql_info . " : ";
				
				# For debugging purposes - don't display this stuff in a production page.
				echo mysql_error($dbh);
				
				# Mysql disconnects automatically, but I like my disconnects to be explicit.
				$dbc->disconnect();
				exit;
			}
			
			while($myrow = mysql_fetch_assoc($rs)) {
				echo $myrow['name'] . "," . "<a href=\"https://bugs.eclipse.org/bugs/show_bug.cgi?id=" . $myrow['bug_id'] . "\">" . $myrow['bug_id'] . "</a>" . "," . $myrow['login_name'] . "," . $myrow['size'] . "," . str_replace(",", " ", $myrow['short_desc']) . " (" . str_replace(",", " ", $myrow['description']) . ")<br/>";
			}
			
			$dbc->disconnect();
		
			$rs 		= null;
			$dbh 		= null;
			$dbc 		= null;
		?>
<br/>	
Third Party Software (Section 3)<br/>
<br/>
None
	</body>
</html>