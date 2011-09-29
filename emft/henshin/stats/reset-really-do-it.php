<html>
<body>

<p>
<i>Resetting download stats for Henshin...</i>
</p>

<p>
<?php
include_once "util.php";
reset_stats('R');
print_stats('R');
reset_stats('N');
print_stats('N');
?>
</p>
</body>
</html>