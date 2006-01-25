<?php 

$pre = "../";

// Process query string
$vars = explode("&", $_SERVER['QUERY_STRING']);
foreach ($vars as $k => $v) { echo "\$vars[".$k."] = $v<br>\n"; }
for ($i=0;$i<=count($vars);$i++) {
  $var = explode("=", $vars[$i]);
  echo $i." :: ".$vars[$i]. " --> <br/>\n";
  foreach ($var as $k => $v) { echo "  > $k :: $v<br>\n"; }
  
  $qs[$var[0]] = $var[1];
  echo "\$qs[".$var[0]."] :: ".$var[1]."<br/>\n";  
}

echo "<hr>\n";
foreach ($qs as $k => $v) { echo "\$qs[".$k."] = $v<br>\n"; }

$params = array();
$params["project"] = $qs["proj"]; 

$HTMLTitle = "EMF Technologies - Update Manager";
$ProjectName = array(
	"Update Manager",
	"EMF Technologies",
	"Update Manager",
	"images/reference.gif"
);

include $pre . "includes/header.php"; 

/*
 * To work, this script must be run with a version of PHP4 which
 * includes the Sablotron XSLT extension compiled into it
 * 
 * Params in stylesheet:
 *  
 * 	<xsl:param name="project"></xsl:param>
 *
 */

// define XML and XSL sources 
$XMLfile = $qs["XMLfile"] ? $qs["XMLfile"] : "site.xml";
$XSLfile = "site.xsl";

if (function_exists('xslt_create')) {
	$processor = xslt_create();
	$fileBase = 'file://' . getcwd () . '/';
	xslt_set_base ( $processor, $fileBase );
	$result = xslt_process($processor, $fileBase.$XMLfile, $fileBase.$XSLfile, NULL, array(), $params);
	
	if(!$result) {
		echo "Trying to parse ".$XMLfile." with ".$XSLfile."...<br/>";
		echo "ERROR #".xslt_errno($processor) . " : " . xslt_error($processor);
	}
	echo $result; 
} else {
	echo "This server does not support Sablotron XSLT parsing w/ PHP. Contents below are raw, unformatted XML:<br/><br/>";
	$fc = file($fileBase.$XMLfile);
	echo "<tt class=\"code\">";
	foreach ($fc as $line) { echo str_replace("<","&lt;",$line)."<br/>"; }
	echo "</tt>";
} ?>

<p><a href="view-source:http://download.eclipse.org/technology/emft/updates/<?php echo $XMLfile; ?>" class="red">View as XML</a></p>

<?php include $pre . "includes/footer.php"; ?>
<!-- $Id$ -->
