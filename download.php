<?php 
/* 
 * Google analytics stats tracker - 
 * this script is only here so that download pages can be tracked before 
 * bouncing on to downloads/download.php
 * 
 * See aslo includes/scripts.php#addGoogleAnalyticsTrackingCodeToHeader() and
 * http://wiki.eclipse.org/Using_Phoenix#Google_Analytics
 *  
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	
include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/scripts.php";
$App = new App(); addGoogleAnalyticsTrackingCodeToHeader();
$html = <<<EOHTML
<script type="text/javascript">
onload=redirectOnLoad;
function redirectOnLoad ()
{
	document.location.href='/downloads/download.php?${_SERVER["QUERY_STRING"]}';
}
</script>
<noscript>
<p><blockquote style="margin:30px; border:2px purple dashed"><blockquote style="margin:30px">
It seems you have Javascript disabled. <a href='/downloads/download.php?${_SERVER["QUERY_STRING"]}'>Click here to proceed to the download page</a>.
</blockquote></blockquote></p>
</noscript>
EOHTML;
$App->generatePage("Phoenix", null, null, "Eclipse Modeling Project", "modeling, EMF, GMF, UML, UML2, MDD, MDA, model-driven, eclipse, downloads", "Eclipse Modeling Project - Downloads", $html);

?>
