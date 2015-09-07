<?PHP
/*
Description: Debian 8 full Kde desktop
Priority:20
*/

function run($id)
{
	include_once('/m23/inc/distr/debian/clientConfig.php');

	DEBIAN_desktopInstall(DEBIAN8DESKTOP_KDE_FULL);

	sendClientStageStatus(STATUS_GREEN);
	sendClientStatus($id,"done");
	executeNextWork();
}
?>