<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Functions for test automation.
$*/


/*
!!!!Next version!!!!

* Shutdown VM after last test
* new: good/warn/bad type: ping
* 

Wann VM löschen? Wann VM wieder aus m23 lsöchen? Wann Benutzer aus LDAP löschen?

Trigger/good/bad für VM-Status (poweroff, running)


<trigger type="SSHup"></trigger>
<good type="ssh_packagesInstalled">mc°grep</good>

<trigger type="SSHup"></trigger>
<good type="ssh_outputContains">ls -l /mnt/data°lost+found</good>
*/





/**
**name AUTOTEST_createLDAPUserAndGroup()
**description Creates an LDAP user and group on the local LDAD server and shows an info message, if creation was sucessfully or a warning with the direct message from the LDAP server.
**/
function AUTOTEST_createLDAPUserAndGroup()
{
	// Demo credentials
	$login = 'atldapuser';
	$forename = 'Auto';
	$familyname = 'von und zu Test';
	$pwd = 'testtest';
	$uid = $gid = 1234;

	if (HELPER_isExecutedOnUCS())
		$ret = UCS_addLDAPUser($login, $forename, $familyname, $pwd, $uid);
	else
		$ret = LDAP_addPosix('m23-LDAP', $login, $forename, $familyname, $pwd, $uid, $gid);
	
	if ($ret === true)
		MSG_showInfo('LDAP account created');
	else
		MSG_showWarning($ret);
}





/**
**name AUTOTEST_isDebug()
**description Checks, if autoTest is in debug mode (constant AT_debug is set).
**returns true, if autoTest is in debug mode, otherwise false.
**/
function AUTOTEST_isDebug()
{
	return(defined('AT_debug'));
}





/**
**name AUTOTEST_sshVMServer($cmds)
**description Executes commands on virtualisation server.
**parameter cmds: The commands to execute on the virtualisation server.
**returns The output of the commands.
**/
function AUTOTEST_sshVMServer($cmds)
{
	$cmds = AUTOTEST_getSeleniumUnsafeString($cmds);

	$result = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "AUTOTEST_sshVMServer".uniqid(), $cmds, TEST_VBOX_USER, false);

	return($result);
}





/**
**name AUTOTEST_sshTunnelOverServer($serverNameOrIP, $clientNameOrIP, $cmds, $password = NULL)
**description Executes commands on a client indirectly, that is reachable over an m23 server only. SSH connections require root user on the m23 server and the client.
**parameter serverNameOrIP: The name of the m23 server or its IP.
**parameter clientNameOrIP: The name of the client or its IP.
**parameter cmds: The commands to execute on the client 
**parameter password: Parameter to set the SSH password or NULL to use SSH keys only.
**returns The output of the client's screen.
**/
function AUTOTEST_sshTunnelOverServer($serverNameOrIP, $clientNameOrIP, $cmds, $password = NULL)
{
	if (! is_null($password) )
		$sshPass = "sshpass -p '$password' ";
	else
		$sshPass = '';
	
	CLIENT_getSSHKeyorPasswordOptions($password, $sshPass, $sshPubkeyOnlyOptions);

	$cmds = AUTOTEST_getSeleniumUnsafeString($cmds);

	// Generate the command that connects from the server to the client and executes commands on the client
// 	$onServerCmds = "${sshPass}ssh -o ConnectTimeout=5 -o LogLevel=FATAL -o VerifyHostKeyDNS=no -o PreferredAuthentications=publickey $noPassword -o CheckHostIP=no -o BatchMode=yes -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null root@$clientNameOrIP '$cmds'";

	$onServerCmds = "LC_ALL=C ${sshPass} ssh -o ServerAliveInterval=60 -o ServerAliveCountMax=1 -o ConnectTimeout=15 -o ConnectionAttempts=1 -o UserKnownHostsFile=/dev/null -o VerifyHostKeyDNS=no $sshPubkeyOnlyOptions -o CheckHostIP=no -o StrictHostKeyChecking=no root@$clientNameOrIP '$cmds' 2>&1";
	
// 	print("AUTOTEST_sshTunnelOverServer:\n$onServerCmds\n");
// 	print("cmds: $cmds\n");
// 	print("\nserverNameOrIP: $serverNameOrIP\nclientNameOrIP: $clientNameOrIP\nserverIP: ".getServerIP()."\n");

	if (getServerIP() == $serverNameOrIP)
	{
		$ret = SERVER_runInBackground(uniqid('AUTOTEST_sshTunnelOverServer'), $onServerCmds, HELPER_getApacheUser(), false, true);
		
//		$ret = CLIENT_executeOnClientOrIP($clientNameOrIP, uniqid('AUTOTEST_sshTunnelOverServer'), $cmds, 'root', false);
		
		if (AUTOTEST_isDebug())
			print("DIREKT cmds: $onServerCmds\n");
	}
	else
	{
		$ret = CLIENT_executeOnClientOrIP($serverNameOrIP, uniqid('AUTOTEST_sshTunnelOverServer'), $onServerCmds, 'root', false, defined('AT_M23_SSH_PASSWORD') ? AT_M23_SSH_PASSWORD : NULL);
		if (AUTOTEST_isDebug())
			print("INDIREKT cmds: $onServerCmds\n");
	}

	return(HELPER_filterOutUnwantedSSHErrors($ret));
}





/**
**name AUTOTEST_getSeleniumSafeString($in)
**description Replaces characters in a string to make it safe for usage in Selenium and SimpleXMLElement.
**parameter in: Input string. eg. "&page=fdisk" becomes "%26page=fdisk"
**returns Safe made string.
**/
function AUTOTEST_getSeleniumSafeString($in)
{
	// Values are beeing URL decoded by HTTP2SeleniumBridge, but only "&" needs to be encoded here and SimpleXMLElement couldn't parse some characters (eg. &)
	$in = str_replace ('&', '%26', $in);
	
	return($in);
}





/**
**name AUTOTEST_getSeleniumSafeString($in)
**description Urldecodes characters that were made it safe for usage in Selenium and SimpleXMLElement.
**parameter in: Input string. eg. "%26page=fdisk" becomes "&page=fdisk"
**returns Unsafe made string.
**/
function AUTOTEST_getSeleniumUnsafeString($in)
{
	// Values are beeing URL decoded by HTTP2SeleniumBridge, but only "&" needs to be encoded here and SimpleXMLElement couldn't parse some characters (eg. &)
	$in = str_replace ('%26', '&', $in);
	
	return($in);
}





/**
**name AUTOTEST_VM_hostSanityCheck()
**description Checks the existence of tools on the VM host.
**returns true or dies with an error message.
**/
function AUTOTEST_VM_hostSanityCheck()
{
	$cmd = '
	err=0
	for cmd in grep screen VBoxManage x2golistdesktops gocr convert tesseract
	do
		type $cmd &> /dev/null
		if [ $? -ne 0 ]
		then
			echo "ERROR: $cmd is missing!"
			err=$[ $err + 1 ]
		fi
	done

	echo -n $err';

	$result = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_sanityCheck", $cmd, TEST_VBOX_USER, false);
	
	// If all tools were found 0 is returned
	if ("0" == trim($result)) // Must be checked as string
		return(true);
	else
	// Exit the script with the generated error message
		die($result);
}





/**
**name AUTOTEST_replaceConstantsInString($in)
**description Searches for variable declarations in a string and replaces them with the values of according constants.
**parameter in: Input string. eg. "name=${VM_NAME}" may become "name=debianVM"
**returns The input string with replaced variable declarations.
**/
function AUTOTEST_replaceConstantsInString($in)
{
	// Extract variable declarations and according constant names from the input string
	preg_match_all('/\${([^}]*)}/i', $in, $variablesA);
	/*
	Variables from an input string
	
		$in = 'blah${TEST_M23_BASE_URL}/index.php?page=clientsoverview%26action=${setup}';
	
	are extracted into an array
	
		$variablesA = Array
		(
			[0] => Array (variable declaration)
				(
					[0] => ${TEST_M23_BASE_URL}
					[1] => ${setup}
				)
		
			[1] => Array (constant name)
				(
					[0] => TEST_M23_BASE_URL
					[1] => setup
				)
		)
	*/

	$i = 0;

	// Run thru the found variable declarations and according constant names
	while (isset($variablesA[0][$i]) && isset($variablesA[1][$i]))
	{
		$searchTerm = $variablesA[0][$i]; // eg. ${TEST_M23_BASE_URL}
		$constantName = $variablesA[1][$i]; // eg. TEST_M23_BASE_URL

		// If a matching constant is found, the variable declaration will be replaced with the constant's value
		if (defined($constantName))
			$in = str_replace($searchTerm, constant($constantName), $in);

		$i++;
	}
	
	return($in);
}





/**
**name AUTOTEST_SEL_getURLByMatch($htmlsource, $searchA)
**description Searches for one URL in the given HTML code that must contain all search terms.
**parameter htmlsource: The HTML code.
**parameter searchA: Array with the search terms.
**returns The one matching URL or NULL if there is none matching.
**/
function AUTOTEST_SEL_getURLByMatch($htmlsource, $searchA)
{
	// Convert the damaged source (& gets converted to &amp; by the browser) back
	$htmlsource = html_entity_decode(utf8_decode($htmlsource));

	// Find all URLS
	preg_match_all('/<a[^>]+href=([\'"])(?<href>.+?)\1[^>]*>/i', $htmlsource, $urls);

	// Run thru the hrefs
	foreach ($urls['href'] as $url)
	{
		
		$found = true;
		foreach ($searchA as $search)
		{
			if (AUTOTEST_isDebug())
				print("HELPER_str_equal_UTF8ISO($url, $search)\n");
		
			// Skip the URL if the string was not found in it
			if (!HELPER_str_equal_UTF8ISO($url, $search))
			{
				// If this part could not be found in this URL: no further search for the other parts
				$found = false;
				break;
			}
		}

		// All parts have been found?
		if ($found)
		{
			// Check, if the URL is a full URL or if the m23 webinterface base URL has to be added
			if (stripos($url, 'http://') === 0)
				return($url);
			else
				return(TEST_M23_BASE_URL.'/'.$url);
		}
	}

	return(NULL);
}





/**
**name AUTOTEST_getKey($charIn)
**description Generates the needed scan codes to produce a given character.
**parameter charIn: Input character.
**returns Needed scan codes to produce a given character.
**/
function AUTOTEST_getKey($charIn)
{
	$pressShift = HELPER_isUpper($charIn);
	$charIn = strtolower($charIn);

	// Table with characters that need Shift to be pressed
	$withShift['!'] = '02'; $withShift['@'] = '03'; $withShift['#'] = '04'; $withShift['$'] = '05'; $withShift['%'] = '06'; $withShift['^'] = '07'; $withShift['&'] = '08'; $withShift['*'] = '09'; $withShift['['] = '0a'; $withShift['('] = '0a'; $withShift[')'] = '0b'; $withShift['-'] = '0c'; $withShift['+'] = '0d'; $withShift['{'] = '1a'; $withShift['}'] = '1b'; $withShift[':'] = '27'; $withShift['"'] = '28'; $withShift['~'] = '29'; $withShift['|'] = '2b'; $withShift['<'] = '33'; $withShift['>'] = '34'; $withShift['?'] = '35';

	// Normal keys
	$keyCode['1'] = '02'; $keyCode['2'] = '03'; $keyCode['3'] = '04'; $keyCode['4'] = '05'; $keyCode['5'] = '06'; $keyCode['6'] = '07'; $keyCode['7'] = '08'; $keyCode['8'] = '09'; $keyCode['9'] = '0a'; $keyCode['0'] = '0b'; $keyCode['-'] = '0c'; $keyCode['='] = '0d'; $keyCode['q'] = '10'; $keyCode['w'] = '11'; $keyCode['e'] = '12'; $keyCode['r'] = '13'; $keyCode['t'] = '14'; $keyCode['y'] = '15'; $keyCode['u'] = '16'; $keyCode['i'] = '17'; $keyCode['o'] = '18'; $keyCode['p'] = '19'; $keyCode['{'] = '1a'; $keyCode['}'] = '1b'; $keyCode['a'] = '1e'; $keyCode['s'] = '1f'; $keyCode['d'] = '20'; $keyCode['f'] = '21'; $keyCode['g'] = '22'; $keyCode['h'] = '23'; $keyCode['j'] = '24'; $keyCode['k'] = '25'; $keyCode['l'] = '26'; $keyCode[':'] = '27'; $keyCode['"'] = '28'; $keyCode['~'] = '29'; $keyCode['|'] = '2b'; $keyCode['z'] = '2c'; $keyCode['x'] = '2d'; $keyCode['c'] = '2e'; $keyCode['v'] = '2f'; $keyCode['b'] = '30'; $keyCode['n'] = '31'; $keyCode['m'] = '32'; $keyCode['<'] = '33'; $keyCode['.'] = '34'; $keyCode['?'] = '35'; $keyCode[' '] = '39';
	
	// Special keys
	$keyCode['esc'] = '01'; $keyCode['backspace'] = '0e'; $keyCode['tab'] = '0f'; $keyCode['enter'] = '1c'; $keyCode['lctrl'] = '1d'; $keyCode['lshift'] = '2a'; $keyCode['rshift'] = '36'; $keyCode['keypad-*'] = '27'; $keyCode['lalt'] = '38'; $keyCode['capslock'] = '3a'; $keyCode['f1'] = '3b'; $keyCode['f2'] = '3c'; $keyCode['f3'] = '3d'; $keyCode['f4'] = '3e'; $keyCode['f5'] = '3f'; $keyCode['f6'] = '40'; $keyCode['f7'] = '41'; $keyCode['f8'] = '42'; $keyCode['f9'] = '43'; $keyCode['f10'] = '44'; $keyCode['numlock'] = '45'; $keyCode['scrolllock'] = '46'; $keyCode['keypad-7/home'] = '47'; $keyCode['keypad-8/up'] = '48'; $keyCode['keypad-9/pgup'] = '49'; $keyCode['keypad--'] = '4a'; $keyCode['keypad-4/left'] = '4b'; $keyCode['keypad-5'] = '4c'; $keyCode['keypad-6/right'] = '4d'; $keyCode['keypad-+'] = '4e'; $keyCode['keypad-1/end'] = '4f'; $keyCode['keypad-2/down'] = '50'; $keyCode['keypad-3/pgdn'] = '51'; $keyCode['keypad-0/ins'] = '52'; $keyCode['keypad-./del'] = '53'; $keyCode['alt-sysrq'] = '54';

	// Check, if the character is reachable without Shift
	$key = @$keyCode[$charIn];

	if ($key !== NULL)
		return(AUTOTEST_keyAndRelease($key, $pressShift));
	else
	{
		// Search in the array with Shift presses
		$key = @$withShift[$charIn];
		if ($key !== NULL)
			return(AUTOTEST_keyAndRelease($key, true));
		else
			die("AUTOTEST_getKey: Kein Scancode für \"$charIn\" gefunden.");
	}
}





/**
**name AUTOTEST_calcScancodes($in)
**description Converts an input string that may contain special keys into scancodes (e.g. for usage with VirtualBox)
**parameter in: Input string with normal and special keys.
**returns Scancodes that represent the input string.
**/
function AUTOTEST_calcScancodes($in)
{
	$scanCodeSequence = '';

	// Run thru the characters if the input string
	for ($i = 0; $i < strlen($in); $i++)
	{
		$char = $in[$i];

		// ° marks begin and end of a special key (e.g. °tab° for pressing an releasing the tabulator key)
		if ('°' == $char)
		{
			// Variable for the complete special key
			$special = '';
			$char = $in[++$i];
			while ($i < strlen($in) && '°' != $char)
			{
				$special .= $char;
				$char = $in[++$i];
			}
	
			$scanCodeSequence .= AUTOTEST_getKey($special).' ';
		}
		else
			$scanCodeSequence .= AUTOTEST_getKey($char).' ';
	}

	return($scanCodeSequence);
}





/**
**name AUTOTEST_keyAndRelease($keyCode, $pressShift)
**description Generates (Shift press,) key, key release (and Shift release) codes.
**parameter keyCode: Key (scan) code.
**parameter pressShift: true, when Shift should be pressed.
**returns (Shift press,) key, key release (and Shift release)
**/
function AUTOTEST_keyAndRelease($keyCode, $pressShift)
{
	// Add Shift press and release codes?
	if ($pressShift)
	{
		$shiftBegin = '2a ';
		$shiftEnd = ' aa';
	}
	else
		$shiftEnd = $shiftBegin = '';


	// Calculate the release code
	$rel = dechex(hexdec($keyCode) + 128);

	// Return (Shift press,) key, key release (and Shift release)
	return("$shiftBegin$keyCode $rel$shiftEnd");
}





/**
**name AUTOTEST_VM_create($vmName, $diskSize, $ramSize, &$VMCreationMessage)
**description Creates a new VM with virtual hard drive in VirtualBox.
**parameter vmName: Name of the VM.
**parameter diskSize: Size of the virtual HD in MB.
**parameter ramSize: Size of RAM in MB.
**parameter VMCreationMessage: Variable where the VirtualBox (error) messages will be written to.
**returns true, when the creation was successfully, otherwise false.
**/
function AUTOTEST_VM_create($vmName, $diskSize, $ramSize, &$VMCreationMessage)
{
	$diskName = $vmName."hda";
	$cmd = VM_createDiskImage(VM_SW_VBOX, $vmName, $diskName, $diskSize, TEST_VBOX_IMAGE_DIR);
	$cmd .= VM_createVM(VM_SW_VBOX, $vmName, $ramSize, $diskName, TEST_VBOX_MAC, TEST_VBOX_NETDEV, TEST_VBOX_IMAGE_DIR);
	$cmd .= VM_activateNetbootCMD(VM_SW_VBOX, $vmName, true);

	//Execute and get the output or false if there was an error code returned
	$VMCreationMessage = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_create", $cmd, TEST_VBOX_USER, false);

	//Check if the creation message contains FAILED. If not the creation should have been sucessfully
	//Count the occurrence of FAILED and VERR_ALREADY_EXISTS (this is prompted if an existing harddisk image is re-used)
	$failedCount = substr_count($VMCreationMessage,"FAILED");
	$VERR_ALREADY_EXISTSCount = substr_count($VMCreationMessage,"VERR_ALREADY_EXISTS");

	//If there are NOT more VERR_ALREADY_EXISTS errors than FAILED errors VBox only complains about creating an existing virtual harddisk, that can be re-used in the same VM
	$VMCreationOK = ($failedCount <= $VERR_ALREADY_EXISTSCount);

	return($VMCreationOK);
}





/**
**name AUTOTEST_VM_enableCapture($vmName, $movieFile, &$VMenableCapture)
**description Enables capturing the screen of a VM to a movie file.
**parameter vmName: Name of the VM.
**parameter movieFile: File to store the capturing in.
**parameter VMenableCaptureMessage: Variable where the VirtualBox (error) messages will be written to.
**/
function AUTOTEST_VM_enableCapture($vmName, $movieFile, &$VMenableCaptureMessage)
{
	// touche the the movie file, so VirtualBox will automatically create capture files with changing names for each start of the VM
	$cmd = "touch \"$movieFile\"\n".VM_captureVMWindowAsMovie(VM_SW_VBOX, $vmName, true, $movieFile, 1024, 768, 1000, 15);
	$VMenableCaptureMessage = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_enableCapture", $cmd, TEST_VBOX_USER, false);
}





/**
**name AUTOTEST_VM_delete($vmName, &$VMDeletionMessage)
**description Deletes a VM and its virtual hard drive from VirtualBox.
**parameter vmName: Name of the VM.
**parameter VMDeletionMessage: Variable where the VirtualBox (error) messages will be written to.
**/
function AUTOTEST_VM_delete($vmName, &$VMDeletionMessage)
{
	$cmd = VM_stopVM(VM_SW_VBOX, $vmName)."\n".VM_delVMCMD(VM_SW_VBOX, $vmName);
	
// 	file_put_contents('/tmp/AUTOTEST_VM_delete.sh', $cmd);
	
	$VMDeletionMessage = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_deleteVM", $cmd, TEST_VBOX_USER, false);
	
// 	file_put_contents('/tmp/AUTOTEST_VM_delete.msg', $VMDeletionMessage);
}





/**
**name AUTOTEST_VM_export_m23ServerISO_as_OVA($vmName, &$VMExportMessage)
**description Exports a VM, that was installed via the m23 server installation ISO, to OVA file.
**parameter vmName: Name of the VM.
**parameter $VMExportMessage: Variable where the VirtualBox (error) messages will be written to.
**/
function AUTOTEST_VM_export_m23ServerISO_as_OVA($vmName, &$VMExportMessage)
{
	include('/m23/inc/version.php');
	$product = "m23 ${m23_codename} ${m23_version}";
	
	if (defined('AT_OVA_EXPORT_DIR'))
	{
		$ovaFile = AT_OVA_EXPORT_DIR."/m23server_${m23_version}_${m23_codename}.ova";
		$zipFile = AT_OVA_EXPORT_DIR."/m23server_${m23_version}_${m23_codename}.7z";
	}
	else
		die('ERROR: AT_OVA_EXPORT_DIR is not defined!');

	$cmd = VM_stopVM(VM_SW_VBOX, $vmName)."\n"."
	sleep 30
	
	# Needed, because VBoxManage will quit with \"fatal error: RTR3Init: VERR_NO_TRANSLATION\" if LC_ALL=C
	export LC_ALL=de_DE
	rm '$ovaFile'
	
	VBoxManage export '$vmName' --output '$ovaFile' --vsys 0 --product '$product' --producturl 'https://m23.sourceforge.io' --vendor 'goos-habermann.de' --vendorurl 'https://m23.goos-habermann.de' --version '${m23_version}' --eula 'GPLv3 and other free licenses' --description 'm23 ist eine freie Softwareverteilung unter der GPL, die Clients mit Debian, Ubuntu, Kubuntu, Xubuntu und Linux Mint installieren und administrieren kann. Gesteuert wird m23 mit einem Browser. Die Installation eines neuen Clients geschieht in nur drei Schritten, die Integration von bestehenden Clients ist zudem möglich. Gruppenverwaltung und Masseninstallation vereinfachen die Administration von vielen Rechnern. Das integrierte Client- & Serverbackup schützt vor Datenverlusten. Mittels Virtualisierung können auf m23-Client und m23-Server weitere virtuelle m23-Clients angelegt und über m23 verwaltet werden. Skripte und Softwarepakete zur Installation auf den Clients können direkt aus der Oberfläche erstellt werden. 
	
m23 is a system deployment tool for Linux. It does hardware detection, partitioning and formatting via network, then installs a Linux operating system on the client. The currently supported OSs are in different flavours: Debian, (X/K)Ubuntu and LinuxMint. The installed client can then be updated, recovered, software can be installed and uninstalled. Many clients can be installed at once (mass installation), clients can be grouped to perform certain tasks on all of them. The server and clients can be back-upped. The administrator can make his own local package sources if the network is not meant to have internet access. m23 can be customized by scripts, other distributions can be added relatively easily using the halfSister extension.' &> /tmp/VBoxManage.log

echo -n \"R$?R\" > /tmp/AUTOTEST_VM_export_m23ServerISO_as_OVA.ret
[ -f '$ovaFile' ]
echo -n \"O$?O\" >> /tmp/AUTOTEST_VM_export_m23ServerISO_as_OVA.ret

7zr -t7z -m0=lzma -mx=9 -mfb=64 -md=32m -ms=on a '$zipFile' '$ovaFile'
echo -n \"Z$?Z\" >> /tmp/AUTOTEST_VM_export_m23ServerISO_as_OVA.ret
";

	$VMExportMessage = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "AUTOTEST_VM_export_m23ServerISO_as_OVA", $cmd, TEST_VBOX_USER, false);
}





/**
**name AUTOTEST_VM_stop($vmName, &$VMStopMessage)
**description Stops a VM.
**parameter vmName: Name of the VM.
**parameter VMStopMessage: Variable where the VirtualBox (error) messages will be written to.
**/
function AUTOTEST_VM_stop($vmName, &$VMStopMessage)
{
	$cmd = VM_stopVM(VM_SW_VBOX, $vmName);
	$VMStopMessage = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_stopVM", $cmd, TEST_VBOX_USER, false);
}





/**
**name AUTOTEST_VM_start($vmName, &$VMStartMessage)
**description Starts a virtual machine in an existing X session.
**parameter VMStartMessage: Variable where the VirtualBox (error) messages will be written to.
**parameter vmName: Name of the VM.
**/
function AUTOTEST_VM_start($vmName, &$VMStartMessage)
{
	$cmd = VM_startVMInExistingXSession(VM_SW_VBOX, $vmName);
	$VMStartMessage = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_startVM", $cmd, TEST_VBOX_USER, false);
}





/**
**name AUTOTEST_VM_insertBootISO($vmName, $iso, &$VMinsertBootISOMessage)
**description Inserts a bootable ISO into a VM.
**parameter vmName: Name of the VM.
**parameter iso: ISO file with full path.
**parameter VMinsertBootISOMessage: Variable where the VirtualBox (error) messages will be written to.
**/
function AUTOTEST_VM_insertBootISO($vmName, $iso, &$VMinsertBootISOMessage)
{
	$cmd = VM_insertBootISO(VM_SW_VBOX, $vmName, $iso);
	$VMinsertBootISOMessage = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_insertBootISO", $cmd, TEST_VBOX_USER, false);
}





/**
**name AUTOTEST_VM_rebootFromHD($vmName)
**description Stops the VM, disables booting from ISO and enables HDD booting and starts the VM again.
**parameter vmName: Name of the VM.
**/
function AUTOTEST_VM_rebootFromHD($vmName)
{
	$cmd = VM_stopVM(VM_SW_VBOX, $vmName)."\nsleep 5;\n";
	$cmd .= VM_activateNetbootCMD(VM_SW_VBOX, $vmName, false);
	$cmd .= VM_startVMInExistingXSession(VM_SW_VBOX, $vmName);
	
	$VM_bootFromHDMessage = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "AUTOTEST_VM_rebootFromHD", $cmd, TEST_VBOX_USER, false);
}





/**
**name AUTOTEST_VM_restoreSnapshot($vmName, $snapshotName)
**description Stops a VM and restores a snapshot.
**parameter vmName: Name of the VM.
**parameter snapshotName: Name of the snapshot to restore.
**/
function AUTOTEST_VM_restoreSnapshot($vmName, $snapshotName)
{
	$cmd = VM_stopVM(VM_SW_VBOX, $vmName)."\nsleep 5;\n";
	$cmd .= VM_restoreSnapshot(VM_SW_VBOX, $vmName, $snapshotName);
	$AUTOTEST_VM_restoreSnapshotMessage = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "AUTOTEST_VM_restoreSnapshot", $cmd, TEST_VBOX_USER, false);
}





/**
**name AUTOTEST_executePHPFunction($vmName, $params)
**description Executes a PHP function with (optional) parameters.
**parameter vmName: Name of the VM.
**parameter params: Parameter string with function name as 1st part and its parameters concenated by "°".
**/
function AUTOTEST_executePHPFunction($vmName, $params)
{
	// Split the parameters from the XML file (by °)
	$paramsA = explode('°', $params);

	// First parameter is the function name
	$fkt = $paramsA[0];

	// Exchange the first parameter with the name of the VM
	$paramsA[0] = $vmName;

	call_user_func_array($fkt, $paramsA);
}





/**
**name AUTOTEST_VM_keyboardWrite($vmName, $toType)
**description Emulates the keystrokes into a VM.
**parameter vmName: Name of the VM.
**parameter toType: Input string with normal and special keys.
**/
function AUTOTEST_VM_keyboardWrite($vmName, $toType)
{
	$scanCodes = AUTOTEST_calcScancodes($toType);
	$cmd = "VBoxManage controlvm \"$vmName\" keyboardputscancode $scanCodes";
	$VMkeyboardWriteMessage = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_keyboardWrite", $cmd, TEST_VBOX_USER, false);
}





/**
**name AUTOTEST_VM_ocrScreen($vmName)
**description Uses gocr to convert the contents of the VirtualBox VM display to text.
**parameter vmName: Name of the VM.
**returns The recognised text of the display.
**/
function AUTOTEST_VM_ocrScreen($vmName)
{

	$png = uniqid('/tmp/scr').'.png';
	$png300 = uniqid('/tmp/scr300').'.png';
	
	// Make a screenshot and recognise characters in the PNG with two settings
	$cmd = "VBoxManage controlvm \"$vmName\" screenshotpng $png
	gocr -l 150 -i $png
	gocr -l 175 -i $png
	gocr -l 225 -i $png
	gocr -i $png

	convert $png -resize 300% $png300
	tesseract $png300 - 2> /dev/null

	rm $png $png300";

	$result = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_ocrScreen", $cmd, TEST_VBOX_USER, false);

	if (defined('AT_debug'))
		echo("AUTOTEST_VM_ocrScreen($vmName)\n$result\n");
	
	return($result);
}





/**
**name AUTOTEST_VM_screenPixelDiff($vmName)
**description Compares the VM's screen with a previously saved screen and gives back the amount of changed pixels.
**parameter vmName: Name of the VM.
**returns Amount of changed pixels (or 99999999999 if there is no previously saved screen).
**/
function AUTOTEST_VM_screenPixelDiff($vmName)
{
	$png1 = '/tmp/AUTOTEST_VM_screendiff1'.$vmName.'.png';
	$xpm1 = '/tmp/AUTOTEST_VM_screendiff1'.$vmName.'.xpm';
	$png2 = '/tmp/AUTOTEST_VM_screendiff2'.$vmName.'.png';
	$xpm2 = '/tmp/AUTOTEST_VM_screendiff2'.$vmName.'.xpm';

	$cmd = "
	if [ -f '$xpm1' ]
	then
		VBoxManage controlvm '$vmName' screenshotpng '$png2'
		convert '$png2' '$xpm2'
		cmp -l '$xpm1' '$xpm2' | wc -l
		mv '$xpm2' '$xpm1'
		rm '$png2' 2> /dev/null
	else
		VBoxManage controlvm '$vmName' screenshotpng '$png1'
		convert '$png1' '$xpm1'
		rm '$png1' 2> /dev/null
		echo 99999999999
	fi
	";

	$diff = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_screendiff", $cmd, TEST_VBOX_USER, false);

	return(trim($diff));
}





/**
**name AUTOTEST_VM_getStatus($vmName)
**description Parses the complete status of a VM.
**parameter vmName: Name of the VM.
**returns Array with the current state of the VM.
**/
function AUTOTEST_VM_getStatus($vmName)
{
	$cmd = VM_status(VM_SW_VBOX, $vmName);
	$status = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_getStatus", $cmd, TEST_VBOX_USER, false);
	return(VM_parseStatus(VM_SW_VBOX, $status));
}





/**
**name AUTOTEST_VM_isRunning($vmName)
**description Checks if a VM is switched on.
**parameter vmName: Name of the VM.
**returns true, when the VM is powered on, otherwise false.
**/
function AUTOTEST_VM_isRunning($vmName)
{
	$status = AUTOTEST_VM_getStatus($vmName);
	return(isset($status['state']) && VM_STATE_ON == $status['state']);
}





/**
**name AUTOTEST_SELENIUM_exec($bridgeURL, $cmd)
**description Runs a command on the HTTP2SeleniumBridge.
**parameter bridgeURL: URL to the HTTP2SeleniumBridge server (eg. http://192.168.1.153:23080)
**parameter cmd: The command to execute (eg. typeInto)
**parameter ID or name: ID or name of the HTML element to 
**parameter additional parameters: Additional parameters with variable name first, value second.
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_exec($seleniumURL, $cmd, $args = array())
{
	$url = "$bridgeURL/run?cmd=$cmd";

	// ID or name have to be given for most commands somewhere in the argument list
	$nameOrIDGiven = (($cmd == 'getsource') || ($cmd == 'open'));

	foreach ($args as $var => $val)
	{
		if (!$nameOrIDGiven)
			$nameOrIDGiven = (($var == 'ID') || ($var == 'name'));

		// Values are beeing URL decoded by HTTP2SeleniumBridge, but only "&" needs to be encoded here
		$val = func_get_arg($i + 1);
		$val = str_replace ('&', '%26', $val);
		
		$url .= "&$var=$val";
	}

	// If no
	if (!$nameOrIDGiven)
		die('ERROR: AUTOTEST_execSelenium: No ID or name given!');

	return(HELPER_getContentFromURL($url));
}





/**
**name AUTOTEST_SELENIUM_open($seleniumURL, $url)
**description Opens a website on the HTTP2SeleniumBridge.
**parameter url: The URL to open (with "http(s)://" at the beginning and possible "<user>:<password>@"
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_open($seleniumURL, $url)
{
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'open', array('url' => $url)));
}





/**
**name AUTOTEST_SELENIUM_selectFromID($seleniumURL, $ID, $val)
**description Selects an option from a selection choosen by selection ID.
**parameter ID: ID of the selection
**parameter val: The value of the option to select
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_selectFromID($seleniumURL, $ID, $val)
{
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'selectFrom', array('ID' => $ID, 'val' => $val)));
}





/**
**name AUTOTEST_SELENIUM_selectFromName($seleniumURL, $name, $val)
**description Selects an option from a selection choosen by selection name.
**parameter name: Name of the selection
**parameter val: The value of the option to select
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_selectFromName($seleniumURL, $name, $val)
{
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'selectFrom', array('name' => $name, 'val' => $val)));
}





/**
**name AUTOTEST_SELENIUM_deselectFromID($seleniumURL, $ID, $val)
**description Deselects an option from a selection choosen by selection ID.
**parameter ID: ID of the selection
**parameter val: The value of the option to deselect
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_deselectFromID($seleniumURL, $ID, $val)
{
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'deselectFrom', array('ID' => $ID, 'val' => $val)));
}





/**
**name AUTOTEST_SELENIUM_deselectFromName($seleniumURL, $name, $val)
**description Deselects an option from a selection choosen by selection name.
**parameter name: Name of the selection
**parameter val: The value of the option to deselect
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_deselectFromName($seleniumURL, $name, $val)
{
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'selectFrom', array('name' => $name, 'val' => $val)));
}





/**
**name AUTOTEST_SELENIUM_clickButtonID($seleniumURL, $ID)
**description Clicks a button choosen by button ID.
**parameter ID: ID of the button
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_clickButtonID($seleniumURL, $ID)
{
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'clickButton', array('ID' => $ID)));
}





/**
**name AUTOTEST_SELENIUM_clickButtonName($seleniumURL, $name)
**description Clicks a button choosen by button name.
**parameter name: Name of the button
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_clickButtonName($seleniumURL, $name)
{
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'clickButton', array('name' => $name)));
}





/**
**name AUTOTEST_SELENIUM_typeIntoID($seleniumURL, $ID, $text)
**description Types into an editline or textarea choosen by its ID.
**parameter ID: ID of the editline or textarea
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_typeIntoID($seleniumURL, $ID, $text)
{
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'typeInto', array('ID' => $ID, 'text' => $text)));
}





/**
**name AUTOTEST_SELENIUM_typeIntoName($seleniumURL, $name, $text)
**description Types into an editline or textarea choosen by its name.
**parameter name: Name of the editline or textarea
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_typeIntoName($seleniumURL, $name, $text)
{
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'typeInto', array('name' => $name, 'text' => $text)));
}





/**
**name AUTOTEST_SELENIUM_setCheckID($seleniumURL, $ID, $checked)
**description (Un)Ticks a checkbox choosen by its ID.
**parameter ID: ID of the checkbox
**parameter checked: true for activating the checkbox, false for unticking it
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_setCheckID($seleniumURL, $ID, $checked)
{
	$checked = ($checked ? 1 : 0);
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'setCheck', array('ID' => $ID, 'checked' => $checked)));
}





/**
**name AUTOTEST_SELENIUM_setCheckName($seleniumURL, $name, $checked)
**description (Un)Ticks a checkbox choosen by its name.
**parameter name: Name of the checkbox
**parameter checked: true for activating the checkbox, false for unticking it
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_setCheckName($seleniumURL, $name, $checked)
{
	$checked = ($checked ? 1 : 0);
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'setCheck', array('name' => $name, 'checked' => $checked)));
}





/**
**name AUTOTEST_SELENIUM_selectRadioID($seleniumURL, $ID, $val)
**description Selects a radio button choosen by its ID.
**parameter ID: ID of the radio button
**parameter val: The value of the radio button to select
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_selectRadioID($seleniumURL, $ID, $val)
{
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'selectRadio', array('ID' => $ID, 'val' => $val)));
}





/**
**name AUTOTEST_SELENIUM_selectRadioName($seleniumURL, $name, $val)
**description Selects a radio button choosen by its name.
**parameter name: Name of the radio button
**parameter val: The value of the radio button to select
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_selectRadioName($seleniumURL, $name, $val)
{
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'selectRadio', array('name' => $name, 'val' => $val)));
}





/**
**name AUTOTEST_SELENIUM_getsource($seleniumURL)
**description Gets the current page source of the selenium browser into the output page.
**returns Current page source
**/
function AUTOTEST_SELENIUM_getsource($seleniumURL)
{
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'getsource'));
}





/**
**name AUTOTEST_SELENIUM_close($seleniumURL)
**description Closes the browser window
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_close($seleniumURL)
{
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'close'));
}





/**
**name AUTOTEST_SELENIUM_quit($seleniumURL)
**description Closes the browser and webserver and quits HTTP2SeleniumBridge.
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
function AUTOTEST_SELENIUM_quit($seleniumURL)
{
	return(AUTOTEST_SELENIUM_exec($seleniumURL, 'quit'));
}

?>