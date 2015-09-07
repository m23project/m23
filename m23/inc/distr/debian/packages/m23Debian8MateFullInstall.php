<?PHP
/*
Description: Debian 8 full Mate desktop
Priority:20
*/

function run($id)
{
	include_once('/m23/inc/distr/debian/clientConfig.php');

	DEBIAN_desktopInstall(DEBIAN8DESKTOP_MATE_FULL);

	sendClientStageStatus(STATUS_GREEN);
	sendClientStatus($id,"done");
	executeNextWork();
}
?>