<?php
$theme="Lazarus";
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

function boxhead($title)
{
$boxhead = <<<EOHTML
	<div style='margin-bottom: 1em;'>
		<div class="">
			<b class="blueonwhite">
			<b class="blueonwhite1"><b></b></b>
			<b class="blueonwhite2"><b></b></b>
			<b class="blueonwhite3"></b>

			<b class="blueonwhite4"></b>
			<b class="blueonwhite5"></b></b>
			<div class="blueonwhitefg">
				<span class="boxheader">$title</span>
				<div class="">
					<b class="whiteonblue">
					<b class="whiteonblue1"><b></b></b>
					<b class="whiteonblue2"><b></b></b>
					<b class="whiteonblue3"></b>
		
					<b class="whiteonblue4"></b>
					<b class="whiteonblue5"></b></b>
					<div class="whiteonbluefg">
				 		<div style="height: 1px; visibility: hidden;">.</div>
				 		<!-- std component -->
						<div class="portal-component">
					  		<div>
EOHTML;
return $boxhead;
}

$boxfoot = <<<EOHTML
					  		</div>
						</div>
						<div style="height: 1px; visibility: hidden;">.</div>
					</div>
					<b class="whiteonblue">
					<b class="whiteonblue5"></b>
					<b class="whiteonblue4"></b>
					<b class="whiteonblue3"></b>
					<b class="whiteonblue2"><b></b></b>
					<b class="whiteonblue1"><b></b></b></b>
				</div>
				<div style="height: 1px; visibility: hidden;">.</div>
			</div>
			<b class="blueonwhite">
			<b class="blueonwhite5"></b>
			<b class="blueonwhite4"></b>
			<b class="blueonwhite3"></b>
			<b class="blueonwhite2"><b></b></b>
			<b class="blueonwhite1"><b></b></b></b>
		</div>
	</div>
EOHTML;
?>

<table width="100%"><tr valign="middle">
	<td>
		<div id="midcolumn3col">
			<h3 style="padding-left: 2em">Ye find yeself in yon portal. What wouldst thou deau? <a href="http://www.hrwiki.org/index.php/Thy_Dungeonman">*</a></h3>
		</div>
	</td>
	<td align="center">
		<form><input type="button" value="Log ye out"/></form>
	</td>
</tr>

<tr valign="top"><td>
	<div id="midcolumn">
		<table>
			<tr>
				<td><img src="portal-1.png"/></td>
				<td>&#160;</td>
				<td><img src="portal-2.png"/></td>
			</tr>
			<tr>
				<td><img src="portal-2.png"/></td>
				<td>&#160;</td>
				<td><img src="portal-1.png"/></td>
			</tr>
		</table>
		
		<p align="center"><a href="#">Report ye bugs and get ye flask enhancements via bugzilla</a></p>
	</div>
</td><td>
	<div id="midcolumn">
		<?php print boxhead("IPZilla Mailing Lists"); ?>
			<p>Sign up anyone in your organization to a mailing list for tracking incoming or completed IPZilla contribution questionnaires (CQs), both lists are emailed once at midnight every night.</p>
			<ul>
				<li>Incoming: <b>dennis@flask.ye.get</b></li> 	 	
				<li>Completed: <b>dennis@flask.ye.get</b></li>
			</ul>
			<p align="right"><a href="#">[edit]</a></p>
		<?php print $boxfoot; ?>
	
		<?php print boxhead("Project Reviews"); ?>
			<p>Project Review conference call numbers:</p>
			<ul>
				<li><b>+1.613.***.****</b><br/> (Ottawa &amp; int'l) or</li>
				<li><b>+1.***.***.****</b><br/>(toll-free N. America)</li>
				<li>passcode <b>*******</b></li>
			</ul>
		<?php print $boxfoot; ?>
	
		<?php print boxhead("Committer Tools"); ?>
			<ul>
				<li><a href="#">Change my Eclipse.org password</a></li>
				<li><a href="#">Project-Category management</a></li>
				<li><a href="#">Bugzilla components, targets, versions</a></li>
				<li><a href="#">Committer mailing list archive</a></li>
			</ul>
		<?php print $boxfoot; ?>
	
		<?php print boxhead("Website Tools"); ?>
			<ul>
				<li><a href="#">Accessing system databases with PHP</a></li>
				<li><a href="#">Download stats</a></li>
				<li><a href="#">Web server statistics</a></li>
			</ul>
		<?php print $boxfoot; ?>
	
		<?php print boxhead("Infrastructure Tools"); ?>
			<ul>
				<li><a href="#">List of file paths</a></li>
				<li><a href="#">How Do I?</a></li>
				<li><a href="#">Disk space and quotas</a></li>
				<li><a href="#">Eclipse infra status</a></li>
				<li><a href="#">DNS test</a></li>
			</ul>
		<?php print $boxfoot; ?>
	
		<?php print boxhead("My Contact Info"); ?>
			<p>H*R Software Canada<br/>
			2 The Stick Drive<br/>
			Strongbadia, OH<br/>
			Free Country<br/>
			<br/>
			416.***.**** (p)<br/> 
			647.***.**** (m)<br/>
			thyslave@flask.ye.get<br/>
			<a href="http://divby0.blogspot.com">http://divby0.blogspot.com</a><br/>
			43:45:06N, 79:11:16W</p>
			<p align="right"><a href="#">[edit]</a></p>
		<?php print $boxfoot; ?>
		
	</div>
</td></tr></table>
<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Get Ye Portal";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "NIck Boldt";

$Nav->setLinkList(null);
$Nav->addNavSeparator("Ye Portal", "#");

$projects = array(
	"eclipse.platform", "modeling", "modeling.emf", "modeling.emft", "modeling.gmf", 
	"modeling.m2t", "modeling.mdt", "technology.dash", "technology.soc", "tools.gef"
);
foreach ($projects as $z)
{
	$Nav->addCustomNav($z, "#$z", "_self", 2);
}
$Nav->addNavSeparator("Ye Info", "#");
$Nav->addCustomNav("IPZilla Mailing Lists", "#", "_self", 2);
$Nav->addCustomNav("Project Reviews", "#", "_self", 2);

$Nav->addNavSeparator("Ye Tools", "#");
$Nav->addCustomNav("Committer Tools", "#", "_self", 2);
$Nav->addCustomNav("Website Tools", "#", "_self", 2);
$Nav->addCustomNav("Infrastructure Tools", "#", "_self", 2);

$Nav->addNavSeparator("Ye Profile", "#");
$Nav->addCustomNav("My Contact Info", "#", "_self", 2);

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"portal.css\"/>\n");
$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"balloon.css\"/>\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
