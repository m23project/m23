<?

class CClient extends CChecks
{
	private $clientInfo = array(), $paramKeys = '', $md5 = '';

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





/**
**name CClient::__construct($in, $mustExist = false)
**description Constructor for new CClient objects. The object holds all information about a single client and loads the values from the DB.
**parameter in: ID of an existing client (to load), name of an existing or nonexisting (to create) client or associative array of parameters.
**parameter mustExist: If set to true, the client with the given name must exist.
**/
	public function __construct($in, $mustExist = false)
	{
		//Check if the parameter is a client ID
		if (is_numeric($in))
		{
			$clientID = $in;
			CHECK_FW(CC_id, $clientID);
			$sql = "SELECT * FROM `clients` WHERE id='$clientID'";
			$result = DB_query($sql); //FW ok

			if (mysql_num_rows($result) === 0)
				die('Client with ID '.$clientID.' does not exist!');

			$params = mysql_fetch_assoc($result);
		}
		//Check if the parameter is a client name
		elseif (is_string($in))
		{
			$clientName = $in;
			if ($this->checkClientname($clientName))
			{
				//Try to get the params of the client
				$sqlSelect = "SELECT * FROM `clients` WHERE client='$clientName'";
				$result = DB_query($sqlSelect); //FW ok

				//Check if there could be fetched no params (client is nonexisting)
				if (mysql_num_rows($result) === 0)
				{
					if ($mustExist != false)
						die('Client with name '.$clientName.' does not exist!');
				
					$modifydate = time();

					//Add a basic entry to the DB
					DB_query("INSERT INTO clients (client, lastmodify) VALUES ('$clientName', '$modifydate')");

					//Fetch the entry from the DB again
					$result = DB_query($sqlSelect); //FW ok
				}
				$params = mysql_fetch_assoc($result);
			}
			else
			{
				$this->showError();
				die('Clientname invalid.');
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

		//Calculate a checksum over the initial settings of the client
		$this->md5 = md5(serialize($this->clientInfo));
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
**name CClient::getClientCurrentWorkPHP()
**description Returns the current contents of the work.php for this client.
**returns Current contents of the work.php for this client.
**/
	public function getClientCurrentWorkPHP()
	{
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
	
		foreach ($this->clientInfo as $key => $val)
		{
			//Continue on empty key
			if (!isset($key{1}) || ($key == 'id'))
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
	}





/**
**name CClient::getProperty($key, $dieMessage)
**description Gets a client property from $this->clientInfo and dies, if this property is not set.
**parameter key: Name of the property.
**parameter dieMessage: Message to show before dying.
**returns Value of the property.
**/
	private function getProperty($key, $dieMessage)
	{
		if (isset($this->clientInfo[$key]) && (is_numeric($this->clientInfo[$key]) || !empty($this->clientInfo[$key])))
			return($this->clientInfo[$key]);
/*		else
			die($dieMessage);*/
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
**name CClient::getArch()
**description Returns the architecture of the client.
**returns Architecture of the client.
**/
	public function getArch()
	{
		return($this->getProperty('arch', 'getArch: No architecture set.'));
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
			//IDEE: Bei aktiviertem Netzbooten gleich dhcp-Einstellungen ändern
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::getIP()
**description Returns the client's IP.
**returns IP of the client.
**/
	public function getIP()
	{
		return($this->getProperty('ip', 'getIP: No IP set.'));
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
**name CClient::getMAC()
**description Returns the client's MAC.
**returns MAC of the client.
**/
	public function getMAC()
	{
		return($this->getProperty('mac', 'getMAC: No MAC set.'));
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
**name CClient::setBootType($bootType)
**description Sets the client's (network) boot type.
**parameter bootType: CClient::BOOTTYPE_PXE, CClient::BOOTTYPE_NOBOOT, CClient::BOOTTYPE_ETHERBOOT
**returns true on successfully setting the client's boot type, otherwise false.
**/
	public function setBootType($bootType)
	{
		if ($this->checkBootType($bootType))
		{
			$this->clientInfo['dhcpBootimage'] = $bootType;
			return(true);
		}
		else
			return(false);
	}





/**
**name CClient::activateNetboot()
**description Activates network booting for the client.
**returns true on successfully restarting the DHCP server.
**/
	public function activateNetboot()
	{
		return(DHCP_addClient($this->getClientName(), $this->getIP(), $this->getNetmask(), $this->getMAC(), $this->getBootType(), $this->getGateway(), false));
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
**name CClient::isNetbootActive()
**description Check, if network booting is active for the client.
**returns true when network booting is active otherwise false.
**/
	public function isNetbootActive()
	{
		DHCP_isNetworkBootingActive($this->getClientName());
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
**name CClientLister::destroy()
**description Destroys a client finally.
**/
	public function destroy()
	{
		$client = $this->getClientName();
		$this->deactivateNetboot();

		//Delete the VM: if ($deleteVM) VM_delete($client);

		deleteClientLogs($client);
		CLIENT_removeServerCache($client);
		GRP_delClientFromGroup($client);
		SERVER_delEtcHosts($client);

		db_query("DELETE FROM clients WHERE client='$client'"); //FW ok
		db_query("DELETE FROM clientjobs WHERE client='$client' "); //FW ok
		db_query("DELETE FROM clientpackages WHERE clientname='$client' "); //FW ok
	
		//Re-calculate the MD5 sum to disable saving on calling the destructor
		$this->md5 = md5(serialize($this->clientInfo));
	}


/*	public function __toString()
	{
		return(print_r($this->clientInfo, true));
	}*/
}


?>