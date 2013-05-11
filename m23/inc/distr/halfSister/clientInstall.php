<?PHP

/*
	Client installation script for the halfSister meta distribution
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
//	include_once("/m23/data+scripts/packages/m23CommonInstallRoutines.php");

	$clientParams=CLIENT_getAskingParams();
	$clientOptions=CLIENT_getAllAskingOptions();

	//Get the name of the sources list
	$sourceName = $clientOptions['packagesource'];

	CIR_detectSCSI();

	CIR_enableDropbear();

	CLCFG_activateDMA();

	//Mount and change into the installation directory
	CLCFG_mountRootDir($clientOptions['instPart']);

	CIR_writeClientID($clientParams);

	//Fetch the m23HSAdmin tool to the RAM disk to enable the HS_* functions
	HS_fetchm23HSAdminAndm23hwscanner($clientOptions['release']);

	FDISK_genManualFstab(explodeAssoc("###",$clientOptions['fstab']),"/mnt/root",$sourceName);
	/* =====> */ MSR_statusBarIncCommand(2);

	$DNSServers[0]=$clientParams['dns1'];
	$DNSServers[1]=$clientParams['dns2'];

	if (!PKG_isReconfiguredWithExtraDistr($id))
		HS_fetchAndExtractOSImage($clientOptions['release'], $clientOptions['arch'], $DNSServers, $clientParams['gateway'], $clientOptions['packageProxy'], $clientOptions['packagePort']);

	echo("
			mkdir -p /tmp /mnt/root/tmp
			cd /mnt/root/tmp\n
	");

	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_writing_configfiles);

	/*
		Install some stuff on the client before chrooting
	*/
	HS_netSetm23SSLCertificate("/mnt/root");

	//Write the m23HSAdmin and m23hwscanner on the client's disk
	HS_fetchm23HSAdminAndm23hwscanner($clientOptions['release'], "/mnt/root");
	/* =====> */ MSR_statusBarIncCommand(2);

	//write afterChrootInstall.sh
	DISTR_afterChrootInstall($lang,$id);
	/* =====> */ MSR_statusBarIncCommand(1);

	CLCFG_executeAfterChroot();
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

	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
	include_once('/m23/inc/client.php');
	include_once('/m23/inc/sourceslist.php');

	//get parameters (username, first password, etc.) of the asking clients
	$clientParams = CLIENT_getAskingParams();
	$clientOptions = CLIENT_getAllAskingOptions();
	
	$clientName = $clientParams['client'];

	//Get the name of the sources list
	$sourceName = $clientOptions['packagesource'];

	echo("

cat >> /mnt/root/tmp/afterChrootInstall.sh << \"ACIEOF\"
#!/bin/sh

export PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/bin/X11

echo 0 > /proc/sys/kernel/printk

cd /tmp
\n");

	//the rootDevice is the installation partition
	$instPart = $clientOptions['instPart'];
	$bootDevice = CLCFG_getMbrPart($instPart,$clientOptions);
	$instPartFS = CLCFG_getRootDeviceFS($instPart,$clientName);

	HS_hookBeginAfterChroot($instPart, $bootDevice, $instPartFS);

	/* =====> */ MSR_statusBarIncCommand(2);

	HS_sysSetm23ClientID($clientParams);

	//edit /etc/fstab
	HS_sysAddFstabEntries(explodeAssoc("###",$clientOptions['fstab']),$sourceName);

	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_setup_network);

	//Set IP, gatway, netmask, DNS and hostname.
	HS_netConfig($clientParams);

	//Set the proxy for the package manager
	HS_setPackageProxy($clientOptions);

	//Writes the package sources list for the client's package manager.
	HS_setSourcesList($clientParams['client']);

	HS_pkgUpdateCache();

	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_installing_base_packages);

	//Make sure, that basic needed packages are existing
	HS_pkgInstallBasePackages();

	HS_normalUpdate();

	//Install the kernel
	HS_sysInstallKernel($clientOptions['kernel']);

	/* =====> */ MSR_statusBarIncCommand(2);

	//install NTP package or not
	if ($clientOptions['getSystemtimeByNTP']=="yes")
		HS_netEnableNTP();
	else
		HS_netDisableNTP();

	//edit /etc/fstab again
// 	HS_sysAddFstabEntries(explodeAssoc("###",$clientOptions['fstab']),$sourceName);

	CLCFG_dialogInfoBox($I18N_client_installation,$I18N_client_status,$I18N_setup_bootmanager);
	HS_sysMakeBootable($instPart, $bootDevice, $instPartFS);


echo("

cd /tmp
\n");

	CLCFG_dialogInfoBox($I18N_client_installation,$I18N_client_status,$I18N_update_packagelist);

//sets the root password on the client
	HS_sysSetRootPW($clientParams['rootPassword']);
	/* =====> */ MSR_statusBarIncCommand(2);

//sets the client language
	HS_sysSetLanguage($clientParams['language']);

//generate commands for adding the user account on the client
	CLCFG_dialogInfoBox($I18N_client_installation,$I18N_client_status,$I18N_add_user);
	HS_sysAddUser((empty($clientOptions['login']) ? $clientParams['name'] : $clientOptions['login']), $clientParams['firstpw']);

//Add a job for compiling the VirtualBox guest module after the the first boot
// 	PKG_addJob($clientParams['client'],"m23VBoxKernelModule",PKG_getSpecialPackagePriority("m23VBoxKernelModule",""),"");

//sets the ssh authorized_file for remote login into the clients
	HS_netEnableSSHdAndImportKey(SERVER_getPublicSSHKeyOfm23Server());

	CLCFG_dialogInfoBox($I18N_client_installation,$I18N_client_status,$I18N_hardware_detection);

//sets the client's timezone
	HS_sysSetTimeZone($clientOptions[timeZone]);

//hardware detection
	HS_sysHWsetup();
	/* =====> */ MSR_statusBarIncCommand(2);

//write /etc/hosts
	HS_netWriteHosts();

	HS_netEnableNFSHome($clientOptions['nfshomeserver']);

	HS_netEnableLDAP($clientOptions);

	HS_sysWriteM23fetchjob();

	HS_sysWriteCrontabm23fetchjobEvery5Minutes($clientParams);

	HS_hookEndAfterChroot($instPart, $bootDevice, $instPartFS);

	sendClientStatus($pkgid,"done");

	if ($clientOptions['desktop']=="Textmode")
		sendClientStageStatus(STATUS_GREEN);

	CLCFG_hideKernelWarnings();

	/* =====> */ MSR_statusBarIncCommand(2);

echo("

TIME=0

while `true`
	do
");

	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_waiting_for_jobs);

	executeNextWork();

echo("

		sleep 60
		TIME=`expr \$TIME + 1`
	done
exit

ACIEOF

chmod +x /mnt/root/tmp/afterChrootInstall.sh

sed -i 's/\r//g' /mnt/root/tmp/afterChrootInstall.sh

\n");
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

	 if ($desktop != "Textmode")
		{
			//install XFree86
			PKG_addJob($client,"m23xfree864",PKG_getSpecialPackagePriority("m23xfree864",$distr),"");
			//install KDE
			PKG_addJob($client,"m23$desktop",PKG_getSpecialPackagePriority("m23$desktop",$distr),"");
		}

	 //update package infos
	 PKG_addJob($client,"m23UpdatePackageInfos",PKG_getSpecialPackagePriority("m23UpdatePackageInfos",$distr),"");

	//add printer detection job (or not)
	if ($options['installPrinter']=="yes")
		PKG_addJob($client,"m23PrinterConfig",PKG_getSpecialPackagePriority("m23PrinterConfig"),"");

	//Make sure that the client is in the same state (running or turned off) after the insallation like before.
	PKG_addShutdownOrRebootPackage($client);

	CLIENT_startInstall($client);
};
?>
