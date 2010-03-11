<?php

	# Set the theme for your project's web pages.
	# See the Committer Tools "How Do I" for list of themes
	# https://dev.eclipse.org/committers/
	# Optional: defaults to system theme 
	$theme = "";

	# Define your project-wide Nav bars here.
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# these are optional
	$Nav->addNavSeparator("Project Home", 	"downloads.php");
	$Nav->addCustomNav("Downloads", 		"http://www.eclipse.org/downloads/download.php?file=/egf/tool/egf_0.2.3.201003081742.zip", 	"_self", 2);
	$Nav->addCustomNav("Installation", 		"http://wiki.eclipse.org/EGF_Installation", 		"_self", 2);
	$Nav->addCustomNav("FAQ", 				"faq.php", 			"_self", 2);




?>
