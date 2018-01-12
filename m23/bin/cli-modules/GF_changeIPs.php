<?php
/*
Description: Changes the IPs and netmasks of the m23 clients in the m23 DB and UCS LDAP
*/

function run($argc, $argv)
{
	$netmaskBits = 23;
	$netmask = CLIENT_getNetmaskFromBitAmount($netmaskBits);

	$res = CLIENT_getAllAsRes();
	while ($clientLine = mysqli_fetch_assoc($res))
	{
		$client = $clientLine['client'];
	
		// Skip localhost, fake entry in the m23 DB for creating VMs on the m23 server
		if ('localhost' == $client) continue;

		// Change IP: a.b.x.d => a.b.0.d
		$ipParts = explode('.', $clientLine['ip']);
		$ipParts[2] = 0;
		$newIP = implode ('.', $ipParts);
		
		echo("\n$client: $clientLine[ip] => $newIP, $clientLine[netmask] => $netmask");

		UCS_modifyClientIP($client, $newIP, $netmaskBits);

		// Create a new CClient object
		$CClientO = new CFDiskIO($client, CClient::CHECKMODE_MUSTEXIST);
		$CClientO->setNetmask($netmask);
		$CClientO->setIP($newIP);
		// Destroy the object again
		$CClientO = null;
	}
}

?>
