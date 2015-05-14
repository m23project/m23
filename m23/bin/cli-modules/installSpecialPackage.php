<?php
/*
Description: Installs a special package on a client.
Parameter: Clientname to install the package on.
Parameter: Name of the special package to install.
Parameter: Package parameter (optional). If not set, no parameter will be used.
Parameter: Priority (optional). If not set, the default priority will be used.
*/

function run($argc, $argv)
{
	$client = $argv[2];
	$packageName = $argv[3];
	// With extra parameters?
	$params = (isset($argv[4]) ? $argv[4] : '');
	// With extra priority setting?
	$priority = (isset($argv[5]) ? $argv[5] : false);

	$clientO = new CClient($client);

	$clientO->addSpecialJob($packageName, $params, $priority);

	$clientO->addUpdateSourcesListJob();
	$clientO->addUpdatePackageInfosJob();
}

?>
