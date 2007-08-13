<?php
/* See also /modeling/includes/team-common.sql for database schema */

require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App= new App(); $Nav= new Nav(); $Menu= new Menu(); include ($App->getProjectCommon());

include ($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");
$projct= preg_replace("#.+/#", "", $PR); 

$exportFormats = array(
	"project,component,committerid", # Bjorn's format preference
	"project,component,groupname,path,committerid", # other options for auditing
	"groupname,path,committerid",
	"groupname,committerid"
	);
if (isset($_GET["export"]) && $_GET["export"] && in_array($_GET["export"],$exportFormats)) 
{
	$query = "SELECT ".$_GET["export"]." FROM teams NATURAL JOIN developers NATURAL JOIN groups ORDER BY ".$_GET["export"]; 
	
	$result= wmysql_query($query);
	$data = array();
	if ($result && mysql_num_rows($result) > 0)
	{
		while ($row = mysql_fetch_row($result))
		{
			$key= "";
			for ($i = 0; $i < sizeof($row) - 1; $i++) {
				$key .= $row[$i]."\t";
			}
			if (!isset($data[$key])) 
			{
				$data[$key] = array();
			}
			$data[$key][$row[sizeof($row) - 1]] = $row[sizeof($row) - 1];
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
	$projectName = $projct != "modeling" ? strtoupper($projct) : "Modeling Project";
	$data = array();
	if (isset($_GET["byProject"]) && $projct == "modeling")
	{
	    $projs = array("emf","emft","gmf","gmt","mddi","mdt","m2m","m2t");
	    foreach ($projs as $p)
	    {
	        $data[strtoupper($p) . " Committers"] = getDevelopers(true, $p);
	        $data[strtoupper($p) . " Contributors"] = getDevelopers(false, $p);
	    }
	} 
	else
	{
	    $data["Committers"] = getDevelopers(true, $projct);
	    $data["Contributors"] = getDevelopers(false, $projct);
	}
	
	ob_start();
	$pageTitle= "Meet The Team";
	
	$exportFormatsList = "";
	foreach ($exportFormats as $ef)
	{
		$exportFormatsList .= "<li><a href=\"?export=$ef\">" . ucwords(str_replace(",", ", ",$ef)) . "</a></li>\n";
	}
	print<<<EOHTML
<div id="midcolumn">
	<h1>Meet The $projectName Team</h1>
EOHTML;
	if (isset($_GET["byProject"]) && $projct == "modeling")
	{
	    print "<blockquote><ul><li>Committers: ";
	    foreach ($projs as $p)
	    {
	        if ($data[strtoupper($p) . " Committers"][0])
	        {
	            print '<a href="#' . strtoupper($p) . '_Committers">' . strtoupper($p) . '</a> &#160;'."\n";  
	        }
	    }
	    print "</li>\n<li>Contributors: ";
	    foreach ($projs as $p)
	    {
	        if ($data[strtoupper($p) . " Contributors"][0])
	        {
	            print '<a href="#' . strtoupper($p) . '_Contributors">' . strtoupper($p) . '</a> &#160;'."\n";
	        }  
	    }
	    print "</li></ul>\n";
	    print "</blockquote>\n";
	}
	else
	{
	    print "<blockquote><ul><li>";
	    if ($data["Committers"][0])
	    {
	        print '<a href="#Committers">Committers</a> &#160;'."\n";
	    }
	    if ($data["Contributors"][0])
	    {
	        print '<a href="#Contributors">Contributors</a> &#160;'."\n";
	    }
	    print "</li></ul>\n";
	    print "</blockquote>\n";
	    
	}
	foreach ($data as $label => $arr) {
		if ($arr && is_array($arr) && sizeof($arr)>0 && $arr[0])
		{
		    print '<div class="homeitem3col">'."\n";
	        print "<h3><a name=\"" . str_replace(" ","_",$label) . "\"></a>$label ($arr[0])</h3>\n";
	        print $arr[1]."\n";
	        print "</div>\n";
		}
	}
	print<<<EOHTML
</div>

<div id="rightcolumn">
EOHTML;
	if ($isIncubating)
	{
	print '
		<div class="sideitem">
		   <h6>Incubation</h6>
		   <p>Some components are currently in their <a href="http://www.eclipse.org/projects/dev_process/validation-phase.php">Validation (Incubation) Phase</a>.</p> 
		   <div align="center"><a href="http://www.eclipse.org/projects/what-is-incubation.php"><img 
		        align="center" src="http://www.eclipse.org/images/egg-incubation.png" 
		        border="0" /></a></div>
		</div>
		'; 
	}
	if (is_file($_SERVER['DOCUMENT_ROOT'] . "/$PR/eclipse-project-ip-log.php"))
	{
	print<<<EOHTML
	<div class="sideitem">
		<h6>IP Log</h6>
		<p>See committer/contributor <a href="/$PR/eclipse-project-ip-log.php">IP log</a>.</p>
	</div>
EOHTML;
	}
	print<<<EOHTML
	<div class="sideitem">
		<h6>Submit Yourself</h6>
		<p>Not on this list? Information wrong or missing? Attach your details and a photo (or URL) to <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=182613#c11">bug 182613</a>.</p>
	</div>
	<div class="sideitem">
		<h6><a name="export"></a>Export Data</h6>
		<p>To export the data as tabbed text, choose your columns:</p>
		<p><ul>
		$exportFormatsList
		</ul></p>
	</div>
EOHTML;
	if ($projct == "modeling")
	{
	print '<div class="sideitem">
		<h6>Sort</h6>
		<ul><li><a href="?'.(isset($_GET["byProject"])? '' : 'byProject').'">'.(isset($_GET["byProject"]) ? 'Overall' : 'By Project').'</a></li></ul>		
	</div>
';
	}
    print "</div>\n";
}

$html= ob_get_contents();
ob_end_clean();
$pageTitle= "Modeling - " . ($projectName ? $projectName . " -" : "") . " Meet The Team";
$pageKeywords= "";
$pageAuthor= "Nick Boldt";
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="http://' . ($isBuildServer ? $_SERVER["SERVER_NAME"] : "www.eclipse.org") . '/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

function getDevelopers($isCommitter = true, $projct)
{
	$query= "SELECT DISTINCT Name, Role, Company, Location, Website, PhotoURL FROM developers NATURAL JOIN groups NATURAL JOIN teams " .
			"WHERE committer = " . ($isCommitter ? "1" : "0") . 
			($projct != "modeling" ? " AND " . ($projct == "emft" ? "(groupname like 'emft%' OR project LIKE '%$projct')" : "project LIKE '%$projct'") : "") . 
			" ORDER BY SUBSTRING_INDEX(Name,' ',-1)"; // by last name
	$result= wmysql_query($query);
	$groups= array ();
	$total = 0;
	$data = "";
	if ($result && mysql_num_rows($result) > 0)
	{
		$data .= '<p><table border="0" width="100%"><tr >' . "\n";
		$cnt = 0;
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
		$total = $cnt;
		while ($cnt %3 != 0)
		{
			$data .= '<td width="33%" height="200" align="center" valign="bottom">&#160;</td>' . "\n";
			$cnt++;
		}
		$data .= "</tr></table>\n";
	}
	return array($total,$data);
}
?>
