<?php
/*
Description: Fetches the IPs of all clients.
Parameter: p1
Parameter: p2
*/

function run($argc, $argv)
{
	$ips = array();
	$i = 0;

	$res = CLIENT_getAllAsRes("ip");

	while ($client = mysql_fetch_assoc($res))
		$ips[$i++] = $client['ip'];

	natsort($ips);

	foreach ($ips as $ip)
		echo("$ip\n");
}

?>