<?PHP
/*
Description: Gnome Desktop
Priority:20
*/


function run($id)
{
	$server=getServerIP();

	$lang=getClientLanguage();

	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
	include("/m23/inc/distr/halfSister/clientConfig.php");

	HS_pkgInstallGnome();
	/* =====> */ MSR_statusBarIncCommand(100);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	executeNextWork();
}
?>
