<?php 
/* 
 * Google analytics stats tracker - 
 * this script is only here so that download pages can be tracked before 
 * bouncing on to downloads/download.php
 * 
 * See also http://wiki.eclipse.org/Using_Phoenix#Google_Analytics
 *  
 */ 
$QS = str_replace("&","&amp;", $_SERVER["QUERY_STRING"]);
$html = <<<EOHTML
<html>
<body onload="document.location.href='/downloads/download.php?${QS}';"> 
			
<noscript>
<p><blockquote style="margin:30px; border:2px purple dashed"><blockquote style="margin:30px">
It seems you have Javascript disabled. <a href='/downloads/download.php?${QS}'>Click here to proceed to the download page</a>.
</blockquote></blockquote></p>
</noscript>

</body>
</html>
EOHTML;
print $html; ?>