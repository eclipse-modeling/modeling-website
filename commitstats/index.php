<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();


// http://dash.eclipse.org/dash/commits/web-app/summary.cgi?type=y&year=x&login=nickb
// http://dash.eclipse.org/dash/commits/web-api/commit-details.php?project=modeling.gmf&year=2007&login=rgronback

$theme = "Phoenix";

include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

print "<div id=\"midcolumn\">\n";

print "<h1>Eclipse Project Stats by Company, Commits &amp; LOC</h1>\n";

print "<p><b><i>This automatically collected information may not represent true activity and should not be used as sole " . 
	"indicator of individual or project behavior.<br/>See the <a href=\"http://wiki.eclipse.org/index.php/Commits_Explorer\">wiki page</a> for " . 
	"known data anomalies. To report issues or request enhancements, see <a href=\"https://bugs.eclipse.org/bugs/show_bug.cgi?id=209711\">bug 209711</a>.</i></b></p>\n";

$year = 2007;
$commits_file = "data/_data.php";
require_once($commits_file);
$commits_file = "data/_data2.php";
require_once($commits_file);

if (isset($_GET["sortBy"]))
{
	preg_match("#(activecommitters|inactivecommitters|totalcommitters|pcactive|commits|loc|alocpc)#",$_GET["sortBy"],$matches);
	if (isset($matches) && isset($matches[1]))
	{
		$sortBy=$matches[1];
	}
}
if (isset($_GET["show"]))
{
	preg_match("#(active|inactive|all|commitspp|locpp)#",$_GET["show"],$matches);
	if (isset($matches) && isset($matches[1]))
	{
		$show=$matches[1];
	}
	}

# array to use when foreaching
$array = $commits;

# calculate missing data - approx LOC per commit
$alocpc = array(); 
foreach ($commits as $company => $v)
{
	$alocpc[$company] = $loc[$company]/$commits[$company];
}

# calculate missing data - inactive committers
$num_committers_inactive = array(); 
foreach ($num_committers as $company => $v)
{
	$num_committers_inactive[$company] = $num_committers[$company] - $num_committers_active[$company];
}
$num_committers_inactive_total = $num_committers_total - $num_committers_active_total;

# calculate missing data - inactive committers
$percent_active = array(); 
foreach ($num_committers as $company => $v)
{
	$percent_active[$company] = $num_committers_active[$company]/$num_committers[$company];
}

# define sort table
if ($sortBy=="activecommitters")
{
	arsort($num_committers_active); reset($num_committers_active); $array = $num_committers_active;
}
else if ($sortBy=="inactivecommitters")
{
	arsort($num_committers_inactive); reset($num_committers_inactive); $array = $num_committers_inactive;
}
else if ($sortBy=="totalcommitters")
{
	arsort($num_committers); reset($num_committers); $array = $num_committers;
}
else if ($sortBy=="pcactive")
{
	arsort($percent_active); reset($percent_active); $array = $percent_active;
}
else if ($sortBy=="commits")
{
	arsort($commits); reset($commits); $array = $commits;
}
else if ($sortBy=="loc")
{
	arsort($loc); reset($loc); $array = $loc;
}
else if ($sortBy=="alocpc")
{
	arsort($alocpc); reset($alocpc); $array = $alocpc;
}

# begin rendering HTML

$row = 0;
# header / column sorts
print "<table><tr bgcolor=\"". bgcol($row). "\">" .
	"<th valign=\"bottom\"><a href=\"?sortBy=&amp;show=$show\">Company</a></th>" . 
	"<th colspan=\"2\"><a href=\"?sortBy=activecommitters&amp;show=$show\">Active<br>Committers</a></th>" . 
	"<th colspan=\"2\"><a href=\"?sortBy=inactivecommitters&amp;show=$show\">Inactive<br>Committers</a></th>" . 
	"<th colspan=\"2\"><a href=\"?sortBy=totalcommitters&amp;show=$show\">Total<br>Committers</a></th>" . 
	"<th colspan=\"1\"><a href=\"?sortBy=pcactive&amp;show=$show\">Percent<br>Active</a></th>" . 
	"<th colspan=\"2\"><a href=\"?sortBy=commits&amp;show=$show\">Commits<br/>($year)</a></th>" . 
	"<th colspan=\"2\"><a href=\"?sortBy=loc&amp;show=$show\">Lines of Code<br/>(last 9 months)</a></th>" . 
	"<th colspan=\"1\"><a href=\"?sortBy=alocpc&amp;show=$show\">Approx. LOC<br/>per Commit</a></th>" . 
"</tr>\n";
foreach($array as $company => $v)
{
	$row++;
	if (isset($company_subgroups) && is_array($company_subgroups) && array_key_exists($company,$company_subgroups) && isset($company_subgroups[$company]))
	{
		ksort($company_subgroups[$company]); reset($company_subgroups[$company]);
		
		print 
			"<tr bgcolor=\"". bgcol($row). "\">" . 
			"<td>$company</td>" .
			"<td align=\"right\">" . number($num_committers_active[$company]) . "</td><td align=\"right\">(" . percent($num_committers_active[$company]/$num_committers_active_total) . ")</td>" .
				 
			"<td align=\"right\">" . number($num_committers_inactive[$company]) . "</td><td align=\"right\">(" . percent(($num_committers_inactive[$company])/$num_committers_inactive_total) . ")</td>" .
				 
			"<td align=\"right\">" . number($num_committers[$company]) . "</td><td align=\"right\">(" . percent($num_committers[$company]/$num_committers_total) . ")</td>" .
				 
			"<td align=\"right\">" . percent($percent_active[$company]). "</td>" .
			"<td align=\"right\"><a href=\"javascript:toggle('" . $company . "_commits_per_project')\">" . number($commits[$company]) . "</a></td><td align=\"right\">(" . percent($commits[$company]/$num_commits_total) . ")</td>" . 
			"<td align=\"right\"><a href=\"javascript:toggle('" . $company . "_loc_per_project')\">" . number($loc[$company]) . "</a></td><td align=\"right\">(" . percent($loc[$company]/$num_loc_total). ")</td>" .
			"<td align=\"right\">" . round($alocpc[$company]). "</td>" .
		"</tr>\n";
	}
	else
	{
		print 
			"<tr bgcolor=\"". bgcol($row). "\">" . 
			"<td>$company</td>" .
			"<td align=\"right\"><a href=\"javascript:toggle('" . $company . "_active_committers')\">" . number($num_committers_active[$company]) . "</a></td><td align=\"right\">(" . percent($num_committers_active[$company]/$num_committers_active_total) . ")</td>" .
				 
			"<td align=\"right\"><a href=\"javascript:toggle('" . $company . "_inactive_committers')\">" . number($num_committers_inactive[$company]) . "</a></td><td align=\"right\">(" . percent(($num_committers_inactive[$company])/$num_committers_inactive_total) . ")</td>" .
				 
			"<td align=\"right\"><a href=\"javascript:toggle('" . $company . "_committers')\">" . number($num_committers[$company]) . "</a></td><td align=\"right\">(" . percent($num_committers[$company]/$num_committers_total) . ")</td>" .
				 
			"<td align=\"right\">" . percent($percent_active[$company]). "</td>" .
			"<td align=\"right\"><a href=\"javascript:toggle('" . $company . "_commits_per_project')\">" . number($commits[$company]) . "</a></td><td align=\"right\">(" . percent($commits[$company]/$num_commits_total) . ")</td>" . 
			"<td align=\"right\"><a href=\"javascript:toggle('" . $company . "_loc_per_project')\">" . number($loc[$company]) . "</a></td><td align=\"right\">(" . percent($loc[$company]/$num_loc_total). ")</td>" .
			"<td align=\"right\">" . round($alocpc[$company]). "</td>" .
		"</tr>\n";
	}
	$row++;
	if (isset($company_subgroups) && is_array($company_subgroups) && array_key_exists($company,$company_subgroups) && isset($company_subgroups[$company]))
	{
		foreach($company_subgroups[$company] as $subgroup_name => $subgroup_list)
		{
			$subgroup_label = $company . "_" . preg_replace("#[,&\(\) ]+#", "_",$subgroup_name);
			$num_subgroup_committers_active = 0;
			$num_subgroup_committers_inactive = 0;
			$num_subgroup_committers_total = 0;
			foreach ($subgroup_list as $n)
			{
				$num_subgroup_committers_total++;
				$num_subgroup_committers_active   += $committers[$company][$n]  > $inactive_threshhold ? 1 : 0;
				$num_subgroup_committers_inactive += $committers[$company][$n] <= $inactive_threshhold ? 1 : 0;
			}
			print 
				"<tr bgcolor=\"". bgcol3($row). "\">" .
				"<td><i>&#160;&#160;+ " . $subgroup_name . "</i></td>" .
				"<td align=\"right\"><i><a href=\"javascript:toggle('" . $subgroup_label . "_active_committers')\">" . number($num_subgroup_committers_active) . "</a></i></td><td align=\"right\"><i>(" . percent($num_subgroup_committers_active/$num_committers_active[$company]) . ")</i></td>" .
					 
				"<td align=\"right\"><i><a href=\"javascript:toggle('" . $subgroup_label . "_inactive_committers')\">" . number($num_subgroup_committers_inactive) . "</a></i></td><td align=\"right\"><i>(" . percent($num_subgroup_committers_inactive/$num_committers_inactive[$company]) . ")</i></td>" .
					 
				"<td align=\"right\"><i><a href=\"javascript:toggle('" . $subgroup_label . "_committers')\">" . number($num_subgroup_committers_total) . "</a></i></td><td align=\"right\"><i>(" . percent($num_subgroup_committers_total/$num_committers[$company]) . ")</i></td>" .
					 
				"<td align=\"right\"><i>" . percent($num_subgroup_committers_active/$num_subgroup_committers_total). "</td>" .
				#"<td align=\"right\"></td><td align=\"right\"></td>" . 
				#"<td align=\"right\"></td><td align=\"right\"></td>" .
				"<td align=\"right\" colspan=\"5\"></td>" .
			"</tr>\n";
			$row++;
			
			ksort($committers[$company]); reset($committers[$company]);
			
			# active group committers
			print "<tr id=\"" . $subgroup_label . "_active_committers\" style=\"display:" . ($show == "active" ? "" : "none") . "\" bgcolor=\"". bgcol2($row). "\">\n";
			print "<td colspan=\"13\" style=\"padding:6px\">";
			print "<div style=\"float:right\"><a href=\"javascript:toggle('" . $subgroup_label . "_active_committers')\">[x]</a></div>";
			print "&#160;&#160;+ <a href=\"javascript:toggle('" . $subgroup_label . "_active_committers')\"><b>$subgroup_name: " . $num_subgroup_committers_active . " Active Committers</b></a><br/>\n";
			print 
				"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">" . 
					"<tr><td valign=\"top\" style=\"padding-left:0px\">" . 
						"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
			$cnt=0;
			$row2=0;
			$split_thresh = $num_subgroup_committers_active > 5 ? ceil($num_subgroup_committers_active/5) : 5;
			$had_active_committer = false;
			foreach($committers[$company] as $committer_name => $committer_loc)
			{
				if (in_array($committer_name, $subgroup_list))
				{
					if ($committer_loc > $inactive_threshhold)
					{
						$had_active_committer = true;
						$cnt++;
						if ($cnt % $split_thresh == 1) 
						{
							print "</table></td><td valign=\"top\" style=\"padding-left:6px\"><table cellspacing=\"0\" cellpadding=\"0\" border=\"1\">\n"; 
							print "<tr bgcolor=\"". bgcol($row2). "\"><th>Committer</th><th>LOC</th></tr>\n";
							$row2++;
						}
						print 
							"<tr bgcolor=\"". bgcol($row2). "\"> <td valign=\"top\" align=\"left\" style=\"padding-left:6px\"><a target=\"summary\" href=\"" . 
							"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?project=x&type=y&year=" . $year . "&login=" . $committer_name . "\">" . $committer_name . "</a>" .  
							"</td><td valign=\"top\" align=\"right\" style=\"padding-left:6px\">" . number($committer_loc) .
							"</td> </tr>\n";
						$row2++;
					}
				}
			}
			if (!$had_active_committer)
			{
				print "<i>$company: No Active Committers!</i>";
			}	
			print "</table></td></tr></table>";
			print "</td></tr>\n";
			$row++;
					
			# inactive group committers
			print "<tr id=\"" . $subgroup_label . "_inactive_committers\" style=\"display:" . ($show == "inactive" ? "" : "none") . "\" bgcolor=\"". bgcol2($row). "\">\n";
			print "<td colspan=\"13\" style=\"padding:6px\">";
			print "<div style=\"float:right\"><a href=\"javascript:toggle('" . $subgroup_label . "_inactive_committers')\">[x]</a></div>";
			print "&#160;&#160;+ <a href=\"javascript:toggle('" . $subgroup_label . "_inactive_committers')\"><b>$subgroup_name: " . $num_subgroup_committers_inactive . " Inactive Committers</b></a><br/>\n";
			print 
				"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">" . 
					"<tr><td valign=\"top\" style=\"padding-left:0px\">" . 
						"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
			$cnt=0;
			$row2=0;
			$split_thresh = $num_subgroup_committers_inactive > 5 ? ceil($num_subgroup_committers_inactive/5) : 5;
			$had_inactive_committer = false;
			foreach($committers[$company] as $committer_name => $committer_loc)
			{
				if (in_array($committer_name, $subgroup_list))
				{
					if ($committer_loc <= $inactive_threshhold)
					{
						$had_inactive_committer = true;
						$cnt++;
						if ($cnt % $split_thresh == 1) 
						{
							print "</table></td><td valign=\"top\" style=\"padding-left:6px\"><table cellspacing=\"0\" cellpadding=\"0\" border=\"1\">\n"; 
							print "<tr bgcolor=\"". bgcol($row2). "\"><th>Committer</th><th>LOC</th></tr>\n";
							$row2++;
						}
						print 
							"<tr bgcolor=\"". bgcol($row2). "\"> <td valign=\"top\" align=\"left\" style=\"padding-left:6px\"><a target=\"summary\" href=\"" . 
							"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?project=x&type=y&year=" . $year . "&login=" . $committer_name . "\">" . $committer_name . "</a>" .  
							"</td><td valign=\"top\" align=\"right\" style=\"padding-left:6px\">" . number($committer_loc) .
							"</td> </tr>\n";
						$row2++;
					}
				}
			}
			if (!$had_inactive_committer)
			{
				print "<i>$company: No Inactive Committers!</i>";
			}	
			print "</table></td></tr></table>";
			print "</td></tr>\n";
			$row++;

			# all (total) group committers
			print "<tr id=\"" . $subgroup_label . "_committers\" style=\"display:" . ($show == "all" ? "" : "none") . "\" bgcolor=\"". bgcol2($row). "\">\n";
			print "<td colspan=\"13\" style=\"padding:6px\">";
			print "<div style=\"float:right\"><a href=\"javascript:toggle('" . $subgroup_label . "_committers')\">[x]</a></div>";
			print "&#160;&#160;+ <a href=\"javascript:toggle('" . $subgroup_label . "_committers')\"><b>$subgroup_name: " . $num_subgroup_committers_total. " Total Committers</b></a><br/>\n";
			print 
				"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">" . 
					"<tr><td valign=\"top\" style=\"padding-left:0px\">" . 
						"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
			$cnt=0;
			$row2=0;
			$split_thresh = $num_subgroup_committers_total > 5 ? ceil($num_subgroup_committers_total/5) : 5;
			foreach($committers[$company] as $committer_name => $committer_loc)
			{
				if (in_array($committer_name, $subgroup_list))
				{
					$cnt++;
					if ($cnt % $split_thresh == 1) 
					{
						print "</table></td><td valign=\"top\" style=\"padding-left:6px\"><table cellspacing=\"0\" cellpadding=\"0\" border=\"1\">\n"; 
						print "<tr bgcolor=\"". bgcol($row2). "\"><th>Committer</th><th>LOC</th></tr>\n";
						$row2++;
					}
					print 
						"<tr bgcolor=\"". bgcol($row2). "\"> <td valign=\"top\" align=\"left\" style=\"padding-left:6px\"><a target=\"summary\" href=\"" . 
							"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?project=x&type=y&year=" . $year . "&login=" . $committer_name . "\">" . $committer_name . "</a>" .   
						"</td><td valign=\"top\" align=\"right\" style=\"padding-left:6px\">" . number($committer_loc) .
						"</td> </tr>\n";
					$row2++;
				}
			}
			print "</table></td></tr></table>";
			print "</td></tr>\n";
			$row++;
		}
	}

	if (!isset($company_subgroups) || !is_array($company_subgroups) || !array_key_exists($company,$company_subgroups) || !isset($company_subgroups[$company]))
	{
		ksort($committers[$company]); reset($committers[$company]); 
		
		# active committers
		print "<tr id=\"" . $company . "_active_committers\" style=\"display:" . ($show == "active" ? "" : "none") . "\" bgcolor=\"". bgcol2($row). "\">\n";
		print "<td colspan=\"13\" style=\"padding:6px\">";
		print "<div style=\"float:right\"><a href=\"javascript:toggle('" . $company . "_active_committers')\">[x]</a></div>";
		print "<a href=\"javascript:toggle('" . $company . "_active_committers')\"><b>$company: " . $num_committers_active[$company] . " Active Committers</b></a><br/>\n";
		print 
			"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">" . 
				"<tr><td valign=\"top\" style=\"padding-left:0px\">" . 
					"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
		$cnt=0;
		$row2=0;
		$split_thresh = $num_committers_active[$company] > 5 ? ceil($num_committers_active[$company]/5) : 5;
		$had_active_committer = false;
		foreach($committers[$company] as $committer_name => $committer_loc)
		{
			if ($committer_loc > $inactive_threshhold)
			{
				$had_active_committer = true;
				$cnt++;
				if ($cnt % $split_thresh == 1) 
				{
					print "</table></td><td valign=\"top\" style=\"padding-left:6px\"><table cellspacing=\"0\" cellpadding=\"0\" border=\"1\">\n"; 
					print "<tr bgcolor=\"". bgcol($row2). "\"><th>Committer</th><th>LOC</th></tr>\n";
					$row2++;
				}
				print 
					"<tr bgcolor=\"". bgcol($row2). "\"> <td valign=\"top\" align=\"left\" style=\"padding-left:6px\"><a target=\"summary\" href=\"" . 
					"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?project=x&type=y&year=" . $year . "&login=" . $committer_name . "\">" . $committer_name . "</a>" .  
					"</td><td valign=\"top\" align=\"right\" style=\"padding-left:6px\">" . number($committer_loc) .
					"</td> </tr>\n";
				$row2++;
			}
		}
		if (!$had_active_committer)
		{
			print "<i>$company: No Active Committers!</i>";
		}	
		print "</table></td></tr></table>";
		print "</td></tr>\n";
		$row++;
			
		# inactive committers
		print "<tr id=\"" . $company . "_inactive_committers\" style=\"display:" . ($show == "inactive" ? "" : "none") . "\" bgcolor=\"". bgcol2($row). "\">\n";
		print "<td colspan=\"13\" style=\"padding:6px\">";
		print "<div style=\"float:right\"><a href=\"javascript:toggle('" . $company . "_inactive_committers')\">[x]</a></div>";
		print "<a href=\"javascript:toggle('" . $company . "_inactive_committers')\"><b>$company: " . $num_committers_inactive[$company] . " Inactive Committers</b></a><br/>\n";
		print 
			"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">" . 
				"<tr><td valign=\"top\" style=\"padding-left:0px\">" . 
					"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
		$cnt=0;
		$row2=0;
		$split_thresh = $num_committers_inactive[$company] > 5 ? ceil($num_committers_inactive[$company]/5) : 5;
		$had_inactive_committer = false;
		foreach($committers[$company] as $committer_name => $committer_loc)
		{
			if ($committer_loc <= $inactive_threshhold)
			{
				$had_inactive_committer = true;
				$cnt++;
				if ($cnt % $split_thresh == 1) 
				{
					print "</table></td><td valign=\"top\" style=\"padding-left:6px\"><table cellspacing=\"0\" cellpadding=\"0\" border=\"1\">\n"; 
					print "<tr bgcolor=\"". bgcol($row2). "\"><th>Committer</th><th>LOC</th></tr>\n";
					$row2++;
				}
				print 
					"<tr bgcolor=\"". bgcol($row2). "\"> <td valign=\"top\" align=\"left\" style=\"padding-left:6px\"><a target=\"summary\" href=\"" . 
					"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?project=x&type=y&year=" . $year . "&login=" . $committer_name . "\">" . $committer_name . "</a>" .  
					"</td><td valign=\"top\" align=\"right\" style=\"padding-left:6px\">" . number($committer_loc) .
					"</td> </tr>\n";
				$row2++;
			}
		}
		if (!$had_inactive_committer)
		{
			print "<i>No inactive committers!</i>";
		}
		print "</table></td></tr></table>";
		print "</td></tr>\n";
		$row++;
		
		# all (total) committers
		print "<tr id=\"" . $company . "_committers\" style=\"display:" . ($show == "all" ? "" : "none") . "\" bgcolor=\"". bgcol2($row). "\">\n";
		print "<td colspan=\"13\" style=\"padding:6px\">";
		print "<div style=\"float:right\"><a href=\"javascript:toggle('" . $company . "_committers')\">[x]</a></div>";
		print "<a href=\"javascript:toggle('" . $company . "_committers')\"><b>$company: " . $num_committers[$company]. " Total Committers</b></a><br/>\n";
		print 
			"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">" . 
				"<tr><td valign=\"top\" style=\"padding-left:0px\">" . 
					"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
		$cnt=0;
		$row2=0;
		$split_thresh = $num_committers[$company] > 5 ? ceil($num_committers[$company]/5) : 5;
		foreach($committers[$company] as $committer_name => $committer_loc)
		{
			$cnt++;
			if ($cnt % $split_thresh == 1) 
			{
				print "</table></td><td valign=\"top\" style=\"padding-left:6px\"><table cellspacing=\"0\" cellpadding=\"0\" border=\"1\">\n"; 
				print "<tr bgcolor=\"". bgcol($row2). "\"><th>Committer</th><th>LOC</th></tr>\n";
				$row2++;
			}
			print 
				"<tr bgcolor=\"". bgcol($row2). "\"> <td valign=\"top\" align=\"left\" style=\"padding-left:6px\"><a target=\"summary\" href=\"" . 
					"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?project=x&type=y&year=" . $year . "&login=" . $committer_name . "\">" . $committer_name . "</a>" .   
				"</td><td valign=\"top\" align=\"right\" style=\"padding-left:6px\">" . number($committer_loc) .
				"</td> </tr>\n";
			$row2++;
		}
		print "</table></td></tr></table>";
		print "</td></tr>\n";
		$row++;
	}
	
	# commits by project
	print "<tr id=\"" . $company . "_commits_per_project\" style=\"display:" . ($show == "commitspp" ? "" : "none") . "\" bgcolor=\"". bgcol2($row). "\">\n";
	print "<td colspan=\"13\" style=\"padding:6px\">";
	print "<div style=\"float:right\"><a href=\"javascript:toggle('" . $company . "_commits_per_project')\">[x]</a></div>";
	print "<a href=\"javascript:toggle('" . $company . "_commits_per_project')\"><b>$company: Committer Trends for " . sizeof($loc_per_project[$company]) . " Projects</b></a><br/>\n";
	print 
		"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">" . 
			"<tr><td valign=\"top\" style=\"padding-left:0px\">" . 
				"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
	$cnt=0;
	$row2=0;
	$split_thresh = sizeof($loc_per_project[$company]) > 5 ? ceil(sizeof($loc_per_project[$company])/3) : 5;
	foreach($loc_per_project[$company] as $project_name => $project_loc)
	{
		$cnt++;
		if ($cnt % $split_thresh == 1) 
		{
			print "</table></td><td valign=\"top\" style=\"padding-left:6px\"><table cellspacing=\"0\" cellpadding=\"0\" border=\"1\">\n"; 
			print "<tr bgcolor=\"". bgcol($row2). "\"><th>Project</th><th>Trend</th><th>Commit-<br/>ters</th></tr>\n";
			$row2++;
		}
		print 
			"<tr bgcolor=\"". bgcol($row2). "\"> <td valign=\"top\" align=\"left\" style=\"padding-left:6px\"><a target=\"summary\" href=\"" . 
				"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?company=x&login=y&project=" . $project_name . "&year=" . $year . "\">" . $project_name . "</a>" .  
			"</td><td valign=\"top\" align=\"middle\" style=\"padding-left:3px;padding-right:3px\"><a target=\"summary\" href=\"" . 
				"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?company=x&month=y&project=" . $project_name . "&year=" . $year . "\">Trend</a>" . 
			"</td><td valign=\"top\" align=\"right\" style=\"padding-left:6px\"><a target=\"summary\" href=\"" . 
				"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?login=x&company=" . $company . "&month=y&project=" . $project_name . "&year=" . $year . "\">" . number($num_project_commiters[$project_name][$company]) . "</a>" .
			"</td> </tr>\n";
		$row2++;
	}
	print "</table></td></tr></table>";
	print "</td></tr>\n";
	$row++;

	# loc by project
	print "<tr id=\"" . $company . "_loc_per_project\" style=\"display:" . ($show == "locpp" ? "" : "none") . "\" bgcolor=\"". bgcol2($row). "\">\n";
	print "<td colspan=\"13\" style=\"padding:6px\">";
	print "<div style=\"float:right\"><a href=\"javascript:toggle('" . $company . "_loc_per_project')\">[x]</a></div>";
	print "<a href=\"javascript:toggle('" . $company . "_loc_per_project')\"><b>$company: LOC &amp; Committer Count for " . sizeof($loc_per_project[$company]) . " Projects</b></a><br/>\n";
	print 
		"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">" . 
			"<tr><td valign=\"top\" style=\"padding-left:0px\">" . 
				"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
	$cnt=0;
	$row2=0;
	$split_thresh = sizeof($loc_per_project[$company]) > 5 ? ceil(sizeof($loc_per_project[$company])/3) : 5;
	foreach($loc_per_project[$company] as $project_name => $project_loc)
	{
		$cnt++;
		if ($cnt % $split_thresh == 1) 
		{
			print "</table></td><td valign=\"top\" style=\"padding-left:6px\"><table cellspacing=\"0\" cellpadding=\"0\" border=\"1\">\n"; 
			print "<tr bgcolor=\"". bgcol($row2). "\"><th>Project</th><th>LOC</th><th>Commit-<br/>ters</th></tr>\n";
			$row2++;
		}
		print 
			"<tr bgcolor=\"". bgcol($row2). "\"> <td valign=\"top\" align=\"left\" style=\"padding-left:6px\"><a target=\"summary\" href=\"" . 
				"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?company=x&login=y&project=" . $project_name . "&year=" . $year . "\">" . $project_name . "</a>" .  
			"</td><td valign=\"top\" align=\"right\" style=\"padding-left:6px\">" . number($project_loc) . 
			"</td><td valign=\"top\" align=\"right\" style=\"padding-left:6px\"><a target=\"summary\" href=\"" . 
				"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?top=x&company=" . $company . "&login=y&project=" . $project_name . "&year=" . $year . "\">" . number($num_project_commiters[$project_name][$company]) . "</a>" .
			"</td> </tr>\n";
		$row2++;
	}
	print "</table></td></tr></table>";
	print "</td></tr>\n";
	$row++;
}

# footer / totals
$row++;
print "<tr bgcolor=\"". bgcol($row). "\">" . 
		"<th>Total</th>" . 
		"<th colspan=\"1\" align=\"right\">".number($num_committers_active_total)."</th><th colspan=\"1\"></th>" . 
		"<th colspan=\"1\" align=\"right\">".number($num_committers_inactive_total)."</th><th colspan=\"1\"></th>" .
		"<th colspan=\"1\" align=\"right\">".number($num_committers_total)."</th><th colspan=\"1\"></th>" .
		"<th colspan=\"1\"></th>" .
		"<th colspan=\"1\" align=\"right\">".number($num_commits_total)."</th><th colspan=\"1\"></th>" . 
		"<th colspan=\"1\" align=\"right\">".number($num_loc_total)."</th><th colspan=\"1\"></th>" . 
		"<th colspan=\"1\"></th>" . 
	"</tr>\n";
print "</table>\n";

print "<p>&#160;</p>\n";

print "</div>\n";

print "<div id=\"rightcolumn\">\n";

print "<div class=\"sideitem\">\n";
print "<h6>About</h6>\n";
print "<p>Queries used:\n";
print "<ol>\n";
print "<li><a href=\"http://dash.eclipse.org/dash/commits/web-api/commit-summary.php?company=x&login=y&year=$year\">summary</a> (commits<br/>by company, user)</li>\n";
print "<li><a href=\"http://dash.eclipse.org/dash/commits/web-api/commit-active-committers.php?company=IBM\">active-committers</a><br/>(once per company)</li>\n";
print "<li><a href=\"http://dash.eclipse.org/dash/commits/web-api/commit-project-diversity.php\">project-diversity</a><br/>(LOC per project)</li>\n";
print "<li><a href=\"http://dash.eclipse.org/dash/commits/web-api/commit-project-diversity-2.php\">project-diversity-2</a><br/>(committers per project)</li>\n";

print "<li><a href=\"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?company=x&login=y&project=modeling.emf&year=" . $year . "\">summary.cgi</a> (commits<br/>by project)</li>\n";
print "<li><a href=\"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?top=x&company=IBM&login=y&project=modeling.emf&year=" . $year . "\">summary.cgi</a> (commits<br/>by company &amp; project)</li>\n";
print "<li><a href=\"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?project=x&type=y&year=" . $year . "&login=nickb\">summary.cgi</a> (commits<br/>by project &amp; user)</li>\n";

print "<li><a href=\"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?company=x&month=y&project=modeling.emf&year=" . $year . "\">summary.cgi</a> (trend<br/>by project)</li>\n";
print "<li><a href=\"http://dash.eclipse.org/dash/commits/web-app/summary.cgi?login=x&company=IBM&month=y&project=modeling.emf&year=" . $year . "\">summary.cgi</a> (trend<br/>by company &amp; project)</li>\n";

print "</ol>\n";
print "<p>Data last collected:<br/>" . date("Y-m-d H:i:s T",filemtime($commits_file)) . "</p>\n";
print "</div>\n";

print "<div class=\"sideitem\">\n";
print "<h6>Sort By</h6>\n";
print "<ul>\n";
print "<li><a " . ($sortBy == "" ? "name" : "href") . "=\"?sortBy=&amp;show=$show\">Company Name</a></li>\n";
print "<li><a " . ($sortBy == "activecommitters" ? "name" : "href") . "=\"?sortBy=activecommitters&amp;show=$show\">Active Committers</a></li>\n";
print "<li><a " . ($sortBy == "inactivecommitters" ? "name" : "href") . "=\"?sortBy=inactivecommitters&amp;show=$show\">Inactive Committers</a></li>\n";
print "<li><a " . ($sortBy == "totalcommitters" ? "name" : "href") . "=\"?sortBy=totalcommitters&amp;show=$show\">Total Committers</a></li>\n";
print "<li><a " . ($sortBy == "active" ? "name" : "href") . "=\"?sortBy=pcactive&amp;show=$show\">Percent Active</a></li>\n";
print "<li><a " . ($sortBy == "commits" ? "name" : "href") . "=\"?sortBy=commits&amp;show=$show\">Commits</a></li>\n";
print "<li><a " . ($sortBy == "loc" ? "name" : "href") . "=\"?sortBy=loc&amp;show=$show\">Lines of Code</a></li>\n";
print "<li><a " . ($sortBy == "alocpc" ? "name" : "href") . "=\"?sortBy=alocpc&amp;show=$show\">Approx. LOC per Commit</a></li>\n";
print "</ul>\n";
print "</div>\n";

print "<div class=\"sideitem\">\n";
print "<h6>Show</h6>\n";
print "<ul>\n";
print "<li><a " . ($show == "active" ? "name" : "href") . "=\"?sortBy=$sortBy&amp;show=active\">Active Committers</a></li>\n";
print "<li><a " . ($show == "inactive" ? "name" : "href") . "=\"?sortBy=$sortBy&amp;show=inactive\">Inactive Committers</a></li>\n";
print "<li><a " . ($show == "all" ? "name" : "href") . "=\"?sortBy=$sortBy&amp;show=all\">Total Committers</a></li>\n";
print "<li><a " . ($show == "" ? "name" : "href") . "=\"?sortBy=$sortBy&amp;show=\">No Committers</a></li>\n";
print "</ul>\n";
print "<ul>\n";
print "<li><a " . ($show == "commitspp" ? "name" : "href") . "=\"?sortBy=$sortBy&amp;show=commitspp\">Per-Project Trends</a></li>\n";
print "<li><a " . ($show == "" ? "name" : "href") . "=\"?sortBy=$sortBy&amp;show=\">No Per-Project Trends</a></li>\n";
print "</ul>\n";
print "<ul>\n";
print "<li><a " . ($show == "locpp" ? "name" : "href") . "=\"?sortBy=$sortBy&amp;show=locpp\">Per-Project LOC</a></li>\n";
print "<li><a " . ($show == "" ? "name" : "href") . "=\"?sortBy=$sortBy&amp;show=\">No Per-Project LOC</a></li>\n";
print "</ul>\n";
print "</div>\n";

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Project Stats By Company, Commits and LOC";
$pageKeywords = ""; 
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

# see colorize()
function number($num)
{
	return number_format($num);
}

# see colorize()
function percent($num)
{
	$val = (round($num*10000)/100);
	return $val . "%";
}

function bgcol($row)
{
	return $row % 2 == 0 ? "#EEEEEE" : "#FFFFFF"; 
}

function bgcol2($row)
{
	return $row % 2 == 0 ? "#EEEEEE" : "#DDDDDD"; 
}
function bgcol3($row)
{
	return $row % 2 == 0 ? "#EEEEFF" : "#DDDDFF"; 
}

?>
