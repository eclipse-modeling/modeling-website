<?php
$product_id = 67; # MDT 
$committers = array(
	"khussey",
	"jbruck",

	"davidms",
	"elena",
	"emerks",
	"marcelop",
	"nickb",

	"cdamus",
	"cmcgee",
	"vramaswamy",

	"dcarlson",
	"ndowler",

	"gxie",
	"lzhang",
	"mli",
	"pyue",
	"yyang",

	"mgolubev",
);

$extra_IP = array(
);

$third_party = array(
	"LPG Java Runtime v1.0,/cvsroot/technology/org.eclipse.emft/ocl/plugins/org.eclipse.emf.ocl/lib/lpgjavaruntime.jar,Eclipse Public License Version 1.0,unmodified entire package",
	"LPG Java Runtime v1.0,/cvsroot/tools/org.eclipse.orbit/net.sourceforge.lpg.lpgjavaruntime v1_0,Eclipse Public License Version 1.0,original lpgjavaruntime.jar repackaged as an OSGi bundle",
	"LPG Java Runtime v1.1,/cvsroot/tools/org.eclipse.orbit/net.sourceforge.lpg.lpgjavaruntime v1_1,Eclipse Public License Version 1.0,original lpgjavaruntime.jar repackaged as an OSGi bundle",
);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/ipquery-common.php"); doIPQueryPage(); ?>