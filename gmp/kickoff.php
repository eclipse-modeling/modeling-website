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
	# index.php
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
	$pageTitle 		= "GMF Kickoff Meeting";
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
		<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:0in'><font
	size=3 face="Times New Roman"><span style='font-size:
12.0pt'>The GMF
project kickoff meeting was held at the Corinthia Panorama <a
	href="http://www.corinthiahotels.com/hotel.asp?h=1&amp;l=1">Hotel</a>,
located in Prague, Czech Republic from Tuesday, July 19<sup>th</sup> to
Thursday, July 21<sup>st</sup>. <br/><br/>These notes were exported from a mind
map tool used during the meeting. The original map file can be obtained
<a href="kickoff.mmap">here</a> and viewed with a free <a
	href="http://ftp2.mindjet.com/download/signed/MMX52-E-343_Viewer.exe">viewer</a>
for those interested.</span></font></p>

<h1><b><font size=5 face=Arial><span style='font-size:16.0pt'>Attendees</span></font></b></h1>

<h3
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
.5in'><b><font
	size=4 face=Arial><span style='font-size:13.0pt'>Borland</span></font></b></h3>

<h4
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><font
	size=4 face="Arial"><span
	style='font-size:10.0pt;
 font-weight:normal'>Richard Gronback</span></font></b><span
	style='font-weight:
normal'> </span><a
	href="mailto:richard.gronback@borland.com">richard.gronback@borland.com</a><span
	style='font-weight:normal'> </span></h4>

<h4
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><font
	size=4 face="Arial"><span
	style='font-size:10.0pt;
 font-weight:normal'>Artem Tikhomirov</span></font></b><span
	style='font-weight:
normal'> <a
	href="mailto:artem.tikhomirov@borland.com"><b><span
	style='font-weight:bold'>artem.tikhomirov@borland.com</span></b></a> </span></h4>

<h4
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><font
	size=4 face="Arial"><span
	style='font-size:10.0pt;
 font-weight:normal'>Max Feldman</span></font></b><span
	style='font-weight:
normal'> <a href="mailto:max.feldman@borland.com"><b><span
	style='font-weight:
bold'>max.feldman@borland.com</span></b></a> </span></h4>

<h4
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><font
	size=4 face="Arial"><span
	style='font-size:10.0pt;
 font-weight:normal'>Alexander Shatalin</span></font></b><span
	style='font-weight:normal'> <a
	href="mailto:alexander.shatalin@borland.com"><b><span
	style='font-weight:bold'>alexander.shatalin@borland.com</span></b></a>
</span></h4>

<h4
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><font
	size=4 face="Arial"><span
	style='font-size:10.0pt;
 font-weight:normal'>Pavel Feldman</span></font></b><span
	style='font-weight:
normal'> <a
	href="mailto:pavel.feldman@borland.com"><b><span
	style='font-weight:
bold'>pavel.feldman@borland.com</span></b></a> </span></h4>

<h4
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><font
	size=4 face="Arial"><span style='font-size:10.0pt;
font-weight:normal'>Andrei
Ivanov <a href="mailto:andrei.ivanov@borland.com"><b><span
	style='font-weight:bold'>andrei.ivanov@borland.com</span></b></a> </span></font></b></h4>

<h3
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
.5in'><b><font
	size=4 face=Arial><span style='font-size:13.0pt'>IBM</span></font></b></h3>

<h4
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><font
	size=4 face="Arial"><span style='font-size:10.0pt;
font-weight:normal'>Daniel
Leroux </span></font></b><a href="mailto:dleroux@ca.ibm.com">dleroux@ca.ibm.com</a><span
	style='font-weight:
normal'> </span></h4>

<h4
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><font
	size=4 face="Arial"><span style='font-size:10.0pt;
font-weight:normal'>Fred
Plante <a href="mailto:fplante@ca.ibm.com"><b><span
	style='font-weight:bold'>fplante@ca.ibm.com</span></b></a> </span></font></b></h4>

<h3
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
.5in'><b><font
	size=4 face=Arial><span style='font-size:13.0pt'>ILOG</span></font></b></h3>

<h4
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><font
	size=4 face="Arial"><span style='font-size:10.0pt;
font-weight:normal'>Joel
Cheuoua </span></font></b><a href="mailto:jcheuoua@ilog.fr">jcheuoua@ilog.fr</a><span
	style='font-weight:
normal'> </span></h4>

<h3
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
.5in'><b><font
	size=4 face=Arial><span style='font-size:13.0pt'>Tiger</span></font></b></h3>

<h4
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><font
	size=4 face="Arial"><span style='font-size:10.0pt;
font-weight:normal'>Gabriele
Taentzer </span></font></b><a href="mailto:gabi@cs.tu-berlin.de">gabi@cs.tu-berlin.de</a><span
	style='font-weight:normal'> </span></h4>

<h4
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><font
	size=4 face="Arial"><span style='font-size:10.0pt;
font-weight:normal'>Karsten
Ehrig </span></font></b><a href="mailto:karstene@cs.tu-berlin.de">karstene@cs.tu-berlin.de</a><span
	style='font-weight:normal'> </span></h4>

<h4
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><font
	size=4 face="Arial"><span style='font-size:10.0pt;
font-weight:normal'>Stefan
Hansgen </span></font></b><a href="mailto:haensgen@cs.tu-berlin.de">haensgen@cs.tu-berlin.de</a><span
	style='font-weight:normal'> </span></h4>

<h3
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
.5in'><b><font
	size=4 face=Arial><span style='font-size:13.0pt'>Protos</span></font></b></h3>

<h4
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><font
	size=4 face="Arial"><span style='font-size:10.0pt;
font-weight:normal'>Henrik
Rentz-Reichert </span></font></b><a href="mailto:hrr@protos.de">hrr@protos.de</a><span
	style='font-weight:normal'> </span></h4>

<b><font size=5 face=Arial><span
	style='font-size:16.0pt;font-family:Arial;
font-weight:bold'><br
	clear=all style='page-break-before:always'>
</span></font></b>

<h1><b><font size=5 face=Arial><span style='font-size:16.0pt'>Schedule</span></font></b></h1>

<h3><b><font size=4 face=Arial><span style='font-size:13.0pt'>Tuesday</span></font></b></h3>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>9:30 - 10:00 Welcome and Introductions</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>The
GMF Kickoff meeting started on time, with those in attendance as listed
elsewhere in this document.</span></font></p>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>10:00 - 12:30 Requirements Review</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>The
list of posted GMF requirements was reviewed and updated based on
anticipated milestone dates, but with only specificity of either M1 or
M+.&nbsp; M1 is anticipated to be possible by the Q4 timeframe, 2005
while no dates are practical to estimate regarding future milestones at
this time.</span></font></p>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>12:30 - 1:30 Lunch</span></font></b></h4>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>1:30 - 3:30 Contribution Review Discussion</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A
brief review and discussion of each of GMF's contribution presentations
took place.&nbsp; It was generally agreed that projects which were not
based already on EMF were inappropriate to form a basis for GMF, as the
amount of work required to refactor was equal or greater than to start
from the Borland prototype in combination with the IBM runtime
contribution.</span></font></p>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>3:30 - 4:00 Break</span></font></b></h4>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>4:00 - 6:00 Contribution Review Discussion</span></font></b></h4>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Updated Tiger Presentation</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>The
Tiger Project team gave an update to their contribution presentation,
along with a demonstration of the work they have done integrating with
EMF.&nbsp; Upon further discussion by the end of the meeting, it became
apparent that the Tiger and AGG functionality could be applied to EMF in
a general way to provide a valuable complement to the EMF runtime in
terms of pattern-based command definition and graph manipulation.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>Additionally,
it was discussed how the Tiger project could integrate with the IBM
contributed runtime components. </span></font></p>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>7:00 - 10:00 Team Dinner</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>Borland
sponsored a team dinner at <a
	href="http://www.ambi.cz/ambi_brasiliero_kontakt_eng.php">Ambiente</a>
(a Brazilian restaurant selected by Max).</span></font></p>

<h3><b><font size=4 face=Arial><span style='font-size:13.0pt'>Wednesday</span></font></b></h3>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>9:30 - 11:00 Design Discussion</span></font></b></h4>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Diagram Definition</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>The
concept of diagram definition and the models required for GMF was
discussed at length.&nbsp; Another section of this document outlines the
discussion in detail.</span></font></p>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>11:00 - 12:30 Borland Prototype walk through</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>Artem
demonstrated his work to date on the Borland prototype, including an
end- to-end process of diagram definition, domain model mapping,
generation and runtime models.&nbsp; It was discussed later in the
context of the IBM runtime contribution, to which a refactoring to
support seems rather straightforward.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>In
general, it seems the group came to early consensus on the overall
design and flow of GMF functionality, as it is apparent the approaches
taken by each team was similar.&nbsp; One difference which was discussed
at length was the reuse of the &quot;runtime&quot; model for diagram
definition.&nbsp; More detail on this topic is found elsewhere in this
document.</span></font></p>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>12:30 - 1:30 Lunch</span></font></b></h4>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>1:30 - 3:30 Design Discussion</span></font></b></h4>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Generation</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>On
the topic of mapping definition, the concept of using QVT technologies,
Merlin-like mapping models and BSH scripts, or plain Java were
discussed.&nbsp; It was agreed that plain Java would be effective for
use on a first release, while other more advanced (likely OCL- based)
techniques are possible in the future.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>On
the topic of generation, the Borland prototype provided for a generation
metamodel which included all aspects of diagram, domain, tooling, etc.
information for final use in code generation with JET templates.&nbsp;
This generation model was created with inputs from separate diagram
definition, mapping, and domain model(s). The question of whether or not
you can achieve all from a single mapping definition was raised, and
presented as an option in an IBM prototype.&nbsp; The majority seem to
believe that it is more conceptually pure and in keeping with the EMF
genmodel approach to have a genmodel only be provided for code
generation parameters and runtime configuration options.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Runtime</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>The
runtime component of GMF was discussed in the context of the IBM
contribution.</span></font></p>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>3:30 - 4:00 Break</span></font></b></h4>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>4:00 - 6:00 IBM Contribution walk through</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>Fred
provided a review of the contribution material and also demonstrated the
samples created to illustrate its different aspects, including a version
of the GEF Logic diagram which uses the runtime.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>It
is clear that to target this runtime in the generation of GMF is
desired, while it was also agreed that a Toolsmith may wish to bypass
certain pieces in favor of a custom implementation.&nbsp; This
flexibility should be allowed for in GMF.</span></font></p>

<h3><b><font size=4 face=Arial><span style='font-size:13.0pt'>Thursday</span></font></b></h3>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>As
the meeting proceeded smoother than was anticipated, the meeting
concluded early on Thursday (~1:00 pm).&nbsp; Well done, and thanks to
all who participated!</span></font></p>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>9:30 - 12:30 Design Discussion</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>The
main design discussion occurred on Wednesday, leaving only a review and
agreement on chosen models and naming conventions.</span></font></p>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>12:30 - 1:30 Lunch</span></font></b></h4>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>1:30 - 2:00 Requirements Reloaded</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>This
revisit to the requirements was very brief, as it was determined that
the initial milestone determinations were correct. However, an update to
the requirements document is now required to conform with the agreed
naming conventions.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>Also,
it may make sense to classify each requirement by the applicable
&quot;themes and priorities&quot; as described in the overall Eclipse
requirements for the next release.</span></font></p>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>2:00 - 3:30 Project Plan &amp; Milestones</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>It
was agreed that at this stage, there is not enough data to determine
milestone dates.&nbsp; However, it was decided that the GMF project will
&quot;opt in&quot; to the overall strategy to align the 1.0 release with
the scheduled platform release (3.2) due end of Q2 2006.&nbsp;
Furthermore, GMF will target Q4 2005 (or sooner) for an M1 milestone and
determine the remaining milestone goals and dates once development
begins.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Checkpoint Review</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>In
accordance with the Eclipse development process, a Checkpoint review is
required to enter the Implementation Phase.&nbsp; This review will be
scheduled with the Technology PMC following approval of these minutes
and a draft of the project plan is produced.</span></font></p>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>3:30 - 4:00 Break</span></font></b></h4>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>4:00 - 4:30 Project Administration</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A
discussion of general project administration topics occurred and is
documented elsewhere in this document.</span></font></p>

<h4 style='margin-left:9.0pt'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>4:30 - 5:00 Wrap up</span></font></b></h4>

<b><font size=5 face=Arial><span
	style='font-size:16.0pt;font-family:Arial;
font-weight:bold'><br
	clear=all style='page-break-before:always'>
</span></font></b>

<h1><b><font size=5 face=Arial><span style='font-size:16.0pt'>Discussion
Items</span></font></b></h1>

<h2><b><i><font size=4 face=Arial><span style='font-size:14.0pt'>Technical</span></font></i></b></h2>

<h4 style='margin-left:9.0pt'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Is XMI[DI] to be the default serialization
syntax?  Or, just an export option?</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:9.0pt'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>Agreed
to provide export only, not natively persist to XMI[DI].</span></font></p>

<h4 style='margin-left:9.0pt'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Builds</span></font></b></h4>

<p class=MMHyperlink style='margin-left:.25in'><font size=3
	face="Times New Roman"><span style='font-size:12.0pt'>See document: <a
	href="file:///E:\projects\eclipse\workspaces\gmf\org.eclipse.gmf.releng.builder\readme.html">readme.html</a></span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>CruiseControl?  Alternative?</span></font></i></b></h5>

<p class=MMHyperlink style='margin-left:.25in'><font size=3
	face="Times New Roman"><span style='font-size:12.0pt'>See document: <a
	href="http://www.eclipse.org/proposals/eclipse-tpi/">eclipse-tpi</a></span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>It
was agreed that CruiseControl is a reasonable place to start.&nbsp; Note
that the Technology Project Infrastructure proposal intends to provide
support for builds, an CruiseControl in particular.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Audits/Metrics?</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A
set of automated audits and metrics will be run on all source code
during the build process and results published.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Ship as jars?</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>No
issues are known with current method of shipping as jars, but it is
agreed that both forms should be made available.&nbsp; In some cases, as
with templates, it is necessary to ship with a folder structure.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Frequency of daily, weekly, integration builds
and what time (zone)?</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>It
was agreed that GMF should follow the platform example regarding
periodicity, while our dependencies must also be taken into
consideration for Integration builds (EMF and GEF at present).</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Generate source from models?</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>The
possbility to only maintain model definitions and therefore always
precede a build process with a code generation step needs to be
examined.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Build machine</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>Until
the Technology Project Infrastructure proposal is underway and a common
build machine and process is available, Borland will provide build
machines for the project.&nbsp; With that, the build process
instructions will be documented and tested on machines in Prague and the
US, where the builds will run.</span></font></p>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Component list and assignments (owners)?</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>It
seems reasonable that since the IBM contribution is the runtime, that
their team will initially own that component.&nbsp; Borland contributors
and others can therefore focus effort on the definition and generation
components.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>The
web, doc, and releng components will be looked after by the project
lead, while it is still too early to consider the tools component.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><b><font
	size=2 face=Arial><span
	style='font-size:10.0pt;
font-family:Arial;font-weight:bold'>TODO</span></font></b><font
	size=2 face=Arial><span style='font-size:10.0pt;font-family:Arial'>:
Update Bugzilla to reflect this list. [status: sent request to Denis Roy
07/22/2005]</span></font></p>

<h5
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
.25in'><b><i><font
	size=4 face="Courier New"><span
	style='font-size:13.0pt;
font-family:"Courier New";font-style:normal'>doc</span></font></i></b></h5>

<h5
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
.25in'><b><i><font
	size=4 face="Courier New"><span
	style='font-size:13.0pt;
font-family:"Courier New";font-style:normal'>releng</span></font></i></b></h5>

<h5
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
.25in'><b><i><font
	size=4 face="Courier New"><span
	style='font-size:13.0pt;
font-family:"Courier New";font-style:normal'>tools</span></font></i></b></h5>

<h5
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
.25in'><b><i><font
	size=4 face="Courier New"><span
	style='font-size:13.0pt;
font-family:"Courier New";font-style:normal'>definition</span></font></i></b></h5>

<h5
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
.25in'><b><i><font
	size=4 face="Courier New"><span
	style='font-size:13.0pt;
font-family:"Courier New";font-style:normal'>generation</span></font></i></b></h5>

<h5
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
.25in'><b><i><font
	size=4 face="Courier New"><span
	style='font-size:13.0pt;
font-family:"Courier New";font-style:normal'>runtime</span></font></i></b></h5>

<h5
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;margin-left:
.25in'><b><i><font
	size=4 face="Courier New"><span
	style='font-size:13.0pt;
font-family:"Courier New";font-style:normal'>web</span></font></i></b></h5>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>CVS project structure</span></font></b></h4>

<h5 style='margin-top:6.0pt'><b><i><font size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-weight:normal;
font-style:normal'>/home/technology</span></font></i></b></h5>

<p class=MMTopic6
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;
margin-left:.25in;text-indent:0in'><b><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-weight:normal'><font
	size=1 face="Times New Roman"><span
	style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></font></span></font></b><font size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-weight:normal'>/org.eclipse.gmf</span></font></p>

<p class=MsoHeading7
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.0in'><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New"'>/doc</span></font></p>

<p class=MsoHeading7
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.0in'><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New"'>/features</span></font></p>

<p class=MsoHeading8
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.5in'><i><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-style:normal'>/org.eclipse.gmf-feature</span></font></i></p>

<p class=MsoHeading7
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.0in'><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New"'>/plugins</span></font></p>

<p class=MsoHeading8
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.5in'><i><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-style:normal'>/org.eclipse.gmf.diadef</span></font></i></p>

<p class=MsoHeading8
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.5in'><i><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-style:normal'>/org.eclipse.gmf.diagen</span></font></i></p>

<p class=MsoHeading8
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.5in'><i><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-style:normal'>/org.eclipse.gmf.runtime</span></font></i></p>

<p class=MsoHeading7
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.0in'><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New"'>/releng</span></font></p>

<p class=MsoHeading8
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.5in'><i><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-style:normal'>/org.eclipse.gmf.releng</span></font></i></p>

<p class=MsoHeading8
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.5in'><i><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-style:normal'>/org.eclipse.gmf.releng.builder</span></font></i></p>

<p class=MsoHeading7
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.0in'><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New"'>/tests</span></font></p>

<p class=MsoHeading8
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.5in'><i><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-style:normal'>/org.eclipse.gmf.tests.*</span></font></i></p>

<p class=MsoHeading7
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.0in'><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New"'>/tools</span></font></p>

<p class=MsoHeading8
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.5in'><i><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-style:normal'>/org.eclipse.emf.ecore.*</span></font></i></p>

<p class=MsoHeading8
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.5in'><i><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-style:normal'>/org.eclipse.uml2.*</span></font></i></p>

<h5 style='margin-top:6.0pt'><b><i><font size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-weight:normal;
font-style:normal'>/home/cvs/org.eclipse</span></font></i></b></h5>

<p class=MMTopic6
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:3.0pt;
margin-left:.25in;text-indent:0in'><b><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-weight:normal'><font
	size=1 face="Times New Roman"><span
	style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></font></span></font></b><font size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-weight:normal'>/www</span></font></p>

<p class=MsoHeading7
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.0in'><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New"'>/gmf</span></font></p>

<p class=MsoHeading8
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.5in'><i><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-style:normal'>/contributions</span></font></i></p>

<p class=MsoHeading8
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.5in'><i><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-style:normal'>/development</span></font></i></p>

<p class=MsoHeading8
	style='margin-top:6.0pt;margin-right:0in;margin-bottom:
3.0pt;margin-left:1.5in'><i><font
	size=3 face="Courier New"><span
	style='font-size:12.0pt;font-family:"Courier New";font-style:normal'>/images</span></font></i></p>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>EMF Technology Proposal</span></font></b></h4>

<p class=MMHyperlink style='margin-left:.25in'><font size=3
	face="Times New Roman"><span style='font-size:12.0pt'>See document: <a
	href="http://www.eclipse.org/proposals/eclipse-emft/index.html">index.html</a></span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>IBM Contribution?</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>The
IBM contribution will initially all go into the GMF project as planned,
and as agreed upon by the IBM legal organization.&nbsp; However, there
are components in the contribution which will logically migrate into the
EMF Technology project proposal, or into EMF itself.&nbsp; There is also
the possibility that portions will end up in the GEF project.</span></font></p>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Model mapping technologies</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A
number of model mapping technologies are, or will become, available in
the future which are options for GMF.&nbsp; A brief discussion of these
took place, with consensus being that in the absence of a true standard
or available open source toolset, GMF would rely initially on Java-
based definition for model mappings.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Java</span></font></i></b></h5>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Scripting language (Groovy, BSH, etc.)</span></font></i></b></h5>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>QVT-ish</span></font></i></b></h5>

<p class=MMTopic6 style='margin-left:.25in;text-indent:0in'><b><font
	size=2 face="Times New Roman"><span style='font-size:11.0pt'><font
	size=1 face="Times New Roman"><span
	style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></font></span></font></b>GMT</p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>GMT
was looked at as an option, and it was hoped that Jean Bezivin of the
GMT project would make the meeting to clarify a few questions.&nbsp;
Initial investigation into GMT indicated that it may not be appropriate
for a first release of GMF.</span></font></p>

<p class=MMTopic6 style='margin-left:.25in;text-indent:0in'><b><font
	size=2 face="Times New Roman"><span style='font-size:11.0pt'><font
	size=1 face="Times New Roman"><span
	style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></font></span></font></b>MTF (plans to open source?)</p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>MTF
was explored (prototyped) as an option, but without a clear
understanding of the project's direction or intention to open source.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>AGG Rules</span></font></i></b></h5>

<p class=MsoNormal style='margin-left:.25in'><font size=2 face=Arial><span
	style='font-size:10.0pt;font-family:Arial'>A high level pattern-based
definition of editor commands for diagram modification could be provided
in further releases by AGG Rules extending the EMF runtime.</span></font></p>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Platform common command infrastructure?</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>It
was agreed that as EMF and GEF adopt the new command infrastructure of
the platform, GMF would also leverage these capabilities. Until such
time, the functionality of the contributed runtime will be used and
modified as required.</span></font></p>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Localization... WWDI?</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A
question regarding localization was raised, particularly, &quot;who will
do it&quot;?</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><b><font
	size=2 face=Arial><span
	style='font-size:10.0pt;
font-family:Arial;font-weight:bold'>TODO: </span></font></b><font
	size=2 face=Arial><span style='font-size:10.0pt;font-family:Arial'>inquire
if Borland can support l10n efforts for GMF, at least for its standard
list of supported languages.&nbsp; IBM may be able to help as well,
particularly</span></font></p>

<h3><b><i><font size=4 face=Arial><span
	style='font-size:14.0pt;font-style:
italic'>&nbsp;</span></font></i></b></h3>

<h3><b><i><font size=4 face=Arial><span
	style='font-size:14.0pt;font-style:
italic'>Administrative</span></font></i></b></h3>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Does Eclipse need a top-level modeling
project?</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>The
possibility of GMF rolling under a top-level modeling project, if one to
be created, was discussed briefly.&nbsp; It is generally thought that at
present, there is not likely a need for such a project, but that with an
increase in model- centric projects it may one day be a logical
development within the community.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>EMF, GMT, MDDi, GMF</span></font></i></b></h5>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>PMCs, Councils, etc. : how it works?</span></font></b></h4>

<p class=MMHyperlink style='margin-left:.25in'><font size=3
	face="Times New Roman"><span style='font-size:12.0pt'>See document: <a
	href="http://www.eclipse.org/org/councils/roadmap.html">roadmap.html</a></span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A
brief discussion of how the Eclipse Foundation operates occurred,
focusing on GMF's position under the Technology project as a incubator.</span></font></p>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>How to become a Committer?</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A
general explanation of the Technology project's charter and its
philosophy of Committer voting took place.&nbsp; Basically, with the
exception of the 3 initial Committers from Borland, which were appointed
by the PMC, there would likely be a number of voted-in Committers for
the IBM contribution.&nbsp; Other Committers will be added to the
project using the same meritocracy approach as described in the charter
(including subsequent Borland and IBM contributors).</span></font></p>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Communication</span></font></b></h4>

<h5 style='text-indent:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>IM?</span></font></i></b></h5>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>ECF?</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>The
Eclipse Communication Framework may provide a way to communicate,
although it would require a server to be set up and maintained.&nbsp;
For now, we will give Skype a try.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Skype?</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>We
decided to try and use Skype for synchronous communication within the
group. Information on Skype will be sent out to the developer mailing
list (<b><span style='font-weight:bold'>done</span></b>).</span></font></p>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Development resources</span></font></b></h4>

<p class=MMHyperlink style='margin-left:.25in'><font size=3
	face="Times New Roman"><span style='font-size:12.0pt'>See document: <a
	href="http://www.eclipse.org/gmf/development/index.php">GMF Development</a></span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A
list of resources is presented on the new web page dedicated to
Developers on the project.&nbsp; It was briefly shown and discussed.</span></font></p>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Fluff topics</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>These
topics were saved until last (well, nearly last), after we were all
tired of discussing contributions, design, etc.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Logo?</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>Does
GMF need a logo?&nbsp; GEF has one, and it would seem appropriate for
any project with &quot;Graphical&quot; in its name to have a logo.
Perhaps a graphic artist will contribute time to create one?&nbsp; A lot
of ideas come to mind, particularly combining the letters of EMF, GEF,
and GMF in some pattern.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Project T-shirts?</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>The
group seemed to agree that to have project T-shirts made by the next
EclipseCon is a good goal, and of course should have whatever logo we
create.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Project nickname?</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>Although
other projects have adopted nicknames in addition to their official
Eclipse project names, it seems nobody has any to offer for GMF at this
time.</span></font></p>

<h3><b><font size=4 face=Arial><span style='font-size:13.0pt'>&nbsp;</span></font></b></h3>

<h3><b><font size=4 face=Arial><span style='font-size:13.0pt'>Learning
from other Eclipse projects</span></font></b></h3>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>To emulate</span></font></b></h4>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Viewlets (e.g. VEP)</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>It
was recommended that our tutorials and/or help system include Viewlets</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Performance metrics (part of build)</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>It
was recommended by Fred that GMF adopt a similar automated performance
testing process as part of the build as do other projects, including the
platform.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><b><font
	size=2 face=Arial><span
	style='font-size:10.0pt;
font-family:Arial;font-weight:bold'>TODO:</span></font></b><font
	size=2 face=Arial><span style='font-size:10.0pt;font-family:Arial'>
investigate implementation as part of already started releng work.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>What's new? documents</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>It
was recommended that GMF always generate &quot;What's New?&quot;
documents for releases.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>What's next and when?</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>In
addition to &quot;What's New?&quot; documents, it was recommended by
Artem that we produce documents that indicate what's coming, and when.</span></font></p>

<p class=MMTopic6 style='margin-left:.25in;text-indent:0in'><b><font
	size=2 face="Times New Roman"><span style='font-size:11.0pt'><font
	size=1 face="Times New Roman"><span
	style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></font></span></font></b>RSS Feed? (optional)</p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.5in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>For
those that would like to be notified of updates to the &quot;What's next
and when?&quot; document, an RSS Feed option should be provided.&nbsp; </span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.5in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>In
general, GMF should provide RSS feeds to appropriate items.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Breaking builds: strict conformance</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>As
with other projects, GMF's Developer Resources page should include
information regarding how to avoid breaking the build, and what the
protocol is for when it is broken by a code check-in.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><b><font
	size=2 face=Arial><span
	style='font-size:10.0pt;
font-family:Arial;font-weight:bold'>TODO</span></font></b><font
	size=2 face=Arial><span style='font-size:10.0pt;font-family:Arial'>:
update Developer Resources page</span></font></p>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>To avoid</span></font></b></h4>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Poor documentation (code comments, help,
tutorials, etc.)</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>It
is agreed that GMF should strive to provide adequate documentation, in
all forms.&nbsp; Eclipse projects vary greatly in this aspect,
currently.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Endless repeated newsgroup postings</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>GMF
needs to avoid spending effort on repeated newsgroup postings.&nbsp; It
seems many newsgroups suffer from reader software limitations on local
persistence and search capabilies (in addition to posters that just
don't think to look).&nbsp; </span></font></p>

<p class=MMTopic6 style='margin-left:.25in;text-indent:0in'><b><font
	size=2 face="Times New Roman"><span style='font-size:11.0pt'><font
	size=1 face="Times New Roman"><span
	style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></font></span></font></b>FAQ?</p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.5in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>One
possible (partial) solution to repeated newsgroup answers (if not
questions), is to point the post to a well-maintained FAQ document.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.5in'><b><font
	size=2 face=Arial><span
	style='font-size:10.0pt;
font-family:Arial;font-weight:bold'>TODO</span></font></b><font
	size=2 face=Arial><span style='font-size:10.0pt;font-family:Arial'>:
add FAQ document (once a download is available)</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Standard dev mailing list reply: &quot;Please
post these questions to the newsgroup...&quot;</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>Although
a familiar pattern on developer mailing lists, no obvious solution seems
to exist, aside from moderated mailing lists.&nbsp; Currently, GMF does
not suffer from this or the newsgroup issues found on projects like EMF.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Diversity in contributors</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>It
is agreed that projects benefit from a diverse set of
contributors.&nbsp; GMF has started with a broad range of interested
parties, so it is not anticipated the project will have a problem with
this, at least initially.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Less-than-exemplary tools</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>The
TPTP project is now making a concerted effort to improve its
&quot;exemplary tools&quot;.&nbsp; From the beginning, it is agreed that
GMF should strive to provide high-quality examples, not only in those
provided to Toolsmiths for use in GMF, but also in those products
generated using GMF.</span></font></p>

<h5 style='margin-left:.25in'><b><i><font size=4 face="Times New Roman"><span
	style='font-size:13.0pt'>Lack of update site</span></font></i></b></h5>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>Update
sites are valuable to the community, and it is agreed that GMF should
utilize one as soon as an initial download is available.</span></font></p>

<p class=MMTopic2 style='margin-left:9.0pt;text-indent:0in'><b><i><font
	size=4 face=Arial><span style='font-size:14.0pt'><font size=1
	face="Times New Roman"><span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></font></span></font></i></b>&nbsp;</p>

<b><font size=5 face=Arial><span
	style='font-size:16.0pt;font-family:Arial;
font-weight:bold'><br
	clear=all style='page-break-before:always'>
</span></font></b>

<p class=MMTopic1 style='margin-left:0in;text-indent:0in'>Terminology</p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:0in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>&nbsp;</span></font></p>

<h4><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>  Models</span></font></b></h4>

<h4 style='margin-left:.5in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Graphical Definition Model (.gmfgraph)</span></font></b></h4>

<h5
	style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><i><font
	size=1 face="Times New Roman"><span style='font-size:9.0pt'>Similar to
Borland's diagram definition model (.diagramdefinition)</span></font></i></b></h5>

<h5
	style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><i><font
	size=1 face="Times New Roman"><span style='font-size:9.0pt'>IBM's
notation model (.ddm) was used both for &quot;runtime&quot; and
definition.</span></font></i></b></h5>

<h4 style='margin-left:.5in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Tooling Definition Model (.gmftool)</span></font></b></h4>

<h4 style='margin-left:.5in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Mapping Model (.gmfmap)</span></font></b></h4>

<h4 style='margin-left:.5in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Generation Model (.gmfgen)</span></font></b></h4>

<h4 style='margin-left:.5in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Runtime Diagram Model (.*-diagram)</span></font></b></h4>

<h5
	style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><i><font
	size=1 face="Times New Roman"><span style='font-size:9.0pt'>Similar to
Borland's diagram runtime model (.diagramrt)</span></font></i></b></h5>

<h5
	style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:
1.0in'><b><i><font
	size=1 face="Times New Roman"><span style='font-size:9.0pt'>Renaming of
IBM's notation model</span></font></i></b></h5>

<h3 style='margin-left:.25in'><b><font size=4 face=Arial><span
	style='font-size:13.0pt'>&nbsp;</span></font></b></h3>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A
lengthy discussion took place on the topics of user (toolsmith) workflow
and the (meta)models required for GMF.&nbsp; Below is a summary of the
conversation in a Q&amp;A format:</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><b><font
	size=2 face=Arial><span
	style='font-size:10.0pt;
font-family:Arial;font-weight:bold'>Q: Does
the metamodel used to define a diagram need to be the same as the one
leveraged in the runtime?</span></font></b></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A:
Not necessarily, and in fact it may be beneficial to not have them the
same. Although it is conceptually more simple to have them the same, we
have chosen to not restrict tooling in this requirement from the
beginning, while it may yet become apparent that having them the same is
the best approach.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>&nbsp;</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><b><font
	size=2 face=Arial><span
	style='font-size:10.0pt;
font-family:Arial;font-weight:bold'>Q: Why
not combine the notion of mapping, tooling, and generation into a single
model?</span></font></b></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A:
This is again more conceptually simplistic and goes along with the
&quot;keep it simple&quot; mindset.&nbsp; However, it is not felt that
having separate, decoupled models for mapping, tooling, and generation
is a problem (other than the need to maintain them in synch).&nbsp;
Again, it may turn out that they are combined to some extent in the end,
but to start we will proceed with multiple models, as exists in the
Borland prototype.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>&nbsp;</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><b><font
	size=2 face=Arial><span
	style='font-size:10.0pt;
font-family:Arial;font-weight:bold'>Q:
Doesn't the large number of models present unnecessary complication to
the Toolsmith in the development of GMF- based products?</span></font></b></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A:
The goal is to mask the number of models and their potential complexity
with a well-designed user interface where related concepts will be
presented in an integrated fashion.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>&nbsp;</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><b><font
	size=2 face=Arial><span
	style='font-size:10.0pt;
font-family:Arial;font-weight:bold'>Q: Should
GMF's generated functionality always be required to leverage general,
extensible facilities of the runtime, or should it be possible to also
generate straight to code (or a combination)?</span></font></b></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A:
It is certain that targeting the provided runtime with its extensibility
mechanisms is a requirement, although the framework should not mandate
this in all cases. Indeed, a combination of generative and runtime
extensibility approaches may be preferred in some cases.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>&nbsp;</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><b><font
	size=2 face=Arial><span
	style='font-size:10.0pt;
font-family:Arial;font-weight:bold'>Q: What
mapping technologies are to be used?</span></font></b></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A:
It is thought that straight Java will be used to define rules in
mappings and runtime constraints where required at first, while
OCL-based or QVT- based (in the case of mapping definition) approaches
may be used in the future.</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>&nbsp;</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><b><font
	size=2 face=Arial><span
	style='font-size:10.0pt;
font-family:Arial;font-weight:bold'>Q: Where
does the definition of commands take place?</span></font></b></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>A:
At first, it is believed that hand-crafted Java implementation will be
used, while GMF may be augmented with Tiger Project functionality for
the definition of rules for the interpreted and possibly generated
implementation of runtime command execution on the model(s). </span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>&nbsp;</span></font></p>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><b><font
	size=2 face=Arial><span
	style='font-size:10.0pt;
font-family:Arial;font-weight:bold'>Q: How
are model semantic characteristics of the domain's abstract syntax
defined and represented in the graphical environment?</span></font></b></p>

<h3 style='margin-left:.25in'><b><font size=2 face=Arial><span
	style='font-size:10.0pt;font-weight:normal'>A: Initially, until the
availability of OCL is present in the EMF, these will remain Java-coded
aspects.&nbsp; It is believed that a fair number of additional
constraints defined in OCL will allow for the generation of behavior in
the diagram runtime environment.</span></font></b></h3>

<h3><b><font size=4 face=Arial><span style='font-size:13.0pt'>Roles</span></font></b></h3>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>Toolsmith</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>It
was agreed that requirements and documents regarding GMF workflow will
use the title &quot;Toolsmith&quot; when referring to the individual
utilizing GMF tooling for the design of diagram definitions, mappings,
tooling, etc.</span></font></p>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>User</span></font></b></h4>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>To
provide distinction between the user of a generated application based on
GMF, and the individual developing the application using GMF, it was
agreed that &quot;User&quot; refers to the former, while
&quot;Toolsmith&quot; refers to the latter.</span></font></p>

<h3><b><font size=4 face=Arial><span style='font-size:13.0pt'>Requirements
Legend</span></font></b></h3>

<p class=MsoNormal
	style='margin-top:2.8pt;margin-right:0in;margin-bottom:5.65pt;
margin-left:.25in'><font
	size=2 face=Arial><span style='font-size:10.0pt;
font-family:Arial'>These
are the agreed upon abbreviations for terms found (or to be found) in
GMF requirement documents.</span></font></p>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>R[n]M[x] = Release [1 | next] Milestone [1 |
n]</span></font></b></h4>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>T = Toolsmith</span></font></b></h4>

<h4 style='margin-left:.25in'><b><font size=4 face="Times New Roman"><span
	style='font-size:14.0pt'>U = User</span></font></b></h4>

<p class=MsoNormal><font size=3 face="Times New Roman"><span
	style='font-size:
12.0pt'>&nbsp;</span></font></p>
	</div>
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
