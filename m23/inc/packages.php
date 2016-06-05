<?PHP
/*$mdocInfo
Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
Description: basic package operations (search, add,...)
$*/





/**
**name PKG_addHSUser($client, $login, $firstpw, $uid = '', $gid = '')
**description Adds a job for creating an user on a halfSister client.
**parameter client: Name of the client.
**parameter login: Login name of the new user.
**parameter firstpw: Password for the new user.
**parameter uid: Optional user ID of the new user.
**parameter gid: Optional group ID of the new user.
**/
function PKG_addHSUser($client, $login, $firstpw, $uid = '', $gid = '')
{
	$accountInfo['login'] = $login;
	$accountInfo['firstpw'] = $firstpw;
	$accountInfo['uid'] = $uid;
	$accountInfo['gid'] = $gid;

	PKG_addJob($client, 'm23AddUser',PKG_getSpecialPackagePriority('m23AddUser'),serialize($accountInfo));
}





/**
**name PKG_addUbuntuUser($client, $login, $firstpw, $uid = '', $gid = '')
**description Adds a job for creating an user on a Ubuntu client.
**parameter client: Name of the client.
**parameter login: Login name of the new user.
**parameter firstpw: Password for the new user.
**parameter uid: Optional user ID of the new user.
**parameter gid: Optional group ID of the new user.
**/
function PKG_addUbuntuUser($client, $login, $firstpw, $uid = '', $gid = '')
{
	$groups = DISTR_getUbuntuUserGroups();
	PKG_addUser($client, $login, $firstpw, $groups);
}





/**
**name PKG_addDebianUser($client, $login, $firstpw, $uid = '', $gid = '')
**description Adds a job for creating an user on a Debian client.
**parameter client: Name of the client.
**parameter login: Login name of the new user.
**parameter firstpw: Password for the new user.
**parameter uid: Optional user ID of the new user.
**parameter gid: Optional group ID of the new user.
**/
function PKG_addDebianUser($client, $login, $firstpw, $uid = '', $gid = '')
{
	$groups = DISTR_getDebianUserGroups();
	PKG_addUser($client, $login, $firstpw, $groups);
}





/**
**name PKG_addUser($client, $login, $firstpw, $groups, $uid = '', $gid = '')
**description Adds a job for creating an user on the client.
**parameter client: Name of the client.
**parameter login: Login name of the new user.
**parameter firstpw: Password for the new user.
**parameter groups: Array of groups the user should be added.
**parameter uid: Optional user ID of the new user.
**parameter gid: Optional group ID of the new user.
**/
function PKG_addUser($client, $login, $firstpw, $groups, $uid = '', $gid = '')
{
	if (!is_array($groups) || !sort($groups))
		exit('ERROR: PKG_addUser: $groups not an array OR cannot be sorted.');

	$accountInfo['groups']= $groups;
	$accountInfo['login'] = $login;
	$accountInfo['firstpw'] = $firstpw;
	$accountInfo['uid'] = $uid;
	$accountInfo['gid'] = $gid;

	PKG_addJob($client, 'm23AddUser',PKG_getSpecialPackagePriority('m23AddUser'),serialize($accountInfo));
}





/**
**name PKG_cleanPackageLine(&$packageLine)
**description Removes unwanted characters from a line containing package names and makes sure that there is only one line without line breaks.
**parameter packageLine: Space seperated line containing the package names. The changed line will be written to the parameter too.
**/
function PKG_cleanPackageLine(&$packageLine)
{
	$packagesA = explode(' ', $packageLine);

	//Make the entries unique and sort them
	$packagesA = array_unique($packagesA);
	sort($packagesA);
	
	//Trim every package name
	array_walk($packagesA, 'HELPER_trimValue');

	//Convert the packages array back to string
	$packageLine = implode(' ', $packagesA);
}





/**
**name PKG_combinem23normal($packageSelectionName)
**description Combines the package names of multiple entries for m23normal and m23normalRemove jobs in a package selection.
**parameter packageSelectionName: Name of the package selection to optimise.
**/
function PKG_combinem23normal($packageSelectionName)
{
	foreach (array('m23normal', 'm23normalRemove') as $type)
	{
		//Get all packages from package selections that are included as m23normal or m23normalRemove
		$res = db_query("SELECT priority, normalPackage FROM `recommendpackages` WHERE `name`='$packageSelectionName' AND `package`='$type'");
	
		$packagesPriorityA = array();

		//Create strings containing all packages saved under the priority as key
		while ($line = mysqli_fetch_array($res))
			$packagesPriorityA[$line['priority']] .= trim($line['normalPackage']).' ';

		//Run thru the package strings by priority
		foreach ($packagesPriorityA as $priority => $packages)
		{
			//Convert the package string to array
			$packagesA = explode(' ', $packages);

			//Make the entries unique and sort them
			$packagesA = array_unique($packagesA);
			sort($packagesA);

			//Convert the packages array back to string
			$packagesStr = implode(' ', $packagesA);

			//Delete the old entries
			db_query("DELETE FROM `recommendpackages` WHERE `priority`='$priority' AND `package`='$type' AND `name`='$packageSelectionName'");

			//Insert a combined entry
			db_query("INSERT INTO recommendpackages (name,package,priority,normalPackage) VALUES ('$packageSelectionName', '$type', '$priority', '$packagesStr')");
		}
	}
}





/**
**name PKG_importSelectedPackagesFromFile($client, $file)
**description Imports space-seperated packages from a file and adds them to the wait4acc/selected packages of a client.
**parameter client: Name of the client or empty.
**parameter file: Name of the file with full path containing space-seperated packages.
**/
function PKG_importSelectedPackagesFromFile($client, $file)
{
	CHECK_FW(CC_clientOrEmpty, $client);
	if (!file_exists($file))
		return(false);

	//Get the space-seperated packages from the file and generate an array
	$packages = explode(' ',file_get_contents($file));

	//Run thru the packages
	foreach ($packages as $package)
	{
		CHECK_FW(CC_package, $package);
	
		$sqlInsert = "INSERT INTO `clientjobs` (`client` , `package` , `priority` , `status` , `params` , `normalPackage` , `installedSize`) VALUES ('$client', 'm23normal', 25, 'wait4acc', '', '$package', 0)";

		DB_query($sqlInsert);
	}
	return(true);
};





/**
**name PKG_exportSelectedPackages($client)
**description Exports the wait4acc/selected packages of a client.
**parameter client: Name of the client or empty.
**/
function PKG_exportSelectedPackages($client)
{
	CHECK_FW(CC_clientOrEmpty, $client);
	$out = '';
	$sql = "SELECT package,params,normalPackage,id,installedSize,priority FROM `clientjobs` WHERE client='$client' AND status='wait4acc' ORDER BY package, normalPackage";
	$result = DB_query($sql); //FW ok

	while ($line = mysqli_fetch_array($result))
	{
		if (isset($line['normalPackage']{0}))
			$out .= $line['normalPackage'].' ';
	}

	return(rtrim($out));
};





/**
**name PKG_getDebootstrapCacheFilename($release, $arch)
**description Returns the file name of the debootstrap cache file (without path).
**parameter release: Select the Debian/Ubuntu suite (squeeze, sarge, sid, precise).
**parameter arch: the computer architecture of the client
**returns The file name of the debootstrap cache file (without path).
**/
function PKG_getDebootstrapCacheFilename($release, $arch)
{
	return("$release-$arch.tar.7z");
}





/**
**name PKG_getDebootstrapCacheSfURL($release, $arch)
**description Returns the URL to the debootstrap cache file on the SourceForge server.
**parameter release: Select the Debian/Ubuntu suite (squeeze, sarge, sid, precise).
**parameter arch: the computer architecture of the client
**returns The URL to the debootstrap cache file on the SourceForge server.
**/
function PKG_getDebootstrapCacheSfURL($release, $arch)
{
	$debootstrapCacheFile = PKG_getDebootstrapCacheFilename($release, $arch);
	
	$sfURL = "http://sourceforge.net/projects/m23/files/baseSys/$debootstrapCacheFile/download";

	// Checks, if the downloaded file begins with 7z (to indicate a 7-Zip file)
	if (HELPER_getContentFromURL($sfURL, '0-1') == '7z')
		return($sfURL);
	else
		// Otherwise return an alternate mirror
		return("http://basesys.goos-habermann.de/$debootstrapCacheFile");
}





/**
**name PKG_baseSysDownloadedCompletelyTom23Server($release, $arch)
**description Checks, if the debootstrap cache file was downloaded completely to the m23 server.
**parameter release: Select the Debian/Ubuntu suite (squeeze, sarge, sid, precise).
**parameter arch: the computer architecture of the client
**returns true, on complete download otherwise false.
**/
function PKG_baseSysDownloadedCompletelyTom23Server($release, $arch)
{
	$debootstrapCacheFile = PKG_getDebootstrapCacheServerFile($release, $arch);
	$debootstrapCacheFileTemp = "$debootstrapCacheFile.tmp";

	return(file_exists($debootstrapCacheFile) && !file_exists($debootstrapCacheFileTemp));
}





/**
**name PKG_downloadBaseSysTom23Server($release, $arch)
**description Downloads the debootstrap cache file to the m23 server and checks its validity (by signature).
**parameter release: Select the Debian/Ubuntu suite (squeeze, sarge, sid, precise).
**parameter arch: the computer architecture of the client
**returns true, if the download is completed, otherwise false.
**/
function PKG_downloadBaseSysTom23Server($release, $arch)
{
	$backgroundJobName = "PKG_downloadBaseSysTom23Server$release";

	// Download in progress
	if (SERVER_runningInBackground($backgroundJobName))
		return(false);

	// No release given (client has no distribution set) => Don't start download and don't block the client partition/format job
	if (empty($release))
		return(true);

	// The debootstrap cache file is on the m23 server
	if (PKG_baseSysDownloadedCompletelyTom23Server($release, $arch))
		return(true);

	// Make sure the GPG sign key is imported
	SERVER_importGPGPackageSignKey();

	// Get the name of the debootstrap cache file, the signature file and the URL to the signature file
	$debootstrapCacheFile = PKG_getDebootstrapCacheFilename($release, $arch);
	$debootstrapCacheFileTemp = "$debootstrapCacheFile.tmp";
	$debootstrapCacheSignFile = "$debootstrapCacheFile.sig";
	$debootstrapCacheSignFileURL = "http://basesys.goos-habermann.de/$debootstrapCacheSignFile";

	// Download URL for the debootstrap cache file
	$debootstrapCacheFileURL = PKG_getDebootstrapCacheSfURL($release, $arch);

	// Download the signature file and check the debootstrap cache file
	SERVER_runInBackground($backgroundJobName, "
	cd /m23/data+scripts/packages/baseSys
	
	# Download the debootstrap cache file to a temporary file name
	wget -qq -c $debootstrapCacheFileURL -O $debootstrapCacheFileTemp

	# Get the signature file
	wget -qq $debootstrapCacheSignFileURL -O $debootstrapCacheSignFile

	# Check, if the debootstrap cache file is valid
	gpg --verify $debootstrapCacheSignFile $debootstrapCacheFileTemp 2> /dev/null

	# Rename the temporary debootstrap cache file to its normal name, if valid or delete it
	if [ $? -eq 0 ]
	then
		mv $debootstrapCacheFileTemp $debootstrapCacheFile
		chmod 755 $debootstrapCacheFile
	else
		rm $debootstrapCacheFileTemp
	fi
	");

	return(false);
}







/**
**name PKG_getDebootstrapCacheServerURL($release, $arch)
**description Returns the URL to the debootstrap cache file on the m23 server.
**parameter release: Select the Debian/Ubuntu suite (squeeze, sarge, sid, precise).
**parameter arch: the computer architecture of the client
**returns The URL to the debootstrap cache file on the m23 server.
**/
function PKG_getDebootstrapCacheServerURL($release, $arch)
{
	$serverIP = getServerIP();
	$debootstrapCacheFile = PKG_getDebootstrapCacheFilename($release, $arch);
	return("http://$serverIP/packages/baseSys/$debootstrapCacheFile");
}





/**
**name PKG_getDebootstrapCacheServerFile($release, $arch)
**description Returns the full path to the debootstrap cache file on the m23 server.
**parameter release: Select the Debian/Ubuntu suite (squeeze, sarge, sid, precise).
**parameter arch: the computer architecture of the client
**returns The full path to the debootstrap cache file on the m23 server.
**/
function PKG_getDebootstrapCacheServerFile($release, $arch)
{
	$debootstrapCacheFile = PKG_getDebootstrapCacheFilename($release, $arch);
	return("/m23/data+scripts/packages/baseSys/$debootstrapCacheFile");
}





/**
**name PKG_isReconfiguredWithExtraDistr($pkgID)
**description Checks, if the distribution is used for configuring a system that was installed via image.
**parameter pkgID: The ID of the base installation package.
**returns True, if the distribution is used for configuring, otherwise false.
**/
function PKG_isReconfiguredWithExtraDistr($pkgID)
{
	$pkgParams = PKG_getPackageParams($pkgID);
	return(!(strpos($pkgParams,"#extraDistr=")==false));
}





/**
**name PKG_translateClientjobsStatus($status)
**description Translates the clientjobs status from the DB into a human readable form.
**parameter status: Status code from the DB.
**returns Human readable translation of the clientjobs status.
**/
function PKG_translateClientjobsStatus($status)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$trans['done'] = $I18N_done;
	$trans['waiting'] = $I18N_waiting;
	$trans['wait4acc'] = $I18N_preselected;
	$trans['error'] = $I18N_error;

	return($trans[$status]);
}





/**
**name PKG_isSpecialPackageAvailableForClient($client, $package)
**description Checks if a special package is available for the client's distribution.
**parameter client: Name of the client.
**parameter package: Name of the special package.
**returns True if the special package is available otherwise false.
**/
function PKG_isSpecialPackageAvailableForClient($client, $package)
{
	return (PKG_getSpecialPackageInfo($package,'Priority',CLIENT_getDistribution($client)) === false ? false : true);
}





/**
**name PKG_OptionPageHeader2($title)
**description Starts the option page for debconf settings with all necessary options.
**parameter title: the window title of the OptionPage
**/
function PKG_OptionPageHeader2($title)
{
	include_once('/m23/inc/db.php');

	//Store language, package ID, client name and package name
	$GLOBALS["m23_language"] = (isset($_GET['lang']) ? $_GET['lang'] : $_POST['lang']);
	$id = (isset($_GET['id']) ? $_GET['id'] : $_POST['id']);
	$GLOBALS['client'] = $client = (isset($_GET['client']) ? $_GET['client'] : $_POST['client']);
	$GLOBALS['package'] = $title;

	include_once('/m23/inc/preferences.php');
	include_once('/m23/inc/html.php');
	include_once('/m23/inc/client.php');

	dbConnect();

	//Write HTML page header and title
	echo("
	<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
	<html>
	<head>
	<title>$title</title>
	<link rel=\"stylesheet\" type=\"text/css\" href=\"/m23admin/css/index.css\">
	</head>
	<body bgcolor=\"#FFFFFF\">
	<center>
		<span class=\"title\"\">$title</span>
	</center>
	<br><br>\n");

	HTML_showTableHeader(true);

	//Start a new form (not using HTML_showFormHeader because it would redirect to index.php)
	echo("
		<form method=\"post\">
		<input type=\"hidden\" name=\"id\" value=\"$id\">
		<input type=\"hidden\" name=\"client\" value=\"$client\">
		<input type=\"hidden\" name=\"lang\" value=\"".$GLOBALS["m23_language"]."\">
		");
};





/**
**name PKG_OptionPageTail2($elem)
**description Generates the bottom of the OptionPage for debconf settings.
**parameter elem: The elements (variable name, type (string, boolean, (multi)select), default value, description) of the debconf templates.
**/
function PKG_OptionPageTail2($elem)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$debconf = PKG_OptionPageRender2($elem, $GLOBALS['client'], $GLOBALS['package']);
	
	if (HTML_submit("BUT_saveDebconf",$I18N_save))
		CLIENT_setDebconfDB($GLOBALS['client'], $GLOBALS['package'], $debconf);
		
	HTML_showTableRow("",BUT_saveDebconf,"");

	HTML_showTableEnd(true);
	HTML_showFormEnd();

	echo("
	</body>
	</html>");
};





/**
**name PKG_decodeDebconfDescription($descr, &$title)
**description Decodes and HTML-formats the description of a debconf template and extracts its title.
**parameter descr: Text of the debconf description.
**parameter title: Variable to write the title to.
**returns: The decoded and HTML-formated description.
**/
function PKG_decodeDebconfDescription($descr, &$title)
{
	//Split the utf8 decoded description into an array
	$tmp = explode("\n",utf8_decode($descr));

	//The first line is the title
	$title = "<span class=\"title\"\">$tmp[0]</span>";

	//Start a new paragraph
	$out = "<p>";

	for ($i = 1; $i < count($tmp); $i++)
	{
		//Lines starting with " ." indicate a new paragraph => Close the old paragraph and open a new
		if ($tmp[$i] == " .")
			$out .= "</p>\n<p>";
		else
		//Other lines are normal text => Just add them
			$out .= $tmp[$i];
	}

	//Close the last paragraph
	$out .= "</p>";

	return($out);
}





/**
**name PKG_OptionPageRender2($layout, $client, $package)
**description Renderes the layout of an OptionPage for debconf and stored the debconf settings into the DB.
**parameter layout: The elements (variable name, type (string, boolean, (multi)select), default value, description) of the debconf templates.
**parameter client: The name of the client, the debconf settings should be stored for.
**parameter package: Name of the package, the debconf settings should be stored for.
**/
function PKG_OptionPageRender2($layout, $client, $package)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Language code to add to the variables
	$langAdd = ($GLOBALS["m23_language"] == "en" ? "" : $GLOBALS["m23_language"]);

	foreach (array_keys($layout) as $var)
	{
		//Get the description by language or if there is no translation in the default language.
		if (isset($layout[$var]["description$langAdd"]{1}))
			$description = PKG_decodeDebconfDescription($layout[$var]["description$langAdd"],$title);
		else
			$description = PKG_decodeDebconfDescription($layout[$var]["description"],$title);


		//Clean the choices from the last run
		$selection = array();


		//Prepare selection array with choices for (multi)selection
		if (($layout[$var]['type'] == "select") || ($layout[$var]['type'] == "multiselect"))
		{
			//Generate a name for the HTML element
			$htmlName = "SEL_".urlencode($var);

			//Create the choices array
			for ($i = 1 ; $i <= count($layout[$var]['choices']); $i++)
			{
				//Add the choices to the array with the default language answers as keys
				$selection[$layout[$var]['choices'][$i]] = 
				//Check if there is 
					utf8_decode((isset($layout[$var]["choices$langAdd"][$i]) ? $layout[$var]["choices$langAdd"][$i] : $layout[$var]["choices"][$i]));
			}
		}


		//Try to get the default value from the debconf DB
		if (($default = CLIENT_getDebconfDBValue($client, $package, $var)) === NULL)
			$default = utf8_decode($layout[$var]['default']);


		//If the value is for a multiselect template => Create an array with it
		if  ($layout[$var]['type'] == "multiselect")
			$default = explode(', ', $default);

		//Store the type of the element: Needed for showing the debconf via CLIENT_getDebconfDB
		$debconf[$var]['type'] = $layout[$var]['type'];

		//Show the HTML elements by type
		switch($layout[$var]['type'])
		{
			case "select":
				{
					$debconf[$var]['val'] = HTML_selection($htmlName, $selection, SELTYPE_selection, true, $default);
					HTML_showTableRow($title."<br>".constant($htmlName),"&nbsp;&nbsp;",$description);
					break;
				}

			case "multiselect":
				{
					echo("<tr>
							<td>$title<br>");
							$checkedElements = HTML_multiCheckBoxShow($selection, $default);

							//Only generate the string containing the checked values, if there are values
							$debconf[$var]['val'] = (is_array($checkedElements) ? implode(', ',$checkedElements) : "");
					echo("	</td>
							<td>
								&nbsp;&nbsp;
							</td>
							<td>
								$description
							</td>
							</tr>");
					break;
				}

			case "boolean":
				{
					//Generate a name for the HTML element
					$htmlName = "SEL_".urlencode($var);

					//Generate yes/no selection
					$selection['true'] = $I18N_yes;
					$selection['false'] = $I18N_no;
					$debconf[$var]['val'] = HTML_selection($htmlName, $selection, SELTYPE_selection, true, $default);
					HTML_showTableRow($title."<br>".constant($htmlName),"&nbsp;&nbsp;",$description);
					break;
				}

			case "string":
			case "password":
				{
					//Generate a name for the HTML element
					$htmlName = "ED_".urlencode($var);

					$debconf[$var]['val'] = HTML_input($htmlName, $default, 50);
					HTML_showTableRow($title."<br>".constant($htmlName),"&nbsp;&nbsp;",$description);
					break;
				}
				
			default:
				{
					//Remove entries form not supported type (e.g. "title")
					unset($debconf[$var]);
				}
		}
	}

	return($debconf);
};





/**
**name PKG_countSpecialPackages($clientName,$packageName)
**description counts the special packages of a clients matching the package name and status
**parameter clientName: name of the client 
**parameter packageName: name of the special package
**parameter status: status of the package
**/
function PKG_countSpecialPackages($client,$package,$status)
{
	CHECK_FW(CC_clientname, $client, CC_package, $package, CC_jobstatus, $status);
	$sql="SELECT count(*) FROM `clientjobs` WHERE client=\"$client\" AND package=\"$package\" AND status=\"$status\"";

	$result=DB_query($sql); //FW ok

	$line=mysqli_fetch_row($result);

	return($line[0]);
};





/**
**name PKG_countWaitingJobs($client,$package)
**description returns the amount of a special waiting package
**parameter client: name of the client
**parameter package: name of the package you want to know the amount
**/
function PKG_countWaitingJobs($client,$package)
{
	return(PKG_countSpecialPackages($client,$package,"waiting"));
};





/**
**name PKG_closeSearch($file)
**description closes a search request
**parameter file: file handle
**/
function PKG_closeSearch($file)
{
pclose($file);
};





/**
**name PKG_getNextPackage($file)
**description fetches the next package
**parameter file: file handle
**/
function PKG_getNextPackage($file)
{
if (feof($file))
	return(FALSE);
	else
	return(fgets($file,10000));
}





/**
**name PKG_listRecommendPackages($key)
**description lists recommended packages matching the key
**parameter key: search key
**parameter install: set to true, if the selection for installing all packages should be first
**/
function PKG_listRecommendPackages($key,$install=true)
{
	CHECK_FW(CC_packageOrEmpty, $key);
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//if search is empty all packages should be selected
	if (empty($key))
	  $key="%";
	else
	  //search key has only to be a part of the package name
	  $key="%$key%";

	HTML_showTableHeader();

	//write table header
	echo ("
		<tr>
			<td><span class=\"subhighlight\">$I18N_package_name</span></td>
			<td><span class=\"subhighlight\">$I18N_size</span></td>
			<td><span class=\"subhighlight\">$I18N_subPackages</span></td>
			<td><span class=\"subhighlight\">$I18N_parameter</span></td>
			<td><span class=\"subhighlight\">$I18N_selected</span></td>
		</tr>
		");

	$sql="SELECT DISTINCT name FROM `recommendpackages` WHERE name LIKE '$key';";

	$result = DB_query($sql); //FW ok

	$i=0;
	//run thru the packages

	while ($line=mysqli_fetch_row($result))
	{
		 $cbName="CB_pkgRecommend".$i;

		 //print the info line
		 echo("
			<tr>
				<td valign=\"top\">".$line[0]."</td>
				<td valign=\"top\">".I18N_number_format((float)PKG_getRecommendPackageAllInstalledSize($line[0])/1024)." MB</td>
				<td valign=\"top\">".PKG_listRecommendSubPackages($line[0],"<br>",$params)."</td>
				<td valign=\"top\">$params</td>
				<td valign=\"top\">
					<input type=\"checkbox\" name=\"$cbName\" value=\"".$line[0]."\">
				</td>
			</tr>");
		 $i++;
	}
	
	if ($install)
		{
			$first="<OPTION value=\"m23normal\">$I18N_install</OPTION>";
			$second="<OPTION value=\"m23normalRemove\">$I18N_deinstall</OPTION>";
		}
	else
		{
			$first="<OPTION value=\"m23normalRemove\">$I18N_deinstall</OPTION>";
			$second="<OPTION value=\"m23normal\">$I18N_install</OPTION>";
		}
	
	echo ("
	<tr>
		<td colspan=\"5\">
		<center>
			$I18N_actionForPackageSelection
			<SELECT name=\"SEL_specialNormalType\" size=\"1\">\n
				$first
				$second
				<OPTION value=\"orig\">$I18N_doNotChange</OPTION>
			</SELECT>
		</center>
		</td>
	</tr>
	");

	HTML_showTableEnd();

	return($i);
};





/**
**name PKG_listRecommendSubPackages($package,$cut,&$params)
**description returnes subpackages of a package
**parameter cut: cuts the packages by $cut
**parameter params: variable to write package names to
**/
function PKG_listRecommendSubPackages($package,$cut,&$params)
{
	CHECK_FW(CC_package,$package);
	$sql="SELECT package,params,normalPackage FROM `recommendpackages` WHERE name='$package' ORDER BY package, normalPackage;";

	$result = DB_query($sql); //FW ok

	$i=0;
	$out="";
	$params="";
	//run thru the sub packages
	while ($line=mysqli_fetch_row($result))
		{//add new sub package to out divided by $cut
			if (($line[0] == "m23normal") || ($line[0] == "m23normalRemove"))
				//take packagename from normalPackage
				$out.=$line[2].$cut;
			else
				//take packagename from package
				$out.=$line[0].$cut;

			$paramsInfo = PKG_listParams($line[1]);

			$paramsLineCount = substr_count($paramsInfo, "<br>");

			if ($paramsLineCount > 1)
				$out.=str_repeat ($cut, $paramsLineCount-1);

		$params.=$paramsInfo.$cut;
		};
	return($out);
};





/**
**name PKG_addRecommendPackages($amount,$client,$normalPackageType2,$distr)
**description adds recommeded packages to db
**parameter amount: amount of selected packages
**parameter client: name of client to install packages on
**parameter normalPackageType2: m23normal, m23normalRemove or orig: select if the packages should be (de)installed or use the saved action
**parameter distr: Name of the distribution.
**/
function PKG_addRecommendPackages($amount,$client,$normalPackageType2,$distr)
{
$count=0;

for ($i=0; $i < $amount; $i++)
	{
	 $var="CB_pkgRecommend".$i;

	//$_POST[$var] contains the name of the package selection
	if (!empty($_POST[$var]))
		{
			$count=PKG_addPackageSelection($client,$_POST[$var],$normalPackageType2, $distr);
		};
	}

	return($counter);
};





/**
**name PKG_addPackageSelection($client,$packageSelectionName,$normalPackageType2,$distr)
**description Adds a package selections to the list of packages to install.
**parameter client: name of client to install packages on
**parameter packageSelectionName: Name of the package selection to install.
**parameter normalPackageType2: m23normal, m23normalRemove or orig: select if the packages should be (de)installed or use the saved action
**parameter distr: Name of the distribution.
**/
function PKG_addPackageSelection($client,$packageSelectionName,$normalPackageType2,$distr)
{
	CHECK_FW(CC_packageselectionname, $packageSelectionName);
	$count=0;

	$sql="SELECT package, priority, params, normalPackage, installedSize, priority FROM `recommendpackages` WHERE name='".$packageSelectionName."'";

	$result = DB_query($sql); //FW ok

	while ($line=mysqli_fetch_assoc($result))
	{

		if (($line['package']=='m23normal') ||
			($line['package']=='m23normalRemove'))
		{
			if ($normalPackageType2=="orig")
				$normalPackageType=$line['package'];
			else
				$normalPackageType=$normalPackageType2;

			CHECK_FW(CC_package, $normalPackageType, CC_clientname, $client);
			//get old packages
			$sqlDelete = "SELECT id FROM `clientjobs` WHERE normalPackage='".$line['normalPackage']."' AND package='$normalPackageType' AND client='$client' AND status='wait4acc'";

			$resultDelete = DB_query($sqlDelete); //FW ok

			$lineDelete = mysqli_fetch_row($resultDelete);

			//if there is one, delete it
			if (strlen($lineDelete[0]) > 0)
				{
					$sqlDelete = "DELETE FROM `clientjobs` WHERE id='".$lineDelete[0]."'";
					DB_query($sqlDelete); //FW ok
				};

			CHECK_FW(CC_package, $normalPackageType, CC_clientname, $client);

			// Split normal package lines, that may contain multiple package names
			foreach (explode(' ', $line['normalPackage']) as $normalPackage)
			{
				if (empty($normalPackage)) continue;

				$sqlInsert = "INSERT INTO `clientjobs` (`client` , `package` , `priority` , `status` , `params` , `normalPackage` , `installedSize`) VALUES ('$client', '$normalPackageType', '".$line['priority']."','wait4acc', '".$line['params']."', '$normalPackage', '".$line['installedSize']."')";

				DB_query($sqlInsert);

				//add sub packages as param string to a m23normal package
				//PKG_addNormalPackagesToWait4Aac($client,25,$params[$p]);
				$count++;
			}

		}
		else
		{
			if (strlen($line['package']) > 0)
				{
					PKG_addSpecialPackagesToWait4Aac($client,$line['package'],$line['params'],$distr);
					$count++;
				}
		};
	};

	return($count);
};





/**
**name PKG_addNormalPackagesToWait4Aac($client,$priority,$params)
**description adds a package to waiting 4 accept status
**parameter client: name of client to install packages on
**parameter priority: priority of the package
**parameter params: parameter for installing the package
**/
function PKG_addNormalPackagesToWait4Aac($client,$priority,$params)
{
	PKG_addWait4AccJob($client,"m23normal",$priority,$params);
};





/**
**name PKG_addSpecialPackagesToWait4Aac($client,$package,$params,$distr)
**description adds a special package to waiting 4 accepts status
**parameter client: name of client to install packages on
**parameter priority: priority of the package
**parameter params: parameter for installing the package
**parameter distr: Name of the distribution.
**/
function PKG_addSpecialPackagesToWait4Aac($client,$package,$params,$distr)
{
	PKG_addWait4AccJob($client,$package,PKG_getSpecialPackagePriority($package,$distr),$params);
};





/**
**name PKG_countJobsWithStatus($client,$package,$status)
**description Counts named jobs on a client that have a special status.
**parameter client: name of the client
**parameter package: name of the package
**parameter status: The status to search for
**returns The amount of packages on the client with the given status.
**/
function PKG_countJobsWithStatus($client, $package, $status)
{
	CHECK_FW(CC_clientname, $client, CC_package, $package, CC_jobstatus, $status);
	$sql = "SELECT COUNT(*) FROM `clientjobs` WHERE `client` = '$client' AND ( `package` = '$package' OR `normalPackage` = '$package' ) AND `status` = '$status'";

	$result = db_query($sql); //FW ok
	$line = mysqli_fetch_row($result);
	return($line[0]);
}





/**
**name PKG_getClientjobsStatus( $client, $package, $distr, $params, $normalPackage)
**description return the status of a job
**parameter client: name of the client
**parameter package: name of the package
**parameter distr: the name of the distribution
**parameter params: parameter for installing the package
**parameter normalPackage: the name of a normal package
**/
function PKG_getClientjobsStatus($client,$package,$distr,$params,$normalPackage)
{
	CHECK_FW(CC_clientname, $client, CC_package, $package, CC_nochecknow, $params, CC_package, $normalPackage);
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$sql="SELECT status,id FROM `clientjobs` WHERE client='$client' AND package='$package' OR (params='$params' AND normalPackage='$normalPackage')";	

	$result = db_query($sql); //FW ok
	$line=mysqli_fetch_row($result);

	if (strstr($line[0],"wait4acc"))
		$action=$I18N_preselected;
		
	if (!empty($distr))
		{
			include_once("/m23/inc/distr/$distr/packages.php");
			$status = PKG_translateClientjobsStatus($line[0]);

			$outStatus="$status / $action";
		}
	else
		$outStatus=$action;

	return($outStatus);
};





/**
**name PKG_addNormalPackages($amount,$client)
**description adds normal packages to db
**parameter amount: amount of selected packages
**parameter client: name of client to install packages on
**/
function PKG_addNormalPackages($amount,$client)
{
$count=0;

for ($i=0; $i < $amount; $i++)
	{
		$var="CB_pkg".$i;
		
		if (!empty($_POST[$var]))
			{
				PKG_addNormalPackagesToWait4Aac($client,25,$_POST[$var]);
				$count++;
			}
	}
return($counter);
};





/**
**name PKG_changePrioritySelectedPackages($amount, $client, $newPriority)
**description Changes the priority of selected wait4acc packages.
**parameter amount: amount of selected packages
**parameter client: name of client to install packages on
**parameter newPriority: The new priority to set.
**/
function PKG_changePrioritySelectedPackages($amount, $client, $newPriority)
{
	$count=0;
	$cbTypes = array("CB_rmNormalpkg","CB_rmpkg","CB_rmNormalRemovepkg");

	for ($i=0; $i < $amount; $i++)
	{
		foreach ($cbTypes as $cbType)
		{
			$var=$cbType.$i;
			if (!empty($_POST[$var]))
			{
				DB_query("UPDATE `clientjobs` SET priority = '$newPriority' WHERE client='$client' AND status='wait4acc' AND (((package='m23normal' OR package='m23normalRemove') AND normalPackage='".$_POST[$var]."') OR package='".$_POST[$var]."');");
				$count++;
				break;
			}
		}
	}
	return($counter);
};





/**
**name PKG_rmSelectedPackages($amount,$client)
**description removes normal packages from db
**parameter amount: amount of selected packages
**parameter client: name of client to install packages on
**/
function PKG_rmSelectedPackages($amount,$client)
{
$count=0;
for ($i=0; $i < $amount; $i++)
	{
		$var="CB_rmNormalpkg".$i;
		if (!empty($_POST[$var]))
			{
				PKG_discardNormalJob($client,$_POST[$var]);
				$count++;
			}
		else
			{
				$var="CB_rmpkg".$i;
				if (!empty($_POST[$var]))
					{
						PKG_discardJob($client, $_POST[$var]);
						$count++;
					}
				else
					{
						$var="CB_rmNormalRemovepkg".$i;
						if (!empty($_POST[$var]))
							{
								PKG_discardRemoveJob($client,$_POST[$var]);
								$count++;
							}
					}
			}
	}
return($counter);
};





/**
**name PKG_listSelectedpackages($client)
**description lists the packages with wait4acc status
**parameter client: name of client to install packages on
**parameter distr: the name of the distribution
**parameter release: release of the distribution
**/
function PKG_listSelectedpackages($client,$distr,$release)
{
CHECK_FW(CC_clientname, $client);

include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

HTML_jsCheckboxChanger('JS_checkboxChanger');
HTML_checkboxChangerButtons('BUT_checkboxChanger');

//search for all packages witn status wait4acc
$sql = "SELECT package,params,normalPackage,id,installedSize,priority FROM `clientjobs` WHERE client='$client' AND status='wait4acc' ORDER BY package, normalPackage";
$result = DB_query($sql); //FW ok

echo(JS_checkboxChanger."
	<tr>
		<td></td>
		<td><span class=\"subhighlight\">$I18N_status</span></td>
		<td><span class=\"subhighlight\">$I18N_package_name</span></td>
		<td><span class=\"subhighlight\">$I18N_size</span></td>
		<td><span class=\"subhighlight\">$I18N_parameter</span></td>
		<td><span class=\"subhighlight\">$I18N_options</span></td>
		<td><span class=\"subhighlight\">$I18N_priority</span></td>
		<td>".BUT_checkboxChanger."</td>
	</tr>
	");


$i=0;

$allInstalledSize=0;
$packageAmount=0;

while ($line=mysqli_fetch_row($result))
	{
	 $status=PKG_getClientjobsStatus($client,$line[0],$distr,$line[1],$line[2]);


	 $packageID = $line[3];

		if ($line[0]=="m23normalRemove")
			$allInstalledSize-=$line[4];
		else
			$allInstalledSize+=$line[4];
	 $packageAmount++;
	 $isNormal = false;

	if (($i % 2) == 0)
		$class = 'class="evenrow"';
	else
		$class = 'class="oddrow"';

	if ($line[0]=='m23normal')
		{
			$isNormal = true;
			$cbBaseName="CB_rmNormalpkg";
			$jobImg="<img src=\"/gfx/button_ok-mini.png\" alt=\"$I18N_install\" longdesc=\"$I18N_install\" title=\"$I18N_install\">";
		}
	elseif ($line[0]=='m23normalRemove')
		{
			$isNormal = true;
			$cbBaseName="CB_rmNormalRemovepkg";
			$jobImg="<img src=\"/gfx/button_cancel-mini.png\" alt=\"$I18N_deinstall\" longdesc=\"$I18N_deinstall\" title=\"$I18N_deinstall\">";
		}
	else
		$jobImg="";

	 if ($isNormal)
		{//adds remove line for m23normal + m23normalRemove packages

		 $var=$cbBaseName.$i;
		 echo("
		 	<tr $class>
				<td>$jobImg</td>
				<td valign=\"top\">$status</td>
				<td valign=\"top\"><b>".$line[2]."</b></td>
				<td valign=\"top\">".I18N_number_format((float)$line[4]/1024)." MB</td>
				<td valign=\"top\">".PKG_listParams($line[1])."</td>
				<td valign=\"top\"><CENTER>".PKG_hasOptions($line[2], $packageID, $distr, $client, $release)."</CENTER></td>
				<td valign=\"top\"><CENTER>".$line[5]."</CENTER></b></td>
				<td valign=\"top\"><CENTER><input type=\"checkbox\" name=\"$var\" value=\"".$line[2]."\"></CENTER></td>
			</tr>\n");
		}
	else
		{//adds remove line for other packages
		 $var="CB_rmpkg".$i;
		 echo("
		 	<tr $class>
				<td>$jobImg</td>
				<td valign=\"top\">$status</td>
				<td valign=\"top\"><b>".$line[0]."</b></td>
				<td valign=\"top\">".I18N_number_format((float)$line[4]/1024)." MB</td>
				<td valign=\"top\">".PKG_listParams($line[1])."</td>
				<td valign=\"top\"><CENTER>".PKG_hasOptions($line[0], $packageID, $distr, $client, $release)."</CENTER></td>
				<td valign=\"top\"><CENTER>".$line[5]."</CENTER></b></td>
				<td valign=\"top\"><CENTER><input type=\"checkbox\" name=\"$var\" value=\"".$line[0]."\"></CENTER></td>
			</tr>\n");
		}
	 $i++;
	};
	echo("
		<tr>
			<td colspan=\"7\">
				<hr>
				$I18N_packageAmount: $packageAmount<br>
				$I18N_wholeSize: ".I18N_number_format((float)$allInstalledSize/1024)." MB<br>
			</td>
			<td>
				".BUT_checkboxChanger."
			</td>
		</tr>");
};





/**
**name PKG_countSelectedpackages($client)
**description counts the preselected packages
**parameter client: name of client to install packages on
**/
function PKG_countSelectedpackages($client)
{
	return(PKG_countJobs($client,'wait4acc'));
};





/**
**name PKG_countJobs($client,$status)
**description counts all packages of a client with a given status
**parameter client: name of client
**parameter status: status of the packages to be count or empty to count all jobs
**/
function PKG_countJobs($client,$status)
{
	CHECK_FW(CC_clientname, $client);
	if (!empty($status))
	{
		CHECK_FW(CC_jobstatus, $status);
		$add = " AND status='$status'";
	}

	$sql = "SELECT count(*) FROM `clientjobs` WHERE client='$client'$add;";
	$result = DB_query($sql); //FW ok
	$line = mysqli_fetch_row($result);
	return($line[0]);
};





/**
**name PKG_hasOptions($package, $packageID)
**description generates a link to the package option page (if it exists)
**parameter package: name of package
**parameter packageID: id for the selected package
**parameter distr: the name of the distribution
**parameter client: Name of the current client.
**parameter release: The release of the client's distribution.
**/
function PKG_hasOptions($package, $packageID, $distr, $client, $release = "")
{
$addReleaseToPath = (isset($release{0}) ? "$release/" : "");

$package=chop($package);
//generate full path to the option page
$filename="/m23/data+scripts/m23admin/packages/$distr/$addReleaseToPath".$package."OptionPage.php";

//if file exists there is an option page
if (file_exists($filename))
return("<A HREF=\"/m23admin/packages/$distr/$addReleaseToPath".$package."OptionPage.php?id=$packageID&client=$client&lang=$GLOBALS[m23_language]\" target=\"_blank\">Option</A>");
else
return("-");
};





/**
**name PKG_savePackageselection($client, $selectionName, $showMsg=true, $status = 'wait4acc')
**description saves all selected packages a package selection
**parameter client: name of client to install packages on
**parameter selectionName: name for the package selection
**parameter showMsg: set to true, if a message should be shown
**parameter status: Status of the clientjobs that should be added.
**/
function PKG_savePackageselection($client, $selectionName, $showMsg=true, $status = 'wait4acc')
{
	CHECK_FW(CC_clientname, $client);
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	PKG_deletePackageselection($selectionName);
	
	if (isset($status{1}))
		$addStatus = " AND status='$status'";
	else
		$addStatus = '';

	//select all wait4acc jobs for the client
	$sql = "SELECT params,package,normalPackage,installedSize,priority FROM `clientjobs` WHERE client='$client' $addStatus";

	$result = DB_query($sql); //FW ok

	$counter = 0;

	//gets the params for the packages
	while ($line=mysqli_fetch_assoc($result))
	{
		PKG_addPackageToPackageselection($selectionName, $line['package'], $line['params'], $line['normalPackage'], $line['installedSize'],$line['priority']);
		$counter++;
	}

	if ($showMsg)
		MSG_showInfo($counter.$I18N_added_to_package_selection);
};





/**
**name PKG_addPackageToPackageselection($selectionName, $packageName, $params, $normalPackage="", $installedSize, $priority)
**description Add packages to selection
**parameter client: name of client to install packages on
**parameter selectionName: name for the package selection
**parameter packageName: name of the normal package
**parameter params: parameter for the package
**parameter normalPackage: the name of a normal package
**parameter installedSize: the size of the package if it is installed
**parameter priority: The priority of the package.
**/
function PKG_addPackageToPackageselection($selectionName, $packageName, $params, $normalPackage="", $installedSize, $priority)
{

	//search for old job with the same package
	if (strstr($packageName,"m23normal") || strstr($packageName,"m23normalRemove")) //if we have a m23normal or m23normalRemove package, the params differ
	{
		CHECK_FW(CC_packageselectionname, $selectionName, CC_package, $normalPackage, CC_package, $packageName, CC_packagepriority, $priority, CC_packagesize, $installedSize, CC_nochecknow, $params);
		$sql = "SELECT id FROM `recommendpackages` WHERE name='$selectionName' AND package='m23normal' AND normalPackage='$normalPackage'";

		$insertSql = "INSERT INTO recommendpackages (name,package,version,priority,normalPackage,params,installedSize) VALUES
				('$selectionName', '$packageName', '', '$priority', '$normalPackage','$params','$installedSize');";

		$m23normalOrRemove = true;
	}
	else //if we have other packages the package names differ
	{
		CHECK_FW(CC_packageselectionname, $selectionName, CC_package, $packageName, CC_packagepriority, $priority, CC_packagesize, $installedSize, CC_nochecknow, $params);
// 		$priority = PKG_getSpecialPackagePriority($packageName);
		$sql = "SELECT id FROM `recommendpackages` WHERE name='$selectionName' AND params='$params' AND package='$packageName'";

		$insertSql="INSERT INTO recommendpackages  (name,package,version,priority,params,installedSize) VALUES ('$selectionName', '$packageName', '', '$priority', '$params','$installedSize');";

		$m23normalOrRemove = true;
	}

	$result = DB_query($sql); //FW ok
	if (mysqli_num_rows($result) == 0)
		DB_query($insertSql); //FW ok
		
		
	if ($m23normalOrRemove)
		PKG_combinem23normal($selectionName);
}





/**
**name PKG_listSpecialpackages($key)
**description lists special packages matching a key
**parameter key: search key
**/
function PKG_listSpecialpackages($key,$lala,$distr)
{
include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

//if the key is empty select all packages
if (empty($key))
	  $grep=" | sort";
	  else //only get packages matching the key
	  $grep=" | grep -i $key | sort";

	HTML_showTableHeader();

//write table header
	echo ("
		<tr>
			<td><span class=\"subhighlight\">$I18N_package_name</span></td>
			<td><span class=\"subhighlight\">$I18N_size</span></td>
			<td><span class=\"subhighlight\">$I18N_description</span></td>
			<td><span class=\"subhighlight\">$I18N_selected</span></td>
		</tr>
		");

//list all m23 special packages and cut the path
$file=popen("find /m23/data+scripts/packages/ /m23/inc/distr/$distr/packages -xtype f -maxdepth 1 -name 'm23*Install.php' -printf \"%f\\n\" $grep;
find /m23/data+scripts/packages/userPackages/ -xtype f -maxdepth 1 -name 'm23*Install.php' -printf \"%f\\n\" $grep | awk '{print(\"?\"$0)}';" ,"r");

$i=0;
while (!feof($file))
	{
		$line=fgets($file,10000);
		//if we can't get a package: break
		if (empty($line))
			break;

		//User scripts are marked with a ?
		if ($line[0] == "?")
			{
				$userScript = '<img border="0" src="/gfx/scriptEditor-mini.png"> ';
				$temp = explode("?",$line);
				$line = $temp[1];
			}
		else
			$userScript = '';

		if (($i % 2) == 0)
			$class = 'class="evenrow"';
		else
			$class = 'class="oddrow"';

		//split package name and extension
		$name_extension=explode("Install.php",$line);

		//adds remove line for other packages
		$var="CB_specialPkg".$i;
		
		echo("<tr $class><td>$userScript".$name_extension[0]."</td><td></td><td>".PKG_getSpecialPackageDescription($name_extension[0],$distr)."</td><td><input type=\"checkbox\" name=\"$var\" value=\"".$name_extension[0]."\"></td></tr>\n");

		$i++;
	};
	
	pclose($file);

	HTML_showTableEnd();

return($i);
};





/**
**name PKG_addSpecialPackages($amount,$client,$distr)
**description adds normal packages to db
**parameter amount: amount of selected packages
**parameter client: name of client to install packages on
**/
function PKG_addSpecialPackages($amount,$client,$distr)
{
	$count=0;
	//run thru the special checkbuttons
	for ($i=0; $i < $amount; $i++)
		{
			$var="CB_specialPkg".$i;
			if (!empty($_POST[$var]))
			{//add the apecial package to db
				PKG_addWait4AccJob($client,$_POST[$var],PKG_getSpecialPackagePriority($_POST[$var],$distr),"");
				$count++;
			}
		}
	return($counter);
};





/**
**name PKG_getSpecialPackagePriority($package)
**description gets the priority of a special package
**parameter package: name of package
**/
function PKG_getSpecialPackagePriority($package,$distr="debian")
{
	return(trim(PKG_getSpecialPackageInfo($package,"Priority",$distr)));
};





/**
**name PKG_getSpecialPackageDescription($package)
**description gets the description of a special package
**parameter package: name of package
**/
function PKG_getSpecialPackageDescription($package,$distr)
{
	return(PKG_getSpecialPackageInfo($package,"Description",$distr));
};





/**
**name PKG_getSpecialPackageInfo($package,$infoTyp)
**description gets informations from special packages
**parameter package: name of package
**parameter infoType: the type of information you want to get
**parameter dist: shortname of the distribution
**returns The information or false, if no information could be got.
**/
function PKG_getSpecialPackageInfo($package,$infoTyp,$distr)
{


//generate the full path to the package
$fullpath = "/m23/data+scripts/packages/".$package."Install.php";

if (!file_exists($fullpath))
	$fullpath = "/m23/data+scripts/packages/userPackages/".$package."Install.php";

if (!file_exists($fullpath))
	$fullpath = "/m23/inc/distr/$distr/packages/".$package."Install.php";

if (!file_exists($fullpath))
	return(false);

//grep only the line with our info
$cmd="grep -i '$infoTyp:' $fullpath | cut -d':' -f2";

//open pipe
$file=popen($cmd, "r");
//get the line
$result=fgets($file,10000);

pclose($file);
return($result);
};





/**
**name PKG_getPackageID($client,$package)
**description get the id for a wait4acc job
**parameter client: name of the client
**parameter package: name of the package
**/
function PKG_getPackageID($client,$package)
{
	CHECK_FW(CC_clientname, $client, CC_package, $package);
	$sql = "SELECT id FROM `clientjobs` WHERE client='$client' AND status='wait4acc' AND package='$package'";

	$result = DB_query($sql); //FW ok
	$line = mysqli_fetch_row($result);
	return($line[0]);
};





/**
**name PKG_rmNormalJob($client, $packageName, $priority = 25)
**description adds a normal package removal job to the clientjobs table
**parameter client: name of the client
**parameter packageName: name of the package
**parameter priority: The priority of the job.
**/
function PKG_rmNormalJob($client, $packageName, $priority = 25)
{
	PKG_addStatusJob($client,"m23normalRemove",$priority,$packageName,"waiting");
};





/**
**name PKG_addJob($client,$packageName,$priority,$params)
**description adds a job to the clientjobs table
**parameter client: name of the client
**parameter packageName: name of the package
**parameter priority: priority of the package
**parameter params: parameter for installing the package
**/
function PKG_addJob($client,$packageName,$priority,$params)
{
	PKG_addStatusJob($client,$packageName,$priority,$params,"waiting");
};





/**
**name PKG_discardNormalJob($client,$packageName)
**description discards all normal packages from the clientjobs table, that match the param
**parameter client: name of the client
**parameter packageName: name of the package
**/
function PKG_discardNormalJob($client,$packageName)
{
	CHECK_FW(CC_clientname, $client, CC_package, $packageName);
	$sql = "DELETE FROM `clientjobs` WHERE client='$client' AND status='wait4acc' AND package='m23normal' AND normalPackage='$packageName';";

	DB_query($sql); //FW ok
};





/**
**name PKG_addWait4AccJob($client,$packageName,$priority,$params)
**description adds a wait 4 accept job to the clientjobs table
**parameter client: name of the client
**parameter packageName: name of the package
**parameter priority: priority of the package
**parameter params: parameter for installing the package
**/
function PKG_addWait4AccJob($client,$packageName,$priority,$params)
{
	PKG_addStatusJob($client,$packageName,$priority,$params,"wait4acc");
};





/**
**name PKG_addStatusJob($client,$packageName,$priority,$params,$status)
**description adds a job to the clientjobs table
**parameter client: name of the client
**parameter packageName: name of the package
**parameter priority: priority of the package
**parameter params: parameter for installing the package
**parameter status: the status of the package
**/
function PKG_addStatusJob($client,$packageName,$priority,$params,$status)
{
	$client = trim($client);

	$clientOptions = CLIENT_getAllOptions($client);
	$packagesource = $clientOptions['packagesource'];
	$distr		 = $clientOptions['distr'];

//search for old job with the same package
	if (strstr($packageName,"m23normal"))
		{
//if we have a m23normal or m23normalRemove package, the params differ
			CHECK_FW(CC_clientname, $client, CC_jobstatus, $status, CC_nochecknow, $params, CC_package, $packageName, CC_packagepriority, $priority);

			//Split the parameter into two parts: e.g. mc###12345
			if (strpos($params,'###') !== false)
			{
				$temp = explode('###', $params);
				$params = $temp[0];
				$installedSize = $temp[1];
			}
			else
			{
				$installedSize = 0;
			}
			
			PKG_cleanPackageLine($params);

			$sql = "SELECT id FROM `clientjobs` WHERE client='$client' AND status='$status' AND normalPackage='$params'";

			$insertSql="INSERT INTO clientjobs (client,package,priority,status,normalPackage,installedSize) VALUES
			('$client', '$packageName', $priority, '$status', '$params','$installedSize');";
		}
	else //if we have other packages the package names differ
		{
			CHECK_FW(CC_clientname, $client, CC_jobstatus, $status, CC_nochecknow, $params, CC_package, $packageName, CC_packagepriority, $priority);
			$sql = "SELECT id FROM `clientjobs` WHERE client='$client' AND status='$status' AND package='$packageName' AND priority='$priority'";

			$insertSql="INSERT INTO clientjobs (client,package,priority,status,params) VALUES
			('$client', '$packageName', '$priority', '$status', '$params');";
		}

	$result=DB_query($sql); //FW ok

	if ($line=mysqli_fetch_row($result))
		{//we got one old job: let's delete it
			$sql="DELETE FROM clientjobs WHERE id = '".$line[0]."';";
			DB_query($sql); //FW ok
		}

	DB_query($insertSql); //FW ok
};





/**
**name PKG_acceptJobs($client)
**description accepts all preselected jobs
**parameter client: name of the client
**parameter showMsg: set to true, if a message about assigned jobs should be shown
**/
function PKG_acceptJobs($client,$showMsg)
{
	CHECK_FW(CC_clientname, $client);
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	if ($showMsg)
		MSG_showInfo(PKG_countSelectedpackages($client)." $I18N_additional_jobs_from_package_selection_were_added");

	//Combine all waiting for accept normal installation jobs to one job
	$packagesA = array();
	$res = DB_query("SELECT * FROM clientjobs WHERE client='$client' AND package='m23normal' AND status='wait4acc';"); //FW ok
	
	if (mysqli_num_rows($res) > 0)
	{
		//Get all waiting for accept normal installation jobs
		while( $data = mysqli_fetch_array($res))
			$packagesA[$data['priority']].=$data['normalPackage']." ";
	
		foreach ($packagesA as $priority => $packages)
			//Create a new normal installation job with all packages
			PKG_addNormalJob($client, $packages, $priority);
	
		//Delete all waiting for accept normal installation jobs
		DB_query("DELETE FROM clientjobs WHERE client='$client' AND package='m23normal' AND status='wait4acc';");
	}



	//Combine all waiting for accept normal deinstallation jobs to one job
	$packagesA = array();
	$res = DB_query("SELECT * FROM clientjobs WHERE client='$client' AND package='m23normalRemove' AND status='wait4acc';"); //FW ok

	if (mysqli_num_rows($res) > 0)
	{
		//Get all waiting for accept normal deinstallation jobs
		while( $data = mysqli_fetch_array($res))
			$packagesA[$data['priority']].=$data['normalPackage']." ";
	
		foreach ($packagesA as $priority => $packages)
			//Create a new normal deinstallation job with all packages
			PKG_rmNormalJob($client, $packages, $priority);
	
		//Delete all waiting for accept normal deinstallation jobs
		DB_query("DELETE FROM clientjobs WHERE client='$client' AND package='m23normalRemove' AND status='wait4acc';");
	}



	//Add all other jobs
	$sql = "UPDATE clientjobs SET status='waiting' WHERE client='$client' AND status='wait4acc';";
	DB_query($sql); //FW ok
};





/**
**name PKG_discardJobs($client)
**description discards all preselected jobs
**parameter client: name of the client
**/
function PKG_discardJobs($client)
{
	CHECK_FW(CC_clientname, $client);
	$sql="DELETE FROM clientjobs WHERE client='$client' AND status='wait4acc';";
	DB_query($sql); //FW ok
};






/**
**name PKG_discardJob($client, $package)
**description discards a selected job
**parameter client: name of the client
**parameter package: name of package you want to discard
**/
function PKG_discardJob($client, $package)
{
	CHECK_FW(CC_clientname, $client, CC_package, $package);
	$sql="DELETE FROM clientjobs WHERE client='$client' AND status='wait4acc' AND package='$package';";
	DB_query($sql); //FW ok
};





/**
**name PKG_changeClientPackageAction($client, $package, $action)
**description changes the status of a allready installed package
**parameter client: name of the client
**parameter package: name of package you want to discard
**parameter action: the action you want the package set to
**/
function PKG_changeClientPackageAction($client, $package, $action)
{
	CHECK_FW(CC_clientname, $client, CC_package, $package, CC_nochecknow, $action);
	$sql="UPDATE `clientpackages` SET action='$action' WHERE package='$package' AND clientname='$client';";
	DB_query($sql); //FW ok
};





/**
**name PKG_setClientPackageWait4Rm($client, $package)
**description changes the status of a allready installed package to wait 4 delete
**parameter client: name of the client
**parameter package: name of package
**/
function PKG_setClientPackageWait4Rm($client, $package)
{
	PKG_changeClientPackageAction($client, $package, "wait4rm");
};





/**
**name PKG_setClientPackageInstalledOK($client, $package)
**description changes the status of a package to "installed ok"
**parameter client: name of the client
**parameter package: name of package
**/
function PKG_setClientPackageInstalledOK($client, $package)
{
	PKG_changeClientPackageAction($client, $package, "install ok installed");
};





/**
**name PKG_addShutdownPackage($client)
**description adds a shutdown package, but only if the client is NOT running. returns true, if a schutdown package is added
**parameter client: name of the client
**/
function PKG_addShutdownPackage($client)
{
	if (!( CLIENT_isrunning($client) ))
		{
			PKG_addJob($client,"m23Shutdown",PKG_getSpecialPackagePriority("m23Shutdown"),"");
			return(true);
		}
	elseif ($_SESSION['m23Shared'])
		//Add nothing, if m23shared is active
		return(false);
	else
		return(false);
};





/**
**name PKG_addShutdownOrRebootPackage($client)
**description Adds a shutdown or a reboot package. No new job is addedm if there is already a waiting shutdown or reboot job. A shutdown package is added if the client can't be pinged and a reboot package if it is reachable via the network.
**parameter client: name of the client
**/
function PKG_addShutdownOrRebootPackage($client)
{
	//Do nothing, if there is already a waiting reboot or shutdown job
	if ((PKG_countJobsWithStatus($client, "m23Shutdown", "waiting") > 0) ||
		(PKG_countJobsWithStatus($client, "m23Reboot", "waiting") > 0))
		return(false);

	//Add a shutdown package, if m23shared is active
	if ($_SESSION['m23Shared'])
		PKG_addJob($client,"m23Shutdown",PKG_getSpecialPackagePriority("m23Shutdown"),"");

	if (CLIENT_isrunning($client) || VM_isCloudStackClient($client))
		PKG_addJob($client,"m23Reboot",PKG_getSpecialPackagePriority("m23Reboot"),"");
	else
		PKG_addJob($client,"m23Shutdown",PKG_getSpecialPackagePriority("m23Shutdown"),"");

	return(true);
};





/**
**name PKG_getAllParams($packageID)
**description gets all parameters of the parameters column of a clientjob
**parameter packageID: the ID of the package
**/
function PKG_getAllParams($packageID)
{
	CHECK_FW(CC_packageid, $packageID);
	$sql="SELECT params FROM `clientjobs` WHERE id='$packageID'";

	$result = DB_query($sql); //FW ok

	$line = mysqli_fetch_row($result);

	return(explodeAssoc("?#*",$line[0]));
};





/**
**name PKG_setAllParams($packageID,$params)
**description sets all parameters in the parameters column of a clientjob
**parameter packageID: the ID of the package
**parameter params: the parameters as assiciative array
**/
function PKG_setAllParams($packageID,$params)
{
	CHECK_FW(CC_packageid, $packageID, CC_nochecknow, $params);
	$paramsStr = implodeAssoc("?#*",$params);

	$sql = "UPDATE `clientjobs` SET `params` = '$paramsStr' WHERE `id` = '$packageID' LIMIT 1";

	$result = DB_query($sql); //FW ok
};





/**
**name PKG_OptionPageHeader($title)
**description starts the option page with all necessary options
**parameter title: the window title of the OptionPage
**/
function PKG_OptionPageHeader($title)
{
	include_once('/m23/inc/db.php');

	dbConnect();

	$id = (isset($_GET['id']) ? $_GET['id'] : $_POST['id']);

	echo("
<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<html>
<head>
<title>$title</title>
<link rel=\"stylesheet\" type=\"text/css\" href=\"/m23admin/css/index.css\">
</head>
<body bgcolor=\"#596374\">

<form method=\"post\">
<input type=\"hidden\" name=\"id\" value=\"$id\">

<table align=\"center\">
<tr>
	<td>
		<div class=\"subtable_shadow\">
			<table align=\"center\" class=\"subtable\">
				<tr>
					<td colspan=\"2\">
						<span class=\"title\">$title</span><br><br>
					</td>
				</tr>

");

	$layout['allvalues']=PKG_getAllParams($id);
	return($layout);
};





/**
**name PKG_OptionPageRender($layout)
**description renderes the layout of a OptionPage
**parameter layout: for the definition of the layout array see the development guide
**/
function PKG_OptionPageRender($layout)
{
	for ($i=0; $i < count($layout); $i++)
		{
			switch($layout[$i]['type'])
				{
					case "text":
						{
							echo("<tr><td colspan=\"2\">".$layout[$i]['text']."</td></tr>\n");
							break;
						};

					case "line":
						{
							echo("<tr><td colspan=\"2\"><hr></td></tr>\n");
							break;
						};

					case "title":
						{
							echo("<tr><td colspan=\"2\"><br><span class=\"title\">".$layout[$i]['text']."</span><hr></td></tr>\n");
							break;
						};

					case "infobox":
						{
							$infoBox = MSG_showMessageBoxHeader("infotable",$layout[$i]['text'],700,true).MSG_showMessageBoxFooter(true);
							echo("<tr><td colspan=\"2\">$infoBox</td></tr>\n");
							break;
						}

					case "inputline":
						{
							//Define the dialog element
							$layout[$i]['value'] = HTML_input($layout[$i]['name'], $layout['allvalues'][$layout[$i]['name']], $layout[$i]['size'], $layout[$i]['maxlength'], INPUT_TYPE_text);

							//Show it
							echo("<tr><td>".$layout[$i]['text']."</td><td>".constant($layout[$i]['name'])."</td></tr>\n");
							break;
						};


					case "selection":
						{
							$arr = array();

							//Generate the array for the options
							for ($nr=0; isset($layout[$i]["option".$nr]); $nr++)
								$arr[$layout[$i]['option'.$nr]] = $layout[$i]['option'.$nr];

							//Define the dialog element
							$layout[$i]['value'] = HTML_selection($layout[$i]['name'], $arr, SELTYPE_selection, true, $layout['allvalues'][$layout[$i]['name']]);

							//Show it
							echo("<tr><td>".$layout[$i]['text']."</td><td>".constant($layout[$i]['name'])."</td></tr>\n");
							break;
						};

					case "textarea":
						{
							$layout[$i]['value'] = HTML_textArea($layout[$i]['name'], $layout[$i]['cols'], $layout[$i]['rows'], $layout['allvalues'][$layout[$i]['name']]);

							//Show it
							echo("<tr><td>".$layout[$i]['text']."</td><td>".constant($layout[$i]['name'])."</td></tr>");
							break;
						};

				};
		};
};





/**
**name PKG_OptionPageTail($layout)
**description generates the bottom of the OptionPage
**parameter layout: for the definition of the layout array see the development guide
**/
function PKG_OptionPageTail($layout)
{
PKG_OptionPageSaveAlsParameters($layout);

PKG_OptionPageRender($layout);

echo("
				<tr>
					<td colspan=\"2\">
						<center>
							<input type=\"submit\" name=\"BUT_save\" value=\"Save\">
						</center>
					</td>
				</tr>
			</table>
		</div>
	</td>
<tr>
</table>
</form>
</body>
</html>");
};




/**
**name PKG_OptionPageSaveAlsParameters($layout)
**description saves the entered values in the packagejobs params
**parameter layout: for the definition of the layout array see the development guide
**/
function PKG_OptionPageSaveAlsParameters($layout)
{
	if (isset($_POST['BUT_save']))
		{

			for ($i=0; isset($layout[$i]['type']); $i++)
				{
					$params[$layout[$i]['name']]=$_POST[$layout[$i]['name']];
				};

			PKG_setAllParams($_POST['id'],$params);
		}
};





/**
**name PKG_OptionPageGetValue($variable,$params)
**description gets tha value from a variable. The function tries to get the value from the $_GET array, if it doesn't work it falls back to the params array
**parameter variable: the name of the variable you want to get the value from
**parameter params: the parameters as assiciative array
**/
function PKG_OptionPageGetValue($variable,$params)
{
	if (isset($_GET[$variable]))
		return($_GET[$variable]);
	else
		return($params[$variable]);
};





/**
**name PKG_listParams($paramStr)
**description lists the parameters from a package in a nice format
**parameter paramStr: the parameters as string (simply read from the packagejobs table)
**/
function PKG_listParams($paramStr)
{
	$params = explodeAssoc("?#*",$paramStr);

	$out = "";

	$keys = array_keys($params);

	for ($i=0; $i < count($keys); $i++)
		if ((strlen($keys[$i]) > 0) && (strlen($params[$keys[$i]]) > 0))
		$out.=wordwrap($keys[$i].": ".$params[$keys[$i]]."<br>",60);

	return($out);
};




/**
**name PKG_getRecommendPackageAllInstalledSize( $packageSelection)
**description calculates the whole sum of the installedSizes of all recommend packages of one package selection
**parameter packageSelection: the name of the package selection
**/
function PKG_getRecommendPackageAllInstalledSize($packageSelection)
{
	CHECK_FW(CC_packageselectionname, $packageSelection);
	$result = DB_query("SELECT SUM(installedSize) FROM `recommendpackages` WHERE name='$packageSelection'"); //FW ok

	$line = mysqli_fetch_row($result);

	return($line[0]);
};





/**
**name PKG_previewInstallationDeinstallation($clientName,$packageRow,$aptCommand)
**description showes what happens if a client deinstalls/ installs waiting packages and generates a table with title
**parameter clientName: name of the client
**parameter install: set to true, if packages should be installed. if false the packages should be deinstalled
**/
function PKG_previewInstallationDeinstallation($clientName,$install)
{
	if ($install)
		{
			$packageRow="m23normal";
			$aptCommand="install";
		}
	else
		{
			$packageRow="m23normalRemove";
			$aptCommand="remove";
		};

	CHECK_FW(CC_clientname, $clientName, CC_package, $packageRow);
	$sql="SELECT normalPackage FROM clientjobs WHERE client='$clientName' AND status!='done' AND package='$packageRow' ORDER BY priority,id";

	$res = DB_query($sql); //FW ok

	$packages="";

	while( $data = mysqli_fetch_array($res))
			$packages.=$data['normalPackage']." ";

	if (strlen($packages) == 0)
		return($I18N_no_waiting_jobs);

	$clientOptions = CLIENT_getAllOptions($clientName);

	//include the distribution specific files
	include_once("/m23/inc/distr/".$clientOptions['distr']."/clientConfig.php");
	include_once("/m23/inc/distr/".$clientOptions['distr']."/packages.php");

	//try to update the client package status file
	if ($_SESSION['m23Shared'] !== true)
	{
		if (function_exists('CLCFG_copyClientPackageStatus'))	//it exists not in halfSister
			CLCFG_copyClientPackageStatus($clientName);
	}
	else
	//Change the client name on m23shared clients to the complete m23shared client name to store the package status information in a directory with complete m23shared client name and not without the DB name
		$clientName = m23SHARED_getCompleteClientName($clientName);

	return(PKG_previewInstallDeinstall
			($clientName,$clientOptions['distr'],
			 $clientOptions['packagesource'],$packages,$aptCommand));
};





/**
**name PKG_showPreviewInstallationDeinstallation($clientName,$install)
**description showes what happens if a client installs / deinstalls waiting packages and generates a table with title
**parameter clientName: name of the client
**parameter install: set to true, if packages should be installed. if false the packages should be deinstalled
**/
function PKG_showPreviewInstallationDeinstallation($clientName,$install)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	if ($install)
		$title=$I18N_previewInstallation;
	else
		$title=$I18N_previewDeinstallation;


//write table header
	echo ("<br><br>
		<span class=\"title\">$title</span><br><br>
			<table class=\"subtable\" align=\"center\" border=0 cellspacing=5>

				<tr>
					<td>
						".PKG_previewInstallationDeinstallation($clientName,$install)."
					</td>
				</tr>
			</table>
		");
};





/**
**name PKG_updateSourcesListAtAllClients( $sourcename)
**description updates the sources.list at all clients using it
**parameter sourcename: name of the sources.list that should be updated
**/
function PKG_updateSourcesListAtAllClients($sourcename)
{
	CHECK_FW(CC_packagesourcename, $sourcename);
	//Quick 'n dirty find all clients that have the sources.list AND MAYBE SOME MORE
	$sql = "SELECT client FROM `clients` WHERE options LIKE '%$sourcename%'";

	$result = DB_query($sql); //FW ok

	while ($line = mysqli_fetch_row($result))
	{
		$options = CLIENT_getAllOptions($line[0]);
	
		if ($options['packagesource']==$sourcename)
			PKG_addJob($line[0], "m23UpdateSourcesList", PKG_getSpecialPackagePriority("m23UpdateSourcesList"), $sourcename);
	}
};





/**
**name PKG_executeOnClientJobs($sql,$packageIDList)
**description Executes a sql statement on all package IDs.
**parameter sql: initial SQL statement e.g. "DELETE FROM `clientjobs` WHERE "
**parameter packageIDList: the list of IDs of jobs to be deleted
**/
function PKG_executeOnClientJobs($sql,$packageIDList)
{
	if (count($packageIDList) == 0)
		return;
	for ($i=0; $i < count($packageIDList); $i++)
	{
		CHECK_FW(CC_packageid, $packageIDList[$i]);
		if ($i < count($packageIDList)-1)
			$sql.="id=".$packageIDList[$i]." || ";
			else
			$sql.="id=".$packageIDList[$i];
	}

	db_query($sql); //FW ok
};





/**
**name PKG_removeFromJobList($packageIDList)
**description removes all jobs identified by the IDs in packageIDList
**parameter packageIDList: the list of IDs of jobs to be deleted
**/
function PKG_removeFromJobList($packageIDList)
{
	PKG_executeOnClientJobs("DELETE FROM `clientjobs` WHERE ",$packageIDList);
}





/**
**name PKG_changeClientJobsStatus($packageIDList,$status)
**description Sets a new status on all jobs identified by the IDs in packageIDList
**parameter packageIDList: the list of IDs of jobs to be deleted
**parameter status: New status to set
**/
function PKG_changeClientJobsStatus($packageIDList,$status)
{
	CHECK_FW(CC_jobstatus, $status);
	PKG_executeOnClientJobs("UPDATE `clientjobs` SET `status` = '$status' WHERE ",$packageIDList);
}





/**
**name PKG_removeSpecialFromJobList($clientName, $package, $priority)
**description Removes a special job from the joblist identified by package name and priority.
**parameter clientName: Name of the client
**parameter package: Name of the package.
**parameter priority: Priority of the job.
**/
function PKG_removeSpecialFromJobList($clientName, $package, $priority)
{
	CHECK_FW(CC_clientname, $clientName, CC_package, $package, CC_packagepriority, $priority);
	$sql = "DELETE FROM `clientjobs` WHERE `client` = '$clientName' AND `priority` = $priority AND `package` = '$package'";
	db_query($sql); //FW ok
}





/**
**name PKG_previewUpdateSystem($clientName,$completeUpdate)
**description returns the information of an system update request
**parameter clientName: name of the client 
**parameter completeUpdate: set it to "true", if it should be a full update (installation and removal of packages) or to "false" for an update of existing packages
**/
function PKG_previewUpdateSystem($clientName,$completeUpdate)
{
	if ($completeUpdate)
		$aptCommand="dist-upgrade";
	else
		$aptCommand="upgrade";

	$clientOptions = CLIENT_getAllOptions($clientName);

	//include the distribution specific files
	include_once("/m23/inc/distr/".$clientOptions['distr']."/clientConfig.php");
	include_once("/m23/inc/distr/".$clientOptions['distr']."/packages.php");

	//try to update the client package status file
	if ($_SESSION['m23Shared'] !== true)
	{
		if (function_exists('CLCFG_copyClientPackageStatus'))	//it exists not in halfSister
			CLCFG_copyClientPackageStatus($clientName);
	}
	else
	//Change the client name on m23shared clients to the complete m23shared client name to store the package status information in a directory with complete m23shared client name and not without the DB name
		$clientName = m23SHARED_getCompleteClientName($clientName);

	return(PKG_previewInstallDeinstall
			($clientName,$clientOptions['distr'],
			 $clientOptions['packagesource'],"",$aptCommand));
};





/**
**name PKG_showPreviewUpdateSystem($clientName,$completeUpdate)
**description generates HTML code woth inormation about the update preview
**parameter clientName: name of the client 
**parameter completeUpdate: set it to "true", if it should be a full update (installation and removal of packages) or to "false" for an update of existing packages
**/
function PKG_showPreviewUpdateSystem($clientName,$completeUpdate)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

//write table header
	echo ("<br><br>
		<span class=\"title\">$I18N_updatePreview</span><br><br>
			<table class=\"subtable\" align=\"center\" border=0 cellspacing=5>

				<tr>
					<td>
						".PKG_previewUpdateSystem($clientName,$completeUpdate)."
					</td>
				</tr>
			</table>
		");
};





/**
**name PKG_rmAllSpecialPackagesByName($clientName,$packageName)
**description deletes all special packages from a client matching the package name
**parameter clientName: name of the client 
**parameter packageName: name of the special package
**/
function PKG_rmAllSpecialPackagesByName($clientName,$packageName)
{
	CHECK_FW(CC_clientname, $clientName, CC_package, $packageName);
	$sql="DELETE FROM `clientjobs` WHERE client=\"$clientName\" AND package=\"$packageName\";";

	db_query($sql); //FW ok
};





/**
**name PKG_getClientsWithPackage($packageName)
**description Gets all clients that have the specific package installed (or with another status).
**parameter packageName: Name of the package.
**parameter status: The status the package should have.
**returns Array with all clients that have the specific package installed (or with another status).
**/
function PKG_getClientsWithPackage($packageName, $status = 'ii')
{
	CHECK_FW(CC_package, $packageName);

	$clients = array();

	$sql = "SELECT clientname FROM `clientpackages` WHERE package = '$packageName' AND status = '$status' ORDER BY clientname";
	$res = db_query($sql); //FW ok
	
	while ($line = mysqli_fetch_row($res))
	{
		if (!empty($line[0]))
			$clients[$line[0]] = $line[0];
	}

	return($clients);
}





/**
**name PKG_getClientsWithWaitingJobs()
**description Gets all clients that have waiting jobs.
**returns Array with all clients that have waiting jobs.
**/
function PKG_getClientsWithWaitingJobs()
{
	$clients = array();

	// Get the client jobs that are waiting and the client name from them with the distinct client name
	$sql = "SELECT DISTINCT `client` FROM `clientjobs` WHERE `status` = 'waiting'";

	$res = db_query($sql); //FW ok
	
	while ($line = mysqli_fetch_row($res))
	{
		if (!empty($line[0]))
			$clients[$line[0]] = $line[0];
	}

	return($clients);
}





/**
**name PKG_getClientsByPackages($packageNames, $status = true, $and = true, $not = false)
**description Gets all clients that have the specific packages (not) installed (or with another given status).
**parameter packageNames: Array with the packages to check.
**parameter status: Debian status code or true for "installed".
**parameter and: Set to true, if all packages must (not) match the status or, if false, at least one package must match the status.
**parameter not: If set to true, only clients, that have no packes with the given status will be added to the output array.
**returns Array with all clients that have the specific package (not) installed (or with another given status).
**/
function PKG_getClientsByPackages($packageNames, $status = true, $and = false, $not = false)
{
	$clients = array();

	// The status code, that must match the client's package
	if ($status === true) $status = 'ii';

	$sql = 'SELECT `clientname` FROM `clientpackages` GROUP BY `clientname` HAVING (';

	// If set to true, a plus should be added before next query part
	$addPlus = false;

	$partCounter = 0;

	// Add packages and wanted status to the query
	foreach ($packageNames as $packageName)
	{
		// Check for a valid package name
		CHECK_FW(CC_package, $packageName);

		// Check, if a plus should be added before next query part (only after the first element the plus must be added)
		if ($addPlus)
			$sql .= ' + ';
		else
			$addPlus = true;

		// Add the package and its wanted status to the query
		$sql .= "MAX(`package` = '$packageName' AND `status` = '$status')";

		$partCounter++;
	}

	// If none of the packages should have the given status (eg. no package is installed), there should be no zero packages and the conjunction should be done with "and"
	if ($not)
	{
		$partCounter = 0;
		$and = true;
	}

	// Have all packages to match the status ($and = true) or, if false, at least one package must match the status ($and = false).
	if ($and)
		$sql .= ") = $partCounter";
	else
		$sql .= ') > 0';
	
	$res = db_query($sql); //FW ok
	
	while ($line = mysqli_fetch_row($res))
	{
		if (!empty($line[0]))
			$clients[$line[0]] = $line[0];
	}

	return($clients);
}





/**
**name PKG_countPackages($clientName)
**description counts all packages on a client
**parameter clientName: name of the client 
**/
function PKG_countPackages($clientName)
{
	CHECK_FW(CC_clientname, $clientName);
	$sql = "SELECT COUNT(*) FROM `clientpackages` WHERE clientname='$clientName'";
	$clientpackages = db_query($sql); //FW ok
	$counted_clientpackages = mysqli_fetch_row( $clientpackages );

	return($counted_clientpackages[0]);
};





/**
**name PKG_copyWait4accPackagesToClient($to,$from)
**description copies the waiting jobs from one client to another
**parameter from: the source client
**parameter to: the destination client
**/
function PKG_copyWait4accPackagesToClient($to,$from)
{
	PKG_copyPackagesToClient($to,$from,"wait4acc");
};





/**
**name PKG_copyPackagesToClient($to,$from,$status)
**description copies all with a selected status jobs from one client to another
**parameter from: the source client
**parameter to: the destination client
**parameter status: can be set to a package status or be empty to copy all jobs
**/
function PKG_copyPackagesToClient($to,$from,$status)
{
	CHECK_FW(CC_clientname, $from, CC_jobstatusOrEmpty, $status, CC_clientname, $to);

	if (!empty($status))
		$add = " AND `status` = '$status'";
	else
		$add = "";

	$sql="SELECT * FROM `clientjobs` WHERE client='$from' $add";

	$res = DB_query($sql); //FW ok

	while( $data = mysqli_fetch_array($res))
	{
		$iSQL="INSERT INTO `clientjobs` (`client` , `package` , `priority` , `status` , `params` , `normalPackage` , `installedSize` ) VALUES (
		'$to', '$data[package]', '$data[priority]', '$data[status]', '$data[params]', '$data[normalPackage]', '$data[installedSize]')";

		DB_query($iSQL); //FW ok
	};
};





/**
**name PKG_remNormalPackages($amount,$client)
**description adds normal deinstallation jobs to db
**parameter amount: amount of selected packages
**parameter client: name of client to deinstall packages on
**/
function PKG_remNormalPackages($amount,$client)
{
$count=0;

for ($i=0; $i < $amount; $i++)
	{
		$var="CB_pkg".$i;	 
		
		if (!empty($_POST[$var]))
			{
				PKG_addRemovePackagesToWait4Aac($client,25,$_POST[$var]);
				$count++;
			}
	}
return($counter);
};





/**
**name PKG_addRemovePackagesToWait4Aac($client,$priority,$params)
**description adds a remove job to waiting 4 accept status
**parameter client: name of client to frinstall packages from
**parameter priority: priority of the package
**parameter params: parameter for deinstalling the package
**/
function PKG_addRemovePackagesToWait4Aac($client,$priority,$params)
{
	PKG_addWait4AccJob($client,"m23normalRemove",$priority,$params);
};





/**
**name PKG_discardRemoveJob($client,$packageName)
**description discards all remove jobs from the clientjobs table, that match the param
**parameter client: name of the client
**parameter packageName: name of the package
**/
function PKG_discardRemoveJob($client,$packageName)
{
	CHECK_FW(CC_clientname, $client, CC_package, $packageName);

	$sql = "DELETE FROM `clientjobs` WHERE client='$client' AND status='wait4acc' AND package='m23normalRemove' AND normalPackage='$packageName';";

	DB_query($sql); //FW ok
};





/**
**name PKG_deletePackageselection($selectionName)
**description delete all packages from package selection
**parameter selectionName: name for the package selection
**/
function PKG_deletePackageselection($selectionName)
{
	CHECK_FW(CC_packageselectionname, $selectionName);

	//delete all packages from selection
	$sql = "DELETE FROM `recommendpackages` WHERE name='$selectionName'";

	DB_query($sql); //FW ok
};





/**
**name PKG_getAllPackageSelections()
**description returns all package selection names
**parameter addEmpty: set to true to add an empty entry at the beginning.
**/
function PKG_getAllPackageSelections($addFirstEntry="")
{
	$sql="SELECT DISTINCT name FROM `recommendpackages` ORDER BY name";

	$result=DB_query($sql); //FW ok

	$i=0;
	
	if (strlen($addFirstEntry) > 0)
		$out[$i++]=$addFirstEntry;

	while ($line=mysqli_fetch_row($result))
		$out[$i++]=$line[0];

	return($out);
};





/**
**name PKG_multiPackageSelectionsSelection($selName,$first,$addFirstEntry="")
**description Generates a multi selection with all package selections.
**parameter selName: name of the selection
**parameter first: entry that should be shown first (this is the internal value and NOT the name shown to the user). the first value from the list will be written to $first. set first to "false" to disable writing the first entry.
**parameter addEmpty: set to true to add an empty entry at the beginning.
**return An associative array with the choosen package selections.
**/
function PKG_multiPackageSelectionsSelection($selName,$first,$addFirstEntry="")
{
	$selections = HELPER_array2AssociativeArray(PKG_getAllPackageSelections($addFirstEntry));
	return(HTML_selection($selName,$selections, SELTYPE_selection, true, $first, false, "", 5));
};





/**
**name PKG_showAllPackageSelections()
**description returns all package selection as HTML selection
**parameter selName: name of the selection
**parameter first: entry that should be shown first (this is the internal value and NOT the name shown to the user). the first value from the list will be written to $first. set first to "false" to disable writing the first entry.
**parameter addEmpty: set to true to add an empty entry at the beginning.
**/
function PKG_showAllPackageSelections($selName,$first,$addFirstEntry="")
{
	return(HTML_listSelection($selName,PKG_getAllPackageSelections($addFirstEntry),$first));
};





/**
**name PKG_getPackageParams($id)
**description gets the parameters for a selected package
**parameter id: package ID
**/
function PKG_getPackageParams($id)
{ 
return(PKG_getInfoFromPackageID($id,"params"));
};





/**
**name PKG_getClientbyPackageID($id)
**description gets the clientname that owns a selected package ID
**parameter id: package ID
**/
function PKG_getClientbyPackageID($id)
{
	return(PKG_getInfoFromPackageID($id,"client"));
};





/**
**name PKG_getInfoFromPackageID($id,$variable)
**description gets a row from "clientjobs" for a given package ID
**parameter id: package ID
**parameter variable: the name of the row (e.g. client)
**/
function PKG_getInfoFromPackageID($id,$variable)
{
	CHECK_FW(CC_packageid, $id, "A", $variable);
	$sql = "SELECT $variable FROM clientjobs WHERE id='".$id."';";

	$result = DB_query($sql); //FW ok
	$line = mysqli_fetch_row($result);
	return($line[0]);
}





/**
**name PKG_getClientIDbyPackageID($id)
**description returns the ID of a client that owns a selected package ID
**parameter id: package ID
**/
function PKG_getClientIDbyPackageID($id)
{
	return(CLIENT_getId(PKG_getClientbyPackageID($id)));
};





/**
**name PKG_getPackageParamsVar($id,$var)
**description fetch the device for installation
**parameter id: package ID
**parameter var: name of variable you want to get the value of
**/
function PKG_getPackageParamsVar($id,$var)
{
$params=explode("#",PKG_getPackageParams($id));

//removes PHP warning notice
$varValue[1]="";

for ($i=0; $i < count($params); $i++)
	{
	 if (strstr($params[$i],$var) != FALSE)
	 	{
	 	 $varValue=explode("=",$params[$i]);
		 break;
		};
	};

return($varValue[1]);
};





/**
**name PKG_getPackageIDsByName($client,$packageName,$specialPackage)
**description returnes all IDs as an array for jobs matching the client and job name and are a normal or special package.
**parameter client: the name of the client, the jobs are for
**parameter packageName: name of the package, can be the name of a normal or special package
**parameter specialPackage: set to true, if you want to search for a special package
**/
function PKG_getPackageIDsByName($client,$packageName,$specialPackage)
{
	CHECK_FW(CC_clientname, $client, CC_package, $packageName);

	if ($specialPackage)
		$add=" AND `package` = '$packageName'";
	else
		$add=" AND `package` = 'm23normal' AND `normalpackage` = '$packageName'";

	$sql="SELECT id FROM `clientjobs` WHERE `client` = '$client' $add";

	$result=DB_query($sql); //FW ok

	$nr = 0;	
	while ($line=mysqli_fetch_row($result))
		$out[$nr++] = $line[0];

	return($out);
};





define('DEBPKGSTAT_installed','i');
define('DEBPKGSTAT_removed','d');
define('DEBPKGSTAT_purge','p');

/**
**name PKG_getClientPackages($client, $key, $arr, $status)
**description returns an array or a space separated list of all packages installed on a client
**parameter client: the name of the client
**parameter key: if it is not empty only packages that contain the key are returned
**parameter arr: set to true if the result should be an array otherwise it's a string
**parameter status: If set only returns packages of the given status
**/
function PKG_getClientPackages($client, $key, $arr, $status="")
{
	CHECK_FW(CC_clientname, $client, CC_packagestatusOrEmpty, $status, CC_packageOrEmpty, $key);

	if (empty($key))
		$key="%";
	
	if (!empty($status))
		$add = " AND RIGHT(status,1) = '$status'";
	else
		$add = "";


	if ($arr)
		$sql = "SELECT DISTINCT package FROM `clientpackages` WHERE clientname='$client' AND package LIKE '$key' $add ORDER BY package";
	else
	{
		//Set the maximal amount of data that GROUP_CONCAT returns
		db_query("SET @@group_concat_max_len := @@max_allowed_packet");

		$sql ="
		SELECT GROUP_CONCAT(DISTINCT package SEPARATOR ' ') FROM `clientpackages` WHERE clientname='$client' AND package LIKE '$key' $add ORDER BY package";
	}

	$res = db_query($sql); //FW ok

	if ($arr)
		{
			$i=0;
			
			while ($data = mysqli_fetch_row($res))
				$out[$i++]=$data[0];
		}
	else
		{
			$data = mysqli_fetch_row($res);
			$out = $data[0];
/*			$out="";
			while ($data = mysqli_fetch_row($res))
				$out.="$data[0] ";*/
		}
		
	return($out);
};





/**
**name PKG_getPackagesListMarker()
**description returns the string to mark client names to store packages
**/
function PKG_getPackagesListMarker()
{
	return("?#*packages?#*");
};





/**
**name PKG_savePackagesList($clientName,$packages)
**description stores the package names in the DB
**parameter listName: name of the list to store the packages 
**parameter packages: array or blank seperated list of packages
**/
function PKG_savePackagesList($listName,$packages,$delete=false)
{
	if (!is_array($packages))
		$packages = explode(" ",$packages);

	$packagesCount = count($packages);

	$packagesFound=!empty($packages[0]) || ($packagesCount > 1);

	if ($packagesFound || $delete)
		{
			$marker=PKG_getPackagesListMarker();
			CHECK_FW(CC_clientname, "$marker$listName");

			$sql="DELETE FROM `clientpackages` WHERE clientname='$marker$listName'";
			db_query($sql); //FW ok

			if ($packagesFound)
				for ($i=0; $i < $packagesCount; $i++)
					{
						CHECK_FW(CC_package,$packages[$i]);
						$sql="INSERT INTO `clientpackages` ( `clientname` , `package`)
						VALUES ('$marker$listName', '".$packages[$i]."')";
						db_query($sql); //FW ok
					};
		}
	else
		return(false);

}





/**
**name PKG_loadPackagesList($listName,$arr)
**description returns an array or a blank seperated list of all packages in the list
**parameter listName: name of the list to store the packages 
**parameter arr: set to true if the result should be an arry otherwise it's a string
**/
function PKG_loadPackagesList($listName,$arr)
{
	return(PKG_getClientPackages(PKG_getPackagesListMarker().$listName, "", $arr));
};





/**
**name PKG_deletePackagesList($listName)
**description deletes a packages list
**parameter listName: name of the list to delete
**/
function PKG_deletePackagesList($listName)
{
	PKG_savePackagesList($listName,"",true);
};





/**
**name PKG_addNormalJob($client, $packageName, $priority = 25)
**description Adds a normal package to the installation queue.
**parameter client: the name of the client, the jobs are for
**parameter packageName: name of the normal package
**parameter priority: The priority of the job.
**/
function PKG_addNormalJob($client, $packageName, $priority = 25)
{
	$options = CLIENT_getAllOptions($client);
	$distr = $options['distr'];

	if (!empty($distr))
		include_once("/m23/inc/distr/$distr/packages.php");

	PKG_addStatusJob($client,"m23normal",$priority,$packageName,"waiting");
};
?>