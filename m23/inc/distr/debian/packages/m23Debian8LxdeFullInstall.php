<?PHP
/*
Description: Debian 8 full LXDE desktop
Priority:20
*/

function run($id)
{
	include_once('/m23/inc/distr/debian/clientConfig.php');

	DEBIAN_desktopInstall(DEBIAN8DESKTOP_LXDE_FULL);

	sendClientStageStatus(STATUS_GREEN);
	sendClientStatus($id,"done");
	executeNextWork();
}
?>