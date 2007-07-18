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
			<li>EMF: <a href="/emf/build/">Build</a>, 
					 <a href="/emf/build/promo.php">Promote</a></li>
			<li>QTV: <a href="/modeling/emf/<?php print $projct && $projct != "emf" ? $projct : "query"; ?>/build/">Build</a>, 
					 <a href="/modeling/emf/<?php print $projct && $projct != "emf" ? $projct : "query"; ?>/build/promo.php">Promote</a></li>
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
			<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=<?php print $projct == "emf" ? "EMF,MDT&amp;component=Core,Doc,Edit,Mapping,Releng,SDO,Edit,Tools,Website,XML%2FXMI,XSD" : "EMF,EMFT"; ?>&amp;bug_status=ASSIGNED">Assigned Bugs</a></li>
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
			<li><a href="/<?php print $PR; ?>/build/tests/results-jdk.php?<?php print "project=$projct&amp;version=14&amp;showAllResults=$showAllResults&amp;showAll=&amp;sortBy=$sortBy"; ?>">JDK 1.4</a></li>
			<li><a href="/<?php print $PR; ?>/build/tests/results-jdk.php?<?php print "project=$projct&amp;version=50&amp;showAllResults=$showAllResults&amp;showAll=&amp;sortBy=$sortBy"; ?>">JDK 5.0</a></li>
			<li><a href="/<?php print $PR; ?>/build/tests/results.php?<?php print "project=$projct&amp;version=&amp;showAllResults=$showAllResults&amp;showAll=&amp;sortBy=$sortBy"; ?>">BVT, FVT, SVT</a></li>
		</ul>
	</div>
<?php 
		} 
	}
}
?>
