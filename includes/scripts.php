<?php 
// $Id: scripts.php,v 1.9 2006/11/02 20:56:59 nickb Exp $ 

function PWD_debug($PWD, $suf, $str)
{
	global $debug_echoPWD;
	$debug_echoPWD = 1;

	if ($debug_echoPWD && is_dir($PWD) && is_readable($PWD) && ($suf != "logs" || is_writable($PWD)))
	{
		print $str;
		$debug_echoPWD = 0;
	}
}

function PWD_check($PWD, $suf)
{
	return (!is_dir($PWD) || !is_readable($PWD) || ($suf == "logs" && !is_writable($PWD)));
}

function getPWD($suf = "")
{
	global $PR;
	$debug_echoPWD = 1; // set 0 to hide (for security purposes!)

	//dynamic assignments
	$PWD = $_SERVER["DOCUMENT_ROOT"] . "/$PR/" . $suf;

	PWD_debug($PWD, $suf, "<!-- Found[1dyn]: PWD -->");

	//static assignments
	if (PWD_check($PWD, $suf))
	{
		$servers = array(
			"/emf(?:\.torolab\.ibm\.com)?/" => "/home/www-data/build/$PR/$suf",
			"/download1\.eclipse\.org/" => "/home/data/httpd/download.eclipse.org/$PR/$suf",
			"/fullmoon\.torolab\.ibm\.com/" => "/home/www/$PR/$suf"
		);

		foreach (array_keys($servers) as $z)
		{
			if (preg_match($z, $_SERVER["HTTP_HOST"]))
			{
				$PWD = $servers[$z];
				PWD_debug($PWD, $suf, "<!-- Found[2stat]: PWD -->");
			}
		}
	}

	//try a default guess: /home/www, two options
	if (PWD_check($PWD, $suf))
	{
		$data = array(
			3 => array(
				"checkdir" => "/home/data/httpd/download.eclipse.org/",
				"tries" => array(
					"/home/data/httpd/download.eclipse.org/$PR/$suf",
					"/home/www/eclipse/$PR/$suf"
				)
			),
			4 => array(
				"checkdir" => "/var/www/",
				"tries" => array(
					"/var/www/$PR/$suf",
					"/var/www/eclipse/$PR/$suf"
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
					$PWD = $data[$y]["tries"][$z];
					if (!PWD_check($PWD, $suf))
					{
						PWD_debug($PWD, $suf, "<!-- Found[${y}def-$z]: PWD -->");
						break 2;
					}
				}
			}
		}
	}

	if ($PWD == "" || PWD_check($PWD, $suf))
	{ 
		print "<!-- PWD not found! -->";
	}

	debug("'$suf' ended up with '$PWD' (is_readable: " . is_readable($PWD) . ", is_dir: " . is_dir($PWD) . ")");

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

function getNews($lim, $key)
{
	global $PR;

	$xml = file_contents($_SERVER["DOCUMENT_ROOT"] . "/$PR/" . "news/news.xml"); 
	$news_regex = "%
		^<news\ date=\"([^\"]+)\"(?:\ showOn=\"([^\"]+)\")?>$\\n
		((?:^[^<].+$\\n)+)
		^</news>$\\n
		%mx";

	if (!$xml)
	{
		print "<p><b><i>Error</i></b> Couldn't find any news!</p>\n";
	}

	$regs = null;
	preg_match_all($news_regex, $xml, $regs);
	foreach (array_keys($regs[0]) as $i)
	{
		if ($i >= $lim && $lim > 0)
		{
			return;
		}

		$showOn = explode(",", $regs[2][$i]);
		if ($key == "all" || in_array($key, $showOn))
		{
			print "<p>\n";
			if (strtotime($regs[1][$i]) > strtotime("-3 weeks"))
			{
				print '<img src="http://www.eclipse.org/emf/images/new.gif" alt="New!" width="31" height="14"/>';
			}
			$app = (date("Y", strtotime($regs[1][$i])) < date("Y") ? ", Y" : "");
			print '<b>' . date(($key == "whatsnew" ? "M" : "F") . '\&\n\b\s\p\;j\<\s\u\p\>S\<\/\s\u\p\>' . $app, strtotime($regs[1][$i])) . '</b> - ' . "\n";
			print $regs[3][$i];
			print "</p>\n";
		}
	}
}
	

function file_contents($file) //TODO: remove this when we upgrade php to >= 4.3.0 everywhere
{
	if (function_exists("file_get_contents"))
	{
		return file_get_contents($file);
	}
	else
	{
		return join("", file($file));
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
	$vars = array("showAll", "showMax", "sortBy", "hlbuild");

	$hlbuild = (isset($_GET["hlbuild"]) && preg_match("/^[IMNRS]\d{12}$/", $_GET["hlbuild"]) ? $_GET["hlbuild"] : "");

	$out = "<div class=\"" . ($style == "sideitem" ? "sideitem" : "homeitem3col") . "\">\n";
	$out .= "<" . ($style == "sideitem" ? "h6" : "h3") . ">$nomenclature selection</" . ($style == "sideitem" ? "h6" : "h3") . ">\n";
	$out .= "<form action=\"" . $_SERVER["SCRIPT_NAME"] . "\" method=\"get\" id=\"subproject_form\">\n";
	$out .= "<p>\n";
	$out .= "<label for=\"project\">$nomenclature: </label>\n";
	$out .= "<select id=\"project\" name=\"project\" onchange=\"javascript:document.getElementById('subproject_form').submit()\">\n";

	foreach ($projectArray as $k => $v) 
	{
		$out .= "<option value=\"$v\"" . ("") . ">$k</option>\n";
	}
	$out .= "</select>\n";
	foreach ($vars as $z)
	{
		if ($$z !== "")
		{
			$out .= "<input type=\"hidden\" name=\"$z\" value=\"" . $$z . "\"/>\n";
		}
	}
	$tmp = preg_replace("#^/#", "", $proj);
	$out = preg_replace("#<option (value=\"$tmp\")>#", "<option selected=\"selected\" $1>", $out);
	$out .= "<input type=\"submit\" value=\"Go!\"/>\n";
	$out .= "</p>\n";
	$out .= "</form>\n";
	$out .= "</div>\n";

	return $out;
}

function project_name($proj)
{
	global $projects;

	$tmp = array_flip($projects);
	$proj = preg_replace("#^/#", "", $proj);
	return $tmp[$proj];
}

function debug($str, $level = 0)
{
	global $debug;

	if ($debug > $level)
	{
		print "<div class=\"debug\">$str</div>\n";
	}
}
?>
