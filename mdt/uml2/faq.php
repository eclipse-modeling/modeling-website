<?php
$questions = array(
	'What is UML2?' => 
	'<p>The UML2 project (an Eclipse Tools sub-project) is an EMF-based implementation of the UML&trade; 2.x metamodel for the Eclipse platform. The objectives of this project are to provide a useable implementation of the UML metamodel to support the development of modeling tools, a common XMI schema to facilitate interchange of semantic models, test cases as a means of validating the specification, and validation rules as a means of defining and enforcing levels of compliance.</p>',

	'Can I generate code from my UML (.uml) model?' =>
	'<p>The UML2 project provides an Ecore importer that can be used to create Ecore (.ecore) and generator (.genmodel) models from a UML (.uml) model via the EMF project wizard. Once you have an EMF representation of your model, you can, of course, generate code from it using EMF.</p>',

	'How will issues with the UML metamodel be escalated to the OMG?' =>
	'<p>The UML2 project lead will be submitting issues to the UML&trade; 2.x Superstructure and Infrastructure Revision Task Forces (RTFs) based on problems discovered in the UML metamodel. The current list of open RTF issues can be found <a href="http://www.omg.org/issues/uml2-rtf.open.html">here</a>.</p>',

	'Is there a way to see a graphical view of my UML (.uml) model?' =>
	'<p>The UML2 project supports neither notation nor diagram interchange at this time. The project is focused on developing a robust implementation of the abstract UML syntax. It is expected that tools developed using the API will provide support for graphical modeling and diagram interchange (concrete syntax).</p>',

	'Is there a mechanism to convert a Rose (.mdl) model to a UML (.uml) model?' =>
	'<p>There is currently no such mechanism, although it is possible to create Ecore (.ecore) and generator (.genmodel) models from a Rose (.mdl) model via the EMF project wizard and then convert those to a UML (.uml) model using the Ecore exporter that is provided (available from the \'Export Model...\' context menu item for generator models). Any information not preserved by EMF (such as stereotypes, diagrams, etc.) would, however, be lost.</p>',

	'What\'s required to load a UML (.uml) resource from a standalone application?' =>
	'<p>In order to load a UML (.uml) resource, the package (schema), resource factory, and "pathmaps" for UML need to be registered. On the Eclipse platform, this is done through the org.eclipse.emf.ecore.generated_package, org.eclipse.emf.ecore.extension_parser, and org.eclipse.emf.ecore.uri_mapping extension points (see the plug-in manifests for the org.eclipse.uml2.uml and org.eclipse.uml2.uml.resources plug-ins). When loading resources externally from Eclipse, your application needs to perform these registrations programmatically as follows (given a variable \'resourceSet\' that points to an instance of ResourceSetImpl):<p>
	<pre>
resourceSet.getPackageRegistry().put(UMLPackage.eNS_URI, UMLPackage.eINSTANCE);

resourceSet.getResourceFactoryRegistry().getExtensionToFactoryMap().put(UMLResource.FILE_EXTENSION, UMLResource.Factory.INSTANCE);
Map uriMap = resourceSet.getURIConverter().getURIMap();
URI uri = URI.create("jar:file:/C:/eclipse/plugins/org.eclipse.uml2.uml.resources_2.0.0.v200606221411.jar!/");
uriMap.put(URI.createURI(UMLResource.LIBRARIES_PATHMAP), uri.appendSegment("libraries").appendSegment(""));
uriMap.put(URI.createURI(UMLResource.METAMODELS_PATHMAP), uri.appendSegment("metamodels").appendSegment(""));
uriMap.put(URI.createURI(UMLResource.PROFILES_PATHMAP), uri.appendSegment("profiles").appendSegment(""));</pre>'
);
?>
