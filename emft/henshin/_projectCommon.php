<?php

# Set the theme for your project's web pages.
# See the Committer Tools "How Do I" for list of themes
# https://dev.eclipse.org/committers/
# Optional: defaults to system theme 
$theme = "Nova";

# Define your project-wide Nav bars here.
# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
# these are optional
$Nav->addCustomNav("About This Project", "/projects/project_summary.php?projectid=modeling.emft.henshin", "_self", 2);
$Nav->addNavSeparator("Henshin", "index.php");
$Nav->addCustomNav("Installation", "install.php", "_self", 2);
$Nav->addCustomNav("Downloads", "downloads.php", "_self", 2);
$Nav->addCustomNav("Examples", "examples.php", "_self", 2);
#$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/Henshin", "_self", 2);
$Nav->addCustomNav("FAQ", "http://wiki.eclipse.org/Henshin_FAQ", "_self", 2);
$Nav->addCustomNav("Mailing List", "https://dev.eclipse.org/mailman/listinfo/henshin-dev", "_self", 2);
$Nav->addCustomNav("Publications", "publications.php", "_self", 2);
$Nav->addCustomNav("Contributors", "contributors.php", "_self", 2);

?>
