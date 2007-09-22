<?php
require_once ("../../../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();
?>
<div id="midcolumn">
<h1>Release Notes</h1>
<div class="homeitem3col">

<h3>What's new in XSD 1.1.1?<a name="xsd">&nbsp;</a></h3>

      <ol>        
        <li>
	<b><a name="xsd_111a">Build 20030819_0612SL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are numerous bug fixes and improvements included with this build, the most significant of which is described below.
          <ul>
            <li>                
            The org.eclipse.emf.common.util.URI.java class has been updated to handle resolution of JAR-scheme URIs.  Also, comparison of schemes has been made case-insensitive in all URI operations, including testing equality.
            </li>
          </ul>
         </p>

		<li>
	<b><a name="xsd_111b">Build 20030909_1427WL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below.
          Where the description is for a bug reported through Bugzilla, the Bugzilla number is included after the description.
          <ul>
            <li>
            0 and 1 are now accepted as valid boolean XML Schema literals.
            (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=41898">41898</a>)
            </li>

            <li>
            The MagicXMLSchema.xsd, XMLSchema.xsd files in the 1999 and <nobr>2000\10 </nobr>sub-directories of the
            <nobr>plugins\org.eclipse.xsd_1.1.1\cache\www.w3.org </nobr>directory have been updated to fix a problem
            with old namespace schemas; xml.xsd files, with corresponding old namespace names, have been
            added to those directories as well.  
            (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=41913">41913</a>) 
            </li>

            <li>
            The handleAnalysis() method in the org.eclipse.xsd.impl.XSDComplexTypeDefinitionImpl.java class
            has been updated to handle an empty complex extension of a simple complex type.  For example, it
            can now handle the following schema:

<pre>
&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;xsd:schema xmlns:xsd="http://www.w3.org/2001/XMLSchema"&gt;
    &lt;xsd:complexType name="ServiceCategory"&gt;
        &lt;xsd:simpleContent&gt;
            &lt;xsd:extension base="xsd:boolean"/&gt;
        &lt;/xsd:simpleContent&gt;
    &lt;/xsd:complexType&gt;
    &lt;xsd:element name="DialARide"&gt;
        &lt;xsd:complexType&gt;
            &lt;xsd:complexContent&gt;
                &lt;xsd:extension base="ServiceCategory"/&gt;
            &lt;/xsd:complexContent&gt;
        &lt;/xsd:complexType&gt;
    &lt;/xsd:element&gt;
&lt;/xsd:schema&gt;
</pre>

            </li>

            <li>
            The version numbers for the plugins in the feature.xml files have been updated to 1.1.1.
            Additionally, in the feature.xml file for the org.eclipse.xsd feature, the following updates
            have been made in the requires element:

            <ul>
              <li>
              in the import element for the org.eclipse.core.resources plugin, the version has been changed to 2.1.1
              </li>
              <li>
              in the import element for the org.apaches.xerces plugin, the version has been changed to 4.0.13
              </li>
              <li>
              in the import element for the org.eclipse.emf.ecore plugin, the version has been changed to 1.1.1
              </li>
            </ul>

            <li>
            The duplicate value feature has been fixed in the org.eclipse.xsd.ecore.XSD2EcoreBuilder.java class.
            For example, for a schema like this:

<pre>
&lt;?xml version = "1.0" encoding = "UTF-8"?&gt;
&lt;xsd:schema xmlns:xsd = "http://www.w3.org/2001/XMLSchema"&gt;

        &lt;xsd:complexType name = "ServiceCategory"&gt;
                &lt;xsd:simpleContent&gt;
                        &lt;xsd:extension base = "xsd:boolean"/&gt;
                &lt;/xsd:simpleContent&gt;
        &lt;/xsd:complexType&gt;

        &lt;xsd:element name = "DialARide"&gt;
                &lt;xsd:complexType&gt;
                        &lt;xsd:complexContent&gt;
                                &lt;xsd:extension base = "ServiceCategory"/&gt;
                        &lt;/xsd:complexContent&gt;
                &lt;/xsd:complexType&gt;
        &lt;/xsd:element&gt;

&lt;/xsd:schema&gt;
</pre>

            The EClass for DialARide previously had a second boolean feature named value1 that is now eliminated.
            </li>
          </ul>
         </p>

        <li>
	<b><a name="xsd_111c">Build 20031020_1612WL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below.
          Where the description is for a bug reported through Bugzilla, the Bugzilla number is included after the description.
          <ul>
            <li>
            The import of a null namespace no longer generates a warning.
            (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=43171">43171</a>)
            </li>
          </ul>

        <li>
	<b><a name="xsd_111d">Build 20031120_1149WL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below.
          Where the description is for a bug reported through Bugzilla, the Bugzilla number is included after the description.
          <ul>
            <li>
            Support configurable handling of schemaLocation resolution via org.eclipse.xsd.util.XSDSchemaLocationResolver
            (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=46188">46188</a>)
            </li>
          </ul>

      </ol>
</div>

<div class="homeitem3col">

<h3>What's new in XSD 1.1.0?</h3>

      <ol>

        <li>
	<b><a name="xsd_110a">Build 20030501_0612VL: Bug Fixes and Improvements</a></b>

         <ol type="I">
			<li><b><a name="xsd_110a_1">New Plugins</a></b>
          <p>
           The xsd2ecore plugins (org.eclipse.emf.mapping.xsd2ecore and org.eclipse.emf.mapping.xsd2ecore.editor) have been added.  They illustrate how to use the mapping framework, and the editor can be used to view the mapping produced during XSD to Ecore conversion.  Documentation will be forthcoming soon.
           
        </li>

			
			<li><b><a name="xsd_110a_2">Bugzilla Fixes</a></b>

          There are numerous bug fixes and improvements included with this build, some of which are described below.  Where the description applies to a fix for a bug reported through Bugzilla, the Bugzilla number is included after the description.        
          <ul>
            <li>                
             XSD_ENCODING is now supported as an option for specifying the encoding for XSD resources.
            </li>
            <li>
             The visibility of the isTypeDerivedFrom method in the XSDSchemaQueryTools class has been changed from protected to public.  
             (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=36062">36062</a>)
            </li>
            <li>
             The XSD to Ecore conversion utilities have been moved to org.eclipse.xsd.ecore in the org.eclipse.xsd plugin for more flexible reuse.
            </li>
          </ul>

			 </ol>


        <li>
	<b><a name="xsd_110b">Build 20030513_0618VL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below.  
          <ul>
            <li>                
             In order to have value objects that implement equals() correctly, values of simple types based on int[] and byte[] in Xerces need to be wrapped.  Therefore, the types:
              <ul>	
               <li>
                 org.eclipse.xsd.types.XSDAnySimpleType.IntSequence and
               </li>
               <li>
                 org.eclipse.xsd.types.XSDAnySimpleType.ByteSequence 
               </li>
              </ul>
              will be used in place of int[] and byte[], respectively.  (Later versions of Xerces have their own wrapper type which we will use when we switch to a newer version.)
            </li>
            <li>
            We have refreshed the cached version of XMLSchema.xsd to the latest version on the web in order to pick up the errata changes to that version.
            </li>            
          </ul>
           
        <li>
	<b><a name="xsd_110c">Build 20030519_0521VL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below. Where the description applies to a fix for a bug reported through Bugzilla, the Bugzilla number is included after the description. You can link directly to the Bugzilla bug using this number.  
          <ul>
            <li>
             The XSD editor now detects the encoding of your XSD file and sets the encoding of the editor to match. (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=37630">37630</a>).
            <li>
             The getBadTypeDerivation() method in XSDComplexTypeDefinitionImpl.java  now handles a null base type.
            </li>
            <li>
             XSD now populates the XSDFacet.annotation. (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=37673">37673</a>).
            </li>
            <li>
             XSDParser has been upgraded to support a LexicalHandler for creating Comment nodes.
            </li>
            <li>
             XSDMainTest has been upgraded to support -validate for validating a schema from the command line.
            </li>                        
          </ul>
          

        <li>
	<b><a name="xsd_110d">Build 20030527_0913VL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          Minor bug fixes and improvements.  
          
          

        <li>
	<b><a name="xsd_110e">Build 20030602_1759VL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          This build is a refresh of XSD being delivered with the corresponding build of EMF.  
          
          

        <li>
	<b><a name="xsd_110f">Build 20030605_1020SL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          This build is a refresh of XSD being delivered with the corresponding build of EMF.  
          
          

        <li>
	<b><a name="xsd_110g">Build 20030611_1435VL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below. Where the description applies to a fix for a bug reported through Bugzilla, the Bugzilla number is included after the description. You can link directly to the Bugzilla bug using this number.  
          <ul>
            <li>
             The following static methods in the org.eclipse.xsd.impl.XSDSchemaImpl.java class have been made synchronized:  
             <ul>
              <li>createMetaSchema(Node node)</li>
              <li>getGlobalResourceSet()</li>
              <li>getMagicSchemaForSchema(String namespace)</li>
              <li>getSchemaForSchema(String namespace)</li>
              <li>getSchemaInstance(String namespace)</li>
             </ul>
            </li>

            <li>
             Complex type serialization now avoids the potential for introducing a redundant QName prefix.
            </li>

            <li>
             The xsd2ecore mapping has been changed to map an XSD ID-type attribute as an ID EAttribute. 
            </li>

            <li>
             The xsd2ecore mapping has been updated to handle abstract elements and substitution groups.
            </li>

            <li>
             XSD has been updated to recognize schema constraints referenced via include. 
             (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38779">38779</a>)
            </li>

            <li>
             The xsd2ecore editor has been updated to use translated strings for the name and description. 
             (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38174">38174</a>)
            </li>                       
          </ul>
          

        <li>
	<b><a name="xsd_110h">Build 20030616_1530VL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below. Where the description applies to a fix for a bug reported through Bugzilla, the Bugzilla number is included after the description. You can link directly to the Bugzilla bug using this number.  
          <ul>
            <li>
            The getEClassifier(XSDTypeDefinition xsdTypeDefinition, boolean supportNull) method in the org.eclipse.xsd.ecore.XSDEcoreBuilder.java class has been updated to ensure that an XSD abstract complex type becomes an abstract EClass.
            </li>

            <li>
            The doSave(OutputStream os, Map options) method in the org.eclipse.xsd.util.XSDResourceImpl.java class has been updated so that if the schema element is null, the updateElement() method is called on the schema.
            </li>

            <li>
            &lt;package prefix=...&gt; elements have been addded to the plugin.xml files for all the EMF and XSD plugins.
            (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38225">38225</a>)
            </li>

            <li>
            The getBadTypeDerivation(XSDTypeDefinition xsdTypeDefinition, boolean extension, boolean restriction) method in the org.eclipse.xsd.impl.XSDSimpleTypeDefintionImpl.java class has been updated because a simple type needs to be considered to be derived from complex anyType.
            </li>

            <li>
            The javadoc in the org.eclipse.xsd.XSDComplexTypeDefinition.java file has been updated for the XSDParticle getSyntheticParticle() method.
            </li>
    
          </ul>
          

        <li>
	<b><a name="xsd_110i">Build 20030620_1105VL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below.
          <ul>
            <li>
            National Language Support is now available for standalone clients.
            </li>

          </ul>
          

      </ol>

</div>

<div class="homeitem3col">

<h3>What's new in XSD 1.0.2?</h3>

      <ol>
        <li>
          <b>Bug Fixes...</b>
          
        </li>
        <li>
          <b>Validation Support</b>
          <p>
            A schema can be validated to determine whether it is a fully valid instance according to the 1.0 specification;
            since this had been working for several months, it isn't really all that new.
          
        </li>
      </ol>

</div>

<div class="homeitem3col">

<h3>What's new in XSD 1.0.1?</h3>

      <ol>
        <li>
         <b>Bug Fixes...</b>
          
        </li>
        <li>
          <b>Documentation Plugin</b>
          <p>
            There is now a documentation plugin, org.eclipse.xsd.doc,
            included in the download. All the XSD documentation is now
            available from the desktop Help menu. We've put the documentation
            plugin into the Runtime zip file, so its download size has increased.
            We're thinking about moving it into the Source zip,
            or maybe into its own zip file, in the future. If you have an
            opinion, please feel free to post it to the XSD newsgroup. 
          
        </li>
      </ol>
</div>

</div>
<?php

print "<div id=\"rightcolumn\">\n";
print <<<XML
	<div class="sideitem">
	<h6>Search CVS</h6>
XML;
print '	<form action="http://www.eclipse.org/' . (isset($PR) ? $PR : "modeling") . '/searchcvs.php" method="get" name="bugform" target="_blank">' . "\n";
print '
	<p>
		<label for="bug">Bug ID: </label><input size="7" type="text" name="q" id="q"/>
		<input type="submit" value="Go!"/>
	</p>
	</form>
	</div>
	<div class="sideitem">
		<h6>Releases</h6>
		<p>
			<ul>
				<li><a href="http://www.eclipse.org/' . $PR . '/news/relnotes.php?project=xsd&amp;version=HEAD">Latest</a></li>
				<li><a href="http://www.eclipse.org/' . $PR . '/xsd/news/relnotes2.0.php">2.0.0</a></li>
				<li><a href="http://www.eclipse.org/' . $PR . '/xsd/news/relnotes1.x.php">1.x</a></li>
			</ul>
		</p>
	</div>
</div>
';
	
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - XSD - Release Notes";
$pageKeywords = "";
$pageAuthor = "";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n");
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/relnotes.css"/>' . "\n");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/toggle.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
