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
	# contributors.php
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
	$pageTitle 		= "GMF Project Contributors";
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
		
	<table border="0" cellpadding="2" cellspacing="0" width="100%">
		<tbody>
			<tr>
				<td align="left"><h1>$pageTitle</h1><br></td>
				<td align="right"><img align="right" src="http://www.eclipse.org/gmf/images/logo_banner.png" /></td>
			</tr>
		</tbody>
	</table>
	<hr/>
	<table border="0" cellpadding="2" cellspacing="5" width="100%">

	<tbody>
		<tr>
			<td colspan="2"><h3>Alphabetical Listing</h3></td>
		</tr>
		<tr>
			<td colspan="2">Below is the current list of Committers on the
			project.</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:boris.blajer@borland.com">Boris Blajer</a>,&nbsp;Borland</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:ldamus@ca.ibm.com">Linda Damus</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:radek.dvorak@borland.com">Radek Dvorak</a>,&nbsp;Borland</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:max.feldman@borland.com">Max Feldman</a>,&nbsp;Borland</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:richard.gronback@borland.com">Richard Gronback</a>,&nbsp;Borland</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:anthonyh@ca.ibm.com">Anthony Hunter</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:mmostafa@ca.ibm.com">Mohammed Mostafa</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:fplante@ca.ibm.com">Fred Plante</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:vramaswa@ca.ibm.com">Vishwanath Ramaswamy</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:crevells@ca.ibm.com">Cherie Revells</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:alexander.shatalin@borland.com">Alexander
			Shatalin</a>,&nbsp;Borland</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:steveshaw@ca.ibm.com">Steven Shaw</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:dstadnik@borland.com">Dmitri Stadnik</a>,&nbsp;Borland</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:artem.tikhomirov@borland.com">Artem Tikhomirov</a>,&nbsp;Borland</td>
		</tr>
		<tr>
			<td colspan="2">Below is the list of additional contributors to GMF,
			as noted on our project log.</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:jbruck@ca.ibm.com">James Bruck</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:keithc@ca.ibm.com">Keith Campbell</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:cdamus@ca.ibm.com">Christian Damus</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:wdiu@ca.ibm.com">Wayne Diu</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:melaasar@ca.ibm.com">Maged Elaasar</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:michael.golubev@borland.com">Michael Golubev</a>,&nbsp;Borland</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:idzelis@us.ibm.com">Mindaugas Idzelis</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:alexey.kamochkin@borland.com">Alexey Kamochkin</a>,&nbsp;Borland</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:ylulu@ca.ibm.com">Yaser Lulu</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:tmacdoug@ca.ibm.com">Tom MacDougall</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:cbmcgee@ca.ibm.com">Chris McGee</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:dmisic@ca.ibm.com">Dusko Misic</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:karen.shaglamdjan@borland.com">Karen Shaglamdjan</a>,&nbsp;Borland</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:etworkow@ca.ibm.com">Eliza Tworkowska</a>,&nbsp;IBM</td>
		</tr>
		<tr>
			<td align="right" valign="top"><img
				src="http://www.eclipse.org/images/Adarrow.gif" border="0"
				height="16" width="16"></td>
			<td><a href="mailto:Christian_Vogt@ca.ibm.com">Christian Vogt</a>,&nbsp;IBM</td>
		</tr>
	
	</tbody>
</table>
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
