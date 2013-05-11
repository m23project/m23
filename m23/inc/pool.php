<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions for administrating package pools
$*/





/**
**name POOL_selectPoolType()
**description shows buttons for selecting the type of pool and returns the pressed button
**/
function POOL_selectPoolType()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$out=$_POST['poolType'];
	if (isset($_POST['BUT_cdPool']))
		$out="cd";
	elseif (isset($_POST['BUT_downloadPool']))
		$out="dl";

	if (empty($out))
		{
			echo "<INPUT type=\"submit\" name=\"BUT_cdPool\" value=\"$I18N_CDPool\">
			<INPUT type=\"submit\" name=\"BUT_downloadPool\" value=\"$I18N_downloadPool\">";
		}

	echo("<input type=\"hidden\" name=\"poolType\" value=\"$out\">");

	return($out);
};





/**
**name POOL_getPools()
**description returns an array with all pool names
**/
function POOL_getPools()	// -> OOP
{
	if (!file_exists("/m23/data+scripts/pool"))
		mkdir("/m23/data+scripts/pool");

	$i=0;
	$pin=popen("cd /m23/data+scripts/pool/; find -type d -mindepth 1 -maxdepth 1 | sed 's/^\.\///g'","r");
	while ($pool=fgets($pin))
		$pools[$i++]=trim($pool);
	pclose($pin);
	return($pools);
};





/**
**name POOL_showLoadDeleteCreate($poolName)
**description shows a dialog for loading, deleting and creating a pool
**parameter poolName: name of the pool
**/
function POOL_showLoadDeleteCreate($poolName)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	if (file_exists("/m23/tmp/copyPoolPackages.sh"))
		unlink("/m23/tmp/copyPoolPackages.sh");

	HTML_showTableHeader();
	
	if (empty($poolName))
		$poolName=false;
	else
	{
		if (POOL_getProperty($poolName,"type")=="cd")
			$preselectPool="cd";
		else
			$preselectPool="download";

		$preselectArch=POOL_getProperty($poolName,"arch");
	}

	$poolList['cd'] = $I18N_CDPool;
	$poolList['download'] = $I18N_downloadPool;
	$poolType = HTML_selection("RB_pooltype",$poolList,SELTYPE_radio,true,$preselectPool);

	$archList['i386']="i386";
	$archList['amd64']="amd64";
	HTML_selection("RB_arch",$archList,SELTYPE_radio,true,$preselectArch);
	

	echo("
	<tr><td colspan=\"4\"><span class=\"title\">$I18N_createPool</span></td></tr>
	<tr>
		<td><span class=\"subhighlight\">$I18N_poolName</span></td>
		<td><span class=\"subhighlight\">$I18N_poolType</span></td>
		<td><span class=\"subhighlight\">$I18N_arch</span></td>
		<td></td>
	</tr>
	<tr>
		<td>
			<INPUT type=\"text\" name=\"ED_poolname\" size=\"20\" maxlength=\"75\">
		</td>
		<td>
			".RB_pooltype."
		</td>
		<td>
			".RB_arch."
		</td>
		<td>
			<INPUT type=\"submit\" name=\"BUT_addPool\" value=\"$I18N_add\">
		</td>
	</tr>
	<tr><td colspan=\"4\"><br></td></tr>
	<tr><td colspan=\"4\"><span class=\"title\">$I18N_existingPool</span></td></tr>
	<tr>
		<td><span class=\"subhighlight\">$I18N_poolName</span></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>
			".HTML_listSelection("SEL_poolname",POOL_getPools(),$poolName)."
		</td>
		<td colspan=\"2\"></td>
		<td>
			<INPUT type=\"submit\" name=\"BUT_loadPool\" value=\"$I18N_load\"><br><br>
			<INPUT type=\"submit\" name=\"BUT_deletePool\" value=\"$I18N_delete\">
		</td>
	</tr>
	<tr><td colspan=\"4\"><hr></td></tr>
	<tr><td colspan=\"4\"><span class=\"title\">$I18N_usedPool: $poolName</span></td></tr>
	<tr><td colspan=\"4\"><span class=\"subhighlight\">$I18N_description</span></td></tr>
	<tr>
		<td colspan=\"3\">
		<textarea name=\"TA_description\" cols=\"50\" rows=\"10\">".POOL_getProperty($poolName,"description")."</textarea>
		</td>
		<td valign=\"bottom\">
			<span class=\"subhighlight\">$I18N_poolSize</span><br><br>
			".POOL_getSize($poolName)." MB<br><br>
			<span class=\"subhighlight\">$I18N_poolType</span><br><br>
			".RB_pooltype."<br>
			<span class=\"subhighlight\">$I18N_arch</span><br><br>
			".RB_arch."
			<br><br>
			<center><INPUT type=\"submit\" name=\"BUT_saveChanges\" value=\"$I18N_save\"></center>
		</td>
	</tr>
	<tr><td colspan=\"4\"><span class=\"subhighlight\">$I18N_packageSources</span></td></tr>
	<tr><td colspan=\"4\">
		<textarea readonly cols=\"70\" rows=\"5\">".POOL_getProperty($poolName,"sourceslist")."</textarea></td></tr>
	<tr><td colspan=\"4\" align=\"center\"><INPUT type=\"submit\" name=\"BUT_step1\" value=\"$I18N_nextStep ($I18N_copyPackages / ".$I18N_poolStep["1download"].")\"></td></tr>
	
	");
	
	HTML_showTableEnd();
};





/**
**name POOL_create($poolName,$poolType)
**description creates a new pool directory and type property file
**parameter poolName: name of the pool
**parameter poolType: type of the pool (cd or download)
**parameter poolArch: CPU architecture for the packages
**/
function POOL_create($poolName,$poolType,$poolArch)	// -> OOP
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	if (!(strpos($poolName," ")===false))
	{
		MSG_showError($I18N_blanksArentAllowedInPoolNames);
		return("");
	};

	$baseDir=POOL_getDir("");
	if (!is_dir($baseDir))
		mkdir($baseDir);

	$poolDir=POOL_getDir($poolName);
	if (!is_dir($poolDir))
	{
		mkdir($poolDir);
		POOL_setProperty($poolName,"type",$poolType);
		POOL_setProperty($poolName,"arch",$poolArch);
	};

	return($poolName);
};





/**
**name POOL_setProperty($poolName,$property,$value)
**description sets the contents of a property file
**parameter poolName: name of the pool
**parameter property: name of the pool property
**parameter value: value to write in the pool property file
**/
function POOL_setProperty($poolName,$property,$value)	// -> OOP
{
	if (empty($poolName))
		return(false);

	$poolFile=POOL_getDir($poolName)."/$property.m23pool";
	$file=fopen($poolFile,"w");
	fwrite($file,$value);
	fclose($file);
};





/**
**name POOL_getProperty($poolName,$var)
**description returns the contents of a property file
**parameter poolName: name of the pool
**parameter property: name of the pool property
**/
function POOL_getProperty($poolName,$property)	// -> OOP
{
	if (empty($poolName))
		return("");

	$poolFile=POOL_getDir($poolName)."/$property.m23pool";
	if (file_exists($poolFile))
		{
			$file=fopen($poolFile,"r");
			$out=fread($file,100000);
			fclose($file);
			return($out);
		}
	else
		return("");
};





/**
**name POOL_delete($poolName)
**description deletes a pool
**parameter poolName: name of the pool
**/
function POOL_delete($poolName)	// -> OOP
{
	exec("sudo rm -r ".POOL_getDir($poolName));
};





/**
**name POOL_showReadCD($poolName)
**description shows a dialog for copying the CD contents to the pool
**parameter poolName: name of the pool
**/
function POOL_showReadCD($poolName)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$devices=HELPER_getFdiskMountPoints();

	$firstDevice=$_POST[SEL_device];
	if (empty($firstDevice))
		$firstDevice=POOL_getProperty($poolName,"device");

	$firstDevice=trim($firstDevice);

	POOL_setProperty($poolName,"device",$firstDevice);
	$readLabel=$I18N_readDrive;

	if (file_exists("/m23/tmp/copyPoolPackages.sh"))
	{
		$readLabel=$I18N_checkDriveState;
		$butName="BUT_checkDrive";
		$disabledNext="disabled";
	}
	else
	{
		$readLabel=$I18N_readDrive;
		$butName="BUT_readDrive";
		$disabledNext="";
	};
	
	if (isset($_POST[BUT_readDrive]))
	{
		POOL_readCD($poolName,$firstDevice);
		$readLabel=$I18N_checkDriveState;
		$butName="BUT_checkDrive";
		$disabledNext="disabled";
	};

	HTML_showTableHeader();
	echo("
	<tr>
		<td colspan=\"2\"><span class=\"subhighlight\">$I18N_cdDrive</span></td>
	</tr>
	<tr>
		<td>
			".HTML_listSelection("SEL_device",$devices,$firstDevice)."
		</td>
		<td>
			<INPUT type=\"submit\" name=\"$butName\" value=\"$readLabel\">
		<td>
	</tr>
	<tr>
		<td colspan=\"2\"><INPUT type=\"submit\" name=\"BUT_step5\" value=\"$I18N_nextStep ($I18N_poolStep[5])\" $disabledNext></td>
	</tr>
	<tr>
		<td colspan=\"2\">$I18N_poolSize: ".POOL_getSize($poolName)." MB</td>
	</tr>
	");
	HTML_showTableEnd();
};





/**
**name POOL_readCD($poolName,$firstDevice)
**description copys the CD contents to the pool
**parameter poolName: name of the pool
**parameter mountPoint: the mount point of the CD drive
**/
function POOL_readCD($poolName,$mountPoint)
{
	exec("
	cd ".POOL_getDir($poolName)."
	mkdir archivs
	sudo umount $mountPoint
	sudo mount $mountPoint
	");

	POOL_getCDDistributionRelease($mountPoint,$distr,$release);
	POOL_prepare($poolName,$release,$distr,POOL_getProperty($poolName,"arch"));

	$addCmds="
	sudo eject $mountPoint
	sudo umount $mountPoint
	";

	POOL_makeRepository($poolName, $mountPoint,$addCmds);
};





/**
**name POOL_createExtendedPackageIndex($poolName)
**description creates the Packages* index files for the pool
**parameter poolName: name of the pool
**/
function POOL_createExtendedPackageIndex($poolName)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	/**if (file_exists("/m23/tmp/makePoolPackages.sh"))
		return(false);*/
		
	if (SERVER_runningInBackground("m23poolBuilder"))
		return(false);

	$poolDir=POOL_getDir($poolName);
	
	//set correct permissions, remove old log file and copy m23 packages
	exec("sudo chmod 755 $poolDir -R
	rm -f /m23/tmp/makePoolPackages.log
	sudo rm -f -r $poolDir/pool/main/m23
	cp /mdk/m23Debs/debs $poolDir/pool/main/m23 -r 2>&1 | tee -a /m23/tmp/makePoolPackages.log
	");

	//open the pool builder script file, executing this file will produce the necessary Packages files
	/**$pbfile=fopen("/m23/tmp/makePoolPackages.sh","w");*/

	$serverIP=getServerIP();
	//write sources list for this pool
	$sourceslist="#mirror: http://$serverIP/pool/$poolName\n";

	//write BASH header and set the user to the Apache user after the script start
	$cmds="
	echo \"$I18N_packageIndexCreationStarted\" 2>&1 | tee -a /m23/tmp/makePoolPackages.log
	";

	//get the releases (woody, sarge, sid)
	$pin = popen("cd $poolDir	
	find dists/ -type d -maxdepth 2 | cut -d'/' -f2 | sort -u","r");
	while ($release = fgets($pin))
	{
		$release=trim($release);
		if (empty($release))
			continue;
		
		//all branches seperated by a blank
		$branches="";

		//get the branches for a release (main, contrib, ...)
		$pin2 = popen("cd $poolDir
		find dists/$release/ -type d -maxdepth 2 | cut -d'/' -f3 | sort -u","r");
		while ($branch = fgets($pin2))
		{
			$branch=trim($branch);
			if (empty($branch))
				continue;

			$branches.="$branch ";

			//directory that stores the Debian packages
			$debDir="pool/$branch";
			//directory that will store Packages*
			$listDir="dists/$release/$branch/binary-i386";

			//write the script for one release + branch
			$cmds.="cd $poolDir
			for from in `find | grep '%'`
			do
				to=`echo \$from | sed 's/%3a/./g'`
				mv -f \$from \$to
			done
			rm tempmkpackages -f
			touch tempmkpackages 2>&1 | tee -a /m23/tmp/makePoolPackages.log
			mkdir -p $listDir
			chmod 755 $listDir
			rm $listDir/Packages.bz2 -f 2>&1 | tee -a /m23/tmp/makePoolPackages.log
			dpkg-scanpackages $debDir tempmkpackages | grep -v \"Depends: $\" > $listDir/Packages 2>&1 | tee -a /m23/tmp/makePoolPackages.log
			gzip -c $listDir/Packages > $listDir/Packages.gz 2>&1 | tee -a /m23/tmp/makePoolPackages.log
			bzip2 -k $listDir/Packages 2>&1 | tee -a /m23/tmp/makePoolPackages.log
			rm tempmkpackages -f
			";
		};

		//write sources.list entry for this release and with all braches
		$sourceslist.="deb http://$serverIP/pool/$poolName/ $release $branches\n";

		pclose($pin2);
	};

	pclose($pin);

	//delete the script after execution
	$cmds.="
	echo \"$I18N_packageIndexCreationFinished\" 2>&1 | tee -a /m23/tmp/makePoolPackages.log
	rm -f /m23/tmp/makePoolPackages.sh\n";

	POOL_setProperty($poolName,"sourceslist",$sourceslist);

	/**
	//execute the script in a screen. screen is started as "root", but the script is executed as the Apache user
	exec("chmod +x /m23/tmp/makePoolPackages.sh
	sudo screen -dmS m23poolBuilder su ".HELPER_getApacheUser()." -c /m23/tmp/makePoolPackages.sh");
	*/

	SERVER_runInBackground("m23poolBuilder",$cmds,HELPER_getApacheUser(),true);
};





/**
**name POOL_showCreatePackageIndex()
**description shows information (status of the Packages* generation, sources.list) about the currently generated pool
**/
function POOL_showCreatePackageIndex($poolName)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	if (SERVER_runningInBackground("m23poolBuilder"))
		MSG_showInfo($I18N_packageIndexCreationIsRunning);
	else
		MSG_showInfo($I18N_packageIndexCreationFinished);

	echo("<br>");

	HTML_showTableHeader();
	echo ("
	<tr>
		<td>
			<span class=\"title\">$I18N_packageIndexCreationStatus</span><br>
			<textarea cols=\"100\" rows=\"20\" readonly>");
			HELPER_showFileContents("/m23/tmp/makePoolPackages.log");
			echo("</textarea><br><br><span class=\"title\">$I18N_packageSources</span><br>
			<textarea cols=\"100\" rows=\"5\" readonly>".
			POOL_getProperty($poolName,"sourceslist")
			."</textarea><br><br>
			<center><INPUT type=\"submit\" name=\"BUT_refresh\" value=\"$I18N_refresh\"></center>
		</td>
	</tr>");
	HTML_showTableEnd();
};





/**
**name POOL_getSize($poolName)
**description returns the size of a pool in MB
**parameter poolName: name of the pool
**/
function POOL_getSize($poolName)	// -> OOP
{
	if (empty($poolName))
		return(0);
	$size=exec("cd ".POOL_getDir($poolName)."; du | tail -n1");
	$size/=1024;
	return(sprintf("%.2f",$size));
};





/**
**name POOL_getDir($poolName)
**description returns the directory of the pool
**parameter poolName: name of the pool
**/
function POOL_getDir($poolName)	// -> OOP
{
	return("/m23/data+scripts/pool/$poolName");
};





/**
**name POOL_download($poolName,$distr,$sourceslist,$packages)
**description shows error messages if the checks for distribution, sourceslist or packages are failing. Otherwise starts the distribution specific download routine.
**parameter poolName: name of the pool
**parameter distr: name of the distribution
**parameter sourceslist: list of the package sources
**parameter release: release branch of the choosen distribution to download the packages from
**parameter downloadBasePackages: set to true if a bunch of basic packages should be included into the pool
**parameter arch: download the packages for a specific CPU architecture
**/
function POOL_download($poolName,$distr,$sourceslist,$packages,$release,$downloadBasePackages,$arch)	// -> OOP
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$distOK=$srcOK=$pkgOK=$ok=true;

	//there is no packages include file or the function is missing for this distribution
	if (file_exists("/m23/inc/distr/$distr/packages.php"))
		{
			include_once("/m23/inc/distr/$distr/packages.php");

			if (!function_exists("PKG_downloadPool"))
				$ok=$distOK=false;
		}
	else
		$ok=$distOK=false;
	
	$destDir=POOL_getDir($poolName);
	
	//sources list is empty
	$temp=trim($sourceslist);
	if (empty($temp))
		$srcOK=$ok=false;
		
	//packages list is empty
	$temp=trim($packages);
	if (empty($temp))
		$pkgOK=$ok=false;
	
HTML_showTableHeader();

	if (!$ok)
		echo("
		<tr>
			<td>
				<br>
				<center><input type=\"submit\" name=\"BUT_step1\" value=\"$I18N_back\"></center>
				<input type=\"hidden\" name=\"distr\" value=\"$distr\">
				<input type=\"hidden\" name=\"sourcelist\" value=\"$sourceslist\">
				<input type=\"hidden\" name=\"TA_packageList\" value=\"$packages\">
				<input type=\"hidden\" name=\"arch\" value=\"$arch\">
				");
	else
		{
			$packagesArr[0]=$packages;
			if ($downloadBasePackages)
				{
					include_once("/m23/inc/distr/$distr/packages.php");
					if (function_exists(PKG_getDebootStrapBasePackages))
						$packagesArr[1] = PKG_getDebootStrapBasePackages($release);
				}

			echo("
			<tr>
				<td>");

			PKG_downloadPool($destDir,$sourceslist,$packagesArr,$arch);
			MSG_showInfo($I18N_packageDownloadStarted);
			
			echo("
					<br><br>
					<center><input type=\"submit\" name=\"BUT_step4\" value=\"$I18N_next\"></center>
			");
		};

	if (!$distOK)
		MSG_showError($I18N_distrHasNoFunctionToDownloadPackages);
		
	if (!$srcOK)
		MSG_showError($I18N_sourcesListIsEmpty);
		
	if (!$pkgOK)
		MSG_showError($I18N_packagesListIsEmpty);

	echo("</td></tr>");

HTML_showTableEnd();
};





/**
**name POOL_showDownloadStatus($poolName)
**description shows the package download status of a pool
**parameter poolName: name of the pool
**/
function POOL_showDownloadStatus($poolName)
{
	$poolDir=POOL_getDir($poolName);

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	if (SERVER_runningInBackground("downloadPoolPackages"))
		{
			MSG_showInfo($I18N_packageDownloadIsRunning);
			$disabled="disabled";
		}
	else
		{
			MSG_showInfo($I18N_packageDownloadIsFinished);
			$disabled="";
		};

	echo("<br>");

	HTML_showTableHeader();
	echo ("
	<tr>
		<td>
			<span class=\"title\">$I18N_packageDownloadStatus</span><br>
			<textarea cols=\"100\" rows=\"20\" readonly>");
			HELPER_showFileContents("$poolDir/aptDownload.log");
			echo("</textarea><br><br>
			<center><span class=\"subhighlight\">$I18N_poolSize</span><br><br>
			".POOL_getSize($poolName)." MB<br><br>
			<INPUT type=\"submit\" name=\"BUT_refresh\" value=\"$I18N_refresh\">
			<INPUT type=\"submit\" name=\"BUT_step2\" value=\"$I18N_nextStep ($I18N_poolStep[2])\" $disabled>
			</center>
		</td>
	</tr>");
	HTML_showTableEnd();
};





/**
**name POOL_prepare($poolName,$release,$distr)
**description Generates the needed configuration file for reprepro.
**parameter poolName: name of the pool
**parameter release: release of the distribution (e.g. sarge)
**parameter distr: name of the distribution (e.g. Debian)
**parameter arch: CPU architecture for the packages
**/
function POOL_prepare($poolName,$release,$distr,$arch="i386")	// -> OOP
{
	$confDir=POOL_getDir($poolName)."/conf";
	
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

	POOL_setProperty($poolName,"release",$release);
};





/**
**name POOL_makeRepository($poolName, $archivPath, $addCmds, $cmdFile)
**description Generates a package source from packages stored in one directory.
**parameter poolName: name of the pool
**parameter archivPath: start search for packages in this subdirectory
**parameter addCmds: additional commands that should be executed before starting the screen
**parameter 
**/
function POOL_makeRepository($poolName, $archivPath="archivs/", $addCmds="")
{
	$poolDir=POOL_getDir($poolName);
	$serverIP=getServerIP();
	$release=POOL_getProperty($poolName,"release");

	//write sources list for this pool
	$sourceslist="#mirror: http://$serverIP/pool/$poolName
deb http://$serverIP/pool/$poolName/ $release main non-free contrib\n";

	POOL_setProperty($poolName,"sourceslist",$sourceslist);

	//making links from the existing distr directory to all known releases
	include_once("/m23/inc/distr/debian/clientConfig.php"); //needed for CLCFG_getDebianReleasesGeneric
	$linkReleases="";
	foreach (CLCFG_getDebianReleasesGeneric("debian") as $linkRelease)
		$linkReleases.="echo 'ln -s `sudo find $poolDir/dists -maxdepth 1 -mindepth 1 -type d` $poolDir/dists/$linkRelease'\n";

	$cmds="
	cd $poolDir
	echo \"cd $poolDir\"
	rm -f /m23/tmp/makePoolPackages.log
	find $archivPath/ -type f | grep deb\$ | awk '{system(\"reprepro -Vb . includedeb $release \"$0\" 2>&1 | tee -a /m23/tmp/makePoolPackages.log\")}'
	find /mdk/m23Debs/debs -type f | grep deb\$ | grep -v woody | awk '{system(\"reprepro -Vb . includedeb $release \"$0\" 2>&1 | tee -a /m23/tmp/makePoolPackages.log\")}'
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

	$addCmds
	";

	SERVER_runInBackground("m23poolBuilder",$cmds,HELPER_getApacheUser(),true);
};





/**
**name POOL_getCDDistributionRelease($mountPoint,&$distr,&$release)
**description Reads the distribution and the release name from a mounted CD and writes these information to the variables. 
**parameter mountPoint: the directory where the CD is mounted
**parameter distr: the variable the name of the distribution (e.g. Debian) should be written to
**parameter release: the variable release of the distribution (e.g. sarge) should be written to
**/
function POOL_getCDDistributionRelease($mountPoint,&$distr,&$release)
{
	$pin=popen("cat `find $mountPoint/ -iname release | grep \"/binary-\" | awk -v LEN=9999 '{if (length($0) < LEN){LEN=length($0);OUT=$0}} END {print(\$OUT)}'` | awk '/Origin:/ {print(\"d:\"\$2)}
/Codename:/ {print(\"r:\"\$2)}
/Archive:/ {print(\"r:\"\$2)}
'","r");

	while ($line=fgets($pin))
	{
		$typeVal=explode(":",$line);

		switch ($typeVal[0])
		{
			case "d": $distr=trim($typeVal[1]); break;
			case "r": $release=trim($typeVal[1]); break;
		};
	};
}






/**
**name POOL_showSourcesList($poolName)
**description Shows the sources list of a selected package source.
**parameter poolName: name of the pool
**/
function POOL_showSourcesList($poolName)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	HTML_showTableHeader();
	echo ("
	<tr>
		<td>
			<span class=\"title\">$I18N_packageSources</span><br>
			<textarea cols=\"100\" rows=\"5\" readonly>".
			POOL_getProperty($poolName,"sourceslist")
			."</textarea>
		</td>
	</tr>");
	HTML_showTableEnd();
};
?>