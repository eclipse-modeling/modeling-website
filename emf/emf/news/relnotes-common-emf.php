<?php
$extraSideItems =<<<XML
	<div class="sideitem">
		<h6>Releases</h6>
		<p>
			<ul>
				<li><a href="http://www.eclipse.org/modeling/emf/news/relnotes.php">2.x</a></li>
				<li><a href="http://www.eclipse.org/modeling/emf/news/relnotes2.0.php">2.0</a></li>
				<li><a href="http://www.eclipse.org/modeling/emf/news/relnotes1.x.php">1.x</a></li>
			</ul>
		</p>
	</div>
XML;

function doSideItems()
{
	global $extraSideItems;
	/*** side items ***/
	print<<<XML
<div id="rightcolumn">

	<div class="sideitem">
	<h6>Search CVS</h6>
XML;
	print '	<form action="http://www.eclipse.org/' . (isset ($PR) ? $PR : "modeling") . '/searchcvs.php" method="get" name="bugform" target="_blank">' . "\n";
	print<<<XML
	<p>
		<label for="bug">Bug ID: </label><input size="7" type="text" name="q" id="q"/>
		<input type="submit" value="Go!"/>
	</p>
	</form>
	</div>
XML;
	if (isset ($extraSideItems) && $extraSideItems)
	{
		print $extraSideItems;
	}
	print<<<XML
</div>
XML;
}
?>
