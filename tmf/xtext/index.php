<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# template.php
	#
	# Author: 		Denis Roy
	# Date:			2005-06-16
	#
	# Description: Type your page comments here - these are not sent to the browser
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Xtext";
	$pageKeywords	= "DSLs, oAW, Xtext, Eclipse, MDD, MDSD";
	$pageAuthor		= "Sven Efftinge";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	$Nav->addCustomNav("Projectplan", "projectplan.php");
	$Nav->addNavSeparator("Xtext (oAW 4.3)", 	"http://www.openarchitectureware.org");
	$Nav->addCustomNav("Download", "http://www.eclipse.org/gmt/oaw/download/");
	$Nav->addCustomNav("Documentation", "http://www.eclipse.org/gmt/oaw/doc/4.2/html/contents/xtext_reference.html");

	# End: page-specific settings
	#
		
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML
	        <h1 class="firstHeading">Xtext</h1>

          <p><br />
Welcome to the Xtext wiki.
</p>
<p><img alt="Xtext Logo" src="images/logo.png" width="350" border="0" align="right" vspace="10" hspace="20"/>Xtext is a framework/tool for development of external textual DSLs. Just describe your very own DSL using Xtext's simple EBNF grammar language and the generator will create a parser, an AST-meta model (implemented in EMF) as well as a full-featured Eclipse Text Editor from that.
</p><p>The Framework integrates with technology from Eclipse Modeling such as EMF, GMF, M2T and parts of EMFT. Development with Xtext is optimized for short turn-arounds, so that adding new features to an existing DSL can be done in seconds.
</p><p>Language development has never been so easy.

</p>
<table border="0" cellspacing="15" style="width:100%;">


<tr valign="top">
<td style="width:50%;">
<a name="Xtext_from_oAW_4.3"></a><h1><span class="editsection"></span> <span class="mw-headline">Xtext from oAW 4.3</span></h1>
<ul><li><b><a href="http://www.eclipse.org/gmt/oaw/download/" class="external text" title="http://www.eclipse.org/gmt/oaw/download/" rel="nofollow">(Xtext 4.3) oAW Download instructions</a></b> - check out the available versions of oAW
</li><li><b><a href="http://wiki.eclipse.org/index.php?title=Xtext_Tutorials&amp;action=edit" class="new" title="Tutorial">Tutorial</a></b> - learn how to develop languages

</li><li><b><a href="http://wiki.eclipse.org/OAW" title="OAW">oAW</a></b> - learn how to develop generatos
</li><li><b><a href="http://wiki.eclipse.org/index.php?title=Xtext_FAQ&amp;action=edit" class="new" title="Xtext FAQ">Xtext FAQ</a></b> - the official Xtext FAQ
</li></ul>
</td><td>
<a name="Get_Involved"></a><h1><span class="editsection"></span> <span class="mw-headline">Get Involved</span></h1>
<ul><li><b><a href="https://bugs.eclipse.org/bugs/buglist.cgi?query_format=advanced&amp;short_desc_type=allwordssubstr&amp;short_desc=&amp;classification=Modeling&amp;product=TMF&amp;component=Xtext&amp;long_desc_type=allwordssubstr&amp;long_desc=&amp;bug_file_loc_type=allwordssubstr&amp;bug_file_loc=&amp;status_whiteboard_type=allwordssubstr&amp;status_whiteboard=&amp;keywords_type=allwords&amp;keywords=&amp;bug_status=NEW&amp;bug_status=ASSIGNED&amp;bug_status=REOPENED&amp;emailtype1=exact&amp;email1=&amp;emailtype2=substring&amp;email2=&amp;bugidtype=include&amp;bug_id=&amp;votes=&amp;chfieldfrom=&amp;chfieldto=Now&amp;chfieldvalue=&amp;cmdtype=doit&amp;order=Reuse+same+sort+as+last+time&amp;field0-0-0=noop&amp;type0-0-0=noop&amp;value0-0-0=" class="external text" title="https://bugs.eclipse.org/bugs/buglist.cgi?query_format=advanced&amp;short_desc_type=allwordssubstr&amp;short_desc=&amp;classification=Modeling&amp;product=TMF&amp;component=Xtext&amp;long_desc_type=allwordssubstr&amp;long_desc=&amp;bug_file_loc_type=allwordssubstr&amp;bug_file_loc=&amp;status_whiteboard_type=allwordssubstr&amp;status_whiteboard=&amp;keywords_type=allwords&amp;keywords=&amp;bug_status=NEW&amp;bug_status=ASSIGNED&amp;bug_status=REOPENED&amp;emailtype1=exact&amp;email1=&amp;emailtype2=substring&amp;email2=&amp;bugidtype=include&amp;bug_id=&amp;votes=&amp;chfieldfrom=&amp;chfieldto=Now&amp;chfieldvalue=&amp;cmdtype=doit&amp;order=Reuse+same+sort+as+last+time&amp;field0-0-0=noop&amp;type0-0-0=noop&amp;value0-0-0=" rel="nofollow">Xtext Bugzilla</a></b> - review and create Bugzilla entries

</li><li><b><a href="http://wiki.eclipse.org/index.php?title=Xtext_Repository_Details&amp;action=edit" class="new" title="Xtext Repository Details">Source Code Access</a></b> - get the code from CVS.
</li><li><b><a href="http://wiki.eclipse.org/index.php?title=Xtext_Workspace_Setup&amp;action=edit" class="new" title="Xtext Workspace Setup">Workspace Setup</a></b> - how to set up your workspace.
</li><li><b><a href="http://wiki.eclipse.org/index.php?title=Xtext_Documentation_Engineering&amp;action=edit" class="new" title="Xtext Documentation Engineering">Documentation Engineering</a></b> - how to write documentation.
</li><li><b><a href="http://wiki.eclipse.org/index.php?title=Xtext_Release_Engineering&amp;action=edit" class="new" title="Xtext Release Engineering">Release Engineering</a></b> - how to set up the build and produce a release.
</li><li><b><a href="http://wiki.eclipse.org/index.php?title=Xtext_Project_Plan&amp;action=edit" class="new" title="Xtext Project Plan">Project Plan</a></b> - what's coming up?.
</li></ul>
</td></tr></table>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
