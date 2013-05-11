<?php

define('HSIMGSTOREDIR',"/m23/data+scripts/distr/halfSister/");
define('HSIMGHTTPDIR',"/distr/halfSister/");


/**
**name HS_getm23HSAdminPath($release)
**description Calculates the complete local path (including the file name) to m23HSAdmin for a choosen distribution release.
**parameter release: The release name of the distribution
**returns The complete local path (including the file name) to m23HSAdmin.
**/
function HS_getm23HSAdminPath($release)
{
	return(HSIMGSTOREDIR."m23HSAdmin-$release");
}





/**
**name HS_getPackageCacheName($packagesourcename, $arch="i386")
**description Returns the complete name (including path) of the package cache.
**parameter packagesourcename: name of the package source
**parameter arch: CPU architecture of the client.
**returns The name of the package cache.
**/
function HS_getPackageCacheName($packagesourcename, $arch="i386")
{
	return("/m23/data+scripts/distr/halfSister/packages-$packagesourcename-$arch.gz");
}





/**
**name HS_pkgUpdateCacheOnServer($packagesourcename, $packagesource, $force=false, $arch="i386")
**description updates the package list on the server ( for editing package selections ) and saves it gzipped in /m23/data+scripts/distr/halfSister/packages-$packagesourcename-$arch.gz
**parameter packagesourcename: name of the package source
**parameter force: force the update (or not)
**parameter arch: CPU architecture of the client.
**returns The name of the package cache.
**/
function HS_pkgUpdateCacheOnServer($packagesourcename, $force=false, $arch="i386")
{
	//Get the release name of the sources list
	$release = SRCLST_getRelease($packagesourcename);

	//Set to BASH's true (0) or false (1)
	$force = ($force ? 0 : 1);

	//Fetch the contents of the sources list
	$packagesource = SRCLST_loadSourceList($packagesourcename);

	//Get the full local path to the m23HSAdmin
	$m23HSAdmin = HS_getm23HSAdminPath($release);

	//Generate the command
	$cmd = "echo '$packagesource' | bash $m23HSAdmin pkgUpdateCacheOnServer $packagesourcename $force $arch";
	
// 	print("<pre>$cmd</pre>");
// 	
// 	exit(1);

	SERVER_runInBackground(uniqid('HS_pkgUpdateCacheOnServer'), $cmd, "root", false);

	return(HS_getPackageCacheName($packagesourcename, $arch));
}





/**
**name HS_fetchAndExtractOSImage($distr, $arch, $DNSServers, $gateway, $packageProxy, $packagePort)
**description Downloads and extracts a halfSister distribution.
**parameter distr: halfSister distribution to install.
**parameter arch: The architecture of the distribution (amd64 or i386)
**parameter DNSServers: DNS server for resolving the names of the installation server
**parameter gateway: gateway for fetching the packages
**parameter packageProxy: the ip of the proxy the packages should be fetched from
**parameter packagePort: the proxy port
**/
function HS_fetchAndExtractOSImage($distr, $arch, $DNSServers, $gateway, $packageProxy, $packagePort)
{
	$serverIP = getServerIP();
	$quietWget = ($_SESSION['debug'] ? "": "-qq");

	//set resolv.conf in ramdisk
	CLCFG_resolvConf($DNSServers);

	//Basic network settings
	if (isset($gateway{1}))
	echo("
			route add -net default gw $gateway 2> /dev/null\n\n");

	if (!empty($packageProxy))
	echo("
		export http_proxy=\"http://$packageProxy:$packagePort\"

		export ftp_proxy=\"http://$packageProxy:$packagePort\"
		");

	$debootstrapCacheFile = "HS-$distr-$arch.tar.7z";
	$localDebootstrapCacheFile = HSIMGSTOREDIR.$debootstrapCacheFile;
	
	if (file_exists($localDebootstrapCacheFile))
		$debootstrapCacheFileURL = "http://$serverIP".HSIMGHTTPDIR.$debootstrapCacheFile;
	else
		$debootstrapCacheFileURL = "http://downloads.sourceforge.net/project/m23/baseSys/$debootstrapCacheFile";
// 		$debootstrapCacheFileURL = "http://downloads.sourceforge.net/project/m23/baseSys/$debootstrapCacheFile";
// 		$debootstrapCacheFileURL = "http://downloads.sourceforge.net/m23/baseSys/$debootstrapCacheFile";
		
		

	echo("
		rm -r * 2> /dev/null

		wget $debootstrapCacheFileURL -o /tmp/debootstrapCache.log
		ret=\$?
		try=0

		while [ `grep \"404 Not Found\" -c /tmp/debootstrapCache.log` -eq 0 ] && [ \$ret -ne 0 ] && [ \$try -lt 10 ]
		do
			wget -c $debootstrapCacheFileURL -o /tmp/debootstrapCache.log
			ret=\$?
			try=`expr \$try + 1`
		done

		if [ \$ret = 0 ]
		then
			mkdir m23-time
			date +%s > m23-time/debootstrap7z.start

			7zr x -so $debootstrapCacheFile | tar xpv --same-owner
			rm $debootstrapCacheFile

			date +%s > m23-time/debootstrap7z.stop
		else
			echo \"Could NOT fetch $debootstrapCacheFileURL\"
			cat /tmp/debootstrapCache.log
			wait4go
		fi

		unset http_proxy

		unset ftp_proxy
		\n
	");
};





/**
**name HS_fetchm23HSAdminAndm23hwscanner($release, $pathPrefix="")
**description Fetches the m23HSAdmin tool and m23hwscanner matching the given distribution.
**parameter release: halfSister distribution to get the m23HSAdmin tool for.
**parameter pathPrefix : Extra path to put before the store path (e.g. to store the m23HSAdmin on a mounted filesystem).
**/
function HS_fetchm23HSAdminAndm23hwscanner($release, $pathPrefix="")
{
	$serverIP = getServerIP();

	echo("
	wget http://$serverIP".HSIMGHTTPDIR."m23HSAdmin-$release -O $pathPrefix/sbin/m23HSAdmin
	wget http://$serverIP".HSIMGHTTPDIR."m23hwscanner-$release -O $pathPrefix/sbin/m23hwscanner
	wget http://$serverIP".HSIMGHTTPDIR."lilo2grub-$release -O $pathPrefix/sbin/lilo2grub

	chmod +x $pathPrefix/sbin/m23HSAdmin $pathPrefix/sbin/m23hwscanner $pathPrefix/sbin/lilo2grub
	");
}





/**
**name HS_netConfig($clientParams)
**description Sets IP, gateway, netmask, DNS and hostname.
**parameter clientParams: Associated array with the parameters of the client.
**/
function HS_netConfig($clientParams)
{
	$clientIP	= $clientParams['ip'];
	$gateway	= $clientParams['gateway'];
	$netmask	= $clientParams['netmask'];
	$dns1		= $clientParams['dns1'];
	$hostname 	= $clientParams['client'];

	HS_wrapper('netPrepare');
	HS_wrapper('netSetIPNetmask', $clientIP, $netmask);
	HS_wrapper('netSetGateway', $gateway);
	HS_wrapper('netSetDNS', $dns1);
	HS_wrapper('netSetHostname', "$hostname");
};





/**
**name HS_setPackageProxy($clientOptions)
**description Sets the proxy for the package management tool.
**parameter clientOptions: Associated array with the options of the client.
**/
function HS_setPackageProxy($clientOptions)
{
	$proxy	= $clientOptions['packageProxy'];
	$port	= $clientOptions['packagePort'];

	HS_wrapper('pkgSetPackageProxy', "$proxy:$port");
}





/**
**name HS_setSourcesList($clientName)
**description Writes the package sources list for the client's package manager.
**parameter clientName: name of the client
**/
function HS_setSourcesList($clientName)
{
	echo("

rm /tmp/sources.list 2> /dev/null
cat >> /tmp/sources.list << \"EOF\"
".SRCLST_genList($clientName)."
EOF
");

	HS_wrapper('pkgSetSourcesList');
}





/**
**name HS_normalUpdate()
**description Performs a normal update of the installed packages.
**/
function HS_normalUpdate()
{
	HS_wrapper("pkgNormalUpdate");
}





/**
**name HS_pkgFullUpdate()
**description Performs a full update of the installed packages.
**/
function HS_pkgFullUpdate()
{
	HS_wrapper("pkgFullUpdate");
}





/**
**name HS_sysSetm23ClientID($clientParams)
**description Sets the m23 client ID.
**parameter clientParams: Associated array with the parameters of the client.
**/
function HS_sysSetm23ClientID($clientParams)
{
	$clientID = $clientParams['id'];
	HS_wrapper("sysSetm23ClientID", $clientID);
}





/**
**name HS_netEnableNTP()
**description Enable getting the system time by NTP.
**/
function HS_netEnableNTP()
{
	HS_wrapper("netEnableNTP");
}




/**
**name HS_netDisableNTP()
**description Disable getting the system time by NTP.
**/
function HS_netDisableNTP()
{
	HS_wrapper("netDisableNTP");
}





/**
**name HS_hookBeginAfterChroot($rootDevice, $bootDevice, $bootDeviceFS)
**description Scripts that should be run at the beginning of the afterChroot.
**parameter rootDevice: Device with partition where the os will be installed (e.g. /dev/hda1).
**parameter bootDevice: Device (with partition) where the bootmanager will be installed (e.g. /dev/hda).
**parameter bootDeviceFS: Filesystem of the root device.
**/
function HS_hookBeginAfterChroot($rootDevice, $bootDevice, $bootDeviceFS)
{
	$serverIP = getServerIP();
	$makedevURL = "http://$serverIP/packages/baseSys/makedev.tar.gz";

	HS_wrapper("hookBeginAfterChroot", $rootDevice, $bootDevice, $bootDeviceFS, $makedevURL);
}





/**
**name HS_hookEndAfterChroot($rootDevice, $bootDevice, $bootDeviceFS)
**description Scripts that should be run at the end of the afterChroot.
**parameter rootDevice: Device with partition where the os will be installed (e.g. /dev/hda1).
**parameter bootDevice: Device (with partition) where the bootmanager will be installed (e.g. /dev/hda).
**parameter bootDeviceFS: Filesystem of the root device.
**/
function HS_hookEndAfterChroot($rootDevice, $bootDevice, $bootDeviceFS)
{
	$serverIP = getServerIP();
	$makedevURL = "http://$serverIP/packages/baseSys/makedev.tar.gz";

	HS_wrapper("hookEndAfterChroot", $rootDevice, $bootDevice, $bootDeviceFS, $makedevURL);
}





/**
**name HS_pkgInstallBasePackages()
**description Installs basic packages
**/
function HS_pkgInstallBasePackages()
{
	HS_wrapper("pkgInstallBasePackages");
}





/**
**name HS_netSetm23SSLCertificate($pathPrefix="")
**description Downloads and stores the SSL public key of the m23 server into the correct directory.
**parameter pathPrefix : Extra path to put before the SSL store path (e.g. to store the SSL key on a mounted filesystem).
**/
function HS_netSetm23SSLCertificate($pathPrefix="")
{
	$serverIP = getServerIP();
	$url = "http://$serverIP/packages/baseSys/ca.crt";
	HS_wrapper("netSetm23SSLCertificate", $url, $pathPrefix);
}





/**
**name HS_sysSetLanguage($lang)
**description Sets the system language.
**parameter lang: Two-character code of the language to set (de, en, fr).
**/
function HS_sysSetLanguage($lang)
{
	HS_wrapper("sysSetLanguage", $lang);
}





/**
**name HS_sysSetRootPW($pwd)
**description Sets the root password.
**parameter Password: The crypted password of the user root.
**/
function HS_sysSetRootPW($pwd)
{
	HS_wrapper("sysSetRootPW", "'$pwd'");
}





/**
**name HS_sysSetTimeZone($timezone)
**description Sets the time zone.
**parameter timezone: Timezone in POSIX notation (e.g. Europe/Berlin)
**/
function HS_sysSetTimeZone($timezone)
{
	HS_wrapper("sysSetTimeZone", "'$timezone'");
}





/**
**name HS_sysHWsetup()
**description Detects and configures new hardware
**/
function HS_sysHWsetup()
{
	HS_wrapper("sysHWsetup");
}





/**
**name HS_sysAddUser($username, $password)
**description Creates a new user with home directoy and sets password.
**parameter username: Name of the user to add.
**parameter password: The password of the user to add.
**/
function HS_sysAddUser($username, $password)
{
	HS_wrapper("sysAddUser", "'$username'", "'$password'");
}





/**
**name HS_sysChangeUser($username, $password="", $newUserName="")
**description changes the settings of an useraccount on a client
**parameter userName: the (old) username for the account
**parameter password: the new unecrypted password for the account
**parameter newUserName: the new username
**/
function HS_sysChangeUser($username, $password="", $newUserName="")
{
	if ($username == $newUserName)
		$newUserName="";

	if (!empty($password))
		{
			//change the password
			if ($username != "root")
				$cpass = encryptShadow($username,$password);
			else
				$cpass = $password;

			HS_wrapper("sysChangeUserPass", "'$username'", "'$cpass'");
		}

	if (!empty($newUserName))
		HS_wrapper("sysChangeUserName", "'$username'", "'$newUserName'");
}





/**
**name HS_netEnableSSHdAndImportKey()
**description Enables the SSH daemon and adds a SSH key to let the m23 server log into the machine.
**/
function HS_netEnableSSHdAndImportKey()
{
	$serverIP = getServerIP();
	HS_wrapper("netEnableSSHdAndImportKey", "'https://$serverIP/packages/baseSys/authorized_keys'");
}





/**
**name HS_writeHosts()
**description Writes the /etc/hosts file for the client
**/
function HS_netWriteHosts()
{
	HS_wrapper("netWriteHosts", getClientIP(), CLIENT_getClientName());
};





/**
**name HS_sysWriteM23fetchjob()
**description Generates the m23fetchjob script and adds it to the init levels.
**/
function HS_sysWriteM23fetchjob()
{
	HS_wrapper("sysWriteM23fetchjob", getServerIP());
}





/**
**name HS_sysWriteCrontabm23fetchjobEvery5Minutes($clientParams)
**description Adds entries to crontab to check every 5 minutes for new jobs.
**parameter clientParams: Associated array with the parameters of the client.
**/
function HS_sysWriteCrontabm23fetchjobEvery5Minutes($clientParams)
{
	if ($clientParams['dhcpBootimage'] == "gpxe")
		HS_wrapper("sysWriteCrontabm23fetchjobEvery5Minutes");
}





/**
**name HS_sysInstallKernel()
**description Installs a matching kernel.
**parameter kernelPkg: Name of the kernel package to install.
**/
function HS_sysInstallKernel($kernelPkg)
{
	HS_wrapper("sysInstallKernel", $kernelPkg);
}





/**
**name HS_netEnableNFSHome($nfsURL)
**description Enables storing of home directories on a NFS server
**parameter nfsURL: URL to the NFS storage (e.g. 192.168.1.42/up/home)
**/
function HS_netEnableNFSHome($nfsURL)
{
	HS_wrapper("netEnableNFSHome", $nfsURL);
}





/**
**name HS_netEnableLDAP($clientOptions)
**description Enables LDAP login for a client.
**parameter clientOptions: the client's options array
**/
function HS_netEnableLDAP($clientOptions)
{
	//exit the function if LDAP shouldn't used
	if ($clientOptions['ldaptype']=="none")
		return;

	$server=LDAP_loadServer($clientOptions['ldapserver']);

	$LDAPhost = $server['host'];
	$baseDN = $server['base'];

	//exit the function if LDAP host or base DN is empty
	if (empty($LDAPhost) || empty($baseDN))
		return;

	HS_wrapper("netEnableLDAP", $LDAPhost, $baseDN);
}





/**
**name HS_sysAddFstabEntries($fstab)
**description Generates commands to edit a given fstab, add new entries and remove old ones before.
**parameter fstab: All fstab lines to add as assiciative array.
**/
function HS_sysAddFstabEntries($fstab, $sourceName)
{
	$fstabAmount = isset($fstab[fstab_amount]) ? $fstab[fstab_amount] : 0;

	for ($fstabNr = 0; $fstabNr < $fstabAmount; $fstabNr++)
	{
		$param = FDISK_adjustFstabParam($fstab["fstab_param$fstabNr"], $sourceName);
	
		HS_wrapper("sysAddFstabEntry", $fstab["fstab_dev$fstabNr"]." $mntPrefix".$fstab["fstab_mnt$fstabNr"]." ".$param);
	}
};





/**
**name HS_sysMakeBootable($rootDevice, $bootDevice, $bootDeviceFS)
**description Makes the system bootable.
**parameter rootDevice: Device with partition where the os will be installed (e.g. /dev/hda1).
**parameter bootDevice: Device (with partition) where the bootmanager will be installed (e.g. /dev/hda).
**parameter bootDeviceFS: Filesystem of the root device.
**/
function HS_sysMakeBootable($rootDevice, $bootDevice, $bootDeviceFS)
{
	HS_wrapper("sysMakeBootable", $rootDevice, $bootDevice, $bootDeviceFS);
}





/**
**name HS_sysConfigurePrinter()
**description Detects and configures printer(s).
**/
function HS_sysConfigurePrinter()
{
	HS_wrapper("sysConfigurePrinter");
}





/**
**name HS_sysInstallPrinter()
**description Installs the printer software.
**/
function HS_sysInstallPrinter()
{
	HS_wrapper("sysInstallPrinter");
}





/**
**name HS_pkgInstallKDE()
**description Installs KDE
**/
function HS_pkgInstallKDE()
{
	HS_wrapper("pkgInstallKDE");
}



/**
**name HS_pkgInstallX()
**description Installs XOrg or another shipped X11 server.
**/
function HS_pkgInstallX()
{
	HS_wrapper("pkgInstallX");
}





/**
**name HS_pkgInstalledList()
**description Lists the installed packages or writes the list to a file.
**parameter storeFile: File name to store the list of installed on the client or empty if the list should be outputted to stdout.
**/
function HS_pkgInstalledList($storeFile = "")
{
	HS_wrapper("pkgInstalledList", $storeFile);
}





/**
**name HS_pkgInstall()
**description Installs one or more packages
**parameter packages: List of packages to install seperated by spaces.
**/
function HS_pkgInstall($packages)
{
	HS_wrapper("pkgInstall", $packages);
}





/**
**name HS_runClientPackageConfDB($clientName)
**description Generates BASH code to import client package configuration settings from the DB into the client package configuration of the client.
**parameter clientName: Name of the client.
**/
function HS_runClientPackageConfDB($clientName)
{
	$confContents = CLIENT_getDebconfDB($clientName);

	if (isset($debconf{5}))
		echo("
rm /tmp/confDB.update 2> /dev/null
cat >> /tmp/confDB.update << \"confDBEOF\"
$confContents
confDBEOF
");

	HS_wrapper("sysImportConfDB");
}





/**
**name HS_pkgSearch($searchTerms)
**description  Searches for available packages matching all keywords.
**parameter searchTerms: Search terms seperated spaces.
**/
function HS_pkgSearch($searchTerms)
{
	return(HS_wrapperReturn("pkgSearch", $searchTerms));
}





/**
**name HS_pkgInstallPreview($packages)
**description Generates commands for getting a installation preview on the client.
**parameter packages: List of packages to install seperated by spaces
**retuns Commands for running m23HSAdmin on the client to get the preview.
**/
function HS_pkgInstallPreview($packages)
{
	return(HS_wrapperReturn("pkgInstallPreview", $packages));
}





/**
**name HS_pkgDeinstallPreview($packages)
**description Generates commands for getting a deinstallation preview on the client.
**parameter packages: List of packages to deinstall seperated by spaces
**retuns Commands for running m23HSAdmin on the client to get the preview.
**/
function HS_pkgDeinstallPreview($packages)
{
	return(HS_wrapperReturn("pkgDeinstallPreview", $packages));
}





/**
**name HS_statusFileCommand()
**description Generates the commands to send the package infos to the server (This has the same functionality as MSR_statusFileCommand).
**/
function HS_statusFileCommand()
{
	$serverIP = getServerIP();

	HS_wrapper("pkgWritePackageStatusFile");

	echo(MSR_getm23clientIDCMD("?")."

	wget --post-file=/tmp/packagestatus.post https://$serverIP/postMessage.php\$idvar

	");
}





/**
**name HS_pkgUpdateCache()
**description Updates the list of available packages.
**/
function HS_pkgUpdateCache()
{
	HS_wrapper("pkgUpdateCache");
}





/**
**name HS_pkgInstallGnome()
**description Installs Gnome.
**/
function HS_pkgInstallGnome()
{
	HS_wrapper("pkgInstallGnome");
}





/**
**name HS_pkgInstallLXDE()
**description Installs LXDE.
**/
function HS_pkgInstallLXDE()
{
	HS_wrapper("pkgInstallLXDE");
}





/**
**name HS_pkgInstallXFce()
**description Installs XFce.
**/
function HS_pkgInstallXFce()
{
	HS_wrapper("pkgInstallXFce");
}





/**
**name HS_pkgDeinstall($packages)
**description Deinstalls one or more packages.
**parameter packages: List of packages to deinstall seperated by spaces.
**/
function HS_pkgDeinstall($packages)
{
	HS_wrapper("pkgDeinstall", $packages);
}





/**
**name HS_wrapperHS_wrapperReturn()
**description Creates a m23HSAdmin action with parameters and returns the result.
**parameter Multiple parameters with the desired action as first parameter followed by the parameters of the action.
**/
function HS_wrapperReturn($sendCommandExecutionStatus = false)
{
	$params = '';
	$amount = func_num_args();
	for($i = 0; $i < $amount; $i++)
		$params .= ' '.func_get_arg($i);

return("
	m23HSAdmin$params
");
}





/**
**name HS_wrapper()
**description Creates a m23HSAdmin action with parameters and shows the result.
**parameter Multiple parameters with the desired action as first parameter followed by the parameters of the action.
**/
function HS_wrapper()
{
	$params = '';
	$amount = func_num_args();
	for($i = 0; $i < $amount; $i++)
		$params .= ' '.func_get_arg($i);

	echo("
		m23HSAdmin$params
		".HS_sendCommandExecutionStatus(func_get_arg(0))."
	");
}





/**
**name HS_sendCommandExecutionStatus($cmd)
**description Sends a status message for the finished HS job and if there were errors, the log file too.
**parameter cmd: Name of the HS command
**/
function HS_sendCommandExecutionStatus($cmd)
{
	return("
	if [ ! -f /tmp/HSCommandExecutionStatus.code ] || [ `cat /tmp/HSCommandExecutionStatus.code` -eq 0 ]
	then
		".sendClientLogStatus("$cmd",true)."
	else
		".MSR_logCommand("/tmp/HSCommandExecutionStatus.code", false)."
		".MSR_logCommand("/tmp/HSCommandExecutionStatus.message", false)."
		".sendClientLogStatus("$cmd",false,true)."
	fi
	");
}

?>