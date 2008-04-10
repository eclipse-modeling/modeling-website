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
	# gmf-new-1.0M6.php
	#
	# Author: 		Richard C. Gronback
	# Date:			2006-04-20
	#
	# Description: 
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "What's New and Noteworthy - 1.0M6";
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
						Here are some of the more noteworthy things available in milestone build M6 
  						(April 14, 2006) which is now available for <a href="http://download.eclipse.org/modeling/gmf/downloads/drops/S-1.0M6-200604142204/index.php" target="_self">download</a>. 
  						<br/><br/>See the <a href="http://download.eclipse.org/modeling/gmf/downloads/drops/S-1.0M6-200604142204/buildNotes.php">M6 build notes</a> for details about bugs fixed and other changes.
					</td>
				</tr>
			</tbody>
		</table>

  <table border="0" cellpadding="10" cellspacing="0" width="100%">
  	<tbody>

    	<tr> 
    		<td colspan="2">
    		<hr/>
				<h2>Runtime Diagram</h2>
			<hr/>
			</td>
  		</tr>
  		<tr>
    		<td align="right" valign="top" width="10%">
      			<b>Palette service and contribution item service</b>
    		</td>
    		<td align="left" valign="top" width="70%">
    			<i>Separating the Definition and Contribution of a Palette Entry</i><br/br/>
    			<p>A plug-in may wish to define palette entries without contributing them to an editor so that other clients may contribute these palette entries to their editor's palette as appropriate.</p>
    			<p>To define a palette entry only, simply set defineOnly to true in the palette entry's schema definition. The following XML will define the geoshapes drawer without contributing it to an editor.
<pre>
        &lt;extension point="org.eclipse.gmf.runtime.diagram.ui.paletteProviders">
          &lt;paletteProvider class="org.eclipse.gmf.runtime.diagram.ui.providers.DefaultPaletteProvider">

             &lt;Priority name="Low"/>
             &lt;contribution factoryClass="org.eclipse.gmf.runtime.diagram.ui.geoshapes.internal.providers.GeoshapePaletteFactory">

                &lt;entry
                      defineOnly="true"
                      description="%GeoshapeDrawer.Description"
                      id="geoshapeDrawer"
                      kind="drawer"
                      label="%GeoshapeDrawer.Label">
                &lt;/entry>
                &lt;entry
                      label="%OvalTool.Label"
                      kind="tool"
                      description="%OvalTool.Description"
                      large_icon="icons/IconEllipse24.gif"
                      path="geoshapeDrawer/"
                      small_icon="icons/IconEllipse.gif"
                      id="oval">
                &lt;/entry>
                ...
             &lt;/contribution>
          &lt;/paletteProvider>
        &lt;/extension>
</pre>
    			</p>
    			<p>The following XML shows how to contribute the predefined geoshapes drawer to an editor.
<pre>
        &lt;extension point="org.eclipse.gmf.runtime.diagram.ui.paletteProviders">
           &lt;paletteProvider class="org.eclipse.gmf.runtime.diagram.ui.providers.DefaultPaletteProvider">

             &lt;Priority name="Medium"/>
             &lt;editor id="GeoshapeEditor"/>
             &lt;contribution>
                &lt;predefinedEntry
                      id="geoshapeDrawer"
                      path="/">
                &lt;/predefinedEntry>
             &lt;/contribution>
          &lt;/paletteProvider>
        &lt;/extension>
</pre>	
    			</p>
    			<p>The palette service execution is based on a REVERSE strategy and therefore the contribution of the palette entry must have a higher priority than that of the definition.</p>
    			<p>Other palette entries, such as palette tools can also be predefined and contributed by separate extensions. To add a palette tool from an existing drawer to a new drawer, use a predefined entry similar to the following:
<pre>
        &lt;predefinedEntry
            id="existingDrawer/aTool"
            path="/myDrawer"/>
</pre>
    			</p>
    			<p>Drawers that have already been contributed, can be expanded by default on an editor by another plugin. The following XML shows how an existing drawer would be expanded.
<pre>
        &lt;extension point="org.eclipse.gmf.runtime.diagram.ui.paletteProviders">
           &lt;paletteProvider class="org.eclipse.gmf.runtime.diagram.ui.providers.DefaultPaletteProvider">

             &lt;Priority name="High"/>

             &lt;contribution>
                &lt;predefinedEntry
                      id="geoshapeDrawer">
                   &lt;expand force="true"/>
                &lt;/predefinedEntry>
             &lt;/contribution>
          &lt;/paletteProvider>
        &lt;/extension>
</pre>
    			</p>
    			<i>Removing an Existing Palette Entry</i><br/br/>
    			<p>A plug-in may wish to remove a palette entry that another plugin has already contributed.</p>
    			<p>To remove a palette entry, simply set remove to true in the predefined palette entry's schema definition. The following XML shows how to remove a tool from the geoshapes drawer.
<pre>
        &lt;extension point="org.eclipse.gmf.runtime.diagram.ui.paletteProviders">
           &lt;paletteProvider class="org.eclipse.gmf.runtime.diagram.ui.providers.DefaultPaletteProvider">

             &lt;Priority name="High"/>
             &lt;contribution>
                &lt;predefinedEntry
                      id="geoshapeDrawer/oval"
                      remove="true"/>
             &lt;/contribution>
          &lt;/paletteProvider>
        &lt;/extension>
</pre>
    			</p>
    			<i>Removing an Existing Popup Menu Contribution Item</i><br/><br/>
    			<p>A plug-in may wish to remove a diagram popup menu item that another plugin has contributed via the contribution item service.</p>
    			<p>As an example, to remove the "delete from model" action on a java viz class popup menu, use XML similar to the following:
<pre>
   &lt;extension point="org.eclipse.gmf.runtime.common.ui.services.action.contributionItemProviders">
      &lt;contributionItemProvider class="com.ibm.xtools.viz.j2se.ui.internal.providers.J2SEContributionItemProvider">
         &lt;Priority name="High"/>
         &lt;popupContribution class="org.eclipse.gmf.runtime.diagram.ui.providers.DiagramContextMenuProvider">
            &lt;popupStructuredContributionCriteria objectClass="org.eclipse.gmf.runtime.diagram.ui.editparts.ConnectionNodeEditPart">
               &lt;method 
                     name="getModel().getElement().getStructuredReference().getProviderId()"
                     value="jgen,jimpl,jfield">
               &lt;/method>
            &lt;/popupStructuredContributionCriteria>
            &lt;popupPredefinedItem
                  id="deleteFromModelAction"
                  remove="true">
            &lt;/popupPredefinedItem>
         &lt;/popupContribution>
         ...
</pre>
    			</p>


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
