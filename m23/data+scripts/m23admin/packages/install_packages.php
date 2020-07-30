<?PHP
	//Get the client name, the client's ID and current action (deinstall, update, ...) first by fetching with GET, afterwards with POST
	if (isset($_GET['client']))
		$client =  $_GET['client'];
	elseif (isset($_POST['HID_client']))
		$client =  $_POST['HID_client'];
	else
		$client = '';

	if (isset($_GET['id']))
		$id =  $_GET['id'];
	elseif (isset($_POST['HID_id']))
		$id =  $_POST['HID_id'];

	$groupStr = $searchDisabled = '';

	if (isset($_GET['action']))
		$action = $_GET['action'];
	elseif (isset($_POST['HID_action']))
		$action = $_POST['HID_action'];
	else
		$action = '';

	$submitButLabel = '';

	//Group variables
	$isGroup = false;
	$isUpdate = false;
	$groups=array();


	//define radio buttons for selecting the update method
	$updateTypesA['complete'] = $I18N_fullUpdate;
	$updateTypesA['normal'] = $I18N_normalUpdate;
	$updateType = HTML_selection('RB_updateType', $updateTypesA, SELTYPE_radio, false, 'complete');

	$CB_counter = (isset($_POST['HID_CB_counter']) ? $_POST['HID_CB_counter'] : 0);

	//Package selections
	$isPackageSelection = false;

	// Set the 1st selected package selection as storing name for the package selection, if the package selection name is empty
	if (isset($_POST['RB_packetType']) && ($_POST['RB_packetType'] == 'recommend') && !isset($_POST['ED_packageSelection']{0}))
	{
		// Get the 1st selected package selection
		for ($i = 0; $i < $CB_counter; $i++)
		{
			$var="CB_pkgRecommend".$i;
	
			if (isset($_POST[$var]))
			{
				$_POST['ED_packageSelection'] = $_POST[$var];
				break;
			}
		}
	}

	//try to get the package selection name from the input save field
	$packageSelectionName = HTML_input('ED_packageSelection', false, 20, 50);

	//delete the selected package selection
	if (HTML_submit('BUT_deletePackageSelection',$I18N_delete))
		PKG_deletePackageselection($_POST['SEL_packageSelection']);		//Defined with function PKG_showAllPackageSelections

	//Upload dialog for a package selection file
	$selectedPackagesFile = HTML_uploadFile('UP_importSelectedPackages', $I18N_fileWithExportedSelectedPackages, 5242880);
	if (is_string($selectedPackagesFile))
	{
		PKG_importSelectedPackagesFromFile($client, $selectedPackagesFile);
		unlink($selectedPackagesFile);
	}



	//Change title ($actionStr), button label and help page according to the choosen action
	switch ($action)
	{
		//package deinstallation
		case 'deinstall':
		{
			$actionStr = $I18N_deinstall_packages;
			$submitButLabel=$I18N_deinstall_selected;
			$helpPage="deinstall_packages";
			break;
		}

		//package installation
		case '':
		{
			$actionStr = $I18N_install_packages;
			$submitButLabel=$I18N_install_selected;
			$helpPage="install_packages";
			break;
		};

		//client update (full update)
		case 'update':
		{
			$actionStr = $I18N_update;
			$submitButLabel=$I18N_startUpdate;
			$helpPage="update_packages";
			$isUpdate=true;
			break;
		};

		//package selection
		case 'packageSelection':
		{
			$helpPage="editPackageSelection";
			$groupmode=1;
			$isUpdate=false;
			$isPackageSelection=true;
			break;
		};
	}



	//Change the sources list and the distribution
	if (HTML_submitCheck('BUT_distrSource'))			//BUT_distrSource is defined in /m23/inc/groups.php
	{
		$packagesource = $_POST['SEL_sourceslist'];		//SEL_sourceslist is defined in /m23/inc/groups.php
		$distr = $_POST['SEL_distr'];					//SEL_distr is defined in /m23/inc/groups.php
	}
	else
	{
		$packagesource = isset($_POST['HID_packagesource']) ? $_POST['HID_packagesource'] : '';
		$distr = isset($_POST['HID_distr']) ? $_POST['HID_distr'] : '';
	}

	//Check if we have groups in the hidden variable and if yes: restore the groups array
	if (isset($_POST['HID_groupStr']) && !empty($_POST['HID_groupStr']))
	{
		$groups = explode("?",$_POST['HID_groupStr']);
		$isGroup=true;
		$groupStr = $_POST['HID_groupStr'];
	}
	elseif($isPackageSelection)
	{
		$groupsAndCount = GRP_listGroupsAndCount();
		
		//get all groups
		for ($i=0; $i < count($groupsAndCount); $i++)
			$groups[$i] = $groupsAndCount[$i]['groupname'];
	}
	//groups are fetched (POST) from the groups overview page
	elseif(isset($_POST['selectedGroups']))				//selectedGroups is defined in /m23/inc/groups.php
	{
		//Get all groups
		$groupList = GRP_listGroupsAndCount();

		$nr=0;
		//get all groups and store them in an array
		for ($i=0; $i < count($groupList); $i++)
		{
			if (isset($_POST["CB_do$i"]))			//CB_do$i is defined in /m23/inc/groups.php
				$groups[$nr++]=$_POST["CB_do$i"];
		}

		if (0 == $nr)
		{
			MSG_showError($I18N_noGroupSelected);
			exit();
		}

		//Make the groups storable in a hidden variable
		$groupStr = implode("?",$groups);

		$isGroup=true;
		$groupmode = 0;

		//Generate a fake client name for temporarily storing of the pre-selected packages
		$client="m23fakeGroupClient".time();
	}

	//generate page title for group(s)
	if ($isGroup && !$isPackageSelection)
	{
		$title="$I18N_group:";

		foreach ($groups as $group)
			$title.=" $group,";

		//Remove the ',' at the end
		$title = rtrim($title,',');

		$title.=": $actionStr";
	}
	//generate page title for a single client
	elseif (!$isGroup && !$isPackageSelection)
	{
		$title = "$client: $actionStr";

		//Get distribution and package sources list from the client's options
		$clientOptions = CLIENT_getAllOptions($client);
		$distr = isset($clientOptions['distr']) ? $clientOptions['distr'] : '';
		$packagesource = isset($clientOptions['packagesource']) ? $clientOptions['packagesource'] : '';

		//Use Debian as default, if no distribution is found (for very old m23 clients)
		if (strlen($distr) == 0)
			$distr = "debian";

		//include the distribution specific functions
		include_once("/m23/inc/distr/$distr/packages.php");
	}
	//package selection
	else
		$title = str_replace("-","",str_replace("<br>","",str_replace("&nbsp;","",$I18N_editPackageSelection)));


?>


<span class="title"><?PHP echo($title); ?></span>

<br><br>

<?php
	HTML_waitAnimation('ANIM_wait', $I18N_pleaseWaitPackageSearchInProgress);
?>


<CENTER>
<?PHP

	HTML_showFormHeader();

	if (($isGroup || !isset($distr) || empty($distr)) && !$isUpdate)
	{
		/*show selection for distribution and package source
		if there is nothing to select for distr and/or packagesource the values are written to $distr and $packagesource*/
		GRP_showSelDistrSources($isGroup ? $groups : NULL,$distr,$packagesource);

		if (!empty($distr))
			include_once("/m23/inc/distr/$distr/packages.php");
		else
			$searchDisabled="disabled";
	}
	elseif (!empty($distr))
		include_once("/m23/inc/distr/$distr/packages.php");

	if (HTML_submit('BUT_updatePackageSearchIndex', $I18N_updatePackageSearchIndex))
		PKG_updatePackageSearchCacheFile($packagesource);
	
	$packageInformationChange = constant('BUT_updatePackageSearchIndex').' '.SRCLST_packageInformationChangeInformationHumanReadable($distr, $packagesource);

	switch ($action)
	{
		case 'deinstall':
		{
			$packetTypesA['recommend'] = $I18N_package_selection;
			$packetTypesA['installed'] = $I18N_normal_packages;
			$packetType = HTML_selection('RB_packetType', $packetTypesA, SELTYPE_radio, false, 'installed');
			
			$searchTerm = HTML_input('ED_search', false, 30, 100);
			HTML_submitDefine('BUT_search', $I18N_search);

			echo ("$I18N_package_search ".ED_search.BUT_search.'<br>'.RB_packetType);
			break;
		}

		case 'packageSelection':
		case '':
		{
			$packetTypesA['recommend'] = $I18N_package_selection;
			$packetTypesA['normal'] = $I18N_normal_packages;
			$packetTypesA['special'] = $I18N_special_packages;
			$packetType = HTML_selection('RB_packetType', $packetTypesA, SELTYPE_radio, false, 'normal');

			$searchTerm = HTML_input('ED_search');

			//Add an extra checkbox for choosing to search complete package descriptions/sizes on Debian/Ubuntu
			if (('debian' == $distr) || ('ubuntu' == $distr))
			{
				$completeDescription = HTML_checkBox('CB_completeDescription', $I18N_fetchCompletePackageDescription);
				$completeDescriptionHTML = '<br>'.constant('CB_completeDescription');
			}
			else
				$completeDescriptionHTML = '';

			HTML_submitDefine('BUT_search', $I18N_search, "$searchDisabled ".ANIM_waitOnClick);

			echo("
			$I18N_package_search ".ED_search."&nbsp;".BUT_search."<BR>".RB_packetType."
			<br>$completeDescriptionHTML<br>
			$packageInformationChange

			".ANIM_wait."
			
			");
			break;
		}

		case 'update':
		{
			echo(RB_updateType."<br>$packageInformationChange");
			break;
		}
	}
?>
</CENTER>
<BR>

<?PHP

	echo(HTML_hiddenVar('HID_packagesource', $packagesource).
		HTML_hiddenVar('HID_distr', $distr).
		HTML_hiddenVar('HID_groupStr', $groupStr).
		HTML_hiddenVar('HID_action', $action).
		(isset($id) ? HTML_hiddenVar('HID_id', $id) : '').
		(isset($client) ? HTML_hiddenVar('HID_client', $client) : '')
		);

	HTML_setPage('installpackages');

	if (!$isUpdate)
		HTML_showSmallTitle($I18N_found_packages); echo('<br><br>');



// 	if (!empty($_POST['CB_markCounter']))
// 		$CB_markCounter=$_POST['CB_markCounter'];
// 		else
// 		$CB_markCounter=0;

// 	if (!empty($_POST['packageType']))
// 		$packageType=$_POST['packageType'];

// Check, if the search term contains valid characters only and give out an info messange and remove unwanted characters
	$searchTermNew = preg_replace('/[^A-Za-z0-9\.\- δόφί]/', '', $searchTerm);
	if (strlen($searchTermNew) != strlen($searchTerm))
	{
		$searchTerm = $searchTermNew;
		MSG_showInfo($I18N_invalidCharactersWereRemovedFromSearchTerm);
	}


//list packages
	if (HTML_submitCheck('BUT_search'))
	{
		switch($packetType)
		{
			case 'normal':
			{
				//we have a normal apt package
				if (empty($searchTerm))
				{
					MSG_showError($I18N_pleaseEnterASearchTerm);
					break;
				}
			
				if (('debian' == $distr) || ('ubuntu' == $distr))
					$CB_counter = PKG_listPackages($searchTerm, $distr, $packagesource, $client, $completeDescription);
				else
					$CB_counter = PKG_listPackages($searchTerm, $distr, $packagesource, $client);
				break;
			};
	
			case 'recommend':
			{
				//we have a recommend package
				$CB_counter=PKG_listRecommendPackages($searchTerm);
				break;
			};
	
			case 'special':
			{
				//we have a special package
				$CB_counter=PKG_listSpecialPackages($searchTerm,"<br>\n",$distr);
				break;
			};
	
			case 'installed':
			{
				if ($isGroup)
					$CB_counter=GRP_getAllPackages($groups,$searchTerm,true);
				else
					$CB_counter=CLIENT_listPackages($client, $searchTerm,true);
				break;
			};
		}
	}
	
	switch ($action)
	{
		case 'packageSelection': CAPTURE_captureAll(3,"editPackageSelection: create a package selection",true); break;
		case 'update': CAPTURE_captureAll(2,"update_packages: make a full update",true); break;
		case 'deinstall': CAPTURE_captureAll(1,"deinstall_packages: search for mozilla",true); break;
		default: CAPTURE_captureAll(0,"install_packages: search for kate",true);
	};

	//don't close the table if there occurs an error
	if (!$CB_counter)
		$tableClose = false;

	//send all marked jobs

	if ((0 === $CB_counter) && (isset($searchTerm{0})))
		MSG_showInfo($I18N_packageSearchReturnedNoResultUpdatePackageSearchIndex);
	

	if (HTML_submit('BUT_mark', $I18N_preselect))
	{
		switch($packetType)
		{
			case 'normal':
			{
				PKG_addNormalPackages($CB_counter,$client);
				break;
			};
			case 'recommend':
			{
				PKG_addRecommendPackages($CB_counter,$client,$_POST[SEL_specialNormalType],$distr);
				break;
			};
			case 'special':
			{
				PKG_addSpecialPackages($CB_counter,$client,$distr);
				break;
			};
			case 'installed':
			{
				PKG_remNormalPackages($CB_counter,$client);
				break;
			};
		};
	};

	$newPriority = HTML_input('ED_priority', 25, 3, 3);
	if (HTML_submit('BUT_priority', $I18N_changePackagePriority))
		PKG_changePrioritySelectedPackages(PKG_countSelectedpackages($client),$client,$newPriority);

	$isInstallReasonEnabled = SERVER_isInstallReasonEnabled();
	if ($isInstallReasonEnabled)
	{
		$newReason = HTML_textArea('TA_reason', 73, 5);
		if (HTML_submit('BUT_reason', $I18N_changePackageInstallReason))
			PKG_changeInstallReasonSelectedPackages(PKG_countSelectedpackages($client),$client,$newReason);
	}


	//discard only selected jobs
	if (HTML_submit('BUT_discardSelected', $I18N_discard_selected))
		PKG_rmSelectedPackages(PKG_countSelectedpackages($client),$client);
		
	HTML_submitDefine('BUT_acceptJobs', $submitButLabel);
	HTML_submitDefine('BUT_startUpdate', $I18N_startUpdate);

	if (HTML_submitCheck('BUT_acceptJobs') || HTML_submitCheck('BUT_startUpdate'))
	{
		if ($isGroup)
		{
			//get all clients in the groups
			$clients = GRP_listAllClientsInGroups($groups);
			$clAmount = count($clients);
			$clientOrig = $client;
			$showMsg = false;
		}
		else
		{
			$clAmount = 1;
			$showMsg = true;
		}
	}

	//accept all jobs
	if(HTML_submitCheck('BUT_acceptJobs'))
	{
		for ($i = 0; $i < $clAmount; $i++)
		{
			if ($isGroup)
			{
				//assign current client name
				$client = $clients[$i];
				//copy the waiting packages from the fake client to the current
				PKG_copyWait4accPackagesToClient($client,$clientOrig);
			}

			PKG_addJob($client,"m23UpdateSourcesList",PKG_getSpecialPackagePriority("m23UpdateSourcesList"),"");

			//Make preselected jobs waiting jobs and don't show the message if we are in group mode
			PKG_acceptJobs($client,!$isGroup);

			//Make sure that the client is in the same state (running or turned off) after the insallation like before.
			if (!$isGroup)
				PKG_addShutdownPackage($client);

			if (!SERVER_isUpdatePackageInfosDisabled())
				PKG_addJob($client,"m23UpdatePackageInfos",PKG_getSpecialPackagePriority("m23UpdatePackageInfos"),"");

			//if ((CLIENT_getClientStatus($client) != STATUS_BLUE) && !$isGroup)
			//now do all group jobs at once
			if (CLIENT_getClientStatus($client) != STATUS_BLUE)
				CLIENT_startInstall($client);
		}
			
		if ($isGroup)
		{
			//make fake client name the normal
			$client = $clientOrig;

			//Get the amount of jobs that have been assigned to the clients of the group(s)
			$jobNr = PKG_countJobs($client,'wait4acc');

			MSG_showAddJobsInfo($jobNr,$clAmount);

			//discard all waiting jobs from the fake client
			PKG_discardJobs($client);
		}

		$tableClose = false;
	}





	//update client
	if (HTML_submitCheck('BUT_startUpdate'))
		{
			$arr['type'] = $updateType;

			$pkgparams=implodeAssoc("?#?",$arr);
			
			if ($isGroup)
				$distrOld=$distr;

			for ($i = 0; $i < $clAmount; $i++)
			{
				if ($isGroup)
				{
					//assign current client name
					$client = $clients[$i];

					$clientOptions=CLIENT_getAllOptions($client);

					$distr=$clientOptions['distr'];
				};

				PKG_addJob($client,"m23update",PKG_getSpecialPackagePriority("m23update",$distr),$pkgparams);

				if (CLIENT_getClientStatus($client) != STATUS_BLUE)
					CLIENT_startInstall($client);
			};

			if ($isGroup)
				{
					//make fake client name the normal
					$client = $clientOrig;
					$distr=$distrOld;
					MSG_showUpdateInfo($clAmount);
				}
			else
				MSG_showInfo($I18N_updateJobHasBeenStored);
		};


	//discard all marked jobs
	if (HTML_submit('BUT_discardAll',$I18N_discard_all))
		PKG_discardJobs($client);

	if (HTML_submit('BUT_saveSelectedPackages',$I18N_save))
		PKG_savePackageselection($client, $packageSelectionName);
?>

<center>

<?PHP 
	//preselect packages button
	if (!$isUpdate)
		echo('<BR>'.BUT_mark.'</center><BR>');


	echo(HTML_hiddenVar('HID_CB_counter', $CB_counter).
		(isset($client) ? HTML_hiddenVar('HID_CB_client', $client) : ''));


//title: preselected packages
	if (!$isUpdate)
	{
		echo('<BR><BR>'); HTML_showSmallTitle($I18N_preselected_packages); echo('<BR><BR>');
	}


//show selected packages
	if (!$isUpdate)
	{
		HTML_showTableHeader();
		PKG_listSelectedpackages($client,$distr,SRCLST_getRelease($packagesource));
		HTML_showTableEnd();
	}
?>


<center>

<?PHP
	HTML_submitDefine('BUT_refresh', $I18N_refresh);


	//draw discard (all, selected) and refresh buttons
	if (!$isUpdate)
	{
		echo(BUT_discardAll.'&nbsp;&nbsp;'.BUT_discardSelected.'<br><br>'.
		ED_priority.'&nbsp;&nbsp;'.BUT_priority.'<br><br>');
		if ($isInstallReasonEnabled)
			echo(TA_reason.'&nbsp;&nbsp;'.BUT_reason.'<br><br>');
		echo(BUT_refresh.'&nbsp;&nbsp;');
	}


	//show preview results
	if (HTML_submit('BUT_previewInstallation',$I18N_previewInstallation))
		PKG_showPreviewInstallationDeinstallation($client,true);
		
	if (HTML_submit('BUT_previewDeinstallation',$I18N_previewDeinstallation))
		PKG_showPreviewInstallationDeinstallation($client,false);
		
	if (HTML_submit('BUT_previewUpdate',$I18N_updatePreview))
		PKG_showPreviewUpdateSystem($client, 'complete' == $updateType);
		
	

	//show correct preview button
	if (!$isGroup)
	{
		switch ($action)
		{
			case 'deinstall':
			{
				echo(BUT_previewDeinstallation);
				break;
			};

			case '':
			{
				echo(BUT_previewInstallation);
				break;
			};

			case 'update':
			{
				echo(BUT_previewUpdate);
				break;
			};
		}
	};

	if (('packageSelection' != $action) && (!$isUpdate))
		echo('<br><br>'.BUT_acceptJobs);


	HTML_urlButton('DL_exportSelectedPackages', $I18N_exportSelectedPackages, '/m23admin/packages/exportSelectedPackages.php?client='.$client);

	//update mode
	if ($isUpdate)
		echo(BUT_startUpdate);


	HTML_showSmallTitle($I18N_package_selection);
	HTML_showTableHeader();
		echo('<tr><td align="center">');
		//draw package selection save dialog
		//(de)install mode
		if (!$isUpdate && !$isPackageSelection)
			echo("$I18N_save_package_selection ".ED_packageSelection.'&nbsp;'.BUT_saveSelectedPackages);
		//package selection mode
		else
			echo("$I18N_save_package_selection ".ED_packageSelection.'&nbsp;'.BUT_saveSelectedPackages."<br><br>
			$I18N_package_selection 
			".PKG_showAllPackageSelections('SEL_packageSelection',$packageSelectionName)."&nbsp;".BUT_deletePackageSelection."<br>
			");

		if (!$isUpdate || $isPackageSelection)
			echo('<br>'.UP_importSelectedPackages.'<br>'.DL_exportSelectedPackages);
		echo('</td></tr>');
	HTML_showTableEnd();

	HTML_showFormEnd();

	echo('
	<script language=JavaScript>
		set(1);
	</script>

	<BR><BR>
	</center>
	');

	if ($isGroup && !$isPackageSelection)
		GRP_HTMLBackToOverview();
	elseif(!$isPackageSelection)
		CLIENT_HTMLBackToDetails($client,$id,"clientAdmin");

	HELP_showHelp($helpPage);
?>
