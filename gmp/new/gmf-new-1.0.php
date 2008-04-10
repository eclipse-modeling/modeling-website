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
	# gmf-new-1.0.php
	#
	# Author: 		Richard C. Gronback
	# Date:			2006-07-11
	#
	# Description: 
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "What's New and Noteworthy - 1.0";
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
						Here are some of the more noteworthy things available in release build 1.0 
  						(June 30, 2006) which is now available for <a href="http://download3.eclipse.org/modeling/gmf/downloads/drops/R-1.0-200606271200/index.php" target="_self">download</a>. 
  						<br/><br/>See the <a href="http://download3.eclipse.org/modeling/gmf/downloads/drops/R-1.0-200606271200/buildNotes.php">R1.0 build notes</a> for details about bugs fixed and other changes.
					</td>
				</tr>
				<tr>
					<td width="69%" class="bannertext">
					Here is the list of previous New & Noteworthy documents for 1.0 milestone builds:<br/>
					<a href="http://www.eclipse.org/gmf/new/gmf-new-1.0M3.php">1.0 M3 New & Noteworthy</a><br/>
					<a href="http://www.eclipse.org/gmf/new/gmf-new-1.0M4.php">1.0 M4 New & Noteworthy</a><br/>
					<a href="http://www.eclipse.org/gmf/new/gmf-new-1.0M5.php">1.0 M5 New & Noteworthy</a><br/>
					<a href="http://www.eclipse.org/gmf/new/gmf-new-1.0M6.php">1.0 M6 New & Noteworthy</a><br/>
					</td>
				</tr>
			</tbody>
		</table>

  <table border="0" cellpadding="10" cellspacing="0" width="100%">
  	<tbody>
    	<tr> 
    		<td colspan="2">
			<hr/>
				<h2>Tooling</h2>
			<hr/>
		</td>
  	</tr>
  	<tr><a name="ecore-diagram"/>
    		<td align="right" valign="top" width="10%">
      			<b>Domain model</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    			<p>Generally, there is a domain-specific model behind the diagram. GMF relies on models expressed with EMF's ECore meta-model.</p>
    			<p><img src="images1.0/ecorefragment.png" alt="Fragment of ECore diagram"/></p>
			<p>This fragment of an ECore diagram shows the domain model of an ECore diagram, namely EMF's ECore model</p>

    			<i>Diagrams for domain model comprising of several packages</i><br/><br/>
			<p>Packages are often used to break large models down (though, neither ECore nor UML2 models use this technique). GMF respects models comprising of several packages and generates code that references appropriate factories and meta-packages</p>

    			<i>Diagrams without domain model at all (pure design modeling)</i><br/><br/>
			<p>Diagram elements do not require a mapping to domain elements. It's perfectly legal to have diagram elements that don't have underlying domain entity, or even complete diagram without domain model.</p>
    			<p><img src="images1.0/puredesign.png" alt="Pure-design diagram"/></p>

    			<i>Domain models based on XSD</i><br/><br/>
    			<p>ECore meta-models derived from XSD (thus, serialized into XML with appropriate schema) are supported. Provided you can plug in EMF's ResourceFactory, there are no limits on persistence of your domain model.</p>

    			<i>Links backed up with either EReference or EClass</i><br/><br/>
			<p>To model relations, both EReference and EClass are supported as model instances behind visual element</p>
			<p><img src="images1.0/linkref.png" alt="EReference-based link"/>&nbsp;&nbsp;<img src="images1.0/linkclass.png" alt="EClass-based link"/></p>
    		</td>
    	</tr>
  	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Generated Editor Features</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    			<i>Target runtime</i><br/><br/>
			<p>GMF-Runtime bundle provides a lot of improvements to regular GEF editors, as well as new features and is default target of code generation process. See Runtime section of New & Noteworthy documents for mode details.</p>
			<p>Part of SDK-experimental is a 'Lite' codegen option, which allows you to generate code that is pure GEF, imposing no additional runtime requirements but Platform, EMF, EMFT (namely, transaction and OCL) and GEF.</p>

    			<i>Synchronized diagrams</i><br/><br/>
    			<p>Term "synchronized diagram" refers to visual surface that tracks top-level elements being added/removed and refreshes visuals accordingly. Thus, a new element added to domain model will be automatically added to diagraming surface. Non-synchronized diagrams require the user to explicitly add elements of interest. The choice between synchronized and non-synchronized diagrams relies upon the toolsmith's understanding of a diagram's intended use.</p>

    			<i>Single/distinct file to persist domain and diagram information</i><br/><br/>
    			<p>GMF is flexible regarding whether your domain model is persisted in the same file with visual information or separately, although some tools that take your domain model may not be so flexible. Thus, an option is provided in GenModel whether to keep file with domain model separate from file with diagram (size, position, colors, etc) information.</p>

    			<i>Initialize diagram file from domain model, starting from any root (multiple diagrams per model)</i><br/><br/>
    			<p>As part of diagram code generation, an action to initialize diagram content from existing domain model instances is provided.</p>
			<p>Since Init Diagram File Action allows specifying any applicable model element as a root diagram element, it could be applied for the elements of the same domain model several times. As a result several diagrams of the same type visualizing different parts of the same model or different diagrams visualizing same model element could be created. Most notable use cases:</p>
			<ul>
			<li>Model (UML2/Ecore/user-defined class model) contains several packages. It is possible to create one package diagram for each of these packages.</li>
			<li>Model (UML2/User-defined) has two different diagramming aspects - package could be visualized as ClassDiagram or StateDiagram. User can initialize two different diagrams using the same domain model element (package) as a diagram root element. As a result, the same model could be modified using two different diagrams</li>
			</ul>
    			<p><img src="images1.0/initdiagramfileaction.png" alt="Context menu with the action"/></p>

    			<i>Shortcuts</i><br/><br/>
    			<p>Shortcuts are a mechanism to show elements from other diagrams. Diagrams should be aware of each other at time of generation. Shortcuts help to keep diagrams clean while alowing to depict some particular aspect of other domain/subsystem/component.</p>
    			<p><img src="images1.0/shortcuts.jpg" alt="Diagram with shortcuts"/></p>

    			<i>Labels</i><br/><br/>
    			<p>It's easy to define labels for diagram elements either with fixed content or based on EAttribute value(s). Labels floating around owning node may be defined (a.k.a. external labels). There's no limit on number of labels per diagram element, and no labels at all is ok as well.</p>
   			<p>Label's edit and view patterns (using <tt>java.text.MessageFormat</tt> values) allows for value formatting.</p>

    			<i>Visualize containments as links</i><br/><br/>
    			<p>Containment references may be visualized both as inner elements and as diagram links.</p>
			<p><img src="images1.0/phantomelements.png"/><br/>
			"Main Topic" elements owns both Resource and Subtopic elements. Resources are visualized as inner element (e.g. TopicResource1), while e.g. Subtopic2 gets containment relationship to Main Topic based on link.</p>

    			<i>New &lt;Your&gt;Diagram Wizard</i><br/><br/>
    			<p>Part of diagram code generation is wizard to create new diagram. These wizards may be found in Examples category of "New wizard"</p>
    			<p><img src="images1.0/wizard.png" alt="Wizard to create new diagram"/></p>

    			<i>Compartments</i><br/><br/>
    			<p>Compartments is a logical grouping facility. Usually with 'collapse' feature to hide grouped elements, and a title. Screenshot illustrates collapsed compartment with attributes of Class figure</p>
    			<p><img src="images1.0/compartments.png" alt="Node with compartments"/></p>

    			<i>Child elements</i><br/><br/>
			<p>Both grouped with compartments and directly managed by parent child elements are possible.</p>
    			<p>Toolsmith may choose whether to display child elements as list of labels or to use full-fledged shapes</p>
			<p><img src="images1.0/children.png" alt="Node with children and compartments"/></p>

    			<i>Property sheet</i><br/><br/>
    			<p>Multi-tabbed, extensible property sheet provides access to both domain and notation models properties.</p>
    			<p><img src="images1.0/propertysheet.png" alt="Property sheet"/></p>
    		</td>
    	</tr>
  	<tr><a name="validation"/>
    		<td align="right" valign="top" width="10%">
      			<b>Audits, Metrics and Validation</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    			<i>Audits</i><br/><br/>
			<p>GMF mapping allows definition of diagram audits in the form of rules which must be satisfied for a valid diagram. The rules can be targeted to domain or runtime notation meta-model or specific visual elements of the diagram. The audit rule expressions are registered as constraints with EMFT Validation Framework and published into the framework constraints registry.</p>
			<p>The diagram validation action performs a check of audit rules, also involving EMF EValidator if there is any registered for the domain meta-model. All violations are reported as diagram resource problem markers which are navigable to the affected visual elements in the diagram.</p>
			<p>Optionaly, validation status decorators can be enabled in order to highlight invalid elements and provide instant problem information when mouse hovers over the decorator.</p>
			<img src="images1.0/audits.png" alt="Audits screenshot"/><br/>

    			<i>Supported langages</i>
			<p>The logic of audit rules is written as a boolean typed expression which can be formulated in one of the supported languages. OCL and Java can be used for meta-model aware expressions while regexp, nregexp are useful when working with data-type values convertable to string. The latter one stands for negation of regular expression and can be used if a condition resulting in true is difficult to express. All expressions in interpreted languages are validated during modeling phase.</p>

    			<i>Metrics</i><br/><br/>
			<p>Metric rules can be defined in the mapping model and evaluated in runtime.  The rule numeric expressions can be targeted to either the domain meta-model or diagram visual elements. The result view of metrics calculations shows the values for targeted elements and indicate those out of  bounds.</p>
			<img src="images1.0/metricsdef.png" alt="Metrics screenshot"/></br>
			<p>For metric calculation expressions, all supported languages capable of producing a numeric value can be used. If Java language is used in order to handle more complex evaluation logic, corresponding java operation skeleton is generated and the user is responsible for providing the custom code and marking as not generated code which needs to be preserved.</p>
			<img src="images1.0/javarule_impl.png" alt="Java implementation screenshot"/>
    		</td>
    	</tr>
  	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Tooling - UI</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    			<i>Dashboard</i><br/><br/>
    			<p>Dedicated view depicts all steps one should go through to generate a plug-in with diagram. Handy links to appropriate tools and wizards should make it simple.</p>
			<img src="images1.0/dashboard.png" alt="Dashboard view screenshot"/><br/>

    			<i>Cheatsheets</i><br/><br/>
    			<p>Don't want to read tutorial and then start with frightenly empty workspace? Utilize the provided cheat sheet to guide you through the whole tutorial right in your workspace.</p>

    			<i>Jumpstart Wizards</i><br/><br/>
    			<p>GMF Tooling comes with few provisional wizards to facilitate getting started with definition models from a selected domain model.</p>
    			<p><img src="images1.0/gmfwizards.png" alt="Wizards available with GMF"/></p>
    		</td>
    	</tr>
  	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Tooling - Validation</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    			<i>OCL constraints for GMFMap and GMFGen</i><br/><br/>
    			<p>GMF Tooling employs EMF Validation framework and provides sophisticated validator implementation that evaluates constraints defined as meta-model annotation. OCL is supported in these constraint definitions. GMF defines and validates constraints for GMFGen and GMFMap models only, though the validator can be used with any model.</p>
    		</td>
    	</tr>
  	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Bootstrap and samples</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    			<i>ECore diagram (part of Callisto and Examples distribution)</i><br/><br/>
    			<p>Diagramming functionality for Ecore domain was generated and included in GMF distributions. It is possible to initialize ECore diagram using any existing .ecore file and continue editing meta-model using GMF diagramming functionality. See screenshot <a href="#ecore-diagram">above</a></p>

    			<i>GMFGraph WYSIWYG editor (SDK-experimental)</i><br/><br/>
    			<p><img src="images1.0/gmfgrapheditor.png" alt="GMFGraph WYSIWYG diagram"/></p>

    			<i>TaiPan</i><br/><br/>
    			<p>Simple and easy to start example, illustrating most of the GMF features. Take 3 related projects (model, emf.edit and generated diagram) from CVS: <br/><tt>:pserver:anonymous@dev.eclipse.org/cvsroot/modeling, org.eclipse.gmf/examples/org.eclipse.gmf.examples.taipan*</tt></p>
    		</td>
    	</tr>
  	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>GMFGraph</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    			<i>Standalone figures plug-in</i><br/><br/>
    			<p>To create standalone plug-in with figures, either use New Plug-in template or context menu</p>
			<p><img src="images1.0/gmfgraph_standalone_wizard.png" alt="Plugin template wizard"/></p>
			<p><img src="images1.0/gmfgraph_standalone_context.png" alt="Context menu for .gmfgraph"/></p>

    			<i>Using legacy/existing complex code with CustomFigure</i><br/><br/>
    			<p>GEF has been around for quite a while, and surely there are a lot of graphical figures already coded. It's easy to use them within GMF's graphical definition (GMFGraph) - just put fully-qualified class name of the figure into CustomFigure, and id of the figure's plug-in into CustomFigure's owning FigureGallery. It's advisable to define single FigureGallery per figure plug-in, holding/describing all the figures in that plug-in. Then, it's easy to reference these figures from any .gmfgraph model</p>

    			<i>Composite figures</i><br/><br/>
    			<p><img src="images1.0/gmfgraph_layouts.png" alt="Layout use in GMFGraph"/><br/>Layouts to support composite figure creation</p>
    		</td>
    	</tr>
  	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>GMF GenModel (.gmfgen)</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    			<i>Overridable/extensible templates</i><br/><br/>
    			<p>Like with EMF, one could put his own templates into separate folder, and generator will use them to generate diagram code. Unlike EMF, GMF doesn't support partial overriding of templates.</p>

    			<i>Reconcile</i><br/><br/>
    			<p>GenModel specifies attributes that are essential for code generation (like plug-in id, name, packages, etc) and though GenModel might get changed while refining your diagram definition, such properties are rarely changed once set. Thus, GMF preserves attributes of GenModel between GMFMap->GMFGen transformations (for full list of properties being reconciled see our Wiki pages)</p>
    		</td>
    	</tr>
  	<tr>
    		<td align="right" valign="top" width="10%">
      			<b>EMFT</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    			<i>Transaction API in use</i><br/><br/>
    			<p>Diagram changes often involve a lot of commands to be executed. Transaction API makes managing all these easy.</p>

    			<i>OCL validation</i><br/><br/>
    			<p>GMF Tooling utilized OCL support provided by EMFT. See <a href="#validation">Audits, Metrics and Validation</a> topic for more details</p>
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
