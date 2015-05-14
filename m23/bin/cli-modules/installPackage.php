<?php
/*
Description: Installs a package on a client.
Parameter: Clientname to install the package on.
Parameter: Packagename to install.
Parameter: Priority (optional). If not set, the default priority will be used.
*/

function run($argc, $argv)
{
	$client = $argv[2];
	$packageName = $argv[3];

	$clientO = new CClient($client);

	// With extra priority setting?
	if (!empty($argv[4]))
		$clientO->addNormalJob($packageName, $argv[4]);
	else
		$clientO->addNormalJob($packageName);

	$clientO->addUpdateSourcesListJob();
	$clientO->addUpdatePackageInfosJob();
}

?>
