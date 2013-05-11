<?PHP
/*
Description: Config Upstart for normal usage
Priority:80
*/


function run($id)
{
	include('/m23/inc/distr/debian/clientConfigCommon.php');

	CLCFG_configUpstartForNormalUsage();

	/* =====> */ MSR_statusBarIncCommand(100);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	executeNextWork();
}
?>
