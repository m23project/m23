<?PHP
	include('/m23/inc/checks.php');
	include('/m23/inc/db.php');
	include('/m23/inc/fdisk.php');
	include_once('/m23/inc/html.php');
	include('/m23/inc/remotevar.php');
	include('/m23/inc/client.php');
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
	include_once('/m23/inc/imaging.php');
	include_once('/m23/inc/server.php');
	include_once('/m23/inc/raidlvm.php');
	include_once("/m23/inc/halfSister.php");
	include_once('/m23/inc/vm.php');
	if (file_exists('/m23/inc/m23shared/m23shared.php')) include_once('/m23/inc/m23shared/m23shared.php');

	session_start();

	dbConnect();

	$client = CLIENT_getClientName();
	$_SESSION['clientName'] = $client;

	//Set client debug status in a session parameter
	$_SESSION['debug'] = CLIENT_isInDebugMode($client);

	if ($_SESSION['m23Shared_blockAccount'] === true)
		die("echo blocked");

	//get all options
	$options = CLIENT_getAllOptions($client);

	$distr = $options['distr'];

	$sql="SELECT package,id FROM `clientjobs` WHERE client='$client' AND status='waiting' ORDER BY priority, id";
	$result=mysql_query($sql) or die ("work.php: Can't execute SQL statement:".$sql);
	
	if ($result)
	{
		$line = mysql_fetch_row($result);

		$package=$line[0];
		$id=$line[1];

		if (strlen($package)>0)
		{
			$error=false;
			if (UPDATE_running() || (($package == "m23fdiskFormat") && empty($options['release'])))
			{
				echo("sleep 60\n");
				executeNextWork();
			}
			else
			{
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
					CLIENT_setLastmodify(-1,$client);

					if (CLIENT_isAskingInDebugMode())
						MSR_logCommand("work.php");

					run($line[1]);
				}
				else
				{
					sendClientStatus($id,"error");
					executeNextWork();
				};
			};
		}
		else
		{
			//Stop the real-time client logging
			CLIENT_stopLiveScreenRecording($client);
		}
	}
?>
