<?

class CClientLister extends CChecks
{
	const ORDERBY_STATUS = 'clients.status';
	const ORDERBY_CLIENT = 'clients.client';
	const ORDERBY_INSTALLDATE = 'clients.installdate';
	const ORDERBY_LASTMODIFY = 'clients.lastmodify';
	const ORDERBY_IP = 'clients.ip';
	const ORDERBY_MAC = 'clients.mac';
	const ORDERBY_PACKAGES = 3;
	const ORDERBY_JOBS = 4;
	const ORDERBY_GROUP = 2;

	const COLUMN_STATUS = 0;
	const COLUMN_CLIENT = 1;
	const COLUMN_GROUP = 2;
	const COLUMN_PACKAGES = 3;
	const COLUMN_JOBS = 4;
	const COLUMN_INSTALL_DATE = 5;
	const COLUMN_LAST_CHANGE = 6;
	const COLUMN_ACTION = 7;
	const COLUMN_CONTINUOUS_NUMBER = 8;
	const COLUMN_IP = 9;
	const COLUMN_MAC = 10;
	const COLUMN_CHECKBOX = 11;
	const COLUMN_MAX = 11;

	const ACTION_SETUP = 0;
	const ACTION_INSTALL = 1;
	const ACTION_DEINSTALL = 2;
	const ACTION_UPDATE = 3;
	const ACTION_DELETE = 4;
	const ACTION_CRITICAL = 5;
	const ACTION_MASSINSTALL = 6;
	const ACTION_CONTROLCENTER = 2323;

	private $orderBy = 'clients.client', $statusWHERE = '', $groupWHERE = '', $groupFROM = '', $searchWHERE = '', $directionORDER = 'ASC', $vmRunOnHostWHERE = '', $mySQLResID = null, $actionString ='', $outputColumns = null, $checkedClientNamesIDs = array(), $extraLine = null;





	public function __construct()
	{
		$this->importCheckedClientNamesIds();
	}





/**
**name CClientLister::showClientTable()
**description Shows the table with matching clients and their given columns.
**/
	public function showClientTable()
	{
		HTML_showTableHeader(false, 'subtable');
		$this->showClientListHeader();
		$this->showClientList();
		HTML_showTableEnd(false);
	}





/**
**name CClientLister::generateHTMLClientNameIdCheckbox($clientInfo)
**description Generates a checkbox for a client and its ID.
**parameter clientInfo: Array containing information about the client (e.g. its name and ID).
**returns HTML code for a checkbox containing client and ID information.
**/
	private function generateHTMLClientNameIdCheckbox($clientInfo)
	{
		$htmlName = urlencode('CB_CClientLister#'.$clientInfo['client'].'#'.$clientInfo['id']);
		HTML_checkBox($htmlName, '');
		return(constant($htmlName));
	}





/**
**name CClientLister::importCheckedClientNamesIds()
**description Imports the clientnames/IDs of the checked checkboxes.
**/
	private function importCheckedClientNamesIds()
	{
		$i=0;
		$temp = HTML_checkBoxCheckAll('CB_CClientLister');

		if (is_array($temp))
		{
			foreach ($temp as $CBClientNameID)
			{
				$CBClientNameID = explode('#',urldecode($CBClientNameID));
				$this->checkedClientNamesIDs[$CBClientNameID[2]] = $CBClientNameID[1];
			}
		}
	}





/**
**name CClientLister::getCheckedClientNames()
**description Returns name (as key) and ID (as value) of checked clients as array.
**returns Array containing name (as key) and ID (as value) of checked clients.
**/
	public function getCheckedClientNames()
	{
		return($this->checkedClientNamesIDs);
	}





/**
**name CClientLister::showClientList()
**description Shows the table header of the client output list.
**/
	private function showClientList()
	{
		//Continous counter
		$nr = 1;

		while ($clientInfo = $this->getClient())
		{
			$CClientO = new CClient($clientInfo);
			$i = 1;

			//Write the coloring for the row in the 0 entry of the array
			$lines[$nr] = array(0 => (($nr % 2) == 1));

			foreach ($this->outputColumns as $col)
			{
				switch ($col)
				{
					case CClientLister::COLUMN_STATUS: $lines[$nr][$i++] = $CClientO->generateHTMLStatusBar(); break;
					case CClientLister::COLUMN_CLIENT: $lines[$nr][$i++] = $CClientO->generateHTMLClientNameBar(); break;
					case CClientLister::COLUMN_GROUP: $lines[$nr][$i++] = $CClientO->generateHTMLGroupsBar(); break;
					case CClientLister::COLUMN_PACKAGES: $lines[$nr][$i++] = $CClientO->generateHTMLPackagesBar(); break;
					case CClientLister::COLUMN_JOBS: $lines[$nr][$i++] = $CClientO->generateHTMLWaitingAllJobsBar(); break;
					case CClientLister::COLUMN_INSTALL_DATE: $lines[$nr][$i++] = $CClientO->getInstallDateHumanReadable(); break;
					case CClientLister::COLUMN_LAST_CHANGE: $lines[$nr][$i++] = $CClientO->getModifyDateHumanReadable(); break;
					case CClientLister::COLUMN_ACTION: $lines[$nr][$i++] = $CClientO->getActionString($this->getActionString()); break;
					case CClientLister::COLUMN_IP: $lines[$nr][$i++] = $CClientO->getIP(); break;
					case CClientLister::COLUMN_MAC: $lines[$nr][$i++] = $CClientO->getMAC(); break;
					case CClientLister::COLUMN_CONTINUOUS_NUMBER: $lines[$nr][$i++] = $nr; break;
					case CClientLister::COLUMN_CHECKBOX: $lines[$nr][$i++] = $this->generateHTMLClientNameIdCheckbox($clientInfo); break;
				}
			}

			if ($i == 0)
				die('showClientListHeader: No columns selected.');

			
			$nr++;
		}

		//Does extra sorting of special fields
		$this->sortLines($lines);

		if (count($lines) > 0)
			//Give out the lines
			foreach ($lines as $line)
				call_user_func_array('HTML_showTableRow', $line);

		$this->showClientListExtraLine();
	}





/**
**name CClientLister::showClientListExtraLine()
**description Shows the extra line at the end of the client list.
**/
	private function showClientListExtraLine()
	{
		if (is_array($this->extraLine))
			call_user_func_array('HTML_showTableRow', $this->extraLine);
	}





/**
**name CClientLister::setClientListExtraLine()
**description Sets the extra line that will be shown at the end of the client list.
**parameter Arbitrary amount of cells to show at the end of the client list table.
**/
	public function setClientListExtraLine()
	{
		if ($this->outputColumns === null)
			die('setClientListExtraLine: setOutputColumns must be called before');

		//Get the number of arguments of this function and the needed amount of arguments to match the columns of $this->outputColumns
		$argc = func_num_args();
		$colc = count($this->outputColumns);

		if ($argc != $colc)
			die("setClientListExtraLine: $argc arguments got, $colc arguments expected.");

		$this->extraLine = array();
		for($i=0; $i < $argc; $i++)
			$this->extraLine[$i] = func_get_arg($i);
	}





/**
**name CClientLister::getColumnNrToSort()
**description Figures out to column number which contains the values to sort.
**returns Column number which contains the values to sort or false, if $this->orderBy is a SQL sorting statement.
**/
	private function getColumnNrToSort()
	{
		//Check, if $this->orderBy is a number and not a SQL sorting statement
		if (is_numeric($this->orderBy))
		{
			//Run thru the columns of the output table
			for ($i=0; $i < count($this->outputColumns); $i++)
				//Check, if the current column is the wanted
				if ($this->orderBy == $this->outputColumns[$i])
					//+1 because the column 0 contains the coloring
					return($i+1);
		}

		return(false);
	}





/**
**name CClientLister::getColumnNrWithContinousNumber()
**description Figures out to column number which contains the continous numbers.
**returns Column number which contains the continous numbers or false, if no column with continous numbers is present.
**/
	private function getColumnNrWithContinousNumber()
	{
		//Run thru the columns of the output table
		for ($i=0; $i < count($this->outputColumns); $i++)
			//Check, if the current column is the wanted
			if (CClientLister::COLUMN_CONTINUOUS_NUMBER == $this->outputColumns[$i])
				//+1 because the column 0 contains the coloring
				return($i+1);

		return(false);
	}





/**
**name CClientLister::cmpArrayElements($columnNr)
**description Builds a sorting function that compares the colums of two arrays.
**parameter columnNr: Column number to compare in the two arrays.
**/
	private function cmpArrayElements($columnNr)
	{
		//Build a sorting function for ascending or descending
		if ($this->isAscending())
			return (function ($a, $b) use ($columnNr) { return (strnatcasecmp($a[$columnNr], $b[$columnNr])); });
		else
			return (function ($a, $b) use ($columnNr) { return (1-strnatcasecmp($a[$columnNr], $b[$columnNr])); });
	}





/**
**name CClientLister::sortLines(&$lines)
**description Does extra line sorting of special fields, that could not be sorted by SQL.
**parameter lines: Array with the lines to sort.
**/
	private function sortLines(&$lines)
	{
		//Get the column nr to sort (or false, if the lines are sorted by SQL)
		$columnNrToSort = $this->getColumnNrToSort();
		if ($columnNrToSort === false)
			return(false);

		//Sort the array with a special sorting function
		usort($lines, $this->cmpArrayElements($columnNrToSort));

		//Check if there is a column with continous numbers
		$columnNrWithContinousNumber = $this->getColumnNrWithContinousNumber();

		//Fix the coloring (and eventually existing continous numbers)
		for ($i=0; $i < count($lines); $i++)
		{
			$lines[$i][0] = (($i % 2) == 0);
			if ($columnNrWithContinousNumber !== false)
				$lines[$i][$columnNrWithContinousNumber] = $i+1;
		}
	}





/**
**name CClientLister::getAscDescHeader($orderBy, $i18n)
**description Generates a sorting header with column title and ascending/descending button.
**parameter orderBy: Ordering constant (ORDERBY_*).
**parameter i18n: The name of the I18N variable.
**/
	private function getAscDescHeader($orderBy, $i18n)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		//Generate valid HTML names for the ascending and descending buttons
		$htmlNameASC = md5($orderBy.'ASC');
		$htmlNameDESC = md5($orderBy.'DESC');

		if (HTML_submitImg($htmlNameASC, '/gfx/upArrow.png', $I18N_ascending))
		{
			$this->setOrderBy($orderBy);
			$this->setAscending(true);
		}

		if (HTML_submitImg($htmlNameDESC, '/gfx/downArrow.png', $I18N_descending))
		{
			$this->setOrderBy($orderBy);
			$this->setAscending(false);
		}

		return('<center>'.$$i18n.'<br>'.constant($htmlNameASC).constant($htmlNameDESC).'</center>');
	}





/**
**name CClientLister::getStatusHeader()
**description Generates a sorting header for the client's status.
**/
	private function getStatusHeader()
	{
		return($this->getAscDescHeader(CClientLister::ORDERBY_STATUS, 'I18N_status'));
	}





/**
**name CClientLister::getClientNameHeader()
**description Generates a sorting header for the client's name.
**/
	private function getClientNameHeader()
	{
		return($this->getAscDescHeader(CClientLister::ORDERBY_CLIENT, 'I18N_client_name'));
	}





/**
**name CClientLister::getInstallDateHeader()
**description Generates a sorting header for the client's installation date.
**/
	private function getInstallDateHeader()
	{
		return($this->getAscDescHeader(CClientLister::ORDERBY_INSTALLDATE, 'I18N_install_date'));
	}





/**
**name CClientLister::getLastModifyHeader()
**description Generates a sorting header for the client's last modifikation date.
**/
	private function getLastModifyHeader()
	{
		return($this->getAscDescHeader(CClientLister::ORDERBY_LASTMODIFY, 'I18N_last_change'));
	}





/**
**name CClientLister::getIPHeader()
**description Generates a sorting header for the client's IP address.
**/
	private function getIPHeader()
	{
		return($this->getAscDescHeader(CClientLister::ORDERBY_IP, 'I18N_ip'));
	}





/**
**name CClientLister::getMACHeader()
**description Generates a sorting header for the client's MAC address.
**/
	private function getMACHeader()
	{
		return($this->getAscDescHeader(CClientLister::ORDERBY_MAC, 'I18N_mac'));
	}





/**
**name CClientLister::getJobsHeader()
**description Generates a sorting header for the client's waiting.
**/
	private function getJobsHeader()
	{
		return($this->getAscDescHeader(CClientLister::ORDERBY_JOBS, 'I18N_jobs'));
	}





/**
**name CClientLister::getPackagesHeader()
**description Generates a sorting header for the client's packages.
**/
	private function getPackagesHeader()
	{
		return($this->getAscDescHeader(CClientLister::ORDERBY_PACKAGES, 'I18N_packages'));
	}





/**
**name CClientLister::getGroupHeader()
**description Generates a sorting header for the client's groups.
**/
	private function getGroupHeader()
	{
		return($this->getAscDescHeader(CClientLister::ORDERBY_GROUP, 'I18N_group'));
	}





/**
**name CClientLister::showClientListHeader()
**description Shows the table header of the client output list.
**/
	private function showClientListHeader()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		$i=0;
		
		foreach ($this->outputColumns as $col)
		{
			switch ($col)
			{
				case CClientLister::COLUMN_STATUS: $headings[$i++] = $this->getStatusHeader(); break;
				case CClientLister::COLUMN_CLIENT: $headings[$i++] = $this->getClientNameHeader(); break;
				case CClientLister::COLUMN_GROUP: $headings[$i++] = $this->getGroupHeader(); break;
				case CClientLister::COLUMN_PACKAGES: $headings[$i++] = $this->getPackagesHeader(); break;
				case CClientLister::COLUMN_JOBS: $headings[$i++] = $this->getJobsHeader(); break;
				case CClientLister::COLUMN_INSTALL_DATE: $headings[$i++] = $this->getInstallDateHeader(); break;
				case CClientLister::COLUMN_LAST_CHANGE: $headings[$i++] = $this->getLastModifyHeader(); break;
				case CClientLister::COLUMN_ACTION: $headings[$i++] = $I18N_action; break;
				case CClientLister::COLUMN_CONTINUOUS_NUMBER: $headings[$i++] = ' '; break;
				case CClientLister::COLUMN_IP: $headings[$i++] = $this->getIPHeader(); break;
				case CClientLister::COLUMN_MAC: $headings[$i++] = $this->getMACHeader(); break;
				case CClientLister::COLUMN_CHECKBOX: $headings[$i++] = ' '; break;
			}
		}

		if ($i == 0)
			die('showClientListHeader: No columns selected.');

		call_user_func_array('HTML_showTableHeading', $headings);
	}





/**
**name CClientLister::setOutputColumns()
**description Sets the sequence of the columns to show in the output list.
**parameter Arbitrary amount of CClientLister::COLUMN_* constants to mark the purpose of the columns.
**/
	public function setOutputColumns()
	{
		$this->outputColumns = array();

		//Run thru all columns
		for($i=0; $i < func_num_args(); $i++)
		{
			//Check, if the value is valid
			$arg = func_get_arg($i);
			if (($arg >= 0) && ($arg <= CClientLister::COLUMN_MAX))
				$this->outputColumns[$i] = $arg;
			else
				die ("setOutputColumns: Unknown constant ($arg).");
		}
	}





/**
**name CClientLister::setActionString($actionString)
**description Sets the action string, where CLIENT_NAME will be replaced by the actual name of the client and CLIENT_ID by its ID.
**parameter actionString: Full action string (with placeholders).
**/
	public function setActionString($action)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		switch ($action)
		{
			case CClientLister::ACTION_SETUP: $this->actionString = "<a href=\"index.php?page=fdisk&id=CLIENT_ID&client=CLIENT_NAME&clearSession=1\">$I18N_setup</a>"; break;

	    	case CClientLister::ACTION_INSTALL: $this->actionString = "<a href=\"index.php?page=installpackages&client=CLIENT_NAME&id=CLIENT_ID\">$I18N_install</a>"; break;

			case CClientLister::ACTION_DEINSTALL: $this->actionString = "<a href=\"index.php?page=installpackages&client=CLIENT_NAME&id=CLIENT_ID&key=asdfghjkldfgrf&action=deinstall\">$I18N_deinstall</a>"; break;

			case CClientLister::ACTION_UPDATE: $this->actionString = "<a href=\"index.php?page=installpackages&client=CLIENT_NAME&id=CLIENT_ID&action=update\">$I18N_update</a>"; break;

			case CClientLister::ACTION_DELETE: $this->actionString = "<a href=\"index.php?page=deleteclient&id=CLIENT_ID&client=CLIENT_NAME\">$I18N_delete</a>"; break;

			case CClientLister::ACTION_CRITICAL: $this->actionString = "<a href=\"index.php?page=clientdetails&client=CLIENT_NAME&id=CLIENT_ID#criticalStatus\">$I18N_repair</a>"; break;

			case CClientLister::ACTION_MASSINSTALL: $this->actionString = "<a href=\"index.php?page=massInstall&client=CLIENT_NAME&id=CLIENT_ID\">$I18N_massInstall</a>"; break;

			default: $this->actionString = "<a href=\"index.php?page=clientdetails&client=CLIENT_NAME&id=CLIENT_ID\">$I18N_controlCenter</a>";
		};
	}





/**
**name CClientLister::getActionString()
**description Gets the action string.
**returns The action string
**/
	public function getActionString()
	{
		return($this->actionString);
	}





/**
**name CClientLister::setOrderBy($order)
**description Sets the ordering method for generating the output.
**parameter order: ORDERBY_* mode to sort the output.
**returns true on success.
**/
	public function setOrderBy($order)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if ((ORDERBY_STATUS == $order) || (ORDERBY_CLIENT == $order) || (ORDERBY_INSTALLDATE == $order) || (ORDERBY_LASTMODIFY == $order) || (ORDERBY_IP == $order) || (ORDERBY_MAC))
		{
			$this->orderBy = $order;
			return(true);
		}
		else
			die(1);
	}





/**
**name CClientLister::addStatusFilter($operator, $status)
**description Adds an OR filter to get only clients that gave the given status (stati).
**parameter operator: Operator (can be '=', '<', '>') selects if the client status should be equal, smaler or bigger that the given status.
**parameter status: Status to compare with the state of the client
**/
	public function addStatusFilter($operator, $status)
	{
		CHECK_FW(CC_statusOrEmpty, $status, CC_biggerEqualSmaler, $operator);

		if (!isset($this->statusWHERE{1}))
			$this->statusWHERE = "status $operator '$status' ";
		else
			$this->statusWHERE .= "OR status $operator '$status' ";
	}





/**
**name CClientLister::addGroupFilter($groupName)
**description Adds the group filter to get only clients that are into the given group.
**parameter groupName: Name of the group to filter.
**/
	public function addGroupFilter($groupName)
	{
		$gid = GRP_getIdByName($groupName);

		if (is_numeric($gid))
		{
			$this->groupWHERE = "clients.id=clientgroups.clientid AND clientgroups.groupid=$gid";
			$this->groupFROM = ', clientgroups';
		}
	}





/**
**name CClientLister::addSearchFilter($search)
**description Adds a search filter to get only clients that match the search word in at least one table field.
**parameter search: The search word.
**/
	public function addSearchFilter($search)
	{
		$firstSearchEntry = true;

		$this->searchWHERE = " (";
		foreach (DB_getLikeableColumns("clients") as $field)
		{
			if ($firstSearchEntry)
			{
				$this->searchWHERE .= "($field LIKE \"%$search%\") ";
				$firstSearchEntry = false;
			}
			else
				$this->searchWHERE .= "|| ($field LIKE \"%$search%\") ";
		}

		$this->searchWHERE .= ") ";
	}





/**
**name CClientLister::setAscending($ascending = true)
**description Sets the output ordering ascending (default) or descending.
**parameter ascending: Set to true, if the output should be generated in ascending order. For descending order, set to false.
**/
	public function setAscending($ascending = true)
	{
		if ($ascending)
			$this->directionORDER = 'ASC';
		else
			$this->directionORDER = 'DESC';
	}



/**
**name CClientLister::isAscending()
**description Checks if the sorting of the column is ascending.
**returns true, if sorting of the column is ascending otherwise false.
**/
	private function isAscending()
	{
		return($this->directionORDER === 'ASC' ? true : false);
	}





/**
**name CClientLister::vmRunOnHostFilter($vmID)
**description Sets a filter to only give out virtual clients that are hosted on a given VM host.
**parameter vmID: ID of the m23 client, that is VM host for other m23 clients.
**/
	public function vmRunOnHostFilter($vmID)
	{
		//If all clients running on a special VM host should be searched, no search string is allowed
		$this->searchWHERE = '';
		$this->vmRunOnHostWHERE = 'clients.vmRunOnHost = '.$vmID.' ';
	}





/**
**name CClientLister::resetGetting()
**description Sets back the MySQL connection to initalise a new search and getting of clients from the beginning.
**/
	public function resetGetting()
	{
		$this->mySQLResID = null;
	}





/**
**name CClientLister::getClient()
**description Gets a client matching all active filters. This can be called many times.
**returns Client information in an associative array or false, if no (additional) clients clould be got.
**/
	public function getClient()
	{
		if (is_null($this->mySQLResID))
		{
			$where = 'WHERE';
	
			$w = $this->statusWHERE;
	
			if (isset($w{1})) $or = 'OR';

			if (!empty($this->groupWHERE))
				$w .= " $or ".$this->groupWHERE;
	
			if (isset($w{1})) $or = 'OR';

			if (!empty($this->searchWHERE))
				$w .= " $or ".$this->searchWHERE;

			if (isset($w{1})) $or = 'OR';

			//Check if "vmRunOnHost" is set and add the statement
			if (!empty($this->vmRunOnHostWHERE))
				$w .= " $or ".$this->vmRunOnHostWHERE;
	
			//disable the WHERE clause if there are no AND or OR filters
			if (empty($w))
				$where = '';
	
			//Add brackets to make the AND or OR filters work together with "vmRunOnHost" set 
			if (!empty($w))
				$w = "($w)";
	
			$this->mySQLResID = db_query('SELECT clients.* FROM clients'.$this->groupFROM." $where $w ORDER BY ".$this->orderBy.' '.$this->directionORDER);
		}
		
		if ($this->mySQLResID !== false)
			return(mysql_fetch_assoc($this->mySQLResID));
		else
			return(false);
	}





/**
**name CClientLister::isMatchingClientPresent($key, $val)
**description Checks if at least one clients with a given key-value-combination is found.
**parameter key: The key to search for (e.g. office)
**parameter val: The value to search for (e.g. home)
**returns true, if at least one client is found.
**/
	static private function isMatchingClientPresent($key, $val)
	{
		$sql = "SELECT COUNT(*) FROM `clients` WHERE $key='$val' ";
		$result=DB_query($sql);
		$line=mysql_fetch_array($result);

		return( $line[0] > 0 );
	}





/**
**name CClientLister::IPexists($ip)
**description checks if an IP with the selected IP exists and returns true if yes, otherwise false
**parameter ip: IP to check
**/
	static function IPexists($ip)
	{
		return(CClientLister::isMatchingClientPresent('ip', $ip));
	}






/**
**name CClientLister::MACexists($mac)
**description checks if a mac with the selected mac exists and returns true if yes, otherwise false
**parameter mac: MAC to check
**/
	static function MACexists($mac)
	{
		return(CClientLister::isMatchingClientPresent('mac', $mac));
	}






/**
**name CClientLister::ClientExists($clientName)
**description checks if a client with the selected name exists and returns true if yes, otherwise false
**parameter clientName: name of the client
**/
	static function ClientExists($clientName)
	{
		return(CClientLister::isMatchingClientPresent('client', $clientName));
	}
}
?>