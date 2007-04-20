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
			<li><a href="/modeling/m2t/build/">Build</a>, 
				<a href="/modeling/m2t/build/promo.php">Promote</a></li>
		</ul>
		<hr noshade="noshade" size="1" width="80%"/>
		<ul>
			<li><a href="/emft/build/?project=<?php print $projct; ?>">Old Build</a> (EMFT)</li>
		</ul>
	</div>

	<div class="sideitem">
		<h6>Info</h6>
		<ul>
			<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=M2T&amp;bug_status=ASSIGNED">Assigned Bugs</a></li>
			<li><a href="http://www.eclipse.org/modeling/m2t/searchcvs.php?q=branch%3A+HEAD+days%3A+7">Development This Week</a></li>
			<li><a href="http://www.eclipse.org/modeling/m2t/searchcvs.php?q=branch%3A+R+days%3A+7">Maintenance This Week</a></li>
			<!-- <li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/downloads/downloads.php">Download Stats</a></li> -->
		</ul>
	</div>
	<?php
	}
}
?>