<?PHP
/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions for getting information from the server
$*/

define('SERVER_BACKUP_DIR','/m23/data+scripts/m23admin/serverBackups');
define('m23adminHtpasswd',"/m23/etc/.htpasswd");
define('m23phpMyLDAPAdminHtpasswd',"/m23/etc/.phpMyLDAPAdminHtpasswd");
define('m23BackuppcHtpasswd',"/etc/backuppc/htpasswd");
define('m23RASTunnelScript','/m23/bin/m23RemoteAdministrationServiceOpenTunnel');





/**
**name SERVER_killPID($pid, $signal=9)
**description Kills a process running under a given PID or sends a signal.
**parameter: pid: The PID of the process to kill.
**parameter: signal: The signal to send to the process.
**returns: True if the process was killed or got the signal.
**/
function SERVER_killPID($pid, $signal=9)
{
	exec("sudo kill -$signal $pid",$output,$rv);
	return($rv == 0);
}





/**
**name SERVER_killBackgroundJob($job, $user = "root")
**description Kills a job (that runs in screen) with a given name.
**parameter job: Name of the job that should be killed.
**parameter user: User the job runs under.
**/
function SERVER_killBackgroundJob($job, $user = "root")
{
	SERVER_runInBackground("SERVER_killBackgroundJob".md5(rand()),"export LC_ALL=C; screen -ls | grep Detached | sed 's/[\\t]*\([^\\t]*\).*/\\1/g' | grep \"$job$\" | cut -d'.' -f1 | xargs kill -9 ; screen -wipe",$user,false);
}





/**
**name SERVER_insertLineNumber($file, $lineNumber, $insertText, $mode = 644, $insertMode = 1, $addIfNotExists = true)
**description Inserts a text AT or AFTER a line number or creates a new file with the given name, if it doesn't exists.
**parameter file: the name of the file
**parameter lineNumber: reference line number for inserting
**parameter insertText: text to insert
**parameter mode: The access mode the newly created file should have.
**parameter insertMode: "0" insert AT, "1" insert AFTER line number
**parameter addIfNotExists: set to true, if the the line should be added only if the line doesn't exist. false, if the line should be added on every execution.
**/
function SERVER_insertLineNumber($file, $lineNumber, $insertText, $mode = 644, $insertMode = 1, $addIfNotExists = true)
{
	if (SERVER_fileExists($file))
	{
		$ret = SERVER_runInBackground('SERVER_insertLineNumber'.md5($file), EDIT_insertLineNumber($file, $lineNumber, $insertText, $insertMode, $addIfNotExists),"root", false);
		return($ret == 0);
	}
	else
	{
		return(SERVER_putFileContents($file, $insertText, $mode));
	}
}





/**
**name SERVER_addAdmin($newadmin, $password)
**description Adds an administrator with all access rights.
**parameter newadmin: Name of the new admin to create.
**parameter password: Password for the admin account.
**returns: true, if the deletion was sucessfully otherwise false.
**/
function SERVER_addAdmin($newadmin, $password)
{
	if (SERVER_addToHtpasswd(m23adminHtpasswd,$newadmin,$password))
		{
			SERVER_addToHtpasswd(m23BackuppcHtpasswd,$newadmin,$password);
			BACKUP_addAdmin($newadmin);
			SERVER_addToHtpasswd(m23phpMyLDAPAdminHtpasswd,$newadmin,$password);
			return(true);
		}
	else
		return(false);
}





/**
**name SERVER_delAdmin($name)
**description Deletes an administrator with all access rights.
**parameter name: Name of the admin to delete.
**returns: true, if the deletion was sucessfully otherwise false.
**/
function SERVER_delAdmin($name)
{
	if (SERVER_delFromHtpasswd(m23adminHtpasswd,$name))
		{
			SERVER_delFromHtpasswd(m23BackuppcHtpasswd,$name);
			BACKUP_delAdmin($name);
			SERVER_delFromHtpasswd(m23phpMyLDAPAdminHtpasswd,$name);
			return(true);
		}
	else
		return(false);
}





/**
**name SERVER_fileExists($file)
**description Checks if a file exits, that the Apache user has never access to.
**parameter: file: Name (with full path) of the file to check.
**returns: True, if the file exists other wise false.
**/
function SERVER_fileExists($file)
{
	$amount = SERVER_runInBackground('SERVER_fileExists'.md5($file), "ls $file | grep -c $file","root", false);
	return($amount > 0);
}





/**
**name SERVER_getPublicSSHKeyOfm23Server()
**description Returns the public SSH key of the m23 server.
**returns: Public SSH key of the m23 server.
**/
function SERVER_getPublicSSHKeyOfm23Server()
{
	return(SERVER_getFileContents('/m23/data+scripts/packages/baseSys/authorized_keys'));
}





/**
**name SERVER_changeHtpasswd($htpasswdFile,$username,$password)
**description Changes the password of a user in a htpasswd file.
**parameter: htpasswdFile: htpasswd file that contains user names and crypted passwords.
**parameter: username: Name of the user to change
**parameter: password: The according new password
**returns: True if the password was changed sucessfully.
**/
function SERVER_changeHtpasswd($htpasswdFile,$username,$password)
{
	if (SERVER_delFromHtpasswd($htpasswdFile,$username))
		return(SERVER_addToHtpasswd($htpasswdFile,$username,$password));

	return(false);
}





/**
**name SERVER_delFromHtpasswd($htpasswdFile,$username)
**description Removes a user with password to a htpasswd file.
**parameter: htpasswdFile: htpasswd file that contains user names and crypted passwords.
**parameter: username: Name of the user to remove
**returns: True if the new user was added sucessfully.
**/
function SERVER_delFromHtpasswd($htpasswdFile,$username)
{
	exec("sudo /usr/bin/htpasswd -D $htpasswdFile ".$username,$output,$rv);
	return($rv == 0);
}





/**
**name SERVER_addToHtpasswd($htpasswdFile,$username,$password)
**description Adds a new user with password to a htpasswd file.
**parameter: htpasswdFile: htpasswd file that contains user names and crypted passwords.
**parameter: username: Name of the new user to add
**parameter: password: The according password for the new user
**returns: True if the new user was added sucessfully.
**/
function SERVER_addToHtpasswd($htpasswdFile,$username,$password)
{
	exec("sudo /usr/bin/htpasswd -bm '$htpasswdFile' '$username' '$password' ",$output, $rv);
	return($rv == 0);
}





/**
**name SERVER_dhcpServerInNetWarn()
**description Shows an error message if there is found another DHCP server on the net.
**returns: false, if the IP address is static.
**/
function SERVER_dhcpServerInNetWarn()
{
	$log = "/m23/tmp/dhcpServerWarner.log";

	//Check if a dhcp server warn process is running
	if (SERVER_runningInBackground("dhcpServerWarner"))
	{
		//Check if a line with "listening" is the last line in the log file. If it's not, there may be another DHCP server
		if (preg_match("#listening.*\\n.*\\n#", file_get_contents($log)) != 0)
		{
			//The log file is bigger => so it's an error
			include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
			MSG_showMessageBox($I18N_dhcpServerWarning.'<br><a href="/m23admin/dhcpServerWarner.log" target="_blank">dhcpServerWarner.log</a>',"errortable",$I18N_serverStatusCritical,120);
		}
	}
	else
	{
		//Start the dhcp server warn process
		$serverIP = getServerIP();
		SERVER_runInBackground("dhcpServerWarner",
		"tcpdump -l -nn 'udp src port 67 and udp dst port 68 and not src $serverIP' 2>&1 | tee $log" /*"tcpdump -l -nn 'udp port 67 and !(host $serverIP) and !(host 0.0.0.0)' 2>&1 | tee $log"*/,"root",true);
	}
}





/**
**name SERVER_sendScriptToSF($name,$author,$description,$script)
**description Uploads a script to m23.sf.net for public use.
**parameter name: Name of the script.
**parameter author: Name of the script author.
**parameter description: Short descriptive text for the purpose of the script.
**parameter script: Source code of the script.
**/
function SERVER_sendScriptToSF($name,$author,$description,$script)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$name=base64_encode($name);
	$author=base64_encode($author);
	$description=base64_encode($description);
	$script=base64_encode(bzcompress($script));

	$cmds="wget -q -O /dev/stdout \"http://m23.sf.net/scriptUpload/upload.php?author=$author&description=$description&script=$script&name=$name\"";

	MSG_showMessageBoxHeader("infotable",$I18N_information);
	SERVER_runInBackground("uploadScriptToSF",$cmds,HELPER_getApacheUser,false);
	MSG_showMessageBoxFooter();
	
}





/**
**name SERVER_dynamicIPWarn()
**description Shows an error message if the m23 server has a dynmic IP address.
**returns: false, if the IP address is static.
**/
function SERVER_dynamicIPWarn()
{
	if (strlen(getServerIP()) == 0)
		{
			include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
			MSG_showMessageBox($I18N_serverDynamicIPWarnung,"errortable",$I18N_serverStatusCritical,120);
		}
	else
		return(false);
}





/**
**name SERVER_tmpNotWritable()
**description Shows an error message if /tmp is not writable.
**returns: false, if /tmp is writable.
**/
function SERVER_tmpNotWritable()
{
	if (is_writable("/tmp"))
		return(false);

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	MSG_showMessageBox($I18N_serverTmpNotWritable,"errortable",$I18N_serverStatusCritical,120);
}





/**
**name SERVER_rootFreeSpace
**description Shows an error message if the free space of the root partition is low.
**returns: false, if there is enough space.
**/
function SERVER_rootFreeSpace()
{
	$freeSpace=exec("df / | tr -s [:blank:] | cut -d' ' -f4");

	if ($freeSpace > 150000)
		return(false);

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$freeSpace=sprintf("%.2f",($freeSpace/1024));

	MSG_showMessageBox("$I18N_serverRootSpaceLow1 $freeSpace $I18N_serverRootSpaceLow2","errortable",$I18N_serverStatusCritical,120);
}





/**
**name SERVER_isProgramRunning
**description checks if a certain program is running and returns true, if yes "no" otherwise
**parameter progname: the name of the programm (e.g. "apache" for the Apache web server)
**/
function SERVER_isProgramRunning($progname)
{
	
	$ret = exec("sudo ps -A | grep $progname | wc -l");
	return($ret > 0);
};





/**
**name SERVER_checkPackageInstalled
**description checks if a certain package is installed
**parameter pkgName: the name of the package
**/
function SERVER_checkPackageInstalled($pkgName)
{
	EDIT_prepareStr($pkgName,true);
	$pkgs=explode(" ",$pkgName);
	
	foreach ($pkgs as $pkg)
	{
	
		$cmd="awk -v PKG=\"$pkg\" '
FOUND&&match(\$0,\"^Status: install\") {print \"1\";exit}
FOUND&&match(\$0,\"not-installed\$\") {print \"0\";exit}
match(\$0,\"^Package: \"PKG\"\$\") {FOUND=1}
END {
if (!FOUND)
{print \"0\"}
}
' /var/lib/dpkg/status";

		if (exec($cmd)==0)
			return(false);
	};

	return(true);
};





/**
**name SERVER_daemonStartStop
**description starts, stops and restarts daemons
**parameter daemonScript: the file name of the script, that handles the real starting, stopping and restarting and understands the $action
**parameter action: start, stop or restart
**returns: true on successfully execution otherwise false.
**/
function SERVER_daemonStartStop($daemonScript,$action)
{
	exec("sudo $daemonScript $action",$output,$rv);
	return($rv == 0);
};





/**
**name SERVER_installTool
**description installs a tool on the server
**parameter pkgName: name of the software package
**returns: true on successfully execution otherwise false.
**/
function SERVER_installTool($pkgName)
{
	$ret=exec("
	export DEBIAN_FRONTEND=noninteractive
	sudo apt-get update
	
	sudo apt-get --force-yes -y install $pkgName
	",$output,$rv);
	return($rv == 0);
};





/**
**name SERVER_programmStatus($progname,$pkgName,$daemonScript,$description,$infoString,$canBeInstalled)
**description shows a row with information about the status of a certain program, with the possibillity to start, stop or restart the program.
**parameter progname: the name of the programm (e.g. "apache" for the Apache web server)
**parameter daemonScript: set it to the script that should be used for starting, stopping and restarting. If the script name isn't set, this is a normal tool and NOT a daemon.
**parameter canBeInstalled: set to "true" if the programm can be installed by the package name
**/
function SERVER_programmStatus($progname,$pkgName,$daemonScript,$description,$infoString,$canBeInstalled=true)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$daemon = !empty($daemonScript);

	switch ($_POST["SEL_action$progname"])
		{
			case "stop":
			case "start":
			case "restart":
				SERVER_daemonStartStop($daemonScript,$_POST["SEL_action$progname"]);
				break;
			case "install":
				SERVER_installTool($pkgName);
				break;
		};
	
	$actionList[name0]=$I18N_noAction;
	$actionList[val0]="nothing";
	
	if ($daemon)
		{
			$running=SERVER_isProgramRunning($progname);

			if ($running)
				{
					//daemon is installed and running
					$actionList[name1]=$I18N_daemonStop;
					$actionList[val1]="stop";
					$actionList[name2]=$I18N_daemonRestart;
					$actionList[val2]="restart";
					$statusImg="/gfx/status/green.png";
				}
			else
				{
					if (SERVER_checkPackageInstalled($pkgName))
						{
							//daemon is installed, but not running
							$actionList[name1]=$I18N_daemonStart;
							$actionList[val1]="start";
							$statusImg="/gfx/status/yellow.png";
						}
					else
						{
							if ($canBeInstalled)
								{
									//daemon not installed
									$actionList[name1]=$I18N_install;
									$actionList[val1]="install";
								};
							$statusImg="/gfx/status/red.png";
						};
				};
		}
	else
		{//it's a normal program
			if (SERVER_checkPackageInstalled($pkgName))
				$statusImg="/gfx/status/green.png";
			else
				{
					$actionList[name1]=$I18N_install;
					$actionList[val1]="install";
					$statusImg="/gfx/status/red.png";
				};
		};

	$selection = HTML_listSelection("SEL_action$progname",$actionList,$first);


	$infoHTML="<table cellpadding=\"5\">
		<tr>
			<td><img src=\"$statusImg\"></td>
			<td>$infoString</td>
		</tr>
		</table>";
	
	echo("
<tr>
	<td>$progname</td>
	<td>$description</td>
	<td>$infoHTML</td>
	<td>$selection</td>
</tr>
	");
	
	return($first);
};





/**
**name SERVER_apacheInfo()
**description returnes an information string for the Apache server
**/
function SERVER_apacheInfo()
{
	return($_SERVER['SERVER_SOFTWARE']);
};





/**
**name SERVER_mysqlInfo()
**description returnes an information string for the MySQL server
**/
function SERVER_mysqlInfo()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	$info = "$I18N_MySqlVersion: ".mysql_get_client_info().
			" $I18N_MySqlProtocol: ".mysql_get_proto_info()." ".mysql_stat();
	
	return($info);
};





/**
**name SERVER_dhcpInfo()
**description returnes an information string for the DHCP server
**/
function SERVER_dhcpInfo()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	//get the amount of the hosts in dhcpd.conf
	$hostAmount = exec("grep \"host \" /m23/dhcp/dhcpd.conf | wc -l");
	
	return("$I18N_dhcpdHostAmount: $hostAmount");
};





/**
**name SERVER_LDAPInfo()
**description Returnes an information string for the LDAP server.
**/
function SERVER_LDAPInfo()
{
	//Get the status about open ports of the LDAP server
	$ldapPortStatus = SERVER_runInBackground('ldapPortStatus', "lsof -i | grep slapd | tr -s '[:blank:]'", "root", false);

	return(nl2br($ldapPortStatus));
};





/**
**name SERVER_programmStatusTableHeader()
**description shows the header of the table needed for the programm status lines
**/
function SERVER_programmStatusTableHeader()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	HTML_showTableHeader();

	echo("
		<tr>
			<td><span class=\"subhighlight\">$I18N_programName</span></td>
			<td><span class=\"subhighlight\">$I18N_description</span></td>
			<td><span class=\"subhighlight\">$I18N_status</span></td>
			<td><span class=\"subhighlight\">$I18N_action</span></td>
		</tr>
		");
};





/**
**name SERVER_runInBackground($jobName,$cmds,$user,$runInScreen)
**description Runs a script with "screen" in the background under a given user
**parameter jobName: name of the job screen should show
**parameter cmds: the commands of the script 
**parameter user: user the script should be run under
**parameter runInScreen: Set to true if the execution should be done in "screen". False executes it under the normal BASH.
**/
function SERVER_runInBackground($jobName,$cmds,$user="root",$runInScreen=true)
{
	$cmdf="/m23/tmp/$jobName.sh";
	$lock="/m23/tmp/$jobName.lock";

	$file=fopen($cmdf,"w");

	fwrite($file,
	"#!/bin/bash
	rm $lock 2> /dev/null
	touch $lock
$cmds
	#rm $cmdf
	#rm $lock\n");

	fclose($file);

	//Choose the execution mechanism
	if ($runInScreen)
		$execCMD = "sudo su - $user -c \"screen -dmS $jobName $cmdf\"";
// 		$execCMD = "sudo screen -dmS $jobName sudo -i -u $user $cmdf";
	else
		$execCMD = "sudo sudo -i -u $user $cmdf";

return(shell_exec("
	chmod +x $cmdf
$execCMD
	"));
};





/**
**name SERVER_runningInBackground($jobName)
**description Returns "true" if a lock file for a given job name is existing.
**parameter jobName: name of the job
**/
function SERVER_runningInBackground($jobName)
{
	$lockFile = "/m23/tmp/$jobName.lock";
	
	if (file_exists($lockFile))
	{
		//Get the user of the lock file (this is the user the process is executed under)
		$tmp = posix_getpwuid(fileowner($lockFile));
		$user = $tmp['name'];

		return(SERVER_runningInScreen($jobName, $user));
	}
	else
		return(false);
};
//du /var/spool/squid | tail -n1 | tr -d [:blank:] | cut -d'/' -f1





/**
**name SERVER_runningInScreen($jobName, $user)
**description Returns "true" if a screen session with a given name exists for a given user.
**parameter jobName: name of the job.
**parameter user: User the screen session is run under.
**/
function SERVER_runningInScreen($jobName, $user)
{
	$jobName = trim($jobName);
	//Get the amount of the screens with the given job name
	$ret = SERVER_runInBackground("$jobName-checkRunning","screen -ls | egrep [0-9]*\.".$jobName."[[:blank:]]* -c",$user,false);

	//If there are jobs reported by screen the process runs
	return($ret > 0);
}





/**
**name SERVER_addLineToFile($file,$search,$add)
**description Adds (if the search pattern can't be found) a line to a file on the server
**parameter file: name of the file to edit
**parameter search: the search pattern
**parameter add: the line to add
**returns: true on successfully execution otherwise false.
**/
function SERVER_addLineToFile($file,$search,$add)
{
	$shellFile="/m23/tmp/hostsAdd.sh".md5(time());
	$fp=fopen($shellFile,"w");
	fwrite($fp,EDIT_addIfNotExists($file,$search,$add));
	fclose($fp);

	exec("sudo sh $shellFile",$output,$rv);
	unlink($shellFile);
	return($rv == 0);
};





/**
**name SERVER_deleteFile($fileName)
**description Deletes a file from the server.
**parameter fileName: Name of the file to delete.
**returns: true on successfully execution otherwise false.
**/
function SERVER_deleteFile($fileName)
{
	exec("sudo rm '$fileName'",$output,$rv);
	return($rv == 0);
}





/**
**name SERVER_getFileContents($fileName)
**description Get the contents of any file (even if only readable by root).
**parameter fileName: Name of the file to read.
**returns: Contents of the file
**/
function SERVER_getFileContents($fileName)
{
 	exec("sudo cat '$fileName'",$arr);
	$text = implode($arr,"\n");
	return($text);
}





/**
**name SERVER_putFileContents($fileName, $text, $mode="600", $user="root", $group="root")
**description Stores a text to a file and changes it's mode, user and group.
**parameter fileName: Name of the file to put the text to.
**parameter text: The contents the file should have.
**parameter mode: The access mode the file should have.
**parameter user: The owner of the file.
**parameter group: The owning group of the file.
**returns true on success and false otherwise.
**/
function SERVER_putFileContents($fileName, $text, $mode="600", $user="root", $group="root")
{
	$tempFile = "/m23/tmp/SERVER_putFileContents".md5(rand());
	$fp = fopen($tempFile,'w');
	fwrite($fp,"
rm -f '$fileName'
sudo cat >> '$fileName' << \"EOFEet8efu5nofieH3eitaesohRiurashaeEOF\"
$text
EOFEet8efu5nofieH3eitaesohRiurashaeEOF
chown $user.$group '$fileName'
chmod $mode '$fileName'
");
	exec("sudo sh $tempFile",$out,$ret);
	unlink($tempFile);
	return($ret == 0);
}





/**
**name SERVER_delLineFromFile($file,$search)
**description Deletes lines from the file that match the search pattern
**parameter file: name of the file to edit
**parameter search: the search pattern
**returns: true on successfully execution otherwise false.
**/
function SERVER_delLineFromFile($file,$search)
{
	$shellFile="/m23/tmp/hostsDel.sh".md5(time());
	$fp=fopen($shellFile,"w");
	fwrite($fp,EDIT_deleteMatching($file,$search));
	fclose($fp);

	exec("sudo sh $shellFile",$output,$rv);
	unlink($shellFile);
	return($rv == 0);
};





/**
**name SERVER_addEtcHosts($hostname,$ip)
**description Adds a host to /etc/hosts and /etc/backuppc/hosts (if it doesn't exists allready)
**parameter hostname: name of the host to add
**parameter ip: its IP
**/
function SERVER_addEtcHosts($hostname,$ip)
{
	if ($_SESSION['m23Shared']) return(false);

	SERVER_addLineToFile("/etc/hosts"," $hostname$","$ip $hostname");
	
	if (file_exists("/etc/backuppc/hosts"))
		SERVER_addLineToFile("/etc/backuppc/hosts","^$hostname ","$hostname 0 root");
};





/**
**name SERVER_delEtcHosts($hostname)
**description Deletes a host entry from /etc/hosts and /etc/backuppc/hosts
**parameter hostname: name of the host to delete
**/
function SERVER_delEtcHosts($hostname)
{
	if ($_SESSION['m23Shared']) return(false);

	SERVER_delLineFromFile("/etc/hosts"," $hostname$");

	if (file_exists("/etc/backuppc/hosts"))
		SERVER_delLineFromFile("/etc/backuppc/hosts","^$hostname ");
};





/**
**name SERVER_getInstallationMedium()
**description Tries to figure out how the m23 server was installed
**returns: CD, Internet or Unknown source.
**/
function SERVER_getInstallationMedium()
{
	$ret=exec("liloCnt=`grep \"default=m23angelOne\" -c /etc/lilo.conf`
	pkgCnt=`dpkg --get-selections | grep -v deinstall$ | tr -d [:blank:] | sed 's/install$//g' | grep ^m23$`

	if [ \$liloCnt -eq 1 ]
	then
		echo CD
	else
		if [ \$pkgCnt -eq 1 ]
		then
			echo Internet
		else
			echo \"Unknown source\"
		fi
	fi
	");
	return($ret);
}





/**
**name SERVER_getOS()
**description Returns the version string of the distribution.
**returns: version string.
**/
function SERVER_getOS()
{
	$info=HELPER_getFileContents("/etc/issue");
	$out=explode(" [\].",$info);
	return($out[0]);
}





/**
**name SERVER_checkDownload($useProxy)
**description Downloads a special file from m23.sf.net and checks if the size and md5 sum are matching.
**parameter: useProxy: Set to true if the local proxy should be used.
**returns: Status information if file size and md5 sum are matching.
**/
function SERVER_checkDownload($useProxy)
{
	if ($useProxy)
		$proxy="export http_proxy=127.0.0.1:2323\n";
	else
		$proxy="";

	exec("$proxy
	rm /tmp/m23dlcheck
	wget http://m23.sourceforge.net/randomDownloadData -O /tmp/m23dlcheck
	");
	
	$md5=md5_file("/tmp/m23dlcheck");
	$size=filesize("/tmp/m23dlcheck");
	
	if ($md5 == "960b8b014f0bec31723a222e6af82979")
		$md5="MD5 ok";
	else
		$md5="MD5 mismatch! Calculated $md5, but should be 960b8b014f0bec31723a222e6af82979";


	if ($size == 262144)
		$size="Size ok";
	else
		$size="Size mismatch! Calculated $size, but should be 262144.";

	return("$md5 $size");
}





/**
**name SERVER_checkDiskFree()
**description Reports the free space of all mounted media.
**returns: Output of "df".
**/
function SERVER_checkDiskFree()
{
	exec("LC_ALL=C; df",$outA);
	return(implode("\n",$outA));
}





/**
**name SERVER_checkRunInVM()
**description Checks if the m23 server is executed in a virtual machine or on native hardware.
**returns: VMWare, VirtualBox or native.
**/
function SERVER_checkRunInVM()
{
	if (exec("dmesg | grep \"VMware Virtual\" -c") > 0)
		return("VMWare");
		
	if (exec("dmesg | grep 'VBOX' | egrep -i -c '(disk|drive)'") > 0)
		return("VirtualBox");

	return("native");
}





/**
**name SERVER_checkKernel()
**description Returns the kernel information string of "uname -a".
**returns: Kernel information string.
**/
function SERVER_checkKernel()
{
	return(exec("uname -a"));
}





/**
**name SERVER_multiMkDir($path, $mode)
**description Creates a directory and all needed directories on the way to the destination path.
**parameter path: The complete path to create.
**parameter mode: The access mode of the path to create (should start with "0" e.g. 0777)
**/
function SERVER_multiMkDir($path, $mode)
{
	//Split the whole path in parts that will get created one by one
	$parts = explode("/",$path);

	//Storing the current path to create
	$p = "";

	//Running thru the single parts
	foreach ($parts as $part)
	{
		//Add the new part to the current path to create
		$p .= "$part/";
		//Create the path without error code
		@mkdir($p, $mode);
	}
}
?>