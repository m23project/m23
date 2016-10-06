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
define("STATUS_EXTERNAL",6);





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
		$lngIP += 4294967296;

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

	$res=DB_query($sql); //FW ok

	$line=mysqli_fetch_row($res);

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
function dbConnect()
{
	//Check if we have the m23SHARED functions
	if (!function_exists('m23SHARED_init') || !m23SHARED_init())
	{
		if (CAPTURE_isActive() || (isset($_GET['captureLoad']) && $_GET['captureLoad']==1))
			$dbName="m23captured";
		else
			$dbName="m23";

		DB_setConnection(mysqli_connect("localhost", "m23dbuser", "m23secret", $dbName));

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
};






/**
**name getServerIP()
**description returnes the IP of the m23 server
**/
function getServerIP()
{
	if (isset($_SESSION['m23Shared']))
		return(m23SHARED_getServerIP());
	else
	{
		if (!HELPER_isExecutedInCLI())
			$addSudo = 'sudo';
		else
			$addSudo = '';

		$ip = exec("$addSudo grep address /etc/network/interfaces | cut -d's' -f3 | cut -d' ' -f2 | head -1");

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
	for ($ethNr = 0; $ethNr < 10; $ethNr++)
	{
		if (HELPER_isExecutedOnUCS())
			$netmask = exec('sudo ucr get interfaces/eth'.$ethNr.'/netmask');
		else
			$netmask = exec('LC_ALL="C"; sudo /sbin/ifconfig eth'.$ethNr.' | sed "s/  /\n/g" | grep "^Mask" | cut -d":" -f2');

		if (isset($netmask{6}))
			break;
	}
	
	if (HELPER_isExecutedOnUCS() && !isset($netmask{6}))
	for ($brNr = 0; $brNr < 10; $brNr++)
	{
		$netmask = exec('sudo ucr get interfaces/br'.$brNr.'/netmask');
		if (isset($netmask{6}))
			break;
	}

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
	exec("sudo cat /etc/resolv.conf | grep nameserver | tr -s '[:blank:]' | head -n 1 | cut -d' ' -f2",$nameservers);
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
		$val=" � ok";
		else
		$val=" � failure";
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
 return(getenv('REMOTE_ADDR'));
};





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
	
	$keys=array_keys($arr);
	$values=array_values($arr);

	return(implode($glue,$keys).$glue.implode($glue,$values));
};





/**
**name explodeAssoc($glue,$str)
**description makes an associative array from a string
**parameter glue: the string to glue the parts of the array with
**parameter arr: array to explode
**/
function explodeAssoc($glue,$str)
{
	$arr=explode($glue,$str);
	
	$size=count($arr);

	for ($i=0; $i < $size/2; $i++)
		$out[$arr[$i]]=$arr[$i+($size/2)];

	return($out);
};





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
		};

	return($out);
};





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
		};

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
?>