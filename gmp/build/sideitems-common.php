<?php
/* extra sidebar stuff appended at the bottom */
function sidebar()
{
	global $PR, $projct, $isBuildServer; ?>

	<div class="sideitem">
		<h6>GMF Update Sites</h6>
		<ul>
			<li><a href="http://download.eclipse.org/modeling/gmf/updates/releases/site.xml">
			Release builds</a></li>
			<li><a href="http://download.eclipse.org/modeling/gmf/updates/milestones/site.xml">
			Milestone builds</a></li>
			<li><a href="http://download.eclipse.org/modeling/gmf/updates/interim/site.xml">
			Integration builds</a></li>
			<li><a href="http://download.eclipse.org/modeling/gmf/update-site/europa/site.xml">
			Europa builds</a></li>
		</ul>
	</div>
<?php
	if ($isBuildServer)
	{
	?>
	<div class="sideitem">
		<h6>Actions</h6>
		<ul>
			<li><a href="/<?php print $PR; ?>/<?php print $projct ? $projct : "gmf"; ?>/build/">Build</a>,
			 	<a href="/<?php print $PR; ?>/<?php print $projct ? $projct : "gmf"; ?>/build/clean.php">Clean</a>,
				<a href="/<?php print $PR; ?>/<?php print $projct ? $projct : "gmf"; ?>/build/promo.php">Promote</a></li>
			<li><a href="/<?php print $PR; ?>/downloads/?project=<?php print $projct ? $projct : "gmf"; ?>&amp;showAll=0&amp;showMax=5&amp;sortBy=date">See Recent Builds</a> (<a href="/<?php print $PR; ?>/downloads/?project=<?php print $projct ? $projct : "gmf"; ?>&amp;showAll=0&amp;showMax=5&amp;sortBy=date&amp;light">Light</a>)</li>
		</ul>
	</div>

	<div class="sideitem">
		<h6>Info</h6>
		<ul>
			<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=GMF&amp;component=<?php echo $projct; ?>&amp;bug_status=ASSIGNED">Assigned Bugs</a></li>
			<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=GMF&amp;component=<?php echo $projct; ?>&amp;bug_status=RESOLVED&changedin=7">Resolved Bugs This Week</a></li>
			<li><a href="http://www.eclipse.org/modeling/gmf/searchcvs.php?q=branch%3A+HEAD+days%3A+7">Development This Week</a></li>
			<li><a href="http://www.eclipse.org/modeling/gmf/searchcvs.php?q=branch%3A+R+days%3A+7">Maintenance This Week</a></li>
		</ul>
	</div>
	<?php
	}
}
?>
