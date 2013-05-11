<?PHP
/*
Description: Trinity Desktop Environment
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

	TRINITY_install($lang);
// 	TRINITY_install($lang,true, 'desktop-base-trinity kde-trinity');

	/* =====> */ MSR_statusBarIncCommand(74);

	TRINITY_installLoginManager($lang);
	/* =====> */ MSR_statusBarIncCommand(25);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	executeNextWork();
}
?>
