<?PHP
/*
Description: Installs the Gnome based Ubuntu desktop for Ubuntu 18.04 LTS
Priority:20
*/

function run($id)
{
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');

	UBUNTU_desktopInstall(UBUNTUDESKTOP_UBUNTU_1804, false, true, true, true, true);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");

	executeNextWork();
}
?>