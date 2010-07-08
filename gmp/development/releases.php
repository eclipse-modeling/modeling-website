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
$html = <<<EOHTML

<!-- $Id: releases.php,v 1.5 2010/07/08 22:38:33 ahunter Exp $ -->	
<style type="text/css">
   h1 { font-family : Arial, Helvetica, sans-serif; font-size : 14pt; font-weight : bold; font-style : normal; }
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
<td>06/26/06</td>
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
<td>09/27/06</td>
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
<td>10/27/06</td>
<td>1.0.2</td>
<td>1.0.2</td>
<td rowspan="2">1.0.2</td>
<td rowspan="2">1.0.2</td>
<td>1.0.2</td>
<td rowspan="2">1.0.2</td>
</tr>

<tr class="callisto">
<td>02/10/07</td>
<td>1.0.3</td>
<td>1.0.3</td>
<td>3.2.2</td>
<td>3.2.2</td>
<td>2.2.2</td>
<td>1.0.3</td>
</tr>

<tr class="europa">
<td rowspan="3">Europa</td>
<td>06/27/07</td>
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
<td>09/28/07</td>
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
<td>02/29/08</td>
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
<td>06/25/08</td>
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
<td>08/15/08</td>
<td>2.1.1</td>
<td>1.1.1</td>
<td>1.1.1</td>
<td rowspan="4">1.2.1</td>
<td>1.2.1</td>
<td>1.2.1</td>
</tr>

<tr class="ganymede">
<td>09/24/09</td>
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
<td>02/25/09</td>
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
<td>06/24/09</td>
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
<td>09/25/09</td>
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
<td>02/26/10</td>
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
<td>06/23/10</td>
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
<td>09/24/10</td>
<td>1.4.1</td>
<td>3.6.1</td>
<td>3.6.1</td>
</tr>

<tr class="indigo">
<td>Indigo</td>
<td>06/2x/11</td>
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
[1] - GMF Runtime and GMF Notation were not separate projects until Helios and the GMF Restructure.<br>
[2] - GMF Notation was not a separate feature until Ganymede.<br>
[3] - MDT OCL started depending on MDT UML2 in Europa.<br>
[4] - GMF Tooling started depending on M2M QVT in Galileo.
</td>
</tr>
</table>

EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>