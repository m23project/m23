<?PHP
/*
Description: rescue console for the client
Priority:0
*/

include ('m23CommonInstallRoutines.php');
include ('/m23/inc/distr/debian/clientConfigCommon.php');

function run($id)
{
	$clientParams = CLIENT_getAskingParams();

	CIR_detectSCSI();
	/* =====> */ MSR_statusBarIncCommand(75);

	CIR_setDateAndTimeTemorarily();

	CIR_writeClientID($clientParams);
	
	CLCFG_copySSLCert("");

	CIR_enableDropbear();
	/* =====> */ MSR_statusBarIncCommand(25);

	echo("
			/bin/sh
		");

}
?>
