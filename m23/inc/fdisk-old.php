<?php






/**
**name FDISK_showFdiskGUIDialog()
**description Shows the whole partition and formating dialog.
**/
function FDISK_showFdiskGUIDialog()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Check if the button BUT_changeDrive (defined by FDISK_showFdiskGUIDriveInfoDialog) was clicked and change the installation drive accordingly
	if (HTML_submitCheck('BUT_changeDrive'))
		FDISK_fdiskSessionInstallDrive($_POST['SEL_instDrive']);
	

	if (HTML_submit("BUT_reset",$I18N_reset))
		FDISK_fdiskSessionReset();

	switch (FDISK_fdiskSessionPartMethod())
	{
		case PM_none:
			FDISK_showFdiskGUISelectPartitionMethod();
			break;

		case PM_auto:
			FDISK_showFdiskGUIAutoMethod();
			break;
			
		case PM_existing:
			FDISK_showFdiskGUIExistingMethod();
			break;

		case PM_extended:
			FDISK_showFdiskGUIExtendedMethod();
			break;
	}

	/*<input type=\"submit\" name=\"BUT_accept\" <?PHP if ($disableAccept) echo(\"disabled=\"true\"");?> value="<?PHP echo($BUT_acceptLabel);?>">*/
}





/**
**name FDISK_showFdiskGUIExtendedStepDeletePartitions()
**description Shows the sub-dialog for deleting partitions in the extended partitioning and formating dialog.
**/
function FDISK_showFdiskGUIExtendedStepDeletePartitions()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Cache some varibales
	$param = FDISK_fdiskSessionParam();
	$fstab = FDISK_fdiskSessionFstab();
	$partJobs = FDISK_fdiskSessionPartJobs();
	$vDevInstall = FDISK_fdiskSessionvDevInstall();

	//Check, if the currently selected partition should be delted
	if (HTML_submit("BUT_deletePart",$I18N_delete))
	{
		echo('<tr><td>'); //Add for eventually shown error messages by FDISK_delPart
			//Hint: $_POST['SEL_deletePartPart'] defined by FDISK_listPartitions
			$param = FDISK_delPart($_POST['SEL_deletePartPart'], $param, &$partJobs);
		echo('</td></tr>'); //Add for eventually shown error messages by FDISK_addPart

		FDISK_fdiskSessionParam($param);
		FDISK_fdiskSessionPartJobs($partJobs);

		//Re-calculate the free spaces
		FDISK_fdiskSessionFreeSpaces(false, true);
	}

	//Check, if the next step should be called
	if (HTML_submit("BUT_extPartStep1AddPart",$I18N_extPartStep1AddPart))
	{
		FDISK_fdiskSessionExtendedPartStep(EPS_add_new_partition);
		FDISK_showFdiskGUIExtendedMethod();
	}
	else
	{
		echo("
		<tr>
			<td>".FDISK_showFdiskGUITitle(false)."
				<table class=\"subtable\" align=\"center\" border=0 cellspacing=5>
					<tr>
						<td><span class=\"subhighlight\">$I18N_partition</span></td>
						<td></td>
					</tr>
					<tr>
						<td>
						".FDISK_listPartitions($param, $vDevInstall,"SEL_deletePartPart","")."
						</td>
						<td>".BUT_deletePart."</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td align=\"right\">
				<br>".BUT_extPartStep1AddPart."<br>
			</td>
		</tr>
		");
	}
}





/**
**name FDISK_showFdiskGUIExtendedStepAddNewPartition()
**description Shows a dialog for adding partitions.
**/
function FDISK_showFdiskGUIExtendedStepAddNewPartition()
{
	//Cache some varibales
	$param = FDISK_fdiskSessionParam();
	$partJobs = FDISK_fdiskSessionPartJobs();
	$vDevInstall = FDISK_fdiskSessionvDevInstall();
	$freeSpaces = FDISK_fdiskSessionFreeSpaces();
	$partMethod = FDISK_fdiskSessionPartMethod();

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");


	//Define edit lines for begin and end of the new partition
	$newPartStart = HTML_input('ED_newPart_start', false, 6);
	$newPartEnd = HTML_input('ED_newPart_end', false, 6);


	//Add a new partition
	if (HTML_submit('BUT_newPart_add',$I18N_add))
		{
			echo('<tr><td>'); //Add for eventually shown error messages by FDISK_addPart
				$param = FDISK_addPart($param, &$partJobs, $vDevInstall, $newPartStart, $newPartEnd, $_POST['SEL_newPart_type'],$freeSpaces);
				FDISK_fdiskSessionParam($param);
				FDISK_fdiskSessionPartJobs($partJobs);

				//Re-calculate the free spaces
				FDISK_fdiskSessionFreeSpaces(false, true);
			echo('</td></tr>'); //Add for eventually shown error messages by FDISK_addPart
		}


	//Figure out the correct labelling for the next-step button and the page to show after
	if (($partMethod == PM_extended_raid) || ($partMethod == PM_extended_raid_lvm))
		{
			$butVal = $I18N_extPartStep4Raid;
			$nextStep = EPS_raid;
		}
	elseif ($partMethod == PM_extended_lvm)
		{
			$butVal = $I18N_extPartStep5Lvm;
			$nextStep = EPS_lvm;
		}
	else
		{
			$butVal = $I18N_extPartStep2FormartPart;
			$nextStep = EPS_format_partitions;
		}


	//Define the next page button
	if (HTML_submit('BUT_nextStepAfterAddPartition',$butVal))
		{
			if (FDISK_fdiskSessionExtendedPartStep() == EPS_raid)
			{
				//we are comming from the RAID adding dialog => we have to calculate the RAID adding jobs
				FDISK_addRaidJobs($partJobs,$param);
				FDISK_fdiskSessionPartJobs($partJobs);
			}

			//Set the next page
			FDISK_fdiskSessionExtendedPartStep($nextStep);
			FDISK_showFdiskGUIExtendedMethod();
		}
	else
		{
			echo("
				<tr>
					<td>".FDISK_showFdiskGUITitle(false)."
						<table class=\"subtable\" align=\"center\" border=0 cellspacing=5>
							<tr>
						
								<td><span class=\"subhighlight\">$I18N_type</span></td>
								<td><span class=\"subhighlight\">$I18N_start</span></td>
								<td><span class=\"subhighlight\">$I18N_end</span></td>
								<td></td>
							</tr>
							<tr>
								<td>".
									FDISK_partCreationSelect($param, $vDevInstall,"SEL_newPart_type")."
								</td>
								<td>".ED_newPart_start."</td>
								<td>".ED_newPart_end."</td>
								<td>".BUT_newPart_add."</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align=\"right\">".BUT_nextStepAfterAddPartition."</td>
				</td>
			");
		}
}





/**
**name FDISK_showFdiskGUIExtendedStepFormatPartitions()
**description Shows a dialog for formating partitions.
**/
function FDISK_showFdiskGUIExtendedStepFormatPartitions()
{
	//Cache some varibales
	$param = FDISK_fdiskSessionParam();
	$partJobs = FDISK_fdiskSessionPartJobs();
	$vDevInstall = FDISK_fdiskSessionvDevInstall();

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");


	//Format the choosen partition
	if (HTML_submit('BUT_formatPart',$I18N_format))
	{
		//Hint: $_POST['SEL_formatPartPart'] defined by FDISK_listPartitions and $_POST['SEL_format'] defined by FDISK_listSupportedFS
		$param = FDISK_formatPart($param, $_POST['SEL_formatPartPart'], $_POST['SEL_format'], &$partJobs);
		FDISK_fdiskSessionParam($param);
		FDISK_fdiskSessionPartJobs($partJobs);
	}

	//Define the next page button
	if (HTML_submit('BUT_extPartStep3InstallDest',$I18N_extPartStep3InstallDest))
		{
			//Set the next sub-page
			FDISK_fdiskSessionPartMethod(PM_existing);
			FDISK_fdiskSessionExtendedPartStep(EPS_select_installation_partitions);
			FDISK_showFdiskGUIDialog();
		}
	else
		{
			echo("
				<tr>
					<td>".FDISK_showFdiskGUITitle(false)."
						<table class=\"subtable\" align=\"center\" border=0 cellspacing=5>
							<tr>
								<td><span class=\"subhighlight\">$I18N_partition</span></td>
								<td><span class=\"subhighlight\">$I18N_type</span></td>
								<td></td>
							</tr>
							<tr>
								<td>
								".FDISK_listPartitions($param, $vDevInstall,"SEL_formatPartPart","extended")."
								</td>
								<td>".FDISK_listSupportedFS("SEL_format","ext3")."</td>
								<td>".BUT_formatPart."</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align=\"right\">
						<br>".BUT_extPartStep3InstallDest."<br>
					</td>
				</tr>
			");
		}
}





/**
**name FDISK_showFdiskGUIExtendedMethod()
**description Shows the dialog for extended partitioning and formating.
**/
function FDISK_showFdiskGUIExtendedMethod()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	FDISK_fdiskSessionTitle($I18N_fdistTypeextended);

	switch(FDISK_fdiskSessionExtendedPartStep())
	{
		case EPS_delete_partitions: //delete partitions
			FDISK_showFdiskGUIExtendedStepDeletePartitions();
		break;

		case EPS_add_new_partition: //add new partitions
			FDISK_showFdiskGUIExtendedStepAddNewPartition();
		break;


		case EPS_raid:
			FDISK_buildRaidDialog($param,$partJobs,$currentDrive,$helpPage,$partMethod);
			$helpPage="RAID_add";
			$mbrPart = 1;
		break;

		case EPS_format_partitions: //format partitions
			FDISK_showFdiskGUIExtendedStepFormatPartitions();
		break;
	}
}





/**
**name FDISK_showFdiskGUITitle($show = true)
**description Returns and/or shows the current title of the partitioning and formating.
**parameter show: Shows the title if set to true and returns it if set to false.
**returns The current title of the partitioning and formating.
**/
function FDISK_showFdiskGUITitle($show = true)
{
	//Prepare the title
	$title = "<span class=\"title\">".FDISK_fdiskSessionTitle()."</span><br><br>";

	if ($show)
		echo($title);

	return($title);
}





/**
**name FDISK_showFdiskGUIAutoMethod()
**description Shows the dialog for automatic partitioning and formating.
**/
function FDISK_showFdiskGUIAutoMethod()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	FDISK_fdiskSessionHelpPage('fdisk-automatic');
	FDISK_fdiskSessionTitle($I18N_fdistTypeautomatic);

	$param = FDISK_fdiskSessionParam();
	$param = FDISK_autoPart(FDISK_fdiskSessionClient(),&$partJobs,FDISK_fdiskSessionInstallDrive(), $param, &$instPart, &$swapPart);
	FDISK_fdiskSessionParam($param);
	FDISK_fdiskSessionPartJobs($partJobs);
	FDISK_fdiskSessionInstPart($instPart);
	FDISK_fdiskSessionSwapPart($swapPart);

	if (HTML_submit("BUT_formatClient",$I18N_format_client) && FDISK_finalChecksAndRealPartitionAndFormatStart())
	{
		HTML_submitDefine('BUT_next',$I18N_next);
		echo("<tr><td>".BUT_next."</td></tr>");
	}
	else
	{
		echo("
		<tr><td>".FDISK_showFdiskGUITitle(false)."</td></tr>
		<tr><td>");	MSG_showInfo($I18N_automaticPartitioningPreviewHint); echo('</td> </tr>
		<tr><td align="right">'.BUT_formatClient."</td></tr>");
	}
}





/**
**name FDISK_showFdiskGUIExistingMethod()
**description Shows the dialog for formating of existing partitions.
**/
function FDISK_showFdiskGUIExistingMethod()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Use a trick to use this dialog for choosing the installation and swap partition after the extended partitioning and formating dialog
	if (FDISK_fdiskSessionExtendedPartStep() != EPS_select_installation_partitions)
	{
		FDISK_fdiskSessionHelpPage('fdisk-existing');
		FDISK_fdiskSessionTitle($I18N_fdistTypeexisting);
	}

	$param = FDISK_fdiskSessionParam();
	$fstab = FDISK_fdiskSessionFstab();
	$partJobs = FDISK_fdiskSessionPartJobs();

	//Use a trick to use this dialog for choosing the installation and swap partition after the extended partitioning and formating dialog
	if (FDISK_fdiskSessionExtendedPartStep() != EPS_select_installation_partitions)
	{
		//Hint: $_POST['SEL_instPart'] and $_POST['SEL_swapPart'] are defined by FDISK_installExistingDialog
		$param = FDISK_formatExisting($_POST['SEL_instPart'],$_POST['SEL_swapPart'],&$partJobs, $param);
		FDISK_fdiskSessionParam($param);
		FDISK_fdiskSessionPartJobs($partJobs);
	}

	FDISK_fdiskSessionInstPart($_POST['SEL_instPart']);
	FDISK_fdiskSessionSwapPart($_POST['SEL_swapPart']);

	if (HTML_submit("BUT_formatClient",$I18N_format_client) && FDISK_finalChecksAndRealPartitionAndFormatStart())
	{
		HTML_submitDefine('BUT_next',$I18N_next);
		echo("<tr><td>".BUT_next."</td></tr>");
	}
	else
	{
		echo('
		<tr><td>'.FDISK_showFdiskGUITitle(false)."</td></tr>
		<tr>
			<td>
				<span class=\"title\">$I18N_select_installation_partitions</span><br><br>
			"); FDISK_installExistingDialog($param,$fstab); echo('
			</td>
		</tr>
		<tr><td align="right">'.BUT_formatClient."</td></tr>");
		
		FDISK_fdiskSessionParam($param);
		FDISK_fdiskSessionFstab($fstab);
	}
}





/**
**name FDISK_fdiskSessionExtendedPartStep($newStep = false)
**description Stores the extended partitioning step and sets the help page and title in the session.
**parameter newStep: The new step to set or false for not changing.
**returns The current extended partitioning step.
**/
function FDISK_fdiskSessionExtendedPartStep($newStep = false)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Define an array with the help pages belonging to the extended partitioning steps
	$helpStep['EPS_delete_partitions'] = 'fdisk-extended0';
	$helpStep['EPS_add_new_partition'] = 'fdisk-extended1'; //DEBUG/VALID?
	$helpStep['EPS_raid'] = 'RAID_add';
	$helpStep['EPS_format_partitions'] = 'fdisk-extended2';
	$helpStep['EPS_select_installation_partitions'] = 'fdisk-extended3';
// 	$helpStep[] = '';

	//Define an array with the titles belonging to the extended partitioning steps
	$titleStep['EPS_delete_partitions'] = "$I18N_extended_partitioning: $I18N_delete_partitions";
	$titleStep['EPS_add_new_partition'] = "$I18N_extended_partitioning: $I18N_add_new_partition";
	$titleStep['EPS_format_partitions'] = "$I18N_extended_partitioning: $I18N_format_partitions";
	$titleStep['EPS_raid'] = "$I18N_extended_partitioning: $I18N_build_raid";
	$titleStep['EPS_select_installation_partitions'] = "$I18N_extended_partitioning: $I18N_select_installation_partitions";

	if ($newStep !== false)
		$_SESSION['clientPartition']['extendedPartStep'] = $newStep;

	//Initalise with the "delete partitions" partition step
	if (!isset($_SESSION['clientPartition']['extendedPartStep']))
		$_SESSION['clientPartition']['extendedPartStep'] = EPS_delete_partitions;

	//Set the current help page
	FDISK_fdiskSessionHelpPage($helpStep[$_SESSION['clientPartition']['extendedPartStep']]);

	//Set the current step title
	FDISK_fdiskSessionTitle($titleStep[$_SESSION['clientPartition']['extendedPartStep']]);
	
	return($_SESSION['clientPartition']['extendedPartStep']);
}





/**
**name FDISK_showFdiskGUISelectPartitionMethod()
**description Shows a dialog for choosing the partitioning method and storing the method.
**/
function FDISK_showFdiskGUISelectPartitionMethod()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Array of available partitioning methods
	$PM_arr['PM_auto'] = $I18N_automatic_partition;
	$PM_arr['PM_existing'] = $I18N_format_existing;
	$PM_arr['PM_extended'] = $I18N_extended_partitioning;
	//$PM_arr['PM_extended_lvm'] = $I18N_extended_partitioning_with_lvm;
	$PM_arr['PM_extended_raid'] = $I18N_extended_partitioning_with_raid;
	//$PM_arr['PM_extended_raid_lvm'] = $I18N_extended_partitioning_with_raid_and_lvm;

	$partMethod = HTML_selection("RB_partMethod",$PM_arr,SELTYPE_radio);

	//Set the new method
	if (HTML_submit("BUT_selectMethod",$I18N_next))
	{
		FDISK_fdiskSessionPartMethod($partMethod);
		FDISK_showFdiskGUIDialog();
	}
	else
		echo("
		<tr>
			<td>".FDISK_showFdiskGUITitle(false)."</td>
		</tr>
		<tr>
			<td>".RB_partMethod."</td>
		</tr>
		<tr>
			<td align=\"right\">".BUT_selectMethod."</td>
		</tr>
		");
}





/**
**name FDISK_showFdiskGUIDriveInfoDialog()
**description Shows a block with partitioning and file system information for the currently choosen installation drive. It contains dialog for changing the installation drive.
**/
function FDISK_showFdiskGUIDriveInfoDialog()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Selector with all available drives of the current client
	$newDrive = HTML_selection("SEL_instDrive", HELPER_array2AssociativeArray(FDISK_getAllDrives(FDISK_fdiskSessionParam())), SELTYPE_selection);

	//Get the installation drive
	$instDrive = FDISK_fdiskSessionInstallDrive();

	//Change the installation drive, if needed
	if (HTML_submit("BUT_changeDrive",$I18N_changeDrive) || (!isset($instDrive)))
		$instDrive = FDISK_fdiskSessionInstallDrive($newDrive);

	//Show the name of the choosen drive, the selection and buttons for changing
	echo("
	<br><br>
		<span class=\"title\">$I18N_partition_overview ($instDrive)</span><br><br>".
		SEL_instDrive.BUT_changeDrive);

	//Show a diagram of the current partitioning and formating state of the client's installation drive
	FDISK_printBars(FDISK_fdiskSessionParam(), $instDrive);
	echo("
	<br><br>");

	//Show a table with information of the current partitioning and formating state of the client's installation drive
	FDISK_listPartTable(FDISK_fdiskSessionParam(), FDISK_fdiskSessionvDevInstall());

	//Show the legend for the file system colors
	FDISK_printColorDefinitions();
}





/**
**name FDISK_showFdiskGUIlistPartJobs()
**description Shows a list of all waiting partitioning and fromating jobs.
**/
function FDISK_showFdiskGUIlistPartJobs()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	echo("
	<tr>
		<td align=\"center\">
			<br><br><span class=\"title\">$I18N_waitingPartitioningAndFormatingJobs</span><br><br>");
			FDISK_listPartJobs(FDISK_fdiskSessionPartJobs());
	echo("
		</td>
	</tr>");
};






/**
**name FDISK_showFdiskGUIDialogEnd()
**description Shows the block at the end of the partitioning and formating dialog with partition and file system information about the currently selected drive and buttons for resetting and refreshing the dialog.
**/
function FDISK_showFdiskGUIDialogEnd()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	FDISK_showFdiskGUIlistPartJobs();

	echo("
	<tr>
		<td align=\"center\">");
			FDISK_showFdiskGUIDriveInfoDialog();
	echo("
		</td>
	</tr>");

	echo("
		<tr>
			<td>
				<center>
					<input type=\"submit\" name=\"BUT_refresh\" value=\"$I18N_refresh\">&nbsp;&nbsp;&nbsp;".BUT_reset."
				</center>
			</td>
		</tr>
		");
}
?>