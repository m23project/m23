<?PHP
/*
Description: Linux Mint 13 Cinnamon Desktop
Priority:20
*/

function run($id)
{
	include_once('/m23/inc/distr/debian/clientConfigCommon.php');
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');

	UBUNTU_desktopInstall(MINT13DESKTOP_CINNAMON, false, true, false, false, true, true);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");

	executeNextWork();
}
?>