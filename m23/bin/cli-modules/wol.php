<?php
/*
Description: Wakes a client over the network.
Parameter: Name of the client to wake.
*/

function run($argc, $argv)
{
	$client = $argv[2];

	$clientO = new CClient($client, CClient::CHECKMODE_MUSTEXIST);
	$clientO->wol();
}
?>
