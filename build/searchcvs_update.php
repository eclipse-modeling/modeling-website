<?php
# use this script to kick parsecvs.sh for a given set of project folders
# should be usable as web and commandline api

require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
$App = new App();
$Nav = new Nav();
$Menu = new Menu();
include ($App->getProjectCommon());

include ($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

$previewOnly = isset ($_GET["previewOnly"]) && $_GET["previewOnly"] ? 1 : 0;

ob_start();

print "<div id=\"midcolumn\">\n";
print "<h1>Update Search CVS, Release Notes, Release News</h1>\n";

# given $_GET["projects"], pass to parsecvs.sh as headless exec task
if (isset ($_GET["projects"]) && $_GET["projects"] && is_array($_GET["projects"]))
{
	$validprojects = array ();
	$result = wmysql_query("SELECT `project` FROM `cvsfiles` GROUP BY `project`");
	if ($result)
	{
		while ($row = mysql_fetch_row($result))
		{
			if (isset ($row[0]) && $row[0] && false !== strpos($row[0], "org.eclipse."))
			{
				$validprojects[] = $row[0];
			}
		}
	} else
	{
		print '<li><b>Error: cannot connect to database.</b></li>' . "\n";
	}

	if (sizeof($validprojects) > 0)
	{
		print "<p>";
		print $previewOnly ? "<b>PREVIEW ONLY</B>: " : "";
		print "Spawning the following update:";
		print "</p>\n";
		print "<ul>\n";

		# running as user wwwrun
		$cmd = '/bin/bash -c "exec nohup setsid /shared/modeling/searchcvs/parsecvs_web.sh';
		$addedTarget = false;
		foreach ($_GET["projects"] as $targ)
		{
			if ($targ && in_array($targ, $validprojects))
			{
				$cmd .= ' ' . escapeshellarg('cvssrc/' . $targ);
				$addedTarget = true;
			}
		}
		$cmd .= ' 2>&1 >/dev/null &"';
		if (!$addedTarget)
		{
			print "<li>Error: no valid projects added! Click back and try again.</li>";
		}
		else
		{
			print "<li>$cmd</li>\n";
			if (!$previewOnly)
			{
				print "<pre>"; 
				exec($cmd);
				print "</pre>";
			}
		}
		print "</ul>\n";
		if ($addedTarget)
		{
			print "<p><b>NOTE</b>: Do not reload this page or you will slow down your update!</p>";
		}
	}
} else # if no $_GET["projects"] value, present UI to multi-select targets.
	{
?>

	<h3>Choose project(s) to update:</h3>
	<div id="searchdiv">
		<form action="" method="get" name="runUpdate">
			<select size="10" multiple="multiple" id="project" name="projects[]">
			<?php


	$result = wmysql_query("SELECT `project` FROM `cvsfiles` GROUP BY `project`");
	if ($result)
	{
		print '<option selected="selected" value="0">-- Select a project --</option>' . "\n";
		while ($row = mysql_fetch_row($result))
		{
			if (isset ($row[0]) && $row[0] && false !== strpos($row[0], "org.eclipse."))
			{
				print "<option value=\"" . $row[0] . "\">$row[0]</option>\n";
			}
		}
	} else
	{
		print '<option selected="selected" value="0">Error: cannot connect to database.</option>' . "\n";
	}
?>
			</select>
			<br/>
			<br/>
			<input type="hidden" name="previewOnly" value="<?php echo $previewOnly; ?>"
			<input type="submit" value="<?php echo $previewOnly ? "Preview" : "Go!"; ?>"/>
		</form>
	</div>

<?php


}
print "</div>\n";
print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = isset ($pageTitle) ? $pageTitle : "Eclipse Modeling - Query Tools";
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
