<?php # Script for retrieving IP log information.

# for database schema, see: https://dev.eclipse.org/committers/committertools/dbo_bugs_schema.php

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
$bugClass="/home/data/httpd/eclipse-php-classes/system/dbconnection_bugs_ro.class.php";
if (is_file("$bugClass")) require_once "$bugClass";

$isFormatted = !isset($_GET["unformatted"]);
$attachmentsOnly = !isset($_GET["allcontribs"]);
$debug = isset($_GET["debug"]);
$sortBy = isset($_GET["sortBy"]) && preg_match("#components.name|bugs.bug_id|contact|size#", $_GET["sortBy"], $m) ? $m[0] : "contact";
$showbuglist = isset($_GET["showbuglist"]);
 
function doIPQuery()
{
	global $bugClass, $product_id, $sortBy, $showbuglist, $attachmentsOnly;
	$data = array();
	if (!is_file($bugClass)) 
	{
		print "<li><b style='color:red'>Error: could not query Bugzilla database.</b></li>";
	}
	else
	{
	
		# Connect to database
		$dbc 	= new DBConnectionBugs();
		$dbh 	= $dbc->connect();
							
		# NOTE: bug_status = 5 is RESOLVED, resolution = 2 is FIXED, 'contributed' keyword id = 22
		# for product_id, use:	
		# 8, EMF
		# 12, GMT
		# 29, GMF
		# 40, MDDi
		# 42, EMFT
		# 63, Modeling
		# 67, MDT
		# 71, M2M
		# 87, M2T
		# 105, Amalgam
		# 106, TMF

		# TODO: provide a non-attachment based query -- just bugs for which there's a contributed keyword and a comment defining the commit size?
		
		$order = "$sortBy ASC";
		$sql_info = $attachmentsOnly ? 
					"SELECT 
							attachments.description,
							attachments.ispatch,
							LENGTH(attach_data.thedata) AS size,
							bugs.bug_id,
							profiles.userid,
							bugs.short_desc,
							components.name,
							profiles.login_name AS contact
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
							bugs.product_id = $product_id
					ORDER BY
							$order" : 
					"SELECT 
							longdescs.thetext AS description,
							bugs.bug_id,
							profiles.userid,
							bugs.short_desc,
							components.name,
							longdescs.thetext AS contact
					FROM 
							longdescs, bugs, components, keywords, profiles 
					WHERE
							components.id = bugs.component_id AND 
							bugs.bug_id = keywords.bug_id AND 
							keywords.keywordid = 22 AND 
							bugs.product_id = $product_id AND
							profiles.userid = longdescs.who AND
							longdescs.bug_id = bugs.bug_id AND
							longdescs.thetext like '%[contrib %]%'
					ORDER BY
							$order";
													
		
		$rs = mysql_query($sql_info, $dbh);
		
		if(mysql_errno($dbh) > 0) {
			echo "<li><b style='color:red'>There was an error processing this request: " . $sql_info . " : " .  mysql_error($dbh) . "</b></li>\n";
			$dbc->disconnect();
			exit;
		}
	
		while($myrow = mysql_fetch_assoc($rs)) 
		{
			$data[] = $myrow;
		}

		$dbc->disconnect();
		
		$rs 		= null;
		$dbh 		= null;
		$dbc 		= null;
	}
	return $data;
}

function printIPQuery($data, $isFormatted = true)
{
	global $sortBy, $attachmentsOnly;
	$cnt = 0;
	if ($isFormatted)
	{	
		print "		<table>\n			<tr>" .
				"<th><a" . ($sortBy == "components.name" ? " style='text-decoration:underline'" : "") . " href='?sortBy=components.name'>Component</a></th>" .
				"<th><a" . ($sortBy == "bugs.bug_id" ? " style='text-decoration:underline'" : "") . " href='?sortBy=bugs.bug_id'>Bug #</a></th>" .
				"<th><a" . ($sortBy == "contact" ? " style='text-decoration:underline'" : "") . " href='?sortBy=contact'>Contributor</a></th>" . 
				($attachmentsOnly ? "<th><a" . ($sortBy == "size" ? " style='text-decoration:underline'" : "") . " href='?sortBy=size'>Size</a></th>" : "") . 
				"<th>Description</th></tr>\n";
	}
	$bgcol = "#FFFFEE";
	foreach ($data as $myrow)
	{
		$cnt++;
		if ($isFormatted)
		{	
			$bgcol = $bgcol == "#EEEEFF" ? "#FFFFEE" : "#EEEEFF";
			list($shortname, $email) = getContributor($myrow['contact']);
			print "<tr bgcolor=\"$bgcol\" align=\"top\">" .
					"<td><small style=\"font-size:8px\">" . $myrow['name'] . "</small></td>" .
					"<td nowrap=\"nowrap\">" . doBugLink($myrow['bug_id']) . "</td>" .
					"<td><acronym title=\"" . $email . "\">$shortname</acronym></td>" .
					($attachmentsOnly ? "<td>" . (isset($myrow['size']) && $myrow['size'] ? $myrow['size'] : "") . "</td>" : "") .
					"<td width=\"99%\"><small style=\"font-size:8px\">" . 
						preg_replace("#(\d{5,6})#", doBugLink("$1"), str_replace(",", " ", $myrow['short_desc']) . (isset($myrow['description']) && $myrow['description'] ? "<br/>" . str_replace(",", " ", $myrow['description']) : "")) . 
					"</small></td>" .
				  "</tr>\n";
		}
		else
		{
			list($shortname, $email) = getContributor($myrow['contact']);
			print $myrow['name'] . "," . $myrow['bug_id'] . "," . $email . 
				($attachmentsOnly ? "," . (isset($myrow['size']) && $myrow['size'] ? $myrow['size'] : "") : "") . 
				"," . str_replace(",", " ", $myrow['short_desc']) . 
				(isset($myrow['description']) && $myrow['description'] ? " (" . preg_replace("/[,\n]+/", " ", $myrow['description']) . ")" : "") . 
				"\n";
		}
	}
	if ($isFormatted)
	{	
		print "		</table>\n";
	}
	return $cnt;
}

function doBugLink($id)
{
	return "<a href=\"/modeling/searchcvs.php?q=" . $id . "\"><img src=\"/modeling/images/delta.gif\" border=\"0\" alt=\"Search CVS for bug " . $id . "\"></a>&#160;" .  
		   "<a href=\"https://bugs.eclipse.org/bugs/show_bug.cgi?id=" . $id . "\">" . $id . "</a>";
}

function getContributor($in)
{
	global $debug; 
	if ($debug) echo "Processing {{ $in }}<br/>";
	if (strpos($in, "@") !== false && strpos($in, "[") === false)
	{
		$email = $in;
		if ($debug) print "Got \$email = $email<br/>";
	}
	else
	{
		$chunks = explode(" ", str_replace("\n", " ", $in));
		foreach ($chunks as $chunk)
		{
			if ($debug) echo "Processing {$chunk}<br/>";
			if (strpos($chunk, "email=") !== false)
			{
				$email = explode("=", $chunk); $email = $email[1];
				$email = preg_replace("#[/\"\]]+#","",$email); # trim out "/]
				if ($debug) print "<b style='color:green'>Got \$email = $email</b><br/>";
				break;
			}
		}
	}
	$shortname = explode("@", $email); $shortname = $shortname[0];
	if ($debug) print "<b style='color:green'>Got \$shortname = $shortname</b><br/>";
	return array($shortname, $email);
}

function doProductIDQuery()
{
	# Connect to database
	$dbc 	= new DBConnectionBugs();
	$dbh 	= $dbc->connect();
						
	$sql_info = "SELECT 
					products.id, 
					products.name
			FROM 
					products 
			ORDER BY
					products.id";
	
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
		print $myrow['id'] . ", " . $myrow['name'] . "\n";
	}
	
	$dbc->disconnect();
	
	$rs 		= null;
	$dbh 		= null;
	$dbc 		= null;
}

function doIPQueryPage()
{
	global $isFormatted, $attachmentsOnly, $showbuglist, $committers, $product_id, $extra_IP, $third_party, $theme, $PR, $App, $Menu, $Nav; 
	sort($committers); reset($committers);

	if ($showbuglist)
	{
		header("Content-type: text/csv\n\n");
		$bugs = array();
		foreach (doIPQuery() as $myrow)
		{
			$bugs[] = $myrow['bug_id'];
		}
		print join(",", $bugs) . "\n";
		exit;
	}	
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
		printIPQuery(doIPQuery(), false);
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
	
	$projct= preg_replace("#.+/#", "", $PR);
	$projectName = $projct != "modeling" ? strtoupper($projct) : "Modeling Project";
	
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
			<?php $cnt = printIPQuery(doIPQuery(), true); ?>
			<p align="right"><?php echo $cnt; ?> records found.</p> 
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
			<a name="Note"></a><h6>Data</h6>
			
			<p>Note that this data is only as accurate as the 
			<a href="http://wiki.eclipse.org/index.php/GMF_Development_Guidelines#Committing_a_Contribution">process used to collect it</a>.
			 To appear in this list, a contribution must: (1) include a patch, (2) attached to a bug, (3) bearing the <i>contributed</i> keyword. If you see an omission and cannot correct it yourself,  
			 <a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=modeling&component=Website">please report it</a>.
			</p>

			<ul>
				<li><a href="?unformatted<?php print $attachmentsOnly ? "&amp;allcontribs" : "" ?>">View unformatted data</a></li>
			</ul>
			</ul>
		</div>
	</div>
	
	<?php
	$html = ob_get_contents();
	ob_end_clean();
	
	$pageTitle= "Eclipse Modeling - " . ($projectName ? $projectName . " -" : "") . " IP Log";
	$pageKeywords = "eclipse,project,modeling,IP";
	$pageAuthor = "Nick Boldt";
	
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/index.css"/>' . "\n");
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
}
?>