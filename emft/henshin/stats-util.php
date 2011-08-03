<?php

function get_stats_file($build) {
    $dir = "/home/data/httpd/writable/henshin";
    if (!file_exists($dir)) {
	mkdir($dir);
    }
    return "$dir/download-stats-$build.txt";
}

function get_month_key() {
    return date('Y-m');
}

function load_stats($build) {
    $stats = array();
    $file = get_stats_file($build);
    if (file_exists($file)) {
	$f = fopen($file, 'r');
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
	if (!reset_stats($build)) {
	    $reset = "Cannot reset stats file!";
	}
	mail("henshin.ck@gmail.com",
	    "Error loading Henshin download stats",
	    "Cannot find $file.\n$reset");
    }
    return $stats;
}

function reset_stats($build) {
    $init = "stats-init-$build.txt";
    $file = get_stats_file($build);
    return copy($init, $file);
}

function save_stats($build, $stats) {
    $file = get_stats_file($build);
    $f = fopen($file, 'w');
    if ($f!=FALSE) {
        foreach ($stats as $month=>$count) {
	    fwrite($f, "$month:$count\n");
	}
        fclose($f);
    } else {
	mail("henshin.ck@gmail.com",
	    "Error saving Henshin download stats",
	    "Cannot write to file $file");
    }
}

function update_stats($build) {
    $stats = load_stats($build);
    $month = get_month_key();
    if (!isset($stats[$month])) {
	$stats[$month] = 1;
    } else {
	$stats[$month] = $stats[$month]+1;
    }
    save_stats($build, $stats);
    return $stats;
}

function print_stats($build) {
    $stats = load_stats($build);
    echo "<table border=\"1\">\n";
    echo "<tr><th>Month</th><th>Count</th></tr>\n";
    foreach ($stats as $month=>$count) {
	echo "<tr><td>$month</td><td>$count</td></tr>\n";
    }
    echo "</table>\n";
}

?>