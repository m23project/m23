<?PHP
/*
Description: Ubuntu 16.04 LTS Trinity Desktop
Priority:20
*/

function run($id)
{
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');

// 	UBUNTU_desktopInstall(UBUNTUDESKTOP_TRINITY_MINIMAL_1604, false, true, false, false, true, true);

	KDE_prepare();
	/* =====> */ MSR_statusBarIncCommand(1);

	TRINITY_install($lang);
// 	TRINITY_install($lang,true, 'desktop-base-trinity kde-trinity');

	/* =====> */ MSR_statusBarIncCommand(74);

	TRINITY_installLoginManager($lang);
	/* =====> */ MSR_statusBarIncCommand(25);


	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");

	executeNextWork();
}
?>