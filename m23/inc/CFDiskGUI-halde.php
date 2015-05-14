<?php





	protected function getFreeSpaceAfterExtendedStart($vDisk, $vPart, $factor)
	{
		$diskSize = $this->getDiskSize($vDisk);
		$logicalAmount = $this->getPartitionAmountOfType($vDisk, CFDiskIO::PT_LOGICAL);
	
		if ($logicalAmount == 0)
			$freeSize = $this->getPartitionSize($vDisk, $vPart);
		elseif ($logicalAmount == 1)
			$freeSize = $this->getPartitionStart($vDisk, $vPart) - $this->getLowestValueOf($vDisk, CFDiskIO::PT_LOGICAL, 'start');
			
		if ($factor == 0)
			return($freeSize);
		else
			return(ceil(($freeSize/$diskSize)*$factor));
	}


/**
**name CFDiskIO::getLastPartitionStep()
**description Gets the last partition step from the partitionSteps array.
**/
	public function getLastPartitionStep()
	{
		$pos = count($this->partitionSteps) - 1;
		return(isset($this->partitionSteps[$pos]) ? $this->partitionSteps[$pos] : false);
	}


/**
**name FDISK_showDiskDefine($client)
**description shows a dialog for defining the type and size of the fake drive for the clientBuilder
**parameter client: client name
**/
	function FDISK_showDiskDefine($client)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
		//figure out client name + id
		if (empty($client))
		{
	// 		print("<h1>empty($client)</h1>");
			$client = $_SESSION['preferenceSpace']['client'];
	// 		print("<h1>empty($client)</h1>");
		}
		
	// 	print("<h1>FDISK_showDiskDefine($client)</h1>");
		
		$id = CLIENT_getId($client);
	// 	print("<h1>FDISK_showDiskDefine($id)</h1>");
	
		
		if (isset($_POST['BUT_submit']) && !is_numeric($_POST['ED_size']) && isset($_POST['go2']))
		{
			MSG_showError($I18N_diskSizeInvalid);
			$sizeValid = false;
		}
		else
			$sizeValid = true;
	
		HTML_showTableHeader();
	
		//set the values of the fake drive and show next link
		if (isset($_POST['BUT_submit']) && isset($_POST['go2']) && $sizeValid)
			{
				//define the fake drive
				FDISK_defineDrive($client,$_POST['SEL_disk'],$_POST['ED_size'], $_POST['ED_upperToleranceIdentical'], $_POST['ED_lowerToleranceIdentical'], $_POST['ED_upperToleranceOther'], $_POST['ED_lowerToleranceOther'],$_POST['CB_specified'],$_POST['RB_partitionSizeAdjustment']);
	
				CAPTURE_captureAll(2,"disk define");
	
				echo("<td colspan=\"2\"><span class=\"title\">$I18N_defineDiskTypeAndSize</span><br><br>
				
				<center><A href=\"index.php?page=fdisk&id=$id&client=$client&clearSession=1\">$I18N_next</A></center>");
			}
		else
			{
				//show selection for drive type and size
				$diskList=array("/dev/sda","/dev/sdb","/dev/sdc","/dev/sdd","/dev/sde","/dev/sdf","/dev/sdg","/dev/sdh");
				$first = "/dev/sda";
				$diskHTML=HTML_listSelection("SEL_disk",$diskList,$first);
	
				HTML_setPage('addclient');
				echo("
	<FORM  method=\"POST\">
	<input type=\"hidden\" name=\"client\" value=\"$client\">
	<input type=\"hidden\" name=\"id\" value=\"$id\">
	<input type=\"hidden\" name=\"go2\" value=\"$_POST[go2]\">
		<tr>
			<td colspan=\"2\"><span class=\"title\">$I18N_defineDiskTypeAndSize</span><br></td>
		</tr>
		<tr>
			<td><span class=\"subhighlight\">$I18N_type anderes Wort finden öööö</span></td>
			<td><span class=\"subhighlight\">$I18N_size</span></td>
		</tr>
		<tr>
			<td>$diskHTML</td>
			<td><INPUT type=\"text\" name=\"ED_size\" size=\"9\" maxlength=\"20\"> MB</td>
		</tr>
	
		<tr>
			<td colspan=\"2\"><span class=\"title\"><br>$I18N_diskSelectionCriteria</span><br></td>
		</tr>
		
		<tr>
			<td colspan=\"2\">
				<INPUT type=\"checkbox\" name=\"CB_specified\" value=\"yes\">
				$I18N_asSpecified
			<td>
		</tr>
	
		<tr>
			<td>
				$I18N_identicalType
			</td>
			<td>
				$I18N_upperTolerance <INPUT type=\"text\" name=\"ED_upperToleranceIdentical\" size=\"5\" maxlength=\"32\" value=\"100GB\"><br>
				$I18N_lowerTolerance <INPUT type=\"text\" name=\"ED_lowerToleranceIdentical\" size=\"5\" maxlength=\"32\"
				value=\"0\">
			</td>
		</tr>
	
		<tr>
			<td>
				$I18N_otherTypes
			</td>
			<td>
				$I18N_upperTolerance <INPUT type=\"text\" name=\"ED_upperToleranceOther\" size=\"5\" maxlength=\"32\"
				value=\"100GB\"><br>
				$I18N_lowerTolerance <INPUT type=\"text\" name=\"ED_lowerToleranceOther\" size=\"5\" maxlength=\"32\"
				value=\"0\">
			</td>
		</tr>
	
		<tr>
			<td colspan=\"2\"><span class=\"title\"><br>$I18N_partitionSizeAdjustment</span><br></td>
		</tr>
		<tr>
			<td align=\"center\">
				<INPUT type=\"radio\" name=\"RB_partitionSizeAdjustment\" value=\"system\" checked>
				$I18N_keepOrIncreaseSystemPartition<br>
				<img src=\"/gfx/keepOrIncreaseSystemPartition.png\">
			</td>
			<td align=\"center\">
				<INPUT type=\"radio\" name=\"RB_partitionSizeAdjustment\" value=\"percentage\">
				$I18N_percentageAdjustment<br>
				<img src=\"/gfx/percentageAdjustment.png\">
			</td>
		</tr>
		
		<tr>
			<td colspan=\"2\"><center><INPUT type=\"submit\" name=\"BUT_submit\" value=\"$I18N_next\"></center></td>
		</tr>
	</FORM>
			");
		};
	
		HTML_showTableEnd();
	}






/**
**name FDISK_listDrivesAndPartitions2($param, $default, $selName)
**description Generates and defines a selection that contains all drives and partitions of a given client.
**parameter param: parameter string containing status informations about the harddisks
**parameter default: the drive to show first
**parameter selName: the name the selection is called in PHP and HTML
**parameter pathFilter: Set this to another value than false if you want only devices with a given string in it.
**parameter filterOutSetRaidLvmLock: If set to true, drives and partitions with set raidLvmLock will not be listed.
**returns String with the HTML selection.
**/
function FDISK_listDrivesAndPartitions2($param, $default, $selName, $pathFilter=false, $filterOutSetRaidLvmLock = false)
{
	$list = FDISK_getDrivesAndPartitions($param, $pathFilter, false, $filterOutSetRaidLvmLock);

	if (!is_array($list))
		$list = array();
	
	return(HTML_selection($selName,$list,SELTYPE_selection,true,$default));
}





/**
**name FDISK_printAllBars($param, $fstabA)
**description showes the partitions bars of all available drives
**parameter param: parameter string containing status informations about the harddisks
**parameter fstabA: Associative array with fstab information
**/
function FDISK_printAllBars($param, $fstabA=false)
{
	for ($vDev=0; $vDev < $param['dev_amount']; $vDev++)
	{
		echo("<br><span class=\"title\">".$param["dev$vDev"."_path"].": ".$param["dev$vDev"."_size"]." MB</span>");
		FDISK_printBars($param,$param["dev$vDev"."_path"], false, $fstabA);
		echo("<br>");
		
		FDISK_listPartTable($param, $vDev);
	};
};






/**
**name CFDiskGUI::setInstPartDev($instPart)
**description Sets the installation partition of the client.
**parameter instPart: Installation partition device name.
**returns true, if the installation partition is valid otherwise false.
**/
	private function setInstPartDev($instPart)
	{
		return($this->getClientObject()->setInstPartDev($instPart));
	}





/**
**name CFDiskGUI::getInstPartDev()
**description Gets the installation partition of the client.
**returns The installation partition of the client.
**/
	public function getInstPartDev()
	{
		return($this->getClientObject()->getInstPartDev());
	}





/**
**name CFDiskGUI::setSwapPartDev($swapPart)
**description Sets the swap partition of the client.
**parameter swapPart: Swap partition device name.
**returns true, if the swap partition is valid otherwise false.
**/
	public function setSwapPartDev($swapPart)
	{
		return($this->getClientObject()->setSwapPartDev($swapPart));
	}





/**
**name CFDiskGUI::getSwapPartDev()
**description Gets the swap partition of the client.
**returns The swap partition of the client.
**/
	public function getSwapPartDev()
	{
		return($this->getClientObject()->getSwapPartDev());
	}





/**
**name CFDiskGUI::showPartTable($vDisk)
**description Shows the partition information for a disk as table.
**parameter vDisk: Virtual (internally used) device number.
**/
	private function showPartTable($vDisk)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// HTML color code for free space
		$freeColor = $this->getHTMLColorForFilesystem(CFDiskIO::PT_FREE);

		// Get the vDisk and the amount of partitions of the given disk and the size
		$partAmount = $this->getPartAmount($vDisk);
		$diskSize = $this->getDiskSize($vDisk);


		//get the amount in MB of free space before the first partition
		$before = $this->getFreeSpaceBeforeFristPartition($vDisk, 0);

		echo("<table class=\"partTables\" align=\"center\" border=0 cellspacing=5>
		<tr>
			<td width=\"10\"></td>
			<td><span class=\"subhighlight\">$I18N_partition</span></td>
			<td><span class=\"subhighlight\">$I18N_type</span></td>
			<td><span class=\"subhighlight\">$I18N_filesystem</span></td>
			<td><span class=\"subhighlight\">$I18N_size</span></td>
			<td><span class=\"subhighlight\">$I18N_range</span></td>
		</tr>");

		//if there is free space
		if ($before > 0)
		{
			$partTableEntryNr = $this->getPartTableEntryNr($vDisk, 0, $before);
			$nextID = 'id="PartTableEntry'.$partTableEntryNr.'"';

			echo("<tr $nextID>
			<td width=\"20\" bgcolor=\"$freeColor\"></td>
			<td>-</td><td>-</td><td>-</td><td>$before</td>
			<td>0 - $before</td>
			</tr>");
		}

		//runs thru the partition numbers
		for ($vPart=0; $vPart < $partAmount; $vPart++)
		{
			$partTableEntryNr = $this->getPartTableEntryNr($vDisk, $this->getPartitionStart($vDisk, $vPart), $this->getPartitionEnd($vDisk, $vPart));

			$nextID = 'id="PartTableEntry'.$partTableEntryNr.'"';

			// Get the filesystem for the current partition
			$fileSystem = $this->getPartitionFileSystem($vDisk, $vPart);
			// and its device name
			$dev = $pDisk.$this->getPartitionNumber($vDisk, $vPart);

			//Add information about the partitions, the RAID is build from, if it's a RAID
			if ($this->isDevRaid($dev))
			{
				$raidInfoAdd = '<p>'.$this->getRaidTable($dev).'</p>';
				$deviceName = $pDisk;
			}
			else
				$deviceName = $dev;

			//give out fileSystem color, device name (hda1,hda2,...), size, fs, partition type (primary, extended, logical
			echo("
			<tr $nextID>
				<td width=\"20\" bgcolor=".$this->getHTMLColorForFilesystem($fileSystem)."></td>
				<td>$deviceName</td>
				<td>".$this->getPartitionType($vDisk, $vPart)."$raidInfoAdd</td>
				<td>$fileSystem</td>
				<td>".$this->getPartitionSize($vDisk, $vPart)."</td>
				<td>".$this->getPartitionStart($vDisk, $vPart)." -
					".$this->getPartitionEnd($vDisk, $vPart)."</td>
			</tr>");

			//check for free space after partition
			$freeSpace = $this->getFreeSpaceAfterPartition($vDisk, $vPart, 0);
	
			if (($freeSpace > 0) && ($this->getPartitionType($vDisk, $vPart) != CFDiskIO::PT_EXTENDED))
			{
				$fsstart = $this->getPartitionEnd($vDisk, $vPart);
				$fsend = $freeSpace + $fsstart;
				$partTableEntryNr = $this->getPartTableEntryNr($vDisk, $fsstart, $fsend);
	
				$nextID = 'id="PartTableEntry'.$partTableEntryNr.'"';
	
				echo("<tr $nextID>
					<td width=\"20\" bgcolor=$freeColor></td>
					<td>-</td><td>-</td><td>-</td>
					<td>$freeSpace</td>
					<td>$fsstart - $fsend</td>
					</tr>");
			}
		}
	
	
		//if there are no partitions, all space is free
		if ($partAmount == 0)
		{
			$afterStart = 0;
			
			$afterSize = $diskSize - $afterStart;

			//if there is free space
			if ($afterSize > 0)
			{
				echo("<tr id=\"PartTableEntry-Empty\">
				<td width=\"20\" bgcolor=\"$freeColor\"></td>
				<td>-</td><td>-</td><td>-</td><td>$afterSize</td>
				<td>$afterStart - $diskSize</td>
				</tr>");
			}
		}
	
		echo("</table>");
	}





/**
**name CFDiskGUI::updateAllFreeSpaces()
**description Updates the free spaces array of all disks.
**/
	private function updateAllFreeSpaces()
	{
		for ($vDisk = 0; $vDisk < $this->getDiskAmount(); $vDisk++)
			$this->updateFreeSpacesOnDisk($vDisk);
	}





/**
**name CFDiskGUI::updateFreeSpacesOnDisk($vDisk)
**description Gets the free spaces on disk.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**returns Associative array with start and end position and its size of each free space.
**/
	private function updateFreeSpacesOnDisk($vDisk)
	{
		$freeSpaceNr=0;
		$this->freeSpaces[$vDisk] = array();

		$partAmount = $this->getPartAmount($vDisk);
		$diskSize = $this->getDiskSize($vDisk);

		//if there are no partitions the while disk is free
		if ($partAmount == 0)
		{
			$this->freeSpaces[$vDisk][0]['start']=0;
			$this->freeSpaces[$vDisk][0]['end']=$diskSize;
			$this->freeSpaces[$vDisk][0]['size']=$diskSize;
			return($this->freeSpaces);
		}

		//get the percentage of free space before the first partition
		$before = $this->getFreeSpaceBeforeFristPartition($vDisk,0);

		//if there is free space
		if ($before > 0)
		{
			//start of the free space
			$this->freeSpaces[$vDisk][$freeSpaceNr]['start']=0;
			//end of the free space
			$this->freeSpaces[$vDisk][$freeSpaceNr]['end']=$before;
			//size of the free space
			$this->freeSpaces[$vDisk][$freeSpaceNr]['size']=$before;
			
			$freeSpaceNr++;
		}

		//runs thru the partitionnumbers
		for ($vPart = 0; $vPart < $partAmount; $vPart++)
		{
			//check for free space after partition
			$freeSpace = $this->getFreeSpaceAfterPartition($vDisk, $vPart, 0);

			if ($freeSpace > 0)
			{
				if ($this->getPartitionType($vDisk, $vPart) == CFDiskGUI::PT_EXTENDED)
					$fsstart = $this->getPartitionStart($vDisk, $vPart);
				else
					//free space starts at the end of the partition
					$fsstart = $this->getPartitionEnd($vDisk, $vPart);

				//and ends after the end of the partition + the amount of free space
				$fsend = $freeSpace + $fsstart;

				//start of the free space
				$this->freeSpaces[$vDisk][$freeSpaceNr]['start'] = $fsstart;
				//end of the free space
				$this->freeSpaces[$vDisk][$freeSpaceNr]['end'] = $fsend;
				//size of the free space
				$this->freeSpaces[$vDisk][$freeSpaceNr]['size'] = $freeSpace;

				$freeSpaceNr++;
			}
		}
	
		return($this->freeSpaces);
	}





/**
**name CFDiskGUI::printBars($pDisk, $addJavaScript = false)
**description prints the partitions as colored table
**parameter pDisk: selected device (e.g. /dev/hda)
**parameter addJavaScript: Set to true to add JavaScript code that calls the JS function emptySpace(), if empty parts of the drive are clicked, selectPartition(), if a partition is clicked and showPartTable(), if the mouse is over the bar.
**/
	private function printBars($pDisk, $addJavaScript = false)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// HTML color code for free space
		$freeColor = $this->getHTMLColorForFilesystem(CFDiskIO::PT_FREE);
		// Extra style for marking <td>s that contain extended partitions
		$extendedBorderCSS = 'style="border-color:#FFFF00; border-width:2px; border-style:solid; padding:4px"';


		// Get the vDisk and the amount of partitions of the given disk
		$this->dev2VDiskVPart($pDisk, $vDisk, $vPart);
		$partAmount = $this->getPartAmount($vDisk);


		// Generate basic JS code, if JS is activated
		if ($addJavaScript)
		{
			$JSAddPartTable = " onMouseOver=\"showPartTable('partTables$pDisk');";
	
			// Only create JS code for empty drive
			if ($partAmount == 0)
				$JSemptyDrive = "onClick=\"selectPartition('$pDisk','$pDisk'); alert('1'); emptySpace(0, ".$this->getDiskSize($vDisk).", '$pDisk')\" onMouseOver=\"markPartTableEntry('PartTableEntry-Empty')\"";
		}
		else
			$infoIcon = $JSAddPartTable = $JSemptyDrive = "";


		// Begin a new table for a disk with JS code for choosing the disk if it is empty
		echo("<table id=\"fdiskbar\" bgcolor=\"$freeColor\" cellspacing=\"1\" cellpadding=\"1\" border=\"2\" width=\"100%\" height=\"40\" $JSemptyDrive ><tr>");



		if ($partAmount == 0)
		{
			$infoIcon = $this->getDriveInfoIcon($vDisk);
			echo("<td align=\"center\">$infoIcon</td></tr></table>");
			return(false);
		}


		//get the percentage of free space before the first partition
		$beforePercent = $this->getFreeSpaceBeforeFristPartition($vDisk, 100);


		//if there is free space
		if ($beforePercent > 0)
		{
			if ($addJavaScript)
			{
				$freeSpaceEnd = $this->getFreeSpaceBeforeFristPartition($vDisk, 0);
				$partTableEntryNr = $this->getPartTableEntryNr($vDisk, 0, $freeSpaceEnd);
				$JSAddEmptySpace = " onClick=\"alert('2'); emptySpace(0, $freeSpaceEnd, '$pDisk')\"";
				$JSAdd = "$JSAddPartTable markPartTableEntry('PartTableEntry$partTableEntryNr')\"";
			}
	
			echo("<td $JSAdd $JSAddEmptySpace bgcolor=\"".$freeColor."\" width=\"".$beforePercent."%\"><center><H3></H3></center></td>");
		}

		//run thru the partitions
		for ($vPart=0; $vPart < $partAmount; $vPart++)
		{
			$fileSystem = $this->getPartitionFileSystem($vDisk, $vPart);

			$pPart = $this->getPartitionNumber($vDisk, $vPart);
	
			$dev = "$pDisk$pPart";
	
			//Set an extra icon if the partition is for installation or for swapping
			$extraIcon = '';
			if ($dev == $this->getInstPartDev())
				$extraIcon = "<img width=16 height=16 src=\"/gfx/instPart.png\" title=\"$I18N_installationPartition\" alt=\"$I18N_installationPartition\">";
			elseif ($dev == $this->getSwapPartDev())
				$extraIcon = "<img width=16 height=16 src=\"/gfx/swapPart.png\" title=\"$I18N_swapPartition\" alt=\"$I18N_swapPartition\">";
	
			//Generate icon and info string with information about the current partition
			$infoIcon = $this->getPartInfoIcon($vDisk, $vPart);
	
	
			//if fileSystem is -1 it should be extended partition (has no fileSystem)
			if ($this->getPartitionType($vDisk, $vPart) != CFDiskIO::PT_EXTENDED)
			{
				if ($addJavaScript)
				{
					$partTableEntryNr = $this->getPartTableEntryNr($vDisk, $this->getPartitionStart($vDisk, $vPart), $this->getPartitionEnd($vDisk, $vPart));
					$JSAddSelectPartition = " onClick=\"selectPartition('$dev','$pDisk')\"";
					$JSAdd = "$JSAddPartTable markPartTableEntry('PartTableEntry$partTableEntryNr')\"";
				}
	
				// Add extra CSS to mark logical partitions
				$extraCSS = ($this->getPartitionType($vDisk, $vPart) == CFDiskIO::PT_LOGICAL ? $extendedBorderCSS : '');
	
				echo("<td $JSAddPartTableEntry $JSAdd $JSAddSelectPartition $extraCSS bgcolor=\"".$this->getHTMLColorForFilesystem($fileSystem)."\" width=\"".$this->getPartitionPercent($vDisk,$vPart)."%\"><center><b>$pPart</b>$raidInfoAdd$infoIcon$extraIcon</center></td>
				");
			}
	
			//check for free space after partition
			$freePercent = $this->getFreeSpaceAfterPartition($vDisk,$vPart,100); // ööö bei ext nur von start ext bis start 1. logische
	
			if ($freePercent > 0)
			{
				if ($addJavaScript)
				{
					//If the empty space lays in an extended partition, the borders of the extended partition should be used
					if ($this->getPartitionType($vDisk, $vPart)==CFDiskIO::PT_EXTENDED)
					{
						$extraCSS = $extendedBorderCSS;
						$fsstart = $this->getPartitionStart($vDisk, $vPart);
						$fsend =  $this->getPartitionEnd($vDisk, $vPart);
						$JSSelectPartTypeForNewPartitions = $this->getJSSelectPartTypeForNewPartitions($vDisk, $fsstart, $fsend);
						$freePercent = $this->getFreeSpaceAfterExtendedStart($vDisk, $vPart, 100);
					}
					else
					{
						//Calculate the start and end points of the free space
						$freeSpace = $this->getFreeSpaceAfterPartition($vDisk, $vPart, 0);
						$fsstart = $this->getPartitionEnd($vDisk, $vPart);
						$fsend = $freeSpace + $fsstart;
						$JSSelectPartTypeForNewPartitions = $this->getJSSelectPartTypeForNewPartitions($vDisk, $fsstart, $fsend);
	
						//Check if there is an extended partition and what virtual partition number it has
						$extendedvPart = $this->getExtendedVPart($vDisk);
						if ($extendedvPart !== false)
						{
							//Add CSS for marking free spaces, if the free space is laying in the borders of the extended partition
							$extraCSS = (($fsstart >= $this->getPartitionStart($vDisk, $extendedvPart)) && ($fsend <= $this->getPartitionEnd($vDisk, $extendedvPart)) ? $extendedBorderCSS : '');
						}
					}

					$JSAddEmptySpace = " onClick=\"alert('3'); emptySpace($fsstart, $fsend, '$pDisk')$JSSelectPartTypeForNewPartitions\" $JSAddPartTableEntry";
					$partTableEntryNr = $this->getPartTableEntryNr($vDisk, $fsstart, $fsend);
					$JSAdd = "$JSAddPartTable markPartTableEntry('PartTableEntry$partTableEntryNr')\"";
				}
	
				echo("<td $JSAdd $JSAddEmptySpace $extraCSS bgcolor=\"".$freeColor."\" width=\"".$freePercent."%\"><center>$freePercent</center></td>
				");
			}
		}
	
		echo("</tr></table>");
	}





/**
**name CFDiskGUI::getFreeSpaceBeforeFristPartition($vDisk,$factor)
**description Gets the free space before the first partition.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter factor: the factor to multiplay percent amount of free space. When 0, the start position (in MB) of the partition will be returned.
**returns Percentual or absolute start position of or free space before the first partition.
**/
	private function getFreeSpaceBeforeFristPartition($vDisk,$factor)
	{
		$start = $this->getPartitionStart($vDisk, 0, -1);
		$diskSize = $this->getDiskSize($vDisk);

		if ($factor == 0)
			return($start);

		if ($diskSize == 0)
			return(0);

		return(round(($start/$diskSize)*$factor));
	}




/**
**name CFDiskGUI::getFreeSpaceAfterPartition($vDisk, $vPart, $factor)
**description Gets the free space after the selected partition.
**parameter vDisk: Internal disk number (for accessing the disk information in the array).
**parameter vPart: Virtual (internally used) partition number. This is normally another number than the physical number (e.g. 1 on /dev/hda1)
**parameter factor: The factor to multiplay percent amount of free space. When 0, the free space is returned in MB.
**returns Percentual or absolute free space after the selected partition.
**/
	private function getFreeSpaceAfterPartition($vDisk, $vPart, $factor)
	{
		$diskSize = $this->getDiskSize($vDisk);

		if ($diskSize==0)
			return(0);

		if ($this->getPartitionType($vDisk, $vPart) == CFDiskGUI::PT_EXTENDED)
			//if an extended partition is empty, the space should be shown as "free"
			$from = $this->getPartitionStart($vDisk, $vPart);
		else
			//a normal partition can have free space after the end
			$from = $this->getPartitionEnd($vDisk, $vPart);

		if ($vPart == $this->getPartAmount($vDisk) - 1)
			//partition is the last => $to is end of the disk
			$to = $diskSize;
		else
			//otherwise $to is the start of the next partition
			$to = $this->getPartitionStart($vDisk, $vPart + 1);

		$freeSize = $to - $from;

		if ($factor == 0)
			return($freeSize);
		else
			return(ceil(($freeSize/$diskSize)*$factor));
	}



	public function showFreeSpaces()
	{
		print('<h1>Freie Bereiche</h1><pre>');
		print_r($this->freeSpaces);
		print('</pre>');
	}
?>