<?php
/*
Description: Adds an UCS client to the client preferences in m23.
Parameter: Client name
Parameter: The MAC of the client
Parameter: The client's IP address
Parameter: The client's netmask
Parameter: The client's gateway
Parameter: The client's first DNS server
*/

function run($argc, $argv)
{
	if ($argc != 8)
		die("Expected 6 parameters (".($argc - 2)." given).\n");

	$client = $argv[2];
	$mac = $argv[3];
	$ip = $argv[4];
	$netmask = $argv[5];
	$gateway = $argv[6];
	$dns1 = $argv[7];

	UCS_addUCSClientTom23ClientPreferences($client, $mac, $ip, $netmask, $gateway, $dns1);
}
?>
