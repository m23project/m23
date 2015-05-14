<?php
/*
Description: Fetches the IPs of all clients in a group.
Parameter: Groupname or 'all'.
Returns: 0 when the IPs clould be shown, 1 the group doesn't exists, 2 when no command line parameter is given.
*/

function run($argc, $argv)
{
	// Check, if a group name was given on the command line
	if (!(isset($argv[2])))
		exit(2);

	$groupName = $argv[2];

	// Check, if a group with the given name exists
	if (!GRP_exists($groupName) && ('all' != $groupName))
		exit(1);

	$ips = array();
	$i = 0;
	
	if ('all' === $groupName)
		// Get all clients
		$clients = CLIENT_getAllClientNames();
	else
		// Get the clients in the given group
		$clients = GRP_listAllClientsInGroup($groupName);

	// Build an array with the IPs of the clients in the group
	foreach ($clients as $clientName)
		$ips[$i++] = CLIENT_getIPbyName($clientName, true);

	natsort($ips);

	foreach ($ips as $ip)
		echo("$ip\n");
}

?>