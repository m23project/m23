<?PHP

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: function to generate the sources.list for the client
$*/





/**
**name SRCLST_getExportedListNames()
**description Generates an array with all sources lists that are exported by /mdk/bin/exportDBsourceslist.php.
**returns: Array with all sources lists that are exported by /mdk/bin/exportDBsourceslist.php.
**/
function SRCLST_getExportedListNames()
{
	$ret = SERVER_runInBackground(uniqid('SRCLST_getExportedListNames'), "grep 'allowedNames = array' /mdk/bin/exportDBsourceslist.php | sed -e 's/.*array(//' -e 's/);//' -e 's/,/\\n/g'", HELPER_getApacheUser(), false, true);
	
	$out = array();
	$i = 0;
	
	foreach (explode("\n", $ret) as $sourceName)
	{
		if (empty($sourceName))
			break;
			
		$sourceName = trim($sourceName);
		$sourceName = trim($sourceName, '\'"');
	
		$out[$i++] = $sourceName;
	}
	
	return($out);
}





/**
**name SRCLST_getAddToFile($sourceName)
**description Returns addToFile paramters from the given sources list as an associative array, where file name and file contents are seperated.
**parameter sourceName: The name of the package source list
**returns: Associative array with file name and file contents (e.g. [0] => Array ([file] => file1.txt, [text] => text1), [1] => Array ([file] => file2.txt, [text] => text2), ...)
**/
function SRCLST_getAddToFile($sourceName)
{
	/*
		The input lines have the folliwing format:
		#addToFile:<File name to store the text in>###line 1###line 2###line 3###line 4
	*/

	//Get all lines with addToFile parameter
	$lines = SRCLST_getParameter($sourceName, 'addToFile');
	$out = array();
	$i=0;

	foreach ($lines as $line)
	{
		//Newlines are represented by '###'
		$temp = explode('###',$line);
		//The first string in the array is the file name
		$out[$i]['file'] = $temp[0];
		//Remove the file name from the array
		array_shift($temp);
		//Combine all other elements to new lines (this is the text for the file)
		$out[$i]['text'] = implode("\n",$temp);
		$i++;
	}

	return($out);
}





/**
**name SRCLST_getRelease($name)
**description Gets a release from the sourceslist table.
**parameter name: the name of the package source list
**returns Release name of choosen sources list.
**/
function SRCLST_getRelease($name)
{
	CHECK_FW(CC_sourceslistname, $name);
	return(SRCLST_getValue($name, 'release'));
};





/**
**name SRCLST_genList($clientName)
**description generates the sources.list file for the client
**parameter clientName: the name of the client
**/
function SRCLST_genList($clientName)
{
	$allOptions = CLIENT_getAllOptions($clientName);

	$packageSource = $allOptions['packagesource'];

	//Add the Debian/Ubuntu extraDebs repository only, if it is not a halfSister distribution
	if (($allOptions['distr'] == 'halfSister') || SERVER_ism23ServerIncudedInSourcesListDisabled())
		$addExtraDeb = "";
	else
		$addExtraDeb = "\ndeb http://".getServerIP()."/extraDebs/ ./";

	return(SRCLST_loadSourceList($packageSource).$addExtraDeb);
};





/**
**name SRCLST_saveArchitectures($sourceName, $archs)
**description Saves the architectures for package source list.
**parameter sourceName: the name of the package source list
**parameter archs: Associative array with the supported CPU architectures.
**/
function SRCLST_saveArchitectures($sourceName, $archs)
{
	$archs = implode('###',$archs);
	CHECK_FW(CC_sourceslistname, $sourceName, CC_sourceslistarchs, $archs);
	return(DB_query("UPDATE `sourceslist` SET `archs` = '$archs' WHERE `name` = '$sourceName' LIMIT 1")); //FW ok
}





/**
**name SRCLST_saveList($name,$list,$description,$distr,$release)
**description saves the package source list
**parameter name: the name of the package source list
**parameter list: the list of sources as simple text
**parameter description: a descriptive text for the list
**parameter distr: the name of the distribution the list is for
**parameter release: the name of the release the list is for
**/
function SRCLST_saveList($name,$list,$description,$distr,$release="")
{
	$desktops = DISTR_getSelectedDesktopsStr();

	CHECK_FW(CC_sourceslistname, $name, CC_sourceslistdescription, $description, CC_sourceslistdistr, $distr, CC_sourceslistrelease, $release, CC_sourceslistdesktops, $desktops, CC_sourceslistlist, $list);

	//Make sure that sources lists with special characters are stored correctly.
	$list = CHECK_text2db($list);

	$sql="SELECT count(*) FROM `sourceslist` WHERE `name`='$name'";
	$result=DB_query($sql); //FW ok

	$line=mysqli_fetch_row($result);

	if ($line[0] > 0)
		$sql="UPDATE `sourceslist` SET `list` = '$list', `description` = '$description', `distr` = '$distr', `release` = '$release', `desktops` = '$desktops' WHERE `name` = '$name' LIMIT 1";
	else
		$sql="INSERT INTO `sourceslist` ( `name` , `list` , `description` , `distr` , `release` , `desktops`) VALUES ('$name','$list','$description','$distr','$release','$desktops')";

	$sourceslist="/m23/var/cache/m23apt/$distr/$name/sources.list";
	//delete sources.list to make the package cache refresh after
	if (file_exists($sourceslist))
		unlink($sourceslist);

	PKG_updateSourcesListAtAllClients($name);

	return(DB_query($sql)); //FW ok
};





/**
**name SRCLST_querySourceslists($distr)
**description returns the result of the DB query after sourceslists for a special distribution
**parameter distr: the distribution the sources list is for or "*" for all distributions
**/
function SRCLST_querySourceslists($distr)
{
	$addQuery = '';

	if ($distr != "*")
	{
		CHECK_FW(CC_sourceslistdistr, $distr);
		$addQuery="WHERE distr='$distr'";
	}

	$sql = "SELECT name FROM `sourceslist` $addQuery ORDER BY name";

	$result = DB_query($sql); //FW ok
	return($result);
}





/**
**name SRCLST_genSelection($selName, $first, $distr)
**description generates a HTML selection with the names of all package sources
**parameter selName: the name of the selection
**parameter first: the package source that should be shown first
**parameter distr: the distribution the sources list is for or "*" for all distributions
**/
function SRCLST_genSelection($selName, $first, $distr)
{
	$result = SRCLST_querySourceslists($distr);

	$out="<select name=\"$selName\" size=\"1\">";

	if (strlen($first) > 0)
		$out.="<option value=\"$first\">$first</option>";

	while ($line=mysqli_fetch_row($result))
		if ($line[0] != $first)
			$out.="<option value=\"".$line[0]."\">".$line[0]."</option>";

	$out.="</select>";

	return($out);
}





/**
**name SRCLST_storableSelection($htmlName, $defaultSelection, $distr, $prefKey, $storePointer)
**description Generates a storable HTML selection with the names of all package sources.
**parameter htmlName: The name of the selection
**parameter distr: The distribution the sources list is for or "*" for all distributions
**parameter prefKey: Variable name of the preference the dialog element stands for.
**parameter storePointer: Additional pointer to the variable where to store the entered value.
**returns Name of selected sources list.
**/
function SRCLST_storableSelection($htmlName, $distr, $prefKey, &$storePointer)
{
	$array = array();

	$result = SRCLST_querySourceslists($distr);

	while ($line = mysqli_fetch_row($result))
		$array[$line[0]] = $line[0];

	return(HTML_storableSelection($htmlName, $prefKey, $array, SELTYPE_selection, true, false, $storePointer));
}





/**
**name SRCLST_getValue($name,$var)
**description gets a value from the sourceslist table
**parameter name: the name of the package source list
**parameter var: the name of the table row
**/
function SRCLST_getValue($name,$var)
{
	if (($name == 'imaging') && ($var == 'release'))
	return('imaging');

	CHECK_FW(CC_sourceslistname, $name, "s", $var);

	$sql = "SELECT `$var` FROM `sourceslist` WHERE name='$name'";

	$result = DB_query($sql); //FW ok

	$line = mysqli_fetch_row($result);

	if ('list' == $var)
		$line[0] = CHECK_db2text($line[0]);

	return ($line[0]);
};





/**
**name SRCLST_loadSourceListFromDB($name)
**description loads and returnes the the package source list from the DB.
**parameter name: the name of the package source list
**/
function SRCLST_loadSourceListFromDB($name)
{
	return(SRCLST_getValue($name,"list"));
};





/**
**name SRCLST_sourceListExists($name)
**description Checks, if a named sources list exists.
**parameter name: the name of the package source list
**returns true, if the package source list exists, otherwise false.
**/
function SRCLST_sourceListExists($name)
{
	$temp = SRCLST_loadSourceListFromDB($name);
	return(!empty($temp));
}





/**
**name SRCLST_loadSourceList($name)
**description Loads and returnes the package source list and tries to find a valid mirror for m23debs.
**parameter name: the name of the package source list
**returns package source list
**/
function SRCLST_loadSourceList($name)
{
	$out = '';
	
	// Load the sources list from DB
	$lst = SRCLST_loadSourceListFromDB($name);

	// Run thru the lines
	$lines = explode("\n",$lst);
	foreach ($lines as $line)
	{
		// Let the line unchanged, if the line does NOT contain an m23debs mirror
		if (strpos($line,'m23debs') === false)
			$out .= "$line\n";
		else
		{// Check, if the given m23debs mirror is valid

			// Split the line into (deb, mirror url and directory on the mirror)
			$debUrlDir = preg_split('/[ \t]+/', $line);

			// Use goos-habermann.de as repository when the m23 server is on UCS because apt-cacher-ng has sometimes problems with the SF mirrors
			if (true || HELPER_isExecutedOnUCS())
				$out .= 'deb http://m23debs.goos-habermann.de'." ./\n";
			else
			{
				// Use the mirror, if it is valid
				if (SRCLST_checkm23debsMirror($debUrlDir[1]))
					$out .= "$line\n";
				else
				// Otherwise find another mirror
					$out .= "deb ".SRCLST_getWorkingm23debsMirror()." ./\n";
			}
		}
	}
	return($out);
}





/**
**name SRCLST_getDescription($name)
**description returnes the the package source description
**parameter name: the name of the package source list
**/
function SRCLST_getDescription($name)
{
	return(SRCLST_getValue($name,"description"));
};





/**
**name SRCLST_delete($name)
**description deletes package source
**parameter name: the name of the package source list
**/
function SRCLST_delete($name)
{
	CHECK_FW(CC_sourceslistname, $name);

	$sql = "DELETE FROM `sourceslist` WHERE `name` = '$name'";

	return(DB_query($sql)); //FW ok
}





/**
**name SRCLST_checkList($sourceName)
**description checks a package info and returns the output of the OS package update function
**parameter sourceName: the name of the package source list
**/
function SRCLST_checkList($sourceName, $arch)
{
	$distr = SRCLST_getValue($sourceName,"distr");

	include_once("/m23/inc/distr/$distr/packages.php");

	//Check if the function for testing the package sources list exists.
	if (!function_exists('PKG_updatePackageInfo'))
	{
		//Show an error message, if it is not possible.
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		MSG_showError($I18N_testingOfTheSourcesListNotPossible);
		return(false);
	}

	$logFile = PKG_updatePackageInfo($distr, $sourceName, true, $arch);

	//there was an error updating the package source
	if (!$logFile)
		return("");

	$FILE=fopen($logFile,"r");
	if (!$FILE)
		return("");

	$out = "";
	


	while (!feof($FILE))
		{
			$line = fgets($FILE,10000);

			$out .= nl2br(wordwrap($line));
		};

	fclose($FILE);

	return($out);
};





/**
**name SRCLST_packageInformationChangeInformationHumanReadable($distr, $sourcename)
**description Returns the time point when the package information was changed last.
**parameter distr: the short name of the distribution
**parameter sourceName: the name of the package source list
**returns: Time when the package information was changed last.
**/
function SRCLST_packageInformationChangeInformationHumanReadable($distr, $sourcename)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Get time information
	$packageInformationChange = SRCLST_packageInformationChangeTime($distr, $sourcename, $packageInformationChangedBefore);

	//Convert the time information into human readable form
	$packageInformationChangeS = strftime($I18N_timeFormat, $packageInformationChange);

	return("$I18N_updatedLastAt $packageInformationChangeS ($I18N_changedBeforeMinutes1 ".(int)($packageInformationChangedBefore / 60)." $I18N_changedBeforeMinutes2)");
	
}





/**
**name SRCLST_packageInformationChangeTime($distr, $sourcename, &$changedBefore)
**description Returns the time point when the package information was changed last.
**parameter distr: the short name of the distribution
**parameter sourceName: the name of the package source list
**parameter changedBefore: Amount of seconds before the package information was changed.
**returns: Time when the package information was changed last.
**/
function SRCLST_packageInformationChangeTime($distr, $sourcename, &$changedBefore)
{
	//clear the cache that caches informations about the access time of files
	clearstatcache();
	
	$statusFile = "/m23/var/cache/m23apt/$distr/$sourcename/status";

	if (file_exists($statusFile))
	{
		$changeTime = filectime($statusFile);
		$changedBefore = time() - $changeTime;
	}
	else
	{
		$changeTime = 0;
		$changedBefore = time();
	}

	return($changeTime);
}





/**
**name SRCLST_packageInformationOlderThan($minutes, $distr, $sourcename)
**description Checks if a package info is older than a selected amount of minutes or if the package info directory is too smal.
**parameter minutes: the amount of minutes the package information can be older to return true
**parameter distr: the short name of the distribution
**parameter sourceName: the name of the package source list
**returns: true when package info is older than a selected amount of minutes or if the package info directory is too smal, otherwise false.
**/
function SRCLST_packageInformationOlderThan($minutes, $distr, $sourcename)
{
	$baseDir = "/m23/var/cache/m23apt/$distr/$sourcename";
	$listsDir = "$baseDir/lists/";

	//Get the size of the lists directory, that contains the lists of available packages
	$listsDirSize = exec("du -s \"$listsDir\" | sed 's#[ \\t].*##g'", $outLines, $retCode);
	//If the list size could not be get or the size is less than 100 bytes, there must be an error.
	$listsDirTooSmal = ( ($retCode != 0) || ( $listsDirSize < 100) );

	$statusFile = "$baseDir/status";

	$changeTime = SRCLST_packageInformationChangeTime($distr, $sourcename, $changedBefore);

	return ((!file_exists('/m23/etc/offlineMode')) &&
		((!file_exists($statusFile)) || (($changedBefore / 60) > $minutes) || $listsDirTooSmal));
};





/**
**name SRCLST_getStorageFS($fs, $sourceName)
**description Returns a file systems that can be used to install the OS and to store data. A wished file system is given and an alternative FS is returned, if this FS is not supported.
**parameter fs: File system to probe.
**parameter sourceName: The name of the package source list
**returns: File systems that can be used to install the OS and to store data
**/
function SRCLST_getStorageFS($fs, $sourceName)
{
	if ('imaging' == $sourceName)
		return($fs);

	if (in_array($fs,SRCLST_supportedFS($sourceName)) || ('linux-swap' == $fs) || ('auto' == $fs))
		return($fs);
	else
		return(SRCLST_alternativeFS($sourceName));
}





/**
**name SRCLST_supportedFS($sourceName)
**description Returns an array with file systems that supported by the OS.
**parameter sourceName: The name of the package source list
**returns: Array with file systems supported by the OS.
**/
function SRCLST_supportedFS($sourceName)
{
	$line = SRCLST_getParameter($sourceName, 'supportedFS');
	return(explode(', ',$line[0]));
}





/**
**name SRCLST_alternativeFS($sourceName)
**description Returns the alternative file system that is supported by the OS.
**parameter sourceName: The name of the package source list
**returns: File system.
**/
function SRCLST_alternativeFS($sourceName)
{
	$tmp = SRCLST_getParameter($sourceName, 'alternativeFS');
	return(isset($tmp[0]{1}) ? $tmp[0] : 'ext3');
}





/**
**name SRCLST_getParameter($sourceName, $parameter)
**description Returns special parameter(s) from the given sources list.
**parameter sourceName: The name of the package source list
**parameter parameter: The name of the parameter.
**returns: Values for the given parameter in an array.
**/
function SRCLST_getParameter($sourceName, $parameter)
{
	$list=SRCLST_loadSourceListFromDB($sourceName);
	$i=0;
	$out = array();
	$lines = explode("\n",trim(HELPER_grep($list,"#$parameter:")));
	
	foreach ($lines as $line)
	{
		$mM = explode("#$parameter:",$line);
		if (isset($mM[1]))
			$out[$i++] = trim($mM[1]);
	}

	return($out);
};





/**
**name SRCLST_getMirror($sourceName)
**description returns the mirror from the sources list
**parameter sourceName: the name of the package source list
**returns URL to the mirror
**/
function SRCLST_getMirror($sourceName)
{
	$tmp = SRCLST_getParameter($sourceName, 'mirror');
	return($tmp[0]);
};





/**
**name SRCLST_getDesktopList($sourceName)
**description returnes an array with all supported desktops
**parameter sourceName: the name of the package source list
**/
function SRCLST_getDesktopList($sourceName)
{
	return(explode("###",SRCLST_getValue($sourceName,"desktops")));
};





/**
**name SRCLST_showDesktopsSel($sourceName,$selName,$first)
**description returnes a selections with all desktops supported by the sources list
**parameter sourceName: the name of the package source list
**parameter selName: the name of the selection
**parameter first: the desktop that should be shown first
**/
function SRCLST_showDesktopsSel($sourceName,$selName,$first)
{
	$desktops=SRCLST_getDesktopList($sourceName);
	sort($desktops);

	if (!in_array($first,$desktops))
		$first="";

	return(HTML_listSelection($selName,$desktops,$first));
}





/**
**name SRCLST_storableDesktopsSelection($htmlName, $sourceName, $defaultSelection, $prefKey, $storePointer)
**description Generates a storable HTML selection with the names of all desktops.
**parameter htmlName: The name of the selection
**parameter sourceName: the name of the package source list
**parameter prefKey: Variable name of the preference the dialog element stands for.
**parameter storePointer: Additional pointer to the variable where to store the entered value.
**returns Name of selected desktop.
**/
function SRCLST_storableDesktopsSelection($htmlName, $sourceName, $prefKey, &$storePointer)
{
	$desktops = SRCLST_getDesktopList($sourceName);
	sort($desktops);
	
	$desktops = HELPER_array2AssociativeArray($desktops);

	if (!isset($defaultSelection{0}))
		$defaultSelection = false;

	return(HTML_storableSelection($htmlName, $prefKey, $desktops, SELTYPE_selection, true, false, $storePointer));
}





/**
**name SRCLST_doesDistrSupportEFI($sourceName)
**description Checks, if a sources list contains a distribution that supports EFI.
**parameter sourceName: the name of the package source list
**returns true, if the distribution supports EFI, otherwise false.
**/
function SRCLST_doesDistrSupportEFI($sourceName)
{
	// Try to get the line with the (possibly existing) EFI supporting architectures
	$efiArchsSupportedByDistribution = SRCLST_getParameter($sourceName, 'supportedEFI');

	// Currently check only for amd64
	return(in_array('amd64', $efiArchsSupportedByDistribution));
}





/**
**name SRCLST_getListnamesWithEfiSupport()
**description Gets a list with all sources lists that support EFI.
**returns Array with all sources lists that support EFI.
**/
function SRCLST_getListnamesWithEfiSupport()
{
	$listnamesWithEfiSupport = array();

	// Get all sources list names
	$allLists = SRCLST_getListnames('*');

	// Check each list name and add it to the output array, if the list supports EFI
	foreach ($allLists as $listName)
		if (SRCLST_doesDistrSupportEFI($listName))
			$listnamesWithEfiSupport[$listName] = $listName;

	return($listnamesWithEfiSupport);
}





/**
**name SRCLST_clientUsesEfiButSourcesListDoesntSupportEfi($client, $sourceName)
**description Checks, if the client uses EFI and the choosen sources list doesn't.
**parameter client: Name of the client.
**parameter sourceName: The name of the package source list.
**returns: true, if the client uses EFI and the choosen sources list doesn't, otherwise false.
**/
function SRCLST_clientUsesEfiButSourcesListDoesntSupportEfi($client, $sourceName)
{
	// FABR: we do not check for Efi if $sourceName == imaging
	if ($sourceName == "imaging") return(false);
	$CFDiskIOO = new CFDiskIO($client);

	return ($CFDiskIOO->isUEFIActive() && !SRCLST_doesDistrSupportEFI($sourceName));
}





/**
**name SRCLST_showErrorIfClientUsesEfiButSourcesListDoesntSupportEfi($client, $sourceName)
**description Shows an error message, if the client uses EFI and the choosen sources list doesn't.
**parameter client: Name of the client.
**parameter sourceName: The name of the package source list.
**returns: false, if the client uses EFI and the choosen sources list doesn't, otherwise true.
**/
function SRCLST_showErrorIfClientUsesEfiButSourcesListDoesntSupportEfi($client, $sourceName)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	// FABR: we do not check for Efi if $sourceName == imaging
	if ($sourceName == "imaging") return(true);
	if (SRCLST_clientUsesEfiButSourcesListDoesntSupportEfi($client, $sourceName))
	{
		MSG_showError($I18N_clientUsesEfiButSourcesListDoesntSupportEfi_Alternatives.' '.implode(' , ', SRCLST_getListnamesWithEfiSupport()));
		return(false);
	}

	return(true);
}





/**
**name SRCLST_showAlternativeArchitectureSelection($sourceName, $wantedArch, $client)
**description Shows a list with available CPU architectures of the sources list, in case that the wanted architecture is not available in the sources list. The alternative architecture will be written to the arch option of the client.
**parameter sourceName: The name of the package source list.
**parameter wantedArch: The CPU architecture of the m23 client.
**parameter client: Name of the client.
**returns: A CPU architecture supported by the package source list.
**/
function SRCLST_showAlternativeArchitectureSelection($sourceName, $wantedArch, $client)
{
	if (!isset($sourceName{1}) || !isset($wantedArch{1}) || SRCLST_isArchAvailable($sourceName, $wantedArch))
		return($wantedArch);
	else
		{
			include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
			$allArchs = SRCLST_getArchitectures($sourceName);
			$arch = HTML_selection('SEL_showAlternativeArchitectureSelection', $allArchs, SELTYPE_selection);

			if (HTML_submit('BUT_showAlternativeArchitectureSelection',$I18N_select))
			{
				$options = CLIENT_getAllOptions($client);
				$options['arch'] = $arch;
				CLIENT_setAllOptions($client, $options);
			}
			else
			{
				MSG_showWarning($I18N_theSourcesListDoesntSupportTheClientArchitecturePleaseSelectAnother);
				HTML_showTableHeader();
				HTML_showTableRow($I18N_arch, SEL_showAlternativeArchitectureSelection, BUT_showAlternativeArchitectureSelection);
				HTML_showTableEnd();
			}
			return($arch);
		}
}





/**
**name SRCLST_isArchAvailable($sourceName, $arch)
**description Checks if a given architecture is supported by the sources list.
**parameter sourceName: the name of the package source list
**parameter arch: Architecture to check for.
**returns true, if the architecture is supported, false otherwise.
**/
function SRCLST_isArchAvailable($sourceName, $arch)
{
	$archs = SRCLST_getValue($sourceName,"archs");
	return(!(strpos($archs,$arch) === false));
}





/**
**name SRCLST_getArchitectures($sourceName)
**description Returnes a list of all CPU architectures supported by the sources list.
**parameter sourceName: the name of the package source list
**returns Associative array with the supported CPU architectures as variable AND key.
**/
function SRCLST_getArchitectures($sourceName)
{
	$archs = SRCLST_getValue($sourceName,"archs");

	if (isset($archs{1}))
	{
		$archs = explode('###', $archs);
		return(HELPER_array2AssociativeArray($archs));
	}
	else
		return(array('i386' => 'i386'));
}





/**
**name SRCLST_showEditor($poolName="", $showSupportedUserInterfacesList = true)
**description shows an editor for sources lists
**parameter poolName: if it is set, the editor shows a package download dialog for the selected pool
**parameter showSupportedUserInterfacesList: if it is set, the list with the supported GUIs will be shown.
**/
function SRCLST_showEditor($poolName="", $showSupportedUserInterfacesList = true)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Supported CPU architectures
	$archs = getArchList();
	$defaultCheckedArchs = $archs;
	$forceCheckedArchsReload = false;

	$sourcename = isset($_POST['sourcename']) ? $_POST['sourcename'] : '';
	$sourcelist = CHECK_db2text(trim(isset($_POST['sourcelist']) ? $_POST['sourcelist'] : ''));
	$sourcedescr = trim(isset($_POST['sourcedescr']) ? $_POST['sourcedescr'] : '');
	$distr = isset($_POST['distr']) ? $_POST['distr'] : '';
	$release = isset($_POST['release']) ? $_POST['release'] : '';


	//loads a sources list
	if (isset($_POST['BUT_load']) || isset($_POST['BUT_deleteCancel']))
		{
			$sourcename = $_POST['SEL_name'];
			$sourcelist = trim(SRCLST_loadSourceList($sourcename));
			$sourcedescr = trim(SRCLST_getDescription($sourcename));
			$distr = SRCLST_getValue($sourcename,"distr");
			$release = SRCLST_getValue($sourcename,"release");
			$selectedDesktops = SRCLST_getDesktopList($sourcename);
			$tmpArch = SRCLST_getArchitectures($sourcename);
			if (!($tmpArch === false))
			{
				$defaultCheckedArchs = $tmpArch;
				$forceCheckedArchsReload = true;
			}
		};

	if (!isset($selectedDesktops) || !is_array($selectedDesktops))
		$selectedDesktops = DISTR_getSelectedDesktopsArr();

	$checkedArchs = HTML_multiCheckBox('MUL_archs', $archs, $defaultCheckedArchs, $forceCheckedArchsReload);

	//save the source list
	if (isset($_POST['BUT_save']))
		{
			$sourcename=$_POST['ED_name'];
			SRCLST_saveList($sourcename, trim($sourcelist), trim($sourcedescr), $distr, $release);
			SRCLST_saveArchitectures($sourcename, $checkedArchs);
			CAPTURE_captureAll(0,"Edit package sources");
		};


	//delete a source list for real
	if (isset($_POST['BUT_deleteReal']))
		{
			SRCLST_delete($sourcename);

			MSG_showInfo($I18N_packageSource_was_deleted);
			echo("<br>");

			$sourcename="";
		};

	if (isset($_POST['BUT_test']))
		{
			if (!empty($sourcename))
				$testResult = SRCLST_checkList($sourcename, $checkedArchs[0]);
			else
				{
					MSG_showInfo($I18N_pleaseSavePackageListBeforeTest);
					$testResult = "";
					echo("<br>");
				};
		}
	else
		$testResult = "";
		
	
	if (!empty($poolName))
		{
			$packageList = $_POST['TA_packageList'];
			$firstClient = $_POST['SEL_clientName'];
			$clientArr = CLIENT_getNamesWithPackages();
			$firstClient = $_POST['SEL_clientName'];
			$packageListsArr = CLIENT_getNamesWithPackages(true);

	
			//add packages from client
			if (isset($_POST['BUT_addFromClient']))
				$packageList.=" ".PKG_getClientPackages($firstClient, "", false, DEBPKGSTAT_installed);

			$firstPackageList=$_POST['ED_packageSourceName'];
			if (empty($firstPackageList))
				$firstPackageList=$_POST['SEL_packageListName'];

			//load packages list from DB
			if (isset($_POST['BUT_loadPackagesList']) || isset($_POST['BUT_addPackagesList']))
				{
					$packageListName=$_POST['SEL_packageListName'];
					
					if ($packageListName == "basepackages_$release")
						{
							include_once("/m23/inc/distr/$distr/packages.php");
							if (function_exists(PKG_getDebootStrapBasePackages))
								$packageListNew = PKG_getDebootStrapBasePackages($release);
						}
					else
						$packageListNew = PKG_loadPackagesList($packageListName,false);
						
					if (isset($_POST['BUT_addPackagesList']))
						$packageList .= $packageListNew;
					else
						$packageList = $packageListNew;

					$firstPackageList = $packageListName;
				};

			//sort list and make packages unique
			$packageListArr=array_unique (explode(" ",$packageList));
			sort($packageListArr);
			$packageList=implode(" ", $packageListArr);

			//save current packages list
			if (isset($_POST['BUT_savePackagesList']))
				PKG_savePackagesList($firstPackageList,$packageList);

			if (isset($_POST['BUT_deletePackagesList']))
				{
					PKG_deletePackagesList($_POST['SEL_packageListName']);
					if ($_POST['SEL_packageListName'] == $firstPackageList)
						$packageList="";

					$firstPackageList=false;
					$packageListsArr=CLIENT_getNamesWithPackages(true);
				};
		};

	//generate code for displaying the result of the package update
	if (strlen($testResult) > 0)
		$testResultHTML="
		<tr>
			<td colspan=\"2\">
				<hr>
				<span class=\"titlesmal\">
					<center>
						$I18N_test_result
					</center>
				</span>
				<br><br>
				$testResult
			</td>
		</tr>";
	else
		$testResultHTML="";

HTML_showTableHeader();

if (!isset($_POST['BUT_delete']))
{
	if ($showSupportedUserInterfacesList)
		$showSupportedUserInterfacesListHTML ="
		<tr>
			<td colspan=\"2\">
				".DISTR_getDesktopsCBList($distr,$selectedDesktops)."
			</td>
		</tr>
		";
	else
		$showSupportedUserInterfacesListHTML = '';

	//normal mode: edit, load, save the package sources
	echo("
		<tr>
			<td colspan=\"2\">
				<span class=\"titlesmal\">
					$I18N_packageSourceName: $sourcename
				</span>
			</td>
		</tr>
		<tr>
			<td valign=\"top\">
				<textarea name=\"sourcelist\" cols=\"75\" rows=\"30\">$sourcelist</textarea>
			</td>
			<td valign=\"top\">
					<span class=\"subhighlight\">$I18N_packageSourceName</span><br>
					".SRCLST_genSelection("SEL_name", $sourcename, "*")."
					<br><br>

					<input type=\"submit\" name=\"BUT_load\" value=\"$I18N_load\">
					<input type=\"submit\" name=\"BUT_delete\" value=\"$I18N_delete\">
<br><br>
<span class=\"subhighlight\">$I18N_distribution</span>
					<br>
					".DISTR_DistributionsSelections("distr",$distr)."
					<input type=\"submit\" name=\"BUT_refresh\" value=\"$I18N_select\"><br>");
					
					if (!empty($distr))
						{
							include_once("/m23/inc/distr/$distr/clientConfig.php");
							if (function_exists("$CLCFG_listReleases"))
								echo("<br><span class=\"subhighlight\">$I18N_release</span><br>".$CLCFG_listReleases("release",$release));
							else
								$release="";
						};

					echo("<br><br>
<span class=\"subhighlight\">$I18N_arch</span>".MUL_archs."<br><br>
<span class=\"subhighlight\">$I18N_packageSourceName</span><br>

					<input type=\"text\" name=\"ED_name\" size=\"20\" maxlength=\"100\" value=\"$sourcename\">
					<br><br>

<span class=\"subhighlight\">$I18N_description</span><br>
					<textarea name=\"sourcedescr\" cols=\"20\" rows=\"5\">
$sourcedescr
</textarea>
					<br><br>
					<input type=\"submit\" name=\"BUT_save\" value=\"$I18N_save\">
					<input type=\"submit\" name=\"BUT_test\" value=\"$I18N_test_it\">


				</center>

			</td>
		</tr>
		$showSupportedUserInterfacesListHTML
		$testResultHTML
");
}
else
	//delete the package source
{
	$sourcelist=SRCLST_loadSourceListFromDB($sourcename);
	$sourcedescr=SRCLST_getDescription($sourcename);

	//Re-include to set the correct variable in $I18N_should_packageSource_be_deleted
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	echo("
		<tr>
			<td>
				<br>
				<center>
					$I18N_should_packageSource_be_deleted<br>
				</center>
			</td>
		</tr>

		<tr><td><hr></td></tr>

		<tr>
			<td>
			<center>
				<span class=\"subhighlight\">$I18N_description</span>
			</center>
			<br>
			".nl2br($sourcedescr)."
			</td>
		</tr>

		<tr><td><hr></td></tr>

		<tr>
			<td>
			<center>
				<span class=\"subhighlight\">$I18N_packageSources</span>
			</center>
			<br>
			".nl2br($sourcelist)."
			</td>
		</tr>

		<tr><td><hr></td></tr>

		<tr>
			<td>
				<br>
				<center>
					<input type=\"hidden\" name=\"SEL_name\" value=\"$sourcename\">
					<input type=\"submit\" name=\"BUT_deleteReal\" value=\"$I18N_yes\">
					<input type=\"submit\" name=\"BUT_deleteCancel\" value=\"$I18N_no\">
				</center>
			</td>
		</tr>


	");
}
echo("<input type=\"hidden\" name=\"sourcename\" value=\"$sourcename\">");

if (!empty($poolName))
{
	echo("<tr><td colspan=\"2\"><hr><td></tr>
	<tr>
	<td colspan=\"3\"><span class=\"titlesmal\">$I18N_packageList: </span></td>
	</tr>
	<tr>
		<td valign=\"top\">
			<textarea cols=\"70\" rows=\"17\" name=\"TA_packageList\">$packageList</textarea>
		</td>
		<td valign=\"top\">
			<span class=\"subhighlight\">$I18N_packageList</span><br>
			".HTML_listSelection("SEL_packageListName",$packageListsArr,$firstPackageList)."
			<br><br>

			<center>
			<input type=\"submit\" name=\"BUT_loadPackagesList\" value=\"$I18N_load\">
			<input type=\"submit\" name=\"BUT_addPackagesList\" value=\"$I18N_add\"><br>
			<input type=\"submit\" name=\"BUT_deletePackagesList\" value=\"$I18N_delete\"><br><br>
			</center>
			
			<span class=\"subhighlight\">$I18N_packageList</span><br>
			<INPUT type=\"text\" name=\"ED_packageSourceName\" size=\"20\" maxlength=\"75\" value=\"$firstPackageList\"><br>
			<input type=\"submit\" name=\"BUT_savePackagesList\" value=\"$I18N_save\"><br><br>
			
			<span class=\"subhighlight\">$I18N_addPackagesFromClient</span><br>
			".HTML_listSelection("SEL_clientName",$clientArr,$firstClient)."<br>
			<input type=\"submit\" name=\"BUT_addFromClient\" value=\"$I18N_add\"><br><br>
			
			<INPUT type=\"checkbox\" name=\"CB_downloadBasePackages\" value=\"yes\" checked>$I18N_downloadBasePackages<br>
		</td>
	</tr>
	<tr>
		<td colspan=\"2\" align=\"center\">
			<input type=\"submit\" name=\"BUT_step3\" value=\"$I18N_nextStep (".$I18N_poolStep["3download"].")\">
		</td>
	</tr>
	");
};

HTML_showTableEnd();
}





/**
**name SRCLST_getListnames($distr)
**description Returns an array that contains all sourceslist names
**parameter distr: the distribution the sources list is for or "*" for all distributions
**/
function SRCLST_getListnames($distr)
{
	$out = array();
	$result = SRCLST_querySourceslists($distr);

	$i=0;

	while ($line=mysqli_fetch_row($result))
		$out[$i++] = $line[0];

	return($out);
};





/**
**name SRCLST_cleanList($list)
**description Returns an array with all lines of the sources list that contain Debian sources
**parameter list: the contents of the sources list
**/
function SRCLST_cleanList($list)
{
	$out = '';
	$i=0;
	$lines=explode("\n",$list);

	foreach ($lines as $line)
	{
		$line=trim($line);
		if (!empty($line) && (strpos($line,"#")!=0 || strpos($line,"#")===false))
			$out[$i++]=$line;
	}
	return($out);
};





/**
**name SRCLST_matchList($distr,$search)
**description Returns the name of the sources list that matches the searched sources list contents for the distribution or false
**parameter distr: the distribution to search the name of the sources list under
**parameter search: the contents of the sources list to search
**/
function SRCLST_matchList($distr,$search)
{
	$listNames=SRCLST_getListnames($distr);

	$search=SRCLST_cleanList($search);
	$samount=count($search);
	
	$found=false;

	foreach ($listNames as $listName)
	{
		$list=SRCLST_loadSourceListFromDB($listName);
		$list=SRCLST_cleanList($list);
		$lamount=count($list);

		if ($lamount != $samount)
			continue;

		$found=true;
		foreach ($search as $line)
		{
			if (!in_array($line,$list))
				{
					$found=false;
					break;
				}
		};

		if ($found)
			return($listName);
	};
	return(false);
}





/**
**name SRCLST_possiblem23debsMirrors()
**description Returns an array with mirrors for m23 debs.
**returns Array with mirrors for m23 debs.
**/
function SRCLST_possiblem23debsMirrors()
{
	return(array(
/*	'http://downloads.sourceforge.net/project/m23/m23debs',
	'http://vorboss.dl.sourceforge.net/project/m23/m23debs',
	'http://netcologne.dl.sourceforge.net/project/m23/m23debs',
	'http://heanet.dl.sourceforge.net/project/m23/m23debs',*/
	'http://m23debs.goos-habermann.de'
	));
}





/**
**name SRCLST_checkm23debsMirror($url)
**description Checks, if the url contains a valid mirror for m23debs.
**parameter url: URL of the (possible) m23debs mirror.
**returns true, if the url contains a valid mirror for m23debs, otherwise false.
**/
function SRCLST_checkm23debsMirror($url)
{
	// Gets the contents of the Packages file from the url
	$contentPackages = HELPER_getContentFromURL("$url/Packages");

	// Gets the contents of the InRelease file from the url
	$contentInRelease = HELPER_getContentFromURL("$url/InRelease");

	// Check, if Packages and InRelease contain valid lines
	return((strpos($contentPackages,'Package: m23-initscripts') !== false) &&
		   (strpos($contentInRelease,'Origin: m23') !== false));
}





/**
**name SRCLST_getWorkingm23debsMirror()
**description Get the url of a working m23debs mirror.
**returns Url to a working m23debs mirror or false, if none could be found.
**/
function SRCLST_getWorkingm23debsMirror()
{
	foreach (SRCLST_possiblem23debsMirrors() as $url)
	{
		if (SRCLST_checkm23debsMirror($url))
			return($url);
	}
	return(false);
}

?>
