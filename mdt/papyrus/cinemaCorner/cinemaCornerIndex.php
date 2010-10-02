																													require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'
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

		


<head>
	<title>Papyrus Slideshow</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Sebastien Gerard" />
	<link rel="stylesheet" type="text/css" href="cinemaCorner/css/slideshow.css" media="screen" />
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

<body>
	<p>
		This page consists of screenshots and screencasts on Papyrus.
	</p>

  <div id="show" class="slideshow">
    <img src="images/1.jpg" alt="Volcano Asención in Ometepe, Nicaragua." />
  </div>
  
</body>
	