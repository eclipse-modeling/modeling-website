<?php
/* 221934 - this page to remain on eclipse.org */

//error_reporting(E_ALL); ini_set("display_errors", true);
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/classes/projects/projectInfoData.class.php");
require_once("/home/data/httpd/eclipse-php-classes/system/dbconnection_foundation_ro.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/smartconnection.class.php");

// ----------------------------------------------------------------------------
// PHOENIX STUFF

$App 	= new App();
$Nav	= new Nav();
$Menu 	= new Menu();
include($App->getProjectCommon());

$pageTitle 		= "Project Plan - ";
$pageAuthor		= "Bjorn Freeman-Benson";

$Nav->setLinkList(array()); // empty Nav

// ----------------------------------------------------------------------------
// BEGIN CODE


// Global Errror Handler Function
// This replicates the look/functionality of userErrorHandler from harness.php
// but doesn't implement the test-specific checks for global flags.
// NOTE:  This is not setup by default.  If you need to enable this,
// do something like: $old_error_handler = set_error_handler("globalDisplayErrorHandler");
// external_entry() sets this up if the context calls for it.
function globalDisplayErrorHandler($errno, $errmsg, $filename, $linenum, $vars) {
  $errortype = array (
    E_ERROR => 'Error',
    E_WARNING => 'Warning',
    E_PARSE => 'Parsing Error',
    E_NOTICE => 'Notice',
    E_CORE_ERROR => 'Core Error',
    E_CORE_WARNING => 'Core Warning',
    E_COMPILE_ERROR => 'Compile Error',
    E_COMPILE_WARNING => 'Compile Warning',
    E_USER_ERROR => 'User Error',
    E_USER_WARNING => 'User Warning',
    E_USER_NOTICE => 'User Notice',
    E_STRICT => 'Runtime Notice',
    E_RECOVERABLE_ERROR => 'Catchable Fatal Error');
    switch($errno) {
    	case E_NOTICE: // discard NOTICEs
    	case E_STRICT: // discard RUNTIME notices for deprecated usages
    		return;
    	default:
			echo "<p><table cellpadding=10 width=400 bgcolor=#ffcccc><tr><td><font size=+2>Trouble: </font>";
			echo "PHP $errortype[$errno]:<br>$errmsg<br>$filename ($linenum)";
			$mysql_error_func = 'mysql_error_check';
			if(function_exists($mysql_error_func)) {
				$mysql_error_func();
			}
			echo "</table></p>\n";
    }
}

// Start Output Buffering
ob_start();
?>
<style>
h2 {
	border-bottom: 2px solid gray;
}
h3 {
	border-bottom: 1px dotted gray;
}
</style>
<?php
/*
 * Must have a ?projectid=xxx or ?planurl=http://www.eclipse.org/xxx
 */
preg_match('/^([a-z.0-9\-_]+)$/', $_REQUEST['projectid'], $matches);
if(!isset($matches[1]) && !isset($_REQUEST['planurl'])) {
	?><span style="background-color: #FFCCCC; font-weight: bold; font-size: 150%">Error: unable to display project plan without a ?projectid=xxx</span><?php
} else {

	$projectid = null;
	$project = null;
		
	if( isset($_REQUEST['projectid']) ) {
		$projectid = $matches[1];
		$project = new ProjectInfoData($projectid);
		$pageTitle .= $projectid;
		/*
		 * If the parameter is a projectid, look up the url in the meta-data database
		 */
		$url = $project->projectplanurls[0];
	} else {
		$url = $_REQUEST['planurl']
	}

	/*
	 * Verify that the url is pointing to eclipse.org to prevent cross-site attacks
	 */
	if( preg_match("/^\w+:/", $url) && substr($url,0,23) != 'http://www.eclipse.org/'  ) {
		show_error_page( 'the project meta-data "projectplanurl" (' . $url . ') does not refer to an http://www.eclipse.org/ page.', $projectid );
	} elseif(preg_match('/project-plan.php/i', $url)) {
		show_error_page( 'This project has bad meta-data: it points back to this page in an infinite loop.  
			Please open a bug against the project website to correct this condition.
			Bugs can be entered at http://bugs.eclipse.org/bugs/ .', $projectid);
	} else {
		if( substr($url,0,5) != 'http:' )
			$url = $_SERVER['DOCUMENT_ROOT'] . $url;
		/*
		 * If the request is for raw format
		 */
		if( isset($_REQUEST['raw']) ) {
			$contents = @file_get_contents( $url );
			?>
			<div style="margin-left: 10px; margin-top: 10px">
			<b>Location: </b><?= $url ?><br>
			<b>Meta-data Tag: </b>projectplanurl<br>
			<b>Raw: </b><p>
<pre>
<?php echo htmlspecialchars($contents) ?>
</pre>
			</div>
			<?php
		} else {
			/*
			 * Load the XML file
			 */
			$xml = new DomDocument();
			$xml->load($url);
			if( $xml === false ) {
			 	$contents = @file_get_contents( $url );
			 	if( !$contents ) {
			 		show_error_page( 'the project meta-data "projectplanurl" (' . $url . ') points to an empty file.', $projectid );
			 	} else {
			 		if( preg_match( "/&(?<!amp;)/", $contents ) ) {
			 			show_error_page( 'the file appears to have at least one naked &amp;s in bugzilla urls: &amp;s must be escaped as &amp;amp; to be valid XML.', $projectid );
			 		} else {
				 		show_error_page( 'the file is not a valid project plan XML file. See <a href="http://wiki.eclipse.org/Development_Resources/Project_Plan">the documentation</a> for details.', $projectid );
			 		}
				}
			} else {
				$projectname = $project->projectnames[0];

				// ----------------------------------------------------------------------------
				// OUTPUT
				$old_error_handler = set_error_handler("globalDisplayErrorHandler");
				/* create the processor and import the stylesheet */
				$xsl = new DomDocument();
				$xsl->load("project-plan-render.xsl");
				
				$proc = new XsltProcessor();
				$xsl = $proc->importStylesheet($xsl);
				$proc->setParameter(null, "projectName", $projectname);
				$proc->setParameter(nuul, "projectId", $projectid);
				
				/* transform and output the xml document */
				$echo = $proc->transformToXML($xml);
				echo $echo;
				restore_error_handler();
?>
<div style="float: right; text-align: right"><a href="?projectid=<?= $projectid ?>&raw=1">view raw xml of project plan</a><br>
<a href="/projects/dev_process/project-status-infrastructure.php">from project meta-data key "projectplanurl"</a></div>
<?php
			}// if( have xml )
		}// if( !raw )
	}// if( !cross site attack )
}// if( !$url )
?>

</div> <!-- midcolumn -->
</div> <!-- maincontent -->
<?php
	$html = ob_get_contents();
	ob_end_clean();

	# Generate the web page
	$pageKeywords = '';
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);


function report_bugzillas( $param ) {
	$url = '' . $param;
	$url = trim( $url );
	if( !$url ) {
		?><ul><li><em>no items</em></li></ul><?php
		return;
	}
	if( substr($url,0,25) == 'https://bugs.eclipse.org/' ) {
		$url = 'https://bugs.eclipse.org/' . substr($url,25);
	} elseif( substr($url,0,24) == 'http://bugs.eclipse.org/' ) {
		$url = 'http://bugs.eclipse.org/' . substr($url,24);
	} else {
	 	?><ul><li><span style="background-color: #FFCCCC; font-weight: bold; font-size: 150%;">Error: url is not a bugs.eclipse.org url</span></li></ul><?php
	 	return;
	}
	$url = $url . "&ctype=rdf";
	$url = $url . "&columnlist=bug_id,short_desc,target_milestone,bug_status";
	/*
	 * For some reason, simplexml doesn't handle the RDF with namespaces,
	 * so we just remove all the namespace stuff here.
	 */
	$text = file_get_contents( $url );
	$text = preg_replace( "/bz:/", '', $text );
	$text = preg_replace( "/rdf:/", '', $text );
	$text = preg_replace( "/nc:/", '', $text );
	/* */
	$rdf = simplexml_load_string( $text );
//	echo "<pre>url=/"; print_r($url);
//	echo "/<br>text=/"; print_r($text); 
//	echo "/<br>rdf=/"; print_r($rdf);
//	echo "/</pre>"; 

	?><ul><?php
    foreach( $rdf->result->bugs->Seq->li as $each ) {
    	$status_begin = '';
    	$status_end = '';
    	if( $each->bug->bug_status == 'RESOLVED'
    	 || $each->bug->bug_status == 'VERIFIED'
    	 || $each->bug->bug_status == 'CLOSED' ) {
    		$status_begin = '<strike>';
    		$status_end = '</strike>';
    	}
    	?><li><?= $each->bug->short_desc ?> 
    	[<a href="http://bugs.eclipse.org/<?= $each->bug->id ?>"><?= $each->bug->id ?></a>]
    	<?= $status_begin ?>(target milestone: <?= $each->bug->target_milestone ?>)
    	<?= $status_end ?></li><?php
    }
	?></ul><?php
}

function show_error_page( $errormsg, $projectid ) {
	$leaders = array();

	$dbc = new DBConnectionFoundation();
	$dbh = $dbc->connect();
	$result = mysql_query("
		SELECT DISTINCT(People.PersonID), FName, LName
			FROM PeopleProjects, Projects, People
			WHERE PeopleProjects.Relation in ('PL','PD')
				AND InactiveDate is NULL
				AND People.PersonID = PeopleProjects.PersonID
				AND Projects.ProjectID = PeopleProjects.ProjectID
				AND Projects.ProjectID = '$projectid'
			ORDER BY LName", $dbh);
	while( $row = mysql_fetch_assoc($result) ) {
		$leaders[] = $row['FName'] . ' ' . $row['LName'];
	}

	if( count($leaders) == 0 ) {
		$leaderstr = "project leader(s)";
	} else {
		if( count($leaders) == 1 ) {
			$leaderstr = "project leader (" . $leaders[0] . ")";
		} else {
			$t1 = array_pop( $leaders );
			$leaderstr = "project leaders (" . implode( ", ", $leaders ) . " and " . $t1 . ")";
		}
	}
	?><div style="margin-top: 60px; margin-left: 50px; width: 400px"><center><img src="/projects/images/no-plan.jpg"><p>
	<div style="margin-top: 40px; margin-bottom: 60px">
	Unable to display the <?= $projectid ?> project plan because
	<?= $errormsg ?><p>
	The project team and <?= $leaderstr ?> are responsible for the project plan.
	You can contact them via the <a href="http://www.eclipse.org/mail/">project's developer mailing list</a>.
	</div></center></div><?php
}
?>