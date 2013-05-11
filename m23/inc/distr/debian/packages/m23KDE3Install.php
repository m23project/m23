<?PHP
/*
Description: KDE 3 Desktop
Priority:20
*/


function run($id)
{
	$server=getServerIP();

	$lang=getClientLanguage();

	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
	include('/m23/inc/distr/debian/clientConfigCommon.php');

	KDE_prepare();
	/* =====> */ MSR_statusBarIncCommand(1);

	KDE_install($lang);
	/* =====> */ MSR_statusBarIncCommand(74);

	KDE_installLoginManager($lang);
	/* =====> */ MSR_statusBarIncCommand(25);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	executeNextWork();
}
?>
