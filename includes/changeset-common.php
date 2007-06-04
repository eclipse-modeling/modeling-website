<?php

$bugid = null;
if (isset($_GET["bugid"]) && preg_match("/^\d+$/", $_GET["bugid"]))
{
	$bugid = $_GET["bugid"];
}
else if (isset($_GET["q"]) && preg_match("/^\d+$/", $_GET["q"]))
{
	$bugid = $_GET["q"];
}

if (!isset($printSideitemOnly))
{

	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
	ob_start();
	
	include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");
	
	print "<div id=\"midcolumn\">\n";
	if ($bugid !== null)
	{
		print "<h1>Generate changeset script for bug #$bugid</h1>\n";
		print "<pre>\n";
		$out = changeset($bugid, isset($_GET["html"]));
		print $out;
		print "</pre>\n";
	}
	else
	{
		changesetMainItem();
	}
	print "</div>\n";
	
	$html = ob_get_contents();
	ob_end_clean();
	
	$pageTitle = "Eclipse Modeling - Generate changeset for a bug";
	$pageKeywords = ""; // TODO: add something here
	$pageAuthor = "Neil Skrypuch";
	
	if (isset($_GET["html"]) || $bugid === null)
	{
		$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
	}
	else 
	{
		header("Content-type: application/x-sh");
		print $out;
	}
}

function changeset($bugid, $html = false)
{
	$out = "#!/bin/bash\n\n";
	$end = "";
	$note = "";
	$out .= "# This script can be used to generate a complete changeset patch file for bug #$bugid\n\n";
	$out .= "# If you do not have the appropriate plugins or projects checked out into ~/workspace,\n";
	$out .= "# modify this script accordingly.\n\n";
	$out .= "cd ~/workspace/\n";
	$result = wmysql_query("SELECT `project` FROM `cvsfiles` NATURAL JOIN `commits` NATURAL LEFT JOIN `bugs` WHERE `bugid` = $bugid GROUP BY `project` ORDER BY `date` DESC");
	while ($row = mysql_fetch_row($result))
	{
		$out .= "rm $row[0]/changeset.patch\n";
		$end .= "pushd $row[0] && patch -p0 <changeset.patch; popd;\n";
	}

	$result = wmysql_query("SELECT `cvsname`, `revision` FROM `cvsfiles` NATURAL JOIN `commits` NATURAL LEFT JOIN `bugs` WHERE `bugid` = $bugid GROUP BY `fid`, `revision`, `bugid` ORDER BY `date` DESC");
	while ($row = mysql_fetch_row($result))
	{
		$m = null;
		if (preg_match("#^(?:/[^/]+){2}/([^/]+)/(.+),v$#", $row[0], $m))
		{
			if (preg_match("/^1\.1$/", $row[1]))
			{
				$out .= "pushd $m[1] && cvs up -r1.1 $m[2]; popd;\n";
				$note .= "echo '[NOTE] $m[1]/$m[2] was added in this changeset, the file has been changed in your working copy, but this is not reflected in the patch(es)!'\n";
			}
			else
			{
				$out .= "pushd $m[1] && cvs diff -u -r" . cvsminus($row[1]) . " -r$row[1] $m[2] >>changeset.patch; popd; echo;\n";
			}
		}
	}

	$out .= $end;
	$out .= $note;

	return ($html ? htmlspecialchars($out) : $out);
}

function changesetSideItem()
{
	print <<<XML
	<script language="javascript">
	function toggleDetails(id)
	{
	  toggle=document.getElementById(id + "Toggle");
	  detail=document.getElementById(id + "Detail");
	  if (toggle.innerHTML=="[ + ]") 
	  {
	    toggle.innerHTML="[ - ]";
	    detail.style.display="";
	  } 
	  else
	  {
	    toggle.innerHTML="[ + ]";
	    detail.style.display="none";
	  }
	}
	</script>
	<div class="sideitem">
	<h6>Generate Changeset <a id="divChangesetToggle" name="divChangesetToggle" href="javascript:toggleDetails('divChangeset')">[ + ]</a></h6>
XML;
	changesetForm(false);
	print <<<XML
	</div>
XML;
}

function changesetMainItem()
{
	print <<<XML
	<h1>Generate Changeset Script For A Bug</h1>
XML;
	changesetForm();
}

function changesetForm($display=true)
{
	global $bugid; ?>
	<form action="http://www.eclipse.org/modeling/emf/news/changeset.php" method="get" name="changesetform" target="_blank">
	<div id="divChangesetDetail" name="divChangesetDetail" style="<?php print $display ? "": "display:none;border:0"; ?>">
	<p>Use this form to generate a shell script which can be run against projects &amp; plugins in your workspace to produce a patch file 
		showing all changes for a given bug.
	</p> 
	<p>Bug must be indexed in <a href="http://www.eclipse.org/modeling/emf/searchcvs.php?q=190525">Search CVS</a> database. 
	Download generated script for more information. If script is empty, bug was not found.</p>
	</div>
	<p>
		<label for="bugid">Bug ID: </label><input size="7" type="text" name="bugid" id="bugid" value="<?php print $bugid?$bugid:''; ?>"/>
		<input type="submit" value="Go!"/>
	</p>
	</form>
<?php
}
?>
