<?php                                                                                                               
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/app.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/nav.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/menu.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/projects/common/project-info.class.php");
$App = new App(); $Nav = new Nav(); $Menu = new Menu(); 
$projectInfo = new ProjectInfo("modeling.gmp");
$projectInfo->generate_common_nav( $Nav );
include ($App->getProjectCommon()); 
# Begin: page-specific settings.  Change these. 
$pageTitle 		= "Eclipse Graphical Modeling Project (GMP) Releases";
$pageKeywords	= "developer,resources,modeling,graphical";
$pageAuthor		= "Anthony Hunter";
	
# Paste your HTML content between the EOHTML markers!
# $Id: releases.php,v 1.4 2010/07/08 22:30:52 ahunter Exp $	
$html = <<<EOHTML

<style type="text/css">
   h1 { font-family : Arial, Helvetica, sans-serif; font-size : 14pt; font-weight : bold; font-style : normal; }
   h2 { font-family : Arial, Helvetica, sans-serif; font-size : 12pt; font-weight : bold; font-style : normal; }
   h3 { font-family : Arial, Helvetica, sans-serif; font-size : 10pt; font-weight : bold; font-style : normal; }
   table { text-align:left; padding: 3px; border: 1px solid black; }
   tr.white { background-color: white; border: 1px solid black; }
   tr.top { background-color: #CCFFFF; border: 1px solid black; }
   tr.callisto { background-color: #FFCCFF; border: 1px solid black; }
   tr.europa { background-color: #FFFFCC; border: 1px solid black; }
   tr.ganymede { background-color: #CCFFCC; border: 1px solid black; }
   tr.galileo { background-color: #FFCCCC; border: 1px solid black; }
   tr.helios { background-color: #CCFFFF; border: 1px solid black; }
   tr.indigo { background-color: #CCCCFF; border: 1px solid black; }
   td { font-family : Arial, Helvetica, sans-serif; padding: 3px; font-size : 10pt; text-align: left; vertical-align: top; border: 1px solid black;}
   p { font-family : Arial, Helvetica, sans-serif; font-size : 10pt;}
   p.footer { font-family : Arial, Helvetica, sans-serif; font-size : 8pt; }
   pre  { font-family : Courier, sans-serif; font-size : 10pt; color : #44cc44;}
</style>

<h1>Eclipse Graphical Modeling Project (GMP) Versions</h1>
<table border="1">
<tr class="top">
<td><b>Eclipse<br>Simultanious<br>Release</b></td>
<td><b>Release<br>Date</b></td>
<td><b>GMF<br>Tooling<br>(GMF SDK)</b></td>
<td><b>GMF<br>Runtime<br></b>[1]</td>
<td><b>GMF<br>Notation<br></b>[1]</td>
<td><b>Eclipse<br>Platform</b></td>
<td><b>GEF</b></td>
<td><b>EMF<br>Core</b></td>
<td><b>EMF<br>Query</b></td>
<td><b>EMF<br>Validation</b></td>
<td><b>EMF<br>Transaction</b></td>
<td><b>MDT<br>OCL</b></td>
<td><b>MDT<br>UML2</b></td>
<td><b>QVT<br>OML</b></td>
</tr>

<tr class="callisto">
<td rowspan="4">Callisto</td>
<td>June 26, 2006</td>
<td>1.0.0</td>
<td>1.0.0</td>
<td rowspan="4">[2]</td>
<td>3.2.0</td>
<td>3.2.0</td>
<td>2.2.0</td>
<td>1.0.0</td>
<td>1.0.0</td>
<td>1.0.0</td>
<td>1.0.0</td>
<td rowspan="4">[3]</td>
<td rowspan="4">[4]</td>
</tr>

<tr class="callisto">
<td>September 27, 2006</td>
<td>1.0.1</td>
<td>1.0.1</td>
<td rowspan="2">3.2.1</td>
<td rowspan="2">3.2.1</td>
<td rowspan="2">2.2.1</td>
<td>1.0.1</td>
<td>1.0.1</td>
<td>1.0.1</td>
<td>1.0.1</td>
</tr>

<tr class="callisto">
<td>October 27, 2006</td>
<td>1.0.2</td>
<td>1.0.2</td>
<td rowspan="2">1.0.2</td>
<td rowspan="2">1.0.2</td>
<td>1.0.2</td>
<td rowspan="2">1.0.2</td>
</tr>

<tr class="callisto">
<td>February 10, 2007</td>
<td>1.0.3</td>
<td>1.0.3</td>
<td>3.2.2</td>
<td>3.2.2</td>
<td>2.2.2</td>
<td>1.0.3</td>
</tr>

<tr class="europa">
<td rowspan="3">Europa</td>
<td>June 27, 2007</td>
<td>2.0.0</td>
<td>1.0.100</td>
<td rowspan="3">[2]</td>
<td>3.3.0</td>
<td>3.3.0</td>
<td>2.3.0</td>
<td>1.1.0</td>
<td>1.1.0</td>
<td>1.1.0</td>
<td>1.1.0</td>
<td>2.1.0</td>
<td rowspan="3">[4]</td>
</tr>

<tr class="europa">
<td>September 28, 2007</td>
<td>2.0.1</td>
<td>1.0.101</td>
<td>3.3.1</td>
<td>3.3.1</td>
<td>2.3.1</td>
<td rowspan="2">1.1.1</td>
<td rowspan="2">1.1.1</td>
<td>1.1.1</td>
<td>1.1.1</td>
<td rowspan="2">2.1.1</td>
</tr>

<tr class="europa">
<td>February 29, 2008</td>
<td>2.0.2</td>
<td>1.0.102</td>
<td>3.3.2</td>
<td>3.3.0</td>
<td>2.3.0</td>
<td>1.1.2</td>
<td>1.1.2</td>
</tr>

<tr class="ganymede">
<td rowspan="5">Ganymede</td>
<td>June 25, 2008</td>
<td>2.1.0</td>
<td>1.1.0</td>
<td>1.1.0</td>
<td rowspan="2">3.4.0</td>
<td rowspan="2">3.4.0</td>
<td rowspan="2">2.4.0</td>
<td rowspan="5">1.2.0</td>
<td>1.2.0</td>
<td>1.2.0</td>
<td>1.2.0</td>
<td rowspan="2">2.2.0</td>
<td rowspan="5">[4]</td>
</tr>

<tr class="ganymede">
<td>August 15, 2008</td>
<td>2.1.1</td>
<td>1.1.1</td>
<td>1.1.1</td>
<td rowspan="4">1.2.1</td>
<td>1.2.1</td>
<td>1.2.1</td>
</tr>

<tr class="ganymede">
<td>September 24, 2009</td>
<td>2.1.2</td>
<td>1.1.2</td>
<td rowspan="3">1.1.2</td>
<td>3.4.1</td>
<td>3.4.1</td>
<td>2.4.2</td>
<td>1.2.2</td>
<td>1.2.2</td>
<td>2.2.1</td>
</tr>

<tr class="ganymede">
<td>February 25, 2009</td>
<td rowspan="2">2.1.3</td>
<td>1.1.3</td>
<td rowspan="2">3.4.2</td>
<td rowspan="2">3.4.2</td>
<td rowspan="2">2.4.3</td>
<td rowspan="2">1.2.3</td>
<td rowspan="2">1.2.3</td>
<td rowspan="2">2.2.3</td>
</tr>

<tr class="ganymede">
<td>patch</td>
<td>1.1.4</td>
</tr>

<tr class="galileo">
<td rowspan="4">Galileo</td>
<td>June 24, 2009</td>
<td>2.2.0</td>
<td>1.2.0</td>
<td>1.2.0</td>
<td>3.5.0</td>
<td>3.5.0</td>
<td rowspan="4">2.5.0</td>
<td rowspan="4">1.3.0</td>
<td>1.3.0</td>
<td>1.3.0</td>
<td rowspan="4">1.3.0</td>
<td>3.0.0</td>
<td rowspan="2">2.0.0</td>
</tr>

<tr class="galileo">
<td>September 25, 2009</td>
<td>2.2.1</td>
<td>1.2.1</td>
<td>1.2.1</td>
<td>3.5.1</td>
<td>3.5.1</td>
<td rowspan="3">1.3.1</td>
<td rowspan="3">1.3.1</td>
<td rowspan="3">3.0.1</td>
</tr>

<tr class="galileo">
<td>February 26, 2010</td>
<td rowspan="2">2.2.2</td>
<td>1.3.0</td>
<td rowspan="2">1.3.0</td>
<td rowspan="2">3.5.2</td>
<td rowspan="2">3.5.2</td>
<td rowspan="2">2.0.1</td>
</tr>

<tr class="galileo">
<td>patch</td>
<td>1.3.3</td>
</tr>

<tr class="helios">
<td rowspan="2">Helios</td>
<td>June 23, 2010</td>
<td rowspan="2">2.3.0</td>
<td>1.4.0</td>
<td rowspan="2">1.4.0</td>
<td>3.6.0</td>
<td>3.6.0</td>
<td rowspan="2">2.6.0</td>
<td rowspan="2">1.4.0</td>
<td rowspan="2">1.4.0</td>
<td rowspan="2">1.4.0</td>
<td rowspan="2">3.0.0</td>
<td rowspan="2">3.1.0</td>
<td rowspan="2">3.0.0</td>
</tr>

<tr class="helios">
<td>September 24, 2010</td>
<td>1.4.1</td>
<td>3.6.1</td>
<td>3.6.1</td>
</tr>

<tr class="indigo">
<td>Indigo</td>
<td>June 2x, 2011</td>
<td></td>
<td></td>
<td></td>
<td>3.7.0</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr class="white">
<td colspan="14">
<p>[1] - GMF Runtime and GMF Notation were not separate projects until Helios and the GMF Restructure.</p>
<p>[2] - GMF Notation was not a separate feature until Ganymede.</p>
<p>[3] - MDT OCL started depending on MDT UML2 in Europa.</p>
<p>[4] - GMF Tooling started depending on M2M QVT in Galileo.</p>
</td>
</tr>
</table>

EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>