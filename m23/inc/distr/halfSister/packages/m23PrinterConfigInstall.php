<?PHP
/*
Description: Printer detection
Priority:25
*/

function run($id)
{
	$serverIP=getServerIP();

	$lang=getClientLanguage();

	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");

	HS_sysInstallPrinter();
	HS_sysConfigurePrinter();

	/* =====> */ MSR_statusBarIncCommand(100);

	MSR_logCommand("/tmp/m23PrinterConfig.log");

	sendClientStatus($id,"done");

	executeNextWork();
}
?>
