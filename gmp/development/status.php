<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>@import url("status.css");</style>
<script type="text/javascript">

	var returnval = 0;
	var stylesheet, xmlDoc, xmlFile, cache, doc;
	
	function init() {	
		returnval = 0;
		if (typeof window.ActiveXObject != 'undefined' ) {
          xmlDoc = new ActiveXObject("Microsoft.XMLHTTP");
          xmlDoc.onreadystatechange = process ;
        }
        else {
          xmlDoc = new XMLHttpRequest();
          xmlDoc.onload = process ;
        }
        xmlDoc.open( "GET", "http://www.eclipse.org/gmf/development/statusquery.php?product=" + document.project_form.product.options[document.project_form.product.selectedIndex].value + "&target=" + document.project_form.target.options[document.project_form.target.selectedIndex].value, true );
        xmlDoc.send( null );
	}
  
    function process() {
        if ( xmlDoc.readyState != 4 ) return ;
        // NSCP 7.1+ / Mozilla 1.4.1+ / Safari
		// Use the standard DOM Level 2 technique, if it is supported
		if (document.implementation && document.implementation.createDocument) {
			xmlFile = new DOMParser().parseFromString(xmlDoc.responseText, "application/xml");
			stylesheet = document.implementation.createDocument("", "", null);
			if (stylesheet.load){
				stylesheet.load("status.xsl");
			} else {
				alert("Document could not be loaded by browser.");
			}
			xmlFile.addEventListener("load", transform, false);
			stylesheet.addEventListener("load", transform, false);
			transform();
		}
		//IE 6.0+ solution
		else if (window.ActiveXObject) {
			xmlFile = new ActiveXObject("msxml2.DOMDocument.3.0");
			xmlFile.async = false;
			xmlFile.loadXML(xmlDoc.responseText);
			stylesheet = new ActiveXObject("msxml2.FreeThreadedDOMDocument.3.0");
			stylesheet.async = false;
			stylesheet.load("status.xsl");
			cache = new ActiveXObject("msxml2.XSLTemplate.3.0");
			cache.stylesheet = stylesheet;
			transformData();
		}
      }
      
      // separate transformation function for IE 6.0+
	function transformData(){
		var processor = cache.createProcessor();
		processor.input = xmlFile;
		processor.transform();
		data.innerHTML = processor.output;
	}
	// separate transformation function for NSCP 7.1+ and Mozilla 1.4.1+ 
	function transform(){
		returnval+=1;
		if (returnval==2){
			var processor = new XSLTProcessor();
			processor.importStylesheet(stylesheet); 
			doc = processor.transformToDocument(xmlFile);
			document.getElementById("data").innerHTML = doc.documentElement.innerHTML;
		}
	}
	
	 function setOptions(chosen) {
	 
	 // TODO: load from database 
	 
		var selbox = document.project_form.target;
		 
		selbox.options.length = 0;
		if (chosen == "GMF") {
		  selbox.options[selbox.options.length] = new Option('---','---');
		  selbox.options[selbox.options.length] = new Option('1.0.1','1.0.1');
		  selbox.options[selbox.options.length] = new Option('1.0.2','1.0.2');
		  selbox.options[selbox.options.length] = new Option('1.0.3','1.0.3');
		  selbox.options[selbox.options.length] = new Option('2.0 M1','2.0 M1');
		  selbox.options[selbox.options.length] = new Option('2.0 M2','2.0 M2');
		  selbox.options[selbox.options.length] = new Option('2.0 M3','2.0 M3');
		  selbox.options[selbox.options.length] = new Option('2.0 M4','2.0 M4');
		  selbox.options[selbox.options.length] = new Option('2.0 M5','2.0 M5');
		}
		if (chosen == "MDT") {
		  selbox.options[selbox.options.length] = new Option('---','---');
		  selbox.options[selbox.options.length] = new Option('1.0.0','1.0.0');
		}
}
	
	
</script>
</head>

<body onload="setOptions('GMF');">

<div>
		<form name="project_form" id="project_form">
		<p>
			<label for="proj">Project: </label>
			<select id="product" name="product" onchange="setOptions(document.project_form.product.options[document.project_form.product.selectedIndex].value);">
				<option selected="selected" value="GMF">GMF</option>
				<option value="MDT">MDT</option>
			</select>
			<label for="proj">Milestone: </label>
			<select id="target" name="target" onchange="">
				
			</select>
			<input type="button" value="Submit" onClick="init()"/>
		</p>
		</form></div>
		
<div id="data"><!-- this is where the transformed data goes --></div>
</body>
</html>
