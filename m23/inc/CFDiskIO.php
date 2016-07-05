<?

// grep ' function ' /m23/inc/CFDiskIO.php | sed 's/.* function //' | sort

class CFDiskIO extends CClient
{
	protected $currentPartitioning = null, $wantedPartitioning = null, $undoMd5 = null, $undoArray = null, $undoCalled = false, $partitionSteps = array(), $partitionStepsForShift = array(), $fstab = array(), $definedDiskSizes = false;

	//Status codes of the client
	const DISK_TYPE_IDE = 0;
	const DISK_TYPE_SCSI = 1;

//partition methods (used for the partition/format dialog)
	const PM_none = 0;
	const PM_auto = 1;
	const PM_existing = 2;
	const PM_extended = 3;
	const PM_extended_lvm = 4;
	const PM_extended_raid = 5;
	const PM_extended_raid_lvm = 6;
	const PM_auto2048_4096 = 7;

//extended partition selections/page
	const EPS_none = -1;
	const EPS_delete_partitions = 0;
	const EPS_add_new_partition = 1;
	const EPS_format_partitions = 2;
	const EPS_select_installation_partitions = 3;
	const EPS_raid = 4;
	const EPS_lvm = 5;

// Partition table types
	const PTT_MBR = 1;
	const PTT_GPT = 2;

// Partition types
	const PT_PRIMARY = 'primary';
	const PT_EXTENDED = 'extended';
	const PT_LOGICAL = 'logical';
	const PT_EFI = 'efipart';
	const PT_EFIBOOT = 'efi-boot';
	const PT_FREE = 'free';			// Free space outside an extended partition
	const PT_EXTFREE = 'extfree';	// Free space inside an extended partition

// Maximum amount of partitions on a GPT disk
	const GPT_MAX_PART_AMOUNT = 127;

// Start and end position of the EFI boot partition
	const EFIBOOT_PART_START = 2;
	const EFIBOOT_PART_END = 512;





/**
**name CFDiskIO::__construct($in)
**description Constructor for new CFDiskIO objects. The object holds all information about the partitioning (of a client and loads the values from the DB).
**parameter in: Name or object of an existing client (to load) or data of an empty disk.
**/
	public function __construct($in)
	{
	/*
		// If string => Clientname
		if (is_string($in))
		{
			$clientName = $in;
			$this->clientO = new CClient($clientName);
			if (!is_object($this->clientO))
				die("ERROR: No object for client \"$clientName\" could be created.");
		}
		// If object => Clientobject
		elseif (is_object($in))
		{
			$this->clientO = $in;
			$clientName = $this->clientO->getClientName();
		}
		if ($this->setClientName($clientName))
			$this->fdiskLoadFromDB();
	*/
		parent::__construct($in);
		$this->fdiskLoadFromDB();
	}





/**
**name CFDiskIO::__destruct()
**description Destructor for a CFDiskIO object. Before the object is removed from the RAM, all settings are written to the DB.
**/
	function __destruct()
	{
		$this->fdiskSaveToDB();
		parent::__destruct();
	}





/**
**name CFDiskIO::isTypeFreeSpace($type)
**description Checks, if a given partition type means "free space".
**parameter type: Partition type to check.
**returns true, if the given partition type means "free space", otherwise false.
**/
	protected function isTypeFreeSpace($type)
	{
		return (($type == CFDiskIO::PT_FREE) || ($type == CFDiskIO::PT_EXTFREE));
	}





/**
**name CFDiskIO::fdiskGetProperty($var, $dieMessage, $return = null)
**description Returns the given variable, if it is set or dies (or returns an error value) with an error message.
**parameter var: Variable to check.
**parameter return: This will returned in case of an error, if set to another value, than 'null'.
**returns Input variable (or error value).
**/
	protected function fdiskGetProperty($var, $dieMessage, $return = null)
	{
		if (isset($var) && !is_null($var))
			return($var);
		else
			if ($return === null)
			{
				debug_print_backtrace();
				$this->showMessages();
				$this->showWantedPartitioning();
				die($dieMessage);
			}
			else
				return($return);
	}





/**
**name CFDiskIO::getCurrentPartitioning()
**description Returns the current (physical) partitioning (of a client).
**returns The current (physical) partitioning (of a client).
**/
	private function getCurrentPartitioning()
	{
		return($this->fdiskGetProperty($this->currentPartitioning, 'ERROR: $this->currentPartitioning not set.', array()));
	}





/**
**name CFDiskIO::setCurrentPartitioning($currentPartitioning)
**description Sets the current (physical) partitioning (of a client).
**/
	private function setCurrentPartitioning($currentPartitioning)
	{
		$this->currentPartitioning = $currentPartitioning;
	}





/**
**name CFDiskIO::fdiskLoadFromDB()
**description Loads the current (physical) partitioning of a client and CFDiskTemp values.
**/
	private function fdiskLoadFromDB()
	{
		$sql = "SELECT partitions, CFDiskTemp FROM `clients` WHERE client='".$this->getClientName()."';";

		$result = DB_query($sql); //FW ok
		$line = mysqli_fetch_row($result);

		// Get the current partitioning of the client
		$this->setCurrentPartitioning($this->convertPartitioning2Array(explodeAssoc("###",$line[0])));

		// Get the array from the CFDiskTemp field
		if (!empty($line[1]))
		{
			$CFDiskTemp = @unserialize($line[1]);

			// Check, if a valid array could be read.
			if (!is_array($CFDiskTemp))
				$this->resetWantedPartitioningAndSteps();
			else
			{
				// Try to get the wanted partitioning
				if (is_array($CFDiskTemp['wantedPartitioning']))
				{
					$this->wantedPartitioning = $CFDiskTemp['wantedPartitioning'];
					$this->updateUndoMd5();
				}
				else
					$this->resetWantedPartitioningAndSteps();


				// Try to get the partition steps
				if (is_array($CFDiskTemp['partitionSteps']))
					$this->partitionSteps = $CFDiskTemp['partitionSteps'];
				else
					$this->partitionSteps = array();


				// Try to get the undo array
				if (is_array($CFDiskTemp['undo']) && (count($CFDiskTemp['undo']) > 0))
					$this->undoArray = $CFDiskTemp['undo'];
				else
				{
					$this->undoArray[0]['wp'] = $this->wantedPartitioning;
					$this->undoArray[0]['ps'] = $this->partitionSteps;
				}

				$this->updateUndoMd5();

				// Try to get the partition steps shift array
				if (is_array($CFDiskTemp['partitionStepsForShift']))
					$this->partitionStepsForShift = $CFDiskTemp['partitionStepsForShift'];
				else
					$this->partitionStepsForShift = array();

				// Try to get the fstab array
				if (is_array($CFDiskTemp['fstab']))
					$this->fstab = $CFDiskTemp['fstab'];
				else
					$this->fstab = array();

				// Try to get the defined disk sizes for derived clients
				if (is_array($CFDiskTemp['definedDiskSizes']))
					$this->definedDiskSizes = $CFDiskTemp['definedDiskSizes'];
				else
					$this->definedDiskSizes = false;
			}
		}
		else
			$this->resetWantedPartitioningAndSteps();
	}





/**
**name CFDiskIO::setCFDiskTemp($CFDiskTemp)
**description Sets CFDiskTemp of the client.
**parameter CFDiskTemp: Array with the partition and format information.
**/
	public function setCFDiskTemp($CFDiskTemp)
	{
		// Only assign it, if it is a valid array
		if (is_array($CFDiskTemp))
		{
			$this->wantedPartitioning = (is_array($CFDiskTemp['wantedPartitioning']) ? $CFDiskTemp['wantedPartitioning'] : array());
			$this->partitionSteps = (is_array($CFDiskTemp['partitionSteps']) ? $CFDiskTemp['partitionSteps'] : array());
			$this->definedDiskSizes = (is_array($CFDiskTemp['definedDiskSizes']) ? $CFDiskTemp['definedDiskSizes'] : array());
			$this->fstab = (is_array($CFDiskTemp['fstab']) ? $CFDiskTemp['fstab'] : array());
		}
	}





/**
**name CFDiskIO::getDiskDevs()
**description Returns an array with all disk devices (/dev/sdX) as key and value.
**returns Array with all disk devices (/dev/sdX) as key and value.
**/
	protected function getDiskDevs()
	{
		$out = array();
		foreach ($this->wantedPartitioning as $disk)
			if (isset($disk['dev']))
				$out[$disk['dev']] = $disk['dev'];

		return($out);
	}





/**
**name CFDiskIO::getDiskAmount()
**description Returns amount of disks.
**returns Amount of disks.
**/
	protected function getDiskAmount()
	{
		return(count($this->getDiskDevs()));
	}





/**
**name CFDiskIO::getPartAmount($vDisk)
**description Returns the of partitions of a given disk.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns Amount of partitions of a given disk.
**/
	protected function getPartAmount($vDisk)
	{
		// On RAIDs there is a fake partition 0, therefore the amount of partitions is 1
		if ($this->isDiskRaid($vDisk))
			return(1);
		$vPart = 0;
		while (isset($this->wantedPartitioning[$vDisk][$vPart]['nr']))
			$vPart++;

		return($vPart);
	}





/**
**name CFDiskIO::getpDiskAndpPartFromDev($dev, &$pDisk, &$pPart, $ignoreMD = false)
**description Splits a device (e.g. /dev/hda1) in the physical disk (/dev/hda) and the partition number (1).
**parameter dev: The device to partition (e.g. /dev/hde1)
**parameter pDisk: The parameter, the physical disk is written to (e.g. /dev/hda).
**parameter pPart: The parameter, the physical partition number (e.g. 1) or false (if there is no number in the dev) is written to.
**parameter ignoreMD: Set to true, if a "partition number" from a MD should be received.
**/
	public function getpDiskAndpPartFromDev($dev, &$pDisk, &$pPart, $ignoreMD = false)
	{
		/*
			$dev = '/dev/sda1' => $pDisk = '/dev/sda', $pPart = 1;
			$dev = '/dev/md0' => $pDisk = '/dev/md0', $pPart = false;
		*/
		
		// Check, if it is a MD (where the number is part of the dev and not a partition)
		if ((strpos($dev,"md") !== false) && !$ignoreMD)
		{
			$pDisk = $dev;
			$pPart = false;
		}
		else
		{
			// Split the disk dev from the part number
			$temp = preg_split('/[0-9]/',$dev);
			$pDisk = $temp[0];
			$pPart = str_replace($temp[0],"",$dev);

			// If there is no number in the dev => $pPart = false
			if (empty($pPart))
				$pPart = false;
		}
	}





/**
**name CFDiskIO::isDevValidDiskPartitionOrRaid($dev)
**description Checks, if a given device name is a valid disk, partition or RAID device.
**parameter dev: The device to check.
**returns true, if a given device name is a valid disk, partition or RAID device, otherwise false.
**/
	public function isDevValidDiskPartitionOrRaid($dev)
	{
		return(CHECK_FW(true, CC_deviceNameOrPartition, $dev) || $this->isDevRaid($dev));
	}





/**
**name CFDiskIO::dev2VDiskVPart($dev, &$vDisk, &$vPart)
**description Searches for a device (e.g. /dev/sda2) and writes the virtual disk and partition numbers to the variables. These values can be used to access the array $this->wantedPartitioning.
**parameter dev: The device (e.g. /dev/sda2).
**parameter vDisk: Internal disk number (for accessing the disk information in the array) or false, if no matching (physical) disk number was found.
**parameter vPart: Internal partition number in a disk (for accessing the disk information in the array) or false, if no matching (physical) partition number was found.
**returns true if the search worked otherwise false.
**/
	protected function dev2VDiskVPart($dev, &$vDisk, &$vPart)
	{
		// Return, if the input device is not a valid device
		if (!$this->isDevValidDiskPartitionOrRaid($dev))
			return(false);

		$this->getpDiskAndpPartFromDev($dev, $diskDev, $partNr);
		

		for ($vDisk = 0; $vDisk < $this->getDiskAmount(); $vDisk++)
		{

			if ($this->wantedPartitioning[$vDisk]['dev'] == $diskDev)
			{
				// Check, if $dev is a disk dev or the partDev is not wanted => return now
				if ($partNr === false || $vPart === 'empty')
				{
					$vPart = false;
					return(true);
				}

				// Run thru the partitions and check, if the (physical) partition number matches the wanted partition number
				for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
					if ($this->wantedPartitioning[$vDisk][$vPart]['nr'] == $partNr)
						return(true);

				// No internal partition number matching (physical) partition number was found
				$vPart = false;
			}
		}

		// No internal disk and partition number matching (physical) disk and partition numbers the were found
		$vDisk = $vPart = false;
		return(false);
	}





/**
**name CFDiskIO::getPreviousPartitionStep()
**description Get the previous partition steps and wanted partitioning from the last action.
**returns Associative array with wanted partitioning as key 'wp' and the partition steps under key 'ps' from the last action or NULL, if there are no undo steps.
**/
	private function getPreviousPartitionStep()
	{
		// Fetch the partition steps and wanted partitioning of the last saved action
		$undoStep = array_pop($this->undoArray);

		// If it is NULL, there are no undo steps
		if (is_null($undoStep))
			return(NULL);

		// If the current partition steps are equal to the last saved partition steps => go back another step in the history
		if ($this->getUndoMd5() == md5(serialize($undoStep['ps'])))
		{
			// Fetch the partition steps and wanted partitioning of the (2nd) last saved action
			$undoStep = array_pop($this->undoArray);

			// If it is NULL, there are no undo steps (now)
			if (is_null($undoStep))
				return(NULL);
		}

		return($undoStep);
	}





/**
**name CFDiskIO::backToPreviousPartitionStep()
**description Jumps back in the partition history by one step.
**/
	public function backToPreviousPartitionStep()
	{
		// Get the previous partition steps and wanted partitioning from the last action
		$undoStep = $this->getPreviousPartitionStep();

		// Check, if there is a previous action
		if ($undoStep !== NULL)
		{
			// Revert changes
			$this->wantedPartitioning = $undoStep['wp'];
			$this->partitionStepsForShift = $this->partitionSteps = $undoStep['ps'];
		}
		else
			$this->resetWantedPartitioningAndSteps();

		// Get the EFI boot partition of the client (if set)
		$EFIBootPartDev = $this->getEFIBootPartDev();

		// Check, if it was set
		if ($EFIBootPartDev != false)
		{
			$this->dev2VDiskVPart($EFIBootPartDev, $vDisk, $vPart);

			// Unset the EFI boot partition, if it doesn't exist anymore
			if (($vDisk == false) || ( false == $vPart))
				$this->unsetEFIBootPartDev();
		}
	}





/**
**name CFDiskIO::findAndSetEFIBootPartDev()
**description Searches for the first vfat partitions and if one if found, sets it as EFI boot partition.
**/
	public function findAndSetEFIBootPartDev()
	{
		// Run thru the disks and partitions
		for ($vDisk = 0; $vDisk < $this->getDiskAmount(); $vDisk++)
			for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
			{
				// Check, if the current partitions has a vfat filesystem
				if ($this->getPartitionFileSystem($vDisk, $vPart, 'xxx') == 'fat32')
				{
					$this->setEFIBootPartDev($this->getPartitionDev($vDisk, $vPart, ''));
					return(true);
				}
			}
		return(false);
	}





/**
**name CFDiskIO::discardUndo()
**description Discards all undo steps.
**/
	protected function discardUndo()
	{
		$this->undoArray = array();
	}





/**
**name CFDiskIO::updateUndoMd5()
**description Updates the md5 sum of the wantedPartitioning and partitionSteps arrays.
**/
	private function updateUndoMd5()
	{
		$this->undoMd5 = $this->getUndoMd5();
	}





/**
**name CFDiskIO::getUndoMd5()
**description Gets the md5 sum of the partitionSteps arrays.
**/
	private function getUndoMd5()
	{
		return(md5(serialize($this->partitionSteps)));
	}





/**
**name CFDiskIO::addUndo()
**description Adds an undo step to the undoArray.
**/
	private function addUndo()
	{
		// Check, if the undo function was called (so no new entry to the undo array must be added) and if there were changes
		if ((!$this->undoCalled) && ($this->undoMd5 != $this->getUndoMd5()))
		{
			// Build a new entry
			$undoStep = array();
			$undoStep['wp'] = $this->wantedPartitioning;
			$undoStep['ps'] = $this->partitionSteps;

			// and add it
			$this->updateUndoMd5();
		}
	}





/**
**name CFDiskIO::addPartitionStepAtTheBeginning($partJob)
**description Adds a step at the beginning of the partitionSteps and partitionStepsForShift arrays.
**parameter partJob: The job to add.
**/
	protected function addPartitionStepAtTheBeginning($partJob)
	{
		array_unshift($this->partitionSteps, $partJob);
		array_unshift($this->partitionStepsForShift, $partJob);
	}





/**
**name CFDiskIO::addPartitionStepBeforeFormat($partJob)
**description Adds a step to the partitionSteps and partitionStepsForShift arrays before the formating of the RAID device (given in the $partJob).
**parameter partJob: The RAID creation commands to add.
**/
	protected function addPartitionStepBeforeFormat($partJob)
	{
		$this->addPartitionStepBeforeFormatArray($partJob, $this->partitionSteps);
		$this->addPartitionStepBeforeFormatArray($partJob, $this->partitionStepsForShift);
	}





/**
**name CFDiskIO::addPartitionStepBeforeFormatArray($newJob, &$partJobs)
**description Adds a step to the partitionSteps and partitionStepsForShift arrays before the formating of the RAID device (given in the $partJob).
**parameter newJob: The RAID creation commands to add.
**parameter partJobs: Pointer to the array with the partition steps (partitionSteps or partitionStepsForShift).
**returns true, if there was a formating job for the RAID device. false, if the new job was placed at the end.
**/
	private function addPartitionStepBeforeFormatArray($newJob, &$partJobs)
	{
		// Get the RAID device to search
		$raidDev = $newJob['raidDev'];

		// Run thru the partition and format jobs
		foreach ($partJobs as $jobNr => $job)
		{
			//Check, if this job is a command and if it is a format command
			if ((!isset($job['command']{0})) || ('format' != $job['command']))
				continue;

			//Check, if the format command will format the given RAID
			if ($job['dev'] == $raidDev)
			{
			/*
				print("<h3>addPartitionStepBeforeFormatArray vor $jobNr</h3>");
				print('<h4>vorher</h4><pre>');
				print_r($partJobs);
				print('</pre>');
			*/
				//Place the RAID creation job before the format job
				$partJobs = HELPER_arrayInsertBeforeKeynumber($partJobs, $jobNr, $newJob);
			/*
				print('<h4>nachher</h4><pre>');
				print_r($partJobs);
				print('</pre>');
			*/
				return(true);
			}
		}

		// There was no format job for the RAID device => add the job to the end of job list
		array_push($partJobs, $newJob);
		return(false);
	}




/**
**name CFDiskIO::addPartitionStep()
**description Adds a step to the partitionSteps and partitionStepsForShift arrays.
**parameter cmd: The commands to add.
**/
	protected function addPartitionStep($cmd)
	{
		array_push($this->partitionSteps, $cmd);
		array_push($this->partitionStepsForShift, $cmd);
	}





/**
**name CFDiskIO::shiftPartitionStep()
**description Gets the first element of the partitionSteps array and deletes it.
**/
	protected function shiftPartitionStep()
	{
		$ret = array_shift($this->partitionStepsForShift);
		if ($ret === NULL)
			return(false);
		else
			return($ret);
	}






/**
**name CFDiskIO::resetWantedPartitioningAndSteps()
**description Resets the wantedPartitioning array by replacing it with the contents of the client's current partitioning and resets the partition steps.
**/
	public function resetWantedPartitioningAndSteps()
	{
		$this->resetWantedPartitioning();
		$this->partitionStepsForShift = $this->partitionSteps = array();
		$this->discardUndo();
		$this->unsetEFIBootPartDev();
	}





/**
**name CFDiskIO::resetWantedPartitioning()
**description Resets the wantedPartitioning array by replacing it with the contents of the client's current partitioning.
**/
	public function resetWantedPartitioning()
	{
		$this->wantedPartitioning = $this->getCurrentPartitioning();
	}





/**
**name CFDiskIO::fdiskSaveToDB()
**description Saves CFDiskTemp values to the DB.
**/
	private function fdiskSaveToDB()
	{
		$this->addUndo();
		
		$CFDiskTemp = array('wantedPartitioning' => $this->wantedPartitioning, 'partitionSteps' => $this->partitionSteps, 'undo' => $this->undoArray, 'partitionStepsForShift' => $this->partitionStepsForShift, 'fstab' => $this->fstab);

		// Make sure that all disk sizes are stored on a defined client
		if ($this->isDefinedClient())
			$this->saveDefinedDiskSizesToDB();

		if ($this->definedDiskSizes != false)
			$CFDiskTemp['definedDiskSizes'] = $this->definedDiskSizes;
		else
		{
			// Add disk devices and their sizes, if it is a defined client.
			$diskSize = $this->getCurrentDiskSizesForDefinedDiskSizes();
			if ($diskSize !== false)
				$CFDiskTemp['definedDiskSizes'] = $diskSize;
		}

		$sql = "UPDATE `clients` SET `CFDiskTemp` = '".serialize($CFDiskTemp)."' WHERE client='".$this->getClientName()."'";
		$ret = DB_query($sql);
	}





/**
**name CFDiskIO::getCurrentDiskSizesForDefinedDiskSizes($overwrite = false)
**description Gets the disk devices and their sizes, if the client is a defined client.
**parameter overwrite: Set to true, if the disk devices and their sizes should be saved even if the client is NOT a defined client.
**returns Array with disk devices and their sizes, if the client is a defined client, otherwise false.
**/
	private function getCurrentDiskSizesForDefinedDiskSizes($overwrite = false)
	{
		// Save the sizes only, if it is a defined client.
		if (!$this->isDefinedClient() && !$overwrite)
			return(false);

		$diskSize = array();

		// Build an array with the disk device as key and its size as value
		for ($vDisk = 0; $vDisk < $this->getDiskAmount(); $vDisk++)
			$diskSize[$this->getDiskDev($vDisk)] = $this->getDiskSize($vDisk);

		return($diskSize);
	}





/**
**name CFDiskIO::saveDefinedDiskSizesToDB()
**description Saves the disk devices and their sizes to the DB.
**/
	public function saveDefinedDiskSizesToDB()
	{
		$this->definedDiskSizes = $this->getCurrentDiskSizesForDefinedDiskSizes(true);
	}





/**
**name CFDiskIO::getDefinedDiskSizes()
**description Gets the defined disk devices and their sizes.
**returns Array with disk devices and their sizes, if the set, otherwise false.
**/
	public function getDefinedDiskSizes()
	{
		return($this->definedDiskSizes);
	}





/**
**name CFDiskIO::convertPartitioning2Array($data)
**description Converts old partitioning data to array.
**/
	private function convertPartitioning2Array($data)
	{
		for ($vDisk = 0; !empty($data["dev$vDisk".'_path']); $vDisk++)
		{
			// The device of the disk (e.g. /dev/sda)
			$disk[$vDisk]['dev'] = $data["dev$vDisk".'_path'];
			// The size of the complete disk
			$disk[$vDisk]['size'] = $data["dev$vDisk".'_size'];

			// Run thru the partitions of the disk
			for ($vPart = 0; !empty($data["dev$vDisk"."part$vPart".'_nr']); $vPart++)
			{
				// Physical partition number
				$disk[$vDisk][$vPart]['nr'] = $data["dev$vDisk"."part$vPart".'_nr'];

				// Begin of the partition in MB
				$disk[$vDisk][$vPart]['start'] = $data["dev$vDisk"."part$vPart".'_start'];

				// End of the partition in MB
				$disk[$vDisk][$vPart]['end'] = $data["dev$vDisk"."part$vPart".'_end'];

				// Type of the partition: CFDiskIO::PT_PRIMARY, CFDiskIO::PT_EXTENDED, CFDiskIO::PT_LOGICAL
				$disk[$vDisk][$vPart]['type'] = $data["dev$vDisk"."part$vPart".'_type'];

				// File system (e.g. ext3) if the partition is not an extended partition
				if ($data["dev$vDisk"."part$vPart".'_type'] == CFDiskIO::PT_EXTENDED)
					$disk[$vDisk][$vPart]['fs'] = -1;
				else
					$disk[$vDisk][$vPart]['fs'] = $data["dev$vDisk"."part$vPart".'_fs'];
			}

			// Check if this is a RAID
			if (isset($data["dev$vDisk".'_raidDriveAmount']))
			{
				// Amount of RAID drives
				$disk[$vDisk]['raidDriveAmount'] = $data["dev$vDisk".'_raidDriveAmount'];

				for ($rDev = 0; !empty($data["dev$vDisk"."_raidDrive$rDev"]); $rDev++)
				{
					$disk[$vDisk]['raidDrive'][$rDev] = $data["dev$vDisk"."_raidDrive$rDev"];

					//get the drive/partition to lock
					$this->FDISK_dev2VDiskVPart_Legacy($data,$data["dev$vDisk"."_raidDrive$rDev"],$lDev,$lPart);

					//lock drive/partition that is used for RAID
					if ($lPart === false)
						$disk[$lDev]['raidLvmLock'] = 1;
					else
						$disk[$lDev][$lPart]['raidLvmLock'] = 1;
				}
			}
			
			$disk[$vDisk] = $this->sortPartitionKeyByStart($disk[$vDisk]);
		}

		return($disk);
	}





/**
**name CFDiskIO::isDiskRaid($vDisk)
**description Checks, if a disk is a RAID.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns true, if the disk is a RAID, otherwise false.
**/
	protected function isDiskRaid($vDisk)
	{
// 		print("isDiskRaid($vDisk) dev: ".$this->getDiskDev($vDisk)." res:".serialize($this->isDevRaid($this->getDiskDev($vDisk)))."\n");
	
		return($this->isDevRaid($this->getDiskDev($vDisk)));
	}





/**
**name CFDiskIO::isDevRaid($dev)
**description Checks, if a device string is a RAID.
**parameter dev: The device (e.g. /dev/sda2 or /dev/md0).
**returns true, if the device string is a RAID, otherwise false.
**/
	protected function isDevRaid($dev)
	{
		return(strpos($dev, '/dev/md') !== false);
	}





/**
**name CFDiskIO::setDiskPartLockedByRaid($vDisk, $vPart, $lock)
**description Sets or unsets the RAID lock of a partition or disk.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter vPart: Internal partition number in a disk (for accessing the disk information in the array).
**parameter lock: Set to true, to set tha RAID lock, false for removing the lock.
**/
	protected function setDiskPartLockedByRaid($vDisk, $vPart, $lock)
	{
		$lock = $lock ? 1 : 0;

		if (false === $vDisk)
		{
			debug_print_backtrace();
			return(false);
		}

		if (false === $vPart)
			$this->wantedPartitioning[$vDisk]['raidLvmLock'] = $lock;
		else
			$this->wantedPartitioning[$vDisk][$vPart]['raidLvmLock'] = $lock;
	}





/**
**name CFDiskIO::isDiskOrPartLockedByRaid($vDisk, $vPart)
**description Checks, if a partition or disk is used as RAID.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter vPart: Internal partition number in a disk (for accessing the disk information in the array).
**returns true, if the disk or partition is locked by a RAID.
**/
	protected function isDiskOrPartLockedByRaid($vDisk, $vPart)
	{
		if (false === $vDisk)
		{
			debug_print_backtrace();
			return(false);
		}

		if (false === $vPart)
			return(isset($this->wantedPartitioning[$vDisk]['raidLvmLock']) && (1 == $this->wantedPartitioning[$vDisk]['raidLvmLock']));
		else
			return(isset($this->wantedPartitioning[$vDisk][$vPart]['raidLvmLock']) && (1 == $this->wantedPartitioning[$vDisk][$vPart]['raidLvmLock']));
	}





/**
**name CFDiskIO::isPartitionLockedByRaid($vDisk, $vPart)
**description Checks, if a partition is locked, because it is part of a RAID.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter vPart: the virtual partition number, that is used to build the variable name to access the associative array.
**returns true, if the partition is locked, otherwise false.
**/
	public function isPartitionLockedByRaid($vDisk, $vPart)
	{
		return($this->isDiskOrPartLockedByRaid($vDisk, $vPart));
	}





/**
**name CFDiskIO::isDiskLockedByRaid($vDisk)
**description Checks, if a disk is locked, because it is part of a RAID.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns true, if the disk is locked, otherwise false.
**/
	protected function isDiskLockedByRaid($vDisk)
	{
		return($this->isDiskOrPartLockedByRaid($vDisk, false));
	}





/**
**name CFDiskIO::isDiskNotLockedByRaidAgainstCreationOfNewPartition($vDisk)
**description Checks if a new partition can be created or if the complete disk is used for RAID.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns true, if a new partition can be created, otherwise false.
**/
	protected function isDiskNotLockedByRaidAgainstCreationOfNewPartition($vDisk)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// If the disk is used for RAID => No partition can be created on it
		if ($this->isDiskOrPartLockedByRaid($vDisk, false))
		{
			$this->addErrorMessage($I18N_cantCreateAPartitionBecauseTheWholeDriveIsAssignedToARAID);
			return(false);
		}

		return(true);
	}





/**
**name CFDiskIO::getPartitionAmountOfType($vDisk, $type)
**description Count all partitions of a selected type on a disk.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter type: type of the partition (CFDiskIO::PT_PRIMARY, CFDiskIO::PT_EXTENDED, CFDiskIO::PT_LOGICAL, CFDiskIO::PT_EFI)
**/
	protected function getPartitionAmountOfType($vDisk, $type)
	{
		$count=0;

		for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
			if ($this->wantedPartitioning[$vDisk][$vPart]['type'] == $type)
				$count++;

		return($count);
	}





/**
**name CFDiskIO::getExtendedVPart($vDisk)
**description Searches the vPart that contains the extended partition.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns vPart number of the extended partition, if there is an one, otherwise false.
**/
	protected function getExtendedVPart($vDisk)
	{
		for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
			if ($this->wantedPartitioning[$vDisk][$vPart]['type'] == CFDiskIO::PT_EXTENDED)
				return($vPart);
		return(false);
	}





/**
**name CFDiskIO::getDiskSize($vDisk)
**description Returns the size of the disk.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns Size of the disk.
**/
	protected function getDiskSize($vDisk)
	{
		return($this->fdiskGetProperty($this->wantedPartitioning[$vDisk]['size'], 'ERROR: $this->wantedPartitioning['.$vDisk.'][\'size\'] not set.'));
	}





/**
**name CFDiskIO::getDiskDev($vDisk)
**description Returns the device name (e.g. /dev/sda) for a virtual disk.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns Device name (e.g. /dev/sda) for a virtual disk.
**/
	protected function getDiskDev($vDisk)
	{
		return($this->fdiskGetProperty($this->wantedPartitioning[$vDisk]['dev'], 'ERROR: $this->wantedPartitioning['.$vDisk.'][\'dev\'] not set.',''));
	}





/**
**name CFDiskIO::getPartitionStart($vDisk, $vPart, $return = null)
**description Returns the start position (in MB) of a partition.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter vPart: the virtual partition number, that is used to build the variable name to access the associative array.
**parameter return: This will returned in case of an error, if set to another value, than 'null'.
**returns Start position (in MB) of a partition.
**/
	protected function getPartitionStart($vDisk, $vPart, $return = null)
	{
		// On RAIDs the start of the fake partition 0 is 0
		if ($this->isDiskRaid($vDisk))
			return(0);
		return($this->fdiskGetProperty($this->wantedPartitioning[$vDisk][$vPart]['start'], "ERROR: \$this->wantedPartitioning[$vDisk][$vPart]['start'] not set.", $return));
	}





/**
**name CFDiskIO::getPartitionNumber($vDisk, $vPart, $return = null)
**description Returns the physical partition number of a virtual partition.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter vPart: the virtual partition number, that is used to build the variable name to access the associative array.
**parameter return: This will returned in case of an error, if set to another value, than 'null'.
**returns Physical partition number of a virtual partition.
**/
	protected function getPartitionNumber($vDisk, $vPart, $return = null)
	{
		// On RAIDs there is nor partition number
		if ($this->isDiskRaid($vDisk))
			return('');
	
		return($this->fdiskGetProperty($this->wantedPartitioning[$vDisk][$vPart]['nr'], "ERROR: \$this->wantedPartitioning[$vDisk][$vPart]['nr'] not set.", $return));
	}





/**
**name CFDiskIO::getPartitionSize($vDisk, $vPart, $return = null)
**description Returns the size of a virtual partition.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter vPart: the virtual partition number, that is used to build the variable name to access the associative array.
**parameter return: This will returned in case of an error, if set to another value, than 'null'.
**returns Size (in MB) of a virtual partition.
**/
	protected function getPartitionSize($vDisk, $vPart, $return = null)
	{
		return($this->getPartitionEnd($vDisk, $vPart, $return) - $this->getPartitionStart($vDisk, $vPart, $return));
	}





/**
**name CFDiskIO::getPartitionDev($vDisk, $vPart, $return = null)
**description Returns the device of a partition (eg. /dev/sda1).
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter vPart: the virtual partition number, that is used to build the variable name to access the associative array.
**returns Device of a partition (eg. /dev/sda1).
**/
	protected function getPartitionDev($vDisk, $vPart, $return = null)
	{
		return($this->getDiskDev($vDisk).$this->getPartitionNumber($vDisk, $vPart, $return));
	}





/**
**name CFDiskIO::getPartitionDevs($vDisk)
**description Returns an array with all partition devices (/dev/sdXY) as key and value.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns Array with all partition devices (/dev/sdXY) as key and value.
**/
	protected function getPartitionDevs($vDisk)
	{
		$out = array();

		for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
		{
			$dev = $this->getPartitionDev($vDisk, $vPart);
			$out[$dev] = $dev;
		}

		return($out);
	}




/**
**name CFDiskIO::getPartitionEnd($vDisk, $vPart, $return = null)
**description Returns the end position (in MB) of a partition.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter vPart: the virtual partition number, that is used to build the variable name to access the associative array.
**parameter return: This will returned in case of an error, if set to another value, than 'null'.
**returns End position (in MB) of a partition.
**/
	protected function getPartitionEnd($vDisk, $vPart, $return = null)
	{
		// On RAIDs the end of the fake partition 0 is the size of the complete RAID
		if ($this->isDiskRaid($vDisk))
			return($this->getDiskSize($vDisk));
		return($this->fdiskGetProperty($this->wantedPartitioning[$vDisk][$vPart]['end'], "ERROR: \$this->wantedPartitioning[$vDisk][$vPart]['end'] not set.", $return));
	}





/**
**name CFDiskIO::getPartitionType($vDisk, $vPart, $return = null)
**description Returns the type of a partition.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter vPart: the virtual partition number, that is used to build the variable name to access the associative array.
**parameter return: This will returned in case of an error, if set to another value, than 'null'.
**returns Type of a partition.
**/
	protected function getPartitionType($vDisk, $vPart, $return = null)
	{
		// Raids don't have a partition type
		if ($this->isDiskRaid($vDisk))
			return(false);
		return($this->fdiskGetProperty($this->wantedPartitioning[$vDisk][$vPart]['type'], "ERROR: \$this->wantedPartitioning[$vDisk][$vPart]['type'] not set.", $return));
	}





/**
**name CFDiskIO::getPartitionFileSystem($vDisk, $vPart, $return = null)
**description Returns the file system of a partition.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter vPart: the virtual partition number, that is used to build the variable name to access the associative array.
**parameter return: This will returned in case of an error, if set to another value, than 'null'.
**returns FileSystem of a partition.
**/
	protected function getPartitionFileSystem($vDisk, $vPart, $return = null)
	{
		// Raids (may) have a file system in the fake partition 0
		if ($this->isDiskRaid($vDisk))
		{
			$vPart = 0;
			$return = false;
		}

		return($this->fdiskGetProperty($this->wantedPartitioning[$vDisk][$vPart]['fs'], "ERROR: \$this->wantedPartitioning[$vDisk][$vPart]['fs'] not set.", $return));
	}





/**
**name CFDiskIO::setPartitionFileSystem($vDisk, $vPart, $fs)
**description Sets the file system of a partition.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter vPart: the virtual partition number, that is used to build the variable name to access the associative array.
**parameter fs: File system (e.g. ext4)
**/
	protected function setPartitionFileSystem($vDisk, $vPart, $fs)
	{
		if ($this->isDiskRaid($vDisk))
			$vPart = 0;
		else
		{
			// Extended partition cannot be formated
			if (CFDiskIO::PT_EXTENDED == $this->getPartitionType($vDisk, $vPart))
				return(false);
		}

		$this->wantedPartitioning[$vDisk][$vPart]['fs'] = $fs;
	}





/**
**name CFDiskIO::virtualDelPartition($vDisk, $vPart)
**description Deletes a partition from the internal array.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter vPart: the virtual partition number, that is used to build the variable name to access the associative array.
**/
	protected function virtualDelPartition($vDisk, $vPart)
	{
		// Check, if there is another partition under the next internal partition number
		while (isset($this->wantedPartitioning[$vDisk][$vPart + 1]))
		{
			// Move the partition data "down" to the current partition
			$this->wantedPartitioning[$vDisk][$vPart] = $this->wantedPartitioning[$vDisk][$vPart + 1];
			$vPart ++;
		}

		// Remove the last partition in the row
		unset($this->wantedPartitioning[$vDisk][$vPart]);

		// Ensure the correct ordering of the lParts
		$this->wantedPartitioning[$vDisk] = $this->sortPartitionKeyByStart($this->wantedPartitioning[$vDisk]);

		// Corrects the ordering of logical partitions
		$this->correctLogical($vDisk, 5);
	}





/**
**name CFDiskIO::virtualDeleteDisk($vDisk)
**description Deletes a (RAID) disk and corrects the disk array.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**/
	private function virtualDeleteDisk($vDisk)
	{
		/*
			Delete the raidLvmLock on all partitions that belonged to the RAID
			Run thru all physical partitions (full path) the RAID is build from
		*/
		foreach ($this->getRaidDevsBuildingDisk($vDisk) as $dev)
		{
			//Get its virtual device and partition number
			$this->dev2VDiskVPart($dev, $vDiskRAID, $vPartRAID);
	
			//Remove the RAID/LVM lock from the partition
			$this->setDiskPartLockedByRaid($vDiskRAID, $vPartRAID, false);
		}
	
		// Check, if there is another disk under the next internal partition number
		while (isset($this->wantedPartitioning[$vDisk + 1]))
		{
			// Move the partition data "down" to the current partition
			$this->wantedPartitioning[$vDisk] = $this->wantedPartitioning[$vDisk + 1];
			$vDisk ++;
		}

		// Remove the last disk in the row
		unset($this->wantedPartitioning[$vDisk]);
	}





/**
**name CFDiskIO::getvPartBypPart($vDisk, $pPart)
**description Returns the virtual partition number searched by the physical partition number.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter pPart: The physical partition number
**returns Virtual partition number or false, if none of the virtual partitions matches the physical partition number.
**/
	protected function getvPartBypPart($vDisk, $pPart)
	{
		for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
			if ($this->getPartitionNumber($vDisk, $vPart) == $pPart)
				return($vPart);
	
		return(false);
	}





/**
**name CFDiskIO::getLogicalpParts($vDisk)
**description Builds an array with all physical partition numbers of the logical partitions.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns Array with all physical partition numbers of the logical partitions.
**/
	public function getLogicalpParts($vDisk)
	{
		$out = array();
		$i = 0;
		for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
		{
			if ($this->getPartitionType($vDisk, $vPart) == CFDiskIO::PT_LOGICAL)
				$out[$i++] = $this->getPartitionNumber($vDisk, $vPart);
		}

		sort($out);

		return($out);
	}





/**
**name CFDiskIO::correctLogical($vDisk, $pPart)
**description Corrects the order of the logical partitions after deleting a physical partition.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter pPart: The physical partition number to delete.
**/
	protected function correctLogical($vDisk)
	{
		$logicalpParts = $this->getLogicalpParts($vDisk);
		$holeFound = false;

		// Run thru all physical partition numbers of logical partitions
		foreach ($logicalpParts as $pPart)
		{
			/*
				Find the "hole" in the partition numbers
				eg. in 5, 6, 8, 9 the 7 is missing => so all numbers ascending from (including) 8 must be changed
					AND
				partition number 5 must not be changed
			*/
			if (!$holeFound && !in_array($pPart - 1, $logicalpParts) && ($pPart != 5))
				$holeFound = true;

			// Change all numbers after the hole
			if ($holeFound)
			{
				// Get the vPart of the logical partition
				$vPart = $this->getvPartBypPart($vDisk, $pPart);
	
				// Decrease its
				$this->wantedPartitioning[$vDisk][$vPart]['nr'] --;
			}
		}
	}





/**
**name CFDiskIO::devNrExists($vDisk, $devNr)
**description Checks if a certain (physical) partition number exists.
**parameter vDisk: Virtual (internally used) device number.
**parameter devNr: Device numer you want to check (e.g. 2 for /dev/sda2)
**returns true, when the (physical) partition number exists on the disk.
**/
	protected function devNrExists($vDisk, $devNr)
	{
		for ( $vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
		{
			if ($devNr == $this->wantedPartitioning[$vDisk][$vPart]['nr'])
				return(true);
		}
	
		return(false);
	}





/**
**name CFDiskIO::getBiggestLowestValueOf($vDisk, $partType, $varType, $biggest)
**description Gets the biggest or lowest value from all partitions of a given type.
**parameter vDisk: Virtual (internally used) disk number.
**parameter partType: Type of the partition (CFDiskIO::PT_PRIMARY, CFDiskIO::PT_EXTENDED, CFDiskIO::PT_LOGICAL, CFDiskIO::PT_EFI) or * for all types.
**parameter varType: Variable in the associative array ($this->wantedPartitioning[$vDisk][$vPart][$varType]) to check.
**parameter biggest: If set to true, the biggest value is searched, otherwise false.
**returns Biggest or lowest value from all partitions of a given type.
**/
	private function getBiggestLowestValueOf($vDisk, $partType, $varType, $biggest)
	{
		if ($biggest)
			$value = -1;
		else
			$value = PHP_INT_MAX;

		for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
		{
			if (('*' == $partType) || ($this->getPartitionType($vDisk, $vPart) == $partType))
			{
				$new = $this->wantedPartitioning[$vDisk][$vPart][$varType];
	
				if ($biggest)
				{
					if ($new > $value) $value = $new;
				}
				else
				{
					if ($new < $value) $value = $new;
				}
			}
		}
	
		return($value);
	}





/**
**name CFDiskIO::getBiggestValueOf($vDisk, $partType, $varType)
**description Gets the biggest value from all partitions of a given type.
**parameter vDisk: Virtual (internally used) disk number.
**parameter partType: Type of the partition (CFDiskIO::PT_PRIMARY, CFDiskIO::PT_EXTENDED, CFDiskIO::PT_LOGICAL, CFDiskIO::PT_EFI)
**parameter varType: Variable in the associative array ($this->wantedPartitioning[$vDisk][$vPart][$varType]) to check.
**returns Biggest value from all partitions of a given type.
**/
	protected function getBiggestValueOf($vDisk, $partType, $varType)
	{
		return($this->getBiggestLowestValueOf($vDisk, $partType, $varType, true));
	}





/**
**name CFDiskIO::getLowestValueOf($vDisk, $partType, $varType)
**description Gets the lowest value from all partitions of a given type.
**parameter vDisk: Virtual (internally used) disk number.
**parameter partType: Type of the partition (CFDiskIO::PT_PRIMARY, CFDiskIO::PT_EXTENDED, CFDiskIO::PT_LOGICAL, CFDiskIO::PT_EFI)
**parameter varType: Variable in the associative array ($this->wantedPartitioning[$vDisk][$vPart][$varType]) to check.
**returns Lowest value from all partitions of a given type.
**/
	protected function getLowestValueOf($vDisk, $partType, $varType)
	{
		return($this->getBiggestLowestValueOf($vDisk, $partType, $varType, false));
	}





/**
**name CFDiskIO::virtualAddPartition($vDisk, $start, $end, $type)
**description Creates a new (virtual) partition on a disk.
**parameter dev: The device (e.g. /dev/sda2).
**parameter start: Start position (in MB) of the partition to create.
**parameter end: End position (in MB) of the partition to create.
**parameter type: type of the partition (CFDiskIO::PT_PRIMARY, CFDiskIO::PT_EXTENDED, CFDiskIO::PT_LOGICAL, CFDiskIO::PT_EFI)
**returns Physical partition number of the new partition.
**/
	protected function virtualAddPartition($vDisk, $start, $end, $type)
	{
		if ($this->isUEFIActive() != (CFDiskIO::PT_EFI == $type))
			die("Partition type \"$type\" is not supported on this ".($this->isUEFIActive() ? 'UEFI' : 'BIOS').' client!');

		// Get vPart and (physical) partition number of the partition to create
		$newvPartPos = $this->getNextFreePhysicalPartitionNumber($vDisk, $newPartNr, $type, $start, $end);

		// Current amount of partitions on the disk
		$partAmount = $this->getPartAmount($vDisk);

		// Move all trailing partitions
		for ($vPart = $partAmount - 1; $vPart >= $newvPartPos; $vPart--)
		{
			$this->wantedPartitioning[$vDisk][$vPart + 1] = array();
			$this->wantedPartitioning[$vDisk][$vPart + 1] = $this->wantedPartitioning[$vDisk][$vPart];
		}

		// Physical partition number
		$this->wantedPartitioning[$vDisk][$newvPartPos]['nr'] = $newPartNr;

		// Begin of the partition in MB
		$this->wantedPartitioning[$vDisk][$newvPartPos]['start'] = $start;

		// End of the partition in MB
		$this->wantedPartitioning[$vDisk][$newvPartPos]['end'] = $end;

		// Type of the partition: CFDiskIO::PT_PRIMARY, CFDiskIO::PT_EXTENDED, CFDiskIO::PT_LOGICAL, CFDiskIO::PT_EFI
		$this->wantedPartitioning[$vDisk][$newvPartPos]['type'] = $type;

		// File system: None on creating the partition
		$this->wantedPartitioning[$vDisk][$newvPartPos]['fs'] = -1;

		// Ensure the correct ordering of the lParts
		$this->wantedPartitioning[$vDisk] = $this->sortPartitionKeyByStart($this->wantedPartitioning[$vDisk]);

		return($newPartNr);
	}





/**
**name CFDiskIO::virtualAddDisk($dev, $size)
**description Adds a new virtual disk.
**parameter dev: Device name of the new drive (e.g. /dev/md0)
**parameter size: Size in MB of the new drive.
**returns vDisk of the new created virtual disk.
**/
	protected function virtualAddDisk($dev, $size)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		$this->dev2VDiskVPart($dev, $vDisk, $vPart);

		if (($vDisk === false) && ($vPart === false))
		{
			$vDisk = $this->getDiskAmount();

			// The device of the disk (e.g. /dev/sda)
			$this->wantedPartitioning[$vDisk]['dev'] = $dev;
			// The size of the complete disk
			$this->wantedPartitioning[$vDisk]['size'] = $size;

			return($vDisk);
		}
		else
		{
			$this->addErrorMessage($I18N_error_disk_device_exists);
			return(false);
		}
	}





/**
**name CFDiskIO::getBelongingRaidDev($dev)
**description Searches for the RAID device, a physical partition belongs to, if it is part of a RAID.
**parameter dev: The physical partition (e.g. /dev/hda4) that belongs to a RAID.
**returns The RAID device (e.g. /dev/md0) the physical partition belongs to or false, if no belonging RAID was found.
**/
	protected function getBelongingRaidDev($dev)
	{
		for ($vDisk = 0; $vDisk < $this->getDiskAmount(); $vDisk++)
		{
			foreach ($this->getRaidDevsBuildingDisk($vDisk) as $raidDev)
				if ($dev == $raidDev)
					return($this->getDiskDev($vDisk));
		}
	
		return(false);
	}





/**
**name CFDiskIO::FDISK_dev2VDiskVPart_Legacy($param,$dev,&$vDev,&$vPart)
**description searches a special device (e.g. /dev/hda2) and writes the virtual device and partition numbers to the variables. These values can be used to access the file system via $param["dev$vDev"."part$vPart"."_fs"]
**parameter param: the associative array containing all values describing the drives of the client
**parameter dev: the device (e.g. /dev/hda2)
**parameter vDev: the virtual device number, that is used to build the variable name to access the associative array.
**parameter vPart: the virtual partition number, that is used to build the variable name to access the associative array. This number has not to be qual to the partition number of the real drive (e.g. /dev/hda5 can be $vPart == 3). If it is set to "empty", only vDev is calculated.
**returns true if the search worked otherwise false.
**/
	private function FDISK_dev2VDiskVPart_Legacy($param,$dev,&$vDev,&$vPart)
	{
		if (strpos($dev,"md") === false)
			$pathNr = preg_split("/[0-9]/",$dev);
		else
			$pathNr[0] = $dev;
	
		$path = $pathNr[0];
		$searchPartNr = substr ($dev, strlen($path));

		/*
			if the data is imported from m23hwscanner the value is missing.
			to make it work set the dev_amount to a hig value.
		*/
		if (!isset($param['dev_amount']))
			$param['dev_amount'] = 99;
	
		for ($devNr = 0; $devNr < $param['dev_amount']; $devNr++)
		{
			if ($param["dev$devNr"."_path"] == $path)
			{
				$vDev = $devNr;


				if (empty($searchPartNr) || $vPart === "empty")
				{
					$vPart = false;
					//it is selected a drive, so return now
					return(true);
				}

				
				for ($partNr = 0; $partNr < $param["dev$devNr"."_partamount"]; $partNr++)
				{
					if ($param["dev$devNr"."part$partNr"."_nr"] == $searchPartNr)
					{
						$vPart = $partNr;
						return(true);
					}
				}
			}
		}
	
		return(false);
	}





/**
**name CFDiskIO::collidesWithPartitionOfType($vDisk, $type, $start, $end)
**description Checks if a partition (to be created) defined by start and end position would collide with existing partitions of given type.
**parameter vDisk: Virtual (internally used) device number.
**parameter type: type of the partition (primary, extended, logical, efipart, or -1 to match all partition types)
**parameter start: start position for the partition (to be created)
**parameter end: end position for the  partition (to be created)
**returns true, if the partition to create would collide, otherwise false.
**/
	private function collidesWithPartitionOfType($vDisk, $type, $start, $end)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
// 		print("\ncollidesWithPartitionOfType($vDisk, $type, $start, $end)\n");

		for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
		{
// 			print("\n>>check (vD:$vDisk, vP:$vPart): type = ".$this->getPartitionType($vDisk, $vPart)." start: ".$this->getPartitionStart($vDisk, $vPart)." end: ".$this->getPartitionEnd($vDisk, $vPart)."\n");

			if ((($this->getPartitionType($vDisk, $vPart) == $type) || (-1 == $type)) && ($start < $this->getPartitionEnd($vDisk, $vPart)) && ($end > $this->getPartitionStart($vDisk, $vPart)))
			{
				$this->addErrorMessage($I18N_no_space_in_range);
				return(true);
			}
		}

		return(false);
	}





/**
**name CFDiskIO::isFreeSpaceBetween($vDisk, $type, $start, $end, $addErrorMsg = true)
**description Checks if there is a free space between $start and $end and the type of partition could be created there.
**parameter vDisk: Virtual (internally used) device number.
**parameter type: type of the partition (primary, extended, logical, efipart)
**parameter start: start position for the search
**parameter end: end position for the search
**parameter addErrorMsg: Set to true, if the error messages should be added.
**returns true, if the there is free space, otherwise false.
**/
	public function isFreeSpaceBetween($vDisk, $type, $start, $end, $addErrorMsg = true)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$diskSize = $this->getDiskSize($vDisk);
		if (($start < 0) || ($end < 0) || ($start > $diskSize) || ($end > $diskSize))
		{
			if ($addErrorMsg) $this->addErrorMessage($I18N_no_space_in_range);
			return(false);
		}

		// Return, when no partition with the given type can be created
		if ($this->isNewPartitionOfTypeCreatable($vDisk, $type) === false)
			return(false);

		// Check for creatability of an EFI partition
		if ($type == CFDiskIO::PT_EFI)
		{
			return($this->collidesWithPartitionOfType($vDisk, -1, $start, $end));
		}

		// Check for creatability of an EFI partition
		elseif ($type == CFDiskIO::PT_LOGICAL)
		{
			return($this->collidesWithPartitionOfType($vDisk, $type, $start, $end));
		}


		// Check for creatability of a logical partition
		elseif ($type == CFDiskIO::PT_LOGICAL)
		{
			// Find extended partition or return
			$vPart = $this->getExtendedVPart($vDisk);
			if ($vPart === false)
			{
				if ($addErrorMsg) $this->addErrorMessage($I18N_error_0_ext_add_log);
				return(false);
			}

			//logical partition can't be created outside of the extended partition
			if (!(	($start >= $this->wantedPartitioning[$vDisk][$vPart]['start']) &&
					($end <= $this->wantedPartitioning[$vDisk][$vPart]['end'])))
			{
				if ($addErrorMsg) $this->addErrorMessage($I18N_error_log_outside_of_ext);
				return(false);
			}

			// A logical partition must not collide with other logical partitions
			if ($this->collidesWithPartitionOfType($vDisk, CFDiskIO::PT_LOGICAL, $start, $end))
				return(false);
		}


		// Check for creatability of a primary partition
		elseif ($type == CFDiskIO::PT_PRIMARY)
		{
			// There if there is an extended partition
			$vPart = $this->getExtendedVPart($vDisk);
			if ($vPart !== false)
			{
				// Check, if the new primary partition would be created into an extended partition => error
				if (($start < $this->getPartitionEnd($vDisk, $vPart)) && ($end > $this->getPartitionStart($vDisk, $vPart)))
				{
					if ($addErrorMsg) $this->addErrorMessage($I18N_error_cannot_create_primary_inside_of_ext);
					return(false);
				}
			}

			// A primary partition must not collide with other primary partitions or an extended partition
			if ($this->collidesWithPartitionOfType($vDisk, CFDiskIO::PT_PRIMARY, $start, $end))
				return(false);
			if ($this->collidesWithPartitionOfType($vDisk, CFDiskIO::PT_EXTENDED, $start, $end))
				return(false);
		}


		// Check for creatability of an extended partition
		elseif ($type == CFDiskIO::PT_EXTENDED)
		{
			if ($this->collidesWithPartitionOfType($vDisk, CFDiskIO::PT_PRIMARY, $start, $end))
				return(false);
		}
	
		return(true);
	}





/**
**name CFDiskIO::getPossiblePartitionTypesBetween($vDisk, $start, $end)
**description Get a list of partition types that can be created in a range on a disk.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter start: Start position (in MB) of the partition to create.
**parameter end: End position (in MB) of the partition to create.
**returns List of partition types that can be created in a range on a disk.
**/
	protected function getPossiblePartitionTypesBetween($vDisk, $start, $end)
	{
		$out = array();
		$i = 0;

		// Run tru the possible types for new partitions on the disk
		foreach ($this->getCreatablePartitionTypes($vDisk) as $type)
			// Check, if the type can be creates between $start and $end
			if ($this->isFreeSpaceBetween($vDisk, $type, $start, $end, false))
				$out[$i++] = $type;

		return($out);
	}





/**
**name CFDiskIO::isNewPartitionOfTypeCreatable($vDisk, $type, $addErrorMsg = true)
**description Checks if a new partition from a certain type can be created.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter type: type of the partition (CFDiskIO::PT_PRIMARY, CFDiskIO::PT_EXTENDED, CFDiskIO::PT_LOGICAL)
**parameter addErrorMsg: Set to true, if the error messages should be added.
**returns true, if a new partition can be created, otherwise false.
**/
	private function isNewPartitionOfTypeCreatable($vDisk, $type, $addErrorMsg = true)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// For EFI partitions the only requirement is, that the amount stays under the maximum amount
		if (CFDiskIO::PT_EFI == $type)
		{
			if (($this->getPartitionAmountOfType($vDisk, CFDiskIO::PT_EFI) < CFDiskIO::GPT_MAX_PART_AMOUNT) && ($this->getEFIBootPartDev() != false))
				return(true);
			else
			{
				if ($addErrorMsg) $this->addErrorMessage($I18N_error_maximumAmountOfGPTPartitionsReached);
				return(false);
			}
		}

		// If there is an EFI boot partition, there cannot be another
		if (CFDiskIO::PT_EFIBOOT == $type)
		{
			if ($this->getEFIBootPartDev() == false)
				return(true);
			else
			{
				if ($addErrorMsg) $this->addErrorMessage($I18N_error_thereCannotBeMoreThanOneEFIBootPartition);
				return(false);
			}
		}

		//get the amount of partition types
		$extCount = $this->getPartitionAmountOfType($vDisk, CFDiskIO::PT_EXTENDED);
		$logCount = $this->getPartitionAmountOfType($vDisk, CFDiskIO::PT_LOGICAL);
		$priCount = $this->getPartitionAmountOfType($vDisk, CFDiskIO::PT_PRIMARY);
	
		//can't add any more partitions, all primary paritions full
		if ($priCount==4)
		{
			if ($addErrorMsg) $this->addErrorMessage($I18N_error_4_pri);
			return(false);
		}
	
		//can't add another primary partition, maximum ammount of primary partitions exceeded
		if (($type==CFDiskIO::PT_PRIMARY) && ($priCount==3) && ($extCount==1))
		{
			if ($addErrorMsg) $this->addErrorMessage($I18N_error_3_pri_1_ext_part);
			return(false);
		}
	
		//can't create a logical partition due to no extended partition
		if (($extCount==0) && ($type==CFDiskIO::PT_LOGICAL))
		{
			if ($addErrorMsg)  $this->addErrorMessage($I18N_error_0_ext_add_log);
			return(false);
		}
	
		//can't create one more extended partition
		if (($extCount==1) && ($type==CFDiskIO::PT_EXTENDED))
		{
			if ($addErrorMsg) $this->addErrorMessage($I18N_error_1_ext_add_ext);
			return(false);
		}
	
		return(true);
	}





/**
**name CFDiskIO::getCreatablePartitionTypes($vDisk)
**description Creates an array with the types of partitions that could be created on a disk.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns Associative array with types of partitions that could be created on a disk.
**/
	protected function getCreatablePartitionTypes($vDisk)
	{
		$out = array();

		if ($this->isUEFIActive())
			$types = array(CFDiskIO::PT_EFI, CFDiskIO::PT_EFIBOOT);
		else
			$types = array(CFDiskIO::PT_PRIMARY, CFDiskIO::PT_EXTENDED, CFDiskIO::PT_LOGICAL);

		foreach ($types as $type)
			if ($this->isNewPartitionOfTypeCreatable($vDisk, $type, false) !== false)
				$out[$type] = $type;

		return($out);
	}





/**
**name CFDiskIO::mayLogicalPartitionsBeChanged($vDisk)
**description Checks if the logical partitions may be changed on the given disk. If one logical partition on the disk is assigned to a RAID, none of the other logical partitions may be removed or added, because the numbering of the partitions will change afterwards and bring the RAID into a faulty state.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns true, if logical partitions may be removed or added on the disk, otherwise false.
**/
// 	protected function mayLogicalPartitionsBeChanged($vDisk)
// 	{
// 		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
// 
// 		for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
// 			if ($this->isPartitionLockedByRaid($vDisk, $vPart) && (CFDiskIO::PT_LOGICAL == $this->getPartitionType($vDisk, $vPart)))
// 			{
// 				$this->addErrorMessage($I18N_logicalPartitionsCannotBeChangedBecauseTheyArePartOfARaid);
// 				return(false);
// 			}
// 
// 		return(true);
// 	}





/**
**name CFDiskIO::mayPartitioningBeChanged($vDisk)
**description Checks, if the whole disk or at least one partition on the disk is used in a RAID.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns true, if the partitioning of the disk may be changed, otherwise false.
**/
	protected function mayPartitioningBeChanged($vDisk)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Check, if the whole disk is used in a RAID
		if ($this->isDiskLockedByRaid($vDisk))
		{
			$this->addErrorMessage($I18N_partitioningCannotBeChangedBecauseThereIsAtLeastOneRaid);
			return(false);
		}

		// Check, if at least one partition on the disk is used in a RAID
		for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
			if ($this->isPartitionLockedByRaid($vDisk, $vPart))
			{
				$this->addErrorMessage($I18N_partitioningCannotBeChangedBecauseThereIsAtLeastOneRaid);
				return(false);
			}

		return(true);
	}





/**
**name CFDiskIO::getNextFreePhysicalVirtualPartitionNumber($vDisk, &$newPartNr, $type, $start, $end)
**description Gets the next physical and virtual partition numbers for a new partition of given type.
**parameter vDisk: Virtual (internally used) disk number.
**parameter newPartNr: (physical) partition number for the partition to create.
**parameter type: type of the partition (primary, extended, logical)
**parameter start: Start position of the partition.
**parameter end: End position of the partition.
**returns Virtual (internally used) partition number.
**/
	private function getNextFreePhysicalPartitionNumber($vDisk, &$newPartNr, $type, $start, $end)
	{
		$partAmount = $this->getPartAmount($vDisk);

		//search for an extended partition
		$extPos = $this->getExtendedVPart($vDisk);
		
		// Used for searching (physical) partition numbers
		if ($extPos === false)
			$extPos = 0;

		//we create a new EFI partition
		if ($type == CFDiskIO::PT_EFI)
		{
			$newPartNr = $this->nextEfiDevNr($vDisk);
			$vPartSearchStart = 0;
			$vPartSearchEnd = $partAmount;
			$partAmount--;
		}

		//we create a new logical partition
		if ($type == CFDiskIO::PT_LOGICAL)
		{
			//search for logical after the extended partition
			$vPartSearchStart = $extPos + 1;
			$vPartSearchEnd = $partAmount;

			$newPartNr = $this->nextLogicalDevNr($vDisk);

			//partition is the first logical partition
			if (0 == $this->getPartitionAmountOfType($vDisk, CFDiskIO::PT_LOGICAL))
				return($extPos+1);

			$partAmount--;
		}


		//we create a new primary partition
		if ($type == CFDiskIO::PT_PRIMARY)
		{
			$vPartSearchStart = 0;
			$vPartSearchEnd = $extPos + 1;

			$newPartNr = $this->nextPrimaryDevNr($vDisk);

			/*
				Is the new partition the first partition on the disk?
				No other partitions on disk or the new partition should be created before the beginning of all other partitions.
			*/

			if (($this->getPartAmount($vDisk) == 0) || ($end <= $this->getLowestValueOf($vDisk, '*', 'start')))
				return(0);

			// Is the partition the last primary partition on the disk?
			if ($start >= $this->getBiggestValueOf($vDisk, CFDiskIO::PT_PRIMARY, 'end'))
				return($this->getPartitionAmountOfType($vDisk, CFDiskIO::PT_PRIMARY));


			/*
				FALSCH? Warum wird die physikalische Partitionsnummer zurückgegeben, wenn es eine vPart sein sollte?
				for ($vPart = 0; $vPart < 4; $vPart++)
				{
					if (($start >= $param["dev$vDev"."part$vPart"."_start"]) &&
						($end <= $param["dev$vDev"."part".($vPart+1)."_end"]))
						return($param["dev$vDev"."part$vPart"."_nr"]);
				}
			*/

			// Run thru the primary partitions
			for ($vPart = 0; $vPart < 4; $vPart++)
			{
				/*
					Check between which two partitions the new partition should be created
					This is use the vPart number of the second (the 2nd partition will get another vPart number)
				*/
				if (($start >= $this->getPartitionStart($vDisk, $vPart, PHP_INT_MAX)) &&
					($end <= $this->getPartitionEnd($vDisk, $vPart + 1, -1)))
					return($vPart + 1);
			}
		}


		// vPart numbers for the extended partition are between 0 and 3
		if ($type==CFDiskIO::PT_EXTENDED)
		{
			$newPartNr = $this->nextPrimaryDevNr($vDisk);
			$vPartSearchStart = 0;
			$vPartSearchEnd = 4;
		}


		/*
			Get the vPart number of the partition wich will be after the partition to be created
				OR
			if the new partition will be the (future) last partition => use the vPart number above the last (existing) partition
		*/
		for ($vPart = $vPartSearchStart; $vPart < $vPartSearchEnd; $vPart++)
		{
			// Get the start position of the partition or -1 if there is no partition under the vPart
			$pStart = $this->getPartitionStart($vDisk, $vPart, -1);

			if (($pStart == -1) || ($end <= $pStart))
				return($vPart);
		}


		// Search vPart for the extended partition
		if ($type == CFDiskIO::PT_EXTENDED)
		{
			for ($vPart = 0; $vPart < 4; $vPart++)
			{
				//if there is no partition or it is not an primary partition
				$type = $this->getPartitionType($vDisk, $vPart, -1);
				if (($type == CFDiskIO::PT_LOGICAL) || ($type == -1))
					return($vPart);
			}
		}

		return($partAmount+1);
	}





/**
**name CFDiskIO::nextLogicalDevNr($vDisk)
**description Gets the next free logical (physical) partition number.
**parameter vDisk: Virtual (internally used) disk number.
**returns Next free logical (physical) partition number.
**/
	public function nextLogicalDevNr($vDisk)
	{
		for ($devNr = 5; true; $devNr++)
			if (!$this->devNrExists($vDisk, $devNr))
				return($devNr);
	}





/**
**name CFDiskIO::nextPrimaryDevNr($vDisk)
**description Gets the next free primary (physical) partition number.
**parameter vDisk: Virtual (internally used) disk number.
**returns Next free logical (physical) partition number or -1, if there are no free partition numbers.
**/
	private function nextPrimaryDevNr($vDisk)
	{
		for ($devNr = 1; $devNr <= 4; $devNr++)
		{
			if (!$this->devNrExists($vDisk, $devNr))
				return($devNr);
		}

		return(-1);
	}





/**
**name CFDiskIO::nextPrimaryDevNr($vDisk)
**description Gets the next free EFI (physical) partition number.
**parameter vDisk: Virtual (internally used) disk number.
**returns Next free EFI (physical) partition number or -1, if there are no free partition numbers.
**/
	private function nextEfiDevNr($vDisk)
	{
		for ($devNr = 1; $devNr <= CFDiskIO::GPT_MAX_PART_AMOUNT; $devNr++)
		{
			if (!$this->devNrExists($vDisk, $devNr))
				return($devNr);
		}

		return(-1);
	}





/**
**name CFDiskIO::getWantedPartitioning()
**description Returns the wantedPartitioning array.
**returns wantedPartitioning array.
**/
	protected function getWantedPartitioning()
	{
		return($this->wantedPartitioning);
	}





/**
**name CFDiskIO::sortDiskKeyByDev($in)
**description Sorts the elements with numeric keys (disks) of the input array by the subkey 'dev'. The numeric keys will be ascending and in the same order than the ascending subkey 'dev' with /dev/mdX at the end.
**parameter in: Input array of a disk.
**returns Array with sorted disks.
**/
	public static function sortDiskKeyByDev($in)
	{
		$vPart = 0;
		$sortPos = $out = array();
		
// 		print("\n------------------\n------------------\nsortDiskKeyByDev\n------------------\n------------------\n");
// 		print_r($in);

		foreach ($in as $key => $val)
		{
			// Check, if it is a vPart
			if (is_numeric($key))
				$sortPos[$key] = ((strpos($in[$key]['dev'], '/dev/md') !== false) ? 'x'.$in[$key]['dev'] : $in[$key]['dev']);
			else
				die("ERROR: sortDiskKeyByDev: k:$key v:$val\n");
		}


		/*
			Before sorting eg.:

			$sortPos[0] = 500;
			$sortPos[1] = 0;
			$sortPos[2] = 1000;
		*/

		// Sort the postion array by the dev name
		asort($sortPos);

		/*
			After sorting eg.:

			$sortPos[1] = 0;
			$sortPos[0] = 500;
			$sortPos[2] = 1000;
		*/

		$vPartNew = 0;
		foreach ($sortPos as $vPartOld => $val)
			$out[$vPartNew++] = $in[$vPartOld];

// 		print_r($out);
		return($out);
	}





/**
**name CFDiskIO::sortPartitionKeyByStart($in)
**description Sorts the elements with numeric keys of the input array by the subkey 'start' and copies all other elements unchanged. The numeric keys will be ascending and in the same order than the ascending subkey 'start'.
**parameter in: Input array ($disk array with information about all parameters (disk info and partitions)) of a disk.
**returns Array with sorted partitions.
**/
	static public function sortPartitionKeyByStart($in)
	{
		$vPart = 0;
		$sortPos = $out = array();
		
// 		print("\n------------------\n------------------\nsortPartitionKeyByStart\n------------------\n------------------\n");
// 		print_r($in);

		foreach ($in as $key => $val)
		{
			// Check, if it is a vPart
			if (is_numeric($key))
				$sortPos[$key] = $in[$key]['start'] + $in[$key]['end'];
			else
			// Copy other keys and values (eg. 'dev', 'size') directly.
				$out[$key] = $val;
		}

// 		print_r($out);

		/*
			Before sorting eg.:

			$sortPos[0] = 500;
			$sortPos[1] = 0;
			$sortPos[2] = 1000;
		*/

		// Sort the postion array after the start position of the partitions
		asort($sortPos, SORT_NUMERIC);

		/*
			After sorting eg.:

			$sortPos[1] = 0;
			$sortPos[0] = 500;
			$sortPos[2] = 1000;
		*/

		$vPartNew = 0;
		foreach ($sortPos as $vPartOld => $val)
			$out[$vPartNew++] = $in[$vPartOld];

// 		print_r($out);

		return($out);
	}





/**
**name CFDiskIO::getRaidLevelNumbers()
**description Returns an array with valid RAID levels.
**returns Array with valid RAID levels.
**/
	protected function getRaidLevelNumbers()
	{
		return(array(0, 1, 4, 5, 6, 10));
	}





/**
**name CFDiskIO::isRaidLevelNumberValid($level)
**description Checks, if a number is a valid RAID level.
**parameter level: RAID level to check.
**returns true, if the input number is a valid RAID level.
**/
	protected function isRaidLevelNumberValid($level)
	{
		return(in_array($level , $this->getRaidLevelNumbers()));
	}





/**
**name CFDiskIO::getRaidDevsBuildingDisk($vrDisk)
**description Returns an array with all disk or partition devices building the RAID of the disk (if it is a RAID).
**parameter vrDisk: Virtual (internally used) disk number.
**returns Array with all disk or partition devices building the RAID of the disk (if it is a RAID) or empty array if the disk is no RAID.
**/
	protected function getRaidDevsBuildingDisk($vrDisk)
	{
		return($this->fdiskGetProperty(@$this->wantedPartitioning[$vrDisk]['raidDrive'], "", array()));
	}





/**
**name CFDiskIO::getvrDevNrByrDev($vrDisk, $dev)
**description Returns the (virtual) number of the given device building the RAID.
**parameter vrDisk: Virtual (internally used) disk number of the RAID.
**parameter dev: Device to search in the RAID.
**returns Virtual number of the given device building the RAID or false, if the device is not part of the RAID.
**/
	private function getvrDevNrByrDev($vrDisk, $dev)
	{
		foreach ($this->getRaidDevsBuildingDisk($vrDisk) as $rDevNr => $rDev)
		{
			if ($rDev == $dev)
				return($rDevNr);
		}

		return(false);
	}





/**
**name CFDiskIO::doesDiskHavePartitionsLockedByRaid($vDisk)
**description Checks if the disk has at least one partition that was assigned to a RAID.
**parameter vDisk: Virtual (internally used) disk number.
**returns true, if there is at least one partition that was assigned to a RAID on the disk, otherwise false.
**/
	private function doesDiskHavePartitionsLockedByRaid($vDisk)
	{
		for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
			if ($this->isPartitionLockedByRaid($vDisk, $vPart))
				return(true);

		return(false);
	}





/**
**name CFDiskIO::addDevToRaid($vrDisk, $dev)
**description Adds a device (disk or partition) to the list of devices building the RAID.
**parameter vrDisk: Virtual (internally used) RAID disk number.
**parameter dev: Device to add to the RAID.
**returns true, if the device could be added, otherwise false.
**/
	protected function addDevToRaid($vrDisk, $dev)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		

		$this->dev2VDiskVPart($dev, $vDisk, $vPart);

		if ($this->maximumDevicesForRaidReached($vrDisk))
			return(false);

		// Check, if the vrDisk is not a RAID => return
		if (!$this->isDiskRaid($vrDisk))
		{
			$this->addErrorMessage($I18N_error_no_virtual_raid_disk_number."($dev)");
			return(false);
		}

		// Was the disk/partition (itself) to add added before to another/this RAID?
		if ($this->isDiskOrPartLockedByRaid($vDisk, $vPart))
		{
			$this->addErrorMessage($I18N_drivePartitionWasAlreadyAssigned."($dev)");
			return(false);
		}

		// Should a partition get added?
		if ($vPart !== false)
		{
			// Check, if the partition to assign is located on a disk that was (as a whole) assigned before
			if ($this->isDiskLockedByRaid($vDisk))
			{
				$this->addErrorMessage($I18N_cantAssignPartitionBecauseItsDriveWasAssignedBefore."($dev)");
				return(false);
			}

			// Check, if an extended partition is tried to be added => fail
			if ($this->getPartitionType($vDisk, $vPart) == CFDiskIO::PT_EXTENDED)
			{
				$this->addErrorMessage($I18N_cantAssignExtendedPartitionToRaid."($dev)");
				return(false);
			}
		}
		else
		{
			// Check, if the disk has a partition(s) that was assigned to a RAID
			if ($this->doesDiskHavePartitionsLockedByRaid($vDisk))
			{
				$this->addErrorMessage($I18N_cantAssignDriveBecauseAPartitionOnThisDriveWasAssignedBefore."($dev)");
				return(false);
			}
		}

		// Add a new device to the list and sort it
		if (isset($this->wantedPartitioning[$vrDisk]['raidDrive']) && is_array($this->wantedPartitioning[$vrDisk]['raidDrive']))
			array_push($this->wantedPartitioning[$vrDisk]['raidDrive'], $dev);
		else
			$this->wantedPartitioning[$vrDisk]['raidDrive'][0] = $dev;

		sort($this->wantedPartitioning[$vrDisk]['raidDrive']);

		// Update the usable size of the RAID
		$this->updateRAIDSize($vrDisk);

		// Set the lock from the disk or partition
		$this->dev2VDiskVPart($dev, $vDisk, $vPart);
		$this->setDiskPartLockedByRaid($vDisk, $vPart, true);

		return(true);
	}





/**
**name CFDiskIO::delDevFromRaid($vrDisk, $dev)
**description Removes a device (disk or partition) from the list of devices building the RAID.
**parameter vrDisk: Virtual (internally used) RAID disk number.
**parameter dev: Device to remove from the RAID.
**returns true, if the device could be removed, otherwise false.
**/
	protected function delDevFromRaid($vrDisk, $dev)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
		// Get the (virtual) number of the given device building the RAID or false, if it is not part of the RAID.
		$vrDev = $this->getvrDevNrByrDev($vrDisk, $dev);

		// Check, of the device is already part of the RAID
		if ($vrDev === false)
		{
			$this->addErrorMessage($I18N_error_could_not_remove_device_it_is_not_part_of_this_raid);
			return(false);
		}

		// Remove a device from the list and make sure, there is no hole in the numeric keys (by sorting it)
		unset($this->wantedPartitioning[$vrDisk]['raidDrive'][$vrDev]);
		sort($this->wantedPartitioning[$vrDisk]['raidDrive']);

		// Update the usable size of the RAID
		$this->updateRAIDSize($vrDisk);

		// Remove the lock from the disk or partition
		$this->dev2VDiskVPart($dev, $vDisk, $vPart);
		$this->setDiskPartLockedByRaid($vDisk, $vPart, false);

		return(true);
	}





/**
**name CFDiskIO::updateRAIDSize($vrDisk)
**description Updates the usable size of the RAID
**parameter vrDisk: Virtual (internally used) disk number.
**returns true, if the RAID size could be calculated, otherwise false.
**/
	private function updateRAIDSize($vrDisk)
	{
		$sizeCounter = 0;
		$minimalSize = PHP_INT_MAX;
		$ret = true;
		$totalSize = 0;
		
// 		print_r($this->wantedPartitioning[$vrDisk]);

		// Find the disk or partition with the smallest size
		foreach ($this->getRaidDevsBuildingDisk($vrDisk) as $rDev)
		{
			$this->dev2VDiskVPart($rDev, $vDisk, $vPart);

			// Check if it is a disk or a partition
			if ($vPart === false)
				$size = $this->getDiskSize($vDisk);
			else
				$size = $this->getPartitionSize($vDisk, $vPart);

			// Change the minimal size, if the newest size is lower
			if ($size < $minimalSize)
				$minimalSize = $size;

			$totalSize += $size;

			$sizeCounter++;
		}

		// If there are no devices building the RAID => Size of the RAID is 0
		if ($sizeCounter > 0)
		{
			// Set the calculation parameters
			switch ($this->getRaidLevel($vrDisk))
			{
				case  0: $raidSize = $totalSize; break;
				case  1: $raidSize = $minimalSize;  break;
				case  4: $raidSize = $minimalSize * ($sizeCounter - 1); break;
				case  5: $raidSize = $minimalSize * ($sizeCounter - 1); break;
				case  6: $raidSize = $minimalSize * ($sizeCounter - 2); break;
				case 10: $raidSize = $minimalSize * ($sizeCounter / 2); break;
				default: $ret = false;
			}
		}
		else
		{
			$raidSize = 0;
			$ret = false;
		}

		// If the size becomes negative (not enough devices building the RAID were added)
		if ($raidSize < 0)
		{
			$raidSize = 0;
			$ret = false;
		}

		$this->wantedPartitioning[$vrDisk]['size'] = $raidSize;
		return($ret);
	}





/**
**name CFDiskIO::getRaidCompleteParameters($level, &$minRaidDrives, &$raidMultipleOf, &$maxRaidDrives)
**description Writes the constraints for building a RAID of a given level to the parameter variables.
**parameter level: RAID level number.
**parameter minRaidDrives: The minimum amount of devices for building the RAID.
**parameter raidMultipleOf: The amount of devices building the RAID must be a multiple of this value.
**parameter maxRaidDrives: Maximum amount of devices building the RAID.
**returns true, if there are parameters of the given RAID level, otherwise false.
**/
	public static function getRaidCompleteParameters($level, &$minRaidDrives, &$raidMultipleOf, &$maxRaidDrives)
	{
		switch ($level)
		{
			case 0:  $minRaidDrives = 2; $raidMultipleOf = 1; $maxRaidDrives = PHP_INT_MAX; break;
			case 1:  $minRaidDrives = 2; $raidMultipleOf = 2; $maxRaidDrives = 2; break;
			case 4:  $minRaidDrives = 3; $raidMultipleOf = 1; $maxRaidDrives = PHP_INT_MAX; break;
			case 5:  $minRaidDrives = 3; $raidMultipleOf = 1; $maxRaidDrives = PHP_INT_MAX; break;
			case 6:  $minRaidDrives = 4; $raidMultipleOf = 1; $maxRaidDrives = PHP_INT_MAX; break;
			case 10: $minRaidDrives = 4; $raidMultipleOf = 2; $maxRaidDrives = PHP_INT_MAX; break;
			default: return(false);
		}
		return(true);
	}





/**
**name CFDiskIO::isRaidComplete($vrDisk)
**description Checks, if there are too less or too much devices building the RAID or if the amount is not a multiple of needed devices.
**parameter vrDisk: Virtual (internally used) RAID disk number.
**returns true, if all requirements for building the RAID are met or it is not a RAID.
**/
	protected function isRaidComplete($vrDisk)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// If it is not a RAID, it is ok too
		if (!$this->isDiskRaid($vrDisk))
			return(true);

// 		print("isRaidComplete($vrDisk): Level: ".$this->getRaidLevel($vrDisk)."\n");

		// Set the checking parameters
		CFDiskIO::getRaidCompleteParameters($this->getRaidLevel($vrDisk), $minRaidDrives, $raidMultipleOf, $maxRaidDrives);

// 		print("isRaidComplete: Level: ".$this->getRaidLevel($vrDisk)."\n");
		// Get the amount of the devices building the RAID.
		$raidDevsBuildingDiskAmount = $this->getRaidDevsBuildingDiskAmount($vrDisk);
// 		print("isRaidComplete: Level: ".$this->getRaidLevel($vrDisk)."\n");

		// Check, if there are too less or too much devices building the RAID or if the amount is not a multiple of needed devices
		if (($raidDevsBuildingDiskAmount < $minRaidDrives) || ($raidDevsBuildingDiskAmount > $maxRaidDrives) || (($raidDevsBuildingDiskAmount % $raidMultipleOf) != 0))
		{
// 			print('$raidDevsBuildingDiskAmount < $minRaidDrives:'.serialize($raidDevsBuildingDiskAmount < $minRaidDrives)."\n");
// 			print('$raidDevsBuildingDiskAmount > $maxRaidDrives:'.serialize($raidDevsBuildingDiskAmount > $maxRaidDrives)."\n");
// 			print('($raidDevsBuildingDiskAmount % $raidMultipleOf) != 0:'.serialize(($raidDevsBuildingDiskAmount % $raidMultipleOf) != 0)."\n");
// 
// 			print("isRaidComplete: Level: ".$this->getRaidLevel($vrDisk)."\n");
			$this->addErrorMessage("$I18N_notEnoughDrivesPartitionsForRaidType $I18N_minimalRaidDisks: $minRaidDrives, $I18N_maximalRaidDisks: $maxRaidDrives, $I18N_multipleOfRaidDisks: $raidMultipleOf");
			return(false);
		}
		else
			return(true);
	}





/**
**name CFDiskIO::maximumDevicesForRaidReached($vrDisk)
**description Checks, if the the maximum amount of devices building the RAID is reached.
**parameter vrDisk: Virtual (internally used) RAID disk number.
**returns true, if the maximum amount is reached or it is not a RAID.
**/
	protected function maximumDevicesForRaidReached($vrDisk)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// If it is not a RAID, it is ok too
		if (!$this->isDiskRaid($vrDisk))
			return(true);

		CFDiskIO::getRaidCompleteParameters($this->getRaidLevel($vrDisk), $minRaidDrives, $raidMultipleOf, $maxRaidDrives);
		
		if ($this->getRaidDevsBuildingDiskAmount($vrDisk) >= $maxRaidDrives)
		{
			$this->addErrorMessage($I18N_maximum_amount_of_devices_building_the_raid_reached);
			return(true);
		}
		else
			return(false);
	}





/**
**name CFDiskIO::areAllRaidsComplete()
**description Checks, if all RAID disk are complete (needed numbers of disks/partitions were added).
**returns true, if all requirements for building all RAIDs are met.
**/
	protected function areAllRaidsComplete()
	{
		for ($vDisk = 0; $vDisk < $this->getDiskAmount(); $vDisk++)
			if (!$this->isRaidComplete($vDisk))
				return(false);

		return(true);
	}





/**
**name CFDiskIO::getRaidDevsBuildingDiskAmount($vrDisk)
**description Returns the amount of the devices building the RAID.
**parameter vrDisk: Virtual (internally used) RAID disk number.
**returns Amount of the devices building the RAID.
**/
	protected function getRaidDevsBuildingDiskAmount($vrDisk)
	{
		return(count($this->getRaidDevsBuildingDisk($vrDisk)));
	}





/**
**name CFDiskIO::setRaidLevel($vrDisk, $level)
**description Sets the RAID level on a new RAID disk.
**parameter vrDisk: Virtual (internally used) disk number.
**parameter level: RAID level number.
**returns true, if the RAID level is valid, otherwise false.
**/
	protected function setRaidLevel($vrDisk, $level)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Check, if the given device string is suitable for a RAID device (/dev/mdX)
		if (!$this->isRaidLevelNumberValid($level))
		{
			$this->addErrorMessage($I18N_error_raid_level_invalid);
			return(false);
		}

		$this->wantedPartitioning[$vrDisk]['raidLevel'] = $level;

		return(true);
	}





/**
**name CFDiskIO::getDiskSize($vrDisk)
**description Returns the RAID level of RAID disk.
**parameter vrDisk: Internal disk number (for accessing the disk information in the array).
**returns RAID level or false, if it is not a RAID.
**/
	protected function getRaidLevel($vrDisk)
	{
		return($this->fdiskGetProperty($this->wantedPartitioning[$vrDisk]['raidLevel'], 'ERROR: $this->wantedPartitioning['.$vrDisk.'][\'raidLevel\'] not set.'));
	}





/**
**name CFDiskIO::virtualCreateRaidDisk($dev, $level)
**description Creates a new RAID disk.
**parameter dev: Device name for the RAID (eg. /dev/md0)
**parameter level: RAID level.
**returns Virtual RAID disk number, if the device string is suitable for a RAID, otherwise false.
**/
	public function virtualCreateRaidDisk($dev, $level)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Check, if the given device string is suitable for a RAID device (/dev/mdX)
		if (!$this->isDevRaid($dev))
		{
			$this->addErrorMessage($I18N_error_raid_device_name);
			return(false);
		}

		// Check, if the given device string is suitable for a RAID device (/dev/mdX)
		if (!$this->isRaidLevelNumberValid($level))
		{
			$this->addErrorMessage($I18N_error_raid_level_invalid);
			return(false);
		}

		// Add a new virtual RAID disk
		$vrDisk = $this->virtualAddDisk($dev, 0);

// 		print("virtualCreateRaidDisk(vrDisk: ".serialize($vrDisk).", dev: $dev)\n");
// 		print_r($this->wantedPartitioning[$vrDisk]);

		// Set the RAID level
		if (!$this->hasErrors())
			$this->setRaidLevel($vrDisk, $level);
		else
		{
// 			print("ERR: setRaidLevel2($vrDisk, $level)\n");
// 			$this->showMessages();
			return(false);
		}
		
// 		print_r($this->wantedPartitioning[$vrDisk]);

		if ($this->hasErrors())
			return(false);
		else
			return($vrDisk);
	}





/**
**name CFDiskIO::virtualDeleteRaidDisk($dev)
**description Deletes a RAID disk and removes the RAID locks from all devices building it.
**parameter dev: Device name for the RAID (eg. /dev/md0)
**returns Virtual RAID disk number, if the device string is suitable for a RAID, otherwise false.
**/
	public function virtualDeleteRaidDisk($dev)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Check, if the given device string is suitable for a RAID device (/dev/mdX)
		if (!$this->isDevRaid($dev))
		{
			$this->addErrorMessage($I18N_error_raid_device_name);
			return(false);
		}

		$this->dev2VDiskVPart($dev, $vrDisk, $vPart);

		// Check, if the given device string is a RAID
		if (!$this->isDiskRaid($vrDisk))
		{
			$this->addErrorMessage($I18N_error_no_virtual_raid_disk_number);
			return(false);
		}
		
		$this->virtualDeleteDisk($vrDisk);

		if ($this->hasErrors())
			return(false);
		else
			return($vrDisk);
	}





/**
**name CFDiskIO::getDrivesAndPartitions($devFilter = false, $addSizesAndTypes = true, $filterOutSetRaidLvmLock = false)
**description Generates an array that contains all disks and partitions of a given client with the disk devices as keys and the information as values.
**parameter devFilter: Set this to another value than false if you want only devices with a given string in it. If you add an "!" the beginning all is given out that doesn't contains the filter string (without the "!").
**parameter addSizesAndTypes: If set to true, the array will contain the sizes, filesystems and types of the partitions and drives.
**parameter filterOutSetRaidLvmLock: If set to true, drives and partitions with set raidLvmLock will not be listed.
**returns Array with drives and partitions and (optionally) their sizes, filesystems and types.
**/
	public function getDrivesAndPartitions($devFilter = false, $addSizesAndTypes = true, $filterOutSetRaidLvmLock = false)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
		$list = array();

		//check if there is an "!" in the filter. this means the filter should be inverted
		$invertFilter = (!($devFilter === false) && (!(strpos($devFilter,"!") === false)));
		if ($invertFilter)
			$devFilter = trim($devFilter,"!");

		for ($vDisk=0; $vDisk < $this->getDiskAmount(); $vDisk++)
		{
			// Get the device string of the current disk
			$diskDev = $this->getDiskDev($vDisk);

			// Check if the current device string matches the filter and should be sorted out
			if ($invertFilter xor (!($devFilter === false) && (strpos($diskDev,$devFilter) === false)))
				continue;

			// Filter out disks with set raidLvmLock, if choosen
			if ($filterOutSetRaidLvmLock && $this->isDiskLockedByRaid($vDisk))
				continue;

			// Add the disk (e.g. /dev/hda) and add size (if choosen only)
			$list[$diskDev] = $diskDev.($addSizesAndTypes ? " $I18N_size:".$this->getDiskSize($vDisk) : '');

			//If it is a RAID, don't add the partitions that don't exist on RAIDs
			if ($this->isDevRaid($diskDev))
				continue;

			// Run thru the virtual partition numbers
			for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
			{
				// Filter out partitions with set raidLvmLock, if choosen
				if ($filterOutSetRaidLvmLock && $this->isPartitionLockedByRaid($vDisk, $vPart))
					continue;

				$partDev = $this->getPartitionDev($vDisk, $vPart);
				
				$fileSystem = $this->getPartitionFileSystem($vDisk, $vPart);
				if (-1 == $fileSystem)
					$fileSystem = $I18N_filesystem_none;
	
				// Give out device name (/dev/sda1, /dev/sda2, ...), size, fs, partition type (primary, extended, logical, efi)
				$list[$partDev] = $partDev.($addSizesAndTypes ? " $I18N_size: ".$this->getPartitionSize($vDisk, $vPart)." $I18N_filesystem: $fileSystem $I18N_type: ".$this->getPartitionType($vDisk, $vPart) : '');
			}
		}

		return($list);
	}





/**
**name CFDiskIO::getUnusedMDs()
**description Returns an associative array with the unused MDs (e.g. /dev/md0, /dev/md1, ...) as key and value.
**returns Associative array with the unused MDs (e.g. /dev/md0, /dev/md1, ...) as key and value.
**/
	public function getUnusedMDs()
	{
		//Get all currently used MDs
		$usedMDs = $this->getUsedMDs();

		if (!is_array($usedMDs))
			$usedMDs = array( "" => "");

		//create array with multi devices md0 - md15
		for ($nr=0; $nr <= 15; $nr++)
			$possibleMDs["/dev/md$nr"] = "/dev/md$nr";
	
		//Remove all used MDs from the possible devices
		$mdArr = array_diff_key($possibleMDs, $usedMDs);
	
		return($mdArr);
	}





/**
**name CFDiskIO::getUnusedDiskDev()
**description Returns an associative array with the unused device names (e.g. /dev/sda, /dev/sdb, ...) as key and value.
**returns Associative array with the unused device names (e.g. /dev/sda, /dev/sdb, ...) as key and value.
**/
	public function getUnusedDiskDev()
	{
		//Get all currently used devices
		$usedDevs = $this->getDiskDevs();

		if (!is_array($usedDevs))
			$usedDevs = array( "" => "");

		//create array with disk devices sda - sdz
		for ($nr = ord('a'); $nr <= ord('z'); $nr++)
			$possibleDevs['/dev/sd'.chr($nr)] = '/dev/sd'.chr($nr);
	
		//Remove all used devices from the possible devices
		$devArr = array_diff_key($possibleDevs, $usedDevs);
	
		return($devArr);
	}





/**
**name CFDiskIO::getUsedMDs()
**description Returns an associative array with the used MDs (e.g. /dev/md0, /dev/md1, ...) as key and value.
**returns Associative array with the unused MDs (e.g. /dev/md0, /dev/md1, ...) as key and value.
**/
	public function getUsedMDs()
	{
		//Get all currently used MDs
		return($this->getDrivesAndPartitions('/dev/md', false));
	}





/**
**name CFDiskIO::getPartDevs($vDisk, $excludeType, $includeTypes = array())
**description Returns an array with the partitions (/dev/hda1, /dev/hda2, ...) of a disk or all disks.
**parameter vDisk: Virtual (internally used) device number or -1, if all partitions on all devices should be listed.
**parameter excludeType: type of partitions, not to return.
**parameter includeTypes: Array with types of partitions, to return.
**returns Array with matching partitions.
**/
	function getPartDevs($vDisk, $excludeType, $includeTypes = array())
	{
		//If the device number is -1, all partitions on all devices should be listed
		if ($vDisk == -1)
		{
			$onlyOneDev = false;

			// Start with vDev = 0
			$vDiskStart = 0;

			// End with the disk amount - 1
			$vDiskEnd = $this->getDiskAmount();
		}
		else
		{
			$onlyOneDev = true;
			$vDiskStart = $vDisk;
			$vDiskEnd = $vDisk;
		}

		$lNr = 0;

		//Run thru the drive(s)
		for ($vDisk = $vDiskStart; $vDisk < $vDiskEnd; $vDisk++)
		{
			// No partition can be formated, if the whole drive is used for the RAID
			if ($this->isDiskLockedByRaid($vDisk) && $onlyOneDev)
			{
				// Don't destroy the list of partitions, if we have a RAID and want all partitions on all drives
				if ($onlyOneDev)
					$list = array();
			}
			else
			{
				// Check if we have a RAID
				if (!$this->isDiskRaid($vDisk))
				{
					// No, we haven't a RAID
					for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
						if (($this->getPartitionFileSystem($vDisk, $vPart) != $excludeType) && ((0 == count($includeTypes)) || (in_array( $this->getPartitionFileSystem($vDisk, $vPart), $includeTypes))))
						{
							// Check each partition if it isn't used for a RAID and list it too, if all drives should be scanned
							if ((! $this->isDiskOrPartLockedByRaid($vDisk, $vPart)) || (!$onlyOneDev))
								$list[$lNr++] = $this->getPartitionDev($vDisk, $vPart);
						}
				}
				else
				{
					// Yes, we have a RAID => add it as the only "partition"
					if ($onlyOneDev)
						$list[0] = $this->getDiskDev($vDisk);
					else
						$list[$lNr++] = $this->getDiskDev($vDisk);
				}
			}
		}

		if (is_array($list))
			sort($list);
		else
			return(array());

		return($list);
	}





/**
**name CFDiskIO::getNotFS()
**description Generates and returns an array with the list of not file systems (free space or unformated partitions).
**returns Associative array with the list of not file systems as key and value.
**/
	public function getNotFS()
	{
		$list = array();
		$list[-1] = -1;
		$list[CFDiskIO::PT_FREE] = CFDiskIO::PT_FREE;
		$list[CFDiskIO::PT_EXTFREE] = CFDiskIO::PT_EXTFREE;
		return($list);
	}





/**
**name CFDiskIO::getSupportedFS()
**description Generates and returns an array with the list of supported file systems.
**returns Associative array with the list of supported file systems as key and value.
**/
	public function getSupportedFS()
	{
		$list = array();
		$list['ext2'] = 'ext2';
		$list['ext3'] = 'ext3';
		$list['ext4'] = 'ext4';
		$list['linux-swap'] = 'linux-swap';
		$list['reiserfs'] = 'reiserfs';
		return($list);
	}





/**
**name CFDiskIO::swapFilesystems()
**description Returns an array with the filesystems usable for swapping.
**returns Array with the filesystems usable for swapping.
**/
	public function swapFilesystems()
	{
		$T_SELSWAPPART = array();
		$T_SELSWAPPART[0]="linux-swap";
		$T_SELSWAPPART[1]="linux-swap(new)";
		$T_SELSWAPPART[2]="linux-swap(v1)";

		return($T_SELSWAPPART);
	}





/**
**name CFDiskIO::installFilesystems()
**description Returns an array with the filesystems usable for installation.
**returns Array with the filesystems usable for installation.
**/
	public function installFilesystems()
	{
		$T_SELINSTPART[0]="ext2";
		$T_SELINSTPART[1]="ext3";
		$T_SELINSTPART[2]="ext4";
		$T_SELINSTPART[3]="reiserfs";

		return($T_SELINSTPART);
	}





/**
**name CFDiskIO::fdiskAddFstab($dev, $mountpoint, $parameter)
**description Adds a new entry to the fstab array.
**parameter dev: Device to mount (e.g. /dev/hda1)
**parameter mountpoint: Location where to mount the device (e.g. /mnt/hda1)
**parameter parameter: Mount parameter.
**returns true, if the input parameter are valid, otherwise false.
**/
	public function fdiskAddFstab($dev, $mountpoint, $parameter)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		$allOk = true;

		// Check, if the device to mount and the mount point are valid
		$allOk &= $this->checkMountDev($dev);
		$allOk &= $this->checkMountPoint($mountpoint);

		// Exit here, if there were errors
		if (!$allOk)
			return(false);

		// Check, if there is already an entry for the given device
		if (isset($this->fstab[$dev]))
		{
			$this->addErrorMessage($I18N_fstabEntryForTheDeviceExists);
			return(false);
		}

		// Add the entry
		$this->fstab[$dev]['dev'] = $dev;
		$this->fstab[$dev]['mnt'] = $mountpoint;
		$this->fstab[$dev]['param'] = $parameter;

		return(true);
	}





/**
**name CFDiskIO::fdiskAddFstab($dev, $mountpoint, $parameter)
**description Gets an entry to from the fstab array. Can be called more times to get all entries.
**parameter dev: Device to mount (e.g. /dev/hda1)
**parameter mountpoint: Location where to mount the device (e.g. /mnt/hda1)
**parameter parameter: Mount parameter.
**returns true, if an entry to from the fstab array could be fetched from the array, otherwise false.
**/
	public function fdiskGetEntry(&$dev, &$mountpoint, &$parameter)
	{
		$cur = each($this->fstab);

		// Is the array pointer at the end of the array?
		if ($cur === false)
		{
			reset($this->fstab);
			return(false);
		}

		// Write the current array variables to the parameter pointer
		$dev = $cur['value']['dev'];
		$mountpoint = $cur['value']['mnt'];
		$parameter = $cur['value']['param'];

		// Another entry could be 
		return(true);
	}





/**
**name CFDiskIO::fdiskDelFstabEntry($dev)
**description Removes an entry from the fstab array.
**parameter dev: Device to mount (e.g. /dev/hda1)
**returns true, if the entry could be found, otherwise false.
**/
	public function fdiskDelFstabEntry($dev)
	{
		// Check, if there is already an entry for the given device
		if (isset($this->fstab[$dev]))
		{
			unset($this->fstab[$dev]);
			return(true);
		}

		return(false);
	}





/**
**name CFDiskIO::adjustFstabParam($param, $sourceName)
**description Adjusts the parameter block of a fstab line to make it use an supported FS.
**parameter param: The parameter block of a fstab line
**parameter sourceName: The name of the package source list
**returns Adjust the parameter block of a fstab line
**/
	private function adjustFstabParam($param, $sourceName)
	{
		//Get the file system from the fstab parameters
		$fsOld = strtok($param, " ");
	
		//Get the rest (without FS) of the parameter line
		$param = substr($param, strlen($fsOld));
	
		//Check if the FS must be changed
		$fsNew = SRCLST_getStorageFS($fsOld, $sourceName);
	
		//Return a parameter line with adjusted FS
		return("$fsNew$param");
	}





/**
**name CFDiskIO::genManualFstab($fstab, $mntPrefix, $sourceName)
**description Generates commands to edit a given fstab, add new entries and remove old ones before.
**parameter mntPrefix: Prefix to set before the mountpoint (e.g. /mnt/m23root/)
**parameter sourceName: Name of the client's sources list.
**returns true, if fstab data in new format is used on the client, otherwise false.
**/
	public function genManualFstab($mntPrefix, $sourceName = false)
	{
		if ($sourceName === false)
			$sourceName = $this->getSourcesList();

		$clientOptions = CLIENT_getAllAskingOptions();

		// Check, if there is the old fstab entry in the client's options
		if (isset($clientOptions['fstab']))
		{
			// Check, if it is a valid array
			$fstabArray = @explodeAssoc("###",$clientOptions['fstab']);
			if (is_array($fstabArray))
			{
				if ($this->isHalfSisterClient())
					HS_sysAddFstabEntries($fstabArray, $sourceName);
				else
					// Generate the fstab with old data
					$this->FDISK_genManualFstab($fstabArray, $mntPrefix, $sourceName);

				return(false);
			}
		}

		if ($this->isHalfSisterClient())
			HS_sysAddFstabEntries($this->FDISK_getOldStyleFstabArrayForHalfSister(), $sourceName);
		else
		{
			$out = "";

			while ($this->fdiskGetEntry($dev, $mountpoint, $parameter))
			{
				$parameter = $this->adjustFstabParam($parameter, $sourceName);
	
				$out .= EDIT_deleteMatching("/etc/fstab", "^$dev"."[ \t]")."
						echo \"$dev $mntPrefix$mountpoint $parameter\" >> /etc/fstab
						mkdir -p $mntPrefix$mountpoint
						chmod 777 $mntPrefix$mountpoint
						mount $mntPrefix$mountpoint
						";
			}
	
			echo($out);
		}

		return(true);
	}





/**
**name CFDiskIO::FDISK_getOldStyleFstabArrayForHalfSister()
**description Gets the fstab entries in the old style array format that is used by HS_sysAddFstabEntries.
**returns Fstab entries in the old style array format.
**/
	private function FDISK_getOldStyleFstabArrayForHalfSister()
	{
		$fstabNr = 0;
		$fstab = array();

		while ($this->fdiskGetEntry($dev, $mountpoint, $parameter))
		{
			$fstab["fstab_dev$fstabNr"] = $dev;
			$fstab["fstab_mnt$fstabNr"] = $mountpoint;
			$fstab["fstab_param$fstabNr"] = $parameter;
			$fstabNr++;
		}

		$fstab['fstab_amount'] = $fstabNr;

		return($fstab);
	}





/**
**name CFDiskIO::FDISK_genManualFstab($fstab, $mntPrefix, $sourceName)
**description Generates commands to edit a given fstab, add new entries and remove old ones before.
**parameter fstab: Array with the fstab entries.
**parameter mntPrefix: Prefix to set before the mountpoint (e.g. /mnt/m23root/)
**parameter sourceName: The name of the package source list
**/
	private function FDISK_genManualFstab($fstab, $mntPrefix, $sourceName)
	{
		$out = "";

		$fstabAmount = isset($fstab['fstab_amount']) ? $fstab['fstab_amount'] : 0;

		for ($fstabNr = 0; $fstabNr < $fstabAmount; $fstabNr++)
		{
			$param = $this->adjustFstabParam($fstab["fstab_param$fstabNr"], $sourceName);

			$out .= EDIT_deleteMatching("/etc/fstab","^".$fstab["fstab_dev$fstabNr"]."[ \t]").
					"echo \"".$fstab["fstab_dev$fstabNr"]." $mntPrefix".$fstab["fstab_mnt$fstabNr"]." ".$param."\" >> /etc/fstab
					mkdir -p $mntPrefix".$fstab["fstab_mnt$fstabNr"]."
					chmod 777 $mntPrefix".$fstab["fstab_mnt$fstabNr"]."
					mount $mntPrefix".$fstab["fstab_mnt$fstabNr"]."
					";
		}

		echo($out);
	}





/**
**name CFDiskIO::fdiskGetFstabArray()
**description Gets the fstab of a client as array.
**returns Array with the fstab (each line of the fstab as item).
**/
	public function fdiskGetFstabArray()
	{
		return($this->fstab);
	}





/**
**name CFDiskIO::getPartitionStepsArray()
**description Gets the partitionSteps array of a client.
**returns Array with the fstab (each line of the fstab as item).
**/
	public function getPartitionStepsArray()
	{
		return($this->partitionSteps);
	}





/**
**name CFDiskIO::findFstabMountPointByDev($dev)
**description Searches a client's fstab for a device and figures out the according mountpoint.
**parameter fstabA: The fstab as array.
**parameter dev: The device.
**returns Mountpoint for the device or false, if there is no matching.
**/
	public function findFstabMountPointByDev($dev)
	{
		// If there are no entries => false
		if (!is_array($this->fstab))
			return(false);

		// Check, if there is an entry for the given device
		if (isset($this->fstab[$dev]))
			return($this->fstab[$dev]['mnt']);

		// Nothing found? => false
		return(false);
	}





/**
**name CFDiskIO::getPrimaryOrEfiPartitionType()
**description Returns a primary (on BIOS booted systems) partition type or an EFI (on UEFI booted systems).
**returns Primary (on BIOS booted systems) or an EFI (on UEFI booted systems).
**/
	public function getPrimaryOrEfiPartitionType()
	{
		if ($this->isUEFIActive())
			return(CFDiskIO::PT_EFI);
		else
			return(CFDiskIO::PT_PRIMARY);
	}





/**
**name CFDiskIO::changeToEfiPartitionTypeIfInUefiMode(&$var)
**description Changes a given primary partition type to an EFI partition type on UEFI booted systems.
**parameter var: Variable with the contents that may be changed.
**returns The maybe unchanged type for isFreeSpaceBetween.
**/
	public function changeToEfiPartitionTypeIfInUefiMode(&$partType)
	{
		$unchangedPartType = $partType;
	
		// There are no primary partitions on UEFI systems => EFI part for all usages
		if ($this->isUEFIActive() && (CFDiskIO::PT_PRIMARY == $partType))
		{
			$partType = CFDiskIO::PT_EFI;
			return(CFDiskIO::PT_EFI);
		}

		// If it is an EFI boot partition =>  EFI part for all but isFreeSpaceBetween (there it remains EFI boot partition)
		elseif ( CFDiskIO::PT_EFIBOOT == $partType)
			$partType = CFDiskIO::PT_EFI;

		return($unchangedPartType);
	}





	public function showWantedPartitioning()
	{
		print('<h1>Partitionierung</h1><pre>');
		var_dump($this->wantedPartitioning);
		print('</pre>');
	}




	public function showPartitionSteps()
	{
		print('<h1>Partitionsaufträge</h1><pre>');
		print_r($this->partitionSteps);
		print('</pre>');
	}


}
?>