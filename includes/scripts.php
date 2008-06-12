<?php
// $Id: scripts.php,v 1.66 2008/06/12 20:28:48 nickb Exp $

function PWD_debug($PWD, $suf, $str)
{
	global $debug_echoPWD;
	if ($debug_echoPWD && is_dir($PWD) && is_readable($PWD) && ($suf != "logs" || is_writable($PWD)))
	{
		print $str;
		$debug_echoPWD = 0;
	}
}

function PWD_check($PWD, $suf)
{
	#debug ("&#160; &#160; <b>PWD = </b>$PWD; <b>suf = </b>$suf;<br/>&#160; &#160; &#160; is_dir? <b style='color:green'>" . is_dir($PWD) . "</b>; is_readable? <b style='color:green'>" . is_readable($PWD) . "</b>; is_writable? <b style='color:green'>" . is_writable($PWD) . "</b><br/>", 2);
	return (!is_dir($PWD) || !is_readable($PWD) || ($suf == "logs" && !is_writable($PWD)));
}

function getPWD($suf = "", $doDynCheck = true, $debug_echoPWD = 1) // set 0 to hide (for security purposes!)
{
	global $PR, $App, $isBuildServer;
	#debug ("<br/><b>PR = </b>$PR, <b>suf = </b>$suf</br>", 2);
	$PWDs = array();

	if ($doDynCheck)
	{
		//dynamic assignments
   		$PWD = $App->getDownloadBasePath() . "/$PR/" . $suf;
   		$PWDs[] = $PWD;
   		PWD_debug($PWD, $suf, "<!-- Found[1gDBP] $PWD -->");

		//second dynamic assignment
		if (PWD_check($PWD, $suf))
		{
			$PWD = $_SERVER["DOCUMENT_ROOT"] . "/$PR/" . $suf;
	   		$PWDs[] = $PWD;
			PWD_debug($PWD, $suf, "<!-- Found[1DR+PR] $PWD -->");
		}

		if (!PWD_check($PWD, $suf) && !$isBuildServer)
		{
			debug("'$suf' ended up with '$PWD' (is_readable: <b style='color:green'>" . is_readable($PWD) . "</b>, is_dir: <b style='color:green'>" . is_dir($PWD) . "</b>)");
			return $PWD;
		}
	}
	$PWD="";

	//static assignments
	if (PWD_check($PWD, $suf))
	{
		$servers = array(
			"/buildbox(?:\.torolab\.ibm\.com)?/" => "/home/www-data/build",
			"/build\.eclipse\.org/" => "/opt/public/modeling/build",
			"/emf(?:\.torolab\.ibm\.com)?/" => "/home/www-data/build",
			"/emft(?:\.eclipse\.org)?/" => "/home/www-data/build",
			"/download1\.eclipse\.org/" => "/home/local/data/httpd/download.eclipse.org",
			"/fullmoon\.torolab\.ibm\.com/" => "/home/www"
		);

		foreach (array_keys($servers) as $z)
		{
			$PWD = $servers[$z] . "/$PR/$suf";
			if (preg_match($z, $_SERVER["HTTP_HOST"]) && !PWD_check($PWD, $suf))
			{
		   		$PWDs[] = $PWD;
				PWD_debug($PWD, $suf, "<!-- Found[3stat] -->");
			}
		}
		foreach (array_keys($servers) as $z)
		{
			$PWD = $servers[$z] . "/$suf";
			if (preg_match($z, $_SERVER["HTTP_HOST"]) && !PWD_check($PWD, $suf))
			{
		   		$PWDs[] = $PWD;
				PWD_debug($PWD, $suf, "<!-- Found[3stat2] -->");
			}
		}
	}
	$PWD="";

	//try a default guess: /home/www, two options
	if (PWD_check($PWD, $suf))
	{
		$data = array(
			4 => array(
				"checkdir" => "/home/data/httpd/download.eclipse.org/",
				"tries" => array(
					"/home/data/httpd/download.eclipse.org/$suf",
					"/home/data/httpd/download.eclipse.org/$PR/$suf",
					"/home/data/httpd/download.eclipse.org/tools/$PR/$suf",
					"/home/data/httpd/download.eclipse.org/technology/$PR/$suf",

					"/home/www/tools/$PR/$suf",
					"/home/www/technology/$PR/$suf",
					"/home/www/eclipse/$PR/$suf",
				)
			),
			5 => array(
				"checkdir" => "/home/data2/httpd/download.eclipse.org/",
				"tries" => array(
					"/home/data2/httpd/download.eclipse.org/$suf",
					"/home/data2/httpd/download.eclipse.org/$PR/$suf",
					"/home/data2/httpd/download.eclipse.org/tools/$PR/$suf",
					"/home/data2/httpd/download.eclipse.org/technology/$PR/$suf",

					"/home/www/tools/$PR/$suf",
					"/home/www/technology/$PR/$suf",
					"/home/www/eclipse/$PR/$suf",
				)
			),
			6 => array(
				"checkdir" => "/home/local/data/httpd/download.eclipse.org/",
				"tries" => array(
				    $doDynCheck ? $App->getDownloadBasePath() . "/$PR/" . $suf : null,

					"/home/local/data/httpd/download.eclipse.org/$suf",
					"/home/local/data/httpd/download.eclipse.org/$PR/$suf",
					"/home/local/data/httpd/download.eclipse.org/tools/$PR/$suf",
					"/home/local/data/httpd/download.eclipse.org/technology/$PR/$suf",

					"/home/www/tools/$PR/$suf",
					"/home/www/technology/$PR/$suf",
					"/home/www/eclipse/$PR/$suf",

					"/home/www/tools/$suf",
					"/home/www/technology/$suf",
					"/home/www/eclipse/$PR/$suf",
				)
			),
			7 => array(
				"checkdir" => "/var/www/",
				"tries" => array(
					"/var/www/$PR/$suf",
					"/var/www/html/$PR/$suf",

					"/var/www/tools/$PR/$suf",
					"/var/www/technology/$PR/$suf",
					"/var/www/eclipse/$PR/$suf",

					"/var/www/html/tools/$PR/$suf",
					"/var/www/html/technology/$PR/$suf",
					"/var/www/html/eclipse/$PR/$suf",
				)
			)
		);

		foreach (array_keys($data) as $y)
		{
			$PWD = $data[$y]["checkdir"];
			if (is_dir($PWD) && is_readable($PWD))
			{
				foreach (array_keys($data[$y]["tries"]) as $z)
				{
					#debug("&#160; &#160; &#160; &#160; &#160; \$data[$y][\"tries\"][$z] = " . $data[$y]["tries"][$z],3);
					$PWD = $data[$y]["tries"][$z];
					if ($PWD && !PWD_check($PWD, $suf))
					{
						PWD_debug($PWD, $suf, "<!-- Found: defaults[${y}][$z] -->");
						$PWDs[] = $PWD;
						break 2;
					}
				}
			}
		}
	}
	$PWD="";

	krsort($PWDs); reset($PWDs);
	#debug_r($PWDs, "<hr>PWDs: ", "<hr>", 2);
	foreach ($PWDs as $i => $PWD)
	{
		debug(" &#160; &#160; $i : $PWD", 9);
		if (!PWD_check($PWD, $suf))
		{
			debug("'$suf' ended up with '$PWD' (is_readable: <b style='color:green'>" . is_readable($PWD) . "</b>, is_dir: <b style='color:green'>" . is_dir($PWD) . "</b>)");
			return $PWD;
		}
	}

	debug("<!-- PWD not found! -->");
	debug("'$suf' ended up with '$PWD' (is_readable: <b style='color:green'>" . is_readable($PWD) . "</b>, is_dir: <b style='color:green'>" . is_dir($PWD) . "</b>)");
	return $PWD;
}

function loadDirSimple($dir, $ext, $type) // 1D array, not 2D
{
	$stuff = array();

	if (is_dir($dir) && is_readable($dir))
	{
		$handle = opendir($dir);
		while (($file = readdir($handle)) !== false)
		{
			if (preg_match("/$ext$/", $file) && !preg_match("/^\.{1,2}$/", $file))
			{
				if (($type == "d" && is_dir("$dir/$file")) || ($type == "f" && is_file("$dir/$file")))
				{
					$stuff[] = $file;
				}
			}
		}
		closedir($handle);
	}
	else
	{
		global $hadLoadDirSimpleError;
		if (!$hadLoadDirSimpleError)
		{
			$issue = (!is_dir($dir) ? "NOT FOUND" : (!is_readable($dir) ? "NOT READABLE" : "PROBLEM"));
			print "<p>Directory ($dir) <b>$issue</b> on mirror: <b>" . $_SERVER["HTTP_HOST"] . "</b>!</p>";
			print "<p>Please report this error to <a href=\"mailto:webmaster@eclipse.org?Subject=Directory ($dir) $issue in scripts.php::loadDirSimple() on mirror " . $_SERVER["HTTP_HOST"] . "\">webmaster@eclipse.org</a>, or make directory readable.</p>";
			$hadLoadDirSimpleError = 1;
		}
	}

	return $stuff;
}

function wArr($arr)
{
	print "<pre>\n";
	print_r($arr);
	print "</pre>\n";
}

function w($s, $br = "") // shortcut for echo() with second parameter: "add break+newline"
{
	if (stristr($br, "n"))
	{
		$br = "\n";
	}
	else if ($br)
	{
		$br = "<br/>\n";
	}

	print $s . $br;
}

function getNews($lim, $key, $xml = "", $linkOnly=false, $dateFmtPre="", $dateFmtSuf="") // allow overriding in case the file's not in /$PR/
{
	global $PR;

	$xml = ($xml ? $xml : file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/$PR/" . "news/news.xml"));
	$news_regex = "%
		<news\ date=\"([^\"]+)\"\ showOn=\"([^\"]+)\">.*\\n
		(.+)\\n
		</news>.*\\n
		%mx";

	if (!$xml)
	{
		print "<p><b><i>Error</i></b> Couldn't find any news!</p>\n";
	}

	$regs = null;
	preg_match_all($news_regex, $xml, $regs);
	$i_real = 0;
	foreach (array_keys($regs[0]) as $i)
	{
		if ($i_real >= $lim && $lim > 0)
		{
			return;
		}

		$showOn = explode(",", $regs[2][$i]);
		if ($key == "all" || in_array($key, $showOn))
		{
			$i_real++;
			print "<p>\n";
			if (strtotime($regs[1][$i]) > strtotime("-3 weeks"))
			{
				if (preg_match("/update/i",$regs[3][$i]))
				{
					print '<img src="/modeling/images/updated.gif" alt="Updated!"/> ';
				}
				else
				{
					print '<img src="/modeling/images/new.gif" alt="New!"/> ';
				}

			}
			if (!$dateFmtPre && !$dateFmtSuf)
			{
				$app = (date("Y", strtotime($regs[1][$i])) < date("Y") ? ", Y" : "");
				print date("M" . '\&\n\b\s\p\;jS' . $app, strtotime($regs[1][$i])) . ' - ' . "\n";
			} else if ($dateFmtPre)
			{
				print date($dateFmtPre,strtotime($regs[1][$i]));
			}
			if ($linkOnly)
			{
				$link = preg_replace("#.+(<a .+</a>).+#","$1",$regs[3][$i]);
			}
			else
			{
				$link = $regs[3][$i];
			}
			print $link;
			if ($dateFmtSuf)
			{
				print date($dateFmtSuf,strtotime($regs[1][$i]));
			}
			print "</p>\n";
		}
	}
}

function build_news($cvsprojs, $cvscoms, $proj, $limit = 4)
{
	global $projects, $PR;

	$types = array(
		"I" => "integration",
		"M" => "maintenance",
		"N" => "nightly",
		"R" => "release",
		"S" => "stable"
	);

	$limit = ($limit >= 0 ? "LIMIT $limit" : "");

	$projectsf = array_flip($cvsprojs);
	foreach ($cvscoms as $z)
	{
		$projectsf = array_merge($projectsf, array_flip($z));
	}
	$q = array();

	foreach (array_keys($cvsprojs) as $z)
	{
		$q[$z] = "(CONVERT('$cvsprojs[$z]' USING utf8), CONVERT('' USING utf8))";
	}

	foreach (array_keys($cvscoms) as $z)
	{
		foreach (array_keys($cvscoms[$z]) as $y)
		{
			$q[$y] = "(CONVERT('$z' USING utf8), CONVERT('{$cvscoms[$z][$y]}' USING utf8))";
		}
	}

	if ($proj && isset($q[$proj]))
	{
		$where = $q[$proj];
	}
	else
	{
		$where = join(",", $q);
	}

	$result = wmysql_query("SELECT IF(`component` != '', `component`, `project`), `vanityname`, `branch`, CONCAT(DATE_FORMAT(`buildtime`, '%b %D '), IF(YEAR(`buildtime`) = YEAR(NOW()), '', YEAR(`buildtime`))), `type`, `buildtime` >= NOW() - INTERVAL 3 WEEK, CONCAT(`type`, DATE_FORMAT(buildtime, '%Y%m%d%H%i')) FROM `releases` WHERE (`project`, `component`) IN($where) AND `vanityname` != '0.0.0' ORDER BY `buildtime` DESC $limit");

	if ($result)
	{
		while ($row = mysql_fetch_row($result))
		{
			$img = ($row[5] ? "<img src=\"/modeling/images/new.gif\" alt=\"New!\"/>" : "");
			$notes = "<a href=\"/$PR/news/relnotes.php?project=" . $projectsf[$row[0]] . "&amp;version=$row[1]\">";
			$link = "<a href=\"/$PR/downloads/?showAll=1&amp;project=" . $projectsf[$row[0]] . "&amp;hlbuild=$row[6]#$row[6]\">";
			$branch = ($row[2] == "HEAD" ? "" : "<i>$row[2]</i> ");
			$type = (preg_match("/maintenance$/", $row[2]) ? "" : $types[$row[4]] . " ");
			if ($row[4] == "R")
			{
				print "<p>$img $row[3] - $notes" . strtoupper($projectsf[$row[0]]) . " $row[1]</a> has been released! Get it ${link}here</a>.</p>";
			}
			else
			{
				print "<p>$img $row[3] - " . strtoupper($projectsf[$row[0]]) . " $branch${type}build $notes$row[1]</a> is available for ${link}download</a>.</p>";
			}
		}
	}
	else
	{
		print "<p>Sorry, can't access database.</p>";
	}
}

/* TODO: remove this when we upgrade php to >= 4.3.0 everywhere */
if (!function_exists("file_get_contents"))
{
	function file_get_contents($file)
	{
		return (is_file($file) ? join("", file($file)) : "");
	}
}

function getProjectArray($projects, $extraprojects, $nodownloads, $PR) //only the projects we have the files for
{
	$pwd = getPWD();

	$projs = loadDirSimple($pwd, ".*", "d"); // locally available
	foreach ($nodownloads as $z)
	{
		/* php <4.2.0 returns NULL on array_search() failure, but php >=4.2.0 returns FALSE on array_search() failure, so don't check that */
		if (is_numeric($s = array_search($z, $projs)))
		{
			unset($projs[$s]);
		}
	}

	return array_intersect(array_merge($projects, $extraprojects), $projs);
}

function doSelectProject($projectArray, $proj, $nomenclature, $style = "homeitem3col", $showAll = "", $showMax = "", $sortBy = "")
{
	global $incubating;
	$vars = array("showAll", "showMax", "sortBy", "hlbuild");
	$tmp = preg_replace("#^/#", "", $proj);

	$hlbuild = (isset($_GET["hlbuild"]) && preg_match("/^[IMNRS]\d{12}$/", $_GET["hlbuild"]) ? $_GET["hlbuild"] : "");

	$out = "<div class=\"" . ($style == "sideitem" ? "sideitem" : "homeitem3col") . "\">\n";
	$tag = ($style == "sideitem" ? "h6" : "h3");
	$out .= "<$tag>";
	if ($style != "sideitem" && isset($incubating) && in_array($tmp, $incubating))
	{
		$out .= '<a href="http://www.eclipse.org/projects/what-is-incubation.php"><img style="float:right"
		src="http://www.eclipse.org/modeling/images/egg-icon.png" alt="Validation (Incubation) Phase"
		border="0" /></a>';
	}
	$out .= "$nomenclature selection</$tag>\n";
	$out .= "<form action=\"" . $_SERVER["SCRIPT_NAME"] . "\" method=\"get\" id=\"subproject_form\">\n";
	$out .= "<p>\n";
	$out .= "<label for=\"project\">$nomenclature: </label>\n";

	$out .= "<select id=\"project\" name=\"project\" onchange=\"javascript:document.getElementById('subproject_form').submit()\">\n";
	foreach ($projectArray as $k => $v)
	{
		$out .= "<option value=\"$v\">$k</option>\n";
	}
	$out .= "</select>\n";
	foreach ($vars as $z)
	{
		if ($$z !== "")
		{
			$out .= "<input type=\"hidden\" name=\"$z\" value=\"" . $$z . "\"/>\n";
		}
	}
	$out = preg_replace("#<option (value=\"$tmp\")>#", "<option selected=\"selected\" $1>", $out);
	$out .= "<input type=\"submit\" value=\"Go!\"/>\n";
	$out .= "</p>\n";
	$out .= "</form>\n";
	$out .= "</div>\n";

	return $out;
}

function project_name($proj)
{
	global $projects, $PR;

	$tmp = array_flip($projects);
	$proj = preg_replace("#^/#", "", $proj);
	return isset($tmp[$proj]) ? $tmp[$proj] : (isset($tmp[$PR]) ? $tmp[$PR] : "");
}

function debug($str, $level = 0)
{
	global $debug;

	if ($debug > $level)
	{
		print "<div class=\"debug\">$str</div>\n";
	}
}

function debug_r($str, $header = "", $footer = "", $level = 0, $isPreformatted = false)
{
	global $debug;

	if ($debug > $level)
	{
		if ($header) {
		    print "<div class=\"debug\">"; print $header; print "</div>\n";
		}
		print "<div class=\"debug\">";
		print $isPreformatted ? "<pre><small>" : "";
		print_r($str);
		print $isPreformatted ? "</small></pre>" : "";
		print "</div>\n";
		if ($footer)
		{
		    print "<div class=\"debug\">"; print $footer; print "</div>\n";
		}
	}
}

function isAuthorized()
{
	global $isEMFserver, $isBuildServer;

	if ($isBuildServer) {
		return true;
	}
	// must be on a build server and must not be on www.eclipse.org
	if ($isEMFserver && $_SERVER["DOCUMENT_ROOT"] != "/home/data/httpd/www.eclipse.org/html")
	{
		return true;
	}
	$server_name = domainSuffix($_SERVER["SERVER_NAME"]);
	$host_ip = $_SERVER["SERVER_NAME"] ? gethostbyname($server_name) : null;
	$host_name = $_SERVER["SERVER_ADDR"] ? domainSuffix(gethostbyaddr($_SERVER["SERVER_ADDR"])) : null;
	if ($host_ip && $host_name && $host_ip == $_SERVER["SERVER_ADDR"] && $host_name == $_SERVER["SERVER_NAME"])
	{
		return true;
	}
	return false;
}

function domainSuffix($domain)
{
	return preg_replace("/.*([^\.]+\.[^\.]+)$/", "$1", $domain);
}

function internalUseOnly()
{
	global $theme;
	if (!isAuthorized())
	{
		require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include_once($App->getProjectCommon());
		ob_start(); ?>

		<div id="midcolumn">

		<div class="homeitem3col">
		<h3>For Internal Use Only</h3>
		<p>Sorry, this script must be run from a sanctioned build server. Contact Nick Boldt (codeslave[at]ca[dot]ibm[dot]com) for details.</p>
		</div>
		</div>
		<?php
		$html = ob_get_contents();
		ob_end_clean();

		$pageTitle = "For Internal Use Only";
		$pageKeywords = "";
		$pageAuthor = "Nick Boldt";

		$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
		exit;
	}
}

function pick_project(&$proj, &$cvsproj, $cvsprojs, &$cvscom, $cvscoms, $components)
{
	if (isset($_GET["project"]))
	{
		if (sizeof($cvsprojs) > 0 && preg_match("/^(?:" . join("|", array_keys($cvsprojs)) . ")$/", $_GET["project"]))
		{
			$proj = $_GET["project"];
			$cvsproj = $cvsprojs[$proj];
		}
		else if (sizeof($components) > 0 && preg_match("/^(?:" . join("|", array_keys($components)) . ")$/", $_GET["project"]))
		{
			$proj = $_GET["project"];
			$cvsproj = $components[$proj][0];
			$cvscom = $components[$proj][1];
		}
	}
}

/* rearrange $cvscoms into a more convenient form */
function components($cvscoms)
{
	$components = array();

	if (isset($cvscoms) && is_array($cvscoms))
	{
		foreach (array_keys($cvscoms) as $z)
		{
			foreach (array_keys($cvscoms[$z]) as $y)
			{
				/* $proj = array($cvsproj, $cvscom) */
				$components[$y] = array($z, $cvscoms[$z][$y]);
			}
		}
	}

	return $components;
}

/* convert a wiki category page into a series of <li> items */
function wikiCategoryToListItems($category)
{
	$wiki_contents = "";

	// insert wiki content
	$host = "wiki.eclipse.org";
	$url = "/Category:" . $category;

	$header = "Host: $host\r\n";
	$header .= "User-Agent: PHP Script\r\n";
	$header .= "Connection: close\r\n\r\n";

	$fp = fsockopen($host, 80, $errno, $errstr, 30);
	if (!$fp)
	{
		$out .= "<li><i>$errstr ($errno)</i></li>\n";
	}
	else
	{
		fputs($fp, "GET $url HTTP/1.1\r\n");
		fputs($fp, $header);
		while (!feof($fp))
		{
			$wiki_contents .= fgets($fp, 128);
		}
		fclose($fp);
	}

	$out = "";
	if ($wiki_contents)
	{
		$m = null;
		if (preg_match("#<div id=\"mw-pages\">(.+)</div>[ \t\n]*<div class=\"printfooter\">#s", $wiki_contents, $m))
		{
			$links = null;
			if (preg_match_all("#<a href=\"([^\"]+)\" title=\"([^\"]+)\">([^<]+)</a>#", $m[1], $links, PREG_SET_ORDER))
			{
				foreach ($links as $z)
				{
					$out .= "<li><a href=\"http://wiki.eclipse.org/$z[1]\" title=\"$z[2]\">$z[3]</a></li>\n";
				}
			}
		}
	}
	return $out;
}

function getProjectFromPath($PR)
{
	$m = null;
	return preg_match("#/".$PR."/([^/]+)/build/.+#", $_SERVER["PHP_SELF"], $m) ? $m[1] :
		(preg_match("#/(".$PR.")/build/.+#", $_SERVER["PHP_SELF"], $m) ? $m[1] : "");
}

function cvsminus($rev)
{
	if (preg_match("/^1\.1$/", $rev)) // "1.10" == "1.1" returns true, curiously enough
	{
		return $rev;
	}
	else
	{
		if (preg_match("/\.1$/", $rev))
		{
			return preg_replace("/^(\d+\.\d+)\..+$/", "$1", $rev);
		}
		else
		{
			return preg_replace("/^(.+\.)(\d+)$/e", "\"$1\" . ($2 - 1);", $rev);
		}
	}
}

function changesetForm($bugid = "")
{
	?>
	<form action="http://www.eclipse.org/modeling/emf/news/changeset.php" method="get" target="_blank">
	<p>
		<label for="bugid">Bug ID: </label><input size="7" type="text" name="bugid" id="bugid" value="<?php print $bugid; ?>"/>
		<input type="submit" value="Go!"/>
	</p>
	<p><a href="javascript:void(0)" onclick="javascript:this.style.display = 'none'; document.getElementById('changesetinfo').style.display = 'block';">How does this work?</a></p>
	<div id="changesetinfo" style="display: none">
		<p>
			Use this form to generate a bash shell script which can be run against the projects and plugins in your workspace to produce a patch file
			showing all changes for a given bug.
		</p>
		<p>
			The requested bug must be indexed in the <a href="http://www.eclipse.org/modeling/searchcvs.php?q=190525">Search CVS</a> database.
			Download the generated script for more information. If the script is empty, then the bug was not found.
		</p>
	</div>
	</form>
<?php
}

function tokenize($in) # split a shell command into flag/value pairs
{
	/* 17722 ? Ss 0:00 /bin/bash /home/www-data/build/modeling/scripts/start.sh -proj gmf 
	 * -sub gmf -version 2.1.0 -branch HEAD 
	 * -URL http://download.eclipse.org/eclipse/downloads/drops/S-3.4M7-200805020100/eclipse-SDK-3.4M7-linux-gtk.tar.gz 
	 * -URL http://download.eclipse.org/modeling/emf/emf/downloads/drops/2.4.0/S200805052017/emf-sdo-xsd-SDK-2.4.0M7.zip 
	 * -URL http://download.eclipse.org/modeling/mdt/uml2/downloads/drops/2.2.0/S200805052208/mdt-uml2-SDK-2.2.0M7.zip 
	 * -URL http://download.eclipse.org/tools/orbit/downloads/drops/S20080427194908/orbitBundles-S20080427194908.map 
	 * -URL http://emft.eclipse.org/modeling/mdt/ocl/downloads/drops/1.2.0/S200805061053/mdt-ocl-SDK-1.2.0M7.zip 
	 * -URL http://emft.eclipse.org/modeling/emf/query/downloads/drops/1.2.0/S200805061125/emf-query-SDK-1.2.0M7.zip 
	 * -URL http://download.eclipse.org/modeling/emf/transaction/downloads/drops/1.2.0/S200805061205/emf-transaction-SDK-1.2.0M7.zip 
	 * -URL http://emft.eclipse.org/modeling/emf/validation/downloads/drops/1.2.0/S200805061125/emf-validation-SDK-1.2.0M7.zip 
	 * -URL http://download.eclipse.org/tools/gef/downloads/drops/3.4.0/S200804291800/GEF-ALL-3.4.0M7.zip -antTarget run 
	 * -mapfileRule use-false -buildType I -javaHome /opt/sun-java2-5.0 -downloadsDir /home/www-data/build/downloads 
	 * -buildDir /home/www-data/build/modeling/gmf/gmf/downloads/drops/2.1.0/I200805072353 
	 * -writableBuildRoot /home/www-data -buildTimestamp 200805072353 
	 * -email gmf-releng@eclipse.org,nickboldt@gmail.com,max.feldman@borland.com,anthonyh@ca.ibm.com 
	 * -basebuilderBranch RC1_34 
	 */
	$bits = explode(" -", $in);
	$pairs["cmd"] = $bits[0];
	for ($i=1; $i<sizeof($bits); $i++)
	{
		$pair = explode(" ", $bits[$i]);
		if (isset($pair[0]) && isset($pair[1]))
		{ 
			$pairs[$pair[0]] = $pair[1];
		}
		else if (isset($pair[0]))
		{ 
			$pairs[$pair[0]] = "";
		} 			
	}
	return $pairs;
} 

?>
