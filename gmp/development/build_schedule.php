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
	# Author: 		Max Feldman
	# Date:			2006-05-05
	#
	# Description: 
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "GMF 1.0 Endgame Build Schedule";
	$pageKeywords	= "eclipse,project,graphical,modeling,model-driven";
	$pageAuthor		= "Max Feldman";
	
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
<p><b>Notes</b><br>
<br>
N builds replace tags specified in org.eclipse.gmf.releng map files with HEAD.<br>
I builds use tags in org.eclipse.gmf.releng map files.<br>
More info on the GMF dependencies could be found on a Callisto Plan Summary <a href="http://wiki.eclipse.org/index.php/Callisto_Plan_Summary">page</a><br>
<br>
See also <a href="http://wiki.eclipse.org/index.php/Callisto_Final_Daze">Callisto Final Daze</a>.
<p>
Times are all CEST (GMT +2)</p>
<table border="1" width="100%">
  <tbody>
  	<!--------------------- RC1 --------------------->
    <tr>
      <td rowspan="5"><b>RC1</b></td>
      <td width="22%">Friday April 14</td>
      <td width="65%">20:00 I build</td>
      <td rowspan="5"><a href="http://download.eclipse.org/modeling/gmf/downloads/drops/S-1.0M6-200604142204/index.php">
      	  <img src="http://www.eclipse.org/gmf/images/OK.gif"/>
      	</a>
      </td>
    </tr>
    <tr>
      <td width="22%">Monday April 17-Wednesday April 19</td>
      <td width="65%">Daily 06:00 N build</td>
    </tr>
    <tr>
      <td width="22%">Thursday April 20</td>
      <td width="65%">06:00 N build<br>20:00 I build (RC1 candidate. Ask teams for go/no go on this build)</td>
    </tr>
    <tr>
      <td width="22%">Friday April 21</td>
      <td width="65%">20:00 RC1 build<br>Further builds will be on a request basis only.<br>RC1 declared.</td>
    </tr>
    <tr>
      <td colspan="2" width="22%"><b>Dependencies:</b> Platform (M6), EMF (M6), GEF (M6), EMFT(M6a)</td>
    </tr>

  	<!--------------------- RC2 --------------------->
   <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td rowspan="5"><b>RC2</b></td>
      <td width="22%">Friday April 28</td>
      <td width="65%">20:00 I build</td>
      <td rowspan="5"><a href="http://download.eclipse.org/modeling/gmf/downloads/drops/S-1.0RC2-200605051750/index.php">
      	  <img src="http://www.eclipse.org/gmf/images/OK.gif"/>
      	</a>
    </tr>
    <tr>
      <td width="22%">Monday May 1-Wednesday May 3</td>
      <td width="65%">Daily 06:00 N build</td>
    </tr>
    <tr>
      <td width="22%">Thursday May 4</td>
      <td width="65%">06:00 N build<br>20:00 I build (RC2 candidate. Ask teams for go/no go on this build)</td>
    </tr>
    <tr>
      <td width="22%">Friday May 5</td>
      <td width="65%">20:00 RC2 build<br>Further builds will be on a request basis only.<br>RC2 declared.</td>
    </tr>
    <tr>
      <td colspan="2" width="22%"><b>Dependencies:</b> Platform (RC2), EMF (RC2a), GEF (RC2a), EMFT(RC2)</td>
    </tr>

   	<!--------------------- RC3 --------------------->
   <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td rowspan="5"><b>RC3</b></td>
      <td width="22%">Friday May 12</td>
      <td width="65%">20:00 I build</td>
      <td rowspan="5"><a href="http://download.eclipse.org/modeling/gmf/downloads/drops/S-1.0RC3-200605191300/index.php">
      	  <img src="http://www.eclipse.org/gmf/images/OK.gif"/></a>
      </td>
    </tr>
    <tr>
      <td width="22%">Monday May 15-Wednesday May 17</td>
      <td width="65%">Daily 06:00 N build</td>
    </tr>
    <tr>
      <td width="22%">Thursday May 18</td>
      <td width="65%">06:00 N build<br>20:00 I build (RC3 candidate. Ask teams for go/no go on this build)</td>
    </tr>
    <tr>
      <td width="22%">Friday May 19</td>
      <td width="65%">20:00 RC3 build<br>Further builds will be on a request basis only.<br>RC3 declared.</td>
    </tr>
    <tr>
      <td colspan="2" width="22%"><b>Dependencies:</b> Platform (RC4), EMF (RC4), GEF (RC3), EMFT(RC3)</td>
    </tr>

   	<!--------------------- RC4 --------------------->
   <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td rowspan="5"><b>RC4</b></td>
      <td width="22%">Wednesday May 24</td>
      <td width="65%">20:00 I build</td>
       <td rowspan="5"><a href="http://download.eclipse.org/modeling/gmf/downloads/drops/S-1.0RC4a-200606091400/index.php">
      	  <img src="http://www.eclipse.org/gmf/images/OK.gif"/></a>
      	</td>
    </tr>
    <tr>
      <td width="22%">Thursday May 25-Monday May 29</td>
      <td width="65%">Daily 06:00 N build</td>
    </tr>
    <tr>
      <td width="22%">Tuesday May 30</td>
      <td width="65%">06:00 N build<br>20:00 I build (RC4 candidate. Ask teams for go/no go on this build)</td>
    </tr>
    <tr>
      <td width="22%">Wednesday May 31</td>
      <td width="65%">20:00 RC4 build<br>Further builds will be on a request basis only.<br>RC4 declared.</td>
    </tr>
    <tr>
      <td colspan="2" width="22%"><b>Dependencies:</b> Platform (RC7), EMF (RC7), GEF (RC4), EMFT(RC4)</td>
    </tr>

  	<!--------------------- RC5 --------------------->
   <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td rowspan="6"><b>RC5</b></td>
      <td width="22%">Wednesday May 24</td>
      <td width="65%">20:00 I build</td>
       <td rowspan="6"></td>      
    </tr>
    <tr>
      <td width="22%">Monday June 12-Thursday June 15</td>
      <td width="65%">Daily 06:00 N build</td>
    </tr>
    <tr>
      <td width="22%">Friday June 16</td>
      <td width="65%">06:00 N build<br>20:00 I build (RC5 candidate. Ask teams for go/no go on this build)</td>
    </tr>
    <tr>
      <td width="22%">Monday June 19</td>
      <td width="65%">20:00 RC5 build<br>Further builds will be on a request basis only.</td>
    </tr>
    <tr>
      <td width="22%">Tuesday June 20</td>
      <td width="65%">RC5 declared.</td>
    </tr>
    <tr>
      <td colspan="2" width="22%"><b>Dependencies:</b> Platform (M20060609-1217), EMF (RC7), GEF (RC5), EMFT(RC5)</td>
    </tr>

   	<!--------------------- RC6 --------------------->
   <tr>
      <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
      <td rowspan="5"><b>RC6</b></td>
      <td width="22%">Wednesday June 21-Friday June 23</td>
      <td width="65%">Daily 06:00 N build</td>
      <td rowspan="5"></td>
    </tr>
    <tr>
      <td width="22%">Monday June 26</td>
      <td width="65%">06:00 N build<br>20:00 I build (RC6 candidate. Ask teams for go/no go on this build)</td>
    </tr>
    <tr>
      <td width="22%">Tuesday June 27</td>
      <td width="65%">20:00 RC6 build<br>Further builds will be on a request basis only.</td>
    </tr>
    <tr>
      <td width="22%">Wednesday June 28</td>
      <td width="65%">RC6 declared.</td>
    </tr>
    <tr>
      <td colspan="2" width="22%"><b>Dependencies:</b> Platform (Release 3.2), EMF (RCx, none planned), GEF (RC5), EMFT(RC6)</td>
    </tr>

   <tr>
      <td colspan="4">&nbsp;</td>
    </tr>

  </tbody>
</table>

	</div>
</div>


EOHTML;

	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>