<?php
/* extra sidebar stuff appended at the bottom */
function sidebar()
{
	global $PR, $projct, $isBuildServer, $isEMFserver;

	if ($isBuildServer)
	{
	?>
	<div class="sideitem">
		<h6>Actions</h6>
		<ul>
			<li><a href="/modeling/emft/<?php print $projct ? $projct : "compare"; ?>/build/">Build</a>,
					 <a href="/modeling/emft/<?php print $projct ? $projct : "compare"; ?>/build/promo.php">Promote</a></li>
		</ul>
	</div>

	<div class="sideitem">
		<h6>Info</h6>
		<ul>
			<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=EMFT&amp;component=<?php echo $projct; ?>&amp;bug_status=ASSIGNED">Assigned Bugs</a></li>
			<li><a href="http://www.eclipse.org/modeling/mdt/searchcvs.php?q=branch%3A+HEAD+days%3A+7">Development This Week</a></li>
			<li><a href="http://www.eclipse.org/modeling/mdt/searchcvs.php?q=branch%3A+R+days%3A+7">Maintenance This Week</a></li>
			<!-- <li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/downloads/downloads.php">Download Stats</a></li> -->
			<li><a href="http://wiki.eclipse.org/Modeling_Project_Releng">Modeling Project Releng Help</a></li>
		</ul>
	</div>
<?php
	}
}
?>
