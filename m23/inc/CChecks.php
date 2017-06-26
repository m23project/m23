<?

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Class for checking values.
$*/

// CC_forename, $data['name'], CC_familyname, $data['familyname'], CC_email, $data['email']
class CChecks extends CMessageManager
{





/**
**name CChecks::checkSizeInMB($size)
**description Checks if a size in MB is valid.
**parameter size: Size to check.
**returns true, if the size is valid (numeric) otherwise false.
**/
	public function checkSizeInMB($size)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_sizeinmb, $size, $I18N_sizeInMBInvalid));
	}





/**
**name CChecks::checkDiskDefinedSize($size)
**description Checks if a size (in MB) for the defined disk is valid.
**parameter size: Size to check.
**returns true, if the size is valid (numeric) otherwise false.
**/
	public function checkDiskDefinedSize($size)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_sizeinmb, $size, $I18N_definedDiskSizeInvalid));
	}





/**
**name CChecks::checkFdiskAdjustmentUpperToleranceIdentical($size)
**description Checks if a size (may contain g/G for GB, m/M for MB or % for percentual amount of a given value) for the upper tolerance is valid.
**parameter size: Size to check.
**returns true, if the size is valid otherwise false.
**/
	public function checkFdiskAdjustmentUpperToleranceIdentical($size)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_sizewithGBorMBporPercent, $size, $I18N_fdiskUpperToleranceIdenticalInvalid));
	}





/**
**name CChecks::checkFdiskAdjustmentLowerToleranceIdentical($size)
**description Checks if a size (may contain g/G for GB, m/M for MB or % for percentual amount of a given value) for the lower tolerance is valid.
**parameter size: Size to check.
**returns true, if the size is valid otherwise false.
**/
	public function checkFdiskAdjustmentLowerToleranceIdentical($size)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_sizewithGBorMBporPercent, $size, $I18N_fdiskLowerToleranceIdenticalInvalid));
	}





/**
**name CChecks::checkSwapPart($swapPart)
**description Checks if the device name for the swap partition is valid.
**parameter swapPart: Swap partition to check.
**returns true, if the swap partition name is valid otherwise false.
**/
	public function checkSwapPart($swapPart)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_deviceNamepartition, $swapPart, $I18N_swapPartInvalid));
	}





/**
**name CChecks::checkEFIPart($EFIPart)
**description Checks if the device name for the EFI partition is valid.
**parameter EFIPart: EFI partition to check.
**returns true, if the EFI partition name is valid otherwise false.
**/
	public function checkEFIPart($EFIPart)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_deviceNamepartition, $EFIPart, "$I18N_EFIPartInvalid ($EFIPart)"));
	}





/**
**name CChecks::checkInstPart($instPart)
**description Checks if the device name for the installation partition is valid.
**parameter instPart: Installation partition to check.
**returns true, if the installation partition name is valid otherwise false.
**/
	public function checkInstPart($instPart)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_deviceNamepartition, $instPart, $I18N_instPartInvalid));
	}





/**
**name CChecks::checkMountDev($dev)
**description Checks if the device name for mounting a disk or partition is valid.
**parameter dev: Device name for disk or partition to check.
**returns true, if the device name for mounting a disk or partition is valid otherwise false.
**/
	public function checkMountDev($dev)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_deviceNameOrPartitionOrRaid, $dev, $I18N_deviceNameForMountingInvalid));
	}





/**
**name CChecks::checkMountPoint($mountpoint)
**description Checks if the input value is a valid mountpoint.
**parameter mountpoint: Mountpoint to check.
**returns The input value is a valid mountpoint or false on an error.
**/
	public function checkMountPoint($mountpoint)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_mountPoint, $mountpoint, $I18N_mountPointInvalid));
	}





/**
**name CChecks::checkFdiskAdjustmentSpecifiedDev($dev)
**description Checks if the device name for the disk of the defined client is valid.
**parameter dev: Device name to check.
**returns true, if the installation partition name is valid otherwise false.
**/
	public function checkFdiskAdjustmentSpecifiedDev($dev)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_deviceNameDrive, $dev, $I18N_fdiskAdjustmentSpecifiedDevInvalid));
	}





/**
**name CChecks::checkRelease($release)
**description Checks if a release name is valid.
**parameter release: Release name to check.
**returns true, if the release name is valid otherwise false.
**/
	public function checkRelease($release)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_sourceslistrelease, $release, $I18N_releaseNameInvalid));
	}





/**
**name CChecks::checkDistribution($distr)
**description Checks if a distribution name is valid.
**parameter distr: Distribution name to check.
**returns true, if the distribution name is valid otherwise false.
**/
	public function checkDistribution($distr)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_sourceslistdistr, $distr, $I18N_distributionNameInvalid));
	}





/**
**name CChecks::checkNfshomeserver($nfshomeserver)
**description Checks if the NFS share is valid.
**parameter nfshomeserver: NFS share name to check.
**returns true, if the NFS share is valid otherwise false.
**/
	public function checkNfshomeserver($nfshomeserver)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
		if (isset($nfshomeserver{1}) && (strpos($nfshomeserver, ':') == false))
		{
			$this->addErrorMessage($I18N_nfshomeserverInvalid);
			return(false);
		}
		
		return($this->genericCHECK_FW(CC_nfshomeserver, $nfshomeserver, $I18N_nfshomeserverInvalid));
	}





/**
**name CChecks::checkGroupname($group)
**description Checks if the groupname is valid.
**parameter group: Groupname to check.
**returns true, if the groupname is valid otherwise false.
**/
	public function checkGroupname($group)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_groupname, $group, $I18N_groupnameInvalid));
	}





/**
**name CChecks::checkUserGroupIDs($userID, $groupID)
**description Checks the user ID and group ID are valid.
**parameter userID: The user ID to check.
**parameter groupID: The group ID to check.
**returns true, if user ID and group ID are valid otherwise false.
**/
	public function checkUserGroupIDs($userID, $groupID)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
		$ret1 = $this->genericCHECK_FW(CC_userID, $userID, $I18N_userIDInvalid);
		$ret2 = $this->genericCHECK_FW(CC_groupID, $groupID, $I18N_groupIDInvalid);
		return($ret1 && $ret2);
	}





/**
**name CChecks::checkLanguage($language)
**description Checks if the language is valid.
**parameter language: Language value to check.
**returns true, if the language is valid otherwise false.
**/
	public function checkLanguage($language)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$languageList = array_keys(I18N_listClientLanguages("", false));

		if (!in_array($language, $languageList))
			die('checkLanguage: Unknown language "'.$language.'"!');
		
		return($this->genericCHECK_FW(CC_language, $language, $I18N_languageInvalid));
	}





/**
**name CChecks::checkRootpassword($rootpassword)
**description Checks if the root password is valid.
**parameter rootpassword: The password to check.
**returns true, if the root password is valid otherwise false.
**/
	public function checkRootpassword($rootpassword)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_rootpassword, $rootpassword, $I18N_rootpasswordInvalid));
	}





/**
**name CChecks::firstpw($pass, $allowEmpty = false)
**description Checks if the first name's password is valid.
**parameter pass: The password to check.
**parameter allowEmpty: Set to true, if empty passwords should be allowed (e.g. when read from an LDAP server)
**returns true, if the password is valid otherwise false.
**/
	public function firstpw($pass, $allowEmpty = false)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if ($allowEmpty)
			$CC = CC_firstpwOrEmpty;
		else
			$CC = CC_firstpw;

		return($this->genericCHECK_FW($CC, $pass, $I18N_userpasswordInvalid));
	}





/**
**name CChecks::checkLogin($login, $allowEmpty = false)
**description Checks if the given login is valid.
**parameter login: The login name to check.
**parameter allowEmpty: Set to true, if empty logins should be allowed (e.g. when read from an LDAP server)
**returns true, if the login name is valid otherwise false.
**/
	public function checkLogin($login, $allowEmpty = false)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
		if ($allowEmpty)
			$CC = CC_loginOrEmpty;
		else
			$CC = CC_login;
		
		return($this->genericCHECK_FW($CC, $login, $I18N_loginInvalid));
	}





/**
**name CChecks::checkProxy($proxyIP, $proxyPort)
**description Checks the IP and port of the package proxy.
**parameter proxyIP: The IP of the package proxy.
**parameter proxyPort: The port of the package proxy.
**returns true, if the package IP and port are valid otherwise false.
**/
	public function checkProxy($proxyIP, $proxyPort)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		//Check that IP and port are both empty or set
		$ret3 = !(empty($proxyIP) xor empty($proxyPort));
		if (!$ret3)
			 $this->addErrorMessage($I18N_packageProxyOnlyIPOrPortSet);

		
		$ret1 = $this->genericCHECK_FW(CC_packageproxy, $proxyIP, $I18N_packageProxyIncorrectIP);
		$ret2 = $this->genericCHECK_FW(CC_packageport, $proxyPort, $I18N_packageProxyIncorrectPort);
		return($ret1 && $ret2 && $ret3);
	}





/**
**name CChecks::checkOffice($office)
**description Checks if the given office name is valid.
**parameter office: The office name to check.
**returns true, if the office name is valid otherwise false.
**/
	public function checkOffice($office)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_office, $office, $I18N_officeInvalid));
	}





/**
**name CChecks::checkEmail($email, $allowEmpty = true)
**description Checks if the given eMail is valid (or optionally empty).
**parameter email: eMail address to check.
**parameter allowEmpty: Set to true, if empty eMail addresses should accepted as valid.
**returns true, if the eMail address is valid (or empty) otherwise false.
**/
	public function checkEmail($email, $allowEmpty = false)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(($allowEmpty ? 'ee' : 'e'), $email, $I18N_invalid_email));
	}





/**
**name CChecks::checkFamilyname($familyname)
**description Checks if the user's familyname is valid.
**parameter familyname: The familyname of the user.
**returns true, if the familyname name is valid otherwise false.
**/
	public function checkFamilyname($familyname)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_familyname, $familyname, $I18N_familynameInvalid));
	}





/**
**name CChecks::checkForename($forename)
**description Checks if the user's forename is valid.
**parameter forename: The forename of the user.
**returns true, if the forename name is valid otherwise false.
**/
	public function checkForename($forename)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_forename, $forename, $I18N_forenameInvalidOrEmpty));
	}





/**
**name CChecks::checkIPGeneric($ip, $msg)
**description Checks if an IP is valid and adds an error message to the message manager in case of an error.
**parameter ip: IP to check.
**parameter msg: Error message to add in case of an error.
**returns true, if the IP is correct otherwise false.
**/
	protected function checkIPGeneric($ip, $msg)
	{
		if (!empty($ip))
			$msgAdd = " ($ip)";
		else
			$msgAdd = '';
	
		if (!checkIP($ip))
		{
			$this->addErrorMessage($msg.$msgAdd);
			return(false);
		}

		return(true);
	}





/**
**name CChecks::checkIP($ip)
**description Checks if an IP is valid and adds an error message to the message manager in case of an error.
**parameter ip: IP to check.
**returns true, if the IP is correct otherwise false.
**/
	public function checkIP($ip)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->checkIPGeneric($ip, $I18N_invalid_ip));
	}





/**
**name CChecks::checkNonusedIP($ip)
**description Checks if an IP is not in use and adds an error message to the message manager in case of an error.
**parameter ip: IP to check.
**returns true, if the IP is not used otherwise false.
**/
	public function checkNonusedIP($ip)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		//Check for validity of IP address
		if (!$this->checkIP($ip))
			return(false);

		//Check if it is non existing
		if (CClientLister::IPexists($ip))
		{
			$this->addErrorMessage("$I18N_ip_exists ($ip)");
			return(false);
		}
		else
		{
			$CIPRangesO = new CIPRanges();
			if (!$CIPRangesO->checkNotInRange($ip))
			{
				$this->addErrorMessage($CIPRangesO->popErrorMessagesHTML());
				return(false);
			}
		}

		return(true);
	}





/**
**name CChecks::checkDNS1($dns1)
**description Checks if the 1st DNS server has an valid IP and adds an error message to the message manager in case of an error.
**parameter dns1: DNS server IP to check.
**returns true, if the IP is correct otherwise false.
**/
	public function checkDNS1($dns1)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->checkIPGeneric($dns1, $I18N_invalid_dns1));
	}





/**
**name CChecks::checkDNS2($dns2)
**description Checks if the 2nd DNS server has an valid IP and adds an error message to the message manager in case of an error.
**parameter dns2: DNS server IP to check.
**returns true, if the IP is correct otherwise false.
**/
	public function checkDNS2($dns2)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->checkIPGeneric($dns2, $I18N_invalid_dns2));
	}





/**
**name CChecks::checkGateway($gateway)
**description Checks if the gateway has an valid IP and adds an error message to the message manager in case of an error.
**parameter gateway: Gateway IP to check.
**returns true, if the IP is correct otherwise false.
**/
	public function checkGateway($gateway)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->checkIPGeneric($gateway, $I18N_invalid_gateway));
	}





/**
**name CChecks::checkClientname($clientName, $checkNonused = false)
**description Checks if a client name is valid (and optionally, if the client doesn't exist) and adds an error message to the message manager in case of an error.
**parameter clientName: Clientname to check.
**parameter checkNonused: Set to true, to check for non using.
**returns true, if the clientname is correct otherwise false.
**/
	public function checkClientname($clientName, $checkNonused = false)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if (!isset($clientName{0}))
		{
			$this->addErrorMessage($I18N_no_clientname);
			return(false);
		}
		elseif (!checkFQDN($clientName))
		{
			$this->addErrorMessage("$I18N_invalid_clientname ($clientName)");
			return(false);
		}
		elseif (is_numeric($clientName))
		{
			$this->addErrorMessage("$I18N_clientname_must_not_be_a_number ($clientName)");
			return(false);
		}
		elseif (CLIENT_exists($clientName) && $checkNonused)
		{
			$this->addErrorMessage("$I18N_client_exists ($clientName)");
			return(false);
		}
		return(true);
	}





/**
**name CChecks::checkNonusedClientname($clientName)
**description Checks if a client name is valid and if the client doesn't exist and adds an error message to the message manager in case of an error.
**parameter clientName: Clientname to check.
**returns true, if the MAC is correct and not in use otherwise false.
**/
	public function checkNonusedClientname($clientName)
	{
		return($this->checkClientname($clientName, true));
	}





/**
**name CChecks::checkNetmask($netmask)
**description Checks if the netmask is valid and adds an error message to the message manager in case of an error.
**parameter netmask: Netmask to check.
**returns true, if the netmask is correct otherwise false.
**/
	public function checkNetmask($netmask)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if (!isset($netmask{0}))
		{
			$this->addErrorMessage("$I18N_no_netmask");
			return(false);
		}
		elseif (!checkNetmask($netmask))
		{
			$this->addErrorMessage("$I18N_invalid_netmask ($netmask)");
			return(false);
		}
		return(true);
	}






/**
**name CChecks::checkMAC($mac, $checkNonExisting = false)
**description Checks if a MAC is valid (and optionally if it is not in use) and adds an error message to the message manager in case of an error.
**parameter mac: MAC address to test.
**parameter checkNonused: Set to true, to check for non using.
**returns true, if the MAC is correct (and optionally not in use) otherwise false.
**/
	public function checkMAC($mac, $checkNonused = false)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
		if (!isset($mac{0}))
		{
			$this->addErrorMessage($I18N_no_mac);
			return(false);
		}
		elseif (!checkMAC($mac))
		{
			$this->addErrorMessage("$I18N_mac_invalid ($mac)");
			return(false);
		}
		elseif ( CLIENT_MACexists($mac) && $checkNonused)
		{
			$this->addErrorMessage("$I18N_mac_exists ($mac)");
			return(false);
		}
		return(true);
	}





/**
**name CChecks::checkNonusedMAC($mac)
**description Checks if a MAC is valid and if it is not in use. Then adds an error message to the message manager in case of an error.
**parameter mac: MAC address to test.
**returns true, if the MAC is correct and not in use otherwise false.
**/
	public function checkNonusedMAC($mac)
	{
		return($this->checkMAC($mac, true));
	}





/**
**name CChecks::checkIPRange($firstIp, $lastIp)
**description Checks if the input IPs are valid and if the first IP is "smaler" than the second. Then adds an error message to the message manager in case of an error.
**parameter firstIp: The first IP marking the begin of the IP range.
**parameter lastIp: The last IP marking the end of the IP range.
**returns true, if the IPs are correct and the first IP is "smaler" otherwise false.
**/
	public function checkIPRange($firstIp, $lastIp)
	{
		$ret = true;

		//Check both IPs
		$ret &= $this->checkIP($firstIp);
		$ret &= $this->checkIP($lastIp);

		//If at least one IP is incorrect => return
		if (!$ret)
			return(false);

		//Check, if the first IP is "bigger" than the last IP => error
		if (ip2longSafe($firstIp) > ip2longSafe($lastIp))
		{
			include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
			$this->addErrorMessage($I18N_IPRangeInvalid." ($firstIp - $lastIp)");
			return(false);
		}

		return(true);
	}





/**
**name CChecks::checkStatus($status)
**description Checks if the client status number is valid. Then adds an error message to the message manager in case of an error.
**parameter status: The status number to check.
**returns true, if the status number is correct otherwise false.
**/
	public function checkStatus($status)
	{
		if (is_numeric($status) && ($status >= CClient::MIN_STATUS) && ($status <= CClient::MAX_STATUS))
			return(true);
		else
		{
			include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
			$this->addErrorMessage($I18N_clientStatusNumberInvalid." ($status)");
			return(false);
		}
	}





/**
**name CChecks::checkBootType($bootType)
**description Checks if if the client status number is valid. Then adds an error message to the message manager in case of an error.
**parameter status: The status number to check.
**returns true, if the status number is correct otherwise false.
**/
	public function checkBootType($bootType)
	{
		if ((CClient::BOOTTYPE_PXE == $bootType) || (CClient::BOOTTYPE_NOBOOT == $bootType) || (CClient::BOOTTYPE_ETHERBOOT == $bootType) || (CClient::BOOTTYPE_GPXE == $bootType) || (CClient::BOOTTYPE_GRUB2EFIX64 == $bootType))
			return(true);
		else
		{
			include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
			$this->addErrorMessage($I18N_bootTypeInvalid." ($bootType)");
			return(false);
		}
	}





/**
**name CChecks::genericCHECK_FW($rule, $val, $errorMsg)
**description Generic checking routine, that checks if an input value matches a rule.
**parameter rule: CHECK_FW rule to check the input value with.
**parameter val: Value to check.
**parameter errorMsg: Error message to add, if the checking fails.
**returns true, if the input value matches the rule otherwise false.
**/
	protected function genericCHECK_FW($rule, $val, $errorMsg)
	{
		if (CHECK_FW(true, $rule, $val) === false)
		{
			$this->addErrorMessage($errorMsg);
			return(false);
		}
			return(true);
	}





/**
**name CChecks::checkPoolName($poolName)
**description Checks if the pool name is valid.
**parameter poolName: The pool name to check.
**returns true, if the pool name is valid otherwise false.
**/
	public function checkPoolName($poolName)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->genericCHECK_FW(CC_poolName, $poolName, $I18N_poolNameInvalid));
	}
}
?>