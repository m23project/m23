<?php


define('DIR_M23APTCACHE', ($_SESSION['m23Shared'] ? "/m23/var/cache/m23apt/".m23SHARED_getCustomerNr() : "/m23/var/cache/m23apt"));





/**
**name PKG_ncTarDebsFromClientToServer_Client()
**description Client to send the Debian packages to the m23 client.
**/
function PKG_ncTarDebsFromClientToServer_Client()
{
	$serverIP = getServerIP();

	echo("
	echo \"\n\nStarting copying of the Debian packages in 15 seconds ...\"
	for cnt in 15 14 13 12 11 10 9 8 7 6 5 4 3 2 1
	do
		echo \"Time to wait \$cnt second(s)\"
		sleep 1
	done

	cd /var/cache/apt/archives
	tar c *.deb | nc -q 15 $serverIP 654321
	");
}





/**
**name PKG_ncTarDebsFromClientToServer_Server($poolDir)
**description Starts a server to receive the Debian packages from an m23 client.
**parameter poolDir: The directory on the server to store the Debian packages.
**/
function PKG_ncTarDebsFromClientToServer_Server($poolDir)
{
	$logFile = "$poolDir/aptDownload.log";
	
	return("
	cd \"$poolDir\"
	nc -w 30 -l -p 654321 | tar xv 2>&1 | tee -a '$logFile'
	");
}





/**
**name PKG_rsyncDebsFromClientToServer($clientIP, $poolDir)
**description Copies all the Debian packages from a client to a given directory on the server via rsync.
**parameter clientIP: The IP of the client.
**parameter poolDir: The directory on the server to store the Debian packages.
**/
function PKG_rsyncDebsFromClientToServerRaus($clientIP, $poolDir)
{
	$logFile = "$poolDir/aptDownload.log";

	$cmds = "
	false
	while [ $? -ne 0 ]
	do
		rsync -e 'ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no -o VerifyHostKeyDNS=no' -Py root@$clientIP:/var/cache/apt/archives/*.deb \"$poolDir\" 2>&1 | tee -a '$logFile'
	done
	";

	return($cmds);
}





/**
**name PKG_preparePool($release, $distr, $arch, $poolName, $poolDir)
**description Generates the needed configuration file for reprepro.
**parameter release: Release of the pool.
**parameter distr: Distribution of the pool.
**parameter arch: Architecture of the pool (POOL_ARCH_I386 or CPoolLister::POOL_ARCH_AMD64).
**parameter poolName: Name of the pool (if a pool with the given name exists => load)
**parameter poolDir: Directory of the pool with full path.
**/
function PKG_preparePool($release, $distr, $arch, $poolName, $poolDir)
{
	//Set the directory for storing the config files for reprepro
	$confDir = "$poolDir/conf";

	if (!is_dir($confDir))
		mkdir($confDir);

	$version = DISTR_releaseVersionTranslator($release);

	$confFile=fopen("$confDir/distributions","w");
	fwrite($confFile,"Origin: $distr
Label: $poolName
Suite: $release
Codename: $release
Version: $version
Architectures: $arch source
Components: main non-free contrib
Description: m23 pool
");

	fclose($confFile);
}





/**
**name PKG_convertPackagesToRepository($poolDir, $logFile, $poolName, &$sourceslist)
**description Generates commands for creating a package source from packages stored in one directory.
**parameter poolDir: Complete path to the directory that stores the pool.
**parameter logFile: File (with full path) to store the pool generation log in.
**parameter poolName: Name of the pool.
**parameter sourceslist: Variable to store the sources list in.
**returns Commands for creating a package source from packages stored in one directory.
**/
function PKG_convertPackagesToRepository($poolDir, $logFile, $poolName, &$sourceslist)
{
	$serverIP = getServerIP();

	//Generate commands for transforming the downloaded packages to a pool
	$cmds = '
	#Jump to the pool directory
	cd "'.$poolDir.'"

	#Move all Debian packages to the pool directory
	find . -iname "*.deb" -type f -exec mv {} . \; | 2>&1 tee -a "'.$logFile.'"

	#Remove all (maybe existing) unneeded files
	rm *.gif *.htm* Packages.* 2> /dev/null
	touch tempmkpackages

	#Make the Packages index file (and generate compressed versions)
	dpkg-scanpackages -m . tempmkpackages | grep -v "Depends: $" | sed \'s/%/%25/g\'> Packages
	gzip -c Packages > Packages.gz
	bzip2 -k Packages
	rm tempmkpackages

	#Create a Releases file
	apt-ftparchive release -o APT::FTPArchive::Release::Origin=m23 -o APT::FTPArchive::Release::Suite=stable .  > Release

	chmod 755 -R .
	';

	//Write the sources.list to the variable
	$sourceslist = "#mirror: http://$serverIP/pool/$poolName
deb http://$serverIP/pool/$poolName ./\n";

	return($cmds);
}





/**
**name PKG_fastGetInstalledPackages($storeFile="")
**description Gets a list of all installed packages (faster than dpkg --get-selections).
**parameter storeFile: File name to store the list of installed on the client or empty if the list should be outputted to stdout.
**/
function PKG_fastGetInstalledPackages($storeFile="")
{
	if (!empty($storeFile))
		$storeFile = " > $storeFile";

	echo("
	grep -B1 \"install ok installed\" /var/lib/dpkg/status | grep \"Package: \" | cut -d' ' -f2 | sort -u $storeFile
	");
}





/**
**name PKG_fastGetNewInstalledPackages($oldStatusFile, $oldStatusFile, $storeFile="")
**description Gets new installed packages by comparing status files (before and after the installation).
**parameter oldStatusFile: File with the list of all installed packages before the installation of the new packages
**parameter newStatusFile: File with the list of all installed packages after the installation of the new packages
**parameter storeFile: File name to store the list of new installed on the client.
**/
function PKG_fastGetNewInstalledPackages($oldStatusFile, $newStatusFile, $storeFile="")
{
	if (!empty($storeFile))
		$storeFile = " > $storeFile";

	echo("
	diff $oldStatusFile $newStatusFile | grep \">\" | cut -d' ' -f2 $storeFile
	");
}





/**
**name PKG_searchFor($key,$distr,$packagesource,$arch="")
**description searches for a package and returnes a file descriptor
**parameter key: search key
**parameter distr: the distribution name
**parameter packagesource: name of the package source
**parameter arch: Array of architectures to get package infos for.
**/
function PKG_searchFor($key,$distr,$packagesource,$archs=array()) //deb-specific
{
	$packageInfoDir = DIR_M23APTCACHE."/$distr/$packagesource";

	$tempFile = uniqid('/m23/tmp/PKG_searchFor');

	//Generate the default command with implicit architecture of the m23 server
	$cmd = "sudo apt-cache search -o=Dir::Cache::archives='$packageInfoDir/archivs' -o=Dir::State::status='$packageInfoDir/status' -o=Dir::State='$packageInfoDir' -o=Dir::Etc::sourceparts='/dev/null' -o=Dir::Etc::Parts='$packageInfoDir/apt.conf.d' -o=Dir::Etc::PreferencesParts='$packageInfoDir/preferences.d' -o=Dir::Etc::sourcelist='$packageInfoDir/sources.list' $key > $tempFile";
	
	//Run thru the architetures of the sources list
	foreach ($archs as $arch)
	{
		//Update the package info for the architecture
		$logFile = PKG_updatePackageInfo($distr,$packagesource,false, $arch);
	
		if ($logFile!=false)
		{
			$archOption = PKG_getAptArchOptions($arch);

			//Add a command with explicit architecture setting
			$cmd .= "; sudo apt-cache search -o=Dir::Cache::archives='$packageInfoDir/archivs' -o=Dir::State::status='$packageInfoDir/status' -o=Dir::State='$packageInfoDir' $archOption -o=Dir::Etc::sourceparts='/dev/null' -o=Dir::Etc::Parts='$packageInfoDir/apt.conf.d' -o=Dir::Etc::PreferencesParts='$packageInfoDir/preferences.d' -o=Dir::Etc::sourcelist='$packageInfoDir/sources.list' $key >> $tempFile";
		}

	}

	//Sort the output and make them unique
	$cmd .= "; sort -u $tempFile; rm $tempFile";

	$file=popen($cmd, "r");

	return($file);
};





/**
**name PKG_getDescription($line)
**description gets the description of a package
**parameter line: line containing package name and description
**/
function PKG_getDescription($line) //deb-specific
{
	$package_description=explode(" - ",$line);
	return($package_description[1]);
};





/**
**name PKG_getPackageName($line)
**description gets the name of a package
**parameter line: line containing package name and description
**/
function PKG_getPackageName($line) //deb-specific
{
	$package_description=explode(" - ",$line);
	return($package_description[0]);
};





/**
**name PKG_getPackageDescriptionSize($distr,$packagesource,$package)
**description Returnes the description and size of a package
**parameter distr: the name of the distribution
**parameter packagesource: the name of the package source list
**parameter package: name if the package
**/
function PKG_getPackageDescriptionSize($distr,$packagesource,$package) //deb-specific
{
	$packageInfoDir = DIR_M23APTCACHE."/$distr/$packagesource";

	$cmd = "sudo apt-cache show --no-all-versions -o=Dir::Cache::archives=$packageInfoDir/archivs -o=Dir::State::status=$packageInfoDir/status -o=Dir::State=$packageInfoDir -o=Dir::Etc::sourceparts='/dev/null' -o=Dir::Etc::Parts='$packageInfoDir/apt.conf.d' -o=Dir::Etc::PreferencesParts='$packageInfoDir/preferences.d' -o=Dir::Etc::sourcelist=$packageInfoDir/sources.list $package | awk '

#Reset all values
BEGIN {
	description=\"\"
	size=\"\"
	searchDescr=0
}

#Parse the name tag
function output()
{
	#Check if there is a package name to be given out
	print(description\"###\"size)
}

#End parsing the description?
/^[^:]*: / {
	searchDescr=0
}

#Start parsing the description?
/^Description/ {
	searchDescr=1
	gsub(/Description[^:]*: /,\"\",$0);
}

#Add lines, if belonging to the description
{
	if (searchDescr==1) {
		description=description$0
	}
}

#Get the installed size of the package
/^Installed-Size: / {
	#Remove all before the installed size
	gsub(/Installed-Size: /,\"\",$0);
	#The actual size is left
	size=$0
}

#Get the name of the package
END {
	output()
}'";

	$file=popen($cmd, "r");
	$line=fgets($file,50000);
	pclose($file);
	return($line);
};





/**
**name PKG_printStatus($distr,$packagesource))
**description prints the package status, e.g. amount of packages,...
**parameter distr: the name of the distribution
**parameter packagesource: the name of the package source list
**/
function PKG_printStatus($distr,$packagesource) //deb-specific
{
	$packageInfoDir = DIR_M23APTCACHE."/$distr/$packagesource";
	$cmd = "sudo apt-cache stats -o=Dir::Cache::archives=$packageInfoDir/archivs -o=Dir::State::status=$packageInfoDir/status -o=Dir::State=$packageInfoDir -o=Dir::Etc::sourceparts='/dev/null' -o=Dir::Etc::Parts='$packageInfoDir/apt.conf.d' -o=Dir::Etc::PreferencesParts='$packageInfoDir/preferences.d' -o=Dir::Etc::sourcelist=$packageInfoDir/sources.list";

	$file=popen($cmd, "r");
	for ($i=0; ($i < 6) && (!feof($file)); $i++)
		{
			$varname_value=explode(": ",fgets($file,10000));
			$varname=$varname_value[0];
			$value=$varname_value[1];
			echo("<tr><td>$varname</td><td>$value</td></tr>");
		}
	pclose($file);
};





/**
**name PKG_listPackages($key,$distr="debian",$packagesource, $client="", $completeDescription = false)
**description list packages matching the key
**parameter key: search key
**parameter distr: the distribution name
**parameter packagesource: name of the package source
**parameter client: Name of the client the packages are searched for. (Not used here and only for halfSister)
**parameter completeDescription: If set to true, the full package description and sizes are fetched (time consuming)
**/
function PKG_listPackages($key,$distr="debian",$packagesource, $client="", $completeDescription = false) //deb-specific
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	$archs = SRCLST_getArchitectures($packagesource);

	//start search
	$file = PKG_searchFor($key,$distr,$packagesource,$archs);

	//there was an error updating the sources list
	if (!$file)
		return(false);

	$i=0;
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

	

	while (!feof($file))
	{//read the pipe and split
		$package_description=explode(" - ",PKG_getNextPackage($file));
		//if we don't get a new package name break
		if (empty($package_description[0]))
			break;
		//generate checkbox name
		$cbName="CB_pkg".$i;
		$i++;

		if (($i % 2) == 0)
			$class = 'class="evenrow"';
		else
			$class = 'class="oddrow"';
			

		//Get the full package description and sizes (or not)
		if ($completeDescription)
		{
			$temp = PKG_getPackageDescriptionSize($distr,$packagesource,$package_description[0]);
			$descriptionSize = explode('###',$temp);
		}
		else
		{
			$descriptionSize[0] = $package_description[1];
			$descriptionSize[1] = 0;
		}

		//print the line
		echo("
		<tr $class>
			<td>".$package_description[0]."</td>
			<td>".number_format((float)$descriptionSize[1]/1024,2)." MB</td>
			<td>".wordwrap(htmlentities($descriptionSize[0]),60,"<br>",1)."</td>
			<td><center><input type=\"checkbox\" name=\"$cbName\" value=\"".$package_description[0].'###'.$descriptionSize[1]."\"></center></td>
		</tr>");
	};

	//close search
	PKG_closeSearch($file);
	HTML_showTableEnd();
	return($i);
};





/**
**name PKG_getAptArchOptions($arch)
**description Generates options to specify the architecture of a client that can be appended to an apt-get line.
**parameter arch: Architecture to get package infos for.
**returns: Parameter for architecture specific apt-get commands, if architecture is not i386.
**/
function PKG_getAptArchOptions($arch)
{
// 	Make sure that the architecture doesn't contain a line break at the end.
	$arch = trim($arch);

	if (!empty($arch))
		return("-o=APT::Architecture=$arch");
	else
		return("");
}





/**
**name PKG_addAPTConfigFiles($sourceName, $dir)
**description Creates the config files for the package manager on the m23 server.
**parameter sourceName: The name of the package source list
**parameter dir: The directory on the m23 server where the config files should be created.
**/
function PKG_addAPTConfigFiles($sourceName, $dir)
{
	//Get the list of files to add
	$atf = SRCLST_getAddToFile($sourceName);

	//If the first entry has no file name, then nothing of value is in it
	if (!isset($atf[0]['file']))
		return(false);

	//Run thru the file names and texts
	foreach ($atf as $fileText)
	{
		foreach (array('apt.conf.d', 'preferences.d') as $confDir)
		{
			if (strpos($fileText['file'], $confDir) !== false)
			{
				$file = "$dir/$confDir/".basename($fileText['file']);
				exec("rm '$file'; cat >> '$file' << \"EOF\"
$fileText[text]
EOF");
			}
		}
	}
}





/**
**name PKG_preparePackageDir($dir,$packagesource,$logFile="",$returnCmd=false,$arch,$sourceName=false)
**description creates the needed files + sources list in a directory to use it for "local apt".
**parameter dir: the directory to prepare
**parameter packagesource: sources list
**parameter logFile: Name of the file the messages from apt-get should be written to.
**parameter returnCmd: Set to true, if the apt command should be returned or to false to execute it in this function.
**parameter arch: Architecture to get package infos for.
**parameter sourceName: The name of the package source list
**returns: Error text on error or empty string on success.
**/
function PKG_preparePackageDir($dir,$packagesource,$logFile="",$returnCmd=false,$arch,$sourceName=false)
{
	if (empty($logFile))
		$logFile = "$dir/aptUpdate.log";

	$archOption = PKG_getAptArchOptions($arch);

	//create the package directory if it doesn't exist
	if (!file_exists($dir))
		exec("mkdir -p $dir");

	foreach(array("$dir/lists/partial", "$dir/apt.conf.d", "$dir/archivs/partial", "$dir/preferences.d") as $testDir)
	{
		if (!file_exists($testDir))
			exec("mkdir -p '$testDir'");
	}

	if (!file_exists("$dir/lists/lock"))
		exec("touch '$dir/lists/lock'");

	if (!file_exists("$dir/status"))
		exec("touch '$dir/status'");

	//if there is no sources.list, generate it from the db
	if (!file_exists("$dir/sources.list"))
	{
		exec("cat >> '$dir/sources.list' << \"EOF\"
$packagesource\ndeb http://127.0.0.1/extraDebs/ ./
EOF");
	};

	if ($sourceName !== false)
		PKG_addAPTConfigFiles($sourceName, "$dir");

	//update the package information
	$cmd = "export LANG=\"C\"; sudo apt-get update -o=Dir::Cache::archives='$dir/archivs' -o=Dir::State::status='$dir/status' -o=Dir::State='$dir' $archOption -o=Dir::Etc::sourceparts='/dev/null' -o=Dir::Etc::Parts='$dir/apt.conf.d' -o=Dir::Etc::PreferencesParts='$dir/preferences.d' -o=Dir::Etc::sourcelist='$dir/sources.list' &> '$logFile'";


	if ($returnCmd)
		return($cmd);

	SERVER_runInBackground('PKG_preparePackageDir',$cmd,HELPER_getApacheUser(),false);

	$errMsg="";

	$FILE=fopen("$logFile","r");
	if ($FILE === false)
		return("");

	$printErr=false;

	while (!feof($FILE))
		{
			$line=fgets($FILE,10000);
			$errMsg.=$line;

			//if (!$printErr && ((substr_count($line,"Err ") > 0) && (substr_count($line,"Release") == 0)))
			if (!$printErr && (substr_count($line,"Err ") > 0) && (preg_match("|Err(.*)Release|",$line) == 0))
				$printErr = true;
		};


	fclose($FILE);
	if ($printErr)
		return($errMsg);
	else
		return("");
};





/**
**name PKG_updatePackageInfo($distr,$packagesource, $force=false, $arch="")
**description updates the package information to make it searchable
**parameter distr: the distribution name
**parameter packagesource: name of the package source
**parameter force: set to true if you want to update the package info and the time is not over
**parameter arch: Architecture to get package infos for.
**/
function PKG_updatePackageInfo($distr,$packagesource, $force=false, $arch="")
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$dir = DIR_M23APTCACHE."/$distr/$packagesource";

	if (!is_dir($dir))
		exec("mkdir -p $dir");

	if ((!file_exists("$dir/sources.list")) ||(SRCLST_packageInformationOlderThan(15,$distr,$packagesource)) || $force)
		{
			$logFile = "/m23/tmp/update$packagesource.log";
			$errMsg=PKG_preparePackageDir($dir,SRCLST_loadSourceList($packagesource),$logFile,false,$arch,$packagesource);

			if (strlen($errMsg)>0)
				{
					MSG_showError("$I18N_packageSourceName: <b>$packagesource</b><br>
					$I18N_sourceslist_update_error<br>".
					nl2br($errMsg)."<br>$I18N_checkYourPackageSource",$GLOBALS["m23_language"]);
					return(false);
				}
				else
					return($logFile);
		}
		else
			return(true);
};





/**
**name PKG_previewInstall($clientName,$distr,$packagesource,$packages)
**description shows what happens if packages get installed
**parameter clientName: name of the client
**parameter distr: the distribution name
**parameter packagesource: name of the package source
**parameter packages: the packages to be installed
**parameter aptCommand: sets the apt-get command: install, remove
**/
function PKG_previewInstallDeinstall($clientName,$distr,$packagesource,$packages,$aptCommand)
{
	$packageInfoDir = DIR_M23APTCACHE."/$distr/$packagesource";

	$clientStatusFile="/m23/var/cache/clients/$clientName/packageStatus";

	$arch = CLIENT_getOption($clientName, 'arch');
	PKG_updatePackageInfo($distr,$packagesource, $arch);

	$archOption = PKG_getAptArchOptions($arch);

	$cmd = "LC_ALL=\"C\"; echo \"n\" | sudo apt-get -s --force-yes -y $aptCommand -o=Dir::Cache::archives='$packageInfoDir/archivs' -o=Dir::State::status='$clientStatusFile' $archOption -o=Dir::State='$packageInfoDir' -o=Dir::Etc::sourceparts='/dev/null' -o=Dir::Etc::Parts='$packageInfoDir/apt.conf.d' -o=Dir::Etc::PreferencesParts='$packageInfoDir/preferences.d' -o=Dir::Etc::sourcelist='$packageInfoDir/sources.list' -u -q $packages 2>&1 | grep -v \"Abort.\"";

	$pin = popen($cmd,"r");

	$out="";

	while (!feof($pin))
		{
			$line=fgets($pin,10000);

			//print important lines in bold font
			if ((strstr($line,"following packages")) ||
				(strstr($line,"extra packages")) ||
				(strstr($line,"Suggested packages")) ||
				(strstr($line,"NEW packages")) ||
				(strstr($line,"upgraded,")) ||
				(strstr($line,"of archives")) ||
				(strstr($line,"After unpacking")))
				$out.="<b>$line</b>";
			else
				$out.=$line;
		};

	pclose($pin);

	return(nl2br($out));
};





/**
**name PKG_getKernels($distr,$packagesource,$arch)
**description Generates an associative array with the available kernels for an architecture and distribution as keys and values.
**parameter distr: the distribution name
**parameter packagesource: name of the package source
**parameter arch: Architecture to get package infos for.
**returns Asssociative array with the available kernels for an architecture and distribution as keys and values.
**/
function PKG_getKernels($distr,$packagesource,$arch)
{
	$nr=0;

	foreach (array("linux image", "kernel image") as $kernelSearchKeywords)
	{
		$file = PKG_searchFor($kernelSearchKeywords, $distr, $packagesource, array($arch));

		if ($file === FALSE)
			continue;

		while (!feof($file))
		{
			//read the pipe and split
			$package_description=explode(" - ",PKG_getNextPackage($file));

			//if we don't get a new package name break
			if (empty($package_description[0]))
				break;

			if ((strlen($package_description[0])>0) &&
				((strstr($package_description[0],"-image"))))
				{
					$temp=explode("-",$package_description[0]);

					$fullVersionNr=$temp[2]."-".$temp[3];
					//$fullVersionNr=2.6.9-5

					$temp=explode("-",$fullVersionNr);
					$patchLevel=$temp[1];
					//$patchLevel=5
					$temp=$temp[0];
					$temp=explode(".",$temp);
					$major=$temp[0];
					//$major=2
					$minor=$temp[1];
					//$minor=6
					$extra=$temp[2];
					//$minor=9
				
					//fill with leading '0' to make every number 6 digits long
					if (strlen($patchLevel) > 6)
						$patchLevel="000000";
					else
						$patchLevel=str_repeat("0",6-strlen($patchLevel)).$patchLevel;
					
					if (strlen($major) > 6)
						$major="000000";
					else
						$major=str_repeat("0",6-strlen($major)).$major;
					$minor=str_repeat("0",6-strlen($minor)).$minor;
					$extra=str_repeat("0",6-strlen($extra)).$extra;
	
					//store the full version number + appended file name in the array
					$list[$nr]="$major$minor$extra$patchLevel###$package_description[0]";
					$nr++;
				};
		};
	}
	
	$list = array_unique($list);

	if (is_array($list))
		{
			rsort($list);

			for ($i=0; $i < count($list); $i++)
				{
					$temp=explode("###",$list[$i]);
					$out[$temp[1]] = $temp[1];
				};
		};

	//close search
	PKG_closeSearch($file);

	return($out);
};





/**
 **name PKG_translateClientPackageStatus($status)
 **description translates the package status to human language ;)
 **parameter status: status code you want to translate
 **/
 function PKG_translateClientPackageStatus($status)
 {
  include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

  $fail0=$fail1=false;

  switch($status[0])
	{
		case "u": $msg=$I18N_unknown; break;
		case "i": $msg=$I18N_install; break;
		case "r": $msg=$I18N_remove; break;
		case "p": $msg=$I18N_purge; break;
		default: $fail0=true;
	}

  switch($status[1])
	{
		case "n": $msg.=" / ".$I18N_not_installed; break;
		case "i": $msg.=" / ".$I18N_installed; break;
		case "c": $msg.=" / ".$I18N_config_files; break;
		case "u": $msg.=" / ".$I18N_unpacked; break;
		case "f": $msg.=" / ".$I18N_failed_config; break;
		case "h": $msg.=" / ".$I18N_half_installed; break;
		default: $fail1=true;
	}

	if ($fail0 && $fail1)
		return($I18N_not_installed);
		else
		return($msg);
 };





 /**
 **name PKG_isInstalled($status)
 **description checks if a package is installed depending on the status
 **parameter status: the status to be checked
 **/
 function PKG_isInstalled($status)
 {
 	return($status[1]=="i");
 };





/**
**name PKG_downloadPool($destDir, $sourceslist, $packagesArr, $arch, $release)
**description Generates commands to download packages from a sources list to a directory.
**parameter destDir: the directory the packages should be downloaded to
**parameter sourceslist: package source list
**parameter packagesArr: array of the lists that contain packages to download (seperated by blanks)
**parameter arch: CPU architecture to download the packages for.
**parameter release: Select the Debian/Ubuntu suite (squeeze, sarge, sid, precise).
**/
function PKG_downloadPool($destDir, $sourceslist, $packagesArr, $arch, $release)
{
	$logFile = "$destDir/aptDownload.log";
	
	$fktName = uniqid('aptdl');
	$retFile = uniqid('/tmp/PKG_downloadPoolRet');

	$prepareCmd=PKG_preparePackageDir($destDir,$sourceslist,$logFile,true,$arch);

	$archOption = PKG_getAptArchOptions($arch);

	$aptCmd="
	export http_proxy=\"http://127.0.0.1:2323\"
	export ftp_proxy=\"http://127.0.0.1:2323\"
	
	$fktName()
	{
		sudo rm lock
		echo \"PID:\$\$\" >> $logFile
		
		(sudo apt-get install -d -y -f --force-yes --ignore-missing -o=APT::Get::Fix-Missing=true -o=APT::Force-LoopBreak=true -o=APT::Get::Fix-Broken=true -o=Dir::Cache::'archives=$destDir/archivs' -o=Dir::State::status='$destDir/status' -o=Dir::State='$destDir' -o=Dir::Etc::sourceparts='/dev/null' -o=Dir::Etc::Parts='$destDir/apt.conf.d' -o=Acquire::http::Proxy='http://127.0.0.1:2323' -o=Acquire::ftp::Proxy='http://127.0.0.1:2323' -o=Acquire::Retries=5 -o=Dir::Etc::PreferencesParts='$destDir/preferences.d' -o=Dir::Etc::sourcelist='$destDir/sources.list' $archOption \$@; echo $? > $retFile) 2>&1 | tee -a '$logFile'
		return $(cat $retFile)
	}\n";
	
	
	foreach ($packagesArr as $packages)
	{
		$argsA = explode(' ', $packages);
		$aptCmd .= HELPER_xargsRecursive($fktName, $argsA);
	}


	//Get the file name (with full path) of the debootstrap cache file
	$debootstrapCacheFileOnServer = PKG_getDebootstrapCacheServerFile($release, $arch);

	//Check, if it exists
	if (!file_exists($debootstrapCacheFileOnServer))
	{
		//Get the URL where to download it from SourceForge
		$debootstrapCacheFileURL = PKG_getDebootstrapCacheSfURL($release, $arch);

		//Download the file and adjust access rights.
		$debootstrapCacheFileDownloadCmd = "\nsudo wget $debootstrapCacheFileURL -O $debootstrapCacheFileOnServer; sudo chmod 755 $debootstrapCacheFileOnServer\n";
	}

	$cmds="export LANG=\"C\"
	sudo rm -f $logFile

	$prepareCmd

	$aptCmd

	$debootstrapCacheFileDownloadCmd

	sudo chmod 755 $destDir -R
	";

	return($cmds);
};





/**
**name PKG_getDebootStrapBasePackages($release)
**description Returns the list of base packages that are downloaded by debootstrap for a special release.
**parameter release: release name of the distribution version (e.g. sarge)
**/
function PKG_getDebootStrapBasePackages($release)
{
	//make sure the directory exists
	$storDir="/m23/inc/distr/baseSysFileLists";
	$storFile="$storDir/$release";

	//return the contents of the chached file if it exists
	if (file_exists($storFile))
		return(HELPER_getFileContents($storFile));

	//Make sure the directory exists
	if (!is_dir($storDir))
		mkdir($storDir);

	exec("debootstrap --print-debs $release /tmp/debootstrap.tmp > $storFile");

	//check, if it worked
	if (file_exists($storFile) && (filesize($storFile) > 0))
		return(HELPER_getFileContents($storFile));
	else
	{
		SERVER_deleteFile($storFile);
		return(false);
	}
}





function convertPackagesToRepositoryALT()
{
	$poolDir = $this->getPoolDir();
	$serverIP = getServerIP();
	$release = $this->getPoolRelease();
	$archivPath = "archivs/";
	$logFile = $this->getConvertPackagesToRepositoryLogName();
	$poolName = $this->getPoolName();

	//write sources list for this pool
	$sourceslist = "#mirror: http://$serverIP/pool/$poolName
deb http://$serverIP/pool/$poolName/ $release main non-free contrib\n";
	
	$this->setPoolSourceslist($sourceslist);

	//making links from the existing distr directory to all known releases
	include_once("/m23/inc/distr/debian/clientConfig.php"); //needed for CLCFG_getDebianReleasesGeneric
	$linkReleases="";
	foreach (CLCFG_getDebianReleasesGeneric("debian") as $linkRelease)
		$linkReleases.="echo 'ln -s `sudo find $poolDir/dists -maxdepth 1 -mindepth 1 -type d` $poolDir/dists/$linkRelease'\n";

	$cmds="
	cd $poolDir
	echo \"cd $poolDir\"
	rm -f $logFile
	find $archivPath/ -type f | grep deb\$ | awk '{system(\"reprepro -Vb . includedeb $release \"$0\" 2>&1 | tee -a $logFile\")}'
	find /mdk/m23Debs/debs -type f | grep deb\$ | grep -v woody | awk '{system(\"reprepro -Vb . includedeb $release \"$0\" 2>&1 | tee -a $logFile\")}'
	sudo rm -f archivs/*
	$linkReleases

	#Fix the Packages files
	for pfile in `find \"$poolDir\" | grep \"/Packages\$\"`
	do
		#e.g. /m23/data+scripts/pool/mb/dists/etch/main/binary-i386
		dir=`dirname \$pfile`
		cd \"\$dir\"
		echo \"dir: \$dir\"
		
		#remove all empty Depends lines from Packages
		sed '/Depends: \$/d' Packages > Packages2
		
		#Check if there were lines removed
		diff -q Packages Packages2
		if [ \$? -eq 0 ]
		then
			echo \"No changes in \$dir\"
			continue
		fi
	
		#move Packages
		cat Packages2 > Packages
		rm Packages.gz Packages2
	
		#Create compressed version
		gzip -c Packages > Packages.gz
	
		#calculate sizes and MD5 sums of Packages and the compressed Packages.gz
		m=`md5sum Packages | cut -d' ' -f1`
		s=`find Packages -printf \"%s\"`
		mgz=`md5sum Packages.gz | cut -d' ' -f1`
		sgz=`find Packages.gz -printf \"%s\"`
	
		#jump to the directory that stores the global Releases file with sizes and hashes
		#e.g. /m23/data+scripts/pool/mb/dists/etch
		cd ..
		cd ..
		releaseDir=`pwd`
		echo \"releaseDir: \$releaseDir\"
	
		#Remove the release directory from the complete path
		# e.g. main/binary-i386
		strippedReleaseDir=`echo \$dir | sed \"s*\$releaseDir**g\" | sed \"s*/**\"`
		echo \"strippedReleaseDir: \$strippedReleaseDir\"
	
		#convert / to \/ for sed's syntax
		strippedReleaseDirSED=`echo \$strippedReleaseDir | sed 's#\/#\\\/#g'`
	
		#remove the lines that contain the Packages and Packages.gz entries for 
		sed \"/\$strippedReleaseDirSED/d\" Release > /tmp/Release
		echo \" \$m \$s \$strippedReleaseDir/Packages\" >> /tmp/Release
		echo \" \$mgz \$sgz \$strippedReleaseDir/Packages.gz\" >> /tmp/Release
	
		cat /tmp/Release > Release
		rm /tmp/Release
	done

	#fixing code to correct Release files that are missing the information stored in conf/distributions
	for releasefile in `find \"$poolDir\" | grep Release | grep \"/dists/\"`
	do
		if [ `grep -c Origin: \"\$releasefile\"` -eq 0 ]
		then
			echo \"fixing: \$releasefile\"
			cat \"$poolDir/conf/distributions\" > /tmp/fixedRelease
			echo \"MD5Sum:\" >> /tmp/fixedRelease
			cat  \"\$releasefile\" >> /tmp/fixedRelease
			cat /tmp/fixedRelease > \"\$releasefile\"
			#rm /tmp/fixedRelease
		fi
	done
	";

	SERVER_runInBackground('convertPackagesToRepository', $cmds,HELPER_getApacheUser(),true);
}
?>