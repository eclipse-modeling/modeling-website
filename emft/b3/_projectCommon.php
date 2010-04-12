<?php

	# Set the theme for your project's web pages.
	# See the Committer Tools "How Do I" for list of themes
	# https://dev.eclipse.org/committers/
	# Optional: defaults to system theme 
	$theme = "Nova";
	

	# Define your project-wide Nav bars here.
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# these are optional
	$Nav->setLinkList(array());
	$Nav->addNavSeparator("b3", 	"/modeling/emft/b3/");
	$Nav->addCustomNav("Download", "/modeling/emft/b3/download/", "_self", 3);
	$Nav->addCustomNav("Documentation", "/modeling/emft/b3/documentation/", "_self", 3);
	$Nav->addCustomNav("Support", "/modeling/emft/b3/support/", "_self", 3);
	$Nav->addCustomNav("Getting Involved", "/modeling/emft/b3/developers/", "_self", 3);
	$Nav->addCustomNav("About This Project", "/projects/project_summary.php?projectid=modeling.emft.b3", "_self", 3);
	
	$pageKeywords	= "eclipse, jgit, git, vcs";
	$pageAuthor		= "Henrik Lindberg";
	$pageTitle 		= "JGit";

	$Menu->setMenuItemList(array());
	$Menu->addMenuItem("Home", "/modeling/emft/b3/", "_self");
	$Menu->addMenuItem("Download", "/modeling/emft/b3/download/", "_self");
	$Menu->addMenuItem("Documentation", "/modeling/emft/b3/documentation/", "_self");
	$Menu->addMenuItem("Support", "/modeling/emft/b3/support/", "_self");
	$Menu->addMenuItem("Developers", "/modeling/emft/b3/developers/", "_self");
	$Menu->addMenuItem("About This Project", "/projects/project_summary.php?projectid=modeling.emft.b3", "_self", 3);
	
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="style.css"/>' . "\n\t");
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="style2.css"/>' . "\n\t");
	
	$App->Promotion = TRUE;
?>
