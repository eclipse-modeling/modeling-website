<?php 
/* extra sidebar stuff appended at the bottom */
function sidebar()
{
	global $PR, $projct, $isBuildServer;

	if ($isBuildServer)
	{
	?>
	<div class="sideitem">
		<h6>Actions</h6>
		<ul>
			<li><a href="/<?php print $PR."/".$projct; ?>/build/">New Build</a> (MDT)</li>
			<li><a href="http://emf.torolab.ibm.com/emft/build/?project=<?php print $projct; ?>">Old Build</a> (EMFT)</li>
			<li><a href="http://emf.torolab.ibm.com/emf/build/?project=uml2">Old Build</a> (UML2)</li>
			<li><a href="http://emf.torolab.ibm.com/emf/build/?project=emf">Old Build</a> (XSD)</li>
			<li><a href="/<?php print $PR."/".$projct; ?>/build/promo.php">Promote</a></li>
		</ul>
	</div>

	<div class="sideitem">
		<h6>Info</h6>
		<ul>
			<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=MDT&amp;bug_status=ASSIGNED">Assigned Bugs</a></li>
			<li><a href="http://www.eclipse.org/modeling/mdt/searchcvs.php?q=branch%3A+HEAD+days%3A+7">Development This Week</a></li>
			<li><a href="http://www.eclipse.org/modeling/mdt/searchcvs.php?q=branch%3A+R+days%3A+7">Maintenance This Week</a></li>
			<!-- <li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/downloads/downloads.php">Download Stats</a></li> -->
		</ul>
	</div>
	<?php
	}
}
?>