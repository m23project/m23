<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Funtions for distributing files via BitTorrent.
$*/

	define('BT_TRACKER_JOB', 'BTTracker');
	define('BT_CLIENT_JOB', 'BTClient');
	define('BT_USER', HELPER_getApacheUser());
	define('BT_DIR', '/m23/data+scripts/extraDebs/');
	define('BT_WHITELIST', '/m23/tmp/opentracker.whitelist');





/**
**name BT_dlFile()
**description Starts a Bittorrent download.
**parameter torrentFile: Name of the torrent file under BT_DIR.
**parameter dest: Path on the client where to 
**returns: true, when the torrent file is present otherwise false.
**/
	function BT_dlFile($torrentFile, $dest)
	{
		// Check, if the torrent file exists
		if (!file_exists(BT_DIR.$torrentFile))
			return(false);

		$torrentURL = "http://".getServerIP()."/extraDebs/$torrentFile";
		$scriptFile = "/tmp/$torrentFile.sh";
		$logFile = "/tmp/$torrentFile.log";

		// Make sure, aria2c is installed
		CLCFG_aptGet('install', 'aria2');
	
	echo('
#Write a script file for downloading and sharing a torrent
echo "#!/bin/bash
mkdir -p \"'.$dest.'\"
aria2c --disable-ipv6=true --allow-overwrite --max-connection-per-server=3 -d \"'.$dest.'\" \"'.$torrentURL.'\" --seed-time=999999 --seed-ratio=999999.0" > "'.$scriptFile.'"
chmod +x "'.$scriptFile.'"

# Run it in background
chmod 775 /var/run/screen
screen -dmS "'.$torrentFile.'" "'.$scriptFile.'"

# Check, if the download is finished
while `true`
do
	# Make a "hardcopy" of the screen where the Bittorrent client is executed to the logfile
	screen -S "'.$torrentFile.'" -X hardcopy "'.$logFile.'"

	# Check, if the download is finished
	if [ $(grep -c "SEED" "'.$logFile.'") -gt 0 ]
	then
		break
	fi

	sleep 2
done
	');
	
		return(true);
	}





/**
**name BT_status()
**description Shows status information about the (maybe) running Bittorrent tracker and initial client.
**parameter return: If set to true, the result will be returned otherwise shown.
**parameter nl2br: If set to true, the ASCII line breaks will be converted to HTML line breaks.
**returns: Status information, if $return == true.
**/
	function BT_status($return = false, $nl2br = false)
	{
		$ret = 'Bittorrent tracker: ';
		if (SERVER_runningInBackground(BT_TRACKER_JOB))
			$ret .= "\n\t[+] screen session: running";
		else
			$ret .= "\n\t[-] screen session: nonexisting";

		if (SERVER_runInBackground("RunCheck".uniqid(), 'ps -A | grep opentracker -c', BT_USER, false) > 0)
			$ret .= "\n\t[+] opentracker process: running";
		else
			$ret .= "\n\t[-] opentracker process: nonexisting";

		if (SERVER_runInBackground("RunCheck".uniqid(), 'netstat -n -a | grep ":6969" | grep LISTEN -c', BT_USER, false) > 0)
			$ret .= "\n\t[+] opentracker port 6969: listening for connections";
		else
			$ret .= "\n\t[-] opentracker port 6969: nonexisting";



		$ret .= "\n\nBittorrent initial client: ";
		if (SERVER_runningInBackground(BT_CLIENT_JOB))
			$ret .= "\n\t[+] screen session: running";
		else
			$ret .= "\n\t[-] screen session: nonexisting";
		if (SERVER_runInBackground("RunCheck".uniqid(), 'ps -A | grep aria2c -c', BT_USER, false) > 0)
			$ret .= "\n\t[+] aria2c process: running";
		else
			$ret .= "\n\t[-] aria2c process: nonexisting";
		$ret .= "\n";

		if ($nl2br)
			$ret = nl2br($ret);

		if ($return)
			return($ret);
		else
			echo($ret);
	}





/**
**name BT_checkSoftware()
**description Checks, if a Bittorrent software (client + tracker) is installed.
**parameter user: user the command should be run under.
**returns: true when the command is available otherwise false.
**/
	function BT_checkSoftware()
	{
		$sw = array('bttrack', 'btmakemetafile', 'btshowmetainfo', 'opentracker', 'aria2c');

		// Check, if all needed commands are available
		$ok = true;
		foreach ($sw as $cmd)
			$ok = ($ok && SERVER_commandAvailable($cmd, BT_USER));

		// If not, try to install the package, that should contain the commands
		if (!$ok)
		{
			$ok = true;

			// Install it
			SERVER_installTool('opentracker-installer');

			// Re-check
			foreach ($sw as $cmd)
				$ok = ($ok && SERVER_commandAvailable($cmd));
		}

		return($ok);
	}





/**
**name BT_stopService($job)
**description Stops a Bittorrent service.
**parameter job: Name of the job.
**returns: true, when the service could be stoped otherwise false.
**/
	function BT_stopService($job)
	{
		if (SERVER_runningInBackground($job))
		{
			SERVER_killBackgroundJob($job, BT_USER);
			sleep(2);
			return(true);
		}
		else
			return(false);
	}





/**
**name BT_startService($job, $cmds)
**description Starts a Bittorrent service.
**parameter job: Name of the job.
**parameter cmds: BASH commands to execute.
**returns: true, when the service could did not run before otherwise false.
**/
	function BT_startService($job, $cmds)
	{
		if (!SERVER_runningInBackground($job))
		{
			SERVER_runInBackground($job, $cmds, BT_USER);
			sleep(2);
			return(true);
		}
		else
			return(false);
	}





/**
**name BT_stopTracker()
**description Stops the Bittorrent tracker.
**/
	function BT_stopTracker()
	{
		SERVER_runInBackground(BT_TRACKER_JOB.'kill', 'killall -9 opentracker', BT_USER, false);
		return(BT_stopService(BT_TRACKER_JOB));
	}





/**
**name BT_startTracker()
**description Starts the tracker.
**/
	function BT_startTracker()
	{
		$cmds = 'opentracker -p 6969 -P 6970 -w "'.BT_WHITELIST.'"';
		BT_startService(BT_TRACKER_JOB, $cmds);
	}





/**
**name BT_restartTracker()
**description Restarts the tracker.
**/
	function BT_restartTracker()
	{
		if (!BT_stopTracker())
			BT_startTracker();
	}





/**
**name BT_autostart()
**description Starts Bittorrent tracker and initial client when there are .torrent files in the share directory or stops when there are none.
**/
	function BT_autostart()
	{
		// Check, if there is one .torrent file in the share directory
		$found = false;
		$files = scandir(BT_DIR);
		foreach ($files as $file)
			if (preg_match('/\.torrent$/', $file) === 1)
			{
				$found = true;
				break;
			}
			
		if ($found)
		{
			BT_updateWhitelist();
			BT_startTracker();
			BT_startClient();
		}
		else
		{
			BT_stopClient();
			BT_stopTracker();
		}
	}





/**
**name BT_updateWhitelist()
**description Updates the white list with all allowed torrent files on the tracker.
**/
	function BT_updateWhitelist()
	{
		$cmds = "cd ".BT_DIR."
		btshowmetainfo *.torrent | grep hash | sed 's/.*\: //' > '".BT_WHITELIST."'
		";

		SERVER_runInBackground("BT_UpdateWhitelist", $cmds, BT_USER, false);
	}





/**
**name BT_createTorrent($fileToShare)
**description Creates a torrent file and adds it to the white list.
**parameter fileToShare: The file (in the Bittorrent share directory) to create a torrent file for.
**returns: true, when the torrent file was created successfully otherwise false.
**/
	function BT_createTorrent($fileToShare)
	{
		// Make sure the given file only contains a file name without path
		$fileToShare = basename($fileToShare);
		

		// Check, if the given file exists in the Bittorrent share directory
		if (file_exists(BT_DIR.$fileToShare))
		{
			// Filename for the torrent
			$tor = "$fileToShare.torrent";
			$srv = getServerIP();

			// Create a torrent and add it to the white list
			$cmds = "cd ".BT_DIR."
			rm '$tor'
			btmakemetafile.bittorrent '$fileToShare' 'http://$srv:6969/announce'
			chmod 755 '$fileToShare' '$tor'";

			SERVER_runInBackground("BT_CreateTorrent$fileToShare", $cmds, BT_USER, false);

			BT_updateWhitelist();

			if (file_exists($tor))
				return(true);
			else
				return(false);
		}
		else
			return(false);
	}





/**
**name BT_startClient()
**description Starts the Bittorrent client.
**/
	function BT_startClient()
	{
		$cmds = 'cd "'.BT_DIR.'"; aria2c --check-integrity=false --bt-seed-unverified=true --lowest-speed-limit=1024 --disable-ipv6=true --max-connection-per-server=3 -d . *.torrent --seed-time=999999 --seed-ratio=999999.0';

		BT_startService(BT_CLIENT_JOB, $cmds);
	}





/**
**name BT_stopClient()
**description Stops the Bittorrent client.
**/
	function BT_stopClient()
	{
		SERVER_runInBackground(BT_CLIENT_JOB.'kill', 'killall -9 aria2c', BT_USER, false);
		return(BT_stopService(BT_CLIENT_JOB));
	}





/**
**name BT_restartClient()
**description Restarts the client.
**/
	function BT_restartClient()
	{
		if (!BT_stopClient())
			BT_startClient();
	}
?>