<?php

include_once "stats-util.php";

$stats = load_stats();

$month = get_month_key();
if (isset($stats[$month])) {
    $stats[$month]++;
} else {
    $stats[$month] = 0;
}

print_r($stats);

save_stats($stats);

?>