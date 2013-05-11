<?PHP
	HTML_showFormHeader();
	HTML_setPage('clientsoverview');

	$groupname = $_GET['groupname'];
	$action = isset($_GET['action']) ? $_GET['action'] : $_POST['action'];

	//do actions to the clients
	$checkOff=false;

	//Create editlines and get the search term
	$searchLine = CLIENT_getOverviewSearchLine(2);

	//Group and client actions
	$selTypeA['grpDel']		= $I18N_removeFromGroup;
	$selTypeA['grpAdd']		= $I18N_addToGroup;
	$selTypeA['grpMov']		= $I18N_moveToGroup;
	$selTypeA['del']		= $I18N_delete;
	$selTypeA['recover']	= $I18N_recover;
	$groupAction = HTML_selection('SEL_type', $selTypeA, SELTYPE_selection);

	if (HTML_submit('BUT_do',$I18N_accept_changes))
	{
		//Run thru all clinet numbers on the page
		for ($i=0; $i < $_POST['clientAmount']; $i++)
		{
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
						GRP_moveClientToGroup($clientName,$groupname,$_POST['SEL_group']);
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
				};
		}
	};





// Page selection (decide what clients should be shown)
	switch ($action)
		{
			case "setup":
				{
					$title = $I18N_setup_client;
					$results = CLIENT_query("=",STATUS_YELLOW,"","",$groupname,"","", $searchLine);
					break;
				};
				
			case "install":
				{
					$title = $I18N_install_packages;
					$results = CLIENT_query("=",STATUS_GREEN,"=",STATUS_BLUE,$groupname,"=",STATUS_DEFINE, $searchLine);
					break;
				};
				
			case "deinstall":
				{
					$title = $I18N_deinstall_packages;
					$results = CLIENT_query("=",STATUS_GREEN,"","",$groupname,"","", $searchLine);
					break;
				};
				
			case "delete":
				{
					$title = $I18N_delete_client;
					$results = CLIENT_query("","","","",$groupname,"","", $searchLine);
					break;
				};
				
			case "update":
				{
					$title = $I18N_updateClient;
					$results = CLIENT_query("=",STATUS_GREEN,"","",$groupname,"","", $searchLine);
					break;
				};
				
			case "critical":
				{
					$title = $I18N_criticalClients;
					$results = CLIENT_query("=",STATUS_CRITICAL,"","",$groupname,"","", $searchLine);
					break;
				};

			case "massInstall":
				{
					$title = $I18N_massInstall;
					$results = CLIENT_query("=",STATUS_DEFINE,"","",$groupname,"","", $searchLine);
					break;
				};

			default:
				{
					$title = $I18N_overview_clients;
					$results = CLIENT_query("","","","",$groupname,"","", $searchLine);
				};
		};
	// Page selection end
	
	
	if (!empty($groupname))
		$groupTitle=" ($I18N_group $groupname)";

	//write page header
	echo("<span class=\"title\">$title$groupTitle</span><br><br>");

	//1st search line
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
	<td align=\"center\"><span class=\"subhighlight\">$I18N_group</span></td>
	<td></td>
	<td align=\"center\"><span class=\"subhighlight\">$I18N_packages</span></td>
	<td align=\"center\"><span class=\"subhighlight\">$I18N_jobs</span></td>
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
	</td>
	<td></td>
     </tr>");

	//line counter
	$lineNr=0;

	if($results)
	{
	  while( $data = mysql_fetch_array($results) ) //Schleife mit Client-Daten
	   {
		/* LINK für Action setzen */
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
		
		/* Anzahl der installierten Pakete für Client zählen*/
		$counted_clientpackages = PKG_countPackages($data['client']);

		/* Anzahl der anstehenden Jobs für Client zählen*/
		$counted_waitingClientjobs = PKG_countJobs($data['client'],'waiting');
		$counted_clientjobs = PKG_countJobs($data['client'],'');
		 
		$htmlStatus=CLIENT_generateHTMLStatusBar($data['client']);

		/* Unix Datum in Lesbares Datum umwandeln */
		$installdate = date($DATE_TIME_FORMAT, $data['installdate']);
		$lastmodify = date($DATE_TIME_FORMAT, $data['lastmodify']);
		
		if (($lineNr%2) == 1)
			$color=' bgcolor="#A4D9FF" bordercolor="#A4D9FF"';
		else
			$color='';

		/* Spalte für Client ausgeben */
		echo("
		<tr$color>
			<td>".($lineNr+1)."</td>
			<td align=\"left\">$htmlStatus</td>
			<td><a href=\"index.php?page=clientdetails&client=".$data['client']."&id=".$data['id']."\">$data[client]</a></td>
			<td>");

				GRP_showClientGroups($data['client'],true);

				if (isset($_POST["CB_do$lineNr"]) && !$checkOff)
					$checked="checked";
				else
					$checked="";

		echo("
			</td>
			<td> <INPUT type=\"checkbox\" name=\"CB_do$lineNr\" value=\"$data[client]\" $checked> </td>
			<td> <a href=\"index.php?page=clientpackages&id=$data[id]&client=$data[client]\">$counted_clientpackages</a> </td>
			<td> <a href=\"index.php?page=changeJobs&id=$data[id]&client=$data[client]\">$counted_waitingClientjobs/$counted_clientjobs</a> </td>
			<td> $installdate </td>
			<td nowrap> $lastmodify </td>
			<td> $link </td>
		</tr>");
		$lineNr++;
	   }
	}
	
	HTML_showTableEnd(true);
	HTML_showTableHeader(true);

	HTML_showTableRow("<span class=\"subhighlight\">$I18N_action</span>", "<span class=\"subhighlight\">$I18N_group</span>", "");
	HTML_showTableRow(SEL_type, GRP_groupSelection("SEL_group",$groupName), BUT_do);

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