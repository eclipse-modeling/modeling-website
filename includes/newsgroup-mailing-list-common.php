<?php 

/* must be included in another file. 
 * define two arrays:
 * 
 * $newsgroups = array("MDT (main)" => array("modeling.mdt"));
 * $mailinglists = array("MDT (main)" => array("mdt.dev"));
 */

ob_start();
?>
<div id="midcolumn">
	<div class="homeitem3col">
	<h3>Newsgroups &amp; Mailing Lists</h3>
	
	<ul>
	<li>
		<p>
		<u>The best place for support is in the newsgroups, <b><i>NOT</i></b> in the mailing lists.</u>
		</p>
	
	<p>
	If you post to the mailing list, you will most likely be told "Please post 
	this to the newsgroup."
	</p>
	</li>
	<li>
	<p>
	Chances are your question has already been answered in the newsgroup, 
	and will save you time in not having to ask it again, and us in not having 
	to answer it again. Before posting a question to the newsgroup, please browse or 
	search the newsgroup archives online. To post a question, you will <a href="http://www.eclipse.org/newsgroups/index.html">require a password</a> first. 
	</p>
	
	<p>
	Frequently asked questions in the newsgroup will ultimately end up in the FAQ (one FAQ per component). Feel free to contribute!
	</p>
	</li>
	

	<li>
	<p>
	If you're not familiar with news://, you'll need a newreader first, such as 
	<a href="http://www.mozilla.org/products/thunderbird/" target="_out">Thunderbird</a>, <a href="http://www.mozilla.org/products/mozilla1.x/" target="_out">Mozilla</a>, <a href="http://www.forteinc.com" target="_out">Forte Agent</a>, or even MS Outlook. Once installed, 
	you'll also need a password to access the newsgroups. Signup is easy: 
	just <a href="http://www.eclipse.org/newsgroups/index.html">request a password</a>.
	</p>

	<p>
	After that, just point your newsreader at the eclipse news server, <b>news.eclipse.org</b> and subscribe to 
		the appropriate newsgroup(s).
	</p>
	</li>
	
	<li>
	<p>
	In addition, should you want to search the newsgroups for old posts, you can do so online or offline in one of several ways. 
	Online, you can use Eclipse.org's <a
      href="http://wiki.eclipse.org/index.php/Searching_Eclipse_Newsgroups_With_Firefox">search capabilities</a>.
	Offline, here's two options:
      <a
      href="http://www.eclipse.org/modeling/emf/docs/misc/SearchingNewsgroups/SearchingNewsgroupsMozilla.html">
      with Mozilla</a>
      or
      <a
      href="http://www.eclipse.org/modeling/emf/docs/misc/SearchingNewsgroups/SearchingNewsgroupsOutlook.html">
      with Outlook Express</a>.
      </p>
      </li>
      </ul>
      
	</div>

	<div class="homeitem">
		<h3>Newsgroup Search</h3>
		<ul>
<?php foreach ($newsgroups as $label => $ngs)
{
	print '<li>' . $label. ": ";
	foreach ($ngs as $i => $ng) 
	{
		if ($i>0) { print ", "; }
		print '<a href="http://www.eclipse.org/search/search.cgi?cmd=Search%21&amp;form=extended&amp;wf=574a74&amp;ps=10&amp;m=all&amp;t=5&amp;ul=%2Fnewslists%2Fnews.eclipse.'.$ng.'&amp;wm=wrd&amp;t=News&amp;t=Mail">eclipse.'.$ng.'</a>'; 
	}
	print "</li>\n"; 
} ?>		
		</ul>
	</div>

	<div class="homeitem">
		<h3>Newsgroup Browse (<a style="color:white;text-decoration:underline" href="http://www.eclipse.org/newsgroups/">Password Required</a>)</h3>
		<ul>
<?php foreach ($newsgroups as $label => $ngs)
{
	print '<li>' . $label. ": ";
	foreach ($ngs as $i => $ng) 
	{
		if ($i>0) { print ", "; }
		print '<a href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.'.$ng.'">eclipse.'.$ng.'</a>'; 
	}
	print "</li>\n"; 
} ?>
		</ul>
	</div>

	<div class="homeitem">
		<h3>NNTP (news://)</h3>
		<ul>
<?php foreach ($newsgroups as $label => $ngs)
{
	print '<li>' . $label. ": ";
	foreach ($ngs as $i => $ng) 
	{
		if ($i>0) { print ", "; }
		print '<a href="news://news.eclipse.org/eclipse.'.$ng.'">eclipse.'.$ng.'</a>'; 
	}
	print "</li>\n"; 
} ?>
		</ul>
	</div>

	<div class="homeitem">
		<h3>Mailing Lists (for developers only)</h3>
		<ul>
<?php foreach ($mailinglists as $label => $mls)
{
	print '<li>' . $label. ": ";
	foreach ($mls as $i => $ml) 
	{
		if ($i>0) { print ", "; }
		print '<a href="http://dev.eclipse.org/mailman/listinfo/'.$ml.'">'.$ml.'</a>'; 
	}
	print "</li>\n"; 
} ?>
		</ul>
	</div>

</div>

<?php

// http://www.eclipse.org/search/search.cgi?q=something

/*** side items ***/
print <<<XML
<div id="rightcolumn">
	<div class="sideitem">
	<h6>Search Newsgroup</h6>
XML;
print '	<form method="get" action="http://www.eclipse.org/search/search.cgi" name="searchngform" target="_blank">' . "\n";
print "<p>\n";
print '<label for="bug">Query: </label><input size="7" type="text" name="q" id="q"/> <input type="submit" value="Go!"/><br/>'."\n";
print 'In: <select name="ul" style="width:140px;font-size:8pt">';
$shown_ngs = array();
foreach ($newsgroups as $label => $ngs)
{
	foreach ($ngs as $i => $ng) 
	{
		if (!in_array($ng,$shown_ngs)) 
		{
			$shown_ngs[] = $ng;
			print '<option value="/newslists/news.eclipse.'.$ng.'">'.$ng.'</option>'."\n"; 
		} 
	}
}
print "</select><br/>\n"; 
print <<<XML
	<input type="hidden" name="cmd" value="Search!"/>
	<input type="hidden" name="form" value="extended"/>
	<input type="hidden" name="wf" value="574a74"/>
	<input type="hidden" name="ps" value="10"/>
	<input type="hidden" name="m" value="all"/>
	<input type="hidden" name="t" value="5"/>
	<input type="hidden" name="wm" value="wrd"/>
	<input type="hidden" name="t" value="News"/>
	<input type="hidden" name="t" value="Mail"/>
	</p>
	</form>
	</div>
</div>
XML;

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - $PR - Newsgroups &amp; Mailing Lists";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/newsgroups.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
