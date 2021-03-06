<?
	$client = $_GET['client'];
	$id = $_GET['id'];
	$sure = isset($_GET['sure']) ? $_GET['sure'] : 0;
	$redoJobs = isset($_GET['redoJobs']) ? $_GET['redoJobs'] : 0;
	$backToRed = isset($_GET['backToRed']) ? $_GET['backToRed'] : 0;
	$combineJobs = isset($_GET['combineJobs']) ? $_GET['combineJobs'] : 0;

	define('ACT_NORMAL',1);
	define('ACT_REDO',2);
	define('ACT_BACKTORED',4);
	define('ACT_COMBINEJOBS',8);

	//Get the special action for the page
	$action = ACT_NORMAL;
	$action = ((1 == $redoJobs) ? ACT_REDO : $action);
	$action = ((1 == $backToRed) ? ACT_BACKTORED : $action);
	$action = ((1 == $combineJobs) ? ACT_COMBINEJOBS : $action);

	//Check if all jobs should be executed again, the desaster recovery function should be used or the client should appear as freshly added
	switch ($action)
	{
		case ACT_REDO:
			$titleAction = $I18N_redo_client_jobs;
			$questionPart1 = $I18N_redoClientJobsQuestion1;
			$questionPart2 = $I18N_redoClientJobsQuestion2;
			$helpPage = 'redo_client';
			break;

		case ACT_BACKTORED:
			$titleAction = $I18N_back_to_red;
			$questionPart1 = $I18N_backToRedsQuestion1;
			$questionPart2 = $I18N_backToRedsQuestion2;
			$helpPage = 'back_to_red';
			break;

		case ACT_COMBINEJOBS:
			$titleAction = $I18N_recover_client_combine_jobs;
			$questionPart1 = $I18N_recover_client_combine_jobsQuestion1;
			$questionPart2 = $I18N_recover_client_combine_jobsQuestion2;
			$helpPage = 'recover_client_combine_jobs';
			break;

		default:
			$titleAction = $I18N_recover_client;
			$questionPart1 = $I18N_should_the_client;
			$questionPart2 = $I18N_get_recovered;
			$helpPage = 'clients_recover';
	}

	echo("<span class=\"title\">$client: $titleAction</span><br><br>");

	//Check, if the changes should be done really
	if( $sure == "1" )
	{
		switch ($action)
		{
			case ACT_REDO:
				CLIENT_desasterRecovery($client, false);
				MSG_showInfo("$I18N_client_start_redo_jobs<br><br>$I18N_youCanStartYourm23ClientNow");
				break;

			case ACT_BACKTORED:
				CLIENT_backToRed($client);
				MSG_showInfo("$I18N_back_to_red_started<br><br>$I18N_youCanStartYourm23ClientNow");
				break;

			case ACT_COMBINEJOBS:
				CLIENT_recoverClientCombineJobs($client);
				MSG_showInfo("$I18N_client_start_recover_client_combine_jobs<br><br>$I18N_youCanStartYourm23ClientNow");
				break;

			default:
				CLIENT_desasterRecovery($client);
				PKG_addJob($client,"m23UpdatePackageInfos",PKG_getSpecialPackagePriority("m23UpdatePackageInfos"),"");
				MSG_showInfo("$I18N_client_start_recover<br><br>$I18N_youCanStartYourm23ClientNow");
		}

// 		CLIENT_startInstall($client);	UNNEEDED because CLIENT_backToRed and CLIENT_desasterRecovery 
	}
	else
	{
		CLIENT_showGeneralInfo($id);

		$noURL = CLIENT_getToDetailsURL($client,$id,"criticalStatus");

		HTML_showTableHeader(true);
		echo("
			<tr>
				<td>
					$questionPart1 <span class=\"highlight\">$client</span> $questionPart2
				</td>
			</tr>
			<tr>
				<td align=\"center\">
					<a href=\"?page=recoverclient&id=$id&client=$client&sure=1&redoJobs=$redoJobs&backToRed=$backToRed&combineJobs=$combineJobs\"><img src=\"/gfx/button_ok-mini.png\">$I18N_yes</a> &nbsp; <a href=\"$noURL\"><img src=\"/gfx/button_cancel-mini.png\">$I18N_no<br></a>
				</td>
			</tr>
		");
		HTML_showTableEnd(true);
	}
	
	

	CLIENT_HTMLBackToDetails($client,$id,"criticalStatus");

	help_showhelp($helpPage);
?>