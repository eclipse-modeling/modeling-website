<?php 
if ($_SERVER["SERVER_NAME"] != "www.eclipse.org") {
	header("Location: http://www.eclipse.org/modeling/m2m/atl/updates/");
}

	<div id="midcolumn">
		<h1>M2M ATL Update Sites</h1>

		<div class="homeitem3col">
			<p>To install these plugins, point your Install Manager at this site.</p>

			<ul>
				<li>Help &gt; Software Updates... &gt; Available Software &gt; Add Site...
				<ul>		<li>
						Location: http://download.eclipse.org/modeling/m2m/atl/updates/releases/3.2<br/>
(or): http://download.eclipse.org/modeling/m2m/atl/updates/milestones/3.2<br/>
(or): http://download.eclipse.org/modeling/m2m/atl/updates/interim/3.2</li>
				</ul>
			</li>
		</ul>
	</div>
?>
