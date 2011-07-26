<?php
include_once "stats-util.php";

$stats = load_stats('R');
echo "Release stats:<br>\n";
print_r($stats);
echo "<br><br>\n";

$stats = load_stats('N');
echo "Nightly stats:<br>\n";
print_r($stats);
?>