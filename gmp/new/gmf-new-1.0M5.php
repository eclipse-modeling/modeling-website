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
	# gmf-new-1.0M5.php
	#
	# Author: 		Richard C. Gronback
	# Date:			2006-03-04
	#
	# Description: 
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "What's New and Noteworthy - 1.0M5";
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
	<div id="midcolumn">
		<table border="0" cellpadding="10" cellspacing="10" width="100%">
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
						Here are some of the more noteworthy things available in milestone build M5 
  						(March 03, 2006) which is now available for <a href="http://download.eclipse.org/modeling/gmf/downloads/drops/S-1.0M5-200603031600/index.php" target="_self">download</a>. 
  						<br/><br/>See the <a href="http://download.eclipse.org/modeling/gmf/downloads/drops/S-1.0M5-200603031600/buildNotes.php">M5 build notes</a> for details about bugs fixed and other changes.
					</td>
				</tr>
			</tbody>
		</table>
  
  <table border="0" cellpadding="10" cellspacing="0" width="100%">
  	<tbody>
  		    	
    	<tr> 
    		<td colspan="2">
    		<hr/>
				<h2>Runtime Common</h2>
				<hr/>
			</td>
  		</tr>
  		<tr>
    		<td align="right" valign="top" width="10%">
      			<b>API Work</b>
    		</td>
    		<td align="left" valign="top" width="70%">The GMF command API has been reworked to extend the Eclipse undoable operations API. GMF commands are now suitable for execution through the Eclipse operation history. The legacy GMF CommandManager is no longer used to maintain a history of undoable commands. Transactional commands are also provided to manipulate EMF models through the EMFT transaction API.
<br/><br/>
By default, GMF editors use their editing domain as their undo context in the operation history. Any change made to EMF models through the editing domain belonging to a GMF editor will be undoable from that editor's undo menu.
<br/><br/>
File modification approval is achieved through the registration of an IOperationApprover with the operation history. This approver validates the modification of file resources on behalf of any ICommand that is executed, undone and redone through the operation history. Each ICommand declares the file resources that it expects to modify in its #getAffectedFiles() method.
<br/><br/>
The following figure shows the new class diagram for the GMF command API:<br/><br/><center><img src="images1.0m5/GMF Command Class Diagram.gif"></center>
    		</td>
    	</tr>
    	<tr> 
    		<td colspan="2">
    		<hr/>
				<h2>Runtime Diagram</h2>
				<hr/>
			</td>
  		</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>API Work</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    		
    		<i>Diagram plug-in adoption of EMF transaction API enhancements:</i><br/><br/>
Migrated diagram plugins to adopt new APIs in EMF transaction API.  By default, two diagrams opened in GMF (e.g. two logic diagrams) now use two different editing domains -- one per editor. 
<br/><br/>
Wherever the API needs an editing domain you will need to pass one in.  As an example the DiagramEventBroker#getInstance method now requires that an EditingDomain be passed to it.  The editing domain is available from an IGraphicalEditPart and an editor. AbstractModelerPropertySection is no longer a IDemuxedMListener.  If you are overriding any of the IDemuxedMListener methods you should override getFilter() instead of filter on the event type. 
<br/><br/>
 
<i>RenderedImageFactory extensibility</i>
<br/><br/>
Clients can now supply extensions to support custom graphics formats through the new extension point: org.eclipse.gmf.runtime.draw2d.ui.render.renderedImageFactory.
<br/><br/>
This extension point is used to define an image type to allow auto detection of an image buffer.  The image type can instantiate an RenderedImage which can subsequently be rendered using the ScalableImageFigure class.
<br/><br/>
In the extension point, the client points to a factory class which they create implementing the RenderedImageType interface.  The RenderedImageFactory static class calls the extension point to compile a list of image types to query.  When the client calls the RenderedImageFactory to retrieve the proper RenderedImage, it will ask each type whether it can handle the particular image buffer.  If the image buffer is auto-detected by the type, then the type will instatiate and return a RenderedImage object.
<br/><br/> 
<i>Notation meta-model support for coordinate systems</i>
<br/><br/>
Added support in the notation meta-model for a measurement unit.  This is important for interoperability use-cases between editors to determine how to map coordinates from one editor to another.  A new structural feature (unchangeable) was added to the Diagram object that is an enumeration literal representing the coordinate system for the diagram editor.  
<br/><br/>
This value is propogated up to the root editpart, consequently it is no longer necessary for clients to initialize the MapMode by overriding the
<br/><br/>
DiagramRootEditPart#getMapMode api.  Instead they need to initialize the measurement unit of the notation Diagram object in their view factory.  An example can be seen in the geoshapes editor.  
<br/><br/>
@see GeoshapesDiagramViewFactory#getMeasurementUnit()
<br/><br/>
<b>Note:</b> clients overriding DiagramRootEditPart#getMapMode will have a compile error since it is now marked as "final". 
<br/><br/>
<i>Animated Layout migration</i>
<br/><br/>
Migrated existing animation classes in GMF to new animation classes in GEF (LayoutAnimator, RoutingAnimator).  Deprecated unneeded class in GMF: AnimatableLayoutListener.  Now clients can use LayoutAnimator and RoutingAnimator from GEF in it's place.
 <br/><br/>
    		</td>
    	</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>PNG Support</b>
    		</td>
    		<td align="left" valign="top" width="70%">A new image format PNG is now supported via the "Save as Image File…"
<br/><br/>
First choose the "Save As Image File.." from the right mouse context menu.<br/><br/><center><img src="images1.0m5/image001.jpg"></center>
<br/><br/>
Then choose the drop down to select the image file format.  Choose "PNG".<br/><br/>
<center><img src="images1.0m5/image002.jpg"></center>
    		</td>
    	</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Improved Layout</b>
    		</td>
    		<td align="left" valign="top" width="70%">There is a new layout provider that considers contained children is now available.  Previously, the layout providers that were available only operated in a single container context and clients would have to manually select each container they wishes to arrange.  Now, this new layout will recursively enter each child in the layout container and arrange it’s contents as well.  By default, these CompositeTopDownLayoutProvider and CompositeLeftRightLayoutProvider are not installed as the default layout provider for clients.  If clients wish to utilize it, they must create a layout provider that subclasses on these providers and provide for their diagram type and the LayoutType.DEFAULT type.  This is instrumented in the logic example. 
<br/><br/>
@see org.eclipse.gmf.examples.runtime.diagram.logic.internal.providers.LogicLayoutProvider.
<br/><br/>
Example Layout result
<br/><br/>
Before performing arrange-all action:<br/><br/><center><img src="images1.0m5/image003.gif"></center><br/><br/>
After performing arrange-all action:<br/><br/><center><img src="images1.0m5/image004.gif"></center>
    		</td>
    	</tr>
    	<tr> 
    		<td colspan="2">
    		<hr/>
				<h2>Runtime EMF</h2>
				<hr/>
			</td>
  		</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>API Work</b>
    		</td>
    		<td align="left" valign="top" width="70%">The notable change in this milestone is the deprecation of a large portion of the "MSL" (org.eclipse.gmf.runtime.emf.core) API. The deprecated APIs are preserved in M5 in a compatibility plug-in, org.eclipse.gmf.runtime.emf.core.compatibility, in the same package namespaces as previously. All of the public APIs have deprecation warnings indicating the substitutions required in client code. The general theme of the deprecations is to replace calls to MSL APIs with equivalents in the EMF base and EMFT Transaction APIs. The compatibility plug-in will be eliminated in the M6 milestone.
<br/><br/>
This milestone also removes APIs that were deprecated in M4, in particular the ILogicalResource-related APIs and the variants of the ResourceUtil.load(...) method that accept Strings rather than Resources.<br/><br/>
    		</td>
    	</tr>
    	
    	<tr> 
    		<td colspan="2">
    			<hr/>
				<h2>Generation Framework</h2>
				<hr/>
			</td>
  		</tr>
  		<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Load Resource</b>
    		</td>
    		<td align="left" valign="top" width="70%">A 'Load Resource...' action is added to diagram. The standard EMF dialog allows a user to load resources and reference model elements from them (e.g. in the property view).<br/><br/><center><img src="images1.0m5/LoadResource_1.PNG"><img src="images1.0m5/LoadResourceDialog.PNG"></center>
    		</td>
    	</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Containment References</b>
    		</td>
    		<td align="left" valign="top" width="70%">It is now possible to visualize containment references as diagram links. All the diagram elements without parents are stored in the resource.<br/><br/><center><img src="images1.0m5/PhantomElements_1.PNG"><img src="images1.0m5/PhantomElements_2.PNG"><img src="images1.0m5/PhantomElements_3.PNG"><img src="images1.0m5/PhantomElements_4.PNG"></center>
    		</td>
    	</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Initialize Diagram</b>
    		</td>
    		<td align="left" valign="top" width="70%">The 'Initialize diagram file' action dialog was changed to allow for creating a new diagram file in an arbitrary location.<br/><br/><center><img src="images1.0m5/InitDiagramFile.PNG"></center>
    		</td>
    	</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Dynamic Templates</b>
    		</td>
    		<td align="left" valign="top" width="70%">Dynamic templates are now supported by GMF generation tooling.<br/><br/><center><img src="images1.0m5/DynamicTemplates.PNG"></center>
    		</td>
    	</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Template</b>
    		</td>
    		<td align="left" valign="top" width="70%">Generated code makes use of the new Transaction API. As a result, each diagram operates with its own EditingDomain, ResourceSet and Resources loaded into it. The problems connected with single EditingDomain/ResourceSet shared across all GMF diagrams was eliminated.<br/>
    		</td>
    	</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Dashboard</b>
    		</td>
    		<td align="left" valign="top" width="70%">A new GMF dashboard view guides a user through the process of diagram editor creation.<br/><br/><center><img src="images1.0m5/dashboard.PNG"></center>
    		</td>
    	</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Wizards</b>
    		</td>
    		<td align="left" valign="top" width="70%">Improved graphical and tooling definition wizards allow a user to resolve domain elements as a node, link or label.<br/><br/><center><img src="images1.0m5/gdwiz.png"></center>
    		</td>
    	</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Links and Labels</b>
    		</td>
    		<td align="left" valign="top" width="70%">Links are supported with modeling assistance UI.<br/><br/>
    		Numerous enhancements in labels:<ul>
				<li>Multiple label definitions in mapping and generation models</li>
    			<li>Labels with fixed text that don't require feature from domain model</li>
    			<li>Label based on more than one feature from domain model</li>
    			<li>Parsers are generated for the feature-based labels</li>
    			</ul>
    		</td>
    	</tr>
    	
    	<tr> 
    		<td colspan="2">
    			<hr/>    		
				<h2>General</h2>
				<hr/>
			</td>
  		</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Documentation</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    		  A new cheatsheet to accompany the tutorial is available from Help | Cheat Sheets...
    		</td>
    	</tr>
    	<tr><td/><td><center><img src="images1.0m5/cheatsheet2.png"></center></td></tr>

  	</tbody>
  </table>
		
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
