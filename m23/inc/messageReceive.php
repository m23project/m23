<?PHP

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Functions for handling messages sent by m23 clients.
$*/



/**
**name MSR_decodeMessage()
**description checks the type of the message and cals the right procedure
**/
function MSR_decodeMessage()
{
	switch ($_POST['type'])
	{
		case 'pkg':
		{
			MSR_importPackageStatus();
			break;
		}

		case 'log':
		{
			MSR_importLog();
			break;
		}

		case 'statusFile':
		{
			MSR_importStatusFile();
			break;
		}

		case 'partHwData':
		{
			MSR_importPartHwData();
			break;
		}

		case 'clientChange':
		{
			MSR_clientChange();
			break;
		}

		case 'clientSettings':
		{
			MSR_clientSettings();
			break;
		}

		case 'm23ImagerSize':
		{
			MSR_m23ImagerSize();
			break;
		}

		case 'MSR_m23ImagerMBR':
		{
			MSR_m23ImagerMBR();
			break;
		}

		case 'MSR_markm23normalAsDone':
		{
			MSR_markm23normalAsDone();
			break;
		}

		case 'MSR_VM_setHostInDB':
		{
			$VMhost = CLIENT_getClientName();
			VM_setHostInDB($VMhost, $_POST['password'], $_POST['VMtype']);
			break;
		}

		case 'MSR_VM_setVisualURL':
		{
			$VMguest = $_POST['clientName'];
			VM_setVisualURL($VMguest,$_POST['url']);
			break;
		}

		case 'MSR_copyClientPackageStatusdiff':
		{
			MSR_copyClientPackageStatus('diff');
			break;
		}

		case 'MSR_copyClientPackageStatusfull':
		{
			MSR_copyClientPackageStatus('full');
			break;
		}

		case 'MSR_curDynIP':
		{
			MSR_curDynIP($_POST['curIP']);
			break;
		}

		case 'MSR_statusBar':
		{
			MSR_statusBar($_POST['percent'],$_POST['statustext']);
			break;
		}

		case 'MSR_statusBarInc':
		{
			MSR_statusBarInc($_POST['percent']);
			break;
		}

		case 'BuildPoolFromClientDebs':
		{
			MSR_buildPoolFromClientDebs();
			break;
		}

		case 'MSR_setOnline':
		{
			MSR_setOnline($_POST['online']);
			break;
		}

		//m23customPatchBegin type=change id=MSR_decodeMessageAdditionalCases
		//m23customPatchEnd id=MSR_decodeMessageAdditionalCases
			
		case 'MSR_sshHttpsStatus':
		{
			MSR_sshHttpsStatus();
			break;
		}

		case 'MSR_setTimeStampForRebootClientAfterJobsIsNecessary':
		{
			MSR_setTimeStampForRebootClientAfterJobsIsNecessary();
			break;
		}
		
		case 'MSR_unsetTimeStampForRebootingClientIfNOTNecessary':
		{
			MSR_unsetTimeStampForRebootingClientIfNOTNecessary();
			break;
		}
	}
}





/**
**name MSR_curDynIPCommand($return)
**description Generates the commands to transfer the current dynamic IP of the m23 client to the server.
**parameter return: true, if the commands should be returned, false when shown.
**/
function MSR_curDynIPCommand($return)
{
$m23Server = getServerIP();

$cmd = "\n".MSR_getm23clientIDCMD('?')."

#Check if the client has a dynamic IP
if [ ! -f /etc/network/interfaces ] || [ `grep static /etc/network/interfaces | grep eth -c` -eq 0 ]
then
	#Check, if the tool ip is present
	ip -V &> /dev/null
	if [ $? -eq 0 ]
	then
		serverGateway=$(ip route | awk '/default/ { print $3 }' | head -1)
	else
		serverGateway=$(route -n | grep '^0\.0\.0\.0' | tr -s '[:blank:]' | cut -d' ' -f2)
	fi

	#CloudStack test
#	wget -T5 -t5 http://\$serverGateway/latest/public-ipv4 -O /tmp/clientIP

#	if [ $? -eq 0 ] && [ -f /tmp/clientIP ] && [ $(grep -E '[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}' -c /tmp/clientIP) -eq 1 ]
#	then
		#yes, run in CloudStack
#		curIP=$(cat /tmp/clientIP)
#	else
		#no, normal DHCP IP
		curIP=`export LC_ALL=C; ifconfig | grep \"inet addr\" | cut -d':' -f2 | cut -d' ' -f1 | head -1`
#	fi
	wget -T5 -t0 --post-data \"type=MSR_curDynIP&curIP=\$curIP\" https://$m23Server/postMessage.php\$idvar -O /tmp/clientIP.log
fi
";

if ($return)
	return($cmd);
else
	echo($cmd);
}





/**
**name MSR_buildPoolFromClientDebsCMD()
**description Generates the commands to start the process for building a CPoolFromClientDebsGUI object and to start the download of the packages from the client to the server and the creation of the pool.
**/
function MSR_buildPoolFromClientDebsCMD()
{
	MSR_genericSendCommand('BuildPoolFromClientDebs', 'x=y');
}





/**
**name MSR_buildPoolFromClientDebs()
**description Builds a CPoolFromClientDebsGUI object and starts the download of the packages from the client to the server and the creation of the pool.
**/
function MSR_buildPoolFromClientDebs()
{
	$client = CLIENT_getClientName();

	$GLOBALS["m23_language"] = 'en';

	include_once('/m23/inc/CMessageManager.php');
	include_once('/m23/inc/CChecks.php');
	include_once('/m23/inc/CClient.php');
	include_once('/m23/inc/CClientLister.php');
	include_once('/m23/inc/CPoolLister.php');
	include_once('/m23/inc/CPool.php');
	include_once('/m23/inc/CPoolGUI.php');
	include_once('/m23/inc/CPoolFromClientGUI.php');
	include_once('/m23/inc/CPoolFromClientDebsGUI.php');
	include_once('/m23/inc/CObjectStorageManager.php');
	include_once('/m23/inc/CObjectStorage.php');

	$poolFromClientDebsGUIO = new CPoolFromClientDebsGUI($client);
	$poolFromClientDebsGUIO->saveInObjectStorage($client);
	$poolFromClientDebsGUIO->downloadPackagesAndCreatePool($client);
}





/**
**name MSR_statusBarInc($percent)
**description Increments the status bar percent by a given amount for the current client and for the "installStatus" status bar.
**parameter percent: Percent value of the current job.
**/
function MSR_statusBarInc($percent)
{
	HTML_incStatusBarPercentByName('installStatus', CLIENT_getClientName(), (float)$percent);
}





/**
**name MSR_statusBarIncCommand($percent)
**description Command to increment the status bar percent by a given amount for the current client and for the "installStatus" status bar.
**parameter percent: Percent value of the current job.
**/
function MSR_statusBarIncCommand($percent)
{
	MSR_genericSendCommand('MSR_statusBarInc', "percent=$percent");
}





/**
**name MSR_statusBarCommand($percent, $statustext)
**description Command to set a new percent value and/or new status text for the current client and for the "installStatus" status bar.
**parameter percent: Percent value to write into the DB (may be false, if it should not be changed).
**parameter statustext: A text message that should be shown under the status bar and written to the DB (may be false, if it should not be changed).
**/
function MSR_statusBarCommand($percent, $statustext)
{
	$statustext = urlencode($statustext);
	MSR_genericSendCommand('MSR_statusBar', "percent=$percent&statustext=$statustext", '-qq');
}





/**
**name MSR_genericSendCommand($type, $params, $wgetParams = "")
**description Generates a generic command for sending information from the client to the server.
**parameter type: Type of the message understood by MSR_decodeMessage
**parameter params: Parameters to send with POST to the server in the form of "var1=val1&var2=val2&var3=val3..."
**parameter wgetParams: Extra parameters for wget.
**/
function MSR_genericSendCommand($type, $params, $wgetParams = '', $returnInsteadOfEcho = false)
{
	$serverIP=getServerIP();

	$out = '

	'.MSR_getm23clientIDCMD('?')."

	wget $wgetParams -T5 -t0 --post-data \"type=$type&$params\" https://$serverIP/postMessage.php\$idvar -O /dev/null
	";
	
	if ($returnInsteadOfEcho)
		return($out);
	else
		echo($out);
}





/**
**name MSR_statusBar($percent, $statustext)
**description Sets new percent value and/or new status text.
**parameter percent: Percent value to write into the DB (may be empty, if it should not be changed).
**parameter statustext: A text message that should be shown under the status bar and written to the DB (may be empty, if it should not be changed).
**/
function MSR_statusBar($percent, $statustext)
{
	HTML_setStatusBarStatusByName('installStatus', CLIENT_getClientName(), (is_numeric($percent) ? (float)$percent : false), (isset($statustext{0}) ? $statustext : false));
}





/**
**name MSR_curDynIP($curIP)
**description Sets the current IP of a client with dynamic IP.
**parameter curIP: The current IP.
**/
function MSR_curDynIP($curIP)
{
	if (CHECK_FW(true, CC_ip, $curIP) === true)
		DB_query("UPDATE `clients` SET `ip` = \"$curIP\" WHERE `client` = \"".CLIENT_getClientName()."\"");
}





/**
**name MSR_copyClientPackageStatus($diffType)
**description Writes a sent full or difference package status file to the correct directory.
**parameter diffType: "full" for a complete copy of the file and "diff" for a difference copy.
**/
function MSR_copyClientPackageStatus($diffType)
{

	if (function_exists('m23SHARED_getCompleteClientName'))
		$clientName = m23SHARED_getCompleteClientName();
	else
		$clientName = CLIENT_getClientName();
	@mkdir('/m23/var/cache/clients',0755);
	@mkdir("/m23/var/cache/clients/$clientName",0755);
	MSR_importDiffFile("/m23/var/cache/clients/$clientName/packageStatus",$diffType);
}





/**
**name MSR_importDiffFile($outFile, $diffType)
**description Writes a sent full or difference file to the destination.
**parameter outFile: The file name (with full path) on the server to store the file.
**parameter diffType: "full" for a complete copy of the file and "diff" for a difference copy.
**/
function MSR_importDiffFile($outFile, $diffType)
{
	$data = bzdecompress(MSR_decodeClientSideBase64($_POST['data'],$_POST['md5']));

	switch ($diffType)
	{
		case 'full':
			$file = fopen($outFile,'w');

			if ($file)
				{
					fwrite($file,$data);
					fclose($file);
				};
		break;

		case 'diff':
			$file = fopen("$outFile.diff",'w');

			if ($file)
				{
					fwrite($file,$data);
					fclose($file);
				};

			exec("patch $outFile $outFile.diff");
		break;
	}
	
};





/**
**name MSR_CommandCopyClientPackageStatus()
**description Generates commands to transfer the package status file from the client to the server.
**/
function MSR_CopyClientPackageStatusCommand()
{
	$clientName = CLIENT_getClientName();
	echo('
	if [ ! -f /tmp/HSClient ]
	then
');
		MSR_copyDiffFileFromClient('/var/lib/dpkg/status', "/m23/var/cache/clients/$clientName/packageStatus", 'MSR_copyClientPackageStatus');
	echo('
	fi
');
};





/**
**name MSR_copyDiffFileFromClient($clientFile, $serverFile, $type)
**description Sends a file from the client to the server and tries to send only the changes towards an existing file on the server.
**parameter clientFile: Name of the file on client side (with full path)
**parameter serverFile: Name of the file on server side (with full path)
**parameter type: Type of the message understood by MSR_decodeMessage (extended by the type of transfer XXXfull or XXXdiff)
**/
function MSR_copyDiffFileFromClient($clientFile, $serverFile, $type)
{
	if (file_exists("$serverFile"))
		$md5 = md5_file($serverFile);
	else
		$md5 = 'XXX';

	$oldClientFile = "$clientFile.m23old";
	$diffClientFile = "$clientFile.m23diff";

echo ("
	#Check if the inputfile is unchanged
	if [ `md5sum $clientFile | cut -d ' ' -f1` = $md5 ]
	then
		echo \"unchanged\"
	fi

	#Check if the old file is there and identically with the file on the server
	if [ -f $oldClientFile ] && [ `md5sum $oldClientFile | cut -d ' ' -f1` = $md5 ]
	then
		diff -d $oldClientFile $clientFile | bzip2 -9 - -c > $diffClientFile
		cp -a $clientFile $oldClientFile
		");
		MSR_genSendBinayFileCommand($diffClientFile,$type.'diff');
echo("
	else
	#If not make a full copy of the file
		bzip2 -9 $clientFile -c > $diffClientFile
		cp -a $clientFile $oldClientFile
		");
		MSR_genSendBinayFileCommand($diffClientFile,$type.'full');
echo('
	fi
');
}





/**
**name MSR_markm23normalAsDone()
**description Marks comming m23normal install jobs as done if the packages they would install are already installed. This may happen when a package with dependencies is installed.
**parameter $_POST['data']: List of new installed packages.
**/
function MSR_markm23normalAsDone()
{
	$clientName = CLIENT_getClientName();
	$packagesSQL = str_replace("\n","' OR normalPackage = '",urldecode($_POST['data']));

	CHECK_FW(CC_clientname, $clientName, 's', $packagesSQL);

	$sql = str_replace("OR normalPackage = ''","", "UPDATE clientjobs SET status = 'done' WHERE client = '$clientName' AND package = 'm23normal' AND status = 'waiting' AND (normalPackage = '$packagesSQL')");

	DB_query($sql); //FW ok
}





/**
**name MSR_decodeClientSideBase64($in, $md5)
**description Decodes the slightly modificated base64 input stream created from MSR_clientSideBase64Encode.
**parameter in: Base64 encoded input string.
**parameter md5: md5 sum of the original input file.
**returns Decoded (maybe binary) string.
**/
function MSR_decodeClientSideBase64($in,$md5)
{
	$in = str_replace('-','+',$in);
	$out = base64_decode($in);
	
	if (md5($out) == $md5)
		return($out);
	else
		return(false);
}





/**
**name MSR_clientSideBase64Encode($fileName)
**description Encodes a given file to (a slighly different, + is converted to - for sending it as post variable via wget) base64 format and appends the output to statusdata.post. There are three methods for generating the base64 output. First and second the native uuencode and base64 tools that are very fast and third a plattform idependent implementation of base64 encode in AWK taken from the HylaFAX package.
**parameter fileName: name of the file
**returns Commands for encoding the file.
**/
function MSR_clientSideBase64Encode($fileName)
{
/*
	This is based on the AWK base64 encoding implementation found in b64-encode.awk of HylaFAX Facsimile Software.

	#!/usr/bin/awk -f
	$Id: b64-encode.awk,v 1.2 2007/01/09 14:14:12 aidan Exp $

	HylaFAX Facsimile Software

	Copyright (c) 2006 Aidan Van Dyk
	Copyright (c) 2006 iFAX Solutions Inc.

	Permission to use, copy, modify, distribute, and sell this software and its documentation for any purpose is hereby granted without fee, provided that (i) the above copyright notices and this permission notice appear in all copies of the software and related documentation, and (ii) the names of Sam Leffler and Silicon Graphics may not be used in any advertising or publicity relating to the software without the specific, prior written permission of Sam Leffler and Silicon Graphics.

	THE SOFTWARE IS PROVIDED "AS-IS" AND WITHOUT WARRANTY OF ANY KIND, EXPRESS, IMPLIED OR OTHERWISE, INCLUDING WITHOUT LIMITATION, ANY WARRANTY OF MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE.

	IN NO EVENT SHALL SAM LEFFLER OR SILICON GRAPHICS BE LIABLE FOR ANY SPECIAL, INCIDENTAL, INDIRECT OR CONSEQUENTIAL DAMAGES OF ANY KIND,
	OR ANY DAMAGES WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER OR NOT ADVISED OF THE POSSIBILITY OF DAMAGE, AND ON ANY THEORY OF LIABILITY, ARISING OUT OF OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
*/
return('
if [ -x /bin/uuencode ] || [ -x /usr/bin/uuencode ]
then
	uuencode -m "'.$fileName.'" /dev/stdout | grep -v "^begin-base64 " | sed s#+#-#g >> /tmp/statusdata.post
else
	if  [ -x /bin/base64 ] || [ -x /usr/bin/base64 ]
	then
		cat "'.$fileName.'" | base64 | sed s#+#-#g >> /tmp/statusdata.post
	else

awk \'
function asc(char, l_found)
{
    l_found = 0
    for (i=0; i < 256; i++)
    {
	if (sprintf("%c", i) == char)
	    l_found = i;
    }
    return l_found;
}

function private_and (a, b, l_res, l_i)
{
    l_res = 0;
    for (l_i = 0; l_i < 8; l_i++)
    {
	if (a%2 == 1 && b%2 == 1)
	    l_res = l_res/2 + 128;
	else
	    l_res /= 2;
	a=int(a/2);
	b=int(b/2);
    }
    return l_res;
}

function private_lshift(x, n)
{
    while (n > 0)
    {
	x *= 2;
	n--;
    }
    return x;
}

function private_rshift(x,n)
{
    while (n > 0)
    {
	x =int(x/2);
	n--;
    };
    return x;
}


function readbytes(n,   m, s, line, str, __RS) {
#	RS = "\x00";

	m = n;
	while (m > 0) {
		s = length(__readbuffer);
		if (s == 0) {
			getline __readbuffer;
			if (RT != "")
				__readbuffer = __readbuffer RT;

			if ((s = length(__readbuffer)) == 0)
				break;

			}

		if (s > 0) {
			if (m > s) {
				str = str __readbuffer;
				m = m - s;
				__readbuffer = "";
				}
			else {
				str = str substr(__readbuffer, 1, m);
				__readbuffer = substr(__readbuffer, m+1);
				break;
				}
			}
		}

	return (str);
}

function base64_write(b1, b2, b3, n,	 r1,r2,r3,r4)
{
    r1 = private_rshift(b1,2)
    r2 = private_lshift(private_and(b1,3),4) + private_rshift(b2,4);
    printf "%c", substr(BASE64,r1+1,1);
    printf "%c", substr(BASE64,r2+1,1);

    if (n > 1)
    {
	r3 = private_lshift(private_and(b2,15),2) + private_rshift(b3,6);
	printf "%c", substr(BASE64,r3+1,1);
    } else
    	printf "="
    if (n > 2)
    {
	r4 = private_and(b3,63);
	printf "%c", substr(BASE64,r4+1,1);
    } else
    	printf "="
}

function base64_encode(input)
{
    while (length(input) > 0)
    {
	if (length(input) == 1)
	{
	    byte1=asc(substr(input,1,1));
	    byte2=0;
	    byte3=0;
	    base64_write(byte1,byte2,byte3, 1);
	}
	if (length(input) == 2)
	{
	    byte1=asc(substr(input,1,1));
	    byte2=asc(substr(input,2,1));
	    byte3=0;
	    base64_write(byte1,byte2,byte3, 2);
	}
	if (length(input) >= 3)
	{
	    byte1=asc(substr(input,1,1));
	    byte2=asc(substr(input,2,1));
	    byte3=asc(substr(input,3,1));
	    base64_write(byte1,byte2,byte3, 3);
	}
	input=substr(input,4);
    }
}

function base64(   __RS, data)
{
	__RS = RS;
	RS = "\xF1\xF2\x00";
	data = readbytes(54);
	while (length(data) > 0)
	{
		base64_encode(data);
		data = readbytes(54);
	}
	RS = __RS;
}

BEGIN {
    BASE64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
	printf "\n";
    base64()
    exit (0);
}
\' "'.$fileName.'" | sed s#+#-#g >> /tmp/statusdata.post
fi
fi
');
}





/**
**name MSR_genSendBinayFileCommand($fileName,$type)
**description Sends a binary file to postMessage.php. In contrast to MSR_genSendCommand MSR_genSendBinayFileCommand is binary safe.
**parameter fileName: Name of the file
**parameter type: Type of the message understood by MSR_decodeMessage
**/
function MSR_genSendBinayFileCommand($fileName,$type)
{
	$serverIP=getServerIP();

	echo('

	'.MSR_getm23clientIDCMD('?')."

	md5=`md5sum \"$fileName\" | cut -d' ' -f1`
	echo \"type=$type&md5=\$md5&data=\" > /tmp/statusdata.post
	".MSR_clientSideBase64Encode($fileName)."
	wget -T5 -t0 --post-file /tmp/statusdata.post https://$serverIP/postMessage.php\$idvar; #-O /dev/null");
}





/**
**name MSR_m23ImagerMBR()
**description Saves the received master boot record to a file after cecking the MD5.
**/
function MSR_m23ImagerMBR()
{
	$data = MSR_decodeClientSideBase64(trim($_POST['data']),$_POST['md5']);

	//check if there is data or if false was returned in case of an MD5 checksum error
	if ($data === false)
		return(false);
	else
	{
		//Save the received master boot record to the image filename with appeded .mbr
		$f=fopen(IMGSTOREDIR.$_POST['imagename'].'.mbr','w');
		fwrite($f,$data);
		fclose($f);
	}
}





/**
**name MSR_m23ImagerSize()
**description Sets the size of the decompressed image in its file name.
**/
function MSR_m23ImagerSize()
{
	IMG_setFilenameSize(urldecode($_POST['imagename']),($_POST['data'] * 1048576));
}





/**
**name MSR_getm23clientIDCMD($addChar)
**description returns the BASH code for storing the m23clientID in the BASH variable "varid"
**parameter addChar: is the 
**/
function MSR_getm23clientIDCMD($addChar)
{
return("\n
id=`cat /m23clientID 2> /dev/null`

if [ \$id ]
then
	idvar=\"$addChar"."m23clientID=\$id\"
fi
\n");
}





/**
**name MSR_importPackageStatus()
**description imports the data from a package status message to the database. pNr=package, vNr=version, sNr=status
**/
function MSR_importPackageStatus()
{
	$clientName = CLIENT_getClientName();
	CHECK_FW(CC_clientname, $clientName);

	$sql="DELETE FROM `clientpackages` WHERE clientname='$clientName'";

	DB_query($sql); //FW ok

	//Make sure all POST variables are imported
	HELPER_importAllIntoPOST();

	for ($i=1; $i < $_POST['count']; $i++)
	{
		$sql="INSERT INTO `clientpackages` ( `clientname` , `package` , `version` , `status` )
		VALUES ('$clientName', '".CHECK_text2db(CHECK_text2db(urldecode($_POST["p$i"])))."', '".CHECK_text2db(urldecode($_POST["v$i"]))."', '".$_POST["s$i"]."')";

		CHECK_FW(CC_packagestatus, $_POST["s$i"]);

		DB_query($sql); //FW ok
	};
};





/**
**name MSR_importLog()
**description reads log data from the post data and store it in the DB
**/
function MSR_importLog()
{
	$clientName = CLIENT_getClientName();
	CHECK_FW(CC_clientname, $clientName);

	$sql="INSERT INTO `clientlogs` ( `client` , `logtime` , `status` ) VALUES ('$clientName', '".time()."', '".CHECK_text2db($_POST['data'],false)."')";

	DB_query($sql); //FW ok
};





/**
**name MSR_logCommand($logFile, $show = true)
**description generates BASH code to send a log file to the server
**parameter logFile: name of the logfile
**parameter show: If set to true, the output is shown directly, if set to false, it is returned.
**/
function MSR_logCommand($logFile, $show = true)
{
	if ($show)
		MSR_genSendCommand($logFile,'log', true);
	else
		return(MSR_genSendCommand($logFile,'log', false));
};





/**
**name MSR_statusFileCommand()
**description generates the commands to send the package infos and package status file
**/
function MSR_statusFileCommand()
{
	$serverIP = getServerIP();
	
	echo('
	if [ ! -f /tmp/HSClient ]
	then
');
		echo("
		mkdir -p /var/cache/m23
	
		export COLUMNS=3000; export LC_ALL=\"C\"; dpkg --list | tr -s [:blank:] | grep -v '^/' | grep -v '^+' | grep -v '^=' | grep -v '^|' | grep -v '^Desired' | awk '{print $1\" \"$2\" \"$3}' > /var/cache/m23/packagestatus
	
		echo \"type=pkg&count=`wc -l /var/cache/m23/packagestatus | sed 's/[  ][   ]*//g' | cut -d'/' -f1``cat /var/cache/m23/packagestatus | awk -v ORS='' '{print \"&s\"NR\"=\"$1\"&p\"NR\"=\"$2\"&v\"NR\"=\"$3}' | sed 's/+/%2B/g'` \" > /tmp/packagestatus.post
		
		".MSR_getm23clientIDCMD('?')."
		
		wget --post-file=/tmp/packagestatus.post https://$serverIP/postMessage.php\$idvar
		");
	
		MSR_genSendCommand('/var/lib/dpkg/status','statusFile');
	echo('
	fi
');
};





/**
**name MSR_importStatusFile()
**description reads status file data from the post data and store it under /m23/var/cache/clients/clientName/packageStatus
**/
function MSR_importStatusFile()
{
	$clientName=CLIENT_getClientName();

	@mkdir('/m23/var/cache/clients',0755);
	@mkdir("/m23/var/cache/clients/$clientName",0755);

	$file = fopen("/m23/var/cache/clients/$clientName/packageStatus",'w');

	if ($file)
		{
			fwrite($file,str_replace('\\\\','\\',str_replace('\"','"',urldecode($_POST['data'])))."\n");
			fclose($file);
		};
};





/**
**name MSR_genSendCommand($fileName, $type, $show = true)
**description sends file to postMessage.php
**parameter fileName: name of the file
**parameter type: type of the message understood by MSR_decodeMessage
**parameter show: If set to true, the output is shown directly, if set to false, it is returned.
**/
function MSR_genSendCommand($fileName, $type, $show = true)
{
	$serverIP=getServerIP();
	
	$out = '

	'.MSR_getm23clientIDCMD('?')."

	cat $fileName | sed \"s/'/%27/g\" | sed 's/+/%2B/g' > /tmp/statusdata.pre

	md5=`md5sum \"$fileName\" | cut -d' ' -f1`
	echo \"type=$type&md5=\$md5&data=`cat /tmp/statusdata.pre | sed 's/%/%25/g' | sed 's/\"/%22/g' | sed 's/\\\\\\\\/%5C/g' | sed 's/&/%26/g'`\" > /tmp/statusdata.post

	wget -T5 -t0 --post-file /tmp/statusdata.post https://$serverIP/postMessage.php\$idvar -O /dev/null

	";
	
	if ($show)
		echo($out);
	else
		return($out);
};





/**
**name MSR_clientChangeCommand($id)
**description sends the ID of a "m23changeClient" job to the server.
**parameter id: the ID of the client job
**/
function MSR_clientChangeCommand($id)
{
	$serverIP=getServerIP();

	echo('

	'.MSR_getm23clientIDCMD('?')."

	wget -T5 -t0 --post-data \"type=clientChange&id=$id\" https://$serverIP/postMessage.php\$idvar -O /dev/null
	");
};





/**
**name MSR_clientChange()
**description executes changes of a "m23changeClient" job on the server.
**/
function MSR_clientChange()
{
	$client=PKG_getClientbyPackageID($_POST['id']);
	CHECK_FW(CC_clientname, $client, CC_id, $_POST['id']);
	$params=explodeAssoc('###',PKG_getPackageParams($_POST['id']));

	$sql='UPDATE `clients` SET ';

	//update all client parameters in the table "clients"
	foreach (explode('#','client#name#ip#netmask#gateway#dns1#dns2#firstpw#rootPassword') as $key)
		if (array_key_exists($key,$params))
		{
			CHECK_FW(constant('CC_'.strtolower($key)),$params[$key]);
			$sql.="`$key` = '".$params[$key]."', ";
		}

	//remove last ","
	$sql[strrpos($sql,',')]=' ';

	$sql.=" WHERE `client` = \"$client\"";

	//check if the client name has changed
	if (array_key_exists('client',$params))
		$client=$params['client'];

	DB_query($sql); //FW ok

	//change client options
	$allOptions = CLIENT_getAllOptions($client);

	foreach (explode('#','packageProxy#packagePort') as $key)
		if (array_key_exists($key,$params))
		{
			CHECK_FW(constant('CC_'.strtolower($key)),$params[$key]);
			$allOptions[$key] = $params[$key];
		}

	CLIENT_setAllOptions($client,$allOptions);
};





/**
**name MSR_partHwDataCommand()
**description generates the commands to send partition and hardware info
**/
function MSR_partHwDataCommand()
{
	$serverIP=getServerIP();

	echo('

	'.MSR_getm23clientIDCMD('?')."

	#lspci searches for pci.ids in /usr/share/misc
	ln -s /usr/share/hwdata /usr/share/misc 2> /dev/null

	m23hwscanner
	
	wget -T5 -t0 --post-file=/tmp/partHwData.post https://$serverIP/postMessage.php\$idvar -O /dev/null
 ");
};





/**
**name MSR_importPartHwData()
**description imports partition and hardware information
**/
function MSR_importPartHwData()
{
//	SERVER_putFileContents('/tmp/out.hwdata', $_POST['data'], 777);

	$data = explodeAssoc('###',urldecode($_POST['data']));
	
// 	print_r2($data);

	$clientName = CLIENT_getClientName();
	CHECK_FW(CC_clientname, $clientName);


	for ($devNr = 0; !empty($data["dev$devNr".'_path']); $devNr++)
	{
		CHECK_FW(CC_partitionpath, $data["dev$devNr".'_path'], CC_partitionsize, $data["dev$devNr".'_size']);
		$out["dev$devNr".'_path'] = $data["dev$devNr".'_path'];
		$out["dev$devNr".'_size'] = $data["dev$devNr".'_size'];

		//calculate the amount of partitions
		for ($partNr = 0; !empty($data["dev$devNr"."part$partNr".'_nr']); $partNr++)
		{
			CHECK_FW(CC_partitionnr, $data["dev$devNr"."part$partNr".'_nr'], CC_partitionstart, $data["dev$devNr"."part$partNr".'_start'], CC_partitionend, $data["dev$devNr"."part$partNr".'_end'], CC_partitiontype, $data["dev$devNr"."part$partNr".'_type']);

			$out["dev$devNr"."part$partNr".'_nr'] = $data["dev$devNr"."part$partNr".'_nr'];

			$out["dev$devNr"."part$partNr".'_start'] = $data["dev$devNr"."part$partNr".'_start'];

			$out["dev$devNr"."part$partNr".'_end'] = $data["dev$devNr"."part$partNr".'_end'];

			$out["dev$devNr"."part$partNr".'_type'] = $data["dev$devNr"."part$partNr".'_type'];

			if ($data["dev$devNr"."part$partNr".'_type'] == 'extended')
				$out["dev$devNr"."part$partNr".'_fs'] = -1;
			else
			{
				CHECK_FW(CC_partitionfs, $data["dev$devNr"."part$partNr".'_fs']);
				$out["dev$devNr"."part$partNr".'_fs'] = $data["dev$devNr"."part$partNr".'_fs'];
			}
		}

		//check if this is a RAID
		if (isset($data["dev$devNr".'_raidDriveAmount']))
		{
			CHECK_FW(CC_partitionamount, $data["dev$devNr".'_raidDriveAmount']);
			$out["dev$devNr".'_raidDriveAmount'] = $data["dev$devNr".'_raidDriveAmount'];

			for ($rDev = 0; !empty($data["dev$devNr"."_raidDrive$rDev"]); $rDev++)
			{
				CHECK_FW(CC_partitionpath, $data["dev$devNr"."_raidDrive$rDev"]);
				$out["dev$devNr"."_raidDrive$rDev"] = $data["dev$devNr"."_raidDrive$rDev"];

				//get the drive/partition to lock
				FDISK_dev2LDevLPart($data,$data["dev$devNr"."_raidDrive$rDev"],$lDev,$lPart);

				//lock drive/partition that is used for RAID
				if ($lPart === false)
					$out["dev$lDev".'_raidLvmLock'] = 1;
				else
					$out["dev$lDev"."part$lPart".'_raidLvmLock'] = 1;
			}
		}

		$out["dev$devNr".'_partamount'] = $partNr;
	}

	//set the amount of drives
	$out['dev_amount'] = $devNr;

	$partitions = implodeAssoc('###',$out);

	$sql="UPDATE clients SET partitions='$partitions', cpu='".CHECK_text2db(trim($data['cpu']))."', netcards='".CHECK_text2db(trim($data['net']))."', graficcard='".CHECK_text2db(trim($data['vga']))."', soundcard='".CHECK_text2db(trim($data['sound']))."', isa='".CHECK_text2db(trim($data['isa']))."', memory='".CHECK_text2db($data['mem'])."', dmi='".CHECK_text2db($data['dmi'])."', MHz='".CHECK_text2db($data['mhz'])."' WHERE client='$clientName'";

	DB_query($sql); //FW ok

	$CFDiskBasicO = new CFDiskBasic($clientName);
	$CFDiskBasicO->setUEFI($data['uefi'] == 1);
	$CFDiskBasicO->resetWantedPartitioning();
	$CFDiskBasicO->findAndSetEFIBootPartDev();
}





/**
**name MSR_getClientSettingsCommand()
**description Generates a script to gather network, release, distribution, login, LDAP, NFS and kernel informations for client import on the client
**/
function MSR_getClientSettingsCommand()
{
	$serverIP=getServerIP();
	$clientParams=CLIENT_getAskingParams();
	$clientId=$clientParams['id'];
	$clientName=CLIENT_getClientName();

	echo("
	if [ ! -f /tmp/HSClient ]
	then
		echo -n \"type=clientSettings&id=$clientId&clientname=$clientName\" > /tmp/clientSettings.post
	
		#get DNS servers
		awk -v DNR=1 -v ORS=\"\" '/^nameserver/ {print \"&dns\"DNR\"=\"\$2; DNR++; if (DNR ==2) exit;}' /etc/resolv.conf >> /tmp/clientSettings.post
	
		#get ip, netmask, network and gateway
		if [ `grep -c netmask /etc/network/interfaces` -gt 0 ]
		then
			awk -v ORS=\"\" '/address/ {print(\"&ip=\"$2)}
			/netmask/ {print(\"&netmask=\"$2)}
			/gateway/ {print(\"&gateway=\"$2)}
			' /etc/network/interfaces >> /tmp/clientSettings.post
		else
			#Check if the connections are manages by Network Manager
			if [ -d /etc/NetworkManager/system-connections ]
			then
				cat /etc/NetworkManager/system-connections/* | grep addresses | cut -d'=' -f2 | head -1 | awk -vFS=';' -vORS='' '{print(\"&ip=\"\$1\"&netmask=\"\$2\"&gateway=\"\$3)}' >> /tmp/clientSettings.post
			fi
		fi

		#get the MAC address
		LANG=C; ifconfig eth0 | tr -s \"\\t \" | awk -v ORS=\"\" '/HWaddr/ {
		for (i=1; i < NF; i++)
		if (\$i == \"/HWaddr/\")
			break;
	
		gsub(/:/,\"\",\$i);
		\$i=tolower(\$i);
		print (\"&mac=\"\$i);
		}' >> /tmp/clientSettings.post
	
		#get the sources.list
		echo -n \"&sourceslist=\" >> /tmp/clientSettings.post
		cat /etc/apt/sources.list /etc/apt/sources.list.d/*.list | sed 's/%/%25/g' | sed 's/\"/%22/g' | sed 's/\\\\\\\\/%5C/g' | sed 's/&/%26/g' >> /tmp/clientSettings.post
	
		#get the timeZone
		awk -v ORS=\"\" '{print(\"&timeZone=\"$1)}' /etc/timezone >> /tmp/clientSettings.post
	
		#check if it's Debian
		if [ `ls /etc/debian_version | wc -l` -gt 0 ]
		then
			if [ -f /etc/lsb-release ]
			then
				awk -v ORS='' '/DISTRIB_ID=Ubuntu/ {print(\"&distr=ubuntu\")}
				/DISTRIB_ID=LinuxMint/ {print(\"&distr=ubuntu\")}
				' /etc/lsb-release >> /tmp/clientSettings.post

				# Get the release from the sources list
				release=$(grep ubuntu.com -r /etc/apt/sources.list* | grep main | sed -e 's°.*ubuntu\.com[^ ]*°°' -e 's°^ °°' -e 's° .*°°' | sort | head -1)
				echo -n \"&release=\$release\" >> /tmp/clientSettings.post
			else
				echo -n \"&distr=debian\" >> /tmp/clientSettings.post
				echo -n \"&release=$(lsb_release -c -s)\" >> /tmp/clientSettings.post
			fi
		fi

		#get APT proxy settings
		awk -v FS='\"' -v ORS=\"\" '/Acquire::(http|ftp)::Proxy/ {
		gsub(\"http://\",\"\");
		gsub(\"HTTP://\",\"\");
		gsub(\"ftp://\",\"\");
		gsub(\"FTP://\",\"\");
		print(\"&aptproxy=\"$2); exit;
		}' /etc/apt/apt.conf.d/70debconf >> /tmp/clientSettings.post
	
		#get login
		gawk -v FS=\":\" '(match($0,\"/bin/sh\") || match($0,\"/bin/bash\") || match($0,\"/bin/dash\")) && $3 > 100 {print $1\"_\"$3\"_\"$4}' /etc/passwd > /tmp/users
	
		rm /tmp/userAmount 2> /dev/null
	
		for user in `cat /tmp/users`
		do
			uname=`echo \$user | cut -d'_' -f1`
			am=`grep \$uname /etc/group | wc -l`
			echo \"\$am?\$user\" >> /tmp/userAmount
		done
	
		#The login name of the main user is the username with the most group entries
		echo -n \"&login=\" >> /tmp/clientSettings.post
		mainUser=`sort -n -r /tmp/userAmount | head -1 | cut -d'?' -f2 | cut -d'_' -f1`
		echo -n \$mainUser >> /tmp/clientSettings.post
	
		#Get the fore and family name
		echo -n \"&forefamilyname=\" >> /tmp/clientSettings.post
		finger -lp \$mainUser | sed 's/[\\t]/\\n/g' | grep \"^Name:\" | sed 's/Name: //' >> /tmp/clientSettings.post
	
		#Get the user ID and group ID of the main user
		echo -n \"&userID=\" >> /tmp/clientSettings.post
		grep \"^\$mainUser:\" /etc/passwd | cut -d':' -f3 >> /tmp/clientSettings.post
		echo -n \"&groupID=\" >> /tmp/clientSettings.post
		grep \"^\$mainUser:\" /etc/passwd | cut -d':' -f4 >> /tmp/clientSettings.post
	
		rm /tmp/userAmount /tmp/users 2> /dev/null
	
		#Get the language
		echo -n \"&language=\" >> /tmp/clientSettings.post
		#load locale, if present
		[ -f /etc/default/locale ] && . /etc/default/locale
		echo \"\$LANG
\$LC_ALL\" | cut -d'_' -f1 | sort -u | tail -1 >> /tmp/clientSettings.post
		
		#kernel
		kernelPkg=$(dpkg --get-selections | grep -v deinstall | grep $(uname -r) | grep image | tr -d '[:blank:]' | sed 's/install$//')
		echo -n \"&kernel=\$kernelPkg\" >> /tmp/clientSettings.post
	
		#LDAP
		debconf-get-selections | awk -v ORS=\"\" -v FS=\" \" -v NOBASEDN=1 -v NOLDAPSERVER=1 '
		(match($0,\"base-dn\") && (match($0,\"libnss-ldap\") || match($0,\"libpam-ldap\")) && NOBASEDN) {NOBASEDN=0; gsub(\"=\",\"%3D\"); print(\"&basedn=\"$4)}
		(match($0,\"ldap-server\") && (match($0,\"libnss-ldap\") || match($0,\"libpam-ldap\")) && NOLDAPSERVER) {NOLDAPSERVER=0; gsub(\"=\",\"%3D\"); print(\"&ldapserver=\"$4)}' >> /tmp/clientSettings.post
	
		#Desktop
		dpkg --get-selections | awk  -v ORS=\"\" '
		/^kdelibs-data/ {print(\"&desktop=kde\"); DFOUND=1; exit}
		/^gnome-desktop-data/ {print(\"&desktop=gnome2\"); DFOUND=1; exit}
		/xfce/ {print(\"&desktop=XFce\"); DFOUND=1; exit}
		/libx11/ {XFOUND=1}
		END {
			if (XFOUND && !DFOUND)
				print(\"&desktop=X\");
			if (!XFOUND && !DFOUND)
				print(\"&desktop=Textmode\")}' >> /tmp/clientSettings.post
	
		#install & swap partition
		grep -v '#' /etc/fstab | awk -v ORS=\"\" '
		{gsub(\"=\",\"%3D\",$1)}
		$2==\"/\" {print(\"&instPart=\"$1)}
		$3==\"swap\" {print(\"&swapPart=\"$1)}
		$2==\"/home\" {print(\"&homePart=\"$1)}
		' >> /tmp/clientSettings.post
		
		ls -l /home | tr -s \" \" | awk -v ORS=\"\" '/\\/net\\// {gsub(\"/net/\",\"\"); print \"&homePart2=\"$11}' >> /tmp/clientSettings.post
	
		echo -n \"&arch=\" >> /tmp/clientSettings.post
		uname -m | awk '
			/i[3-9]86/ {print(\"i386\")}
			/x86_64/ {print(\"amd64\")}
		' >> /tmp/clientSettings.post
	
		wget -T5 -t0 --post-file /tmp/clientSettings.post https://$serverIP/postMessage.php?m23clientID=$clientId -O /dev/null
	fi
	");
};





/**
**name MSR_clientSettings()
**description Imports the clients settings
**/
function MSR_clientSettings()
{
	$client=$_POST['clientname'];
	$data=CLIENT_getAskingParams();
	$clientOptions = CLIENT_getAllAskingOptions();

	//sources.list
	$sourcesListName = SRCLST_matchList($_POST['distr'],$_POST['sourceslist']);
	
// 	print("$sourcesListName\n".$_POST['sourceslist']);

	if ($sourcesListName === false)
	{
		$sourcesListName="From_$client";
// 		print("muhu");
		SRCLST_saveList($sourcesListName,$_POST['sourceslist'],"Imported from $client",$_POST['distr']);
		$archs = array(trim($_POST['arch']));
		SRCLST_saveArchitectures($sourcesListName, $archs);
	}

	// Set only the sources list, if it's imaging
	if (stripos($clientOptions['distr'], 'imaging') !== false)
	{
		$options = $clientOptions;
		$options['packagesource']		= trim($sourcesListName);
		CLIENT_setAllOptions($client,$options);
		return(true);
	}
	
	
	//store values
	$data['dns1']					= trim($_POST['dns1']);
	$data['dns2']					= trim($_POST['dns2']);
	$data['language']				= trim($_POST['language']);
// 	$data['ip']					= $_POST['ip'];
	$data['netmask']				= HELPER_netmaskCalculator($_POST['netmask']);
	$data['gateway']				= trim($_POST['gateway']);
	$data['mac']					= trim($_POST['mac']);
	$data['firstpw']				= '';

	$loginUidGid=explode('_',$_POST['login']);
	$options['login']				= $loginUidGid[0];
	$options['userID']				= (isset($_POST['userID']{1}) ? trim($_POST['userID']) : $loginUidGid[1]);
	$options['groupID']				= (isset($_POST['groupID']{1}) ? trim($_POST['groupID']) : rtrim($loginUidGid[2]));
	$proxyPort=explode(':',$_POST['aptproxy']);
	$options['packageProxy']		= $proxyPort[0];
	$options['packagePort']			= $proxyPort[1];
	$options['kernel']				= trim($_POST['kernel']);
	$options['distr']				= trim($_POST['distr']);
	$options['addNewLocalLogin']	= 'yes';
	$options['release']				= trim($_POST['release']);
	$options['packagesource']		= trim($sourcesListName);
	$options['instPart']			= trim($_POST['instPart']);
	$options['swapPart']			= trim($_POST['swapPart']);
	$options['arch']				= trim($_POST['arch']);
	$options['timeZone']			= trim($_POST['timeZone']);

	//Check if fore and family name could be found
	if (isset($_POST['forefamilyname']{2}))
	{
		//The last occurrence of ' ' ,is assumed as seperator of forename and family name
		$familyNamePos = strrpos($_POST['forefamilyname'], ' ');

		if ($familyNamePos === false)
			$familyNamePos = 1;

		$data['name'] = substr ($_POST['forefamilyname'], 0, $familyNamePos);
		$data['familyname'] = substr ($_POST['forefamilyname'], $familyNamePos);
	}

	$options['netRootPwd']		= '';

	//set LDAP
	if (!empty($_POST['basedn']) && !empty($_POST['ldapserver']))
		{
			$ldapserver=LDAP_matchLDAPserver($_POST['ldapserver'],$_POST['basedn']);
			
			if (!$ldapserver)
			{
				$ldapserver="From_$client";
				LDAP_addServerTophpLdapAdmin($ldapserver,$_POST['ldapserver'],$_POST['basedn'],'');
			}

			$options['ldaptype']	= 'read';
			$options['ldapserver']= $ldapserver;
		}
	else
			$options['ldaptype']	= 'none';

	//set desktop
	if ($_POST['desktop'] == 'kde')
		{
			if (!(strpos($options['release'],'3.0')===false) ||
				!(strpos($options['release'],'woody')===false))
				$options['desktop'] = 'KDEwoody';
			else
				$options['desktop'] = 'KDE3';
		}
	else
		$options['desktop'] = $_POST['desktop'];
		
	
	if (!empty($_POST['homePart']))
		$options['nfshomeserver']=str_replace(':','',$_POST['homePart']);
	elseif (!empty($_POST['homePart2']))
		$options['nfshomeserver']=$_POST['homePart2'];

// 	print_r($data);
	
// 	print_r($options);

	CLIENT_setAllParams($client,$data);
	CLIENT_setAllOptions($client,$options);
};





/**
**name MSR_setOnline($online)
**description Sets the online-state of a client.
**parameter online: The new online-state.
**/
function MSR_setOnline($online)
{
	CHECK_FW(CC_status, $online);
	DB_query("UPDATE `clients` SET `online` = \"$online\" WHERE `client` = \"".CLIENT_getClientName()."\"");
}





//m23customPatchBegin type=change id=AdditionalCaseMethods
//m23customPatchEnd id=AdditionalCaseMethods





/**
**name MSR_sshHttpsStatus()
**description Sets the ping and advanced SSH/HTTPs available status.
**/
function MSR_sshHttpsStatus()
{
	$clientName = CLIENT_getClientName();
	
	$sql = "UPDATE `clients` SET `online` = ".(ONLINE_STATUS_sshHttps | ONLINE_STATUS_ping)." WHERE `client` = \"".CLIENT_getClientName()."\"";
// 	print($sql);
	
	DB_query($sql);
}





/**
**name MSR_setTimeStampForRebootClientAfterJobsIsNecessaryCMD()
**description Generates the commands to inform the m23 server that a reboot of the client is necessary because Debian packages, that were installed, required it.
**returns BASH commands.
**/
function MSR_setTimeStampForRebootClientAfterJobsIsNecessaryCMD()
{
	return(MSR_genericSendCommand('MSR_setTimeStampForRebootClientAfterJobsIsNecessary', "ok=ok", '', true));
}





/**
**name MSR_setTimeStampForRebootClientAfterJobsIsNecessary()
**description Updates the timestamp of the reboot request of the client, that became necessary because of newly installed Debian packages.
**/
function MSR_setTimeStampForRebootClientAfterJobsIsNecessary()
{
	$clientName = CLIENT_getClientName();
	DB_query("UPDATE `clients` SET `rebootAfterJobsStarted` = ".time()." WHERE `client` = \"".CLIENT_getClientName()."\"");
}





/**
**name MSR_unsetTimeStampForRebootingClientIfNOTNecessaryCMD
**description Generates the commands to inform the m23 server that a reboot of the client has been done, after Debian packages required it.
**returns BASH commands.
**/
function MSR_unsetTimeStampForRebootingClientIfNOTNecessaryCMD()
{
	return(MSR_genericSendCommand('MSR_unsetTimeStampForRebootingClientIfNOTNecessary', "ok=ok", '', true));
}





/**
**name MSR_unsetTimeStampForRebootingClientIfNOTNecessary()
**description Removes the timestamp of the reboot request of the client, that became necessary because of newly installed Debian packages.
**/
function MSR_unsetTimeStampForRebootingClientIfNOTNecessary()
{
	$clientName = CLIENT_getClientName();
	DB_query("UPDATE `clients` SET `rebootAfterJobsStarted` = \"0\" WHERE `client` = \"".CLIENT_getClientName()."\"");
}
?>
