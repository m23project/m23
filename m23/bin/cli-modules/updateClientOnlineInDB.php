<?php
/*
Description: Script to update the online status of the clients in the DB cyclically.
*/



/**
**name getClientIPArray()
**description Generates an associative array with the client names as keys and their IPs as values.
**returns: Associative array with the client names as keys and their IPs as values.
**/
function getClientIPArray()
{
	$clients = array();

	// Get information about all clients
	$res = CLIENT_getAllAsRes();
	while ($clientLine = mysqli_fetch_assoc($res))
	{
		// Add the client only if it has a valid IP
		if (CHECK_ip($clientLine['ip']))
			$clients[$clientLine['client']] = $clientLine['ip'];
	}

	return($clients);
}





/**
**name isAlive($line)
**description Checks, if the input line contains "alive".
**parameter: line: Input line that may contain "alive".
**returns: true if the input line contains "alive", otherwise false.
**/
function isAlive($line)
{
	return(strpos($line, 'alive') !== false);
}





function run($argc, $argv)
{
	while (true)
	{

		$start = time();
	
		$clientsIPs = getClientIPArray();
		
		// Ping all clients
		exec('fping '.implode(' ', $clientsIPs).' 2> /dev/null', $out);
	
		// Generate a new array with entries only containing alive IPs
		$aliveIPs = array_filter($out, 'isAlive');

		// Set all clients to offline
		DB_query("UPDATE clients SET online='0';");

		if (!empty($aliveIPs))
		{
			$sql = "UPDATE clients SET online='1' WHERE";
			$or = '';
			
			// Get the lines from active IPs
			foreach ($aliveIPs as $line)
			{
				// eg. $line = '192.168.1.77 is alive'
				$IPOtherParts = explode(' ',$line);

				$sql .= $or.' ip = "'.$IPOtherParts[0].'"';
				$or = ' OR';
				
				echo("Active: $IPOtherParts[0]\n");
			}

			$sql .= ';';
			DB_query($sql);
		}

		// Wait 5 minutes until next run
		sleep(300 - (time() - $start));
	}
}

?>