<?php 

$pre = "../";

// Process query string
$vars = explode("&", $_SERVER['QUERY_STRING']);
for ($i=0;$i<=count($vars);$i++) {
  $var = explode("=", $vars[$i]);
  $qsvars[$var[0]] = $var[1];
}

$params = array();
$params["project"] = $qsvars["proj"]; 

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
$XMLfile = $qsvars["XMLfile"] ? str_replace("../","",$qsvars["XMLfile"]).".xml" : "site.xml";
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
} else { ?>
	<meta http-equiv="Refresh" content="0;url=site.html">
<?php } ?>

<p><a href="view-source:http://download.eclipse.org/technology/emft/updates/<?php echo $XMLfile; ?>" class="red">View as XML</a></p>

<?php include $pre . "includes/footer.php"; ?>
<!-- $Id$ -->
