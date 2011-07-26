<?php

$STATS_FILE = "/tmp/.henshin-stats.txt";

function get_month_key() {
    return date('Y-m');
}

function load_stats() {
    global $STATS_FILE;
    $stats = array();
    if (file_exists($STATS_FILE)) {
	$f = fopen($STATS_FILE, 'r');
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
	    "Error loading Henshin download stats",
	    "Cannot find $STATS_FILE.\n$reset");
    }
    return $stats;
}

function save_stats($stats) {
    global $STATS_FILE;
    $f = fopen($STATS_FILE, 'w');
    if ($f!=FALSE) {
        foreach ($stats as $key=>$value) {
	    fwrite($f, "$key:$value\n");
	}
        fclose($f);
    } else {
	mail("henshin.ck@gmail.com",
	    "Error saving Henshin download stats",
	    "Cannot write to file $STATS_FILE.");
    }
}

?>