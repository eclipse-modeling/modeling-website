<?php
require_once ("../../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

echo "<div id=\"midcolumn\">\n";

print <<<EOHTML

<h1>EMF Documentation</h1>

<p>New to EMF? Start with <b><a href="http://eclipsesource.com/blogs/tutorials/emf-tutorial/">this tutorial</a></b> and learn <b><a href="http://eclipsesource.com/blogs/tutorials/emf-tutorial/">"What every Eclipse developer should know about EMF"</a></b>. Have a look at <a href="#overviews">overview</a> or a <a href="#tutorials">tutorial</a>.
 Also browser the help system of your Eclipse IDE (Help => Help Contents => EMF Developer Guide) and the <b><a href="newsgroup-mailing-list.php">EMF Newsgroup</a></b> Please report broken links and suggest new content.
</p>

<div class="homeitem3col">
	<a name="overviews"></a>
	<h3>EMF Overview Papers</h3>

	<ul>
	<li><div>September 9 2014</div><a href="http://eclipsesource.com/blogs/tutorials/emf-tutorial/">What every Eclipse developer should know about EMF</a><br/>
			Contributed by Maximilian Koegel and Jonas Helming
		</li>
		<li>
			<div>July 27 2009</div>EMF Book: <a target="_out" href="http://www.informit.com/title/9780321331885">Eclipse Modeling Framework</a>, Second Edition<br/>
			<a target="_out" href="http://wiki.eclipse.org/EMF_Book_Errata">Errata</a>
		</li>

		

		<li>
			<div>August 12 2004</div>EMF Book: <a target="_out" href="http://www.awprofessional.com/titles/0131425420">Eclipse Modeling Framework</a>, First Edition<br/>
			<a target="_out" href="http://www.awprofessional.com/content/images/0131425420/samplechapter/budinskych02.pdf">Chapter 2 Sample</a> (PDF)
		</li>

		

		<li>
			<div>June 28 2004</div><a href="http://www.eclipse.org/modeling/emf/docs/overviews/FeatureMap.pdf">EMF Feature Maps</a> (PDF)
		</li>

		<li>
			<div>August 25 2006</div><a target="_out" href="http://www.theserverside.com/tt/articles/article.tss?l=BindingXMLJava">Binding XML to Java</a> (TheServerSide.com)<br/>
			Contributed by Ed Merks and Elena Litani
		</li>

		<li>
			<div>June 24 2004</div><a href="http://www.eclipse.org/modeling/emf/docs/overviews/XMLSchemaToEcoreMapping.pdf">XML Schema to Ecore Mapping</a> (PDF)
		</li>
	</ul>
</div>

<div class="homeitem3col">
	<a name="tutorials"></a>
	<h3>EMF Tutorials</h3>

	<ul>
	<li><div>September 9 2014</div><a href="http://eclipsesource.com/blogs/tutorials/emf-tutorial/">What every Eclipse developer should know about EMF</a><br/>
			Contributed by Maximilian Koegel and Jonas Helming
		</li>
		<li><div>March 3 2010</div><a href="http://www.vogella.de/articles/EclipseEMF/article.html">A Tour of the Eclipse Modeling Framework</a><br/>
			Contributed by Lars Vogel
		</li>
		
		

		<li>
			<div>August 8 2006</div><a target="_out" href="http://www-128.ibm.com/developerworks/java/library/os-ecl-jet/index.html?ca=drs">Create more -- better -- code in Eclipse with JET</a><br/>
			Contributed by Chris Aniszcyk &amp; Nathan Marz
		</li>

		<li>
			<div>Oct 12 2004</div><a target="_out" href="http://www.eclipse.org/articles/Article-EMF-goes-RCP/rcp.html">Tutorial: Generating a Rich Client Platform (RCP) Application Using EMF</a>
		</li>

		
	</ul>
</div>

<div class="homeitem3col">
	<a name="references"></a>
	<h3>Books, Guides, and References</h3>
	<ul>
		<li>
			<div>July 27 2009</div>EMF Book: <a target="_out" href="http://www.informit.com/title/9780321331885">Eclipse Modeling Framework</a>, Second Edition<br/>
			<a target="_out" href="http://wiki.eclipse.org/EMF_Book_Errata">Errata</a>
		</li>

		<li>
			<div>January 27 2008</div><a href="http://refcardz.dzone.com/refcardz/essential-emf">Essential EMF, DZone Refcard</a>
		</li>

		<li>
			<div>August 12 2004</div>EMF Book: <a target="_out" href="http://www.awprofessional.com/titles/0131425420">Eclipse Modeling Framework</a>, First Edition<br/>
			<a target="_out" href="http://www.awprofessional.com/content/images/0131425420/samplechapter/budinskych02.pdf">Chapter 2 Sample</a> (PDF)
		</li>

		<li>
			<div><i>see list at right</i></div><a target="_out" href="http://wiki.eclipse.org/index.php/Category:EMF">EMF in Eclipsepedia</a> (Wiki)
		</li>

		<li>
			<div><i>updated every build</i></div><a target="_out" href="http://www.eclipse.org/modeling/emf/javadoc/">Javadoc</a>
		</li>

		<li>
			<div>July 7 2005</div><a href="http://www.eclipse.org/modeling/emf/docs/performance/EMFPerformanceTips.html">EMF Performance Tips</a>
		</li>

		<li>
			<div>April 29 2004</div><a target="_out" href="http://publib-b.boulder.ibm.com/Redbooks.nsf/RedbookAbstracts/sg246302.html">GEF EMF Redbook</a>
		</li>

		<li>
			<div><i><a href="http://wiki.eclipse.org/index.php?title=EMF-FAQ&action=history">history</a></i></div><a href="http://wiki.eclipse.org/index.php/EMF-FAQ">Frequently Asked Questions (FAQ)</a>
		</li>

		
	</ul>
</div>

<div class="homeitem3col">
	<a name="whatsnew"></a>
	<h3>The Bleeding Edge</h3>

	<ul>
		<li>
			<div>April 8 2009</div><a href="http://wiki.eclipse.org/EMF/EMF_2.5/Activities_Example"><u>Activities Example</u> (2.5.0.I200904071800)</a>
		</li>

		<li>
			<div>Jan 20 2009</div><a href="http://wiki.eclipse.org/EMF/EMF_2.5/Minimal_EObject_Implementation"><u>Minimal EObject Implementation</u> (2.5.0.I200901201800)</a>
		</li>

		<li>
			<div>Jan 22 2008</div><a href="http://wiki.eclipse.org/EMF/EMF_2.4/Packaging_Changes"><u>EMF 2.4 Packaging Changes</u> (2.4.0.I200801221930)</a>
		</li>

		<li>
			<div>June 10 2007</div><a href="http://wiki.eclipse.org/index.php/EMF_2.3_Standalone_Zip"><u>RFC: Standalone Zip?</u> (2.3.0.RC3+)</a>
		</li>

		<li>
			<div>May 15 2007</div><a href="http://wiki.eclipse.org/index.php/EMF_2.3_New_Features_Migration_Guide"><u>New Features Migration Guide</u> (2.3.0.M7+)</a>
		</li>

		<li>
			<div>Mar 22 2007</div><a href="http://wiki.eclipse.org/index.php/EMF_2.3_Edit_API_Source_Incompatibility"><u>Edit API Source Incompatibility</u> (2.3.0.I200703221305)</a>
		</li>

		<li>
			<div>Jan 8 2007</div><a href="http://wiki.eclipse.org/index.php/EMF_2.3_JVM_Requirements"><u>JVM Requirements</u> (2.3.0.M3+)</a>
		</li>

		<li>
			<div>Dec 7 2006</div><a href="http://wiki.eclipse.org/index.php/EMF_2.3_Generics"><u>Generics</u> (2.3.0.I200612071030)</a>
		</li>

		<li>
			<div>Nov 18 2006</div><a href="http://www.eclipse.org/modeling/emf/docs/2.x/whatsnew/merge2.3.html"><u>Code Merge</u> (2.3.0.I200611161558)</a>
		</li>

	</ul>
</div>

<div class="homeitem3col">
	<a name="presentations"></a>
	<h3>Presentations &amp; Workshops</h3>

	<ul>
	
		<li>
			<div>Mar 2014</div>What every Eclipse Developer should know about EMF
			<ul>
				<li><a href="https://www.eclipsecon.org/na2014/session/what-every-eclipse-developer-should-know-about-emf">Tutorial (Jonas Helming)</a></li>
			</ul>
		</li>
		<li>
			<div>Mar 2014</div>Getting married with EMF
			<ul>
				<li><a href="https://www.eclipsecon.org/na2014/session/getting-married-emf">Talks (Jonas Helming)</a></li>
			</ul>
		</li>
		
		<li>
			<div>Jan 30 2009</div>Scale, Share and Store your Models with CDO 2.0
			<ul>
				<li><a href="http://live.eclipse.org/node/635">Webinar</a> (features sound, video and chat transcript)</li>
			</ul>
		</li>

		<li>
			<div>March 17 2008</div>EclipseCon 2008 - Fundamentals of the Eclipse Modeling Framework
			<ul>
				<li><a href="http://www.eclipse.org/modeling/emf/docs/presentations/EclipseCon/EclipseCon2008_309T_Fundamentals_of_EMF.pdf">Presentation</a> (PDF)</li>
				<li><a href="http://www.eclipse.org/modeling/emf/docs/presentations/EclipseCon/EclipseCon2008_309T_Fundamentals_of_EMF_Exercises.zip">Exercises</a> (ZIP)</li>
			</ul>
		</li>

		<li>
			<div>Nov 8 2007</div>EclipseWorld 2007 - Fundamentals of the Eclipse Modeling Framework
			<ul>
				<li><a href="http://www.eclipse.org/modeling/emf/docs/presentations/EclipseWorld/EclipseWorld2007.pdf">Presentation</a> (PDF)</li>
			</ul>
		</li>

		<li>
			<div>July 19 2007</div>Eclipse EMF Demo - A complete modeling platform for Java, presented by Ed Merks
			<ul>
				<li><a href="http://redmonk.com/tv/eclipse-emf-demo-large/">Flash</a> or <a href="http://media1.podtech.net/download.php?file=media/2007/07/PID_011899/Podtech_eclipse_emf_demo.mp4">MP4</a> video (23 min, 84 MB)</li>
			</ul>
		</li>

		<li>
			<div>June 27 2007</div>Eclipse Modeling: What's New for Europa, presented by Richard Gronback and Ed Merks
			<ul>
				<li><a href="http://live.eclipse.org/node/278">Webinar</a> (features sound, video and chat transcript)</li>
			</ul>
		</li>

		<li>
			<div>Feb 21 2007</div>Eclipse Podcast: Wayne Beaton and Ed Merks - What is EMF? What does it do? What's new?
			<ul>
				<li><a href="http://www.eclipse.org/modeling/download.php?file=/technology/phoenix/podcasts/Ed-Merks-21Feb07.mp3">MP3</a> (20 min, 18 MB)</li>
			</ul>
		</li>

		<li>
			<div>Oct 25 2006</div><a name="oopsla2006intro"></a>OOPSLA 2006 - Introduction to EMF
			<ul>
				<li><a href="http://www.eclipse.org/modeling/emf/docs/presentations/OOPSLA/OOPSLA_2006_T38_Intro_To_EMF.pdf">Presentation</a> (PDF)</li>
				<li><a href="http://www.eclipse.org/modeling/emf/docs/presentations/OOPSLA/OOPSLA_2006_T38_Intro_To_EMF_org.eclipse.emf.tutorial.intro_2.2.1.zip">Workshop Cheat Sheet Plugin</a> (ZIP)</li>
			</ul>
		</li>

		<li>
			<div>Oct 19 2006</div><a name="cascon2006intro"></a>CASCON 2006 - Introduction to EMF
			<ul>
				<li><a href="http://www.eclipse.org/modeling/emf/docs/presentations/CASCON/CASCON_2006.pdf">Presentation</a> (PDF)</li>
				<li><a href="http://www.eclipse.org/modeling/emf/docs/presentations/CASCON/CASCON_2006_org.eclipse.emf.tutorial.intro.zip">Workshop Cheat Sheet Plugin</a> (ZIP)</li>
			</ul>
		</li>

		<li>
			<div>July 20 2006</div>Callisto Podcast: Ed Merks - Why people are confused by EMF and how this amazing tool can be leveraged in almost any situation.
			<ul>
				<li><a href="http://www.eclipsezone.com/files/podcasts/4-EMF-Ed.Merks.mp3">MP3</a> (37 min, 51 MB)</li>
			</ul>
		</li>

		<li>
			<div>June 19 2006</div>Using the Eclipse Modeling Frameworks
			<ul>
				<li><a href="http://adobedev.breezecentral.com/p17835008/">Webinar</a> (features sound, video and chat transcript)</li>
			</ul>
		</li>

		<li>
			<div>March 20 2006</div><a name="eclipsecon2006intro"></a>EclipseCon 2006 - Introduction to EMF
			<ul>
				<li><a href="http://www.eclipse.org/modeling/emf/docs/presentations/EclipseCon/EclipseCon2006_EMF_Intro.pdf">Presentation</a> (PDF)</li>
				<li><a href="http://www.eclipse.org/modeling/emf/docs/presentations/EclipseCon/EclipseCon2006_EMF_Intro_project.zip">Workshop Project</a> (ZIP)</li>
			</ul>
		</li>

		<li>
			<div>March 20 2006</div>EclipseCon 2006 - Advanced Features of EMF
			<ul>
				<li><a href="http://www.eclipse.org/modeling/emf/docs/presentations/EclipseCon/EclipseCon2006_EMF_Advanced.pdf">Presentation</a> (PDF)</li>
				<li><a href="http://www.eclipse.org/modeling/emf/docs/presentations/EclipseCon/EclipseCon2006_EMF_Advanced_project.zip">Workshop Project</a> (ZIP)</li>
			</ul>
		</li>

		<li>
			<div>March 22 2006</div><a name="eclipsecon2006xmlbinding"></a>EclipseCon 2006 - XML Binding with EMF
			<ul>
				<li><a href="http://www.eclipse.org/modeling/emf/docs/presentations/EclipseCon/EclipseCon2006_EMF_XML_Binding.pdf">Presentation</a> (PDF)</li>
				<li><a href="http://www.eclipse.org/modeling/emf/docs/presentations/EclipseCon/EclipseCon2006_EMF_XML_Binding_project.zip">Project</a> (ZIP)</li>
			</ul>
		</li>

		<li>
			<div>July 13 2004</div><a href="http://www.eclipse.org/modeling/emf/docs/presentations/JavaOne/JavaOnePresentation.pdf">JavaOne 2004 EMF Presentation</a> (PDF)
		</li>

		<li>
			<div>Feb 6 2004</div><a href="http://www.eclipse.org/modeling/emf/docs/presentations/EclipseCon/EclipseCon2004_Rapid_Development_Using_EMF.pdf">EclipseCon 2004 EMF Presentation</a> (PDF)
		</li>

		<li>
			<div>Dec 2 2003</div><a target="_out" href="http://www.codegeneration.net/tiki-read_article.php?articleId=38">EMF Interview</a> with David Steinberg
		</li>
	</ul>
</div>

<div class="homeitem3col">
	<a name="xsd"></a>
	<h3>XML Schema Infoset Model (XSD)</h3>

	<ul>
		<li>
			<div>July 2002</div><a href="http://help.eclipse.org/ganymede/index.jsp?topic=/org.eclipse.xsd.doc/references/articles/dwtip1-scpw/index.html">Analyzing XML schemas with the Schema Infoset Model</a>
		</li>

		<li>
			<div>June 3 2005</div><a href="http://help.eclipse.org/ganymede/index.jsp?topic=/org.eclipse.xsd.doc/references/diagrams/diagrams.html">Diagrams
and Animations of the internals of XSD models</a>
		</li>
	</ul>
</div>



<div class="homeitem3col">
	<a name="contributions"></a>
	<h3>Contributed Articles</h3>

	<ul>
		<li><a target="_dw" href="http://www-128.ibm.com/developerworks/search/searchResults.jsp?searchType=1&amp;searchSite=dW&amp;searchScope=dW&amp;query=emf">Search developerWorks for EMF</a></li>

		<li><div>April 2008</div><a target="_dw" href="ihttp://www.ibm.com/developerworks/library/os-eclipse-emfmetamodel/index.html?S_TACT=105AGX44&S_CMP=EDU">Metamodeling with EMF: Generating concrete, reusable Java snippets</a><br/>
			Contributed by Ken McNeill
		</li>

		<li>
			<div>December 2007</div><a target="_out" href="http://www.softwaremag.com/L.cfm?doc=1103-12/2007">MDA Goes Mainstream With the Eclipse Modeling Framework</a> (softwaremag.com)<br/>
			Contributed by Michael Guttman and Philipp Kutter
		</li>

		<li>
			<div>Nov 26 2007</div><a target="_dw" href="http://www.ibm.com/developerworks/library/os-eclipse-dynamicemf/">Build metamodels with dynamic EMF</a><br/>
			Published by <a href="http://www.ibm.com/developerWorks" target="_dw">IBM developerWorks</a>, Nov 20 2007
		</li>

		<li>
			<div>Nov 26 2007</div><a target="_dw" href="http://www.ibm.com/developerworks/library/os-eclipse-emf/">Build an Eclipse plug-in to navigate content in an EMF model</a><br/>
			Published by <a href="http://www.ibm.com/developerWorks" target="_dw">IBM developerWorks</a>, Sept 04 2007
		</li>

		<li>
			<div>August 30 2007</div><a target="_dw" href="http://www-128.ibm.com/developerworks/library/x-mdcdd/">Model-driven compound document development</a><br/>
			First published by <a href="http://www.ibm.com/developerWorks" target="_dw">IBM developerWorks</a>, July 22 2005
		</li>

		<li>
			<div>August 29 2005</div><a target="_out" href="http://www.devx.com/Java/Article/29093/0/page/1">Discover the Eclipse Modeling Framework (EMF) and Its Dynamic Capabilities</a><br/>
			Published by <a href="http://www.devx.com/" target="_out">DevX.com</a>, August 26 2005
		</li>

		<li>
			<div>August 2005</div><a target="_out" href="http://www.ddj.com/documents/s=9825/ddj0508c/0508c.html">EMF: Moving into model-driven development</a> (Dr. Dobb's Journal)<br/>
			Contributed by Frank Budinsky
		</li>

		<li>
			<div>June 8 2005</div><a target="_out" href="http://www.eclipse.org/articles/Article-GEF-EMF/gef-emf.html">Using GEF with EMF</a>
			Contributed by Chris Aniszczyk
		</li>

		<li>
			<div>August 31 2004</div><a target="_out" href="http://www.zurich.ibm.com/~wah/doc/emf-ocl/index.html">Kent OCL Library Tutorial (Using OCL to Interrogate Your EMF Model)</a><br/>
			Contributed by Michael Wahler
		</li>

		<li>
			<div>May 26 2004</div><a target="_out" href="http://www-106.ibm.com/developerworks/opensource/library/os-ecemf1/">Model with the Eclipse Modeling Framework, Part 1</a>: Create UML models and generate code<br/>
			Published by <a href="http://www.ibm.com/developerWorks" target="_dw">IBM developerWorks</a>, April 15 2004
		</li>

		<li>
			<div>May 26 2004</div><a target="_out" href="http://www-106.ibm.com/developerworks/opensource/library/os-ecemf2/">Model with the Eclipse Modeling Framework, Part 2</a>: Create UML models and generate code <br/>
			Published by <a href="http://www.ibm.com/developerWorks" target="_dw">IBM developerWorks</a>, April 27 2004
		</li>

		<li>
			<div>May 7 2004</div><a target="_dw" href="http://www.eclipse.org/modeling/emf/docs/xsd/dW/os-schema1/index.html">XML Schema Infoset Model, Part 1</a><br/>
			First published by <a href="http://www.ibm.com/developerWorks" target="_dw">IBM developerWorks</a>, Nov 4 2003
			<ul>
				<li><a target="_dw" href="http://www.eclipse.org/modeling/emf/docs/xsd/dW/os-schema1/os-schema1-ltr.pdf">Presentation</a> (PDF)</li>
				<li><a target="_dw" href="http://www.eclipse.org/modeling/emf/docs/xsd/dW/os-schema1/org.eclipse.xsd.examples_part1.zip">Examples</a> (zipped eclipse plugin project)</li>
			</ul>
		</li>

		<li>
			<div>May 7 2004</div><a target="_dw" href="http://www.eclipse.org/modeling/emf/docs/xsd/dW/os-schema2/index.html">XML Schema Infoset Model, Part 2</a><br/>
			First published <a href="http://www.ibm.com/developerWorks" target="_dw">IBM developerWorks</a>, Feb 17 2004<br/>
			<ul>
				<li><a target="_dw" href="http://www.eclipse.org/modeling/emf/docs/xsd/dW/os-schema2/os-schema2-ltr.pdf">Presentation</a> (PDF)</li>
				<li><a target="_dw" href="http://www.eclipse.org/modeling/emf/docs/xsd/dW/os-schema2/org.eclipse.xsd.examples_part2.zip">Examples</a> (zipped eclipse plugin project)</li>
			</ul>
		</li>

		<li>
			<div>Dec 13 2004</div><a target="_out" href="http://www-106.ibm.com/developerworks/library/os-ecemf3/">Model with the Eclipse Modeling Framework, Part 3</a>: Customize generated models and editors with Eclipse's JMerge<br/>
			Published by <a href="http://www.ibm.com/developerWorks" target="_dw">IBM developerWorks</a>, May 13 2004
		</li>

		<li>
			<div>Nov 30 2004</div><a target="_out" href="http://www.eclipse.org/articles/Article-Rule%20Modeling%20With%20EMF/article.html">Modeling Rule-Based Systems with EMF</a> (Eclipse Corner article)<br/>
			by Chaur G. Wu
		</li>

		<li>
			<div>Oct 12 2004</div><a target="_out" href="http://www.eclipse.org/articles/Article-EMF-goes-RCP/rcp.html">EMF goes RCP</a> (Eclipse Corner article)<br/>
			by Marcelo Paternostro
		</li>

		<li>
			<div>Dec 9 2002</div><a target="_out" href="http://www.eclipse.org/articles/Article-Using%20EMF/using-emf.html">Using EMF</a> (Eclipse Corner article)<br/>
			by Catherine Griffin
		</li>
	</ul>
</div>




</div>
<div id="rightcolumn">
	<div class="sideitem">
                <h6>Buy The Book</h6>

                <p align="center">
                        <a href="http://www.informit.com/title/9780321331885"><img src="/modeling/emf/images/book/EMF-2nd-Ed-Cover-Small.jpg"/></a>
                </p>
                <ul>
                
                </ul>
        </div>
		<div class="sideitem">
			<h6>News on Twitter</h6>
		<a id="twitter-timeline" href="https://twitter.com/hashtag/eclipsemf" >#eclipsemf Tweets</a>

		</div>
	</div>
</div>
<script>(function() {
if (getCookie("eclipse_cookieconsent_status") === "allow") {
      createTimeline();
  }
})()</script>
EOHTML;



$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - EMF - Documents";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/emf/includes/docs.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

<!-- $Id: index.php,v 1.28 2010/03/15 20:24:34 emerks Exp $ -->
