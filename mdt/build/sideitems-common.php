<?php 
/* extra sidebar stuff appended at the bottom */
function sidebar()
{
	global $PR, $projct, $isEMFserver;

	if ($isEMFserver)
	{
	?>
	<div class="sideitem">
		<h6>Actions</h6>
		<ul>
			<li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/build/?project=<?php print $projct; ?>">New Build</a> (MDT)</li>
			<li><a href="http://emf.torolab.ibm.com/emft/build/?project=<?php print $projct; ?>">Old Build</a> (EMFT)</li>
			<li><a href="http://emf.torolab.ibm.com/emf/build/?project=uml2">Old Build</a> (UML2)</li>
			<li><a href="http://emf.torolab.ibm.com/emf/build/?project=emf">Old Build</a> (XSD)</li>
			<?php if ($projct=="uml2-uml") { ?><li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/build/promo.php?project=<?php print $projct; ?>">Promote</a></li><?php } ?>
		</ul>
	</div>

	<div class="sideitem">
		<h6>Info</h6>
		<ul>
			<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=MDT&amp;bug_status=ASSIGNED">Assigned Bugs</a></li>
			<!-- <li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/downloads/downloads.php">Download Stats</a></li> -->
		</ul>
	</div>
	<?php
	}
}
?>