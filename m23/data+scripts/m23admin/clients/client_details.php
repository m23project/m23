
<span class="title"><?PHP echo($_GET['client']." : ".$I18N_controlCenter); ?></span>

<br><br>

<a name="general"></a>
<?php
include("/m23/inc/client_details.php");
$params = CLIENT_getParams($_GET['client']);
$options = CLIENT_getAllOptions($_GET['client']);


CLIENT_showGeneralInfo($_GET['id']);


$sID = HTML_getStatusBarID("installStatus", $_GET['client']);
if ($sID !== false)
{
	CLIENT_DETAILS_beginCategory($I18N_clientRealTimeStatus, "realTimeStatus");
	echo('<td align="center">');
		if (!SERVER_isLiveLogDisabled())
		{
			HTML_liveLogArea('LLA_clientLiveLog',80,25,'clientLiveLog.php?client='.$_GET['client']);
			echo(LLA_clientLiveLog.'<a target="_blank" href="clientLiveLogComplete.php?client='.$_GET['client'].'">&gt;&gt; '.$I18N_showCompleteLiveLogInNewWindows.' &lt;&lt;</a><br>');
		}
		HTML_showStatusBar($sID, 500, 50);
	echo('</td>');
	CLIENT_DETAILS_endCategory();
}

if ($params['status'] == STATUS_CRITICAL)
{
        //CLIENT_DETAILS_beginCategory($I18N_client_log, "liveLog");
        echo("<br>
<a name=\"clientLog\"></a>
<span class=\"title\">$I18N_client_log</span>");
        CLIENT_showLastLogError($params['client']);
        //CLIENT_DETAILS_endCategory();
}

CLIENT_DETAILS_beginCategory($I18N_objectStorageList, 'objectStorageManager');
$OSMo = new CObjectStorageManager();
$OSMo->getByIdent($_GET['client']);
echo('<td align="center">');
	$OSMo->showList();
echo('</td>');
CLIENT_DETAILS_endCategory();


CLIENT_DETAILS_beginCategory($I18N_client_information, "clientInformation");
CLIENT_DETAILS_addIcon("clientinfo", "&infoType=hardware", "hwinfo.png", "$I18N_hardware_info", $I18N_hardware_info_tooltip);
CLIENT_DETAILS_addIcon("clientpackages", "", "packagesInfo.png", "$I18N_packageInformation", $I18N_packageInformation_tooltip);
CLIENT_DETAILS_addIcon("clientinfo", "&infoType=clientLog", "log.png", "$I18N_client_log", $I18N_client_log_tooltip);
CLIENT_DETAILS_addIcon("exportPackageStatus", "", "exportPackageStatus.png", "$I18N_exportPackageStatus", $I18N_exportPackageStatus_tooltip);
CLIENT_DETAILS_endCategory();


CLIENT_DETAILS_beginCategory($I18N_clientAdministration, "clientAdmin");
CLIENT_DETAILS_addIcon("installpackages", "", "install.png", "$I18N_install_packages", $I18N_install_packages_tooltip);
CLIENT_DETAILS_addIcon("installpackages", "&action=deinstall", "deinstall.png", "$I18N_deinstall_packages", $I18N_deinstall_packages_tooltip);
CLIENT_DETAILS_addIcon("updatepackages", "", "packagesUpdate.png", "$I18N_updateClient", $I18N_updateClient_tooltip);
CLIENT_DETAILS_addIcon("changeJobs", "", "changeJobs.png", "$I18N_changeJobs", $I18N_changeJobs_tooltip);
CLIENT_DETAILS_addIcon("editclient", "", "edit.png", "$I18N_edit_client", $I18N_edit_client_tooltip);
echo('</tr><tr>'); //Make a second row for the icons
CLIENT_DETAILS_addIcon("clientinfo", "&infoType=addToGroup", "groupAdd.png", "$I18N_addToGroup", $I18N_addToGroup_tooltip);
CLIENT_DETAILS_addIcon("clientinfo", "&infoType=delFromGroup", "groupDelete.png", "$I18N_removeFromGroup", $I18N_removeFromGroup_tooltip);
if (!isset($_SESSION['m23Shared']) || !$_SESSION['m23Shared']) CLIENT_DETAILS_addIcon("backup", "", "backup.png", "$I18N_backup", $I18N_backup_tooltip);
if (!isset($_SESSION['m23Shared']) || !$_SESSION['m23Shared']) CLIENT_DETAILS_addIcon("createImage", "", "imaging.png", "$I18N_createImage", $I18N_createImage_tooltip);

if (isset($options['m23cupsadminPW']{1}))
	$cupsUserPW = "m23cupsadmin:$options[m23cupsadminPW]@";
else
	$cupsUserPW = '';

CLIENT_DETAILS_addIcon2("https://$cupsUserPW$params[ip]:631/admin/", "printer.png", "$I18N_printer", $I18N_printer_tooltip);
echo('</tr><tr>'); //Make a third row for the icons

CLIENT_DETAILS_addIcon("poolFromClientDebs", "", "poolFromClient.png", $I18N_poolFromClientDebs, $I18N_createPoolFromClientDebs_tooltip);
CLIENT_DETAILS_addIcon('deleteclient&id='.$_GET['id'].'&client='.$_GET['client'], '', 'trash.png', $I18N_delete_client, $I18N_client_delete_tooltip);

CLIENT_DETAILS_endCategory();


CLIENT_DETAILS_beginCategory($I18N_repairCriticalStatus, "criticalStatus");
CLIENT_DETAILS_addIcon("recoverclient", "", "reload.png", "$I18N_recover_client", $I18N_recover_client_tooltip);
CLIENT_DETAILS_addIcon("recoverclient&redoJobs=1", "", "redoJobs.png", "$I18N_redo_client_jobs", $I18N_redo_client_jobs_tooltip);
CLIENT_DETAILS_addIcon("recoverclient&backToRed=1", "", "backToRed.png", "$I18N_back_to_red", $I18N_back_to_red_tooltip);
CLIENT_DETAILS_addIcon("recoverclient&combineJobs=1", "", "redoJobsCombineJobs.png", "$I18N_recover_client_combine_jobs", $I18N_recover_client_combine_jobs_tooltip);



echo("</tr><tr>"); //Make a second row for the icons

//Toggle title and command depending on the rescuemode status
	if (CLIENT_isInRescueMode($_GET['client']))
		{
			$label = $I18N_deactivateRescueSystem;
			$tooltip = $I18N_deactivateRescueSystem_tooltip;
			$rescueStatus=1;
		}
		else
		{
			$label = $I18N_startRescueSystem;
			$tooltip = $I18N_startRescueSystem_tooltip;
			$rescueStatus = 0;
		};
CLIENT_DETAILS_addIcon("clientstatus", "", "trafficLights.png", "$I18N_change_client_status", $I18N_change_client_status_tooltip);

CLIENT_DETAILS_addIcon("clientdebug", "", "bug.png", "$I18N_change_debug_status", $I18N_change_debug_status_tooltip);
CLIENT_DETAILS_addIcon("clientinfo", "&infoType=directConnect", "connect.png", "$I18N_client_directConnect", $I18N_client_directConnect_tooltip);
CLIENT_DETAILS_addIcon("showCurrentWorkPHP", '&m23clientID='.$_GET['id'], 'workPHP.png', "$I18N_currentWorkPHP", $I18N_currentWorkPHP_tooltip);

echo("</tr><tr>"); //Make a third row for the icons

CLIENT_DETAILS_addIcon("rescueclient", "&deactivate=$rescueStatus", "help.png", "$label", $tooltip);

CLIENT_DETAILS_endCategory();



//Check if the client is a VM client
$vmSwHost = VM_getSWandHost($_GET['client']);
if ($vmSwHost != false)
{
	CLIENT_DETAILS_beginCategory($I18N_virtualisation, "virtualisation");
	//Try to execute the command
	$actionExecuted = VM_webAction($_GET['client'], $_GET['vmAction']);


	//Get the status of the VM
	$vmInfo = VM_getStatus($_GET['client']);

	//Check if the command was just executed. If so, the reload button will be shown to give the VM host time to send the VM guest status to the m23 server to show the status in the GUI.
	if ($actionExecuted)
		CLIENT_DETAILS_addIcon("clientdetails", "", "v-client-reload.png", $I18N_refresh, $I18N_refresh_tooltip);
	else
	{
		//Show the action buttons according to the current VM state
		switch ($vmInfo['state'])
		{
			case VM_STATE_OFF:
				CLIENT_DETAILS_addIcon("clientdetails", "&vmAction=start#virtualisation", "v-client-start.png", "$I18N_VMstart", $I18N_VMstart_tooltip);
				CLIENT_DETAILS_addIcon("clientdetails", "&vmAction=startVisual#virtualisation", "v-client-start-visual.png", wordwrap($I18N_VMstartVisual,20,"<br>"), $I18N_VMstartvisual_tooltip);
				CLIENT_DETAILS_addIcon("clientdetails", "", "v-client-reload.png", $I18N_refresh, $I18N_refresh_tooltip);
				break;
	
			case VM_STATE_PAUSE:
				CLIENT_DETAILS_addIcon("clientdetails", "&vmAction=start#virtualisation", "v-client-start.png", "$I18N_VMstart", $I18N_VMstart_tooltip);
				CLIENT_DETAILS_addIcon("clientdetails", "&vmAction=stop#virtualisation", "v-client-stop.png", "$I18N_VMstop", $I18N_VMstop_tooltip);
				CLIENT_DETAILS_addIcon("clientdetails", "", "v-client-reload.png", $I18N_refresh, $I18N_refresh_tooltip);
				break;
				
			case VM_STATE_ON:
	// 			CLIENT_DETAILS_addIcon("clientdetails", "&vmAction=pause#virtualisation", "v-client-pause.png", "$I18N_VMpause");
				CLIENT_DETAILS_addIcon("clientdetails", "&vmAction=stop#virtualisation", "v-client-stop.png", "$I18N_VMstop", $I18N_VMstop_tooltip);
				CLIENT_DETAILS_addIcon("clientdetails", "", "v-client-reload.png", $I18N_refresh, $I18N_refresh_tooltip);
				break;
		}
	}
	CLIENT_DETAILS_endCategory();
}
else
{
	//Check if the VirtualBox installation package is available for the client's distribution
	if (PKG_isSpecialPackageAvailableForClient($_GET['client'], 'm23VirtualBox'))
	{
		CLIENT_DETAILS_beginCategory($I18N_virtualisation, "virtualisation");

		//Only show the install button, if it was not clicked before
		if (!CLIENT_extraWebAction($_GET['extraAction'],$_GET['client']))
			CLIENT_DETAILS_addIcon("clientdetails", "&extraAction=install-vmhostsw#virtualisation", "v-server-vbox-install.png", "$I18N_VMinstallVMServerSW", $I18N_VMinstallVMServerSW_tooltip);

		CLIENT_DETAILS_endCategory();
	}
}



help_showhelp("clientdetails");
?>
