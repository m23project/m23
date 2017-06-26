<?

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Class for handling ranges of IP addresses.
$*/


	class CIPRanges extends CChecks
	{
		private $searchFilter = '';


		/**
		**name CIPRanges::findRanges($ip, $selectType)
		**description Finds an IP range that includes a given IP address or all IP ranges.
		**parameter ip: The IP that should be part of the IP range to search or 'false' for all IP ranges.
		**parameter selectType: SQL parameter for the SELECT command to choose the fields to produce. (e.g. '*' or 'COUNT(*)')
		**returns A MySQL resource ID or false in case of an error.
		**/
		private function findRanges($ip, $selectType)
		{
			//Check, if all ranges should be searched or one range
			if ($ip !== false)
			{
				//Make sure the IP is correct
				if ($this->checkIP($ip))
					$intIP = ip2longSafe($ip);
				else
					return(false);
				$where = "WHERE `firstIPInt` <=$intIP AND `lastIPInt` >=$intIP";
			}
			else
				$where = '';

			$res = DB_query("SELECT $selectType FROM `lockedIPRanges` $where");
			return($res);
		}





		/**
		**name CIPRanges::getRanges($ip)
		**description Finds an IP range that includes a given IP address or all IP ranges.
		**parameter ip: The IP that should be part of the IP range to search or 'false' for all IP ranges.
		**returns An associative array with the found IP ranges or false in case of an error. (e.g. Array ( [0] => Array ( [firstIP] => 192.168.0.2 [lastIP] => 192.168.0.23 ) [1] => Array ( [firstIP] => ...))
		**/
		private function getRanges($ip)
		{
			$i = 0;
			$out = array();

			//Get the MySQL ressource ID
			$res = $this->findRanges($ip, '*');
			if (false === $res)
				return(false);

			//Get ranges and convert the IPs back to normal notation
			while ($line = mysqli_fetch_assoc($res))
			{
				$out[$i]['id'] = $line['id'];
				$out[$i]['firstIP'] = long2ip($line['firstIPInt']);
				$out[$i++]['lastIP'] = long2ip($line['lastIPInt']);
			}

			return($out);
		}





		/**
		**name CIPRanges::getAllLockedRanges()
		**description Gets all locked IP ranges in their original format.
		**returns An associative array with the found IP ranges or false if no ranges could be found (e.g. Array ( [0] => Array ( [id] => 15 [firstIPInt] => 3232236016 [lastIPInt] => 3232236020 ) [1] => Array...)).
		**/
		public function getAllLockedRanges()
		{
			$i = 0;
			$out = array();

			//Get the MySQL ressource ID
			$res = $this->findRanges(false, '*');
			
			if (false === $res)
				return(false);

			//Get ranges and convert the IPs back to normal notation
			while ($line = mysqli_fetch_assoc($res))
				$out[$i++] = $line;

			return($out);
		}





		/**
		**name CIPRanges::getAllLockedIPsInt()
		**description Gets all locked IPs as int values.
		**returns Array with the locked IPs as int values (e.g. Array ( [0] => 3232235794 [1] => 3232235795 [2] => ...))
		**/
		public function getAllLockedIPsInt()
		{
			$i = 0;
			$out = array();
			
			$ranges = $this->getAllLockedRanges();
			
			if ($ranges !== false)
				foreach ($ranges as $range)
					$out = array_merge($out,range($range['firstIPInt'], $range['lastIPInt']));

			return($out);
		}





		/**
		**name CIPRanges::checkNotInRange($ip)
		**description Checks, if an IP is not part of any IP ranges. Then adds an error message to the message manager in case of an error.
		**parameter ip: The IP that should be NOT part of any IP range.
		**returns true, if the given IP is not part of any IP ranges, otherwise false.
		**/
		public function checkNotInRange($ip)
		{
			//Count the IP ranges that include the given IP
			$res = $this->findRanges($ip, 'COUNT(*)');

			if (false !== $res)
			{
				$line = mysqli_fetch_row($res);
				$lockedRanges = $line[0];
			}

			//Get the number of dynamic ranges that contain the IP
			$dynamicRanges = count($this->getDynamicRanges($ip));

			//Check, if there are found ranges, that include the given IP
			if ($lockedRanges > 0)
			{
				include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
				$this->addErrorMessage($I18N_IPisInIPRange." ($ip)");
				return(false);
			}
			elseif($dynamicRanges > 0)
			{
				include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
				$this->addErrorMessage($I18N_IPisInIPDynamicRange." ($ip)");
				return(false);
			}
				return(true);

			return(true);
		}





		/**
		**name CIPRanges::lockRange($firstIP, $lastIP)
		**description Adds a new IP range to the list of locked IP ranges.
		**parameter firstIp: The first IP marking the begin of the IP range.
		**parameter lastIp: The last IP marking the end of the IP range.
		**returns true, the IP was added to the locked IP ranges, otherwise false.
		**/
		public function lockRange($firstIP, $lastIP)
		{
			//Check, if the range is correct and if the two IPs are not part of an existing IP range
			if ($this->checkIPRange($firstIP, $firstIP) && $this->checkNotInRange($firstIP) && $this->checkNotInRange($lastIP))
			{
				//Convert the IPs to numeric format
				$firstIPInt = ip2longSafe($firstIP);
				$lastIPInt = ip2longSafe($lastIP);
				$res = DB_query("INSERT INTO `lockedIPRanges` (`firstIPInt`, `lastIPInt`) VALUES ('$firstIPInt', '$lastIPInt')");
				return (false !== $res);
			}
			return(false);
		}





		/**
		**name CIPRanges::unlockRange($rangeID)
		**description Deletes an IP range from the list of locked IP ranges.
		**parameter rangeID: The ID number of an IP range.
		**returns true, the IP was deleted from the locked IP ranges, otherwise false.
		**/
		public function unlockRange($rangeID)
		{
			$rangeID = (int)$rangeID;
			$res = DB_query("DELETE FROM `lockedIPRanges` WHERE `id` = $rangeID");

			if (false !== $res)
			{
				include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
				$this->addErrorMessage($I18N_IPRangeIDInvalid." ($rangeID)");
				return (false);
			}
			
			return (true);
		}





		/**
		**name CIPRanges::addDynamicRange($firstIP, $lastIP, $netmask, $gateway)
		**description Adds a dynamic IP range to the dhcpd.conf and restarts the DHCP server.
		**parameter firstIP: The first IP marking the begin of the dynamic IP range.
		**parameter lastIP: The last IP marking the end of the dynamic IP range.
		**parameter netmask: Netmask for the IPs.
		**parameter gateway: The gateway IP.
		**returns true, if the DHCP server could be restarted with the new settings.
		**/
		public function addDynamicRange($firstIP, $lastIP, $netmask, $gateway)
		{
			$allOK = true;
			$allOK &= $this->checkIPRange($firstIP, $firstIP);
			$allOK &= $this->checkNotInRange($firstIP);
			$allOK &= $this->checkNotInRange($lastIP);
			$allOK &= $this->checkNetmask($netmask);
			$allOK &= $this->checkGateway($gateway);

			//Check, if the range is correct and if the two IPs are not part of an existing IP range
			if ($allOK)
				return(DHCP_addDynamicRange($firstIP, $lastIP, $netmask, $gateway));
			else
				return(false);
		}





		/**
		**name CIPRanges::showRangesList()
		**description Shows a list with locked IP ranges with the possibillity to delete single ranges.
		**/
		public function showRangesList()
		{
			include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

			//Get all or a specific range(s)
			$rangesA = $this->getRanges($this->getSearchIP());

			//start the table
			HTML_showSmallTitle($I18N_lockedIpRanges);
			HTML_showTableHeader(false, 'subtable2');
				HTML_showTableHeading($I18N_firstIP, $I18N_lastIP, $I18N_action);

				//Run thru the ranges
				foreach ($rangesA as $range)
				{
					//Build a delete button and check if it was clicked
					$htmlName = 'BUT_delRangeID'.$range['id'];
					if (HTML_submit($htmlName, $I18N_remove))
						//Delete the range
						$this->unlockRange($range['id']);
					else
						//or show it
						HTML_showTableRow($range['firstIP'], $range['lastIP'], constant($htmlName));
				}

			HTML_showTableEnd(false);
		}





		/**
		**name CIPRanges::getDynamicRanges($ip)
		**description Finds a dynamic IP range that includes a given IP address or all dynamic IP ranges.
		**parameter ip: The IP that should be part of the dynamic IP range to search or 'false' for all IP ranges.
		**returns An associative array with the found IP ranges or false in case of an error. (e.g. Array ( [0] => Array ( [firstIP] => 192.168.0.2 [lastIP] => 192.168.0.23 ) [1] => Array ( [firstIP] => ...))
		**/
		private function getDynamicRanges($ip)
		{
			$ranges = DHCP_getDynamicRanges();
			$out = array();

			if ($ip === false)
				return($ranges);
			elseif ($this->checkIP($ip))
			{
				$intIP = ip2longSafe($ip);
				$i = 0;
	
				foreach ($ranges as $range)
				{
					if ((ip2longSafe($range['firstIP']) <= $intIP) && (ip2longSafe($range['lastIP']) >= $intIP))
						$out[$i++] = $range;
				}
			}

			return($out);
		}





		/**
		**name CIPRanges::delDynamicRange($firstIP, $lastIP)
		**description Removes a dynamic IP range from the dhcpd.conf and restarts the DHCP server.
		**parameter firstIP: The first IP marking the begin of the dynamic IP range.
		**parameter lastIP: The last IP marking the end of the dynamic IP range.
		**returns true, if the DHCP server could be restarted with the new settings.
		**/
		public function delDynamicRange($firstIP, $lastIP)
		{
			if ($this->checkIPRange($firstIP, $firstIP))
				return(DHCP_delDynamicRange($firstIP, $lastIP));
			else
				return(false);
		}





		/**
		**name CIPRanges::showRangesList()
		**description Shows a list with locked IP ranges with the possibillity to delete single ranges.
		**/
		public function showDynamicRangesList()
		{
			include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

			//Get all or a specific range(s)
			$rangesA = $this->getDynamicRanges($this->getSearchIP());

			//start the table
			HTML_showSmallTitle($I18N_dynamicIpRanges);
			HTML_showTableHeader(false, 'subtable2');
				HTML_showTableHeading($I18N_firstIP, $I18N_lastIP, $I18N_netmask, $I18N_gateway, $I18N_action);

				//Run thru the ranges
				foreach ($rangesA as $range)
				{
					//Build a delete button and check if it was clicked
					$htmlName = 'BUT_delDynamicRangeID-'.ip2longSafe($range['firstIP']).'-'.ip2longSafe($range['lastIP']);
					if (HTML_submit($htmlName, $I18N_remove))
					{
						$temp = explode('-',$htmlName);
						$firstIP = long2ip($temp[1]);
						$lastIP = long2ip($temp[2]);
						//Delete the range
						$this->delDynamicRange($firstIP, $lastIP);
					}
					else
						//or show it
						HTML_showTableRow($range['firstIP'], $range['lastIP'], $range['netmask'], $range['gateway'], constant($htmlName));
				}

			HTML_showTableEnd(false);
		}





		/**
		**name CIPRanges::showRangesAddingDialog()
		**description Shows a dialog for adding Ip ranges to lock or to distribute IP settings dynamically via DHCP.
		**/
		public function showRangesAddingDialog()
		{
			include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

			//Input lines for IP ranges
			$rangeFirstIp = HTML_input('ED_rangeFirstIp', false, 16, 16);
			$rangeLastIp = HTML_input('ED_rangeLastIp', false, 16, 16);
			$rangeNetmask = HTML_input('ED_rangeNetmask', false, 16, 16);
			$rangeGateway = HTML_input('ED_rangeGateway', false, 16, 16);

			if (HTML_submit('BUT_lockIpRange', $I18N_lockIpRange.'¹'))
			{
				$this->lockRange($rangeFirstIp, $rangeLastIp);
				if (!$this->showError())
					MSG_showInfo($I18N_IPRangeIsNowLocked);
			}

			if (HTML_submit('BUT_addDynamicIpRange', $I18N_addDynamicIpRange.'²'))
			{
				$this->addDynamicRange($rangeFirstIp, $rangeLastIp, $rangeNetmask, $rangeGateway);

				//Check if there are errors and show the (hopefully not existing) error message
				if (!$this->showError())
					MSG_showInfo($I18N_dynamicIPRangeAdded);
			}

			
			HTML_showSmallTitle($I18N_IPRanges);
			HTML_showTableHeader(false, 'subtable2');
				HTML_showTableRow("$I18N_firstIP <sup>1,2</sup>", ED_rangeFirstIp, "($I18N_eg 192.168.0.200)");	
				HTML_showTableRow("$I18N_lastIP <sup>1,2</sup>", ED_rangeLastIp, "($I18N_eg 192.168.0.254)");	
				HTML_showTableRow("$I18N_netmask <sup>2</sup>", ED_rangeNetmask, "($I18N_eg 255.255.255.0)");
				HTML_showTableRow("$I18N_gateway <sup>2</sup>",ED_rangeGateway," ($I18N_eg 192.168.0.1)");
				HTML_showTableRow(BUT_lockIpRange, BUT_addDynamicIpRange,'');
			HTML_showTableEnd(false);
		}





		/**
		**name CIPRanges::showSearchDialog()
		**description Shows a search dialog.
		**/
		public function showSearchDialog()
		{
			include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
			$temp = false;
			$this->searchFilter = HTML_storableInput('ED_searchIPsAndMACs', 'ip', $temp, $temp, 30, 255);
			HTML_submit('BUT_searchIPsAndMACs', $I18N_search);
		
			HTML_showSmallTitle($I18N_search);
			HTML_showTableHeader(false, 'subtable2');
				HTML_showTableRow(ED_searchIPsAndMACs,BUT_searchIPsAndMACs);
			HTML_showTableEnd(false);
		}





		/**
		**name CIPRanges::getSearchWord
		**description Gets the current unfiltered search word of the search dialog.
		**returns Search word of the search dialog.
		**/
		public function getSearchWord()
		{
			return($this->searchFilter);
		}





		/**
		**name CIPRanges::getSearchIP
		**description Gets the current valid IP of the search dialog or false.
		**returns IP or false, if the search term is not an IP.
		**/
		private function getSearchIP()
		{
			if (checkIP($this->searchFilter))
				return($this->searchFilter);
			else
				return(false);
		}
		
	}
?>