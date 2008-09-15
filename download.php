<?php 
/* 
 * Google analytics stats tracker - 
 * this script is only here so that download pages can be tracked before 
 * bouncing on to downloads/download.php
 * 
 * See also http://wiki.eclipse.org/Using_Phoenix#Google_Analytics
 *  
 */ 
$html = <<<EOHTML
<html>
<body onload="document.location.href='/downloads/download.php?${_SERVER["QUERY_STRING"]}';"> 
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-910670-2");
pageTracker._initData();
pageTracker._trackPageview();
</script>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2566337-8");
pageTracker._initData();
pageTracker._trackPageview();
</script>
			
<noscript>
<p><blockquote style="margin:30px; border:2px purple dashed"><blockquote style="margin:30px">
It seems you have Javascript disabled. <a href='/downloads/download.php?${_SERVER["QUERY_STRING"]}'>Click here to proceed to the download page</a>.
</blockquote></blockquote></p>
</noscript>

</body>
</html>
EOHTML;
print $html; ?>