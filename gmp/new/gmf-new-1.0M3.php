<?php                                                                                                               
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/app.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/nav.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/menu.class.php"); 
require_once($_SERVER['DOCUMENT_ROOT'] . "/projects/common/project-info.class.php");
$App = new App(); $Nav = new Nav(); $Menu = new Menu(); 
$projectInfo = new ProjectInfo("modeling.gmf");
$projectInfo->generate_common_nav( $Nav );
include ($App->getProjectCommon()); 
	#*****************************************************************************
	#
	# gmf-new-1.0M3.php
	#
	# Author: 		Richard C. Gronback
	# Date:			2005-12-01
	#
	# Description: 
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "What's New and Noteworthy - 1.0M3";
	$pageKeywords	= "eclipse,project,graphical,modeling,model-driven";
	$pageAuthor		= "Richard C. Gronback";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# $Nav->addNavSeparator("My Page Links", 	"downloads.php");
	# $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);

	# End: page-specific settings
	#
		
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML

<div id="maincontent">
	<div id="midcolumn"><br/>
		<table border="0" cellpadding="2" cellspacing="0" width="100%">
			<tbody>
				<tr>
					<td align="left"><h1>$pageTitle</h1></td>
					<td align="right"><img align="right" src="http://www.eclipse.org/gmf/images/logo_banner.png" /></td>
				</tr>
			</tbody>
		</table>
		<hr/>
		<table border="0" cellspacing="5" cellpadding="2" width="100%">
	<tbody>
		<tr>
			<td width="69%" class="bannertext">
			Here are some of the more noteworthy things available in milestone build M3 
  	(November 18, 2005) which is now available for <a href="http://download.eclipse.org/modeling/gmf/downloads/drops/S-1.0M3-200511182000/index.php" target="_self">download</a>. 
  	See the <a href="http://download.eclipse.org/modeling/gmf/downloads/drops/S-1.0M3-200511182000/buildNotes.php">M3 build notes</a> for details about bugs fixed 
  	and other changes.
			</td>
		</tr>
		<tr>
			<td colspan="2">
  			</td>
  		</tr>
		
	</tbody>
</table>

	<p></p>
  
  <table border="0" cellpadding="10" cellspacing="0" width="100%">
  	<tbody>
  		<tr> 
    		<td colspan="2">
				<h2>Runtime</h2>
				<hr/>
			</td>
  		</tr>
  		<tr>
    		<td align="left" valign="top" width="10%">
      			<p align="right"><b>General</b></p>
    		</td>
    		<td align="left" valign="top" width="70%">As this is the GMF project's first official milestone, all of it is "New and Noteworthy," in a sense. Aside from the documentation referenced below, to aid in understanding the runtime portion of GMF, the beginnings of an article describing its components is found <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=115537">here</a>.
    		<hr/></td>
    	</tr>
  		<tr>
    		<td align="left" valign="top" width="10%">
      			<p align="right"><b>API</b></p>
    		</td>
    		<td align="left" valign="top" width="70%">
    			API continued to be a focus in M3 to ensure that the public
api will be scalable and solid for future releases to accommodate backward
compatibility.  Specifically, we aimed to have consistent nomenclature with GEF
(i.e. ?Connection? as opposed to ?Connector?, ensure intuitive naming and that
any redundancies were identified and removed.  Additionally we made sure that
internal API that should be accessible external was made public and documented
accordingly.<br/><br/>

A significant change is the support for different coordinate
systems.  Previous to M3, clients were expected to use the HiMetric coordinate
system (2540 units per inch) when initializing their figures and when
manipulating the model.  Now this requirement has been relaxed so that clients
not interested in the precision or absolute qualities of HiMetric can utilize
an Identity mapping mode.  This means that essentially device coordinates
(pixels) are equal to logical coordinates (persisted units).  This mode is more
similar to how existing GEF clients would be expected to work.  This change
should ease migration for existing GEF clients or clients that don?t need a
precision coordinate system for their Editor.  The default coordinate system
continues to be HiMetric, so clients need make overrides to enter this new mode
(see <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=112788">112788</a>
).
    		<hr/></td>
  		</tr>
  		
  		<tr>
    		<td align="left" valign="top" width="10%">
      			<p align="right"><b>Performance Enhancements</b></p>
    		</td>
    		<td align="left" valign="top" width="70%">GMF runtime is designed for scalability through our extensibility
infrastructure and component based architecture.  However, this requires that
we pay close attention to performance issues with respect to loading of
diagrams and creation of elements.  In M3 we dedicated time to profiling the
runtime and identifying some bottlenecks that were prohibiting maximum
performance.  The following list of issues was addressed to ensure performance
won?t degrade when clients add their own domain functionality to GMF services. 
Most of then are removing redundancy where figures were created before they
were needed, ensuring caching for repeated calls and making sure that execution
was not carried out when not needed.
    		<hr/></td>
    	</tr>
   	
    	<tr>
    		<td align="left" valign="top" width="10%">
      			<p align="right"><b>Usability</b></p>
    		</td>
    		<td align="left" valign="top" width="70%">Some minor usability enhancements have been made in M3. 
Notable one is the ability to drag and drop from the tool creation palette onto
the diagram surface.  Previously, you had to click on the tool entry and then
re-click on the diagram surface to invoke the creation.  Now you can click on
the tool entry and without releasing the mouse drag onto the diagram surface
and the creation will be invoked.  This has been available in GEF for a while but
our creation mechanism is different requiring some additional work to support
this use-case.
    		<hr/></td>
    	</tr>
  		<tr>
    		<td align="left" valign="top" width="10%">
      			<p align="right"><b>Documentation</b></p>
    		</td>
    		<td align="left" valign="top" width="70%">A programmer?s guide for the diagram runtime has been
introduced that provides a general introduction to the architecture and usage
scenarios.  This has been added to the Documentation component available from
the nightly builds.  After you?ve installed this component into your Eclipse
development environment, then it is accessible from the ?Help Contents? menu.
    		</td>
    	</tr>
    	<tr><td colspan="2" align="center"><img src="images1.0m3/doc.png"></td></tr>
  
  		<tr> 
    		<td colspan="2">
				<h2>Tooling</h2>
				<hr/>
			</td>
  		</tr>
  		<tr>
    		<td align="left" valign="top" width="10%">
      			<p align="right"><b>General</b></p>
    		</td>
    		<td align="left" valign="top" width="70%">As with the runtime component, all of the tooling side of the GMF project is "New and Noteworthy" at this stage. A tutorial is published <a href="http://www.eclipse.org/gmf/tutorial/index.php">here</a> to give you a jumpstart using GMF's diagram and mapping models.
    		<hr/></td>
    	</tr>
  		<tr>
    		<td align="left" valign="top" width="10%">
      			<p align="right"><b>OCL</b></p>
    		</td>
    		<td align="left" valign="top" width="70%">While defining relationships between your diagram and domain model elements, you can try to further specify domain elements with a specializer expressed in OCL. Additionally, you could try to add statements (again, in OCL) to set some attributes of your newly created domain element (use Initializer in gmfmap to do this). Please note, these features just made it into M3, so use them at your own risk ;-)
    		</td>
    		<tr><td colspan="2" align="center"><img src="images1.0m3/ocl.png"></td></tr>
    		<tr>
    		<td align="left" valign="top" width="10%"></td>
    		<td align="left" valign="top" width="70%"><hr/></td>
    	</tr>
    	</tr>
    	<tr>
    		<td align="left" valign="top" width="10%">
      			<p align="right"><b>Diagram Initialization</b></p>
    		</td>
    		<td align="left" valign="top" width="70%">Try this: right-click on any domain model instance for which you have defined a diagram. GMF includes a means by which to initialize a diagram from existing model instance (InitDiagramFileAction), but be sure to perform "Arrange all" when done ;-)</td>
    		<tr><td colspan="2" align="center"><img src="images1.0m3/initialize_diagram.png"></td></tr>    		
    	</tr>
  	</tbody>
  </table>
		
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
