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

function AUTOTEST_hostSanity()
{
	$cmd = 'grep, screen, VBoxManage, x2go, gocr ';
	$result = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_sanityCheck", $cmd, TEST_VBOX_USER, false);
}
*/



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
	$withShift['!'] = '02'; $withShift['@'] = '03'; $withShift['#'] = '04'; $withShift['$'] = '05'; $withShift['%'] = '06'; $withShift['^'] = '07'; $withShift['&'] = '08'; $withShift['*'] = '09'; $withShift['['] = '0a'; $withShift[')'] = '0b'; $withShift['-'] = '0c'; $withShift['+'] = '0d'; $withShift['{'] = '1a'; $withShift['}'] = '1b'; $withShift[':'] = '27'; $withShift['"'] = '28'; $withShift['~'] = '29'; $withShift['|'] = '2b'; $withShift['<'] = '33'; $withShift['>'] = '34'; $withShift['?'] = '35';

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
	$mac = HELPER_randomMAC();

	$diskName = $vmName."hda";
	$cmd = VM_createDiskImage(VM_SW_VBOX, $vmName, $diskName, $diskSize, TEST_VBOX_IMAGE_DIR);
	$cmd .= VM_createVM(VM_SW_VBOX, $vmName, $ramSize, $diskName, $mac, TEST_VBOX_NETDEV, TEST_VBOX_IMAGE_DIR);

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
**parameter VMDeletionMessage: Variable where the VirtualBox (error) messages will be written to.
**parameter vmName: Name of the VM.
**/
function AUTOTEST_VM_delete($vmName, &$VMDeletionMessage)
{
	$cmd = VM_delVMCMD(VM_SW_VBOX, $vmName);
	$VMDeletionMessage = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_deleteVM", $cmd, TEST_VBOX_USER, false);
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
**name AUTOTEST_executePHPFunction($vmName, $params)
**description Executes a PHP function with (optionall) parameters.
**parameter vmName: Name of the VM.
**parameter params: [0] function name, [1...] parameters for the PHP function.
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
	
	// Start with settings usefull for ncurses
	$cmd = "VBoxManage controlvm $vmName screenshotpng $png; gocr -i $png; rm $png";
	$result = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_ocrScreen", $cmd, TEST_VBOX_USER, false);

	// Count all characters
	$cnt = count_chars($result);
	
	// Check the frequency of occurrence of the chars '_' and '0' (that indicate errors in the character recognisation) in refernce to all characters. If more than 10 percent => try different OCR parameters
	if ((($cnt[95] + $cnt[48]) / array_sum($cnt)) > 0.10)
	$cmd = "VBoxManage controlvm $vmName screenshotpng $png; gocr -l 150 -i $png; rm $png";
	$result = CLIENT_executeOnClientOrIP(TEST_VBOX_HOST, "VM_ocrScreen", $cmd, TEST_VBOX_USER, false);
	
	return($result);
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


?>