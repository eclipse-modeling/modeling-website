<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'
/*******************************************************************************
 * Copyright (c) 2009 Eclipse Foundation and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 * Sébastien Gérard, CEA LIST
 *    
 *******************************************************************************/

	#
	# Begin: page-specific settings.
	$pageTitle 		= "Papyrus Cinema Corner";
	$pageKeywords	= "papyrus, users, documents, tutorials, examples";
	$pageAuthor		= "Sebastien Gerard";
		
	# Paste your HTML content between the EOHTML markers!	
	ob_start();
	?>
	<div id="midcolumn">
		<h1>Papyrus Cinema Corner</h1>
		
		<p>
			This page consists of screenshots and screencasts on Papyrus.
		</p>
<p>
<head>
	<title>Papyrus Slideshow</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Sebastien Gerard" />
	<link rel="stylesheet" type="text/css" href="css/slideshow.css" media="screen" />
	<script type="text/javascript" src="js/mootools.js"></script>
	<script type="text/javascript" src="js/slideshow.js"></script>
	<script type="text/javascript">		
	//<![CDATA[
	  window.addEvent('domready', function(){
	    var data = {
	      '1.jpg': { caption: 'Volcano Asención in Ometepe, Nicaragua.' }, 
	      '2.jpg': { caption: 'A Ceibu tree.' }, 
	      '3.jpg': { caption: 'The view from Volcano Maderas.' }, 
	      '4.jpg': { caption: 'Beer and ice cream.' }
	    };
	    var myShow = new Slideshow('show', data, {controller: true, height: 300, hu: 'images/', thumbnails: true, width: 400});
	  });
	//]]>
	</script>
</head>

<!-- 
<div style="clear:both;"></div>
 -->
 
<body>
  <div id="show" class="slideshow">
    <img src="images/1.jpg" alt="Volcano Asención in Ometepe, Nicaragua." />
  </div>
  
  <div id="contact1">
  .
  </div>
  
  <div id="contact2">
  .
  </div>
  <div id="contact3">
  .
  </div>
  <div id="contact4">
  .
  </div>
  <div id="contact5">
  .
  </div>
  <div id="contact6">
  .
  </div>
  
  <div id="contact">  
    End of show...
  </div>
</body>
</p>

<!-- 
<div id="screencast">
<object width="640" height="480">
<param name="allowfullscreen" value="true" />
<param name="allowscriptaccess" value="always" />
<param name="movie" value="videos/video1/PapyrusMDT.swf" />
<embed src="videos/video1/PapyrusMDT.swf" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="640" height="480"></embed>
</object>
</div>
-->
		
		<!--
		<h3>&lt;h3&gt; tag</h3>
		<div class="homeitem">
			<ul>
				<li>This is an unordered list</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
				<li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</li>
 				<li>Curabitur vel lorem in turpis adipiscing dictum. Nunc mi est, scelerisque vitae, venenatis et, euismod et, sem. Praesent aliquet mi vel felis. Pellentesque pellentesque convallis ante. Praesent imperdiet velit vitae justo. Nullam quis purus. Aenean neque enim, consequat non, mattis eu, gravida sed, massa.</li>
			</ul>
			<ol> 
				<li>This is an ordered list</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
				<li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</li>
 				<li>Curabitur vel lorem in turpis adipiscing dictum. Nunc mi est, scelerisque vitae, venenatis et, euismod et, sem. Praesent aliquet mi vel felis. Pellentesque pellentesque convallis ante. Praesent imperdiet velit vitae justo. Nullam quis purus. Aenean neque enim, consequat non, mattis eu, gravida sed, massa.</li>
			</ol>				
		</div>
		
		<h2>&lt;h2&gt; tag</h2>
		<table>
			<tr>
				<td>Tables look </td>
				<td>like this</td>
			</tr>
			<tr>
				<td>Data</td>
				<td>Data</td>
			</tr>
			<tr>
				<td>Data</td>
				<td>Data</td>
			</tr>
		</table>
		-->
		
	</div>

<!-- remove the entire <div> tag to omit the right column!
	<div id="rightcolumn">
		<div class="sideitem">
			<h6>Related Links</h6>
			<ul>
				<li>For developpers, let's see at the <a href="http://wiki.eclipse.org/MDT/Papyrus">Papyrus wiki</a></li>
				<li>For any questions, let's go to the <a href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.papyrus">Papyrus forum</a></li>
			</ul>
		</div>
		
		<div class="sideitem">
			<h6>&lt;h6&gt; tag</h6>
				<div class="modal">
					Wrapping your content using a div.modal tag here will add the gradient background
				</div>
		</div>
		
	</div>
-->

	
x<?
	$html = ob_get_clean();

	# Generate the web page
	$App->generatePage('Nova', $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>