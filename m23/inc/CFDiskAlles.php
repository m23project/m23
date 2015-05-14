<?PHP

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions for partition and format of the client. print partition information and do the format itself.
$*/





/**
**name FDISK_mdToEndOfArray($in)
**description Orders all MD devices from the input array to the end of the output array.
**parameter in: Associative array with devices as keys and values (e.g Array ( [/dev/md0] => /dev/md0 [/dev/sda1] => /dev/sda1 [/dev/sdb2] => /dev/sdb2 )).
**returns Associative array with devices as keys and values where the MDs are at the end (e.g. Array ( [/dev/sda1] => /dev/sda1 [/dev/sdb2] => /dev/sdb2 [/dev/md0] => /dev/md0 )).
**/
function FDISK_mdToEndOfArray($in)
{
	//New empty arrays for normal and MD devices
	$normalDevs = $mdDevs = array();

	//Run thru the input array
	foreach($in as $key => $val)
	{
		//Check, if the current device is an MD or not
		if (false === strpos($val,'md'))
			$normalDevs[$key] = $val;
		else
			$mdDevs[$key] = $val;
	}

	//Join the arrays
	return(array_merge($normalDevs,$mdDevs));
}













/**
**name FDISK_fdiskSessionReset($resetClientName = false)
**description Sets back all session variables (client name optionally) for partitioning and formating a client.
**parameter resetClientName: If set to true, the name of the client will be deleted too (and re-set by FDISK_fdiskSessionClient).
**/
function FDISK_fdiskSessionReset($resetClientName = false)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	if (!$resetClientName)
		$client = $_SESSION['clientPartition']['client'];
	$_SESSION['clientPartition'] = array();
	if (!$resetClientName)
		$_SESSION['clientPartition']['client'] = $client;

	FDISK_fdiskSessionPartMethod(CFDiskBasic::PM_none);
	FDISK_fdiskSessionTitle($I18N_fdistTypeselection);
	$this->fdiskSessionPage('fdisk');
	$this->fdiskSessionHelpPage('fdisk');
}





/**
**name FDISK_fdiskSessionPartMethod($newMethod = false)
**description Stores the partitioning method in the session.
**parameter newMethod: The new method to set or false for not changing.
**returns The current partitioning method.
**/
function FDISK_fdiskSessionPartMethod($newMethod = false)
{
	if ($newMethod !== false)
		$_SESSION['clientPartition']['partMethod'] = $newMethod;

	if (!isset($_SESSION['clientPartition']['partMethod']))
		$_SESSION['clientPartition']['partMethod'] = CFDiskBasic::PM_none;

	return($_SESSION['clientPartition']['partMethod']);
}





/**
**name FDISK_fdiskSessionTitle($newTitle = false)
**description Stores the partitioning title in the session.
**parameter newTitle: The new title to set or false for not changing.
**returns The current partitioning title.
**/
function FDISK_fdiskSessionTitle($newTitle = false)
{
	return(FDISK_fdiskSessionSetter($newTitle, 'title'));
}






/**
**name FDISK_getPartitionByType($param, $vDev, $type)
**description Gets the FIRST partition matching a partition type.
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number.
**parameter type: type of the partition (primary, extended, logical)
**returns Virtual partition number of the FIRST partition matching a partition type or false, if no partition was found.
**/
function FDISK_getPartitionByType($param, $vDev, $type)
{
	for ($vPart = 0; $vPart < $param["dev$vDev"."_partamount"]; $vPart++)
		if ($param["dev$vDev"."part$vPart"."_type"] == $type)
			return($vPart);

	return(false);
}











/**
**name FDISK_listDrivesAndPartitions($param, $default, $selName)
**description Generates a selection that contains all drives and partitions of a given client.
**parameter param: parameter string containing status informations about the harddisks
**parameter default: the drive to show first
**parameter selName: the name the selection is called in PHP and HTML
**parameter pathFilter: Set this to another value than false if you want only devices with a given string in it.
**returns String with the HTML selection.
**/
function FDISK_listDrivesAndPartitions($param, $default, $selName, $pathFilter=false)
{
	$list=FDISK_getDrivesAndPartitions($param,$pathFilter);
	return(HTML_listSelection($selName,$list,$default));
}





/**
**name FDISK_selectDrives($param,$selName,$first)
**description creates a selection list of all drives
**parameter param: parameter string containing status informations about the harddisks
**parameter selName: the name the selection is called in PHP and HTML
**parameter first: the drive to show first
**/
function FDISK_selectDrives($param,$selName,&$first)
{
	$drives = FDISK_getAllDrives($param);
	return(HTML_listSelection($selName,$drives,$first));
};





/**
**name FDISK_getFirstDrive($param)
**description return the first drive as installation drive
**parameter param: parameter string containing status informations about the harddisks
**/
function FDISK_getFirstDrive($param)
{
 $drives=FDISK_getAllDrives($param);
 $installDrive=$drives[0];
 return($installDrive);
};





/**
**name FDISK_delFstab(&$fstab,$fstabNr)
**description Removes an entry from the fstab array.
**parameter fstab: Array that contains the fstab information. The changed fstab will be written to this parameter too.
**parameter fstabNr: Number of the fstab entry to delete.
**/
function FDISK_delFstab(&$fstab,$fstabNr)
{
	if (!isset($fstab['fstab_amount']))
		return(false);

	//Move all following entries down
	for (; $fstabNr < $fstab['fstab_amount'] -1; $fstabNr++)
	{
		$fstab["fstab_dev$fstabNr"] = $fstab["fstab_dev".($fstabNr+1)];
		$fstab["fstab_mnt$fstabNr"] = $fstab["fstab_mnt".($fstabNr+1)];
		$fstab["fstab_param$fstabNr"] = $fstab["fstab_param".($fstabNr+1)];
	}

	$fstab['fstab_amount']--;

	//Remove the last and now obsolete entry
	$fstabNr = $fstab['fstab_amount'];
	unset($fstab["fstab_dev$fstabNr"]);
	unset($fstab["fstab_mnt$fstabNr"]);
	unset($fstab["fstab_param$fstabNr"]);
};





/**
**name FDISK_fstabAddDialog2()
**description Dialog for adding fstab entries. This version uses the param and fstab parameters from the session.
**/
function FDISK_fstabAddDialog2()
{
	$param = FDISK_fdiskSessionParam();
	$fstab = FDISK_fdiskSessionFstab();
	FDISK_fstabAddDialog($param,$fstab);
	FDISK_fdiskSessionFstab($fstab);
}





/**
**name FDISK_adjustFstabParam($param, $sourceName)
**description Adjust the parameter block of a fstab line to make it use an supported FS.
**parameter param: The parameter block of a fstab line
**parameter sourceName: The name of the package source list
**returns Adjust the parameter block of a fstab line
**/
function FDISK_adjustFstabParam($param, $sourceName)
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
**name FDISK_genManualFstab($fstab)
**description Generates commands to edit a given fstab, add new entries and remove old ones before.
**parameter param: parameter string containing status informations about the harddisks
**parameter mntPrefix: Prefix to set before the mountpoint (e.g. /mnt/m23root/)
**/
function FDISK_genManualFstab($fstab, $mntPrefix, $sourceName)
{
	$out = "";

	$fstabAmount = isset($fstab['fstab_amount']) ? $fstab['fstab_amount'] : 0;

	for ($fstabNr = 0; $fstabNr < $fstabAmount; $fstabNr++)
	{
		$param = FDISK_adjustFstabParam($fstab["fstab_param$fstabNr"], $sourceName);
	
		$out .= EDIT_deleteMatching("/etc/fstab","^".$fstab["fstab_dev$fstabNr"]."[ \t]").
				"echo \"".$fstab["fstab_dev$fstabNr"]." $mntPrefix".$fstab["fstab_mnt$fstabNr"]." ".$param."\" >> /etc/fstab
				mkdir -p $mntPrefix".$fstab["fstab_mnt$fstabNr"]."
				chmod 777 $mntPrefix".$fstab["fstab_mnt$fstabNr"]."
				mount $mntPrefix".$fstab["fstab_mnt$fstabNr"]."
				";
	}

	echo($out);
};







/**
**name FDISK_getAllDrives($param)
**description gets all drives of the client
**parameter partitions: associative array containing status information about the harddisks
**/
function FDISK_getAllDrives($partitions)
{
	for ($devNr=0; $devNr < $partitions['dev_amount']; $devNr++)
		$out[$devNr] = $partitions["dev$devNr"."_path"];

	return($out);
};






/**
**name FDISK_listSupportedFS($selName,$showFirst)
**description lists all supported fileSystems for the menu.
**parameter selName: name the selection list, used for the html form
**parameter showFirst: name of file system shown first
**returns The currently choosen file system.
**/
function FDISK_listSupportedFS($selName,$showFirst)
{
	if ($showFirst==-1)
		$list[0] = "-";
	else
		$list = FDISK_getSupportedFS();

	$emptyVar="";
	
	return(HTML_listSelection($selName,$list,$emptyVar));
};






/**
**name FDISK_listInstPartSelector($param,  $default, $type, $selName)
**description lists all partitions to select for swap and install partition
**parameter param: parameter string containing status informations about the harddisks
**parameter default: partition that should be shown as selected
**parameter type: array with filesystems that are possible for installation or swap
**parameter selName: name of the selection
**/
function FDISK_listInstPartSelector($param, $type, $selName, $addSizesAndTypes = true)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$out="";
	$lNr = 0;
	$list = array();

	for ($vDev=0; $vDev < $param['dev_amount']; $vDev++)
	{
		if (isset($param["dev$vDev"."_raidLvmLock"]))
			continue;

		$path = $param["dev$vDev"."_path"];
		//runs thru the partition numbers
		for ($vPart = 0; $vPart < $param["dev$vDev"."_partamount"]; $vPart++)
		{
			if (isset($param["dev$vDev"."part$vPart"."_raidLvmLock"]))
				continue;

			$fileSystem = $param["dev$vDev"."part$vPart"."_fs"];
			$fsType = $param["dev$vDev"."part$vPart"."_type"];

			if (($fsType != CFDiskIO::PT_EXTENDED) && 
				($fileSystem != -1) && 
				(($type[0]=="") || (in_array($fileSystem, $type))))
				{
					$partSize = $param["dev$vDev"."part$vPart"."_end"] - $param["dev$vDev"."part$vPart"."_start"];

					//Check if the partition is a partition and not a RAID
					if (strpos($path,"/dev/md") === false)
						$partNr = $param["dev$vDev"."part$vPart"."_nr"];
					else
						$partNr = '';

					$info = $path.$partNr.($addSizesAndTypes ? " $I18N_size:".$partSize." $I18N_filesystem:".$fileSystem." $I18N_type:".$fsType : '');

					//give out evice name (hda1,hda2,...), size, fs, partition type (primary, extended, logical
					$list[$info] = $info;
				}
		}
	}

	//Make sure, the MDs are at the end.
	$list = FDISK_mdToEndOfArray($list);

	HTML_selection($selName,$list,SELTYPE_selection,true);
}










/**
**name FDISK_defineDrive($client,$path,$size)
**description defines drive information for the clientBuilder
**parameter client: client name
**parameter path: path to the drive (/dev/hda, /dev/hdb, ...)
**parameter size: size of the drive in MB
**parameter upperI: upper tolerance border for disks with identical type
**parameter lowerI: lower tolerance border for disks with identical type
**parameter upperO: upper tolerance border for disks with other type
**parameter lowerO: lower tolerance border for disks with other type
**parameter asSpeciefied: use the speciefied disk, if it exists (is set to "yes" or empty)
**parameter sizeAdjustmentType: defines how the partitions should be adjusted, if there is more or less space on the client that the defined one. "system" increases or tries to keep the size of the system partition. "percentage" makes a percentage adjustment of all partitions.
**/
function FDISK_defineDrive($client,$path,$size,$upperI,$lowerI,$upperO,$lowerO,$asSpeciefied,$sizeAdjustmentType)
{
	CHECK_FW(CC_clientname, $client);

	$param["dev0_path"]="$path";
	$param["dev0_size"] = HELPER_calcMBSize($size);
	$param["dev_amount"]=1;
	$param["dev0_partamount"]=0;
	
// 	print_r($param);

	$sql="UPDATE `clients` SET `partitions` = '".implodeAssoc("###",$param)."' WHERE `client` = '$client'";

	db_query($sql); //FW ok

	$options=CLIENT_getAllOptions($client);
	$options['fdiskUpperToleranceIdentical']=$upperI;
	$options['fdiskLowerToleranceIdentical']=$lowerI;
	$options['fdiskUpperToleranceOther']=$upperO;
	$options['fdiskLowerToleranceOther']=$lowerO;
	$options['fdiskDefinedSize']=$size;
	$options['fdiskSpecifiedPath']=$path;
	$options['fdiskUseSpecified']= $asSpeciefied;
	$options['fdiskAdjustmentType']=$sizeAdjustmentType;

	CLIENT_setAllOptions($client,$options);
};





/**
**name FDISK_getDiskType($path)
**description returnes the type of the drive (CFDiskBasic::DISK_TYPE_IDE, CFDiskBasic::DISK_TYPE_SCSI)
**parameter path: the path to the device (e.g. /dev/hde)
**/
function FDISK_getDiskType($path)
{
	if (!(strpos($path,"/dev/hd") === FALSE))
		return(CFDiskBasic::DISK_TYPE_IDE);
	
	if (!(strpos($path,"/dev/sd") === FALSE))
		return(CFDiskBasic::DISK_TYPE_SCSI);
		
	return(-1);
};





/**
**name FDISK_getDrivePartitionSize($vDev,$vPart,$param)
**description Calculates the size of a drive or partition.
**parameter vDev: Virtual (internally used) device number.
**parameter vPart: Virtual (internally used) partition number. This is normally another number than the physical number (e.g. 0 on /dev/hda1)
**parameter param: parameter string containing status information about the harddisks
**returns Size of the drive or partition in MB.
**/
function FDISK_getDrivePartitionSize($vDev,$vPart,$param)
{
	if ($vPart === false)
		return($param["dev$vDev"."_size"]);
	else
		return($param["dev$vDev"."part$vPart"."_end"] - $param["dev$vDev"."part$vPart"."_start"]);
}





/**
**name FDISK_deleteDriveFromParam($vDev, $param)
**description Deletes all drive and partition parameters of a drive from param without correcting any order.
**parameter vDev: Virtual (internally used) device number of the drive to delete.
**parameter param: parameter string containing status informations about the harddisks.
**returns Changed param without the drive.
**/
function FDISK_deleteDriveFromParam($vDev, $param)
{
	$i = 0;
	$delKeys = array();

	//Build an array that contains all keys, that belong to the choosen partition (generate all key names to delete)
	foreach($param as $key => $val)
	{
		if (strpos($key, "dev$vDev") !== false)
			$delKeys[$i++] = $key;
	}

	//Delete the choosen partition values
	$param = delFromArray($param,$delKeys);

	return($param);
}








/**
**name CFDiskIO::setClientName($clientName)
**description Sets the client name, if given via constructor.
**parameter clientName: String to check, if it is a valid client name.
**returns: true, if it is a valid client name, otherwise false.
**/
	private function setClientName($clientName)
	{
		if (!(CHECK_FW(true, CC_clientname, $clientName) === false) && $this->checkClientname($clientName))
		{
			$this->clientName = $clientName;
			return(true);
		}
		else
			return(false);
	}





/**
**name CFDiskIO::getClientName()
**description Gets the client name, if set via constructor.
**returns: Client name or dies, when no client name was set.
**/
	protected function getClientName()
	{
		return($this->getProperty($this->clientName, 'ERROR: $this->clientName not set.'));
	}





/**
**name CFDiskIO::getClientObject()
**description Gets the client object, of the client the partitioning belongs to.
**returns: Client object.
**/
	protected function getClientObject()
	{
		return($this->clientO);
	}

?>