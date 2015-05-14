#!/usr/bin/php
<?php

	include('/m23/inc/checks.php');
	include('/m23/inc/db.php');
	include('/m23/inc/fdisk.php');
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
	include_once('/m23/inc/server.php');
	include_once('/m23/inc/raidlvm.php');
	include_once("/m23/inc/halfSister.php");
	include_once('/m23/inc/vm.php');
	include_once('/m23/inc/groups.php');
	include_once('/m23/inc/bittorrent.php');

	dbConnect();






/**
**name HelpAndDie()
**description Shows the help screen and exits.
**/
	function HelpAndDie()
	{
		global $argv;
		die("Usage: $argv[0] <start/stop/restart/status/autostart/create>\n
    start: Starts the Bittorrent tracker and initial client
    stop: Stops the Bittorrent tracker and initial client
    restart: Restarts the Bittorrent tracker and initial client
    status: Gives status information.
    autostart: Starts the Bittorrent tracker and initial client, if there are
               .torrent files in \"".BT_DIR."\"
    create <Filename>: Creates a torrent file for an existing file under
               /m23/data+scripts/extraDebs/.\n\n");
	}





	if (isset($argv[1]))
	{
		BT_checkSoftware();
	
		switch ($argv[1])
		{
			case 'start':
				BT_startTracker();
				BT_startClient();
				break;

			case 'restart':
				BT_restartTracker();
				BT_restartClient();
				break;

			case 'stop':
				BT_stopTracker();
				BT_stopClient();
				break;
				
			case 'create':
				if (!isset($argv[2]))
					HelpAndDie();
				BT_createTorrent($argv[2]);
				break;

			case 'status':
				BT_status();
				break;

			case 'autostart':
				BT_autostart();
				break;

			default:
				HelpAndDie();
		}
	}
	else
		HelpAndDie();
?>