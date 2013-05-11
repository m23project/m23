<?PHP

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions dealing with (de)installation of plugins and status information.
$*/

/**
**name PLG_listMenuPlugins($path)
**description generate the menu entries for the plugins
**parameter path: the path you want to scan for plugins
**/
function PLG_listMenuPlugins($path)
{
	if (!$_SESSION['m23Shared'])
	{
		$handle = opendir($path);

		while (false !== ($file = readdir ($handle)))
		{
			if (strstr($file,"m23plg"))
				MENU_showEntry(PLG_getPluginValue($path.$file,"pluginName"),
				"index.php?page=".PLG_getPluginValue($path.$file,"pluginPage"),
				PLG_getPluginValue($path.$file,"pluginIcon"));
		}

		closedir($handle);
	}
};






/**
**name PLG_isPluginSelected($path,$value)
**description checkes if the plugin was clicked
**parameter path: path where to find the plugin files
**parameter value: value the menu item should have to load the plugin page
**/
function PLG_isPluginSelected($path,$value)
{
 $handle = opendir($path);

 while (false !== ($file = readdir ($handle)))
 	{
	 if (strstr($file,"m23plg"))
	 {
   if (PLG_getPluginValue($path.$file,"pluginPage")==$value)
   		{
		  closedir($handle);
		  return($path.$file);
		 };
	 }
	}

 closedir($handle);
 return(FALSE);
}





/**
**name PLG_isPluginSelected($path,$value)
**description gets values from the plugins like plugin name, version,...
**parameter fileName: file name with whole path to the plugin file
**parameter var: variable you want to get the value from
**/
function PLG_getPluginValue($fileName,$var)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$fileName=trim($fileName);
	if (!file_exists($fileName))
		die ("$I18N_file \"$filename\" $I18N_doesnt_exist");
	$fp = fopen(trim($fileName),"r");

	$startRead=FALSE;

	while( !feof($fp))
	{
		$templine = fgets($fp,1024);

		if ($startRead && strstr($templine,"*/"))
			break;

		if ($startRead)
			$templine = explode(":",$templine);

		if ($startRead && strstr($templine[0],$var))
		{
			fclose($fp);
			return(trim($templine[1]));
		};

		if (!$startRead && strstr($templine,"/*"))
			$startRead=TRUE;
	}

	fclose($fp);
}





/**
**name PLG_getPLGName($fileName)
**description gets the name of the plugin
**parameter fileName: file name with whole path to the plugin file
**/
function PLG_getPLGName($fileName)
{
 return(PLG_getPluginValue($fileName,"pluginName"));
}





/**
**name PLG_getPLGPage($fileName)
**description gets the page of the plugin
**parameter fileName: file name with whole path to the plugin file
**/
function PLG_getPLGPage($fileName)
{
 return(PLG_getPluginValue($fileName,"pluginPage"));
}





/**
**name PLG_getPLGAuthor($fileName)
**description gets the author of the plugin
**parameter fileName: file name with whole path to the plugin file
**/
function PLG_getPLGAuthor($fileName)
{
 return(PLG_getPluginValue($fileName,"pluginAuthor"));
}





/**
**name PLG_getPLGUpdateURL($fileName)
**description gets the update address of the plugin
**parameter fileName: file name with whole path to the plugin file
**/
function PLG_getPLGUpdateURL($fileName)
{
 return(PLG_getPluginValue($fileName,"pluginUpdate"));
}





/**
**name PLG_getPLGClientRequires($fileName)
**description gets the "client requires" packages of the plugin
**parameter fileName: file name with whole path to the plugin file
**/
function PLG_getPLGClientRequires($fileName)
{
 return(PLG_getPluginValue($fileName,"pluginClientRequires"));
}





/**
**name PLG_getPLGVersion($fileName)
**description gets the version of the plugin
**parameter fileName: file name with whole path to the plugin file
**/
function PLG_getPLGVersion($fileName)
{
 return(PLG_getPluginValue($fileName,"pluginVersion"));
}





/**
**name PLG_showDownloadStatus($fileName)
**description shows the status of the plugin download
**parameter fileName: file name with whole path to the plugin file
**/
function PLG_showDownloadStatus($fileName)
{
 $file=fopen($fileName,"r");
 $counter=0;
 while (!feof($file))
 	{
	 $line=fgets($file,10000);
	 if (strlen(trim($line))==0) break;
	 $counter++;
	}
 fclose($file);
 if ($counter > 2)
 	return(FALSE);
	else
	return(TRUE);
};





/**
**name PLG_showDownloadStatus($fileName)
**description downloads or copies the plugin to the temp dir
**parameter url: the place where to get the plugin file from. following transport protocols are allowed: http, ftp and local files. e.g. "http://myserver.de/test.m23plg" is avalid url.
**parameter tempDir: where to store the plugin file temporary
**parameter fileName: file name with whole path to the plugin file
**/
function PLG_getPlugin($url,$tempDir,$fileName)
{
 include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

 if (strstr($url,"http:") || strstr($url,"ftp:"))
	{
	 exec("wget -nv $url -O $tempDir/$fileName -o $tempDir/download.log");
	 //show the status of the download
	 if ((!PLG_showDownloadStatus("$tempDir/download.log")) || (!file_exists($tempDir/$fileName)))
	 	{
		 MSG_showError($I18N_plugin_download_failed);
		 exit();
		};
	}
	else
	if (!copy($url,"$tempDir/$fileName"))
		{
	 	 MSG_showError($I18N_plugin_copy_failed);
		 exit();
		};
}





/**
**name PLG_checkOverwriting($logFile,$tempDir)
**description checks if the plugin files would overwrite existing files. the plugin file is extracted to a temporary directory. all file names are logged to a file that contains only the file names. these file names are checked against currently installed files. this routine checks if current files would be overwritten by the files of the plugin package. a list of files that would be overwritten is generated and aligned by a table.
**parameter logfile: filename with whole path of the logfile containing the file names of the plugin file
**parameter tempDir: where to store the plugin file temporary
**/
function PLG_checkOverwriting($logFile,$tempDir)
{
 include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

 $file=fopen($logFile,"r");

 $counter=0;

 do
 {
  $line=fgets($file,10000);
  if (strlen(trim($line))==0)
  	{
	 if (strlen($all) > 0)
	 	{//close the list of files
	 	 $all.="</ul>";
		 //message for the user, to select to overwrite files
		 $message="
		 <H3>$I18N_plugin_do_you_want_overwrite<H3>
		 <center><input type=\"submit\" name=\"BUT_forceinstallplg\" value=\"$I18N_override\"></center>
		 ";
		};
	 echo("<span class=\"subhighlight_red\">$all</span>$message");
	 //if plugin would overwrite files => quit
	 if (strlen($all) > 0)
	 	exit();
	 break;
	};

  //check if we have a file
  if ($line[strlen($line)-2]!="/")
  	{//we have one
	 if (file_exists(trim("/m23/$line")))
	 	{
		 $counter++;
		 //if we have the first file, that will be overwritten, make a message
		 if ($counter == 1)
		 	 $msg=$I18N_plugin_following_files_would_be_overwritten;
		 //add the file to the list
		 $all.="<li>/m23/$line</li>";
		};
	}
 } while (!feof($file));

 if ($counter > 0)
 	MSG_showInfo($msg.$all);

 fclose($file);

};





/**
**name PLG_DBInstall($tempDir,$files)
**description stores information about the plugin in the data base.
**parameter tempDir: where to find the extracted files of the plugin
**parameter files: all file names of the plugin file name
**/
function PLG_DBInstall($tempDir,$files)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//read the deinstall.sh and write it into the db
	if (file_exists("$tempDir/deinstall.sh"))
	{
		$fp=fopen("$tempDir/deinstall.sh","r");
		$deinstall=fread($fp,filesize("$tempDir/deinstall.sh"));
		fclose($fp);
	}

	//get the file name of the ???.m23plg
	$pin=popen("find $tempDir | grep .m23plg","r");
	$fileName=fgets($pin,10000);
	pclose($pin);

	//CC_nochecknow: Checks disabled, because if an unauthorized user can achieve to the plugin function, plugins with all commands enabled can be inserted, so SQL checking would not make much sense
	$sql="INSERT INTO `plugins` ( `name` , `author` , `version` , `updateurl` , `clientRequires` , `deinstall` , `files` , `installdate` )
	VALUES ('".PLG_getPLGName($fileName)."', '".PLG_getPLGAuthor($fileName)."',
	'".PLG_getPLGVersion($fileName)."', '".PLG_getPLGUpdateURL($fileName)."',
	'".PLG_getPLGClientRequires($fileName)."', '$deinstall', '$files', '".time()."');";

	if (!db_query($sql)) //FW ok
	{
		MSG_showError($I18N_plugin_database_error);
		exit();
	};
};





/**
**name PLG_realInstall($tempDir)
**description does the real installation
**parameter tempDir: where to find the extracted files of the plugin
**/
function PLG_realInstall($tempDir)
{
 include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

 //delete log files
 unlink("$tempDir/extract.log");
 unlink("$tempDir/download.log");

 //check if we have a install script
 if (file_exists("$tempDir/install.sh"))
 	{//set access mode
	 exec("chmod +x $tempDir/install.sh");
	 //execute the script
	 exec("$tempDir/install.sh");
	};
 //list all files in the tmp plugin dir
 $pin=popen("find $tempDir -type f","r");

 $files="";

 while (!feof($pin))
 	{//read file name
	 $line=fgets($pin,10000);

	 $line=trim($line);

	 if (strlen($line)==0)
	 	break;

	 if ((!strstr($line,"install.sh")) && (!strstr($line,"deinstall.sh")))
	 	{
	 	 //split the line in temp dir and destination
	 	 $tempDest=explode($tempDir,$line);
	 	 //copy the file from the tmp to the dest dir
	 	 if (!copy($line,"/m23".$tempDest[1]))
			{
			 MSG_showError($I18N_plugin_copy_failed2);
			 exit();
			};
		 //add the copied file to the files list
		 $files.="/m23".$tempDest[1]."?";
	 	}
	};

 pclose($pin);

 PLG_DBInstall($tempDir,$files);

 //delete the plugin temp directory
 //exec("rm -r $tempDir");

  MSG_showInfo($I18N_plugin_installed);
};





/**
**name PLG_getTempDir($url)
**description generates the name for the plugin temp dir
**parameter url: the place where to get the plugin file from. following transport protocols are allowed: http, ftp and local files. e.g. "http://myserver.de/test.m23plg" is avalid url.
**/
function PLG_getTempDir($url)
{
 //split the url by /
 $parts=explode("/",$url);
 //get the file name in the url
 $fileName=$parts[count($parts)-1];
 //split file name and extension
 $nameExt=explode(".",$fileName);
 //create name for the temporary directory
 $tempDir="/m23/tmp/".$nameExt[0];
 return($tempDir);
};





/**
**name PLG_getFilename($url)
**description gets the filename for the plugin file
**parameter url: the place where to get the plugin file from. following transport protocols are allowed: http, ftp and local files. e.g. "http://myserver.de/test.m23plg" is avalid url.
**/
function PLG_getFilename($url)
{
 //split the url by /
 $parts=explode("/",$url);
 //get the file name in the url
 $fileName=$parts[count($parts)-1];
 return($fileName);
};





/**
**name PLG_install($url)
**description installs a plugin. extracts the files in the plugin file to a temporary directory. checks if currently existing files would be overwritten by the plugin files. if so, ask the user, if he wants to install or stop installation.
**parameter url: the place where to get the plugin file from. following transport protocols are allowed: http, ftp and local files. e.g. "http://myserver.de/test.m23plg" is avalid url.
**/
function PLG_install($url)
{
	$tempDir=PLG_getTempDir($url);
	$fileName=PLG_getFilename($url);

	//generate the temporary directory
	mkdir($tempDir);

	//fetch the plugin
	PLG_getPlugin($url,$tempDir,$fileName);

	//extract the files
	exec("tar xfvj $tempDir/$fileName -C $tempDir> $tempDir/extract.log");

	//delete the plugin archiv
	unlink("$tempDir/$fileName");

	//check if the plugin would overwrite existing files
	PLG_checkOverwriting("$tempDir/extract.log",$tempDir);

	//do the real installation
	PLG_realInstall($tempDir);
};





/**
**name PLG_showPluginOverview()
**description shows a overview of all plugins
**/
function PLG_showPluginOverview()
{
 include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

 $result = db_query("SELECT name, version, author, installdate, updateurl  FROM `plugins`"); //FW ok

 //open table
 echo("<table align=\"center\"><tr><td><div class=\"subtable_shadow\">
<table class=\"subtable\" align=\"center\">
<tr>
	<td><span class=\"subhighlight\">$I18N_plugin_name </span></td>
	<td><span class=\"subhighlight\">$I18N_version</span></td>
	<td><span class=\"subhighlight\">$I18N_author</span></td>
	<td><span class=\"subhighlight\">$I18N_install_date</span></td>
	<td><span class=\"subhighlight\">$I18N_action</span></td>
</tr>");

  while ($line=mysql_fetch_row($result))
	{
	 //print plugin informations
	 echo("<tr>
	<td>$line[0]</td>
	<td>$line[1]</td>
	<td>$line[2]</td>
	<td>".gmstrftime ("%d.%m.%Y %H:%M", $line[3])."</td>
	<td><A HREF=\"index.php?page=plgoverview&action=delete&name=$line[0]\">$I18N_delete</A>");



	//checks if there is an update url, if yes then print the update button
	if (strlen($line[3]) > 0)
		echo("&nbsp;<A HREF=\"index.php?page=plgoverview&action=update&name=$line[0]\">$I18N_refresh</A>");
	echo("</td></tr>");
	};

 //close table
 echo("</table></div></td><tr></table>");
};





/**
**name PLG_install($url)
**description deletes a plugin
**parameter name: name of the plugin
**/
function PLG_delete($name)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//CC_nochecknow: Checks disabled, because if an unauthorized user can achieve to the plugin function, plugins with all commands enabled can be inserted, so SQL checking would not make much sense
	$result=db_query("SELECT files, deinstall FROM `plugins` where name='$name'"); //FW ok

	$line=mysql_fetch_row($result);

	//split the file string in single files
	$files=explode("\?",$line[0]);

	//delete plugin files
	for ($i=0; $i < count($files); $i++)
		if (strlen($files[$i])>0)
			unlink($files[$i]);

	//generate name for the uninstall script
	$fileName="/m23/tmp/uninstall$name.sh";

	//write the uninstall script to a file
	$file=fopen($fileName,"w");
	fwrite ($file, $line[1]);
	fclose($file);

	//make script executable and execute it
	exec("chmod +x $fileName && $fileName");

	//delete the script file
	unlink($fileName);

	//CC_nochecknow: Checks disabled, because if an unauthorized user can achieve to the plugin function, plugins with all commands enabled can be inserted, so SQL checking would not make much sense
	//delete plugin from database
	db_query("DELETE FROM `plugins` WHERE name='$name'"); //FW ok

	MSG_showInfo($I18N_plugin_deleted);
};





/**
**name PLG_getUpdateFile($name)
**description gets the update info file
**parameter name: name of the plugin
**/
function PLG_getUpdateFile($name)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//CC_nochecknow: Checks disabled, because if an unauthorized user can achieve to the plugin function, plugins with all commands enabled can be inserted, so SQL checking would not make much sense
	//get the update url for the plugin
	$result=db_query("SELECT updateurl FROM `plugins` where name='$name'"); //FW ok
	$line=mysql_fetch_row($result);

	$url=$line[0];

	if (strstr($url,"http") || strstr($url,"ftp"))
	{
		exec("wget -nv $url -O /m23/tmp/$name.update -o /m23/tmp/download.log");
		//show the status of the download

		if ((!PLG_showDownloadStatus("/m23/tmp/download.log")) || (!file_exists("/m23/tmp/$name.update")))
		{
			MSG_showError($I18N_plugin_information_download_failed);
			exit();
		};
	}
	else
	{
		if (!copy($url,"/m23/tmp/$name.update"))
		{
			MSG_showError($I18N_plugin_information_copy_failed);
			exit();
		};
	};
}






/**
**name PLG_update($name)
**description initalizes the update, shows information about the plugin update
**parameter name: name of the plugin
**/
function PLG_update($name)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//getting the file with update infomations
	PLG_getUpdateFile($name);

	echo("<h2>$I18N_plugin_information</h2>");
	PLG_listInfofile($name);
}





/**
**name PLG_listInfofile($name)
**description lists information of a plugin update file
**parameter name: name of the plugin
**/
function PLG_listInfofile($name)
{
 include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

 $file=fopen("/m23/tmp/$name.update","r");

 while (!feof($file))
 	{
	 $line=fgets($file,10000);

	 $varValue=explode(":",$line);

	 switch(trim($varValue[0]))
	 	{
		 case "pluginURL":
		 	{
			 $url=trim($varValue[1]);
			 break;
			}
		 case "pluginVersion":
		 	{
			 $version=trim($varValue[1]);
			 break;
			}
		 case "pluginSize":
		 	{
			 $size=trim($varValue[1]);
			 break;
			}
		 case "pluginName":
		 	{
			 $plgName=trim($varValue[1]);
			 break;
			}
		 case "pluginDescription":
		 	{
			 $description=trim($varValue[1]);
			 break;
			}

		};
	};
 fclose($file);

 //write table with infomations about the new plugin
 echo("<table align=\"center\"><tr><td><div class=\"subtable_shadow\">
<table class=\"subtable\" align=\"center\">
<tr>
	<td><span class=\"subhighlight\">$I18N_plugin_name</span></td>
	<td><span class=\"subhighlight\">$I18N_version</span></td>
	<td><span class=\"subhighlight\">$I18N_size</span></td>
	<td><span class=\"subhighlight\">$I18N_description</span></td>
	<td><span class=\"subhighlight\">$I18N_url</span></td>
</tr>

<tr>
	<td>$plgName</td>
	<td>$version</td>
	<td>$size</td>
	<td>$description</td>
	<td>$url</td>
</tr>

</table></div></td><tr></table>

<h2>$I18N_begin_with_update</h2><br>
<A HREF=\"misc/plgupdate.php?pluginName=".trim($name)."&pluginUrl=".trim($url)."\" target=\"_blank\">$I18N_start_update</a><br>
");
};





/**
**name PLG_realUpdate($name,$url)
**description does the real installation/update
**parameter name: name of the plugin
**parameter url: the place where to get the plugin file from. following transport protocols are allowed: http, ftp and local files. e.g. "http://myserver.de/test.m23plg" is avalid url.
**/
function PLG_realUpdate($name,$url)
{
 include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

 //remove old version
 PLG_delete($name);
 //download and check new plugin
 PLG_install($url);

 MSG_showInfo($I18N_plugin_update_complete);
};
?>
