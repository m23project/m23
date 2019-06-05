<?PHP

/*$mdocInfo
 Author: Daniel Kasten (DKasten@pc-kiel.de), Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions to add and remove a client to/from the dhcp server list.
$*/

define('DHCPD_CONF_FILE', '/m23/dhcp/dhcpd.conf');





/**
**name DHCP_exportDHCPSettingsForExternalDHCPServer()
**description Exports the DHCP settings of m23 clients that are booting over the network and adds settings for external DHCP servers.
**/
function DHCP_exportDHCPSettingsForExternalDHCPServer()
{
	$serverIP = getServerIP();

	//Get all host lines of the DHCP config file
	$cmds = "grep 'host ' ".DHCPD_CONF_FILE;
	$lines = SERVER_runInBackground('DHCP_exportDHCPSettingsForExternalDHCPServer', $cmds, "root", false);

	//Add settings for the external DHCP server
	return(str_replace('hardware ethernet', "option dhcp-server-identifier $serverIP; option root-path \"/\"; next-server $serverIP; hardware ethernet", $lines));
}





/**
**name DHCP_lineNumberAffterLastClient()
**description Gets the line number with the last client definition in the dhcpd.conf.
**returns Line number with the last client definition in the dhcpd.conf.
**/
function DHCP_lineNumberAffterLastClient()
{
	return(SERVER_runInBackground('DHCP_addSubnetDefinition'.rand(), "awk 'BEGIN { foundLine=line=1 } /^host/ { foundLine=line } { line++ } END { print foundLine } ' ".DHCPD_CONF_FILE,"root", false));
}





/**
**name DHCP_addSubnetDefinition($subnet, $netmask)
**description Adds the subnet definition to the dhcpd.conf to let the DHCP server give out network information to clients to other subnets.
**parameter subnet: The subnet.
**parameter netmask: netmask for the ip
**/
function DHCP_addSubnetDefinition($subnet, $netmask)
{
	$insertText = "subnet $subnet netmask $netmask {}";

	//Without the closing brace to match the dynamic ranges too
	$searchText = "subnet $subnet netmask $netmask {";

	if (exec("grep -c '$searchText' ".DHCPD_CONF_FILE) == 0)
	{
		$insertAfterLine = DHCP_lineNumberAffterLastClient();
		SERVER_insertLineNumber(DHCPD_CONF_FILE, $insertAfterLine, $insertText);
	}
}





/**
**name DHCP_delSubnetDefinition($subnet, $netmask)
**description Removes a subnet definition from the dhcpd.conf.
**parameter subnet: The subnet.
**parameter netmask: netmask for the ip
**/
function DHCP_delSubnetDefinition($subnet, $netmask)
{
	$insertText = "subnet $subnet netmask $netmask {}";
	SERVER_delLineFromFile(DHCPD_CONF_FILE, $insertText);
}





/**
**name DHCP_addDynamicRange($firstIP, $lastIP, $netmask, $gateway)
**description Adds a dynamic IP range to the dhcpd.conf and restarts the DHCP server.
**parameter firstIP: The first IP marking the begin of the dynamic IP range.
**parameter lastIP: The last IP marking the end of the dynamic IP range.
**parameter netmask: Netmask for the IPs.
**parameter gateway: The gateway IP.
**returns true, if the DHCP server could be restarted with the new settings.
**/
function DHCP_addDynamicRange($firstIP, $lastIP, $netmask, $gateway)
{
	$subnet = CLIENT_getSubnet($firstIP, $netmask);
	$broadcast = CLIENT_getBroadcast($firstIP, $netmask);

	$insertText = "subnet $subnet netmask $netmask { range $firstIP $lastIP; option broadcast-address $broadcast; option routers $gateway; option subnet-mask $netmask;}";
	
	$insertAfterLine = DHCP_lineNumberAffterLastClient();
	SERVER_insertLineNumber(DHCPD_CONF_FILE, $insertAfterLine, $insertText);

	//Delete the empty subnet definition to make sure, that it is not defined twice
	DHCP_delSubnetDefinition($subnet, $netmask);

	return(DHCP_restartDHCPserver());
}





/**
**name DHCP_getDynamicRanges()
**description Gets all dynamic IP ranges from the dhcpd.conf.
**returns Associative array with the found IP ranges (e.g. Array ( [0] => Array ( [netmask] => 255.255.255.0 [firstIP] => 192.168.1.10 [lastIP] => 192.168.1.200 [gateway] => 192.168.1.1 ) [1] => ...)) or empty array.
**/
function DHCP_getDynamicRanges()
{
	$i = 0;
	$out = array();

	//Get all lines from dhcpd.conf that define dynamic ranges
	exec('grep range '.DHCPD_CONF_FILE.' | grep -v \' host \'', $allLines);

	//Run thru the found lines
	foreach ($allLines as $line)
	{
		//Split the lines into options (etmask, ange, ...)
		$options = preg_split('/[\s;][^0-9]/', $line, -1, PREG_SPLIT_NO_EMPTY);

		//Run thru the options
		foreach ($options as $option)
		{
			//Split option name and value
			$keyVal = explode(' ', $option);

			//Assign the values (the first character of the option name is lost by preg_split)
			if (strpos($keyVal[0], 'etmask') !== false)
				$out[$i]['netmask'] = $keyVal[1];
			elseif (strpos($keyVal[0], 'ange') !== false)
			{
				$out[$i]['firstIP'] = $keyVal[1];
				$out[$i]['lastIP'] = $keyVal[2];
			}
			elseif (strpos($keyVal[0], 'outers') !== false)
				$out[$i]['gateway'] = $keyVal[1];
		}

		$i++;
	}

	return($out);
}





/**
**name DHCP_getNetmaskOfDynamicRanges($firstIP)
**description Gets the netmask of a dynamic range identified by the first IP of the range.
**parameter firstIP: The first IP marking the begin of the dynamic IP range.
**returns Netmask or false in case of an error.
**/
function DHCP_getNetmaskOfDynamicRanges($firstIP)
{
	foreach (DHCP_getDynamicRanges() as $range)
		if ($range['firstIP'] == $firstIP)
			return($range['netmask']);
	return(false);
}





/**
**name DHCP_delDynamicRange($firstIP, $lastIP)
**description Removes a dynamic IP range from the dhcpd.conf and restarts the DHCP server.
**parameter firstIP: The first IP marking the begin of the dynamic IP range.
**parameter lastIP: The last IP marking the end of the dynamic IP range.
**returns true, if the DHCP server could be restarted with the new settings.
**/
function DHCP_delDynamicRange($firstIP, $lastIP)
{
	//Get the netmask of the dynamic range before deleting the range
	$netmask = DHCP_getNetmaskOfDynamicRanges($firstIP);

	//Prepare and execute sed
	$firstIPSed = str_replace('.', '\.', $firstIP);
	$lastIPSed = str_replace('.', '\.', $lastIP);

	if (trim(SERVER_runInBackground('DHCP_delDynamicRange', "sed -i '/range $firstIPSed $lastIPSed/d' ".DHCPD_CONF_FILE." && echo ok", "root", false)) != "ok")
		return(false);

	//Add a new empty subnet declaration
	if ($netmask !== false)
	{
		$subnet = CLIENT_getSubnet($firstIP, $netmask);
		DHCP_addSubnetDefinition($subnet, $netmask);
	}

	return(DHCP_restartDHCPserver());
}





/**
**name DHCP_bootTypeToNewFormat($bootType)
**description Converts a boolean boot type to the new string format.
**parameter bootType: Boolean or string format (e.g. "pxe") boot type.
**returns String format (e.g. "pxe") boot type.
**/
function DHCP_bootTypeToNewFormat($bootType)
{
	//Needed for old format that allows only boolean values
	if (is_bool($bootType))
	{
		if ($bootType)
			$bootType = CClient::BOOTTYPE_PXE;
		else
			$bootType = CClient::BOOTTYPE_ETHERBOOT;
	}

	return($bootType);
}





/**
**name DHCP_runScript($command, $clientName, $ip, $netmask, $mac, $bootType, $gateway)
**description Runs the script for controlling an external DHCP server.
**parameter command: 'add' for adding an entry to the DHCP server or 'remove' for removing.
**parameter clientName: name of the client
**parameter ip: ip address of the client
**parameter netmask: netmask for the ip
**parameter mac: mac addresse of the network card
**parameter bootType: Parameter can a string: pxe, etherboot, gpxe, none
**parameter gateway: The gateway for the client.
**/
function DHCP_runScript($command, $clientName, $ip='', $netmask='', $mac='', $bootType='', $gateway='')
{
	if (file_exists('/m23/bin/externalDHCPControl.sh'))
		SERVER_runInBackground('DHCP_runScript', "/m23/bin/externalDHCPControl.sh $command $clientName $ip $netmask $mac $bootType $gateway", "root", false);
}





/**
**name DHCP_addClient($clientName, $ip, $netmask, $mac, $bootType, $gateway, $updateDB = true)
**description adds a new client to the dhcpd.conf and restarts the dhcpd-server
**parameter clientName: name of the client
**parameter ip: ip address of the client
**parameter netmask: netmask for the ip
**parameter mac: mac addresse of the network card
**parameter bootType: Parameter can be boolean for backward compatibility: if true use PXE for the client, otherwise use Etherboot
**parameter bootType: Parameter can a string: pxe, etherboot, gpxe, none
**parameter gateway: The gateway for the client.
**parameter updateDB: If set to true, the boot type is set for the client in the DB.
**returns true, if the DHCP server could be restarted with the new settings.
**/
function DHCP_addClient($clientName, $ip, $netmask, $mac, $bootType, $gateway, $updateDB = true)
{
	$subnet = CLIENT_getSubnet($ip, $netmask);

	//ensure we have a right formated
	$mac = CLIENT_convertMac($mac, ":");

	$bootType = DHCP_bootTypeToNewFormat($bootType);
	$broadcast = CLIENT_getBroadcast($ip,$netmask);

	DHCP_runScript('add', $clientName, $ip, $netmask, $mac, $bootType, $gateway);

	/*
	$dnsmasqConf = '/m23/dhcp/dnsmasq-dhcpd.conf';
	$dnsmasqTail = '/m23/dhcp/dnsmasq-dhcpd.tail';
	$dnsmasqHead = '/m23/dhcp/dnsmasq-dhcpd.head';
	*/

	//generate command-line to add a line to dhcpd.conf for PXE or Etherboot
	switch ($bootType)
	{
		case CClient::BOOTTYPE_PXE:
			//generate command-line to add a line to dhcpd.conf
			{
				if (HELPER_isExecutedOnUCS())
					UCS_enableClientPXEBoot($clientName, 'pxelinux.0');
				else
					DHCP_addLineToDHCPDConf("host $clientName { hardware ethernet $mac; fixed-address $ip;  filename \\\"pxelinux.0\\\"; option broadcast-address $broadcast; option routers $gateway; option subnet-mask $netmask;}");
				

				/*
				#DNSMasq
				sudo egrep -v \"^dhcp-range\" $dnsmasqConf > $dnsmasqHead;
				sudo egrep \"^dhcp-range\" $dnsmasqConf > $dnsmasqTail;
				sudo cat $dnsmasqHead > $dnsmasqConf;
				sudo echo \"dhcp-host=$mac,$clientName,$ip,infinite,set:pxe\" >> $dnsmasqConf;
				sudo cat $dnsmasqTail >> $dnsmasqConf;
				*/
			}
		break;

		case CClient::BOOTTYPE_GRUB2EFIX64:
			//generate command-line to add a line to dhcpd.conf
			{
				if (HELPER_isExecutedOnUCS())
					UCS_enableClientPXEBoot($clientName, 'grubnetx64.efi.signed');
				else
					DHCP_addLineToDHCPDConf("host $clientName { hardware ethernet $mac; fixed-address $ip;  filename \\\"grubnetx64.efi.signed\\\"; option broadcast-address $broadcast; option routers $gateway; option subnet-mask $netmask;}");
			}
		break;

		case CClient::BOOTTYPE_ETHERBOOT:
			//generate command-line to add a line to dhcpd.conf
			{
				if (HELPER_isExecutedOnUCS())
					UCS_enableClientPXEBoot($clientName, $ip);
				else
					DHCP_addLineToDHCPDConf("host $clientName { hardware ethernet $mac; fixed-address $ip;  filename \\\"$ip\\\"; option broadcast-address $broadcast; option routers $gateway; option subnet-mask $netmask;}");
			}
		break;

		case CClient::BOOTTYPE_NOBOOT:
			{
// 				DHCP_addLineToDHCPDConf("subnet $subnet netmask $netmask { host $clientName { hardware ethernet $mac; fixed-address $ip; } option broadcast-address $broadcast; option routers $gateway; option subnet-mask $netmask;}");
				DHCP_addLineToDHCPDConf("host $clientName { hardware ethernet $mac; fixed-address $ip; option broadcast-address $broadcast; option routers $gateway; option subnet-mask $netmask;}");
				$updateDB = false;
			}
	}

	if ($updateDB)
	{
		//Set type of the boot image
		$sql="UPDATE `clients` SET dhcpBootimage='$bootType' WHERE client='$clientName'";
		$result=DB_query($sql);
	}

	if (HELPER_isExecutedOnUCS())
		return(true);

	DHCP_addSubnetDefinition($subnet, $netmask);

	return(DHCP_restartDHCPserver());
}





/**
**name DHCP_addLineToDHCPDConf($line)
**description Adds a line to the dhcpd.conf file.
**parameter line: Line to add.
**/
function DHCP_addLineToDHCPDConf($line)
{
	$cmds = "echo \"$line\" > /m23/dhcp/dhcpdtop;
	cat ".DHCPD_CONF_FILE." >> /m23/dhcp/dhcpdtop;
	cat /m23/dhcp/dhcpdtop > ".DHCPD_CONF_FILE.";
	rm /m23/dhcp/dhcpdtop;
	";
	
	SERVER_runInBackground('DHCP_addLineToDHCPDConf', $cmds, 'root', false);
}





/**
**name DHCP_restartDHCPserver()
**description Restarts the DHCP server.
**returns true if it clould be (re)started otherwise false.
**/
function DHCP_restartDHCPserver()
{
// 	,'dnsmasq'

	foreach (array('dhcp', 'dhcp3-server', 'isc-dhcp-server') as $daemon)
	{
		if (file_exists("/etc/init.d/$daemon"))
		{
			if (trim(SERVER_runInBackground('DHCP_restartDHCPserver', "/etc/init.d/$daemon restart && echo ok", "root", false)) != "ok")
				return(false);
		}
	};
}





/**
**name DHCP_rmClient($clientName)
**description removes a client from dhcpd.conf and restarts the dhcpd-server
**parameter clientName: name of the client
**/
function DHCP_rmClient($clientName)
{
	$bootType = CLIENT_getBootType($clientName);

	DHCP_runScript('remove', $clientName);

	if ($bootType == CClient::BOOTTYPE_GPXE)
		return(true);

	// If run on UCS => The DHCP server is handled via UCS
	if (HELPER_isExecutedOnUCS())
		UCS_disableClientPXEBoot($clientName);
	else
	{
		//Delete the line from DHCP server only if it is not gPXE
		//remove the client from dhcpd.conf
		$cmds = "sed '/host.".trim($clientName)."[^A-Za-z0-9]/Id' ".DHCPD_CONF_FILE." > ".DHCPD_CONF_FILE.".tmp && mv ".DHCPD_CONF_FILE.".tmp ".DHCPD_CONF_FILE." && echo ok";

		//write changes
		if (trim(SERVER_runInBackground('DHCP_rmClient', $cmds, 'root', false)) != "ok")
			return(false);
	}

	//Choose remove method by boot type
	switch ($bootType)
	{
		case CClient::BOOTTYPE_NOBOOT:
		case CClient::BOOTTYPE_PXE:
			DHCP_removePXEcfg($clientName);
		break;

		case CClient::BOOTTYPE_ETHERBOOT:
			$ip = CLIENT_getIPbyName($clientName);
			SERVER_deleteFile("/m23/tftp/$ip");
		break;
	}

	if (HELPER_isExecutedOnUCS())
		return(true);
	else
		return(DHCP_restartDHCPserver());
}





/**
**name DHCP_setBootimage($clientName, $bootImage)
**description sets the bootimage of a client for EtherBoot
**parameter clientName: name of the client
**parameter bootImage: name of the bootimage (hdboot, ip address for name)
**/
function DHCP_setBootimage($clientName, $bootImage)
{
	$ip = CLIENT_getIPbyName($clientName);
	$cmds = "cd /m23/tftp/; rm $ip ; ln -s $bootImage $ip";

	SERVER_runInBackground('DHCP_setBootimage', $cmds, 'root', false);
}





/**
**name DHCP_activateBoot($clientName, $on, $bootType = 'x')
**description switches the network boot on or off
**parameter clientName: name of the client
**parameter on: true activates the network boot, false deactivates
**parameter bootType: The boot type CAN be given here (e.g. pxe or etherboot)
**/
function DHCP_activateBoot($clientName, $on, $bootType = 'x')
{
// 	print("cl: $clientName ison:".serialize(DHCP_isNetworkBootingActive($clientName))." on:".serialize($on));

	//(De)Activate network booting on the VM
	VM_activateNetboot($clientName, $on);

	/*
		Check if the current state is different from the desired state

		!!!DHCP_isNetworkBootingActive will return wrong status when called on UCS!!!

		=> Don't return, if run on UCS
	*/
	if (!HELPER_isExecutedOnUCS() && (DHCP_isNetworkBootingActive($clientName) == $on))
		return(false);


	if ($on)
	{
		$allOptions = CLIENT_getAllOptions($clientName);
		$allParams = CLIENT_getParams($clientName);
	}

	//Check where to get the boot type from
	if ($bootType === 'x')
		$bootType = CLIENT_getBootType($clientName);
	else
		$bootType = DHCP_bootTypeToNewFormat($bootType);


	switch ($bootType)
	{

		case CClient::BOOTTYPE_ETHERBOOT:
			if ($on)
				DHCP_setBootimage($clientName, "m23install-".$allOptions['arch']);
			else
				DHCP_setBootimage($clientName, "hdboot");
		break;

		default:
			if ($on)
			{
				if (empty($bootType))
					$bootType = CClient::BOOTTYPE_PXE;

				if (CClient::BOOTTYPE_NOBOOT != $bootType)
					DHCP_writePXEcfg($clientName, $allOptions['arch']);
				return(DHCP_addClient($clientName, $allParams['ip'], $allParams['netmask'], $allParams['mac'], $bootType, $allParams['gateway']));
			}
			else
				return(DHCP_rmClient($clientName));
		break;
	}
}





/**
**name DHCP_calcPXEIP($ip)
**description calculates the ip for the pxe config file
**parameter ip: ip address to convert to the PXE file name
**/
function DHCP_calcPXEIP($ip)
{
	return(str_pad(strtoupper(dechex(ip2longSafe($ip))), 8, 0, STR_PAD_LEFT));
}





/**
**name DHCP_writePXEcfg($clientName)
**description writes the pxe config file for te client
**parameter clientName: name of the client
**parameter arch: computer architecture (i386 or amd64)
**/
function DHCP_writePXEcfg($clientName,$arch)
{
	include('/m23/inc/kernelRamDisk.inc');
	$iphex=DHCP_calcPXEIP(CLIENT_getIPbyName($clientName));
	$fileName = "/m23/tftp/pxelinux.cfg/$iphex";
	
	$fp=fopen($fileName, "w");

	if (!($fp > 0))
		 die("Cannot open /m23/tftp/pxelinux.cfg/$iphex!");

	fputs($fp,"LABEL linux\n");
	fputs($fp,"KERNEL m23pxeinstall-$arch\n");
	fputs($fp,"APPEND devfs=nomount vga=normal load_ramdisk=1 prompt_ramdisk=0 ramdisk_size=$kernelRamDisk initrd=initrd-$arch.gz root=/dev/ram0 rw\n");

	fclose($fp);
	chmod($fileName, 0755);
}





/**
**name DHCP_removePXEcfg($clientName)
**description removes the PXE start file for a special client
**parameter clientName: name of the client
**/
function DHCP_removePXEcfg($clientName)
{
	$iphex = DHCP_calcPXEIP(CLIENT_getIPbyName($clientName));
	SERVER_deleteFile("/m23/tftp/pxelinux.cfg/$iphex");
};





/**
**name DHCP_isNetworkBootingActive($clientName)
**description Checks, if a client has network booting enabled.
**parameter clientName: name of the client
**returns: True, if network booting is active, false otherwise.
**/
function DHCP_isNetworkBootingActive($clientName)
{
	$ret = trim(SERVER_runInBackground('DHCP_isNetworkBootingActive', "grep 'host $clientName ' ".DHCPD_CONF_FILE." -c", "root", false));
	return(is_numeric($ret) && ($ret > 0));
}
?>