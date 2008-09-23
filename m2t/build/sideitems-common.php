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
			<li><a href="/<?php print $PR; ?>/<?php print $projct ? $projct : "jet"; ?>/build/">Build</a>,
				<a href="/<?php print $PR; ?>/<?php print $projct ? $projct : "jet"; ?>/build/clean.php">Clean</a>,
				<a href="/<?php print $PR; ?>/<?php print $projct ? $projct : "jet"; ?>/build/promo.php">Promote</a></li>
			<li><a href="/<?php print $PR; ?>/downloads/?project=<?php print $projct ? $projct : "jet"; ?>&amp;showAll=0&amp;showMax=5&amp;sortBy=date">See Recent Builds</a></li>
		</ul>
	</div>

	<div class="sideitem">
		<h6>Info</h6>
		<ul>
			<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=M2T&amp;component=<?php echo $projct; ?>&amp;bug_status=ASSIGNED">Assigned Bugs</a></li>
			<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=M2T&amp;component=<?php echo $projct; ?>&amp;bug_status=RESOLVED&changedin=7">Resolved Bugs This Week</a></li>
			<li><a href="http://www.eclipse.org/modeling/m2t/searchcvs.php?q=branch%3A+HEAD+days%3A+7">Development This Week</a></li>
			<li><a href="http://www.eclipse.org/modeling/m2t/searchcvs.php?q=branch%3A+R+days%3A+7">Maintenance This Week</a></li>
			<!-- <li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/downloads/downloads.php">Download Stats</a></li> -->
		</ul>
	</div>
	<?php
	}
}
?>
