<?PHP
/*
Description: XFce Desktop
Priority:20
*/


function run($id)
{
	$server=getServerIP();

	$lang=getClientLanguage();

	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");

	HS_pkgInstallXFce();
	/* =====> */ MSR_statusBarIncCommand(100);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	executeNextWork();
}
?>
