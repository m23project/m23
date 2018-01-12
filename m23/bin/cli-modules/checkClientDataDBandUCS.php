<?php
/*
Description: Checks if the client's name, IP and netmask are equal in the m23 DB and UCS LDAP
*/

function run($argc, $argv)
{
	
	$allClientsUCS = UCS_getAllClientNamesLDAP();
	natsort($allClientsUCS);
	
	$allClientsM23 = array();

	$res = CLIENT_getAllAsRes();
	while ($client = mysqli_fetch_assoc($res))
	{
		// Skip localhost, fake entry in the m23 DB for creating VMs on the m23 server
		if ('localhost' == $client['client']) continue;

		// Start the information line with the name of the client
		$infoLine = $client['client'].': ';

		// Get info about the client from the UCS LDAP
		$ucsInfo = UCS_getClientLDAPInfo($client['client']);

		// No information about the client found in the UCS LDAP?
		if (empty($ucsInfo))
		{
			echo("\nERR: $infoLine: NOT in UCS!");
			continue;
		}

		// Check for the client's name
		if ($ucsInfo['client'] == $client['client'])
			$infoLine .= 'Name: = , ';
		else
			$infoLine .= "Name: $ucsInfo[client] != $client[client] , ";

		// Check for the client's IP
		if ($ucsInfo['ip'] == $client['ip'])
			$infoLine .= 'IP: = , ';
		else
			$infoLine .= "IP: $ucsInfo[ip] != $client[ip] , ";

		// Check for the client's netmask
		$m23NetmaskBits = CLIENT_getNetmaskBits($client['netmask']);
		if ($ucsInfo['netmask'] == $m23NetmaskBits)
			$infoLine .= 'NM: =';
		else
			$infoLine .= "NM: $ucsInfo[netmask] != $m23NetmaskBits";

		// Check, if there are errors in the line
		if (strpos($infoLine, '!=') !== false)
			echo("\nERR: $infoLine");
		else
			echo("\nOK: $infoLine");

		// Add the client to the array with the clients from the m23 DB
		$allClientsM23[$client['client']] = $client['client'];
	}
	
	natsort($allClientsM23);

	// Check, if there are more or less clients in the UCS LDAP and the m23 DB
	$diff = array_diff($allClientsM23, $allClientsUCS);

	if (empty($diff))
		echo("\nClientNAMES are identically in m23 database and UCS LDAP :-)\n");
	else
	{
		echo("\nClientNAMES are NOT identically in m23 database and UCS LDAP :-(\n");

		echo("\n>>>m23 server\n");
		print_r($allClientsM23);

		echo("\n>>>UCS LDAP\n");
		print_r($allClientsUCS);

		echo("\n>>>Diff\n");
		print_r($diff);
	}
}

?>
