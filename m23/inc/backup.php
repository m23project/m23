<?php
/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions for controling BackupPC
$*/





/**
**name BACKUP_showClientSettings($client)
**description Shows the dialog for starting and configuring BackupPC for a special client
**parameter client: name of the client
**/
function BACKUP_showClientSettings($client)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	HTML_showTableHeader();
	
	if (empty($client))
		$client=$_POST[client];

	$client = strtolower($client);

	if (isset($_POST[BUT_save]))
		BACKUP_saveBackupDirs($client,$_POST['ED_dirs']);
	
	$dirs=BACKUP_getBackupDirs($client);

	HTML_setPage('backup');
	echo("
	<form method=\"post\">
	<input type=\"hidden\" name=\"client\" value=\"$client\">
	<tr>
		<td>$I18N_backup_dirs</td>
		<td><INPUT type=\"text\" size=\"50\" name=\"ED_dirs\" maxlength=\"10000\" value=\"$dirs\"></td>
		</tr>

		<tr>
		<td colspan=\"2\" align=\"center\"><INPUT type=\"submit\" name=\"BUT_save\" value=\"$I18N_save\"></td>
		</tr>
		
		<tr>
		<td colspan=\"2\" align=\"center\"><hr></td>
		</tr>
		
		<tr>
			<td colspan=\"2\" align=\"center\">
				<a href=\"/backuppc/index.cgi?host=$client\">
				<img src=\"/gfx/backuppc.png\">
				</a>
			</td>
		</tr>
		
	</form>
	");

	HTML_showTableEnd();
};





/**
**name BACKUP_getBackupDirs($client)
**description Returns the comma seperated list of directories that should be backupped on the client
**parameter client: name of the client
**/
function BACKUP_getBackupDirs($client)
{
	$client = strtolower($client);
	$filename="/etc/backuppc/$client.pl";

	if (!file_exists($filename))
		return("/");

	$cmd="awk -v FS=\"'\" -v ORS=\"\" '/TarShareName/ {
	for (i=2; i < NF; i+=2)
{
	if (i > 2)
	print(\", \");
	
	print(\$i);
}
}' $filename";

	$fp=popen($cmd,"r");
	$line=fgets($fp,11000);
	pclose($fp);

	return($line);
};





/**
**name BACKUP_saveBackupDirs($client,$dirs)
**description Saves the list of backup diretories oo the client in the BackupPC file
**parameter client: name of the client
**parameter dirs: comma seperated list of all directories to backup on the client
**/
function BACKUP_saveBackupDirs($client,$dirs)
{
	$client = strtolower($client);
	$filename="/etc/backuppc/$client.pl";
	$backupHostLine="$client 0 root";
	
	$dirArr=explode(",",$dirs);
	$addLine="\$Conf{TarShareName} = [";
	
	$addComma=false;
	
	foreach ($dirArr as $dir)
	{
		$dir=trim($dir);
		if ($addComma)
			$addLine.=", '$dir'";
		else
			{
				$addComma=true;
				$addLine.="'$dir'";
			}
	}

	$addLine.="];
\$Conf{XferMethod} = 'tar';";

	if (file_exists($filename))
		{
			SERVER_delLineFromFile($filename,"TarShareName");
			SERVER_delLineFromFile($filename,"XferMethod");
			SERVER_addLineToFile($filename,"TarShareName",$addLine);
		}
	else
		{
			exec("sudo touch $filename
			sudo chown root.root $filename
			sudo chmod 644 $filename
			");
			SERVER_addLineToFile($filename,"TarShareName",$addLine);
		};

	SERVER_addLineToFile("/etc/backuppc/hosts",$backupHostLine,$backupHostLine);
};





/**
**name BACKUP_getAdmins(&$adminLine,&$admins)
**description Stores informations about known administrators in the BackupPC configuration file in variables.
**parameter adminLine: The current line in config.pl that stores the dsmin informations.
**parameter admins: Array with all admins.
**/
function BACKUP_getAdmins(&$adminLine,&$admins)
{
	$adminLine=exec("grep \"^\\\$Conf{CgiAdminUsers}\" /etc/backuppc/config.pl");
	$temp=explode("'",$adminLine);
	$admins=explode(" ",$temp[1]);
};





/**
**name BACKUP_addAdmin($admin)
**description Adds an admin to the config.pl configuration file of BackupPC.
**parameter admin: Name of the admin.
**/
function BACKUP_addAdmin($admin)
{
	BACKUP_getAdmins($adminLine,$admins);
	$admins=array_unique(array_merge($admins,array($admin)));
	$newAdminLine="\$Conf{CgiAdminUsers} = '".implode(" ",$admins)."';";
	$cmd=EDIT_replace("/etc/backuppc/config.pl", $adminLine, $newAdminLine,"g").
	"
	if [ -f /etc/init.d/apache ]
	then
		/etc/init.d/apache reload
	fi

	if [ -f /etc/init.d/apache2 ]
	then
		/etc/init.d/apache2 reload
	fi

	/etc/init.d/backuppc reload
	";
	SERVER_runInBackground("m23addBackupPCAdmin".time(),$cmd,"root",false);
}





/**
**name BACKUP_delAdmin($admin)
**description Deletes an admin from the config.pl configuration file of BackupPC.
**parameter admin: Name of the admin.
**/
function BACKUP_delAdmin($admin)
{
	BACKUP_getAdmins($adminLine,$admins);
	$admins=delValuesFromArray($admins,array(0 => $admin));
	$newAdminLine="\$Conf{CgiAdminUsers} = '".implode(" ",$admins)."';";
	$cmd=EDIT_replace("/etc/backuppc/config.pl", $adminLine, $newAdminLine,"g").
	"
	/etc/init.d/apache reload
	/etc/init.d/backuppc reload
	";
	SERVER_runInBackground("m23delBackupPCAdmin".time(),$cmd,"root",false);
}
?>