<?php
/*
Description: Shows the clients that can NOT be pinged
*/

function run($argc, $argv)
{
	$CClientListerO = new CClientLister;

	// List only clients that can NOT be pinged
	$CClientListerO->setVisibleByPingableFilter(false);

	// Show the clients that can NOT be pinged
	echo(implode("\n",$CClientListerO->getClientNames()));
}
?>
