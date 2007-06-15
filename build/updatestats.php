<?php

require_once ("../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

require_once($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/scripts.php");
$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
$isBuildServer = (preg_match("/^(emft|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"])) || $isEMFserver;
internalUseOnly(); 

include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

/* projects or components for which there are currently no stats stored (such as for new projects) need to have a placeholder entry before they will be accounted for
 * this placeholder entry must be one day before the first day for which you would like stats to be stored
 * for example, if you wanted to start collecting stats for org.eclipse.emf/foo, starting with 2007-05-03, do something like so:
 *
 * INSERT INTO `file_downloads` SET `project` = 'org.eclipse.emf', `component` = 'foo', `day` = '2007-05-02', `fid` = 0;
 * INSERT INTO `country_downloads` SET `project` = 'org.eclipse.emf', `component` = 'foo', `day` = '2007-05-02', `country` = '__';
 *
 * after a project has real stats stored, the placeholder entries should be deleted:
 *
 * DELETE FROM `file_downloads` WHERE `project` = 'org.eclipse.emf' AND `component` = 'foo' AND `day` = '2007-05-02' AND `fid` = 0;
 * DELETE FROM `country_downloads` WHERE `project` = 'org.eclipse.emf' AND `component` = 'foo' AND `day` = '2007-05-02' AND `country` = '__';
 *
 * stats will not be collected for projects or components described above until these steps have been followed
 */

/* all of the file patterns we want to consider for a particular project and component
 * file patterns are matched with MySQL's REGEXP(), which is ereg rather than preg style
 * project => component => filepatterns
 */
$files = array(
	"org.eclipse.emf" => array(
		"" => array(
			"/emf-sdo-xsd-(Standalone|SDK)-.+\.zip$",
			"/emf-sdo-(SDK|runtime)-.+\.zip$",
			"/org\.eclipse\.emf\.ecore_.+\.jar$"
		),
		"org.eclipse.emf.query" => array(
			"/emf-query-(SDK|runtime|examples)-.+\.zip$",
			"/org\.eclipse\.emf\.query_.+\.jar$"
		),
		"org.eclipse.emf.transaction" => array(
			"/emf-transaction-(SDK|runtime|examples)-.+\.zip$",
			"/org\.eclipse\.emf\.transaction.+\.jar$"
		),
		"org.eclipse.emf.validation" => array(
			"/emf-validation-(SDK|runtime|examples)-.+\.zip$",
			"/org\.eclipse\.emf\.validation.+\.jar$"
		)
	),
	"org.eclipse.mdt" => array(
		"org.eclipse.uml2" => array(
			"/(mdt-)?uml2-.+\.zip$",
			"/org\.eclipse\.uml2\.common_.+\.jar$"
		)
	),
	"org.eclipse.emft" => array(
		"eodm" => array(
			"/emft-eodm-(SDK|runtime|examples)-.+\.zip$",
			"/org\.eclipse(\.emf)?.cdo_.+\.jar$",
		),
		"jet" => array(
			"/emft-jet-(SDK|runtime|examples)-.+\.zip$",
			"/org\.eclipse(\.emf)?.jet_.+\.jar$",
		),
		"ocl" => array(
			"/emft-ocl-(SDK|runtime|examples)-.+\.zip$",
			"/org\.eclipse(\.emf)?.ocl_.+\.jar$",
		)
	)
);

$where = '`download_date` >= \'%1$s 00:00:00\' AND `download_date` <= \'%1$s 23:59:59\' AND `file_id` = %2$d';
$queries = array(
	"file" => array(
		"stats" => "SELECT COUNT(*) AS `c`, SUBSTRING_INDEX(`file_name`, '/', -1) as `f` FROM `downloads` NATURAL JOIN `download_file_index` WHERE $where GROUP BY `f`",
		"timeslice" => "SELECT MAX(`day`) + INTERVAL 1 DAY FROM `file_downloads` WHERE `project` = '%s' AND `component` = '%s'",
		"insert" => "INSERT INTO `file_downloads` (`project`, `component`, `day`, `fid`, `number`) VALUES ('%s', '%s', '%s', (SELECT `fid` FROM `distfiles` WHERE `filename` = '%s'), %d)"
	),
	"country" => array(
		"stats" => "SELECT COUNT(*) AS `c`, `ccode` FROM `downloads` WHERE $where GROUP BY `ccode`",
		"timeslice" => "SELECT MAX(`day`) + INTERVAL 1 DAY FROM `country_downloads` WHERE `project` = '%s' AND `component` = '%s'",
		"insert" => "INSERT INTO `country_downloads` (`project`, `component`, `day`, `country`, `number`) VALUES ('%s', '%s', '%s', '%s', %d)"
	)
);

require_once("/home/data/httpd/eclipse-php-classes/system/dbconnection_downloads_ro.class.php");

$dbc = new DBConnectionDownloads();
$dbh = $dbc->connect();

$otime = wmicrotime();
foreach (array_keys($files) as $project)
{
	foreach (array_keys($files[$project]) as $component)
	{
		print "[$project/$component]\n";
		$result = mysql_query("SELECT `file_id` FROM `download_file_index` WHERE " . join(" OR ", preg_replace("/^(.+)$/", "`file_name` REGEXP('$1')", $files[$project][$component])), $dbh);
		$fids = array();
		while ($row = mysql_fetch_row($result))
		{
			$fids[] = $row[0];
		}

		foreach (array_keys($queries) as $query)
		{
			print ";";
			$result = wmysql_query(sprintf($queries[$query]["timeslice"], $project, $component));
			$row = mysql_fetch_row($result);

			foreach (pending_timeslice($row[0]) as $day)
			{
				$itime = wmicrotime();
				print ":";
				foreach ($fids as $fid)
				{
					$result = mysql_query(sprintf($queries[$query]["stats"], $day, $fid), $dbh);
					while ($row = mysql_fetch_row($result))
					{
						wmysql_query(sprintf($queries[$query]["insert"], $project, $component, $day, $row[1], $row[0]));
						print ".";
					}
				}
				print "\n";
				print "added download stats for $project/$component, $day in " . (wmicrotime() - $itime) . "s\n";
			}
		}
		print "\n";
	}
}
print "ran for a total of " . (wmicrotime() - $otime) . "s\n";

/* return an array of all of the complete days that have passed, starting with $start (YYYY-mm-dd) */
function pending_timeslice($start)
{
	if (!$start)
	{
		return array();
	}

	$today = date("Y-m-d");

	$d = array();
	for ($ts = strtotime($start); $ts < strtotime($today); $ts = strtotime("+1 day", $ts))
	{
		$d[] = strftime("%Y-%m-%d", $ts);
	}

	return $d;
}

function wmicrotime()
{
	list($usec, $sec) = split(" ", microtime());
	return ($sec + $usec);
}
?>
