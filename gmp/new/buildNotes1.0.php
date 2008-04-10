<html>
<head>
<title>Build Notes for 1.0 Stream Release Build R-1.0 </title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="http://www.eclipse.org/default_style.css" type="text/css">
</head>
<body>

<p><b><font face="Verdana" size="+3">Build Notes</font></b> </p>

<table border=0 cellspacing=5 cellpadding=2 width="100%" >
  <tr> 
    <td align=LEFT valign=TOP colspan="3" bgcolor="#0080C0"><b><font color="#FFFFFF" face="Arial,Helvetica">Eclipse GMF Project
      Build Notes for 1.0 Stream Release Build R-1.0</font></b></td>
  </tr>
</table>
<table border="0">
	<tr><td colspan="3"><b>Plan items closed between M5 and R1.0<b> [<a href="https://bugs.eclipse.org/bugs/buglist.cgi?query_format=advanced&short_desc_type=allwordssubstr&short_desc=&product=GMF&long_desc_type=allwordssubstr&long_desc=&bug_file_loc_type=allwordssubstr&bug_file_loc=&keywords_type=allwords&keywords=plan&bug_status=RESOLVED&emailtype1=substring&email1=&emailtype2=substring&email2=&bugidtype=include&bug_id=&votes=&chfieldfrom=2006-03-03&chfieldto=2006-06-28&chfieldvalue=&field0-0-0=noop&type0-0-0=noop&value0-0-0=&order=bugs.bug_id&query_based_on=">list</a>]</td></tr>
	<tr><td colspan="3"><b>Non-plan items closed M5 and R1.0<b> [<a href="https://bugs.eclipse.org/bugs/buglist.cgi?query_format=advanced&short_desc_type=allwordssubstr&short_desc=&product=GMF&long_desc_type=allwordssubstr&long_desc=&bug_file_loc_type=allwordssubstr&bug_file_loc=&keywords_type=nowords&keywords=plan&bug_status=RESOLVED&emailtype1=substring&email1=&emailtype2=substring&email2=&bugidtype=include&bug_id=&votes=&chfieldfrom=2006-03-03&chfieldto=2006-06-28&chfieldvalue=&field0-0-0=noop&type0-0-0=noop&value0-0-0=&query_based_on=&order=bugs.bug_id&query_based_on=">list</a>]</td></tr>
	<tr><td colspan="3"><b>API-related items addressed M5 and R1.0<b> [<a href="https://bugs.eclipse.org/bugs/buglist.cgi?query_format=advanced&short_desc_type=allwordssubstr&short_desc=&classification=Technology&product=GMF&component=Definition&component=DevTools&component=Docs&component=Generation&component=Models&component=Releng&component=Runtime+Common&component=Runtime+Diagram&component=Runtime+EMF&component=Samples&component=Templates&component=UI&component=Web&long_desc_type=allwordssubstr&long_desc=&bug_file_loc_type=allwordssubstr&bug_file_loc=&status_whiteboard_type=allwordssubstr&status_whiteboard=&keywords_type=allwords&keywords=api&bug_status=RESOLVED&bug_status=VERIFIED&bug_status=CLOSED&resolution=FIXED&emailtype1=substring&email1=&emailtype2=substring&email2=&bugidtype=include&bug_id=&votes=&chfieldfrom=2006-03-03&chfieldto=2006-06-28&chfieldvalue=&cmdtype=doit&order=Reuse+same+sort+as+last+time&field0-0-0=noop&type0-0-0=noop&value0-0-0=">list</a>]</td></tr>	
	<hr/>
	<tr><td colspan="3"><b>Runtime Common Component items fixed:<b> [<a href="https://bugs.eclipse.org/bugs/buglist.cgi?query_format=advanced&short_desc_type=allwordssubstr&short_desc=&classification=Technology&product=GMF&component=Runtime%20Common&long_desc_type=allwordssubstr&long_desc=&bug_file_loc_type=allwordssubstr&bug_file_loc=&status_whiteboard_type=allwordssubstr&status_whiteboard=&keywords_type=nowords&keywords=&bug_status=RESOLVED&bug_status=VERIFIED&bug_status=CLOSED&resolution=FIXED&emailtype1=substring&email1=&emailtype2=substring&email2=&bugidtype=include&bug_id=&votes=&chfieldfrom=2006-03-03&chfieldto=2006-06-28&chfieldvalue=&field0-0-0=noop&type0-0-0=noop&value0-0-0=">list</a>]</td></tr>
	<tr><td colspan="3"><b>Runtime Diagram Component items fixed:<b> [<a href="https://bugs.eclipse.org/bugs/buglist.cgi?query_format=advanced&short_desc_type=allwordssubstr&short_desc=&classification=Technology&product=GMF&component=Runtime+Diagram&long_desc_type=allwordssubstr&long_desc=&bug_file_loc_type=allwordssubstr&bug_file_loc=&status_whiteboard_type=allwordssubstr&status_whiteboard=&keywords_type=nowords&keywords=&bug_status=RESOLVED&bug_status=VERIFIED&bug_status=CLOSED&resolution=FIXED&emailtype1=substring&email1=&emailtype2=substring&email2=&bugidtype=include&bug_id=&votes=&chfieldfrom=2006-03-03&chfieldto=2006-06-28&chfieldvalue=&cmdtype=doit&order=Reuse+same+sort+as+last+time&field0-0-0=noop&type0-0-0=noop&value0-0-0=">list</a>]</td></tr>
	<tr><td colspan="3"><b>Runtime EMF Component items fixed:<b> [<a href="https://bugs.eclipse.org/bugs/buglist.cgi?query_format=advanced&short_desc_type=allwordssubstr&short_desc=&classification=Technology&product=GMF&component=Runtime+EMF&long_desc_type=allwordssubstr&long_desc=&bug_file_loc_type=allwordssubstr&bug_file_loc=&status_whiteboard_type=allwordssubstr&status_whiteboard=&keywords_type=nowords&keywords=&bug_status=RESOLVED&bug_status=VERIFIED&bug_status=CLOSED&resolution=FIXED&emailtype1=substring&email1=&emailtype2=substring&email2=&bugidtype=include&bug_id=&votes=&chfieldfrom=2006-03-03&chfieldto=2006-06-28&chfieldvalue=&cmdtype=doit&order=Reuse+same+sort+as+last+time&field0-0-0=noop&type0-0-0=noop&value0-0-0=">list</a>]</td></tr>
	<tr><td colspan="3"><b>Tooling Component items fixed:<b> [<a href="https://bugs.eclipse.org/bugs/buglist.cgi?query_format=advanced&short_desc_type=allwordssubstr&short_desc=&classification=Technology&product=GMF&component=Definition&component=Generation&component=Models&component=Templates&long_desc_type=allwordssubstr&long_desc=&bug_file_loc_type=allwordssubstr&bug_file_loc=&status_whiteboard_type=allwordssubstr&status_whiteboard=&keywords_type=nowords&keywords=&bug_status=RESOLVED&bug_status=VERIFIED&bug_status=CLOSED&resolution=FIXED&emailtype1=substring&email1=&emailtype2=substring&email2=&bugidtype=include&bug_id=&votes=&chfieldfrom=2006-03-03&chfieldto=2006-06-28&chfieldvalue=&cmdtype=doit&order=Reuse+same+sort+as+last+time&field0-0-0=noop&type0-0-0=noop&value0-0-0=">list</a>]</td></tr>
	<tr><td colspan="3"><b>Other items fixed:<b> [<a href="https://bugs.eclipse.org/bugs/buglist.cgi?query_format=advanced&short_desc_type=allwordssubstr&short_desc=&classification=Technology&product=GMF&component=DevTools&component=Docs&component=Releng&component=Samples&component=UI&component=Web&long_desc_type=allwordssubstr&long_desc=&bug_file_loc_type=allwordssubstr&bug_file_loc=&status_whiteboard_type=allwordssubstr&status_whiteboard=&keywords_type=nowords&keywords=&bug_status=RESOLVED&bug_status=VERIFIED&bug_status=CLOSED&resolution=FIXED&emailtype1=substring&email1=&emailtype2=substring&email2=&bugidtype=include&bug_id=&votes=&chfieldfrom=2006-03-03&chfieldto=2006-06-28&chfieldvalue=&cmdtype=doit&order=Reuse+same+sort+as+last+time&field0-0-0=noop&type0-0-0=noop&value0-0-0=">list</a>]</td></tr>
</table>
<table border=0 cellspacing=5 cellpadding=2 width="100%" >
  <tr> 
    <td align=LEFT valign=TOP colspan="3" bgcolor="#0080C0"><b><font color="#FFFFFF" face="Arial,Helvetica">Build Notes for 1.0 Milestones:</font></b>
    <br/>
    <a href="http://www.eclipse.org/gmf/new/buildNotes1.0M3.php">1.0 M3 Build Notes</a><br/>
    <a href="http://www.eclipse.org/gmf/new/buildNotes1.0M4.php">1.0 M4 Build Notes</a><br/>
    <a href="http://www.eclipse.org/gmf/new/buildNotes1.0M5.php">1.0 M5 Build Notes</a><br/>
    </td>
  </tr>
</table>
</body>
</html>
