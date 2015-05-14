<?php
/*
Description: Fetches the names of all clients with green status.
*/

function run($argc, $argv)
{
	$CClientListerO = new CClientLister;

	// List only clients that can NOT be pinged
	$CClientListerO->addStatusFilter('=', CClient::STATUS_GREEN);

	// Show the clients that can NOT be pinged
	echo(implode("\n",$CClientListerO->getClientNames()));
}
?>
