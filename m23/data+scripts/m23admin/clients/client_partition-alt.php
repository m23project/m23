<?php



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
		FDISK_addDrivePartitionToRaid($usedMd,$newRaidLevel,$_POST['SEL_addMDDrivePart'],&$param,$newRaidLevel);
		FDISK_fdiskSessionParam($param);
	}

	//This may have changed by BUT_drivePartitionAdd
	$MDDrivePartToAdd = FDISK_listDrivesAndPartitions2($param,"","SEL_addMDDrivePart","!/dev/md", true);



	//Choosing and execution of partition schemes
	$partitionSchemes[PM_auto] = $I18N_fdistTypeautomatic;
	$partitionScheme = HTML_selection("SEL_partitionSchemes", $partitionSchemes, SELTYPE_selection);

	//Apply a partition and formating scheme
	if (HTML_submit('BUT_executeScheme', $I18N_executeScheme))
	{
		switch ($partitionScheme)
		{
			case PM_auto:
				$param = FDISK_autoPart(FDISK_fdiskSessionClient(),&$partJobs,FDISK_fdiskSessionInstallDrive(), $param, &$instPart, &$swapPart);
				FDISK_fdiskSessionParam($param);
				FDISK_fdiskSessionPartJobs($partJobs);
				FDISK_fdiskSessionInstPart($instPart);
				FDISK_fdiskSessionSwapPart($swapPart);
				break;
		}
	}



	//Add a new partition
	if (HTML_submit('BUT_newPart_add',$I18N_add))
		{
			/*
				Use the current choosen instdrive: Read it directly, because the dialog element was not created here and it cannot be created before, because the elements may change in the following parts.
			*/

			//Get $vDevInstall
			FDISK_dev2LDevLPart($param,$_POST['SEL_instDrive'],&$vDevInstall,&$vPartTrash);
			
			//Set $vDevInstall for usage with FDISK_fdiskSessionFreeSpaces
			FDISK_fdiskSessionvDevInstall($vDevInstall);

			//Get free spaces for the current drive (SEL_instDrive)
			$freeSpaces = FDISK_fdiskSessionFreeSpaces(false,true);
			
			$param = FDISK_addPart($param, &$partJobs, $vDevInstall, $newPartStart, $newPartEnd, $_POST['SEL_newPart_type'],$freeSpaces);
			FDISK_fdiskSessionParam($param);
			FDISK_fdiskSessionPartJobs($partJobs);

			//Re-calculate the free spaces
			FDISK_fdiskSessionFreeSpaces(false, true);
		}



	//Check, if the currently selected partition should be deleted
	if (HTML_submit("BUT_deletePart",$I18N_delete))
	{
		//Hint: $_POST['SEL_deletePartPart'] defined by FDISK_listPartitions
		$param = FDISK_delPart($currentPartition, $param, &$partJobs);

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



	//Get the installation drive (e.g. for creating new partitions in free space)
	$instDrive = FDISK_fdiskSessionInstallDrive(HTML_selection("SEL_instDrive", HELPER_array2AssociativeArray(FDISK_getAllDrives(FDISK_fdiskSessionParam())), SELTYPE_selection));



	//Format the choosen partition
	if (HTML_submit('BUT_formatPart',$I18N_format))
	{
		//Hint: $_POST['SEL_formatPartPart'] defined by FDISK_listPartitions and $_POST['SEL_format'] defined by FDISK_listSupportedFS
		$param = FDISK_formatPart($param, $currentPartition, $_POST['SEL_format'], &$partJobs);
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
			<span class=\"title\">$I18N_currentDriveAndPartition</span>
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

			".HTML_JSMenuOpener('fdiskMenu', 'partitionScheme', $I18N_partitionScheme,
				'<div align="center">'.
					SEL_partitionSchemes."<br>".BUT_executeScheme.
				'</div>')."

			<p><hr></p>

			".HTML_JSMenuOpener('fdiskMenu', 'deleteCurrentPartition', $I18N_deleteCurrentPartition,
				'<div align="center">'.
					BUT_deletePart.
				'</div>')."

			<p><hr></p>

			".HTML_JSMenuOpener('fdiskMenu', 'add_new_partition', $I18N_add_new_partition, "<table width=\"100%\">
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

			<p><hr></p>

			".HTML_JSMenuOpener('fdiskMenu', 'formatPartition', $I18N_formatPartition, "<table width=\"100%\">
					<tr>
						<td><span class=\"subhighlight\">$I18N_type</span></td>
						<td>".FDISK_listSupportedFS("SEL_format","ext3")."</td>
					</tr>
					<tr>
						<td colspan=\"2\" align=\"center\">".BUT_formatPart."</td>
					</tr>
				</table>")."

			<p><hr></p>

			".HTML_JSMenuOpener('fdiskMenu', 'newRAIDDrive', $I18N_raidDrives, "
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

			<p><hr></p>

			".HTML_JSMenuOpener('fdiskMenu', 'installationAndSwapPartition', $I18N_installationAndSwapPartition, "
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
			")
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
			<td width="24%" rowspan=3 valign="top" bgcolor="#E0E0E0">');
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
					<span class="title">'.$I18N_waitingPartitioningAndFormatingJobs.'</span><br><br>');
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












	echo("<span class=\"title\">$I18N_clientPartitioningAndFormating</span><br><br>");


	if ($_GET['clearSession'] == 1)
		FDISK_fdiskSessionReset(true);
	HTML_showFormHeader();
	HTML_showTableHeader(true, 'subtable', 'width="100%" cellspacing=10');

// 	$cp1=$_SESSION['clientPartition']['param'];

	FDISK_showCombinedFdiskGUIDialog();

	HTML_showTableEnd(true);
	HTML_setPage(FDISK_fdiskSessionPage());
	HTML_showFormEnd();
	
// 	print_r2($_SESSION);
	
// 	print("<table>
// 	<tr>
// 		<td>");
// 			print_r2($cp1);
// 	print("</td>
// 	</tr>
// 	<tr>
// 		<td>");
// 			print_r2($_SESSION['clientPartition']['param']);
// 	print("</td>
// 	</tr>
// 	</table>");


	help_showhelp('clientPartitionFormat');
?>