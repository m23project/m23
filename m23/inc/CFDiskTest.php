<?
	if (!isset($GLOBALS["m23_language"]))
		$GLOBALS['m23_language'] = 'de';

	include('/m23/inc/checks.php');
	include('/m23/inc/db.php');
	include('/m23/inc/fdisk.php');
	include('/m23/inc/remotevar.php');
	include('/m23/inc/client.php');
	include('/m23/inc/distr.php');
	include('/m23/inc/sourceslist.php');
	include_once('/m23/inc/html.php');
	include_once('/m23/inc/message.php');
	include_once('/m23/inc/messageReceive.php');
	include('/m23/inc/packages.php');
	include_once('/m23/inc/capture.php');
	include_once('/m23/inc/helper.php');
	include_once('/m23/inc/update.php');
	include_once('/m23/inc/edit.php');
	include_once('/m23/inc/dhcp.php');
	include_once('/m23/inc/ldap.php');
	include_once('/m23/inc/assimilate.php');
	include_once('/m23/inc/i18n.php');
	include_once('/m23/inc/server.php');
	include_once('/m23/inc/raidlvm.php');
	include_once("/m23/inc/halfSister.php");
	include_once('/m23/inc/CMessageManager.php');
	include_once('/m23/inc/CChecks.php');
	include_once('/m23/inc/vm.php');
	include_once('/m23/inc/groups.php');
	include_once('/m23/inc/bittorrent.php');
	include_once('/m23/inc/CClient.php');
	include_once('/m23/inc/CFDiskBasic.php');

	dbConnect();


class CFDiskTest extends CFDiskBasic
{
	private $diffConsistency = array(), $virtualConsistency = array(), $testDiskDev = NULL, $testDiskDevArray = NULL, $replayFile = '', $replayFileFP , $replayRunning = false;


	public function __construct($clientName, $dev, $replayFile = '')
	{
		@parent::__construct($clientName);

		// Are more than one disk given?
		if (is_array($dev))
		{
			$this->testDiskDevArray = $dev;
			$this->testDiskDev = $dev[0];
		}
		else
			$this->testDiskDev = $dev;

		// Check, if an existing replay file is given
		if (file_exists($replayFile))
		{
			$this->replayFile = $replayFile;
			$this->replayRunning = true;
			$this->replayFileFP = fopen($replayFile, 'r');
		}
		else
			$this->replayFile = strftime('/tmp/CFDiskTest-%Y-%H-%M-%S.replay');
	}


	function __destruct()
	{
		// Try to close the maybe opened replay file
		@fclose($this->replayFileFP);
	}





/**
**name CFDiskTest::getTestDiskDev()
**description Gets the disk device that is used for testing.
**returns Disk device that is used for testing.
**/
	private function getTestDiskDev()
	{
		return($this->fdiskGetProperty($this->testDiskDev, 'ERROR: $this->testDiskDev not set.'));
	}





/**
**name CFDiskTest::nextTurn()
**description Is called at the beginning of the next testing turn. Chooses a disk for testing, if there are more disks given.
**returns true, if there are more disks for testing and a new disk could be chosen.
**/
	private function nextTurn()
	{
		if ($this->testDiskDevArray === NULL)
			return(false);

		$randPost = $this->rand(0, count($this->testDiskDevArray) - 1);
		$this->testDiskDev = $this->testDiskDevArray[$randPost];
		return(true);
	}





/**
**name CFDiskTest::addLineToReplay($line)
**description Adds a line to the run log file.
**parameter line: The line to add.
**returns true on sucessfully writing the line, otherwise false.
**/
	private function addLineToReplay($line)
	{
		return(false !== file_put_contents($this->replayFile, "$line\n", FILE_APPEND));
	}
	
	private function getNextReplayLine()
	{
		$line = fgets($this->replayFileFP);
		
		if ($line === false)
			return(false);
		else
			return(trim($line));
	}





/**
**name CFDiskTest::rand($min, $max)
**description Reads a random value from the replay file, if in replay mode or puts a calculated random value to the replay file.
**parameter min: Minimal random value to generate.
**parameter max: Maximal random value to generate.
**returns Calculated random value or value read from the replay file.
**/
	private function rand($min, $max)
	{
		if ($this->replayRunning && ($line = $this->getNextReplayLine()))
			return($line);
		else
		{
			$rand = rand($min, $max);
			$this->addLineToReplay($rand);
			return($rand);
		}
	}





/**
**name CFDiskTest::getTestDiskvDisk()
**description Gets the vDisk for the testing fisk.
**returns vDisk for the testing fisk.
**/
	private function getTestDiskvDisk()
	{
		$this->dev2VDiskVPart($this->getTestDiskDev(), $vDisk, $vPart);
		return($vDisk);
	}





/**
**name CFDiskTest::getRandomPartitionDev()
**description Gets the a random device string for a partition on the test disk.
**returns Random device string for a partition on the test disk.
**/
	private function getRandomPartitionDev()
	{
		// Get vDisk of the test disk
		$vDisk = $this->getTestDiskvDisk();

		if ($this->getPartAmount($vDisk) == 0)
			return(false);

		// Get a random vPart on the test disk
		$vPart = $this->rand(0, $this->getPartAmount($vDisk) - 1);

		// Build a partition device string
		return($this->getTestDiskDev().$this->getPartitionNumber($vDisk, $vPart));
	}





/**
**name CFDiskTest::getRadomStartEnd(&$start, &$end)
**description Gets random start / end positions (in MB) for e.g. creating new partitions on the test disk.
**/
	private function getRadomStartEnd(&$start, &$end, $type)
	{
		$vDisk = $this->getTestDiskvDisk();

		// Get the size of the disk
		$diskSize = $this->getDiskSize($vDisk);

		if (CFDiskIO::PT_LOGICAL == $type)
		{
			$vPart = $this->getExtendedVPart($vDisk);

			// If there is no extended partition => choose illegal values
			if ($vPart === false)
			{
				$searchStart = 0;
				$minSize = 2048;
				$searchEnd = $diskSize;
			}
			else
			{
			// Make sure the partition's position will be within the extended partition
				$searchStart = $this->getPartitionStart($vDisk, $vPart);
				$minSize = 1024;
				$searchEnd = $this->getPartitionEnd($vDisk, $vPart);
			}
		}
		elseif (CFDiskIO::PT_PRIMARY == $type)
		{
			// Calculate the start position between 0 and a buffer of 2048 MB from the end of the disk
			$searchStart = 0;
			$minSize = 2048;
			$searchEnd = $diskSize;
		}
		elseif (CFDiskIO::PT_EXTENDED == $type)
		{
			// Calculate the start position between 0 and a buffer of 2048 MB from the end of the disk
			$searchStart = 0;
			$minSize = 4096;
			$searchEnd = $diskSize;
		}

		// Calculate the start position
		$start = $this->rand($searchStart, $searchEnd - $minSize);
		// Calculate the end position
		$end = $this->rand($start, $searchEnd);
	}





/**
**name CFDiskTest::checkBothSetKey($key)
**description Checks if a key exists in virtual calculation and actual client partitioning.
**parameter key: The key to check for.
**returns true if the key exists in both arrays.
**/
	private function checkBothSetKey($key)
	{
		// Check, if the keys are set
		$vIsSet = isset($this->virtualConsistency[$key]);
		$cIsSet = isset($this->clientConsistency[$key]);
	
		// Are both set?
		return ($vIsSet && $cIsSet);
	}





/**
**name CFDiskTest::checkConsistencyDiskKey($vDisk, $key, $bothUnsetAllowed = false, $tolerance = 0)
**description Checks for consistancy of $vDisk keys between virtual calculation and actual client partitioning. Differences will be inserted into $this->diffConsistency.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter key: The key to check for.
**parameter bothUnsetAllowed: Set to true, if both values may be unset (used for the loop).
**parameter tolerance: Maximal allowerd difference between the (numeric) values.
**returns true if virtual calculation and actual client value are equal and both present, otherwise false.
**/
	private function checkConsistencyDiskKey($vDisk, $key, $bothUnsetAllowed = false, $tolerance = 0)
	{
		// Check, if the keys are set
		$vIsSet = isset($this->virtualConsistency[$vDisk][$key]);
		$cIsSet = isset($this->clientConsistency[$vDisk][$key]);
		
		if ($bothUnsetAllowed && !$vIsSet && !$cIsSet)
			return(false);

		if (is_array($this->virtualConsistency[$vDisk][$key]) && is_array($this->clientConsistency[$vDisk][$key]))
			return(true);

		// Are both set?
		if ($vIsSet && $cIsSet)
		{
			if (is_numeric($this->virtualConsistency[$vDisk][$key]) && is_numeric($this->clientConsistency[$vDisk][$key]))
				$equal = abs($this->virtualConsistency[$vDisk][$key] - $this->clientConsistency[$vDisk][$key]) <= $tolerance;
			else
				$equal = $this->virtualConsistency[$vDisk][$key] == $this->clientConsistency[$vDisk][$key];
		
			// Are the values consistent?
			if (!$equal)
			{
				$this->diffConsistency[$vDisk][$key] = "\$this->virtualConsistency[$vDisk][$key] (".$this->virtualConsistency[$vDisk][$key]." / ".$this->virtualConsistency[$vDisk]['dev'].") != \$this->clientConsistency[$vDisk][$key] (".$this->clientConsistency[$vDisk][$key]." / ".$this->clientConsistency[$vDisk]['dev'].")";

				$this->showDebugConsistencyClientVirtualArray('checkConsistencyDiskKey');

				return(false);
			}

			return(true);
		}
		// Is only the client value set?
		elseif ($cIsSet)
			$this->diffConsistency[$vDisk][$key] = "\$this->virtualConsistency[$vDisk][$key] not set, \$this->clientConsistency[$vDisk][$key] (".$this->clientConsistency[$vDisk][$key].")";
		// Is only the virtual value set?
		elseif ($vIsSet)
			$this->diffConsistency[$vDisk][$key] = "\$this->clientConsistency[$vDisk][$key] not set, \$this->virtualConsistency[$vDisk][$key] (".$this->virtualConsistency[$vDisk][$key].")";
		// Is no value set?
		else
			$this->diffConsistency[$vDisk][$key] = "\$this->virtualConsistency[$vDisk][$key] AND \$this->clientConsistency[$vDisk][$key] not set";

		$this->showDebugConsistencyClientVirtualArray('checkConsistencyDiskKey2');

		return(false);
	}





/**
**name CFDiskTest::checkConsistencyvDiskvPartKey($vDisk, $vPart, $key, $tolerance = 0)
**description Checks for consistancy of $vDisk and $vPart keys between virtual calculation and actual client partitioning. Differences will be inserted into $this->diffConsistency.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter vPart: Internal partition number in a disk (for accessing the disk information in the array).
**parameter key: The key to check for.
**parameter tolerance: Maximal allowerd difference between the (numeric) values.
**returns true if virtual calculation and actual client value are equal and both present, otherwise false.
**/
	private function checkConsistencyvDiskvPartKey($vDisk, $vPart, $key, $tolerance = 0)
	{
		// Check, if the keys are set
		$vIsSet = isset($this->virtualConsistency[$vDisk][$vPart][$key]);
		$cIsSet = isset($this->clientConsistency[$vDisk][$vPart][$key]);
	
		// Are both set?
		if ($vIsSet && $cIsSet)
		{
			// Allow empty file system on the virtual side as equal to -1 on the client's side
			if (('fs' == $key) && (empty($this->virtualConsistency[$vDisk][$vPart][$key])) && (-1 == $this->clientConsistency[$vDisk][$vPart][$key]))
				return(true);
		
			// Is the difference between the (numeric) values in the tolerance?
			if (is_numeric($this->virtualConsistency[$vDisk][$vPart][$key]) && is_numeric($this->clientConsistency[$vDisk][$vPart][$key]))
				$equal = abs($this->virtualConsistency[$vDisk][$vPart][$key] - $this->clientConsistency[$vDisk][$vPart][$key]) <= $tolerance;
			else
			// Are the first 10 characters equal
				$equal = (0 == strncmp ($this->virtualConsistency[$vDisk][$vPart][$key], $this->clientConsistency[$vDisk][$vPart][$key], 10));

			// Are the values consistent?
			if (!$equal)
			{
				$this->diffConsistency[$vDisk][$vPart][$key] = "\$this->virtualConsistency[$vDisk][$vPart][$key] (".$this->virtualConsistency[$vDisk][$vPart][$key]." / ".$this->virtualConsistency[$vDisk][$vPart]['nr'].") != \$this->clientConsistency[$vDisk][$vPart][$key] (".$this->clientConsistency[$vDisk][$vPart][$key]." / ".$this->clientConsistency[$vDisk][$vPart]['nr'].")";

				$this->showDebugConsistencyClientVirtualArray('checkConsistencyvDiskvPartKey');

				return(false);
			}

			return(true);
		}
		// Is only the client value set?
		elseif ($cIsSet)
			$this->diffConsistency[$vDisk][$vPart][$key] = "\$this->virtualConsistency[$vDisk][$vPart][$key] not set, \$this->clientConsistency[$vDisk][$vPart][$key] (".$this->clientConsistency[$vDisk][$vPart][$key].")";
		// Is only the virtual value set?
		elseif ($vIsSet)
			$this->diffConsistency[$vDisk][$vPart][$key] = "\$this->clientConsistency[$vDisk][$vPart][$key] not set, \$this->virtualConsistency[$vDisk][$vPart][$key] (".$this->virtualConsistency[$vDisk][$vPart][$key].")";
		// Is no value set?
		else
			$this->diffConsistency[$vDisk][$vPart][$key] = "\$this->virtualConsistency[$vDisk][$vPart][$key] AND \$this->clientConsistency[$vDisk][$vPart][$key] not set";

		$this->showDebugConsistencyClientVirtualArray('checkConsistencyvDiskvPartKey');

		return(false);
	}





/**
**name CFDiskTest::checkPartitionConsistency()
**description Checks for consistancy of the partioning between virtual calculation and actual client partitioning. Exists the script, if it is not consistent.
**/
	public function checkPartitionConsistency()
	{
		$this->showMessages();
		$this->deleteAllMessages();
	
		// Get the virtual partitioning and the actual client partitioning
		$this->virtualConsistency = CFDiskIO::sortDiskKeyByDev($this->getWantedPartitioning());
		$this->clientConsistency = CFDiskIO::sortDiskKeyByDev($this->getDiskArrayFromClient());

		$vDisk = 0;
		$this->diffConsistency = array();
		
		while ($this->checkBothSetKey($vDisk))
		{
			$this->checkConsistencyDiskKey($vDisk, 'dev');
			$this->checkConsistencyDiskKey($vDisk, 'size', false, 500);

			$vPart = 0;

			while ($this->checkConsistencyDiskKey($vDisk, $vPart, true))
			{
				$this->checkConsistencyvDiskvPartKey($vDisk, $vPart, 'nr');
				$this->checkConsistencyvDiskvPartKey($vDisk, $vPart, 'start', 5);
				$this->checkConsistencyvDiskvPartKey($vDisk, $vPart, 'end', 5);
				$this->checkConsistencyvDiskvPartKey($vDisk, $vPart, 'type');
				$this->checkConsistencyvDiskvPartKey($vDisk, $vPart, 'fs');

				$vPart++;
			}

			$vDisk++;
		}


		if (count($this->diffConsistency) === 0)
			echo("\nINFO: Partitioning is consistent :-)\n");
		else
		{
			echo("\nERROR: Partitioning is NOT consistent :-(\n");
			print_r($this->diffConsistency);
			exit(1);
		}
	}





/**
**name CFDiskTest::getDiskArrayFromClient()
**description Returns the disk array with all drives and their partitions.
**returns Disk array with all drives and their partitions.
**/
	public function getDiskArrayFromClient()
	{
		$vDisk = 0;
		$rDevs = $disks = array();

		foreach ($this->getDiskDevsFromClient() as $diskDevSize)
		{
			// The device of the disk (e.g. /dev/sda)
			$disks[$vDisk]['dev'] = $diskDevSize['dev'];
			// The size of the complete disk
			$disks[$vDisk]['size'] = $diskDevSize['size'];
			// Add the partitions
			$disks[$vDisk] = array_merge($disks[$vDisk], $this->getPartInfoFromClient($diskDevSize['dev']));

			$vDisk++;
		}

		// Add RAID devices
		$disks = array_merge($disks, $this->getRaidsFromClient($rDevs, $vDisk));

		// Lock the devices that build the RAID
		foreach ($rDevs as $rDev)
		{
			$this->getpDiskAndpPartFromDev($rDev, $pDisk, $pPart);
			
			foreach ($disks as $vDisk => $singleDisk)
			{
				// Check, if we found the disk with the device (whole disk or partition) that builds the RAID
				if ($singleDisk['dev'] == $pDisk)
				{
					// Check, if the whole disk is used for the RAID
					if ($pPart === false)
						$disks[$vDisk]['raidLvmLock'] = 1;
					else
						foreach ($singleDisk as $vPart => $singlePart)
						{
							// Check, if the key is numeric (this indicates information about one partition stored under the key and if the partition number is set and if it matches the partition number that should be locked.
							if (is_numeric($vPart) && isset($singlePart['nr']) && $singlePart['nr'] === $pPart)
								$disks[$vDisk][$vPart]['raidLvmLock'] = 1;
						}
				}
			}
		}

		return(CFDiskIO::sortDiskKeyByDev($disks));
	}





/**
**name CFDiskTest::getDiskDevsFromClient()
**description Returns an array with all disk devices (/dev/sdX) as key and value from the current client.
**returns Array with all disk devices (/dev/sdX) as key and value.
**/
	private function getDiskDevsFromClient()
	{
		// Build command to fetch all devices and the according sizes
		$cmds = "echo No | parted -m -l 2> /dev/null | grep \"dev\" | sed 's#Error: ##g' | sed -e '/Read-only file system/b1;b;:1 N;d' | cut -d':' -f1 | sed 's#[^a-z0-9A-Z/]##g' > /tmp/getDrives.list
		dmesg | grep '\* md[0-9].* configuration \*' | sed 's#[^md0-9]##g' | awk '{print(\"/dev/\"$0)}' >> /tmp/getDrives.list
		sort -u /tmp/getDrives.list | grep dev | while read dev
		do
			echo No | parted -m -s \"\$dev\" unit MB print | grep /
		done
		";
		$temp = @CLIENT_executeOnClientOrIP($this->getClientName(), 'getDiskDevs', $cmds, "root", false);
		
// 		print("getDiskDevsFromClient:\n$temp\n");

		$devs = array();
		$vDisk = 0;

		// Run thru the lines with devices and their sizes
		foreach (explode("\n", $temp) as $devSize)
		{
			if (!empty($devSize) && (strpos($devSize,'bash') === false))
			{
				// eg. $devSize = /dev/sda:4295MB:scsi:512:512:msdos:ATA VBOX HARDDISK;
				$devSize = explode(':', $devSize);

				// Filter out lines that do not contain a device string (e.g. RAIDs that have no partition table)
				if (strpos($devSize[0], '/dev/') === false)
					continue;

				// eg. $devs[$vDisk]['dev'] = /dev/sda
				$devs[$vDisk]['dev'] = $devSize[0];
				// eg. $devs[$vDisk]['size'] = 4295
				$devs[$vDisk++]['size'] = preg_replace('/[^0-9]/', '', $devSize[1]);
			}
		}

		return($devs);
	}





/**
**name CFDiskTest::getPartInfoFromClient($dev)
**description Fetches current partitioning and formating of the current client from a given disk.
**parameter dev: The disk device (e.g. /dev/sda).
**returns Array with current partitioning and formating of the current client from a given disk.
**/
	private function getPartInfoFromClient($dev)
	{
		$disk = array();
	
		$cmds = "echo No | parted '$dev' -s unit MB print | tr -s [:blank:] | sed 's/ /#/g' | sed 's/^#*//g' | grep ^[0-9] | sed 's/,[0-9]*MB//g' | sed 's/MB//g'";

		$temp = CLIENT_executeOnClientOrIP($this->getClientName(), 'getPartInfoFromClient', $cmds, "root", false);
		$lines = explode("\n", $temp);
		
// 		print("\ngetPartInfoFromClient:\n$temp\n");

		$vPart = 0;

		foreach ($lines as $line)
		{
			if (empty($line) || (strpos($line,'bash') !== false))
				continue;

			// Split the rows
			$line = preg_split("/[#]+/", $line);

			// Physical partition number
			$disk[$vPart]['nr'] = $line[0];

			// Begin of the partition in MB
			$disk[$vPart]['start'] = round($line[1]);

			// End of the partition in MB
			$disk[$vPart]['end'] = round($line[2]);

			// Type of the partition: CFDiskIO::PT_PRIMARY, CFDiskIO::PT_EXTENDED, CFDiskIO::PT_LOGICAL
			$disk[$vPart]['type'] = $line[4];

			// File system (e.g. ext3) if the partition is not an extended partition
			if (!isset($line[5]) || ($line[4] == CFDiskIO::PT_EXTENDED) || ('lba' == $line[5]))
				$disk[$vPart]['fs'] = -1;
			else
				$disk[$vPart]['fs'] = (isset($line[5]{1}) ? $line[5] : -1);

			$vPart++;
		}

		return($this->sortPartitionKeyByStart($disk));
	}





/**
**name CFDiskTest::getRaidsFromClient(&$rDevs, $vDisk)
**description Fetches current RAID information from the current client.
**parameter rDevs: Array to store the devices in that build the RAIDs.
**parameter vDisk: Last used vDisk number (from the calling function)
**returns Array with the current RAID information from the current client.
**/
	public function getRaidsFromClient(&$rDevs, &$vDisk)
	{
		$disk = array();

		// Build command to fetch all devices and the according sizes
		$cmds = "cat /proc/mdstat | grep ^md";
		$temp = @CLIENT_executeOnClientOrIP($this->getClientName(), 'getRaidsFromClient', $cmds, "root", false);

		$lines = explode("\n", $temp);

		foreach ($lines as $line)
		{
			if (empty($line) || (strpos($line,'bash') !== false))
				continue;

			// Virtual number of the device (partition/disk) that builds the RAID.
			$vrDev = 0;

			// Split the line into pieces (eg. md0 : active (auto-read-only) raid5 sdc3[3](S) sdc2[1] sdc1[0])
			$parts = explode(' ', $line);

			// First part is the RAID device name (without "/dev/")
			$disk[$vDisk]['dev'] = "/dev/$parts[0]";

			// Get the size of the RAID
			$temp = trim(@CLIENT_executeOnClientOrIP($this->getClientName(), 'getRaidsFromClient-Size', "mdadm --detail /dev/$parts[0] | grep 'Array Size' | sed -e 's#.* : ##' -e 's# .*##' | tail -1", "root", false));

			// Filter out empty lines and lines containing 'bash' from the result
			$sizeKbLines = explode("\n", $temp);
			foreach ($sizeKbLines as $sizeKb)
			{
				if (empty($sizeKb) || (strpos($sizeKb,'bash') !== false))
					continue;

				$disk[$vDisk]['size'] = round($sizeKb * 1048576 / 1024 / 1000000);
				break;
			}

// 			print("\n####getRaidsFromClient: SizeKb:$sizeKb SizeMB:".$disk[$vDisk]['size']."\n");

			// Throw away the first part of the array
			array_shift($parts);

			// Run thru the other lines
			foreach ($parts as $part)
			{
				// If the part begins with "raid" it is the RAID level
				if (strpos($part, 'raid') === 0)
					$disk[$vDisk]['raidLevel'] = str_replace('raid', '', $part);
				// If it begins with "sd" it is a device building the RAID
				elseif (strpos($part, 'sd') === 0)
				{
					$rDev = '/dev/'.preg_replace('/\[.*/', '', $part);
					$rDevs[$vrDev] = $rDev;
					$disk[$vDisk]['raidDrive'][$vrDev++] = $rDev;
				}
			}

			$vDisk++;
		}

		return($disk);
	}





/**
**name CFDiskTest::executePartedCommands()
**description Executes all  partitioning and formating commands on the given client.
**/
	private function executePartedCommands()
	{
		$cmds = $this->genPartedCommands('', 'wheezy', false);

		$ret = CLIENT_executeOnClientOrIP($this->getClientName(), 'executePartedCommands', $cmds, "root", false);

		print("executePartedCommands: $ret\n");
	}





/**
**name CFDiskTest::createPartition($dev, $start, $end, $type)
**description Creates a new partition on a disk (if possible) and checks for consistancy of the partioning between virtual calculation and actual client partitioning.
**parameter dev: The device (e.g. /dev/sda).
**parameter start: Start position (in MB) of the partition to create.
**parameter end: End position (in MB) of the partition to create.
**parameter type: type of the partition (CFDiskIO::PT_PRIMARY, CFDiskIO::PT_EXTENDED, CFDiskIO::PT_LOGICAL)
**/
	public function createPartition($dev, $start, $end, $type, $bootable = false)
	{
		print(">>> createPartition(dev: $dev, start: $start, end: $end, type: $type)\n");
		parent::createPartition($dev, $start, $end, $type, $bootable);
		$this->executePartedCommands();
		$this->checkPartitionConsistency();
	}





/**
**name CFDiskTest::randomCreatePartition()
**description Tries to create a new partition on the test disk with random type and start and end position.
**/
	private function randomCreatePartition()
	{
		$type = $this->getRandomPartitionType();
		$this->getRadomStartEnd($start, $end, $type);
		$this->createPartition($this->getTestDiskDev(), $start, $end, $type);
	}





/**
**name CFDiskTest::deletePartition($dev, $deleteBelongingRaid = false)
**description Deletes a partition from a disk and checks for consistancy of the partioning between virtual calculation and actual client partitioning.
**parameter dev: The partition device (e.g. /dev/sda1).
**parameter deleteBelongingRaid: If set to true, the RAID, the partition belongs to will be destroyed.
**/
	public function deletePartition($dev, $deleteBelongingRaid = false)
	{
		print(">>> deletePartition($dev)\n");
		parent::deletePartition($dev, $deleteBelongingRaid);
		$this->executePartedCommands();
		$this->checkPartitionConsistency();
	}





/**
**name CFDiskTest::randomDeletePartition()
**description Tries to delete a randomly picked partition on the test disk.
**/
	private function randomDeletePartition()
	{
		$dev = $this->getRandomPartitionDev();

		// If no partition for deletion could be found => create one
		if ($dev === false)
		{
			$this->randomCreatePartition();
			return(false);
		}
		
		$this->deletePartition($dev, true);
	}





/**
**name CFDiskTest::formatPartition($dev, $fs)
**description Formats a partition.
**parameter dev: partition to format (e.g. /dev/hda1)
**parameter fs: type of filesystem
**/
	public function formatPartition($dev, $fs)
	{
		print(">>> formatPartition($dev, $fs)\n");
		$this->checkPartitionConsistency();
		parent::formatPartition($dev, $fs);
		$this->executePartedCommands();
		$this->checkPartitionConsistency();
	}





/**
**name CFDiskTest::randomFormatPartition()
**description Tries to format a randomly picked partition on the test disk.
**/
	private function randomFormatPartition()
	{
		$dev = $this->getRandomPartitionDev();
		if ($dev === false)
			return(false);

		$this->formatPartition($dev, $this->getRandomFilesystem());
	}





/**
**name CFDiskTest::getRandomFilesystem()
**description Returns an random filesytem.
**returns Random filesytem.
**/
	private function getRandomFilesystem()
	{
		$fs[0] = 'ext2';
		$fs[1] = 'ext3';
		$fs[2] = 'ext4';
		$fs[3] = 'linux-swap';
		$fs[9] = 'reiserfs';

		return($fs[$this->rand(0, 3)]);
	}





/**
**name CFDiskTest::getRandomPartitionType()
**description Returns an random partition type.
**returns Random partition type.
**/
	private function getRandomPartitionType()
	{
		$types[0] = CFDiskIO::PT_PRIMARY;
		$types[1] = CFDiskIO::PT_EXTENDED;
		$types[2] = CFDiskIO::PT_EXTENDED;
		$types[3] = CFDiskIO::PT_LOGICAL;
		$types[4] = CFDiskIO::PT_LOGICAL;
		$types[5] = CFDiskIO::PT_LOGICAL;
		return($types[$this->rand(0, 5)]);
	}





/**
**name CFDiskTest::createPartitionsForRaid()
**description Create partitions for usage in a RAID.
**/
	public function createPartitionsForRaid()
	{
		// Amount of parts, the disk should be parted into
		$partAmount = 10;

		// Calculate the size of one part
		$diskSize = $this->getDiskSize($this->getTestDiskvDisk());
		$partSize = floor($diskSize / $partAmount);

		// Create an extended partition over the full disk size
		$this->createPartition($this->getTestDiskDev(), 0, $diskSize, CFDiskIO::PT_EXTENDED);

		// Create all logical partitions
		for ($i = 0; $i < $partAmount; $i++)
			$this->createPartition($this->getTestDiskDev(), $i * $partSize, ($i + 1) * $partSize, CFDiskIO::PT_LOGICAL);
	}





/**
**name CFDiskTest::showDebugConsistencyClientVirtualArray($heading)
**description Shows a debug information about the current state of virtual and client consistency.
**parameter heading: The heading to show above the debug info.
**/
	private function showDebugConsistencyClientVirtualArray($heading)
	{
		print("\n########\n#$heading\n########\n");
		print("\nvirtualConsistency\n");
		print_r($this->virtualConsistency);
		print("\nclientConsistency\n");
		print_r($this->clientConsistency);
	}





/**
**name CFDiskTest::randomPartTest()
**description Randomly creates, formates and deletes partitions of random size, type and with random file file systems.
**/
	public function randomPartTest()
	{
		for ($i = 0; $i < 1000; $i++)
		{
			$this->nextTurn();
			$rand = $this->rand(0, 20);
			print("\n\n\n\n\n\n\n\n\n\n++++++++++++++++++++++++++++++++\n+Runde$i / rand: $rand\n++++++++++++++++++++++++++++++++\n");
			switch($rand)
			{
				case 0: $this->randomDeletePartition(); break;
				case 1: $this->randomFormatPartition(); break;
				default: $this->randomCreatePartition(); break;
			}
		}
	}





/**
**name CFDiskTest::getRandomRaidLevel()
**description Returns an random RAID level.
**returns Random RAID level.
**/
	public function getRandomRaidLevel()
	{
		$levels = $this->getRaidLevelNumbers();
		return($levels[$this->rand(0, count($levels) - 1)]);
	}





/**
**name CFDiskTest::getRandomUnusedMD()
**description Returns a random unused MD.
**returns Random unused MD.
**/
	public function getRandomUnusedMD()
	{
		$unusedMDs = $this->getUnusedMDs();

		// Make sure, the keys are numeric
		sort($unusedMDs);

		return($unusedMDs[$this->rand(0, count($unusedMDs) - 1)]);
	}





/**
**name CFDiskTest::getRandomUsedMD()
**description Returns a random used MD.
**returns Random used MD.
**/
	public function getRandomUsedMD()
	{
		$usedMDs = $this->getUsedMDs();

		if (count($usedMDs) == 0)
			return(false);

		// Make sure, the keys are numeric
		sort($usedMDs);

		return($usedMDs[$this->rand(0, count($usedMDs) - 1)]);
	}





/**
**name CFDiskTest::deleteRaid($dev)
**description Deletes a RAID disk.
**parameter dev: Device name for the RAID (eg. /dev/md0)
**returns true, if deleting of the RAID works, otherwise false.
**/
	public function deleteRaid($dev)
	{
		parent::deleteRaid($dev);
		$this->executePartedCommands();
		$this->checkPartitionConsistency();
	}





/**
**name CFDiskTest::areThereEnoughFreePartitionsToBuildTheRaid($level)
**description Checks, if there are enough unused partitions to build a RAID of a given level.
**returns true, if there are enough free partitions, otherwise false.
**/
	private function areThereEnoughFreePartitionsToBuildTheRaid($level)
	{
		// Get the contraints for building a RAID of the given level ($minRaidDrives is the only important parameter)
		if (!CFDiskIO::getRaidCompleteParameters($level, $minRaidDrives, $raidMultipleOf, $maxRaidDrives))
			return(false);

		$vDisk = $this->getTestDiskvDisk();
		$usablePartitions = 0;

		for ($vPart = 0; $vPart < $this->getPartAmount($vDisk); $vPart++)
		{
			// A usable partition may not be used as RAID partition for another RAID and not of extended type
			if (!$this->isPartitionLockedByRaid($vDisk, $vPart) && ($this->getPartitionType($vDisk, $vPart) != CFDiskIO::PT_EXTENDED))
				$usablePartitions++;

			// Did we find enough usable partitions?
			if ($usablePartitions >= $minRaidDrives)
				return(true);
		}

		return(false);
	}





/**
**name CFDiskTest::randomCreateRaid()
**description Tries to create a new RAID with randomly choosen partitions and with random RAID level.
**/
	public function randomCreateRaid()
	{
		// Get an unused MD
		$raidDev = $this->getRandomUnusedMD();
		print("randomCreateRaid: raidDev: ".serialize($raidDev)."\n");
		
		$level = $this->getRandomRaidLevel();

		// Check, if there are enough unused partitions to build a RAID of a given level.
		if (!$this->areThereEnoughFreePartitionsToBuildTheRaid($level))
			return(false);

		// Create the RAID
		$vrDisk = $this->createRaid($raidDev, $level);
		
		if ($vrDisk === false)
			return(false);

		// Add another partition until the RAID is complete
		while (!$this->isRaidComplete($vrDisk))
		{
			$this->nextTurn();
			$devToAdd = $this->getRandomPartitionDev();
			
			if ($devToAdd === false)
				continue;

			if ($this->assignDeviceToRaid($raidDev, $devToAdd))
				print("randomCreateRaid: devToAdd: $devToAdd\n");
		}

		$this->createRaidJobForRaid($vrDisk);
		$this->executePartedCommands();
		$this->checkPartitionConsistency();
	}





/**
**name CFDiskTest::randomDeleteRaid()
**description Picks a random RAID and tries to delete it.
**/
	public function randomDeleteRaid()
	{
		// Get an unused MD
		$raidDev = $this->getRandomUsedMD();
		if ($raidDev == false)
			return(false);
		
		print("randomDeleteRaid: raidDev: ".serialize($raidDev)."\n");

		$this->deleteRaid($raidDev);
	}





/**
**name CFDiskTest::randomFormatRaid()
**description Picks a random RAID and tries to delete it.
**/
	public function randomFormatRaid()
	{
		$raidDev = $this->getRandomUsedMD();
		if ($raidDev == false)
			return(false);

		$this->formatPartition($raidDev, $this->getRandomFilesystem());
	}




/**
**name CFDiskTest::randomRaidTest()
**description Randomly creates, formates and deletes partitions of random size, type and with random file file systems.
**/
	public function randomRaidTest()
	{
		for ($i = 0; $i < 1000; $i++)
		{
			$this->nextTurn();
			$rand = $this->rand(0, 8);
			print("\n\n\n\n\n\n\n\n\n\n++++++++++++++++++++++++++++++++\n+Runde$i / rand: $rand\n++++++++++++++++++++++++++++++++\n");
			switch($rand)
			{
				case 0: $this->randomDeleteRaid(); break;
				case 1: $this->randomFormatRaid(); break;
				default: $this->randomCreateRaid(); break;
			}
		}
	}





/**
**name CFDiskTest::randomPartTest()
**description Randomly creates, formates and deletes partitions of random size, type and with random file file systems.
**/
	public function randomPartRaidTest()
	{
		for ($i = 0; $i < 10000; $i++)
		{
			$this->nextTurn();
			$rand = $this->rand(0, 20);
			print("\n\n\n\n\n\n\n\n\n\n++++++++++++++++++++++++++++++++\n+Runde$i / rand: $rand\n++++++++++++++++++++++++++++++++\n");
			switch($rand)
			{
				case 0: $this->randomDeletePartition(); break;
				case 1: $this->randomFormatPartition(); break;
				case 2:
				case 3:
				case 4:
					$this->randomCreateRaid(); break;
				case 5: $this->randomDeleteRaid(); break;
				case 6:
				case 7:
				case 8:
					$this->randomFormatRaid(); break;
				default: $this->randomCreatePartition(); break;
			}
		}
	}

}



// $CFDiskTestO = new CFDiskTest('m23CFDiskTest','/dev/sdb'); // CFDisk m23CFDiskTest
// $CFDiskTestO->resetWantedPartitioning();
// $CFDiskTestO->randomPartTest();
// exit(0);


// $CFDiskTestO = new CFDiskTest('m23CFDiskTest','/dev/sdc'); // CFDisk m23CFDiskTest
// $CFDiskTestO->resetWantedPartitioning();
// $CFDiskTestO->randomRaidTest();
// exit(0);


$CFDiskTestO = new CFDiskTest('m23CFDiskTest',array('/dev/sdb', '/dev/sdc'), $argv[1]); // CFDisk m23CFDiskTest
$CFDiskTestO->resetWantedPartitioning();
$CFDiskTestO->randomPartRaidTest();

// $CFDiskTestO->showWantedPartitioning();

// $CFDiskTestO->showWantedPartitioning();
// $CFDiskTestO->createPartitionsForRaid();
// $CFDiskTestO->randomCreateRaid();

// print_r($CFDiskTestO->getDiskArrayFromClient());
// $CFDiskTestO->virtualCreateRaidDisk('/dev/md0', 5);

// $CFDiskTestO->showPartitionSteps();
// $CFDiskTestO->showWantedPartitioning();
// $CFDiskTestO->backToPreviousPartitionStep();
// $CFDiskTestO->showWantedPartitioning();
// $CFDiskTestO->showPartitionSteps();


// print(RAID_create('/dev/md0', '/dev/sdc1 /dev/sdc2 /dev/sdc3', 5));

// $CFDiskTestO->resetWantedPartitioning();
// $CFDiskTestO->createPartitionsForRaid();
// $CFDiskTestO->showWantedPartitioning();
// $CFDiskTestO->showMessages();


// print(serialize($CFDiskTestO->isFreeSpaceBetween(1, CFDiskIO::PT_PRIMARY, 3000, 5000)));

// $CFDiskTestO->resetWantedPartitioning();
// $CFDiskTestO->createPartition('/dev/sdb', 0, 5000, CFDiskIO::PT_EXTENDED);
// $CFDiskTestO->createPartition('/dev/sdb', 0, 1000, CFDiskIO::PT_LOGICAL);
// $CFDiskTestO->createPartition('/dev/sdb', 1000, 2000, CFDiskIO::PT_LOGICAL);
// $CFDiskTestO->createPartition('/dev/sdb', 2000, 3000, CFDiskIO::PT_LOGICAL);
// $CFDiskTestO->createPartition('/dev/sdb', 3000, 4000, CFDiskIO::PT_LOGICAL);
// $CFDiskTestO->deletePartition('/dev/sdb1');
// $CFDiskTestO->showWantedPartitioning();

// $CFDiskTestO->randomPartTest();

// $CFDiskTestO->showWantedPartitioning();
// print_r($CFDiskTestO->getLogicalpParts(1));


?>