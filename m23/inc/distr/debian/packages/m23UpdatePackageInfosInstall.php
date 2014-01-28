<?PHP
/*
Description: Sends package status information to the server
Priority:25
*/
function run($id)
{
	include('/m23/inc/distr/debian/clientConfigCommon.php');

	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_updating_package_information);

	MSR_CopyClientPackageStatusCommand();
	/* =====> */ MSR_statusBarIncCommand(90);

	MSR_statusFileCommand();
	/* =====> */ MSR_statusBarIncCommand(10);

	sendClientStatus($id,"done");
	executeNextWork();
};
?>