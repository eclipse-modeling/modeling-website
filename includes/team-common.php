<?php
/* See also /modeling/includes/team-common.sql for database schema
 * 
 * Bjorn has asked for data like this:
 * 
 * project   component   comma,separated,list,of,committer,login,names
 * 
 * => SELECT project, component, committerid FROM teams NATURAL JOIN developers;
 */
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App= new App(); $Nav= new Nav(); $Menu= new Menu(); include ($App->getProjectCommon());

include ($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");
$projct= preg_replace("#.+/#", "", $PR); 

if (isset($_GET["export"]) && $_GET["export"] && $_GET["export"] == "project,component,committerid") // other formats TBD
{
	$query = "SELECT project,component,committerid FROM teams NATURAL JOIN developers NATURAL JOIN groups " .   
		//"WHERE " . ($projct == "emft" ? "groupname like 'emft%' " : "project LIKE '%$projct' ") . 
		"ORDER BY project,component,SUBSTRING_INDEX(Name,' ',-1)"; // by last name 
	
	$result= wmysql_query($query);
	$data = array();
	if ($result && mysql_num_rows($result) > 0)
	{
		while ($row = mysql_fetch_row($result))
		{
			if (!isset($data[$row[0]."\t".$row[1]."\t"])) 
			{
				$data[$row[0]."\t".$row[1]."\t"] = array();
			}
			$data[$row[0]."\t".$row[1]."\t"][$row[2]] = $row[2];
		}
	}
	print "<pre>\n";
	foreach ($data as $a => $b)
	{
		print $a;
		$cnt=0;
		foreach ($b as $c)
		{
			if ($c)
			{
				if ($cnt > 0)
				{ 
					print ",";
				}
				print $c;
				$cnt++;
			}
		}
		print "\n";
	}
	print "</pre>\n";
	exit;
}
else
{
	$projectName = strtoupper($projct);
	
	$data1 = getDevelopers(true);
	$data2 = getDevelopers(false);
	
	ob_start();
	$pageTitle= "Meet The Team";
	print<<<EOHTML
<div id="midcolumn">
	<h1>Meet The $projectName Team</h1>

EOHTML;
	if ($data1)
	{
	print<<<EOHTML
	<div class="homeitem3col">
	<h3>Committers</h3>
	$data1
	</div>

EOHTML;
	}
	if ($data2)
	{
	print<<<EOHTML
	<div class="homeitem3col">
	<h3>Contributors</h3>
	$data2
	</div>

EOHTML;
	}
	print<<<EOHTML
</div>

<div id="rightcolumn">
	<div class="sideitem">
		<h6>Submit Yourself</h6>
		<p>Not on this list? Information wrong or missing? Attach your details and a photo (or URL) to <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=182613#c11">bug 182613</a>.</p>
	</div>
	<div class="sideitem">
		<h6>Export Data</h6>
		<p>To export the Project, Component &amp; Committerid data as tabbed text, <a href="?export=project,component,committerid">click here</a>.</p>
	</div>
</div>

EOHTML;
}

$html= ob_get_contents();
ob_end_clean();
$pageTitle= "Modeling - " . ($projectName ? $projectName . " -" : "") . " Meet The Team";
$pageKeywords= "";
$pageAuthor= "Nick Boldt";
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="http://' . ($isBuildServer ? $_SERVER["SERVER_NAME"] : "www.eclipse.org") . '/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

function getDevelopers($hasCommitterID = true)
{
	global $projct;
	$query= "SELECT DISTINCT Name, Role, Company, Location, Website, PhotoURL FROM developers NATURAL JOIN groups NATURAL JOIN teams " .
			"WHERE committerid IS " . ($hasCommitterID ? "NOT" : "") . " NULL AND " .
			($projct == "emft" ? "groupname like 'emft%' " : "project LIKE '%$projct' ") . 
			"ORDER BY SUBSTRING_INDEX(Name,' ',-1)"; // by last name 
	$result= wmysql_query($query);
	$groups= array ();
	$data = "";
	if ($result && mysql_num_rows($result) > 0)
	{
		$data .= '<p><table border="0" width="100%"><tr >' . "\n";
		$cnt= 0;
		while ($row = mysql_fetch_row($result))
		{
			# [did, CommitterID, Name, Email, Role, Company, Location, Website, PhotoURL]
			$data .= '<td width="33%" height="200" align="center" valign="bottom">' .
				($row[5] && (preg_match("#https+://#", $row[5]) || is_file($_SERVER['DOCUMENT_ROOT'] . $row[5])) ? 
					'<img border="0" src="' . $row[5] . '" style="" height="120"/>' : '<img border="0" src="/modeling/images/team/eclipseface.png"/>') .
					"<br/>" . 
				($row[4] ? '<a href="' . $row[4] . '">' . $row[0] . '</a>' : $row[0]) .	'<br/>' .
				($row[1] ? $row[1] . "<br/>" : "") . 
				($row[2] ? $row[2] . "<br/>" : "") .
				($row[3] ? $row[3] . "<br/>" : "") .
				'</td>' . "\n";
			$cnt++;
			if ($cnt % 3 == 0)
			{
				$data .= "</tr><tr>\n";
			}
		}
		while ($cnt %3 != 0)
		{
			$data .= '<td width="33%" height="200" align="center" valign="bottom">&#160;</td>' . "\n";
			$cnt++;
		}
		$data .= "</tr></table>\n";
	}
	return $data;
}
?>