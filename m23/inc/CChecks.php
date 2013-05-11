<?

class CChecks extends CMessageManager
{





/**
**name CChecks::checkIPGeneric($ip, $msg)
**description Checks if an IP is valid and adds an error message to the message manager in case of an error.
**parameter ip: IP to check.
**parameter msg: Error message to add in case of an error.
**returns true, if the IP is correct otherwise false.
**/
	protected function checkIPGeneric($ip, $msg)
	{
		if (!checkIP($ip))
		{
			$this->addErrorMessage("$msg ($ip)");
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
			$this->addErrorMessage("$I18N_no_clientname ($clientName)");
			return(false);
		}
		elseif (!checkFQDN($clientName))
		{
			$this->addErrorMessage("$I18N_invalid_clientname ($clientName)");
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
			$this->addErrorMessage("$I18N_no_netmask ($netmask)");
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
			$this->addErrorMessage("$I18N_no_mac ($mac)");
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
		if ((CClient::BOOTTYPE_PXE == $bootType) || (CClient::BOOTTYPE_NOBOOT == $bootType) || (CClient::BOOTTYPE_ETHERBOOT == $bootType))
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
	private function genericCHECK_FW($rule, $val, $errorMsg)
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
		return($this->genericCHECK_FW(CC_poolName, $poolName, $I18N_poolNameInvalid));
	}
}
?>