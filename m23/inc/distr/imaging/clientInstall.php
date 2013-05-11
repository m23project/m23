<?PHP

/*
	Client installation script for the preinstalled images (Images).
*/

/**
**name DISTR_baseInstall($lang,$id)
**description makes the base installation if the distribution
**parameter lang: language for the messages
**parameter id: package id of the m23baseSys package
**/
function DISTR_baseInstall($lang,$id)
{
	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
	include_once("/m23/data+scripts/packages/m23CommonInstallRoutines.php");

	$clientParams=CLIENT_getAskingParams();
	$clientOptions=CLIENT_getAllAskingOptions();

	CIR_writeClientID($clientParams);

	CIR_detectSCSI();

	CIR_enableDropbear();

	CLCFG_activateDMA();

/*
download the base image file from server
and store it to the mounted root directory
*/
	
	$enableMBR = IMG_clientRestoreAll($clientOptions, $lang);

	//install the generic MBR or an MBR from a file.
	IMG_installMBR($clientOptions);
};





/**
**name DISTR_startInstall($client,$desktop,$instPart,$swapPart)
**description starts the installation of the distribution
**parameter client: name of the client
**parameter desktop: GUI name
**parameter instPart: partition to install the OS on
**parameter swapPart: swap partition
**/
function DISTR_startInstall($client,$desktop,$instPart,$swapPart)
{
	$options = CLIENT_getAllOptions($client);

	$distr = $options['distr'];

	PKG_addJob($client,"m23baseSys",PKG_getSpecialPackagePriority("m23baseSys",$distr),"instPart=$instPart#swapPart=$swapPart");

	//get the name of the distribution the image should be configured like
	$extraDistr = $options['configLikeDistr'];

	if (strlen(trim($extraDistr)) > 0)
		PKG_addJob($client,"m23baseSys",PKG_getSpecialPackagePriority("m23baseSys",$extraDistr) + 1, "instPart=$instPart#swapPart=$swapPart#extraDistr=$extraDistr");

	//update package infos
	PKG_addJob($client,"m23UpdatePackageInfos",PKG_getSpecialPackagePriority("m23UpdatePackageInfos",$extraDistr),"");

	//Make sure that the client is in the same state (running or turned off) after the insallation like before.
	PKG_addShutdownOrRebootPackage($client);


	CLIENT_startInstall($client);
};
?>