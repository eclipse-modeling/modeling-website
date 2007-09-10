<?php
function sideitems()
{
	return <<<XML
	<div class="sideitem">
		<h6>Releases</h6>
		<p>
			<ul>
				<li><a href="http://www.eclipse.org/modeling/mdt/news/relnotes.php?project=xsd&amp;version=HEAD">Latest</a></li>
				<li><a href="http://www.eclipse.org/modeling/mdt/news/relnotes.php?project=xsd&amp;version=2.3.x">EMF 2.3.x</a></li>
				<li><a href="http://www.eclipse.org/modeling/mdt/news/relnotes.php?project=xsd&amp;version=2.2.x">EMF 2.2.x</a></li>
				<li><a href="http://www.eclipse.org/modeling/mdt/news/relnotes.php?project=xsd&amp;version=2.1.x">EMF 2.1.x</a></li>
				<li><a href="http://www.eclipse.org/modeling/mdt/news/relnotes.php?project=xsd&amp;version=2.0.x">EMF 2.0.1+</a>, <a href="http://www.eclipse.org/modeling/mdt/xsd/news/relnotes2.0.php#xsd">2.0.0</a></li>
				<li><a href="http://www.eclipse.org/modeling/mdt/xsd/news/relnotes1.x.php#xsd">XSD 1.x</a></li>
			</ul>
		</p>
	</div>
XML;
}
