<?PHP

/*
	Client installation script for the (K)Ubuntu distribution
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
	$CFDiskIOO = new CFDiskIO($client);

	CIR_writeClientID($clientParams);

	CIR_WorkaroundForMissingModulesDep();

	CIR_detectSCSI();

	CIR_enableDropbear();

	CLCFG_activateDMA();

	CLCFG_mountRootDir($clientOptions['instPart'], 'root', $CFDiskIOO);
	/* =====> */ MSR_statusBarIncCommand(2);

	if (!PKG_isReconfiguredWithExtraDistr($id))
	{
		if (!CLIENT_isBasesystemInstalledFromImage($clientOptions))
		{
				CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_installing_basesystem);
			/*
			download the base image file from server
			and store it to the mounted root directory
			*/
				$DNSServers[0]=$clientParams['dns1'];
				$DNSServers[1]=$clientParams['dns2'];
	
				$mirror=SRCLST_getMirror($clientOptions['packagesource']);
	
				CLCFG_debootstrap($clientOptions['release'],$DNSServers,$clientParams['gateway'],$clientOptions['packageProxy'],$clientOptions['packagePort'],$mirror,$clientOptions['arch'],"","",true,"parted wget",CLCFG_updateDebootstrapScriptsUbuntu);
	
				/* =====> */ MSR_statusBarIncCommand(55);
		}
	}

	echo("
			mkdir -p /tmp /mnt/root/tmp
			cd /mnt/root/tmp\n
	");

	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_writing_configfiles);

/*
install needed additional m23 tools on the client
*/
	CLCFG_fetchm23BasicTools();

	CLCFG_copySSLCert();
	/* =====> */ MSR_statusBarIncCommand(2);


//write afterChrootInstall.sh
	DISTR_afterChrootInstall($lang,$id);
	/* =====> */ MSR_statusBarIncCommand(1);

	CLCFG_executeAfterChroot();
}





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
	$clientParams=CLIENT_getAskingParams();
	$clientOptions=CLIENT_getAllAskingOptions();

	// Generate a new CFDiskIO object
	$client = CLIENT_getClientName();
	$CFDiskIOO = new CFDiskIO($client);

	echo("


cat >> /mnt/root/tmp/afterChrootInstall.sh << \"ACIEOF\"

export PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/bin/X11

export DEBIAN_FRONTEND=noninteractive

cd /tmp
\n");
	CIR_writeClientID($clientParams);

	CIR_WorkaroundForMissingModulesDep();
	
	//edit /etc/fstab
	$CFDiskIOO->genManualFstab('', $sourceName);

	CLCFG_configUpstartForChroot();
	/* =====> */ MSR_statusBarIncCommand(2);

	CLCFG_dialogInfoBox($I18N_client_installation,$I18N_client_status, $I18N_setup_network);

	/*
		generate configuration files
		- /etc/network/interfaces: IP, netmask, gateway
		- /etc/hostname
		- /etc/resolv.conf: DNS
		- /etc/apt/apt.conf.d/70debconf: proxy settings for downloading Debian packages
	*/
	CLCFG_hostname($clientParams['client']);
	CLCFG_interfaces($clientParams);
	/* =====> */ MSR_statusBarIncCommand(2);

	//list of DNS servers
	$DNSServers[0]=$clientParams['dns1'];
	$DNSServers[1]=$clientParams['dns2'];
	CLCFG_resolvConf($DNSServers);
	/* =====> */ MSR_statusBarIncCommand(2);

	CLCFG_aptConf($clientOptions['packageProxy'],$clientOptions['packagePort']);
	/* =====> */ MSR_statusBarIncCommand(4);

//generates /etc/apt/sources.list
	if (!PKG_isReconfiguredWithExtraDistr($pkgid))
		CLCFG_sourceslist($clientParams['ip'],$clientParams['client'],$serverIP);
		

	//if there are unmet dependencies, install necessary packages
	echo("

	apt-get --force-yes -y -f install

	mv /etc/wgetrc /etc/wgetrc.back
	apt-get --force-yes -y install wget lsb-release apt-utils
	mv /etc/wgetrc.back /etc/wgetrc

	apt-get --force-yes -y dist-upgrade

	if [ $? -ne 0 ]
	then
		apt-get --force-yes -y -f install
	fi

	");

	UBUNTU_fixBeforeBaseInstall($clientOptions);

	CLCFG_setDebconf($serverIP,"/distr/debian/m23client-debconf");
	/* =====> */ MSR_statusBarIncCommand(2);

	CLCFG_dialogInfoBox($I18N_client_installation,$I18N_client_status,$I18N_installing_base_packages);

	//generate fstab and write the bootmanager
	//the rootDevice is the installation partition
	$rootDevice = $clientOptions['instPart'];

	$bootDevice = CLCFG_getMbrPart($rootDevice,$clientOptions);

	//generate a fstab to make the kernel install correctly	
	CLCFG_genFakeFstab($rootDevice,$clientParams['client']);
	/* =====> */ MSR_statusBarIncCommand(2);

	//install NTP package or not
	if ($clientOptions['getSystemtimeByNTP']=="yes")
		$ntpPackage="ntpdate";
	else
		$ntpPackage="";

	CLCFG_aptGet('install', 'apt-transport-https');

	CLCFG_installBasePackages("apmd console-common console-data console-tools cron less screen sed ssh net-tools $ntpPackage parted gawk hdparm locales $clientOptions[bootloader] hwsetup hwdata-knoppix m23-initscripts m23hwscanner libncursesw5 pciutils mdadm m23-skel ". $clientOptions['kernel'],"ubuntu-keyring");
	/* =====> */ MSR_statusBarIncCommand(15);

	CLCFG_installFirmware();
	/* =====> */ MSR_statusBarIncCommand(5);

	UBUNTU_fixAfterBaseInstall($clientOptions['release']);

	//generate a new lilo.conf & fstab to make lilo install
	CLCFG_genFstab($bootDevice, $rootDevice, $clientOptions['bootloader'], $CFDiskIOO);

	//edit /etc/fstab
	$CFDiskIOO->genManualFstab('', $sourceName);

	CLCFG_efi($CFDiskIOO);

	CLCFG_dialogInfoBox($I18N_client_installation,$I18N_client_status,$I18N_setup_bootmanager);

echo("

cd /tmp
\n");

	CLCFG_dialogInfoBox($I18N_client_installation,$I18N_client_status,$I18N_update_packagelist);

//sets the root password on the client
	CLCFG_setRootPassword($clientParams['rootPassword']);
	/* =====> */ MSR_statusBarIncCommand(2);

//sets the client language
	CLCFG_language($clientParams['language']);

	if (($clientOptions['addNewLocalLogin']=="yes") || (!isset($clientOptions['addNewLocalLogin'])))
		PKG_addUbuntuUser($clientParams['client'], $clientOptions['login'], $clientParams['firstpw']);

//Disables getting root rights of normal users via sudo, if enabled in the options.
	if ($clientOptions['disableSudoRootLogin'] == 1)
		CLCFG_disableSudoRootLogin();

//sets the ssh authorized_file for remote login into the clients
	CLCFG_setAuthorized_keys($serverIP,"/packages/baseSys/authorized_keys");

	CLCFG_dialogInfoBox($I18N_client_installation,$I18N_client_status,$I18N_hardware_detection);

//sets the client's timezone
	CLCFG_setTimeZone($clientOptions['timeZone']);

//hardware detection
	CLCFG_hwdetect();
	/* =====> */ MSR_statusBarIncCommand(2);

//write /etc/hosts
	CLCFG_writeHosts();

	CLCFG_enableNFSHome($clientOptions['nfshomeserver']);

	CLCFG_enableLDAPUbuntu($clientOptions);

echo("

#make the real start-stop-daemon to the normal, otherwise you can't log into your system
mv /sbin/start-stop-daemon.REAL /sbin/start-stop-daemon

rm /debootstrap

#temporary Ubuntu fixes :-(

export DEBIAN_FRONTEND=noninteractive
dpkg --force-all --purge locales
apt-get -m --force-yes -qq -y install locales

#/dev/pts is needed to allow logins by SSH
mkdir -p /dev/pts

#####################

\n");

	CLCFG_disablePlymouth();

	CLCFG_writeM23fetchjob($clientOptions['release']);

	CLCFG_writeCrontabm23fetchjobEvery5Minutes($clientParams);

	sendClientStatus($pkgid,"done");

// 	if ($clientOptions['desktop']=="Textmode")
// 	{
// 		CLCFG_configUpstartForNormalUsage();
// 		sendClientStageStatus(STATUS_GREEN);
// 	}

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
	$distr = $options['distr'];

	PKG_addJob($client,"m23baseSys",PKG_getSpecialPackagePriority("m23baseSys",$distr),"instPart=$instPart#swapPart=$swapPart");

	 if ($desktop != "Textmode")
	{
		//install XFree86
		//if ($version > XX)
		PKG_addJob($client,"m23xfree864",PKG_getSpecialPackagePriority("m23xfree864",$distr),"");
		//install KDE
		PKG_addJob($client,"m23$desktop",PKG_getSpecialPackagePriority("m23$desktop",$distr),"");
	}

	//Configures upstart for normal running in an installed system.
	PKG_addJob($client,'m23configUpstartForNormalUsage',PKG_getSpecialPackagePriority('m23configUpstartForNormalUsage',$distr),"");

	//update package infos
	PKG_addJob($client,"m23UpdatePackageInfos",PKG_getSpecialPackagePriority("m23UpdatePackageInfos",$distr),"");

	//add printer detection job (or not)
	if ($options['installPrinter']=="yes")
		PKG_addJob($client,"m23PrinterConfig",PKG_getSpecialPackagePriority("m23PrinterConfig"),"");

	//Add the x2go server installation job (or not)
	if ($options['installX2goserver'] == 1)
		PKG_addJob($client,"m23x2goServer",PKG_getSpecialPackagePriority("m23x2goServer"),"");

	//Make sure that the client is in the same state (running or turned off) after the insallation like before.
	PKG_addShutdownOrRebootPackage($client);

	CLIENT_startInstall($client);
};
?>
