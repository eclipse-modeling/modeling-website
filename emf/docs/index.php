<?php
require_once ("../../includes/buildServer-common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

echo "<div id=\"midcolumn\">\n";

print <<<EOHTML

<h1>EMF Documentation</h1>

<p>New to EMF? Start with an <a href="#overviews">overview</a> or a <a href="#tutorials">tutorial</a>. See also links and categories at right.
</p>

<div class="homeitem3col">
	<a name="overviews"></a>
	<h3>EMF Overview Papers</h3>

	<ul>
		<li>
			<div>June 16 2005</div><a href="http://help.eclipse.org/help33/index.jsp?topic=/org.eclipse.emf.doc//references/overview/EMF.html">The Eclipse Modeling Framework Overview</a>
		</li>

		<li>
			<div>August 12 2004</div>EMF Book: <a target="_out" href="http://www.awprofessional.com/titles/0131425420">Eclipse Modeling Framework</a> (Overview and Developer's Guide)<br/>
			<a target="_out" href="http://www.awprofessional.com/content/images/0131425420/samplechapter/budinskych02.pdf">Chapter 2 Sample</a> (PDF)
		</li>

		<li>
			<div>June 1 2004</div><a href="http://help.eclipse.org/help33/index.jsp?topic=/org.eclipse.emf.doc//references/overview/EMF.Edit.html">The EMF Edit Framework Overview</a>
		</li>

		<li>
			<div>June 23 2005</div><a href="http://help.eclipse.org/help33/index.jsp?topic=/org.eclipse.emf.doc//references/overview/EMF.Validation.html">The EMF Validation Framework Overview</a>
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
		<li>
			<div>May 31 2006</div><a href="http://help.eclipse.org/help33/index.jsp?topic=/org.eclipse.emf.doc/tutorials/clibmod/clibmod.html">Tutorial: Generating an EMF Model</a>
		</li>

		<li>
			<div>May 31 2006</div><a href="http://help.eclipse.org/help33/index.jsp?topic=/org.eclipse.emf.doc/tutorials/slibmod/slibmod.html">Tutorial: Generating an Extended EMF Model</a>
		</li>

		<li>
			<div>May 31 2006</div><a href="http://help.eclipse.org/help33/index.jsp?topic=/org.eclipse.emf.doc/tutorials/xlibmod/xlibmod.html">Tutorial: Generating an EMF Model using XML Schema</a>
		</li>

		<li>
			<div>Jan 3 2007</div><a target="_out" href="http://help.eclipse.org/help33/index.jsp?topic=/org.eclipse.emf.doc/tutorials/jet1/jet_tutorial1.html">JET Tutorial Part 1 (Introduction to JET)</a><br/>
			Contributed by Remko Popma
		</li>

		<li>
			<div>Jan 3 2007</div><a target="_out" href="http://help.eclipse.org/help33/index.jsp?topic=/org.eclipse.emf.doc/tutorials/jet2/jet_tutorial2.html">JET Tutorial Part 2 (Write Code that Writes Code)</a><br/>
			Contributed by Remko Popma
		</li>

		<li>
			<div>August 8 2006</div><a target="_out" href="http://www-128.ibm.com/developerworks/java/library/os-ecl-jet/index.html?ca=drs">Create more -- better -- code in Eclipse with JET</a><br/>
			Contributed by Chris Aniszcyk &amp; Nathan Marz
		</li>

		<li>
			<div>Oct 12 2004</div><a target="_out" href="http://www.eclipse.org/articles/Article-EMF-goes-RCP/rcp.html">Tutorial: Generating a Rich Client Platform (RCP) Application Using EMF</a>
		</li>

		<li>
			<div>June 2 2004</div><a href="http://help.eclipse.org/help33/index.jsp?topic=/org.eclipse.emf.doc/tutorials/rosepkg/rosepkg.html">Specifying Package Information in Rose</a>
		</li>

		<li>
			<div>Dec 5 2006</div>Getting EMF Source Files from CVS: <a href="http://wiki.eclipse.org/EMF/Getting_Source">Using Eclipse</a> and <a href="http://wiki.eclipse.org/index.php/CVS_Source_From_Mapfile">For A Given Build's Mapfile</a> (commandline)
			
			
		</li>

		<li>
			<div>June 13 2005</div><a href="http://www.eclipse.org/modeling/emf/docs/misc/UsingUpdateManager/UsingUpdateManager.html">Using Eclipse Update Manager to Update EMF, SDO &amp; XSD</a>
		</li>
	</ul>
</div>

<div class="homeitem3col">
	<a name="references"></a>
	<h3>Books, Guides, and References</h3>
	<ul>
		<li>
			<div>August 12 2004</div>EMF Book: <a target="_out" href="http://www.awprofessional.com/titles/0131425420">Eclipse Modeling Framework</a> (Overview and Developer's Guide)<br/>
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

		<li>
			<div>Sept 23  2004</div>Eclipse.org Newsgroups - Offline Searching with 
				<a href="http://www.eclipse.org/modeling/emf/docs/misc/SearchingNewsgroups/SearchingNewsgroupsMozilla.html">Mozilla</a> or 
				<a href="http://www.eclipse.org/modeling/emf/docs/misc/SearchingNewsgroups/SearchingNewsgroupsOutlook.html">Outlook Express</a>
		</li>

		<li>
			<div>Feb 27  2006</div>Eclipse.org Newsgroups - <a href="http://www.eclipse.org/modeling/emf/newsgroup-mailing-list.php">Online Searching</a> with 
				<a href="http://wiki.eclipse.org/index.php/Searching_Eclipse_Newsgroups_With_Firefox">Firefox</a>
		</li>
	</ul>
</div>

<div class="homeitem3col">
	<a name="whatsnew"></a>
	<h3>The Bleeding Edge</h3>

	<ul>
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
			<div>Nov 6 2007</div>EclipseWorld 2007 - Fundamentals of the Eclipse Modeling Framework, presented by Dave Steinberg
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
				<li><a href="http://www.eclipse.org/downloads/download.php?file=/technology/phoenix/podcasts/Ed-Merks-21Feb07.mp3">MP3</a> (20 min, 18 MB)</li>
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
			<div>July 2002</div><a href="http://help.eclipse.org/help33/index.jsp?topic=/org.eclipse.xsd.doc/references/articles/dwtip1-scpw/index.html">Analyzing XML schemas with the Schema Infoset Model</a>
		</li>

		<li>
			<div>June 3 2005</div><a href="http://help.eclipse.org/help33/index.jsp?topic=/org.eclipse.xsd.doc/references/diagrams/diagrams.html">Diagrams 
and Animations of the internals of XSD models</a>
		</li>
	</ul>
</div>

<div class="homeitem3col">
	<a name="sdo"></a>
	<h3>Service Data Objects (SDO)</h3>

	<ul>
		<li>
			<div>Sep 28 2004</div><a target="_out" href="http://www-106.ibm.com/developerworks/java/library/j-sdo/">Introduction to Service Data Objects</a>
		</li>

		<li>
			<div>Oct 12 2004</div><a href="http://help.eclipse.org/help33/index.jsp?topic=/org.eclipse.emf.ecore.sdo.doc/tutorials/datagraph/datagraph.html">Tutorial: Using the SDO Data Graph Editor</a>
		</li>

		<li>
			<div>June 29 2005</div>SDO Reference:
			<ul>
				<li><a target="_out" href="http://www.ibm.com/developerworks/java/library/j-commonj-sdowmt/">Announcement</a>, <a target="_out" href="ftp://www6.software.ibm.com/software/developer/library/j-commonj-sdowmt/Next-Gen-Data-Programming-Whitepaper.doc">Whitepaper</a></li>
				<li><a target="_out" href="ftp://www6.software.ibm.com/software/developer/library/j-commonj-sdowmt/Commonj-SDO-Specification-v1.0.pdf">1.0 specification</a>, <a target="_out" href="ftp://www6.software.ibm.com/software/developer/library/j-commonj-sdowmt/Commonj-SDO-Specification-v2.0.pdf">2.0 specification</a></li>
				<li><a target="_out" href="http://www.eclipse.org/modeling/emf/javadoc/">Javadoc</a></li>
			</ul>
		</li>

		<li>
			<div>June 7 2006</div><a target="_out" href="http://incubator.apache.org/tuscany/sdo_index.html">Apache Tuscany Project</a>
		</li>


		<li>
			<div>July 1 2004</div><a target="_out" href="http://www.redbooks.ibm.com/redbooks/pdfs/sg246361.pdf">Redbook: WebSphere Studio 5.1.2 JavaServer Faces and Service Data Objects</a>
		</li>

		<li>
			<div>July 1 2004</div><a target="_out" href="http://www-128.ibm.com/developerworks/db2/library/techarticle/dm-0407saracco/index.html">Enterprise Information Integration Technology</a> (usage)
		</li>

		<li>
			<div>Oct 6 2004</div><a target="_out" href="http://www.sys-con.com/story/?storyid=46652&amp;DE=1">Integrating relational data into Web applications</a> (an introduction to SDO)
		</li>
	</ul>
</div>

<div class="homeitem3col">
	<a name="contributions"></a>
	<h3>Contributed Articles</h3>

	<ul>
		<li><a target="_dw" href="http://www-128.ibm.com/developerworks/search/searchResults.jsp?searchType=1&amp;searchSite=dW&amp;searchScope=dW&amp;query=emf">Search developerWorks for EMF</a></li>


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

<div class="homeitem3col">
	<a name="emf21xdocs"></a>
	<h3>EMF 2.1</h3>
	<ul>
		<li>
			<div>July 6 2005</div><a href="http://www.eclipse.org/modeling/emf/docs/performance/EMFPerformanceTestsResults.html">EMF 2.1.0 vs. 2.0.1 Performance Report</a>
		</li>

		<li>
			<div>July 6 2005</div><a href="http://www.eclipse.org/modeling/emf/docs/performance/EMFPerformanceTestsFAQ.html">EMF 2.1.0 vs. 2.0.1 Performance FAQ</a>
		</li>
		<li>
			<div>May 19 2005</div><a href="http://www.eclipse.org/modeling/emf/docs/2.x/whatsnew/tools2.1.html">What's New In EMF <u>Tools</u>? (2.1.0.I200505191347)</a>
		</li>
	</ul>
</div>

<div class="homeitem3col">
	<a name="emf20xdocs"></a>
	<h3>EMF 2.0</h3>

	<ul>
		<li>
			<div>June 29 2004</div><a href="http://www.eclipse.org/modeling/emf/docs/2.x/tutorials/clibmod/clibmod_emf2.0.html">Tutorial: Generating an EMF 2.0 Model</a>
		</li>

		<li>
			<div>June 29 2004</div><a href="http://www.eclipse.org/modeling/emf/docs/2.x/tutorials/slibmod/slibmod_emf2.0.html">Tutorial: Generating an Extended EMF 2.0 Model</a>
		</li>

		<li>
			<div>June 29 2004</div><a href="http://www.eclipse.org/modeling/emf/docs/2.x/tutorials/xlibmod/xlibmod_emf2.0.html">Tutorial: Generating an EMF 2.0 Model using XML Schema</a>
		</li>

		<li>
			<div>May 31 2004</div><a target="_out" href="http://www.eclipse.org/modeling/emf/docs/2.x/tutorials/jet1/jet_tutorial1_emf2.0.html">JET Tutorial Part 1 (Introduction to JET)</a><br/>
			Contributed by Remko Popma [EMF 2.0]
		</li>

		<li>
			<div>May 31 2004</div><a target="_out" href="http://www.eclipse.org/modeling/emf/docs/2.x/tutorials/jet2/jet_tutorial2_emf2.0.html">JET Tutorial Part 2 (Write Code that Writes Code)</a><br/>
			Contributed by Remko Popma [EMF 2.0]
		</li>
	</ul>
</div>

<div class="homeitem3col">
	<a name="emf1xdocs"></a>
	<h3>EMF 1.x</h3>

	<ul>
		<li>
			<div>May 27 2004</div><a href="http://www.eclipse.org/modeling/emf/docs/1.x/UG/EMF_v1.0_Users_Guide.html">EMF 1.0 Users' Guide</a>
		</li>

		<li>
			<div>May 27 2004</div><a href="http://www.eclipse.org/modeling/emf/docs/1.x/JarDepsExternal/JarDepsExternal.html">EMF 1.0 Jar Dependencies for Running Standalone as a Java Application Outside Eclipse</a>
		</li>

		<li>
			<div>May 19 2003</div><a href="http://www.eclipse.org/modeling/emf/docs/1.x/tutorials/clibmod/clibmod_emf1.1.html">Tutorial: Generating an EMF 1.1 Model</a>
		</li>

		<li>
			<div>May 1 2003</div><a href="http://www.eclipse.org/modeling/emf/docs/1.x/tutorials/slibmod/slibmod_emf1.1.html">Tutorial: Generating an Extended EMF 1.1 Model</a>
		</li>

		<li>
			<div>May 22 2003</div><a href="http://www.eclipse.org/modeling/emf/docs/1.x/tutorials/xlibmod/xlibmod_emf1.1.html">Tutorial: Generating an EMF 1.1 Model using XML Schema</a>
		</li>

		<li>
			<div>August 20 2003</div><a href="http://www.eclipse.org/modeling/emf/docs/1.x/tutorials/glibmod/glibmod_emf1.1.html">Tutorial: Creating an EMF 1.1 Model using a GraphicalEditor</a>
		</li>
	</ul>
</div>

<div class="homeitem3col">
	<a name="plandocs"></a>
	<h3>Project Management</h3>
	<ul>
		<li><a href="http://wiki.eclipse.org/Eclipse_Modeling_Framework#Plans">EMF &amp; QTV Project Plans</a></li>
		<li><div>(<a href="http://www.eclipse.org/projects/dev_process/release-review.php">?</a>)</div><a href="http://www.eclipse.org/projects/previous-release-reviews.php">Past Reviews</a></li>
		<li><a href="http://wiki.eclipse.org/Eclipse_Modeling_Framework#New_.26_Noteworthy">New &amp; Noteworthy</a></li>
		<li><a href="http://www.eclipse.org/modeling/emf/eclipse-project-ip-log.php">Project IP Log</a> (CSV)</li>
		<li><a href="http://www.eclipse.org/projects/timeline/">Master Timeline</a></li>
		<li>
			<div>August 26, 2005</div><a href="http://www.eclipse.org/modeling/emf/docs/architecture/jet2/jet2.html">JET Enhancement Proposal (JET2)</a>
		</li>
	</ul>
</div>
EOHTML;

echo "</div>\n";

print "<div id=\"rightcolumn\">\n";

print '<div class="sideitem">' . "\n" . '<h6>New Docs</h6>';
getNews(3, "docs");
print ' <ul>
			<li><a href="/' . $PR . '/news-whatsnew.php">Older news</a></li>
		</ul>
	</div>
';

print <<<EOHTML
<div class="sideitem">
	<h6>Documentation</h6>
	<ul>
		<li><a href="#overviews">EMF Overview Papers</a></li>
		<li><a href="#tutorials">EMF Tutorials</a></li>
		<li><a href="#references">Books, Guides, and References</a></li>
		<li><a href="#whatsnew">The Bleeding Edge</a></li>
		<li><a href="#presentations">Presentations &amp; Workshops</a></li>
	</ul>
</div>

<div class="sideitem">
	<h6>Other Resources</h6>
	<ul>
		<li><a href="#xsd">XML Schema (XSD)</a></li>
		<li><a href="#sdo">Service Data Objects (SDO)</a></li>
		<li><a href="#contributions">Contributed Articles</a></li>
		<li><a href="#emf21xdocs">EMF 2.1</a>, <a href="#emf20xdocs">EMF 2.0</a>, <a href="#emf1xdocs">EMF 1.x</a></li>
		<li><a href="#plandocs">Project Management</a></li>
		<li><a target="_dw" href="http://www-128.ibm.com/developerworks/search/searchResults.jsp?searchType=1&amp;searchSite=dW&amp;searchScope=dW&amp;query=emf">Search developerWorks</a></li>
	</ul>
</div>

<div class="sideitem">
	<h6>Eclipse Wiki</h6>
	<ul>
EOHTML;
$wikiContents = wikiCategoryToListItems("EMF");
print $wikiContents;
print <<<EOHTML
	</ul>
</div>
EOHTML;

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - EMF - Documents";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/emf/includes/docs.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

<!-- $Id: index.php,v 1.11 2007/11/29 19:45:37 nickb Exp $ -->
