<?PHP
	//first the client name is fetched with GET, afterwards with POST
	if (empty($_GET['client']))
		$client=$_POST['client'];
	else
		$client = $_GET['client'];

	//Get client's ID and current action (deinstall, update, ...)
	$id = (empty($_GET['id']) ? $_POST['id'] : $_GET['id']);
	$action = (isset($_GET['action']) ? $_GET['action'] : $_POST['action']);

	$isGroup = false;
	$isUpdate = false;
	$isPackageSelection = false;
	$groups=array();

	//try to get the package selection name from the input save field
	$packageSelectionName = $_POST[ED_packageSelection];

	//otherwise get the first selected package selection
	if (empty($packageSelectionName))
	for ($i = 0; $i < $CB_counter; $i++)
		{
			$var="CB_pkgRecommend".$i;

			if (!empty($_POST[$var]))
				{
					$packageSelectionName=$_POST[$var];
					break;
				};
		};

	//delete the selected package selection
	if (isset($_POST[BUT_deletePackageSelection]))
		PKG_deletePackageselection($_POST[SEL_packageSelection]);


	//Change title ($actionStr), button label and help page according to the choosen action
	switch ($action)
		{
			//package deinstallation
			case "deinstall":
				{
					$actionStr = $I18N_deinstall_packages;
					$submitButLabel=$I18N_deinstall_selected;
					$helpPage="deinstall_packages";
					break;
				}

			//package installation
			case "":
				{
					$actionStr = $I18N_install_packages;
					$submitButLabel=$I18N_install_selected;
					$helpPage="install_packages";
					break;
				};

			//client update (full update)
			case "update":
				{
					$actionStr = $I18N_update;
					$submitButLabel=$I18N_startUpdate;
					$helpPage="update_packages";
					$isUpdate=true;
					break;
				};

			//package selection
			case "packageSelection":
				{
					$helpPage="editPackageSelection";
					$groupmode=1;
					$isUpdate=false;
					$isPackageSelection=true;
					$isGroup=true;
					break;
				};
		};


	//Change the sources list and the distribution
	if (isset($_POST[BUT_distrSource]))
		{
			$packagesource = $_POST[SEL_sourceslist];
			$distr = $_POST[SEL_distr];
		}
	else
		{
			$distr = $_POST[distr];
			$packagesource = $_POST[packagesource];
		};

	//Check if we have groups in the hidden variable and if yes: restore the groups array
	if (!empty($_POST['groupStr']))
		{
			$groups = explode("?",$_POST['groupStr']);
			$isGroup=true;
			$groupStr = $_POST['groupStr'];
		}
	elseif($isPackageSelection)
		{
			$groupsAndCount=GRP_listGroupsAndCount();
			
			//get all groups
			for ($i=0; $i < count($groupsAndCount); $i++)
				{
					$groups[$i]=$groupsAndCount[$i]['groupname'];
				};
		}
	//groups are fetched (POST) from the groups overview page
	elseif(isset($_POST["selectedGroups"]))
		{
			//Get all groups
			$groupList = GRP_listGroupsAndCount();

			$nr=0;
			//get all groups and store them in an array
			for ($i=0; $i < count($groupList); $i++)
			{
				if (isset($_POST["CB_do$i"]))
					$groups[$nr++]=$_POST["CB_do$i"];
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
			$title="$client: $actionStr";

			//Get distribution and package sources list from the client's options
			$clientOptions = CLIENT_getAllOptions($client);
			$distr = $clientOptions['distr'];
			$packagesource = $clientOptions['packagesource'];

			//Use Debian as default, if no distribution is found (for very old m23 clients)
			if (strlen($distr)==0)
				$distr="debian";

			//include the distribution specific functions
			include_once("/m23/inc/distr/$distr/packages.php");
		}
	//package selection
	else
		{
			$title=str_replace("-","",str_replace("<br>","",str_replace("&nbsp;","",$I18N_editPackageSelection)));
		};
	
?>


<span class="title"><?PHP echo($title); ?></span>

<br><br>

<script>
function showWait()
{
	document.getElementById("waitdiv").style.display = "block";
}
</script>


<CENTER>
	<?PHP
		HTML_showFormHeader();

		if ($isGroup && !$isUpdate)
			{
				/*show selection for distribution and package source
				if there is nothing to select for distr and/or packagesource the values are written to $distr and $packagesource*/
				GRP_showSelDistrSources($groups,$distr,$packagesource);

				if (!empty($distr))
					include_once("/m23/inc/distr/$distr/packages.php");
				else
					$searchDisabled="disabled";
			}

	switch ($action)
		{
			case "deinstall":
				{
					$packetTypesA['recommend'] = $I18N_package_selection;
					$packetTypesA['installed'] = $I18N_normal_packages;
					$packetType = HTML_selection('RB_packetType', $packetTypesA, SELTYPE_radio, false, 'installed');
					
					$searchTerm = HTML_input('ED_search', false, 30, 100);

					echo ("
					$I18N_package_search ".ED_search."
					<input type=\"submit\" name=\"BUT_search\" value=\"$I18N_search\"><br>
					".RB_packetType."
					");
					break;
				}

			case "packageSelection":
			case "":
				{
					$packetTypesA['recommend'] = $I18N_package_selection;
					$packetTypesA['normal'] = $I18N_normal_packages;
					$packetTypesA['special'] = $I18N_special_packages;
					$packetType = HTML_selection('RB_packetType', $packetTypesA, SELTYPE_radio, false, 'normal');

					$searchTerm = HTML_input('ED_search');

					//Add an extra checkbox for choosing to search complete package descriptions/sizes on Debian/Ubuntu
					if (('debian' == $distr) || ('ubuntu' == $distr))
					{
						$completeDescription = HTML_checkBox('CB_completeDescription', $I18N_fetchCompletePackageDescriptionAndSize);
						$completeDescriptionHTML = '<br>'.constant('CB_completeDescription');
					}
					else
						$completeDescriptionHTML = '';

					echo("
					$I18N_package_search ".ED_search."&nbsp;
					<input type=\"submit\" name=\"BUT_search\" value=\"$I18N_search\" $searchDisabled onClick=\"showWait()\">&nbsp; $completeDescriptionHTML
					<BR>
					".RB_packetType."
					<br>

					<div style=\"display: none\" id=\"waitdiv\">
						<table class=\"infotable\">
							<tr>
								<td>
									<img id=\"waitimg\" src=\"/gfx/wait-ani.gif\">
									$I18N_pleaseWaitPackageSearchInProgress
								</td>
							</tr>
						</table>
					</div>
					
					");
					break;
				};

			case "update":
				{
					//show radio buttons for selecting the update method
					$completeChecked="";
					$normalChecked="";
					
					if ($_POST['RB_updateType']=='complete')
						$completeChecked="checked";
						
					if ($_POST['RB_updateType']=='normal')
						$normalChecked="checked";
					
					echo("
					<input type=\"radio\" name=\"RB_updateType\" value=\"complete\" $completeChecked>$I18N_fullUpdate&nbsp;
					
					<input type=\"radio\" name=\"RB_updateType\" value=\"normal\" $normalChecked>$I18N_normalUpdate");
					
					break;
				};
		};
?>
</CENTER>

<BR>
<input type="hidden" name="groupStr" value="<?PHP echo($groupStr);?>">
<input type="hidden" name="distr" value="<?PHP echo($distr);?>">
<input type="hidden" name="packagesource" value="<?PHP echo($packagesource);?>">
<input type="hidden" name="action" value="<?PHP echo($action);?>">
<input type="hidden" name="id" value="<?PHP echo($id);?>">


<?PHP
	HTML_setPage("installpackages");

	if (!$isUpdate)
		echo("<span class=\"titlesmal\">$I18N_found_packages</span><br><br>");

	if (!empty($_POST['CB_counter']))
		$CB_counter=$_POST['CB_counter'];
		else
		$CB_counter=0;

	if (!empty($_POST['CB_markCounter']))
		$CB_markCounter=$_POST['CB_markCounter'];
		else
		$CB_markCounter=0;

	if (!empty($_POST['packageType']))
		$packageType=$_POST['packageType'];

 //list packages
	if(!empty($_POST['BUT_search']))
		switch($packetType)
		{
			case "normal":
				{
					if (('debian' == $distr) || ('ubuntu' == $distr))
						$CB_counter = PKG_listPackages($searchTerm, $distr, $packagesource, $client, $completeDescription);
					else
						//we have a normal apt package
						$CB_counter = PKG_listPackages($searchTerm, $distr, $packagesource, $client);
					break;
				};
	
			case "recommend":
				{
					//we have a recommend package
					$CB_counter=PKG_listRecommendPackages($searchTerm);
					break;
				};
	
			case "special":
				{
					//we have a special package
					$CB_counter=PKG_listSpecialPackages($searchTerm,"<br>\n",$distr);
					break;
				};
	
			case "installed":
				{
					if ($isGroup)
						$CB_counter=GRP_getAllPackages($groups,$searchTerm,true);
					else
						$CB_counter=CLIENT_listPackages($client, $searchTerm,true);
					break;
				};
		};
	
	switch ($action)
	{
		case "packageSelection": CAPTURE_captureAll(3,"editPackageSelection: create a package selection",true); break;
		case "update": CAPTURE_captureAll(2,"update_packages: make a full update",true); break;
		case "deinstall": CAPTURE_captureAll(1,"deinstall_packages: search for mozilla",true); break;
		default: CAPTURE_captureAll(0,"install_packages: search for kate",true);
	};

	//don't close the table if there occurs an error
	if (!$CB_counter)
		$tableClose = false;

 //send all marked jobs
if(!empty($_POST['BUT_mark']))
	{
	 switch($packetType)
		{
		case "normal":
			{
				PKG_addNormalPackages($CB_counter,$client);
				break;
			};
		case "recommend":
		 	{
				PKG_addRecommendPackages($CB_counter,$client,$_POST[SEL_specialNormalType],$distr);
				break;
			};
		case "special":
			{
				PKG_addSpecialPackages($CB_counter,$client,$distr);
				break;
			};
		case "installed":
			{
				PKG_remNormalPackages($CB_counter,$client);
				break;
			};
		};
	};

	$newPriority = HTML_input('ED_priority', 25, 3, 3);
	if (HTML_submit('BUT_priority', $I18N_changePackagePriority))
		PKG_changePrioritySelectedPackages(PKG_countSelectedpackages($client),$client,$newPriority);


	//discard only selected jobs
	if(!empty($_POST['BUT_discardSelected']))
		PKG_rmSelectedPackages(PKG_countSelectedpackages($client),$client);


if (!empty($_POST['BUT_acceptJobs']) ||
	!empty($_POST['BUT_startUpdate']))
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
				};
		};
			
 //accept all jobs
 if(!empty($_POST['BUT_acceptJobs']))
	{
		for ($i = 0; $i < $clAmount; $i++)
			{
				if ($isGroup)
					{
						//assign current client name
						$client = $clients[$i];
						//copy the waiting packages from the fake client to the current
						PKG_copyWait4accPackagesToClient($client,$clientOrig);
					};

				PKG_addJob($client,"m23UpdateSourcesList",PKG_getSpecialPackagePriority("m23UpdateSourcesList"),"");

				//Make preselected jobs waiting jobs and don't show the message if we are in group mode
				PKG_acceptJobs($client,!$isGroup);

				//Make sure that the client is in the same state (running or turned off) after the insallation like before.
				if (!$isGroup)
					PKG_addShutdownPackage($client);

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
			};

	 $tableClose = false;
	};





	//update client
	if (!empty($_POST['BUT_startUpdate']))
		{
			$arr['type']=$_POST['RB_updateType'];

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
 if(!empty($_POST['BUT_discardAll']))
	PKG_discardJobs($client);

 if(!empty($_POST['BUT_saveSelectedPackages']))
	PKG_savePackageselection($client, $_POST['ED_packageSelection']);

?>

<center>

<?PHP 
//preselect packages button
if (!$isUpdate)
echo("<BR><input type=\"submit\" name=\"BUT_mark\" value=\"$I18N_preselect\"></center><BR>");

echo("
<input type=\"hidden\" name=\"CB_counter\" value=\"$CB_counter\">
<input type=\"hidden\" name=\"client\" value=\"$client\">
");

//title: preselected packages
if (!$isUpdate)
	echo("<BR><BR><span class=\"titlesmal\">$I18N_preselected_packages</span><br><br>");
	
	
//show selected packages
	if (!$isUpdate)
		{
			HTML_showTableHeader();
			PKG_listSelectedpackages($client,$distr,SRCLST_getRelease($packagesource));
			HTML_showTableEnd();
		};
?>


<center>

<?PHP
	//draw discard (all, selected) and refresh buttons
	if (!$isUpdate)
		echo("
<input type=\"submit\" name=\"BUT_discardAll\" value=\"$I18N_discard_all\">&nbsp;&nbsp;
<input type=\"submit\" name=\"BUT_discardSelected\" value=\"$I18N_discard_selected\">
<br><br>
".ED_priority."&nbsp;&nbsp;".BUT_priority."<br><br>
<input type=\"submit\" name=\"BUT_refresh\" value=\"$I18N_refresh\">&nbsp;&nbsp;");


	//show preview results
	if (!empty($_POST['BUT_previewInstallation']))
		PKG_showPreviewInstallationDeinstallation($client,true);
		
	if (!empty($_POST['BUT_previewDeinstallation']))
		PKG_showPreviewInstallationDeinstallation($client,false);
		
	if (!empty($_POST['BUT_previewUpdate']))
		PKG_showPreviewUpdateSystem($client,$_POST['RB_updateType']=="complete");
		
	

	//show correct preview button
	if (!$isGroup)
		{
			switch ($action)
				{
					case "deinstall":
						{
							echo("<input type=\"submit\" name=\"BUT_previewDeinstallation\" value=\"$I18N_previewDeinstallation\">");
							break;
						};

					case "":
						{
							echo("<input type=\"submit\" name=\"BUT_previewInstallation\" value=\"$I18N_previewInstallation\">");
							break;
						};

					case "update":
						{
							echo("<input type=\"submit\" name=\"BUT_previewUpdate\" value=\"$I18N_updatePreview\">");
							break;
						};
				}
		};

	//draw package selection save dialog
	
	//(de)install mode
	if (!$isUpdate && !$isPackageSelection)
		echo("<br><br>$I18N_save_package_selection <input type=\"text\" name=\"ED_packageSelection\" value=\"$packageSelectionName\" size=20 maxlength=50>&nbsp;
		
		<input type=\"submit\" name=\"BUT_saveSelectedPackages\" value=\"$I18N_save\">

		<br><br>
		<input type=\"submit\" name=\"BUT_acceptJobs\" value=\"$submitButLabel\">
		");
	
	//update mode
	elseif (!$isPackageSelection)
		echo("<input type=\"submit\" name=\"BUT_startUpdate\" value=\"$I18N_startUpdate\">");
		
	//package selection mode
	else
		echo("<br><br>$I18N_save_package_selection <input type=\"text\" name=\"ED_packageSelection\" value=\"$packageSelectionName\" size=20 maxlength=50>&nbsp;
		
		<input type=\"submit\" name=\"BUT_saveSelectedPackages\" value=\"$I18N_save\"><br>
		$I18N_package_selection 
		".PKG_showAllPackageSelections("SEL_packageSelection",$packageSelectionName)."&nbsp;
		<input type=\"submit\" name=\"BUT_deletePackageSelection\" value=\"$I18N_delete\">
		");
		
?>

<script language=JavaScript>
set(1);
</script>


<BR><BR>
</center>

<?PHP
	HTML_showFormEnd();

	if ($isGroup && !$isPackageSelection)
		GRP_HTMLBackToOverview();
	elseif(!$isPackageSelection)
		CLIENT_HTMLBackToDetails($client,$id,"clientAdmin");

	HELP_showHelp($helpPage);
?>
