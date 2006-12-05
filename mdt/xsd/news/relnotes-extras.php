<?php
function sideitems()
{
	return <<<XML
	<div class="sideitem">
		<h6>Releases</h6>
		<p>
			<ul>
				<li><a href="http://www.eclipse.org/modeling/mdt/news/relnotes.php?project=xsd&amp;version=HEAD">Latest</a></li>
				<li><a href="http://www.eclipse.org/modeling/mdt/xsd/news/relnotes2.0.php#xsd">XSD 2.0</a></li>
				<li><a href="http://www.eclipse.org/modeling/mdt/xsd/news/relnotes1.x.php#xsd">XSD 1.x</a></li>
			</ul>
		</p>
	</div>
XML;
}
