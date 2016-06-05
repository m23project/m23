<?PHP
/*
Description: Ubuntu 16.04 LTS Gnome Desktop
Priority:20
*/

function run($id)
{
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');

	UBUNTU_desktopInstall(UBUNTUDESKTOP_GNOME_1604, false, true, false, false, true, true);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");

	executeNextWork();
}
?>