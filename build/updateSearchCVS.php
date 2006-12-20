<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

require_once($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/scripts.php");
$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
$isBuildServer = (preg_match("/^(emft|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"])) || $isEMFserver;
internalUseOnly(); 

include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

# use this script to kick parsecvs.sh for a given set of project folders
# should be usable as web and commandline api

$previewOnly = (isset($_GET["previewOnly"]) && $_GET["previewOnly"] ? 1 : 0);

ob_start();

print "<div id=\"midcolumn\">\n";
if (!isset($_GET["projects"]) || !$_GET["projects"] || !is_array($_GET["projects"]) || sizeof($_GET["projects"]) == 0)
{
	print "<h1>Update Search CVS - API Reference</h1>\n";

	print '<div class="homeitem3col">' . "\n";

	$regs = null;
	preg_match("@/([^/]+)$@", $_SERVER["SCRIPT_NAME"], $regs);
	$script = $regs[1];
	print "<h3>INPUT</h3>\n<ul><li>$script?projects[]=<i style=\"color:blue\">{cvs project 1}</i>&amp;projects[]=<i style=\"color:blue\">{cvs project 2}</i>&amp;...</li></ul><br/>\n";
	print "<h3>EXAMPLE</h3>\n<ul><li>$script?projects[]=org.eclipse.uml2&amp;projects[]=org.eclipse.uml2.releng</li></ul><br/>\n";
	print '<h3>OUTPUT</h3>' . "\n" . '<ul><li>starts a headless process; can run <a href="http://www.eclipse.org/modeling/mdt/news/checkReleaseExists.php">checkReleaseExists.php</a> task to see if done</li></ul><br/>' . "\n";

	print "</div>\n";
}
print "<h1>Update Search CVS - Web UI</h1>\n";
print '<div class="homeitem3col">' . "\n";
print '<h3>Choose project(s) to update</h3>' . "\n";

# given $_GET["projects"], pass to parsecvs.sh as headless exec task
if (isset($_GET["projects"]) && $_GET["projects"] && is_array($_GET["projects"]))
{
	$validprojects = projects();

	if (sizeof($validprojects) > 0)
	{
		print "<p>";
		print $previewOnly ? "<b>PREVIEW ONLY</B>: " : "";
		print "Spawning the following update:";
		print "</p>\n";
		print "<ul>\n";

		# running as user wwwrun
		$cmd = '/bin/bash -c "exec /usr/bin/nohup /usr/bin/setsid /shared/modeling/searchcvs/parsecvs_web.sh';
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
}
else # if no $_GET["projects"] value, present UI to multi-select targets.
{
?>
	<blockquote>
		<form action="" method="get" name="runUpdate">
			<select size="10" multiple="multiple" id="project" name="projects[]">
			<?php
			$validprojects = projects();
			print "<option selected=\"selected\" value=\"0\">--Select a project --</option>\n";
			print join("", preg_replace("/^(.+)$/", "<option value=\"$1\">$1</option>\n", $validprojects));
			?>
			</select>
			<input type="hidden" name="previewOnly" value="<?php echo $previewOnly; ?>"/>
			<input type="submit" value="<?php print ($previewOnly ? "Preview" : "Go!"); ?>"/>
		</form>
	</blockquote>
<?php
}
print "</div>\n";
print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = (isset($pageTitle) ? $pageTitle : "Eclipse Modeling - Update Search CVS");
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

function projects()
{
	$validprojects = array();
	$result = wmysql_query("SELECT `project` FROM `cvsfiles` WHERE `project` LIKE 'org.eclipse.%' GROUP BY `project`");
	while ($row = mysql_fetch_row($result))
	{
		$validprojects[] = $row[0];
	}

	return $validprojects;
}
?>
