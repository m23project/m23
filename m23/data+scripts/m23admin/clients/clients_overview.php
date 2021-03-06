<?PHP
	HTML_showFormHeader();
	HTML_setPage('clientsoverview');

	$groupname = isset($_GET['groupname']) ? $_GET['groupname'] : '';
	
	if (isset($_GET['action']))
		$action = $_GET['action'];
	elseif (isset($_POST['action']))
		$action = $_POST['action'];
	else
		$action = 'no_action_selected';

	//do actions to the clients
	$checkOff = false;
	
	$clientOnlineStatusColumn = SERVER_isClientOnlineStatusEnabled();
	$clientUpdateJobsMaxAllowedDelay = SERVER_getWarnWhenUpdateJobsAreDelayed();
	$clientRebootMaxAllowedDelay = SERVER_getWarnWhenClientRebootsRequestedByPackagesAreDelayed();
	$clientLastUpgradeColumn = SERVER_getShowClientLastUpgradeColumn();
	$clientShowClientIPColumn = SERVER_getShowClientIPColumn();
	$clientShowClientMACColumn = SERVER_getShowClientMACColumn();

	//Create editlines and get the search term
	$searchLine = CLIENT_getOverviewSearchLine(2);

	//Group and client actions
	$selTypeA['grpDel']					= $I18N_removeFromGroup;
	$selTypeA['grpAdd']					= $I18N_addToGroup;
	$selTypeA['grpMov']					= $I18N_moveToGroup;
	$selTypeA['del']					= $I18N_delete;
	$selTypeA['recover']				= $I18N_recover;
	$selTypeA['redo']					= $I18N_redo_client_jobs;
	$selTypeA['comparePackageStatus']	= $I18N_comparePackageStatus;
	
	$groupAction = HTML_selection('SEL_type', $selTypeA, SELTYPE_selection);

	// Set initial values
	$allCheckedClients = array();
	$allCheckedClientsCounter = 0;

	if (HTML_submit('BUT_do',$I18N_accept_changes))
	{
		//Run thru all client numbers on the page
		for ($i=0; $i < $_POST['clientAmount']; $i++)
		{
			// Skips undefined checkbuttons (not set client names)
			if (!isset($_POST["CB_do$i"])) continue;

			//Get the according client name of the check box
			$clientName = $_POST["CB_do$i"];
			if (isset($clientName))
				//Run the action that is selected on bottom of the page.
				switch($groupAction)
				{
					case "grpDel":
						GRP_delClientFromGroup($clientName,$_POST['SEL_group']);
						$checkOff=true;
						break;
					case "grpMov":
						GRP_moveClientToGroup($clientName, $groupname, $_POST['SEL_group']);
						$checkOff=true;
						break;
					case "grpAdd":
						GRP_addClientToGroup($clientName,$_POST['SEL_group']); break;
					case "del":
						CLIENT_deleteClient($clientName,false);
						$checkOff=true;
						break;
					case "recover":
						CLIENT_desasterRecovery($clientName);
						$checkOff=true;
						break;
					case 'redo':
						CLIENT_desasterRecovery($clientName, false);
						$checkOff=true;
						break;
					case 'comparePackageStatus':
						$allCheckedClients[$allCheckedClientsCounter++] = $clientName;
						break;
				}
		}

		// Handle actions after getting all checked clientnames
		switch($groupAction)
		{
			case 'comparePackageStatus':
				$comparePackageStatusLink = '?page=comparePackageStatus';
				if (isset($allCheckedClients[0])) $comparePackageStatusLink.= '&cl1='.$allCheckedClients[0];
				if (isset($allCheckedClients[1])) $comparePackageStatusLink.= '&cl2='.$allCheckedClients[1];

				HTML_showTitle($I18N_comparePackageStatus);
				HTML_showTableHeader(true);
				HTML_showTableRow("<a href=\"$comparePackageStatusLink\">&gt;&gt;&gt; $I18N_comparePackageStatusNow &lt;&lt;&lt;</a>");
				HTML_showTableEnd(true);

				break;
		}
	}





// Page selection (decide what clients should be shown)
	switch ($action)
	{
		case "setup":
		{
			$title = $I18N_setup_client;
			if (!empty($searchLine))
				$results = CLIENT_query("=",STATUS_YELLOW,"","",$groupname,"","", $searchLine);
			break;
		}
			
		case "install":
		{
			$title = $I18N_install_packages;
			if (!empty($searchLine))
				$results = CLIENT_query("=",STATUS_GREEN,"=",STATUS_BLUE,$groupname,"=",STATUS_DEFINE, $searchLine);
			break;
		}
			
		case "deinstall":
		{
			$title = $I18N_deinstall_packages;
			if (!empty($searchLine))
				$results = CLIENT_query("=",STATUS_GREEN,"","",$groupname,"","", $searchLine);
			break;
		}

		case "delete":
		{
			$title = $I18N_delete_client;
			if (!empty($searchLine))
				$results = CLIENT_query("","","","",$groupname,"","", $searchLine);
			break;
		}

		case "update":
		{
			$title = $I18N_updateClient;
			if (!empty($searchLine))
				$results = CLIENT_query("=",STATUS_GREEN,"","",$groupname,"","", $searchLine);
			break;
		}

		case "critical":
		{
			$title = $I18N_criticalClients;
			if (!empty($searchLine))
				$results = CLIENT_query("=",STATUS_CRITICAL,"","",$groupname,"","", $searchLine);
			break;
		}

		case "massInstall":
		{
			$title = $I18N_massInstall;
			if (!empty($searchLine))
				$results = CLIENT_query("=",STATUS_DEFINE,"","",$groupname,"","", $searchLine);
			break;
		}

		default:
		{
			$title = $I18N_overview_clients;
			if (!empty($searchLine))
				$results = CLIENT_query("","","","",$groupname,"","", $searchLine);
		}
	}
	// Page selection end
	
	
	if (!empty($groupname))
		$groupTitle = " ($I18N_group $groupname)";
	else
		$groupTitle = '';

	//write page header
	echo("<span class=\"title\">$title$groupTitle</span><br><br>");

	//1st search line
	$searchFilter = new CSearchFilter();
	$searchFilter->showSearchFilterDialog();
	if (empty($searchLine))
		$results = $searchFilter->getClientsAsMySQLResult();
	CLIENT_showOverviewSearchDialog('ED_search1',true);

	HTML_showTableHeader(true);

	echo("
	<tr>
    <td></td>
	<td align=\"center\">
		<span class=\"subhighlight\">$I18N_status<br>
			<a href=\"index.php?page=clientsoverview&orderBy=status&direction=asc&action=$action&searchLine=$searchLine\"><img src=\"/gfx/upArrow.png\" border=0></a>
			<a href=\"index.php?page=clientsoverview&orderBy=status&direction=desc&action=$action&searchLine=$searchLine\"><img src=\"/gfx/downArrow.png\" border=0></a>
		</span>
	</td>
	<td align=\"center\">
		<span class=\"subhighlight\">$I18N_client_name<br>
			<a href=\"index.php?page=clientsoverview&orderBy=name&direction=asc&action=$action&searchLine=$searchLine\"><img src=\"/gfx/upArrow.png\" border=0></a>
			<a href=\"index.php?page=clientsoverview&orderBy=name&direction=desc&action=$action\&searchLine=$searchLine\"><img src=\"/gfx/downArrow.png\" border=0></a>
		</span>
	</td>
	");

	if ($clientOnlineStatusColumn)
		echo("<td align=\"center\"><span class=\"subhighlight\">$I18N_onlineStatus</span></td>");

	echo("
	<!-- m23customPatchBegin type=change id=additionalColumnHeadings-->
	<!-- m23customPatchEnd id=additionalColumnHeadings-->
	<td align=\"center\"><span class=\"subhighlight\">$I18N_group<br>
			<a href=\"index.php?page=clientsoverview&orderBy=group&direction=asc&action=$action&searchLine=\"><img src=\"/gfx/upArrow.png\" border=0></a>
			<a href=\"index.php?page=clientsoverview&orderBy=group&direction=desc&action=$action\&searchLine=\"><img src=\"/gfx/downArrow.png\" border=0></a></span></td>
	<td></td>
	<td align=\"center\"><span class=\"subhighlight\">$I18N_packages</span></td>
	<td align=\"center\"><span class=\"subhighlight\">$I18N_jobs</span></td>
	");
	
	if ($clientShowClientIPColumn)
		echo("<td align=\"center\"><span class=\"subhighlight\">IP</span></td>");
	if ($clientShowClientMACColumn)
		echo("<td align=\"center\"><span class=\"subhighlight\">MAC</span></td>");

	echo("
	<td align=\"center\">
		<span class=\"subhighlight\">$I18N_install_date<br>
			<a href=\"index.php?page=clientsoverview&orderBy=installdate&direction=asc&action=$action&searchLine=$searchLine\"><img src=\"/gfx/upArrow.png\" border=0></a>
			<a href=\"index.php?page=clientsoverview&orderBy=installdate&direction=desc&action=$action&searchLine=$searchLine\"><img src=\"/gfx/downArrow.png\" border=0></a>
		</span>
	</td>
	<td align=\"center\">
		<span class=\"subhighlight\">$I18N_last_change<br>
			<a href=\"index.php?page=clientsoverview&orderBy=lastchange&direction=asc&action=$action&searchLine=$searchLine\"><img src=\"/gfx/upArrow.png\" border=0></a>
			<a href=\"index.php?page=clientsoverview&orderBy=lastchange&direction=desc&action=$action&searchLine=$searchLine\"><img src=\"/gfx/downArrow.png\" border=0></a>
		</span>
	</td>");

	if ($clientLastUpgradeColumn)
		echo("<td align=\"center\"><span class=\"subhighlight\">$I18N_lastUpgrade</span></td>");

	echo("
	<td></td>
     </tr>");

	//line counter
	$lineNr=0;

	if($results)
	{
		while( $data = mysqli_fetch_array($results) ) //Schleife mit Client-Daten
		{
			/* LINK f�r Action setzen */
			switch ($action)
			{
				case "setup":
					$link = "<a href=\"index.php?page=fdisk&id=$data[id]&client=$data[client]&clearSession=1\">$I18N_setup</a>"; break;
					
				case "install":
					$link = "<a href=\"index.php?page=installpackages&client=$data[client]&id=$data[id]\">$I18N_install</a>"; break;
	
				case "deinstall":
					$link = "<a href=\"index.php?page=installpackages&client=$data[client]&id=$data[id]&key=asdfghjkldfgrf&action=deinstall\">$I18N_deinstall</a>"; break;
					
				case "update":
					$link = "<a href=\"index.php?page=installpackages&client=$data[client]&id=$data[id]&action=update\">$I18N_update</a>"; break;
					
				case "delete":
					$link = "<a href=\"index.php?page=deleteclient&id=$data[id]&client=$data[client]\">$I18N_delete</a>"; break;
					
				case "critical":
					$link = "<a href=\"index.php?page=clientdetails&client=$data[client]&id=$data[id]#criticalStatus\">$I18N_repair</a>"; break;
					
				case "massInstall":
					$link = "<a href=\"index.php?page=massInstall&client=$data[client]&id=$data[id]\">$I18N_massInstall</a>"; break;	
					
				default:
					$link = "<a href=\"index.php?page=clientdetails&client=$data[client]&id=$data[id]\">$I18N_controlCenter</a>";
			};

			//m23customPatchBegin type=change id=packageCountingByDB_Trigger
			/* Anzahl der installierten Pakete f�r Client z�hlen*/
			$counted_clientpackages = PKG_countPackages($data['client']);
// 			$counted_clientpackages = $data['trg_sum_clientpackages'];
			//m23customPatchEnd id=packageCountingByDB_Trigger

			/* Anzahl der anstehenden Jobs f�r Client z�hlen*/
			$counted_waitingClientjobs = PKG_countJobs($data['client'],'waiting');
			$counted_clientjobs = PKG_countJobs($data['client'],'');
			
			$htmlStatus = CLIENT_generateHTMLStatusBar($data['client'], $data['id'], $data['status'], $data['vmRole'], $data['vmSoftware']);
			$htmlStatus .= CLIENT_generateHTMLDelayStatus($data['client'], $data['id'], $clientUpdateJobsMaxAllowedDelay, $clientRebootMaxAllowedDelay);
			
			
	
			/* Unix Datum in Lesbares Datum umwandeln */
			$installdate = date($DATE_TIME_FORMAT, $data['installdate']);
			$lastmodify = date($DATE_TIME_FORMAT, $data['lastmodify']);
			
			if (($lineNr%2) == 1)
				$class=' class="oddrow"';
			else
				$class=' class="evenrow"';
	
			/* Spalte f�r Client ausgeben */
			echo("
			<tr$class>
				<td>".($lineNr+1)."</td>
				<td align=\"left\">$htmlStatus</td>
				<td><a href=\"index.php?page=clientdetails&client=".$data['client']."&id=".$data['id']."\">$data[client] ($data[id])</a></td>
			");
	
			if ($clientOnlineStatusColumn)
			{
				$dr_state = CLIENT_generateHTMLDedicatedAndReachableStatus($data['online']);
				echo("<td align=\"left\">$dr_state[html]</td>");
			}
			
	//m23customPatchBegin type=change id=additionalColumnsDisplayCode
	//m23customPatchEnd id=additionalColumnsDisplayCode

			echo("
				<td>");

					GRP_showClientGroups($data['client'],true);

					if (isset($_POST["CB_do$lineNr"]) && !$checkOff)
						$checked="checked";
					else
						$checked="";

			echo("
				</td>
				<td> <INPUT type=\"checkbox\" name=\"CB_do$lineNr\" value=\"$data[client]\" $checked> </td>
				<td> <a href=\"index.php?page=clientpackages&id=$data[id]&client=$data[client]\">$counted_clientpackages</a></td>
				<td> <a href=\"index.php?page=changeJobs&id=$data[id]&client=$data[client]\">$counted_waitingClientjobs/$counted_clientjobs</a> </td>
");
				
			if ($clientShowClientIPColumn)
				echo("<td align=\"left\">$data[ip]</td>");
			if ($clientShowClientMACColumn)
				echo("<td align=\"left\">$data[mac]</td>");

			echo("
				<td> $installdate </td>
				<td nowrap> $lastmodify </td>");

			if ($clientLastUpgradeColumn)
			{
				$lastUpgradeTime = PKG_getLastUpgradeTime($data['client']);
				$lastUpgradeTimeS = is_null($lastUpgradeTime)? 'x' : date($DATE_TIME_FORMAT, $lastUpgradeTime);
				echo("<td nowrap> $lastUpgradeTimeS </td>");
			}

			echo("
				<td> $link </td>
			</tr>");
			$lineNr++;
		}
	}

	HTML_showTableEnd(true);
	HTML_showTableHeader(true);

	HTML_showTableRow("<span class=\"subhighlight\">$I18N_action</span>", "<span class=\"subhighlight\">$I18N_group</span>", "");
	HTML_showTableRow(SEL_type, GRP_groupSelection("SEL_group",$groupname), BUT_do);

	//2nd search line
	CLIENT_showOverviewSearchDialog('ED_search2',false);

	echo("
	<input type=\"hidden\" name=\"clientAmount\" value=\"$lineNr\">
	<input type=\"hidden\" name=\"searchLine\" value=\"$searchLine\">
	<input type=\"hidden\" name=\"action\" value=\"$action\">
	");

	HTML_showTableEnd(true);
	HTML_showFormEnd();

	// select correct help page
	switch ( $action)
	{
		case "delete": $helpPage="clients_delete"; break;
		case "setup": $helpPage="clients_setup"; break;
		case "install": $helpPage="packages_install"; break;
		case "deinstall": $helpPage="packages_deinstall"; break;
		case "rescue": $helpPage="rescue_client"; break;
		default: 
			$helpPage="clients_overview";
	};

	help_showhelp($helpPage);
?>
