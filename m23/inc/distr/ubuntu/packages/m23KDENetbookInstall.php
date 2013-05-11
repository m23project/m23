<?PHP
/*
Description: KDE desktop for netbooks
Priority:20
*/


function run($id)
{
	include_once('/m23/inc/distr/debian/clientConfigCommon.php');
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');

	UBUNTU_desktopInstall(UBUNTUDESKTOP_KDENETBOOK, false, true, true, true, true);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");

	executeNextWork();
}
?>