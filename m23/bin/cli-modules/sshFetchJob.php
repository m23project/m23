<?php
/*
Description: Connects to the client via SSH and lets it fetch and execute the next job.
Parameter: Name of the client.
*/

function run($argc, $argv)
{
	$client = $argv[2];

	$clientO = new CClient($client);
	$clientO->sshFetchJob();
}
?>
