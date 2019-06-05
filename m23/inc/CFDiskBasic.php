<?

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Class for basic partitioning and formating functions.
$*/

include_once('/m23/inc/CFDiskIO.php');

class CFDiskBasic extends CFDiskIO
{



/**
**name CFDiskBasic::__construct($in)
**description Constructor for new CFDiskBasic objects. The object holds all information about the partitioning (of a client and loads the values from the DB).
**parameter in: Name of an existing client (to load) or data of an empty disk.
**/
	public function __construct($in)
	{
		parent::__construct($in);
	}





/**
**name CFDiskBasic::__destruct()
**description Destructor for a CFDiskBasic object. Before the object is removed from the RAM, all settings are written to the DB.
**/
	function __destruct()
	{
		parent::__destruct();
	}



// 	public static function getEmptyDiskArray($size, $dev)
// 	{
// 		return('blub');
// 	}





/**
**name CFDiskBasic::deletePartitionJob($dev, $pPart, $addAtTheBeginning = false)
**description Generates a partition removal job and adds it to the list of partition steps.
**parameter dev: selected device (e.g. hda)
**parameter pPart: Physical partition number, minor number in parted
**parameter addAtTheBeginning: Adds the job to the beginning of the partitionSteps and partitionStepsForShift arrays.
**/
	private function deletePartitionJob($dev, $pPart, $addAtTheBeginning = false)
	{
		$partJob = array();
		$partJob['command'] = 'rm';
		$partJob['dev'] = $dev;
		$partJob['pPart'] = $pPart;

		if ($addAtTheBeginning)
			$this->addPartitionStepAtTheBeginning($partJob);
		else
			$this->addPartitionStep($partJob);
	}





/**
**name CFDiskBasic::createPartitionJob($dev, $start, $end, $type, $pPart)
**description Generates a partition add job and adds it to the list of partition steps.
**parameter dev: selected device (e.g. /dev/hda)
**parameter start: start point of the partition (in MB)
**parameter end: end point of the partition (in MB)
**parameter type: type of the partition (primary, logical)
**parameter pPart: number of the device (e.g. 1 with /dev/hda1)
**/
	private function createPartitionJob($dev, $start, $end, $type, $pPart)
	{
		$partJob = array();
		$partJob['command'] = 'add';
		$partJob['dev'] = $dev;
		$partJob['start'] = $start;
		$partJob['end'] = $end;
		$partJob['type'] = $type;
		$partJob['pPart'] = $pPart;
		$this->addPartitionStep($partJob);
	}





/**
**name CFDiskBasic::bootflagJob($dev, $pPart)
**description Enables the booting flag on a partition and adds it to the list of partition steps.
**parameter dev: Disk to activate booting on (e.g. /dev/hda)
**parameter pPart: number of partition, minor number in parted
**/
	private function bootflagJob($dev, $pPart)
	{
		$partJob = array();
		$partJob['command'] = 'bflag';
		$partJob['dev'] = $dev;
		$partJob['pPart'] = $pPart;
		$this->addPartitionStep($partJob);
	}





/**
**name CFDiskBasic::EFItypeAndGUIDJob($dev, $pPart)
**description Sets EFI boot partition type and GUID for the EFI boot partition and adds it to the list of partition steps.
**parameter dev: Disk with the EFI partition (e.g. /dev/hda)
**parameter pPart: Number of EFI partition, minor number in parted
**/
	private function EFItypeAndGUIDJob($dev, $pPart)
	{
		$partJob = array();
		$partJob['command'] = 'EFItypeAndGUID';
		$partJob['dev'] = $dev;
		$partJob['pPart'] = $pPart;
		$this->addPartitionStep($partJob);
	}





/**
**name CFDiskBasic::formatJob($dev, $fileSystem)
**description Generates a partition format job and adds it to the list of partition steps.
**parameter dev: device to format (e.g. /dev/hda1)
**parameter fileSys: file system of the partition: ext3, ext2, linux-swap
**parameter partJobs: associative array with partition jobs
**/
	private function formatJob($dev, $fileSystem)
	{
		$partJob = array();
		$partJob['command'] = 'format';
		$partJob['dev'] = $dev;
		$partJob['fs'] = $fileSystem;
		$this->addPartitionStep($partJob);
	}





/**
**name CFDiskBasic::createRaidJob($dev, $devsBuildingDiskArray, $level)
**description Generates a RAID creation job and adds it to the list of partition steps.
**parameter dev: RAID device to create (e.g. /dev/md0)
**parameter devsBuildingDiskArray: Array with the devices that build the RAID.
**parameter level: RAID level.
**/
	private function createRaidJob($dev, $devsBuildingDiskArray, $level)
	{
		$partJob = array();
		$partJob['command'] = 'raid';
		$partJob['raidDev'] = $dev;
		$partJob['devList'] = implode( ' ', $devsBuildingDiskArray);
		$partJob['raidMode'] = $level;
		$this->addPartitionStepBeforeFormat($partJob);
	}





/**
**name CFDiskBasic::deleteRaidJob($dev)
**description Generates a RAID deletion job and adds it to the list of partition steps.
**parameter dev: RAID device to delete (e.g. /dev/md0)
**/
	private function deleteRaidJob($dev)
	{
		$partJob = array();
		$partJob['command'] = 'raiddelete';
		$partJob['raidDev'] = $dev;
		$this->addPartitionStep($partJob);
	}





/**
**name CFDiskBasic::makeInstOrEFIPartBootable()
**description Enables the booting flag on the installation/EFI partition by adding a job.
**/
	protected function makeInstOrEFIPartBootable()
	{
		if ($this->isUEFIActive())
		{
			$uefi = true;
			$bootablePart = $this->getEFIBootPartDev();
		}
		else
		{
			$uefi = false;
			$bootablePart = $this->getInstPartDev();
		}

		// Figure out the disk device and the partition number of the installation/EFI partition
		$this->getpDiskAndpPartFromDev($bootablePart, $pDisk, $pPart);
		// Add a job to enable the boot flag
		$this->bootflagJob($pDisk, $pPart);
		// Set the EFI boot partition type and the GUID
		if ($uefi) $this->EFItypeAndGUIDJob($pDisk, $pPart);
	}





/**
**name CFDiskBasic::rereadPartTable($dev)
**description Let the OS re-read the partition table.
**parameter dev: The device that was changed/created (e.g. /dev/sda5).
**/
	public function rereadPartTable($dev, $cmd = false)
	{
		//Get the drive (e.g. /dev/sda) from full device (e.g. /dev/sda5)
		$this->getpDiskAndpPartFromDev($dev, $pDisk, $pPart);

		// Removes the 'dev' directory from the device path (e.g. /dev/sdc => sdc)
		$pDiskWithoutFullPath = str_replace('/dev/', '', $pDisk);

		$mknods = $this->getMknodCommand($dev, true);
		
		if ($cmd === false)
			$cmd = "dd if=$dev of=/dev/null bs=1K count=1";

		return("$mknods\necho 1 > /sys/block/$pDiskWithoutFullPath/device/rescan
		
		rereadPartTableRET=23
		while [ \$rereadPartTableRET -ne 0 ]
		do
			sleep 5
			#sfdisk -R $pDisk
			hdparm -z $pDisk
			#blockdev --rereadpt $pDisk
			partprobe
			$cmd
			export rereadPartTableRET=$?
			echo \$rereadPartTableRET
		done");
	}




/**
**name CFDiskBasic::getMknodCommandsForDeviceArray($devs)
**description Generates the mknod commands for given /dev/sdX(Y) devices (disks or partitions).
**parameter devs: Array with the devices (e.g. /dev/sda5) to created the mknod commands for.
**returns mknod commands with the parameter matching the given /dev/sdX(Y).
**/
	private function getMknodCommandsForDeviceArray($devs)
	{
		$out = '';
		
		foreach ($devs as $dev)
			$out .= $this->getMknodCommand($dev);

		return($out);
	}





/**
**name CFDiskBasic::genPartedCommands($mkfsextOptions, $sourceslist)
**description Generates commands for creating and deletion of partitions, formating or building RAIDs.
**parameter mkfsextOptions: Extra parameter for mkfs.extX .
**parameter sourceslist: Name of the package sources list of the client (needed for finding a supported file system).
**parameter addLogStatusCommands: Set to true, if after each partition / format command a check and reporting to the m23 server should be added.
**returns Commands for creating and deletion of partitions, formating or building RAIDs.
**/
	public function genPartedCommands($mkfsextOptions, $sourceslist, $addLogStatusCommands = true)
	{
		$critical = true;
		$out = '';

// 		while ($step = $this->shiftPartitionStep())
		foreach ($this->getPartitionStepsArray() as $step)
		{
			switch ($step['command'])
			{
				case 'add':
				{
					// Create a partition
					$out .= "\ncheckdisklabel $step[dev]";
					
					if ($this->isUEFIActive())
					{
						$partedLog='/tmp/parted.err';
					
						$out .= "
							parted -a optimal -s $step[dev] mkpart P$step[start]-$step[end] $step[start] $step[end] > $partedLog

							# Get the closest start and end positions and re-try creating the partition, if parted could not create it before
							if [ `grep -c 'closest location' $partedLog` -gt 0 ]
							then
								newStart=`grep 'closest location' $partedLog | sed -e 's/.* is //' -e 's/ .*//'`
								newEnd=`grep 'closest location' $partedLog | sed -e 's/.* //' -e 's/\.//'`
								parted -s $step[dev] mkpart \"P\$newStart-\$newEnd\" \$newStart \$newEnd
							fi
						echo ";
					}
					else
						$out .= "\nparted -s $step[dev] mkpart $step[type] $step[start] $step[end]";
					
					$out .= $this->rereadPartTable($step['dev'])."\n";
	
					$critical=false;
					break;
				}

				case 'rm':
				{
					// Delete a partition or RAID
					if ($this->isDevRaid($step['dev']))
						$out .= "mdadm --stop $step[dev]";
					else
						$out .= "parted -s $step[dev] rm $step[pPart]".$this->rereadPartTable($step['dev']);

					$critical=false;
					break;
				}
	
				case 'format':
				{
					$this->getpDiskAndpPartFromDev($step['dev'], $pDisk, $pPart);

					$ddZero = $this->rereadPartTable($step['dev']);

					$out .= "true $ddZero\n";

					if ($step['fs'] == CFDiskIO::PT_EFIBOOT)
						$out .= "echo vfat $ddZero; mkfs.vfat -F 32 -n ".CFDiskIO::PT_EFIBOOT." $step[dev]";
					else
					switch(SRCLST_getStorageFS($step['fs'], $sourceslist))
					{
						case 'ext2': $out .= "modprobe ext2 $ddZero; sfdisk --part-type $pDisk $pPart 83; mkfs.ext2 -F $mkfsextOptions $step[dev]"; break;
						case 'ext3': $out .= "modprobe ext3 $ddZero; sfdisk --part-type $pDisk $pPart 83; mkfs.ext3 -F $mkfsextOptions $step[dev]"; break;
						case 'ext4': $out .= "modprobe ext4 $ddZero; sfdisk --part-type $pDisk $pPart 83; mkfs.ext4 -O ^metadata_csum -F $mkfsextOptions $step[dev]"; break;
						case 'reiserfs': $out .= "modprobe reiserfs $ddZero; sfdisk --part-type $pDisk $pPart 83; mkreiserfs -f $step[dev]"; break;
						case 'linux-swap': $out .= "echo swap $ddZero; sfdisk --part-type $pDisk $pPart 82; mkswap $step[dev]"; break;
					}

					$out .= $this->rereadPartTable($step['dev']);

					break;
				}


				case 'bflag':
				{
					$out .= "parted -s $step[dev] set $step[pPart] boot on";
					break;
				}

				case 'EFItypeAndGUID':
				{
					$out .= "parted -s $step[dev] set $step[pPart] boot on; sfdisk --part-type $step[dev] $step[pPart] ef00; sgdisk -t $step[pPart]:C12A7328-F81F-11D2-BA4B-00A0C93EC93B $step[dev];";
					break;
				}
				

				// Creates a RAID
				case 'raid':
				{
					// Get the RAID device (e.g. /dev/md0)
					$mdDev = $step['raidDev'];
					// Get the RAID level
					$mode = $step['raidMode'];
					// Get the "partition number" from the MD
					$this->getpDiskAndpPartFromDev($mdDev, $pDisk, $pPart, true);
					//Make sure that there are no spaces at the beginning or end of the space separated device list
					$devList = trim($step['devList']);
					// Count the devices building the RAID
					$amount = substr_count ($devList, " ") + 1;
					// Generate mknod commands for all devices building the RAID
					$mkNods = $this->getMknodCommandsForDeviceArray(explode(' ',$devList));

					$out .= "
					modprobe raid$mode
					modprobe dm-mod
					mknod $mdDev b 9 $pPart 2> /dev/null $mkNods

					mdadm --zero-superblock $devList 2>&1 | tee -a /tmp/m23raid.log
					mdadm --create $mdDev --verbose --run --level=$mode --raid-devices=$amount $devList 2>&1 | tee -a /tmp/m23raid.log
					";
					break;
				}

				// Deletes a RAID
				case 'raiddelete':
				{
					// Get the RAID device (e.g. /dev/md0)
					$mdDev = $step['raidDev'];

					$out .= "
					# Get the list of devices building the RAID and add trailing zeroing commands
					mdadm --detail $mdDev | grep '/dev/' | grep -v 'md' | sed 's#.*/dev#mdadm $mdDev --fail /dev#g' > /tmp/failRemove.sh
					mdadm --detail $mdDev | grep '/dev/' | grep -v 'md' | sed 's#.*/dev#mdadm $mdDev --remove /dev#g' >> /tmp/failRemove.sh
					mdadm --detail $mdDev | grep '/dev/' | grep -v 'md' | sed 's#.*/dev#mdadm --zero-superblock /dev#g' > /tmp/zeroParts.sh
					mdadm --stop $mdDev
					sh /tmp/failRemove.sh
					mdadm --remove $mdDev
					#rm /tmp/zeroParts.sh
					mdadm --stop $mdDev
					mdadm --remove $mdDev
					sh /tmp/zeroParts.sh
					";
				}
			}

			$out .= "\n";

			if ($addLogStatusCommands)
				$out .= "
					echo $? > /tmp/parted.err
			
					if [ `cat /tmp/parted.err` -ne 0 ]
					then
						".sendClientLogStatus("Partition or format error: $step[command]",false,$critical)."
					else
						".sendClientLogStatus("Partition or format OK: $step[command]",true)."
					fi
			";
		}

		return($out);
	}





/**
**name CFDiskBasic::createPartition($dev, $start, $end, $type, $bootable = false)
**description Creates a new partition on a disk (if possible).
**parameter dev: The device (e.g. /dev/sda).
**parameter start: Start position (in MB) of the partition to create.
**parameter end: End position (in MB) of the partition to create.
**parameter type: type of the partition (CFDiskIO::PT_PRIMARY, CFDiskIO::PT_EXTENDED, CFDiskIO::PT_LOGICAL)
**parameter bootable: Set to true, if the partition should be made bootable.
**returns The physical partition number of the newly created partition.
**/
	public function createPartition($dev, $start, $end, $type, $bootable = false)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Make sure a valid partition type is choosen
		$isFreeSpaceBetweenType = $this->changeToEfiPartitionTypeIfInUefiMode($type);

		if ($this->isDevRaid($dev))
		{
			$this->addErrorMessage($I18N_no_partition_can_be_created_on_a_raid);
			return(false);
		}

		$this->dev2VDiskVPart($dev, $vDisk, $vPart);

		// Return, if there exists a partition with the physical partition number
		if ($vPart !== false)
		{
			$this->addErrorMessage($I18N_error_part_device_exists);
			return(false);
		}

		// Return, if the end position for the new partition is not bigger than the start position
		if ($end <= $start)
		{
			$this->addErrorMessage($I18N_error_part_end_must_be_bigger_than_start);
			return(false);
		}

		//Check, if the whole disk or at least one partition on the disk is used in a RAID.
		$this->mayPartitioningBeChanged($vDisk);

		// Checks if a new partition can be created or if the complete disk is used for RAID.
		$this->isDiskNotLockedByRaidAgainstCreationOfNewPartition($vDisk);

		// Checks if a new partition from a certain type can be created.
		$this->isFreeSpaceBetween($vDisk, $isFreeSpaceBetweenType, $start, $end);

		if ($this->hasErrors())
			return(false);

		$pPart = $this->virtualAddPartition($vDisk, $start, $end, $type);
// 		print("<h2>createPartition(".serialize($pPart)."</h2>");

		// Add creation and (maybe) setting of the boot flag
		$this->createPartitionJob($dev, $start, $end, $type, $pPart);
		if ($bootable)
			$this->bootflagJob($dev, $pPart);

		return($pPart);
	}





/**
**name CFDiskBasic::createUEFIPartition($dev)
**description Creates a new UEFI partition with a size of 512 MB at the start of the disk (if possible).
**parameter dev: The device (e.g. /dev/sda).
**returns The physical partition number of the newly created partition.
**/
	public function createUEFIPartition($dev)
	{
		$pPart = $this->createPartition($dev, CFDiskIO::EFIBOOT_PART_START, CFDiskIO::EFIBOOT_PART_END, CFDiskIO::PT_EFIBOOT, true);
		$this->formatPartition($this->getDevBypDiskpPart($dev, $pPart), CFDiskIO::PT_EFIBOOT);
		$this->setEFIBootPartDev($this->getDevBypDiskpPart($dev, $pPart));
		return($pPart);
	}





/**
**name CFDiskBasic::deletePartition($dev, $deleteBelongingRaid = false, $addAtTheBeginning = false)
**description Deletes a partition from a disk.
**parameter dev: The device (e.g. /dev/sda).
**parameter deleteBelongingRaid: If set to true, the RAID, the partition belongs to will be destroyed.
**parameter massInstallMode: Adds the job to the beginning of the partitionSteps and partitionStepsForShift arrays and doesn't unset installation and swap partition.
**/
	public function deletePartition($dev, $deleteBelongingRaid = false, $massInstallMode = false)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if ($this->isDevRaid($dev))
			return($this->deleteRaid($dev));

		$this->dev2VDiskVPart($dev, $vDisk, $vPart);

		// Check, if the partition could be found
		if (($vPart === false) || ($vDisk === false))
		{
			$this->addErrorMessage($I18N_error_part_doesnt_exists);
			return(false);
		}

		//Check, if the whole disk or at least one partition on the disk is used in a RAID.
		if ($this->mayPartitioningBeChanged($vDisk) === false)
			return(false);

		//Complain and deny deletion of the partition if it belongs to RAID
		if ($this->isPartitionLockedByRaid($vDisk, $vPart))
		{
			//If set to true, the RAID, the partition belongs to will be destroyed
			if ($deleteBelongingRaid)
			{
				//Get the RAID device
				$raidDev = $this->getBelongingRaidDev($dev);
				if ($raidDev === false)
				{
					$this->addErrorMessage("Error in partition scheme: The device \"$dev\" is marked as a partition belonging to a RAID, but no RAID was found, that is built with \"$dev\".");
					$this->showMessages();
// 					exit(1);
				}
				else
				{
					//Destroy the RAID
					$this->deleteRaid($raidDev);
					return(false);
				}
			}
			else
			{
				$this->addErrorMessage($I18N_cantDeletePartitionBecauseItIsAssignedToARAID);
				return($param);
			}
		}



		$diskDev = $this->getDiskDev($vDisk);

		/*if you want to delete an extended partition, all logical partitions in it have to be deleted too*/
		if ($this->getPartitionType($vDisk, $vPart) == CFDiskIO::PT_EXTENDED)
		{
			$logCount = $this->getPartitionAmountOfType($vDisk, CFDiskIO::PT_LOGICAL);

			/*logical partitions are starting at device number 5. if you delete the first logical partition, the next one becomes #5. to delete all logical partitions you have to delete partition #5 n times, where n is the amount of logical partitions*/
			for ($lCount=0; $lCount < $logCount; $lCount++)
			{
				$this->virtualDelPartition($vDisk, $this->getvPartBypPart($vDisk, 5));
				$this->deletePartitionJob($diskDev, 5, $massInstallMode);
				$this->correctLogical($vDisk, 5);
			}

			//Delete the extended partition itself
			
			// Get the new vPart (it was most likely changed by correctLogical)
			$vPart = $this->getExtendedVPart($vDisk);
			$pPart = $this->getPartitionNumber($vDisk, $vPart);
			$this->virtualDelPartition($vDisk, $vPart);
			$this->deletePartitionJob($diskDev, $pPart, $massInstallMode);
		}
		//Check if the device is a RAID
		elseif($this->isDiskRaid($vDisk))
		{
			$this->virtualDeleteDisk($vDisk);
			// For a RAID no pPart is given
			$this->deletePartitionJob($diskDev, '', $massInstallMode);
		}
		else
		{
			$pPart = $this->getPartitionNumber($vDisk, $vPart);
			$this->virtualDelPartition($vDisk, $vPart);
			$this->deletePartitionJob($diskDev, $pPart, $massInstallMode);
		}

		if (!$massInstallMode)
		{
			// Unsets the installation or swap partition variable of the client (if $dev is installation or swap partition)
			if ($dev == $this->getInstPartDev())
				$this->unsetInstPartDev();
			elseif ($dev == $this->getSwapPartDev())
				$this->unsetSwapPartDev();
			elseif ($dev == $this->getEFIBootPartDev())
				$this->unsetEFIBootPartDev();
		}
	}





/**
**name CFDiskBasic::formatPartition($dev, $fs)
**description Formats a partition.
**parameter dev: partition to format (e.g. /dev/hda1)
**parameter fs: type of filesystem
**/
	public function formatPartition($dev, $fs)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$this->dev2VDiskVPart($dev, $vDisk, $vPart);
// 		print("<h3>dev2VDiskVPart($dev, ".serialize($vDisk).", ".serialize($vPart)."</h3>");

		// Check, if it is NOT a RAID or in case of a RAID, if its parts are complete
		if (!$this->isRaidComplete($vDisk))
			return(false);

		// Check, if the partition could be found (of if it is a RAID and has nor partition)
		if (($vDisk === false) || (!$this->isDiskRaid($vDisk) && $vPart === false))
		{
			$this->addErrorMessage($I18N_error_part_doesnt_exists);
			return(false);
		}

		// An extended partition cannot be formated
		if ($this->getPartitionType($vDisk, $vPart) == CFDiskIO::PT_EXTENDED)
		{
			$this->addErrorMessage($I18N_extended_partition_cannot_be_formated);
			return(false);
		}

		// A partition that is used in a RAID may not be formated
		if ($this->isPartitionLockedByRaid($vDisk, $vPart))
		{
			$this->addErrorMessage($I18N_format_partition_that_belongs_to_a_RAID);
			return(false);
		}

		$this->setPartitionFileSystem($vDisk, $vPart, $fs);

		$this->formatJob($dev, $fs);
	}





/**
**name CFDiskBasic::deleteAllPartitions($diskDev)
**description Deletes all partitions on a disk.
**parameter diskDev: The device (e.g. /dev/sda).
**/
	private function deleteAllPartitions($diskDev)
	{
		$this->dev2VDiskVPart($diskDev, $vDisk, $vPart);

		// Remove all primary partitions, if there is an extended partition, the logical partitions will be deleted automatical => all partitions are deleted
		foreach ($this->getPartitionDevs($vDisk) as $partitionDev)
			$this->deletePartition($partitionDev);
	}





/**
**name CFDiskBasic::createInstallPartition($diskDev, $instStart, $instEnd)
**description Creates and formats an installation partition and makes it bootable. The created partition is stored in the client parameters as installation partition.
**parameter diskDev: The disk device (e.g. /dev/hda) where the installation partition should be created on.
**parameter instStart: Start position of the installation partition (in MB).
**parameter instEnd: End position of the installation partition (in MB).
**/
	private function createInstallPartition($diskDev, $instStart, $instEnd)
	{
		// Create the partition and get the installation partition device string
		$pPart = $this->createPartition($diskDev, $instStart, $instEnd, CFDiskIO::PT_PRIMARY, true);
		$instPartDev = $this->getDevBypDiskpPart($diskDev, $pPart);
		
		$this->showMessages();

		// Format it and save the installation partition device string in the client
		$this->formatPartition($instPartDev, 'ext4');
		$this->setInstPartDev($instPartDev);
	}





/**
**name CFDiskBasic::createSwapPartition($diskDev, $swapStart, $swapEnd)
**description Creates and formats a swap partition. The created partition is stored in the client parameters as swap partition.
**parameter diskDev: The disk device (e.g. /dev/hda) where the swap partition should be created on.
**parameter instStart: Start position of the swap partition (in MB).
**parameter instEnd: End position of the swap partition (in MB).
**/
	private function createSwapPartition($diskDev, $swapStart, $swapEnd)
	{
		// Create the partition and get the swap partition device string
		$pPart = $this->createPartition($diskDev, $swapStart, $swapEnd, CFDiskIO::PT_PRIMARY);
// 		print("<h1>getDevBypDiskpPart($diskDev, $pPart);</h1>");
		
		$swapPartDev = $this->getDevBypDiskpPart($diskDev, $pPart);

		// Format it and save the swap partition device string in the client
		$this->formatPartition($swapPartDev, 'linux-swap');
		$this->setSwapPartDev($swapPartDev);
	}





/**
**name CFDiskBasic::createFormatPartition($diskDev, $instStart, $instEnd, $fileSystem = 'ext4', $partType = CFDiskIO::PT_PRIMARY)
**description Creates and formats a partition.
**parameter diskDev: The disk device (e.g. /dev/hda) where the installation partition should be created on.
**parameter instStart: Start position of the installation partition (in MB).
**parameter instEnd: End position of the installation partition (in MB).
**parameter fileSystem: Type of the file system (eg. ext4)
**parameter partType: Type of the partition (eg. CFDiskIO::PT_PRIMARY)
**/
	private function createFormatPartition($diskDev, $instStart, $instEnd, $fileSystem = 'ext4', $partType = CFDiskIO::PT_PRIMARY)
	{
		// Create the partition and get the installation partition device string
		$pPart = $this->createPartition($diskDev, $instStart, $instEnd, $partType, true);
		$instPartDev = $this->getDevBypDiskpPart($diskDev, $pPart);
		
		$this->showMessages();

		// Format it
		$this->formatPartition($instPartDev, $fileSystem);
	}





/**
**name CFDiskBasic::autoPartitionDisk($diskDev, $minSwap=256, $maxSwap=512)
**description Automatically partitions and formats a disk.
**parameter diskDev: The disk device (e.g. /dev/hda) that should be partitionated and formated automatically.
**parameter minSwap: Minimal size of the swap partition in MB.
**parameter maxSwap: Maximal size of the swap partition in MB.
**/
	function autoPartitionDisk($diskDev, $minSwap=256, $maxSwap=512)
	{
		// Delete all partitions of the disk
		$this->deleteAllPartitions($diskDev);

		// Get vDisk for the disk and its size
		$this->dev2VDiskVPart($diskDev, $vDisk, $vPart);
		$diskSize = $this->getDiskSize($vDisk);

		// There is an EFI boot partition on UEFI booted systems
		if ($this->isUEFIActive())
		{
			$this->createUEFIPartition($diskDev);
			$diskSize -= CFDiskIO::EFIBOOT_PART_END;

			// Generate the device names for installation and swap
			$instPartDev = $this->getDevBypDiskpPart($diskDev, 2);
			$swapPartDev = $this->getDevBypDiskpPart($diskDev, 3);
			
			$instStart = CFDiskIO::EFIBOOT_PART_END + 2;
		}
		else
		{
			// Generate the device names for installation and swap
			$instPartDev = $this->getDevBypDiskpPart($diskDev, 1);
			$swapPartDev = $this->getDevBypDiskpPart($diskDev, 2);

			// Leave space for grub and for aligning the partition
			$instStart = 2;
		}


		// Calculate size of swap
		$swapSize = HWINFO_getMemory($this->getClientName()) / 2;

		if ($swapSize > $maxSwap)
			$swapSize = $maxSwap;
		// Needed for massinstall
		if ($swapSize < $minSwap)
			$swapSize = $minSwap;

		// Calculate the end of the installation partition
		$instEnd = $diskSize - $swapSize;

		// Create and format installation partition
		$this->createInstallPartition($diskDev, $instStart, $instEnd);

		// Calculate start + end positions of the swap partition
		$swapStart = $instEnd + 1;
		$swapEnd = $diskSize - 1;

		// Create and format swap partition
		$this->createSwapPartition($diskDev, $swapStart, $swapEnd);
	}





/**
**name CFDiskBasic::PM_auto2Disk1SysSwap2Home()
**description Automatically partitions two disks (1st for system + swap, 2nd for /home).
**/
	function PM_auto2Disk1SysSwap2Home()
	{
		if ($this->getDiskAmount() < 2)
		{
			$this->addErrorMessage($I18N_fdiskTypeautomatic2Disk1SysSwap2HomeDiskAmountERROR);
			return(false);
		}

// TODO: Rest of the code :-)
	
	
	
		// Delete all partitions of the disk
		$this->deleteAllPartitions($diskDev);

		// Get vDisk for the disk and its size
		$this->dev2VDiskVPart($diskDev, $vDisk, $vPart);
		$diskSize = $this->getDiskSize($vDisk);

		// There is an EFI boot partition on UEFI booted systems
		if ($this->isUEFIActive())
		{
			$this->createUEFIPartition($diskDev);
			$diskSize -= CFDiskIO::EFIBOOT_PART_END;

			// Generate the device names for installation and swap
			$instPartDev = $this->getDevBypDiskpPart($diskDev, 2);
			$swapPartDev = $this->getDevBypDiskpPart($diskDev, 3);
			
			$instStart = CFDiskIO::EFIBOOT_PART_END + 2;
		}
		else
		{
			// Generate the device names for installation and swap
			$instPartDev = $this->getDevBypDiskpPart($diskDev, 1);
			$swapPartDev = $this->getDevBypDiskpPart($diskDev, 2);

			// Leave space for grub and for aligning the partition
			$instStart = 2;
		}


		// Calculate size of swap
		$swapSize = HWINFO_getMemory($this->getClientName()) / 2;

		if ($swapSize > $maxSwap)
			$swapSize = $maxSwap;
		// Needed for massinstall
		if ($swapSize < $minSwap)
			$swapSize = $minSwap;

		// Calculate the end of the installation partition
		$instEnd = $diskSize - $swapSize;

		// Create and format installation partition
		$this->createInstallPartition($diskDev, $instStart, $instEnd);

		// Calculate start + end positions of the swap partition
		$swapStart = $instEnd + 1;
		$swapEnd = $diskSize - 1;

		// Create and format swap partition
		$this->createSwapPartition($diskDev, $swapStart, $swapEnd);
	}





/**
**name CFDiskBasic::PM_auto500GBsysSwapData($diskDev)
**description Automatically partitions and formats the first 500GB a disk. It creates a system, swap and data partition.
**parameter diskDev: The disk device (e.g. /dev/hda) that should be partitionated and formated automatically.
**/
	public function PM_auto500GBsysSwapData($diskDev)
	{
		$diskEnd = 500100;
		
		// 40GB for system
		$sysSize = 40960;
		// 4GB swap
		$swapSize = 4096;
		// Data
		$dataSize = $diskEnd - $sysSize - $swapSize;

		// Start for th
		$partStart = 2;
	
		// Delete all partitions of the disk
		$this->deleteAllPartitions($diskDev);

		// Create and format installation partition
		$this->createInstallPartition($diskDev, $partStart, $partStart + $sysSize);
		$partStart += $sysSize;

		// Create and format swap partition
		$this->createSwapPartition($diskDev, $partStart, $partStart + $swapSize);
		$partStart += $swapSize;

		// Create and format the data partition
		$this->createFormatPartition($diskDev, $partStart, $diskEnd);
	}





/**
**name CFDiskBasic::createAllRaidJobs()
**description Generates the jobs to create all RAIDs.
**returns true, if all RAIDs are complete, otherwise false.
**/
	public function createAllRaidJobs()
	{
		// Check, if all RAIDs are complete.
		if (!$this->areAllRaidsComplete())
			return(false);

		// Add a creation job for each of the RAIDs
		for ($vDisk = 0; $vDisk < $this->getDiskAmount(); $vDisk++)
			if ($this->isDiskRaid($vDisk))
				$this->createRaidJobForRaid($vDisk);

		return(true);
	}





/**
**name CFDiskBasic::createRaidJobForRaid($vDisk)
**description Generates the jobs to create a given RAID.
**parameter vrDisk: Virtual (internally used) disk number for the RAID.
**returns true, if $vrDisk is a RAID, otherwise false.
**/
	public function createRaidJobForRaid($vrDisk)
	{
		if (!$this->isDiskRaid($vrDisk))
			return(false);

		$this->createRaidJob($this->getDiskDev($vrDisk), $this->getRaidDevsBuildingDisk($vrDisk), $this->getRaidLevel($vrDisk));
		return(true);
	}





/**
**name CFDiskBasic::createRaid($dev, $level)
**description Creates a new RAID disk.
**parameter dev: Device name for the RAID (eg. /dev/md0)
**parameter level: RAID level.
**returns Virtual RAID disk number, if the device string is suitable for a RAID, otherwise false.
**/
	public function createRaid($dev, $level)
	{
		$vrDisk = $this->virtualCreateRaidDisk($dev, $level);

		if ($vrDisk === false)
			return(false);

		return($vrDisk);
	}





/**
**name CFDiskBasic::deleteRaid($dev)
**description Deletes a RAID disk.
**parameter dev: Device name for the RAID (eg. /dev/md0)
**returns true, if deleting of the RAID works, otherwise false.
**/
	public function deleteRaid($dev)
	{
		// If it is not a RAID => Try to use the delete partition function
		if (!$this->isDevRaid($dev))
			return($this->deletePartition($dev));
	
		$this->virtualDeleteRaidDisk($dev);
		// Don't add a RAID deletion job, if there occurred an error
		if ($this->hasErrors()) return(false);

		$this->deleteRaidJob($dev);

		return(true);
	}





/**
**name CFDiskBasic::assignDeviceToRaid($raidDev, $devToAdd)
**description Adds a partition or disk to a RAID disk.
**parameter raidDev: Device name of the RAID (eg. /dev/md0)
**parameter devToAdd: partition or disk device name to add.
**returns true, if the device could be added, otherwise false.
**/
	public function assignDeviceToRaid($raidDev, $devToAdd)
	{
		$this->dev2VDiskVPart($raidDev, $vrDisk, $vPart);
		return($this->addDevToRaid($vrDisk, $devToAdd));
	}





/**
**name CFDiskBasic::deleteDeviceFromRaid($raidDev, $devToRemove)
**description Deletes a partition or disk from a RAID disk.
**parameter raidDev: Device name of the RAID (eg. /dev/md0)
**parameter devToRemove: Partition or disk device name to remove.
**returns true, if the device could be removed, otherwise false.
**/
	public function deleteDeviceFromRaid($raidDev, $devToRemove)
	{
		$this->dev2VDiskVPart($raidDev, $vrDisk, $vPart);
		return($this->delDevFromRaid($vrDisk, $devToRemove));
	}





/**
**name CFDiskBasic::deleteAllPartitionsOnDisk($dev)
**description Deletes all partitions on a disk.
**parameter dev: Device name of the disk.
**/
	public function deleteAllPartitionsOnDisk($dev)
	{
		if ($this->isDevRaid($dev))
			return(false);
	
		$this->dev2VDiskVPart($dev, $vDisk, $vPart);
		for ($devNr = 1; $devNr <= 4; $devNr++)
			if ($this->devNrExists($vDisk, $devNr))
				$this->deletePartition($this->getDevBypDiskpPart($dev, $devNr), true, true);
	}





/**
**name CFDiskBasic::fdiskAdjustPartitioningLinearScale($diskDevToAdjust)
**description Scales all partitions sizes to match the full disk size.
**parameter diskDevToAdjust: Device name of the disk to ajust.
**/
	private function fdiskAdjustPartitioningLinearScale($diskDevToAdjust, $definedDiskSize)
	{
// 		print(">>>>>>>fdiskAdjustPartitioningLinearScale($diskDevToAdjust, $definedDiskSize)\n");
	
		$changedPartitionSteps = array();

		// Calculate scaling factor for the partitions
		$this->dev2VDiskVPart($diskDevToAdjust, $vDisk, $vPart);

		// Get the scaling factor for all partitions (1 : no scaling, less than 1: the client's disk is smaler than the defined disk => scale the layout down, > 1: the client's disk is bigger than the defined disk => Make the partitions bigger)
		$partitionscale = $this->getDiskSize($vDisk) / $definedDiskSize;

		// If there is no scaling, there should be no adding of extra spaces before and after the partitions
		if ($partitionscale == 1.0)
			$partitionBorderMB = 0;
		else
			$partitionBorderMB = 2;

		// Make the scaling factor 0.05% smaler to make sure, the partitions fit on the disk
		$partitionscale /= 1.005;

// 		print("\n>>>partitionscale: $partitionscale\n");

		foreach ($this->partitionSteps as $key => $step)
		{
			// Copy all parameters
			$changedPartitionSteps[$key] = $step;

			// Change parameters only, if a partition should be created
			if (('add' == $step['command']) && ($diskDevToAdjust == $step['dev']))
			{
				// Adjust start and end position of the partition
				$changedPartitionSteps[$key]['start'] =  sprintf("%.0f", ($step['start'] * $partitionscale + $partitionBorderMB));
				$changedPartitionSteps[$key]['end'] = sprintf("%.0f", $step['end'] * $partitionscale - $partitionBorderMB);
			}
		}

		// Copy the adjusted partition steps to the partition steps of the client
		$this->partitionSteps = $changedPartitionSteps;
	}





/**
**name CFDiskBasic::fdiskAdjustPartitioning()
**description Adjusts the disk for a derived client, based on the defined client's settings
**/
	public function fdiskAdjustPartitioning()
	{
		// Check if it's a derived client
		if ($this->isDerivedClient() === false)
			return(false);

		// Get the disk devices of the client
		$diskDevs = $this->getDiskDevs();

		// Run thru the disk devices and their sizes of the defined client (from which this client was derived from)
		foreach ($this->getDefinedDiskSizes() as $pDisk => $diskSize)
		{
			$this->dev2VDiskVPart($pDisk, $vDiskDEBUG, $vPartDEBUG);
// 			print("####ההה$pDisk => def: $diskSize echt: ".$this->getDiskSize($vDiskDEBUG)."\n");

			// Check if the specified disk exists
			if (in_array($pDisk, $diskDevs))
			{
				// Delete all partitions
				$this->deleteAllPartitionsOnDisk($pDisk);

				// Scale the partition layout
				$this->fdiskAdjustPartitioningLinearScale($pDisk, $diskSize);
			}
		}

		// Adjust the scaling factor for current disk size (so a re-calculation of the partition jobs will not change the partition starts and ends over the disk size)
		$this->saveDefinedDiskSizesToDB();
	}
}
?>