<?php
/*
Description: Shows the MAC address of a client.
Parameter: Clientname / client's IP
Returns: 0 when client MAC clould be shown, 1 the client doesn't exists, 2 when no command line parameter is given.
*/

function run($argc, $argv)
{
	if (!(isset($argv[2])))
		exit(2);

	$clientNameOrIP = $argv[2];

	// Check, if an IP is given as parameter => convert to client name
	if (checkIP($clientNameOrIP))
		$clientName = CLIENT_getNamebyIP($clientNameOrIP);
	else
		$clientName = $clientNameOrIP;

	// If the client doesn't exist => exit
	if (!CLIENT_exists($clientName))
		exit(1);

	// Show the MAC address
	echo(CLIENT_convertMac(CLIENT_getMACbyName($clientName), ':'));

	exit(0);
}
?>