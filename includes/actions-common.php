<div class="sideitem">
        <h6>Actions</h6>
        <ul>
                <li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/build/?project=<?php print $proj; ?>">New Build</a></li>
                <?php if ($PR == "modeling/emf")
		{
			?>
			<li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/build/patch.php">New Test</a></li>
			<?php
		}
		?>
                <li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/build/promo.php?project=<?php print $proj; ?>">Promote</a></li>
        </ul>
</div>
