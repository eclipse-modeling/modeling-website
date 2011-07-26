<?php

include_once "stats-util.php";

$stats = load_stats();

$month = get_month_key();
if (!isset($stats[$month])) {
    $stats[$month] = rand(1,7);
} else {
    $stats[$month] = $stats[$month]+1;
}

print_r($stats);

save_stats($stats);

?>