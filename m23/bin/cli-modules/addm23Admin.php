<?php
/*
Description: Creates a new admin account for the m23 webinterface
Parameter: Name of the new admin.
Parameter: Password of the new admin account.
*/

function run($argc, $argv)
{

	// Check, if only the admin name was given
	if ($argc === 3)
		$password1 = readline('Enter password:');
	// Check, if admin name and password are given
	elseif ($argc === 4)
		$password1 = $argv[3];
	else
		die("ERROR: Wrong parameter count\n");

	$newadmin = $argv[2];

	$m23AdminO = new Cm23Admin($newadmin,$password1);
	$m23AdminO->showMessages();
}
?>
