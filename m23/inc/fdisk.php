<?PHP

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions for partition and format of the client. print partition information and do the format itself.
$*/


define("DISK_TYPE_IDE",0);
define("DISK_TYPE_SCSI",1);

//partition methods (used for the partition/format dialog)
define("PM_none",0);
define("PM_auto",1);
define("PM_existing",2);
define("PM_extended",3);
define("PM_extended_lvm",4);
define("PM_extended_raid",5);
define("PM_extended_raid_lvm",6);
define("PM_auto2048_4096",7);

//extended partition selections/page
define("EPS_none",-1);
define("EPS_delete_partitions",0);
define("EPS_add_new_partition",1);
define("EPS_format_partitions",2);
define("EPS_select_installation_partitions",3);
define("EPS_raid",4);
define("EPS_lvm",5);





/**
**name FDISK_showFdiskCombinedGUIFunctions()
**description Shows the menu bar with integrated logic for FDISK_showCombinedFdiskGUIDialog.
**/
function FDISK_showFdiskCombinedGUIFunctions()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Cache some varibales
	$param = FDISK_fdiskSessionParam();
	$fstab = FDISK_fdiskSessionFstab();
	$partJobs = FDISK_fdiskSessionPartJobs();
	$vDevInstall = FDISK_fdiskSessionvDevInstall();
	$freeSpaces = FDISK_fdiskSessionFreeSpaces();


	//Define edit lines for begin and end of the new partition
	$newPartStart = HTML_input('ED_newPart_start', false, 6);
	$newPartEnd = HTML_input('ED_newPart_end', false, 6);

	//Get the current selected partition without creating the HTML selection, because the options may change during the creation/deletion of partitions and drives
	$currentPartition = $_POST['SEL_part'];



	//Creates a new RAID (/dev/mdX)
		//raid level selector
		foreach (array(0,1,4,5,6,10) as $l)
			$raidLevelArr[$l] = "RAID-$l";
		$newRaidLevel = HTML_selection("SEL_newRaidLevel",$raidLevelArr,SELTYPE_selection);

	if (HTML_submit("BUT_mdAdd", $I18N_createRAIDDrive))
	{
		FDISK_virtualAddDrive($param, $_POST['SEL_newMd'], 0);
		FDISK_fdiskSessionParam($param);
		$currentDrive = $newMd;
		$newMd = HTML_selection("SEL_newMd",FDISK_getUnusedMDs($param),SELTYPE_selection);
// 		CAPTURE_captureAll(7,"create RAID");
	}
	else
		$newMd = HTML_selection("SEL_newMd",FDISK_getUnusedMDs($param),SELTYPE_selection);

	//get the current drive/partition that should get added and the MD to add ist to
	$usedMd = FDISK_listDrivesAndPartitions2($param,"","SEL_addUsedMd","/dev/md");


	//Adds a real drive or partition to a RAID
	if (HTML_submit("BUT_drivePartitionAdd", $I18N_addToRAID))
	{
		FDISK_addDrivePartitionToRaid($usedMd,$newRaidLevel,$_POST['SEL_addMDDrivePart'],$param,$newRaidLevel);
		FDISK_fdiskSessionParam($param);
	}

	//This may have changed by BUT_drivePartitionAdd
	$MDDrivePartToAdd = FDISK_listDrivesAndPartitions2($param,"","SEL_addMDDrivePart","!/dev/md", true);



	//Choosing and execution of partition schemes
	$partitionSchemes[PM_auto] = $I18N_fdistTypeautomatic;
	$partitionSchemes[PM_auto2048_4096] = $I18N_fdistTypeautomaticSwap2048_4096;
	$partitionScheme = HTML_selection("SEL_partitionSchemes", $partitionSchemes, SELTYPE_selection);

	//Apply a partition and formating scheme
	if (HTML_submit('BUT_executeScheme', $I18N_executeScheme))
	{
		switch ($partitionScheme)
		{
			case PM_auto:
				$param = FDISK_autoPart(FDISK_fdiskSessionClient(),$partJobs,FDISK_fdiskSessionInstallDrive(), $param, $instPart, $swapPart);
				break;
			case PM_auto2048_4096:
				$param = FDISK_autoPart(FDISK_fdiskSessionClient(),$partJobs,FDISK_fdiskSessionInstallDrive(), $param, $instPart, $swapPart,2048,4096);
				break;
			default:
				return(false);
		}
		FDISK_fdiskSessionParam($param);
		FDISK_fdiskSessionPartJobs($partJobs);
		FDISK_fdiskSessionInstPart($instPart);
		FDISK_fdiskSessionSwapPart($swapPart);
	}



	//Add a new partition
	if (HTML_submit('BUT_newPart_add',$I18N_add))
		{
			if ($newPartEnd > $newPartStart)
				{
					/*
						Use the current choosen instdrive: Read it directly, because the dialog element was not created here and it cannot be created before, because the elements may change in the following parts.
					*/

					//Get $vDevInstall
					FDISK_dev2LDevLPart($param,$_POST['SEL_instDrive'],$vDevInstall,$vPartTrash);

					//Set $vDevInstall for usage with FDISK_fdiskSessionFreeSpaces
					FDISK_fdiskSessionvDevInstall($vDevInstall);

					//Get free spaces for the current drive (SEL_instDrive)
					$freeSpaces = FDISK_fdiskSessionFreeSpaces(false,true);

					$param = FDISK_addPart($param, $partJobs, $vDevInstall, $newPartStart, $newPartEnd, $_POST['SEL_newPart_type'],$freeSpaces);
					FDISK_fdiskSessionParam($param);
					FDISK_fdiskSessionPartJobs($partJobs);

					//Re-calculate the free spaces
					FDISK_fdiskSessionFreeSpaces(false, true);
				}
			else
				{
					MSG_showError($I18N_endPositionOfNewPartitionMustBeGreaterThanStartPosition);
				}
		}



	//Check, if the currently selected partition should be deleted
	if (HTML_submit("BUT_deletePart",$I18N_delete))
	{
		//Hint: $_POST['SEL_deletePartPart'] defined by FDISK_listPartitions
		$param = FDISK_delPart($currentPartition, $param, $partJobs);

		FDISK_fdiskSessionParam($param);
		FDISK_fdiskSessionPartJobs($partJobs);

		//Re-calculate the free spaces
		FDISK_fdiskSessionFreeSpaces(false, true);
	}



	//Resets all partitioning and formating done by the webinterface
	if (HTML_submit("BUT_reset",$I18N_reset))
		FDISK_fdiskSessionReset();



	/***** Add dialog elements after this line, that may changed by the previous operations *****/



	//Contains the currently selected partition or RAID drive
	$currentPartition = FDISK_definePartitionSelection($param, -1, 'SEL_part','');



	$allDrives = FDISK_getAllDrives(FDISK_fdiskSessionParam());
	if ($allDrives !== NULL)
	{
		//Get the installation drive (e.g. for creating new partitions in free space)
		$instDrive = FDISK_fdiskSessionInstallDrive(HTML_selection("SEL_instDrive", HELPER_array2AssociativeArray($allDrives), SELTYPE_selection));
	}
	else
	{
		MSG_showError($I18N_errorNoHardDiskDetected);
		exit(1);
	}
	


	//Format the choosen partition
	if (HTML_submit('BUT_formatPart',$I18N_format))
	{
		//Hint: $_POST['SEL_formatPartPart'] defined by FDISK_listPartitions and $_POST['SEL_format'] defined by FDISK_listSupportedFS
		$param = FDISK_formatPart($param, $currentPartition, $_POST['SEL_format'], $partJobs);
		FDISK_fdiskSessionParam($param);
		FDISK_fdiskSessionPartJobs($partJobs);
	}



	//Check, if the distribution should be selected now and do some final checks
	if (HTML_submit('BUT_finalisePartitioningAndselectClientDistribution', $I18N_finalisePartitioningAndselectClientDistribution) && FDISK_finalChecksAndRealPartitionAndFormatStart())
	{
		FDISK_addRaidJobs($partJobs,$param);
		FDISK_fdiskSessionPartJobs($partJobs);

		//Add the next button for letting the browser call the distribution selection page
		HTML_submitDefine('BUT_next',$I18N_next);
		echo("<tr><td>".BUT_next."</td></tr>");

		//Return here to hide the function menu and the rest of the partition and formating dialog
		return(false);
	}



	//Define the selectors for the installation and swap partition
	FDISK_listInstPartSelector($param, FDISK_installFilesystems(), "SEL_instPart", false);
	FDISK_listInstPartSelector($param, FDISK_swapFilesystems(), "SEL_swapPart", false);
	
	if (HTML_submit("BUT_chooseInstallAndSwapPartitions", $I18N_select))
	{
		FDISK_fdiskSessionInstPart($_POST['SEL_instPart']);
		FDISK_fdiskSessionSwapPart($_POST['SEL_swapPart']);
	}



	echo("
			<p align=\"center\">
			<span class=\"titlesmal\">$I18N_currentDriveAndPartition</span>
				<table width=\"100%\">
					<tr>
						<td><span class=\"subhighlight\">$I18N_currentDrive</span></td>
						<td align=\"right\">".SEL_instDrive."</td>
					</tr>
					<tr>
						<td><span class=\"subhighlight\">$I18N_currentPartition</span></td>
						<td align=\"right\">".SEL_part."</td>
					</tr>
				</table>
			</p>

			<p><hr></p>
			".HTML_jQueryMenuHeader('fdiskMenu')."

			".HTML_jQueryMenu($I18N_partitionScheme,'<center>'.SEL_partitionSchemes."<br>".BUT_executeScheme.'</center>')."
			".HTML_jQueryMenu($I18N_deleteCurrentPartition,'<center>'.BUT_deletePart.'</center>')."
			".HTML_jQueryMenu($I18N_add_new_partition, "<table width=\"100%\">
					<tr>
						<td><span class=\"subhighlight\">$I18N_type</span> </td>
						<td>".FDISK_partCreationSelect($param, $vDevInstall,"SEL_newPart_type")."</td>
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
						<td>".FDISK_listSupportedFS("SEL_format","ext3")."</td>
					</tr>
					<tr>
						<td colspan=\"2\" align=\"center\">".BUT_formatPart."</td>
					</tr>
				</table>")."
			".HTML_jQueryMenu($I18N_raidDrives, "
				<span class=\"subhighlight\">$I18N_raidDriveName</span><br>
					".SEL_newMd." ".BUT_mdAdd."<br><br>

				<span class=\"titlesmal\">$I18N_addDrivesPartitionsToRaid</span><br><br>
					<table width=\"100%\">
						<tr>
							<td>
								<span class=\"subhighlight\">$I18N_raidLevel</span>
							</td>
							<td>
								".SEL_newRaidLevel."
							</td>
						</tr>
						<tr>
							<td>
								<span class=\"subhighlight\">$I18N_raidDrive</span>
							</td>
							<td>
								".SEL_addUsedMd."
							</td>
						</tr>
						<tr bgcolor=\"silver\">
							<td>
								<span class=\"subhighlight\">$I18N_realDrivePartition</span>
							</td>
							<td>
								".SEL_addMDDrivePart."<br>
								".BUT_drivePartitionAdd."
							</td>
						</tr>
					</table>

					<span class=\"subhighlight\">$I18N_assignedDrivesPartitions</span><br>
						<p>".FDISK_listRaidTable($usedMd,$param)."</p><br><br>
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
**name FDISK_showCombinedFdiskGUIDialog()
**description Shows the new partition and formating screen.
**/
function FDISK_showCombinedFdiskGUIDialog()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	echo('
		<tr>
			<td align="center" colspan=3">
				<span class="title">'.FDISK_fdiskSessionClient().'</span>
			</td>
		</tr>
		<tr>
			<td width="24%" rowspan=3 valign="top">');
			if (!FDISK_showFdiskCombinedGUIFunctions())
	echo('</td></tr>');
	else
	{
		echo('
				</td>
				<td width="76%" colspan=2 valign="top">');
					FDISK_printAllBars2();
		echo('
				</td>
			</tr>
			<tr valign="top">
				<td width="38%" valign="top">
					<span class="titlesmal">'.$I18N_waitingPartitioningAndFormatingJobs.'</span><br><br>');
					FDISK_listPartJobs(FDISK_fdiskSessionPartJobs());
		echo('
				</td>
				<td width="38%" valign="top">');
					FDISK_showAllPartTables();
					FDISK_printColorDefinitions();
		echo('
				</td>
			</tr>
			<tr>
				<td width="76%" colspan=2 valign="top">');
				FDISK_fstabAddDialog2();
		echo('
				</td>
			</tr>
			<tr>
				<td align="center" colspan=3 valign="top">
					<input type="submit" name="BUT_refresh" value="'.$I18N_refresh.'">&nbsp;&nbsp;&nbsp;'.BUT_reset.'&nbsp;&nbsp;&nbsp; '.BUT_finalisePartitioningAndselectClientDistribution.'
				</td>
			</tr>
	
			<script>
	
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
	
			function selectDrive(drive)
			{
				setSelectionElement("SEL_instDrive", drive);
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
				setSelectionElement("SEL_part", dev);
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
	
			showPartTable(\'partTables'.FDISK_fdiskSessionInstallDrive().'\');
			</script>
		');
	}
	
	HTML_JSMenuCloseAllEntries('fdiskMenu');
}





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
**name FDISK_getFstabArray($client)
**description Gets the fstab of a client as array.
**parameter client: Name of the client.
**returns Array with the fstab (each line of the fstab as item).
**/
function FDISK_getFstabArray($client)
{
	$options = CLIENT_getAllOptions($client);
	
	if (!isset($options['fstab']{1}))
		return(false);
	
	$fstabA = explodeAssoc('###',$options['fstab']);
	return($fstabA);
}





/**
**name FDISK_findFstabMountPointByDev($fstabA, $dev)
**description Searches a client's fstab for a device and figures out the according mount point.
**parameter fstabA: The fstab as array.
**parameter dev: The device.
**returns Mount point for the device.
**/
function FDISK_findFstabMountPointByDev($fstabA, $dev)
{
	if (!is_array($fstabA) || !isset($fstabA['fstab_amount']))
		return(false);

	for ($i = 0; $i < $fstabA['fstab_amount']; $i++)
		if ($fstabA["fstab_dev$i"] == $dev)
			return($fstabA["fstab_mnt$i"]);
	return(false);
}





/**
**name FDISK_swapFilesystems()
**description Returns an array with the filesystems usable for swapping.
**/
function FDISK_swapFilesystems()
{
	$T_SELSWAPPART[0]="linux-swap";
	$T_SELSWAPPART[1]="linux-swap(new)";
	$T_SELSWAPPART[2]="linux-swap(v1)";

	return($T_SELSWAPPART);
}





/**
**name FDISK_formatInstallAndSwappart()
**description Adds jobs to format the installation and swap partitions and set the boot flag on the installation partition
**/
function FDISK_formatInstallAndSwappart()
{
	//Cache some values
	$instPart = FDISK_fdiskSessionInstPart();
	$swapPart = FDISK_fdiskSessionSwapPart();
	$partJobs = FDISK_fdiskSessionPartJobs();
	$param = FDISK_fdiskSessionParam();

	//Get the file system of the installation partition
	FDISK_dev2LDevLPart($param,$instPart,$vDev,$vPart);
	$fs = $param["dev$vDev"."part$vPart"."_fs"];
	//Format the installation partition
	$partJobs = FDISK_formatJob($instPart, $fs, $partJobs);

	//Make the installation part bootable
	$driveAndNr = FDISK_getDriveAndNr($instPart);	
	$partJobs = FDISK_bootflagJob($driveAndNr[0], $driveAndNr[1], $partJobs);

	//Format the swap partition
	$partJobs = FDISK_formatJob($swapPart, "linux-swap", $partJobs);
	
	FDISK_fdiskSessionPartJobs($partJobs);
}





/**
**name FDISK_finalChecksAndRealPartitionAndFormatStart()
**description Does some final checks, starts the partitioning and formating and switches to the distribution selection page.
**/
function FDISK_finalChecksAndRealPartitionAndFormatStart()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");


	//Cache some values
	$instPart = FDISK_fdiskSessionInstPart();
	$swapPart = FDISK_fdiskSessionSwapPart();
	$client = FDISK_fdiskSessionClient();
	$param = FDISK_fdiskSessionParam();
	$partJobs = FDISK_fdiskSessionPartJobs();

	$ret = false;
	
	//check if an installation partition was selected
	if (empty($instPart))
		MSG_showError($I18N_no_instpartition_selected);
	//check if a swap partition was selected
	elseif (empty($swapPart))
		MSG_showError($I18N_no_swappartition_selected);
		//check if we use the same partition for install and swap
	elseif ($instPart != $swapPart)
	{
		if (strpos($instPart,"md") === false)
		{
			//pick the first and hope that this is the drive where the BIOS assumes the MBR
			$mbrPart = FDISK_getFirstDrive($param);
		}
		else
		{
			//is a RAID device => choose another device to install the MBR
			$mbrPart = $param["dev0_path"];
		}

		//Make sure the installation and swap partitions are formated
		FDISK_formatInstallAndSwappart();

		//Add possibly existing RAID jobs
		FDISK_addRaidJobs($partJobs,$param);
		FDISK_fdiskSessionPartJobs($partJobs);

		//add the partition and format job
		$partStr=implodeAssoc("###",FDISK_fdiskSessionPartJobs());

		PKG_addJob($client,"m23fdiskFormat",PKG_getSpecialPackagePriority("m23fdiskFormat"),$partStr);

		//get new partition data after partitioning
		PKG_addJob($client,"m23Presetup",PKG_getSpecialPackagePriority("m23fdiskFormat")+1,"" );

// 	echo("<tr><td>");
		MSG_showInfo($I18N_data_saved);
// 	echo("</td></tr>");

		FDISK_fdiskSessionPage("clientdistr");
		FDISK_fdiskSessionHelpPage("fdisk-distrselect");

		$ret = true;
	}

	return($ret);
}





/**
**name FDISK_installFilesystems()
**description Returns an array with the filesystems usable for installation.
**/
function FDISK_installFilesystems()
{
	$T_SELINSTPART[0]="ext2";
	$T_SELINSTPART[1]="ext3";
	$T_SELINSTPART[2]="ext4";
	$T_SELINSTPART[3]="reiserfs";

	return($T_SELINSTPART);
}





/**
**name FDISK_getUnusedMDs($param)
**description Returns an associative array with the unused MDs (e.g. /dev/md0, /dev/md1, ...) as key and value.
**parameter param: parameter string containing status informations about the harddisks
**returns Associative array with the unused MDs (e.g. /dev/md0, /dev/md1, ...) as key and value.
**/
function FDISK_getUnusedMDs($param)
{
	//Get all currently used MDs
	$usedMDs = FDISK_getDrivesAndPartitions($param, "/dev/md", false);
	
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
**name FDISK_printAllBars2()
**description Shows the partition bars of all drives specified for the current client, that is stored in the session.
**/
function FDISK_printAllBars2()
{
	$param = FDISK_fdiskSessionParam();

	for ($vDev=0; $vDev < $param['dev_amount']; $vDev++)
		{
			echo("<br><span class=\"title\">".$param["dev$vDev"."_path"].": ".$param["dev$vDev"."_size"]." MB</span>");
			FDISK_printBars($param,$param["dev$vDev"."_path"], true);
			echo("<br>");
		};
};





/**
**name FDISK_showAllPartTables()
**description Shows the partition tables of all drives specified for the current client, that is stored in the session.
**/
function FDISK_showAllPartTables()
{
	$param = FDISK_fdiskSessionParam();

	for ($vDev=0; $vDev < $param['dev_amount']; $vDev++)
		{
			echo('
				<div name="partTables" id="partTables'.$param["dev$vDev"."_path"].'">
					<span class="titlesmal">'.$param["dev$vDev"."_path"].': '.$param["dev$vDev"."_size"].' MB</span>
						<p>');
						FDISK_listPartTable($param, $vDev);
			echo('</p>
				<br>
				</div>');
		};
}





/**
**name FDISK_fdiskSessionPartJobs($newJobs = false)
**description Stores the partition jobs in the session.
**parameter newJobs: The new partition jobs to set or false for not changing.
**returns The current partition jobs.
**/
function FDISK_fdiskSessionPartJobs($newJobs = false)
{
	return(FDISK_fdiskSessionSetter($newJobs, 'partJobs'));
}





/**
**name FDISK_fdiskSessionInstPart($newInstPart = false)
**description Stores the installation partition in the session.
**parameter newInstPart: The new installation partition to set or false for not changing.
**returns The current installation partition.
**/
function FDISK_fdiskSessionInstPart($newInstPart = false)
{
	return(FDISK_fdiskSessionSetter($newInstPart, 'instPart'));
}





/**
**name FDISK_fdiskSessionSwapPart($newSwapPart = false)
**description Stores the swap partition in the session.
**parameter newSwapPart: The new swap partition to set or false for not changing.
**returns The current swap partition.
**/
function FDISK_fdiskSessionSwapPart($newSwapPart = false)
{
	return(FDISK_fdiskSessionSetter($newSwapPart, 'swapPart'));
}





/**
**name FDISK_fdiskSessionSetter($newVal, $varName)
**description Generic function to store values in the client partition and format session.
**parameter newVal: The value to set or false for not changing.
**parameter varName: The name the value should be stored under in the client partition and format session.
**returns The current value.
**/
function FDISK_fdiskSessionSetter($newVal, $varName)
{
	if ($newVal !== false)
		$_SESSION['clientPartition'][$varName] = $newVal;

	return($_SESSION['clientPartition'][$varName]);
}






/**
**name FDISK_fdiskSessionClient()
**description Returns the client name to partition and format.
**returns The client name to partition and format.
**/
function FDISK_fdiskSessionClient()
{
	//If the client name was not stored before in the session => Initalise it with the valie from $_GET
	if (!isset($_SESSION['clientPartition']['client']))
		$_SESSION['clientPartition']['client'] = $_GET['client'];

	return($_SESSION['clientPartition']['client']);
}





/**
**name FDISK_fdiskSessionParam($newParam = false)
**description Stores the partition parameters in the session.
**parameter newParam: The new partition parameters to set or false for not changing.
**returns The current partition parameters.
**/
function FDISK_fdiskSessionParam($newParam = false)
{
	if ($newParam !== false)
		$_SESSION['clientPartition']['param'] = $newParam;

	if (!isset($_SESSION['clientPartition']['param']))
		$_SESSION['clientPartition']['param'] = FDISK_getPartitions(FDISK_fdiskSessionClient());

	return($_SESSION['clientPartition']['param']);
}





/**
**name FDISK_fdiskSessionInstallDrive($newDrive = false)
**description Stores the installation drive in the session.
**parameter newDrive: The new installation drive to set or false for not changing.
**returns The current installation drive.
**/
function FDISK_fdiskSessionInstallDrive($newDrive = false)
{
	//If the drive should be changed ...
	if ($newDrive !== false)
	{
		$_SESSION['clientPartition']['installDrive'] = $newDrive;

		//... change the internal virtual drive number (vDevInstall) too.
		$nullVar = 'empty';
		$vDevInstall = FDISK_fdiskSessionvDevInstall();
		FDISK_dev2LDevLPart(FDISK_fdiskSessionParam(),$newDrive,$vDevInstall,$nullVar);
		FDISK_fdiskSessionvDevInstall($vDevInstall);

		//Re-calculate the free spaces
		FDISK_fdiskSessionFreeSpaces(false,true);
	}

	return($_SESSION['clientPartition']['installDrive']);
}





/**
**name FDISK_fdiskSessionvDevInstall($newDrive = false)
**description Stores the internal virtual installation drive number in the session.
**parameter newDrive: The new internal virtual installation drive number to set or false for not changing.
**returns The current internal virtual installation drive number.
**/
function FDISK_fdiskSessionvDevInstall($newDrive = false)
{
	return(FDISK_fdiskSessionSetter($newDrive, 'vDevInstall'));
}





/**
**name FDISK_fdiskSessionFreeSpaces($newSpaces = false)
**description Stores the free space parts of the installation drive in the session or recalculates them for the current installation drive.
**parameter newSpaces: The new free spaces to set or false for not changing.
**parameter reset: Re-calculate the free spaces, if set to true.
**returns The current free spaces.
**/
function FDISK_fdiskSessionFreeSpaces($newSpaces = false, $reset = false)
{
	//Change only on request
	if ($newSpaces !== false)
		$_SESSION['clientPartition']['freeSpaces'] = $newSpaces;

	//Calculate the free spaces for the current drive, if none are stored.
	if ((!isset($_SESSION['clientPartition']['freeSpaces'])) || $reset)	
		$_SESSION['clientPartition']['freeSpaces'] = FDISK_getFreeSpaces(FDISK_fdiskSessionParam(),FDISK_fdiskSessionvDevInstall());

	return($_SESSION['clientPartition']['freeSpaces']);
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

	FDISK_fdiskSessionPartMethod(PM_none);
	FDISK_fdiskSessionTitle($I18N_fdistTypeselection);
	FDISK_fdiskSessionPage('fdisk');
	FDISK_fdiskSessionHelpPage('fdisk');
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
		$_SESSION['clientPartition']['partMethod'] = PM_none;

	return($_SESSION['clientPartition']['partMethod']);
}





/**
**name FDISK_fdiskSessionPage($newPage = false)
**description Stores the page in the session.
**parameter newPage: The new page to set or false for not changing.
**returns The current page.
**/
function FDISK_fdiskSessionPage($newPage = false)
{
	return(FDISK_fdiskSessionSetter($newPage, 'page'));
}





/**
**name FDISK_fdiskSessionHelpPage($newPage = false)
**description Stores the help page in the session.
**parameter newPage: The new help page to set or false for not changing.
**returns The current help page.
**/
function FDISK_fdiskSessionHelpPage($newPage = false)
{
	return(FDISK_fdiskSessionSetter($newPage, 'helpPage'));
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
**name FDISK_fdiskSessionFstab($newFstab = false)
**description Stores the fstab in the session.
**parameter newFstab: The new fstab to set or false for not changing.
**returns The current fstab.
**/
function FDISK_fdiskSessionFstab($newFstab = false)
{
	if ($newFstab !== false)
		$_SESSION['clientPartition']['fstab'] = $newFstab;

	if (!isset($_SESSION['clientPartition']['fstab']))
	{
		$fstab['fstab_amount'] = 0;
		$_SESSION['clientPartition']['fstab'] = $fstab;
	}

	return($_SESSION['clientPartition']['fstab']);
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
**name FDISK_getDrivesAndPartitions($param, $pathFilter=false, $addSizesAndTypes = true, $filterOutSetRaidLvmLock = false)
**description Generates an array that contains all drives and partitions of a given client.
**parameter param: parameter string containing status informations about the harddisks
**parameter pathFilter: Set this to another value than false if you want only devices with a given string in it. If you add an "!" the beginning all is given out that doesn't contains the filter string (without the "!").
**parameter addSizesAndTypes: If set to true, the array will contain the sizes, filesystems and types of the partitions and drives.
**parameter filterOutSetRaidLvmLock: If set to true, drives and partitions with set raidLvmLock will not be listed.
**returns Array with drives and partitions and (optionally) their sizes, filesystems and types.
**/
function FDISK_getDrivesAndPartitions($param, $pathFilter=false, $addSizesAndTypes = true, $filterOutSetRaidLvmLock = false)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$list = array();
	
	if (!isset($param['dev_amount']))
		return($list);

	//check if there is an "!" in the filter. this means the filter should be inverted
	$invertFilter = (!($pathFilter === false) && (!(strpos($pathFilter,"!") === false)));
	if ($invertFilter)
		$pathFilter = trim($pathFilter,"!");

	for ($vDev=0; $vDev < $param['dev_amount']; $vDev++)
	{
		$path = $param["dev$vDev"."_path"];

		//Check if the current path matches the filter and should be sorted out
		if ($invertFilter xor (!($pathFilter === false) && (strpos($path,$pathFilter) === false)))
			continue;

		//Filter out drives with set raidLvmLock, if choosen
		if ($filterOutSetRaidLvmLock && isset($param["dev$vDev"."_raidLvmLock"]) && (1 == $param["dev$vDev"."_raidLvmLock"]))
			continue;

		//Add the drive (e.g. /dev/hda) and add size and type information, if choosen only
		$list[$path]=$path.($addSizesAndTypes ? " $I18N_size:".$param["dev".$vDev."_size"] : '');

		//If it is a RAID, don't add the partitions that don't exist on RAIDs
		if (strpos($path,"/dev/md") !== false)
			continue;

		//runs thru the partition numbers
		for ($vPart = 0; $vPart < $param["dev$vDev"."_partamount"]; $vPart++)
			{
				//Filter out partitions with set raidLvmLock, if choosen
				if ($filterOutSetRaidLvmLock && isset($param["dev$vDev"."part$vPart"."_raidLvmLock"]) && (1 == $param["dev$vDev"."part$vPart"."_raidLvmLock"]))
					continue;

				$fileSystem = $param["dev$vDev"."part$vPart"."_fs"];
				$fsType = $param["dev$vDev"."part$vPart"."_type"];

				$partSize = $param["dev$vDev"."part$vPart"."_end"] - $param["dev$vDev"."part$vPart"."_start"];
				
				$fullpath = $path.$param["dev$vDev"."part$vPart"."_nr"];

				//give out device name (hda1,hda2,...), size, fs, partition type (primary, extended, logical
				$list[$fullpath] = $fullpath.($addSizesAndTypes ? " $I18N_size: $partSize $I18N_filesystem: $fileSystem $I18N_type: $fsType" : '');
			}
	}

	return($list);
}





/**
**name FDISK_listDrivesAndPartitions($param, $default, $selName, $pathFilter=false, $partitionsOnly = false)
**description Generates a selection that contains all drives and partitions of a given client.
**parameter param: parameter string containing status informations about the harddisks
**parameter default: the drive to show first
**parameter selName: the name the selection is called in PHP and HTML
**parameter pathFilter: Set this to another value than false if you want only devices with a given string in it.
**parameter partitionsOnly: Set to true, if only partitions should be listed.
**returns String with the HTML selection.
**/
function FDISK_listDrivesAndPartitions($param, $default, $selName, $pathFilter=false, $partitionsOnly = false)
{
	$list=FDISK_getDrivesAndPartitions($param,$pathFilter);
	
	if ($partitionsOnly)
	{
		$list2 = array();
		foreach ($list as $device => $description)
		{
			$devNr = FDISK_getDriveAndNr($device);
			if ($devNr[0] != $device)
				$list2[$device] = $description;
		}
		
		$list = $list2;
	}

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
**name FDISK_formatPart($param, $dev, $type, &$partJobs)
**description formats a partition
**parameter param: parameter string containing status informations about the harddisks
**parameter dev: partition to format (e.g. /dev/hda1)
**parameter type: type of filesystem
**parameter partJobs: parted commands
**/
function FDISK_formatPart($param, $dev, $type, &$partJobs)
{
	FDISK_dev2LDevLPart($param,$dev,$vDev,$vPart);
	if (strpos($dev,"/dev/md") === false)
		$param["dev$vDev"."part$vPart"."_fs"] = $type;
	else
		$param["dev$vDev"."part0_fs"] = $type;

	$partJobs = FDISK_formatJob($dev, $type, $partJobs);

	return ($param);
};





/**
**name FDISK_getBiggestValueOf($param, $dev, $type, $partParam)
**description gets the biggest value from a special type of partition
**parameter param: parameter string containing status informations about the harddisks
**parameter dev: selected device (e.g. hda)
**parameter partType: type of the partition (logical, primary, extended)
**parameter varType: define part of the key for the associative array (e.g. "type" means $param["dev$vDev"."part$vPart"."_type"])
**/
function FDISK_getBiggestValueOf($param, $vDev, $partType, $varType)
{
	$value=-1;

	for ($vPart = 0; $vPart < $param["dev$vDev"."_partamount"]; $vPart++)
		{
			if ($param["dev$vDev"."part$vPart"."_type"] == $partType)
				$new = $param["dev$vDev"."part$vPart"."_$varType"];
				
			if ($new > $value)
				$value=$new;
		};

	return($value);
};





/**
**name FDISK_devNrExists($param, $vDev, $devNr)
**description checks if a certain device number exists
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number.
**parameter devNr: device numer you want to check
**/
function FDISK_devNrExists($param, $vDev, $devNr)
{
	for ( $vPart = 0; $vPart < $param["dev$vDev"."_partamount"]; $vPart++)
		{
			if ($devNr == $param["dev$vDev"."part$vPart"."_nr"])
				return(true);
		};

	return(false);
};





/**
**name FDISK_nextLogicalDevNr($param,$vDev)
**description gets the next free logical device number
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number.
**/
function FDISK_nextLogicalDevNr($param,$vDev)
{
	for ($devNr = 5; true; $devNr++)
		if (!FDISK_devNrExists($param, $vDev, $devNr))
			return($devNr);
};





/**
**name FDISK_nextPrimaryDevNr($param,$vDev)
**description gets the next free primary device number
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number.
**/
function FDISK_nextPrimaryDevNr($param,$vDev)
{
	for ($devNr = 1; $devNr <= 4; $devNr++)
		{
			if (!FDISK_devNrExists($param, $vDev, $devNr))
				return($devNr);
		}

	return(-1);
};





/**
**name FDISK_correctLogical($param,$vDev,$devNr)
**description corrects the order of the logical partitions after deleting $devNr.
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number.
**parameter devNr: the real device number to delete
**/
function FDISK_correctLogical($param,$vDev,$devNr)
{
	$nextDevNr=$devNr+1;

	//get the vPart of the partition after the the deleted partition
	$nextvPart = FDISK_getvPart($param, $vDev, $nextDevNr);
	
	//if there is no following logical partition, there is nothing to correct
	if ($nextvPart == -1)
		return($param);
	
	//vPart of the current real device number
	$vPart = FDISK_getvPart($param, $vDev, $DevNr);

	//if there is no next partition => quit
	if ($nextDevPart == -1)
		return($param);

	//set the device number of the deleted partition to the next one
	$param["dev$vDev"."part$nextvPart"."_nr"] = $devNr;
	

	for ($vPart = 0; $vPart < $param["dev$vDev"."_partamount"]; $vPart++)
		{
			//get the device number
			$dNr = $param["dev$vDev"."part$vPart"."_nr"];
			
			//if the device number is greater than the next device number
			if ($dNr > $devNr+1)
				//decrement the device numbers
				$param["dev$vDev"."part$vPart"."_nr"] = $dNr-1;
	};

	return($param);
};





/**
**name FDISK_findDevNrPosition($param,$start,$end,$vDev,&$newPartNr,$type)
**description returns the device position for the new device
**parameter start: start position for the search
**parameter end: end position for the search
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number.
**parameter newPartNr: stores the new device number
**parameter type: type of the new partition
**/
//DEVICE
function FDISK_findDevNrPosition($param,$start,$end,$vDev,&$newPartNr,$type)
{
	$partAmount = $param["dev$vDev"."_partamount"];

	$extPos=-1;

	//search for an extended partition
	for ($vPart = 0; $vPart < $partAmount; $vPart++)
		if ($param["dev$vDev"."part$vPart"."_type"] == "extended")
			{
				$extPos=$vPart;
				break;
			};

	//we create a new logical partition
	if ($type=="logical")
		{
			//search for logical after the extended partition
			$searchStart = $extPos + 1;
			$searchEnd = $partAmount;

			$newPartNr = FDISK_nextLogicalDevNr($param,$vDev);

			//partition is the first logical partition
			if (FDISK_countPartitions($param, $vDev,"logical")==0)
				return($extPos+1);

			$partAmount--;
		}

	//we create a new primary partition
	if ($type=="primary")
		{
			$searchStart = 0;
			$searchEnd = $extPos + 1;

			//find the first partblock
			for ($vPart=0; $vPart < $partAmount; $vPart++)
				if (strlen($param["dev$vDev"."part$vPart"."_type"]) > 0)
					break;

			
			//the new partition is the first partition on the drive
			//old code for is: $end <= $param["dev$vDev"."part$vPart"."_start"]
			if ((!isset($param["dev$vDev"."_partamount"])) ||
				$param["dev$vDev"."_partamount"]==0 ||
				$end <= $param["dev$vDev"."part$vPart"."_start"])
				{
					$newPartNr=FDISK_nextPrimaryDevNr($param,$vDev);
					return(0);
				};

			$newPartNr = FDISK_nextPrimaryDevNr($param,$vDev);

			//partition is the last primary partition
			if ($start >= FDISK_getBiggestValueOf($param, $vDev, "primary", "end"))
				return(FDISK_countPartitions($param, $vDev, "primary"));

			for ($vPart = 0; $vPart < 4; $vPart++)
				{
					if (($start >= $param["dev$vDev"."part$vPart"."_start"]) &&
						($end <= $param["dev$vDev"."part".($vPart+1)."_end"]))
						return($param["dev$vDev"."part$vPart"."_nr"]);
				};
		}

	if ($type=="extended")
		{
			$searchStart = 0;
			$searchEnd = 4;
		};

	for ($vPart = $searchStart; $vPart < $searchEnd; $vPart++)
		{
			$pStart = $param["dev$vDev"."part$vPart"."_start"];

			if (($pStart == -1) || ($end <= $pStart))
				return($vPart);
		}

	//search vPart for the extended partition
	if ($type=="extended")
		{
			for ($vPart = 0; $vPart < 4; $vPart++)
			{
				//if there is no partition or it is not an primary partition
				$type = $param["dev$vDev"."part$vPart"."_type"];
				if (($type == "logical") || ($type == ""))
					return($vPart);
			}
		};

	return($partAmount+1);
}





/**
**name FDISK_partCreationSelect($param, $vDev)
**description retunes a selection for selecting a partition type to create.
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number.
**/
function FDISK_partCreationSelect($param, $vDev)
{
 $out="<select name=\"SEL_newPart_type\" size=\"1\">";

 if (FDISK_canPartTypeBeCreated($param, $vDev, "primary")==0)
 	$out.="<option>primary</option>";

 if (FDISK_canPartTypeBeCreated($param, $vDev, "extended")==0)
 	$out.="<option>extended</option>";

 if (FDISK_canPartTypeBeCreated($param, $vDev, "logical")==0)
 	$out.="<option>logical</option>";

 $out.="</select>";

 return($out);
};





/**
**name FDISK_canPartTypeBeCreated($param, $vDev, $type)
**description checks if a partition from a certain type can be created
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number.
**parameter type: type of the partition (primary, extended, logical)
**/
function FDISK_canPartTypeBeCreated($param, $vDev, $type)
{
	//get the amount of partition types
	$extCount=FDISK_countPartitions($param, $vDev, "extended");
	$logCount=FDISK_countPartitions($param, $vDev, "logical");
	$priCount=FDISK_countPartitions($param, $vDev, "primary");

	//can't add any more partitions, all primary paritions full
	if ($priCount==4)
		return(-2);

	//can't add another primary partition, maximum ammount of primary partitions exceeded
	if (($type=="primary") && ($priCount==3) && ($extCount==1))
		return(-3);

	//can't create a logical partition due to no extended partition
	if (($extCount==0) && ($type=="logical"))
		return(-4);

	//can't create one more extended partition
	if (($extCount==1) && ($type=="extended"))
		return(-6);

	return(0);
};





/**
**name FDISK_checkFreeSpace($start, $end, $freeSpaces)
**description checks if there is a free space between $start and $end
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number.
**parameter type: type of the partition (primary, extended, logical)
**parameter start: start position for the search
**parameter end: end position for the search
**parameter freeSpaces: array of the free space information
**/
function FDISK_checkFreeSpace($param, $vDev, $type, $start, $end, $freeSpaces)
{
	$ret = FDISK_canPartTypeBeCreated($param, $vDev, $type);

	if ($ret != 0)
		return($ret);

	if ($type=="logical")
		{
			$partAmount = $param["dev$vDev"."_partamount"];

			//find extended partition
			for ($vPart = 0; $vPart < $partAmount; $vPart++)
				if ($param["dev$vDev"."part$vPart"."_type"]=="extended")
					break;

			//logical partition can't be created outside of the extended partition
			if (!(	($start >= $param["dev$vDev"."part$vPart"."_start"]) && 
					($end <= $param["dev$vDev"."part$vPart"."_end"])))
					return(-5);
		};

	//check, if there is free space between start and end
	for ($i=0; $freeSpaces[$i]['start'] != -1; $i++)
		{
			if (($start >= $freeSpaces[$i]['start']) && 
				($end <= $freeSpaces[$i]['end']))
				return(0);
		}

	return(-1);
};





/**
**name FDISK_installExistingDialog($param)
**description showes the dialog for installation on existing partitions
**parameter param: parameter string containing status informations about the harddisks
**/
function FDISK_installExistingDialog(&$param,&$fstab)
{
	$T_SELSWAPPART[0]="linux-swap";
	$T_SELSWAPPART[1]="linux-swap(new)";

	$T_SELINSTPART[0]="ext2";
	$T_SELINSTPART[1]="ext3";
	$T_SELINSTPART[2]="ext4";
	$T_SELINSTPART[3]="reiserfs";
	//$T_SELINSTPART[3]="ReiserFS";

	FDISK_listInstPartSelector($param, $T_SELINSTPART, "SEL_instPart");
	FDISK_listInstPartSelector($param, $T_SELSWAPPART, "SEL_swapPart");

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
 
 echo("
	<table class=\"subtable\" align=\"center\" border=0 cellspacing=5>
	<tr>
	<td><span class=\"subhighlight\">$I18N_type</span></td>
	<td><span class=\"subhighlight\">$I18N_partition</span></td>
	</tr>

	<tr>
	<td>Installation</td>
	<td>
	".SEL_instPart."
	</td>
	</tr>

	<tr>
	<td>Swap</td>
	<td>
	".SEL_swapPart."
	</td>
	</tr>
	</table>");

	FDISK_fstabAddDialog($param,$fstab);
};





/**
**name FDISK_addFstab(&$fstab,$dev,$mountpoint)
**description Adds a new entry to the fstab that is stored in the param array.
**parameter fstab: Array that contains the fstab information. The changed fstab will be written to this parameter too.
**parameter dev: Device to mount (e.g. /dev/hda1)
**parameter mountpoint: Location where to mount the device (e.g. /mnt/hda1)
**/
function FDISK_addFstab(&$fstab,$dev,$mountpoint,$parameter)
{
	if (!isset($fstab['fstab_amount'])) $fstab['fstab_amount'] = 0;
	$fstabNr = $fstab['fstab_amount'];
	$fstab["fstab_dev$fstabNr"] = $dev;
	$fstab["fstab_mnt$fstabNr"] = $mountpoint;
	$fstab["fstab_param$fstabNr"] = $parameter;
	$fstab['fstab_amount']++;
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
**name FDISK_listFstab($fstab)
**description Generates a HTML table with all defined mountpoints.
**parameter param: parameter string containing status informations about the harddisks
**returns HTML table with the fstab.
**/
function FDISK_listFstab(&$fstab)
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

	if ($fstabAmount > 0)
	{
		for ($fstabNr = 0; $fstabNr < $fstab['fstab_amount']; $fstabNr++)
		{
			$butName = "BUT_delFstab$fstabNr";
			if (HTML_submit($butName, $I18N_delete))
				FDISK_delFstab($fstab,$fstabNr);
			
			//Check, if the call of FDISK_delFstab, removed the last line from the fstab. If so, no fstab line should be shown.
			if ($fstab['fstab_amount'] == 0)
				break;

			$out.="
			<tr>
				<td>".$fstab["fstab_dev$fstabNr"]."</td>
				<td>".$fstab["fstab_mnt$fstabNr"]."</td>
				<td>".$fstab["fstab_param$fstabNr"]."</td>
				<td>".constant($butName)."</td>
			</tr>";
		}
	}
$out.="</table>";
return($out);
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
**name FDISK_fstabAddDialog($param,&$fstab)
**description Dialog for adding fstab entries.
**parameter param: parameter string containing status informations about the harddisks
**parameter fstab: Array that contains the fstab information. The changed fstab will be written to this parameter too.
**/
function FDISK_fstabAddDialog($param,&$fstab)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$mountpoint = HTML_input("ED_mnt");
	$parameter = HTML_input("ED_parameter","auto defaults,auto 0 0");
	FDISK_listInstPartSelector($param, $T_SELINSTPART, "SEL_fstabPart",false);

	if (HTML_submit("BUT_addFstab",$I18N_add))
	{
		$temp = explode(" ",$_POST["SEL_fstabPart"]);
		FDISK_addFstab($fstab,$temp[0],$mountpoint,$parameter);
	};

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
	<td colspan=\"3\">".FDISK_listFstab($fstab)."</td>
	</tr>

	</table>");
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
**name FDISK_getBelongingRaidDev($dev, $param)
**description Searches for the RAID device, a physical partition belongs to, if it is part of a RAID.
**parameter dev: The physical partition (e.g. /dev/hda4) that belongs to a RAID.
**parameter param: parameter string containing status informations about the harddisks
**returns The RAID device (e.g. /dev/md0) the physical partition belongs to or false, if no belonging RAID was found.
**/
function FDISK_getBelongingRaidDev($dev, $param)
{
	for ($vDev = 0; $vDev < $param['dev_amount']; $vDev++)
	{
		//Check if the device is a RAID
		if (isset($param["dev$vDev"."_raidDriveAmount"]))
		{
			//Go thru all physical partitions the RAID is build from
			for ($rDev = 0; $rDev < $param["dev$vDev"."_raidDriveAmount"]; $rDev++)
				//Check if the current physical partition is the serached one
				if ($param["dev$vDev"."_raidDrive$rDev"] == $dev)
					return($param["dev$vDev"."_path"]);
		}
	}

	return(false);
}





/**
**name FDISK_delPart($dev, $param, &$partJobs, $deleteBelongingRaid = false)
**description deletes a partition from the param string and generates the parted commands
**parameter dev: the partition to delete (e.g. /dev/hda4)
**parameter param: parameter string containing status informations about the harddisks
**parameter partJobs: parted commands
**parameter deleteBelongingRaid: If set to true, the RAID, the partition belongs to will be destroyed.
**returns Changed param string.
**/
function FDISK_delPart($dev, $param, &$partJobs, $deleteBelongingRaid = false)
{
	if (isset($GLOBALS["m23_language"]))
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		

	FDISK_dev2LDevLPart($param,$dev,$vDev,$vPart);

	//Complain and deny deletion of the partition if it belongs to RAID
	if (isset($param["dev$vDev"."part$vPart"."_raidLvmLock"]))
	{
		//If set to true, the RAID, the partition belongs to will be destroyed
		if ($deleteBelongingRaid)
		{
			//Get the RAID device
			$raidDev = FDISK_getBelongingRaidDev($dev, $param);
			if ($raidDev === false)
				die("Error in partition scheme: The device \"$dev\" is marked as a partition belonging to a RAID, but no RAID was found, that is built with \"$dev\".");
			else
			{
				//Destroy the RAID
				$param = FDISK_delPart($raidDev, $param, $partJobs);
				return($param);
			}
		}
		else
		{
			MSG_showError($I18N_cantDeletePartitionBecauseItIsAssignedToARAID);
			return($param);
		}
	}

	$out=$param;

	$path = $param["dev$vDev"."_path"];

	//set to true, if it is a logical partition
	$logical= ($param["dev$vDev"."part$vPart"."_type"]=="logical");

	/*if you want to delete an extended partition, all logical partitions in it have to be deleted too*/
	if ($param["dev$vDev"."part$vPart"."_type"]=="extended")
		{
			$logCount = FDISK_countPartitions($param, $vDev,"logical");

			/*logical partitions are starting at device number 5. if you delete the first logical partition, the next one becomes #5. to delete all logical partitions you have to delete partition #5 n times, where n is the amount of logical partitions*/
			for ($lCount=0; $lCount < $logCount; $lCount++)
				{
					$out = FDISK_virtualDeletePartition($vDev, 5, $out);
					$partJobs = FDISK_rmJob($path, 5, $partJobs);
					$out = FDISK_correctLogical($out,$vDev,5);
				};

			//Delete the extended partition itself
			$devNr = $param["dev$vDev"."part$vPart"."_nr"];
			$out = FDISK_virtualDeletePartition($vDev, $vPart, $out);
			$partJobs = FDISK_rmJob($path, $devNr, $partJobs);

			$logical=true;
		}
	//Check if the device is a RAID
	elseif(strpos($param["dev$vDev"."_path"],"/dev/md") !== false)
	{
		$out = FDISK_virtualDeleteDrive($vDev, $param);
		//For a RAID no devNr is given
		$partJobs = FDISK_rmJob($path, '', $partJobs);
	}
	else
	{
		$devNr = $param["dev$vDev"."part$vPart"."_nr"];
		$out = FDISK_virtualDeletePartition($vDev, $devNr, $out);
		$partJobs = FDISK_rmJob($path, $devNr, $partJobs);
	}

	//correct the enummeration, if we delete a logical partition
	/*if ($logical)
		$out=FDISK_correctLogical($out,$vDev,$devNr);*/



	return($out);
};





/**
**name FDISK_addPart($param,&$partJobs,$vDev,$start,$end,$type,$freeSpaces)
**description adds a partition to the param string and generates the parted commands
**parameter param: parameter string containing status informations about the harddisks
**parameter partJobs: parted commands
**parameter vDev: virtuell internal used device number.
**parameter start: start position for the search
**parameter end: end position for the search
**parameter type: type of the partition (primary, extended, logical)
**parameter freeSpaces: array of the free space information
**returns: Changed param string.
**/
function FDISK_addPart($param,&$partJobs,$vDev,$start,$end,$type,$freeSpaces)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Check if the drive belongs to a RAID and exit here
	if (isset($param["dev$vDev"."_raidLvmLock"]))
	{
		MSG_showError($I18N_cantCreateAPartitionBecauseTheWholeDriveIsAssignedToARAID);
		return($param);
	}

	//check for the different error codes
	switch (FDISK_checkFreeSpace($param, $vDev, $type, $start, $end, $freeSpaces))
		{
			case -1: MSG_showError($I18N_no_space_in_range); return($param);
			case -2: MSG_showError($I18N_error_4_pri); return($param);
			case -3: MSG_showError($I18N_error_3_pri_1_ext_part); return($param);
			case -4: MSG_showError($I18N_error_0_ext_add_log); return($param);
			case -5: MSG_showError($I18N_error_log_outside_of_ext); return($param);
			case -6: MSG_showError($I18N_error_1_ext_add_ext); return($param);
		};

	$out = FDISK_virtualAddPartition($vDev, $param, $start, $end, $type,$devNr);
	$partJobs = FDISK_addJob($param["dev$vDev"."_path"], $start, $end, $type, $partJobs, $devNr);

	return($out);
};





/**
**name FDISK_listPartitions($param, $vDev,$selName,$excludeType)
**description lists the partitions (/dev/hda1, /dev/hda2, ...) of a device and generates a selection
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number or -1, if all partitions on all devices should be listed.
**parameter selName: name of the selection
**parameter excludeType: type of partitions, not to show in the selection
**returns HTML code for the selection.
**/
function FDISK_listPartitions($param, $vDev,$selName,$excludeType)
{
	$list = FDISK_getPartitionsFromParam($param, $vDev,$selName,$excludeType);
	$nullVar = NULL;
	return(HTML_listSelection($selName,$list,$nullVar));
}





/**
**name FDISK_definePartitionSelection($param, $vDev,$htmlName,$excludeType)
**description Defines a HTML selection with the partitions (/dev/hda1, /dev/hda2, ...) of a device
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number or -1, if all partitions on all devices should be listed.
**parameter selName: name of the selection
**parameter excludeType: type of partitions, not to show in the selection
**returns The selected partition.
**/
function FDISK_definePartitionSelection($param, $vDev,$htmlName,$excludeType)
{
	$list = FDISK_getPartitionsFromParam($param, $vDev,$selName,$excludeType);
	$nullVar = NULL;

	$partList = HELPER_array2AssociativeArray($list);

	return(HTML_selection($htmlName, $partList, SELTYPE_selection));
}





/**
**name FDISK_getPartitionsFromParam($param, $vDev,$selName,$excludeType)
**description Returns an array with the partitions (/dev/hda1, /dev/hda2, ...) of a device
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number or -1, if all partitions on all devices should be listed.
**parameter selName: name of the selection
**parameter excludeType: type of partitions, not to show in the selection
**returns Selected partition.
**/
function FDISK_getPartitionsFromParam($param, $vDev,$selName,$excludeType)
{
	//If the device number is -1, all partitions on all devices should be listed
	if ($vDev == -1)
		{
			$onlyOneDev = false;
			//Start with vDev = 0
			$start = 0;
			//End with the amount - 1
			$end = $param['dev_amount'];
		}
	else
		{
			$onlyOneDev = true;
			$start = $vDev;
			$end = $vDev;
		}

	$lNr = 0;

	//Run thru the drive(s)
	for ($vDev = $start; $vDev < $end; $vDev++)
	{
		$path = $param["dev$vDev"."_path"];

		if (isset($param["dev$vDev"."_raidLvmLock"]) && ($onlyOneDev))
			{
				//No partition can be formated if the whole drive is used for the RAID
				if ($onlyOneDev) //Don't destroy the list of partitions, if we have a RAID and want all partitions on all drives
					$list = array();
			}
		else
			{
				//check if we have a RAID
				if (strpos($path,"/dev/md") === false)
					{
						//no, we haven't a RAID
						for ($vPart = 0; $vPart < $param["dev$vDev"."_partamount"]; $vPart++)
							if ($param["dev$vDev"."part$vPart"."_type"] != $excludeType)
							{
								//check each partition if it isn't used for a RAID and list it too, if all drives should be scanned
								if ((!isset($param["dev$vDev"."part$vPart"."_raidLvmLock"])) || (!$onlyOneDev))
									$list[$lNr++] = $path.$param["dev$vDev"."part$vPart"."_nr"];
							};
					}
				else
					{
						//yes, we have a RAID => add it as the only "partition"
						if ($onlyOneDev)
							$list[0] = $path;
						else
							$list[$lNr++] = $path;
					}
			};
	}

	if (is_array($list))
		sort($list);
	else
		return(array());

	return($list);
}


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
**name FDISK_colorFS($fsName)
**description get color for a selected filesystem
**parameter fsName: name of the file system: ext3, ext2, linux-swap,...
**/
function FDISK_colorFS($fsName)
{
 //html color-codes
 $COL_EXT2="#62A1FF";
 $COL_EXT3="#5186D4";
 $COL_EXT4="#406BA9";
 $COL_SWAP="#BCE408";
 $COL_REISERFS="#FFEC73";
 $COL_FREE="#FFFFFF";
 $COL_NONE="#7FFFF2";
 $COL_EXTENDED="#000000";

 $COL_FAT16="#9D2764";
 $COL_FAT32="#E23890";
 $COL_NTFS="#A83589";
 $COL_HFS="#58B94B";
 $COL_JFS="#E77911";
 $COL_UFS="#FF0000";
 $COL_XFS="#A742C3";

 //give out the correct color to the keyword
 if (stristr($fsName,"ext4"))
	 return($COL_EXT4);

 if (stristr($fsName,"ext3"))
	return($COL_EXT3);

 if (stristr($fsName,"ext2"))
	return($COL_EXT2);

 if (stristr($fsName,"linux-swap"))
	return($COL_SWAP);

 if (stristr($fsName,"reiserfs"))
	return($COL_REISERFS);

 if (stristr($fsName,"fat"))
	return($COL_FAT32);

 if (stristr($fsName,"ntfs"))
	return($COL_NTFS);

 if (($fsName=="") || ($fsName=="free"))
	return($COL_FREE);

 if (stristr($fsName,"none"))
	 return($COL_NONE);


 //should be extended partition
 if (($fsName=="ext") || ($fsName==-1))
	 return($COL_EXTENDED);


 if (stristr($fsName,"HFS"))
	 return($COL_HFS);

 if (stristr($fsName,"jfs"))
	 return($COL_JFS);

 if (stristr($fsName,"ufs"))
	 return($COL_UFS);

 if (stristr($fsName,"xfs"))
	 return($COL_XFS);
};





/**
**name FDISK_getPartitionPercent($param,$vDev,$vPart)
**description calculates the percent of a selected partition
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number.
**parameter vPart: Virtual (internally used) partition number. This is normally another number than the physical number (e.g. 1 on /dev/hda1)
**/
function FDISK_getPartitionPercent($param,$vDev,$vPart)
{
	$partSize = $param["dev$vDev"."part$vPart"."_end"] - $param["dev$vDev"."part$vPart"."_start"];

	$diskSize = $param["dev$vDev"."_size"];

	if ($diskSize==0)
		return(0);

	return(round(($partSize/$diskSize)*100));
}





/**
**name FDISK_getAfterPartition($param,$vDev,$vPart,$factor)
**description calculates ??? of free size after a selected partition
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number.
**parameter vPart: Virtual (internally used) partition number. This is normally another number than the physical number (e.g. 1 on /dev/hda1)
**parameter factor: the factor to multiplay percent amount of free space
**/
function FDISK_getAfterPartition($param,$vDev,$vPart,$factor)
{
	$diskSize = $param["dev$vDev"."_size"];

	if ($diskSize==0)
		return(0);
	
	if ($param["dev$vDev"."part$vPart"."_type"] == "extended")
		//if an extended partition is empty, the space should be shown as "free"
		$from = $param["dev$vDev"."part$vPart"."_start"];
	else
		//a normal partition can have free space after the end
		$from = $param["dev$vDev"."part$vPart"."_end"];

	if ($vPart == $param["dev$vDev"."_partamount"] - 1)
		//partition is the last => $to is end of the drive
		$to = $param["dev$vDev"."_size"];
	else
		//otherwise $to is the start of the next partition
		$to = $param["dev$vDev"."part".($vPart+1)."_start"];

	$freeSize = $to - $from;
	
	if ($factor == 0)
		return($freeSize);
	else
		return(ceil(($freeSize/$diskSize)*$factor));
}





/**
**name FDISK_getBeforeFristPartition($param,$vDev,$factor)
**description gets the free space before the first partition
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: virtual device number to access the drive
**parameter factor: the factor to multiplay percent amount of free space
**/
function FDISK_getBeforeFristPartition($param,$vDev,$factor)
{
	$start = $param["dev$vDev"."part0_start"];
	$diskSize = $param["dev$vDev"."_size"];
	
	if ($factor == 0)
		return($start);

	if ($diskSize == 0)
		return(0);
	return(round(($start/$diskSize)*$factor));
};





/**
**name FDISK_getPartitions($client)
**description get the partition info for the client from db
**parameter client: name of the client
**/
function FDISK_getPartitions($client)
{
	CHECK_FW(CC_clientname, $client);
	$sql = "SELECT partitions FROM `clients` WHERE client='".$client."';";

	$result = DB_query($sql); //FW ok
	$line = mysqli_fetch_row($result);
 
	return (explodeAssoc("###",$line[0]));
};





/**
**name FDISK_getPartInfoString($vDev, $vPart, $param, $fstabA=false)
**description Generates an info string, that shows information about the device name of the partition, its filesystem and bolonging to a RAID.
**parameter vDev: Virtual (internally used) device number.
**parameter vPart: Virtual (internally used) partition number. This is normally another number than the physical number (e.g. 1 on /dev/hda1)
**parameter param: parameter string containing status informations about the harddisks
**parameter fstabA: Associative array with fstab information.
**returns Info string.
**/
function FDISK_getPartInfoString($vDev, $vPart, $param, $fstabA=false)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$fileSystem = $param["dev$vDev"."part$vPart"."_fs"];
	$path = $param["dev$vDev"."_path"];

	//Only partitions that are not a RAID drive do have a device number
	if (strpos($path,"/dev/md") === false)
		$devNr = $param["dev$vDev"."part$vPart"."_nr"];
	else
		$devNr = '';

	$dev = "$path$devNr";

	if (isset($param["dev$vDev"."part$vPart"."_raidLvmLock"]))
	{
		$raidDev = FDISK_getBelongingRaidDev($dev, $param);
		$raidInfoAdd = ", $I18N_partOfTheRAID: $raidDev";
	}
	else
		$raidInfoAdd = '';

	$mountPoint = FDISK_findFstabMountPointByDev($fstabA,"$path$devNr");
	if ($mountPoint !== false)
		$addMP = " $I18N_mountpoint: $mountPoint";

	return("$dev: $I18N_filesystem: $fileSystem$raidInfoAdd$addMP");
}





/**
**name FDISK_getDriveInfoString($vDev, $param, $fstabA=false)
**description Generates an info string, that shows information about the device name of the drive and bolonging to a RAID.
**parameter vDev: Virtual (internally used) device number.
**parameter param: parameter string containing status informations about the harddisks
**parameter fstabA: Associative array with fstab information.
**returns Info string.
**/
function FDISK_getDriveInfoString($vDev, $param, $fstabA=false)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$path = $param["dev$vDev"."_path"];
	$diskSize = $param["dev$vDev"."_size"];

	if (isset($param["dev$vDev"."_raidLvmLock"]))
	{
		$raidDev = FDISK_getBelongingRaidDev($path, $param);
		$raidInfoAdd = "$I18N_partOfTheRAID: $raidDev";
	}
	else
		$raidInfoAdd = '';
		
	$mountPoint = FDISK_findFstabMountPointByDev($fstabA,$path);
	if ($mountPoint !== false)
		$addMP = " $I18N_mountpoint: $mountPoint";

	return("$path: $I18N_size: $diskSize MB $raidInfoAdd$addMP");
}





/**
**name FDISK_getDriveInfoIcon($vDev, $param, $fstabA=false)
**description Generates HTML code for showing an icon with status information about a drive.
**parameter vDev: Virtual (internally used) device number.
**parameter param: parameter string containing status informations about the harddisks
**parameter fstabA: Associative array with fstab information.
**returns HTML code for showing an icon with status information about the drive.
**/
function FDISK_getDriveInfoIcon($vDev, $param, $fstabA=false)
{
	return(FDISK_getPartInfoIcon($vDev, false, $param, $fstabA));
}





/**
**name FDISK_getPartInfoIcon($vDev, $vPart, $param, $fstabA=false)
**description Generates HTML code for showing an icon with status information about a drive or partition.
**parameter vDev: Virtual (internally used) device number.
**parameter vPart: Virtual (internally used) partition number. This is normally another number than the physical number (e.g. 1 on /dev/hda1) and if set to false, the icon and the status information will be generated for a drive and not for a partition.
**parameter param: parameter string containing status informations about the harddisks
**parameter fstabA: Associative array with fstab information.
**returns HTML code for showing an icon with status information about the drive or partition.
**/
function FDISK_getPartInfoIcon($vDev, $vPart, $param, $fstabA=false)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Generate icon and info string with information about the current partition
	if ($vPart === false)
		$partInfoStr = FDISK_getDriveInfoString($vDev, $param, $fstabA);
	else
		$partInfoStr = FDISK_getPartInfoString($vDev, $vPart, $param, $fstabA);

	$infoIcon = "<img width=16 height=16 src=\"/gfx/info.png\" title=\"$partInfoStr\" alt=\"$partInfoStr\">";

	//Mark partitions that belong to a RAID
	if	(
			(($vPart === false ) && isset($param["dev$vDev"."_raidLvmLock"])) ||
			(($vPart !== false ) && isset($param["dev$vDev"."part$vPart"."_raidLvmLock"]))
		)
		$infoIcon .= " <img width=16 height=16 src=\"/gfx/imaging.png\" title=\"$partInfoStr\" alt=\"$partInfoStr\">";
		
	return($infoIcon);
}




/**
**name FDISK_printBars($param, $dev, $addJavaScript = false, $fstabA=false)
**description prints the partitions as colored table
**parameter param: parameter string containing status informations about the harddisks
**parameter dev: selected device (e.g. /dev/hda)
**parameter addJavaScript: Set to true to add JavaScript code that calls the JS function emptySpace(), if empty parts of the drive are clicked, selectPartition(), if a partition is clicked and showPartTable(), if the mouse is over the bar.
**parameter fstabA: Associative array with fstab information.
**/
function FDISK_printBars($param, $dev, $addJavaScript = false, $fstabA=false)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$freeColor=FDISK_colorFS("free");

	FDISK_dev2LDevLPart($param,$dev,$vDev,$vPart);
	$diskSize = $param["dev$vDev"."_size"];
	$partAmount = $param["dev$vDev"."_partamount"];
	$path = $param["dev$vDev"."_path"];

	$partTableEntryNr = 100 * $vDev;

	//Extra style for marking <td>s that contain extended partitions
	$extendedBorderCSS = "style=\"border-color:#FFFF00; border-width:2px; border-style:solid; padding:4px\"";

	if ($addJavaScript)
	{
		$JSAddPartTable = " onMouseOver=\"showPartTable('partTables$path');";

		//Only create JS code for empty drive
		if ($partAmount == 0)
			$JSemptyDrive = "onClick=\"selectPartition('$dev','$path'); emptySpace(0, $diskSize, '$path')\" onMouseOver=\"markPartTableEntry('PartTableEntry-Empty')\"";
	}
	else
		$infoIcon = $JSAddPartTable = $JSemptyDrive = "";
	
	echo("<table id=\"fdiskbar\" bgcolor=\"$freeColor\" cellspacing=\"1\" cellpadding=\"1\" border=\"2\" width=\"100%\" height=\"40\" $JSemptyDrive ><tr>");
	
	if ($partAmount == 0)
	{
		$infoIcon = FDISK_getDriveInfoIcon($vDev, $param, $fstabA);
		echo("<td align=\"center\">$infoIcon</td></tr></table>");
		return(false);
	}

	//get the percentage of free space before the first partition
	$beforePercent = FDISK_getBeforeFristPartition($param,$vDev,100);

	//if there is free space
	if ($beforePercent > 0)
	{
		if ($addJavaScript)
		{
			$JSAddEmptySpace = " onClick=\"emptySpace(0, ".FDISK_getBeforeFristPartition($param,$vDev,0).", '$path')\"";
			$JSAdd = "$JSAddPartTable markPartTableEntry('PartTableEntry$partTableEntryNr')\"";
			$partTableEntryNr++;
		}

		echo("<td $JSAdd $JSAddEmptySpace bgcolor=\"".$freeColor."\" width=\"".$beforePercent."%\"><center><H3></H3></center></td>");
	}
 
	//run thru the partitions
	for ($vPart=0; $vPart < $partAmount; $vPart++)
	{
		$fileSystem = $param["dev$vDev"."part$vPart"."_fs"];

		//Only partitions that are not a RAID drive do have a device number
		if (strpos($path,"/dev/md") === false)
			$devNr = $param["dev$vDev"."part$vPart"."_nr"];
		else
			$devNr = '';

		$dev = "$path$devNr";

		//Set an extra icon if the partition is for installation or for swapping
		$extraIcon = '';
		if ($dev == FDISK_fdiskSessionInstPart())
			$extraIcon = "<img width=16 height=16 src=\"/gfx/instPart.png\" title=\"$I18N_installationPartition\" alt=\"$I18N_installationPartition\">";
		elseif ($dev == FDISK_fdiskSessionSwapPart())
			$extraIcon = "<img width=16 height=16 src=\"/gfx/swapPart.png\" title=\"$I18N_swapPartition\" alt=\"$I18N_swapPartition\">";

		//Generate icon and info string with information about the current partition
		$infoIcon = FDISK_getPartInfoIcon($vDev, $vPart, $param, $fstabA);


		//if fileSystem is -1 it should be extended partition (has no fileSystem)
		if ($param["dev$vDev"."part$vPart"."_type"]!='extended')
		{
			if ($addJavaScript)
			{
				$JSAddSelectPartition = " onClick=\"selectPartition('$dev','$path')\"";
				$JSAdd = "$JSAddPartTable markPartTableEntry('PartTableEntry$partTableEntryNr')\"";
				$partTableEntryNr++;
			}

			//Add extra CSS to mark logical partitions
			$extraCSS = ($param["dev$vDev"."part$vPart"."_type"]=='logical' ? $extendedBorderCSS : '');

			echo("<td $JSAddPartTableEntry $JSAdd $JSAddSelectPartition $extraCSS bgcolor=\"".FDISK_colorFS($fileSystem)."\" width=\"".FDISK_getPartitionPercent($param,$vDev,$vPart)."%\"><center><b>$devNr</b>$raidInfoAdd$infoIcon$extraIcon</center></td>
			");
		}
		else
			$partTableEntryNr++;

		//check for free space after partition
		$freePercent = FDISK_getAfterPartition($param,$vDev,$vPart,100);

		if ($freePercent > 0)
		{
			if ($addJavaScript)
			{
				//If the empty space lays in an extended partition, the borders of the extended partition should be used
				if ($param["dev$vDev"."part$vPart"."_type"]=='extended')
				{
					$extraCSS = $extendedBorderCSS;
					$fsstart = $param["dev$vDev"."part$vPart"."_start"];
					$fsend =  $param["dev$vDev"."part$vPart"."_end"];
				}
				else
				{
					//Calculate the start and end points of the free space
					$freeSpace = FDISK_getAfterPartition($param,$vDev,$vPart,0);
					$fsstart = $param["dev$vDev"."part$vPart"."_end"];
					$fsend = $freeSpace + $fsstart;

					//Check if there is an extended partition and what virtual partition number it has
					$extendedvPart = FDISK_getPartitionByType($param, $vDev, 'extended');
					if ($extendedvPart !== false)
					{
						//Add CSS for marking free spaces, if the free space is laying in the borders of the extended partition
						$extraCSS = (($fsstart >= $param["dev$vDev"."part$extendedvPart"."_start"]) && ($fsend <= $param["dev$vDev"."part$extendedvPart"."_end"]) ? $extendedBorderCSS : '');
					}
				}
				$JSAddEmptySpace = " onClick=\"emptySpace($fsstart, $fsend, '$path')\" $JSAddPartTableEntry";
				
				$JSAdd = "$JSAddPartTable markPartTableEntry('PartTableEntry$partTableEntryNr')\"";
				$partTableEntryNr++;
			}

			echo("<td $JSAdd $JSAddEmptySpace $extraCSS bgcolor=\"".$freeColor."\" width=\"".$freePercent."%\"><center></center></td>
			");
		}
	};

	echo("</tr></table>");
};





/**
**name FDISK_getSupportedFS()
**description Generates and returns an array with the list of supported file systems.
**returns Array with the list of supported file systems.
**/
function FDISK_getSupportedFS()
{
	$list[0] = "ext2";
	$list[1] = "ext3";
	$list[2] = "ext4";
	$list[3] = "linux-swap";
	$list[4] = "reiserfs";
	return($list);
}





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





// function FDISK_virtualDeletePartition($vDev, $devNr, $param)
// {
// 	$vPart = FDISK_getvPart($param, $vDev, $devNr);
// 
// 	//generate all key names to delete
// 	$delKeys[0]="dev$vDev"."part$vPart"."_nr";
// 	$delKeys[1]="dev$vDev"."part$vPart"."_start";
// 	$delKeys[2]="dev$vDev"."part$vPart"."_end";
// 	$delKeys[3]="dev$vDev"."part$vPart"."_type";
// 	$delKeys[4]="dev$vDev"."part$vPart"."_fs";
// 	$delKeys[5]="dev$vDev"."part$vPart"."_raidLvmLock";
// 
// 	$param = delFromArray($param,$delKeys);
// 	
// 	$partAmount = $param["dev$vDev"."_partamount"];
// 
// 	//move all following partitions
// 	for (;$vPart < $partAmount - 1; $vPart++)
// 		{
// 			$param["dev$vDev"."part$vPart"."_nr"] = $param["dev$vDev"."part".($vPart+1)."_nr"];
// 			$param["dev$vDev"."part$vPart"."_start"] =
// 			$param["dev$vDev"."part".($vPart+1)."_start"];
// 			$param["dev$vDev"."part$vPart"."_end"] =
// 			$param["dev$vDev"."part".($vPart+1)."_end"];
// 			$param["dev$vDev"."part$vPart"."_type"] =
// 			$param["dev$vDev"."part".($vPart+1)."_type"];
// 			$param["dev$vDev"."part$vPart"."_fs"] =
// 			$param["dev$vDev"."part".($vPart+1)."_fs"];
// 			$param["dev$vDev"."part$vPart"."_raidLvmLock"] =
// 			$param["dev$vDev"."part".($vPart+1)."_raidLvmLock"];
// 		};
// 
// 	//delete last partition, that was transferred to the pre last
// 	$partAmount--;
// 	
// 	$delKeys[0]="dev$vDev"."part$partAmount"."_nr";
// 	$delKeys[1]="dev$vDev"."part$partAmount"."_start";
// 	$delKeys[2]="dev$vDev"."part$partAmount"."_end";
// 	$delKeys[3]="dev$vDev"."part$partAmount"."_type";
// 	$delKeys[4]="dev$vDev"."part$partAmount"."_fs";
// 	$delKeys[5]="dev$vDev"."part$partAmount"."_raidLvmLock";
// 	$param = delFromArray($param,$delKeys);
// 
// 	$param["dev$vDev"."_partamount"]--;
// 
// 	return($param);
// };





/**
**name FDISK_deletePartitionFromParam($vDev, $vPart, $param)
**description Deletes all partition parameters of a partition from param without correcting the other partitions.
**parameter vDev: Virtual (internally used) device number.
**parameter vPart: Virtual (internally used) partition number. This is normally another number than the physical number (e.g. 1 on /dev/hda1)
**parameter param: parameter string containing status informations about the harddisks.
**returns Changed param without the partition.
**/
function FDISK_deletePartitionFromParam($vDev, $vPart, $param)
{
	$i = 0;
	$delKeys = array();

	//Build an array that contains all keys, that belong to the choosen partition (generate all key names to delete)
	foreach($param as $key => $val)
	{
		if (strpos($key, "dev$vDev"."part$vPart"."_") !== false)
			$delKeys[$i++] = $key;
	}

	//Delete the choosen partition values
	$param = delFromArray($param,$delKeys);

	return($param);
}





/**
**name FDISK_virtualDeletePartition($vDev, $devNr, $param)
**description deletes partition from param assigned thru $vDev and $vPart.
**parameter vDev: Virtual (internally used) device number.
**parameter devNr: device number of the real device
**parameter param: parameter string containing status informations about the harddisks
**/
function FDISK_virtualDeletePartition($vDev, $devNr, $param)
{
	$vPart = FDISK_getvPart($param, $vDev, $devNr);

	//Delete the choosen partition values
	$param = FDISK_deletePartitionFromParam($vDev, $vPart, $param);

	//Store the amount of partitions on the current drive
	$partAmount = $param["dev$vDev"."_partamount"];

	/*
		move all following partitions
		$param["dev$vDev"."part$vPart"."_nr"] = $param["dev$vDev"."part".($vPart+1)."_nr"];
	*/
	for (;$vPart < $partAmount - 1; $vPart++)
	{
		//Clear all keys for the current partition
		$param = FDISK_deletePartitionFromParam($vDev, $vPart, $param);

		//Run thru all partition keys for the current drive
		foreach($param as $key => $val)
		{
			//Check if the key belongs to the NEXT partition (e.g. dev1part1_start)
			if (strpos($key, "dev$vDev"."part".($vPart+1)."_") !== false)
			{
				//Generate the according key for the CURRENT partition (e.g. dev1part0_start)
				$keyBelow = str_replace("part".($vPart+1)."_",  "part$vPart"."_" ,  $key);

				//Copy the value of the NEXT partition to the CURRENT partition
 				$param[$keyBelow] = $param[$key];
			}
		}
	}

	//delete last partition, that was transferred to the pre last
	$partAmount--;
	$param = FDISK_deletePartitionFromParam($vDev, $partAmount, $param);

	$param["dev$vDev"."_partamount"] = $partAmount;

	return($param);
};





/**
**name FDISK_virtualAddPartition($vDev, $param, $start, $end, $type, $devNr)
**description adds a partition to the param param
**parameter vDev: virtuell internal used device number.
**parameter param: parameter string containing status informations about the harddisks
**parameter start: start MB of the new partition
**parameter end: end MB of the new partition
**parameter type: type of the partition (primary, extended, logical)
**parameter devNr: returnes the device number
**/
function FDISK_virtualAddPartition($vDev, $param, $start, $end, $type, &$devNr)
{
	$vPartPos = FDISK_findDevNrPosition($param,$start, $end,$vDev,$devNr,$type);
	
// 	print("vPartPos: $vPartPos<br>");
// 	return ($param); //DEBUG

	//set the filesystem for the new partition
	if ($type != "extended")
		$FStype="none";
	else
		$FStype=-1;

	$partAmount = $param["dev$vDev"."_partamount"];

	//move all trailing partitions
	for ($vPart = $partAmount - 1; $vPart >= $vPartPos; $vPart--)
		{
			//Clear all keys for the partition to write to
			$param = FDISK_deletePartitionFromParam($vDev, $vPart + 1, $param);
	
			//Run thru all partition keys for the current drive
			foreach($param as $key => $val)
			{
				//Check if the key belongs to the CURRENT partition (e.g. dev1part1_start)
				if (strpos($key, "dev$vDev"."part".$vPart."_") !== false)
				{
					//Generate the according key for the CURRENT partition (e.g. dev1part0_start)
					$keyNext = str_replace("part".$vPart."_",  "part".($vPart+1)."_" ,  $key);
	
					//Copy the value of the NEXT partition to the CURRENT partition
					$param[$keyNext] = $param[$key];
				}
			}
		};
		
	$vPart = $vPartPos;
	$param = FDISK_deletePartitionFromParam($vDev, $vPart, $param);
	$param["dev$vDev"."part$vPart"."_nr"] = $devNr;
	$param["dev$vDev"."part$vPart"."_start"] = $start;
	$param["dev$vDev"."part$vPart"."_end"] = $end;
	$param["dev$vDev"."part$vPart"."_type"] = $type;
	$param["dev$vDev"."part$vPart"."_fs"] = $FStype;
	$param["dev$vDev"."_partamount"]++;
	
	return ($param);
};
// function FDISK_virtualAddPartition($vDev, $param, $start, $end, $type, &$devNr)
// {
// 	$vPartPos = FDISK_findDevNrPosition($param,$start, $end,$vDev,&$devNr,$type);
// 
// 	//set the filesystem for the new partition
// 	if ($type != "extended")
// 		$FStype="none";
// 	else
// 		$FStype=-1;
// 		
// 	$partAmount = $param["dev$vDev"."_partamount"];
// 		
// 	//move all following partitions
// 	for ($vPart = $partAmount - 1; $vPart >= $vPartPos; $vPart--)
// 		{
// 			$param["dev$vDev"."part".($vPart+1)."_nr"]=
// 			$param["dev$vDev"."part$vPart"."_nr"];
// 			$param["dev$vDev"."part".($vPart+1)."_start"] =
// 			$param["dev$vDev"."part$vPart"."_start"];
// 			$param["dev$vDev"."part".($vPart+1)."_end"] = 
// 			$param["dev$vDev"."part$vPart"."_end"];
// 			$param["dev$vDev"."part".($vPart+1)."_type"] =
// 			$param["dev$vDev"."part$vPart"."_type"];
// 			$param["dev$vDev"."part".($vPart+1)."_fs"] =
// 			$param["dev$vDev"."part$vPart"."_fs"];
// 		};
// 		
// 	$vPart = $vPartPos;
// 	$param["dev$vDev"."part$vPart"."_nr"] = $devNr;
// 	$param["dev$vDev"."part$vPart"."_start"] = $start;
// 	$param["dev$vDev"."part$vPart"."_end"] = $end;
// 	$param["dev$vDev"."part$vPart"."_type"] = $type;
// 	$param["dev$vDev"."part$vPart"."_fs"] = $FStype;
// 	$param["dev$vDev"."_partamount"]++;
// 	
// 	return ($param);
// };





/**
**name FDISK_listPartTable($param, $vDev)
**description lists the partition information as table
**parameter vDev: Virtual (internally used) device number.
**parameter param: parameter string containing status informations about the harddisks
**/
function FDISK_listPartTable($param, $vDev)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$partAmount = $param["dev$vDev"."_partamount"];
	$diskSize = $param["dev$vDev"."_size"];
	$freeColor = FDISK_colorFS("free");

	$partTableEntryNr = $vDev * 100;

	//get the amount in MB of free space before the first partition
	$before = FDISK_getBeforeFristPartition($param,$vDev,0);

echo("<table class=\"partTables\" align=\"center\" border=0 cellspacing=5>
<tr>
	<td width=\"10\"></td>
	<td><span class=\"subhighlight\">$I18N_partition</span></td>
	<td><span class=\"subhighlight\">$I18N_type</span></td>
	<td><span class=\"subhighlight\">$I18N_filesystem</span></td>
	<td><span class=\"subhighlight\">$I18N_size</span></td>
	<td><span class=\"subhighlight\">$I18N_range</span></td>

	</td>
</tr>");

	//if there is free space
	if ($before > 0)
		{
			$nextID = 'id="PartTableEntry'.($partTableEntryNr++).'"';
		
			echo("<tr $nextID>
			<td width=\"20\" bgcolor=\"$freeColor\"></td>
			<td>-</td><td>-</td><td>-</td><td>$before</td>
			<td>0 - $before</td>
			</tr>");
		};

	//runs thru the partition numbers
	for ($vPart=0; $vPart < $partAmount; $vPart++)
		{
			$nextID = 'id="PartTableEntry'.($partTableEntryNr++).'"';

			$fileSystem = $param["dev$vDev"."part$vPart"."_fs"];

			$partSize = $param["dev$vDev"."part$vPart"."_end"] - $param["dev$vDev"."part$vPart"."_start"];

			$path = $param["dev$vDev"."_path"];

			//Mark partitions that belong to a RAID
			if (isset($param["dev$vDev"."part$vPart"."_raidLvmLock"]))
				$raidInfoAdd = ' +RAID';
			else
				$raidInfoAdd = '';

			//Add information about the partitions, the RAID is build from, if it's a RAID
			if (strpos($path,"/dev/md") !== false)
			{
				$raidInfoAdd = '<p>'.FDISK_listRaidTable($path,$param).'</p>';
				$deviceName = $param["dev$vDev"."_path"];
			}
			else
				$deviceName = $param["dev$vDev"."_path"].$param["dev$vDev"."part$vPart"."_nr"];

			//give out fileSystem color, device name (hda1,hda2,...), size, fs, partition type (primary, extended, logical
			echo("<tr $nextID>
				<td width=\"20\" bgcolor=".FDISK_colorFS($fileSystem)."></td>
				<td>$deviceName</td>
				<td>".$param["dev$vDev"."part$vPart"."_type"]."$raidInfoAdd</td>
				<td>$fileSystem</td>
				<td>$partSize</td>
				<td>".$param["dev$vDev"."part$vPart"."_start"]." -
					".$param["dev$vDev"."part$vPart"."_end"]."</td>
				</tr>");

		//check for free space after partition		
		$freeSpace = FDISK_getAfterPartition($param,$vDev,$vPart,0);

	 if (($freeSpace > 0) && ($param["dev$vDev"."part$vPart"."_type"] != "extended"))
		{
			$fsstart = $param["dev$vDev"."part$vPart"."_end"];
			$fsend = $freeSpace + $fsstart;

			$nextID = 'id="PartTableEntry'.($partTableEntryNr++).'"';

		 	echo("<tr $nextID>
				<td width=\"20\" bgcolor=$freeColor></td>
				<td>-</td><td>-</td><td>-</td>
				<td>$freeSpace</td>
				<td>$fsstart - $fsend</td>
				</tr>");
		};
	};


	//if there are no partitions, all space is free
	if ($partAmount == 0)
		{
			$afterStart=0;
			
			$afterSize = $diskSize - $afterStart;

			//if there is free space
			if ($afterSize > 0)
				{
					echo("<tr id=\"PartTableEntry-Empty\">
					<td width=\"20\" bgcolor=\"$freeColor\"></td>
					<td>-</td><td>-</td><td>-</td><td>$afterSize</td>
					<td>$afterStart - $diskSize</td>
					</tr>");
				};
		};

	echo("</table>");
}






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

			if (($fsType != "extended") && 
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
					};
		}
	}

	//Make sure, the MDs are at the end.
	$list = FDISK_mdToEndOfArray($list);

	HTML_selection($selName,$list,SELTYPE_selection,true);
}





/**
**name FDISK_formatExisting($instPart, $swapPart,&$command, $param)
**parameter instPart: partition to put the operation system on (e.g. /dev/hda1)
**parameter swapPart: partition to put the swap file system on (e.g. /dev/hdb2)
**parameter command: parted commands to do the installation
**parameter param: parameter string containing status informations about the harddisks
**/
function FDISK_formatExisting($instPart, $swapPart,&$command, $param)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$path = $param["dev$vDev"."_path"];

	//instPart may be a string like "/dev/hda1 size:714 filesystem:ext3"
	if (substr_count($instPart, " ") > 0)
		{
			//there are one or more blanks => take the first part = device name
			$temp = explode(" ",$instPart);
			$instPart = $temp[0];
		};

	//do the same with the swap partition
	if (substr_count($swapPart, " ") > 0)
		{
			$temp = explode(" ",$swapPart);
			$swapPart = $temp[0];
		};

	FDISK_dev2LDevLPart($param,$instPart,$vDevI,$vPartI);
	FDISK_dev2LDevLPart($param,$swapPart,$vDevS,$vPartS);

	if (($vDevI == $vDevS) && ($vPartI == $vPartS))
		{
			//if Xpart is empty, there was no partition selected
			if (!empty($instPart) && !empty($swapPart))
				MSG_showError($I18N_cant_select_the_same_partitions_for_install_swap);

			return($param);
		}

	//set new filesystems
	$param["dev$vDev"."part$vPartI"."_fs"] = "ext3";
	$param["dev$vDev"."part$vPartS"."_fs"] = "linux-swap";

	//add format jobs
	$command = FDISK_formatJob($instPart, "ext3", $command);
	$command = FDISK_formatJob($swapPart, "linux-swap", $command);

	return($param);
};





/**
**name FDISK_getvPart($param, $vDev, $devNr)
**description returns vPart with the real device number.
**parameter param: parameter string containing status informations about the harddisks
**parameter dev: selected device (e.g. hda)
**parameter devNr: number of partition
**/
function FDISK_getvPart($param, $vDev, $devNr)
{
	for ($vPart = 0; $vPart < $param["dev$vDev"."_partamount"]; $vPart++)
		{
			if ($param["dev$vDev"."part$vPart"."_nr"] == $devNr)
				return($vPart);
		}

	return(-1);
};





/**
**name FDISK_rmJob($path, $devNr, $partJobs)
**description generates a partition remove job
**parameter dev: selected device (e.g. hda)
**parameter devNr: number of partition, minor number in parted
**parameter partJobs: associative array with partition jobs
**/
function FDISK_rmJob($path, $devNr, $partJobs)
{
	if (!isset($partJobs['job_amount'])) $partJobs['job_amount'] = 0;
	$jobNr = $partJobs['job_amount'];
	$partJobs["command$jobNr"] = "rm";
	$partJobs["path$jobNr"] = $path;
	$partJobs["devNr$jobNr"] = $devNr;
	$partJobs['job_amount']++;

	return($partJobs);
};





/**
**name FDISK_addJob($dev, $start, $end, $type)
**description generates a partition add job
**parameter path: selected device (e.g. /dev/hda)
**parameter start: start point fo the partition
**parameter end: end point fo the partition
**parameter type: type of the partition (primary, logical)
**parameter partJobs: associative array with partition jobs
**parameter fullPath: full path for the partition
**parameter devNr: number of the device (e.g. 1 with /dev/hda1)
**/
function FDISK_addJob($path, $start, $end, $type, $partJobs, $devNr)
{
	if (!isset($partJobs['job_amount'])) $partJobs['job_amount'] = 0;
	$jobNr = $partJobs['job_amount'];
	$partJobs["command$jobNr"] = "add";
	$partJobs["path$jobNr"] = $path;
	$partJobs["start$jobNr"] = $start;
	$partJobs["end$jobNr"] = $end;
	$partJobs["type$jobNr"] = $type;
	$partJobs["devNr$jobNr"] = $devNr;
	$partJobs['job_amount']++;

	return($partJobs);
}





/**
**name FDISK_bootflagJob($path, $devNr, $partJobs)
**description enables the booting flag on a partition
**parameter path: device to activate booting on (e.g. /dev/hda1)
**parameter devNr: number of partition, minor number in parted
**parameter partJobs: associative array with partition jobs
**/
function FDISK_bootflagJob($path, $devNr, $partJobs)
{
	if (!isset($partJobs['job_amount'])) $partJobs['job_amount'] = 0;
	$jobNr = $partJobs['job_amount'];
	$partJobs["command$jobNr"] = "bflag";
	$partJobs["path$jobNr"] = $path;
	$partJobs["devNr$jobNr"] = $devNr;
	$partJobs['job_amount']++;

	return($partJobs);
};





/**
**name FDISK_formatJob($part, $fileSystem)
**description generates a partition format job
**parameter path: device to format (e.g. /dev/hda1)
**parameter fileSys: file system of the partition: ext3, ext2, linux-swap
**parameter partJobs: associative array with partition jobs
**/
function FDISK_formatJob($path, $fileSystem, $partJobs)
{
	if (!isset($partJobs['job_amount'])) $partJobs['job_amount'] = 0;
	$jobNr = $partJobs['job_amount'];
	$partJobs["command$jobNr"] = "format";
	$partJobs["path$jobNr"] = $path;
	$partJobs["fs$jobNr"] = $fileSystem;
	$partJobs['job_amount']++;

	return($partJobs);
};





/**
**name FDISK_countPartitions($param, $vDev, $type)
**description count all partitions of a selected type
**parameter param: parameter string containing status informations about the harddisks
**parameter vDev: Virtual (internally used) device number.
**parameter type: type of the partition (primary, extended, logical)
**/
function FDISK_countPartitions($param, $vDev, $type)
{
	$partCounter=0;
	$count=0;

	for ($vPart = 0; $vPart < $param["dev$vDev"."_partamount"]; $vPart++)
		if ($param["dev$vDev"."part$vPart"."_type"] == $type)
			$count++;

	return($count);
}





/**
**name FDISK_getFreeSpaces($param,$dev)
**description get free spaces as array
**parameter param: parameter string containing status informations about the harddisks
**parameter dev: selected device (e.g. hda)
**/
function FDISK_getFreeSpaces($param,$vDev)
{
	$freeSpaceNr=0;

	$partAmount = $param["dev$vDev"."_partamount"];
	$diskSize = $param["dev$vDev"."_size"];
	
	//if there are no partitions the while drive is free
	if ($partAmount == 0)
		{
			$freeSpaces[0]['start']=0;
			$freeSpaces[0]['end']=$diskSize;
			$freeSpaces[0]['size']=$diskSize;
			return($freeSpaces);
		};

	//get the percentage of free space before the first partition
	$before = FDISK_getBeforeFristPartition($param,$vDev,0);

	//if there is free space
	if ($before > 0)
		{
			//start of the free space
			$freeSpaces[$freeSpaceNr]['start']=0;
			//end of the free space
			$freeSpaces[$freeSpaceNr]['end']=$before;
			//size of the free space
			$freeSpaces[$freeSpaceNr]['size']=$before;
			$freeSpaceNr++;
		};

	//runs thru the partitionnumbers
	for ($vPart = 0; $vPart < $partAmount; $vPart++)
		{
			$fileSystem = $param["dev$vDev"."part$vPart"."_fs"];
			$partType = $param["dev$vDev"."part$vPart"."_type"];

			//check for free space after partition
			$freeSpace = FDISK_getAfterPartition($param,$vDev,$vPart,0);

			if ($freeSpace > 0)
				{
					if ($partType == "extended")
						$fsstart = $param["dev$vDev"."part$vPart"."_start"];
					else
						//free space starts at the end of the partition
						$fsstart = $param["dev$vDev"."part$vPart"."_end"];
						
					//and ends after the end of the partition + the amount of free space
					$fsend = $freeSpace + $fsstart;

					//start of the free space
					$freeSpaces[$freeSpaceNr]['start'] = $fsstart;
					//end of the free space
					$freeSpaces[$freeSpaceNr]['end'] = $fsend;
					//size of the free space
					$freeSpaces[$freeSpaceNr]['size'] = $freeSpace; 

					$freeSpaceNr++;
				};
		};

	$freeSpaces[$freeSpaceNr]['start']=-1;

	return($freeSpaces);
}





/**
**name FDISK_autoPart($clientName,&$command, $dev,$param,&$instPart,&$swapPart, $minSwap=256, $maxSwap=512)
**description generation of param string and command list for automatic partition
**parameter clientName: name of the client
**parameter command: parted commands are written to $command
**parameter dev: selected device (e.g. /dev/hda)
**parameter param: parameter string containing status informations about the harddisks
**parameter instPart: the variable the installation device name is written to
**parameter swapPart: the variable the swap device name is written to
**parameter minSwap: Minimal size of the swap partition in MB.
**parameter maxSwap: Maximal size of the swap partition in MB.
**/
function FDISK_autoPart($clientName, &$command, $dev, $param, &$instPart, &$swapPart, $minSwap=256, $maxSwap=512)
{
	//generate the device names for installation and swap
	$instPart=$dev."1";
	$swapPart=$dev."2";

	$command="";

	FDISK_dev2LDevLPart($param,$dev,$vDev,$vPart);

	//set all parameters that are the same 
	$nParam["dev$vDev"."_path"] = $param["dev$vDev"."_path"];
	$nParam["dev$vDev"."_size"] = $param["dev$vDev"."_size"];
	$nParam["dev$vDev"."_partamount"] = 2;

	$deletedDevices = array();

	//remove all primary partitions, if there is an extended partition, the logical partitions will be deleted automatical => all partitions are deleted
	for ($devNr = 1; $devNr <= 4; $devNr++)
		if (FDISK_devNrExists($param, $vDev, $devNr))
		{
			if (!in_array("$dev$devNr", $deletedDevices))
			{
				$param = FDISK_delPart($dev.$devNr,$param,$command,true);
			}
			array_push($deletedDevices, "$dev$devNr");
		}

	$nParam['dev_amount'] = $param['dev_amount'];

	//calculate size of swap
	$swapSize=HWINFO_getMemory($clientName) / 512;
	
	if ($swapSize > $maxSwap)
		$swapSize = $maxSwap;
	//needed for massinstall
	if ($swapSize < $minSwap)
		$swapSize = $minSwap;

	$baseSize = $param["dev$vDev"."_size"] - $swapSize;

	//calc end of baseSystem
	$baseEnd=$baseSize;

	//create and format installation partition
	$command = FDISK_addJob($dev, 0, $baseEnd, "primary", $command,1);
	$command = FDISK_formatJob($instPart, "ext4", $command);
	$command = FDISK_bootflagJob($dev, 1, $command);

	//create parameters for the installation partition
	$nParam["dev$vDev"."part0_nr"] = 1;
	$nParam["dev$vDev"."part0_start"] = 0;
	$nParam["dev$vDev"."part0_end"] = $baseEnd;
	$nParam["dev$vDev"."part0_type"] = "primary";
	$nParam["dev$vDev"."part0_fs"] = "ext4";


	//calc start + end of the swap partition
	$swapStart = $baseSize + 1;
	$swapEnd = $param["dev$vDev"."_size"] - 1;

	$command = FDISK_addJob($dev, $swapStart, $swapEnd, "primary", $command,2);
	$command = FDISK_formatJob($swapPart, "linux-swap", $command);

	//create parameters for the swap partition
	$nParam["dev$vDev"."part1_nr"] = 2;
	$nParam["dev$vDev"."part1_start"] = $swapStart;
	$nParam["dev$vDev"."part1_end"] = $swapEnd;
	$nParam["dev$vDev"."part1_type"] = "primary";
	$nParam["dev$vDev"."part1_fs"] = "linux-swap";


	//Copy the drive keys and values of all drives with the virtual drive number > 0
	//Run thru all drive keys
	foreach($param as $key => $val)
	{
		//Check, if there are values for a drive with the virtual drive number > 0 and copy them, if existing
		if (preg_match('/dev[1-9]/', $key) > 0)
			$nParam[$key] = $param[$key];
	}

	return($nParam);
};





/**
**name FDISK_printColorDefinitions()
**description prints the color definitions for the filesystems
**/
function FDISK_printColorDefinitions()
{
include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");



echo("<table cellspacing=\"4\">
	<tr>
		<td width=\"20\">&nbsp;&nbsp;</td>
		<td width=\"20\">&nbsp;&nbsp;</td>
		<td><nobr><span class=\"titlesmal\">$I18N_supported_filesystems</span></nobr><br></td>
	</tr>
");

	foreach(FDISK_getSupportedFS() as $fs)
	{
		echo("
			<tr>
				<td width=\"20\">&nbsp;&nbsp;</td>
				<td width=\"20\" bgcolor=\"".FDISK_colorFS($fs)."\">&nbsp;&nbsp;</td>
				<td>$fs</td>
			</tr>
		");
	}


echo("
	<tr>
		<td width=\"20\">&nbsp;&nbsp;</td>
		<td width=\"20\" bgcolor=\"#7FFFF2\">&nbsp;&nbsp;</td>
		<td>$I18N_no_filesystem</td>
	</tr>
	<tr>
		<td width=\"20\">&nbsp;&nbsp;</td>
		<td width=\"20\" bgcolor=\"#FFFFFF\">&nbsp;&nbsp;</td>
		<td>$I18N_empty</td>
	</tr>

	<tr>
		<td width=\"20\">&nbsp;&nbsp;</td>
		<td width=\"20\" bgcolor=\"#000000\">&nbsp;&nbsp;</td>
		<td><nobr>$I18N_extended_partition</nobr></td>
	</tr>
</table>");
};





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
		<td><span class=\"subhighlight\">$I18N_type</span></td>
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
};





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

	DB_query($sql); //FW ok

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
**name FDISK_dev2LDevLPart($param,$dev,&$vDev,&$vPart)
**description searches a special device (e.g. /dev/hda2) and writes the virtual device and partition numbers to the variables. These values can be used to access the file system via $param["dev$vDev"."part$vPart"."_fs"]
**parameter param: the associative array containing all values describing the drives of the client
**parameter dev: the device (e.g. /dev/hda2)
**parameter vDev: the virtual device number, that is used to build the variable name to access the associative array.
**parameter vPart: the virtual partition number, that is used to build the variable name to access the associative array. This number has not to be qual to the partition number of the real drive (e.g. /dev/hda5 can be $vPart == 3). If it is set to "empty", only vDev is calculated.
**returns true if the search worked otherwise false.
**/
function FDISK_dev2LDevLPart($param,$dev,&$vDev,&$vPart)
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
								};
						}
				};
		}

	return(false);
};





/**
**name FDISK_rereadPartTable($path)
**description Let the OS re-read the partition table.
**parameter path: The device that was changed/created (e.g. /dev/sda5).
**/
function FDISK_rereadPartTable($path)
{
	//Get the drive (e.g. /dev/sda) from full device (e.g. /dev/sda5)
	$pathNr = preg_split("/[0-9]/",$path);
	$drive = $pathNr[0];

	return("; sfdisk -R $drive; hdparm -z $drive; blockdev --rereadpt $drive;");

// 		dd if=$path of=/dev/null bs=1 count=1 2> /dev/null;
// 	if [ \$? -ne 0 ]
// 	then
// 		touch /tmp/partTableRebootNeeded
// 		echo \"Fehler beim Einlesen der Partitionstabelle: $path\"
// 		read lala
// 	fi

}





/**
**name FDISK_genPartedCommands($partJobs)
**description returnes the partition and formation commands that are generated from partJobs.
**parameter partJobs: string with information about all created partition jobs
**parameter mkfsextOptions: Extra parameter for mkfs.extX .
**/
function FDISK_genPartedCommands($partJobs, $mkfsextOptions, $sourceslist)
{
	$out = "";
	$critical=true;

	for ($jobNr = 0; $jobNr < $partJobs['job_amount']; $jobNr++)
		{
			switch ($partJobs["command$jobNr"])
				{
					case "add":
						{ //create a partition
							$cmd = "
							checkdisklabel ".$partJobs["path$jobNr"]."
							parted -s ".$partJobs["path$jobNr"]." mkpart ".$partJobs["type$jobNr"]." ".$partJobs["start$jobNr"]." ".$partJobs["end$jobNr"].FDISK_rereadPartTable($partJobs["path$jobNr"]);
							$out.= $cmd;
							$critical=false;
							break;
						};

					case "rm":
						{
							$path = $partJobs["path$jobNr"];

							//Check if a RAID should be deleted
							if (strpos($path, "/dev/md") !== false)
								$cmd = "mdadm --stop $path";
							else
								$cmd = "parted -s $path rm ".$partJobs["devNr$jobNr"].FDISK_rereadPartTable($path);
							$out.= $cmd;
							$critical=false;

							break;
						};

					case "format":
						{
							$part = $partJobs["path$jobNr"];

							/*
								E.g. $part = "/dev/hda1"
							*/
							$pathNr = preg_split("/[0-9]/",$part);
							//$pathNr[0] = "/dev/hda"
							$partPath = $pathNr[0];
							/*
								Get the part of partition path after the drive
								
								$part = "/dev/hda1"
								$partPath = "/dev/hda"
								$partNr   = "1"
							*/
							$partNr = substr($part, strlen($partPath));

							switch(SRCLST_getStorageFS($partJobs["fs$jobNr"], $sourceslist))
								{
									case ext2: $cmd = "modprobe ext2; sfdisk --part-type $partPath $partNr 83; mkfs.ext2 -F $mkfsextOptions $part"; break;
									case ext3: $cmd = "modprobe ext3; sfdisk --part-type $partPath $partNr 83; mkfs.ext3 -F $mkfsextOptions $part"; break;
									case ext4: $cmd = "modprobe ext4; sfdisk --part-type $partPath $partNr 83; mkfs.ext4 -F $mkfsextOptions $part"; break;
									case reiserfs: $cmd = "modprobe reiserfs; sfdisk --part-type $partPath $partNr 83; mkreiserfs -f $part"; break;
									case "linux-swap": $cmd = "sfdisk --part-type $partPath $partNr 82; mkswap $part"; break;
								}

							$out.= $cmd;
							break;
						}

					case "bflag":
						{
							$cmd = "parted -s ".$partJobs["path$jobNr"]." set ".$partJobs["devNr$jobNr"]." boot on";
							$out.= $cmd;
							break;
						};

					case "raid":
						{
							$cmd = RAID_create($partJobs["raidDev$jobNr"], $partJobs["devList$jobNr"], $partJobs["raidMode$jobNr"]);
							$out.= $cmd;
							break;
						};
				};

			$out .= "\n
			echo $? > /tmp/parted.err

			if [ `cat /tmp/parted.err` -ne 0 ]
			then
				".sendClientLogStatus("Partition or format error: $cmd",false,$critical)."
			else
				".sendClientLogStatus("Partition or format OK: $cmd",true)."
			fi

			";
		};

	return($out);
};





/**
**name FDISK_listPartJobs($partJobs)
**description print all part jobs in the table
**parameter partJobs: string with information about all created partition jobs
**/
function FDISK_listPartJobs($partJobs)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$out = "";
	
	echo ("<table class=\"subtable\" align=\"center\" border=0 cellspacing=5>
<tr>
	<td><span class=\"subhighlight\">$I18N_action</span></td>
	<td><span class=\"subhighlight\">$I18N_partition</span></td>
	<td><span class=\"subhighlight\">$I18N_description</span></td>
</tr>");

	for ($jobNr = 0; $jobNr < $partJobs['job_amount']; $jobNr++)
		{
			switch ($partJobs["command$jobNr"])
				{
					case "add": 
						{ //create a partition
							echo("	<tr>
 										<td>$I18N_add_new_partition</td>
 										<td>".$partJobs["path$jobNr"]."</td>
 										<td>$I18N_type: ".$partJobs["type$jobNr"]." $I18N_range: ".$partJobs["start$jobNr"]." - ".$partJobs["end$jobNr"]."
										</td>
									</tr>");
							
							break;
						};

					case "rm":
						{
							echo("	<tr>
 										<td>$I18N_delete</td>
 										<td>".$partJobs["path$jobNr"].
										$partJobs["devNr$jobNr"]."</td>
										<td></td>
									</tr>");
							break;
						};

					case "format":
						{
							echo("	<tr>
 										<td>$I18N_format</td>
 										<td>".$partJobs["path$jobNr"]."</td>
 										<td>$I18N_filesystem: ".$partJobs["fs$jobNr"]."</td>
 									</tr>");
							break;
						}

					case "bflag":
						{
							echo("	<tr>
 										<td>$I18N_set_bootflag</td>
 										<td>".$partJobs["path$jobNr"].$partJobs["devNr$jobNr"]."</td>
 										<td></td>
 									</tr>");
							break;
						};

					case "raid":
						{
							echo("	<tr>
 										<td>$I18N_createRAIDDrive</td>
 										<td>".$partJobs["raidDev$jobNr"]."</td>
 										<td>".$partJobs["devList$jobNr"]."</td>
 									</tr>");
							break;
						};
				};
		};
		
	echo("</table>");
};





/**
**name FDISK_getDiskType($path)
**description returnes the type of the drive (DISK_TYPE_IDE, DISK_TYPE_SCSI)
**parameter path: the path to the device (e.g. /dev/hde)
**/
function FDISK_getDiskType($path)
{
	if (!(strpos($path,"/dev/hd") === FALSE))
		return(DISK_TYPE_IDE);
	
	if (!(strpos($path,"/dev/sd") === FALSE))
		return(DISK_TYPE_SCSI);
		
	return(-1);
};





/**
**name FDISK_getDriveAndNr($path)
**description splits a path (e.g. /dev/hda1) in the device (/dev/hda) and the device number (1). The device is returned as element 0 and the number as element 1 in an array.
**parameter path: the path to partition (e.g. /dev/hde1)
**returns Array with two parts. $out[0]=drive (e.g. /dev/hda), $out[1]=the device number
**/
function FDISK_getDriveAndNr($path)
{
	$temp=preg_split("/[0-9]/",$path);
	$out[0]=$temp[0];
	$out[1]=str_replace($out[0],"",$path);
	return($out);
}





/**
**name FDISK_getNextFdiskFormatJobNr($fdiskParams)
**description returnes the next free job number for the parameters of a m23fdiskFormat job. (e.g. there are used the following parameters: command0 = rm, command1= add. Then the next command number to use will be command2 => return value is 2)
**parameter fdiskParams: the parameters of the m23fdiskFormat job
**/
function FDISK_getNextFdiskFormatJobNr($fdiskParams)
{
	if (is_array($fdiskParams))
		$keys= array_keys($fdiskParams);
	else
		return(0);

	$count = 0;

	//count all keys, that contain the key word "command"
	for ($i = 0; $i < count($keys); $i++)
		if (substr_count($keys[$i],"command") > 0)
			$count++;
	
	return($count);
}





/**
**name FDISK_AFPselectDrive($drives,$options)
**description selects a drive from the settings in "options" and from available drives.
**parameter drives: all drives available on the client
**parameter options: options array of the client
**/
function FDISK_AFPselectDrive($drives,$options)
{
	//if the option "as specified" is selected
	if ($options['fdiskUseSpecified'] == 'yes')
		//check if the specified drive exists
		if (in_array($options['fdiskSpecifiedPath'],$drives))
			$driveToUse=$options['fdiskSpecifiedPath'];

	if (empty($driveToUse))
		{	//drive was not specified or couldn't be found
			$specifiedType = FDISK_getDiskType($options['fdiskSpecifiedPath']);
			
			//get absolute upper and lower tolerance values
			$upperI = $options['fdiskDefinedSize'] + HELPER_calcMBSize($options['fdiskUpperToleranceIdentical'],$options['fdiskDefinedSize'],true);
			$lowerI = $options['fdiskDefinedSize'] - HELPER_calcMBSize($options['fdiskLowerToleranceIdentical'],$options['fdiskDefinedSize'],true);
			$upperO = $options['fdiskDefinedSize'] + HELPER_calcMBSize($options['fdiskUpperToleranceOther'],$options['fdiskDefinedSize'],true);
			$lowerO = $options['fdiskDefinedSize'] - HELPER_calcMBSize($options['fdiskLowerToleranceOther'],$options['fdiskDefinedSize'],true);
			

			for ($i=0; $i < count($drives); $i++)
				{
					//get upper and lower tolerance for
					if ($specifiedType == FDISK_getDiskType($drives[$i]))
						{	//the same disk type
							$upper = $upperI;
							$lower = $lowerI;
						}
					else
						{	//for other disk types
							$upper = $upperO;
							$lower = $lowerO;
						};

					//get the logical access numbers
					FDISK_dev2LDevLPart($partitions,$drives[$i],$vDev,$vPart);

					//calculate the difference
					if ($partitions["dev$vDev"."_size"] > $upper)
						$diff = $partitions["dev$vDev"."_size"] - $upper;
					elseif ($partitions["dev$vDev"."_size"] < $lower)
						$diff = $lower - $partitions["dev$vDev"."_size"];
					else $diff = 1000;

					//add the drive to the ranking
					$driveRanking[$i]="$diff#$drives[$i]";
				}

			//use natural sorting to make the smalest difference stand on top
			natsort($driveRanking);
			$diffDrive = explode("#",$driveRanking[0]);
			$driveToUse = $diffDrive[1];
		};

	return($driveToUse);
}





/**
**name FDISK_AFPlinearScale($driveToUse, $driveToUseSize, $options, $command, $formatarr)
**description scales all partitions sizes to match the full disk size.
**parameter driveToUse: device to use (e.g. /dev/hda)
**parameter driveToUseSize: Size of the real drive to use.
**parameter options: options array of the client
**parameter command: array that stores the modificated format parameters
**parameter formatarr: array that contains the original format parameters
**/
function FDISK_AFPlinearScale($driveToUse, $driveToUseSize, $options, $command, $formatarr)
{
	$jobaddnr = (isset($command['job_amount']) ? $command['job_amount'] : 0);

	//calculate scaling factor for the partitions
	$partitionscale = $driveToUseSize / $options['fdiskDefinedSize'];

	for ($jobnr = 0; $jobnr < $formatarr['job_amount']; $jobnr++)
	{
		switch ($formatarr["command$jobnr"])
			{
				case "add": 
					{ //create a partition
						$command["command$jobaddnr"]="add";

						//set new drive
						$command["path$jobaddnr"] = $driveToUse;
						$command["type$jobaddnr"] = $formatarr["type$jobnr"];
						
						//scale start and end point
						$command["start$jobaddnr"] = sprintf("%.0f", ($formatarr["start$jobnr"] * $partitionscale) + 2);
						$command["end$jobaddnr"] = sprintf("%.0f", $formatarr["end$jobnr"] * $partitionscale);

						$jobaddnr++;
						break;
					};

				case "format":
					{
						$command["command$jobaddnr"]="format";
						
						$drvnr=FDISK_getDriveAndNr($formatarr["path$jobnr"]);

						$command["path$jobaddnr"] = $driveToUse.$drvnr[1];
						$command["fs$jobaddnr"] = $formatarr["fs$jobnr"];

						$jobaddnr++;
						break;
					}

				case "bflag":
					{
						$command["command$jobaddnr"]="bflag";

						$command["path$jobaddnr"] = $driveToUse;
						$command["devNr$jobaddnr"] = $formatarr["devNr$jobnr"];

						$jobaddnr++;
						break;
					};
			};
	};

	$command['job_amount'] = $jobaddnr;
	return($command);
}





/**
**name FDISK_AFPgetPartSizes($formatArr,$options, &$instPartSize, &$swapPartSize, &$otherSize)
**description writes the sizes of the installation, swap and other partitions to the variables.
**parameter formatArr: array that contains the oformat parameters
**parameter options: options array of the client
**parameter instPartSize: stores the size of the installation partition
**parameter instSwapSize: stores the size of the swap partition
**parameter otherSize: stores the size of the other partition(s)
**/
function FDISK_AFPgetPartSizes($formatArr,$options, &$instPartSize, &$swapPartSize, &$otherSize)
{
	//position in the endSize array
	$endSizePos = 0;
	

	//get the sizes of the installation, swap and other partitions
	for ($jobNr = 0; $jobNr < $formatArr['job_amount']; $jobNr++)
	{
		if ($formatArr["command$jobNr"] == "add")
		{ //create a partition

			//calculate the size of a partition (extended partitions have a size of 0)
			if ($formatArr["type$jobNr"] != "extended")
				$size = $formatArr["end$jobNr"] - $formatArr["start$jobNr"];
			else
				$size = 0;
			
			//calculate the full device name
			if (($formatArr["type$jobNr"] == "primary") ||
				($formatArr["type$jobNr"] == "extended"))
				{
					$path = $formatArr["path$jobNr"].$formatArr["devNr$jobNr"];
					$primaryCounter++;
				}
			elseif ($formatArr["type$jobNr"] == "logical")
				{
					$path = $formatArr["path$jobNr"].$formatArr["devNr$jobNr"];
					$logicalCounter++;
				};

			//get the sizes of the devices
			if ($path == $options['instPart'])
				$instPartSize = $size;
			elseif ($path == $options['swapPart'])
				$swapPartSize = $size;
			else
				$otherSize += $size;

			//store the end position, the original size and the path of the partition
			$endSize[$endSizePos++]=$formatArr["end$jobNr"]."#$size#$path#".$formatArr["start$jobNr"];
		};
	};

	return($endSize);
};





/**
**name FDISK_adjustFdiskParams($client)
**description adjusts the installation and swap drive for a derived client, based on the defined client settings
**parameter path: the path to the device (e.g. /dev/hde)
**/
function FDISK_adjustFdiskParams($client)
{
	$driveToUse="";

	$options=CLIENT_getAllOptions($client);

	if (!isset($options['fdiskDefinedSize']) ||
		$options['fdiskDefinedSize']==0)
		return;

	//if it's not set it is not a derived client
	if (!isset($options['fdiskUpperToleranceIdentical']))
		return;

	$params=CLIENT_getParams($client);
	$partitions = FDISK_getPartitions($client);
	
	$drives = FDISK_getAllDrives($partitions);

	$driveToUse=FDISK_AFPselectDrive($drives,$options);
	
	FDISK_dev2LDevLPart($partitions,$driveToUse,$vDev,$vPart);
	$driveToUseSize = $partitions["dev$vDev"."_size"];

	$command=array();

	//delete all partitions
	for ($devNr = 1; $devNr <= 4; $devNr++)
		if (FDISK_devNrExists($partitions, $vDev, $devNr))
			FDISK_delPart($driveToUse.$devNr,$partitions,$command);
		

	//get the ID of the fdiskFormat package
	$fdiskFormatID=PKG_getPackageIDsByName($client,"m23fdiskFormat",true);
	$fdiskFormatID=$fdiskFormatID[0];

	//get package parameters => convert to the associative array
	$formatArr = explodeAssoc("###",PKG_getPackageParams($fdiskFormatID));

	//get the ID of the baseSys package
	$baseSysID=PKG_getPackageIDsByName($client,"m23baseSys",true);
	$baseSysID=$baseSysID[0];

	//adjust the pertitions by linear scaling
	if ($options['fdiskAdjustmentType'] == "percentage")
		{
			$command=FDISK_AFPlinearScale($driveToUse, $driveToUseSize, $options, $command, $formatArr);
		}




//try to make installation and swap partition as big as possible
	elseif ($options['fdiskAdjustmentType'] == "system")
		{
			//counter for primary and logical device numbers
			$primaryCounter=1;
			$logicalCounter=5;

			$otherSize = 0;

			$endSize=FDISK_AFPgetPartSizes($formatArr,$options, $instPartSize, $swapPartSize, $otherSize);

			//calculate how to scale the partition types (installation, swap and other partitions)
			if ($driveToUseSize >= $instPartSize + $swapPartSize + $otherSize)
				{
					//client drive is bigger than defined => make installation partition bigger
					$instPartScale = ($driveToUseSize - $swapPartSize - $otherSize) / $instPartSize;
					$swapPartScale = 1;
					$otherPartScale = 1;
				}
			else
				{
					//free space, if the installation partition is created in full size
					$freeSpaceAfterInst = $driveToUseSize - $instPartSize;
					
					if ($freeSpaceAfterInst > 0)
						{
							//there is enough space for a full size installation partition
							$freeSpaceAfterSwap = $freeSpaceAfterInst - $swapPartSize;

							$instPartScale = 1;
							if ($otherSize + $swapPartSize > 0)
								{
									$swapPartScale =
									$otherPartScale = $freeSpaceAfterInst / ($otherSize + $swapPartSize);
								}
							else
								$swapPartScale = $otherPartScale = 0;
						}
					else
						{	//installation + swap partitions have to be shrinked
							if (($instPartSize + $swapPartSize) > 0)
								$instPartScale = $swapPartScale = $driveToUseSize / ($instPartSize + $swapPartSize);
							else
								$instPartScale = $swapPartScale = 0;

							$otherPartScale = 0;
						};
				};


				//calculates the new size of the partitions (sizes multiplicated by the scaling factor)
				for ($i=0; $i < count($endSize); $i++)
				{
					$endSizePath=explode("#",$endSize[$i]);

					$path = $endSizePath[2];

					//get the correct scaling value for the partition type
					if ($path == $options['instPart'])
						$scale = $instPartScale;
					elseif ($path == $options['swapPart'])
						$scale = $swapPartScale;
					else
						$scale = $otherPartScale;

					//old end position#new size#path#old start position
					$endSize[$i]="$endSizePath[0]#".sprintf("%.0f",$endSizePath[1]*$scale)."#$endSizePath[2]#$endSizePath[3]";
				};


				/* now the scaling factors are calculated and stored in:
				- install partition: $instPartScale
				- swap partition: $swapPartScale
				- other partitions: $otherPartScale
				*/

				//counter for the device numbers of primary and logical partitions
				$primaryCounter=1;
				$logicalCounter=5;

				//position in the array
				$notCreatedPartNr=0;

				//get the next jobNr after the possibly made remove jobs
				$jobAddNr = FDISK_getNextFdiskFormatJobNr($command);

				//the lowest start position of all logical partitions will be the start position of the extended position
				$lowestLogicalStart=-1;
				//the highest end position of all logical partitions will be the end position of the extended partition
				$highestLogicalEnd=-1;

				//adjust the parameters for the m23fdiskFormat job
				for ($jobNr = 0; $jobNr < $formatArr['job_amount']; $jobNr++)
				{
					switch ($formatArr["command$jobNr"])
						{
							case "add": 
								{ //create a partition

									//get the full path name to the partition
									if (($formatArr["type$jobNr"] == "primary") ||
										($formatArr["type$jobNr"] == "extended"))
										{
											$path = $formatArr["path$jobNr"].$primaryCounter;
											$primaryCounter++;
										}
									elseif ($formatArr["type$jobNr"] == "logical")
										{
											$path = $formatArr["path$jobNr"].$logicalCounter;
											$logicalCounter++;
										};
	
									//get the position of the current partition in the $endSize array
									for ($endSizePos = 0; substr_count($endSize[$endSizePos], $path) == 0; $endSizePos++);
									

									$endSizePath=explode("#",$endSize[$endSizePos]);

									//get the new size and the old start position of the current partition
									$size = $endSizePath[1];
									$ostart = $endSizePath[3];

									$start = 0; //new start position of the current partition
									for ($i = 0; $i < count($endSize); $i++)
										{
											//split the running partition values
											$endSizePath=explode("#",$endSize[$i]);
											
											//summarise the sizes of all partitions, that are before the current partition
											if ($ostart >= $endSizePath[0])
												$start += $endSizePath[1];
										};

									if (($size == 0) && ($formatArr["type$jobNr"] != "extended"))
										{
											//partition will not be created => should not be formated, bflagged
											$notCreatedPart[$notCreatedPartNr++] = $path;
											break;
										};
	
									$end = $start + $size;
									
									//set command
									$command["command$jobAddNr"]="add";
	
									//set new drive
									$command["path$jobAddNr"] = $driveToUse;
									$command["type$jobAddNr"] = $formatArr["type$jobNr"];
									
									//scale start and end point
									$command["start$jobAddNr"] = $start;
									$command["end$jobAddNr"] = $end;
									$jobAddNr++;
									
									//adjust start and end position of the extended partition
									if ($formatArr["type$jobNr"] == "logical")
										{
											if (($lowestLogicalStart==-1) ||
												($start < $lowestLogicalStart))
												$lowestLogicalStart = $start;

											if (($highestLogicalEnd==-1) ||
												($end > $highestLogicalEnd))
												$highestLogicalEnd = $end;
										};

									$command['job_amount']++;
									break;
								};
		
							case "format":
								{
									//partition could not be created => should not be formated
									if (is_array($notCreatedPart) &&
										in_array($formatArr["path$jobNr"],$notCreatedPart))
										break;

									$command["command$jobAddNr"]="format";

									$devNr=FDISK_getDriveAndNr($formatArr["path$jobNr"]);
									$command["path$jobAddNr"] = $driveToUse.$devNr[1];
									$command["fs$jobAddNr"] = $formatArr["fs$jobNr"];
	
									$jobAddNr++;
									$command['job_amount']++;
									break;
								}
		
							case "bflag":
								{
									//partition could not be created => should not be bflagged
									if (is_array($notCreatedPart) &&
										in_array($formatArr["path$jobNr"].$formatArr["devNr$jobNr"],
										$notCreatedPart))
										break;

									$command["command$jobAddNr"]="bflag";
	
									$command["path$jobAddNr"] = $driveToUse;
									$command["devNr$jobAddNr"] = $formatArr["devNr$jobNr"];
	
									$jobAddNr++;
									$command['job_amount']++;
									break;
								};
						};
				};			
		};



		//adjust an extended partition
		for ($jobNr = 0; $jobNr < $command['job_amount']; $jobNr++)
			{
				if (($command["command$jobNr"] ==  "add") &&
					($command["type$jobNr"] ==  "extended"))
					{
						if ($lowestLogicalStart == $highestLogicalEnd)
							//if start and end value are equal, there isn't needed an extended partition
							//=> set command to ignore
							$command["command$jobNr"]="ignore";
						else
							{
								$command["start$jobNr"] = $lowestLogicalStart;
								$command["end$jobNr"] = $highestLogicalEnd;
							}

						break;
					};
			};
	
	//set new (old) installation and swap partitions in options array
	$drvNr=FDISK_getDriveAndNr($options['instPart']);
	$options['instPart'] = $driveToUse.$drvNr[1];
	$newParam="instPart=$options[instPart]#";

	$drvNr=FDISK_getDriveAndNr($options['swapPart']);
	$options['swapPart'] = $driveToUse.$drvNr[1];

	$drvNr=FDISK_getDriveAndNr($options['mbrPart']);
	$options['mbrPart'] = $driveToUse.$drvNr[1];

	//Deactivate the recalculation of the harddisk/partition size and names.
	$options['fdiskDefinedSize']=0;
	$newParam.="swapPart=$options[swapPart]";

	CLIENT_setAllOptions($client,$options);

	$sql="UPDATE `clientjobs` SET `params` = '".implodeAssoc("###",$command)."' WHERE `id` = '$fdiskFormatID'";
	DB_query($sql); //FW ok

	$sql="UPDATE `clientjobs` SET `params` = '$newParam' WHERE `id` = '$baseSysID'";

	DB_query($sql); //FW ok
};





/**
**name FDISK_virtualAddDrive(&$param,$path,$size)
**description Adds a new drive to the param array.
**parameter param: parameter string containing status informations about the harddisks
**parameter path: Device name of the new drive (e.g. /dev/md0)
**parameter size: Size in MB of the new drive.
**/
function FDISK_virtualAddDrive(&$param,$path,$size)
{
	$devNr = $param["dev_amount"];
	$param["dev_amount"]++;
	$param["dev$devNr"."_path"]=$path;
	$param["dev$devNr"."_size"] = $size;
	$param["dev$devNr"."_partamount"] = 0;
}





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
**name FDISK_listRaidTable($raidDev,$param)
**description Get informations about the assigned real drives/partitions of a RAID.
**parameter raidDev: Device name of the new drive (e.g. /dev/md0)
**parameter param: parameter string containing status information about the harddisks
**returns HTML table with informations about the assigned real drives/partitions.
**/
function FDISK_listRaidTable($raidDev,$param)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	FDISK_dev2LDevLPart($param,$raidDev,$rDev,$rPart);
	$raidDriveAmount = isset($param["dev$rDev"."_raidDriveAmount"]) ? $param["dev$rDev"."_raidDriveAmount"] : 0;

$out="<table class=\"subtable\" border=0 cellspacing=\"5\" align=\"center\">
<tr>
	<td><span class=\"subhighlight\">$I18N_realDrivePartition</span></td>
	<td><span class=\"subhighlight\">$I18N_size</span></td>
</tr>";	

	//store the sizes of the included drives and partitions of the RAID
	if ($raidDriveAmount > 0)
	{
		for ($rDrive = 0; $rDrive < $raidDriveAmount; $rDrive++)
		{
			$drivePartition = $param["dev$rDev"."_raidDrive$rDrive"];
			FDISK_dev2LDevLPart($param,$drivePartition,$vDev,$vPart);
			$out.="
			<tr>
				<td>$drivePartition</td>
				<td>".FDISK_getDrivePartitionSize($vDev,$vPart,$param)."</td>
			</tr>";
		}
	}
$out.="</table>";

return($out);
};





/**
**name FDISK_addDrivePartitionToRaid($raidDev,$raidType,$partitionDrive,&$param,$raidMode)
**description Adds a drive or partition to a RAID.
**parameter raidDev: Device name of the new drive (e.g. /dev/md0)
**parameter raidType: RAID level (this can be 0,1,4,5,6,10)
**parameter partitionDrive: Partition or drive to add (e.g. /dev/hdc)
**parameter param: parameter string containing status information about the harddisks
**parameter raidMode: Raid mode (e.g. 1 for RAID-1, 5 for RAID-5)
**returns true if the RAID has the minimum amount of assigned drives/partitions and otherwise false.
**/
function FDISK_addDrivePartitionToRaid($raidDev,$raidType,$partitionDrive,&$param,$raidMode)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//array and counter for storing partition or drive informations
	$sizes = array();
	$sizeCounter = 0;

	$drivesUsageCounter = 0;
	$drivesUsage = array();
	$partitionsUsageCounter = 0;
	$partitionsUsage = array();
	
	$assignErrorMsg = false;

	FDISK_dev2LDevLPart($param,$raidDev,$rDev,$rPart);
	$raidDriveAmount = isset($param["dev$rDev"."_raidDriveAmount"]) ? $param["dev$rDev"."_raidDriveAmount"] : 0;

	//store the sizes of the included drives and partitions of the RAID
	if ($raidDriveAmount > 0)
	{
		for ($rDrive = 0; $rDrive < $raidDriveAmount; $rDrive++)
		{
			if ($param["dev$rDev"."_raidDrive$rDrive"] === $partitionDrive)
			{
				//Drive/partition is already assigned to the RAID => don't assign it again
				$partitionDrive = false;
				MSG_showError($I18N_drivePartitionWasAlreadyAssigned);
			}

			FDISK_dev2LDevLPart($param,$param["dev$rDev"."_raidDrive$rDrive"],$vDev,$vPart);

			if ($vPart === false)
				//store drives that were used as a whole
				$drivesUsage[$drivesUsageCounter++] = $vDev;
			else
				//store drives that have assigned partitions
				$partitionsUsage[$partitionsUsageCounter++] = $vDev;

			$sizes[$sizeCounter++] = FDISK_getDrivePartitionSize($vDev,$vPart,$param);
		}
	}

	//add the new drive/partition to the RAID
	if (!($partitionDrive === false))
	{
		FDISK_dev2LDevLPart($param,$partitionDrive,$vDev,$vPart);

		//check if the partition to assign uses a drive that was (as a whole) assigned before
		if (in_array($vDev,$drivesUsage) && !($vPart === false))
			$assignErrorMsg = $I18N_cantAssignPartitionBecauseItsDriveWasAssignedBefore;
		//check if the drive to has partitions that were assigned before
		elseif (in_array($vDev,$partitionsUsage) && ($vPart === false))
			$assignErrorMsg = $I18N_cantAssignDriveBecauseAPartitionOnThisDriveWasAssignedBefore;
		else
			{
				//drive/partition isn't assigned already => assign it now
				$param["dev$rDev"."_raidDrive$raidDriveAmount"] = $partitionDrive;
				$raidDriveAmount++;
		
				//get the size of the drive/partition and add it to the size array.
				$sizes[$sizeCounter++] = FDISK_getDrivePartitionSize($vDev,$vPart,$param);

				//lock drive/partition against formating
				if ($vPart === false)
					$param["dev$vDev"."_raidLvmLock"] = 1;
				else
					$param["dev$vDev"."part$vPart"."_raidLvmLock"] = 1;
			};
	};

	//calclulate the size of the RAID device according to the assigned drives/partitions
	switch ($raidType)
	{
		case 0: $raidSize = ($sizeCounter * min($sizes)); $minRaidDrives = 2; break;
		case 1: $raidSize = min($sizes); $minRaidDrives = 2; break;
		case 4: $raidSize = min($sizes) * ($sizeCounter - 1); $minRaidDrives = 2; break;
		case 5: $raidSize = min($sizes) * ($sizeCounter - 1); $minRaidDrives = 2; break;
		case 6: $raidSize = min($sizes) * ($sizeCounter - 2); $minRaidDrives = 4; break;
		case 10: $raidSize = min($sizes) * ($sizeCounter / 2); $minRaidDrives = 4; break;
		default: return(false);
	};

	$param["dev$rDev"."_raidDriveAmount"] = $raidDriveAmount;
	$param["dev$rDev"."_size"] = $raidSize;
	$param["dev$rDev"."_raidMode"] = $raidMode;
	//create a fake partition
	$param["dev$rDev"."_partamount"] = 1;
	$param["dev$rDev"."part0_start"] = 0;
	$param["dev$rDev"."part0_end"] = $raidSize;
	$param["dev$rDev"."part0_type"] = "RAID-$raidMode";

	if (!($assignErrorMsg === false))
		{
			MSG_showError($assignErrorMsg);
			return(false);
		}
		elseif ($raidDriveAmount < $minRaidDrives)
		{
			MSG_showError($I18N_notEnoughDrivesPartitionsForRaidType.$minRaidDrives);
			return(false);
		}
	else
		return(true);
};





/**
**name FDISK_buildRaidDialog(&$param,&$partJobs,$vDevInstall,&$currentDrive,&$freeSpaces,&$helpPage,$partMethod)
**description Shows a dialog for creating RAIDs of different types and assign real drives or partitions.
**parameter param: parameter string containing status information about the harddisks
**parameter partJobs: associative array with partition jobs
**parameter currentDrive: the current drive to work on (e.g. hda)
**parameter helpPage: Name of the help page to show.
**parameter partitionDrive: Partition or drive to add (e.g. /dev/hdc)
**parameter partMethod: partition method (used for the partition/format dialog). The next step will depend on this value.
**returns true if the RAID has the minimum amount of assigned drives/partitions and otherwise false.
**/
function FDISK_buildRaidDialog(&$param,&$partJobs,&$currentDrive,&$helpPage,$partMethod)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//create array with multi devices md0 - md15
	for ($nr=0; $nr <= 15; $nr++)
		$mdArr["/dev/md$nr"] = "/dev/md$nr";
	$newMd = HTML_selection("SEL_newMd",$mdArr,SELTYPE_selection);

	//raid level selector
	foreach (array(0,1,4,5,6,10) as $l)
		$raidLevelArr[$l] = "RAID-$l";
	$newRaidLevel = HTML_selection("SEL_newRaidLevel",$raidLevelArr,SELTYPE_selection);

	//get the current drive/partition that should get added and the MD to add ist to
	$tmp = explode(" ",$_POST['SEL_addDrivePart']);
	$drivePartToAdd = $tmp[0];
	$tmp  = explode(" ",$_POST['SEL_addUsedMd']);
	$usedMd = $tmp[0];

	if (HTML_submit("BUT_mdAdd",$I18N_createRAIDDrive))
	{
		FDISK_virtualAddDrive($param,$newMd,0);
		$currentDrive = $newMd;
		CAPTURE_captureAll(7,"create RAID");
	};

	if (HTML_submit("BUT_drivePartitionAdd",$I18N_add))
		FDISK_addDrivePartitionToRaid($usedMd,$newRaidLevel,$drivePartToAdd,$param,$newRaidLevel);

	//figure out the correct naming and labelling for the next-step button
	switch ($partMethod)
	{
		case PM_extended_raid_lvm:
			$butName = "BUT_extPartStep5LVM";
			$butVal = $I18N_extPartStep5Lvm;
			break;
		case PM_extended_raid:
			$butName = "BUT_extPartStep2FormartPart";
			$butVal = $I18N_extPartStep2FormartPart;
			break;
	};

	//only create button. It can't get checked her because client_partition will catch it before
	HTML_submit($butName,$butVal);

	echo("<br>
	<span class=\"title\">$I18N_newRAIDDrive</span><br><br>
	<table class=\"subtable\" align=\"center\">
		<tr>
			<td>$I18N_raidDriveName</td>
			<td>".SEL_newMd."</td>
		</tr>
		<tr>
			<td align=\"right\" colspan=\"2\">".BUT_mdAdd."</td>
		</tr>
	</table><br><br>

	<span class=\"title\">$I18N_addDrivesPartitionsToRaid</span><br><br>
	<table class=\"subtable\" align=\"center\">
		<tr>
			<td>$I18N_raidLevel</td>
			<td>".SEL_newRaidLevel."</td>
		</tr>
		<tr>
			<td>$I18N_raidDriveName</td>
			<td>".FDISK_listDrivesAndPartitions($param,"","SEL_addUsedMd","/dev/md")."</td>
		</tr>
		<tr>
			<td colspan=\"2\" height=\"5\"></td>
		</tr>
		<tr>
			<td valign=\"top\">$I18N_assignedDrivesPartitions</td>
			<td>".FDISK_listRaidTable($usedMd,$param)."</td>
		</tr>
		<tr>
			<td>$I18N_realDrivePartition</td>
			<td>".FDISK_listDrivesAndPartitions($param,"","SEL_addDrivePart","!/dev/md")."</td>
		</tr>
		<tr>
			<td align=\"right\" colspan=\"2\">".BUT_drivePartitionAdd."</td>
		</tr>
	</table>
	".constant($butName)."
	");
};





/**
**name FDISK_addRaidJobs(&$partJobs,$param)
**description Generates jobs to create all RAIDs
**parameter partJobs: associative array with partition jobs
**parameter param: parameter string containing status information about the harddisks
**/
function FDISK_addRaidJobs(&$partJobs,$param)
{
	for ($vDev = 0; $vDev < $param["dev_amount"]; $vDev++)
		if (!(strpos($param["dev$vDev"."_path"],"/dev/md") === false))
		{
			$devList ="";
			for ($vPart = 0; $vPart < $param["dev$vDev"."_raidDriveAmount"]; $vPart++)
				$devList .= " ".$param["dev$vDev"."_raidDrive".$vPart];

			FDISK_addRaidBeforeFormat($param["dev$vDev"."_path"], $devList, $partJobs, $param["dev$vDev"."_raidMode"]);
		};
};





/**
**name FDISK_addRaidBeforeFormat($raidDev, $devList, &$partJobs, $raidMode)
**description Generates and places a job to create a RAID on given drives/partitions before the formating of the RAID device.
**parameter raidDev: RAID device (e.g. /dev/md0)
**parameter devList: Space separated list of devices to create the RAID on top (e.g. /dev/sda1 /dev/hda /dev/sbd5).
**parameter partJobs: associative array with partition jobs.
**parameter raidMode: The type of the RAID (0,1,5, ...)
**/
function FDISK_addRaidBeforeFormat($raidDev, $devList, &$partJobs, $raidMode)
{
	//Make sure there is a valid amount of jobs set
	if (!isset($partJobs['job_amount'])) $partJobs['job_amount'] = 0;

	//Convert the m23 array to a normal array
	$partJobs = HELPER_m23Array2Array($partJobs);

	//Create infos for the new job
	$newJob["command"] = "raid";
	$newJob["raidDev"] = $raidDev;
	$newJob["devList"] = $devList;
	$newJob["raidMode"] = $raidMode;

	//Run thru the partition and format jobs
	foreach ($partJobs as $jobNr => $job)
	{
		//Check if this is a command and if it is a format command
		if ((!isset($job['command']{0})) || ('format' != $job['command']))
			continue;

		//Check if the format command will format the given RAID
		if ($job['path'] == $raidDev)
		{
			//Place the RAID creation job before the format job
			$partJobs = HELPER_arrayInsertBeforeKeynumber($partJobs, $jobNr, $newJob);
			break;
		}
	}

	//convert it back to an m23 array
	$partJobs = HELPER_array2m23Array($partJobs);

	$partJobs['job_amount']++;
}





/**
**name FDISK_raidJob($path, $devList, &$partJobs)
**description Generates a job to create a RAID on given drives/partitions.
**parameter raidDev: RAID device (e.g. /dev/md0)
**parameter devList: Space separated list of devices to create the RAID on top (e.g. /dev/sda1 /dev/hda /dev/sbd5).
**parameter partJobs: associative array with partition jobs
**/
// function FDISK_raidJob($raidDev, $devList, &$partJobs, $raidMode)
// {
// 	if (!isset($partJobs['job_amount'])) $partJobs['job_amount'] = 0;
// 
// 	//Create infos for the new job
// 	$newJob["command"] = "raid";
// 	$newJob["raidDev"] = $raidDev;
// 	$newJob["devList"] = $devList;
// 	$newJob["raidMode"] = $raidMode;
// 
// 	//Convert the m23 array to a normal array
// 	$normArray = HELPER_m23Array2Array($partJobs);
// 
// 	array_unshift($normArray, $newJob);
// 	
// 	//convert it back to an m23 array
// 	$partJobs = HELPER_array2m23Array($normArray);
// 
// 	$partJobs['job_amount']++;
// 
// 	return($partJobs);
// };





/**
**name FDISK_virtualDeleteDrive($vDev, $param)
**description Deletes a (RAID) drive from param assigned thru $vDev.
**parameter vDev: Virtual (internally used) device number.
**parameter param: parameter string containing status informations about the harddisks
**/
function FDISK_virtualDeleteDrive($vDev, $param)
{
	//Delete the raidLvmLock on all partitions that belonged to the RAID
	if (isset($param["dev$vDev"."_raidDriveAmount"]))
	{
		//Run thru all physical partitions the RAID is build off
		for ($rNr = 0; $rNr < $param["dev$vDev"."_raidDriveAmount"]; $rNr++)
		{
			//Get the full path of the physical partition (e.g. /dev/hda1)
			$physicalRaidDev = $param["dev$vDev"."_raidDrive".$rNr];

			//Get its virtual device and partition number
			FDISK_dev2LDevLPart($param, $physicalRaidDev, $vRaidDev, $vRaidPart);

			//Remove the RAID/LVM lock from the partition
			unset($param["dev$vRaidDev"."part$vRaidPart"."_raidLvmLock"]);
		}
	}

	//Delete the keys for the device
	$param = FDISK_deleteDriveFromParam($vDev, $param);

	$devAmount = $param["dev_amount"];

	for (;$vDev < $devAmount - 1; $vDev++)
	{
		//Clear all keys for the current drive
		$param = FDISK_deleteDriveFromParam($vDev, $param);

		//Run thru all partition keys for the current drive
		foreach($param as $key => $val)
		{
			/*
				Check if the key belongs to the NEXT partition (e.g. dev1)
				Hint: preg_match is used to make searching for $vDev = 1 possible and only give out dev1* and not dev10*, dev11*, ...
			*/
			if (preg_match('/dev'.($vDev+1).'[^0-9]/', $key) > 0)
			{
				//Generate the according key for the CURRENT partition (e.g. dev1part0_start)
				$keyBelow = str_replace("dev".($vDev+1),  "dev$vDev" ,  $key);

				//Copy the value of the NEXT partition to the CURRENT partition
 				$param[$keyBelow] = $param[$key];
			}
		}
	}


	$devAmount--;

	//Delete the last and not copied drive
	$param = FDISK_deleteDriveFromParam($devAmount, $param);

	//Correct the amount of drives
	$param["dev_amount"]--;

	return($param);
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









	/*$vPart = FDISK_getvPart($param, $vDev, $devNr);

	//Delete the choosen partition values
	$param = FDISK_deletePartitionFromParam($vDev, $vPart, $param);

	//Store the amount of partitions on the current drive
	$partAmount = $param["dev$vDev"."_partamount"];

	/*
		move all following partitions
		$param["dev$vDev"."part$vPart"."_nr"] = $param["dev$vDev"."part".($vPart+1)."_nr"];
	*/
// 	for (;$vPart < $partAmount - 1; $vPart++)
// 	{
// 		//Clear all keys for the current partition
// 		$param = FDISK_deletePartitionFromParam($vDev, $vPart, $param);
// 
// 		//Run thru all partition keys for the current drive
// 		foreach($param as $key => $val)
// 		{
// 			//Check if the key belongs to the NEXT partition (e.g. dev1part1_start)
// 			if (strpos($key, "dev$vDev"."part".($vPart+1)."_") !== false)
// 			{
// 				//Generate the according key for the CURRENT partition (e.g. dev1part0_start)
// 				$keyBelow = str_replace("part".($vPart+1)."_",  "part$vPart"."_" ,  $key);
// 
// 				//Copy the value of the NEXT partition to the CURRENT partition
//  				$param[$keyBelow] = $param[$key];
// 			}
// 		}
// 	}

	//delete last partition, that was transferred to the pre last
// 	$partAmount--;
// 	$param = FDISK_deletePartitionFromParam($vDev, $partAmount, $param);
// 
// 	$param["dev$vDev"."_partamount"] = $partAmount;

// 	return($param);


// FDISK_virtualAddPartition
?>
