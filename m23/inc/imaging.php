<?php



//transfer methods for the images
define('IMGTRANS_NC',0);
define('IMGFORMAT_DD',1);
define('IMGFORMAT_TAR',2);
define('IMGFORMAT_DDRESCUE',6);

define('IMGCOMPRESSION_NONE',3);
define('IMGCOMPRESSION_GZ',4);
define('IMGCOMPRESSION_BZ2',5);

//descriptions for the transfer, format and compression types
define('IMGDESCRIPTIONS',serialize(array(IMGTRANS_NC => "nc (netcat)", IMGFORMAT_DD => "dd (Convert and Copy)", IMGFORMAT_TAR => "tar (Tarball)", IMGFORMAT_DDRESCUE => "ddrescue (Harddisk rescue)", IMGCOMPRESSION_NONE => "-", IMGCOMPRESSION_GZ => "Gzip", IMGCOMPRESSION_BZ2 => "bzip2")));

//format extension
define('IMGFORMEXTENSIONS',serialize(array(IMGFORMAT_DD => "dd", IMGFORMAT_TAR => "tar")));

//compression extensions
define('IMGCOMPREXTENSIONS',serialize(array(IMGCOMPRESSION_NONE => "", IMGCOMPRESSION_GZ => "gz", IMGCOMPRESSION_BZ2 => "bz2")));

//property type
define('IMGCOMPRESSION',0);
define('IMGTRANS',1);
define('IMGFORMAT',2);
define('IMGDESCRIPTION',2);
define('IMGEXTENSION',3);

//directory to store the images
define('IMGSTOREDIR',"/m23/data+scripts/clientImages/");
define('IMGHTTPDIR',"/clientImages/");
define('IMGINFOTABLE',serialize($ImageInfoTable));





/**
**name IMG_installMBR($options)
**description Installs the MBR on the client.
**parameter options: the options array with some values
**parameter options[IMGMBRfile]: The name of the MBR file or *generic* for the generic MBR.
**parameter options[mbrPart]: The place to install the MBR in.
**/
function IMG_installMBR($options)
{
	if ($options[IMGMBRfile] == "*generic*")
		echo("\ninstall-mbr -e $options[mbrPart]\n");
	else
		echo("\nwget -q https://".getServerIP().IMGHTTPDIR.$options[IMGMBRfile]." -O - | dd of=".$options[mbrPart]."\n");
}





/**
**name IMG_storeMBR($device, $imagename)
**description Sends the master boot record of the hard disk to the server.
**parameter device: The partition to get the master boot record from. E.g. if /dev/hda1 is choosen, the mbr of /dev/hda is used. 
**parameter imagename: Name of the image the MBR should be added to. The MBR is stored in the file <imagename>.mbr
**/
function IMG_storeMBR($device, $imagename)
{
	$devNr = FDISK_getDriveAndNr($device);
	
	//check if a partition is choosen because it makes no sense to store the MBR if the whole disk is stored into an image that allready contains the MBR.
	if ($devNr[0] != $device)
		{
			echo ('dd if='.$devNr[0].' of=/tmp/mbr bs=512 count=1');
			MSR_genSendBinayFileCommand("/tmp/mbr","MSR_m23ImagerMBR&imagename=".urlencode($imagename));
		}
}





/**
**name IMG_getExtractedSize($fileName)
**description Gets the size of the extracted image by its name.
**parameter fileName: the name of the image
**returns Size of the extracted image
**/
function IMG_getExtractedSize($fileName)
{
	preg_match ("/[.]+[0-9]+[.]+/",$fileName, $found);
	return(str_replace(".","",$found[(count($found)-1)]));
}





/**
**name IMG_setFilenameSize($fileName,$size)
**description Sets the size of the extracted image in its name.
**parameter fileName: the name of the image
**parameter size: extracted image size
**/
function IMG_setFilenameSize($fileName,$size)
{
	$newName=str_replace(".0.",".$size.",$fileName);
	
	system("sudo mv ".IMGSTOREDIR."$fileName ".IMGSTOREDIR.$newName);
};





/**
**name IMG_clientRestoreAll($options)
**description Restores all images on the client.
**parameter options: client option array
**/
function IMG_clientRestoreAll($options, $lang)
{
	$dnr=$pnr=0;
	$devs=$enable=array();
	for ($i=0; $i < $options[IMGPartitionAmount]; $i++)
	{
		if (isset($options["IMGname$i"]))
			{
				preg_match ("/[0-9]+$/",$options["IMGdrv$i"], $found);
				$partNrs[$pnr]=$found[(count($found)-1)];

				if (!in_array($dev,$devs))
					$devs[$dnr++]=str_replace($partNrs[$pnr],"",$options["IMGdrv$i"]);
					
				IMG_clientRestore($options["IMGname$i"], $options["IMGdrv$i"], $lang);
				$pnr++;
			};
	};

	$out[p]=$partNrs;
	$out[d]=$devs;

	return($out);
};





/**
**name IMG_clientRestore($fileName,$destDevice)
**description Restores an image file on the client.
**parameter fileName: the name of the image
**parameter destDevice: client device to restore the image on
**/
function IMG_clientRestore($fileName, $destDevice, $lang)
{
	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");

	IMG_getFormatCompressionFromFile($fileName,$format,$compression,$withMBR);

	$compr[IMGFORMAT_DD][IMGCOMPRESSION_NONE] = "";
	$compr[IMGFORMAT_DD][IMGCOMPRESSION_GZ] = "gunzip | ";
	$compr[IMGFORMAT_DD][IMGCOMPRESSION_BZ2] = "bzcat | ";

	$cmd="\nwget -q https://".getServerIP().IMGHTTPDIR."$fileName -O - | ";

	switch ($format)
	{
		case IMGFORMAT_DD:
			$cmd.=$compr[IMGFORMAT_DD][$compression]."dd of=$destDevice&";
			$mount=false;
			break;
	};
	
	$cmd.="\n";
	
	if ($mount)
		CLCFG_mountRootDir($destDevice,basename($destDevice));
	echo($cmd);

	$infofilecmd = "find /proc -printf \"%l*%p\\n\" 2> /dev/null | grep $destDevice | grep -v task | cut -d'*' -f2 | sed 's/fd/fdinfo/'";
	CLCFG_dialogGaugeProcPos($I18N_client_installation, $I18N_client_status, "$I18N_installing_images: $fileName", $infofilecmd, IMG_getExtractedSize($fileName));
}





/**
**name IMG_getAllImagesSel($selName,$default)
**description Returns an selection that contains all image names as values and additional informations as shown name.
**parameter selname: the name the selection is called in PHP and HTML
**parameter default: item to select by default
**returns Array with image informations.
**/
function IMG_getAllImagesSel($selName,$default)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$images = IMG_getAllImages();

	$list["name0"]="-";
	$list["val0"]="-";
	$nr=1;
	
	if (is_array($images))
		foreach ($images as $image)
			{
				$list["name$nr"]=$image[filename]." $I18N_imageExtractedSize: ".$image[extractedSize];
				$list["val$nr"]=$image[filename];
				$nr++;
			};

	return(HTML_listSelection($selName,$list,$default));
};





/**
**name IMG_getAllMBRs()
**description Returns an array with the file names of all existing MBR files.
**returns Array with the MBR file names.
**/
function IMG_getAllMBRs()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$dir=opendir(IMGSTOREDIR);
	$i=0;
	while ($fileName = readdir($dir))
	if (preg_match('/\.mbr$/',$fileName))
	{
		$list[$fileName] = $fileName;
	}

	$list["*generic*"] = $I18N_genericMBR;

	//close the directory handle
	closedir($dir);
	return($list);
};





/**
**name IMG_getAllImages()
**description Returns an array with informations about all existing image files.
**returns Array with image informations.
**/
function IMG_getAllImages()
{
	$desc=unserialize(IMGDESCRIPTIONS);

	//check image store directory
	if (!is_dir(IMGSTOREDIR))
		mkdir(IMGSTOREDIR);

	$dir=opendir(IMGSTOREDIR);
	$i=0;
	while ($fileName = readdir($dir))
	if ($fileName != "." && $fileName != ".." && !preg_match('/\.mbr$/',$fileName))
	{
		$fullPath=IMGSTOREDIR.$fileName;
		$out[$i][filename] = $fileName;
		$out[$i][size] = exec ('stat -c %s '. escapeshellarg ($fullPath));
		IMG_getFormatCompressionFromFile($fullPath,$format,$compression,$withMBR);
		$out[$i][form] = $desc[$format];
		$out[$i][comp] = $desc[$compression];
		$out[$i][mbr] = $withMBR;
		$out[$i]["date"] = filectime($fullPath);

		//the extracted size is the last numeric part of the filename
		preg_match ("/[.]+[0-9]+[.]+/",$fileName, $found);
		$out[$i][extractedSize] = str_replace(".","",$found[(count($found)-1)]);
		$i++;
	}

	//close the directory handle
	closedir($dir);
	return($out);
};





/**
**name IMG_showImageManagement()
**description Shows a dialog with all existing image files with the possibillity to delete them.
**/
function IMG_showImageManagement()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	switch ($_GET[action])
	{
		case del:
			$file = IMGSTOREDIR.urldecode($_GET["file"]);
			exec("sudo rm $file $file.mbr");
			break;
	};

	HTML_showFormHeader();
	HTML_showTableHeader();

	HTML_setPage("manageImageFiles");
	echo("
	<tr>
		<td><span class=\"subhighlight\">$I18N_imageName</span></td>
		<td><span class=\"subhighlight\">$I18N_size</span></td>
		<td><span class=\"subhighlight\">$I18N_imageExtractedSize</span></td>
		<td><span class=\"subhighlight\">$I18N_imageFormat</span></td>
		<td><span class=\"subhighlight\">$I18N_imageCompression</span></td>
		<td><span class=\"subhighlight\">$I18N_creationTime</span></td>
		<td><span class=\"subhighlight\">$I18N_action</span></td>	
	</tr>");
	
	$fileInfos=IMG_getAllImages();
	
	if (count($fileInfos) > 0)
		foreach ($fileInfos as $fileInfo)
		{
			echo("
			<tr>
				<td>$fileInfo[filename]</td>
				<td>".number_format($fileInfo[size] / 1048576)." MB</td>
				<td>".number_format($fileInfo[extractedSize] / 1048576)." MB</td>
				<td>$fileInfo[form]</td>
				<td>$fileInfo[comp]</td>
				<td>".strftime($I18N_timeFormat,$fileInfo["date"])."</td>
				<td><a href=\"index.php?page=manageImageFiles&action=del&file=".urlencode($fileInfo[filename])."\">$I18N_delete</a></td>	
			</tr>");
		}
	else
		echo("<tr><td colspan=\"5\" align=\"center\">
			<br>$I18N_noImageFilesAvailable<br>
		</td></tr>");

	HTML_showTableEnd();
	HTML_showFormEnd();
};





/**
**name IMG_makeExtension($format,$compression)
**description Creates an extension for a given format and compression.
**parameter format: format of the image e.g. IMGFORMAT_DD, IMGFORMAT_TAR
**parameter compression: method to compress the image e.g. IMGCOMPRESSION_NONE, IMGCOMPRESSION_GZ, IMGCOMPRESSION_BZ2
**returns String with the extension.
**/
function IMG_makeExtension($format,$compression)
{
	$cExt=unserialize(IMGCOMPREXTENSIONS);
	$fExt=unserialize(IMGFORMEXTENSIONS);
	
	$cStr=$cExt[$compression];
	if (!empty($cStr))
		$cStr=".$cStr";
	return(".0.".$fExt[$format].$cStr);
};





/**
**name IMG_getFormatCompressionFromFile($fileName,&$format,&$compression,&$withMBR)
**description Checks the extension of a filename and writes its format and compression to the parameters.
**parameter fileName: name of the file to check (with full path name)
**parameter format: format of the image e.g. IMGFORMAT_DD, IMGFORMAT_TAR
**parameter compression: method to compress the image e.g. IMGCOMPRESSION_NONE, IMGCOMPRESSION_GZ, IMGCOMPRESSION_BZ2
**parameter withMBR: Check if an attendant MBR file for the image exists.
**/
function IMG_getFormatCompressionFromFile($fileName,&$format,&$compression,&$withMBR)
{
	$cExt=unserialize(IMGCOMPREXTENSIONS);
	$fExt=unserialize(IMGFORMEXTENSIONS);
	
	$compression = -1;

	$parts=explode(".",$fileName);

	$compPos = (count($parts)-1);
	$formPos = $compPos-1;
	
	//search for the index number of the compression extension
	$compression = array_search($parts[$compPos],$cExt);
	
	if ($compression === false)
		{
			//this is not a compression extension
			$compression = IMGCOMPRESSION_NONE;
			$formPos++;
		};

	//get the index number for the format extension
	$format  = array_search($parts[$formPos],$fExt);

	//check if an MBR file exists
	$withMBR  = file_exists("$fileName.mbr");
};





/**
**name IMG_getImageFormatSelection($selname,$types,$showType)
**description Generates a selection that contains all drives and partitions of a given client.
**parameter selname: the name the selection is called in PHP and HTML
**parameter types: array of constants of the types to show
**parameter showType: type of the constants e.g. IMGCOMPRESSION or IMGTRANS
**returns String with the HTML selection.
**/
function IMG_getImageFormatSelection($selname,$types,$showType)
{
	$desc=unserialize(IMGDESCRIPTIONS);

	switch ($showType)
	{
		case IMGCOMPRESSION:
			$first=IMGCOMPRESSION_NONE;
			break;
		case IMGTRANS:
			$first=IMGTRANS_NC;
			break;
	};

	$nr=0;
	$min=99999;

	foreach ($types as $type)
	{
		if ($type < $min)
			$min = $type;

		$list["name$nr"]=$desc[$type];
		$list["val".$nr++]=$type;
	}

	return(HTML_listSelection($selname,$list,$first));
};





/**
**name IMG_serverCreate($transport,$destfile,$port)
**description Starts a server programm on the m23 server that stores an image.
**parameter transport: method how to transfer the image to the server e.g. IMGTRANS_NC
**parameter destfile: name of the storage file on the server.
**parameter port: port address the server should listen on
**returns false on error or true on success.
**/
function IMG_serverCreate($transport,$destfile,$port)
{
	$fullpath=IMGSTOREDIR.$destfile;

	switch ($transport)
	{
		case IMGTRANS_NC:
			$cmd="nc -l -p $port > $fullpath";
			break;
		default:
			return(false);
	}
	
	$cmd.="
	
	";

	SERVER_runInBackground("m23ImageServer".time(),$cmd);
	return(true);
}





/**
**name IMG_clientCreate($transport,$format,$parameter,$server,$port)
**description Creates an image from the client and transfers it to the server.
**parameter transport: method how to transfer the image to the server e.g. IMGTRANS_NC
**parameter format: format of the image e.g. IMGFORMAT_DD, IMGFORMAT_TAR
**parameter compression: method to compress the image e.g. IMGCOMPRESSION_NONE, IMGCOMPRESSION_GZ, IMGCOMPRESSION_BZ2
**parameter device: device to store in the image
**parameter server: IP address of the server.
**parameter port: port address the server should listen on
**returns String with the client commands.
**/
function IMG_clientCreate($transport ,$format, $compression, $device, $server, $port)
{
	$onlyDeviceName = str_replace("/dev/","",$device);

	$cmd="
	echo \"\n\nStarting imaging in 15 seconds to allow the server to start the imaging tool ...\"
	for cnt in 15 14 13 12 11 10 9 8 7 6 5 4 3 2 1
	do
		echo \"Time to wait \$cnt second(s)\"
		sleep 1
	done
	\n";


	$compr[IMGFORMAT_DD][IMGCOMPRESSION_NONE] = "";
	$compr[IMGFORMAT_DD][IMGCOMPRESSION_GZ] = "gzip | ";
	$compr[IMGFORMAT_DD][IMGCOMPRESSION_BZ2] = "bzip2 | ";

	switch ($format)
	{
		case IMGFORMAT_DD:
			$cmd.="(dd bs=1M if=$device 2> /tmp/m23ImagerSize2 | ".$compr[IMGFORMAT_DD][$compression];
			$statusCmd="cat /tmp/m23ImagerSize2 | grep out | cut -d'+' -f1 > /tmp/m23ImagerSize; rm /tmp/m23ImagerSize2)";
			break;
		case IMGFORMAT_TAR:
			$cmd.="cat $device | ";
			break;
	};

	switch ($transport)
	{
		case IMGTRANS_NC:
			$cmd.="nc $server $port";
			break;
	};

	echo("$cmd;$statusCmd&");

	$infofilecmd = "find /proc -printf \"%l*%p\\n\" 2> /dev/null | grep $device | grep -v task | cut -d'*' -f2 | sed 's/fd/fdinfo/'";
	CLCFG_dialogGaugeProcPos("Image creation", "Image creation", "Creating image file of: $device", $infofilecmd, "`cat /proc/partitions | grep \"$onlyDeviceName$\" | tr -s [:blank:] | cut -d' ' -f4 | awk -vOFMT=\"%.100g\" '{print($0 * 1024);}'`");
}





/**
**name IMG_showCreateImage($client)
**description Shows a dialog for creating an image.
**parameter client: name of the client.
**/
function IMG_showCreateImage($client)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$desc=unserialize(IMGDESCRIPTIONS);
	
	if (isset($_POST[BUT_createImage]))
	{
		if (empty($_POST[ED_imageName]))
			MSG_showError($I18N_imageNameEmpty);
		else
		{
			//check image store directory
			if (!is_dir(IMGSTOREDIR))
				mkdir(IMGSTOREDIR);

			//set format and server in the parameters array for the create image job
			$imgparams[form] = $_POST[RB_imageFormat];
			$imgparams[server] = getServerIP();
	
			switch ($imgparams[form])
			{
				case IMGFORMAT_DD:
				case IMGFORMAT_DDRESCUE:
					$imgparams[trans] = $_POST[SEL_ddTrans];
					$imgparams[compr] = $_POST[SEL_ddComp];
					$imgparams[port] = $_POST[ED_transferPort];
	
					$temp=explode(" ",$_POST[SEL_ddDrive]);
					//device to save
					$imgparams[param] = $temp[0];
					break;
			};

			//create image name with format and compression extension
			$imgparams[imagename] = $_POST[ED_imageName].IMG_makeExtension($imgparams[form],$imgparams[compr]);

			if (is_file(IMGSTOREDIR.$imgparams[imagename]))
				MSG_showError(IMGSTOREDIR.$imgparams[imagename].": $I18N_imageFileExists");
			else
			{
				PKG_addJob($client,"m23createImage",PKG_getSpecialPackagePriority("m23createImage"),mysql_real_escape_string(serialize($imgparams)));

				CLIENT_resetAndInstall($client);

				PKG_addShutdownOrRebootPackage($client);

				MSG_showInfo($I18N_createImageJobHasBeenStored);
	
				return;
			};
		}
	}

	HWINFO_printPartitions($client);

	$param=FDISK_getPartitions($client);
	$first="";

	HTML_showFormHeader();
	HTML_showTableHeader();
	HTML_setPage('createImage');
	echo("
	<input type=\"hidden\" name=\"client\" value=\"$client\">
	<tr>
		<td><span class=\"subhighlight\">$I18N_selected</span></td>
		<td><span class=\"subhighlight\">$I18N_imageFormat</span></td>
		<td><span class=\"subhighlight\">$I18N_imageTransferType</span></td>
		<td><span class=\"subhighlight\">$I18N_imageCompression</span></td>
	</tr>
	<tr>
		<td><INPUT type=\"radio\" name=\"RB_imageFormat\" value=\"".IMGFORMAT_DD."\" checked></td>
		<td>".$desc[IMGFORMAT_DD]."</td>
		<td>".IMG_getImageFormatSelection("SEL_ddTrans",array(IMGTRANS_NC),IMGTRANS)."</td>
		<td>".IMG_getImageFormatSelection("SEL_ddComp",array(IMGCOMPRESSION_GZ,IMGCOMPRESSION_BZ2,IMGCOMPRESSION_NONE),IMGCOMPRESSION)."</td>
	</tr>

	<tr>
		<td></td>
		<td colspan=\"3\"><span class=\"subhighlight\">$I18N_imageSource</span></td>
	</tr>

	<tr>
		<td></td>
		<td colspan=\"3\">
			".FDISK_listDrivesAndPartitions($param, $first, "SEL_ddDrive")."
		</td>
	</tr>

<!--	<tr>
		<td><INPUT type=\"radio\" name=\"RB_imageFormat\" value=\"".IMGFORMAT_TAR."\"></td>
		<td>".$desc[IMGFORMAT_TAR]."</td>
		<td>".IMG_getImageFormatSelection("SEL_ddTrans",array(IMGTRANS_NC),IMGTRANS)."</td>
		<td>".IMG_getImageFormatSelection("SEL_tarComp",array(IMGCOMPRESSION_GZ,IMGCOMPRESSION_BZ2,IMGCOMPRESSION_NONE),IMGCOMPRESSION)."</td>
	</tr>

	<tr>
		<td></td>
		<td colspan=\"3\"><span class=\"subhighlight\">$I18N_tarParameters</span></td>
	</tr>

	<tr>
		<td></td>
		<td colspan=\"3\">
			<INPUT type=\"text\" name=\"ED_tarParam\" size=\"50\" maxlength=\"10240\">
				<a href=\"index.php?page=manViewer&manPage=tar\" target=\"_blank\">
					<img border=\"0\" src=\"/gfx/help-mini.png\"> $I18N_help
				</a>
		</td>
	</tr>

	<tr><td colspan=\"4\" align=\"center\"><hr></td></tr>
 -->

	<tr>
		<td colspan=\"2\" align=\"left\">
			<span class=\"subhighlight\">$I18N_transferPort</span>
		</td>
		<td colspan=\"2\" align=\"left\"></td>
	</tr>
	
	<tr>
		<td colspan=\"2\" align=\"left\">
			<INPUT type=\"text\" name=\"ED_transferPort\" size=\"5\" maxlength=\"5\" value=\"12345\">
		</td>
		<td colspan=\"2\" align=\"left\"></td>
	</tr>

	<tr><td colspan=\"4\" align=\"left\"><span class=\"subhighlight\">$I18N_imageName</span></td></tr>

	<tr>
		<td colspan=\"4\" align=\"left\">
			<nobr>
				<INPUT type=\"text\" name=\"ED_imageName\" size=\"50\" maxlength=\"10240\">
				<INPUT type=\"submit\" name=\"BUT_createImage\" value=\"$I18N_createImage\">
			</nobr>
		</td>
	</tr>
	");

	HTML_showTableEnd();
	HTML_showFormEnd();
}
?>