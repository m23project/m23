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

	// Generate a new CFDiskIO object
	$client = CLIENT_getClientName();
	$CFDiskIOO = new CFDiskBasic($client);

	CIR_writeClientID($clientParams);

	CIR_detectSCSI();

	CIR_enableDropbear();

	CLCFG_activateDMA();

/*
download the base image file from server
and store it to the mounted root directory
*/
	
	$enableMBR = IMG_clientRestoreAll($clientOptions, $lang);
	/* =====> */ MSR_statusBarIncCommand(95);

	CLCFG_mountRootDir($clientOptions['instPart'], 'root', $CFDiskIOO);
	
	echo("
	
	mkdir -p /mnt/root/tmp
	
	cd /mnt/root
	mount -t proc proc proc/
	mount -t sysfs sys sys/
	mount -o bind /dev dev/
	mount -o bind /dev/pts dev/pts/
	
	");

	//install the generic MBR or an MBR from a file.
	IMG_installMBR($clientOptions);

//write afterChrootInstall.sh
	DISTR_afterChrootInstall($lang,$id);
	/* =====> */ MSR_statusBarIncCommand(1);

	CLCFG_executeAfterChroot();

	die("\nexit 0\n");

	/* =====> */ MSR_statusBarIncCommand(5);
};





/**
**name DISTR_afterChrootInstall($lang,$pkgid)
**description generates a script that is executed after the chrooting
**parameter lang: language for the messages
**parameter pkgid: package id of the m23baseSys package
**/
function DISTR_afterChrootInstall($lang,$pkgid)
{
	$serverIP=getServerIP();

	$additionalPackages = '';

	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
	include_once('/m23/inc/client.php');
	include_once('/m23/inc/sourceslist.php');

	//get parameters (username, first password, etc.) of the asking clients
	$clientParams = CLIENT_getAskingParams();
	$clientOptions = CLIENT_getAllAskingOptions();
	
	



echo("

rm /mnt/root/tmp/afterChrootInstall.sh 2> /dev/null
cat >> /mnt/root/tmp/afterChrootInstall.sh << \"ACIEOF\"
#!/bin/sh

export PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/bin/X11

export DEBIAN_FRONTEND=noninteractive

");

	CLCFG_hostname($clientParams['client']);
	CLCFG_interfaces($clientParams);
	/* =====> */ MSR_statusBarIncCommand(2);

	//list of DNS servers
	$DNSServers[0]=$clientParams['dns1'];
	$DNSServers[1]=$clientParams['dns2'];
	CLCFG_resolvConf($DNSServers);

	ASSI_prepareClient();

	MSR_getClientSettingsCommand();

	// Added by FABR
	// Re-configure EFI boot if this is required
	IMG_ReconfigureEFI($clientOptions);

echo("
	grub-install $clientOptions[mbrPart]
	update-grub
	sync
");

	sendClientStatus($pkgid,"done");

	sendClientStageStatus(STATUS_GREEN);

	CLCFG_executeNextWorkEveryMinute($lang);

echo("
ACIEOF

chmod +x /mnt/root/tmp/afterChrootInstall.sh
\n");
}





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
	$params = CLIENT_getParams($client);

	$distr = $options['distr'];

	PKG_addJob($client,"m23baseSys",PKG_getSpecialPackagePriority("m23baseSys",$distr),"instPart=$instPart#swapPart=$swapPart");

	PKG_addUser($client, $options['login'], $params['firstpw'], false, '', '', true);
	
	//update package infos
	PKG_addJob($client,"m23UpdatePackageInfos",PKG_getSpecialPackagePriority("m23UpdatePackageInfos",$extraDistr),"");

	//Make sure that the client is in the same state (running or turned off) after the insallation like before.
	PKG_addShutdownOrRebootPackage($client);

	CLIENT_startInstall($client);
};
?>