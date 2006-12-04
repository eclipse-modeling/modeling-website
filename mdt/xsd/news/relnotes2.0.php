<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

$xsdimg = '<div><img src="../../images/icon-xsd.gif" alt="xsd"/></div>'."\n";
?>
<div id="midcolumn">

<div class="homeitem3col">
<h3>XSD Release Notes<a name="xsd">&nbsp;</a></h3>
<ul>
<li class="release">2.0.0 Release&#160;(35 Bugs)</li>
<li class="outerli">2.0.0 Release</li><li class="outerli">2.0.0&#160;I200406250129</li><li class="outerli">2.0.0&#160;I200406211000<ul><li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67934" target="_bugz">67934</a>&#160;BasicEObjectImpl.eDerivedStructuralFeatureID(EStructuralFeature) gives bad result for open content features</li></ul></li><li class="outerli">2.0.0&#160;I200406171028<ul><li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66860" target="_bugz">66860</a>&#160;Fix EMF editors to avoid new null selection assertion in SelectionChangedEvent in RC2</li></ul></li><li class="outerli">2.0.0&#160;I200406100948 (8 Bugs)<ul><li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66327" target="_bugz">66327</a>&#160;Use equalsIgnoreCase to match the public ID of the XMLSchema.dtd</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66232" target="_bugz">66232</a>&#160;Produce unique getAliasName for anonymous union members</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66185" target="_bugz">66185</a>&#160;Avoid the use of CCombo in the generated wizards.</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66154" target="_bugz">66154</a>&#160;Support ecore:ignore for facets, XSDAnnotation, &amp;lt;documentation&amp;gt;, and &amp;lt;appinfo&amp;gt;.</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66102" target="_bugz">66102</a>&#160;Complete the support for validating according to XML Schema simple facets</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66032" target="_bugz">66032</a>&#160;Add activities to EMF and XSD</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=65703" target="_bugz">65703</a>&#160;'Save' action does'nt work in the XSD Editor</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=65672" target="_bugz">65672</a>&#160;maxLength not permitted in string</li></ul></li><li class="outerli">2.0.0&#160;I200406030436 (4 Bugs)<ul><li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=64864" target="_bugz">64864</a>&#160;overview tree stops responding</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=63916" target="_bugz">63916</a>&#160;NPE during Schema validation</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62440" target="_bugz">62440</a>&#160;THAI: XSD Editor have problem with Thai characters.</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62314" target="_bugz">62314</a>&#160;Enhancement to enable dynamic and generated EPackage usage across JVMs</li></ul></li><li class="outerli">2.0.0&#160;I200405200923 (2 Bugs)<ul><li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62440" target="_bugz">62440</a>&#160;THAI: XSD Editor have problem with Thai characters.</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62422" target="_bugz">62422</a>&#160;Support generator control over runtime compatibility and Rich Client Platform</li></ul></li><li class="outerli">2.0.0&#160;I200405131028 (2 Bugs)<ul><li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61736" target="_bugz">61736</a>&#160;Support an ecore:opposite annotation for XSDEcoreBuilder</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=58972" target="_bugz">58972</a>&#160;Provide better default substitution group/abstract element support and provide ecore:featureMap and ecore:mixed for more flexible control</li></ul></li><li class="outerli">2.0.0&#160;I200405060858 (3 Bugs)<ul><li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61111" target="_bugz">61111</a>&#160;Add the first version of a constraint validation framework</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=60438" target="_bugz">60438</a>&#160;Annotation appinfo corrupts element declaration type</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=58222" target="_bugz">58222</a>&#160;Redefinition of type does not affect indirectly included derived type</li></ul></li><li class="outerli">2.0.0&#160;I200404291310 (2 Bugs)<ul><li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=60438" target="_bugz">60438</a>&#160;Annotation appinfo corrupts element declaration type</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=58222" target="_bugz">58222</a>&#160;Redefinition of type does not affect indirectly included derived type</li></ul></li><li class="outerli">2.0.0&#160;I200404281648<ul><li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=57686" target="_bugz">57686</a>&#160;NullPointerException activating Sample XML Schema Editor from M8</li></ul></li><li class="outerli">2.0.0&#160;I200404080727 (4 Bugs)<ul><li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56912" target="_bugz">56912</a>&#160;Provide general support for feature map entries in EMF.Edit.</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56812" target="_bugz">56812</a>&#160;JS: xsd-&amp;gt;ecore converter does not process nillable properly</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56328" target="_bugz">56328</a>&#160;Ensure that includes/redefines of a cloned included/redefined schema are computed</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56269" target="_bugz">56269</a>&#160;XSDSchema.validate() does not return and leads to an OutOfMemory Exception</li></ul></li><li class="outerli">2.0.0&#160;I200403250631 (5 Bugs)<ul><li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54289" target="_bugz">54289</a>&#160;Bad performance for validating XSD with lots of &amp;lt;all&amp;gt;</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54203" target="_bugz">54203</a>&#160;Types and elements are not visible when an include is added</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54201" target="_bugz">54201</a>&#160;Change EMF templates to be able to use JETNature for build</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=53776" target="_bugz">53776</a>&#160;Cannot generate XSD for model</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=53421" target="_bugz">53421</a>&#160;Problems not removed after fixing</li></ul></li><li class="outerli">2.0.0&#160;I200403081633</li><li class="outerli">2.0.0&#160;I200402251234SL (2 Bugs)<ul><li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=50222" target="_bugz">50222</a>&#160;The getPropertyDescriptors() method of some of the XSD facet item providers was using the wrong "Value" property.</li>
<li><?php echo $xsdimg; ?><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=49692" target="_bugz">49692</a>&#160;Changed XSD2GenModel to initialize GenModel.modelName to avoid exception when viewing .genmodel file in the IDE.</li></ul></li><li class="outerli">2.0.0&#160;I200401271738SL</li><li class="outerli">2.0.0&#160;I200312190637VL</li><li class="outerli">2.0.0&#160;I200312101532XL</li>
</ul>
</div>

</div>
<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/$PR/xsd/news/relnotes-extras.php");
print "<div id=\"rightcolumn\">\n";
print sideitems();
print "</div>\n";

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
