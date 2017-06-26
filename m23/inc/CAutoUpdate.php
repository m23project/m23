<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Class for handling automatic updates.
$*/

class CAutoUpdate extends CChecks
{
	private $sets = array(), $md5s = array(), $active_id = NULL, $orderBy = NULL;
	
	const UPDATE_FULL = 'd';
	const UPDATE_NORMAL = 'u';
	const ORDERBY_ID = 'id';
	const ORDERBY_LASTRUN = 'lastRun';
	const CRON_IDENT = 'CAutoUpdate';





	public function __construct()
	{
		$this->loadSets();
	}



	function __destruct()
	{
		$this->saveSets();
	}





/**
**name CAutoUpdate::getActiveSetID()
**description Gets the ID of the active set or NULL, if none is active or no sets are present.
**returns: ID of the active set or NULL, if none is active or no sets are present.
**/
	private function getActiveSetID()
	{
		$active_id = NULL;

		// Get the (oldest and hopefully only) active schedule entry
		$result = DB_query('SELECT * FROM autoUpdateSchedule WHERE active=true ORDER BY lastRun LIMIT 0,1'); //FW ok

		// Check, if there is an active entry
		if (mysqli_num_rows($result) > 0)
		{
			// Get its ID
			$line = mysqli_fetch_assoc($result);

			// Check the ID
			if (is_numeric($line['id']))
				$active_id = $line['id'];
		}

		// Try to get an active by choosing the next set
		if (is_null($active_id))
			$active_id = $this->activateNextSet();

		$this->active_id = $active_id;
		return($active_id);
	}





/**
**name CAutoUpdate::getActiveSet()
**description Gets the active set or false, if none is active or no sets are present.
**returns: Active set or false, if none is active or no sets are present.
**/
	private function getActiveSet()
	{
		$id = $this->getActiveSetID();
		if (is_null($id) || !isset($this->sets[$id]))
			return(false);
		
		return($this->sets[$id]);
	}





/**
**name CAutoUpdate::addSet($startsEnds, $groups, $type, $parallelUpdates)
**description Adds an entry to the schedule.
**parameter startsEnds: Array with the start and end times
**parameter groups: Array with the groups.
**parameter type: Type of update (CAutoUpdate::UPDATE_FULL or CAutoUpdate::UPDATE_NORMAL)
**parameter parallelUpdates: Amount of clients that should be updated in parallel.
**returns: true, on successfully insert, otherwise false.
**/
	public function addSet($type, $parallelUpdates)
	{
		// Check, if the update type is correct
		if ((CAutoUpdate::UPDATE_FULL != $type) && (CAutoUpdate::UPDATE_NORMAL != $type))
			die('ERROR: CAutoUpdate::addSet: Wrong update type.');

		// Insert a new entry into the DB
		$ret = DB_query("INSERT INTO `autoUpdateSchedule` (`type`, `parallelUpdates`, `lastRun`, `active`) VALUES ('$type', '$parallelUpdates', CURRENT_TIMESTAMP, '0');");

		// Re-load changed DB entries
		$this->loadSets();

		return($ret === FALSE ? false : true);
	}





/**
**name CAutoUpdate::setParallelUpdates($id, $amount)
**description Sets the amount of parallel updates for a set.
**parameter id: ID of the set.
**parameter amount: The amount of parallel updates for a set
**/
	private function setParallelUpdates($id, $amount)
	{
		if (is_numeric($amount))
			$this->sets[$id]['parallelUpdates'] = $amount;
		else
			die('ERROR: CAutoUpdate::setParallelUpdates: Amount is not a number.');
	}





/**
**name CAutoUpdate::getParallelUpdates($id)
**description Gets the amount of parallel updates in a set.
**parameter id: ID of the set.
**returns Amount of parallel updates in a set or 0, if no type is set or it is invalid.
**/
	private function getParallelUpdates($id)
	{
		// Check, if the amount is set and valid
		if (isset($this->sets[$id]['parallelUpdates']) && is_numeric($this->sets[$id]['parallelUpdates']))
			return($this->sets[$id]['parallelUpdates']);
		else
			// No amount set or invalid
			return(0);
	}





/**
**name CAutoUpdate::setType($id, $type)
**description Sets the type for a set.
**parameter id: ID of the set.
**parameter type: Update type.
**/
	private function setType($id, $type)
	{
		if ((CAutoUpdate::UPDATE_FULL != $type) && (CAutoUpdate::UPDATE_NORMAL != $type))
			die('ERROR: CAutoUpdate::setType: Type incorrect.');

		$this->sets[$id]['type'] = $type;
	}





/**
**name CAutoUpdate::getType($id, $translate = true)
**description Gets the type of a set as constant value or in translated form.
**parameter id: ID of the set.
**parameter translate: If set to true, the type will be translated to a human readable form.
**returns Type of a set as constant value or in translated form or false, if no type is set or it is invalid.
**/
	private function getType($id, $translate = true)
	{
		// Check, if the type is set and valid
		if (isset($this->sets[$id]['type']) && ((CAutoUpdate::UPDATE_FULL == $this->sets[$id]['type']) || (CAutoUpdate::UPDATE_NORMAL == $this->sets[$id]['type'])))
			// Give it back as constant or translation
			return($translate ? $this->getUpdateTypeTranslation($this->sets[$id]['type']) : $this->sets[$id]['type']);
		else
			// No type set or invalid
			return(false);
	}





/**
**name CAutoUpdate::getUpdateTypeTranslation($const = NULL)
**description Returns the whole translation array with update type as key and the translation as value or the translation for a given constant.
**parameter const: If set to a constant, the translation will be returned, otherwise the whole array.
**returns: Translation array, translation for a given constant or false, if the constant is not valid.
**/
	private function getUpdateTypeTranslation($const = NULL)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
		// Build an array with the short name of the update type as key and the translation as value
		$trans = array(CAutoUpdate::UPDATE_FULL => $I18N_fullUpdate, CAutoUpdate::UPDATE_NORMAL => $I18N_normalUpdate);

		// Check, if the complete translation array should be returned
		if (is_null($const))
			return($trans);
		else
		// Check, if the translation for a given short name is available and should be returned
			return(isset($trans[$const]) ? $trans[$const] : false);
	}





/**
**name CAutoUpdate::delSet($id)
**description Deletes one set.
**parameter id: ID of the set to delete.
**returns: true, of the set with the given ID could be deleted, otherwise dies.
**/
	public function delSet($id)
	{
		if (!is_numeric($id))
			die('ERROR: CAutoUpdate::delSet: ID not a number.');

		// Delete the set
		$result = DB_query("DELETE FROM autoUpdateSchedule WHERE id=$id");
		if ($result === FALSE)
			die("ERROR: CAutoUpdate::delSet: Could not delete set $id.");

		// Re-load changed DB entries
		$this->loadSets();

		// Make sure that there is one set active (if there is at least one set left)
		$this->getActiveSetID();

		return(true);
	}





/**
**name CAutoUpdate::getAllSets($orderBy = CAutoUpdate::ORDERBY_ID)
**description Generates an array with all sets and the according information for each set.
**parameter orderBy: Rule for ordering the entries in the ourput array (CAutoUpdate::ORDERBY_ID or CAutoUpdate::ORDERBY_LASTRUN)
**returns: Array with all sets and the according information for each set.
**/
	public function getAllSets($orderBy = CAutoUpdate::ORDERBY_ID)
	{
		// Check, if the current ordering is the wanted ordering
		if ($this->orderBy != $orderBy)
			$this->loadSets($orderBy);

		return($this->sets);
	}





/**
**name CAutoUpdate::loadSets($orderBy = CAutoUpdate::ORDERBY_ID)
**description Loads all range sets into an array with.
**parameter orderBy: Rule for ordering the entries in the ourput array (CAutoUpdate::ORDERBY_ID or CAutoUpdate::ORDERBY_LASTRUN)
**returns: Array with all sets and the according information for each set.
**/
	private function loadSets($orderBy = CAutoUpdate::ORDERBY_ID)
	{
		$this->sets = array();
		
		// Check, if the orderBy parameter has a correct value
		if ((CAutoUpdate::ORDERBY_ID != $orderBy) && (CAutoUpdate::ORDERBY_LASTRUN != $orderBy))
			die('ERROR: CAutoUpdate::getAllSets: Wrong orderBy value.');

		$result = DB_query("SELECT * FROM autoUpdateSchedule ORDER BY $orderBy"); //FW ok

		// Check, if there are sets
		if (mysqli_num_rows($result) > 0)
		{
			// Read all sets
			while ($line = mysqli_fetch_assoc($result))
			{
				// Convert back to arrays
				$line['startsEnds'] = unserialize($line['startsEnds']);
				$line['groups'] = unserialize($line['groups']);

				// Build checksum over line, to make changes detectable
				$this->md5s[$line['id']] = md5(serialize($line));

				$this->sets[$line['id']] = $line;
			}
		}
	}





/**
**name CAutoUpdate::saveSets()
**description Saves all changed sets to the DB.
**returns: true, if a set is active.
**/
	private function saveSets()
	{
		// Run thru the sets in the array
		foreach ($this->sets as $id => $set)
		{
			// Check, if there were changes in the current set
			if ($this->md5s[$id] != md5(serialize($set)))
			{
				// Copy some variables for easier insert into SQL string
				$type = $set['type'];
				$parallelUpdates = $set['parallelUpdates'];

				// Convert arrays for inserting
				$startsEnds = serialize($set['startsEnds']);
				$groups = serialize($set['groups']);

				// Update the set
				$result = DB_query("UPDATE autoUpdateSchedule SET startsEnds='$startsEnds', groups='$groups', type='$type', parallelUpdates='$parallelUpdates' WHERE id = $id");
				if ($result === FALSE)
					die("ERROR: CAutoUpdate::saveSets: Could not update the set ($id).");
			}
		}
	}





/**
**name CAutoUpdate::getSetAmount()
**description Get the amount of update sets.
**returns: Amount of update sets.
**/
	private function getSetAmount()
	{
		if (is_array($this->sets))
			return(count($this->sets));
		else
			return(0);
	}





/**
**name CAutoUpdate::configureCron()
**description Adds and removes the crontab entry dynamically when the first update set gets created or the last gets deleted.
**/
	private function configureCron()
	{
		// Check, if there are update sets
		if ($this->getSetAmount() > 0)
		{
			// Add the cron entry, if it is not present already
			if (!CRON_isEntryPresent(self::CRON_IDENT))
				CRON_addJobMinutely(15, HELPER_getApacheUser(), '/m23/bin/m23CronStarter CAutoUpdate.run', self::CRON_IDENT, true);
		}
		else
		{
			// Remove the cron entry, if it is there
			if (CRON_isEntryPresent(self::CRON_IDENT))
				CRON_rmJob(self::CRON_IDENT);
		}
	}





/**
**name CAutoUpdate::isASetActive()
**description Checks, if a set is active.
**returns: true, if a set is active.
**/
	private function isASetActive()
	{
		return(is_numeric($this->active_id));
	}





/**
**name CAutoUpdate::activateSet($id)
**description Activates one set and deactivates all other sets.
**parameter id: ID of the set to activate.
**returns: true, of the set with the given ID could be activated, otherwise dies.
**/
	public function activateSet($id)
	{
		if (!is_numeric($id))
			die('ERROR: CAutoUpdate::activateSet: ID not a number.');

		// Deactivate all sets
		$result = DB_query("UPDATE autoUpdateSchedule SET active='0'");
		if ($result === FALSE)
			die('ERROR: CAutoUpdate::activateSet: Could not deactivate the sets.');

		// Activate one set
		$result = DB_query("UPDATE autoUpdateSchedule SET active='1', lastRun=CURRENT_TIMESTAMP WHERE id = $id");
		if ($result === FALSE)
			die("ERROR: CAutoUpdate::activateSet: Could not activate the set ($id).");

		return(true);
	}





/**
**name CAutoUpdate::activateNextSet()
**description Activates the next set with the oldest timestamp.
**returns: ID of the active set or NULL, if no set could be activated.
**/
	public function activateNextSet()
	{
		// Get all sets with the oldest on top
		$sets = $this->getAllSets(CAutoUpdate::ORDERBY_LASTRUN);

		// Check, if there is at least one set
		if (count($sets) > 0)
		{
			$nextID = array_shift(array_keys($sets));
			$this->activateSet($nextID);
			return($this->getActiveSetID());
		}
		else
			return(NULL);
	}





/**
**name CAutoUpdate::activateNextTimlySet()
**description Activates the next set with the oldest timestamp that should be executed now.
**returns: ID of the active set or NULL, if no set could be activated.
**/
	public function activateNextTimlySet()
	{
		// Get all sets with the oldest on top
		$sets = $this->getAllSets(CAutoUpdate::ORDERBY_LASTRUN);

		foreach ($sets as $set)
		{
			if ($this->isTimeToRunNow($set['id']))
			{
				HELPER_logToFile(LOG_CAU, "CAU.activateNextTimlySet: id:".$set['id'], 4);
				$this->activateSet($set['id']);
				return($this->getActiveSetID());
			}
		}

		return(NULL);
	}




/**
**name CAutoUpdate::addStartEnd($id, $start, $end)
**description Adds a start end range for running the updates.
**parameter id: ID of the set to add the time range.
**parameter start: Start time of the range as combined numeric day and hour/minute string.
**parameter End: End time of the range as combined numeric day and hour/minute string.
**returns true, if the time range could be added, otherwise false.
**/
	public function addStartEnd($id, $start, $end)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if ($end > $start)
		{
			$this->sets[$id]['startsEnds'][$start] = $end;
			return(true);
		}
		else
		{
			$this->addErrorMessage($I18N_startTimeMustBeBeforeEndTime);
			return(false);
		}
	}





/**
**name CAutoUpdate::delStartEnd($id, $start)
**description Deletes a start end range.
**parameter id: ID of the set to remove the time range.
**parameter start: Start time of the range as combined numeric day and hour/minute string.
**/
	public function delStartEnd($id, $start)
	{
		unset($this->sets[$id]['startsEnds'][$start]);
	}





/**
**name CAutoUpdate::getAllStartsEndsHumanReadable($id, $addButtons, $defaultSeparator = '<br>')
**description Generate a list of all time ranges (with optional button for deleting an entry).
**parameter id: ID of the set to get all time ranges.
**parameter addButtons: If set to true, each range will get a deletion button.
**parameter defaultSeparator: The (HTML) string to separate the entries.
**returns List of all time ranges (with optional button for deleting an entry).
**/
	private function getAllStartsEndsHumanReadable($id, $addButtons, $defaultSeparator = '<br>')
	{
		$out = '';
		$separator = '';
	
		// Check, if the set has an startsEnds field
		if (isset($this->sets[$id]['startsEnds']) && is_array($this->sets[$id]['startsEnds']))
		{
			// Run thru the starts and ends
			foreach ($this->sets[$id]['startsEnds'] as $start => $end)
			{
				// Make sure both are strings (needed for correct processing)
				$start = (string)$start;
				$end = (string)$end;

				if ($addButtons)
				{
					$htmlButtonName = "BUT_delRange#$id#$start";
					HTML_submitImg($htmlButtonName, '/gfx/button_cancel-mini.png', '');
					$htmlButton = constant($htmlButtonName);
				}
				else
					$htmlButton = '';
				
				$out .= $separator.'<nobr>'.I18N_getHumanReadableDayHourMinute($start).' - '.I18N_getHumanReadableDayHourMinute($end).
				' '.$htmlButton.'</nobr>';
				
				// Add the separator after the 1st line
				$separator = $defaultSeparator;
			}
		}
		
		return($out);
	}





/**
**name CAutoUpdate::addGroup($id, $group)
**description Adds a client group for running the updates on them.
**parameter id: ID of the set to add the group.
**parameter group: Name of the client group.
**returns true, if the group could be added, otherwise false.
**/
	public function addGroup($id, $group)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if (!isset($this->sets[$id]['groups'][$group]))
		{
			$this->sets[$id]['groups'][$group] = $group;
			return(true);
		}
		else
		{
			$this->addErrorMessage($I18N_groupWasAddedPreviously);
			return(false);
		}
	}





/**
**name CAutoUpdate::delGroup($id, $group)
**description Deletes a group.
**parameter id: ID of the set to remove the group from.
**parameter group: Name of the client group.
**/
	public function delGroup($id, $group)
	{
		unset($this->sets[$id]['groups'][$group]);
	}





/**
**name CAutoUpdate::getAllGroupsHumanReadable($id, $addButtons, $defaultSeparator = '<br>')
**description Generate a list of all groups (with optional button for deleting an entry).
**parameter id: ID of the set to get all groups.
**parameter addButtons: If set to true, each group will get a deletion button.
**parameter defaultSeparator: The (HTML) string to separate the entries.
**returns List of all groups (with optional button for deleting an entry).
**/
	private function getAllGroupsHumanReadable($id, $addButtons, $defaultSeparator = '<br>')
	{
		$out = '';
		$separator = '';

		// Check, if the set has an groups field
		if (isset($this->sets[$id]['groups']) && is_array($this->sets[$id]['groups']))
		{
			// Run thru the starts and groups
			foreach ($this->sets[$id]['groups'] as $group)
			{
				if ($addButtons)
				{
					$htmlButtonName = "BUT_delGroup#$id#$group";
					HTML_submitImg($htmlButtonName, '/gfx/button_cancel-mini.png', '');
					$htmlButton = constant($htmlButtonName);
				}
				else
					$htmlButton = '';
				
				$out .= '<nobr>'.$separator.$group.' '.$htmlButton.'</nobr>';
				
				// Add the separator after the 1st line
				$separator = $defaultSeparator;
			}
		}
		
		return($out);
	}





/**
**name CAutoUpdate::getImgButtonParams($reg, &$a, &$b)
**description Checks, if an image button was pressed and extracts the two parameters from it.
**parameter reg: Regular expression to find the HTML names.
**parameter a: Variable to write the value of the first parameter to.
**parameter b: Variable to write the value of the second parameter to.
**returns true, if a button mathing the regex was clicked, otherwise false.
**/
	private function getImgButtonParams($reg, &$a, &$b)
	{
		$clickedButton = implode(preg_grep($reg, array_keys($_POST)));
		if (isset($clickedButton[10]))
		{
			$butAB = explode('#', $clickedButton);
			$butAB[2] = substr($butAB[2], 0, strpos($butAB[2], '_'));
			$a = $butAB[1];
			$b = $butAB[2];
			return(true);
		}
		else
			return(false);
	}





/**
**name CAutoUpdate::isTimeToRunNow($id)
**description Checks, if the given set should be run now.
**parameter id: ID of the set
**returns true, if the given set should be run now, otherwise false.
**/
	public function isTimeToRunNow($id)
	{
		// ID is invalid (maybe no active set) => No time to run now
		if (!is_numeric($id)) return(false);
		
		if (!is_array($this->sets[$id]['startsEnds'])) return(false);

		// Get time in weekday/hour/minute format
		$currentTime = strftime('%u%H%M');

		// Check, if one of the time ranges in the set matches
		foreach ($this->sets[$id]['startsEnds'] as $start => $end)
		{
			HELPER_logToFile(LOG_CAU, "CAU.isTimeToRunNow: ct: $currentTime start: $start end: $end ".serialize(($currentTime >= $start) && ($currentTime <= $end)), 4);
		
			if (($currentTime >= $start) && ($currentTime <= $end))
				return(true);
		}

		return(false);
	}





/**
**name CAutoUpdate::getActiveGroups()
**description Gets the groups from the current active set.
**returns The groups from the current active set or false, if no set is active.
**/
	private function getActiveGroups()
	{
		$set = $this->getActiveSet();
		
		if (is_array($set))
			return($set['groups']);
		else
			return(false);
	}





/**
**name CAutoUpdate::getAllClientnames($running = true)
**description Gets the clients in all groups of the active set.
**parameter running: If set to true, only clients running auto update will be listed, otherwise all clients.
**returns Array with the clients in all groups of the active set or empty array in case of an error.
**/
	public function getAllClientnames($running = true)
	{
		$groups = $this->getActiveGroups();
		if (is_array($groups))
			return(GRP_listAllClientsInGroups($groups, $running));
		else
			return(array());
	}





/**
**name CAutoUpdate::startNewClients($clientAmount)
**description Starts auto update on a given amount of clients that haven't run auto update for at least one day.
**parameter clientAmount: Amount of clients to start.
**returns Amount of new started clients.
**/
	private function startNewClients($clientAmount)
	{
		$startedClients = 0;
	
		// Run thru all clients of all groups
		foreach ($this->getAllClientnames(false) as $clientName)
		{
			$clientO = new CClient($clientName, CClient::CHECKMODE_MUSTEXIST);
			HELPER_logToFile(LOG_CAU, "CAU.startNewClients: clientName: $clientName(".(time() - $clientO->getAutoUpdate_lastAttempt()).")", 4);

			// Last run attempt was more than one day ago?
			if ((time() - $clientO->getAutoUpdate_lastAttempt()) >= 60 * 60 * 24)
			{
				$clientO->startAutoUpdate($this->getType($this->getActiveSetID(), false));
				HELPER_logToFile(LOG_CAU, "NEU GESTARTET: CAU.startNewClients: clientName.startAutoUpdate: $clientName", 3);
				$startedClients++;
			}
			else
				HELPER_logToFile(LOG_CAU, "nicht GESTARTET: CAU.startNewClients: $clientName", 4);

			// Started enough clients?
			if ($startedClients >= $clientAmount)
				break;
		}

		return($startedClients);
	}





/**
**name CAutoUpdate::run()
**description Chooses the set that should be run now and starts new auto update on clients.
**/
	public function run()
	{
		// Check the clients that currently run auto update
		$runningClients = CClientLister::getAllAutoUpdateClientNames();
		HELPER_logToFile(LOG_CAU, "CAU.run: runningClients: ".print_r($runningClients, true), 3);
		foreach ($runningClients as $clientName)
		{
			$clientO = new CClient($clientName, CClient::CHECKMODE_MUSTEXIST);
			// Check for failures or finished clients
			$clientO->checkAutoUpdate();
			HELPER_logToFile(LOG_CAU, "CAU.run: checkAutoUpdate: $clientName", 3);
		}

		// No set to run now?
		if (!is_numeric($this->getActiveSetID()))
		{
			HELPER_logToFile(LOG_CAU, "CAU.run: getActiveSetID: KEINS", 3);
			return(false);
		}

		// Check, if the current set should be executed now
		if (!$this->isTimeToRunNow($this->getActiveSetID()))
		{
			HELPER_logToFile(LOG_CAU, "CAU.run: checkAutoUpdate: $clientName", 3);
			// Try to get another set that should be run now
			if (is_null($this->activateNextTimlySet()))
			{
				HELPER_logToFile(LOG_CAU, "CAU.run: gerade nichts zu tun", 3);
				return(false);
			}
		}


		// Calculate, if new clients should be started
		$clientsToStart = $this->getParallelUpdates($this->getActiveSetID()) - count($this->getAllClientnames());
		HELPER_logToFile(LOG_CAU, "CAU.run: clientsToStart: $clientsToStart", 3);

		// Check, if there are free slots for starting new auto updates
		if ($clientsToStart <= 0)
		{
			HELPER_logToFile(LOG_CAU, "CAU.run: clientsToStart <= 0: RAUS", 3);
			return(false);
		}
		
		// Check, if not all slots could be filled with fresh clients from the current set
		if ($this->startNewClients($clientsToStart) < $clientsToStart)
			$this->activateNextTimlySet();
	}





/**
**name CAutoUpdate::showAutoUpdateManager()
**description Shows a dialog for viewing, creating, changing and deleting automatic update sets.
**/
	public function showAutoUpdateManager()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		HTML_showFormHeader();
		HTML_setPage("autoUpdate");

		$sets = $this->getAllSets();
		$highlighted = true;
		$groupArray = HELPER_array2AssociativeArray(GRP_listGroups());
		$a = $b = '';
		$activeSetID = $this->getActiveSetID();


		// Check, if there is a clicked range deletion button
		if ($this->getImgButtonParams("/^BUT_delRange#/", $a, $b))
			$this->delStartEnd($a, $b);


		// Check, if there is a clicked group deletion button
		if ($this->getImgButtonParams("/^BUT_delGroup#/", $a, $b))
			$this->delGroup($a, $b);


		// Elements for adding a new update set
		$type = HTML_selection('SEL_newUpdateType', $this->getUpdateTypeTranslation(), SELTYPE_selection);
		$parallelUpdates = HTML_input('ED_newParallelUpdates', 5, 2, 3);
		if (HTML_submit('BUT_createNewUpdateSet', $I18N_createNewUpdateSet))
		{
			$this->addSet($type, $parallelUpdates);
			$sets = $this->getAllSets();
		}


		// Run thru the sets in the array
		foreach ($this->sets as $id => $set)
		{
			// Elements for adding a new start/end range
			$start = HTML_weekdayTimeChooser('WTC_start'.$id);
			$end = HTML_weekdayTimeChooser('WTC_end'.$id);
			if (HTML_submit('BUT_addTimePeriod'.$id, $I18N_addTimePeriod))
				$this->addStartEnd($id, $start, $end);

			// Elements for adding a client group
			$newGroup = HTML_selection('SEL_newGroup'.$id, $groupArray, SELTYPE_selection);
			if (HTML_submit('BUT_addGroup'.$id, $I18N_addGroup))
				$this->addGroup($id, $newGroup);

			// Button for deleting a set
			if (HTML_submit('BUT_delSet'.$id, $I18N_delete))
			{
				$this->delSet($id);
				$sets = $this->getAllSets();
			}
		}


		HTML_showTitle($I18N_autoUpdate);
		HTML_showTableHeader(true);

		HTML_showTableHeading('', $I18N_updatePeriods, $I18N_updateGroups, $I18N_addTimePeriod, $I18N_addGroup);

		// Run thru the sets and show information with modification options
		foreach ($sets as $id => $set)
		{
			// Generate HTML code to show a green ball for the active set
			$activeIcon = ($id == $activeSetID ? '<img src="/gfx/status/green.png">' : '');

			HTML_showTableRow(array('highlight' => $highlighted, 'tdvtop' => true),
				'<nobr><h3>'.$activeIcon.' '.$id.'</h3></nobr>'.
				'&bull; <b>'.$this->getType($id).'</b><br>'.
				'&bull; '.$I18N_parallelUpdates.': <b>'.$this->getParallelUpdates($id).'</b><br>'.constant('BUT_delSet'.$id),
				$this->getAllStartsEndsHumanReadable($id, true),
				$this->getAllGroupsHumanReadable($id, true),
				constant('WTC_start'.$id).'-<br>'.constant('WTC_end'.$id).' '.constant('BUT_addTimePeriod'.$id),
				constant('SEL_newGroup'.$id).' '.constant('BUT_addGroup'.$id)
			);
			$highlighted = !$highlighted;
		}

		HTML_showTableEnd(true);



		// Create a new update set
		HTML_showSmallTitle($I18N_createNewUpdateSet);
		HTML_showTableHeader(true);
		HTML_showTableHeading($I18N_parallelUpdates, $I18N_updateType, '');
		HTML_showTableRow(ED_newParallelUpdates, SEL_newUpdateType, BUT_createNewUpdateSet);
		HTML_showTableEnd(true);

		
		$this->saveSets();
		$this->configureCron();

		HTML_showFormEnd();
	}

// GRP_listAllClientsInGroups($groupNames)

}
?>