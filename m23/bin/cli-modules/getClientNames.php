<?php
/*
Description: Fetches the names of all clients.
*/

function run($argc, $argv)
{
	$CClientListerO = new CClientLister;

	// Show the clients that can NOT be pinged
	echo(implode("\n",$CClientListerO->getClientNames()));
}
?>
