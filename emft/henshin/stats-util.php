<?php

$STATS_FILE = "/tmp/.henshin-stats.txt";

function get_stats() {
    global $STATS_FILE;
    $stats = array();
    if (file_exists($STATS_FILE)) {
	$f = fopen($stats, 'r');
	while (!feof($f)) {
	    $line = fgets($f);
	    $arr = explode(':',$line);
	    if (count($arr)>1) {
		$stats[$arr[0]] = $arr[1];
	    }
	}
	fclose($f);
    } else {
	$reset = "Reset to initial values.";
	if (!copy("stats-initial.txt", $STATS_FILE)) {
	    $reset = "Cannot reinitialize using stats-initial.txt!";
	}
	mail("henshin.ck@gmail.com",
	    "Error finding Henshin download stats",
	    "Cannot find $STATS_FILE.\\$reset");
    }
    return $stats;
}

?>