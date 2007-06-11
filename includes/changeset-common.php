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
	$out = changeset($bugid, isset($_GET["html"]));
 	if (isset($_GET["html"]))
 	{
		print "<h1>Generated Changeset Script For Bug #$bugid</h1>\n";
		print "<pre>\n";
		print $out;
		print "</pre>\n";
	}
}
else
{
	print "<h1>Generate Changeset Script For A Bug</h1>\n";
	changesetForm();
}
print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - Generate Changeset Script For A Bug";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch, Nick Boldt";

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
	$end = "";
	$mid = "";
	$note = "";

	$out = "#!/bin/bash\n\n";
	$out .= "# This script can be used to generate a complete changeset patch file for bug #$bugid\n\n";
	
	$out .= "# If you do not have the appropriate plugins or projects checked out into ~/workspace,\n";
	$out .= "# modify this script accordingly.\n\n";
	
	$out .= "# Make sure this file is executable (chmod 755).\n\n";
	
	$out .= "#### CONFIGURATION BEGIN ####\n\n";
	
	$out .= "# pluginsInWorkspace=0: you have an entire uber-project checked out (eg., org.eclipse.mdt)\n";
	$out .= "# pluginsInWorkspace=1: you have individual plugins/features checked out (eg., org.eclipse.emf.codegen)\n";
	$out .= "pluginsInWorkspace=0;\n\n";
	
	$out .= "# workspace; enter path to where your project/plugins/features are checked out\n";
	$out .= "workspace=~/eclipse/workspace;\n\n";
	
	$out .= "# applyPatch=0; generate patch but do NOT apply it\n";
	$out .= "# applyPatch=1; generate patch and apply it\n";
	$out .= "applyPatch=0;\n\n";
	
	$result = wmysql_query("SELECT `project` FROM `cvsfiles` NATURAL JOIN `commits` NATURAL LEFT JOIN `bugs` WHERE `bugid` = $bugid GROUP BY `project` ORDER BY `date` DESC");
	if ($result)
	{
		$out .= "# path aliases (eg., useful if you have renamed projects from org.eclipse.emf to org.eclipse.emf_R2_0m)\n";
	}
	while ($row = mysql_fetch_row($result))
	{
		$dirVar = dir2var($row[0]);
		$out .= "# $dirVar; path alias for $row[0]\n";
		$out .= "$dirVar=\"".$row[0]."\";\n\n";

		$mid .= "if [[ -f \$$dirVar/changeset_$bugid.patch ]]; then rm -i \$$dirVar/changeset_$bugid.patch; fi\n";
		
		$end .= "if [[ \$applyPatch -eq 1 ]]; then\n";
		$end .= "  if [[ \$pluginsInWorkspace -eq 1 ]]; then\n";
		$end .= "    patch -p0 <changeset_$bugid.patch;\n";
		$end .= "  else\n";
		$end .= "    pushd \$$dirVar && patch -p0 <changeset_$bugid.patch; popd;\n";
		$end .= "  fi\n";
		$end .= "fi\n";
		$dirVar = null;
	}

	$out .= "#### CONFIGURATION DONE ####\n\n";
	
	$out .= "cd \$workspace;\n";
	$out .= "\n# remove any existing versions of this patch\n".$mid."\n";

	$result = wmysql_query("SELECT `cvsname`, `revision` FROM `cvsfiles` NATURAL JOIN `commits` NATURAL LEFT JOIN `bugs` WHERE `bugid` = $bugid GROUP BY `fid`, `revision`, `bugid` ORDER BY `date` DESC");
	while ($row = mysql_fetch_row($result))
	{
		$m = null;
		if (preg_match("#^(?:/[^/]+){2}/([^/]+)/(.+),v$#", $row[0], $m))
		{
			$dirVar = dir2var($m[1]);
			if (preg_match("/^1\.1$/", $row[1]))
			{
				$note .= "if [[ \$applyPatch -eq 1 ]]; then\n";
				$note .= "  echo \"[NOTE] \$$dirVar/$m[2] was added in this changeset. File will be checked out locally but is not in the patch.\"\n";
				$note .= "  if [[ \$pluginsInWorkspace -eq 1 ]]; then\n";
				$note .= "    cvs up -r1.1 " . cleanPath($m[2]) . ";\n";
				$note .= "  else\n";
				$note .= "    pushd \$$dirVar && cvs up -r1.1 $m[2]; popd;\n";
				$note .= "  fi\n";
				$note .= "else\n";
				$note .= "  echo \"[NOTE] \$$dirVar/$m[2] was added in this changeset. You will have to check it out manually:\"\n";
				$note .= "  echo '  pushd \$$dirVar && cvs up -r1.1 $m[2]; popd;'\n";
				$note .= "fi\n";
			}
			else
			{
				$out .= "if [[ \$pluginsInWorkspace -eq 1 ]]; then\n";
				$out .= "  cvs diff -u -r" . cvsminus($row[1]) . " -r$row[1] " . cleanPath($m[2]) . " >>changeset_$bugid.patch; echo;\n";
				$out .= "else\n";
				$out .= "  pushd \$$dirVar && cvs diff -u -r" . cvsminus($row[1]) . " -r$row[1] $m[2] >>changeset_$bugid.patch; popd; echo;\n";
				$out .= "fi\n";
			}
		}
	}

	$out .= "\n" . $end;
	$out .= "\n" . $note;

	return ($html ? htmlspecialchars($out) : $out);
}

function dir2var($in)
{
	return str_replace(".","_",$in);
}

function cleanPath($in)
{
	return preg_replace("#plugins/|tests/|features/|examples/|doc/|modeling/#","",$in);
}
?>
