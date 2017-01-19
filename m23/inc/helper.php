<?PHP

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Helper functions that did not fit into another include file.
$*/





/**
**name HELPER_showScriptHeader($id, $packName)
**description Shows a header for own scripts, that creates a log file with the package name and the start time. Sends the log file to the m23 server and shows an installation dialog on the client's screen.
**parameter id: Job ID of the script
**parameter packName: Name of the package
**/
function HELPER_showScriptHeader($id, $packName)
{
	echo ("echo \"### Script $packName has been started.\" > /tmp/$id.log\n");
	MSR_logCommand("/tmp/$id.log");
	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $packName);
	echo ("date  > /tmp/$id.log\n");
}





/**
**name HELPER_showScriptFooter($id, $packName)
**description Shows a header for own scripts, that saves the script end time to a log file and sends it to the m23 server. Sets status bar to 100% and marks the job as done. Afterwards executes the next job.
**parameter id: Job ID of the script.
**parameter packName: Name of the package.
**/
function HELPER_showScriptFooter($id, $packName)
{
	echo ("date  >> /tmp/$id.log
	echo \"### Script $packName done.\" >> /tmp/$id.log\n");
	MSR_logCommand("/tmp/$id.log");
	MSR_statusBarCommand(100,$packName);
	sendClientStatus($id,"done");
	executeNextWork();
}





/**
**name HELPER_URIencode($in)
**description Encodes a string like the JavaScript function URIencode would do it.
**parameter in: Input string to be encoded.
**returns Encoded version of the string
**/
function HELPER_URIencode($in)
{
	// Build an array with characters, that should not be encoded
	$exceptions = array('-', '_', '.', '!', '~', '*', '\'', '(', ')', ',', '/', '?', ':', '@', '&', '=', '+', '$', ' ', ';');
	$i = count($exceptions);

	// Add digits (0-9), upper and lower case characters (A-Z, a-z)
	for ($cNr = ord('0'); $cNr <= ord('9'); $cNr++) $exceptions[$i++] = chr($cNr);
	for ($cNr = ord('A'); $cNr <= ord('Z'); $cNr++) $exceptions[$i++] = chr($cNr);
	for ($cNr = ord('a'); $cNr <= ord('z'); $cNr++) $exceptions[$i++] = chr($cNr);
	$out = '';

	// Run thru the input string and encode all characters, that are not on the exception list
	for ($i = 0; $i < strlen($in); $i++)
	{
		if (in_array($in{$i},$exceptions))
			$out .= $in{$i};
		else
			$out .= urlencode($in{$i});
	}

	return($out);
}





/**
**name HELPER_isUpper($char)
**description Checks, if a character is upper case
**parameter char: Character to check.
**returns true, when upper case otherwise false
**/
function HELPER_isUpper($char)
{
	$ord = ord($char);
	return(($ord > 64) && ($ord < 91));
}





/**
**name HELPER_filesize($fileName)
**description Gets the correct file size of a file, even if it is bigger than 2 GB.
**parameter fileName: Name of the file with full path.
**returns The file size of the file in bytes.
**/
function HELPER_filesize($fileName)
{
	if (file_exists($fileName))
		return(exec("stat -c %s '$fileName'"));
	else
		return(-1);
}





/**
**name HELPER_isExecutedInCLI()
**description Checks, if it is run in CLI.
**returns True, when run in CLI otherwise false.
**/
function HELPER_isExecutedInCLI()
{
	return(php_sapi_name() == 'cli');
}





/**
**name HELPER_isExecutedOnUCS()
**description Checks, if it is run on UCS.
**returns True, when run on UCS otherwise false.
**/
function HELPER_isExecutedOnUCS()
{
	return(file_exists('/usr/sbin/udm'));
}





/**
**name HELPER_getContentFromURL($url, $range = '')
**description Downloads an URL via curl and gives back the site code.
**parameter url: The URL to download.
**parameter range: If set, a part of the file will be downloaded. (e.g. 0-500 will download the first 500 kb)
**returns The downloaded site code or false in case of an error.
**/
function HELPER_getContentFromURL($url, $range = '')
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

	if (isset($range{2}))
		curl_setopt($ch, CURLOPT_RANGE, $range);

	CSYSTEMPROXY_addCurlProxySettings($ch);

	$out = curl_exec($ch);
	curl_close($ch);

	return($out);
}





/**
**name HELPER_trimValue(&$value)
**description Runs trim on the input parameter and writes the result back.
**parameter value: Value to trim.
**/
function HELPER_trimValue(&$value)
{
	$value = trim($value);
}





/**
**name HELPER_xargsRecursive($cmd, $argsA, $tabAmount = 0)
**description Executes a BASH command with a list of arguments. If the BASH command fails, the argument list is split in two parts and recursively executed again.
**parameter cmd: BASH command
**parameter argsA: Array of commands for the BASH command.
**parameter tabAmount: Amount of identing to start with.
**returns Recursive calls of the BASH command with error checking.
**/
function HELPER_xargsRecursive($cmd, $argsA, $tabAmount = 0)
{
	$out = '';

	//Characters to fill in for a tabulator
	$tabFiller = '    ';

	//Generate a string containg the needed amount of tabulators
	$tabs = str_repeat($tabFiller, $tabAmount);

	//Amount of elements in the array
	$len = count($argsA);

	//Convert the array with the arguments to a space-seperated string
	$args = implode(' ', $argsA);

	//Show the command with the current arguments and save the result in the BASH variable $ret
	$out = "${tabs}${cmd} $args; ret=$?\n";

	//If there is only one argument is left => the argument list cannot be split more => quit function
	if ($len == 1)
		return($out);
	else
	//If there are two or more arguments => add an if statement that will be executed when the command above fails
		$out .= "${tabs}if [ \$ret -ne 0 ]
${tabs}then
";

	//Increase the indenting
	$tabAmount++;

	//Check, if there are more than two arguments
	if ($len > 2)
	{
		//Split the argument array in two arrays of similar size
		$range = ceil($len / 2.0);
		$l = array_slice($argsA, 0, $range);
		$r = array_slice($argsA, $range, $range+1);

		//Start recursion with both parts of the list
		$out .= HELPER_xargsRecursive($cmd, $l, $tabAmount);
		$out .= HELPER_xargsRecursive($cmd, $r, $tabAmount);
	}
	//There are two arguments => add the command with the 1st and the 2nd argument
	elseif ($len == 2)
		$out .= "${tabs}${tabFiller}${cmd} $argsA[0]
${tabs}${tabFiller}${cmd} $argsA[1]
";

	//Close the if statement
	$out .= "${tabs}fi
";
	return($out);
}





/**
**name HELPER_resetNewLogLines($sessionPrefix)
**description Resets the line number of the last read line.
**parameter sessionPrefix: Prefix for storing the last read line number in the session.
**/
function HELPER_resetNewLogLines($sessionPrefix)
{
	$_SESSION[$sessionPrefix]['lastLogLine'] = 0;
}





/**
**name HELPER_getNewLogLines($log, $sessionPrefix, $filterFunction = NULL)
**description Gets the last (new) lines of a (growing) log file.
**parameter log: Name of the log file.
**parameter sessionPrefix: Prefix for storing the last read line number in the session.
**parameter filterFunction: Function to filter the lines before adding them to the output. The function gets the unfiltered string as input and returns the filtedred version.
**returns UTF8-encoded new lines of the log file.
**/
function HELPER_getNewLogLines($log, $sessionPrefix, $filterFunction = NULL)
{
	$out = '';
	
	$_SESSION[$sessionPrefix]['lastLogLine'] = 0; // üüü DEBUG

	//Check for the log
	if (file_exists($log))
	{
		//Read the log into an array (each line as an array entry)
		$lines = file($log);
		$lastEntry = (count($lines));

		//Check for valid last line number
		if (!isset($_SESSION[$sessionPrefix]['lastLogLine']))
			$_SESSION[$sessionPrefix]['lastLogLine'] = 0;

		//Give out the new lines that were added since the last call
		for ($i = $_SESSION[$sessionPrefix]['lastLogLine']; $i < $lastEntry; $i++)
		{
			if (!is_null($filterFunction) && function_exists($filterFunction))
				$out .= $filterFunction(utf8_encode($lines[$i]));
			else
				$out .= utf8_encode($lines[$i]);
		}

		//Update the last shown line number
		$_SESSION[$sessionPrefix]['lastLogLine'] = $lastEntry;
	}

	return($out);
}





/**
**name HELPER_rmRecursive($dir)
**description Removes a directory with sub-directories and contained files.
**parameter: dir: Full path to the directory.
**/
function HELPER_rmRecursive($dir)
{
	//Run thru the files an directories of the current directory
	foreach(glob($dir . '/*') as $fileOrDir)
	{
		//Check if it is a file => delete it
		if(file_exists($fileOrDir))
			unlink($fileOrDir);
		else
		//Check if it is a directory => run another instance of HELPER_rmRecursive
			HELPER_rmRecursive($fileOrDir);
	}
	//Remove the directory itself
	@rmdir($dir);
}





/**
**name HELPER_showBAfH()
**description Shows the German BAfH excuse of the day.
**/
function HELPER_showBAfH()
{
	include_once('/m23/inc/bafh_ausreden.php');
	$numExcuse = count($ausredenSammlung);
	$firstTime = 1335045600;
	$oneDay = 60 * 60 * 24;
	$now = time();
	$daysPassed = intval(($now - $firstTime) / $oneDay);
	$index = $daysPassed % $numExcuse;

	echo("
	<br>
	<table style=\"max-width:100%; border-width:9px; border-color:orange; border-style:double; padding:5px;\">
		<tr>
			<td width=105px>
				<img src=\"/gfx/rabe_links100.png\" alt = \"Rabe links\">
			</td>
			<td style=\"vertical-align:middle\">
				<i>Die BAfH (Bastard Administrator from Hell)-Ausrede des Tages lautet:</i><br>
				<p><span style=\"font-size:larger\"><i><b>".$ausredenSammlung[$index]."</b></i></span></p>
				<p align=\"right\"><span style=\"font-size:x-small\">CC-BY Florian Schiel<p>
			</td>
			<td width=105px>
				<img src=\"/gfx/rabe_rechts100.png\" alt = \"Rabe rechts\">
			</td>
		</tr>
	</table>
	");
}





/**
**name HELPER_ucrc32($in)
**description Returns the unsigned crc32 sum of an input value.
**parameter: in: Input to crc.
**returns Unsigned crc32 sum of an input value.
**/
function HELPER_ucrc32($in)
{
	return(sprintf("%u", crc32($in)));
}





/**
**name HELPER_md5x5($in)
**description Hashes an input value 5 times with MD5.
**parameter: in: Input to hash.
**returns Hashed value.
**/
function HELPER_md5x5($in)
{
	return(md5(md5(md5(md5(md5($in))))));
}





/**
**name HELPER_netmaskAmountOfSetBits($nm)
**description Calculates the amount of set bits in a network mask (as used in the short form of netmasks).
**parameter: nm: The netmask in decimal notation.
**returns Amount of set bits in the network mask.
**/
function HELPER_netmaskAmountOfSetBits($nm)
{
	$long = ip2longSafe($nm);
	$base = ip2longSafe('255.255.255.255');
	return(32-log(($long ^ $base)+1,2));
}





/**
**name HELPER_networkCalculator($ip, $nm)
**description Calculates the network IP by a given IP and the netmask.
**parameter: ip: The IP.
**parameter: nm: The netmask.
**returns Network IP.s
**/
function HELPER_networkCalculator($ip, $nm)
{
	return(long2ip(ip2longSafe($nm) & ip2longSafe($ip)));
}





/**
**name HELPER_netmaskCalculator($nm)
**description Converts a short netmask (e.g. 24 for 255.255.255.0) into the decimal notation.
**parameter: nm: The netmask to convert. If a netmask in decimal notation is given, no conversation is done.
**returns Netmask in decimal notation.
**/
function HELPER_netmaskCalculator($nm)
{
	//Check if it is a decimal netmask (http://de.wikipedia.org/wiki/Classless_Inter-Domain_Routing#Eine_.C3.9Cbersicht)
	if (is_numeric($nm))
	{
		//Generate a valid binary netmask
		$bin = str_repeat(1, $nm);
		$bin .= str_repeat(0, 32-$nm);

		//Split it into octets
		$dec = bindec($bin);
		$d = $dec % 256;
		$c = ($dec /= 256) % 256;
		$b = ($dec /= 256) % 256;
		$a = ($dec /= 256) % 256;

		//Build the netmask in decimal notation
		$nm = "$a.$b.$c.$d";
	}

	return($nm);
}





/**
**name HELPER_importAllIntoPOST()
**description Imports all values into the $_POST array in case that there are too much array keys for the normal processing.
**/
function HELPER_importAllIntoPOST()
{
	foreach (explode("&", file_get_contents("php://input")) as $postline)
	{
		$tmp = explode("=", $postline);
		$_POST[$tmp[0]] = $tmp[1];
	}
}





/**
**name HELPER_randomUsername($length)
**description Generates a random username with a given length.
**parameter length: Length of the username to create.
**returns The random username.
**/
function HELPER_randomUsername($length)
{
	$out='';

	//All characters
	$allowedChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

	//Add the wished amount of characters to the string
	for ($i=0; $i < $length; $i++)
	{
		//Add numbers after the first char has been added.
		if ($i == 1)
			$allowedChars .= "0123456789";
		$out .= $allowedChars[(mt_rand(0,(strlen($allowedChars)-1)))];
	}
	return($out);
}





/**
**name HELPER_createSelfSignedCAAndServerCertificate($CADn, $serverDn, $password, $expirationDate)
**description Creates a selfsigned CA and a server certificate.
**parameter CADn: Information about the CA.
**parameter serverDn: Information about the server.
**parameter password: Password for the private server key.
**parameter expirationDate: Expiration of the certificates in days.
**returns Associative array with the certificate of the CA, the certificate and private key of the server.
**/
function HELPER_createSelfSignedCAAndServerCertificate($CADn, $serverDn, $password, $expirationDate)
{
	/*
	$serverDn = array(
		"countryName" => "ZZ",
		"stateOrProvinceName" => "Z-State",
		"localityName" => "Z-Stadt",
		"organizationName" => "Z-Firma",
		"organizationalUnitName" => "Z-Abteilung",
		"commonName" => "server.zarafa.localhost",
		"emailAddress" => "wez@z.com"
	);

	$CADn = array(
		"countryName" => "DE",
		"stateOrProvinceName" => "Somerset",
		"localityName" => "Glastonbury",
		"organizationName" => "The Brain Room Limited",
		"organizationalUnitName" => "PHP Documentation Team",
		"commonName" => "Wez Furlong",
		"emailAddress" => "wez@example.com"
	);
	*/

	//Generate the CA
	$CAPrivkey = openssl_pkey_new();
	$CACSR = openssl_csr_new($CADn, $CAPrivkey);
	$cacert = openssl_csr_sign($CACSR, null, $CAPrivkey, $expirationDate);
	openssl_x509_export($cacert, $out['cacertPEM']);

	//Create the 
	$serverPrivkey = openssl_pkey_new();
	$serverCSR = openssl_csr_new($serverDn, $serverPrivkey);
	$sscert = openssl_csr_sign($serverCSR, $cacert, $CAPrivkey, $expirationDate);
	openssl_x509_export($sscert, $out['serverCert']);
	openssl_pkey_export($serverPrivkey, $out['serverPrivateKey'], $password);	
	openssl_pkey_export($serverPrivkey, $out['serverPrivateKeyUnencrypted']);

	return($out);
}





/**
**name HELPER_arrayReOrderKeynumbers($inArray)
**description Changes all keys of the input array to simple ascending numbers, if the key of the inpur array is a number (if not, the key will be left unchanged). The order of the keys is preserved.
**parameter inArray: The input array.
**returns New array with the ascending key numbers.
**/
function HELPER_arrayReOrderKeynumbers($inArray)
{
	//Change the keys to simple numbers
	$i = 0;
	foreach ($inArray as $key => $val)
	{
		if (is_numeric($key))
			$out[$i++] = $val;
		else
			$out[$key] = $val;
	}

	return($out);
}





/**
**name HELPER_arrayInsertBeforeKeynumber($inArray, $beforeKeynumber, $val)
**description Inserts a value into an array (that has simple numbers as keys) before a given key.
**parameter inArray: The input array.
**parameter beforeKeynumber: The key number the value should be inserted before.
**parameter val: The value that should be inserted.
**returns New array with the new value inserted.
**/
function HELPER_arrayInsertBeforeKeynumber($inArray, $beforeKeynumber, $val)
{
	//Make the key of the value we want to insert the new value before a bit bigger
	$inArray[$beforeKeynumber.'.2'] = $inArray[$beforeKeynumber];
	//Make the key of the new value a bit smaler
	$inArray[$beforeKeynumber.'.1'] = $val;
	//Remove the old entry
	unset($inArray[$beforeKeynumber]);

	//Sort the array
	ksort($inArray);

	return(HELPER_arrayReOrderKeynumbers($inArray));
}





/**
**name HELPER_arrayInsertAfterKeynumber($inArray, $afterKeynumber, $val)
**description Inserts a value into an array (that has simple numbers as keys) after a given key.
**parameter inArray: The input array.
**parameter afterKeynumber: The key number the value should be inserted after.
**parameter val: The value that should be inserted.
**returns New array with the new value inserted.
**/
function HELPER_arrayInsertAfterKeynumber($inArray, $afterKeynumber, $val)
{
	//Insert the value in the array with a new key that will be (after sorting) after the choosen key
	$inArray[$afterKeynumber.'.1'] = $val;

	//Sort the array
	ksort($inArray);

	return(HELPER_arrayReOrderKeynumbers($inArray));
}





/**
**name HELPER_m23Array2Array($m23Array)
**description Converts an m23 array to a normal array.
**parameter m23Array: The m23 array to convert. The m23 array is a 2D array, that consists of keys build of a parameter names combined with a parameter number. Parameter names with the same parameter number belong together. (e.g. [command0] => format, [path0] => /dev/md0, [fs0] => ext4, ...)
**returns A normal array, that may be edited more easyly. (e.g [0] => Array([command] => format, [path] => /dev/md0, [fs] => ext4 ))
**/
function HELPER_m23Array2Array($m23Array)
{
	foreach($m23Array as $param => $val)
	{
		/*
			Split the parameter (e.g. path0) into parameter name and parameter number:
			Example: $param="path0" => $allCommandNr[0]="path0", $allCommandNr[1]="path0", $allCommandNr[2]="0"
		*/
		preg_match('/([^0-9]+)([0-9]+)/', $param, $allCommandNr);

		//Check if the parameter number is set or if it is a variable that does not belong to a parameter group (e.g. job_amount)
		if (is_numeric($allCommandNr[2]))
			$array[$allCommandNr[2]][$allCommandNr[1]]=$val;
		else
		//Mark parameters not belonging to a parameter group with 'a'
			$array['a'][$param]=$val;
	}
	return($array);
}





/**
**name HELPER_array2m23Array($array)
**description Converts a normal array to an m23 array.
**parameter array: A normal array, that may be edited more easyly. (e.g [0] => Array([command] => format, [path] => /dev/md0, [fs] => ext4 ))
**returns The m23 array, that is a 2D array, that consists of keys build of a parameter names combined with a parameter number. Parameter names with the same parameter number belong together. (e.g. [command0] => format, [path0] => /dev/md0, [fs0] => ext4, ...)
**/
function HELPER_array2m23Array($array)
{
	//Run thru the normal array and get the parameter numbers and an array consisting of the parameter names and the values
	foreach($array as $paramNr => $paramNameVal)
	{
		//Run thru the parameter names and the values
		foreach($paramNameVal as $paramName => $val)
		{
			//If the parameter number is 'a' the parameter does not belong to a parameter group (=== is needed, because 0 == a)
			if ($paramNr === 'a')
				$m23array[$paramName] = $val;
			else
			//Otherwise the parameter will be stored under the key the is build of the paramete name combined with a parameter number.
				$m23array["$paramName$paramNr"] = $val;
		}
	}
	return($m23array);
}





/**
**name print_r2($in)
**description Function like print_r, but sorts the entries, if the input is an array and converts newlines to HTML breaks.
**parameter in: Value to print.
**/
function print_r2($in)
{
	if (is_array($in))
		ksort($in);

	echo(nl2br(print_r($in,true)));
}





/**
**name HELPER_debugBacktraceToFile($file)
**description Writes/Appends debug information about all calling functions and parameters into a file.
**parameter file: File name with full path, where the debug information should be stored.
**/
function HELPER_debugBacktraceToFile($file)
{
	$msg = "";

	//Open the file for appending
	$fp = fopen($file,"a");

	foreach (debug_backtrace() as $debug)
		fputs($fp, "$debug[file]:$debug[line]\n==> $debug[function](".implode(",",$debug['args']).")\n\n");

	fclose($fp);
}





/**
**name HELPER_getRemoteFileContents($url, $storeFile, $refreshTime, $forceOverwrite = true, $noProxy = false)
**description Downloads a file if it is not older than a given time and returns its contents.
**parameter url: The URL where to download the file from.
**parameter storeFile: The file name to store the download in.
**parameter refreshTime: The time in minutes the file is downloaded again.
**parameter forceOverwrite: Set to true if the file should be overwritten even if the new file is epmty.
**parameter noProxy: Set to true, if the system proxy should not be used.
**returns The contents of the files from chache or from download or false if no file could be found.
**/
function HELPER_getRemoteFileContents($url, $storeFile, $refreshTime, $forceOverwrite = true, $noProxy = false)
{
	$tempDir = "/m23/tmp/HELPER_getRemoteFileContents";
	@mkdir($tempDir);
	$filePath = "$tempDir/$storeFile";

	if ($noProxy)
		$proxyVariables = '';
	else
		$proxyVariables = CSYSTEMPROXY_getEnvironmentVariables();

	//Download the file if it doesn't exist or is too old
	if ((!is_file($filePath)) || ((time() - filemtime($filePath)) / 60) > $refreshTime)
	{
		//Download the file
		system($proxyVariables."\nwget \"$url\" -O $filePath.temp -t1 -T5");
	}

	if (file_exists("$filePath.temp") && ((filesize("$filePath.temp") > 0) || $forceOverwrite))
		rename("$filePath.temp", $filePath);

	if (file_exists($filePath))
	{
		$file=fopen($filePath,"r");
		$text=fread($file,200000);
		fclose($file);
		return($text);
	}
	else
		return(false);
}





/**
**name HELPER_passGenerator($length,$amount = 1)
**description Generates semi-random passwords via pwgen or DB_genPassword.
**parameter length: The length of the passwords.
**parameter amount: The amount of passwords to generate.
**returns Array with the generated passwords if $amount > 1 or the password string directly if $amount = 1.
**/
function HELPER_passGenerator($length, $amount = 1)
{
	//check if pwgen is installed
	if (isProgrammInstalled("pwgen"))
		$passwords = MASS_passGenerator($firstPasswordLength,"pwgen",$length);
	else
		$passwords = MASS_passGenerator($firstPasswordLength,"random",$length);

	if ($amount == 1)
		return($passwords[0]);
	else
		return($passwords);
}





/**
**name HELPER_array2AssociativeArray($in)
**description Copies the values of an array as keys AND values to a new assiciative array.
**parameter in: Input array.
**returns Associative array with equal keys and values.
**/
function HELPER_array2AssociativeArray($in)
{
	$out = array();
	foreach($in as $val)
		$out[$val] = $val;

	return($out);
}





/**
**name HELPER_randomMAC()
**description Generates a random MAC address.
**returns Random MAC address in the format XX:XX:XX:XX:XX:XX (e.g. 70:c4:d4:49:6e:27).
**/
function HELPER_randomMAC()
{
	$mac = "00";
	for ($i = 0; $i < 5; $i++)
		$mac .= ":".substr(md5(rand()),0,2);
	return($mac);
}





/**
**name HELPER_generateSalt($length)
**description Generates a random salt string.
**parameter length: Length of the salt.
**returns Random salt of given length.
**/
function HELPER_generateSalt($length)
{
	/*
		This is based on the GPL code found at
		https://svn.linux.ncsu.edu/svn/cls/trunk/kscfg/kickstart-8.0/index.php
	*/
	$salt = "";

	//create a salt with $length characters
	for ($i=1; $i<=$length; $i++)
	{
		do
			{
				mt_srand((double)microtime()*1000000);
				//generate random numbers that are representing characters
				$num = mt_rand(46,122);
			}
		while ( ( $num > 57 && $num < 65 ) || ( $num > 90 && $num < 97 ) );

		//add the single random charactes until 6 are appended
		$salt = $salt.chr($num);
	}

	return($salt);
}





/**
**name HELPER_grubMd5Crypt($password)
**description Encrypts a password to the MD5 hash as expected by grub.
**parameter password: Password to encrypt.
**parameter length: Length of the salt.
**returns Encrypted password in grub style or false if MD5 hash function isn't available.
**/
function HELPER_grubMd5Crypt($password, $length=6, $algo="CRYPT_MD5")
{
	$salt = HELPER_generateSalt($length);

	//check if crypt supports MD5
	if ( constant($algo) == 1)
		return(crypt($password, '$1$'.$salt.'$'));
	else
		return(false);
}





/**
**name HELPER_listFilesInDir($dirname)
**description Lists all files in a directory and returns an array with all file names.
**parameter dirname: Name of the directory.
**returns Array with all file names.
**/
function HELPER_listFilesInDir($dirname)
{
	$dir=opendir($dirname);
	$i=0;

	while ($fileName = readdir($dir))
	if ($fileName != "." && $fileName != ".." && is_file("$dirname/$fileName"))
	{
		$out[$i] = $fileName;
		$i++;
	}

	if (count($out) > 1)
		sort($out);

	//close the directory handle
	closedir($dir);
	return($out);
}





/**
**name HELPER_getBootLoaders()
**description Returns a list of available bootloaders.
**returns Array with available bootloaders.
**/
function HELPER_getBootLoaders()
{
	return(array('grub' => 'grub'));
}





/**
**name HELPER_getTimeZones()
**description Searches for all time zones.
**parameter country: two letter country name that is used to select a timezone if none is set with $first.
**returns Array with all time zones.
**/
function HELPER_getTimeZones($country = "")
{
	//get all timezones with country and city name
	exec("cd /usr/share/zoneinfo/posix/ ; find . -mindepth 1 | sort | sed 's/\.\///g'",$timezones);

	if (!empty($country))
	{
		switch ($country)
		{
			case "de":	$first = array("Europe/Berlin"); break;
			case "en":
			case "uk":
				$first = array("Europe/London");
				break;
			case "fr":	$first = array("Europe/Paris"); break;
			case "be-nl":	$first = array("Europe/Brussels"); break;
			case "bg":	$first = array("Europe/Sofia"); break;
			case "tw":	$first = array("Asia/Taipei"); break;
			case "cn":	$first = array("Asia/Taipei"); break;
			case "dk":	$first = array("Europe/Copenhagen"); break;
			case "et":	$first = array("Europe/Tallinn"); break;
			case "fi":	$first = array("Europe/Helsinki"); break;
			case "gr":	$first = array("Europe/Athens"); break;
			case "ie":	$first = array("Europe/Dublin"); break;
			case "nl":	$first = array("Europe/Amsterdam"); break;
			case "is":	$first = array("Atlantic/Reykjavik"); break;
			case "it":	$first = array("Europe/Rome"); break;
			case "no":	$first = array("Europe/Oslo"); break;
			case "pl":	$first = array("Europe/Warsaw"); break;
			case "pt":	$first = array("Europe/Lisbon"); break;
			case "ro":	$first = array("Europe/Bucharest"); break;
			case "ru":	$first = array("Europe/Moscow"); break;
			case "sv":	$first = array("Europe/Stockholm"); break;
			case "ch-de":	$first = array("Europe/Zurich"); break;
			case "sr":	$first = array("Europe/Belgrade"); break;
			case "sk":	$first = array("Europe/Bratislava"); break;
			case "sl":	$first = array("Europe/Ljubljana"); break;
			case "es":	$first = array("Europe/Madrid"); break;
			case "hu":	$first = array("Europe/Budapest"); break;
			case "cs":	$first = array("Europe/Belgrade"); break;
			case "tr":	$first = array("Europe/Istanbul"); break;
			case "ja":	$first = array("Asia/Tokyo"); break;
			case "lt":	$first = array("Europe/Vilnius"); break;
			case "il":	$first = array("Asia/Jerusalem"); break;
			case "id":	$first = array("Asia/Jakarta"); break;
			default	 :	$first = array("UTC");
		};
		return(array_merge($first,$timezones));
	}
	else
	return($timezones);
};





/**
**name HELPER_calcMBSize($number,$from=0,$trunc=false)
**description calculates the size in MB from a given input that can be a GB value or measured in %
**parameter number: the number to convert
**parameter from: if number is a percent value, the output will be the percentage of the from value
**parameter trunc: set to true, if the output value should be trunced
**/
function HELPER_calcMBSize($number,$from=0,$trunc=false)
{
	//calculate the GB value
	if (!(stristr($number,"gb") === FALSE))
		{
			$number = preg_replace("/[gG][bB]/","",$number);
			$out = $number * 1024;
		}
		
	//calculate the percent value of
	elseif (!(stristr($number,"%") === FALSE))
		{
			//try to transform, may be there is a GB inside
			$from = HELPER_calcMBSize($from);
			
			$number = str_replace("%","",$number);
			$out = ($from * $number) / 100;
		}
	else
		$out = $number;

	//trunc the float number
	if ($trunc)
		$out = sprintf("%.0f",$out);

	return($out);
};





/**
**name HELPER_grep($string,$search,$cut="\n")
**description returnes all lines from $string seperated by $cut that contain $search
**parameter string: the text, that should be searched
**parameter search: the string to be searched
**parameter cut: seperator for the input and output lines
**returns The found lines as string separated by $cut.
**/
function HELPER_grep($string, $search, $cut="\n")
{
	$parts = explode($cut,$string);
	$out = "";

	for ($i=0; $i < count($parts); $i++)
		if (!(strpos($parts[$i],$search) === false))
			$out.=$cut.trim($parts[$i]);

	return($out);
}





/**
**name HELPER_grepNot($string,$search,$cut="\n")
**description Returnes all lines from $string seperated by $cut that do NOT contain $search.
**parameter string: the text, that should be searched
**parameter search: the string to be searched
**parameter cut: seperator for the input and output lines
**returns The found lines as string separated by $cut.
**/
function HELPER_grepNot($string, $search, $cut="\n")
{
	$parts = explode($cut,$string);
	$out = "";
	$cut2 = '';

	for ($i=0; $i < count($parts); $i++)
		if (strpos($parts[$i],$search) === false)
		{
			if ($i > 0)
				$cut2 = $cut;
			$out.=$cut2.trim($parts[$i]);
		}

	return($out);
}




/**
**name HELPER_grepCount($string,$search,$cut="\n")
**description Counts the lines from $string seperated by $cut that contain $search.
**parameter string: the text, that should be searched
**parameter search: the string to be searched
**parameter cut: seperator for the input and output lines
**returns Amount of lines that match the $search.
**/
function HELPER_grepCount($string,$search,$cut="\n")
{
	$parts = explode($cut,$string);
	$found = 0;

	for ($i=0; $i < count($parts); $i++)
		if (!(strpos($parts[$i],$search) === false))
			$found++;

	return($found);
};





/**
**name HELPER_getFdiskMountPoints($excludeExtra=true)
**description Returnes an array with all mount points listed in /etc/fstab
**parameter excludeExtra: set to true, if you want to exclude /proc and /sys from the array
**returns Found mount points as array keys and values.
**/
function HELPER_getFdiskMountPoints($excludeExtra=true)
{
	$extraGrep=" | grep -v '/proc$' | grep -v '/sys$' ";

	$cmd="grep -v \"^#\" /etc/fstab | awk '{print $2}' | grep '/' | grep -v \"^/$\" | sort";

	if ($excludeExtra)
		$cmd.=$extraGrep;

	$pipe=popen($cmd,"r");
	if ($pipe === FALSE)
		return("");

	while ($line=fgets($pipe))
	{
		$line = trim($line);
		$out[$line] = $line;
	}

	pclose($pipe);

	return($out);
}





/**
**name HELPER_getApacheUser()
**description returnes the name of the Apache user
**/
function HELPER_getApacheUser()
{
	return(exec("whoami"));
};





/**
**name HELPER_getApacheGroup()
**description returnes the group of the Apache user
**/
function HELPER_getApacheGroup()
{
	return(exec("id -gn"));
};





/**
**name HELPER_putFileContents($fileName, $contents)
**description Writes data to a file.
**parameter fileName: name of the file to write
**parameter contents: Text or data that should be written to the file.
**returns Error code from fwrite.
**/
function HELPER_putFileContents($fileName, $contents)
{
	$file=fopen($fileName,"w");
	$ret = fwrite($file,$contents);
	fclose($file);
	return($ret);
};




/**
**name HELPER_getFileContents($fileName)
**description returnes the contents of a file (the file is read to a maximum of 5 MB)
**parameter fileName: name of the file to read
**/
function HELPER_getFileContents($fileName)
{
	if (!file_exists($fileName))
		return(false);
		
	$file=fopen($fileName,"r");
	$text=fread($file,5242880); //max file size = 5MB
	fclose($file);
	return($text);
};





/**
**name HELPER_showFileContents($fileName)
**description Shows the contents of a file (the file is read to a maximum of 5 MB)
**parameter fileName: name of the file to read
**/
function HELPER_showFileContents($fileName)
{
	if (!file_exists($fileName))
		return(false);
		
	$file=fopen($fileName,"r");
	while ($line=fgets($file))
		echo($line);
	fclose($file);
	return(true);
};





/**
**name HELPER_maxPhpUploadSize()
**description Returns the maximum file upload size allowed by php.ini.
**/
function HELPER_maxPhpUploadSize()
{
	return(exec("grep '\(post_max_size\|upload_max_filesize\)' /etc/php4/apache/php.ini | cut -d' ' -f3 | sort -b -r | head -1"));
}





/**
**name HELPER_compareLengthAbc($a, $b)
**description Compares the length of two strings and then by alphabet
**parameter $a: string of a certain length
**parameter $b: string of a certain length
**/
function HELPER_compareLengthAbc($a, $b)
{	
	if (strlen($a) == strlen($b)) 
	{
		return (strcasecmp($a, $b));
	}
	return (strlen($a) < strlen($b)) ? -1 : 1;
}




/**
**name HELPER_sortByLength($array)
**description Sorts an array by length of its values, shortest value first, keeping key-value pairs
**parameter $array: The array you want to sort by length
**/
function HELPER_sortByLength(&$array)
{
	uasort($array, 'HELPER_compareLengthAbc');
}





/**
**name HELPER_hostname2IP($host)
**description Gets the IP of a known host.
**parameter host: Name of the host, IP or FQDN.
**returns IP of the host or false, if no IP could be found.
**/
function HELPER_hostname2IP($host)
{
	$ret = exec("sudo /bin/ping -c1 $host | head -1 | cut -d'(' -f2 | cut -d')' -f1");
	return(isset($ret{4}) ? $ret : false);
}

?>
