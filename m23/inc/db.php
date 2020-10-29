<?php

/*$mdocInfo
 Author: Daniel Kasten (DKasten@pc-kiel.de) ,Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: database functions, open, close the database, get ip of the calling client
$*/



//client added, but no hardware information
define("STATUS_RED",0);

//hardware data send to server, wairing for base system
define("STATUS_YELLOW",1);

//base sytem installed
define("STATUS_GREEN",2);

//installation of additional packages in process
define("STATUS_BLUE",3);

//a critical error occured
define("STATUS_CRITICAL",4);

//it's a clientBuilder client
define("STATUS_DEFINE",5);

//Status for clients that are not m23 clients, but their network settings are handled by the m23 server
define("STATUS_BLOCKED",6);

// Make sure that there is a value set for m23Shared
if (!isset($_SESSION['m23Shared'])) $_SESSION['m23Shared'] = false;

// Online status codes for client availability
// Client is pingable
define('ONLINE_STATUS_ping', 1);

// Server can access client by SSH, lets it execute a job and gets a message back
define('ONLINE_STATUS_sshHttps', 2);


// Constant that contains BASH code to set access rights of /var/run/screen according to what screen expects on the running distribution.
define('BASH_SET_VAR_RUN_SCREEN_BY_DISTRIBUTION', "
	# Different access rights for /var/run/screen by distribution
	if [ $(grep -c 'Debian GNU/Linux 10' /etc/issue) -gt 0 ] || [ $(grep -c 'Raspbian GNU/Linux 10' /etc/issue) -gt 0 ] || [ $(grep -c 'Linux Mint 19.2 Tina' /etc/issue) -gt 0 ] || [ $(grep -c 'Linux Mint 20' /etc/issue) -gt 0 ]
	then
		chmod 777 /var/run/screen 2> /dev/null
	else
		chmod 775 /var/run/screen 2> /dev/null
	fi
");





/**
**name ip2longSafe($in)
**description Special version of ip2long that is safe on 32 bit machines.
**parameter in: Input v4 IP (e.g. 192.168.1.23) or number.
**returns Unsigned long representation of the input IP or the input numer.
**/
function ip2longSafe($in)
{
	if (is_numeric($in))
		return($in);

	//Solution from: http://au2.php.net/manual/de/function.ip2long.php#108567
	if (($lngIP = ip2long($in)) < 0)
	{
		$lngIP += 4294967296;
		return($lngIP);
	}
	else
		return($lngIP);
}





/**
**name getArchList()
**description Returns an associative array with the supported CPU architectures as key and value.
**returns Associative array with the supported CPU architectures as key and value.
**/
function getArchList()
{
	return(array("amd64" => "amd64", "i386" => "i386"));
}





/**
**name isMySQL3used()
**description checks if MySQL 3 is installed and returnes true if v3 is found, otherwise false
**/
function isMySQL3used()
{
	$out=exec("sudo mysql -V | grep \" 3.\"");
	return(strlen($out)>0);
};





/**
**name encryptShadow($password,$userName)
**description encrypts a password for adding a user to the client
**parameter userName: the username for the account
**parameter password: the unecrypted password to encrypt
**/
function encryptShadow($userName,$password)
{
	return(HELPER_grubMd5Crypt($password,8));
};





/**
**name getClientLanguage()
**gets the short language setting of the client
**/
function getClientLanguage()
{
	include_once("/m23/inc/client.php");
	$clientName = CLIENT_getClientName();
	CHECK_FW(CC_clientname, $clientName);

	$sql="SELECT language FROM `clients` WHERE client='$clientName'";

	$res = DB_query($sql); //FW ok

	$line = mysqli_fetch_row($res);

	if (!empty($line[0]))
		return($line[0]);
	else
		return("en");
};





/**
**name getInstDev($id)
**description fetch the device for installation
**parameter id: package ID
**/
function getInstDev($id)
{
 return(PKG_getPackageParamsVar($id,"instPart"));
};





/**
**name DB_getConnection()
**description Gets the MySQLi connection.
**returns MySQLi connection.
**/
function DB_getConnection()
{
	global $GLOB_mysqliConnection;
	return($GLOB_mysqliConnection);
}





/**
**name DB_setConnection($conn)
**description Sets the MySQLi connection to use globally.
**parameter conn: MySQLi connection to use globally.
**/
function DB_setConnection($conn)
{
	global $GLOB_mysqliConnection;
	$GLOB_mysqliConnection = $conn;
}





/**
**name DB_isConnectionValid()
**description Checks, if the MySQLi connection is valid.
**returns true on valid MySQLi connection, otherwise false.
**/
function DB_isConnectionValid()
{
	return(!DB_getConnection() == false);
}





/**
**name dbConnect()
**description connects to the m23 database
**/
function dbConnect($user = "m23dbuser", $pass = "m23secret", $host = "localhost")
{
	//Check if we have the m23SHARED functions
	if (!function_exists('m23SHARED_init') || !m23SHARED_init())
	{
		if (CAPTURE_isActive() || (isset($_GET['captureLoad']) && $_GET['captureLoad']==1))
			$dbName="m23captured";
		else
			$dbName="m23";

		DB_setConnection(mysqli_connect($host, $user, $pass, $dbName));

		if (!DB_isConnectionValid())
			die ("Could not connect to database server!");
	}
}





/**
**name dbClose()
**description closes the connection to the m23 database
**/
function dbClose()
{
	mysqli_close(DB_getConnection());
}





/**
**name DB_getSuperUserName()
**description Returns the name of the super MySQL/MariaDB user.
**returns Name of the super MySQL/MariaDB user.
**/
function DB_getSuperUserName()
{
	$userParam = trim(SERVER_runInBackground(uniqid("DB_getSuperUserName"), "/m23/bin/getMySQL-UserParam.sh", 'root', false));

	// Remove the first two characters (that are '-u')
	return(substr($userParam, 2));
}





/**
**name DB_getSuperUserPassword()
**description Returns the password (or empty) of the super MySQL/MariaDB user.
**returns Password (or empty) of the super MySQL/MariaDB user.
**/
function DB_getSuperUserPassword()
{
	$passwordParam = trim(SERVER_runInBackground(uniqid("DB_getSuperUserPassword"), "/m23/bin/getMySQL-PasswordParam.sh", 'root', false));

	// Remove the first two characters (that are '-p')
	return(substr($passwordParam, 2));
}





/**
**name getServerIP()
**description returnes the IP of the m23 server
**returns IP of the m23 server.
**/
function getServerIP()
{
	if (isset($_SESSION['m23Shared']) && $_SESSION['m23Shared'])
		return(m23SHARED_getServerIP());
	else
	{
		if (!HELPER_isExecutedInCLI())
			$addSudo = 'sudo';
		else
			$addSudo = '';

		$ip = exec("$addSudo /m23/bin/serverInfoIP");

		if (empty($ip) && VM_CloudStack_available())
			$ip = VM_CloudStack_getServerIP();

		return($ip);
	}
}





/**
**name getServerNetmask()
**description returnes the netmask of the m23 server
**/
function getServerNetmask()
{

	// Netmask is detected by "ucr" on UCS
// 	if (HELPER_isExecutedOnUCS())
// 	{
// 		// Check the "normal" ethX interfaces
// 		for ($ethNr = 0; $ethNr < 10; $ethNr++)
// 		{
// 			$netmask = exec('sudo ucr get interfaces/eth'.$ethNr.'/netmask');
// 
// 			if (isset($netmask{6}))
// 				break;
// 		}
// 
// 		// Check bridged network devices
// 		for ($brNr = 0; $brNr < 10; $brNr++)
// 		{
// 			$netmask = exec('sudo ucr get interfaces/br'.$brNr.'/netmask');
// 			if (isset($netmask{6}))
// 				break;
// 		}
// 	}

	$netmask = exec('/m23/bin/serverInfoNetmask');

	return($netmask);
}




/**
**name getServerNetwork()
**description Get the network IP of the m23 server.
**returns Network IP of the m23 server.
**/
function getServerNetwork()
{
	return(HELPER_networkCalculator(getServerIp(), getServerNetmask()));
}





/**
**name getDNSServers()
**description Returnes an array with the DNS servers of the m23 server.
**/
function getDNSServers()
{
	exec("sudo /m23/bin/serverInfoDNS",$nameservers);
	if (!isset($nameservers[0]))
		$nameservers[0] = '85.88.19.10';

	if (!isset($nameservers[1]))
		$nameservers[1] = '8.8.8.8';

	return($nameservers);
}





/**
**name getServerGateway()
**description Returnes the gateway of the m23 server
**/
function getServerGateway()
{
	return(exec("sudo /sbin/ip route | awk '/default/ { print $3 }'"));
}





/**
**name sendClientStatus($id,$status)
**description generates a bash script to send a status to the server
**parameter id: package ID
**parameter status: done, waiting; finished jobs should be set to done, waiting should not be used from this place
**/
function sendClientStatus($id,$status)
{
	$quietWget = ($_SESSION['debug'] ? "": "-qq -O/dev/null");

echo("

".MSR_getm23clientIDCMD("&")."

wget $quietWget \"https://".getServerIP()."/packages/setStatus.php?id=".$id."&status=".$status."\$idvar\"\n");
}






/**
**name sendClientStageStatus($status)
**description generates a bash script to send a stage status to the server
**parameter status: 0: client waiting for hardware detection, 1 hardware detection done, 2 partitionated and formated, base system is installed
**/
function sendClientStageStatus($status)
{
	$quietWget = ($_SESSION['debug'] ? "": "-qq -O/dev/null");
 echo("\n

".MSR_getm23clientIDCMD("&")."

 wget $quietWget \"https://".getServerIP()."/packages/setClientStatus.php?status=".$status."\$idvar\"\n");
}





/**
**name returnClientStageStatus($status)
**description generates a bash script to send a stage status to the server
**parameter status: 0: client waiting for hardware detection, 1 hardware detection done, 2 partitionated and formated, base system is installed
**/
function returnClientStageStatus($status)
{
	$quietWget = ($_SESSION['debug'] ? "": "-qq -O/dev/null");

 return("\n
".MSR_getm23clientIDCMD("&")."

 wget $quietWget \"https://".getServerIP()."/packages/setClientStatus.php?status=".$status."\$idvar\"\n");
}





/**
**name sendClientLogStatus($status, $ok)
**description generates a bash script to send log status to the server
**parameter status: how the line should be named, that is logged to the server
**parameter ok: true: operation sucessful, false: failure
**parameter critical: if it is set to "true" the execution of the script is stopped and a local rescue console is opened
**/
function sendClientLogStatus($status, $ok, $critical=false)
{
	$quietWget = ($_SESSION['debug'] ? "": "-qq -O/dev/null");

	if ($critical && (!$ok))
	{
		$error=returnClientStageStatus(STATUS_CRITICAL)."\n
		echo \"
		
!!!!!!!!!!!!!!!!!!!!!!
Error: $status\"
wait4go

/bin/sh
exit
";
	}
		else
		$error="";


	if ($ok)
		$val=" ° ok";
		else
		$val=" ° failure";
 return("\n
 
 ".MSR_getm23clientIDCMD("?")."
 
 wget $quietWget \"https://".getServerIP()."/packages/setLog.php\$idvar&status=".$status.$val."\"
 $error");
};





/**
**name deleteClientLogs($clientName)
**description deletes the installation logs
**parameter clientName: name of the client to delete all logs
**/
function deleteClientLogs($clientName)
{
	CHECK_FW(CC_clientname, $clientName);
	$sql="DELETE FROM `clientlogs` WHERE client='$clientName'";
	DB_query($sql);
}





/**
**name workPhpName()
**description Generates an unique name for storing the work.php file.
**returns Unique name for storing the work.php file.
**/
function workPhpName()
{
	return('work.php-'.uniqid(time().'-'));
}





/**
**name executeNextWork()
**description generates a bash script that fetches the next work.php from server
**/
function executeNextWork()
{
	$quietWget = ($_SESSION['debug'] ? "": "-qq");
	$wPhp = workPhpName();

 echo("
 mv work.php* `date +%s`.old 2> /dev/null
 
 ".MSR_getm23clientIDCMD("?")."
 
 rm work.php* 2> /dev/null\n
 
 wget $quietWget -O$wPhp \"https://".getServerIP()."/work.php\$idvar\"
 
 chmod +x $wPhp
 
 ./$wPhp\n");
}






/**
**name DB_query($sql)
**description makes a query and returns the default error message if an error occurs
**parameter sql: sql query
**/
function DB_query($sql)
{
	if (DB_getConnection() == NULL) dbConnect();

	$result = mysqli_query(DB_getConnection(), $sql);
	if ($result === false)
		die ("DB_query: Could not execute SQL statement: $sql ERROR:".mysqli_error(DB_getConnection()));

	return($result);
}





/**
**name DB_queryNoDie($sql)
**description Executes a SQL query and returns the resource id to access the result.
**returns Ressource id of the query result and DOESN'T die on an error.
**/
function DB_queryNoDie($sql)
{
	$ret = @mysqli_query(DB_getConnection(), $sql);
	return($ret);
}





/**
**name DB_getErrorMessage()
**description Gets the error message from the last query.
**returns Error message from the last query.
**/
function DB_getErrorMessage()
{
	return(@mysqli_error(DB_getConnection()));
}





/**
**name DB_genPassword($length)
**description generates a random password with a specified length
**parameter length: length of password
**/
function DB_genPassword($length)
{
 $shortPw="";

 srand((double)microtime()*1000000);

 $longPw=md5(rand(0,9999999));

 for ($i=0; $i < $length; $i++)
 	$shortPw.=$longPw[$i];

 return($shortPw);
}





/**
**name getClientIP()
**description returnes the IP of the calling client
**/
function getClientIP()
{
// 	HELPER_logToFile('/tmp/REMOTE_ADDR.log', "getClientIP: $_SERVER[REMOTE_ADDR]");
	return($_SERVER['REMOTE_ADDR']/*getenv('REMOTE_ADDR')*/);
}





/**
**name implodeAssoc($glue,$arr)
**description makes a string from an associative array
**parameter glue: the string to glue the parts of the array with
**parameter arr: array to implode
**/
function implodeAssoc($glue,$arr)
{
	if (count($arr) == 0)
		return($glue);
	
	$keys = array_keys($arr);
	$values = array_values($arr);

	return(implode($glue,$keys).$glue.implode($glue,$values));
}





/**
**name explodeAssoc($glue,$str)
**description makes an associative array from a string
**parameter glue: the string to glue the parts of the array with
**parameter arr: array to explode
**/
function explodeAssoc($glue,$str)
{
	// Try to unserialize with PHP function
	$out = @unserialize($str);

	// Use m23's function as fallback
	if ((false === $out) || (!is_array($out)))
	{
		$arr = explode($glue,$str);
		
		$size = count($arr);
	
		for ($i=0; $i < $size/2; $i++)
			$out[$arr[$i]]=$arr[$i+($size/2)];
	}

	return($out);
}





/**
**name sedSearchReplace($pathFile,$search,$replace)
**description generates BASH code to search and replace a string in a file using sed keeping the ownership an permissions
**parameter pathFile: file with whole path, in that should be searched and replaced
**parameter search: search pattern
**parameter replace: replace string
**/
function sedSearchReplace($pathFile,$search,$replace)
{
	$file = strrchr ( $pathFile, "/");

	$search = str_replace("/", "\/",$search);
	$replace = str_replace("/", "\/",$replace);

	return("
	userGroup=`find $pathFile -printf 'chown %u.%g $pathFile'`
	perm=`find $pathFile -printf 'chmod %m $pathFile'`

	mkdir -p /tmp/m23Sed

	cat $pathFile | sed 's/$search/$replace/g' > /tmp/m23Sed/$file

	mv /tmp/m23Sed/$file $pathFile

	\$userGroup

	\$perm

");
}


function DEBUG_returnV()
{
	if (RMV_get("debug")==1)
		return("v");
		else
		return("");
};


function DEBUG_returnNotQ()
{
	if (RMV_get("debug")!=1)
		return("q");
		else
		return("");
};





/**
**name isProgrammInstalled($progName)
**description returnes true if a programm can be used
**parameter progName: name of the programm
**/
function isProgrammInstalled($progName)
{
	$out = shell_exec("whereis $progName");

	$infoPath = explode(":",$out);

	return(strlen(trim($infoPath[1])) > 0);
};





/**
**name pingIP($ip)
**description tests, if someone is answering the ping on a given IP address. returnes true, if someone answers (needs "iputils-ping" to be installed)
**parameter ip
**/
function pingIP($ip)
{
	$ret=exec("sudo ping $ip -c1 -q -n -w1
if [ $? -eq 0 ]
then
 echo t
else
 echo f
fi");

	return ($ret == "t");
}





/**
**name delFromArray($arr,$delKeys)
**description deletes all entries in the array $arr assigned by the keys stored in the array $delKeys. the new array without the entries in $delKeys is returned.
**parameter arr: array with the entries to filter
**parameter delKeys: array with all keys to delete from $arr
**/
function delFromArray($arr,$delKeys)
{
	$keys = array_keys($arr);
	$values = array_values($arr);

	for ($i = 0; $i < count($keys); $i++)
	{
		if (!in_array($keys[$i],$delKeys))
			$out[$keys[$i]] = $values[$i];
	}

	return($out);
}





/**
**name delValuesFromArray($arr,$delKeys)
**description deletes all entries in the array $arr with values stored in the array $delVals.
**parameter arr: array with the entries to filter
**parameter delVals: array with all values to delete from $arr
**returns array without the entries in $delVals.
**/
function delValuesFromArray($arr,$delVals)
{
	$keys = array_keys($arr);
	$values = array_values($arr);
	
	for ($i = 0; $i < count($keys); $i++)
	{
		if (!in_array($values[$i],$delVals))
			$out[$keys[$i]] = $values[$i];
	}

	return($out);
};





/**
**name DB_getLikeableColumns($table)
**description Returns an associative array that contains all fields of a table that can be searched by LIKE.
**parameter table: Name of the table to search.
**returns associative array that contains all fields of a table that can be searched by LIKE.
**/
function DB_getLikeableColumns($table)
{
	CHECK_FW("A", $table);
	$out = array();
	$res = DB_query("SHOW COLUMNS FROM $table"); //FW ok

	if (mysqli_num_rows($res) > 0)
	{
		while ($row = mysqli_fetch_assoc($res))
			if ((!(strpos($row['Type'], 'char'  ) === false)) || (!(strpos($row['Type'], 'text' ) === false)))
				$out[$row['Field']] = $row['Field'];
	}
	return($out);
}





/**
**name DB_getArrayAssoc($result)
**description Fetches all results from a query.
**parameter result: MySQLi result.
**returns Array with continuous numbers as keys and associative arrays with the result rows as value.
**/
function DB_getArrayAssoc($result)
{
	$table_result = array();
	$r = 0;

	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$table_result[$r] = $row;
		$r++;
	}

	return($table_result);
}





/**
**name DB_getTableColumns($dbName = 'm23')
**description Creates an associative array with table and column names and their data types and codepages (collation).
**parameter dbName: Name of the database.
**returns Associative array with table and column names and their data types and codepages (collation).
**/
function DB_getTableColumns($dbName = 'm23')
{
	$out = array();
	$i = 0;

	// Get table and column names and their data types and codepages (collation)
	$sql = "SELECT * FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='$dbName';";
	$res = DB_query($sql);

	// Build an associative array
	while ($row = mysqli_fetch_assoc($res))
		$out[$row['TABLE_NAME']][$row['COLUMN_NAME']] = $row;

	return($out);
}





/**
**name DB_changeAllCollations($destCodepage, $dbName = 'm23')
**description Changes the codepage for the collation of all text fields in all tables of a database.
**parameter destCodepage: Wanted codepage.
**parameter dbName: Name of the database.
**/
function DB_changeAllCollations($destCodepage, $dbName = 'm23')
{
	// Run thru the tables
	foreach (DB_getTableColumns($dbName) as $tableName => $tableInfo)
	{
		// Run thru the columns
		foreach($tableInfo as $columnName => $columnInfo)
		{
			// Check, if a collation name is set (only on text, varchar fields) and if it's not the desired one
			if (isset($columnInfo['COLLATION_NAME']{1}) && ($columnInfo['COLLATION_NAME'] != $destCodepage))
				DB_query("ALTER TABLE `$dbName`.`$tableName` CHANGE `$columnName` `$columnName` $columnInfo[COLUMN_TYPE] CHARACTER SET $columnInfo[CHARACTER_SET_NAME] COLLATE $destCodepage NOT NULL;");
		}
	}
}
?>