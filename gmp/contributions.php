<?php                                                                                                               
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/app.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/nav.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/eclipse.org-common/system/menu.class.php"); 
require_once($_SERVER['DOCUMENT_ROOT'] . "/projects/common/project-info.class.php");
$App = new App(); $Nav = new Nav(); $Menu = new Menu(); 
$projectInfo = new ProjectInfo("modeling.gmf");
$projectInfo->generate_common_nav( $Nav );
include ($App->getProjectCommon()); 
	#*****************************************************************************
	#
	# contributions.php
	#
	# Author: 		Richard C. Gronback
	# Date:			2005-12-01
	#
	# Description: 
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "GMF Contribution Reviews";
	$pageKeywords	= "eclipse,project,graphical,modeling,model-driven";
	$pageAuthor		= "Richard C. Gronback";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# $Nav->addNavSeparator("My Page Links", 	"downloads.php");
	# $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);

	# End: page-specific settings
	#
		
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML

<div id="maincontent">
	<div id="midcolumn"><br/>
		<table border="0" cellpadding="2" cellspacing="0" width="100%">
			<tbody>
				<tr>
					<td align="left"><h1>$pageTitle</h1></td>
					<td align="right"><img align="right" src="http://www.eclipse.org/gmf/images/logo_banner.png" /></td>
				</tr>
			</tbody>
		</table>
		<hr/>
<table border="0" cellspacing="5" cellpadding="2" width="100%">
	<tr>
		<td><h2>Introduction</h2></td>
	</tr>

	<tr>
		<td align="left" valign="top" colspan="2">The Graphical Modeling
		Framework (GMF) project is perhaps unique in that it comes with a lot
		of interest from parties with similar functionality already
		implemented. Therefore, in order to get a better understanding of the
		approaches that have been taken, and to review each potential
		contribution in a public forum, the following list and schedule is
		presented.<br />
		<br />
		The goal of each presentation is to provide an overview of experiences
		to date using EMF/GEF, an architectural overview of potential code
		contributions, and discuss the anticipated pros/cons and expected
		level of effort to refactor for GMF. The presentations do not have to
		be comprehensive, as a demonstration, code review, and open discussion
		should serve to fulfill the goals of the review.<br />
		<br />
		Following the review presentation, feedback will be solicited on the
		developer mailing list and summarized on this page. When the reviews
		are complete, and the potential contributions are reconciled with the
		GMF Requirements posted <a href="requirements.php">here</a>, those
		contributions which best fit project goals will be determined.<br />
		</td>
	</tr>
</table>

<div class="section"><hr/>
<table border="0" cellspacing="5" cellpadding="2" width="100%">
	<tr>
		<td><h2>Potential Contributions</h2></td>
	</tr>
	<tr>
		<td>
		<p dir="ltr">Below are a list of organizations who have expressed an
		interest in contributing to GMF. If you would like to be added to the
		list, or if we have inadvertently left you off, please post to the <a
			href="news://news.eclipse.org/eclipse.modeling.gmf">newsgroup</a>
		or <a href="mailto:richard.gronback@borland.com">email</a>.<br />
		<br />
		Please coordinate with the <a
			href="mailto:richard.gronback@borland.com">Project Lead</a> to
		establish the best time for your presentation. Teleconference and
		LiveMeeting information will be sent out for each on the developer
		mailing <a href="mailto:dev-gmf@eclipse.org">list</a>. As we are
		dependent upon the completion of this activity before moving into the
		Implementation Phase of the project, we would like to get these done
		in as timely a manner as possible. As a reminder, each significant
		contribution will require the completion of a <a
			href="http://www.eclipse.org/legal/ContributionQuestionnairePart1-v1.0.htm">Contribution
		Questionnaire</a>. Thank you for your participation and interest in
		GMF!</p>
		</td>
	</tr>
</table>
</div>

<table>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Borland</b></font></p>
		<p>Borland has experience using EMF/GEF in its Together modeling tools
		on Eclipse. Additionally, prototypes for metamodeling and features for
		"Free Form Diagramming" have been implemented.</p>
		<ul>
			<li>Presentation Date/Time: Friday, May 27th @ 11:00 am EDT</li>
			<li>Dial-in: 1 (630) 827-6641 or 1 (888) 690-3810 PIN: 9943938</li>
			<li><a target="_blank"
				href="http://www.placeware.com/cc/borland/join?id=W4KJNH&amp;role=attend&amp;pw=6MFK9B">http://www.placeware.com/cc/borland/join?id=W4KJNH&amp;role=attend&amp;pw=6MFK9B</a>
			<li>Responsible Individual(s): <a
				href="mailto:artem.tikhomirov@borland.com">Artem Tikhomirov</a>, <a
				href="mailto:max.feldman@borland.com">Max Feldman</a></li>
			<li>Slides: <a href="./contributions/borland-gmf.zip">borland-gmf.zip</a></li>
		</ul>
		<p></p>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>diamodl</b></font></p>
		<p>Work on a dialog modeling editor using EMF and GEF is underway at
		the Norwegian University of Science and Technology and includes a
		simplified Diagram Interchange Specification diagram model, among
		other components similar to the goals of GMF.</p>
		<ul>
			<li>Presentation Date/Time: Cancelled</li>
			<li>Responsible Individual(s): <a href="mailto:hal@idi.ntnu.no">Hallvard
			Trætteberg</a></li>
		</ul>
		<p></p>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>IBM Rational</b></font></p>
		<p>The IBM Rational modeling team has expressed an interest in
		contributing to GMF, particularly in the area of the diagram
		metamodel, runtime framework, OCL, and GEF extensions.</p>
		<ul>
			<li>Presentation Date/Time: Tuesday, May 31st @ 2:00 pm EDT</li>
			<li>Dial-in: 1 (630) 827-6641 or 1 (888) 690-3810 PIN: 9943938</li>
			<li><a target="_blank"
				href="http://www.placeware.com/cc/borland/join?id=WR3JQJ&amp;role=attend&amp;pw=96N2CX">http://www.placeware.com/cc/borland/join?id=WR3JQJ&amp;role=attend&amp;pw=96N2CX</a>
			<li>Responsible Individual(s): <a href="mailto:dleroux@ca.ibm.com">Daniel
			Leroux</a></li>
			<li>Slides: <a href="./contributions/ibm-gmf.zip">ibm-gmf.zip</a></li>
		</ul>
		<p></p>
		<p>The IBM Rational team had a group of students develop a DSM Toolkit
		as part of a special advanced coop program called Extreme Blue. The
		result of this project, called "realm," was presented to the GMF
		community on August 22nd as another generous contribution to the GMF
		project. A demo created by the students is available below. Note that
		the proper codec for viewing the AVI file can be found <a
			href="http://download.techsmith.com/tscc/TSCC.exe">here</a>.</p>
		<ul>
			<li>Presentation Date/Time: Monday, August 22nd @ 9:30 am EDT</li>
			<li>Responsible Individual(s): <a href="mailto:fplante@ca.ibm.com">Fred
			Plante</a></li>
			<li>Video Recording: <a href="./contributions/dsmt_demo.zip">dsmt_demo.zip</a></li>
		</ul>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>M1 Global</b></font></p>
		<p>M1 Global has developed a capability to transform UML models into
		GEF-based plug-ins.</p>
		<ul>
			<li>Presentation Date/Time: Wednesday, May 25th @ 11:00 am EDT</li>
			<li>Dial-in: 1 (630) 827-6641 or 1 (888) 690-3810 PIN: 9943938</li>
			<li><a target="_blank"
				href="http://www.placeware.com/cc/borland/join?id=3Z64NG&amp;role=attend&amp;pw=66T9D4">http://www.placeware.com/cc/borland/join?id=3Z64NG&amp;role=attend&amp;pw=66T9D4</a>
			<li>Responsible Individual(s): <a href="mailto:dzygmont@m1global.com">David
			Zygmont</a></li>
			<li>Slides: <a href="./contributions/m1-gmf.ppt">m1-gmf.ppt</a></li>
		</ul>
		<p></p>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Merlin</b></font></p>
		<p>Information on Merlin and its capabilities to generate GEF editor
		plug-ins for EMF models can be found <a
			href="http://sourceforge.net/projects/merlingenerator/"
			target="_blank">here</a>.</p>
		<ul>
			<li>Presentation Date/Time: Friday, May 27th @ 3:00 pm EDT</li>
			<li>Dial-in: 1 (630) 827-6641 or 1 (888) 690-3810 PIN: 9943938</li>
			<li><a target="_blank"
				href="http://www.placeware.com/cc/borland/join?id=8HXW54&amp;role=attend&amp;pw=PPB79Z">http://www.placeware.com/cc/borland/join?id=8HXW54&amp;role=attend&amp;pw=PPB79Z</a>
			<li>Responsible Individual(s): <a href="mailto:jcheuoua@wanadoo.fr">"Joël"
			Cheuoua</a></li>
			<li>Slides: <a href="./contributions/merlin-gmf.zip">merlin-gmf.zip</a></li>
		</ul>
		<p></p>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>openArchitectureWare</b></font></p>
		<p>oAW currently generates GEF editors for a given domain model and
		has an EMF integration in progress. More information can be found <a
			href="http://www.openarchitectureware.org/comp/gef.html"
			target="_blank">here</a>.</p>
		<ul>
			<li>Presentation Date/Time: N/A</li>
			<li>Responsible Individual(s): <a href="mailto:voelter@acm.org">Markus
			Voelter</a></li>
			<li>Slides: <a href="./contributions/oAW-gmf.ppt">oAW-gmf.ppt</a></li>
		</ul>
		<p></p>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Patternset
		Software</b></font></p>
		<p><a href="http://www.patternset.com/" target="_blank">Patternset</a>
		has implemented GMF-like capabilities in its product and has a
		Metadata Transformer/Generator (MTG) product which is used in lieu of
		JET.</p>
		<ul>
			<li>Presentation Date/Time: Monday, June 20th @ 11:00 am EDT</li>
			<li>Dial-in: 1 (630) 827-6641 or 1 (888) 690-3810 PIN: 9943938</li>
			<li><a target="_blank"
				href="http://www.placeware.com/cc/borland/join?id=ZKHZ7C&role=attend&pw=M8KZ9X">http://www.placeware.com/cc/borland/join?id=ZKHZ7C&amp;role=attend&amp;pw=M8KZ9X</a>
			<li>Responsible Individual(s): <a href="mailto:jose@patternset.com">Jose
			de Freitas</a></li>
			<li>Slides: <a href="./contributions/patternset-gmf.ppt">patternset-gmf.ppt</a></li>
		</ul>
		<p></p>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Sybase</b></font></p>
		<p><a href="http://www.sybase.com/" target="_blank">Sybase</a> have
		developed a GEF/EMF process-flow editor that uses an EMF model to map
		the domain model onto a diagram model. This map is loaded by the
		editor at runtime. An editor plugin is also provided for editing the
		model map.</p>
		<ul>
			<li>Presentation Date/Time: Monday, June 27th @ 11:00 am EDT</li>
			<li>Dial-in: 1 (630) 827-6641 or 1 (888) 690-3810 PIN: 9943938</li>
			<li><a target="_blank"
				href="http://www.placeware.com/cc/borland/join?id=Z2627D&amp;role=attend&amp;pw=TQQ3NF">http://www.placeware.com/cc/borland/join?id=Z2627D&amp;role=attend&amp;pw=TQQ3NF</a>
			<li>Responsible Individual(s): <a href="mailto:bob.brodt@sybase.com">Bob
			Brodt</a></li>
		</ul>
		<p></p>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Technical
		University of Berlin</b></font></p>
		<p>The <a href="http://tfs.cs.tu-berlin.de/~tigerprj" target="_blank">Tiger
		Project</a> (Transformation-based generation of modeling environments)
		is a tool environment that allows to generate an Eclipse editor plugin
		based on the Graphical Editing Framework (GEF) from a formal,
		graph-transformation based visual language specification. Moreover the
		Eclipse JET engine is used for generation.</p>
		<ul>
			<li>Presentation Date/Time: Thursday, May 26th @ 12:00 EDT</li>
			<li>Dial-in: 1 (630) 827-6641 or 1 (888) 690-3810 PIN: 9943938</li>
			<li><a target="_blank"
				href="http://www.placeware.com/cc/borland/join?id=6HGR3F&amp;role=attend&amp;pw=96KD9B">http://www.placeware.com/cc/borland/join?id=6HGR3F&amp;role=attend&amp;pw=96KD9B</a>
			<li>Responsible Individual(s): <a
				href="mailto:karstene@cs.tu-berlin.de">Karsten Ehrig</a>, <a
				href="mailto:gabi@cs.tu-berlin.de">Gabriele Taentzer</a></li>
			<li>Slides: <a href="./contributions/tiger-gmf.ppt">tiger-gmf.ppt</a></li>
		</ul>
		<p></p>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Vanderbilt
		University</b></font></p>
		<p>Vanderbilt has developed a Generic Modeling Environment (GME) and
		is currently working on a Generic Eclipse Modeling System (<a
			href="http://www.dre.vanderbilt.edu/~jules/gems.htm" target="_blank">GEMS</a>).</p>
		<ul>
			<li>Presentation Date/Time: Monday, June 20th @ 2:00 pm EDT</li>
			<li>Dial-in: 1 (630) 827-6641 or 1 (888) 690-3810 PIN: 9943938</li>
			<li><a target="_blank"
				href="http://www.placeware.com/cc/borland/join?id=HBWR82&role=attend&pw=SRQ96B">http://www.placeware.com/cc/borland/join?id=HBWR82&amp;role=attend&amp;pw=SRQ96B</a>
			<li>Responsible Individual(s): <a href="mailto:jules.white@gmail.com">Jules
			White</a></li>
			<li>Slides: <a href="./contributions/gems-gmf.zip">gems-gmf.zip</a></li>
		</ul>
		<p></p>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Visual Editor
		Project</b></font></p>
		<p>The Visual Editor (VE) project has developed components that have a
		lot of common with the goals of GMF, including: an EMF model for the
		GEF palette, a framework for allowing EditPolicies work with EMF, a
		property sheet that works with an EMF model, and a common diagram
		model.</p>
		<ul>
			<li>Presentation Date/Time: TBD</li>
			<li>Responsible Individual(s): <a href="mailto:winchest@uk.ibm.com">Joe
			Winchester</a></li>
		</ul>
		<p></p>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Xactium</b></font></p>
		<p>Xactium's XMF-Mosaic product has many of the capabilities specified
		in GMF's requirements, plus several beyond its scope.</p>
		<ul>
			<li>Presentation Date/Time: TBD</li>
			<li>Responsible Individual(s): <a
				href="mailto:andy.evans@xactium.com">Andy Evans</a></li>
		</ul>
		<p></p>
		</td>
	</tr>
</table>
<div class="section"><hr/>
<table border="0" cellspacing="5" cellpadding="2" width="100%">
	<tr>
		<td><h2>Additional Resources</h2></td>
	</tr>
	<tr>
		<td>
		<p dir="ltr">In addition to those who have expressed an interest in
		contributing to the project, a number of other resources are
		recommended for review:</p>
		</td>
	</tr>
</table>
</div>




<table>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Products/Projects
		based on EMF+GEF</b></font></p>
		<p></p>
		<ul>
			<li><a
				href="http://www.dstc.edu.au/Research/Projects/Pegamento/jane/"
				target="_blank">JANE model-specific editor generator</a></li>
			<li><a
				href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.gef.examples.ediagram/?cvsroot=Tools_Project">eDiagram
			sample from the GEF team </a></li>
		</ul>
		<p></p>

		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Papers/Publications/Specifications</b></font></p>
		<p></p>
		<ul>
			<li><a
				href="http://publib-b.boulder.ibm.com/Redbooks.nsf/RedbookAbstracts/sg246302.html"
				target="_blank">IBM Redbook: Eclipse Development using the Graphical
			Editing Framework and the Eclipse Modeling Framework</a></li>
			<li><a href="http://www.omg.org/cgi-bin/doc?ptc/2003-09-01"
				target="_blank">UML2 Diagram Interchange Specification</a></li>
			<li><a href="http://tfs.cs.tu-berlin.de/~karstene/public/gEEHT04.pdf"
				target="_blank">Towards Graph Transformation Based Generation of
			Visual Editors using Eclipse</a></li>
		</ul>
		<p></p>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top" width="16">
		<p align="left"><img src="http://www.eclipse.org/images/Adarrow.gif"
			border="0" height="16" width="16" alt=""></p>
		</td>

		<td width="100%">
		<p><font face="arial,helvetica,geneva" size="-1"><b>Related
		Technologies</b></font></p>
		<p></p>
		<ul>
			<li><a href="http://albini.xactium.com/content/" target="_blank">Xactium's
			XMF-Mosaic</a></li>
			<li><a
				href="http://labs.msdn.microsoft.com/teamsystem/Workshop/DSLTools/default.aspx"
				target="_blank">Microsoft's Domain-Specific Language (DSL) Tools</a></li>
			<li><a href="http://atom3.cs.mcgill.ca/" target="_blank">AToM3</a></li>
			<li><a href="http://www2-data.informatik.unibw-muenchen.de/DiaGen/"
				target="_blank">DiaGen</a></li>
			<li><a href="http://tfs.cs.tu-berlin.de/~genged/" target="_blank">GenGED</a></li>
		</ul>
		<p></p>
		</td>
	</tr>
</table>		
		
		
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
