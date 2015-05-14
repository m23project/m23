<?php
/*
Description: Shows the contents of a package sources list.
Parameter: Name of the package sources list.
Returns: 0 when the sources list could be shown, 1 the sources list doesn't exists (or is empty), 2 when no command line parameter is given.
*/

function run($argc, $argv)
{
	// Check, if a package sources list name was given on the command line
	if (!(isset($argv[2])))
		exit(2);

	$packageSource = $argv[2];

	// Try to load the sources list
	$list = SRCLST_loadSourceList($packageSource);

	// Check, if it could be fetched
	if (empty($list))
		exit(1);
	
	echo("$list\ndeb http://".getServerIP()."/extraDebs/ ./");
	exit(0);
}

?>