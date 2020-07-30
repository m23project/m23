<?PHP
/*
Description: Installs the Kubuntu for Ubuntu 20.04 LTS
Priority:20
*/

function run($id)
{
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');

	UBUNTU_desktopInstall(UBUNTUDESKTOP_KUBUNTU_2004, false, true, true, true, true);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");

	executeNextWork();
}
?>
