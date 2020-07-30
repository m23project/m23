<?php
/*
Description: Script to update the online status of the clients in the DB cyclically.
*/





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
	$loopCounter = 0;

	while (true)
	{
		$start = time();

		$out = $aliveIPs = array();

		$clientsIPs = CLIENT_getClientIPArray();

		// Ping all clients
		exec('fping -r 1 -t 100 '.implode(' ', $clientsIPs).' 2> /dev/null', $out);
	
		// Generate a new array with entries only containing alive IPs
		$aliveIPs = array_filter($out, 'isAlive');

		// Set all clients to offline
		DB_query("UPDATE clients SET online='0';");
// 		print_r($aliveIPs);

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

		if (SERVER_isClientSshHttpsStatusEnabled())
		{
			echo("Advanced SSH/HTTPs tests: start\n");
			foreach ($aliveIPs as $line)
			{
				// eg. $line = '192.168.1.77 is alive'
				$IPOtherParts = explode(' ',$line);
				$clientIP = $IPOtherParts[0];
				$clientName = array_search($clientIP, $clientsIPs);
	
				// Skip the m23 server itself
				if ('localhost' == $clientName) continue;

				print("$clientName => $clientIP\n");
				
				$cmd = MSR_genericSendCommand('MSR_sshHttpsStatus', "ok=ok", '-qq', true);
				print("$cmd\n");
				
				CLIENT_executeOnClientOrIP($clientIP, "$clientName-sshHttpsStatus", MSR_genericSendCommand('MSR_sshHttpsStatus', "ok=ok", '-qq', true));
			}
			echo("Advanced SSH/HTTPs tests: done\n");
		}

		// Call CLIENT_updateReporting (possibly) on every 4th run of while loop, to update the database every 20 minutes
		if ((($loopCounter % 4) == 0) && SERVER_getExportIntoClientreporting())
			CLIENT_updateReporting();

		echo("Waiting 5 minutes for next round...\n");

		// Wait 5 minutes until next run
		sleep(300 - (time() - $start));

		$loopCounter++;
	}
}
?>