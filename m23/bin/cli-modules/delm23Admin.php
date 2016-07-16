<?php
/*
Description: Deletes an admin account of the m23 webinterface
Parameter: Name of the admin account.
*/

function run($argc, $argv)
{

	// Check, if only the admin name was given
	if ($argc === 3)
	{
		$m23AdminO = new Cm23Admin($argv[2]);
		$m23AdminO->delete();
	}
	else
		die("ERROR: Wrong parameter count\n");
}
?>
