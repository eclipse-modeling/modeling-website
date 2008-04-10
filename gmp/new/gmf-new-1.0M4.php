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
	# gmf-new-1.0M4.php
	#
	# Author: 		Richard C. Gronback
	# Date:			2006-01-13
	#
	# Description: 
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "What's New and Noteworthy - 1.0M4";
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
						Here are some of the more noteworthy things available in milestone build M4 
  						(January 13, 2006) which is now available for <a href="http://download.eclipse.org/modeling/gmf/downloads/drops/S-1.0M4-200601131500/index.php" target="_self">download</a>. 
  						<br/><br/>See the <a href="http://download.eclipse.org/modeling/gmf/downloads/drops/S-1.0M4-200601131500/buildNotes.php">M4 build notes</a> for details about bugs fixed and other changes.
					</td>
				</tr>
			</tbody>
		</table>
  
  <table border="0" cellpadding="10" cellspacing="0" width="100%">
  	<tbody>
  		<tr> 
    		<td colspan="2">
				<h2>General</h2>
				<hr/>
			</td>
  		</tr>
  		<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Documentation</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    			The documentation set now includes full JavaDoc and Extension-Point reference information, in addition to new tutorials and other information to get you started understanding GMF more quickly.
    		</td>
    	</tr>
    	<tr><td/><td><center><img src="images1.0m4/doc_index.png"></center></td></tr>

    	<tr> 
    		<td colspan="2">
    			<hr/>
				<h2>Generation Framework</h2>
				<hr/>
			</td>
  		</tr>
  		<tr>
    		<td align="right" valign="top" width="10%">
      			<b>ECore Editor</b>
    		</td>
    		<td align="left" valign="top" width="70%">A new example plug-in (org.eclipse.gmf.ecore.editor) to allow for the modeling of EMF (*.ecore) models is found <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.gmf/examples/org.eclipse.gmf.ecore.editor/?cvsroot=Technology_Project">here</a>. 
    		</td>
    	</tr>
    	<tr><td/><td valign="top"><center><img src="images1.0m4/domain.png"></center><hr/></td></tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Definition Wizards</b>
    		</td>
    		<td align="left" valign="top" width="70%">Three new wizards will allow rapid creation of a basic graphical definition model (*.gmfgraph), tooling model (*.gmftool), and mapping model (*.gmfmap) from an existing domain model (*.ecore). Simply select your domain model, go to New &gt; GMF &gt; GMFGraph Simple Model | GMFTool Simple Model | Guide GMFMap Creation, and follow the steps. 
    		</td>
    	</tr>
    	<tr><td/><td valign="center"><center><img src="images1.0m4/gmfgraph_wizard.png">&nbsp;&nbsp;&nbsp;<img src="images1.0m4/generated_gmfgraph.png"></center></td></tr>
    	<tr><td/><td valign="center"><center><img src="images1.0m4/gmfmap_wizard.png"></center></td><hr/></tr>
  		<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Tutorial</b>
    		</td>
    		<td align="left" valign="top" width="70%">An updated tutorial is published <a href="http://www.eclipse.org/gmf/tutorial/index.php">here</a> to give you a jumpstart using GMF. Look for incremental improvement in the tutorial as the generation framework of GMF improves in the future. Also, look for an upcoming supplement to the tutorial to explain what goes on behind the scenes of this framework.
    		<hr/></td>
    	</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Graphical Definition Model</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    		A new graphical definition model was introduced in M4 to allow for improved diagram element and figure definition, including code generation for basic figures. With that, a basic graphical definition model is provided for reuse and can be added from this URI <code>platform:/plugin/org.eclipse.gmf.graphdef/models/basic.gmfgraph</code>.
    		</td>
    	</tr>
    	<tr><td/><td valign="top"><center><img src="images1.0m4/graph_model.png"></center><hr/></td></tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Tooling Definition Model</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    		A new tooling definition model was introduced in M4 to enable the configuration of tooling (e.g. palette elements) for a diagram.
    		</td>
    	</tr>
    	<tr><td/><td valign="top"><center><img src="images1.0m4/tool_model.png"></center><hr/></td></tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Properties View</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    		To simplify the selection of valid domain elements for the mapping definition, filtering was added to the properties view. Also, the properties were grouped by domain element and visual representation elements, in addition to given friendlier names.
    		</td>
    	</tr>
    	<tr><td/><td valign="top"><center><img src="images1.0m4/properties.png"></center><hr/></td></tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>OCL</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    		OCL statements can now be used to constrain diagram elements. For example, a constraint may be added to prevent a connection between a diagram element and itself, or another element specified by the constraint.
    		</td>
    	</tr>
    	<tr><td/><td valign="top"><center><img src="images1.0m4/constraint.png"></center><hr/></td></tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Diagram Format</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    		The diagram file format changed between M3 and M4, so diagrams created using M3 will not work with the code generated by M4.
    		<hr/></td>
    	</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Child Mappings</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    		The ability to create child mappings below another child mapping was added.
    		</td>
    	</tr>
    	<tr><td/><td valign="top"><center><img src="images1.0m4/child_mappings.png"></center></td></tr>
    	<tr><td/><td valign="top"><center><img src="images1.0m4/child_nodes.png"></center><hr/></td></tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Creation Tool</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    		The ability to create several domain model meta-classes using the same toolbar tool was added, but supported by .gmfgen model and code generation process only (no support in mapping).
    		</td>
    	</tr>
    	<tr><td/><td valign="top"><center><img src="images1.0m4/1tool_Nclasses.png"></center><hr/></td></tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Shortcuts</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    		It is now possible to create shortcuts to the elements of one domain model diagram on another domain model diagram.
    		</td>
    	</tr>
    	<tr><td/><td valign="top"><center><img src="images1.0m4/shortcuts.png"></center><hr/></td></tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Audit Definitions</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    		The mapping definition supports specification of audit rules to be checked on domain model instances during validation process.
    		</td>
    	</tr>
    	<tr><td/><td valign="top"><center><img src="images1.0m4/audits.png"></center></td></tr>
    	<tr>
    		<td/>
    		<td align="left" valign="top" width="70%">
    		The generated diagram editor plugin registers EMFT validation framework-compliant constraint providers 
and correspoding entries are published in the constraint catalog of Validation Constraints preference page.
Audit rules are then evaluated by EMFT ModelValidationService which is called internaly by the GMF runtime.
    		</td>
    	</tr>
    	<tr><td/><td valign="top"><center><img src="images1.0m4/validation.png"></center><hr/></td></tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Links</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    		Several improvements were made in support of diagram links:
    		<ul>
    			<li>For type-based links, the ability to support distinct source and containment features is now supported [<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=115621">115621</a>].</li>
    			<li>The ability to links in both directions was added (i.e. from both target to source and source to target).</li>
    			<li>The multiplicity of a link's containment feature is checked before allowing link creation.</li>
    		</ul>
    		</td>
    	</tr>
  		
  		<tr> 
    		<td colspan="2">
    			<hr/>
				<h2>Runtime</h2>
				<hr/>
			</td>
  		</tr>
  		<tr>
    		<td align="right" valign="top" width="10%">
      			<b>New Article</b>
    		</td>
    		<td align="left" valign="top" width="70%">To aid in understanding the runtime portion of GMF, 
    		a draft of an article describing its components is found <a href="http://eclipse.org/articles/Article-Introducing-GMF/article.html">here</a>.
    		<hr/></td>
    	</tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Feature Work</b>
    		</td>
    		<td align="left" valign="top" width="70%">The visible feature work that was accomplished in M4 was around refurbishing 
    		the grid feature to be more flexible and improve its general usability.  Previously the grid functionality was awkward 
    		to access through the context menu and the available options were limited.  As well, the preference page which specified 
    		the defaults had inconsistent behavior in that sometimes the settings affected the grid behavior for new diagrams and others affected all diagrams.  
			<br/><br/>
			Now the preferences only represent the defaults for when new diagrams are created and the settings are 
			changeable through a new properties tab that is displayed when the diagram is selected.

    		</td>
    	</tr>
    	<tr><td/><td><center><img src="images1.0m4/feature1.png"></center></td></tr>
    	
		<tr><td/><td>Some of the new feature capabilities include:
    		<ol>
    			<li>Ability to display the grid in front or in back of the printable diagram shapes.</li>
				<ul>
					<li>When check box is turned off, the grid appears in the back:</li>
					<center><img src="images1.0m4/grid_front_box.png"></center><br/>
					<center><img src="images1.0m4/grid_back.png"></center><br/><br/>
				</ul>
				<ul>
					<li>When the check box is turned on, the grid appears in the front.  This is useful if you have a shape compartment that has contained shapes that need to be aligned to the grid:</li>
					<center><img src="images1.0m4/grid_front_box_checked.png"></center><br/>
					<center><img src="images1.0m4/grid_front.png"></center><br/><br/>
				</ul>
				<li>Ability to change the line style and color of the grid.  The allows the user flexibility to customize the grid to their personal preferences.</li>
					<center><img src="images1.0m4/color_style.png"></center><br/>
					<center><img src="images1.0m4/color_style_example.png"></center><br/><br/>
				<li>Ability to restore the current grid settings back to the preference defaults.  If the settings were changed erroneously or not to the users satisfaction then they have the ability to revert them back to the values set in the grid preference page.</li><br/>
					<center><img src="images1.0m4/restore_defaults.png"></center><br/>
					<center><img src="images1.0m4/rulers_grid.png"></center><br/><br/>
			</ol>    	
    	
    		</td>
    	</tr>
    	
    	<tr><td/><td><hr/></td></tr>
  		<tr>
    		<td align="right" valign="top" width="10%">
      			<b>API</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    			<b>Diagram Component</b> API work in M4 was to fully stabilize the core api to avoid future changes.  
    			The major work was around consolidating API through the services.  
    			As an example, this meant eliminating creation and layout routines from the public class DiagramUtil 
    			and making them available through their corresponding services (i.e. ViewService and LayoutService).
    			<br/><br/>
				In addition, the infrastructure to support having shapes border around existing shapes was refactored 
				to simplify the API and make it more intuitive to use.  There are now two main interfaces, one representing 
				the shape that resides on the border (IBorderItemEditPart) and the shape that holds the border shapes along 
				it’s border (IBorderedShapeEditPart). 
    		</td>    		
  		</tr>
  		
    	<tr><td/><td><center><img src="images1.0m4/api.png"></center></td></tr>
		<tr><td/><td><hr/></td></tr>
		<tr>			
			<td/>
    		<td align="left" valign="top" width="70%">
		    	<b>Common Component</b> API changes below were made in M4. Details can be found in Bugzilla.
		
				<ul>
				<li>Removed org.eclipse.gmf.runtime.common.ui.dialogs.DispatchingProgressMonitorDialog</li>
				<li>Removed org.eclipse.gmf.runtime.common.ui.util.DispatchingProgressMonitorDialogUtil</li>				
				<li>Removed org.eclipse.gmf.common.core.l10n.AbstractResourceManager</li>				
				<li>Removed the org.eclipse.gmf.common.core.provider fragment</li>
				<li>Removed the org.eclipse.gmf.runtime.emf.ui.transfer.providers fragment</li>
				<li>Deprecated the following methods and classes:</li>
				<ul>
					<li>org.eclipse.gmf.runtime.emf.commands.core.commands.MSLMoveElementCommand replaced with org.eclipse.gmf.runtime.emf.commands.core.commands.MSLMoveElementsCommand</li>
					<li>org.eclipse.gmf.runtime.emf.type.core.commands.MoveElementCommand replaced with	org.eclipse.gmf.runtime.emf.type.core.commands.MoveElementsCommand</li>
					<li>org.eclipse.gmf.runtime.emf.type.core.requests.MoveRequest.getElementToMove() replaced with MoveRequest.getElementsToMove()</li>
					<li>org.eclipse.gmf.runtime.emf.type.core.requests.MoveRequest.getTargetFeature() replaced with MoveRequest.getTargetFeature(EObject)</li>
					<li>org.eclipse.gmf.runtime.emf.type.core.requests.MoveRequest.setTargetFeature(EReference)	replaced with MoveRequest.setTargetFeature(EObject, EReference)</li>							
					<li>Deprecated org.eclipse.gmf.common.core.plugin.XtoolsPlugin</li>
					<li>Deprecated org.eclipse.gmf.common.ui.plugin.XtoolsUIPlugin</li>
					<li>Deprecated org.eclipse.gmf.common.ui.l10n.AbstractUIResourceManager</li>
					<li><b>Deprecations will be removed in M5</b></li>
				</ul>
				</ul>
    		</td>    		
  		</tr>
    	<tr><td/><td><hr/></td></tr>
    	<td/><td align="left" valign="top" width="70%">
    	<b>EMF Component</b> API work continued to be a focus in M4 to ensure that the public api will be scalable and solid for future 
    	releases to accommodate backward compatibility.  Specifically, we have begun the transition to a new framework for transactional 
    	editing domains in EMF, which also prepares the way for adoption of the Eclipse operation history API.
    	<br/><br/>
		Other changes include the deprecation of the IlogicalResource interface and related APIs.  <br/>
		The following APIs are deprecated and, mostly, no longer have any effect (within the limits of the contract): 
		<br/><br/><b>Package org.eclipse.gmf.runtime.emf.core.resources:</b>
		<ul> 
			<li>ILogicalResource:  the interface is deprecated.  Note that the canSeparate() method now always returns false and getMappedResources() always returns an empty map.</li> 
			<li>ILogicalResourcePolicy:  the interface is deprecated.  Logical resource policies are no longer constructed or invoked by the system.</li> 
			<li>CannotSeparateException, CannotAbsorbException classes are deprecated.</li> 
			<li>AbstractLogicalResource, AbstractLogicalResourcePolicy classes are deprecated.  No longer support separation or the resource map.</li>
		</ul>
		<b>Package org.eclipse.gmf.runtime.emf.core:</b>
		<ul> 
			<li>EventTypes:  the ABSORB, SEPARATE, and LOAD event types are deprecated.  Notifications of these types are no longer fired.</li>
		</ul>
		<b>Package org.eclipse.gmf.runtime.emf.core.edit:</b>
		<ul> 
			<li>MFilter:  the SEPARATED_ABSORBED and ELEMENT_LOADED filters are deprecated.</li> 
			<li>MEditingDomain:  the isLogicalResource() and asLogicalResource() methods are deprecated, but still implement their contracts.</li> 
			<li>IDemuxedMListener2:  the handleElementAbsorbedEvent(), handleElementSeparatedEvent(), and handleElementLoadedEvent() callbacks are deprecated.</li> 
			<li>DemuxedMListener:  the default implementations of the deprecated IDemuxedMListener2 methods are deprecated.</li> 
			<li>MResourceOption:  the LOAD_ALL_SUBUNITS and DONT_AUTO_LOAD_SUBUNITS load options are deprecated and no longer have any effect.</li>
		</ul>
		<b>Package org.eclipse.gmf.runtime.emf.core.util:</b>
		<ul>
			<li>ResourceUtil:  the isLogicalResource() and asLogicalResource() methods are deprecated, but still implement their contracts.</li> 
			<li>EObjectContainmentLoadingEList and EObjectContainmentWithInverseLoadingEList are deprecated and no longer peform auto-loading of elements (as there are no longer any separate elements).</li>
		</ul>
		<b>Extension point org.eclipse.gmf.runtime.emf.core.resourcePolicies:</b>
		<ul> 
			<li>The extension point is deprecated and is no longer consulted by the runtime.</li>
		</ul>
		The logical resource capability is replaced by support for cross-resource containment proxies in EMF 2.2, as defined in Bugzilla <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=105937">105937</a>.
    	</td>
    	
    	
   		<tr><td/><td><hr/></td></tr>
    	
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Performance</b>
    		</td>
    		<td align="left" valign="top" width="70%">Some significant performance work done in M4 to reduce overall memory usage.  
    		First of all the option is there now for clients to create an EditPart that points directly to a semantic element instead 
    		of creating a notation view that references the semantic element.  This can produce significant savings for an EditPart 
    		that is displayed but has no user settable or configurable display for the view.  For instance, a list compartment that 
    		has list items may all be configured the same and as such don’t need to be able to persist view notation for each list item.  
    		For this case there is a new api class SemanticListCompartmentEditPart that supports list item EditParts that point directly 
    		to the semantic list items.
    		<br/><br/>
			Another memory saving is for notation views that are created initially as not visible.  Previously, even if the notation 
			view wasn’t visible, the EditPart and Figure were created in memory anyways.  Now, if the child view is not visible when the 
			parent EditPart is created, then the EditPart is not created until the view is made visible through an explicit action (i.e. Show/Hide Compartment ).
			<br/></br/>
			In terms of performance, the SVG rendering has been improved dramatically achieving up to 50% improvement in most cases.  
			Clients of the ScalableImageFigure public class should observe these improvements.  In addition, for large renderings, the 
			rendering will occur on a separate thread to avoid locking the UI.  While the rendering is occurring, the image is displayed 
			as a red X until completed.
    		</td>
    	</tr>
    	
    	<tr><td/><td><hr/></td></tr>
    	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>SDK Documentation</b>
    		</td>
    		<td align="left" valign="top" width="70%">A new tutorial to assist clients in constructing canonical containers has been added to the SDK documentation.  Also, a tutorial describing how to instrument your editor with a diagram assistant for connection handles on a shape is now available.
    		</td>
    	</tr>
    	<tr><td/><td valign="top"><center><img src="images1.0m4/canonical_containers.png"></center></td></tr>
  		
    	<tr> 
    		<td colspan="2">
    			<hr/>
				<h2>EMF Technology Project</h2>
				<hr/>
			</td>
  		</tr>
  		<tr>
    		<td align="right" valign="top" width="10%">
      			<b>API Work</b>
    		</td>
    		<td align="left" valign="top" width="70%">API continued to be a focus in M4 to ensure that the public api will be scalable and solid for future releases to accommodate backward compatibility.  Specifically, we have created a new EMFT sub-project “Transaction” defining a new API for transactional editing domains and some improvements in the OCL parser API.  Documentation of the Transaction API will be available in the next iteration; so far there is Javadoc and an example plug-in (org.eclipse.emf.workbench.examples.library.editor) to help you get started.
			<br/>
			Some minor changes were made in the OCL API, as follows:<br/><br/>
			<b>Package org.eclipse.emf.ocl.helper:</b>
			<ul>
				<li>interface IOclHelper</li>
				<li>method evaluate(Object context, OclExpression expression):  added to support repeated evaluation of the same pre-parsed expression on different context objects</li>
				<li>method check(Object context, OclExpression constraint):  added to support repeated checking of the same pre-parsed constraint on different context objects</li>
				<li>method getSyntaxHelp(String) is deprecated, replaced by a new method getSyntaxHelp(ConstraintType, String) which includes the kind of constraint that the user is formulating (which is important in determining valid completions)</li>
			<ul>
    		</td>
    	</tr>
  	</tbody>
  </table>
		
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
