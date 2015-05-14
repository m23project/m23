<?PHP
/*
Description: Config Upstart for normal usage
Priority:80
*/


function run($id)
{
	include('/m23/inc/distr/debian/clientConfigCommon.php');

	CLCFG_configUpstartForNormalUsage();
	
	// Generate a new CFDiskIO object
	$client = CLIENT_getClientName();
	$CFDiskIOO = new CFDiskIO($client);
	CLCFG_efi($CFDiskIOO);

	/* =====> */ MSR_statusBarIncCommand(100);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	executeNextWork();
}
?>
