<?PHP
/*
Description: Installs a minimalistic Unity 3D desktop for Ubuntu 16.04 LTS with German language.
Priority:20
*/

function run($id)
{
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');

	UBUNTU_desktopInstall(UBUNTUDESKTOP_UNITY3D_MINIMAL_1604, false, true, true, true, true, false, false);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");

	executeNextWork();
}
?>