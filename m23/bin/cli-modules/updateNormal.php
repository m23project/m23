<?php
/*
Description: Updates a client in normal mode (apt-get upgrade).
Parameter: Clientname to update.
*/

function run($argc, $argv)
{
	$client = $argv[2];

	$clientO = new CClient($client);

	$clientO->addNormalUpdateJob();

	$clientO->addUpdateSourcesListJob();
	$clientO->addUpdatePackageInfosJob();
}

?>
