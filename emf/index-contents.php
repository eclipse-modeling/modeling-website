<?php 

$content["emf"] = <<<HTML
<div class="homeitem3col">
	<h3>Eclipse Modeling Framework (EMF)</h3>
	<p>EMF is a modeling framework and code generation facility for building
	tools and other applications based on a structured data model. From a model
	specification described in XMI, EMF provides tools and runtime support
	to produce a set of Java classes for the model, a
	set of adapter classes that enable viewing and command-based editing of
	the model, and a basic editor. Models can be specified using
	annotated Java, XML documents, or modeling tools like Rational Rose, then
	imported into EMF. Most important of all, EMF provides the foundation for
	interoperability with other EMF-based tools and applications. For more detailed 
	information see the <a href="http://www.eclipse.org/$PR/docs.php#overviews">EMF Overviews</a> and <a href="http://www.eclipse.org/$PR/docs.php#plandocs">Project Plan</a>.</p>

	<p>EMF builds include <a href="http://www.eclipse.org/modeling/mdt/?project=xsd#xsd">XML Schema Infoset Model</a> (XSD), now a component of the <a href="http://www.eclipse.org/modeling/mdt/?project=xsd">Model Development Tools</a> (MDT) project, and an EMF-based implementation of <a href="http://www.eclipse.org/$PR/?project=sdo">Service Data Objects</a> (SDO).</p>
</div>

HTML;

$content["emf2"] = <<<HTML
<div class="homeitem3col">
	<h3>What is EMF?</h3>
	<p>EMF consists of three fundamental pieces:</p>

	<ul>
		<li><b>EMF</b> - The core EMF framework includes a <a href="http://download.eclipse.org/tools/emf/javadoc?org/eclipse/emf/ecore/package-summary.html#details">meta
		model (Ecore)</a> for describing models and runtime support for the
		models including change notification, persistence support with
		default XMI serialization, and a very efficient reflective API for
		manipulating EMF objects generically.</li>

		<li class="outerli"><b>EMF.Edit -</b> The EMF.Edit framework includes generic
		reusable classes for building editors for EMF models. It
		provides
			<ul>
				<li>Content and label provider classes, property source support,
				and other convenience classes that allow EMF models to be displayed
				using standard desktop (JFace) viewers and property sheets.</li>

				<li>A command framework, including a set of generic command
				implementation classes for building editors that support fully
				automatic undo and redo.</li>
			</ul>
		</li>

		<li><b>EMF.Codegen</b> - The EMF code generation facility is
		capable of generating everything needed to build a complete editor
		for an EMF model. It includes a GUI from which generation options
		can be specified, and generators can be invoked. The generation
		facility leverages the JDT (Java Development Tooling) component of
		Eclipse.</li>
	</ul>

	<p>Three levels of code generation are supported:</p>

	<ul>
		<li><b>Model</b> - provides Java interfaces and implementation
		classes for all the classes in the model, plus a factory and
		package (meta data) implementation class.</li>

		<li><b>Adapters</b> - generates implementation classes (called
		ItemProviders) that adapt the model classes for editing and
		display.</li>

		<li><b>Editor</b> - produces a properly structured editor that
		conforms to the recommended style for Eclipse EMF model editors and
		serves as a starting point from which to start customizing.</li>
	</ul>

	<p>All generators support regeneration of code while preserving user
	modifications. The generators can be invoked either through the GUI
	or headless from a command line.</p>

	<p>Want to learn more about how easy it is to use this exciting new
	technology to help you boost your Java programming productivity,
	application compatibility and integration? Start by reading the <a
	href="http://www.eclipse.org/$PR/docs/">overview documents and the tutorial</a>,
	followed by <a href="http://www.eclipse.org/$PR/downloads/">downloading the driver</a>,
	and then sit back and watch your applications write themselves!
	Well, not completely, but this wouldn't be a sales pitch if there
	weren't a little bit of exaggeration.</p>
</div>
HTML;

$content["sdo"] = <<<HTML
<div class="homeitem3col">
	<h3>Service Data Objects (SDO)</h3>
	<p>Service Data Objects (SDO) is a framework that simplifies and unifies data application development in a service oriented architecture (SOA). It supports and integrates XML and incorporates J2EE patterns and best practices. EMF includes an EMF-based implementation of Service Data Objects.</p>
</div>
HTML;

$content["sdo2"] = <<<HTML
<div class="homeitem3col">
	<h3>What is SDO?</h3>
	<p>Unlike some of the other data integration models, Service Data Objects don't stop at data abstraction. The Service Data Objects framework also incorporates a good number of J2EE patterns and best practices. SDO supports a disconnected programming model. The SDO programming model prescribes patterns of usage that allow clean separation of each of these concerns.</p>
	<p>Put simply, Service Data Objects is a framework for data application development, which includes an architecture and API. Service Data Objects simplify the J2EE data programming model and abstract data in a service oriented architecture (SOA). SDO unifies data application development, supports, and integrates XML. Service Data Objects incorporate J2EE patterns and best practices.</p>
	<p>Also see:</p>
	<ul class="sdo">
		<li><a href="http://www.eclipse.org/$PR/docs/#sdo">Documentation</a></li>
		<li><a href="http://www.eclipse.org/$PR/javadoc/">Javadoc</a></li>
		<li><a href="http://www.eclipse.org/$PR/downloads/">Downloads</a></li>
	</ul>
</div>
HTML;

function displayIntro($proj)
{
	global $content;

	print $content[$proj];
	print $content[$proj . "2"];
}
?>
