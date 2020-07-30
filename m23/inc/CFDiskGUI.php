<?

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Class for visualisation of partitioning and formating.
$*/

class CFDiskGUI extends CFDiskBasic
{
	private $diskLayout = array();

/**
**name CFDiskBasic::__construct($in)
**description Constructor for new CFDiskGUI objects. The object holds all information about the partitioning (of a client and loads the values from the DB).
**parameter in: Name of an existing client (to load) or data of an empty disk.
**/
	public function __construct($in)
	{
		parent::__construct($in);
	}





/**
**name CFDiskGUI::__destruct()
**description Destructor for a CFDiskGUI object. Before the object is removed from the RAM, all settings are written to the DB.
**/
	function __destruct()
	{
		parent::__destruct();
	}





/**
**name CFDiskGUI::getFSHint($fs)
**description Extends selected file system names by hints.
**parameter fs: Name of the file system.
**returns Name of the file system potentially extended by a hint.
**/
	private function getFSHint($fs)
	{
		// Add a hint, if the filesystem is efi-boot
		if ($fs == CFDiskIO::PT_EFIBOOT) 
			return("$fs&nbsp;(*)");
		else
			return($fs);
	}





/**
**name CFDiskGUI::fdiskSessionSetter($newVal, $varName)
**description Generic function to store values in the client partition and format session or loads them.
**parameter newVal: The value to set or false for not changing.
**parameter varName: The name the value should be stored under in the client partition and format session.
**returns The current value.
**/
	private function fdiskSessionSetter($newVal, $varName)
	{
		if ($newVal !== false)
			$_SESSION['clientPartition'][$varName] = $newVal;

		return($_SESSION['clientPartition'][$varName]);
	}





/**
**name CFDiskGUI::fdiskSessionPage($newPage = false)
**description Stores the page in the session or loads it.
**parameter newPage: The new page to set or false for not changing.
**returns The current page.
**/
	public function fdiskSessionPage($newPage = false)
	{
		$ret = $this->fdiskSessionSetter($newPage, 'page');

		if (!isset($ret))
			return('fdisk');
		else
			return($ret);
	}





/**
**name FDISK_fdiskSessionReset($resetClientName = false)
**description Sets back all session variables (client name optionally) for partitioning and formating a client.
**parameter resetClientName: If set to true, the name of the client will be deleted too (and re-set by FDISK_fdiskSessionClient).
**/
	function fdiskSessionReset($reset = false)
	{
		if ($reset)
		{
			$this->fdiskSessionSetter('fdisk', 'page');
			$this->fdiskSessionSetter('clientPartitionFormat', 'helpPage');
			$this->resetWantedPartitioningAndSteps();
		}
	}





/**
**name CFDiskGUI::fdiskSessionHelpPage($newPage = false)
**description Stores the help page in the session or loads it.
**parameter newPage: The new help page to set or false for not changing.
**returns The current help page.
**/
	private function fdiskSessionHelpPage($newPage = false)
	{
		return($this->fdiskSessionSetter($newPage, 'helpPage'));
	}





/**
**name CFDiskGUI::getDiskLayoutEntryStart($vDisk, $layoutNr)
**description Gets the start position of a disk layout entry.
**parameter vDisk: Virtual (internally used) device number.
**parameter layoutNr: Number of the disk layout entry.
**returns Start position of a disk layout entry or dies, if not set.
**/
	private function getDiskLayoutEntryStart($vDisk, $layoutNr)
	{
		return($this->fdiskGetProperty($this->diskLayout[$vDisk][$layoutNr]['start'], "\$this->diskLayout[$vDisk][$layoutNr]['start'] not set"));
	}





/**
**name CFDiskGUI::getDiskLayoutEntryEnd($vDisk, $layoutNr)
**description Gets the end position of a disk layout entry.
**parameter vDisk: Virtual (internally used) device number.
**parameter layoutNr: Number of the disk layout entry.
**returns End position of a disk layout entry or dies, if not set.
**/
	private function getDiskLayoutEntryEnd($vDisk, $layoutNr)
	{
		return($this->fdiskGetProperty($this->diskLayout[$vDisk][$layoutNr]['end'], "\$this->diskLayout[$vDisk][$layoutNr]['end'] not set"));
	}





/**
**name CFDiskGUI::getDiskLayoutEntrySize($vDisk, $layoutNr)
**description Gets the size of a disk layout entry.
**parameter vDisk: Virtual (internally used) device number.
**parameter layoutNr: Number of the disk layout entry.
**returns Size of a disk layout entry or dies, if not set.
**/
	private function getDiskLayoutEntrySize($vDisk, $layoutNr)
	{
		return($this->fdiskGetProperty($this->diskLayout[$vDisk][$layoutNr]['size'], "\$this->diskLayout[$vDisk][$layoutNr]['size'] not set"));
	}





/**
**name CFDiskGUI::getDiskLayoutEntryType($vDisk, $layoutNr)
**description Gets the type of a disk layout entry.
**parameter vDisk: Virtual (internally used) device number.
**parameter layoutNr: Number of the disk layout entry.
**returns Type of a disk layout entry or dies, if not set.
**/
	private function getDiskLayoutEntryType($vDisk, $layoutNr)
	{
		return($this->fdiskGetProperty($this->diskLayout[$vDisk][$layoutNr]['type'], "\$this->diskLayout[$vDisk][$layoutNr]['type'] not set"));
	}





/**
**name CFDiskGUI::getDiskLayoutEntryFileSystem($vDisk, $layoutNr)
**description Gets the filesystem of a disk layout entry.
**parameter vDisk: Virtual (internally used) device number.
**parameter layoutNr: Number of the disk layout entry.
**returns Filesystem of a disk layout entry or dies, if not set.
**/
	private function getDiskLayoutEntryFileSystem($vDisk, $layoutNr)
	{
		return($this->fdiskGetProperty($this->diskLayout[$vDisk][$layoutNr]['fs'], "\$this->diskLayout[$vDisk][$layoutNr]['fs'] not set"));
	}





/**
**name CFDiskGUI::getFileSystemTranslator($fs)
**description Translates the filesystem names.
**parameter fs: Filesystem to translate.
**returns Translated filesystem.
**/
	public static function getFileSystemTranslator($fs)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($fs == -1 ? $I18N_no_filesystem : $fs);
	}





/**
**name CFDiskGUI::getPartitionTypeTranslator($type)
**description Translates the partition types.
**parameter type: Partition type to translate.
**returns Translated partition type.
**/
	public static function getPartitionTypeTranslator($type)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
		switch ($type)
		{
			case CFDiskIO::PT_PRIMARY:
				return($I18N_primary);
			case CFDiskIO::PT_EXTENDED:
				return($I18N_extended);
			case CFDiskIO::PT_LOGICAL:
				return($I18N_logical);
			case CFDiskIO::PT_FREE:
				return($I18N_freeSpaceWithoutPartition);
			case CFDiskIO::PT_EXTFREE:
				return($I18N_extfreeSpaceWithoutPartition);
			case CFDiskIO::PT_EFI:
				return($I18N_efiPartition);
			default:
				return($type);
		}
	}





/**
**name CFDiskGUI::getDiskLayoutEntryDev($vDisk, $layoutNr)
**description Gets the device name of a disk layout entry.
**parameter vDisk: Virtual (internally used) device number.
**parameter layoutNr: Number of the disk layout entry.
**returns Device name of a disk layout entry or dies, if not set.
**/
	private function getDiskLayoutEntryDev($vDisk, $layoutNr)
	{
		return($this->fdiskGetProperty($this->diskLayout[$vDisk][$layoutNr]['dev'], "\$this->diskLayout[$vDisk][$layoutNr]['dev'] not set", ''));
	}




/**
**name CFDiskGUI::getDiskLayoutEntriesAmount($vDisk)
**description Gets the amount of disk layout entries.
**parameter vDisk: Virtual (internally used) device number.
**returns The amount of disk layout entries.
**/
	private function getDiskLayoutEntriesAmount($vDisk)
	{
		if (isset($this->diskLayout[$vDisk]))
			return(count($this->diskLayout[$vDisk]) - 2);
		else
			return(0);
	}





/**
**name CFDiskGUI::getFreeSpaceHTMLColor()
**description Gets the HTML color for marking free space.
**returns HTML color for marking free space.
**/
	private function getFreeSpaceHTMLColor()
	{
		return($this->getHTMLColorForFilesystemOrType(CFDiskIO::PT_FREE));
	}





/**
**name CFDiskGUI::showFreeSpaceBarBlock($dev, $start, $end, $width, $type, $addJavaScript)
**description Shows a block for with free space in the bar visualising the partitioning of a disk.
**parameter pDisk: The physical device name of the disk (eg. /dev/sda)
**parameter start: Start point of the partition (in MB)
**parameter end: End point of the partition (in MB)
**parameter width: The width of the block in percent (without % sign)
**parameter type: Type of the partition.
**parameter addJavaScript: Set to true to add JavaScript code that calls the JS function emptySpace(), if empty parts of the drive are clicked, selectPartition(), if a partition is clicked and showPartTable(), if the mouse is over the bar.
**/
	private function showFreeSpaceBarBlock($dev, $start, $end, $width, $type, $addJavaScript)
	{
		$this->dev2VDiskVPart($dev, $vDisk, $vPart);
		
		$this->getpDiskAndpPartFromDev($dev, $pDisk, $pPart);

		if ($addJavaScript)
			$js = "\nonMouseOver=\"showPartTable('partTables$pDisk'); markPartTableEntry('PartTableEntry".$this->getPartTableEntryNr($vDisk, $start, $end)."')\" onClick=\"emptySpace($start, $end, '$pDisk')".$this->getJSSelectPartTypeForNewPartitions($vDisk, $start, $end)."\"\n";
		else
			$js = '';

		$extraCSS = $this->getExtraCSSForExtended($type);

		echo("<td $extraCSS $js bgcolor=\"".$this->getHTMLColorForFilesystemOrType($type)."\" width=\"$width%\"><center><H3></H3></center></td>");
	}





/**
**name CFDiskGUI::showEmptyDiskTable($pDisk, $addJavaScript)
**description Shows a table with block for an empty disk (if the disk has no partitions)
**parameter pDisk: The physical device name of the disk (eg. /dev/sda)
**parameter addJavaScript: Set to true to add JavaScript code that calls the JS function emptySpace(), if empty parts of the drive are clicked, selectPartition(), if a partition is clicked and showPartTable(), if the mouse is over the bar.
**returns true, if the disk has no partitions, otherwise false.
**/
	private function showEmptyDiskTable($pDisk, $addJavaScript)
	{
		$this->dev2VDiskVPart($pDisk, $vDisk, $vPart);

		// If the disk is empty => return
		if ($this->getPartAmount($vDisk) > 0)
			return(false);

		// Add javascript (or not)
		if ($addJavaScript)
			$js = "onClick=\"selectPartition('$pDisk','$pDisk'); emptySpace(0, ".$this->getDiskSize($vDisk).", '$pDisk')\" onMouseOver=\"showPartTable('partTables$pDisk'); markPartTableEntry('PartTableEntry-Empty')\"";
		else
			$js = '';

		// Show the complete table with empty disk
		echo("<table id=\"fdiskbar\" bgcolor=\"".$this->getFreeSpaceHTMLColor()."\" cellspacing=\"1\" cellpadding=\"1\" border=\"2\" width=\"100%\" height=\"40\" $js ><tr><td align=\"center\">".$this->getDriveInfoIcon($vDisk)."</td></tr></table>");

		return(true);
	}





/**
**name CFDiskGUI::getPartitionExtraIconHTML($dev)
**description Returns HTML code for showing an icon for installation or swap partition.
**parameter dev: the Device of the partition.
**returns HTML code for showing an icon for installation or swap partition, if the given device is installation or swap partition. Otherwise empty string.
**/
	private function getPartitionExtraIconHTML($dev)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$extraIcon = '';
		if ($dev == $this->getInstPartDev())
			$extraIcon = "<img width=16 height=16 src=\"/gfx/instPart.png\" title=\"$I18N_installationPartition\" alt=\"$I18N_installationPartition\">";
		elseif ($dev == $this->getSwapPartDev())
			$extraIcon = "<img width=16 height=16 src=\"/gfx/swapPart.png\" title=\"$I18N_swapPartition\" alt=\"$I18N_swapPartition\">";
			
		return($extraIcon);
	}





/**
**name CFDiskGUI::getExtraCSSForExtended($type)
**description Returns CSS code for marking partitions or free space on the extended partition.
**parameter type: Type of the partition.
**returns CSS code for marking partitions or free space on the extended partition.
**/
	private function getExtraCSSForExtended($type)
	{
		switch ($type)
		{
			case CFDiskIO::PT_LOGICAL:
			case CFDiskIO::PT_EXTENDED:
			case CFDiskIO::PT_EXTFREE:
				return ('style="border-color:#ff0; border-width:2px; border-style:solid; padding:5px"');
			default:
				return('');
		}
	}





/**
**name CFDiskGUI::showPartitionBarBlock($dev, $start, $end, $width, $type, $fileSystem, $addJavaScript)
**description Shows a block for with free space in the bar visualising the partitioning of a disk.
**parameter pDisk: The physical device name of the disk (eg. /dev/sda)
**parameter start: Start point of the partition (in MB)
**parameter end: End point of the partition (in MB)
**parameter width: The width of the block in percent (without % sign)
**parameter type: Type of the partition.
**parameter fileSystem: Filesystem name.
**parameter addJavaScript: Set to true to add JavaScript code that calls the JS function emptySpace(), if empty parts of the drive are clicked, selectPartition(), if a partition is clicked and showPartTable(), if the mouse is over the bar.
**/
	private function showPartitionBarBlock($dev, $start, $end, $width, $type, $fileSystem, $addJavaScript)
	{
		$this->dev2VDiskVPart($dev, $vDisk, $vPart);
		
		$this->getpDiskAndpPartFromDev($dev, $pDisk, $pPart);

		//Generate icon and info string with information about the current partition
		$infoIcon = $this->getPartInfoIcon($vDisk, $vPart);

		// HTML code for showing an extra icon for installation or swap partition.
		$extraIcon = $this->getPartitionExtraIconHTML($dev);
	
	
		//if fileSystem is -1 it should be extended partition (has no fileSystem)
		if ($type != CFDiskIO::PT_EXTENDED)
		{
			if ($addJavaScript)
				$js = " onMouseOver=\"showPartTable('partTables$pDisk'); markPartTableEntry('PartTableEntry".$this->getPartTableEntryNr($vDisk, $start, $end)."')\" onClick=\"selectPartition('$dev','$pDisk')\"";
			else
				$js = '';
		}

		$extraCSS = $this->getExtraCSSForExtended($type);

		echo("<td $js $extraCSS bgcolor=\"".$this->getHTMLColorForFilesystemOrType($fileSystem)."\" width=\"$width%\"><center><b>$pPart</b>$infoIcon$extraIcon</center></td>");
	}





/**
**name CFDiskGUI::printBars($pDisk, $addJavaScript = false)
**description prints the partitions as colored table
**parameter pDisk: selected device (e.g. /dev/hda)
**parameter addJavaScript: Set to true to add JavaScript code that calls the JS function emptySpace(), if empty parts of the drive are clicked, selectPartition(), if a partition is clicked and showPartTable(), if the mouse is over the bar.
**/
	private function printBars2($pDisk, $addJavaScript = false)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Get the vDisk and the amount of partitions of the given disk
		$this->dev2VDiskVPart($pDisk, $vDisk, $vPart);
		$partAmount = $this->getPartAmount($vDisk);
		$diskSize = $this->getDiskSize($vDisk);

		// Show a table with block for an empty disk (if the disk has no partitions)
		if ($this->showEmptyDiskTable($pDisk, $addJavaScript) === true)
			return(false);

		$this->updateDiskLayout($vDisk);

		// Begin a new table for a disk with JS code for choosing the disk if it is empty
		echo("<table id=\"fdiskbar\" cellspacing=\"1\" cellpadding=\"1\" border=\"2\" width=\"100%\" height=\"40\"><tr>");

		for ($layoutNr = 0; $layoutNr < $this->getDiskLayoutEntriesAmount($vDisk); $layoutNr++)
		{
			// Get the type of the partition (free space)
			$type = $this->getDiskLayoutEntryType($vDisk, $layoutNr);
			
			// Filesystem
			$fileSystem = $this->getDiskLayoutEntryFileSystem($vDisk, $layoutNr);

			// Get start and end position of the partition or space and its size
			$start = $this->getDiskLayoutEntryStart($vDisk, $layoutNr);
			$end = $this->getDiskLayoutEntryEnd($vDisk, $layoutNr);
			$size = $this->getDiskLayoutEntrySize($vDisk, $layoutNr);

			// Get the device name, if a partition
			$dev = $this->getDiskLayoutEntryDev($vDisk, $layoutNr);

			if ($diskSize == 0)
				$diskSize = 1;
			
			// Calculate the width of the block
			$width = ceil(($size / $diskSize)*100);

			if ($this->isTypeFreeSpace($type))
				$this->showFreeSpaceBarBlock($dev, $start, $end, $width, $type, $addJavaScript);
			else
				$this->showPartitionBarBlock($dev, $start, $end, $width, $type, $fileSystem, $addJavaScript);
		}

		echo("</tr></table>");
	}





/**
**name CFDiskGUI::showPartTable2($vDisk)
**description Shows the partition information for a disk as table.
**parameter vDisk: Virtual (internally used) device number.
**/
	private function showPartTable2($vDisk)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
		$this->updateDiskLayout($vDisk);

		echo("<table class=\"partTables\" align=\"center\" border=0 cellspacing=5>
		<tr>
			<td width=\"10\"></td>
			<td><span class=\"subhighlight\">$I18N_partition</span></td>
			<td><span class=\"subhighlight\">$I18N_type</span></td>
			<td><span class=\"subhighlight\">$I18N_filesystem</span></td>
			<td><span class=\"subhighlight\">$I18N_size</span></td>
			<td><span class=\"subhighlight\">$I18N_range</span></td>
		</tr>");

		// If there are no partitions => All space is free
		if ($this->getPartAmount($vDisk) == 0)
		{
			$diskSize = $this->getDiskSize($vDisk);

			// If the disk has a valid size => Show an entry for the whole disk
			if ($diskSize > 0)
			{
				echo("<tr id=\"PartTableEntry-Empty\">
				<td width=\"20\" bgcolor=\"".$this->getFreeSpaceHTMLColor()."\"></td>
				<td>-</td><td>-</td><td>-</td><td>$diskSize</td>
				<td>0 - $diskSize</td>
				</tr>");
			}
		}
		else
		for ($layoutNr = 0; $layoutNr < $this->getDiskLayoutEntriesAmount($vDisk); $layoutNr++)
		{
			// Get the type of the partition (free space)
			$type = $this->getDiskLayoutEntryType($vDisk, $layoutNr);
			
			// Filesystem and its HTML color code
			$fileSystem = $this->getDiskLayoutEntryFileSystem($vDisk, $layoutNr);
			$htmlColor = $this->getHTMLColorForFilesystemOrType($fileSystem);

			// Get start and end position of the partition or space and its size
			$start = $this->getDiskLayoutEntryStart($vDisk, $layoutNr);
			$end = $this->getDiskLayoutEntryEnd($vDisk, $layoutNr);
			$size = $this->getDiskLayoutEntrySize($vDisk, $layoutNr);

			// Get the device name, if a partition
			$dev = $this->getDiskLayoutEntryDev($vDisk, $layoutNr);

			//Add information about the partitions, the RAID is build from, if it's a RAID
			if ($this->isDevRaid($dev))
				$raidInfoAdd = '<p>'.$this->getRaidTable($dev).'</p>';
			else
				$raidInfoAdd = '';

			$partTableEntryNr = $this->getPartTableEntryNr($vDisk, $start, $end);
			$nextID = 'id="PartTableEntry'.$partTableEntryNr.'"';

			// Don't show the device name, if the space is empty
			if ($this->isTypeFreeSpace($type))
			{
				// Remove the device name for free spaces, that are not in an extended partition (which has a partition number)
				if ($type != CFDiskIO::PT_EXTFREE)
					$dev = '';
				$htmlColor = $this->getHTMLColorForFilesystemOrType($type);
			}

			echo("
			<tr $nextID>
				<td width=\"20\" bgcolor=\"$htmlColor\"></td>
				<td>$dev</td>
				<td>".$this->getPartitionTypeTranslator($type)."$raidInfoAdd</td>
				<td>".$this->getFSHint($this->getFileSystemTranslator($fileSystem))."</td>
				<td>$size</td>
				<td>$start - $end</td>
			</tr>");

		}

		echo("</table>");
	}





/**
**name CFDiskGUI::addDiskLayoutEntry($vDisk, $start, $end, $type, $fs, $dev = false)
**description Adds a new entry (partition or free space on a disk) to the disk layout (for rendering only).
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter start: start point of the partition (in MB)
**parameter end: end point of the partition (in MB)
**parameter type: type of the partition (primary, logical)
**parameter fs: File system.
**parameter dev: Device name (optional)
**/
	private function addDiskLayoutEntry($vDisk, $start, $end, $type, $fs, $dev = false)
	{
		// "-2" because $this->diskLayout[$vDisk]['extStart'] and ['extEnd'] MUST NOT be counted
		$layoutNr = $this->getDiskLayoutEntriesAmount($vDisk);

		// Check, if free space should be added and if it needs to be splitted
		if ($type === CFDiskIO::PT_FREE)
		{
			// Free space is completely in the extended partition => change type from CFDiskIO::PT_FREE to CFDiskIO::PT_EXTFREE
			if (($start >= $this->diskLayout[$vDisk]['extStart']) && ($end <= $this->diskLayout[$vDisk]['extEnd']))
				$type = CFDiskIO::PT_EXTFREE;
			// Free space begins before and reaches in the extended partition => Split the entry into two parts (free space before the extended partition and extfree space in the extended partition)
			elseif (($start < $this->diskLayout[$vDisk]['extStart']) && ($end > $this->diskLayout[$vDisk]['extStart']))
			{
				$this->addDiskLayoutEntry($vDisk, $start, $this->diskLayout[$vDisk]['extStart'], $type, $fs, $dev);
				$this->addDiskLayoutEntry($vDisk, $this->diskLayout[$vDisk]['extStart'], $end, $type, $fs, $dev);
				return(true);
			}
			// Free space begins in and goes over the extended partition => Split the entry into two parts (extfree space in the extended partition and free space after the extended partition)
			elseif (($start < $this->diskLayout[$vDisk]['extEnd']) && ($end > $this->diskLayout[$vDisk]['extEnd']))
			{
				$this->addDiskLayoutEntry($vDisk, $start, $this->diskLayout[$vDisk]['extEnd'], $type, $fs, $dev);
				$this->addDiskLayoutEntry($vDisk, $this->diskLayout[$vDisk]['extEnd'], $end, $type, $fs, $dev);
				return(true);
			}
		}
		if ($type === CFDiskIO::PT_EXTENDED)
			$type = CFDiskIO::PT_EXTFREE;

		// Add a layout entry
		$this->diskLayout[$vDisk][$layoutNr]['start'] = $start;
		$this->diskLayout[$vDisk][$layoutNr]['end'] = $end;
		$this->diskLayout[$vDisk][$layoutNr]['size'] = $end - $start;
		$this->diskLayout[$vDisk][$layoutNr]['type'] = $type;
		$this->diskLayout[$vDisk][$layoutNr]['fs'] = $fs;
		if ($dev !== false)
			$this->diskLayout[$vDisk][$layoutNr]['dev'] = $dev;
		else
			$this->diskLayout[$vDisk][$layoutNr]['dev'] = '-';
	}





/**
**name CFDiskGUI::newDiskLayout($vDisk)
**description Creates a new disk layout for a given disk.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns true, if the disk layout will be calculated, false, if it is in the cache 
**/
	private function newDiskLayout($vDisk)
	{
		// Check, if the disk layout was calculated by a previous run => Don't calculate it again
		if (isset($this->diskLayout[$vDisk]))
			return(false);

		// Start with an empty array
		$this->diskLayout[$vDisk] = array();

		// Get information about a (maybe) existing extended partition
		$extvPart = $this->getExtendedVPart($vDisk);
		if ($extvPart !== false)
		{
			$this->diskLayout[$vDisk]['extStart'] = $this->getPartitionStart($vDisk, $extvPart);
			$this->diskLayout[$vDisk]['extEnd'] = $this->getPartitionEnd($vDisk, $extvPart);
		}
		else
			$this->diskLayout[$vDisk]['extStart'] = $this->diskLayout[$vDisk]['extEnd'] = false;

		return(true);
	}





/**
**name CFDiskGUI::updateDiskLayout($vDisk)
**description Updates the disk layout for a given disk, if it is not in the cache.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns true, if the disk layout was calculated, false, if it is in the cache 
**/
	private function updateDiskLayout($vDisk)
	{
		$diskSize = $this->getDiskSize($vDisk);
		$partAmount = $this->getPartAmount($vDisk);
		$layoutNr = 0;
		$lastEnd = 0;

		// Only calculate the disk layout, if it is not in the chache
		if ($this->newDiskLayout($vDisk) === false)
			return(false);

		// If there are no partitions => the whole disk is free
		if ($partAmount == 0)
			$this->addDiskLayoutEntry($vDisk, 0, $diskSize, CFDiskIO::PT_FREE, -1, $this->getDiskDev($vDisk));
		else
		{
			for ($vPart = 0; $vPart < $partAmount; $vPart++)
			{
				// Get information about the current partition
				$type = $this->getPartitionType($vDisk, $vPart);
				/*
					Skip the partition, if it is an extended partition and if there is at least one logical partition
					If there is at least one logical partition, the free space before and after can be calculated, otherwise the extended partition is needed for calculation.
				*/
				if (($type == CFDiskIO::PT_EXTENDED) && (0 < $this->getPartitionAmountOfType($vDisk, CFDiskIO::PT_LOGICAL))) continue;
				$start = $this->getPartitionStart($vDisk, $vPart);
				$end = $this->getPartitionEnd($vDisk, $vPart);
				$fs = $this->getPartitionFileSystem($vDisk, $vPart);
				$dev = $this->getPartitionDev($vDisk, $vPart);

				// Is there free space before the current partition?
				if ($start > $lastEnd)
					$this->addDiskLayoutEntry($vDisk, $lastEnd, $start, CFDiskIO::PT_FREE, -1, $this->getDiskDev($vDisk));

				// Add an entry for the current partition
				$this->addDiskLayoutEntry($vDisk, $start, $end, $type, $fs, $dev);

				$lastEnd = $end;
			}

			// Is there free space after the last partition?
			if ($lastEnd < $diskSize)
				$this->addDiskLayoutEntry($vDisk, $lastEnd, $diskSize, CFDiskIO::PT_FREE, -1, $this->getDiskDev($vDisk));
		}

		return(true);
	}





/**
**name CFDiskGUI::showCombinedFdiskGUIDialog()
**description Shows the new partition and formating screen.
**/
	public function showCombinedFdiskGUIDialog()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
		echo('
			<tr>
				<td align="center" colspan=3">
					<span class="title">'.$this->getClientName().'</span>');
					MSG_showMessageBoxPlaceholder();
		echo('
				</td>
			</tr>
			<tr>
				<td width="24%" rowspan=3 valign="top">');
				if (!$this->showFdiskCombinedGUIFunctions())
		echo('</td></tr>');
		else
		{
			echo('
					</td>
					<td width="76%" colspan=2 valign="top">');
						$this->printAllBars();
			echo('
					</td>
				</tr>
				<tr valign="top">
					<td width="38%" valign="top">
						<span class="titlesmal">'.$I18N_waitingPartitioningAndFormatingJobs.'</span><br><br><div style="overflow: auto; height: 400px; padding: 5px;">');
						$this->listPartJobs();
			echo('</div>
					</td>
					<td width="38%" valign="top">');
						$this->showAllPartTables();
						$this->showColorDefinitions();
			echo('
					</td>
				</tr>
				<tr>
					<td width="76%" colspan=2 valign="top">');
					$this->fstabAddDialog();
			echo('
					</td>
				</tr>
				<tr>
					<td align="center" colspan=3 valign="top">
						<input type="submit" name="BUT_refresh" value="'.$I18N_refresh.'"> &nbsp;&nbsp;&nbsp; '.BUT_reset.'&nbsp;&nbsp;&nbsp; '.BUT_discardLastAction.' &nbsp;&nbsp;&nbsp; '.BUT_finalisePartitioningAndselectClientDistribution.'
					</td>
				</tr>
		
				<script>

				// Checks, if the type of the new partition to be creates is "efi-boot" and if yes, changes the start and end position of the partition
				function setEFIStartEndPositionIfEFIBootPartitionTypeIsSet()
				{
					var sel = document.getElementsByName("SEL_newPart_type");
					if ( "'.CFDiskIO::PT_EFIBOOT.'" == sel[0].value)
					{
						document.getElementsByName("ED_newPart_start")[0].value="'.CFDiskIO::EFIBOOT_PART_START.'";
						document.getElementsByName("ED_newPart_end")[0].value="'.CFDiskIO::EFIBOOT_PART_END.'";
						document.htmlform.ED_newPart_start.disabled = true;
						document.htmlform.ED_newPart_end.disabled = true;
					}
				}
		
				function setSelectionElement(selName, val)
				{
					//Get the dialog element with the name "selName"
					var sel = document.getElementsByName(selName);
					var i;
		
					//Run thru all its options
					for (i=0; i < sel[0].options.length; i++)
					{
						//Check, if the option with the desired value was found.
						if (sel[0].options[i].value == val)
							break;
					}

					//Make the found option the selected
					sel[0].selectedIndex = i;
				}

				function selectPartTypeForNewPartitions(type)
				{
					setSelectionElement("SEL_newPart_type", type);
				}

				function selectDrive(drive)
				{
					setSelectionElement("SEL_currentDisk", drive);
				}

				function showPartTable(it)
				{
					var i;
					for (i=0; i < document.getElementsByName("partTables").length; i++)
						document.getElementsByName("partTables")[i].style.display = "none";
					document.getElementById(it).style.display = "block";
				}

				function emptySpace(from, to, drive)
				{
					document.getElementsByName("ED_newPart_start")[0].value=from;
					document.getElementsByName("ED_newPart_end")[0].value=to;
					selectDrive(drive);
				}

				function selectPartition(dev, drive)
				{
					setSelectionElement("SEL_currentPartDev", dev);
					selectDrive(drive);
					setSelectionElement("SEL_fstabPart", dev);
				}

				function markPartTableEntry(id)
				{
					//Get all HTML elements
					var allElems=document.getElementsByTagName(\'*\');

					//Run thru the elements
					for (var i = 0; i < allElems.length; i++)
					{
						//Get the ID of the current element
						var elemID = allElems[i].getAttribute("id");
	
						//Check if it has an ID and if it is an PartTableEntry. If yes => Make it transparent
						if ((elemID != null) && (elemID.search(/PartTableEntry.+/) != -1))
							allElems[i].style.backgroundColor = "transparent";
					}
	
					//Make the choosen partition table entry orange
					document.getElementById(id).style.backgroundColor = "#FF9933";
				}
		
				showPartTable(\'partTables'.$this->getInstPartDev().'\');
				</script>
			');
		}
		
		echo(HTML_hiddenVar('client', $this->getClientName()));
		HTML_setPage($this->fdiskSessionPage());
		
		HTML_JSMenuCloseAllEntries('fdiskMenu');
		$this->showMessages();
		$this->deleteAllMessages();
	}






/**
**name CFDiskGUI::getCurrentDiskDev()
**description Returns the currently choosen (in the GUI) disk device name.
**returns Currently choosen (in the GUI) disk device name.
**/
	private function getCurrentDiskDev()
	{
		return(isset($_POST['SEL_currentDisk']) ? $_POST['SEL_currentDisk'] : '');
	}





/**
**name CFDiskGUI::getCurrentDiskvDev()
**description Returns the currently choosen (in the GUI) virtual disk number.
**returns Currently choosen (in the GUI) virtual disk number.
**/
	private function getCurrentDiskvDev()
	{
		$this->dev2VDiskVPart($this->getCurrentDiskDev(), $vDisk, $vPart);
		return($vDisk);
	}





/**
**name CFDiskGUI::getCurrentPartDev()
**description Returns the currently choosen (in the GUI) partition device name.
**returns Currently choosen (in the GUI) partition device name.
**/
	private function getCurrentPartDev()
	{
		return($_POST['SEL_currentPartDev']);
	}





/**
**name CFDiskGUI::finalChecksAndRealPartitionAndFormatStart()
**description Does some final checks, adds the partitioning and formating job and switches to the distribution selection page.
**/
	private function finalChecksAndRealPartitionAndFormatStart()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$ret = false;

		// Check if an installation partition was selected
		if ($this->getInstPartDev() === false)
			$this->addErrorMessage($I18N_no_instpartition_selected);

		// Check if a swap partition was selected
		if ($this->getSwapPartDev() === false)
			$this->addErrorMessage($I18N_no_swappartition_selected);

		// Check if a EFI boot partition was selected (if the system uses EFI)
		if ($this->isUEFIActive() && ($this->getEFIBootPartDev() == false))
			$this->addErrorMessage($I18N_no_EFIBootpartition_selected);

			//check if we use the same partition for install and swap
		if (!$this->hasErrors() && ($this->getInstPartDev() != $this->getSwapPartDev()))
		{
			if (!$this->areAllRaidsComplete())
				return(false);
		
			// Add possibly existing RAID jobs
			$this->createAllRaidJobs();

			$this->makeInstOrEFIPartBootable();

			// Add the partition and format job (without parameters: new format)
			$this->addJob("m23fdiskFormat",PKG_getSpecialPackagePriority("m23fdiskFormat"),'');
			// Get new partition data after partitioning
			$this->addJob("m23Presetup",PKG_getSpecialPackagePriority("m23fdiskFormat")+1,"" );

			$this->discardUndo();

			$this->addInfoMessage($I18N_data_saved);

			return(true);
		}
		else
			return(false);
	}





/**
**name CFDiskGUI::showFdiskCombinedGUIFunctions()
**description Shows the menu bar with integrated logic for CFDiskGUI::showCombinedFdiskGUIDialog.
**/
	private function showFdiskCombinedGUIFunctions()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$defineDiskHTML = '';

		//Define edit lines for begin and end of the new partition
		$newPartStart = HTML_input('ED_newPart_start', false, 6);
		$newPartEnd = HTML_input('ED_newPart_end', false, 6);

		// Disable the buttons on defined clients that have no (virtual) disks
		if ((count($this->getDiskDevs()) == 0) && $this->isDefinedClient())
			$buttonsEnabled = false;
		else
			$buttonsEnabled = true;


		// Undo

			// Resets all partitioning and formating done by the webinterface
			if (HTML_submit('BUT_reset', $I18N_reset) && $buttonsEnabled)
				$this->resetWantedPartitioningAndSteps();


			// Discards the last action
			if (HTML_submit('BUT_discardLastAction', $I18N_discardLastAction) && $buttonsEnabled)
				$this->backToPreviousPartitionStep();



		// RAID creation controls

			// RAID level selector
			foreach ($this->getRaidLevelNumbers() as $l)
				$raidLevelArr[$l] = "RAID-$l";
			$newRaidLevel = HTML_selection('SEL_newRaidLevel', $raidLevelArr, SELTYPE_selection);
		
			// Selector and create button for a new RAID disk (/dev/mdX)
			$newRaidDev = HTML_selection("SEL_newRaidDev", $this->getUnusedMDs(), SELTYPE_selection);

			if (HTML_submit('BUT_createNewRaid', $I18N_createRAIDDrive) && $buttonsEnabled)
				$this->createRaid($newRaidDev, $newRaidLevel);



		// Assign a disk or partition to a RAID

			// The RAID device the disk or partition should be assigned to
			$existingRaidDev = HTML_selection('SEL_existingRaidDev', $this->getUsedMDs(), SELTYPE_selection);
			HTML_submit('BUT_chooseRaidSel', $I18N_select);

			// Adds a real drive or partition to a RAID
			if (HTML_submit('BUT_assignDeviceToRaid', $I18N_addToRAID) && $buttonsEnabled)
				$this->assignDeviceToRaid($existingRaidDev, $_POST['SEL_devToAssignToRaid']);

			// Selection with disks and partitions that may be assigned to the RAID (This may have changed by BUT_assignDeviceToRaid)
			HTML_selection('SEL_devToAssignToRaid', $this->getDrivesAndPartitions('!/dev/md', true, true), SELTYPE_selection);



		// Partitioning and formating schemes

			// Choosing and execution of partition schemes
			$partitionSchemes[CFDiskBasic::PM_auto] = $I18N_fdistTypeautomatic;
			$partitionSchemes[CFDiskBasic::PM_auto2048_4096] = $I18N_fdistTypeautomaticSwap2048_4096;
			$partitionSchemes[CFDiskBasic::PM_auto2Disk1SysSwap2Home] = $I18N_fdiskTypeautomatic2Disk1SysSwap2Home;
			$partitionSchemes[CFDiskBasic::PM_auto500GBsysSwapData] = $I18N_fdiskTypeautomatic500GBsysSwapData;
			
			$partitionScheme = HTML_selection('SEL_partitionSchemes', $partitionSchemes, SELTYPE_selection);

			// Apply a partition and formating scheme
			if (HTML_submit('BUT_executeScheme', $I18N_executeScheme) && $buttonsEnabled)
			{
				switch ($partitionScheme)
				{
					case CFDiskBasic::PM_auto:
						$this->autoPartitionDisk($this->getCurrentDiskDev());
						break;
					case CFDiskBasic::PM_auto2048_4096:
						$this->autoPartitionDisk($this->getCurrentDiskDev(), 2048, 4096);
						break;
					case CFDiskBasic::PM_auto2Disk1SysSwap2Home:
						$this->PM_auto2Disk1SysSwap2Home();
						break;
					case CFDiskBasic::PM_auto500GBsysSwapData:
						$this->PM_auto500GBsysSwapData($this->getCurrentDiskDev());
						break;
					default:
						return(false);
				}
			}



		// Creation of a new partition
		if (HTML_submit('BUT_newPart_add',$I18N_add) && $buttonsEnabled)
		{
			if (CFDiskIO::PT_EFIBOOT == $_POST['SEL_newPart_type'])
				$this->createUEFIPartition($this->getCurrentDiskDev());
			else
				$this->createPartition($this->getCurrentDiskDev(), $newPartStart, $newPartEnd, $_POST['SEL_newPart_type']);
		}



		// Deletion of a partition
		if (HTML_submit('BUT_deletePart', $I18N_delete) && $buttonsEnabled)
			$this->deletePartition($this->getCurrentPartDev(), true);



		// The possible types for new partitions may have changed by adding a new partition
		HTML_selection('SEL_newPart_type', $this->getCreatablePartitionTypes($this->getCurrentDiskvDev()), SELTYPE_selection, true, false, false, 'onchange="setEFIStartEndPositionIfEFIBootPartitionTypeIsSet();"');



		/***** Add dialog elements after this line, that may changed by the previous operations *****/

		if ($this->isDefinedClient())
		{
			$defineDiskSize = HTML_input('ED_defineDiskSize', false, 6);
			$defineDiskDev = HTML_selection('SEL_defineDiskDev', $this->getUnusedDiskDev(), SELTYPE_selection);
			
			if (HTML_submit('BUT_defineDisk', $I18N_create))
				$this->virtualAddDisk($_POST['SEL_defineDiskDev'], $defineDiskSize);

			$defineDiskHTML = HTML_jQueryMenu($I18N_virtual_disks, "<table width=\"100%\">
				<tr>
					<td><span class=\"subhighlight\">$I18N_diskName</span></td>
					<td>".SEL_defineDiskDev."</td>
				</tr>
				<tr>
					<td><span class=\"subhighlight\">$I18N_size (MB)</span></td>
					<td>".ED_defineDiskSize."</td>
				</tr>
				<tr>
					<td colspan=\"2\" align=\"center\">".BUT_defineDisk."</td>
				</tr>
			</table>");
		}


		// Contains the currently selected partition or RAID drive
		HTML_selection('SEL_currentPartDev', HELPER_array2AssociativeArray($this->getPartDevs(-1, '')), SELTYPE_selection);


		$allDiskDevs = $this->getDiskDevs();

		if (count($allDiskDevs) > 0)
			// Get the installation drive (e.g. for creating new partitions in free space)
			HTML_selection('SEL_currentDisk', $allDiskDevs, SELTYPE_selection);
		elseif ($this->isDefinedClient() === false)
		{
			MSG_showError($I18N_errorNoHardDiskDetected);
			exit(1);
		}
		else
			HTML_selection('SEL_currentDisk', array(), SELTYPE_selection);



		// Format the choosen partition
		$currentFormatFS = HTML_selection('SEL_formatFS', $this->getSupportedFS(), SELTYPE_selection, true, 'ext4');

		if (HTML_submit('BUT_formatPart', $I18N_format) && $buttonsEnabled)
			$this->formatPartition($this->getCurrentPartDev(), $currentFormatFS);



		// Check, if the distribution should be selected now and do some final checks
		if (HTML_submit('BUT_finalisePartitioningAndselectClientDistribution', $I18N_finalisePartitioningAndselectClientDistribution) && $buttonsEnabled && $this->finalChecksAndRealPartitionAndFormatStart())
		{
			//Add the next button for letting the browser call the distribution selection page
			HTML_submitDefine('BUT_next',$I18N_next);
			echo("<tr><td>".BUT_next."</td></tr>");

			$this->fdiskSessionPage('clientdistr');
			$this->fdiskSessionHelpPage('fdisk-distrselect');
	
			//Return here to hide the function menu and the rest of the partition and formating dialog
			return(false);
		}



		//Define the selectors for the installation and swap partition
		HTML_selection('SEL_instPart', HELPER_array2AssociativeArray($this->getPartDevs(-1, '', $this->installFilesystems())), SELTYPE_selection);
		HTML_selection('SEL_swapPart', HELPER_array2AssociativeArray($this->getPartDevs(-1, '', $this->swapFilesystems())), SELTYPE_selection);

		if (HTML_submit('BUT_chooseInstallAndSwapPartitions', $I18N_select) && $buttonsEnabled)
		{
			$this->setInstPartDev($_POST['SEL_instPart']);
			$this->setSwapPartDev($_POST['SEL_swapPart']);
		}



		echo("
				<p align=\"center\">
				<span class=\"titlesmal\">$I18N_currentDriveAndPartition</span>
					<table width=\"100%\">
						<tr>
							<td><span class=\"subhighlight\">$I18N_currentDrive</span></td>
							<td align=\"right\">".SEL_currentDisk."</td>
						</tr>
						<tr>
							<td><span class=\"subhighlight\">$I18N_currentPartition</span></td>
							<td align=\"right\">".SEL_currentPartDev."</td>
						</tr>
					</table>
				</p>
	
				<p><hr></p>
				".HTML_jQueryMenuHeader('fdiskMenu')."
				$defineDiskHTML
				".HTML_jQueryMenu($I18N_partitionScheme,'<center>'.SEL_partitionSchemes."<br>".BUT_executeScheme.'</center>')."
				".HTML_jQueryMenu($I18N_deleteCurrentPartition,'<center>'.BUT_deletePart.'</center>')."
				".HTML_jQueryMenu($I18N_add_new_partition, "<table width=\"100%\">
						<tr>
							<td><span class=\"subhighlight\">$I18N_type</span> </td>
							<td>".SEL_newPart_type."</td>
						</tr>
						<tr>
							<td><span class=\"subhighlight\">$I18N_start</span> </td>
							<td>".ED_newPart_start."</td>
						</tr>
						<tr>
							<td><span class=\"subhighlight\">$I18N_end</span> </td>
							<td>".ED_newPart_end."</td>
						</tr>
						<tr>
							<td colspan=\"2\" align=\"center\">".BUT_newPart_add."</td>
						</tr>
					</table>")."
				".HTML_jQueryMenu($I18N_formatPartition, "<table width=\"100%\">
						<tr>
							<td><span class=\"subhighlight\">$I18N_type</span></td>
							<td>".SEL_formatFS."</td>
						</tr>
						<tr>
							<td colspan=\"2\" align=\"center\">".BUT_formatPart."</td>
						</tr>
					</table>")."
				".HTML_jQueryMenu($I18N_raidDrives, "
					<span class=\"titlesmal\">$I18N_createRAIDDrive</span><br>
						<table width=\"100%\">
							<tr bgcolor=\"silver\">
								<td>
									<span class=\"subhighlight\">$I18N_raidDriveName</span>
								</td>
								<td>
									".SEL_newRaidDev."
								</td>
							</tr>
							<tr bgcolor=\"silver\">
								<td>
									<span class=\"subhighlight\">$I18N_raidLevel</span>
								</td>
								<td>
									".SEL_newRaidLevel."
								</td>
							</tr>
							<tr bgcolor=\"silver\"><td colspan=\"2\" align=\"center\">".BUT_createNewRaid."</td></tr>
						</table><br><br>
	
					<span class=\"titlesmal\">$I18N_addDrivesPartitionsToRaid</span><br><br>
						<table width=\"100%\">
							<tr bgcolor=\"lightgray\">
								<td>
									<span class=\"subhighlight\">$I18N_raidDrive</span>
								</td>
								<td>
									".SEL_existingRaidDev." ".BUT_chooseRaidSel."
								</td>
							</tr>
							<tr bgcolor=\"lightgray\">
								<td colspan=\"2\">
									<span class=\"subhighlight\">$I18N_assignedDrivesPartitions ($existingRaidDev)</span><br><br>
									".$this->getRaidTable($existingRaidDev, true)."
								</td>
							</tr>
							<tr bgcolor=\"silver\">
								<td colspan=\"2\">
									<span class=\"subhighlight\">$I18N_realDrivePartition</span>
								</td>
							</tr>
							<tr bgcolor=\"silver\">
								<td colspan=\"2\" align=\"center\">
									".SEL_devToAssignToRaid."<br>
									".BUT_assignDeviceToRaid."
								</td>
							</tr>
						</table>
						<br><br>
				")."
				".HTML_jQueryMenu($I18N_installationAndSwapPartition, "
					<table width=\"100%\">
						<tr>
							<td>
								<span class=\"subhighlight\">$I18N_installationPartition</span>
							</td>
							<td>
								".SEL_instPart."
							</td>
						</tr>
						<tr>
							<td>
								<span class=\"subhighlight\">$I18N_swapPartition</span>
							</td>
							<td>
								".SEL_swapPart."
							</td>
						</tr>
						<tr>
							<td colspan=\"2\" align=\"center\">
								".BUT_chooseInstallAndSwapPartitions."
							</td>
						</tr>
					</table>
				").
				HTML_jQueryMenuEnd('fdiskMenu')
				);
				
		return(true);
	}






/**
**name CFDiskGUI::getPartitionPercent($vDisk, $vPart)
**description Calculates the percentual size of a selected partition in comparison to the disk size.
**parameter vDisk: Virtual (internally used) device number.
**parameter vPart: Virtual (internally used) partition number. This is normally another number than the physical number (e.g. 1 on /dev/hda1)
**/
	private function getPartitionPercent($vDisk, $vPart)
	{
		$partSize = $this->getPartitionSize($vDisk, $vPart);
		$diskSize = $this->getDiskSize($vDisk);

		if ($diskSize==0)
			return(0);

		return(round(($partSize/$diskSize)*100));
	}





/**
**name CFDiskGUI::getHTMLColorForFilesystemOrType($fsOrType)
**description Get HTML color code for a given filesystem or partition type.
**parameter fsOrType: Name of the file system (ext3, ext2, linux-swap,...) or type of the partition (eg. CFDiskIO::PT_FREE)
**returns HTML color code for the file system or partition type.
**/
	private function getHTMLColorForFilesystemOrType($fsOrType)
	{
		// Also defined in: FDISK_colorFS
	
		// Supported filesystems
		if (stristr($fsOrType,'ext4')) return('#406BA9');
		if (stristr($fsOrType,'ext3')) return('#5186D4');
		if (stristr($fsOrType,'ext2')) return('#62A1FF');
		if (stristr($fsOrType,'linux-swap')) return('#BCE408');
		if (stristr($fsOrType,'reiserfs')) return('#FFEC73');

		// For UEFI
		if (stristr($fsOrType, CFDiskIO::PT_EFIBOOT)) return('#E23890'); // $COL_FAT16='#9D2764';

		// Not really filesystems:
		// Free space
		if (($fsOrType=='') || ($fsOrType==CFDiskIO::PT_FREE)) return('#FFFFFF');
		// Free space on an extended partition
		if ($fsOrType==CFDiskIO::PT_EXTFREE) return('#F0F0F0');

		// No filesystem
		if (stristr($fsOrType,'none') || ($fsOrType==-1)) return('#7FFFF2');
		// Should be extended partition
		if ($fsOrType=='ext') return('#999999');

		// Unsupported filesystems
		if (stristr($fsOrType,'ntfs')) return('#A83589');
		if (stristr($fsOrType,'HFS')) return('#58B94B');
		if (stristr($fsOrType,'jfs')) return('#E77911');
		if (stristr($fsOrType,'ufs')) return('#FF0000');
		if (stristr($fsOrType,'xfs')) return('#A742C3');
		// FAT*
		if (stristr($fsOrType,'fat')) return('#9D2764');
	}





/**
**name CFDiskGUI::getPartTableEntryNr($vDisk, $start, $end)
**description Generates a unique number for the partitions and free spaces on a disk bar and for the partition table (used in JavaScript).
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter start: Start position of the partition / free space.
**parameter end: End position of the partition / free space.
**returns Unique number
**/
	private function getPartTableEntryNr($vDisk, $start, $end)
	{
		return("$vDisk-$start-$end");
	}





/**
**name CFDiskGUI::getJSSelectPartTypeForNewPartitions($vDisk, $start, $end)
**description Get the first entry of the list of partition types that can be created in a range on a disk as selectPartTypeForNewPartitions JavaScript function.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter start: Start position (in MB) of the partition to create.
**parameter end: End position (in MB) of the partition to create.
**returns Call for selectPartTypeForNewPartitions with partition type that can be created or empty, if there no partion can be created.
**/
	private function getJSSelectPartTypeForNewPartitions($vDisk, $start, $end)
	{
		$types = $this->getPossiblePartitionTypesBetween($vDisk, $start, $end);
		return(isset($types[0]) ? "; selectPartTypeForNewPartitions('".$types[0]."')" : '');
	}





/**
**name CFDiskGUI::printAllBars()
**description Shows the partition bars of all disks specified for the current client.
**/
	public function printAllBars()
	{
		foreach ($this->getDiskDevs() as $dev)
		{
			$this->dev2VDiskVPart($dev, $vDisk, $vPart);
			echo("<br><span class=\"title\">$dev (".$this->getDiskSize($vDisk)." MB)</span>");
			$this->printBars2($dev, true);
			echo("<br>");
		}
	}





/**
**name CFDiskGUI::getPartInfoIcon($vDisk, $vPart)
**description Generates HTML code for showing an icon with status information about a drive or partition.
**parameter vDisk: Virtual (internally used) device number.
**parameter vPart: Virtual (internally used) partition number. This is normally another number than the physical number (e.g. 1 on /dev/hda1) and if set to false, the icon and the status information will be generated for a drive and not for a partition.
**returns HTML code for showing an icon with status information about the drive or partition.
**/
	function getPartInfoIcon($vDisk, $vPart)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		//Generate icon and info string with information about the current partition
		if ($vPart === false)
			$partInfoStr = $this->getDiskInfoString($vDisk);
		else
			$partInfoStr = $this->getPartInfoString($vDisk, $vPart);

		$infoIcon = "<img width=16 height=16 src=\"/gfx/info.png\" title=\"$partInfoStr\" alt=\"$partInfoStr\">";

		// Mark partitions that belong to a RAID
		if ($this->isDiskOrPartLockedByRaid($vDisk, $vPart))
			$infoIcon .= " <img width=16 height=16 src=\"/gfx/imaging.png\" title=\"$partInfoStr\" alt=\"$partInfoStr\">";

		return($infoIcon);
	}





/**
**name CFDiskGUI::getPartInfoString($vDisk, $vPart)
**description Generates an info string, that shows information about the device name of the partition, its filesystem and bolonging to a RAID.
**parameter vDisk: Virtual (internally used) device number.
**parameter vPart: Virtual (internally used) partition number. This is normally another number than the physical number (e.g. 1 on /dev/hda1)
**returns Info string.
**/
	private function getPartInfoString($vDisk, $vPart)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$addMP = '';

		$fileSystem = $this->getFileSystemTranslator($this->getPartitionFileSystem($vDisk, $vPart));
		$dev = $this->getPartitionDev($vDisk, $vPart);

		// Check, if the partition is used in a RAID and if yes, figure out which RAID it is
		if ($this->isPartitionLockedByRaid($vDisk, $vPart))
			$raidInfoAdd = ", $I18N_partOfTheRAID: ".$this->getBelongingRaidDev($dev);
		else
			$raidInfoAdd = '';
	
		$mountPoint = $this->findFstabMountPointByDev("$dev");
		if ($mountPoint !== false)
			$addMP = " $I18N_mountpoint: $mountPoint";
	
		$fileSystem = $this->getFSHint($fileSystem);
	
		return("$dev: $I18N_filesystem: $fileSystem$raidInfoAdd$addMP");
	}





/**
**name CFDiskGUI::getDiskInfoString($vDisk)
**description Generates an info string, that shows information about the device name of the drive and bolonging to a RAID.
**parameter vDisk: Virtual (internally used) device number.
**returns Info string.
**/
	private function getDiskInfoString($vDisk)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
		$addMP = '';
		$dev = $this->getDiskDev($vDisk);
		$diskSize = $this->getDiskSize($vDisk);

		// Check, if the disk is used in a RAID and if yes, figure out which RAID it is
		if ($this->isDiskLockedByRaid($vDisk))
			$raidInfoAdd = "$I18N_partOfTheRAID: ".$this->getBelongingRaidDev($dev);
		else
			$raidInfoAdd = '';
			
		$mountPoint = $this->findFstabMountPointByDev($dev);
		if ($mountPoint !== false)
			$addMP = " $I18N_mountpoint: $mountPoint";
	
		return("$dev: $I18N_size: $diskSize MB $raidInfoAdd$addMP");
	}





/**
**name CFDiskGUI::getDriveInfoIcon($vDisk)
**description Generates HTML code for showing an icon with status information about a drive.
**parameter vDisk: Virtual (internally used) device number.
**returns HTML code for showing an icon with status information about the drive.
**/
	private function getDriveInfoIcon($vDisk)
	{
		return($this->getPartInfoIcon($vDisk, false));
	}





/**
**name CFDiskGUI::listPartJobs()
**description Show all part jobs in the table.
**/
	private function listPartJobs()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Open the table and show the headings
		echo ("<table class=\"subtable\" align=\"center\" border=0 cellspacing=5>
		<tr>
			<td><span class=\"subhighlight\">$I18N_action</span></td>
			<td><span class=\"subhighlight\">$I18N_partition</span></td>
			<td><span class=\"subhighlight\">$I18N_description</span></td>
		</tr>");

		foreach ($this->getPartitionStepsArray() as $step)
		{
			switch ($step['command'])
			{
				case 'add':
				{ //create a partition
					echo("	<tr>
								<td>$I18N_add_new_partition</td>
								<td>".$step['dev']."</td>
								<td>$I18N_type: ".$this->getPartitionTypeTranslator($step['type'])." / $I18N_range:<br>".$step['start']." - ".$step['end']."
								</td>
							</tr>");
					break;
				}

				case 'rm':
				{
					echo("	<tr>
								<td>$I18N_delete</td>
								<td>".$this->getDevBypDiskpPart($step['dev'],$step['pPart'])."</td>
								<td></td>
							</tr>");
					break;
				};

				case 'format':
				{
					echo("	<tr>
								<td>$I18N_format</td>
								<td>".$step['dev']."</td>
								<td>$I18N_filesystem: ".$this->getFSHint($step['fs'])."</td>
							</tr>");
					break;
				}

				case 'bflag':
				{
					echo("	<tr>
								<td>$I18N_set_bootflag</td>
								<td>".$this->getDevBypDiskpPart($step['dev'],$step['pPart'])."</td>
								<td></td>
							</tr>");
					break;
				}

				case 'raid':
				{
					echo("	<tr>
								<td>$I18N_createRAIDDrive ($I18N_raidLevel ".$step['raidMode'].")</td>
								<td>".$step['raidDev']."</td>
								<td>".$step['devList']."</td>
							</tr>");
					break;
				}

				case 'raiddelete':
				{
					echo("	<tr>
								<td>$I18N_deleteRAIDDrive</td>
								<td>".$step['raidDev']."</td>
								<td></td>
							</tr>");
					break;
				}
			}
		}
			
		echo("</table>");
	}





/**
**name CFDiskGUI::showAllPartTables()
**description Shows the partition tables of all disks for the current client.
**/
	public function showAllPartTables()
	{
		for ($vDisk = 0; $vDisk < $this->getDiskAmount(); $vDisk++)
		{
			$pDisk = $this->getDiskDev($vDisk);
			$diskSize = $this->getDiskSize($vDisk);

			echo('
				<div name="partTables" id="partTables'.$pDisk.'">
					<span class="titlesmal">'.$pDisk.' ('.$diskSize.' MB)</span>
						<p>');
						$this->showPartTable2($vDisk);
			echo('</p>
				<br>
				</div>');
		}
	}






/**
**name CFDiskGUI::getRaidTable($raidDev, $withDeleteButtons = false)
**description Get informations about the assigned real disks/partitions of a RAID.
**parameter raidDev: Device name of the new drive (e.g. /dev/md0)
**parameter withDeleteButtons: If set to true, each line with a real disk/partition gets an extra button for deleting it from the RAID.
**returns HTML table with informations about the assigned real drives/partitions.
**/
	private function getRaidTable($raidDev, $withDeleteButtons = false)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
		$this->dev2VDiskVPart($raidDev, $vrDisk, $vrPart);
		
		if ($withDeleteButtons)
			$actionHeading = "<td><span class=\"subhighlight\">$I18N_action</span></td>";
		else
			$actionHeading = '';
		

		$out="<table class=\"subtable\" border=0 cellspacing=\"5\" align=\"center\">
		<tr>
			<td><span class=\"subhighlight\">$I18N_realDrivePartition</span></td>
			<td><span class=\"subhighlight\">$I18N_size</span></td>$actionHeading
		</tr>";


		// Store the sizes of the included drives and partitions of the RAID
		foreach ($this->getRaidDevsBuildingDisk($vrDisk) as $drivePartition)
		{
			$this->dev2VDiskVPart($drivePartition, $vDisk, $vPart);

			$htmlCode = '';
			$showLine = true;

			if ($withDeleteButtons)
			{
				$htmlName = 'BUT_delete'.urlencode($drivePartition);
				if (HTML_submit($htmlName, $I18N_delete))
				{
					$this->deleteDeviceFromRaid($raidDev, $drivePartition);
					$showLine = false;
				}
				$htmlCode = '<td>'.constant($htmlName).'</td>';
			}

			if ($showLine)
			$out.="
			<tr>
				<td>$drivePartition</td>
				<td>".$this->getPartitionSize($vDisk, $vPart)."</td>$htmlCode
			</tr>";
		}

		$out.="</table>";

		return($out);
	}





/**
**name CFDiskGUI::showColorDefinitions()
**description Shows the color definitions for the supported filesystems.
**/
	public function showColorDefinitions()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		echo("<table cellspacing=\"4\">
			<tr>
				<td width=\"20\">&nbsp;&nbsp;</td>
				<td width=\"20\">&nbsp;&nbsp;</td>
				<td><nobr><span class=\"titlesmal\">$I18N_supported_filesystems</span></nobr><br></td>
			</tr>
		");

		foreach($this->getSupportedFS() as $fs)
		{
			echo("
				<tr>
					<td width=\"20\">&nbsp;&nbsp;</td>
					<td width=\"20\" bgcolor=\"".$this->getHTMLColorForFilesystemOrType($fs)."\">&nbsp;&nbsp;</td>
					<td>".$this->getFSHint($fs)."</td>
				</tr>
			");
		}

		// List the "not filesystems" (free space or unformated partitions).
		echo("
			<tr>
				<td width=\"20\">&nbsp;&nbsp;</td>
				<td width=\"20\">&nbsp;&nbsp;</td>
				<td><nobr><span class=\"titlesmal\">$I18N_not_filesystems</span></nobr><br></td>
			</tr>
		");

		foreach ($this->getNotFS() as $notFS)
		{
			echo("
				<tr>
					<td width=\"20\">&nbsp;&nbsp;</td>
					<td width=\"20\" bgcolor=\"".$this->getHTMLColorForFilesystemOrType($notFS)."\">&nbsp;&nbsp;</td>
					<td>".$this->getFileSystemTranslator($notFS)."</td>
				</tr>
			");
		}

		echo("
		</table>");
	}






/**
**name CFDiskGUI::fstabAddDialog()
**description Shows a dialog (with logic) for adding fstab entries.
**/
	private function fstabAddDialog()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
		// Elements for the device to mount, the mountpoint and parameters for mounting
		$dev = HTML_selection('SEL_fstabPart', HELPER_array2AssociativeArray($this->getPartDevs(-1, '', $this->installFilesystems())), SELTYPE_selection);
		$mountpoint = HTML_input('ED_mnt');
		$parameter = HTML_input('ED_parameter','auto defaults,auto 0 0');

		// Add a new entry
		if (HTML_submit('BUT_addFstab',$I18N_add))
			$this->fdiskAddFstab($dev, $mountpoint, $parameter);

		echo("<br><br><nobr><span class=\"titlesmal\">$I18N_defineMountpoints</span></nobr><br><br>
		<table class=\"subtable\" align=\"center\" border=0 cellspacing=5>
		<tr>
		<td><span class=\"subhighlight\">$I18N_partition</span></td>
		<td><span class=\"subhighlight\">$I18N_mountpoint</span></td>
		<td><span class=\"subhighlight\">$I18N_parameter</span></td>
		<td></td>
		</tr>
	
		<tr>
		<td>".SEL_fstabPart."</td>
		<td>".ED_mnt."</td>
		<td>".ED_parameter."</td>
		<td>".BUT_addFstab."</td>
		</tr>
	
		<tr>
		<td colspan=\"3\">".$this->getFstabTable()."</td>
		</tr>
	
		</table>");
	}





/**
**name CFDiskGUI::getFstabTable()
**description Generates a HTML table with all fstab entries and logic for deleting entries.
**returns HTML table with the fstab.
**/
	private function getFstabTable()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
		$fstabAmount = isset($fstab['fstab_amount']) ? $fstab['fstab_amount'] : 0;
	
		$out="<table class=\"subtable\" border=0 cellspacing=\"5\" align=\"center\">
		<tr>
			<td><span class=\"subhighlight\">$I18N_partition</span></td>
			<td><span class=\"subhighlight\">$I18N_mountpoint</span></td>
			<td><span class=\"subhighlight\">$I18N_parameter</span></td>
			<td><span class=\"subhighlight\">$I18N_action</span></td>
		</tr>";
	
		foreach ($this->fdiskGetFstabArray() as $dev => $fstabArray)
		{
			// Encode the device name so it can be used as part of a name for a HTML button
			$devEncoded = urlencode($dev);
			// Name for the delete button for the specific device name
			$butName = "BUT_delFstab$devEncoded";

			if (HTML_submit($butName, $I18N_delete))
				$this->fdiskDelFstabEntry($dev);
			else
				$out.="
				<tr>
					<td>$dev</td>
					<td>".$fstabArray['mnt']."</td>
					<td>".$fstabArray['param']."</td>
					<td>".constant($butName)."</td>
				</tr>";
		}
	
		$out.="</table>";
		return($out);
	}






/**
**name CFDiskGUI::getHDSizes($lineSeparator = '<br>')
**description Returnes the sizes of all harddisks in a string, sperated by given line separator.
**parameter lineSeparator: String to separate the output entries in the output string.
**returns Sizes of all harddisks in a string, sperated by given line separator.
**/
	public function getHDSizes($lineSeparator = '<br>')
	{
		$out = '';
		foreach ($this->getDiskDevs() as $dev)
		{
			$this->dev2VDiskVPart($dev, $vDisk, $vPart);
			$out .= "$dev: ".$this->getDiskSize($vDisk)." MB$lineSeparator";
		}

		return($out);
	}
}
?>