<?PHP
/*
Description:XFree86 or XOrg base system
Priority:15
*/
function run($id)
{
	$lang=getClientLanguage();
	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
	include('/m23/inc/distr/ubuntu/clientConfigCommon.php');

	HS_pkgInstallX();

/* =====> */ MSR_statusBarIncCommand(100);

	sendClientStatus($id,"done");
	executeNextWork();
}
?>
