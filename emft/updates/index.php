<?php 
require($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/updates-common.php");

$PRS = array(
	"EMF (Query, Validation, Transaction)" => "modeling/emf",
	"MDT (EODM, OCL)" => "modeling/mdt",
	"M2T (JET)" => "modeling/m2t"	
);

function notes()
{
	print "<p><i style=\"color:red\"><b>NOTE:</b> Some EMFT projects have migrated to other " .
			"Update Manager sites, so you'll have to use the new sites for newer releases.</i></p>\n";
}

update_manager("EMFT", "Eclipse Modeling", $PRS, true);
?>
