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
print <<<HTML

<script language="javascript">
function toggleDetails(id)
{
  toggle=document.getElementById("divToggle_" + id);
  detail=document.getElementById("divDetail_" + id);
  if (toggle.innerHTML=="[+]")
  {
    toggle.innerHTML="[-]";
    detail.style.display="";
  }
  else
  {
    toggle.innerHTML="[+]";
    detail.style.display="none";
  }
}
</script>
HTML;

print "<div id=\"midcolumn\">\n";
if (isset($_GET["log"]))
{
	print "<h1>Update Search CVS - Latest Updates</h1>\n";
	print '<div class="homeitem3col"><h3>Logged events</h3><blockquote>' . "\n";
	
	exec("cat /tmp/parsecvs_web.log.txt", $logtail);
	for ($i=sizeof($logtail)-50; $i<sizeof($logtail); $i++) {
		if (isset($logtail[$i]) && $logtail[$i]) print $logtail[$i]."<br/>\n";
	}
	print "</blockquote></div>\n";
}
else
{
	if (!isset($_GET["projects"]) || !$_GET["projects"] || !is_array($_GET["projects"]) || sizeof($_GET["projects"]) == 0)
	{
		print "<h1>Update Search CVS - API Reference</h1>\n";
	
		print '<div class="homeitem3col">' . "\n";
	
		$regs = null;
		preg_match("@/([^/]+)$@", $_SERVER["SCRIPT_NAME"], $regs);
		$script = $regs[1];
		print "<h3>INPUT</h3>\n<ul><li>$script?projects[]=<i style=\"color:blue\">{cvs src folder 1}</i>&amp;projects[]=<i style=\"color:blue\">{cvs src folder 2}</i>&amp;...</li></ul><br/>\n";
		print "<h3>EXAMPLE</h3>\n<ul><li>$script?projects[]=cvssrc/emf-org.eclipse.emf&amp;projects[]=cvssrc_branches/mdt-org.eclipse.xsd-R2_1_maintenance</li></ul><br/>\n";
		print '<h3>OUTPUT</h3>' . "\n" . '<ul><li>starts a headless process; can run <a href="http://www.eclipse.org/modeling/mdt/news/checkReleaseExists.php">checkReleaseExists.php</a> task to see if done</li></ul><br/>' . "\n";
	
		print "</div>\n";
	
	}
	
	print "<h1>Update Search CVS - Web UI</h1>\n";
	
	# given $_GET["projects"], pass to parsecvs.sh as headless exec task using lockfile
	if (isset($_GET["projects"]) && $_GET["projects"] && is_array($_GET["projects"]))
	{
		$validprojectKeys = projects(true);
		$projects = $_GET["projects"]; sort($projects); reset($projects);
		
		if (sizeof($validprojectKeys) > 0)
		{
			# running as user wwwrun
			$cmd = '';
			$lockfile = '';
			$addedTarget = false;
			foreach ($projects as $targ)
			{
				if ($targ && in_array($targ, $validprojectKeys))
				{
					$cmd .= ' ' . escapeshellarg($targ);
					$lockfile .= ($lockfile ? "_" : "") . preg_replace("#^.+/#","",$targ);
					$addedTarget = true;
				}
			}
			if (isset($_GET['email']))
			{
				$cmd .= " -email " . $_GET['email'];
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
					print "<p><small><code>/opt/public/modeling/searchcvs/parsecvs.sh " . $cmd."</code></small></p>";
				}
				
				if (!$previewOnly && $isBuildDotEclipseServer)
				{
					$lockfile = "/opt/public/modeling/tmp/" . $lockfile . "_updateSearchCVS.lock.txt"; // org.eclipse.emf_org.eclipse.xsd_updateSearchCVS.lock.txt
					// check if lock file exists for this build type
					if (is_file($lockfile))
					{
						print '<div class="homeitem3col">'."\n";
						print "<h3><b style=\"color:orange;background-color:white\">&#160;WARNING!&#160;</b> Another run is already in progress.</h3>\n";
						print "<p>Logfile: <u>/tmp/parsecvs_web.log.txt</u></p>";
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
							print "<h3><b style=\"color:green;background-color:white\">&#160;OK!&#160;</b> Build will start at " . date("h:ia", strtotime("+1 minute")) . ".</h3>\n";
							print "<p>Logfile: <u>/tmp/parsecvs_web.log.txt</u></p>";
							print "<p>Lockfile: <u>$lockfile</u></p>";
							print "<p><small><code>".str_replace("' '","'<br/>'",preg_replace("/\ \-/","<br> -",$cmd))."</code></small></p>";
	  					}
	  					else
	  					{
							print "<h3><b style=\"color:red;background-color:white\">&#160;ERROR!&#160;</b> Could not write to lockfile!</h3>\n";
							print "<p>Lockfile: <u>$lockfile</u></p>";
							print "<p><small><code>".str_replace("' '","'<br/>'",preg_replace("/\ \-/","<br> -",$cmd))."</code></small></p>";
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
		print "<p><a href=\"?\">Update another module</a></p>\n";
		print "</div>\n";
	}
	else # if no $_GET["projects"] value, present UI to multi-select targets.
	{
	?>
		<div class="homeitem3col">
		<h3>Choose project(s) / component(s) to update</h3>
		
		<blockquote>
			<form action="" method="get" name="runUpdate">
				<table>
				<tr>
					<td><b>Project(s):</b></td>
					<td>&#160;</td>
					<td colspan="2">
						<select size="10" multiple="multiple" id="project" name="projects[]">
						<?php
						$validprojects = projects(false);
						foreach ($validprojects as $val => $label)
						{
							print "<option value=\"$val\">".str_replace("-"," | ",$label)."</option>\n"; # cvssrc_branches/emf-org.eclipse.emf.ecore.sdo-R2_1_maintenance => emf | org.eclipse.emf.ecore.sdo | R2_1_maintenance
						}
						?>
						</select>
						<input type="hidden" name="previewOnly" value="<?php echo $previewOnly; ?>"/>
					</td>
				</tr>
				<tr>
					<td><b>Email?</b></td>
					<td>&#160;</td>
					<td colspan="1"><input name="email" size="25"/></td>
					<td width="300"><small><a id="divToggle_email" name="divToggle_email" href="javascript:toggleDetails('email')">[+]</a></small>
						<div id="divDetail_email" name="divDetail_email" style="display:none;border:0">
						<small>Add your email (or comma-separated emails) to be notified when done.
						</small>
						</div>
					</td>
				</tr>
	
				<tr>
					<td>&#160;</td>
					<td>
					<input type="submit" value="<?php print ($previewOnly ? "Preview" : "Go!"); ?>"/>
					</td>
				</tr>
	
				</table>
			</form>
		</blockquote>
		</div>
	<?php
	}
}
print "</div>\n";

if (!isset($_GET["log"]))
{
	print "<div id=\"rightcolumn\">\n";
	
	print "<div class=\"sideitem\">\n";
	print "<h6>Latest Logged Events</h6>\n";
	exec("cat /tmp/parsecvs_web.log.txt", $logtail);
	$out = "";
	for ($i=sizeof($logtail)-1; $i>=0; $i--) {
		if (preg_match("#\[\d{4}.+\d+\] #",$logtail[$i]))
		{
			$cnt++; $out = "<small style='font-size:8px'>" . preg_replace("#(\[\d{4}.+\d+\]) #", "<br/><i style='color:gray'>$1</i><br/>", $logtail[$i]) . "</small>"."<br/>\n" . $out;
		}
		if ($cnt == 6) break;
	}
	print $out;
	print "<p align=\"right\"><a href=\"?log\">more</a></p>\n";
	print "</div>\n";
	print "</div>\n";
}

$html = ob_get_contents();
ob_end_clean();

$pageTitle = (isset($pageTitle) ? $pageTitle : "Eclipse Modeling - Update Search CVS");
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

function projects($keysOnly = false)
{
	$vps = array(
		"cvssrc" => loadDirSimple("/opt/public/modeling/searchcvs/cvssrc","","d"),
		"cvssrc_branches" => loadDirSimple("/opt/public/modeling/searchcvs/cvssrc_branches","","d")
	);
	foreach ($vps as $pre => $vp)
	{
		foreach ($vp as $pr)
		{
			if (!preg_match("/(CVS|OLD|-latest$)/",$pr))
			{
				if ($keysOnly)
				{
					$validprojects[] = "$pre/$pr"; # 0 => cvssrc_branches/emf-org.eclipse.emf.ecore.sdo-R2_1_maintenance	
				}
				else
				{
					$validprojects["$pre/$pr"] = $pr; # cvssrc_branches/emf-org.eclipse.emf.ecore.sdo-R2_1_maintenance => emf-org.eclipse.emf.ecore.sdo-R2_1_maintenance 
				}
			}
		}
	} 
	ksort($validprojects); reset($validprojects);
	return $validprojects;
}

?>
