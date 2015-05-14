<?PHP
/*
Description: Linux Mint 17 KDE Desktop
Priority:20
*/

function run($id)
{
	include_once('/m23/inc/distr/debian/clientConfigCommon.php');
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');

	UBUNTU_desktopInstall(MINT17_KDE, false, true, false, false, true, true);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	echo("

rm -r -f /etc/skel/.kde*

rm /tmp/*.sh

rm /tmp/*.php\n\n");

	executeNextWork();
}
?>