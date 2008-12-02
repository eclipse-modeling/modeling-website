<?php
/* extra sidebar stuff appended at the bottom */
function sidebar()
{
	global $PR, $projct, $isBuildServer, $isEMFserver, $showAllResults, $sortBy;

	if ($isBuildServer)
	{
	?>
	<div class="sideitem">
		<h6>Actions</h6>
		<ul>
			<li>
			<?php if ($isEMFserver) { ?>
				<a href="/emf/build/">Build</a>,
			<?php } else { ?>
				<a href="/modeling/emf/<?php print $projct; ?>/build/">Build</a>,
			<?php } ?>
				<a href="/modeling/emf/<?php print $projct; ?>/build/clean.php">Clean</a>,
				<a href="/modeling/emf/<?php print $projct; ?>/build/promo.php">Promote</a>
			</li>
			<li><a href="/modeling/emf/downloads/?project=<?php print $projct; ?>&amp;showAll=0&amp;showMax=5&amp;sortBy=date">See Recent Builds</a>
			   (<a href="/modeling/emf/downloads/?project=<?php print $projct; ?>&amp;showAll=0&amp;showMax=5&amp;sortBy=date&amp;light">Light</a>)</li>
		</ul>
		<hr noshade="noshade" size="1" width="90%"/>
		<ul>
			<li>Update: <a href="http://build.eclipse.org/modeling/build/updateSearchCVS.php">Search CVS Data</a></li>
			<li>Audit:
					 <a href="http://build.eclipse.org/modeling/emf/emf/versionaudit.php?html">EMF</a>,
					 <a href="http://build.eclipse.org/modeling/mdt/xsd/versionaudit.php?html">XSD</a>,
					 <a href="http://build.eclipse.org/modeling/emf/sdo/versionaudit.php?html">SDO</a></li>
		</ul>
	</div>

	<div class="sideitem">
		<h6>Info</h6>
		<ul>
			<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=<?php print $projct == "emf" ? "EMF,MDT&amp;component=CDO,Core,Doc,Edit,Mapping,Net4j,Releng,SDO,Edit,Teneo,Tools,Website,XML%2FXMI,XSD" : "EMF&amp;component=" . $projct; ?>&amp;bug_status=ASSIGNED">Assigned Bugs</a></li>
			<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=<?php print $projct == "emf" ? "EMF,MDT&amp;component=CDO,Core,Doc,Edit,Mapping,Net4j,Releng,SDO,Edit,Teneo,Tools,Website,XML%2FXMI,XSD" : "EMF&amp;component=" . $projct; ?>&amp;bug_status=RESOLVED&changedin=7">Resolved Bugs This Week</a></li>
			<li><a href="http://www.eclipse.org/modeling/emf/searchcvs.php?q=branch%3A+HEAD+days%3A+7">Development This Week</a></li>
			<li><a href="http://www.eclipse.org/modeling/emf/searchcvs.php?q=branch%3A+R+days%3A+7">Maintenance This Week</a></li>
			<li><a href="http://www.eclipse.org/modeling/emf/downloads/stats.php">Download Stats</a></li>
		</ul>
	</div>
<?php	if ($isEMFserver && $projct == "emf") { ?>
	<div class="sideitem">
		<h6>Tests</h6>
		<ul>
			<li><a href="/emf/build/patch.php">New Test</a></li>
			<li><a href="/modeling/emf/build/tests/results-jdk.php?<?php print "project=$projct&amp;version=14&amp;sortBy=date"; ?>">JDK 1.4</a></li>
			<li><a href="/modeling/emf/build/tests/results-jdk.php?<?php print "project=$projct&amp;version=50&amp;sortBy=date"; ?>">JDK 5.0</a></li>
			<li><a href="/modeling/emf/build/tests/results-jdk.php?<?php print "project=$projct&amp;version=60&amp;sortBy=date"; ?>">JDK 6.0</a></li>
			<!-- <li><a href="/modeling/emf/build/tests/results.php?<?php print "project=$projct&amp;sortBy=date"; ?>">BVT, FVT, SVT</a></li> -->
		</ul>
	</div>
<?php
		}
	}
}
?>
