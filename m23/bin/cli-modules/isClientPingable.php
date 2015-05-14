<?php
/*
Description: Checks, if a client could be pinged.
Parameter: Clientname / client's IP
Returns: 0 when client or IP is pingable, 1 if not, 2 when no client with the given name exists, 3 when no command line parameter is given
*/

function run($argc, $argv)
{
	if (!(isset($argv[2])))
		exit(3);

	$clientNameOrIP = $argv[2];

	if (checkIP($clientNameOrIP))
	{
		if (pingIP($clientNameOrIP))
		// IP is pingable
			exit(0);
		else
		// IP is not pingable
			exit(1);
	}
	
	$clientO = new CClient($clientNameOrIP, CClient::CHECKMODE_MUSTEXIST);
	if ($clientO->isPingable())
	// Client exists and is pingable
		exit(0);
	else
	// Client exists and is not pingable
		exit(1);
}
?>