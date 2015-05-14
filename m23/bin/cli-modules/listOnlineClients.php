<?php
/*
Description: Shows the clients that can be pinged
*/

function run($argc, $argv)
{
	$CClientListerO = new CClientLister;

	// List only clients that can be pinged
	$CClientListerO->setVisibleByPingableFilter(true);

	// Show the clients that can be pinged
	echo(implode("\n",$CClientListerO->getClientNames()));
}
?>
