<html>
<body>

<p>
<i>Download stats for Henshin releases:</i>
</p>

<p>
<?php
include_once "stats-util.php";
print_stats('R');
?>
</p>

<p>
<i>Download stats for Henshin nightly builds:</i>
</p>

<p>
<?php
print_stats('N');
?>
</p>

</body>
</html>