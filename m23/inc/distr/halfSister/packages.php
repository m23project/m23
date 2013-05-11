<?php

/*$mdocInfo
Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
Description: Basic package operations (search, add,...) for halfSister distributions
$*/

// define(DIR_M23APTCACHE,($_SESSION['m23Shared'] ? "/m23/var/cache/m23apt/".m23SHARED_getCustomerNr() : "/m23/var/cache/m23apt"));





/**
**name PKG_fastGetInstalledPackages($storeFile="")
**description Gets a list of all installed packages (faster than dpkg --get-selections).
**parameter storeFile: File name to store the list of installed on the client or empty if the list should be outputted to stdout.
**/
function PKG_fastGetInstalledPackages($storeFile="")
{
	HS_pkgInstalledList($storeFile);
}





/**
**name pkgUpdateCacheOnServer
**parameter $1 (packagesourcename): Name der Paketquellenliste
**parameter $2 (packagesource): Inhalt der Paketquellenliste
**parameter $3 (force): set to true (1) if you want to update the package info and the time is not over
**parameter $4 (arch): Architecture (amd64/i386) to get package infos for.
**/
function PKG_pkgUpdateCacheOnServer( $packagesourcename, $packagesource, $force=false, $arch="i386" )
{
	HS_pkgUpdateCacheOnServer( $packagesourcename, $packagesource, $force, $arch );
}





/**
**name PKG_listPackages($key)
**description list packages matching the key
**parameter key: search key
**parameter distr: the distribution name
**parameter packagesource: name of the package source
**parameter client: Name of the client the packages are searched for. (Not used here and only for halfSister)
**/
function PKG_listPackages($key,$distr="debian",$packagesource, $client)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//start search if client contains name or number
// 	if( defined($client) && client != "" )
// 	{
// 		$foundPackages = CLIENT_executeOnClientOrIP($client,"PKG_listPackages",HS_pkgSearch($key), "root", false);
// 		$foundPackagesA = explode("\n", $foundPackages);
// 	}else{
		

	$packages = HS_pkgUpdateCacheOnServer($packagesource);

	$foundPackagesA = array();

	//Open the packages file in the distr dir and read the matching packages from it
	if( false != ($handle = popen( "zcat $packages | grep -i $key", "r" )) )
	{
		while( false != ( $line = fgets( $handle ) ) )
		{
			$temp = explode("###", $line);
			$foundPackagesA[$temp[0]] = $temp;
		};
	};

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


	foreach ($foundPackagesA as $package)
	{
		list( $name, $desc, $size ) = $package;

		//if we don't get a new package name break
		if (empty($name))
			break;

		//generate checkbox name
		$cbName="CB_pkg".$i;
		$i++;

		if (($i % 2) == 0)
			$col = 'bgcolor="#A4D9FF" bordercolor="#A4D9FF"';
		else
			$col = '';

		//print the line
		echo("
		<tr $col>
			<td>".$name."</td>
			<td>".number_format((float)$size/1024,2)." MB</td>
			<td>".wordwrap(htmlentities($desc),60,"<br>",1)."</td>
			<td><center><input type=\"checkbox\" name=\"$cbName\" value=\"".$name.'###'.$size."\"></center></td>
		</tr>");
	};

	HTML_showTableEnd();
	return($i);
};





/**
**name PKG_previewInstall($clientName,$distr,$packagesource,$packages)
**description shows what happens if packages get (de)installed
**parameter clientName: name of the client
**parameter distr: the distribution name
**parameter packagesource: name of the package source
**parameter packages: the packages to be installed
**parameter aptCommand: sets the apt-get command: install, remove
**/
function PKG_previewInstallDeinstall($clientName,$distr,$packagesource,$packages,$aptCommand)
{
	switch ($aptCommand)
	{
		case 'install':
		{
			$out = CLIENT_executeOnClientOrIP($clientName,"PKG_previewInstallDeinstall",HS_pkgInstallPreview($packages), "root", false);
			break;
		}

		case 'remove':
		{
			$out = CLIENT_executeOnClientOrIP($clientName,"PKG_previewInstallDeinstall",HS_pkgDeinstallPreview($packages), "root", false);
			break;
		}
	}

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
function PKG_getKernels($distr,$packagesource,$arch)	//HS-function
{
	//Get the halfSister distribution (e.g. fedora14, ...)
	$HSDistr = SRCLST_getRelease($packagesource);

	//Get the name with full path of file that contains the list of available kernel packages (e.g. fedora14-amd64.kernelList)
	$kernelListFile = HSIMGSTOREDIR.$HSDistr."-$arch.kernelList";

	//Check if the file with the list of available kernel packages exists
	if (file_exists($kernelListFile))
	{
		$fin = fopen($kernelListFile,"r");

		while ($kernelPKG = fgets($fin))
			$out[$kernelPKG] = $kernelPKG;

		fclose($fin);
	}
	//If there is no file with available kernel packages, only show generic.
	else
		$out['generic/automatic'] = 'generic/automatic';

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
?>
