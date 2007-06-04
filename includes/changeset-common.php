<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

$bugid = null;
if (isset($_GET["bugid"]) && preg_match("/^\d+$/", $_GET["bugid"]))
{
	$bugid = $_GET["bugid"];
}

print "<div id=\"midcolumn\">\n";
if ($bugid !== null)
{
	print "<h1>Generate changeset for bug #$bug</h1>\n";
	print "<pre>\n";
	$out = changeset($bugid, isset($_GET["html"]));
	print $out;
	print "</pre>\n";
}
else
{
	print "<h1>Generage changeset for a bug</h1>\n";
	?>
	<form action="changeset.php" method="get">
	<label for="bugid">Bug id: </label><input type="text" name="bugid" id="bugid"/>
	<input type="submit" value="Go!"/>
	</form>
	<?
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

function changeset($bugid, $html = false)
{
	$out = "#!/bin/bash\n\n";
	$end = "";
	$note = "";
	$out .= "# produces a complete changeset for bug #$bugid\n\n";
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
?>
