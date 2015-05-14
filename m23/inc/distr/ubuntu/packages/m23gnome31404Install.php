<?PHP
/*
Description: GNOME 3 desktop
Priority:20
*/



function run($id)
{
	include_once('/m23/inc/distr/debian/clientConfigCommon.php');
	
	$lang = getClientLanguage();

	GNOME3_install($lang, false, 'gdm');
	/* =====> */ MSR_statusBarIncCommand(100);

	MSR_logCommand("/tmp/m23sourceupdate.log");

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");

	executeNextWork();
}
?>