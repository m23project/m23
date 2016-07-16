<?

/*
> memory
> hd
> partitions
> cpu
> MHz
> netcards
> graficcard
> soundcard
> isa
> dmi

> vmRunOnHost
> vmSoftware
> vmRole
> vmVisualPassword
> vmVisualURL

> [desktop] => GnomeClassic

> [disableSSLCertCheck] => 0

> [disableSudoRootLogin] => 1

> [fstab]

> [mbrPart] => /dev/sda

> [instPart] => /dev/sda1

> [installPrinter] => yes

> [kernel] => linux-image

> [m23cupsadminPW] => a5b6ebb0971731c80c85708b0761a5e2

> [swapPart] => /dev/sda2
*/





class CClient extends CChecks
{
	private $clientInfo = array(), $paramKeys = '', $md5 = '', $keyValueStore;

	//Status codes of the client
	const MIN_STATUS = 0;
	const STATUS_RED = 0;		//client added, but no hardware information
	const STATUS_YELLOW = 1;	//hardware data send to server, wairing for base system
	const STATUS_GREEN = 2;		//base sytem installed
	const STATUS_BLUE = 3;		//installation of additional packages in process	
	const STATUS_CRITICAL = 4;	//a critical error occured
	const STATUS_DEFINE = 5;	//it's a clientBuilder client
	const STATUS_BLOCKED = 6;	//Status for clients that are not m23 clients, but their network settings are handled by the m23 server
	const MAX_STATUS = 6;
	const BOOTTYPE_PXE = 'pxe';
	const BOOTTYPE_ETHERBOOT = 'etherboot';
	const BOOTTYPE_NOBOOT = 'none';
	const BOOTTYPE_GPXE = 'gpxe';
	const BOOTTYPE_GRUB2EFIX64 = 'grub2EFIx64';
	const CHECKMODE_NORMAL = 0;
	const CHECKMODE_MUSTEXIST = 1;
	const CHECKMODE_MUSTNOTEXIST = 2;





/**
**name CClient::__construct($in, $checkMode = CClient::CHECKMODE_NORMAL)
**description Constructor for new CClient objects. The object holds all information about a single client and loads the values from the DB.
**parameter in: ID of an existing client (to load), name of an existing or nonexisting (to create) client or associative array of parameters.
**parameter checkMode: Check for the input variable.
**/
	public function __construct($in, $checkMode = CClient::CHECKMODE_NORMAL)
	{
		//Check if the parameter is a client ID
		if (is_numeric($in))
		{
			$clientID = $in;
			CHECK_FW(CC_id, $clientID);
			$sql = "SELECT * FROM `clients` WHERE id='$clientID'";
			$result = DB_query($sql); //FW ok

			if (mysqli_num_rows($result) === 0)
				die('Client with ID '.$clientID.' does not exist!');

			$params = mysqli_fetch_assoc($result);
		}
		//Check if the parameter is a client name
		elseif (is_string($in))
		{
			$clientName = $in;

			$clientExistenceStatusOk = true;

			if (CClient::CHECKMODE_MUSTNOTEXIST === $checkMode)
				$clientExistenceStatusOk = $this->checkNonusedClientname($clientName);

			if ($clientExistenceStatusOk && $this->checkClientname($clientName))
			{
				//Try to get the params of the client
				$sqlSelect = "SELECT * FROM `clients` WHERE client='$clientName'";
				$result = DB_query($sqlSelect); //FW ok

				//Check if there could be fetched no params (client is nonexisting)
				if (mysqli_num_rows($result) === 0)
				{
					if (CClient::CHECKMODE_MUSTEXIST === $checkMode)
						die('Client with name '.$clientName.' does not exist!');

					$modifydate = time();

					//Add a basic entry to the DB
					DB_query("INSERT INTO clients (client, lastmodify) VALUES ('$clientName', '$modifydate')");

					//Fetch the entry from the DB again
					$result = DB_query($sqlSelect); //FW ok
				}
				$params = mysqli_fetch_assoc($result);
			}
			else
			{
				throw new Exception($this->popErrorMessagesHTML());
			}
		}
		elseif (is_array($in))
		{
			$params = $in;
		}
		else
			die('Failed to create CClient object (wrong parameter).');

		$this->paramKeys = array_keys($params);

		$options = explodeAssoc('?',$params['options']);

		//Combine the arrays (params have the highest priority and overwrite (hopefully not existing) keys in the options array)
		$this->clientInfo = array_merge($options, $params);

		// The key value store must be unserialized to be usable
		if (isset($this->clientInfo['keyValueStore']))
			$this->clientInfo['keyValueStore'] = unserialize($this->clientInfo['keyValueStore']);
		else
			$this->clientInfo['keyValueStore'] = array();

		//Calculate a checksum over the initial settings of the client
		$this->md5 = md5(serialize($this->clientInfo));

		//Make sure there is a status bar
		HTML_newStatusBar('installStatus', $this->getClientName(), STATUSBAR_TYPE_db);
	}





/**
**name CClient::__destruct()
**description Destructor for a CClient object. Before the object is removed from the RAM, all client settings are written to the DB.
**/
	function __destruct()
	{
		if ($this->md5 != md5(serialize($this->clientInfo)))
			$this->save();
	}



	public function saveClientPackagesAsPackageSelection($packageSelectionName)
	{
		
	}





/**
**name CClient::setKeyValueStore($key, $value, $check = NULL, $errorMsg = '')
**description Sets a value in the key value store of the client.
**parameter key: Name of the key.
**parameter value: The value to store under the key.
**parameter check: An optional variable firewall check constant or rule or a function for check the validity of the value.
**parameter errorMsg: An error message to give out, if the value fails the check.
**/
	public function setKeyValueStore($key, $value, $check = NULL, $errorMsg = '')
	{
		$checkOK = true;

		// Check, if the value should be checked
		if (!is_null($check))
		{
			// If check is as constant, it is ment as constant for the variable firewall
			if (defined($check))
				$this->genericCHECK_FW(constant($check), $value, $errorMsg);
			// If check is a function, call it and give out the error message, if the check fails
			elseif (function_exists($check))
			{
				$checkOK = $check($value);
				if (!$checkOK)
					$this->addErrorMessage($errorMsg);
			}
			// A string is interpreted as variable firewall rule
			elseif (is_string($check))
				$this->genericCHECK_FW($check, $value, $errorMsg);
		}

		// Only add the value to the key storage, if the check was sucessfully (or no check was given)
		if ($checkOK)
			$this->clientInfo['keyValueStore'][$key] = $value;
	}





/**
**name CClient::getKeyValueStore($key)
**description Gets a value from the key value store of the client.
**returns The value or NULL, if there is no value for the key.
**/
	public function getKeyValueStore($key)
	{
		return(isset($this->clientInfo['keyValueStore'][$key]) ? $this->clientInfo['keyValueStore'][$key] : NULL);
	}





/**
**name CClient::copyImagingParameters($options)
**description Copies the imaging parameters (if present).
**parameter options: Associative array with all options.
**/
	public function copyImagingParameters($options)
	{
		if (isset($options['IMGPartitionAmount']))
		{
			$this->clientInfo['IMGPartitionAmount'] = $options['IMGPartitionAmount'];

			for ($i=0; $i < $options['IMGPartitionAmount']; $i++)
			{
				if (isset($options["IMGname$i"]))
				{
					$this->clientInfo["IMGdrv$i"] = $options["IMGdrv$i"];
					$this->clientInfo["IMGname$i"] = $options["IMGname$i"];
				};
			};
		}
	}





/**
**name CClient::copyMassOptions($options)
**description Copies the mass installation options (if present).
**parameter options: Associative array with all options.
**/
	public function copyMassOptions($options)
	{
		foreach (array('desktop', 'disableSSLCertCheck', 'disableSudoRootLogin', 'fstab', 'installX2goserver', 'kernel', 'm23cupsadminPW', 'mbrPart', 'packagesource') as $key)
		{
			if (isset($options[$key]))
				$this->clientInfo[$key] = $options[$key];
		}
	}





/**
**name CClient::setInstallationStatusBar($percent=false, $statustext=false)
**description Sets new percent value and/or new status text on the client's installation status bar.
**parameter percent: Percent value to write into the DB (may be false, if it should not be changed).
**parameter statustext: A text message that should be shown under the status bar and written to the DB (may be false, if it should not be changed).
**returns: false on parameter error.
**/
	public function setInstallationStatusBar($percent=false, $statustext=false)
	{
		return(HTML_setStatusBarStatusByName('installStatus', $this->getClientName(), $percent, $statustext));
	}





/**
**name CClient::delSpecialJob($packageName, $priority)
**description Removes a special job from the joblist identified by package name and priority.
**parameter package: Name of the package.
**parameter priority: Priority of the job.
**/
	public function delSpecialJob($packageName, $priority)
	{
		PKG_removeSpecialFromJobList($this->getClientName(), $packageName, $priority);
	}





/**
**name CClient::addJob($packageName,$priority,$params)
**description Adds a job to the client's job table.
**parameter packageName: name of the package
**parameter priority: priority of the package
**parameter params: parameter for installing the package
**/
	public function addJob($packageName, $priority, $params)
	{
		PKG_addJob($this->getClientName(), $packageName, $priority, $params);
	}





/**
**name CClient::includeDistributionSpecificPackagesPHP()
**description Includes distribution specific packages.php.
**/
	private function includeDistributionSpecificPackagesPHP()
	{
		$distr = $this->getDistribution();
		if (!empty($distr))
			include_once("/m23/inc/distr/$distr/packages.php");
	}





/**
**name CClient::addNormalJob($packageName, $priority = 25)
**description Adds a normal package to the installation queue.
**parameter packageName: name of the package
**parameter priority: priority of the package
**/
	public function addNormalJob($packageName, $priority = 25)
	{
		$this->includeDistributionSpecificPackagesPHP();
		PKG_addStatusJob($this->getClientName(), 'm23normal', $priority, $packageName, 'waiting');
	}





/**
**name CClient::addSpecialJob($packageName, $params = '', $priority = false)
**description Adds a special package to the installation queue.
**parameter packageName: name of the package.
**parameter params: Parameter for the special package.
**parameter priority: priority of the package (if false, the priority from the special package will be used).
**/
	public function addSpecialJob($packageName, $params = '', $priority = false)
	{
		$this->includeDistributionSpecificPackagesPHP();

		if ($priority === false)
			$priority = PKG_getSpecialPackagePriority($packageName);

		PKG_addJob($this->getClientName(), $packageName, $priority, $params);
	}





/**
**name CClient::addUpdateSourcesListJob()
**description Adds a job to update the package source of the client to the installation queue.
**/
	public function addUpdateSourcesListJob()
	{
		$this->addSpecialJob('m23UpdateSourcesList', $this->getSourcesList());
	}





/**
**name CClient::addUpdatePackageInfosJob()
**description Adds a job to update the package information of the client to the installation queue.
**/
	public function addUpdatePackageInfosJob()
	{
		$this->addSpecialJob('m23UpdatePackageInfos', '', 90);
	}


/**
**name CClient::addNormalUpdateJob()
**description Adds a job to perform a normal update of the client.
**parameter type: normal or complete.
**/
	public function addNormalUpdateJob()
	{
		$this->addUpdateJob('normal');
	}





/**
**name CClient::addCompleteUpdateJob()
**description Adds a job to perform a complete update of the client.
**parameter type: normal or complete.
**/
	public function addCompleteUpdateJob()
	{
		$this->addUpdateJob('complete');
	}





/**
**name CClient::addUpdateJob($type)
**description Adds a job to update the client to the installation queue.
**parameter type: normal or complete.
**/
	private function addUpdateJob($type)
	{
		$arr['type'] = $type;
		$this->addSpecialJob('m23update', implodeAssoc("?#?",$arr));
	}





/**
**name CClient::unsetInstPartDev()
**description Unsets the installation partition of the client (by removing the variable in the client info).
**/
	public function unsetInstPartDev()
	{
		$this->clientInfo['instPart'] = NULL;
	}





/**
**name CClient::setInstPartDev($instPart)
**description Sets the installation partition of the client.
**parameter instPart: Installation partition device name.
**returns true, if the installation partition is valid otherwise false.
**/
	public function setInstPartDev($instPart)
	{
		if ($this->checkInstPart($instPart))
		{
			$this->clientInfo['instPart'] = $instPart;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::setUEFI($enabled)
**description Sets the UEFI usage of the client.
**parameter enabled: true, if UEFI is used on the client, otherwise false.
**/
	public function setUEFI($enabled)
	{
		$this->clientInfo['uefiActive'] = (($enabled === true) ? 1 : 0);
	}





/**
**name CClient::isUEFIActive()
**description Returns, if the client uses UEFI.
**returns true, if the client uses UEFI otherwise false.
**/
	public function isUEFIActive()
	{
		return($this->clientInfo['uefiActive'] == 1);
	}





/**
**name CClient::isHalfSisterClient()
**description Returns, if the client uses a halfSister distribution.
**returns true, if the client uses a halfSister distribution otherwise false.
**/
	public function isHalfSisterClient()
	{
		return(strpos($this->getSourcesList(), 'HS-') === 0);
	}





/**
**name CClient::getEFIBootPartDev()
**description Gets the EFI boot partition of the client.
**returns The EFI partition of the client or false, if not set.
**/
	public function getEFIBootPartDev()
	{
		return($this->getProperty('efiPart', 'getEFIBootPartDev: efiPart not set.', false));
	}





/**
**name CClient::setEFIBootPartDev($EFIPart)
**description Sets the EFI partition of the client.
**parameter EFIPart: EFI partition device name.
**returns true, if the EFI boot partition is valid otherwise false.
**/
	public function setEFIBootPartDev($EFIPart)
	{
		if ($this->checkEFIPart($EFIPart))
		{
			$this->clientInfo['efiPart'] = $EFIPart;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::unsetEFIBootPartDev()
**description Unsets the EFI boot partition of the client (by removing the variable in the client info).
**/
	public function unsetEFIBootPartDev()
	{
		$this->clientInfo['efiPart'] = NULL;
	}





/**
**name CClient::getInstPartDev()
**description Gets the installation partition of the client.
**returns The installation partition of the client or false, if not set.
**/
	public function getInstPartDev()
	{
		return($this->getProperty('instPart', 'getInstPart: instPart not set.', false));
	}





/**
**name CClient::unsetSwapPartDev()
**description Unsets the swap partition of the client (by removing the variable in the client info).
**/
	public function unsetSwapPartDev()
	{
		$this->clientInfo['swapPart'] = NULL;
	}





/**
**name CClient::setSwapPartDev($swapPart)
**description Sets the swap partition of the client.
**parameter swapPart: Swap partition device name.
**returns true, if the swap partition is valid otherwise false.
**/
	public function setSwapPartDev($swapPart)
	{
		if ($this->checkSwapPart($swapPart))
		{
			$this->clientInfo['swapPart'] = $swapPart;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::getSwapPartDev()
**description Gets the swap partition of the client.
**returns The swap partition of the client or false, if not set.
**/
	public function getSwapPartDev()
	{
		return($this->getProperty('swapPart', 'getSwapPart: swapPart not set.', false));
	}





/**
**name CClient::isDerivedClient()
**description Checks, if the client is derived from a defined client.
**returns true, if the client is derived, otherwise false.
**/
	public function isDerivedClient()
	{
		// A defined client cannot be a derived client
		if ($this->isDefinedClient())
			return(false);

		// An empty serialized array has 7 characters
		if (isset($this->clientInfo['CFDiskTemp']{6}))
		{
			// Try to decode the CFDiskTemp serialized array
			$CFDiskTemp = @unserialize($this->clientInfo['CFDiskTemp']);

			// Check, if it is a valid array
			if (!is_array($CFDiskTemp))
				return(false);

			// If there are defined disk devices and sizes => It should be a derived client
			if (is_array($CFDiskTemp['definedDiskSizes']))
				return(true);
			else
				return(false);
		}
	}





/**
**name CClient::setLanguage($language)
**description Sets the language of the client.
**parameter language: Language of the client.
**returns true, if the language is valid otherwise false.
**/
	public function setLanguage($language)
	{
		if ($this->checkLanguage($language))
		{
			$this->clientInfo['language'] = $language;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::getLanguage()
**description Gets the language of the client.
**returns The language of the client.
**/
	public function getLanguage()
	{
		return($this->getProperty('language', 'getLanguage: language not set.'));
	}





/**
**name CClient::setTimeZone($timeZone)
**description Sets the timezone of the client.
**parameter timeZone: Timezone of the client.
**returns true, if the timezone is valid otherwise false.
**/
	public function setTimeZone($timeZone)
	{
		$timeZones = HELPER_getTimeZones($this->getLanguage());

		if (!in_array($timeZone, $timeZones))
			die('setTimeZone: Unknown timezone "'.$timeZone.'"!');

		$this->clientInfo['timeZone'] = $timeZone;

		return(true);
	}





/**
**name CClient::getTimeZone()
**description Gets the timezone of the client.
**returns The timezone of the client.
**/
	public function getTimeZone()
	{
		return($this->getProperty('timeZone', 'getTimeZone: timeZone not set.'));
	}





/**
**name CClient::setBootloader($bootloader)
**description Sets the bootloader of the client.
**parameter bootloader: Bootloader of the client.
**returns true, if the bootloader is valid otherwise dies.
**/
	public function setBootloader($bootloader)
	{
		$bootLoaders = HELPER_getBootLoaders();

		if (!in_array($bootloader, $bootLoaders))
			die('setBootloader: Unknown bootloader "'.$bootloader.'"!');

		$this->clientInfo['bootloader'] = $bootloader;

		return(true);
	}





/**
**name CClient::getBootloader()
**description Gets the bootloader of the client.
**returns The bootloader of the client.
**/
	public function getBootloader()
	{
		return($this->getProperty('bootloader', 'getBootloader: bootloader not set.'));
	}





/**
**name CClient::getClientGroup()
**description Gets the m23 group of the client.
**returns The m23 group of the client.
**/
	public function getClientGroup()
	{
		return($this->getProperty('newgroup', 'getClientGroup: group not set.'));
	}





/**
**name CClient::setNetRootPwd()
**description Generates and sets the netboot root password.
**/
	public function setNetRootPwd()
	{
		$this->clientInfo['netRootPwd'] = DB_genPassword(6);
		return(true);
	}





/**
**name CClient::getNetRootPwd()
**description Gets the netboot root password.
**returns Netboot root password.
**/
	public function getNetRootPwd()
	{
		return($this->getProperty('netRootPwd', 'getNetRootPwd: netboot root password not set.'));
	}





/**
**name CClient::setNfshomeserver($nfshomeserver)
**description Sets the NFS share of the client.
**parameter nfshomeserver: NFS share with path.
**returns true, if the NFS share is valid.
**/
	public function setNfshomeserver($nfshomeserver)
	{
		if ($this->checkNfshomeserver($nfshomeserver))
		{
			$this->clientInfo['nfshomeserver'] = $nfshomeserver;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::getNfshomeserver()
**description Gets the NFS share of the client.
**returns NFS share of the client.
**/
	public function getNfshomeserver()
	{
		return($this->getProperty('nfshomeserver', 'getNfshomeserver: No nfshomeserver set.'));
	}





/**
**name CClient::setBoolProperty($var, $setIt, $func, $trueVal = 'yes', $falseVal = '')
**description Sets a boolean value in the client's settings.
**parameter var: Name of the setting variable.
**parameter setIt: Set to true, if the variable should be set, otherwise false.
**parameter func: Name of the calling function (for error reporting)
**parameter trueVal: String that should be set in the client's settings, if $setIt is true.
**parameter falseVal: String that should be set in the client's settings, if $setIt is false.
**returns true on sucessfully setting.
**/
	private function setBoolProperty($var, $setIt, $func, $trueVal = 'yes', $falseVal = '')
	{
		if (!is_bool($setIt))
			die($func.': "'.$setIt.'" is not boolean');
			
		if ($setIt)
			$this->clientInfo[$var] = $trueVal;
		else
			$this->clientInfo[$var] = $falseVal;

		return(true);
	}





/**
**name CClient::setInstallPrinter($setIt)
**description Sets, if the local printer should be detected/installed.
**parameter setIt: Set to true, if the local printer should be detected/installed, otherwise false.
**returns true on sucessfully setting.
**/
	public function setInstallPrinter($setIt)
	{
		return($this->setBoolProperty('installPrinter', $setIt, 'setInstallPrinter'));
	}





/**
**name CClient::getInstallPrinter()
**description Checks, if the local printer should be detected/installed.
**returns true, if the local printer should be detected/installed, otherwise false.
**/
	public function getInstallPrinter()
	{
		return(('yes' == $this->getProperty('installPrinter', 'getInstallPrinter: installPrinter not set.')));
	}





/**
**name CClient::setAddNewLocalLogin($setIt)
**description Sets, if the local login should be created.
**parameter setIt: Set to true, if the local login should be created, otherwise false.
**returns true on sucessfully setting.
**/
	public function setAddNewLocalLogin($setIt)
	{
		return($this->setBoolProperty('addNewLocalLogin', $setIt, 'setAddNewLocalLogin'));
	}





/**
**name CClient::getAddNewLocalLogin()
**description Checks, if the local login should be created.
**returns true, if the local login should be created, otherwise false.
**/
	public function getAddNewLocalLogin()
	{
		return(('yes' == $this->getProperty('addNewLocalLogin', 'getAddNewLocalLogin: addNewLocalLogin not set.')));
	}





/**
**name CClient::setGetSystemtimeByNTP($setIt)
**description Sets, if the system time should be set by NTP.
**parameter setIt: Set to true, if the system time should be set by NTP otherwise false.
**returns true on sucessfully setting.
**/
	public function setGetSystemtimeByNTP($setIt)
	{
		return($this->setBoolProperty('getSystemtimeByNTP', $setIt, 'setGetSystemtimeByNTP'));
	}





/**
**name CClient::getGetSystemtimeByNTP()
**description Checks, if the system time should be set by NTP.
**returns true, if the system time should be set by NTP otherwise false.
**/
	public function getGetSystemtimeByNTP()
	{
		return(('yes' == $this->getProperty('getSystemtimeByNTP', 'getGetSystemtimeByNTP: getSystemtimeByNTP not set.')));
	}





/**
**name CClient::setRootPassword($rootPassword, $rootPassword)
**description Sets the root password for the client.
**parameter rootPassword: The (encrypted) root password to set.
**parameter cryptRootPw: set to true, if the password should be encrypted or false, if it's already encrypted.
**returns true, if the root password is valid.
**/
	public function setRootPassword($rootPassword, $cryptRootPw)
	{
		if ($this->checkRootpassword($rootPassword))
		{
			if ($cryptRootPw)
				$rootPassword = encryptShadow('root', $rootPassword);

			$this->clientInfo['rootPassword'] = $rootPassword;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::addToClientGroup($group)
**description Adds the client to an m23 client group.
**parameter group: Name of the client group.
**returns true, if the was added to the group.
**/
	public function addToClientGroup($group)
	{
		$groups = GRP_listGroups();

		if (!in_array($group, $groups))
			die('addToClientGroup: Unknown group "'.$group.'"!');

		if ($this->checkGroupname($group))
		{
			$this->clientInfo['newgroup'] = $group;
			GRP_addClientToGroup($this->getClientName(), $group);
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::setUserGroupIDs($userID, $groupID)
**description Sets the user ID and group ID (for LDAP).
**parameter userID: The user ID.
**parameter groupID: The group ID.
**returns true, if user ID and group ID are valid otherwise false.
**/
	public function setUserGroupIDs($userID, $groupID)
	{
		//Set them, if all three are correct
		if ($this->checkUserGroupIDs($userID, $groupID))
		{
			$this->clientInfo['userID'] = $userID;
			$this->clientInfo['groupID'] = $groupID;
			return(true);
		}
			return(false);
	}





/**
**name CClient::getGroupID()
**description Returns the (LDAP) group ID.
**returns Group ID.
**/
	public function getGroupID()
	{
		return($this->getProperty('groupID', 'getGroupID: No group ID set.'));
	}





/**
**name CClient::getUserID()
**description Returns the (LDAP) user ID.
**returns User ID.
**/
	public function getUserID()
	{
		return($this->getProperty('userID', 'getUserID: No user ID set.'));
	}





/**
**name CClient::setUserDetails($forename, $familyname, $eMail, $office, $login, $firstpw)
**description Generates HTML code for returning to the client control center page.
**parameter forename: Forename of the user.
**parameter familyname: Familyname of the user (or empty).
**parameter eMail: eMail address of the user (or empty).
**parameter office: Office of the user (or empty).
**parameter login: The login name of the user.
**parameter firstpw: The password of the user.
**returns true, if all input parameters are valid.
**/
	public function setUserDetails($forename, $familyname, $eMail, $office, $login, $firstpw)
	{
		//Check the input variables
		$ret1 = $this->checkForename($forename);
		$ret2 = $this->checkFamilyname($familyname);
		$ret3 = $this->checkEmail($eMail, true);
		$ret4 = $this->checkOffice($office);
		//The login may be empty, if user accounts are read from an LDAP server
		$ret5 = $this->checkLogin($login, ($this->getLDAPType() == 'read'));
		//The user password may be empty, if user accounts are read from an LDAP server
		$ret6 = $this->firstpw($firstpw, ($this->getLDAPType() == 'read'));

		//Set them, if all three are correct
		if ($ret1 && $ret2 && $ret3 && $ret4 && $ret5 && $ret6)
		{
			$this->clientInfo['name'] = $forename;
			$this->clientInfo['familyname'] = $familyname;
			$this->clientInfo['eMail'] = $eMail;
			$this->clientInfo['office'] = $office;
			$this->clientInfo['login'] = $login;
			$this->clientInfo['firstpw'] = $firstpw;
			return(true);
		}
			return(false);
	}





/**
**name CClient::getFirstpw()
**description Returns the user's first password.
**returns The user's first password.
**/
	public function getFirstpw()
	{
		return($this->getProperty('firstpw', 'getFirstpw: No firstpw set.'));
	}





/**
**name CClient::getFamilyname()
**description Returns the user's familyname.
**returns The user's familyname.
**/
	public function getFamilyname()
	{
		return($this->getProperty('familyname', 'getFamilyname: No familyname set.', ''));
	}





/**
**name CClient::getForename()
**description Returns the user's forename.
**returns The user's forename.
**/
	public function getForename()
	{
		return($this->getProperty('name', 'getForename: No forename set.'));
	}





/**
**name CClient::getLogin()
**description Returns the user's login.
**returns The user's login.
**/
	public function getLogin()
	{
		return($this->getProperty('login', 'getLogin: No login set.'));
	}





/**
**name CClient::setLDAPType($type)
**description Sets the LDAP type.
**parameter type: LDAP usage type to set.
**/
	public function setLDAPType($type)
	{
		$LDAPTypes = LDAP_getTypes();

		if (!in_array($type, $LDAPTypes))
			die('setLDAPType: Unknown LDAP type "'.$type.'"!');
		
		$this->clientInfo['ldaptype'] = $type;
	}





/**
**name CClient::getLDAPType()
**description Returns the LDAP type of the client.
**returns LDAP type of the client.
**/
	public function getLDAPType()
	{
		return($this->getProperty('ldaptype', 'getLDAPType: No LDAP type set.'));
	}





/**
**name CClient::setLDAPServer($LDAPServer)
**description Sets the LDAP server.
**parameter LDAPServer: The name of the LDAP server.
**returns true, if the LDAP server was set, otherwise false.
**/
	public function setLDAPServer($LDAPServer)
	{
		if (empty($LDAPServer))
			return(false);

		$LDAPServers = LDAP_listServers();

		if (!in_array($LDAPServer, $LDAPServers))
			die('setLDAPServer: Unknown LDAP server "'.$LDAPServer.'"!');

		$this->clientInfo['ldapserver'] = $LDAPServer;
		return(true);
	}





/**
**name CClient::getLDAPServer()
**description Returns the LDAP server of the client.
**returns LDAP server of the client.
**/
	public function getLDAPServer()
	{
		return($this->getProperty('ldapserver', 'getLDAPServer: No LDAP server set.'));
	}





/**
**name CClient::addToCredentialsToLDAPServer()
**description Adds the credentials of the main (desktop) user to the given LDAP server.
**returns If the credentials could be saved to the LDAP server, otherwise false.
**/
	public function addToCredentialsToLDAPServer()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if (HELPER_isExecutedOnUCS())
		{
			$returnText = UCS_addLDAPUser($this->getLogin(), $this->getForename(), $this->getFamilyname(), $this->getFirstpw(), $this->getUserID());
			
			if (UCS_udmSuccessOrErrorMessage($returnText, $errorMessage))
				return(true);
			else
			{
				$this->addErrorMessage("$I18N_addNewLoginToUCSLDAPError $errorMessage");
				return(false);
			}
		}
	
	
		if (LDAP_addPosix($this->getLDAPServer(), $this->getLogin(), $this->getForename(), $this->getFamilyname(), $this->getFirstpw(), $this->getUserID(), $this->getGroupID()) === FALSE)
		{
			$this->addErrorMessage($I18N_errorAddingNewLoginToLDAP);
			return(false);
		}
		else
			return(true);
	}





/**
**name CClient::getBackToDetailsLink($section)
**description Generates HTML code for returning to the client control center page.
**parameter section: section to jump on the page
**/
	public function getBackToDetailsLink($section)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($this->getActionString("<br><a href=\"index.php?page=clientdetails&client=CLIENT_NAME&id=CLIENT_ID#$section\"><img src=\"/gfx/settings.png\"> $I18N_backToControlCenter <img src=\"/gfx/settings.png\"></a><br>"));
	}





/**
**name CClient::getClientWorkPHPURL($ip = false)
**description Returns the URL to the work.php for this client.
**parameter ip: If set, this IP is used instead of the server's IP.
**returns URL to the work.php for this client.
**/
	public function getClientWorkPHPURL($ip = false)
	{
		if ($ip === false)
			$ip = getServerIP();
		return('http://'.$ip.'/work.php?m23clientID='.$this->getID());
	}




/**
**name CClient::getClientCurrentWorkPHP($otherScript)
**description Returns the current contents of the work.php for this client.
**parameter otherScript: If set, this job will be taken instead of the job with the lowest priority.
**returns Current contents of the work.php for this client.
**/
	public function getClientCurrentWorkPHP($otherScript = '')
	{
		if (isset($otherScript{1}))
		{
			$this->addJob($otherScript, -23, '');
			$out = HELPER_getRemoteFileContents($this->getClientWorkPHPURL('127.0.0.1'), 'getClientCurrentWorkPHP', 0, true);
			$this->delSpecialJob($otherScript, -23);
			return($out);
		}
		else
			return(HELPER_getRemoteFileContents($this->getClientWorkPHPURL('127.0.0.1'), 'getClientCurrentWorkPHP', 0, true));
	}





/**
**name CClient::getClientPackages($key, $arr, $status = '')
**description Returns an array or a space separated list of all packages installed on a client
**parameter key: If it is not empty, only packages that contain the key are returned
**parameter arr: Set to true, if the result should be an array otherwise it's a string
**parameter status: If set, only returns packages of the given status (DEBPKGSTAT_installed, DEBPKGSTAT_removed, DEBPKGSTAT_purge).
**/
	public function getClientPackages($key, $arr, $status = '')
	{
		return(PKG_getClientPackages($this->getClientName(), $key, $arr, $status));
	}





/**
**name CClient::save()
**description Saves the client parameters and options to the DB.
**/
	public function save()
	{
		$sql = 'UPDATE `clients` SET';
		$optionsA = array();

		// Serialize the key value store before writing to the DB
		$keyValueStoreUnserialized = $this->clientInfo['keyValueStore'];
		$this->clientInfo['keyValueStore'] = serialize($this->clientInfo['keyValueStore']);

		foreach ($this->clientInfo as $key => $val)
		{
			//Continue on empty key
			if (!isset($key{1}) || ($key == 'id') || ($key == 'CFDiskTemp'))
				continue;

			//Make the values safe
			$val = CHECK_text2db($val);
			$key = CHECK_text2db($key);

			//Check if the key is a directly (into the DB) storable key
			if (in_array($key, $this->paramKeys))
				$sql .= " `$key` = '$val', ";
			else
			//Or has to be placed into the DB's options field
				$optionsA[$key] = $val;
		}

		//Combine the options array to a string and add to the SQL query
		$options = implodeAssoc('?',$optionsA);
		$sql .= " `options` = '$options' ";

		$sql .= 'WHERE `id` = \''.$this->clientInfo['id'].'\'';
		DB_query($sql);

		// Put the unserialized data back into the live data
		$this->clientInfo['keyValueStore'] = $keyValueStoreUnserialized;
	}





/**
**name CClient::getProperty($key, $dieMessage, $return = null)
**description Gets a client property from $this->clientInfo and dies (or returns an error value), if this property is not set.
**parameter key: Name of the property.
**parameter dieMessage: Message to show before dying.
**parameter return: This will returned in case of an error, if set to another value, than 'null'.
**returns Value of the property (or error value).
**/
	protected function getProperty($key, $dieMessage, $return = null)
	{
		if (isset($this->clientInfo[$key]) && (is_numeric($this->clientInfo[$key]) || !empty($this->clientInfo[$key])))
			return($this->clientInfo[$key]);
		else
		{
			if ($return === null)
				die($dieMessage);
			else
				return($return);
		}
	}





/**
**name CClient::getSourcesList()
**description Returns the sources list of the client.
**returns Sources list of the client.
**/
	public function getSourcesList()
	{
		return($this->getProperty('packagesource', 'getSourcesList: No sources list set.'));
	}





/**
**name CClient::setArch($arch)
**description Set the CPU architecture of the client.
**parameter arch: The architecture to set.
**returns true on successfully setting of the client's architecture, otherwise false.
**/
	public function setArch($arch)
	{
		$archList = getArchList();
	
		if (!in_array($arch, $archList))
			die('setArch: Unknown CPU architecture "'.$arch.'"!');
	
		$this->clientInfo['arch'] = $arch;
		return(true);
	}





/**
**name CClient::getArch()
**description Returns the architecture of the client.
**returns Architecture of the client.
**/
	public function getArch()
	{
		return($this->getProperty('arch', 'getArch: No architecture set.'));
	}




/**
**name CClient::setDistribution($distr)
**description sets the distribution of the client.
**parameter distr: Distribution of the client.
**returns true on sucessfully setting, otherwise false.
**/
	public function setDistribution($distr)
	{
		if ($this->checkDistribution($distr))
		{
			$this->clientInfo['distr'] = $distr;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::getDistribution()
**description Returns the distribution of the client.
**returns Distribution of the client.
**/
	public function getDistribution()
	{
		return($this->getProperty('distr', 'getDistribution: No distribution set.'));
	}





/**
**name CClient::setRelease($release)
**description Sets the distribution release of the client.
**parameter release: Distribution release of the client.
**returns true on sucessfully setting, otherwise false.
**/
	public function setRelease($release)
	{
		if ($this->checkRelease($release))
		{
			$this->clientInfo['release'] = $release;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::getRelease()
**description Returns the distribution release of the client.
**returns Distribution release of the client.
**/
	public function getRelease()
	{
		return($this->getProperty('release', 'getRelease: No distribution release set.'));
	}





/**
**name CClient::updateModifyDate()
**description Updates the last modified date.
**/
	public function updateModifyDate()
	{
		$this->clientInfo['lastmodify'] = time();
	}





/**
**name CClient::getModifyDate()
**description Returns the last modified date.
**returns Last modified date of the client.
**/
	public function getModifyDate()
	{
		return($this->getProperty('lastmodify', 'getModifyDate: No lastmodify date set.'));
	}





/**
**name CClient::getModifyDateHumanReadable()
**description Returns the last modified date in human readable form.
**returns Last modified date of the client in human readable form.
**/
	public function getModifyDateHumanReadable()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return(date($DATE_TIME_FORMAT, $this->getModifyDate()));
	}





/**
**name CClient::updateInstallDate()
**description Updates the installation date.
**/
	public function updateInstallDate()
	{
		$this->clientInfo['installdate'] = time();
	}





/**
**name CClient::getInstallDate()
**description Returns the installation date.
**returns Installation date of the client.
**/
	public function getInstallDate()
	{
		return($this->getProperty('installdate', 'getInstallDate: No installdate set.'));
	}





/**
**name CClient::getInstallDateHumanReadable()
**description Returns the installation date in human readable form.
**returns Last installation date of the client in human readable form.
**/
	public function getInstallDateHumanReadable()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return(date($DATE_TIME_FORMAT, $this->getInstallDate()));
	}





/**
**name CClient::export()
**description Exports all client settings as associativearray
**/
	public function export()
	{
		return($this->clientInfo);
	}





/**
**name CClient::setClientName($clientName)
**description Renames a client.
**parameter clientName: New name of the client.
**returns true on successfully setting of the client name, otherwise false.
**/
	public function setClientName($clientName)
	{
		if ($this->checkClientname($clientName))
		{
			$this->clientInfo['client'] = $clientName;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::getClientName()
**description Returns the name of the client.
**returns Name of the client.
**/
	public function getClientName()
	{
		return($this->getProperty('client', 'getClientName: No clientname set.'));
	}





/**
**name CClient::getID()
**description Returns the ID of the client.
**returns ID of the client.
**/
	public function getID()
	{
		return($this->getProperty('id', 'getID: No ID set.'));
	}





/**
**name CClient::setDNS($dns1, $dns2 = '')
**description Sets the main and (optionally) the backup DNS server(s).
**parameter dns1: The IP of the main DNS server.
**parameter dns2: The IP of the backup DNS server.
**returns true when the DNS(s) IP(s) is correct.
**/
	public function setDNS($dns1, $dns2 = '')
	{
		
		if ($this->checkDNS1($dns1))
		{
			$this->clientInfo['dns1'] = $dns1;

			if (isset($dns2{2}))
			{
				if ($this->checkDNS2($dns2))
					$this->clientInfo['dns2'] = $dns2;
				else
					return(false);
			}

			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::getDNS1()
**description Returns the IP of the main DNS server.
**returns Main DNS server IP of the client.
**/
	public function getDNS1()
	{
		return($this->getProperty('dns1', 'getDNS: No dns1 set.'));
	}





/**
**name CClient::getDNS2()
**description Returns the IP of the backup DNS server (if set).
**returns Backup DNS server IP of the client.
**/
	public function getDNS2()
	{
		return($this->getProperty('dns2', 'getDNS: No dns2 set.'));
	}





/**
**name CClient::setPackageProxy($proxyIP, $proxyPort)
**description Sets the IP and port of the package proxy.
**parameter proxyIP: The IP of the package proxy.
**parameter proxyPort: The port of the package proxy.
**returns true, if the package IP and port are valid and set otherwise false.
**/
	public function setPackageProxy($proxyIP, $proxyPort)
	{
		if ($this->checkProxy($proxyIP, $proxyPort))
		{
			if (!empty($proxyIP))
				$this->clientInfo['packageProxy'] = $proxyIP;
			if (!empty($proxyPort))
				$this->clientInfo['packagePort'] = $proxyPort;
			return(false);
		}
		else
			return(true);
	}





/**
**name CClient::setIP($ip)
**description Sets the IP of the client to an unsused IP.
**parameter IP: unused IP for the client.
**returns true on successfully setting the client's IP, otherwise false.
**/
	public function setIP($ip)
	{
		if ($this->checkNonusedIP($ip))
		{
			$this->clientInfo['ip'] = $ip;
			SERVER_addEtcHosts($this->getClientName(), $this->getIP());
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::getIP($return = null)
**description Returns the client's IP.
**parameter return: This will returned in case of an error, if set to another value, than 'null'.
**returns IP of the client.
**/
	public function getIP($return = null)
	{
		return($this->getProperty('ip', 'getIP: No IP set.', $return));
	}






/**
**name CClient::setNetmask($netmask)
**description Sets the netmask of the client.
**parameter netmask: Netmask of the client.
**returns true on successfully setting the client's netmask, otherwise false.
**/
	public function setNetmask($netmask)
	{
		if ($this->checkNetmask($netmask))
		{
			$this->clientInfo['netmask'] = $netmask;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::getNetmask()
**description Returns the client's netmask.
**returns Netmask of the client.
**/
	public function getNetmask()
	{
		return($this->getProperty('netmask', 'getNetmask: No netmask set.'));
	}





/**
**name CClient::setMAC($mac)
**description Sets the MAC address of the client.
**parameter mac: MAC of the client.
**returns true on successfully setting the client's MAC, otherwise false.
**/
	public function setMAC($mac)
	{
		if ($this->checkNonusedMAC($mac))
		{
			$this->clientInfo['mac'] = $mac;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::getMAC($return = null)
**description Returns the client's MAC.
**parameter return: This will returned in case of an error, if set to another value, than 'null'.
**returns MAC of the client.
**/
	public function getMAC($return = null)
	{
		return($this->getProperty('mac', 'getMAC: No MAC set.',$return));
	}





/**
**name CClient::setGateway($gateway)
**description Sets the gateway address for the client.
**parameter gateway: IP address of the gateway.
**returns true on successfully setting the client's gateway, otherwise false.
**/
	public function setGateway($gateway)
	{
		if ($this->checkGateway($gateway))
		{
			$this->clientInfo['gateway'] = $gateway;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::getGateway()
**description Returns the client's gateway.
**returns Gateway of the client.
**/
	public function getGateway()
	{
		return($this->getProperty('gateway', 'getGateway: No gateway set.'));
	}





/**
**name CClient::setGateway($gateway)
**description Sets the client's status.
**parameter status: The status number to check.
**returns true on successfully setting the client's status, otherwise false.
**/
	public function setStatus($status)
	{
		if ($this->checkStatus($status))
		{
			$this->clientInfo['status'] = $status;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::getStatus()
**description Returns the client's status.
**returns Status of the client.
**/
	public function getStatus()
	{
		return($this->getProperty('status', 'getStatus: No status set.'));
	}





/**
**name CClient::isDefinedClient()
**description Checks, if the client is defined client.
**returns true, if the client is defined client, otherwise false.
**/
	public function isDefinedClient()
	{
		return ($this->getStatus() == CClient::STATUS_DEFINE);
	}





/**
**name CClient::generateHTMLStatusBar()
**description Generates HTML code containing the status of the client with links to the pages.
**/
	public function generateHTMLStatusBar()
	{
		$clientName = $this->getClientName();
		$id = $this->getID();

		//Get the client status and choose the image for the status
		$statusimage = CLIENT_getStatusimage($this->getStatus());

		//Get the status of the debug mode and
		$debugimage = CLIENT_getDebugimage(CLIENT_isInDebugMode($this->getClientName()));

		$vmStatusIcons = VM_statusIcons($this->clientInfo);

		$html="<a href=\"index.php?page=clientstatus&client=$clientName&id=$id\"> <img border=\"0\" src=\"$statusimage\"></a>\n";

		if ($debugimage != FALSE)
			$html.="<a href=\"index.php?page=clientdebug&client=$clientName&id=$id\"> <img border=\"0\" src=\"$debugimage\"></a>\n";

		$html .= $vmStatusIcons;

		return($html);
	}





/**
**name CClient::getBootType()
**description Returns the client's network boot type.
**returns Network boot type of the client.
**/
	public function getBootType()
	{
		return($this->getProperty('dhcpBootimage', 'getBootType: No boot type set.'));
	}





/**
**name CClient::usesDynamicIP()
**description Checks if the client uses dynamic IPs.
**returns true, if the client uses dynamic IPs otherwise false.
**/
	public function usesDynamicIP()
	{
		return($this->getBootType() == CClient::BOOTTYPE_GPXE);
	}





/**
**name CClient::setBootType($bootType)
**description Sets the client's (network) boot type.
**parameter bootType: CClient::BOOTTYPE_PXE, CClient::BOOTTYPE_NOBOOT, CClient::BOOTTYPE_ETHERBOOT, CClient::BOOTTYPE_GRUB2EFIX64
**returns true on successfully setting the client's boot type, otherwise false.
**/
	public function setBootType($bootType)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Check, if client should be booted via EFI and if is uses another architecture than amd64
		if ((CClient::BOOTTYPE_GRUB2EFIX64 == $bootType) && ($this->getArch() != 'amd64'))
		{
			$this->addErrorMessage($I18N_uefiBooingIsOnlySupportedOnAMD64);
			return(false);
		}

		if ($this->checkBootType($bootType))
		{
			$this->clientInfo['dhcpBootimage'] = $bootType;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::getNetworkBootTypesArrayForSelection()
**description Generates an array with all avaialable network boot types for using it in a selection.
**returns Array with all avaialable network boot types (depends on the usage of m23shared) for using it in a selection.
**/
	public static function getNetworkBootTypesArrayForSelection()
	{
		if ($_SESSION['m23Shared'])
			return(array(CClient::BOOTTYPE_GPXE => "gPXE/DHCP"));
		else
			return(array(CClient::BOOTTYPE_PXE => "pxe", CClient::BOOTTYPE_GRUB2EFIX64 => 'UEFI x86_64', CClient::BOOTTYPE_ETHERBOOT => "etherboot", CClient::BOOTTYPE_GPXE => "gPXE/DHCP"));
	}





/**
**name CClient::startInstall()
**description Starts the installation on the client
**/
	public function startInstall()
	{
		CLIENT_startInstall($this->getClientName());
	}





/**
**name CClient::activateNetboot()
**description Activates network booting for the client.
**returns true on successfully restarting the DHCP server.
**/
	public function activateNetboot()
	{
		//Make sure, the settings are written to the DB (needed for DHCP_activateBoot)
		$this->save();
		return(DHCP_activateBoot($this->getClientName(), true, $this->getBootType()));
	}




/**
**name CClient::deactivateNetboot()
**description Deactivates network booting for the client.
**returns true on successfully restarting the DHCP server.
**/
	public function deactivateNetboot()
	{
		return(DHCP_activateBoot($this->getClientName(), false));
	}





/**
**name CClient::wol()
**description Wakes a client over the network.
**/
	public function wol()
	{
		if (file_exists('/m23/ar/09_etherwaker'))
			exec('/m23/ar/09_etherwaker '.$this->getIP());
		else
			CLIENT_wol($this->getClientName());
	}





/**
**name CClient::isNetbootActive()
**description Check, if network booting is active for the client.
**returns true when network booting is active otherwise false.
**/
	public function isNetbootActive()
	{
		DHCP_isNetworkBootingActive($this->getClientName());
	}





/**
**name CClient::isPingable()
**description Checks, if the client can be pinged over the network.
**return true, if the client can be pinged, otherwise false.
**/
	public function isPingable()
	{
		return(pingIP($this->getIP()));
	}





/**
**name CClient::sshFetchJob()
**description Connects to the client via SSH and lets the next job fetch and execute it in a screen (named "m23install").
**/
	public function sshFetchJob()
	{
		CLIENT_sshFetchJob($this->getClientName());
	}





/**
**name CClient::executeBySSH($cmds)
**description Runs a commands under a plain BASH with root rights on the client.
**parameter cmds: the commands of the script 
**returns The output of the script.
**/
	public function executeBySSH($cmds)
	{
		$jobName = uniqid('executeBySSH');
		return(CLIENT_executeOnClientOrIP($this->getIP(), $jobName, $cmds, 'root', false));
	}





/**
**name CClient::generateHTMLClientNameBar()
**description Generates an URL with the client name linking to the client details page.
**returns URL with the client name linking to the client details page.
**/
	public function generateHTMLClientNameBar()
	{
		$client = $this->getClientName();
		$id = $this->getID();

		return("<a href=\"index.php?page=clientdetails&client=$client&id=$id\">$client</a>");
	}





/**
**name CClient::generateHTMLPackagesBar()
**description Generates an URL with the amount of the client's packages linking to the client packages page.
**returns URL with the amount of the client's packages linking to the client packages page.
**/
	public function generateHTMLPackagesBar()
	{
		$client = $this->getClientName();
		$id = $this->getID();

		$counted_clientpackages = PKG_countPackages($client);
		return("<a sort=\"$counted_clientpackages\" href=\"index.php?page=clientpackages&id=$id&client=$client\">$counted_clientpackages</a>");
	}





/**
**name CClient::generateHTMLWaitingAllJobsBar()
**description Generates an URL with the amount of the client's waiting jobs and all jobs linking to the change jobs page.
**returns URL with the amount of the client's packages linking to the client packages page.
**/
	public function generateHTMLWaitingAllJobsBar()
	{
		$client = $this->getClientName();
		$id = $this->getID();

		//Count all and the waiting jobs for the client.
		$counted_waitingClientjobs = PKG_countJobs($client,'waiting');
		$counted_clientjobs = PKG_countJobs($client,'');

		$sortIndex = $counted_waitingClientjobs * 1000000000 + $counted_clientjobs * 1000000;

		return("<a sort=\"$sortIndex\" href=\"index.php?page=changeJobs&id=$id&client=$client\">$counted_waitingClientjobs/$counted_clientjobs</a>");
	}




/**
**name CClient::generateHTMLWaitingAllJobsBar()
**description Generates an URL with the amount of the client's waiting jobs and all jobs linking to the change jobs page.
**returns URL with the amount of the client's packages linking to the client packages page.
**/
	public function generateHTMLGroupsBar()
	{
		return(GRP_showClientGroups($this->getClientName(), true, false));
	}





/**
**name CClient::getActionString($actionString)
**description Generates the action string (e.g. an URL for GET)
**parameter actionString: Action string that may contain CLIENT_NAME (will be replaced by the name of the client) and CLIENT_ID (will be replaced by the ID of the client).
**returns Changed (or unchanged) action string.
**/
	public function getActionString($actionString)
	{
		$out = $actionString;
		$out = str_replace('CLIENT_NAME', $this->getClientName(), $out);
		$out = str_replace('CLIENT_ID', $this->getID(), $out);
		return($out);
	}





/**
**name CClient::destroy()
**description Destroys a client finally.
**/
	public function destroy()
	{
		$client = $this->getClientName();
		$this->deactivateNetboot();

		if (!empty($client))
		{
			//Delete the VM: if ($deleteVM) VM_delete($client);

			SERVER_delEtcHosts($client);
			deleteClientLogs($client);
			CLIENT_removeServerCache($client);
			GRP_delClientFromGroup($client);
			SERVER_delEtcHosts($client);

			DB_query("DELETE FROM clients WHERE client='$client'"); //FW ok
			DB_query("DELETE FROM clientjobs WHERE client='$client' "); //FW ok
			DB_query("DELETE FROM clientpackages WHERE clientname='$client' "); //FW ok
		}
	
		//Re-calculate the MD5 sum to disable saving on calling the destructor
		$this->md5 = md5(serialize($this->clientInfo));
	}


/*	public function __toString()
	{
		return(print_r($this->clientInfo, true));
	}*/
}


?>