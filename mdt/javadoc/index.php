<?php
$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));

if ($isWWWserver)
{
	$PWD = "/home/data/httpd/download.eclipse.org/modeling/mdt/";
	$jdPWD = "/downloads/download.php?file=/modeling/mdt/";
}
else
{
	if (is_dir("../../../../modeling/mdt/"))
	{
		$PWD = "../../../../modeling/mdt/"; // in a javadoc folder in the /modeling/mdt area
	}
	else
		if (is_dir("../../../modeling/mdt/"))
		{
			$PWD = "../../../modeling/mdt/"; // in the web folder in /modeling/mdt/
		}
	$jdPWD = $PWD;
}

$subprojs = loadSubDirs($PWD, "(.+)");

$projDetails = array (
	/* path => project's downloads path, downloads page path, includes path, and vanity name */
	"/modeling/emf" => array (
		"/modeling/emf/downloads",
		"/modeling",
		"EMF"
	),
	"/technology/emft" => array (
		"/emft/downloads",
		"/emft",
		"EMFT"
	),
	"/modeling/mdt" => array (
		"/modeling/mdt/downloads",
		"/modeling",
		"MDT"
	)
);

foreach ($projDetails as $searchPath => $details)
{
	if (false !== strpos($_SERVER["SCRIPT_NAME"], $searchPath))
	{
		$projectDownloadsPath = $searchPath;
		$projectDownloadsPagePath = $details[0];
		$projectIncludesPath = $details[1];
		$projectName = $details[2];
		break;
	}
}

$projectsAll = array (
	"EMF" => array (
		"EMF" => "emf",
		"SDO" => "sdo",
		"XSD" => "xsd"
	),
	"EMFT" => array (
		"CDO" => "cdo",
		"EODM" => "eodm",
		"JET" => "jet",
		"JET Editor" => "jeteditor",
		"Net4j" => "net4j",
		"OCL" => "ocl",
		"Query" => "query",
		"Teneo" => "teneo",
		"Transaction" => "transaction",
		"Validation" => "validation"
	),
	"MDT" => array (
		"EODM" => "eodm",
		"UML2 OCL" => "uml2-ocl",
		"UML2 UML" => "uml2-uml",
		"UML2 Tools" => "uml2tools",
		"XSD" => "xsd"
	)
);

$doPhoenix = false;
if (is_file($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"))
{
	$doPhoenix = true;
}
//$doPhoenix = false; // uncomment to test degraded version 

$isBuildServer = preg_match("/^(build|emft).eclipse.org$/", $_SERVER["SERVER_NAME"]) || preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]);

if ($doPhoenix)
{
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
	$App = new App();
	$Nav = new Nav();
	$Menu = new Menu();
	if (is_file($App->getProjectCommon()))
	{
		include ($App->getProjectCommon());
	}
	ob_start();
}
else
{
	print '<html>' . "\n" .
	'<head>' . "\n" .
	'  <title>' . $projectName . ' Javadoc</title>' . "\n" .
	'  <link rel="stylesheet" type="text/css" href="http://' . ($isBuildServer ? $_SERVER["SERVER_NAME"] : "www.eclipse.org") . '/modeling/includes/downloads.css"/>' . "\n" .
	'</head>' . "\n" .
	'<body>' . "\n";
}

print '<div id="midcolumn">
<div class="homeitem3col">
<h3>Javadoc</h3>
<ul>
';

if (sizeof($subprojs) > 0)
{
	sort($subprojs);
	reset($subprojs);
	if (isset ($projects) && is_array($projects))
	{
		$trans = array_flip($projects);
	}
	else
	{
		$projects = $projectsAll[$projectName];
		$trans = array_flip($projects);
	}
	foreach ($subprojs as $subproj)
	{
		if (in_array($subproj, $projects))
		{
			$label = $trans[$subproj];

			print '<li><b> ' . $label . '</b>' . "\n";
			$vers = loadSubDirs("$PWD$subproj/javadoc", "");
			rsort($vers);
			reset($vers);
			$didprint = 0;
			foreach ($vers as $ver)
			{
				if (preg_match("/[^0-9.]+/", $ver))
				{
					$vers2 = loadSubDirs("$PWD$subproj/javadoc/" . $ver, "");
					rsort($vers2);
					reset($vers2);
					if (sizeof($vers2) > 0)
					{
						$didprint = 1;
						print "<ul>\n";
					}
					foreach ($vers2 as $ver2)
					{
						print '<li><a href="' . $jdPWD . $subproj . '/javadoc/' . $ver . '/' . $ver2 . '/">' . $ver . ' ' . $ver2 . '</a></li>' . "\n";
					}
					if (sizeof($vers2) > 0)
					{
						print "</ul>\n";
					}
				}
				else
				{
					$didprint = 1;
					print '<ul><li><a href="' . $jdPWD . $subproj . '/javadoc/' . $ver . '/">' . $subproj . ' ' . $ver . '</a></li></ul>' . "\n";
				}
			}
			if ($didprint == 0)
			{
				print "<ul><li><i>None available.</i></li></ul>";
			}
			print '</li>' . "\n";
		}
	}
}
else
{
	print "<li>No javadoc found!</li>";
}
print "</ul>\n";
print "</div></div>\n";

if ($doPhoenix)
{
	$html = ob_get_contents();
	ob_end_clean();

	$pageTitle = "Modeling - MDT - Javadoc";
	$pageKeywords = "";
	$pageAuthor = "Nick Boldt";

	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="http://' . ($isBuildServer ? $_SERVER["SERVER_NAME"] : "www.eclipse.org") . '/modeling/includes/downloads.css"/>' . "\n");
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
}
else
{
	print "</body></html>\n";
}

function loadSubDirs($dir, $ext)
{
	$stuff = array ();

	if (is_dir($dir) && is_readable($dir))
	{
		$handle = opendir($dir);
		while (($file = readdir($handle)) !== false)
		{
			if (preg_match("/$ext$/", $file) && !preg_match("/^\.{1,2}$/", $file) && is_dir("$dir/$file"))
			{
				$stuff[] = $file;

			}
		}
		closedir($handle);
	}

	return $stuff;
}
?>