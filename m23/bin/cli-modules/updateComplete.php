<?php
/*
Description: Updates a client completely (apt-get dist-upgrade).
Parameter: Clientname to update.
*/

function run($argc, $argv)
{
	$client = $argv[2];

	$clientO = new CClient($client);

	$clientO->addCompleteUpdateJob();

	$clientO->addUpdateSourcesListJob();
	$clientO->addUpdatePackageInfosJob();
}

?>
