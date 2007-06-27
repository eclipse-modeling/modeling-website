<?php
/* see /modeling/includes/team-common.sql for database schema */

# set this to false to allow this script to work on build.eclipse for database admin
$disabled = 0;# true;

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

if (!function_exists("internalUseOnly"))
{
		print "Script disabled: see /modeling/\$projectName/project-info/teamAdmin.php."; exit;
}
internalUseOnly();

include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

ob_start();

$data = "";
$projct = preg_replace("#.+/#","",$PR);

$existingGroups = array();
if (isset($_GET["groups"]) && $_GET["groups"])
{
	foreach ($_GET["groups"] as $gr)
	{
		$existingGroups[] = $gr;
	}
	
}

if (isset($_GET["did"]))
{
	$query = "SELECT groupname FROM teams WHERE did = ".$_GET["did"];  
	$result = wmysql_query($query);
	while ($row = mysql_fetch_row($result))
	{
		$existingGroups[] = $row[0];
	}
}

$query = "SELECT did,name FROM developers ORDER BY SUBSTRING_INDEX(Name,' ',-1)"; // by last name
$result = wmysql_query($query);
$dids = array();
if ($result)
{
	$data .= '<p><select size="8" name="did" onchange="document.location.href=\'?did=\' + this.options[this.selectedIndex].value">'."\n";
	while ($row = mysql_fetch_row($result))
	{
		$data .= "<option " . (isset($_GET["did"]) && $_GET["did"]===$row[0] ? "selected ":"") . "value=\"".$row[0]."\">".$row[1]."</option>\n";
		$dids[$row[0]] = $row[1];
	}
	$data .= '</select></p>'."\n";
} 
else
{
	$data .= "<pre>Error: could not connect to database!\n";
	$data .= "\nQuery was:\n\n$query</pre>\n";
}

$query = "SELECT groupname,path FROM groups" .
		($projct != "modeling" ? " WHERE " . ($projct == "emft" ? "groupname like 'emft%' OR project like '%emft'" : "project LIKE '%$projct' ") . " OR " . "project like '%modeling'" : "") .
		" ORDER BY groupname,path";
$result = wmysql_query($query);
$groups = array();
if ($result)
{
	$data .= '<p><select size="12" multiple="multiple" name="groups[]">'."\n";
	while ($row = mysql_fetch_row($result))
	{
		$data .= "<option " . (isset($_GET["groups"]) && in_array($row[0],$_GET["groups"]) ? "selected ":"") . "value=\"".$row[0]."\">[".(in_array($row[0],$existingGroups) ? "x" : " ")."] ".$row[0]." : ".$row[1]."</option>\n";
		$groups[] = $row[0];
	}
	$data .= '</select></p>'."\n";
} 
else
{
	$data .= "<pre>Error: could not connect to database!\n";
	$data .= "\nQuery was:\n\n$query</pre>\n";
}

$groupnames = null;
if (isset($_GET["groups"]) && $_GET["groups"])
{
	foreach ($_GET["groups"] as $gr)
	{
		if (in_array($gr, $groups))
		{
			$groupnames[] = $gr;
		}
	}
}
$userid = isset($_GET["did"]) && $_GET["did"] && in_array($_GET["did"], array_keys($dids))? $_GET["did"] : null;

if ($disabled)
{
	print "<blockquote><b style=\"color:red\">Not authorized to alter database. Contact codeslave{at}ca{dot}ibm{com}.</b></blockquote>";
} 
else if ($groupnames && $userid) // page two 
{
	foreach ($groupnames as $groupname)
	{
		$query = "INSERT INTO teams (groupname,did) VALUES ('$groupname', $userid)";
		$result = wmysql_query($query);
		if (mysql_affected_rows($connect)>0)
		{
			print "User ".$dids[$userid]." added to group '$groupname'.<br/>";
		}
		else
		{
			#$data .= "<pre>Error: could not insert data into database: ".mysql_error($connect)."!\n";
			#$data .= "\nQuery was:\n\n$query</pre>\n";
		}
	}
}

$pageTitle = "Developer Group Administration";
print <<<EOHTML
<div id="maincontent">
	<div id="midcolumn">
		<h1>$pageTitle</h1>

<p>To associate a developer with a given group, select a developer's name and one or more groups and hit Submit.</p>
<form name="teamAdmin" method="get">
$data
<input type="submit"/>
</form>
	</div>
</div>

<!-- <div id="rightcolumn">
	<div class="sideitem">
		<h6>Add Yourself</h6>
		<p>Not on this list? Attach your details and a photo (or URL) to <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=182613">bug 182613</a>.</p>
	</div>
</div> -->
EOHTML;

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Modeling - " . ($projectName ? $projectName . " -" : "") . " Meet The Team";
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="http://' . ($isBuildServer ? $_SERVER["SERVER_NAME"] : "www.eclipse.org") . '/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
