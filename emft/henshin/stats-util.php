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
	copy("stats-initial.txt", $STATS_FILE);
	mail("henshin.ck@gmail.com",
	    "Error finding Henshin download stats",
	    "Cannot find $STATS_FILE. Reset to initial values.");
    }
    return $stats;
}

?>