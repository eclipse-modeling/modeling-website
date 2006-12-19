<?php 
if ($isEMFserver)
{ ?>
<div class="sideitem">
	<h6>Actions</h6>
	<ul>
		<li><a href="http://emf.torolab.ibm.com/emf/build/?project=<?php print $proj; ?>">New Build</a></li>
		<?php if ($proj == "emf") { ?><li><a href="http://emf.torolab.ibm.com/emf/build/patch.php">New Test</a></li><?php } ?>
		<li><a href="http://emf.torolab.ibm.com/emf/build/promo.php?project=<?php print $proj; ?>">Promote</a></li>
	</ul>
</div>
<div class="sideitem">
	<h6>Info</h6>
	<ul>
		<li><a href="http://instawiki.webahead.ibm.com/pilot/wiki/Wiki.jsp?page=<?php print strtoupper($proj); ?>&wiki=Rational_Modeling_Tools_Team">w3 Wiki</a></li>
		<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=<?php print strtoupper($proj); ?>&amp;bug_status=ASSIGNED">Assigned Bugs</a></li>
		<li><a href="http://emf.torolab.ibm.com/<?php print $proj; ?>/downloads/downloads.php">Download Stats</a></li>
	</ul>
</div>
<?php 
} 

if ($isEMFserver && $proj == "emf")
{ ?>
<div class="sideitem">
	<h6>Tests</h6>
	<ul>
		<li><a href="/<?php print $PR; ?>/build/tests/results-jdk.php?<?php print "project=$proj&amp;version=14&amp;showAllResults=$showAllResults&amp;showAll=&amp;sortBy=$sortBy"; ?>">JDK 1.4</a></li>
		<li><a href="/<?php print $PR; ?>/build/tests/results-jdk.php?<?php print "project=$proj&amp;version=50&amp;showAllResults=$showAllResults&amp;showAll=&amp;sortBy=$sortBy"; ?>">JDK 5.0</a></li>
		<li><a href="/<?php print $PR; ?>/build/tests/results.php?<?php print "project=$proj&amp;version=&amp;showAllResults=$showAllResults&amp;showAll=&amp;sortBy=$sortBy"; ?>">BVT, FVT, SVT</a></li>
	</ul>
</div>
<?php 
}
?>
