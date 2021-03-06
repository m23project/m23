<?PHP

/*$mdocInfo
 Author: Daniel Kasten (DKasten@pc-kiel.de), Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: a lot of routines for client handling. routines for: install and deinstall packages on clients, get information about a special client, list all clients,...
$*/



define("CLIENT_ADD_TYPE_add",0);
define("CLIENT_ADD_TYPE_define",1);
define("CLIENT_ADD_TYPE_assimilate",2);



define('CLIENTLOG_OK', 'ok');
define('CLIENTLOG_FAILURE', 'failure');
define('CLIENTLOG_UNKNOWN', 'unknown');



//m23customPatchBegin type=change id=additionalClientFunctions
//m23customPatchEnd id=additionalClientFunctions


/**
**name CLIENT_removeOldReportings()
**description Removes entries from the `clientreporting` table that are too old.
**/
function CLIENT_removeOldReportings()
{
	// Store the reports of 10 * 24h when creating a reporting every 5 minutes (24 * 60 / 5 = 288)
	$maxReportings = 2880;

	// Array for the timestamps
	$times = array();
	$i = 0;

	// Read the distinct timestamps of the reportings
	$sql = "SELECT DISTINCT `reportCreationTime` FROM `clientreporting` ORDER BY reportCreationTime ASC";
	$res = db_query($sql);
	while ($clientLine = mysqli_fetch_row($res))
		$times[$i++] = $clientLine[0];

	// Check, if there are too many reportings and delete the oldest until the limit is reached
	$reportingsAmount = count($times);
	if ($reportingsAmount > $maxReportings)
		for ($i = 0; $i < ($reportingsAmount - $maxReportings); $i++)
		{
			$sql = "DELETE FROM `clientreporting` WHERE reportCreationTime = '$times[$i]'";
			db_query($sql);
		}
}





/**
**name CLIENT_updateReporting()
**description Stores clientname, amount of packages on the client, online status (0 = offline, 1 = pingable, 2 = SSH/HTTPs working), reboot status (0 = no reboot needed, 1 = reboot needed, but unfinished, 2 = reboot needed, but unfinished and delayed), update status (0 = no update job assigned, 1 = update job assigned, but unfinished, 2 = update job assigned, but unfinished and delayed) and the timestamp of the last finished update job into the table `clientreporting`.
**/
function CLIENT_updateReporting()
{
	$clientUpdateJobsMaxAllowedDelay = SERVER_getWarnWhenUpdateJobsAreDelayed();
	$clientRebootMaxAllowedDelay = SERVER_getWarnWhenClientRebootsRequestedByPackagesAreDelayed();
	$reportCreationTime = time();

	// Run through the clients table
	$res = CLIENT_getAllAsRes();
	while ($clientLine = mysqli_fetch_assoc($res))
	{
		$clientName = $clientLine['client'];

		$onlinestatus = $clientLine['online'];

		// Are there waiting update jobs?
		if (PKG_countSpecialPackages($clientName, 'm23update', 'waiting'))
		{
			// Is a maximum tolerable delay for update jobs set and is it exceeded?
			if (($clientUpdateJobsMaxAllowedDelay > 0) && (PKG_getDelayedJobsAmount($clientName, $clientUpdateJobsMaxAllowedDelay * 60, 'waiting', 'm23update') > 0))
				// Maximum set and exceeded
				$updatestatus = 2;
			else
				// No maximum set or not exceeded
				$updatestatus = 1;
		}
		else
			// No waiting update jobs
			$updatestatus = 0;

		$packageamount = PKG_countPackages($clientName);

		// Is there a waiting reboot?
		if ($clientLine['rebootAfterJobsStarted'] > 0)
		{
			// Is a maximum tolerable delay for reboots set and is it exceeded?
			if (($clientRebootMaxAllowedDelay) && (CLIENT_isRebootDelayed($clientName, $clientRebootMaxAllowedDelay * 60) > 0))
				// Reboot waiting and delayed
				$rebootstatus = 2;
			else
				// Reboot waiting and not exceeding the maximum tolerable delay
				$rebootstatus = 1;
		}
		else
			// No waiting reboot
			$rebootstatus = 0;

		$lastupdate = PKG_getLastUpgradeTime($clientName);

		// Store the information for the current client
		$sql = "INSERT INTO `clientreporting` (`reportCreationTime`, `client`, `packageamount`, `onlinestatus`, `rebootstatus`, `updatestatus`, `lastupdate`) VALUES ('$reportCreationTime', '$clientName', '$packageamount', '$onlinestatus', '$rebootstatus', '$updatestatus', '$lastupdate');";
		
		db_query($sql);

// 		print("client: $clientName, packageamount: $packageamount, onlinestatus: $onlinestatus, rebootstatus: $rebootstatus, updatestatus: $updatestatus, lastupdate: $lastupdate</br>");
	}

	// Remove (maybe existing) old reportings that are too many
	CLIENT_removeOldReportings();
}





/**
**name CLIENT_getDelayedRebootsSQL($clientName, $maxAllowedDelay)
**description Prepares an SQL statement to get clients with delayed reboots or the delay status of a given client.
**parameter clientName: Name of the client or false, if all clients that are delayed, should be found.
**parameter maxAllowedDelay: The maximum tolerable amount of time since requesting the reboot. Only clients that exceed the limit are added to the array.
**return SQL statement to get information about delayed reboot request of a client or a list of clients with delayed reboot requests.
**/
function CLIENT_getDelayedRebootsSQL($clientName, $maxAllowedDelay)
{
	$maxAllowedDelay = (int) $maxAllowedDelay;
	$currentTime = time();
	$packageSQL = $statusSQL = '';

	if ($clientName === false)
	{
		$what = 'client';
		$clientWhereSQL = '';
	}
	else
	{
		CHECK_FW(CC_client, $clientName);
		$clientWhereSQL = "`client` = '$clientName' AND";
		$what = "COUNT(*)";
	}

	return("SELECT $what FROM `clients` WHERE $clientWhereSQL ((`rebootAfterJobsStarted` > 0) AND (($currentTime - `rebootAfterJobsStarted`) > $maxAllowedDelay))");
}





/**
**name CLIENT_getClientsWithDelayedReboots($clientName, $maxAllowedDelay)
**description Gets clients with delayed reboots.
**parameter clientName: Name of the client.
**parameter maxAllowedDelay: The maximum tolerable amount of time since adding the job. Only jobs that exceed the limit are added to the array.
**return Array containing clients with delayed reboots.
**/
function CLIENT_getClientsWithDelayedReboots($maxAllowedDelay)
{
	$i = 0;
	$out = array();

	$sql = CLIENT_getDelayedRebootsSQL(false, $maxAllowedDelay);

	$res = DB_query($sql);

	while($data = mysqli_fetch_row($res))
		$out[ $i++ ] = $data[0];

	return($out);
}





/**
**name CLIENT_isRebootDelayed($clientName, $maxAllowedDelay)
**description Checks, if a client has a delayed reboot request.
**parameter clientName: Name of the client.
**parameter maxAllowedDelay: The maximum tolerable amount of time since adding the job. Only jobs that exceed the limit are added to the array.
**return Amount of delayed reboot requests of a client.
**/
function CLIENT_isRebootDelayed($clientName, $maxAllowedDelay)
{
	$sql = CLIENT_getDelayedRebootsSQL($clientName, $maxAllowedDelay);
// 	print("<h4>$sql</h4>");

	$res = DB_query($sql); //FW ok

	$data = mysqli_fetch_row($res);

	return($data[0] > 0);
}





/**
**name CLIENT_fetchBASHScriptFromServerAndRun($serverIP = '$1', $script = 'work.php', $afterExport = '')
**description Generates BASH code to fetch the script from the m23 server and execute it.
**parameter serverIP: IP, name, BASH variable name of the server, or NULL to get the server IP by getServerIP().
**parameter script: Name of the PHP script under /m23/data+scripts/
**parameter afterExport: BASH code to insert after the export line.
**returns: BASH code to fetch the script from the m23 server and execute it
**/
function CLIENT_fetchBASHScriptFromServerAndRun($serverIP = '$1', $script = 'work.php', $afterExport = '')
{
	if (is_null($serverIP)) $serverIP = getServerIP();

return("
export PATH=/sbin:/usr/sbin:/usr/local/sbin:/bin:/usr/bin:/usr/local/bin

$afterExport

ret=1
while [ \$ret -ne 0 ]
do
	ping -c1 -q -n -w1 $serverIP
	ret=\$?
	sleep 2
done

cd /tmp
rm $script* 2> /dev/null

#Add the client ID if it is available
id=`cat /m23clientID 2> /dev/null`
if [ \$id ]
then
	idvar=\"?m23clientID=\$id\"
fi

wget -t2 -w5 https://$serverIP/$script\$idvar -O $script
chmod +x $script
./$script");
}





/**
**name CLIENT_getClientIPArray()
**description Generates an associative array with the client names as keys and their IPs as values.
**returns: Associative array with the client names as keys and their IPs as values.
**/
function CLIENT_getClientIPArray()
{
	$clients = array();

	// Get information about all clients
	$res = CLIENT_getAllAsRes();
	while ($clientLine = mysqli_fetch_assoc($res))
	{
		// Add the client only if it has a valid IP
		if (CHECK_ip($clientLine['ip']))
			$clients[$clientLine['client']] = $clientLine['ip'];
	}

	return($clients);
}





/**
**name CLIENT_rebootClientAfterJobsIfNecessary()
**description Reboots the client, if a reboot is necessary and the global server side option "m23ServerRebootClientAfterJobsIfNecessary" is set.
**/
// function CLIENT_rebootClientAfterJobsIfNecessary()
// {
// 	if (SERVER_isRebootClientAfterJobsIfNecessary())
// 		CLIENT_rebootClientAfterJobsIfNecessaryBASH();
// }





/**
**name CLIENT_unsetTimeStampForRebootingClientIfNOTNecessaryBASH()
**description Shows BASH code that detects, if a reboot is necessary and disables the server side check, if it's not.
**/
function CLIENT_unsetTimeStampForRebootingClientIfNOTNecessaryBASH()
{
	echo('
	#IgnoreCountRebootRequired1Begin
		if [ $(find /var/run/reboot-required* -maxdepth 0 -mindepth 0 -type f 2> /dev/null | wc -l) -eq 0 ]
		then
			'.MSR_unsetTimeStampForRebootingClientIfNOTNecessaryCMD().'
		fi
	#IgnoreCountRebootRequired1End
	');
}





/**
**name CLIENT_rebootClientAfterJobsIfNecessaryBASH()
**description Shows BASH code for rebooting the client, if a reboot is necessary.
**/
function CLIENT_rebootClientAfterJobsIfNecessaryBASH()
{
	echo('
		#IgnoreCountRebootRequired2Begin
		if [ $(find /var/run/reboot-required* -maxdepth 0 -mindepth 0 -type f 2> /dev/null | wc -l) -gt 0 ]
		then
			'.MSR_setTimeStampForRebootClientAfterJobsIsNecessaryCMD().'

			reboot > /dev/null 2>&1

			sleep 10

			reboot -f > /dev/null 2>&1
		fi
		#IgnoreCountRebootRequired2End
	');
}





/**
**name CLIENT_insertIntoClientlogs($clientName, $text, $status)
**description Adds an entry into the client's status log
**parameter clientName: Name of the client.
**parameter text: Status text
**parameter status: One of CLIENTLOG_OK, CLIENTLOG_FAILURE or CLIENTLOG_UNKNOWN.
**/
function CLIENT_insertIntoClientlogs($clientName, $text, $status)
{
	CHECK_FW(CC_clientname, $clientName);
	
	$sql="INSERT INTO clientlogs (`client` , `logtime` , `status`) VALUES ( '".$clientName."', '".time()."' , '".CHECK_text2db("$status � $status")."');";

	DB_query($sql); //FW ok
}





/**
**name CLIENT_addClientlogsOk($clientName, $text)
**description Adds an entry into the client's status log with "ok" status.
**parameter clientName: Name of the client.
**parameter text: Status text.
**/
function CLIENT_addClientlogsOk($clientName, $text)
{
	CLIENT_insertIntoClientlogs($clientName, $text, CLIENTLOG_OK);
}





/**
**name CLIENT_addClientlogsFailure($clientName, $text)
**description Adds an entry into the client's status log with "failure" status.
**parameter clientName: Name of the client.
**parameter text: Status text.
**/
function CLIENT_addClientlogsFailure($clientName, $text)
{
	CLIENT_insertIntoClientlogs($clientName, $text, CLIENTLOG_FAILURE);
}





/**
**name CLIENT_addClientlogsUnknown($clientName, $text)
**description Adds an entry into the client's status log with "unknown" status.
**parameter clientName: Name of the client.
**parameter text: Status text.
**/
function CLIENT_addClientlogsUnknown($clientName, $text)
{
	CLIENT_insertIntoClientlogs($clientName, $text, CLIENTLOG_UNKNOWN);
}





/**
**name CLIENT_removeServerCache($client)
**description Removes the client cache on the m23 server.
**parameter client: Name of the client.
**/
function CLIENT_removeServerCache($client)
{
	$client = CHECK_safeFilename($client);
	$dir="/m23/var/cache/clients/$client";
	HELPER_rmRecursive($dir);
}





/**
**name CLIENT_touchLiveLogFile($client)
**description Touches the live log file of a given client and returns the full name of the log file (with directory).
**parameter client: Name of the client.
**returns The full name of the log file (with directory).
**/
function CLIENT_touchLiveLogFile($client)
{
	return(CLIENT_touchLogFile($client, 'm23installLiveLog.log'));
}





/**
**name CLIENT_getNextFreeIp()
**description Get the next free IP address that can be used as m23 client.
**returns Next free IP address.
**/
function CLIENT_getNextFreeIp()
{
	$server = getServerIP();

	//Get minimum and maximum possible IPs
	$minMax = MASS_minMaxIP(getServerNetmask(),$server);
	$oldip = $ip = ip2longSafe($minMax[0]);
	$max = ip2longSafe($minMax[1]);
	$min = ip2longSafe($minMax[0]);

	//Generate an array with IPs that cannot be used
	$i = 0;
	$serverL = $notUse[$i++] = ip2longSafe($server);
	foreach (getDNSServers() as $dns)
		$notUse[$i++] = ip2longSafe($dns);
	$notUse[$i++] = ip2longSafe(getServerGateway());
	//Exclude xxx.yyy.zzz.0 IP
	$notUse[$i++] = $ip - 1;

	//Add locked ranges
	$CIPRanges = new CIPRanges();
	$notUse = array_merge($notUse, $CIPRanges->getAllLockedIPsInt());

	// Add the IPs managed (or known) by UCS
	if (HELPER_isExecutedOnUCS())
		$notUse = array_merge($notUse, UCS_getUsedIPs());

	//Get all used IPs as longs
	$res = DB_query("SELECT INET_ATON( ip ) AS intip FROM clients ORDER BY intip");
	while ($line  = mysqli_fetch_row($res))
	{
		// Skip NULL entries
		if (is_null($line[0])) continue;

		$ip = (float)$line[0];

		//If the difference between the previous used IP and the current IP is bigger than 1, then there is a hole
		if (($ip >= $min) && ($ip <= $max) && (($ip - $oldip) > 1) && (! in_array(($ip - 1),$notUse)) && (! pingIP(long2ip($ip - 1))))
			return(long2ip((int)$ip - 1));

		$notUse[$i++] = $ip;

		$oldip = $ip;
	}

	//If there were no holes in the used IPs, a free IP must be found after the last IP in the database
	for (; (float)$ip < (float)$max; $ip++)
	{
		if (! in_array($ip, $notUse))
			return(long2ip((int)$ip));
	}

	return(false);
}





/**
**name CLIENT_getAllAsRes()
**description Creates and executes an SQL statement for getting all values of all clients.
**parameter order: Name of the field to order the results by.
**returns MySQL resource ID.
**/
function CLIENT_getAllAsRes($order="")
{
	if (isset($order{1}))
		$order = " ORDER BY $order";

	return(DB_query("SELECT * FROM `clients`$order"));
}





/**
**name CLIENT_touchLogFile($client, $base)
**description Touches a log file in the client's directory and returns the full name of the log file (with directory).
**parameter client: Name of the client.
**parameter base: The base name of the log file.
**returns The full name of the log file (with directory).
**/
function CLIENT_touchLogFile($client, $base)
{
	//Generate the directory and log file namens
	$baseDir = "/m23/var/cache/clients";
	$dir = "$baseDir/$client";
	$log = "$dir/$base";

	// FABR: wrapped call to SERVER_multiMkDir() with a check for existence of $dir.
	// Otherwise, we call the function every time client.php is executed.
	if (!file_exists($dir))
	{
		//Create the needed directories and touch the log file.
		SERVER_multiMkDir($dir, '0755');
	}
	
	@touch($log);

	return($log);
}





/**
**name CLIENT_liveLogJobName
**description Generates the job name of the sever's live log job.
**parameter client: Name of the client.
**returns The job name of the sever's live log job.
**/
function CLIENT_liveLogJobName($client)
{
	return("m23installLiveLog$client");
}





/**
**name CLIENT_stopLiveScreenRecording($client)
**description Stops the screen installation session for real-time client logging.
**parameter client: Name of the client.
**/
function CLIENT_stopLiveScreenRecording($client)
{
	//Create the name for the job
	$jobName = CLIENT_liveLogJobName($client);

	SERVER_killBackgroundJob($jobName);
}





/**
**name CLIENT_startLiveScreenRecording($client)
**description Saves a screen installation session to a log file on the server in real-time. The server runs a screen for consecutively connecting the client.
**parameter client: Name of the client.
**/
function CLIENT_startLiveScreenRecording($client)
{
	if (SERVER_isLiveLogDisabled()) return(false);

	$ip = CLIENT_getIPbyName($client);

	//Touch the log file and get its name
	$logFile = CLIENT_touchLogFile($client, "m23installLiveLog.log");

	//Create the name for the job
	$jobName = CLIENT_liveLogJobName($client);

	//Run the loop waiting for connection to screen session via SSH
	if (!SERVER_runningInBackground($jobName))
	{
		$cmds = "
		while `true`
		do
			date +'%F %T' >> $logFile
			ssh -o VerifyHostKeyDNS=no -o PreferredAuthentications=publickey -o PasswordAuthentication=no -o CheckHostIP=no -o BatchMode=yes -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -o ConnectionAttempts=1 -o ConnectTimeout=2 -t -l root $ip TERM='xterm' screen -x m23install &>> $logFile

			# Exit when the SSH connection was closed
			if [ $(tail -5 $logFile | egrep -c \"(Write failed: Connection reset by peer|tcsetattr: Input/output error|screen is terminating)\") -gt 0 ]
			then
				break
			fi

			sleep 5
		done
		";

		SERVER_runInBackground($jobName,$cmds);
	}
}





/**
**name CLIENT_filterLinesFromLiveScreenRecording($in)
**description Filters out unwanted lines from the live log.
**parameter in: Input line to give out or not.
**returns Empty string, if the line should be filtered out or input line.
**/
function CLIENT_filterLinesFromLiveScreenRecording($in)
{
	$filters = array('Warning: Permanently added' , 'There is no screen to be attached matching m23install.', 'tcsetattr: Input/output error', 'Write failed: Connection reset by peer', 'bash: warning: setlocale', 'cannot change locale', "Warning: Permanently", "stdin: is not a tty", "stdin is not a terminal", "mesg: ttyname", 'lost connection', 'Permission denied');

	foreach ($filters as $filter)
		if (false !== strpos ($in, $filter))
			return('');

	return($in);
}





/**
**name CLIENT_getOverviewSearchLine($amount)
**description Checks all client search dialogs and returns the current search term.
**parameter amount: Amount of client search dialogs to check.
**returns The current client search term.
**/
function CLIENT_getOverviewSearchLine($amount)
{
	$searchLine = '';

	if (isset($_SESSION['lastSearchLine']))
		$defaultValue = $searchLine = $_SESSION['lastSearchLine'];
	elseif (isset($_GET['searchLine']))
		$defaultValue = $_GET['searchLine'];
	else
		$defaultValue = false;

	for ($i = 1; $i <= $amount; $i++)
	{
		$temp = HTML_input("ED_search$i", $defaultValue, 50);
		if (HTML_submitCheck("BUT_ED_search$i"))
			$_SESSION['lastSearchLine'] = $searchLine = $temp;
		if (HTML_submitCheck("BUTDEL_ED_search$i"))
			$_SESSION['lastSearchLine'] = $searchLine = '';
	}

	return($searchLine);
}





/**
**name CLIENT_showOverviewSearchDialog($htmlName, $addTable)
**description Shows a client search dialog for the client overview.
**parameter htmlName: Base name for the HTML edit line and the buttons.
**parameter addTable: If set to true, a table structure is build around the dialog.
**/
function CLIENT_showOverviewSearchDialog($htmlName, $addTable)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Define search button
	$but = "BUT_$htmlName";
	HTML_submitDefine($but, $I18N_search);

	//Define search term removal button
	$delBut = "BUTDEL_$htmlName";
	HTML_submitDefine($delBut, $I18N_removeSearchFilter, 'onclick="document.forms[1].'.$htmlName.'.value=\'\';"');

	if ($addTable === true)
		HTML_showTableHeader();

	echo("
	<tr>
		<td colspan=\"2\"> <span class=\"subhighlight\">$I18N_searchLine</span> </td>
		<td> </td>
	</tr>

	<tr>
		<td colspan=\"2\"> ".constant($htmlName)." </td>
		<td>".constant($but)." ".constant($delBut)."</td>
	</tr>
	");

	if ($addTable === true)
		HTML_showTableEnd();
}





/**
**name CLIENT_extraWebAction($action,$client)
**description Executes extra actions from the client details page.
**parameter action: The action to execute.
**parameter client: Name of the client.
**returns True if the action was executed or false otherwise.
**/
function CLIENT_extraWebAction($action,$client)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Return value
	$ret = true;
	switch ($action)
	{
		//Install VM software for the host
		case "install-vmhostsw":
			MSG_showInfo($I18N_VMServerSWwillBeInstalled);
			PKG_addJob($client,"m23VirtualBox",PKG_getSpecialPackagePriority("m23VirtualBox",""),"");
//			PKG_addJob($client,"m23x2goServer",PKG_getSpecialPackagePriority("m23x2goServer"),"");
			CLIENT_startInstall($client);
			break;

		//No action was executed => false
		default:
			$ret = false;
	}

	return($ret);
}





/**
**name CLIENT_getOption($client, $optionName)
**description Returns an option of a client.
**parameter client: Name of the client.
**parameter optionName: Name of the option to ask (e.g. 'distr' for the client's distribution)
**returns Value of the option the client uses.
**/
function CLIENT_getOption($client, $optionName)
{
	$clientOptions = CLIENT_getAllOptions($client);
	return(isset($clientOptions[$optionName]) ? $clientOptions[$optionName] : '');
}





/**
**name CLIENT_getDistribution($client)
**description Returns the distribution of a client.
**parameter client: Name of the client.
**returns Name of the distribution, the client uses.
**/
function CLIENT_getDistribution($client)
{
	return(CLIENT_getOption($client, 'distr'));
}





/**
**name CLIENT_runDebconf($clientName)
**description Generates BASH code to import debconf settings from the DB into the debconf of the client.
**parameter clientName: Name of the client.
**/
function CLIENT_runDebconf($clientName)
{
	$debconf = CLIENT_getDebconfDB($clientName);

	if (isset($debconf{5}))
		echo("
rm /tmp/debconf.update 2> /dev/null
cat >> /tmp/debconf.update << \"debConfEOF\"
$debconf
debConfEOF

	debconf-set-selections /tmp/debconf.update
	rm /tmp/debconf.update 2> /dev/null
");
}





/**
**name CLIENT_copyDebconfDB($clientName, $destClient)
**description Copies all debconf values from one client to another.
**parameter clientName: Name of the source client.
**parameter destClient: Name of the destination client.
**/
function CLIENT_copyDebconfDB($clientName, $destClient)
{
	CHECK_FW(CC_clientname, $clientName, CC_clientname, $destClient);

	$result = DB_query("SELECT * FROM debconf WHERE client = '$clientName'");

	while ($line = mysqli_fetch_array($result))
	{
		DB_query("INSERT INTO debconf (client, package, var, val, type) VALUES ('$destClient', '$line[package]', '$line[var]', '$line[val]', '$line[type]') ON DUPLICATE KEY UPDATE val = '$line[val]'");
	}
}





/**
**name CLIENT_setDebconfDB($clientName, $package, $variablesValues)
**description Sets debconf values for a client and a package.
**parameter clientName: Name of the client.
**parameter package: Name of the package.
**parameter variablesValues[varname][val]: Value for the variable "varname".
**parameter variablesValues[varname][type]: Type of the variable "varname".
**returns debconf for debconf-set-selections.
**/
function CLIENT_setDebconfDB($clientName, $package, $variablesValues)
{
	CHECK_FW(CC_clientname, $clientName, CC_package, $package);

	foreach ($variablesValues as $var => $val)
	{
		CHECK_FW(CC_debconfVarName, $var, CC_debconfVarType, $val['type'], CC_debconfValue, $val['val']);
		DB_query("INSERT INTO debconf (client, package, var, val, type) VALUES ('$clientName', '$package', '$var', '$val[val]', '$val[type]') ON DUPLICATE KEY UPDATE val =  '$val[val]'");
	}
}





/**
**name CLIENT_getDebconfDB($clientName)
**description Generates the debconf output as debconf-set-selections expects it from the DB value.
**parameter clientName: Name of the client.
**returns debconf for debconf-set-selections.
**/
function CLIENT_getDebconfDB($clientName)
{
	CHECK_FW(CC_clientname, $clientName);

	//Set the maximal amount of data that GROUP_CONCAT returns
	DB_query("SET @@group_concat_max_len := @@max_allowed_packet");

	$result = DB_query("SELECT GROUP_CONCAT(package, ' ', var, ' ', type, ' ', val SEPARATOR '\\n') FROM debconf WHERE client = '$clientName'");
	$line = mysqli_fetch_row($result);
	return($line[0]);
}





/**
**name CLIENT_getDebconfDBValue($clientName, $package, $var)
**description Get the debconf value of a variable of a package.
**parameter clientName: Name of the client.
**parameter package: Name of the package.
**parameter var: Name of the variable to ask the value for.
**returns Value of the package variable.
**/
function CLIENT_getDebconfDBValue($clientName, $package, $var)
{
	CHECK_FW(CC_clientname, $clientName, CC_package, $package, CC_debconfVarName, $var);
	$result = DB_query("SELECT val FROM debconf WHERE client = '$clientName' AND package = '$package' AND var = '$var'");
	$line = mysqli_fetch_row($result);
	return($line[0]);
}





/**
**name CLIENT_getAllClientNames()
**description Gets the names of all clients.
**returns Array with the names of all clients.
**/
function CLIENT_getAllClientNames()
{
	$out = array();
	$i = 0;
	$result = DB_query("SELECT client FROM `clients`"); //FW ok
	while ($line = mysqli_fetch_row($result))
		$out[$i++] = $line[0];

	return($out);
}





/**
**name CLIENT_getClientAmount()
**description Gets the amount of all clients.
**returns Amount of all clients.
**/
function CLIENT_getClientAmount()
{
	$result = DB_query("SELECT COUNT( * ) AS cnt FROM `clients`"); //FW ok
	$line = mysqli_fetch_row($result);
	return($line[0]);
}





/**
**name CLIENT_getCurrentMemoryUsage($clientNameOrIP)
**description Gets the amount of free and total memory on a client or localhost.
**parameter clientNameOrIP: The name of the client or localhost or an IP.
**returns Associative array with the free memory in $out['free'] and the total memory in $out['all'] in KB.
**/
function CLIENT_getCurrentMemoryUsage($clientNameOrIP)
{
	$res = CLIENT_executeOnClientOrIP($clientNameOrIP,"m23-getCurrentFreeSpaceInDir","sort /proc/meminfo | egrep \"(MemTotal|MemFree)\" | tr -s [:blank:] | cut -d' ' -f2","root",false);

	//Seperate the output lines
	$lines = explode("\n",$res);

	//Activated for the first run (this is the amount of free memory)
	$first = true;

	//Run thru the lines and filter the lines that contain only a numbers (this are the lines with the free and total memory amount)
	foreach ($lines as $line)
		if (is_numeric($line))
		{
			if ($first)
			{
				//First (free memory) is set, so switch to the total memory amount in the second step
				$first = false;
				$out['free'] = $line;
			}
			else
				$out['all'] = $line;
		}

	return($out);
}





/**
**name CLIENT_getCurrentFreeSpaceInDir($clientNameOrIP, $dir)
**description Get the amount of free space in a given directory on a client or localhost.
**parameter clientNameOrIP: The name of the client or localhost or an IP.
**parameter dir: The directory to check for.
**returns The amount of free space in the directory in 1K blocks.
**/
function CLIENT_getCurrentFreeSpaceInDir($clientNameOrIP, $dir)
{
	//Get the network card information lines reported by ifconfig
	$res = CLIENT_executeOnClientOrIP($clientNameOrIP,"m23-getCurrentFreeSpaceInDir","df \"$dir\" | tr -s [:blank:] | cut -d' ' -f4 | tail -1","root",false);
	
	//Seperate the output lines
	$lines = explode("\n",$res);

	//Run thru the lines and return the first that contains only a number (this should be the line with the free space amount)
	foreach ($lines as $line)
		if (is_numeric($line))
			return($line);
}





/**
**name CLIENT_getClientID()
**description Returnes the ID of the calling client.
**/
function CLIENT_getClientID()
{
	$line = CLIENT_getAskingParams();

	$clientID = $line['id'];
	return($clientID);
}





/**
**name CLIENT_getActiveNetDevices($clientNameOrIP, $skipLoop = true, $skipEQL = true)
**description Checks for active network devices on a client or localhost.
**parameter clientNameOrIP: The name of the client or localhost or an IP.
**parameter skipLoop: Skip loopdevices in the output array, if set to true.
**parameter skipEQL: Skip eqldevices in the output array, if set to true.
**returns Associtative array with active network cards (e.g. Array ( [0] => Array ( [dev] => eth0 [type] => encap:Ethernet [mac] => 00:52:66:23:00:23 ) [1] => Array ( [dev] => venet0 [type] => encap:UNSPEC [mac] => 00-00-00-00-00-00-00-00-00-00-00-00-00-00-00-00 ) )
**/
function CLIENT_getActiveNetDevices($clientNameOrIP, $skipLoop = true, $skipEQL = true)
{
	//Get the network card information lines reported by ifconfig
	$res = CLIENT_executeOnClientOrIP($clientNameOrIP,"m23-getActiveNetDevices",'export LC_ALL=C; ifconfig 2> /dev/null | egrep "[0-9a-f][0-9a-f]:[0-9a-f][0-9a-f]:[0-9a-f][0-9a-f]:[0-9a-f][0-9a-f]:[0-9a-f][0-9a-f]:[0-9a-f][0-9a-f]" | tr -s [:blank:]',"root",false);

	$lines = explode("\n",$res);

	$i=0;
	foreach ($lines as $line)
	{
		//Don't parse empty lines
		if (empty($line)) continue;

		//Don't parse lines without HWaddr (that are the only lines that conatin network device information)
		if (strpos($line,"HWaddr") === false) continue;

		//vmnet1 Link encap:Ethernet HWaddr 00:52:66:23:00:23
		$temp = explode(" ",$line);
		//Get the name of the network device (e.g. eth0)
		$out[$i]['dev'] = $temp[0];

		//Get the type of the network device (e.g. Ethernet)
		$tmp2 = explode(":",$temp[2]);
		$out[$i]['type'] = $tmp2[1];

		//Get the mac address of the network device (e.g. 00:52:66:23:00:23)
		$out[$i++]['mac'] = $temp[4];
	}

	// Check, if ifconfig hasn't fetched device info
	if (!isset($out[0]) || !isset($out[0]['dev']))
	{
		// Try to fetch device info via 'ip'
		$res = CLIENT_executeOnClientOrIP($clientNameOrIP, "m23-getActiveNetDevices",'export LC_ALL=C; ip -o link',"root",false);
		$lines = explode("\n",$res);
		foreach ($lines as $line)
		{
			$temp = explode(": ",$line);
			// skip lines without a device name
			if (empty($temp[1])) continue;

			// skip (optionally) loop devices
			if ($skipLoop && ('lo' == $temp[1])) continue;

			// skip (optionally) eql devices
			if ($skipEQL && ('eql' == $temp[1])) continue;

			$out[$i]['dev'] = $temp[1];

			$line = preg_replace ('#.* link/#', '' , $line);
			$temp = explode(" ",$line);
			$out[$i]['type'] = $temp[0];
			$out[$i++]['mac'] = $temp[1];
		}
	}

	return($out);
}





/**
**name CLIENT_getSSHKeyorPasswordOptions($password, &$sshPass, &$sshPubkeyOnlyOptions)
**description Generates SSH options for using sshpass (password given) or SSH public key (no password given).
**parameter password: Password to use, if it's not NULL or empty.
**parameter sshPass: sshpass commands are written here, if a password is given.
**parameter sshPubkeyOnlyOptions: SSH options are written here, if no password is given.
**/
function CLIENT_getSSHKeyorPasswordOptions($password, &$sshPass, &$sshPubkeyOnlyOptions)
{
	if (is_null($password) || !isset($password{0}))
	{
		$sshPass = '';
		$sshPubkeyOnlyOptions = '-o PreferredAuthentications=publickey -o PasswordAuthentication=no -o BatchMode=yes';
	}
	else
	{
		$sshPass = "sshpass -p '$password' ";
		$sshPubkeyOnlyOptions = '';
	}
}





/**
**name CLIENT_executeOnClientOrIP($clientNameOrIP,$jobName,$cmds,$user="root",$runInScreen=true)
**description Runs a script with "screen" in the background or under a plain BASH under a given user. The script can be executed on the local machine "localhost" or a remote client that is accessible via SSH with a public key and without a password.
**parameter clientNameOrIP: The name of the client or localhost or an IP.
**parameter jobName: name of the job screen should show
**parameter cmds: the commands of the script 
**parameter user: user the script should be run under
**parameter runInScreen: Set to true if the execution should be done in "screen". False executes it under the normal BASH.
**returns The output of the screen (only available on direct output if $runInScreen is false.
**/
function CLIENT_executeOnClientOrIP($clientNameOrIP,$jobName,$cmds,$user="root",$runInScreen=true, $password=NULL)
{

	CLIENT_getSSHKeyorPasswordOptions($password, $sshPass, $sshPubkeyOnlyOptions);

	$jobName.=uniqid();

	if ($clientNameOrIP === "localhost")
		 return(SERVER_runInBackground($jobName,$cmds,$user,$runInScreen));
	else
		{
			//Check if the parameter is an IP or a client name and calculate the IP
			if (checkIP($clientNameOrIP))
				$ip = $clientNameOrIP;
			else
				$ip = CLIENT_getIPbyName($clientNameOrIP);

			//Generate the filename for the script and the lock file
			$cmdf="/tmp/m23remote$jobName.sh";
			$lock="/tmp/m23remote$jobName.lock";

			// Disable sudo calls, when run from the command line
			if (HELPER_isExecutedInCLI())
			{
				$sudoWithArgs = $sudoWithoutArgs = '';
				$sshExtra = "$user@";
			}
			else
			{
				$sudoWithArgs = "sudo -i -u $user";
				$sudoWithoutArgs = 'sudo';
				$sshExtra = "";
			}

			//Choose the execution mechanism
			if ($runInScreen)
			{
				$execCMD = "screen -dmS $jobName $sudoWithArgs $cmdf; exit";
				$sshExtra = "-t -t $sshExtra";
				$sshOutput = "";
			}
			else
			{
				$execCMD = "$sudoWithArgs $cmdf";
				$sshOutput = "2>&1 | cat";
			}

			#Write a local command file to transfer via scp
			$localCmdf="/m23/tmp/$jobName.sh";
			$file=fopen($localCmdf,"w");
			fwrite($file,"#!/bin/bash
			touch $lock
			$cmds
			rm $lock
			rm $cmdf
			");
			fclose($file);

			// Try the given user for scp and use root, if it doesn't work.
			foreach (array($user, 'root') as $scpUser)
			{
				// Transfer the command file
				exec("$sudoWithoutArgs $sshPass scp -o LogLevel=FATAL -o VerifyHostKeyDNS=no $sshPubkeyOnlyOptions -o CheckHostIP=no -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null $localCmdf $scpUser@$ip:$cmdf", $output_array, $ret);

				// scp command worked
				if ($ret == 0) break;
			}
			
			// Delete the temporary local command file
			unlink($localCmdf);
 
			if ($runInScreen)
			{
				// Check, if the client is running systemd and disable killing of processes (like screen) after SSH disconnects
				exec("export LC_ALL=C; $sudoWithoutArgs $sshPass ssh -o ConnectionAttempts=2 -o ConnectTimeout=5 -o LogLevel=FATAL -o VerifyHostKeyDNS=no $sshPubkeyOnlyOptions -o CheckHostIP=no -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -l root $ip 'loginctl enable-linger $user'", $outputLinesA, $returnCode);

				// On systemd (or Debian 8 ?) the extra parameters (-t -t) must not be set
				if ((1 == $returnCode) || (0 == $returnCode))
					$sshExtra = '';
			}
			
			//Generate the SSH command and the script generating script
			$SSHcmd = "export LC_ALL=C; $sudoWithoutArgs $sshPass ssh -o ConnectionAttempts=2 -o ConnectTimeout=5 -o LogLevel=FATAL -o VerifyHostKeyDNS=no $sshPubkeyOnlyOptions -o CheckHostIP=no -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null $sshExtra$ip 'chmod +x $cmdf; chown $user $cmdf; $execCMD' $sshOutput";

			//-l $user

			if ($runInScreen)
			{
				exec($SSHcmd);
				return('');
			}

			$out = HELPER_filterOutUnwantedSSHErrors(@shell_exec($SSHcmd));
			return($out);
		}
};




/**
**name CLIENT_isBasesystemInstalledFromImage($options)
**description Detects if the base system should be installed from an image.
**parameter options: Array with the client options.
**returns true if it should be installed from an image, otherwise false
**/
function CLIENT_isBasesystemInstalledFromImage($options)
{
	if (!isset($options['IMGPartitionAmount']))
		return(false);

	for ($i=0; $i < $options['IMGPartitionAmount']; $i++)
	{
		if ((isset($options["IMGdrv$i"])) && ($options['instPart']==$options["IMGdrv$i"]))
			return(true);
	}

	return(false);
}





/**
**name CLIENT_addClient($data,$options,$clientAddType,$cryptRootPw=true)
**description adds a new client to the database and prepares the client for the installation
**parameter data['client']: client name
**parameter data['office']: office
**parameter data['name']: name of the user
**parameter data['familyname']: family name of the user
**parameter data['email']: email
**parameter data['mac']: client MAC
**parameter data['ip']: IP of the client
**parameter data['netmask']: netmask of the client
**parameter data['gateway']: gateway of the client
**parameter data['dns1']: DNS server 1
**parameter data['dns2']: DNS server 2
**parameter data['newgroup']: group of the client
**parameter data['language']: client language
**parameter data['firstpw']: password for the first user login
**parameter data['rootpassword']: root password
**parameter options['packageProxy']: the ip of the proxy the packages should be fetched from
**parameter options['packagePort']: the proxy port
**parameter options['netRootPwd']: password for root during network booting
**parameter options['ldaptype']: type of the LDAP server
**parameter options['ldapserver']: name of the LDAP server
**parameter options['nfshomeserver']: NFS home server with full path
**parameter options['login']: login name for the user
**parameter options['userID']: user ID for the LDAP account
**parameter options['groupID']: group ID for the LDAP account
**parameter options['addNewLocalLogin']		= $_POST[addNewLocalLogin];
**parameter options['timeZone']: POSIX timezone
**parameter options['getSystemtimeByNTP']: "yes", if the system time should be set with NTP
**parameter options['installPrinter']: "yes", if printer drivers should be installed and printers detected
**parameter clientAddType: can be CLIENT_ADD_TYPE_add if the client should be added, CLIENT_ADD_TYPE_define if it should be defined for mass installation or CLIENT_ADD_TYPE_assimilate if the client should be imported into the m23 system.
**parameter cryptRootPw: set to true, if the password should be encrypted or false, if it's already encrypted
**/
function CLIENT_addClient($data,$options,$clientAddType,$cryptRootPw=true)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$err="";
	
	
// 	print('<h2>cryptRootPw: '.serialize($cryptRootPw).'</h2>');
// 	print('<h2>options</h2>');
// 	print_r2($options);
// 	print('<h2>data</h2>');
// 	print_r2($data);
	
	try
	{
		$CClientO = new CFDiskIO($data['client'], CClient::CHECKMODE_MUSTNOTEXIST);
	}
	catch (Exception $e)
	{
		return($e->getMessage());
	}

	// The value(s) must be set before integration
	if ($clientAddType == CLIENT_ADD_TYPE_assimilate)
	{
		if ($data['clientUsesDynamicIP'])
			$CClientO->setBootType(CClient::BOOTTYPE_GPXE);
		else
			$CClientO->setBootType(CClient::BOOTTYPE_PXE);
	}

	if (($clientAddType == CLIENT_ADD_TYPE_add) ||
		($clientAddType == CLIENT_ADD_TYPE_define))
		{
			$CClientO->setGetSystemtimeByNTP('yes' == $options['getSystemtimeByNTP']);
			$CClientO->setAddNewLocalLogin('yes' == $options['addNewLocalLogin']);
			$CClientO->setInstallPrinter('yes' == $options['installPrinter']);
		
			$CClientO->setArch($options['arch']);
		
			$CClientO->setLDAPType($options['ldaptype']);
			$CClientO->setLDAPServer($options['ldapserver']);

			$CClientO->setUserDetails($data['name'], $data['familyname'], isset($data['email']) ? $data['email'] : '', $data['office'], $options['login'], $data['firstpw']);

			$CClientO->setBootType($data['dhcpBootimage']);

			//if there is an error message quit with it
			if ($CClientO->hasErrors())
			{
				$err = $CClientO->popErrorMessagesHTML();
				$CClientO->destroy();
				return($err);
			}

			//Don't check Network settings in an DHCP/m23shared environment
			if ($CClientO->getBootType() != CClient::BOOTTYPE_GPXE)
			{
				$CClientO->setNetmask($data['netmask']);
				$CClientO->setGateway($data['gateway']);
				//check DNS servers
				$CClientO->setDNS($data['dns1'], $data['dns2']);
			}


			$CClientO->setPackageProxy($options['packageProxy'], $options['packagePort']);

			//The following is most likely used on mass installation
			if (isset($options['release'])) $CClientO->setRelease($options['release']);
			if (isset($options['distr'])) $CClientO->setDistribution($options['distr']);
			if (isset($options['instPart'])) $CClientO->setInstPartDev($options['instPart']);
			if (isset($options['swapPart'])) $CClientO->setSwapPartDev($options['swapPart']);
			
			if (isset($data['CFDiskTemp'])) $CClientO->setCFDiskTemp(unserialize($data['CFDiskTemp']));

			$CClientO->copyImagingParameters($options);
			$CClientO->copyMassOptions($options);

			//m23customPatchBegin type=change id=CLIENT_addClientAdditionalValuesForAddOrDefineClients
			//m23customPatchEnd id=CLIENT_addClientAdditionalValuesForAddOrDefineClients
		}

	if (($clientAddType == CLIENT_ADD_TYPE_add) && ($CClientO->getBootType() != CClient::BOOTTYPE_GPXE))
		$CClientO->setMAC($data['mac']);

	if ((($clientAddType == CLIENT_ADD_TYPE_add) || ($clientAddType == CLIENT_ADD_TYPE_assimilate)) && ($CClientO->getBootType() != CClient::BOOTTYPE_GPXE))
		$CClientO->setIP($data['ip']);

	// Set system in UEFI mode, if UEFI booting is choosen
	if (($clientAddType == CLIENT_ADD_TYPE_define) && ($CClientO->getBootType() == CClient::BOOTTYPE_GRUB2EFIX64))
		$CClientO->setUEFI(true);

	if ($clientAddType != CLIENT_ADD_TYPE_assimilate)
	{
		$CClientO->setUserGroupIDs($options['userID'], $options['groupID']);

		$CClientO->setLanguage($data['language']);
		$CClientO->setTimeZone($options['timeZone']);
		$CClientO->setBootloader($options['bootloader']);
		$CClientO->setNfshomeserver($options['nfshomeserver']);
	}

	if (isset($options['UCSNetwork']))
		$CClientO->setUCSNetwork($options['UCSNetwork']);

	//set the right status
	if ($clientAddType == CLIENT_ADD_TYPE_define)
	{
		$defineOnly = true;
		$status=STATUS_DEFINE;
	}
	else
	{
		$defineOnly = false;
		$status = STATUS_RED;
	}

	$CClientO->setStatus($status);

	$CClientO->setRootPassword($data['rootpassword'], $cryptRootPw);
	$CClientO->setNetRootPwd();

	if ($clientAddType == CLIENT_ADD_TYPE_add)
	{
		//write account to the LDAP server
		if (($CClientO->getLDAPType()=="write") && (!$defineOnly))
			$CClientO->addToCredentialsToLDAPServer();
	}

	//if there is an error message quit with it
	if ($CClientO->hasErrors())
	{
		$err = $CClientO->popErrorMessagesHTML();
		$CClientO->destroy();
		return($err);
	}

	$CClientO->updateModifyDate();
	$CClientO->updateInstallDate();
	if (!empty($data['newgroup']))
		foreach ($data['newgroup'] as $group)
			$CClientO->addToClientGroup($group);

	if ($clientAddType == CLIENT_ADD_TYPE_add)
		$CClientO->activateNetboot();

	if ($clientAddType == CLIENT_ADD_TYPE_assimilate)
	{
		$CClientO->addJob("m23Assimilate",0,"");
		$CClientO->addJob("m23Presetup",1,"assimilate");
		$CClientO->addJob("m23UpdatePackageInfos",2,"");
		$CClientO->addJob("m23setStatusGreen",3,"");
	}
	else
		$CClientO->addJob("m23Presetup",0,"");

	//Create a new status bar for the installation
	$CClientO->setInstallationStatusBar(false, $I18N_client_added);

	if ($clientAddType == CLIENT_ADD_TYPE_add)
		$CClientO->startInstall();
};





/**
**name CLIENT_IPexists($ip)
**description checks if an IP with the selected IP exists and returns true if yes, otherwise false
**parameter ip: IP to check
**/
function CLIENT_IPexists($ip)
{
	CHECK_FW(CC_ip, $ip);
	$sql = "SELECT COUNT(*) FROM `clients` WHERE ip='$ip' ";
	$result=DB_query($sql); //FW ok
	$line=mysqli_fetch_array($result);

	return( $line[0] > 0 );
};






/**
**name CLIENT_MACexists($mac)
**description checks if a mac with the selected mac exists and returns true if yes, otherwise false
**parameter mac: MAC to check
**/
function CLIENT_MACexists($mac)
{
	CHECK_FW(CC_mac, $mac);
	$sql = "SELECT COUNT(*) FROM `clients` WHERE mac='$mac' ";
	$result=DB_query($sql); //FW ok
	$line=mysqli_fetch_array($result);

	return( $line[0] > 0 );
};






/**
**name CLIENT_exists($clientName)
**description checks if a client with the selected name exists and returns true if yes, otherwise false
**parameter clientName: name of the client
**/
function CLIENT_exists($clientName)
{
	CHECK_FW(CC_clientname, $clientName);
	$sql = "SELECT COUNT(*) FROM `clients` WHERE client='$clientName' ";
	$result = DB_query($sql); //FW ok
	$line = mysqli_fetch_array($result);

	return( $line[0] > 0 );
};





/**
**name CLIENT_getAskingParams()
**description returns database parameters of the asking client. The client is authetified by its m23shared clients name, client ID or ip
**/
function CLIENT_getAskingParams()
{
	$clientName = (isset($_SESSION['m23Shared_clientName']{1}) ? $_SESSION['m23Shared_clientName'] : CLIENT_getClientName());
	
	$sql= "SELECT * FROM `clients` WHERE client='$clientName'";

	$result=DB_query($sql); //FW ok
	$line=mysqli_fetch_array($result,MYSQLI_ASSOC);

	return($line);
}





/**
**name CLIENT_getParams($clientName)
**description returns database parameters of a special client
**parameter clientName: name of the client
**/
function CLIENT_getParams($clientName)
{
	CHECK_FW(CC_clientname, $clientName);
	$sql = "SELECT * FROM `clients` WHERE client=\"$clientName\"";

	$result=DB_query($sql); //FW ok
	$line=mysqli_fetch_array($result,MYSQLI_ASSOC);

	return($line);
};





/**
**name CLIENT_getClientStatus($client)
**description returnes the current client status
**parameter client: name of the client
**/
function CLIENT_getClientStatus($client)
{
	return(CLIENT_getProperty($client,"status"));
}





/**
**name CLIENT_getProperty($client,$var)
**description fetches a property from the client information of the database
**parameter client: name of the client
**parameter var: name of the property
**/
function CLIENT_getProperty($client,$var)
{
	CHECK_FW(CC_clientname, $client, "A", $var);
	$sql = "SELECT $var FROM `clients` WHERE CLIENT = '$client'";
	$res = DB_query($sql); //FW ok
	$line = mysqli_fetch_row($res);
	return($line[0]);
};





/**
**name CLIENT_listPackages($client, $key,$withActions)
**description lists all packages on the client
**parameter client: name of the client
**parameter key: keyword for searching for packages
**parameter withActions: you can select to draw te action selection button, if you set it to true, you can delete packages and discard package deletion jobs
**/
function CLIENT_listPackages($client, $key,$withActions)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	CHECK_FW(CC_clientname, $client, "se", $key);

	//if we've selected no key, print out all packages
	if (empty($key))
		$key="%";
	else
	//otherwise all packages containing the key
		$key="%$key%";

	//select package name, package version, package status
	$sql = "SELECT package,version,status,action FROM `clientpackages` WHERE clientname='$client' AND package LIKE '$key' ORDER BY package";

	$result = DB_query($sql); //FW ok
	$counter = 0;

	HTML_showTableHeader();
	
	echo ("<tr>
				<td><span class=\"subhighlight\">$I18N_package_name</span></td>
				<td><span class=\"subhighlight\">$I18N_version</span></td>
				<td><span class=\"subhighlight\">$I18N_status</span></td>
			</tr>
		");

	while ($line=mysqli_fetch_row($result))
	{
		if ($withActions)
			$actions="<td><INPUT type=\"checkbox\" name=\"CB_pkg$counter\" id=\"CBID_$line[0]\" value=\"$line[0]\"></td>";
			else
			$actions="";
			
		if (($counter % 2) == 0)
			$class = 'class="evenrow"';
		else
			$class = 'class="oddrow"';

		echo("<tr $class><td>".$line[0]."</td><td>".$line[1]."</td><td>".PKG_translateClientPackageStatus($line[2])."</td>$actions</tr>\n");
		$counter++;
	}

	HTML_showTableEnd();

	return($counter);
};





/**
**name CLIENT_getPossibleActions($status,$actionNr,$package)
**description list the possible actions. e.g. if a package is installed it can be uninstalled
**parameter status: actual status of the package
**parameter actionNr: number of the action radio button
**parameter package: name of the package
**/
function CLIENT_getPossibleActions($status,$action,$actionNr,$package)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$var="RB_pkgAction".$actionNr;

	//if package is installed you can remove or reinstall it
	if (PKG_isInstalled($status))
		return("$I18N_pkg_delete_char&nbsp;<input type=\"radio\" name=\"$var\" value=\"remove:$package\">");
		//INSERT ME
		/*E<input type=\"radio\" name=\"$var\" value=\"reinstall:$package\">&nbsp;*/


	switch($action)
		{
			case "wait4rm":
				return("$I18N_pkg_cancel_char&nbsp;<input type=\"radio\" name=\"$var\" value=\"discard:$package\">"); break;
		}
};





/**
**name CLIENT_acceptChanges($client,$amount)
**description removes packages or discards changes
**parameter client: name of zhe client
**parameter amount: amount of packages in the web interface
**/
function CLIENT_acceptChanges($client,$amount)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//counts the amount of removed packages
	$rmCounter=0;
	//counts all discarded package changes
	$discardCounter=0;

	for($actionNr=0; $actionNr < $amount; $actionNr++)
		{
		$var="RB_pkgAction".$actionNr;

		if (!(empty($_POST[$var])))
			{//split action and package name
			$action_package=explode(":",$_POST[$var]);
			//switch by action
			switch($action_package[0])
				{//add a remove job for the package
				case "remove":
					{
					$rmCounter++;
					//adds a normal package remove job to the joblist
					PKG_rmNormalJob($client,$action_package[1]);
					//changes the status of the package
					PKG_setClientPackageWait4Rm($client, $action_package[1]);
					break;
					}

				//discard all jobs for this package
				case "discard":
					{
					$discardCounter++;
					//adds a normal package remove job to the joblist
					PKG_discardNormalJob($client,$action_package[1]);
					//changes the status of the package
					PKG_setClientPackageInstalledOK($client, $action_package[1]);
					break;
					};
				};
			};
		};
	echo("<H2>$I18N_pkg_following_packages_are_marked_for:<BR>
	<ul>
	<li>$rmCounter $I18N_pkg_marked_for_deletion
	<li>$discardCounter $I18N_pkg_marked_for_discarding
	</ul></H2>");
};





/**
**name CLIENT_showHardwareInfo($client)
**description prints a table with hardware informations
**parameter client: name of zhe client
**/
function CLIENT_showHardwareInfo($client)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//print header
	echo("<table align=\"center\"><tr><td><div class=\"subtable_shadow\">
	<table class=\"subtable\" align=\"center\" border=\"0\" cellspacing=5>
	<tr>
		<td colspan=\"2\"><span class=\"subhighlight\">$I18N_hardware_info:</span></td>
	</tr>
	<tr>
		<td><span class=\"subhighlight\">$I18N_property</span></td>
		<td><span class=\"subhighlight\">$I18N_value</span></td>
	</tr>");

	echo("

	<tr> <td valign=\"top\">$I18N_chassis</td> <td>".DMI_getChassis($client)." </td> </tr>

	<tr><td colspan=\"2\"><hr></td></tr>
	<tr> <td valign=\"top\">$I18N_mainboard</td> <td>".DMI_getBoard($client)."</td> </tr>

	<tr><td colspan=\"2\"><hr></td></tr>
	<tr> <td valign=\"top\">$I18N_bios</td> <td>".DMI_getBios($client)."</td> </tr>

	<tr><td colspan=\"2\"><hr></td></tr>
	<tr> <td valign=\"top\">$I18N_cpu</td> <td>".HWINFO_getCPU($client)."</td> </tr>

	<tr><td colspan=\"2\"><hr></td></tr>
	<tr> <td valign=\"top\">$I18N_cache</td> <td>".DMI_getCache($client)."</td> </tr>

	<tr><td colspan=\"2\"><hr></td></tr>
	<tr>
	<td valign=\"top\" align=\"center\">
		<img src=\"/gfx/ram.png\"><br>
		$I18N_memory
	</td>
	<td>$I18N_size: ".HWINFO_getMemory($client)." MB<br>
		".DMI_getMemory($client)."
	</td>
	</tr>

	<tr><td colspan=\"2\"><hr></td></tr>

	<tr>
	<td valign=\"top\" align=\"center\">
		<img src=\"/gfx/interfaces.png\"><br>
		$I18N_interfaces
	</td>
	<td>".DMI_getPorts($client)."
	</td>
	</tr>

	<tr><td colspan=\"2\"><hr></td></tr>

	<tr>
	<td valign=\"top\" align=\"center\">
		<img src=\"/gfx/hwinfo.png\"><br>
		$I18N_slots
	</td>
	<td>".DMI_getSlot($client)."</td>
	</tr>

	<tr><td colspan=\"2\"><hr></td></tr>

	<tr>
	<td valign=\"top\" align=\"center\">
		<img src=\"/gfx/hwinfo.png\"><br>
		$I18N_network_cards
	</td>
	<td>".HWINFO_getNetworkCards($client)."</td>
	</tr>

	<tr><td colspan=\"2\"><hr></td></tr>

	<tr>
	<td valign=\"top\" align=\"center\">
		<img src=\"/gfx/hwinfo.png\"><br>
		$I18N_graphic_card
	</td>
	<td>".HWINFO_getGraficCards($client)."</td>
	</tr>

	<tr><td colspan=\"2\"><hr></td></tr>

	<tr>
	<td valign=\"top\" align=\"center\">
		<img src=\"/gfx/soundcard.png\"><br>
		$I18N_soundcard
	</td>
	<td>".HWINFO_getSoundCards($client)."</td>
	</tr>

	<tr><td colspan=\"2\"><hr></td></tr>

	<tr>
	<td valign=\"top\">$I18N_isa_hardware</td>
	<td>".HWINFO_getIsaCards($client)."</td>
	</tr>

	<tr><td colspan=\"2\"><hr></td></tr>

	<tr>
	<td valign=\"top\" align=\"center\">
		<img src=\"/gfx/harddrive.png\"><br>
		$I18N_harddisk
	</td>
	<td>".HWINFO_getHDSize($client)."</td>
	</tr>
	
	<tr><td colspan=\"2\"><hr></td></tr>

	<tr>
	<td valign=\"top\" align=\"center\">
		DMI
	</td>
	<td>".DMI_getAllTextBox($client)."</td>
	</tr>

	</table>
	</div></td><tr></table><br><BR>");

	/*Partitions Informationen*/
	HWINFO_printPartitions($client);
};





/**
**name CLIENT_showGeneralInfo($id,$generateEnterKeep)
**description prints a table with general information
**parameter id: id of the client
**parameter generateEnterKeep: set to true, if you want these values to be generated,entered or kept
**/
function CLIENT_showGeneralInfo($id,$generateEnterKeep=false)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	CHECK_FW(CC_id, $id);

	$result = DB_query("SELECT * FROM clients WHERE id='$id' "); //FW ok
	$data = mysqli_fetch_array($result);

//m23customPatchBegin type=change id=CLIENT_showGeneralInfoAdditionalCodeAfterQuery
//m23customPatchEnd id=CLIENT_showGeneralInfoAdditionalCodeAfterQuery


	//Try to get the block with informations for the VM client. If it's not a VM client the variable will be empty.
	$vmInfoHTML = VM_getHTMLStatusBlock($data['client']);

	//Status bar with the state of the client as traffic lights.
	$HTMLStatusCode = CLIENT_generateHTMLStatusBar($data['client'], $data['id'], $data['status'], $data['vmRole'], $data['vmSoftware']);

	$allOptions = CLIENT_getAllOptions($data['client']);

	$tableHeader = $clientEGK = $officeEGK = $groupEGK = $distrEGK = $packageSourceEGK = $languageEGK = $loginEGK = $forenameEGK = $familynameEGK = $emailEGK = $macEGK = $ipEGK = $netmaskEGK = $gatewayEGK = $dns1EGK = $dns2EGK = $firstloginEGK = $netloginEGK = $rootPwdHtml = $addNewLocalLoginEGK = $ldaptypeEGK = $userIDEGK = $groupIDEGK = $ldapserverEGK = $nfshomeserverEGK = $timeZoneEGK = $getSystemtimeByNTPEGK = $installPrinterEGK = '';

	if ($generateEnterKeep)
		{
			$colSpan=4;
			
			$tableHeader="<td><span class=\"subhighlight\">$I18N_enter</span></td>
			<td><span class=\"subhighlight\">$I18N_generate</span></td>
			<td><span class=\"subhighlight\">$I18N_keep</span></td>";
			
			$clientEGK=MASS_EGKradioBoxes("RB_client",array(e,e,n),0);
			$officeEGK=MASS_EGKradioBoxes("RB_office",array(e,n,e),2);
			$groupEGK=MASS_EGKradioBoxes("RB_group",array(e,n,e),0);
			$distrEGK=MASS_EGKradioBoxes("RB_distr",array(n,n,y));
			$packageSourceEGK=MASS_EGKradioBoxes("RB_packageSource",array(n,n,y));
			$languageEGK=MASS_EGKradioBoxes("RB_language",array(n,n,y));
			$loginEGK=MASS_EGKradioBoxes("RB_login",array(e,e,e),2);
			$forenameEGK=MASS_EGKradioBoxes("RB_forename",array(e,e,e),2);
			$familynameEGK=MASS_EGKradioBoxes("RB_familyname",array(e,n,e),2);
			$emailEGK=MASS_EGKradioBoxes("RB_email",array(e,n,e),0);
			$macEGK=MASS_EGKradioBoxes("RB_mac",array(y,n,n),0);
			$ipEGK=MASS_EGKradioBoxes("RB_ip",array(e,e,n),0);
			//m23customPatchBegin type=change id=CLIENT_showGeneralInfoAdditionalMASS_EGKradioBoxes
			//m23customPatchEnd id=CLIENT_showGeneralInfoAdditionalMASS_EGKradioBoxes
			$netmaskEGK=MASS_EGKradioBoxes("RB_netmask",array(e,e,e),2);
			$gatewayEGK=MASS_EGKradioBoxes("RB_gateway",array(e,n,e),2);
			$dns1EGK=MASS_EGKradioBoxes("RB_dns1",array(e,n,e),2);
			$dns2EGK=MASS_EGKradioBoxes("RB_dns2",array(e,n,e),2);
			$firstloginEGK=MASS_EGKradioBoxes("RB_firstlogin",array(e,e,e),1);
			$netloginEGK=MASS_EGKradioBoxes("RB_netlogin",array(n,y,n));
			$rootPwdHtml="<tr><td>$I18N_rootpassword:</td><td>???</td>".MASS_EGKradioBoxes("RB_rootlogin",array(e,n,e),0)."</tr>";
			$addNewLocalLoginEGK=MASS_EGKradioBoxes("RB_addNewLocalLogin",array(e,n,e),2);

			if ((!isset($_SESSION['m23Shared']) || !$_SESSION['m23Shared']))
			{
				$ldaptypeEGK=MASS_EGKradioBoxes("RB_ldaptype",array(e,n,e),2);
				$userIDEGK=MASS_EGKradioBoxes("RB_userID",array(e,e,e),0);
				$groupIDEGK=MASS_EGKradioBoxes("RB_groupID",array(e,e,e),2);
				$ldapserverEGK=MASS_EGKradioBoxes("RB_ldapserver",array(e,n,e),2);
				$nfshomeserverEGK=MASS_EGKradioBoxes("RB_nfshomeserver",array(e,n,e),2);
			}

			$timeZoneEGK=MASS_EGKradioBoxes("RB_timeZone",array(e,n,e),2);
			$getSystemtimeByNTPEGK=MASS_EGKradioBoxes("RB_getSystemtimeByNTP",array(e,n,e),2);
			$installPrinterEGK=MASS_EGKradioBoxes("RB_installPrinter",array(n,n,y));
		}
	else
		$colSpan=2;


	//Choose the icons for (de)activated options
	if (isset($allOptions['addNewLocalLogin']) && ($allOptions['addNewLocalLogin']=="yes"))
		$addNewLocalLoginCecked="/gfx/button_ok-mini.png";
	else
		$addNewLocalLoginCecked="/gfx/button_cancel-mini.png";

	if (isset($allOptions['getSystemtimeByNTP']) && ($allOptions['getSystemtimeByNTP']=="yes"))
		$getSystemtimeByNTPCecked="/gfx/button_ok-mini.png";
	else
		$getSystemtimeByNTPCecked="/gfx/button_cancel-mini.png";	

	if (isset($allOptions['installPrinter']) && ($allOptions['installPrinter']=="yes"))
		$installPrinterCecked="/gfx/button_ok-mini.png";
	else
		$installPrinterCecked="/gfx/button_cancel-mini.png";


	echo("<table align=\"center\"><tr><td><div class=\"subtable_shadow\">
	<table class=\"subtable\" align=\"center\">
	 <tr> <td colspan=\"$colSpan\"><span class=\"subhighlight\">$I18N_client_information:</span></td></tr>
	 <tr>
		<td><span class=\"subhighlight\">$I18N_property</span></td>
		<td><span class=\"subhighlight\">$I18N_value</span></td>
		$tableHeader
	 </tr>
	<tr><td>$I18N_client_name:</td><td>".($_SESSION['m23Shared'] ? m23SHARED_getCompleteClientName($data['client']) : $data['client'])."</td>$clientEGK</tr>
	<tr> <td>$I18N_office:</td><td>$data[office]</td>$officeEGK</tr>
	<tr> <td>$I18N_group:</td><td>");
	 	GRP_showClientGroups($data['client'],true);
	echo( "</td>$groupEGK</tr>
	<tr> <td>$I18N_distribution:</td><td>".(isset($allOptions['distr']) ? $allOptions['distr'] : '')."</td>$distrEGK</tr>
	<tr> <td>$I18N_packageSourceName:</td> <td>".(isset($allOptions['packagesource']) ? $allOptions['packagesource'] : '')."</td> $packageSourceEGK </tr>
	<tr> <td>$I18N_language:</td><td>".I18N_convertToHumanReadableName($data['language'])."</td>$languageEGK</tr>
	<tr> <td>$I18N_login_name:</td><td>".(isset($allOptions['login']) ? $allOptions['login'] : '')."</td>$loginEGK</tr>
	<tr> <td>$I18N_forename:</td><td>".(isset($data['name']) ? $data['name'] : '')."</td>$forenameEGK</tr>
	<tr> <td>$I18N_familyname:</td><td>".(isset($data['familyname']) ? $data['familyname'] : '')."</td>$familynameEGK</tr>
	<tr> <td>eMail:</td><td>".(isset($data['email']) ? $data['email'] : '')."</td>$emailEGK</tr>");
	//m23customPatchBegin type=change id=CLIENT_showGeneralInfoAdditionalTableEntriesAftereMail
	//m23customPatchEnd id=CLIENT_showGeneralInfoAdditionalTableEntriesAftereMail
	echo("
	<tr> <td>$I18N_arch:</td><td>".(isset($allOptions['arch']) ? $allOptions['arch'] : '')."</td></tr>
	<tr> <td>Kernel:</td><td>".(isset($allOptions['kernel']) ? nl2br($allOptions['kernel']) : '')."</td></tr>");

	//Only show network information if the client is NOT gPXE or DHCP client
	if ($data['dhcpBootimage'] != CClient::BOOTTYPE_GPXE)
		echo( "<tr> <td>$I18N_mac:</td><td>$data[mac]</td>$macEGK</tr>
		<tr> <td>$I18N_ip:</td><td>$data[ip]</td>$ipEGK</tr>");
		//m23customPatchBegin type=change id=CLIENT_showGeneralInfoAdditionalTableEntriesAfterIP
		//m23customPatchEnd id=CLIENT_showGeneralInfoAdditionalTableEntriesAfterIP
		echo("
		<tr> <td>$I18N_netmask:</td><td>$data[netmask]</td>$netmaskEGK</tr>
		<tr> <td>$I18N_gateway:</td><td>$data[gateway]</td>$gatewayEGK</tr>
		<tr> <td>DNS1:</td><td>$data[dns1]</td>$dns1EGK</tr>
		<tr> <td>DNS2:</td><td>$data[dns2]</td>$dns2EGK</tr>");

	echo( "<tr> <td>$I18N_install_date:</td>	<td>".date("H:i  d.m.y",$data['installdate'])."</td> </tr>
	<tr> <td>$I18N_last_change:</td> <td>".date("H:i  d.m.y",$data['lastmodify'])."</td> </tr>
	<tr> <td>$I18N_first_login:</td><td>".HTML_getInvisiblePasswordsIfFeatureEnabled($data['firstpw'])."</td>$firstloginEGK</tr>
	<tr> <td>$I18N_netRootPwd:</td><td>".(isset($allOptions['netRootPwd']) ? $allOptions['netRootPwd'] : '')."</td>$netloginEGK</tr>
	$rootPwdHtml
	<tr> <td>$I18N_addNewLocalLogin:</td> <td><img src=\"$addNewLocalLoginCecked\"></td>$addNewLocalLoginEGK </tr>\n");

	if ((!isset($_SESSION['m23Shared']) || !$_SESSION['m23Shared']))
	echo("<tr><td>LDAP:</td> <td>".(isset($allOptions['ldaptype']) ? LDAP_I18NLdapType($allOptions['ldaptype']) : '')."</td>$ldaptypeEGK <tr>
	<tr><td>$I18N_userID:</td><td>".(isset($allOptions['userID']) ? $allOptions['userID'] : '')."</td>$userIDEGK</tr>
	<tr><td>$I18N_groupID:</td><td>".(isset($allOptions['groupID']) ? $allOptions['groupID'] : '')."</td>$groupIDEGK</tr>
	<tr><td>$I18N_LDAPServerName:</td><td>".(isset($allOptions['ldapserver']) ? $allOptions['ldapserver'] : '')."</td>$ldapserverEGK</tr>
	<tr><td>$I18N_homeOnNFS:</td><td>".(isset($allOptions['nfshomeserver']) ? $allOptions['nfshomeserver'] : '')."</td>$nfshomeserverEGK</tr>\n");

	echo("<tr><td>$I18N_timeZone:</td><td>".(isset($allOptions['timeZone']) ? $allOptions['timeZone'] : '')."</td>$timeZoneEGK</tr>
	<tr><td>$I18N_getSystemtimeByNTP:</td><td><img src=\"$getSystemtimeByNTPCecked\"></td>$getSystemtimeByNTPEGK</tr>
	<tr><td>$I18N_installPrinterDriversAndDetectPrinter:</td> <td><img src=\"$installPrinterCecked\"></td>$installPrinterEGK</tr>
	<tr> <td>$I18N_status:</td><td>$HTMLStatusCode</td></tr>
	$vmInfoHTML
	</table></div></td><tr></table>");

};





/**
**name CLIENT_showWaitingJobs($client)
**description shows the waiting jobs for the client
**parameter client: name of the client
**/
function CLIENT_showJobs($client)
{
	CHECK_FW(CC_clientname,$client);

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$doneNr = $rerunNr = $delNr = 0;
	$delList = $rerunList = $doneList = array();

	if (isset($_POST['BUT_do']))
	{
		for ($i=0; $i < $_POST['RM_buttons']; $i++)
		{
			if (isset($_POST["SELaction_".$i]) && ($_POST["SELaction_".$i] != "n"))
			{
				$actionPkgNr=explode("_",$_POST["SELaction_".$i]);
				switch ($actionPkgNr[0])
				{
					case "d": $delList[$delNr++] = $actionPkgNr[1]; break;
					case "r": $rerunList[$rerunNr++] = $actionPkgNr[1]; break;
					case "D": $doneList[$doneNr++] = $actionPkgNr[1]; break;
				}
			};
		}

		PKG_removeFromJobList($delList);
		PKG_changeClientJobsStatus($rerunList,"waiting");
		PKG_changeClientJobsStatus($doneList,"done");
		CLIENT_resetStatusBar($client);
	}
	
	if (isset($_POST['BUT_start']))
	{
		CLIENT_startInstall($client);
		MSG_showInfo($I18N_jobs_added);
	}

	$results = DB_query("SELECT * FROM clientjobs WHERE client='$client' ORDER BY priority,id "); //FW ok
	$isInstallReasonEnabled = SERVER_isInstallReasonEnabled();
	$showTimes = SERVER_getShowTimeInformationOnJobs();

echo("
<form method=\"post\">
<table align=\"center\">
	<tr>
		<td>
			<div class=\"subtable_shadow\">
			<table class=\"subtable\" align=\"center\">
				<tr>
					<td>
						<span class=\"subhighlight\">$I18N_package_name</span>
					</td>
");
if ($isInstallReasonEnabled)
	echo("
					<td>
						<span class=\"subhighlight\">$I18N_reason</span>
					</td>
	");

echo("
					<td>
						<span class=\"subhighlight\">$I18N_parameter</span>
					</td>
					<td>
						<span class=\"subhighlight\">$I18N_priority</span>
					</td>
					<td>
						<span class=\"subhighlight\">$I18N_status</span>
					</td>
					<td>
						<span class=\"subhighlight\">$I18N_action</span>
					</td>
	");

if ($showTimes)
echo("
					<td>
						<span class=\"subhighlight\">$I18N_addingTime</span>
					</td>
					<td>
						<span class=\"subhighlight\">$I18N_finishTime</span>
					</td>
					<td>
						<span class=\"subhighlight\">$I18N_runningTime</span>
					</td>
	");

echo("
	 			</tr>
");

$count=0;

//I18N names for the actions
$list['val0']="n";
$list['name0']="-";

$list['name1']=$I18N_delete;
$list['name2']=$I18N_rerun;
$list['name3']=$I18N_done;


if( $results )
	{
		//show the packages with actions
		while( $data = mysqli_fetch_array($results) )
		{
			$package=$data['package'];



			if (($package == "m23normal") || ($package == "m23normalRemove"))
				$params = $data['normalPackage'];
			else
				$params = $data['params'];

			//internal names + package IDs for the actions
			$list['val1']="d_$data[id]";
			$list['val2']="r_$data[id]";
			$list['val3']="D_$data[id]";

			//build the selection with actions
			$first="-";
			$actionSel=HTML_listSelection("SELaction_$count",$list,$first);

			$status = PKG_translateClientjobsStatus($data['status']);

			if ($showTimes)
			{
				$addingTimeS = ($data['addtime'] > 10) ? I18N_getTimeDateAndElapsedMinutes($data['addtime']) : '?';
				$finishTimeS = ($data['finishtime'] > 10) ? I18N_getTimeDateAndElapsedMinutes($data['finishtime']) : '?';
				$runningTimeS = (($data['finishtime'] > 10) && ($data['starttime'] > 10)) ? sprintf("%.2f", ($data['finishtime'] - $data['starttime']) / 60) : '?';
			}

			if (($count % 2) == 0)
				$class = 'class="evenrow"';
			else
				$class = 'class="oddrow"';

			echo("
						<tr $class>
							<td valign=\"top\">$package</td>
			");

			if ($isInstallReasonEnabled)
			{
				$reason=preg_replace("/\r\n|\r|\n/",'<br>',$data['reason']);

				echo("
							<td valign=\"top\">".wordwrap($reason,75,"<br>",1)."</td> 
				");
			}

			echo("
							<td valign=\"top\">".wordwrap($params,75,"<br>",1)."</td>
							<td valign=\"top\" align=\"center\">$data[priority]</td>
							<td valign=\"top\" align=\"center\">$status</td>
							<td valign=\"top\" align=\"center\">$actionSel</td>
			");

			if ($showTimes)
			echo("
							<td valign=\"top\" align=\"center\">$addingTimeS</td>
							<td valign=\"top\" align=\"center\">$finishTimeS</td>
							<td valign=\"top\" align=\"center\">$runningTimeS</td>
				");

			echo("
						</tr>
				");

			$count++;
		}
	
		echo("
		<tr>
			<td colspan=\"5\" align=\"center\">
				<input type=\"submit\" value=\"$I18N_accept_changes\" name=\"BUT_do\">
				<input type=\"submit\" value=\"$I18N_startJobsOnClient\" name=\"BUT_start\">
				<input type=\"submit\" value=\"$I18N_refresh\" name=\"BUT_refresh\">
			</td>
		</tr>
	
		<input type=\"hidden\" name=\"RM_buttons\" value=\"$count\">
		");
	}
	else
	echo("<tr><td colspan=\"5\">$I18N_no_waiting_jobs.</td></tr>");

	echo("</table></div></td><tr></table></form>");

};





/**
**name CLIENT_setLastmodify($id)
**description sets the last modified time of a client
**parameter id: id of the client
**parameter client: name of the client
**/
function CLIENT_setLastmodify($id,$client="")
{
	$modifydate = time();

	if (empty($client))
	{
		CHECK_FW(CC_lastmodify, $modifydate, CC_id, $id);
		$sql="UPDATE clients SET lastmodify = '$modifydate' WHERE id='$id'";
	}
	else
	{
		CHECK_FW(CC_lastmodify, $modifydate, CC_clientname, $client);
		$sql="UPDATE clients SET lastmodify = '$modifydate' WHERE client='$client'";
	}

	DB_query($sql); //FW ok
};





/**
**name CLIENT_getNetmaskBits($netmask)
**description Gets the amount of set bits of a netmask.
**parameter netmask: IPv4 netmask.
**returns Amount of set bits of a netmask.
**/
function CLIENT_getNetmaskBits($netmask)
{
	// Check, if it is a valid IPv4 netmask
	if (CHECK_ip($netmask))
		return(substr_count(decbin(ip2longSafe($netmask)), '1'));
	else
	// otherwise return the amount of set bits
		return($netmask);
}





/**
**name CLIENT_getNetmaskFromBitAmount($bits)
**description Gets the netmask by the amount of set bits.
**parameter bits: Amount if set bits of a netmask.
**returns IPv4 netmask
**/
function CLIENT_getNetmaskFromBitAmount($bits)
{
	// Check, if its a valid amount of bits
	if (is_numeric($bits) && ($bits > 0) && ($bits < 32))
		return(long2ip(bindec(str_repeat('1', $bits).str_repeat ('0', 32 - $bits))));
	else
	// otherwise return the netmask
		return($bits);
}





/**
**name CLIENT_getSubnet($ip, $netmask)
**description gets the subnet of a given ip and netmask
**parameter ip: ip address
**parameter netmask: netmask
**/
function CLIENT_getSubnet($ip, $netmask)
{
	$ipoctets = explode(".",$ip);
	$maskoctets = explode(".",$netmask);
	$network = '';

	for($i=0;$i<4;$i++) 
	{
		$binipoctets[$i] = decbin($ipoctets[$i]);
		$binmaskoctets[$i] = decbin($maskoctets[$i]);

		//fuehrende Nullen ergaenzen - quick'n'dirty :)
		if ($ipoctets[$i] < 128) $binipoctets[$i] = "0".$binipoctets[$i];
		if ($ipoctets[$i] < 64) $binipoctets[$i] = "0".$binipoctets[$i];
		if ($ipoctets[$i] < 32) $binipoctets[$i] = "0".$binipoctets[$i];
		if ($ipoctets[$i] < 16) $binipoctets[$i] = "0".$binipoctets[$i];
		if ($ipoctets[$i] < 8) $binipoctets[$i] = "0".$binipoctets[$i];
		if ($ipoctets[$i] < 4) $binipoctets[$i] = "0".$binipoctets[$i];
		if ($ipoctets[$i] < 2) $binipoctets[$i] = "0".$binipoctets[$i];
		
		if ($maskoctets[$i] < 128) $binmaskoctets[$i] = "0".$binmaskoctets[$i];
		if ($maskoctets[$i] < 64) $binmaskoctets[$i] = "0".$binmaskoctets[$i];
		if ($maskoctets[$i] < 32) $binmaskoctets[$i] = "0".$binmaskoctets[$i];
		if ($maskoctets[$i] < 16) $binmaskoctets[$i] = "0".$binmaskoctets[$i];
		if ($maskoctets[$i] < 8) $binmaskoctets[$i] = "0".$binmaskoctets[$i];
		if ($maskoctets[$i] < 4) $binmaskoctets[$i] = "0".$binmaskoctets[$i];
		if ($maskoctets[$i] < 2) $binmaskoctets[$i] = "0".$binmaskoctets[$i];

		$network .= bindec($binipoctets[$i]) & bindec($binmaskoctets[$i]);
		if ($i != 3) $network = $network.".";
		
	}// ende for

	return($network);
} //ende calcnetwork





/**
**name CLIENT_getBroadcast($ip, $netmask)
**description gets the broadcast of a given ip and netmask
**parameter ip: ip address
**parameter netmask: netmask
**/
function CLIENT_getBroadcast($ip,$netmask)
{
	$ipoctets = explode(".",$ip);
	$maskoctets = explode(".",$netmask);
	$broadcast = '';

	for ($i = 0; $i < 4; $i++)
	{
		$binipoctets[$i] = decbin($ipoctets[$i]);
		$binmaskoctets[$i] = decbin($maskoctets[$i]);
		$invmaskoctets[$i] = '';

		//fuehrende Nullen ergaenzen - quick'n'dirty :)
		if ($ipoctets[$i] < 128) $binipoctets[$i] = "0".$binipoctets[$i];
		if ($ipoctets[$i] < 64) $binipoctets[$i] = "0".$binipoctets[$i];
		if ($ipoctets[$i] < 32) $binipoctets[$i] = "0".$binipoctets[$i];
		if ($ipoctets[$i] < 16) $binipoctets[$i] = "0".$binipoctets[$i];
		if ($ipoctets[$i] < 8) $binipoctets[$i] = "0".$binipoctets[$i];
		if ($ipoctets[$i] < 4) $binipoctets[$i] = "0".$binipoctets[$i];
		if ($ipoctets[$i] < 2) $binipoctets[$i] = "0".$binipoctets[$i];

		if ($maskoctets[$i] < 128) $binmaskoctets[$i] = "0".$binmaskoctets[$i];
		if ($maskoctets[$i] < 64) $binmaskoctets[$i] = "0".$binmaskoctets[$i];
		if ($maskoctets[$i] < 32) $binmaskoctets[$i] = "0".$binmaskoctets[$i];
		if ($maskoctets[$i] < 16) $binmaskoctets[$i] = "0".$binmaskoctets[$i];
		if ($maskoctets[$i] < 8) $binmaskoctets[$i] = "0".$binmaskoctets[$i];
		if ($maskoctets[$i] < 4) $binmaskoctets[$i] = "0".$binmaskoctets[$i];
		if ($maskoctets[$i] < 2) $binmaskoctets[$i] = "0".$binmaskoctets[$i];

		// jedes Bit der Netzmaske invertieren
		for($j=0;$j<8;$j++) 
		{
			$bit = substr($binmaskoctets[$i], $j, 1);
			if ($bit == 1) 
				$bit = 0;
			else 
				$bit = 1;
			$invmaskoctets[$i] .= $bit;
		}

		$broadcast .= bindec($binipoctets[$i]) | bindec($invmaskoctets[$i]);
		if ($i != 3) $broadcast = $broadcast.".";
		
	}// ende for
	return $broadcast;
}





/**
**name CLIENT_convertMac($mac, $splitter)
**description converts a mac address to a 00:11... or 0011 format
**parameter mac: the mac address
**parameter splitter: select a character to split the mac in couples of two characters, if you leeave it blank, splitting characters will be removed
**/
function CLIENT_convertMac($mac, $splitter)
{
 $newMac="";

 //we want to eliminate the ':'
 if (empty($splitter) && strstr($mac,":"))
	{
	 $parts=explode(":",$mac);
	 echo(count($parts));
	 for ($i=0; $i < count($parts); $i++)
	 	$newMac.=$parts[$i];
	}

 //we want to add the splitter
 if (!empty($splitter) && !strstr($mac,":"))
 	{
	 $pos=0;
	 for ($i=1; $pos < strlen($mac); $i++)
	 	//every third character has to be our splitter
	 	if (($i % 3) == 0)
			$newMac.=$splitter;
			else
			{
			 $newMac.=$mac[$pos];
			 $pos++;
			}
	}

 if(empty($newMac))
	return($mac);
	else
	return($newMac);
};





//m23customPatchBegin type=change id=CLIENT_getIPTSbyName
//m23customPatchEnd id=CLIENT_getIPTSbyName





/**
**name CLIENT_getIPbyName($clientName)
**description returns the ip from a selected clientname
**parameter clientName: name of the client
**/
function CLIENT_getIPbyName($clientName, $IPOnCLI = false)
{
	CHECK_FW(CC_clientname,$clientName);
	
	if (!$IPOnCLI && HELPER_isExecutedInCLI())
		return($clientName);
	
	$sql = "SELECT IP FROM `clients` WHERE client='$clientName'";

	$result=DB_query($sql); //FW ok

	$line=mysqli_fetch_row($result);

	return($line[0]);
};





/**
**name CLIENT_getNamebyIP($ip)
**description returns the clientname from a selected ip
**parameter ip: ip of the client
**/
function CLIENT_getNamebyIP($ip)
{
	CHECK_FW(CC_ip, $ip);
	$sql = "SELECT client FROM `clients` WHERE ip='$ip'";

	$result=DB_query($sql); //FW ok

	$line=mysqli_fetch_row($result);

	return($line[0]);
};





//m23customPatchBegin type=change id=CLIENT_getMACTSbyName
//m23customPatchEnd id=CLIENT_getMACTSbyName





/**
**name CLIENT_getMACbyName($clientName)
**description returns the mac from a selected clientname
**parameter clientName: name of the client
**/
function CLIENT_getMACbyName($clientName)
{
	CHECK_FW(CC_clientname, $clientName);
	$sql = "SELECT mac FROM `clients` WHERE client='$clientName'";

	$result=DB_query($sql); //FW ok

	$line=mysqli_fetch_row($result);

	return($line[0]);
}





/**
**name CLIENT_sshFetchJob($clientName, $ip = false)
**description Connects to the client via SSH and lets the next job fetch and execute it in a screen (named "m23install").
**parameter clientName: name of the client
**parameter ip: Optional parameter for the client's IP (faster than getting the IP by the client name)
**/
function CLIENT_sshFetchJob($clientName, $ip = false)
{
	if ($ip === false)
		$ip = CLIENT_getIPbyName($clientName);

	$cmd="sudo ssh -o ConnectTimeout=3 -o VerifyHostKeyDNS=no -o PreferredAuthentications=publickey -o PasswordAuthentication=no -o CheckHostIP=no -o BatchMode=yes -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -l root $ip \"screen -dmS m23install /sbin/m23fetchjob ".getServerIP()."\" > /dev/null 2> /dev/null &";
	system($cmd);
}





/**
**name CLIENT_backToRed($clientName)
**description Sets a client back to red state, as it was just after adding it.
**parameter clientName: name of the client
**/
function CLIENT_backToRed($clientName)
{
	//Delete all client jobs
	CHECK_FW(CC_clientname, $clientName);
	DB_query("DELETE FROM clientjobs WHERE client='$clientName';"); //FW ok

	//Add a new presetup job
	PKG_addJob($clientName,"m23Presetup",0,"");

	//Start desaster recovery without adding new packages
	CLIENT_desasterRecovery($clientName, false, false);
}





/**
**name CLIENT_desasterRecovery($clientName, $addInstallRemovalJobs = true, $addShutdownOrRebootPackage = true)
**description recover a client: all client jobs are done again, status is set to 0
**parameter clientName: name of the client
**parameter addInstallRemovalJobs: If set to true, the names of all installed packages will be combined to a m23normal and all revomed to a m23normalRemove job.
**parameter addShutdownOrRebootPackage: If set to true, a shutdown or reboot package will be added.
**/
function CLIENT_desasterRecovery($clientName, $addInstallRemovalJobs = true, $addShutdownOrRebootPackage = true)
{
	// Timestamp for adding the job
	$addtime = time();

	CHECK_FW(CC_clientname, $clientName);
	// Set all packages from the client to status waiting
	$sql = "UPDATE `clientjobs` SET status='waiting', addtime='$addtime', finishtime='-1' WHERE client='$clientName'";
	DB_query($sql); //FW ok

	// Set m23createImage jobs to status done, so they won't be executed during recovery
	$sql = "UPDATE `clientjobs` SET status='done' WHERE client='$clientName' AND package='m23createImage'";
	DB_query($sql); //FW ok

	// Set statuscode of the client to 0
	$sql = "UPDATE `clients` SET status = '0' WHERE client = '$clientName'";
	DB_query($sql); //FW ok

	$CFDiskBasicO = new CFDiskBasic($clientName);
	$CFDiskBasicO->resetWantedPartitioning();

	if ($addInstallRemovalJobs)
	{
		#remove all installation and removal jobs
		PKG_rmAllSpecialPackagesByName($clientName,"m23normal");
		PKG_rmAllSpecialPackagesByName($clientName,"m23normalRemove");
	
		//create a package installation job to add all installed packages again
		$instpkgs = PKG_getClientPackages($clientName, "", false, DEBPKGSTAT_installed);
		if (!empty($instpkgs))
			PKG_addNormalJob($clientName,$instpkgs);
	
		//create a package removal job to remove all deinstalled packages again
		$rmpkgs = PKG_getClientPackages($clientName, "", false, DEBPKGSTAT_removed);
		if (!empty($rmpkgs))
			PKG_rmNormalJob($clientName,$rmpkgs);
		$purgepkgs = PKG_getClientPackages($clientName, "", false, DEBPKGSTAT_purge);
		if (!empty($purgepkgs))
			PKG_rmNormalJob($clientName,$purgepkgs);
	}

	deleteClientLogs($clientName);
	CLIENT_removeServerCache($clientName);
	CLIENT_resetAndInstall($clientName);
	if ($addShutdownOrRebootPackage)
		PKG_addShutdownOrRebootPackage($clientName);
}





/**
**name CLIENT_recoverClientCombineJobs($clientName)
**description Recover a client: all client jobs are done again, status is set to 0, all identical jobs are combines.
**parameter clientName: name of the client
**/
function CLIENT_recoverClientCombineJobs($clientName)
{
	CHECK_FW(CC_clientname, $clientName);
	CLIENT_desasterRecovery($clientName, false);
	PKG_removeDuplicatedIdenticalJobs($clientName);
}





/**
**name CLIENT_wol($clientName)
**description wakes a client over the network
**parameter clientName: name of the client
**/
function CLIENT_wol($clientName)
{
	$mac=CLIENT_getMACbyName($clientName);

	$newMac=CLIENT_convertMac($mac, ":");

	exec("sudo etherwake ".$newMac." ");
}





/**
**name CLIENT_recalculateStatusBar($clientName)
**description Recalculates the percent points for the pending jobs on a client.
**parameter clientName: name of the client
**/
function CLIENT_recalculateStatusBar($clientName)
{
	HTML_setStatusBarPercentPointByName("installStatus", $clientName, true);
}





/**
**name CLIENT_resetStatusBar($clientName)
**description Resets the percent points to 0 for the pending jobs on a client.
**parameter clientName: name of the client
**/
function CLIENT_resetStatusBar($clientName)
{
	HTML_setStatusBarPercentPointByName("installStatus", $clientName, false);
}





/**
**name CLIENT_startInstall($clientName)
**description starts the installation on a client
**parameter clientName: name of the client
**/
function CLIENT_startInstall($clientName)
{
	CLIENT_resetStatusBar($clientName);
	CLIENT_startLiveScreenRecording($clientName);
	if ( CLIENT_isrunning($clientName) )
		CLIENT_sshFetchJob($clientName);
	else
		CLIENT_wol($clientName);
};





/**
**name CLIENT_resetAndInstall($clientName)
**description Resets or wakes the client to boot from network and run jobs
**parameter clientName: name of the client
**/
function CLIENT_resetAndInstall($clientName)
{
	CLIENT_resetStatusBar($clientName);
	DHCP_activateBoot($clientName, true);
	CLIENT_startLiveScreenRecording($clientName);
	if (CLIENT_isrunning($clientName))
		CLIENT_reset($clientName);
	else
		CLIENT_wol($clientName);
}





/**
**name CLIENT_getBootType($clientName)
**description gets the type of network boot (pxe, etherboot)
**parameter clientName: name of the client
**/
function CLIENT_getBootType($clientName)
{
	CHECK_FW(CC_clientname, $clientName);
	$sql="SELECT dhcpBootimage FROM `clients` WHERE client='$clientName'";

	$result=DB_query($sql); //FW ok

	$line=mysqli_fetch_row($result);

	return($line[0]);
}





/**
**name CLIENT_isrunning($clientName)
**description tests out wether a client is up (running) or not
**parameter clientName: name of the client
**/
function CLIENT_isrunning($clientName)
{
	$ip=CLIENT_getIPbyName($clientName);
	return(pingIP($ip));
//	return(CLIENT_isDedicatedAndReachable($clientName));
}





/**
**name CLIENT_reset($clientName)
**description resets a client
**parameter clientName: name of the client
**/
function CLIENT_reset($clientName)
{
	CLIENT_executeOnClientOrIP($clientName, 'm23install', '/sbin/reboot -f; /sbin/reboot; reboot -f; reboot');
}





/**
**name CLIENT_showLastLogError($clientName)
**description Prints the last error in the client log
**parameter clientName: name of the client
**/
function CLIENT_showLastLogError($clientName)
{
	CHECK_FW(CC_clientname, $clientName);

	$sql = "SELECT logtime, status FROM `clientlogs`
		WHERE client = '$clientName'
		AND STATUS REGEXP '(^|\n)E:' AND logtime = (
			SELECT logtime FROM `clientlogs`
			WHERE client = '$clientName'
			AND STATUS REGEXP '(^|\n)E:'
			ORDER BY logtime DESC
			LIMIT 1
		)
		ORDER BY id";

	CLIENT_showLog($clientName, $sql);
}





/**
**name CLIENT_showLog($clientName)
**description prints the log information of the client
**parameter clientName: name of the client
**/
function CLIENT_showLog($clientName, $sql = NULL)
{
	CHECK_FW(CC_clientname, $clientName);
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	if (!isset($sql))
		$sql="SELECT logtime, status FROM `clientlogs` WHERE client='$clientName' ORDER BY id";

	$result=DB_query($sql); //FW ok

	echo("<table align=\"center\"><tr><td><div class=\"subtable_shadow\">
<table class=\"subtable\" align=\"center\">
		<tr>
		<td><span class=\"subhighlight\">$I18N_time</span></td>
		<td><span class=\"subhighlight\">$I18N_information</span></td>
		<td><span class=\"subhighlight\">$I18N_status</span></td>
		</tr>");

while ($line=mysqli_fetch_row($result))
	   {
			$loglines=explode("\n",CHECK_db2text(urldecode($line[1])));

			//split the entry in message and status
			if (strpos($loglines[0], '�') !== false)
				$splitter = '�';
			else
				$splitter = '?';

			$logStatus = explode($splitter, $loglines[0]);

			//color the
			$color="subhighlight_yellow";
			
			if (isset($logStatus[1]))
			{
				if ($logStatus[1]==" ok")
					$color="subhighlight_green";
					elseif ($logStatus[1]==" failure")
						$color="subhighlight_red";
			}
			
			//if it has no status, it may be a logfile
			if ($color=="subhighlight_yellow")
				{
				$message="";
	
				for ($i=0; $i < count($loglines)-1; $i++)
					{
						//check for an log error and color it red
						$pos=strpos($loglines[$i],"E:");
						$errorLine=(!($pos === false) && ($pos < 3));
						
						$pos=strpos($loglines[$i],"Fatal error");
						$errorLine=$errorLine || (!($pos === false));
						
						if ($errorLine)
							$message.="</span><span class=\"subhighlight_red\">".$loglines[$i]."</span><span class=\"$color\"><br>";
						else
							$message.=$loglines[$i]."<br>";
					};  
	
				echo("<tr>
				<td valign=\"top\">".gmstrftime ("%d.%m.%Y %H:%M", $line[0])."</td>
				<td colspan=\"2\"><span class=\"$color\"><pre>$message</pre></span></td>
				</tr>");
				}
				else
				{//it's a normal status
				echo("<tr>
				<td>".gmstrftime ("%d.%m.%Y %H:%M", $line[0])."</td>
				<td><span class=\"$color\">$logStatus[0]</span></td>
				<td><span class=\"$color\">$logStatus[1]</span></td>
				</tr>");
				};
	   }

 echo("</table></div></td><tr></table>");
}





/**
**name CLIENT_getClientName()
**description returnes the client name of the calling client or the client given by its ID ($_GET['m23clientID']).
**/
function CLIENT_getClientName()
{
	$clientIP = $_SERVER['REMOTE_ADDR']; // getenv('REMOTE_ADDR');
// 	HELPER_logToFile('/tmp/REMOTE_ADDR.log', "CLIENT_getClientName: $clientIP");
	$sql = '';


	//Check if a m23shared client exists and give it out directly if there is one.
	if (isset($_SESSION['m23Shared_clientName']{1}))
		return($_SESSION['m23Shared_clientName']);
	elseif (isset($_GET['m23clientID']))
	{
		if (is_numeric($_GET['m23clientID']))
		{
			CHECK_FW(CC_id, $_GET['m23clientID']);

			// Requests from localhost/m23server may set any client ID
			if (('127.0.0.1' == $clientIP) || (getServerIP() == $clientIP))
				$sql = "SELECT client FROM `clients` WHERE id='$_GET[m23clientID]';";
			else
			{
				// Check, if the client uses dynamic IP assignment
				$clientO = new CClient($_GET['m23clientID'], CClient::CHECKMODE_MUSTEXIST);
				if ($clientO->usesDynamicIP() || SERVER_isHandleAllClientsAsDynamicEnabled())
					// Clients with dynamic IPs are identified by client id (Needed for MSR_curDynIP)
					$sql = "SELECT client FROM `clients` WHERE id='$_GET[m23clientID]';";
				else
				// Request from other IPs must match wanted client ID and client IP
					$sql = "SELECT client FROM `clients` WHERE id='$_GET[m23clientID]' AND ip='$clientIP';";
			}
		}
		else
		{
			CHECK_FW(CC_clientname, $_GET['m23clientID']);

			// Requests from localhost/m23server may set any client name
			if (('127.0.0.1' == $clientIP) || (getServerIP() == $clientIP))
				$clientName = $_GET['m23clientID'];
			else
			// Request from other IPs must match wanted client name and client IP
				$sql = "SELECT client FROM `clients` WHERE client='$_GET[m23clientID]' AND ip='$clientIP';";
		}
	}
	else
	{
		CHECK_FW(CC_ip, $_SERVER['REMOTE_ADDR'] /*getenv('REMOTE_ADDR')*/);
		$sql="SELECT client FROM `clients` WHERE ip='$clientIP';";
	}

	if (isset($sql{1}))
	{
		$result = DB_query($sql); //FW ok
		$line = mysqli_fetch_row($result);
		$clientName = $line[0];
	}

	if (!isset($clientName{1}))
		die('echo "ERROR: This machine could not be identified by IP or other features as m23 client.
Please have a look into the m23 manual and see what you could do, to fix this problem."
CLIENT_getClientName: No client name could be found.
exit 1');

	return($clientName);
}




/**
**name CLIENT_getAllOptions($clientName)
**description gets all options from the options column of a client as associative array
**parameter clientName: name of the client
**/
function CLIENT_getAllOptions($clientName)
{
	CHECK_FW(CC_clientname, $clientName);
	$sql="SELECT options FROM `clients` WHERE client='$clientName'";

	$result=DB_query($sql); //FW ok

	$line=mysqli_fetch_row($result);

	return(explodeAssoc("?",$line[0]));
};





/**
**name CLIENT_setAllOptions($clientName,$options)
**description sets all options in the options column of a client
**parameter clientName: name of the client
**parameter options: the options as associative array
**/
function CLIENT_setAllOptions($clientName,$options)
{
	CHECK_FW(CC_clientname, $clientName);
// 	$optionsStr = implodeAssoc("?",$options);
	$optionsStr = serialize($options);

	$sql="UPDATE `clients` SET `options` = '$optionsStr' WHERE `client` = '$clientName' LIMIT 1";

	$result=DB_query($sql);
};





/**
**name CLIENT_getAllAskingOptions()
**description gets all options from the options column of the calling client as associative array
**/
function CLIENT_getAllAskingOptions()
{
	return(CLIENT_getAllOptions(CLIENT_getClientName()));
}





/**
**name CLIENT_getSetOption($getvar, $optvar, $options)
**description checks if a variable is set and places its value under the variable name in the options array
**parameter options: name of the options array
**/
function CLIENT_getSetOption($getvar,$optvar,$options)
{
	if (isset($getvar) && (!isset($_GET['BUT_load_preference'])))
		$options[$optvar]=$getvar;

	return($options);
}





/**
**name CLIENT_options2HiddenForm( $options)
**description generates hidden fields with the values of the option array
**parameter options: name of the options array
**/
function CLIENT_options2HiddenForm($options)
{
	if (count($options)==0)
		return("");

	$keys=array_keys($options);
	$values=array_values($options);

	$code="";
	$counter=0;

	for ($i=0; $i < count($options); $i++)
		if (strlen($keys[$i])>0)
		{
			$code.="<input type=\"hidden\" name=\"OPT_$counter\" value=\"".$keys[$i]."?#*".$values[$i]."\">\n";
			$counter++;
		}

	$code.="<input type=\"hidden\" name=\"OPT_count\" value=\"".$counter."\">\n";

	return($code);
};





/**
**name CLIENT_hiddenForm2options( $options)
**description reads the option values of the hidden fields and adds them to the options array
**parameter options: name of the options array
**/
function CLIENT_hiddenForm2options($options)
{
	for ($i=0; $i < $_GET['OPT_count']; $i++)
		{
			$var_name=explode("?#*",$_GET["OPT_".$i]);

			$options[$var_name[0]]=$var_name[1];
		};

	return($options);
};





/**
**name CLIENT_getStatusimage( $status)
**description return the image name with the correct color
**parameter status: the status that should be converted to an image
**/
function CLIENT_getStatusimage($status)
{
	$statusimage = "/gfx/status/";

	switch ($status)
	{
		case STATUS_RED: $statusimage.="red.png"; break;
		case STATUS_YELLOW: $statusimage.="yellow.png"; break;
		case STATUS_GREEN: $statusimage.="green.png"; break;
		case STATUS_BLUE: $statusimage.="blue.png"; break;
		case STATUS_CRITICAL: $statusimage.="critical.png"; break;
		case STATUS_DEFINE: $statusimage.="white.png"; break;
		case CClient::STATUS_BLOCKED: $statusimage.="blocked.png"; break;
		
		default: $statusimage.="black.png";
	};

	return($statusimage);
};





/**
**name CLIENT_showStatusSelection( $client)
**description shows a dialog that lets you select the current status of a client
**parameter client: the name of the client
**/
function CLIENT_showStatusSelection($client, $id)
{
	CHECK_FW(CC_clientname, $client);
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$code = '';

	//get the current client status
	$sql = "SELECT status FROM `clients` WHERE client='$client'";

	$result = DB_query($sql); //FW ok
	$line = mysqli_fetch_array($result);

	//check if the client name (and id) is given or should be read from the form POST
	if (!isset($client))
		$client = $_POST['client'];
	if (!isset($id))
		$id = $_POST['id'];

	//Create checkbox for network booting
	$networkBoot = HTML_checkBox('CB_networkBoot', $I18N_activateNetBooting, DHCP_isNetworkBootingActive($client));

	$status = $line['status'];

	if (HTML_submit('BUT_save',$I18N_save))
	{
		$status = $_POST['RB_status'];
		CHECK_FW(CC_clientname, $client, CC_status, $status);

		$sql="UPDATE `clients` SET status='$status' WHERE client='$client'";

		$result = DB_query($sql); //FW ok

		DHCP_activateBoot($client, $networkBoot);
	}

	//create the radio buttons with the correct colors and status codes
	for ($i=0; $i < 6; $i++)
	{
		$statusimage = CLIENT_getStatusimage($i);

		if ($i == $status)
			$checked="checked";
			else
			$checked="";

		$code.="
		<input type=\"radio\" name=\"RB_status\" value=\"$i\" $checked>

		<img src=\"$statusimage\" border=\"0\"><br>\n";
	}


HTML_showFormHeader();
	HTML_showTableHeader(true);	
	echo("
	<td>
		<input type=\"hidden\" name=\"client\" value=\"$client\">
		<input type=\"hidden\" name=\"id\" value=\"$id\">
		$code".CB_networkBoot."<br><br>
		<center>
			".BUT_save."
		</center>
	</td>");

	HTML_setPage('clientstatus');
	HTML_showTableEnd(true);
HTML_showFormEnd();
}





/**
**name CLIENT_listClientsInWarningMessageBox($clients, $header)
**description Lists clients in a warning message box with links to their detailed pages.
**parameter clients: Array with the client names to list.
**parameter header: Heading of the warning box.
**returns true, if there are client names to list, false otherwise.
**/
function CLIENT_listClientsInWarningMessageBox($clients, $header)
{
	if (is_array($clients) && (count($clients) > 0))
	{
		$message = "
				<table>
					<tr>
						<td>
		";

		foreach ($clients as $clientName)
		{
			$clientID = CLIENT_getId($clientName);
			$message .= "&bull; <a href=\"index.php?page=clientdetails&client=$clientName&id=$clientID\">$clientName</a><br>";
		}

		$message .= "
						</td>
					</tr>
				</table>";

		MSG_showMessageBox($message,"warningtable",$header,120);

		return(true);
	}
	else
		return(false);
}





/**
**name CLIENT_listClientsWithDelays()
**description Lists clients in a warning message box, that are having delayed jobs.
**/
function CLIENT_listClientsWithDelays()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$clientUpdateJobsMaxAllowedDelay = SERVER_getWarnWhenUpdateJobsAreDelayed();

	if ($clientUpdateJobsMaxAllowedDelay > 0)
	{
		$clientsWithDelayedUpdateJobs = PKG_getClientsWithDelayedUpdateJobs($clientUpdateJobsMaxAllowedDelay * 60);
		CLIENT_listClientsInWarningMessageBox($clientsWithDelayedUpdateJobs, $I18N_clientsWithDelayedUpdateJobs);
	}
}








/**
**name CLIENT_listClientsWithDelayedReboots()
**description Lists clients in a warning message box, that are having delayed reboot requests.
**/
function CLIENT_listClientsWithDelayedReboots()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$clientRebootMaxAllowedDelay = SERVER_getWarnWhenClientRebootsRequestedByPackagesAreDelayed();

	if ($clientRebootMaxAllowedDelay > 0)
	{
		$clientsWithDelayedReboots = CLIENT_getClientsWithDelayedReboots($clientRebootMaxAllowedDelay * 60);
		CLIENT_listClientsInWarningMessageBox($clientsWithDelayedReboots, $I18N_clientsWithDelayedReboots);
	}
}





/**
**name CLIENT_listCriticalClients()
**description lists clients with critical status'
**/
function CLIENT_listCriticalClients()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	$sql="SELECT count(*) FROM `clients` WHERE status=\"".STATUS_CRITICAL."\"";
	
	$result=DB_query($sql);	//FW ok
	
	$line=mysqli_fetch_array($result);
		
	if ($line[0] > 0)
	{
		$groupHTML = '';
	
		foreach (CLIENT_criticalClientAmountInGroups() as $groupname => $criticalClientAmount)
			$groupHTML .= "<a href=\"?page=clientsoverview&groupname=$groupname&action=critical\">".$groupname." ($criticalClientAmount)</a></br>";
	
			$message="
				<table>
					<tr>
						<td>
							<a href=\"index.php?page=clientsoverview&action=critical\">
								<img src=\"/gfx/error.png\">
								".$line[0]." $I18N_clients
							</a></br></br>

							<span class=\"subhighlight\">$I18N_inGroup</span></br></br>
							$groupHTML
						</td>
					</tr>
				</table>";

			MSG_showMessageBox($message,"errortable",$I18N_criticalClients,120);
	}
}





/**
**name CLIENT_criticalClientAmountInGroups()
**description Checks for critical clients in all groups and generates an associative array about groups with critical clients.
**returns Associative array with all groupnames as key and the amount of the critical clients as value. Only groups with critical clients are added to the output array.
**/
function CLIENT_criticalClientAmountInGroups()
{
	$out = array();

	// Run thru the groups
	foreach (GRP_listGroups() as $groupname)
	{
		// Get the amount of critical clients in each group
		$res = CLIENT_query("=",STATUS_CRITICAL,"","",$groupname);
		$criticalClientAmount = mysqli_num_rows($res);

		// Add the amount of critical clients (if there are any) to the output array
		if ($criticalClientAmount > 0)
			$out[$groupname] = $criticalClientAmount;
	}

	return($out);
}





/**
**name CLIENT_isInDebugMode($clientName)
**description returnes "true", if a client is in debug mode
**parameter clientName: name of the client
**/
function CLIENT_isInDebugMode($clientName)
{
	$ip=CLIENT_getIPbyName($clientName);
	return (RMV_get4IP("debug",$ip)==1);
};





/**
**name CLIENT_toggleDebugMode($clientName)
**description en/disables the debug mode of a client
**parameter clientName: name of the client
**parameter enable: set to "true" to activate debug mode or to "false" to disable
**/
function CLIENT_toggleDebugMode($clientName,$enable)
{
	if ($enable)
		$value=1;
	else
		$value=0;
		
	$ip=CLIENT_getIPbyName($clientName);	

	RMV_set4IP("debug", $value, $ip);
};





/**
**name CLIENT_getStatusimage( $status)
**description return the image name with the correct color
**parameter status: the status that should be converted to an image
**/
function CLIENT_getDebugimage($status)
{
	if ($status==1)
		return("/gfx/status/debug.png");
	else
		return(FALSE);
}





/**
**name CLIENT_generateHTMLDelayStatus($clientName, $clientID, $clientUpdateJobsMaxAllowedDelay, $clientRebootMaxAllowedDelay)
**description Generates icons for showing the delayed status of a clinet.
**parameter clientName: Name of the client.
**parameter clientID: ID of the client.
**parameter clientUpdateJobsMaxAllowedDelay: The maximum tolerable amount of running/waiting time (in minutes) to finish update jobs since adding it or 0, to disable.
**parameter clientRebootMaxAllowedDelay: The maximum tolerable amount of time since requesting the reboot.
**returns Associative array containg HTML code and tooltip 
**/
function CLIENT_generateHTMLDelayStatus($clientName, $clientID, $clientUpdateJobsMaxAllowedDelay, $clientRebootMaxAllowedDelay)
{
	if (($clientUpdateJobsMaxAllowedDelay <= 0) && ($clientRebootMaxAllowedDelay <= 0)) return('');

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	$html = '';
	$statusimage = "/gfx/status/";

	if (PKG_getDelayedJobsAmount($clientName, $clientUpdateJobsMaxAllowedDelay * 60, 'waiting', 'm23update') > 0)
		$html .= "<img border=\"0\" src=\"$statusimage/updatesDelayed.png\" title=\"$I18N_warningUpdateIsDelayed\">";
		
	if (CLIENT_isRebootDelayed($clientName, $clientRebootMaxAllowedDelay * 60) > 0)
		$html .= "<img border=\"0\" src=\"$statusimage/rebootDelayed.png\" title=\"$I18N_warningRebootIsDelayed\">";

	if (isset($html{1}))
		return("<a href=\"index.php?page=changeJobs&id=$clientID&client=$clientName\">$html</a>");
	else
		return('');
}





/**
**name CLIENT_generateHTMLStatusBar($clientName, $id, $status, $vmRole, $vmSoftware)
**description generates HTML code containing the status of the client with links to the pages
**parameter clientName: Name of the m23 client
**parameter id: ID of the m23 client
**parameter status: Status (number, green, red, ...) of the client.
**parameter vmRole: Role of the m23 client (host, guest, no virtualisation)
**parameter vmSoftware: Number of the used virtualisation software.
**/
function CLIENT_generateHTMLStatusBar($clientName, $id, $status, $vmRole, $vmSoftware)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$statusimage = CLIENT_getStatusimage($status);

	//Get the status of the debug mode and
	$debugimage = CLIENT_getDebugimage(CLIENT_isInDebugMode($clientName));
	$vmStatusIcons = VM_statusIcons($clientName, $id, $vmRole, $vmSoftware);

	$html="<a href=\"index.php?page=clientstatus&client=$clientName&id=$id\"> <img border=\"0\" src=\"$statusimage\"></a>
	";

	if ($debugimage != FALSE)
		$html.="<a href=\"index.php?page=clientdebug&client=$clientName&id=$id\"> <img border=\"0\" src=\"$debugimage\" title=\"$I18N_debuggingEnabled\"></a>
	";

	$html .= $vmStatusIcons;

	return($html);
}





/**
**name CLIENT_showDebugSelection( $client)
**description shows a dialog that lets you select the current debug state of a client
**parameter client: the name of the client
**/
function CLIENT_showDebugSelection($client)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//check if the client name if it should be read from the form
	if (!isset($client))
		$client=$_GET['client'];

	if (isset($_GET['BUT_save']))
	{
		if ($_GET['RB_Debug'] == "on")
			CLIENT_toggleDebugMode($client,true);
		else
			CLIENT_toggleDebugMode($client,false);
	}

	$debugState = CLIENT_isInDebugMode($client);

	if ($debugState)
	{
		$checkedOn="checked";
		$checkedOff="";
	}
	else
	{
		$checkedOff="checked";
		$checkedOn="";
	}

		$code.="
			<input type=\"radio\" name=\"RB_Debug\" value=\"on\" $checkedOn> $I18N_activate<br>
			<input type=\"radio\" name=\"RB_Debug\" value=\"off\" $checkedOff> $I18N_deactivate\n";

		HTML_showTableHeader(true);
		HTML_showFormHeader("","get");
		HTML_setPage('clientdebug');

		echo("
			<input type=\"hidden\" name=\"client\" value=\"$client\">
			<input type=\"hidden\" name=\"id\" value=\"$_GET[id]\">
				<tr>
					<td>
						<br>
						$code<br><br>
						<center>
						<input type=\"submit\" name=\"BUT_save\" value=\"$I18N_save\">
						</center>
					</td>
				</tr>
		");

		HTML_showFormEnd();
		HTML_showTableEnd(true);
};





/**
**name CLIENT_isInRescueMode($clientName)
**description checks if a clients has waiting rescue packages
**parameter clientName: the name of the client
**/
function CLIENT_isInRescueMode($clientName)
{
	return(PKG_countSpecialPackages($clientName,"m23Rescue","waiting")>0);
};





/**
**name CLIENT_showDirectConnectionHelp($clientName,$language)
**description returnes the help file for directConnection and replaces place holders with the correct values
**parameter clientName: the name of the client
**parameter language: language for the help file
**/
function CLIENT_showDirectConnectionHelp($clientName,$language)
{
	$ip=CLIENT_getIPbyName($clientName);
	$allOptions=CLIENT_getAllOptions($clientName);

	$help=HELP_getHelpString("client_directConnection",$language);

	$help=str_replace("NETROOTPWD",$allOptions['netRootPwd'],$help);	
	$help=str_replace("CLIENTIP",$ip,$help);

	return($help);
};





/**
**name CLIENT_isInDebugMode($clientName)
**description returnes "true", if the asking client is in debug mode
**/
function CLIENT_isAskingInDebugMode()
{
	$ip = CLIENT_getIPbyName(CLIENT_getClientName());
	return (RMV_get4IP("debug",$ip)==1);
};



/**
**name CLIENT_getToDetailsURL($clientName,$id,$section)
**description Generates the link to the client's control center page
**parameter clientName: the name of the client
**parameter id: the id of the client
**parameter section: section to jump on the page
**returns Link to the client's control center page
**/
function CLIENT_getToDetailsURL($clientName,$id,$section)
{
	return("index.php?page=clientdetails&client=$clientName&id=$id#$section");
}





/**
**name CLIENT_HTMLBackToDetails($clientName,$id,$section)
**description generates HTML code for returning to the client controll center page
**parameter clientName: the name of the client
**parameter id: the id of the client
**parameter section: section to jump on the page
**/
function CLIENT_HTMLBackToDetails($clientName,$id,$section)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$url = CLIENT_getToDetailsURL($clientName,$id,$section);
	
	echo("<br><a href=\"$url\"><img src=\"/gfx/settings.png\"> $I18N_backToControlCenter <img src=\"/gfx/settings.png\"></a><br>");
};





/**
**name CLIENT_getId($clientName)
**description returnes the id of a client
**parameter clientName: the name of the client
**/
function CLIENT_getId($clientName)
{
	return(CLIENT_getProperty($clientName,"id"));
};





/**
**name CLIENT_query($o1,$s1,$o2,$s2,$groupName="",$o3="",$s3="", $search="")
**description returnes the result of a query for getting all clients matching selected states and groupNames. Empty values are interpreted as 'all' for this kind of value.
**parameter o1: operator 1 (can be '=', '<', '>') selects of the first state should be equal, smaler or bigger that the state in s1
**parameter s1: first state to compare with the state of the client
**parameter o2: operator 2
**parameter s2: second state to compare
**parameter groupName: if you want to filter for special group, set it to the group name
**parameter o3: operator 3
**parameter s3: third state to compare
**parameter search: Search string to search all clients for and only list matching clients or all if $search is empty.
**/
function CLIENT_query($o1,$s1,$o2,$s2,$groupName="",$o3="",$s3="", $search="")
{
	CHECK_FW(CC_statusOrEmpty, $s1, CC_statusOrEmpty, $s2, CC_statusOrEmpty, $s3, "se", $search, CC_groupnameOrEmpty, $groupName, CC_biggerEqualSmaler, $o1, CC_biggerEqualSmaler, $o2, CC_biggerEqualSmaler, $o3);

	$cg = '';
	$parts = 0;

	//If all clients running on a special VM host should be searched, no search string is allowed
	if (isset($_GET['vmRunOnHost']))
		$search = '';
		
	$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : '';
	$direction = isset($_GET['direction']) ? $_GET['direction'] : '';
	$w = $and = '';
		
	//generate the SQL commands that should be added for sorting
	switch ($orderBy)
	{
		case "status":
			$orderBy="clients.status";
			break;
		case "name":
			$orderBy="clients.client";
			break;
		case "installdate":
			$orderBy="clients.installdate";
			break;
		case "lastchange":
			$orderBy="clients.lastmodify";
			break;
		case "ip":
			$orderBy="clients.ip";
			break;
		case "mac":
			$orderBy="clients.mac";
			break;
		case "group":
			$orderBy="clients.mac";
			break;
		default:
			$orderBy="clients.client";
	}

	//add SQL command for sorting direction
	switch ($direction)
	{
		case "desc":
			$direction="DESC";
			break;
		default:
			$direction="ASC";
	}

	$where="WHERE";
	$wArray=array();

	//Check if all fields should be searched with LIKE
	if (!empty($search))
	{
		$firstSearchEntry = true;

		$searchSQL = "";
		foreach (DB_getLikeableColumns("clients") as $field)
		{
			if ($firstSearchEntry)
			{
				$searchSQL .= "($field LIKE \"%$search%\") ";
				$firstSearchEntry = false;
			}
			else
				$searchSQL .= "|| ($field LIKE \"%$search%\") ";
		}
		$wArray[]=$searchSQL;
	}

	//check if there should be selected clients in a special group only
	if (!empty($groupName))
	{
		$gid = GRP_getIdByName($groupName);	
		$gSQL="clients.id=clientgroups.clientid AND clientgroups.groupid=$gid";
			$wArray[]=$gSQL;
		$cg=", clientgroups";
		};

	//add SQL statements for the  first part
	if (!empty($s1) && !empty($o1))
		$statusSQL = "status $o1 '$s1' ";

	//add SQL statements for the second part	
	if (!empty($s2) && !empty($o2))
		$statusSQL .= "OR status $o2 '$s2' ";
		
	//add SQL statements for the third part
	if (!empty($s3) && !empty($o3))
		$statusSQL .= "OR status $o3 '$s3' ";

	if (!empty($statusSQL))
		$wArray[] = "$statusSQL";

	//Check if "vmRunOnHost" is set and add the statement
	if (isset($_GET['vmRunOnHost']))
		$wArray[] = "clients.vmRunOnHost = $_GET[vmRunOnHost]";

	//disable the WHERE clause if there are no AND or OR filters
	if (empty($wArray)) {
		$where="";
	} else {
		$w = "(" . implode(") AND (",$wArray) . ")";
	}

	$sql="SELECT clients.* FROM clients$cg $where $w ORDER BY $orderBy $direction";

	$res = DB_query($sql); //FW ok

	return($res);
};





/**
**name CLIENT_addChangeElement($elem, $serverOnlyElement = false)
**description Generates a HTML dialog element for changing a client property.
**parameter elem: Name of the element.
**parameter serverOnlyElement: Set to true if the element could only be changed in the DB and not on the server (e.g. a misspelled MAC)
**/
function CLIENT_addChangeElement($elem, $serverOnlyElement = false)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	if (isset($_SESSION['changeElements']))
	{
		if (strpos($_SESSION['changeElements'],"#$elem#") === false)
			$_SESSION['changeElements'] .= "$elem#";
	}
	else
		$_SESSION['changeElements'] = "$elem#";
		
	$htmlName = "RB_change_$elem";

	if (!isset($_SESSION['createChangeElements']) || !$_SESSION['createChangeElements'])
	{
		define($htmlName,"");
		return(false);
	}

	if ($serverOnlyElement)
		$clientHtml="<img src=\"/gfx/button_cancel-mini.png\">";
	else
		$clientHtml="<INPUT type=\"radio\" name=\"$htmlName\" value=\"cl\" title=\"$I18N_edit_client\">";

	define($htmlName,"
	<td>
		<INPUT type=\"radio\" name=\"$htmlName\" value=\"no\" title=\"$I18N_noChanges\" checked>
	</td>
	<td align=\"center\">
		$clientHtml
	</td>
	<td>
		<INPUT type=\"radio\" name=\"$htmlName\" value=\"db\" title=\"$I18N_writeInDB\">
	</td>");
}





/**
**name CLIENT_showDelDialog()
**description Shows the dialog for deleting a client.
**/
function CLIENT_showDelDialog()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	//Try to get the VM parameters for the client
	if (VM_getSWandHost($_SESSION['clientName']) === false)
	{
		//It's no VM client
		$deleteVM = false;
		$deleteVMHTML = "";
	}
	else
	{
		//Create a check box for deleting the VM together with the m23 client entry
		$deleteVM = HTML_checkBox("CB_deleteVM", $I18N_deleteVMToo, true);
		$deleteVMHTML = "
			<tr>
				<td align=\"center\">".CB_deleteVM."</td>
			</tr>";
	}

	HTML_logArea('TA_deM23Code', 100, 1, 'wget http://'.getServerIP().'/dem23Client.sh -O /tmp/dem23Client.sh; bash /tmp/dem23Client.sh');
	$dem23InfoHTML = "
	<tr>
		<td>$I18N_commandsForDem23ing:<br>
		".TA_deM23Code."</td>
	</tr>";


	//Check if the deletion button was pressed
	if (HTML_submit("BUT_delete",$I18N_delete))
		{
			CLIENT_deleteClient($_SESSION['clientName'], true, $deleteVM);
			HTML_showTableHeader(true);
			echo($dem23InfoHTML);
			HTML_showTableEnd(true);
		}
	else
		{
			echo("<span class=\"title\">$_SESSION[clientName] : $I18N_definite_delete_client</span><br><br>");
			CLIENT_showGeneralInfo($_SESSION['clientID']);
			HTML_showTableHeader(true);
			echo("
			<tr>
				<td>
					$I18N_should_the_client
					<span class=\"highlight\">$_SESSION[clientName]</span>
					$I18N_get_deleted
				</td>
			</tr>
			$deleteVMHTML
			<tr>
				<td align=\"center\">".BUT_delete."</td>
			</tr>
			");
			HTML_showTableEnd(true);

			HTML_showTableHeader(true);
			echo($dem23InfoHTML);
			HTML_showTableEnd(true);
		}
}





define("ADDDIALOG_normalAdd",0);
define("ADDDIALOG_defineOnly",1);
define("ADDDIALOG_changeClient",2);

/**
**name CLIENT_showAddDialog($addType)
**description shows the dialog for adding, defining or changing a client
**parameter addType: defines the behaviour and appearance of the dialog
**/
function CLIENT_showAddDialog($addType)
{
	$err = '';

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	if (isset($_GET['VM_host'])) $_SESSION['VM_host'] = $_GET['VM_host'];
	if (isset($_GET['VM_software'])) $_SESSION['VM_software'] = $_GET['VM_software'];
	if (isset($_GET['VM_dhcpBootimage'])) unset($_SESSION['preferenceSpace']);	//HACK to make sure, this is really read from GET

	$params['firstpw'] = $params['mac'] = $params['ip'] = $params['netmask'] = $params['gateway'] = $params['dns1'] =  $params['dns2'] = $params['client'] = $params['office'] = $params['name'] = $params['familyname'] = $params['eMail'] = $params['dhcpBootimage'] = $params['newgroup'] = '';

	$options['UCSNetwork'] = $options['nfshomeserver'] = $options['timeZone'] = $options['bootloader'] = $options['login'] = $options['arch'] = '';

	$changeClientExitDialog = $defineDisk = false;

//m23customPatchBegin type=change id=CLIENT_showAddDialog-ucsNetworkDemo
	$ucsNetworkDemo = false;
//m23customPatchEnd id=CLIENT_showAddDialog-ucsNetworkDemo

	$RB_change_Null = $rowDescription = $HTML_VM_ControlLink = '';

	// CSS color of the current row
	$rowColor = '';


	$colspanWithoutRadios=$colspan=2;
	switch($addType)
	{
		case ADDDIALOG_normalAdd:
			$submitLabel=$I18N_add;
			$page="addclient";
			//m23customPatchBegin type=change id=CLIENT_showAddDialogCaseADDDIALOG_normalAdd
			//m23customPatchEnd id=CLIENT_showAddDialogCaseADDDIALOG_normalAdd
			break;
		case ADDDIALOG_defineOnly:
			$submitLabel=$I18N_define;
			$page="addclient";
			break;
		case ADDDIALOG_changeClient:
			$RB_change_Null = "<td colspan=\"3\"></td>";
			$submitLabel=$I18N_edit_client;
			$page="editclient";

			//Empty all elements to change
			$_SESSION['changeElements'] = "";
			//Set to true to tell CLIENT_addChangeElement to create the HTML elements
			$_SESSION['createChangeElements'] = true;

			//Create descriptive row
			$rowDescription="
				<td align=\"center\" valign=\"bottom\"><img src=\"/gfx/mini_trash.png\" title=\"$I18N_noChanges\"></td>
				<td align=\"center\" valign=\"bottom\"><img src=\"/gfx/client-mini.png\" title=\"$I18N_edit_client\"></td>
				<td align=\"center\" valign=\"bottom\"><img src=\"/gfx/server-mini.png\" title=\"$I18N_writeInDB\"></td>";

			$colspan=5;
			$colspanWithoutRadios=2;

			$params=CLIENT_getParams($_SESSION['clientName']);
			$options=CLIENT_getAllOptions($_SESSION['clientName']);
			$installOptions = $options;

			//m23customPatchBegin type=change id=CLIENT_showAddDialogCaseADDDIALOG_changeClient
			//m23customPatchEnd id=CLIENT_showAddDialogCaseADDDIALOG_changeClient

			//Some settings (e.g. kernel) cannot be changed, if no distribution is choosen
			if (!isset($options['distr']{1}))
			{
				MSG_showError($I18N_distributionMustBeChoosenToEditTheClient);
				return(false);
			}

			break;
	}



	/*
		Define lots of dialog elements for values stored directly as parameters
	*/
	
	if (!empty($_GET['VM_client'])) $_POST['ED_client'] = $_GET['VM_client'];
	$client = HTML_storableInput("ED_client", "client", (isset($_GET['VM_client']) && !empty($_GET['VM_client'])) ? $_GET['VM_client'] : $params['client'], $installParams['client'], 20, 64);
// 		CLIENT_addChangeElement("client");
	HTML_storableInput("ED_office", "office", $params['office'], $installParams['office'], 20, 40);
		CLIENT_addChangeElement("office",true);
	
//m23customPatchBegin type=change id=CLIENT_showAddDialog-defaultName
	$defaultName = '';
//m23customPatchEnd id=CLIENT_showAddDialog-defaultName
	HTML_storableInput("ED_name", "name", empty($defaultName) ? $params['name'] : $defaultName, $installParams['name'], 20, 40);
		CLIENT_addChangeElement("name");
	HTML_storableInput("ED_familyname", "familyname", $params['familyname'], $installParams['familyname'], 20, 40);
		CLIENT_addChangeElement("familyname",true);
	HTML_storableInput("ED_eMail", "eMail", $params['eMail'], $installParams['eMail'], 20, 40);
		CLIENT_addChangeElement("eMail",true);

	//m23customPatchBegin type=change id=CLIENT_showAddDialogAdditionalFormularElementDefinition
	//m23customPatchEnd id=CLIENT_showAddDialogAdditionalFormularElementDefinition

	if (!isset($_SESSION['m23Shared']) || !$_SESSION['m23Shared'])
	{
		if (!empty($_GET['VM_mac'])) $_POST['ED_mac'] = $_GET['VM_mac'];
		
		echo('
		<script>
		function sanitizeMAC()
		{
			var ED_mac = document.getElementById("ED_mac");
			ED_mac.value = ED_mac.value.replace(/[^0-9a-fA-F]/g, "");
		}
		</script>
		');
		
		HTML_storableInput("ED_mac", "mac", !empty($_GET['VM_mac']) ? $_GET['VM_mac'] : $params['mac'], $installParams['mac'], 12, 17, INPUT_TYPE_text, 'onChange="sanitizeMAC();"');
			CLIENT_addChangeElement("mac",true);

		if ($ucsNetworkDemo && HELPER_isExecutedOnUCS())
		{
			$ucsnetworkList = UCS_getAllNetworkNames();
			HTML_storableSelection("SEL_UCSNetwork", "UCSNetwork", $ucsnetworkList, SELTYPE_selection, true, $options['UCSNetwork'], $installOptions['UCSNetwork'], 'onchange="disableNetworkOnDHCP(); chooseAmd64ArchitectureOnUEFIBootType();"');
		}

		$proposedIP = CLIENT_getNextFreeIp();
		HTML_storableInput("ED_ip", "ip", empty($params['ip']) ? $proposedIP : $params['ip'], $installParams['ip'], 16, 16);
			CLIENT_addChangeElement("ip");

		HTML_storableInput("ED_netmask", "netmask", empty($params['netmask']) ? getServerNetmask() : $params['netmask'], $installParams['netmask'], 16, 16);
			CLIENT_addChangeElement("netmask");
		HTML_storableInput("ED_gateway", "gateway", empty($params['gateway']) ? getServerGateway() : $params['gateway'], $installParams['gateway'], 16, 16);
			CLIENT_addChangeElement("gateway");
		$dns1dns2 = getDNSServers();
		HTML_storableInput("ED_dns1", "dns1", empty($params['dns1']) ? $dns1dns2[0] : $params['dns1'], $installParams['dns1'], 16, 16);
			CLIENT_addChangeElement("dns1");
		HTML_storableInput("ED_dns2", "dns2", empty($params['dns2']) ? $dns1dns2[1] : $params['dns2'], $installParams['dns2'], 16, 16);
			CLIENT_addChangeElement("dns2");
	}


//m23customPatchBegin type=change id=CLIENT_showAddDialog-defaultFirstPW
	$defaultFirstPW = ( empty($params['firstpw']) ? HELPER_passGenerator(8) : $params['firstpw'] );
//m23customPatchEnd id=CLIENT_showAddDialog-defaultFirstPW

	if (SERVER_get2xPasswordDialogEnabled())
		HTML_storable2xPassword("ED_firstpw", "firstpw", $defaultFirstPW, $installParams['firstpw'], 20, 20);
	else
		HTML_storableInput("ED_firstpw", "firstpw", $defaultFirstPW, $installParams['firstpw'], 20, 20);
	CLIENT_addChangeElement("firstpw");

//m23customPatchBegin type=change id=CLIENT_showAddDialog-defaultRootPW
	$defaultRootPW1x = HELPER_passGenerator(8);
	$defaultRootPW2x = '';
//m23customPatchEnd id=CLIENT_showAddDialog-defaultRootPW
	if (SERVER_get2xPasswordDialogEnabled())
		HTML_storable2xPassword("ED_rootpassword", "rootpassword", $defaultRootPW2x, $installParams['rootpassword'], 20, 20);
	else
		HTML_storableInput("ED_rootpassword", "rootpassword", $defaultRootPW1x, $installParams['rootpassword'], 20, 20);
	CLIENT_addChangeElement("rootpassword");

	$bootTypeList = CClient::getNetworkBootTypesArrayForSelection();
	$boottype = HTML_storableSelection("SEL_boottype", "boottype", $bootTypeList, SELTYPE_selection, true, isset($_GET['VM_dhcpBootimage']) ? $_GET['VM_dhcpBootimage'] : $params['dhcpBootimage'], $installParams['dhcpBootimage'], 'onchange="disableNetworkOnDHCP(); chooseAmd64ArchitectureOnUEFIBootType();"');
	$installParams['dhcpBootimage'] = $boottype;
		CLIENT_addChangeElement("boottype",true);

	$languageList = I18N_listClientLanguages("", false);
	// Get the default language, if the dialog was called the 1st time
	$defaultLang = empty($params['language']) ? $GLOBALS["m23_language"] : $params['language'];

	// Change 'en' => 'uk'
	$defaultLang = ($defaultLang == 'en') ? 'uk' : $defaultLang;
	$language = HTML_storableSelection("SEL_language", "language", $languageList, SELTYPE_selection, true, $defaultLang, $installParams['language']);
		CLIENT_addChangeElement("language");

	//Client group
	$groupList = HELPER_array2AssociativeArray(GRP_listGroups());
	HTML_storableMultiSelection("SEL_group", "newgroup", $groupList, SELTYPE_selection, 10, true, (empty($params['newgroup']) ? array('default') : $params['newgroup']), $installParams['newgroup']);


	/*
		Define lots of dialog elements for values stored in the options associative array
	*/
//m23customPatchBegin type=change id=CLIENT_showAddDialog-defaultLogin
	$defaultLogin = '';
//m23customPatchEnd id=CLIENT_showAddDialog-defaultLogin
	HTML_storableInput("ED_login", "login", empty($defaultLogin) ? $options['login'] : $defaultLogin, $installOptions['login'], 20, 32);
		CLIENT_addChangeElement("login");

	//Client architecture: 32 or 64 bits
	$archList = getArchList();
	HTML_storableSelection("SEL_arch", "arch", $archList, SELTYPE_selection, true, !empty($_GET['VM_arch']) ? $_GET['VM_arch'] : $options['arch'], $installOptions['arch']);
		CLIENT_addChangeElement("arch",true);

	//Bootloader:Grub
// LiLO or , "lilo" => "lilo"
	$bootloaderList = HELPER_getBootLoaders();
	HTML_storableSelection("SEL_bootloader", "bootloader", $bootloaderList, SELTYPE_selection, true, $options['bootloader'], $installOptions['bootloader']);
		CLIENT_addChangeElement("bootloader");

	//Proxy server and port
	HTML_storableInput("ED_packageProxy", "packageProxy", (empty($options['packageProxy']) && (!isset($_SESSION['m23Shared']) || !$_SESSION['m23Shared'])) ? getServerIP() : $options['packageProxy'], $installOptions['packageProxy'], 16, 16);
	HTML_storableInput("ED_packagePort", "packagePort", (empty($options['packagePort']) && (!isset($_SESSION['m23Shared']) || !$_SESSION['m23Shared'])) ? "2323" : $options['packagePort'], $installOptions['packagePort'], 5, 5);
		CLIENT_addChangeElement("proxy");

	//Timezone
	$timeZonesList = HELPER_array2AssociativeArray(HELPER_getTimeZones($language));
	HTML_storableSelection("SEL_timeZone", "timeZone", $timeZonesList, SELTYPE_selection, true, $options['timeZone'], $installOptions['timeZone']);
		CLIENT_addChangeElement("timeZone");

	if ((!isset($_SESSION['m23Shared']) || !$_SESSION['m23Shared']))
	{
		//LDAP servers and LDAP user and group IDs
		$ldapServerList = LDAP_listServers();
		HTML_storableSelection("SEL_ldapserver", "ldapserver", $ldapServerList, SELTYPE_selection, true, empty($options['ldapserver']) ? false : $options['ldapserver'],$installOptions['ldapserver']);
		HTML_storableInput("ED_userID", "userID", empty($options['userID']) ? LDAP_getNextUserID() : $options['userID'], $installOptions['userID'], 5, 6);
		HTML_storableInput("ED_groupID", "groupID", empty($options['groupID']) ? LDAP_getNextGroupID() : $options['groupID'], $installOptions['groupID'], 5, 6);
		
		if (HELPER_isExecutedOnUCS())
			$ladpUsageList = array ("none" => $I18N_dontUseLDAP, "read" => $I18N_readLoginFromUCSLDAP, "write" => $I18N_addNewLoginToUCSLDAP);
		else
			$ladpUsageList = array ("none" => $I18N_dontUseLDAP, "read" => $I18N_readLoginFromLDAP, "write" => $I18N_addNewLoginToLDAP);
		HTML_storableSelection("SEL_ldaptype", "ldaptype", $ladpUsageList, SELTYPE_radio, true, empty($options['ldaptype']) ? "none" : $options['ldaptype'], $installOptions['ldaptype']);
			CLIENT_addChangeElement("ldap");
	
		//Home on NFS server
		HTML_storableInput("ED_nfshomeserver", "nfshomeserver", $options['nfshomeserver'], $installOptions['nfshomeserver'], 30, 255);
			CLIENT_addChangeElement("nfshomeserver");
	}

	//DEBUG
// 	print("NTP:".serialize($installOptions['getSystemtimeByNTP'])." isset: ".serialize(isset($installOptions['getSystemtimeByNTP']))."<br>");
// 	print("LOCAL:".serialize($installOptions['addNewLocalLogin'])." isset: ".serialize(isset($installOptions['addNewLocalLogin']))."<br>");
// 	print("PRN:".serialize($installOptions['installPrinter'])." isset: ".serialize(isset($installOptions['installPrinter']))."<br>");

// print("<h2>installOptions</h2>");
// print_r2($installOptions);
// print("<h2>Options</h2>");
// print_r2($options);
// print("<h2>post</h2>");
// print_r2($_POST);
// print(serialize(!isset($installOptions['addNewLocalLogin'])));

	//NTP server
	HTML_storableCheckBox("CB_getSystemtimeByNTP", "", "getSystemtimeByNTP", !isset($installOptions['getSystemtimeByNTP']) ? true : ($options['getSystemtimeByNTP'] == 'yes'), $installOptions['getSystemtimeByNTP'], "yes", "");
		CLIENT_addChangeElement("getSystemtimeByNTP");

	HTML_storableCheckBox("CB_addNewLocalLogin", "", "addNewLocalLogin", !isset($installOptions['addNewLocalLogin']) ? true : ($options['addNewLocalLogin'] == 'yes'), $installOptions['addNewLocalLogin'], "yes", "");
		CLIENT_addChangeElement("addNewLocalLogin", true);
	HTML_storableCheckBox("CB_installPrinter", "", "installPrinter", !isset($installOptions['installPrinter']) ? true : ($options['installPrinter'] == 'yes'), $installOptions['installPrinter'], "yes", "");
		CLIENT_addChangeElement("installPrinter");

	if ($addType == ADDDIALOG_changeClient)
	{
		include_once("/m23/inc/distr/".$options['distr']."/packages.php");
		$kernelList = PKG_getKernels($options['distr'],$options['packagesource'],$installOptions['arch']);
		$kernel = HTML_storableSelection("SEL_kernel", "kernel", $kernelList, SELTYPE_selection, true, $options['kernel'], $installOptions['kernel']);
			CLIENT_addChangeElement("kernel",true);
	}

	//start installation
	if (HTML_submit("BUT_submit",$submitLabel))
		{
			//Generate a random network access password
			$installOptions['netRootPwd'] = DB_genPassword(6);

			//Do changes to the client or add it
			if (($addType == ADDDIALOG_normalAdd) ||
				($addType == ADDDIALOG_defineOnly))
				{
// 					print('<h2>CLIENT_showAddDialog</h2>');
				
					//Add the client
					$err = CLIENT_addClient($installParams,$installOptions,$addType == ADDDIALOG_defineOnly ? CLIENT_ADD_TYPE_define : CLIENT_ADD_TYPE_add);
					
					if ($addType == ADDDIALOG_defineOnly)
						$defineDisk = true;
					
				}
			elseif ($addType == ADDDIALOG_changeClient)
				{
					CLIENT_changeClient();
					$changeClientExitDialog=true;
				};


			//Show the message for sucessfully adding a new client
			if ($addType == ADDDIALOG_defineOnly)
				CAPTURE_captureAll(1,"define client, adjusted add client dialog");
			elseif ($addType == ADDDIALOG_normalAdd)
				{
					$defineDisk=false;
					if (strlen($err) == 0)
						{
							//Check if it's a VM
							if (isset($_SESSION['VM_software']))
							{
								//Add the VM guest settings into the DB
								VM_setGuestInDB($client, $_SESSION['VM_software'], $_SESSION['VM_host']);

								//Create a link for junping directly to the virtualisation section in the client detail page
								$HTML_VM_ControlLink="&gt; &gt; &gt; <a href=\"index.php?page=clientdetails&client=$client&id=".CLIENT_getId($client)."#virtualisation\">$I18N_VMControlCenter</a> &lt; &lt; &lt;<br>";

								//Activate network booting for the VM
								VM_activateNetboot($client, true);
							}
							else
								$HTML_VM_ControlLink ="";

							//Add a link to a help text for booting the client via internet.
							if (isset($_SESSION['m23Shared']) && $_SESSION['m23Shared'])
							{
								$addm23SharedHelp = "\n<br>".m23SHARED_getInformationForBootingYourClientLink($client);
								$addBootHelp = "";
							}
							else
							{
								$addm23SharedHelp = "";
								$addBootHelp = "\n<br><p>$I18N_youCanStartYourm23ClientNow</p>";
							}

							MSG_showInfo("<b>$I18N_client_added</b>".$addm23SharedHelp.$addBootHelp);
							
							echo("<br>$HTML_VM_ControlLink");
							CAPTURE_captureAll(0,"normal add client dialog");
							return(true);
						}
				}

			//Show the error message if there is one
			if (strlen($err) > 0)
			{
				MSG_showError($err);
				echo("<br>");
				$defineDisk = false;
			}
		}



	if ($defineDisk)
		{
			HTML_showTableHeader(true, 'subtable', 'width="100%" cellspacing=10');
			$CFDiskGUIO = new CFDiskGUI($client);
			$CFDiskGUIO->fdiskSessionReset(true);
			$CFDiskGUIO->showCombinedFdiskGUIDialog();
			HTML_showTableEnd(true);
			return('clientPartitionFormat');
		}
	elseif($changeClientExitDialog)
		{
			echo("<br>");
		}
	else
{




//m23customPatchBegin type=change id=CLIENT_showAddDialog-defaultExampleClientName
	$defaultExampleClientName='Test01';
//m23customPatchEnd id=CLIENT_showAddDialog-defaultExampleClientName


HTML_setPage($page);
		echo ("
<input type=\"hidden\" name=\"go\" value=\"1\">
<table align=\"center\">
<tr>
	<td><div class=\"subtable_shadow\">
		<table align=\"center\" class=\"subtable2\">
			
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_preferences</td><td>");PREF_showPreferenceManager();echo("</td>$rowDescription</tr>
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_language</td><td>".SEL_language."</td>".RB_change_language."</tr>
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_login_name*</td><td>".ED_login." ($I18N_eg pmiller)</td>".RB_change_login."</tr>
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_client_name*</td><td>".ED_client." ($I18N_eg $defaultExampleClientName)</td>$RB_change_Null</tr>
<!--m23customPatchBegin type=del id=CLIENT_showAddDialog-hideED_office-->
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_office</td><td>".ED_office."</td>".RB_change_office."</tr>
<!--m23customPatchEnd id=CLIENT_showAddDialog-hideED_office-->
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_forename*</td><td>".ED_name."</td>".RB_change_name."</tr>
<!--m23customPatchBegin type=del id=CLIENT_showAddDialog-hideED_familyname-->
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_familyname</td><td>".ED_familyname."</td>".RB_change_familyname."</tr>
<!--m23customPatchEnd id=CLIENT_showAddDialog-hideED_familyname-->
<!--m23customPatchBegin type=del id=CLIENT_showAddDialog-hideED_eMail-->
			<tr ".HTML_rowColor($rowColor)."><td>eMail</td><td>".ED_eMail."</td>".RB_change_eMail."</tr>
<!--m23customPatchEnd id=CLIENT_showAddDialog-hideED_eMail-->
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_boottype*</td><td>".SEL_boottype."</td>".RB_change_boottype."</tr>
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_bootloader</td><td>".SEL_bootloader."</td>".RB_change_bootloader."</tr>
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_arch*</td><td>".SEL_arch."</td>".RB_change_arch."</tr>
			");

if ($addType == ADDDIALOG_changeClient)
		echo("<tr ".HTML_rowColor($rowColor)."><td>Kernel</td><td>".SEL_kernel."</td>".RB_change_kernel."</tr>");

if ((($addType == ADDDIALOG_normalAdd) ||
	($addType == ADDDIALOG_changeClient)) && (!isset($_SESSION['m23Shared']) || !$_SESSION['m23Shared']))
		echo("<tr ".HTML_rowColor($rowColor)."><td>$I18N_mac*</td><td>".ED_mac." ($I18N_eg 009b52a5e121)</td>".RB_change_mac."</tr>
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_ip*</td><td>".ED_ip." ($I18N_eg 192.168.0.5)</td>".RB_change_ip."</tr>");
	
	if ($ucsNetworkDemo && HELPER_isExecutedOnUCS())
		echo("<tr ".HTML_rowColor($rowColor)."><td>UCSNetwork</td><td>".SEL_UCSNetwork." </td></tr>");
	
	//m23customPatchBegin type=change id=CLIENT_showAddDialogShowAdditionalFormularElemens
	//m23customPatchEnd id=CLIENT_showAddDialogShowAdditionalFormularElemens

	if ((!isset($_SESSION['m23Shared']) || !$_SESSION['m23Shared']))
echo("		<tr ".HTML_rowColor($rowColor)."><td>$I18N_netmask*</td><td>".ED_netmask." ($I18N_eg 255.255.255.0)</td>".RB_change_netmask."</tr>
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_gateway*</td><td>".ED_gateway." ($I18N_eg 192.168.0.1)</td>".RB_change_gateway."</tr>
			<tr ".HTML_rowColor($rowColor)."><td>DNS1*</td><td>".ED_dns1." ($I18N_eg 192.168.0.1)</td>".RB_change_dns1."</tr>
			<tr ".HTML_rowColor($rowColor)."><td>DNS2</td><td>".ED_dns2."</td>".RB_change_dns2."</tr>");

echo("
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_packageProxy</td><td>".ED_packageProxy." Port ".ED_packagePort."</td>".RB_change_proxy."</tr>
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_group</td><td><div class=\"selectcheckedicons\">".SEL_group."</div></td></tr>
<!--m23customPatchBegin type=del id=CLIENT_showAddDialog-hideED_firstpw-->
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_userpassword*</td><td>".ED_firstpw."</td>".RB_change_firstpw."</tr>
<!--m23customPatchEnd id=CLIENT_showAddDialog-hideED_firstpw-->
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_rootpassword*</td><td>".ED_rootpassword."</td>".RB_change_rootpassword."</tr>
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_timeZone</td><td>".SEL_timeZone."</td>".RB_change_timeZone."</tr>
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_getSystemtimeByNTP</td><td>".CB_getSystemtimeByNTP."</td>".RB_change_getSystemtimeByNTP."</tr>
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_installPrinterDriversAndDetectPrinter</td><td>".CB_installPrinter."</td>".RB_change_installPrinter."</tr>
			<tr ".HTML_rowColor($rowColor)."><td>$I18N_addNewLocalLogin</td><td>".CB_addNewLocalLogin."</td>".RB_change_addNewLocalLogin."</tr>
	");


	if ((!isset($_SESSION['m23Shared']) || !$_SESSION['m23Shared']) && !HELPER_isExecutedOnUCS())
echo("
			<tr><td bgcolor=\"#BBFBA5\" colspan=\"$colspanWithoutRadios\"><center><span class=\"highlight\">LDAP</span></center></td></tr>
			<tr bgcolor=\"#BBFBA5\"><td>$I18N_LDAPUsage</td><td>".SEL_ldaptype."</td></tr>
			<tr bgcolor=\"#BBFBA5\"><td>$I18N_userID</td><td>".ED_userID."</td></tr>
			<tr bgcolor=\"#BBFBA5\"><td>$I18N_groupID</td><td>".ED_groupID."</td></tr>
			<tr bgcolor=\"#BBFBA5\"><td>$I18N_LDAPServerName</td><td>".SEL_ldapserver."<br>
				<a href=\"/m23admin/index.php?page=ldapSettings\">$I18N_manageLDAPServers</a></td>
			</tr>
	");
	
echo("
			<tr><td bgcolor=\"#EF9F74\">$I18N_homeOnNFS</td><td bgcolor=\"#EF9F74\" align=\"right\">".ED_nfshomeserver."<br>($I18N_eg 192.168.1.23:/nfs-homes)</td>".RB_change_nfshomeserver."</tr>
	");


	if (HELPER_isExecutedOnUCS())
echo("
			<tr>
				<td bgcolor=\"#BBFBA5\" colspan=\"$colspanWithoutRadios\">
					<center>
						<span class=\"highlight\">$I18N_authentificationViaUCS</span><br>
						$I18N_readLoginFromUCSLDAPSupportedDistros
					</center>
				</td>
			</tr>
			<tr bgcolor=\"#BBFBA5\"><td>$I18N_LDAPUsage</td><td>".SEL_ldaptype."</td></tr>
			<tr bgcolor=\"#BBFBA5\"><td>$I18N_userID</td><td>".ED_userID."</td></tr>
			<tr bgcolor=\"#BBFBA5\"><td>$I18N_groupID</td><td>".ED_groupID."</td></tr>
	");

echo("
			<tr><td colspan=\"$colspan\"><center>".BUT_submit." $HTML_VM_ControlLink</center></td></tr>
		</table>
	</div></td>
<tr></table>
");


	echo('
		<script type="text/javascript">

		function setSelectionElement(selName, val)
		{
			//Get the dialog element with the name "selName"
			var sel = document.getElementsByName(selName);
			var i;

			//Run thru all its options
			for (i=0; i < sel[0].options.length; i++)
			{
				//Check, if the option with the desired value was found.
				if (sel[0].options[i].value == val)
					break;
			}

			//Make the found option the selected
			sel[0].selectedIndex = i;
		}

		function chooseAmd64ArchitectureOnUEFIBootType()
		{
			if (document.htmlform.SEL_boottype.value == "'.CClient::BOOTTYPE_GRUB2EFIX64.'")
			{
				setSelectionElement("SEL_arch", "amd64");
			}
		}

		function disableNetworkOnDHCP()
		{
			if (document.htmlform.SEL_boottype.value == "'.CClient::BOOTTYPE_GPXE.'")
			{
				document.htmlform.ED_netmask.disabled = true;
				if (document.htmlform.ED_mac !== undefined)
					document.htmlform.ED_mac.disabled  = true;
				if (document.htmlform.ED_ip !== undefined)
					document.htmlform.ED_ip.disabled  = true;
				document.htmlform.ED_gateway.disabled  = true;
				document.htmlform.ED_dns1.disabled  = true;
				document.htmlform.ED_dns2.disabled  = true;
			}
			else
			{
				document.htmlform.ED_netmask.disabled = false;
				if (document.htmlform.ED_mac !== undefined)
					document.htmlform.ED_mac.disabled  = false;
				if (document.htmlform.ED_ip !== undefined)
					document.htmlform.ED_ip.disabled  = false;
				document.htmlform.ED_gateway.disabled  = false;
				document.htmlform.ED_dns1.disabled  = false;
				document.htmlform.ED_dns2.disabled  = false;
			}
		}

		disableNetworkOnDHCP();
		chooseAmd64ArchitectureOnUEFIBootType();

		</script>
	');

}
};





/**
**name CLIENT_deleteClient($client,$showMsg)
**description deletes a client and shows an optional message
**parameter client: name of the client to delete
**parameter showMsg: set to true, is a success message should me shown
**parameter deleteVM: Set to true to delete the VM too.
**/
function CLIENT_deleteClient($client,$showMsg=false, $deleteVM=false)
{
	CHECK_FW(CC_clientname, $client);

	DHCP_activateBoot($client, false);

	if (HELPER_isExecutedOnUCS())
		UCS_delClient($client);
	
	//Delete the VM
	if ($deleteVM) VM_delete($client);

	deleteClientLogs($client);
	CLIENT_removeServerCache($client);
	GRP_delClientFromGroup($client);
	SERVER_delEtcHosts($client);

	DB_query("DELETE FROM clients WHERE client='$client'"); //FW ok
	DB_query("DELETE FROM clientjobs WHERE client='$client' "); //FW ok
	DB_query("DELETE FROM clientpackages WHERE clientname='$client' "); //FW ok
	DB_query("DELETE FROM clientkvstore WHERE client='$client' "); //FW ok

	if ($showMsg)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		MSG_showInfo($I18N_was_deleted);
	}
}





/**
**name CLIENT_getNames($groupName="")
**description Returns an array with the names of all clients.
**parameter groupName: if the group is set, only clients in the group are returned, otherwise all clients
**/
function CLIENT_getNames($groupName="")
{
	$i=0;
	$out=array();
	$res=CLIENT_query("","","","",$groupName);
	while( $data = mysqli_fetch_array($res) )
		$out[$i++]=$data['client'];

	return($out);
}





/**
**name CLIENT_getIds($groupName="")
**description Returns an array with all client IDs.
**parameter groupName: if the group is set, only clients in the group are returned, otherwise all clients
**/
function CLIENT_getIds($groupname="")
{
	$i=0;
	$out=array();
	$res=CLIENT_query("","","","",$groupname, "", "", "", "id");
	while( $data = mysqli_fetch_array($res) )
		$out[$i++]=$data['id'];

	return($out);
}





/**
**name CLIENT_getNamesWithPackages($showFakeClients=false)
**description returns an array with all clients having packages installed
**parameter showFakeClients: if set to true, fake clients used to store package lists are shown. false only shows real clients
**/
function CLIENT_getNamesWithPackages($showFakeClients=false)
{
	$i=0;
	$marker=PKG_getPackagesListMarker();

	if (!$showFakeClients)
		$not="NOT";
	else
		$not="";

	$sql = "SELECT DISTINCT clientname FROM `clientpackages` WHERE `clientname` $not LIKE '$marker%'";

	$res = DB_query($sql); //FW ok
	
	if (!$showFakeClients)
	{
		while( $data = mysqli_fetch_row($res))
			$out[$i++]=$data[0];
	}
	else
	{
		while( $data = mysqli_fetch_row($res))
		{
			$packageName=str_replace($marker,"",$data[0]);
			if (!empty($packageName))
				$out[$i++]=$packageName;
		}
	}

	if (is_array($out))
		sort($out);
	else
		$out = array();

	return($out);
}





/**
**name CLIENT_changeClient()
**description changes values of the clients
**/
function CLIENT_changeClient()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	$checker = new CChecks();

	//$_SESSION['changeElements'] contains all element names that could be changed
	$elements = explode("#",$_SESSION['changeElements']);
	//Remove the last element if it's empty
	if (!isset($elements[count($elements)-1]{0}))
		array_pop($elements);
	$clientName = $_SESSION['clientName'];


	/*
		$elem: contains the current variable name
		$_SESSION['preferenceSpace'][$elem]: contains the new values
		$_POST[RB_$elem]: can be
		- no: no change of the value
		- db: write directly to the DB
		- cl: make the changes on the client
	*/

	//table with converts the POST values in the DB names
// 	$post2db['email']="eMail";
	$post2db['boottype']="dhcpBootimage";
// 	$post2db['rootpassword']="rootPassword";

	//translates element names to native language
	$i18n['client']=$I18N_client_name;
	$i18n['office']=$I18N_office;
	$i18n['name']=$I18N_forename;
	$i18n['familyname']=$I18N_familyname;
	$i18n['eMail']="eMail";
	//m23customPatchBegin type=change id=CLIENT_changeClientAdditionalTranslations
	//m23customPatchEnd id=CLIENT_changeClientAdditionalTranslations
	$i18n['boottype']=$I18N_boottype;
	$i18n['mac']=$I18N_mac;
	$i18n['ip']=$I18N_ip;
	$i18n['netmask']=$I18N_netmask;
	$i18n['gateway']=$I18N_gateway;
	$i18n['dns1']="DNS1";
	$i18n['dns2']="DNS2";
	$i18n['proxy']=$I18N_packageProxy;
	$i18n['firstpw']=$I18N_userpassword;
	$i18n['rootpassword']=$I18N_rootpassword;
	$i18n['nfshomeserver']=$I18N_homeOnNFS;
	$i18n['ldap']="LDAP";
	$i18n['addNewLocalLogin']=$I18N_addNewLocalLogin;
	$i18n['timeZone']=$I18N_timeZone;
	$i18n['getSystemtimeByNTP']=$I18N_getSystemtimeByNTP;
	$i18n['installPrinter']=$I18N_installPrinterDriversAndDetectPrinter;
	$i18n['arch']=$I18N_arch;
	$i18n['bootloader']=$I18N_bootloader;
	$i18n['kernel']="Kernel";
	$i18n['language']=$I18N_language;
	$i18n['login']=$I18N_login_name;
	

	$clientMsg="<b>$I18N_theFollowingClientsideChangesAreMade</b>:<br>";
	$serverMsg="<b>$I18N_theFollowingServersideChangesWereMade</b>:<br>";

	$info="";

	//Prepare the SQL query string for updating the values directly that match a row in the table
	$sql="UPDATE `clients` SET ";

	$changeDHCP=false;

	$allOptions = CLIENT_getAllOptions($clientName);

	foreach($elements as $elem)
	{
		//if there is a conversion entry: use it
		if (empty($post2db[$elem]))
			$varname=$elem;
		else
			$varname=$post2db[$elem];

		//Prepare the message for setting the element
		if (isset($i18n[$elem]{0}))
			$message = "&bull; ".$i18n[$elem]."<br>";
		else
			echo("<h1>No translation found for \"$elem\"!!!</h1>");

		if (!isset($_POST["RB_change_$elem"]))
			continue;

		//change the settings directly on the server
		if ($_POST["RB_change_$elem"] == "db")
		{
			$serverMsg .= $message;

// 			if ($elem == 'getSystemtimeByNTP') //DEBUG
// 				print("CLIENT_changeClient:".serialize($_SESSION['preferenceSpace']['getSystemtimeByNTP'])."<br>");

			//change
			switch ($elem)
			{
				case "boottype":
					//the bootimage type is written with DHCP_addClient and not thru SQL
					$changeDHCP=true;
					break;
				case "mac":
					$changeDHCP=true;
					CHECK_FW(CC_mac, $_SESSION['preferenceSpace'][$elem]);
					$sql.="`$varname`='".$_SESSION['preferenceSpace'][$elem]."', ";
					break;
				case "ip":
					//Check, if the new IP is nonused
					$checker->checkNonusedIP($_SESSION['preferenceSpace'][$elem]);
					if ($checker->showMessages())
						return(false);
					$sql.="`$varname`='".$_SESSION['preferenceSpace'][$elem]."', ";
					break;
				case "netmask":
					$changeDHCP=true;
					CHECK_FW(CC_ip, $_SESSION['preferenceSpace'][$elem]);
					$sql.="`$varname`='".$_SESSION['preferenceSpace'][$elem]."', ";
					break;
				case "proxy":
					//proxy settings are stored in the "options" row
					foreach (explode("#","packageProxy#packagePort") as $key)
						if (array_key_exists("ED_$key",$_POST))
							$allOptions[$key]=$_SESSION['preferenceSpace'][$key];
					break;

				case "ldap":
					//LDAP settings are stored in the "options" row
					$allOptions['ldaptype'] 	= $_SESSION['preferenceSpace']['ldaptype'];
					$allOptions['ldapserver'] = $_SESSION['preferenceSpace']['ldapserver'];
					$allOptions['userID'] 	= $_SESSION['preferenceSpace']['userID'];
					$allOptions['groupID'] 	= $_SESSION['preferenceSpace']['groupID'];
					break;

				case "rootpassword":
					CHECK_FW(CC_rootpassword,$_SESSION['preferenceSpace']['rootpassword']);
					//rootpassword has to be encrypted before storing
					$sql.="`$varname`='".encryptShadow("root",$_SESSION['preferenceSpace']['rootpassword'])."', ";
					break;

				//These elements should be updated via the CLIENT_setAllOptions
				case "timeZone":
				case "nfshomeserver":
				case "arch":
				case "login":
				case "bootloader":
				case "kernel":
					$allOptions[$elem] = $_SESSION['preferenceSpace'][$elem];
					break;

				case "getSystemtimeByNTP":
				case "installPrinter":
				case "addNewLocalLogin":
					$allOptions[$elem] = ($_SESSION['preferenceSpace'][$elem] ? "yes" : "");
					break;

				//m23customPatchBegin type=change id=CLIENT_changeClientAdditionalCaseElements
				//m23customPatchEnd id=CLIENT_changeClientAdditionalCaseElements

				default:
				{
					CHECK_FW(constant('CC_'.strtolower($elem)), $_SESSION['preferenceSpace'][$elem]);
					//these values should be written directly to the DB (this are the clientparams that have a row in the DB)
					$sql.="`$varname`='".$_SESSION['preferenceSpace'][$elem]."', ";
				}
			}
		}
		//generate the job for the client
		elseif ($_POST["RB_change_$elem"] == "cl")
		{
			$clientMsg .= $message;

			switch ($elem)
			{
				case "proxy":
					//radiobutton "proxy" is used for the values "packageProxy" and "packagePort"
					$parms['packageProxy']=$_SESSION['preferenceSpace']['packageProxy'];
					$parms['packagePort']=$_SESSION['preferenceSpace']['packagePort'];
					break;

				case "dns1":
				case "dns2":
					//always change both otherwise the "no changed" DNS won't be written to /etc/resolv.conf
					$parms["dns1"]=$_SESSION['preferenceSpace']["dns1"];
					$parms["dns2"]=$_SESSION['preferenceSpace']["dns2"];
					break;

				case "rootpassword":
					//rootpassword has to be encrypted before storing
					$parms[$varname]=encryptShadow("root",$_SESSION['preferenceSpace']['rootpassword']);
					break;

				case "nfshomeserver":
					$parms['nfshomeserver']=$_SESSION['preferenceSpace']['nfshomeserver'];
					break;

				case "ldap":
					$allOptions['ldaptype']=$_SESSION['preferenceSpace']['ldaptype'];
					$allOptions['ldapserver']=$_SESSION['preferenceSpace']['ldapserver'];
					$allOptions['userID']=$_SESSION['preferenceSpace']['userID'];
					$allOptions['groupID']=$_SESSION['preferenceSpace']['groupID'];
					$parms['ldaptype']=$_SESSION['preferenceSpace']['ldaptype'];
					$parms['ldapserver']=$_SESSION['preferenceSpace']['ldapserver'];
					$parms['userID']=$_SESSION['preferenceSpace']['userID'];
					$parms['groupID']=$_SESSION['preferenceSpace']['groupID'];
					break;

// 				case "addNewLocalLogin":
// 					$allOptions[$elem] = ($_SESSION['preferenceSpace'][$elem] ? "yes" : "");
// 					$parms[addNewLocalLogin]=($_SESSION['preferenceSpace'][addNewLocalLogin] ? "yes" : ""); //FIX
// 					break;

				case "timeZone":
					$parms['timeZone']	= $_SESSION['preferenceSpace']['SEL_timeZone'];
					break;

				case "getSystemtimeByNTP":
					if ($_SESSION['preferenceSpace']['getSystemtimeByNTP']) //FIX
						PKG_addNormalJob($clientName,"ntpdate");
					else
						PKG_rmNormalJob($clientName,"ntpdate");
					$allOptions[$elem] = ($_SESSION['preferenceSpace'][$elem] ? "yes" : "");
					break;

				case "installPrinter":
					if ($_SESSION['preferenceSpace']['installPrinter']) //FIX
						PKG_addJob($clientName,"m23PrinterConfig",PKG_getSpecialPackagePriority("m23PrinterConfig"),"");
					break;

				case "ip":
					//Check, if the new IP is nonused
					$checker->checkNonusedIP($_SESSION['preferenceSpace'][$elem]);
					if ($checker->showMessages())
						return(false);

				default:
					$parms[$varname]=$_SESSION['preferenceSpace'][$elem];
			};
		}
	}


	CLIENT_setAllOptions($clientName,$allOptions);

	//check if there are params so a job can be created
	if (@count($parms)>0)
	{
		$paramsStr=implodeAssoc("###",$parms);
/*print_r2($elements);
print_r2($_POST);*/
// print_r2($parms);
// print(PKG_getSpecialPackagePriority("m23changeClient"));
		PKG_addJob($clientName,"m23changeClient",PKG_getSpecialPackagePriority("m23changeClient"),$paramsStr );
		CLIENT_sshFetchJob($clientName);
	}

// return(false);

	//check if there is at least 1 "SET `var` = 'value'" touple
	if (substr_count($sql, ", ") > 0)
	{
		//remove last ","
		$sql[strrpos($sql,",")]=" ";

		CHECK_FW(CC_id, $_SESSION['clientID']);

		$sql.=" WHERE `id` = ".$_SESSION['clientID'];

		DB_query($sql); //FW ok
	}

	if ($changeDHCP)
		{
			//the configuration of the DHCP server has changed
			$clientStatus=CLIENT_getClientStatus($clientName);

			//update DHCP entry
			$data=CLIENT_getParams($clientName);
			DHCP_activateBoot($clientName, false);
// 			DHCP_rmClient($clientName);

			//restart the DHCP server, if there is anything to install in netboot mode
			if ($clientStatus == STATUS_RED || $clientStatus == STATUS_YELLOW)
				{
					DHCP_activateBoot($clientName, true);
				}
			else
				DHCP_activateBoot($clientName, false);
		};

	MSG_showInfo("<br>$clientMsg<br>$serverMsg");
}





/**
**name CLIENT_setAllParams($client,$data)
**description Sets all parameters in the columns of a client
**parameter client: name of the client
**parameter data: the options as associative array
**/
function CLIENT_setAllParams($client,$data)		//OOP
{
	CHECK_FW(CC_clientname, $client);
	$sql = "UPDATE `clients` SET";

	//Get the keys and values of the parameter array
	$keys=array_keys($data);
	$values=array_values($data);

	//Run thru all entries in the array and set the values
	for ($i=0; $i < count($data); $i++)
		if (strlen($keys[$i])>0)
		{
			CHECK_FW(constant('CC_'.strtolower($keys[$i])), $values[$i]);
			$sql.=" ".$keys[$i]." = '".CHECK_text2db($values[$i])."', ";
		}

	//Remove the last "," to correct the SQL syntax
	$sql[strrpos($sql,",")]=" ";

	$sql.="WHERE `client` = \"$client\"";

	DB_query($sql); //FW ok
}





/**
**name CLIENT_plinkFetchJob($clientName,$password,$jobName="execute",$ubuntuUser="")
**description Connects to a client over the Putty SSH client and executes a command
**parameter clientName: name of the client
**parameter password: Password for root on the client
**parameter jobName: name of the screen job on the server
**parameter ubuntuUser: name of the Ubuntu user or empty if a Debian system is meant.
**/
function CLIENT_plinkFetchJob($clientName,$password,$jobName="execute",$ubuntuUser="")
{
$data=CLIENT_getParams($clientName);

$cmd="
sudo rm ~/.putty/sshhostkeys
";

if (empty($ubuntuUser))
	$cmd.="sudo screen -dmS m23$jobName$data[ip] /m23/bin/plink $password $data[ip] ".getServerIP();
else
	$cmd.="sudo screen -dmS m23$jobName$data[ip] /m23/bin/plink-ubuntu $password $data[ip] ".getServerIP()." $ubuntuUser";

HELPER_logToFile('/tmp/CLIENT_plinkFetchJob.log', $cmd);

system($cmd);
}





/**
**name CLIENT_isAssimilated($clientName)
**description Checks, if a client was assimilated.
**parameter clientName: name of the client
**returns true, if the client was assimilated. false, if the client was normaly installed.
**/
function CLIENT_isAssimilated($clientName)
{
	return(is_array(PKG_getPackageIDsByName($clientName,'m23Assimilate',true)));
}





/**
**name CLIENT_isDedicatedAndReachable($clientName)
**description Checks, if a client is dedicated to this M23-Server and reachable.
**parameter clientName: name of the client
**returns true, if the client is dedicated and pingable. false, if any of the conditions is false.
**/
function CLIENT_isDedicatedAndReachable($clientName)
{
//	$netcat_port = "2323";
//	$client_id = CLIENT_getId($clientName);
//	$server_hostname = strtolower(shell_exec("hostname -f"));

//	if (CLIENT_isrunning($clientName) && $clientName != "localhost") {
//		// result syntax: <client_id>:<fqdn m23-server>
//		$res = explode(":", shell_exec("netcat ".HELPER_hostname2IP($clientName)." $netcat_port"));
//	}
//	return($res[0] === $client_id && $res[1] === $server_hostname);
	$data = CLIENT_getParams($clientName);
	return($data['online']);
}





/**
**name CLIENT_generateHTMLDedicatedAndReachableStatus($online)
**description Generates HTML code and tooltip containing the status of the client showing if it's dedicated and reachable.
**parameter online: One or more of the ONLINE_STATUS_* bits.
**returns Associative array containg HTML code and tooltip 
**/
function CLIENT_generateHTMLDedicatedAndReachableStatus($online)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$out = array();

	$statusimage = "/gfx/status/";

	$ping = (($online & ONLINE_STATUS_ping) == ONLINE_STATUS_ping);
	$ssh = (($online & ONLINE_STATUS_sshHttps) == ONLINE_STATUS_sshHttps);

// var_dump($online);

// 	print("<h3>ON: $online, Ping:  & ONLINE_STATUS_ping

//      print("<script>console.log($clientName);</script>");
	
	if ($ping && $ssh)
	{
		$statusimage.="green.png";
		$out['tooltip'] = $I18N_computerOnWithPingSSHHttps;
	}
	elseif ($ping)
	{
		$statusimage.="greenred.png";
		$out['tooltip'] = $I18N_computerPingNoSSHNoHttps;
	}
	else
	{
		$statusimage.="red.png";
		$out['tooltip'] = $I18N_computerOff;
	}

	$out['html'] = "<img border=\"0\" src=\"$statusimage\" title=\"$out[tooltip]\">
";

	return($out);
}





/**
**name CLIENT_sendPlymouthMessage($message)
**description If Plymouth is running, display a message
**parameter message: message to display
**/
function CLIENT_sendPlymouthMessage($message)
{
	// Hint: plymouth cuts message longer than 255chars
	echo("
		if plymouth --ping; then
			plymouth display-message --text=\"$message\"
		fi
	");
}





/**
**name CLIENT_sendNotifySendMessage($message)
**description Send message to all users using notify-send
**parameter message: message to display
**parameter icon_path: icon shown
**parameter must_inform: respect client settings or force message display? default false
**parameter timeout_ms: timeout till message disapperas. default 0 (never)
**parameter title: title of the message
**parameter escape: escape the message for notify-send? default true
**parameter timestamp: Show a timestamp at the beginning of the message. default true
**/
function CLIENT_sendNotifySendMessage($message, $icon_path, $must_inform = false, $timeout_ms = 0, $title = "M23-Server: Installing packages...", $escape = true, $timestamp = true)
	{

	// Hint: nofify-send supports html-tags <i> and <b>

	// Handle if the message is forced to be shown, or if the default client-setting shall be respected
	if ($must_inform)
		$condition = "true";
	else
		$condition = "\"\$M23_USER_NOTIFICATION\" == \"true\"";


	if ($escape) {
		$message = utf8_encode($message);
		$org = array("\\", "$", "\"", "'");
		$esc = array("\\\\\\\\", "\\$", "\\\"", "\\'");
		$message = str_replace($org, $esc, $message);
		$message = str_replace("\r", "", $message);
	}

	if ($timestamp)
		$message = "\$(date)\\n$message";

	$options = " -t $timeout_ms ";
	if (!empty ($icon_path))
		$options .= " -i $icon_path ";

	// Test if ensuring $?=0 is necessary.
	echo("
		if [ $condition ]; then
			notify-send_wrapper $options \"$title\" \"$message\" || true
		fi
	");
}





/**
** name CLIENT_sendM23FetchJobFinishedMessage($message, $icon_path, $must_inform, $timeout_ms)
** description queues a notify-send message, which is displayed when all updates are installed.
**parameter message: message to display
**parameter icon_path: icon shown
**parameter must_inform: respect client settings or force message display? default false
**/
function CLIENT_sendM23FetchJobFinishedMessage($message, $icon_path, $must_inform, $timeout_ms)
{
	ob_start();
	CLIENT_sendNotifySendMessage($message, $icon_path, $must_inform, $timeout_ms);
	$output = ob_get_contents();
	ob_end_clean();
	echo ("
		echo '$output' > /tmp/sendM23FetchJobFinishedMessage
		chmod +x /tmp/sendM23FetchJobFinishedMessage
	");
}
?>
