<?PHP
	session_start();
	$_SESSION['m23Shared'] = false;

	include('/m23/inc/checks.php');
	include('/m23/inc/db.php');
	include('/m23/inc/fdisk.php');
	include_once('/m23/inc/html.php');
	include('/m23/inc/remotevar.php');
	include('/m23/inc/client.php');
	include('/m23/inc/groups.php');
	include('/m23/inc/distr.php');
	include('/m23/inc/sourceslist.php');
	include_once('/m23/inc/messageReceive.php');
	include('/m23/inc/packages.php');
	include_once('/m23/inc/capture.php');
	include_once('/m23/inc/helper.php');
	include_once('/m23/inc/update.php');
	include_once('/m23/inc/edit.php');
	include_once('/m23/inc/dhcp.php');
	include_once('/m23/inc/ldap.php');
	include_once('/m23/inc/assimilate.php');
	include_once('/m23/inc/i18n.php');
//m23customPatchBegin type=change id=fixedLanguage
//m23customPatchEnd id=fixedLanguage
	if (file_exists('/m23/inc/m23shared/m23shared.php'))
		include_once('/m23/inc/m23shared/m23shared.php');
	include_once('/m23/inc/imaging.php');
	include_once('/m23/inc/server.php');
	include_once('/m23/inc/raidlvm.php');
	include_once("/m23/inc/halfSister.php");
	include_once('/m23/inc/vm.php');
	include_once('/m23/inc/bittorrent.php');
	include_once('/m23/inc/CMessageManager.php');
	include_once('/m23/inc/CChecks.php');
	include_once('/m23/inc/CClient.php');
	include_once('/m23/inc/CFDiskIO.php');
	include_once('/m23/inc/CFDiskBasic.php');
	include_once('/m23/inc/CGPGSign.php');
	include_once('/m23/inc/CSystemProxy.php');



	$isInstallReasonEnabled = SERVER_isInstallReasonEnabled();

echo('#!/bin/bash
');

	dbConnect();

	$GLOBALS["m23_language"] = 'en';

	$client = CLIENT_getClientName();
	$_SESSION['clientName'] = $client;

	GRP_runSettingsForClient($client, GRP_SETTING_TYPE_execBeginningOfWorkPHP);

	// Count waiting and finished jobs for the client
	if ($isInstallReasonEnabled)
	{
		$counted_waitingClientjobs = PKG_countJobs($client,'waiting');
		$counted_clientjobs = PKG_countJobs($client,'');
		$counted_finishedClientjobs = $counted_clientjobs - $counted_waitingClientjobs + 1;
	}

	//Set client debug status in a session parameter
	$_SESSION['debug'] = CLIENT_isInDebugMode($client);

	if (isset($_SESSION['m23Shared_blockAccount']) && ($_SESSION['m23Shared_blockAccount'] === true))
		die("echo blocked");

	//get all options
	$options = CLIENT_getAllOptions($client);

	$distr = isset($options['distr']) ? $options['distr'] : '';

	if ($isInstallReasonEnabled)
	    $sql="SELECT package,id,reason FROM `clientjobs` WHERE client='$client' AND status='waiting' ORDER BY priority, id";
	else
	    $sql="SELECT package,id FROM `clientjobs` WHERE client='$client' AND status='waiting' ORDER BY priority, id";

	$result=DB_query($sql) or die ("work.php: Can't execute SQL statement:".$sql);
	
	if ($result)
	{
		// HELPER_logOnClientBASH('/tmp/work.runLog', 'result');

		$line = mysqli_fetch_row($result);

		$package=$line[0];
		$id=$line[1];

		if (strlen($package)>0)
		{
			// HELPER_logOnClientBASH('/tmp/work.runLog', 'package > 0');

			$error=false;
			CLIENT_recalculateStatusBar($client);

			$waitForFinishedUpdate = UPDATE_running();
			$waitForSelectionOfDistribution = (($package == "m23fdiskFormat") && empty($options['release']) && ('halfSister' != $distr));
			
			if (isset($options['release']))
				$waitForFinishedDownloadOfBaseSys = (!PKG_downloadBaseSysTom23Server($options['release'], $options['arch']) && !CLIENT_isAssimilated($client));
			else
				$waitForFinishedDownloadOfBaseSys = false;

//m23customPatchBegin type=change id=waitCases
			if ($waitForFinishedUpdate || $waitForSelectionOfDistribution || $waitForFinishedDownloadOfBaseSys)
//m23customPatchEnd id=waitCases
			{
				// HELPER_logOnClientBASH('/tmp/work.runLog', 'wait');

			
				if ($waitForFinishedUpdate)
					$waitMsg = 'Finishing of the m23 server update';
				elseif ($waitForSelectionOfDistribution)
					$waitMsg = 'Selection of distribution in the m23 webinterface';
				elseif ($waitForFinishedDownloadOfBaseSys)
					$waitMsg = 'Finishing of the download of the distribution base system';
//m23customPatchBegin type=change id=waitMessages
//m23customPatchEnd id=waitMessages

				echo("echo Waiting for:\necho $waitMsg\nsleep 60\n");
				executeNextWork();
				// HELPER_logOnClientBASH('/tmp/work.runLog', 'executeNextWork1');
			}
			else
			{
				// HELPER_logOnClientBASH('/tmp/work.runLog', 'no wait');

				if (file_exists("/m23/inc/distr/$distr/packages/".$package."Install.php"))
					//use distribution specific path
					include("/m23/inc/distr/$distr/packages/".$package."Install.php");
				elseif (file_exists("/m23/data+scripts/packages/".$package."Install.php"))
					//use normal path
					include("/m23/data+scripts/packages/".$package."Install.php");
				elseif (file_exists("/m23/data+scripts/packages/userPackages/".$package."Install.php"))
					//use normal path
					include("/m23/data+scripts/packages/userPackages/".$package."Install.php");
				else
					$error=true;

				if (!$error)
				{
					// HELPER_logOnClientBASH('/tmp/work.runLog', 'no error');
					CLIENT_setLastmodify(-1,$client);

					if (CLIENT_isAskingInDebugMode())
						MSR_logCommand("work.php");

					if ($isInstallReasonEnabled)
					{
						// HELPER_logOnClientBASH('/tmp/work.runLog', 'isInstallReasonEnabled');
						
						$reason=$line[2];

						$ply_msg4user="($counted_finishedClientjobs/$counted_clientjobs) $package";

						$msg4user = $ply_msg4user;

						if (SERVER_isInstallReasonEnabled() && !empty($reason))
							$msg4user .= "\n<b>$I18N_reason:</b>\n$reason";

						//m23customPatchBegin type=change id=companyLogo
						CLIENT_sendPlymouthMessage($ply_msg4user);
						CLIENT_sendNotifySendMessage($msg4user, "/usr/share/icons/ourCompanyLogo.png", false, 0);
						CLIENT_sendM23FetchJobFinishedMessage("Installation finished", "/usr/share/icons/ourCompanyLogo.png", false, 0);
						//m23customPatchEnd id=companyLogo
					}

					// HELPER_logOnClientBASH('/tmp/work.runLog', 'run');

					PKG_updateStartTime($line[1]);

					echo("\nsync\n");

					run($line[1]);

					echo("\nsync\n");
				}
				else
				{
					// HELPER_logOnClientBASH('/tmp/work.runLog', 'error');
					sendClientStatus($id,"error");
					// HELPER_logOnClientBASH('/tmp/work.runLog', 'executeNextWork2');
					executeNextWork();
				}
			}
		}
		else
		{
			// Make sure, the client has installed the base system
			if (PKG_countJobs($client, '') > 2)
			{
				// HELPER_logOnClientBASH('/tmp/work.runLog', 'GRP_runSettingsForClient');
				GRP_runSettingsForClient($client, GRP_SETTING_TYPE_execWhenAllJobsFinished);
			}

			// HELPER_logOnClientBASH('/tmp/work.runLog', 'CLIENT_stopLiveScreenRecording');
			//Stop the real-time client logging
			CLIENT_stopLiveScreenRecording($client);
		}
	}
?>
