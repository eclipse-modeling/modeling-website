<?php

// Functions and variables common to build, promote, etc.

$downloadsDir = $writableBuildRoot . "/build/downloads";
$workDir = $writableBuildRoot . "/build/";		
$dependenciesURLsFile = $writableBuildRoot . "/build/requests/dependencies.urls.txt"; // read-write, one shared file

function getValueFromOptionsString($opt, $nameOrValue)
{
	if (strstr($opt, "|selected"))
	{ // remove the |selected keyword
		$opt = substr($opt, 0, strpos($opt, "|selected"));
	}
	if (strstr($opt, "="))
	{ // split the name=value pairs, if present
		if ($nameOrValue == "name" || $nameOrValue === 0)
		{
			$opt = substr($opt, 0, strpos($opt, "="));
		}
		else
			if ($nameOrValue == "value" || $nameOrValue == 1)
			{
				$opt = substr($opt, strpos($opt, "=") + 1);
			}
	}
	return $opt;
}

function displayOptions($options, $verbose = false, $selected = -1)
{
	$matches = null;
	if (isset($options["reversed"]) && $options["reversed"])
	{
		// pop that item out
		array_shift($options);
		$options = array_reverse($options);
	}

	foreach ($options as $o => $option)
	{
		$opt = $option;
		$isSelected = false;
		if (!preg_match("/\-\=[\d\.]+/", $opt))
		{
			if (strstr($opt, "|selected"))
			{ // remove the |selected keyword
				$isSelected = true;
				$opt = substr($opt, 0, strpos($opt, "|selected"));
			}
			if (strstr($opt, "="))
			{ // split line so that foo=bar becomes <option value="bar">foo</option>
				$matches = null;
				preg_match("/([^\=]+)\=([^\=]*)/", $opt, $matches);
				print "\n\t<option " . ($isSelected || $selected == $o ? "selected " : "") . "value=\"" . trim($matches[2]) . "\">" .
				($verbose ? trim($matches[2]) . " | " : "") . trim($matches[1]) .
				"</option>";
			}
			else if (strstr($opt,"http") && strstr($opt,"drops"))
			{ // turn http://foo/bar.zip into <option value="http://foo/bar.zip">bar.zip</option>
				print "\n\t<option " . ($isSelected || $selected == $o ? "selected " : "") . "value=\"" . $opt . "\">" .
					substr($opt,6+strpos($opt,"drops")) . "</option>";
			}
			else
			{ // turn foo into <option value="foo">foo</option>
				print "\n\t<option " . ($isSelected || $selected == $o ? "selected " : "") . "value=\"" . $opt . "\">" . $opt . "</option>";
			}
		}
	}
}
?>