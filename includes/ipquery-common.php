<?php # Script for retrieving IP log information.

# for database schema, see: https://dev.eclipse.org/committers/committertools/dbo_bugs_schema.php

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
$bugClass="/home/data/httpd/eclipse-php-classes/system/dbconnection_bugs_ro.class.php";
if (is_file("$bugClass")) require_once "$bugClass";

$showobsolete = isset($_GET["showobsolete"]);
$isFormatted = !isset($_GET["unformatted"]);
$debug = isset($_GET["debug"]);
$sortBy = isset($_GET["sortBy"]) && preg_match("#component|bugid|contact|size#", $_GET["sortBy"], $m) ? $m[0] : "bugid";

$components = array();
if (isset($_GET["component"]))
{
	$components = array(preg_replace("#[%\\\"\';]+#", "", urldecode($_GET["component"])));
}
else if (isset($_GET["components"]))
{
	$components = $_GET["components"];
	foreach ($components as $i => $c)
	{
		$components[$i] = preg_replace("#[%\\\"\';]+#", "", urldecode($c));
	}
}

$showbuglist = isset($_GET["showbuglist"]);
if ($showbuglist) 
{
	$sortBy = "bugid";
}
 
function getComponentQueryString()
{
	global $components;
	$componentQueryString = "";
	foreach ($components as $component)
	{
		$componentQueryString .= "&amp;components[]=" . urlencode($component);	
	}
	return $componentQueryString;
}

function doIPQuery()
{
	global $bugClass, $product_id, $sortBy, $components, $showbuglist, $showobsolete;
	$data = array();
	if (!is_file($bugClass)) 
	{
		print "<li><b style='color:red'>Error: could not query Bugzilla database.</b></li>";
	}
	else
	{
	
		$componentSQL = "";
		foreach ($components as $component)
		{
			$componentSQL .= $componentSQL ? "OR " : ""; 
			$componentSQL .= "components.name = '$component' ";	
		}
		$componentSQL = $componentSQL ? "(" . $componentSQL . ") AND " : "";

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

		$order = "$sortBy ASC";
		$queries = array( 
					"(SELECT 
							attachments.description,
							attachments.ispatch,
							attachments.isobsolete,
							LENGTH(attach_data.thedata) AS size,
							bugs.bug_id AS bugid,
							profiles.userid,
							bugs.short_desc,
							components.name as component,
							profiles.login_name AS contact
					FROM 
							attachments, attach_data, bugs, components, keywords, profiles 
					WHERE
							attachments.ispatch = 1 AND
							" . (!$showobsolete ? "attachments.isobsolete = 0 AND " : "") . "
							attachments.bug_id = bugs.bug_id AND 
							attachments.attach_id = attach_data.id AND 
							components.id = bugs.component_id AND
							" . $componentSQL . " 
							bugs.bug_id = keywords.bug_id AND 
							keywords.keywordid = 22 AND 
							profiles.userid = attachments.submitter_id AND 
							bugs.product_id = $product_id)
					UNION  
					(SELECT 
							longdescs.thetext AS description,
							1 AS ispatch,
							0 AS isobsolete,
							0 AS size,
							bugs.bug_id AS bugid,
							profiles.userid,
							bugs.short_desc,
							components.name AS component,
							longdescs.thetext AS contact
					FROM 
							longdescs, bugs, components, keywords, profiles 
					WHERE
							components.id = bugs.component_id AND   
							" . $componentSQL . " 
							bugs.bug_id = keywords.bug_id AND 
							keywords.keywordid = 22 AND 
							bugs.product_id = $product_id AND 
							profiles.userid = longdescs.who AND 
							longdescs.bug_id = bugs.bug_id AND 
							longdescs.thetext like '%[contrib %email=%]%')
					ORDER BY
							$order");
													
		foreach ($queries as $query)
		{
			$rs = mysql_query($query, $dbh);
			
			if(mysql_errno($dbh) > 0) {
				echo "<li><b style='color:red'>There was an error processing this request: " . $query . " : " .  mysql_error($dbh) . "</b></li>\n";
				$dbc->disconnect();
				exit;
			}
		
			while($myrow = mysql_fetch_assoc($rs))
			{
				$data[] = $myrow;
			}
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
	global $sortBy, $showobsolete;
	$componentQueryString = getComponentQueryString();
	$cnt = 0;
	if ($isFormatted)
	{	
		print "		<table>\n			<tr>" .
				"<th><acronym title=\"click to sort\"><a" . ($sortBy == "component" ? " style='text-decoration:underline'" : "") . " href='?sortBy=component" . $componentQueryString . ($showobsolete ? "&amp;showobsolete" : "") . "'>Component</a></acronym></th>" .
				"<th><acronym title=\"click to sort\"><a" . ($sortBy == "bugid" ? " style='text-decoration:underline'" : "") . " href='?sortBy=bugid" . $componentQueryString . ($showobsolete ? "&amp;showobsolete" : "") . "'>Bug #</a></acronym></th>" .
				"<th><acronym title=\"click to sort\"><a" . ($sortBy == "contact" ? " style='text-decoration:underline'" : "") . " href='?sortBy=contact" . $componentQueryString . ($showobsolete ? "&amp;showobsolete" : "") . "'>Contributor</a></acronym></th>" . 
				"<th><acronym title=\"click to sort\"><a" . ($sortBy == "size" ? " style='text-decoration:underline'" : "") . " href='?sortBy=size" . $componentQueryString . ($showobsolete ? "&amp;showobsolete" : "") . "'>Size</a></acronym></th>" . 
				"<th>Description</th></tr>\n";
	}
	$bgcol = "#FFFFEE";
	$prevDesc = "";
	foreach ($data as $myrow)
	{
		$cnt++;
		if ($isFormatted)
		{
			if ($myrow['short_desc'] != $prevDesc)
			{	
				$bgcol = $bgcol == "#EEEEFF" ? "#FFFFEE" : "#EEEEFF";
			}
			list($shortname, $email) = getContributor($myrow['contact']);
			print "<tr bgcolor=\"$bgcol\" align=\"top\">" .
					"<td><acronym title=\"click to filter/unfilter\"><a style=\"font-size:8px;" . ($componentQueryString && strstr($componentQueryString, $myrow['component'])!==false ? "text-decoration:underline" : "") . "\" href=\"?sortBy=$sortBy" . ($showobsolete ? "&amp;showobsolete" : "") . 
					(strstr($componentQueryString, $myrow['component'])!==false ? str_replace("&amp;component=" . urlencode($myrow['component']), "", $componentQueryString) : $componentQueryString) . "\">" . $myrow['component'] . "</a></acronym></td>" .
					"<td nowrap=\"nowrap\">" . doBugLink($myrow['bugid']) . "</td>" .
					"<td><acronym title=\"" . $email . "\">$shortname</acronym></td>" .
					"<td>" . (isset($myrow['size']) && $myrow['size'] ? pretty_size($myrow['size']) : "") . "</td>" .
					"<td width=\"99%\">" . "<small style=\"font-size:8px\">" .  
						($myrow['short_desc'] != $prevDesc ? preg_replace("#(\d{5,6})#", doBugLink("$1"), str_replace(",", " ", $myrow['short_desc'])) : "") . 
						(isset($myrow['description']) && $myrow['description'] ? ($myrow['short_desc'] != $prevDesc ? "<br/>" : "") . "&#160;&#160;&#149;&#160;" . (isset($myrow['isobsolete']) && $myrow['isobsolete'] ? "<strike>" : "") . preg_replace("#(\d{5,6})#", doBugLink("$1"), str_replace(",", " ", $myrow['description'])) : "") . 
					(isset($myrow['isobsolete']) && $myrow['isobsolete'] ? "</strike> (obsolete patch)" : "") . "</small></td>" .
				  "</tr>\n";
			$prevDesc = $myrow['short_desc'];
		}
		else
		{
			list($shortname, $email) = getContributor($myrow['contact']);
			print $myrow['component'] . "," . $myrow['bugid'] . "," . $email . 
				"," . (isset($myrow['size']) && $myrow['size'] ? $myrow['size'] : "") . 
				"," . str_replace(",", " ", $myrow['short_desc']) . 
				(isset($myrow['description']) && $myrow['description'] ? " (" . preg_replace("/[,\n]+/", " ", $myrow['description']) . ")" : "") .
				(isset($myrow['isobsolete']) && $myrow['isobsolete'] ? " [obsolete patch]" : "") . 
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
						
	$query = "SELECT 
					products.id, 
					products.name
			FROM 
					products 
			ORDER BY
					products.id";
	
	$rs = mysql_query($query, $dbh);
	
	if(mysql_errno($dbh) > 0) {
		echo "There was an error processing this request: " . $query . " : ";
		
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
	global $incubating, $isFormatted, $showbuglist, $components, $showobsolete, $sortBy, $committers, $product_id, $extra_IP, $third_party, $theme, $PR, $App, $Menu, $Nav; 
	sort($committers); reset($committers);

	$componentQueryString = getComponentQueryString();

	if ($showbuglist)
	{
		header("Content-type: text/plain\n\n");
		$bugs = array();
		foreach (doIPQuery() as $myrow)
		{
			$pair = array($myrow['bugid'], $myrow['short_desc']);
			if (!in_array($pair, $bugs))
			{
				$bugs[] = $pair;
			}
		}
		foreach ($bugs as $bug)
		{
			print $bug[0] . "\t" . $bug[1] . "\n";
		}
		print "\n" . sizeof($bugs) . " bugs total.\n";
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
	
		<h1><?php print $projectName; ?> IP Log</h1>
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
				$hasComponent = false;
				foreach ($third_party as $tp)
				{
					$bits = explode(",", $tp);
					if (isset($bits[5]))
					{
						$hasComponent = true;
						break;
					}
				}
					
				print "<table>\n" .
						"<tr>" . ($hasComponent ? "<th>Component</th>" : "") . "<th>Name</th><th>Location</th><th>License</th><th>Usage</th><th><acronym title=\"Contribution Questionnaires, if known\">CQ</acronym></tr>\n";
				$bgcol = "#FFFFEE";
				foreach ($third_party as $tp)
				{
					$bits = explode(",", $tp);
					$bgcol = $bgcol == "#EEEEFF" ? "#FFFFEE" : "#EEEEFF";
					if (sizeof($components) < 1 || (isset($bits[5]) && in_array(trim($bits[5]), $components)))
					{
						print "<tr bgcolor=\"$bgcol\" align=\"top\">" .
							($hasComponent ? "<td>" . (isset($bits[5]) ? "<a href=\"http://www.eclipse.org/$PR/?project=" . trim($bits[5]) . "\">" . trim($bits[5]) . "</a>" : "") . "</td>" : "") .
							"<td>" . (isset($bits[4]) ? cqlink(trim($bits[4]), $bits[0]) : $bits[0]) . "</td>" .
							"<td>" . pretty_print($bits[1], "/", 1) . "</td>" .
							"<td>" . $bits[2] . "</td>" .
							"<td>" . (isset($bits[3]) ? pretty_print($bits[3], " ", 2) : "") . "</td>" .
							"<td align=\"right\">" . (isset($bits[4]) ? cqlink(trim($bits[4])) : "?") . "</td>" .
							"</tr>\n";
					}
				}
				print "</table>";
			} 
			else
			{
				print "<li>None.</li>\n"; 
			} ?>
			</ul>
		</div>
	</div>
	
	<div id="rightcolumn">
	
<?php if (isset($incubating)) { ?>
	<div class="sideitem">
	   <h6>Incubation</h6>
	   <p>Some components are currently in their <a href="http://www.eclipse.org/projects/dev_process/validation-phase.php">Validation (Incubation) Phase</a>.</p>
	   <div align="center"><a href="http://www.eclipse.org/projects/what-is-incubation.php"><img
	        align="center" src="http://www.eclipse.org/images/egg-incubation.png"
	        border="0" /></a></div>
	 </div>
<?php } ?>	
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
			<a name="Note"></a><h6>Data Filters</h6>
			<ul>
<?php			if (!$showobsolete) { 
					print '<li><a href="?showobsolete'  . $componentQueryString . '&amp;sortBy=' . $sortBy . '">Show Obsolete Patches</a></li>';
				} 
				else
				{
					print '<li><a href="?' . $componentQueryString . '&amp;sortBy=' . $sortBy . '">Hide Obsolete Patches</a></li>';
				}?>
				<p>
				<li><a href="?unformatted<?php print ($showobsolete ? "&amp;showobsolete" : "") . $componentQueryString . '&amp;sortBy=' . $sortBy; ?>">View unformatted data</a></li>
				<li><a href="?showbuglist<?php print ($showobsolete ? "&amp;showobsolete" : "") . $componentQueryString . '&amp;sortBy=' . $sortBy; ?>">View bugs only</a></li>
			</ul>
		</div>
		<div class="sideitem">
			<a name="Note"></a><h6>Data Inclusion</h6>
			
			<p>Note that this data is only as accurate as the 
			<a href="http://wiki.eclipse.org/index.php/GMF_Development_Guidelines#Committing_a_Contribution">process used to collect it</a>.
			 To appear in this list, a contribution must: (1) have a related bug, (2) include a <i>patch</i> type attachment, and (3) bear the <i>contributed</i> keyword. 
			 
			 <p>For older bugs that do not follow the above convention, you can also tag a contribution by entering a <i>[contrib email="..."/]</i> comment in a bug, or add some <i>Additional IP</i> <a href="http://www.eclipse.org/modeling/gmf/project-info/ipquery.php#section2a">like this</a>.

			 <p>If you see an omission and cannot correct it yourself,  
			 <a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=modeling&component=Website">please report it</a>.
			</p>
		</div>
	</div>
	
	<?php
	$html = ob_get_contents();
	ob_end_clean();
	
	$pageTitle= "Eclipse Modeling - " . ($projectName && $projct != "modeling" ? $projectName . " -" : "") . " IP Log";
	$pageKeywords = "eclipse,project,modeling,IP";
	$pageAuthor = "Nick Boldt";
	
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/index.css"/>' . "\n");
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
}

function pretty_size($bytes)
{
	$sufs= array (
		"B",
		"K",
		"M",
		"G",
		"T",
		"P"
	); //we shouldn't be larger than 999.9 petabytes any time soon, hopefully
	$suf= 0;
	while ($bytes >= 1000)
	{
		$bytes /= 1024;
		$suf++;
	}
	return sprintf("%3.1f%s", $bytes, $sufs[$suf]);
}

# return a string condensed down the the last $num pieces, split by $split, and wrapped with its full value as an <acronym>
function pretty_print($in, $split, $num)
{
	$bits = explode($split, $in);
	$out = ""; 
	for ($i=sizeof($bits) - $num; $i<sizeof($bits); $i++)
	{
		if ($out)
		{
			$out .= $split;
		}
		$out .= $bits[$i];
	}
	return "<acronym title=\"$in\">$out</acronym>";
}

function cqlink($num, $label = "")
{
	return "<acronym title=\"Contribution Questionnaire #$num\"><a href=\"https://dev.eclipse.org/ipzilla/show_bug.cgi?id=$num\">" . ($label ? $label : $num) . "</a></acronym>";
}
?>