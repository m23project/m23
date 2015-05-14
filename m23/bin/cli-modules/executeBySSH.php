<?php
/*
Description: Runs a commands under a plain BASH with root rights on the client.
Parameter: Clientname to execute the commands on.
Parameter: Commands.
*/

function run($argc, $argv)
{
	$client = $argv[2];
	$cmds = $argv[3];

	if (!isset($client{1}))
		die('ERROR: Clientname not set (1th parameter)');

	if (!isset($cmds{1}))
		die('ERROR: Commands to execute not set (2nd parameter)');

	$clientO = new CClient($client);

	// Execute the commands and show the result
	echo($clientO->executeBySSH($cmds));
}

?>
