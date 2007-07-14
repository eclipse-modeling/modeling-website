<?php
require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

require_once($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/scripts.php");
$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
$isBuildServer = (preg_match("/^(emft|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"])) || $isEMFserver;
internalUseOnly(); 

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

# given $_GET["projects"], pass to parsecvs.sh as headless exec task using lockfile
if (isset($_GET["projects"]) && $_GET["projects"] && is_array($_GET["projects"]))
{
	$validprojects = projects();
	$projects = $_GET["projects"]; sort($projects); reset($projects);
	
	if (sizeof($validprojects) > 0)
	{
		# running as user wwwrun
		$cmd = '';
		$lockfile = '';
		$addedTarget = false;
		foreach ($projects as $targ)
		{
			if ($targ && in_array($targ, $validprojects))
			{
				$cmd .= ' ' . escapeshellarg('cvssrc/' . $targ);
				$lockfile .= ($lockfile ? "_" : "") . $targ;
				$addedTarget = true;
			}
		}
		if (!$addedTarget)
		{
			print "<li>Error: no valid projects added! Click back and try again.</li>";
		}
		else
		{
			if ($previewOnly) { 
				print '<div class="homeitem3col">'."\n";
				print "<h3>Build Command (Preview Only)</h3>\n";
				print "<p><small><code>".preg_replace("/\ \-/","<br> -",$cmd)."</code></small></p>";
			} else if (!$isBuildDotEclipseServer){
				exec($cmd);
			}
			
			if (!$previewOnly && $isBuildDotEclipseServer)
			{
				$lockfile = "/opt/public/modeling/tmp/" . $lockfile . "_updateSearchCVS.lock.txt"; // org.eclipse.emf_org.eclipse.xsd_updateSearchCVS.lock.txt
				// check if lock file exists for this build type
				if (is_file($lockfile))
				{
					print '<div class="homeitem3col">'."\n";
					print "<h3><b style=\"color:orange;background-color:white\">&#160;WARNING!&#160;</b> Another run is already in progress.</h3>\n";
					print "<p>Lockfile: <u>$lockfile</u></p>";
					print "<p><small><code>";
					foreach (file($lockfile) as $line) 
					{ 
						print "$line\n"; 
					}
					print "</code></small></p>";
					
				}
				else // create lockfile
				{
					print '<div class="homeitem3col">'."\n";
					$fp = fopen($lockfile, "w");
  					fputs($fp, $cmd . "\n");
  					fclose($fp);
  					$fp = null;
  					$fp = file($lockfile);
  					if (is_array($fp) && sizeof($fp)>0)
  					{
						print "<h3><b style=\"color:green;background-color:white\">&#160;OK!&#160;</b> Build will start in one minute.</h3>\n";
						print "<p>Lockfile: <u>$lockfile</u></p>";
						print "<p><small><code>".preg_replace("/\ \-/","<br> -",$cmd)."</code></small></p>";
  					}
  					else
  					{
						print "<h3><b style=\"color:red;background-color:white\">&#160;ERROR!&#160;</b> Could not write to lockfile!</h3>\n";
						print "<p>Lockfile: <u>$lockfile</u></p>";
						print "<p><small><code>".preg_replace("/\ \-/","<br> -",$cmd)."</code></small></p>";
  					}
				}
				if (is_file($lockfile))
				{
  					if (!chmod($lockfile, 0666))
  					{
  						print "<p><b style=\"color:red;background-color:white\">&#160;ERROR!&#160;</b> Could not set permission on lockfile; must delete manually. Contact codeslave{at}ca.ibm.com for assistance.</p>";
  					}
				}
			}
		}
	}
}
else # if no $_GET["projects"] value, present UI to multi-select targets.
{
?>
	<div class="homeitem3col">
	<h3>Choose project(s) / component(s) to update</h3>
	
	<blockquote>
		<form action="" method="get" name="runUpdate">
			<select size="10" multiple="multiple" id="project" name="projects[]">
			<?php
			$validprojects = projects();
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
	$vp = loadDirSimple("/opt/public/modeling/searchcvs/cvssrc","","d");
	foreach ($vp as $pr)
	{
		if (!preg_match("/(CVS|OLD)/",$pr))
		{
			$validprojects[] = $pr;
		}
	} 
	sort($validprojects); reset($validprojects);
	return $validprojects;
}

?>
