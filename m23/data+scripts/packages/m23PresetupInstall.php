<?PHP
/*
Description:Sends hardware data to the server
Priority:0
*/

include ('m23CommonInstallRoutines.php');
include ('/m23/inc/distr/debian/clientConfigCommon.php');

function run($id)
{
	$lang=getClientLanguage();
	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");

	$clientParams = CLIENT_getAskingParams();

	CIR_setDateAndTimeTemorarily();

	CIR_writeClientID($clientParams);

	CLCFG_copySSLCert("");

	if (PKG_getPackageParams($id)!="assimilate")
		{
			/* =====> */ MSR_statusBarCommand(false, $I18N_hardware_detection);
			CIR_detectSCSI();
			/* =====> */ MSR_statusBarIncCommand(25);

			CIR_enableDropbear();
			/* =====> */ MSR_statusBarIncCommand(25);
		}
	else
		MSR_statusBarIncCommand(50);

	CIR_transferClientIP();

	/* =====> */ MSR_statusBarIncCommand(25);

	MSR_partHwDataCommand();

	/* =====> */ MSR_statusBarIncCommand(25);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_YELLOW);

	/* =====> */ MSR_statusBarCommand(false, $I18N_waitingForJobsWithoutMinuteCounter);

	if (PKG_getPackageParams($id)!="assimilate")
		CIR_waitForNextJob();
	else
		executeNextWork();
};
?>	
