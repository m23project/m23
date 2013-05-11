<?

define('SERVERBACKUP_CONFIG_FILE','/m23/root-only/serverBackup.conf');



/**
**name SERVERBACKUP_getBackupConfiguration()
**description Gets the server backup configuration.
**returns Associative array with the variable name as key and its value as value.
**/
function SERVERBACKUP_getBackupConfiguration()
{
// 	$configFileAmount = SERVER_runInBackground('SERVERBACKUP_CONFIG_FILE', "ls ".SERVERBACKUP_CONFIG_FILE." | grep -c ".SERVERBACKUP_CONFIG_FILE,"root", false);

	if (!SERVER_fileExists(SERVERBACKUP_CONFIG_FILE))
		SERVERBACKUP_storeBackupConfiguration(array());

	//Get all lines of the config file
	$lines = explode("\n",SERVER_getFileContents(SERVERBACKUP_CONFIG_FILE));
	//Run thru the lines
	foreach($lines as $line)
	{
		//Don't process if the line is empty
		if (strlen($line) == 0)
			continue;

		//Split the variable name from the quoted value
		$varQuoted = explode("=",$line);
		//Split the value from the quotes
		$quoteValQuote = explode('"',$varQuoted[1]);
		//Store the variable name as key and the unquoted value as value
		$out[$varQuoted[0]] = $quoteValQuote[1];
	}
	return($out);
}





/**
**name SERVERBACKUP_storeBackupConfiguration($conf)
**description Stores the server backup configuration.
**parameter conf: Associative array with the configuration values with the variable name as key and its value as value.
**/
function SERVERBACKUP_storeBackupConfiguration($conf)
{
	$conf['CONF_GPG_USER'] = CONF_GPG_USER;
	$conf['CONF_GPG_HOME'] = CONF_GPG_HOME;

	$text="";
	//Put all variables with quoted values into $text
	foreach($conf as $var => $value)
		$text .= "$var=\"$value\"\n";

	//Finally write the files
	SERVER_putFileContents(SERVERBACKUP_CONFIG_FILE, $text);
}





/**
**name SERVERBACKUP_showConfigurationDialog()
**description Shows a dialog for configuring the server backup.
**/
function SERVERBACKUP_showConfigurationDialog()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Store a previous configuration
	$conf = SERVERBACKUP_getBackupConfiguration();

	//Create the dialog elements
	$conf['uploadServices'] = HTML_selection("SEL_uploadService", array("-" => "-" , "scp" => "scp", "share-online.biz" => "share-online.biz"), SELTYPE_selection, true, $conf['uploadServices']);

	//Reload button to change the upload type
	HTML_submit("BUT_changeBackupUploadType", $I18N_change);

	//Create dialog elements used on all
	$conf['user'] = HTML_input("ED_user", $conf['user']);
	$conf['gpgKey'] = HTML_selection("SEL_gpgKey", MAIL_getGpgKeyList(), SELTYPE_selection, true, $conf['gpgKey']);

	//Link with icon for calling the GPG key management dialog
	$manageGPGKeysLink = '<div align="right"><a href="index.php?page=manageGPGKeys"><img src="/gfx/gpg-mini.png" border=0> '.$I18N_manageGPGKeys.'</a></div>';

	//Create the necessary dialog elements based on the upload type
	switch($conf['uploadServices'])
	{
		case 'share-online.biz':
			$pwd1 = HTML_input("ED_pwd1", $conf['pass'], 20, 255, INPUT_TYPE_password);
			$pwd2 = HTML_input("ED_pwd2", $conf['pass'], 20, 255, INPUT_TYPE_password);
			break;
		case 'scp':
			$conf['scpServer'] = HTML_input("ED_scpServer", $conf['scpServer']);
			$conf['scpStoreDirectory'] = HTML_input("ED_scpStoreDirectory", $conf['scpStoreDirectory']);
			break;
	}


	//Save the settings
	if (HTML_submit("BUT_saveBackupConfig",$I18N_save))
	{
		$errMsg = "";
		$allOK = true;

		if ($conf['uploadServices'] !== "-")
		{
			//Do some variable checking
			if (strlen($conf['user']) == 0) { $errMsg .= "&bull; $I18N_userNameInvalid<br>"; $allOK = false; }
			if (strlen($conf['gpgKey']) == 0) { $errMsg .= "&bull; $I18N_noGPGKeySeletect<br>"; $allOK = false; }

			if ($conf['uploadServices'] == 'share-online.biz')
			{
				if ($pwd1 != $pwd2) { $errMsg .= "&bull; $I18N_passwords_dont_match<br>"; $allOK = false; }
				if (strlen($pwd1) < 8) { $errMsg .= "&bull; $I18N_passwordTooShort<br>"; $allOK = false; }
			}
		}

		//Show error or continue
		if (!$allOK)
			MSG_showError($errMsg);
		else
		{
			//Store the configuration
			$conf['pass'] = $pwd1;
			SERVERBACKUP_storeBackupConfiguration($conf);
		
		}
	}

	//Show the dialog elements for choosing the backup options
	echo("<span class=\"titlesmal\">$I18N_encryptAndUploadBackup</span>");
	HTML_showTableHeader(true,"subtable2");
	HTML_showTableRow($I18N_onlineFileStoringService,SEL_uploadService.BUT_changeBackupUploadType);

	//Show the needed dialog elements by selected upload service
	switch($conf['uploadServices'])
	{
		case 'share-online.biz':
			HTML_showTableRow($I18N_user,ED_user);
			HTML_showTableRow($I18N_password,ED_pwd1);
			HTML_showTableRow($I18N_repeated_password,ED_pwd2);
			HTML_showTableRow($I18N_gpgKey,SEL_gpgKey.$manageGPGKeysLink);
			break;
		case 'scp':
			HTML_showTableRow($I18N_user,ED_user);
			HTML_showTableRow($I18N_scpServer,ED_scpServer);
			HTML_showTableRow($I18N_scpStoreDirectory,ED_scpStoreDirectory);
			HTML_showTableRow($I18N_gpgKey,SEL_gpgKey.$manageGPGKeysLink);
			break;
	}
	
	HTML_showTableRow("",BUT_saveBackupConfig);
	HTML_showTableEnd(true);

	SERVERBACKUP_runBackupNowDialog();

	//Show the cron management for the server backup
	CRON_cronManagementDialog("root", "/m23/bin/m23Backup", "m23ServerBackup", true);
}





/**
**name SERVERBACKUP_runBackupNowDialog()
**description Shows a dialog for starting the server backup manually at once.
**/
function SERVERBACKUP_runBackupNowDialog()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Checks if there is a manually backup process running
	$running = SERVER_runningInBackground("m23ServerBackup");

	if (HTML_submit("BUT_runBackupNow",$I18N_runServerBackupNow))
	{
		//If there is no backup process running, start a new
		if (!$running)
		{
			SERVER_runInBackground("m23ServerBackup", "/m23/bin/m23Backup");
			$running = true;
		}
	}

	//Show info message if the backup is executed
	if ($running)
		MSG_showInfo($I18N_serverBackupIsRunning);

	echo("<span class=\"titlesmal\">$I18N_runServerBackupNow</span>");
	HTML_showTableHeader(true,"subtable2");
	HTML_showTableRow(BUT_runBackupNow);
	HTML_showTableEnd(true);
}





/**
**name SERVERBACKUP_getBackupList()
**description Generates a list of existing server backups.
**returns Associative array with information about sizes and dates of the backups.
**/
function SERVERBACKUP_getBackupList()
{
	//Get the sizes and dates of the backups
	$ret = SERVER_runInBackground("getBackupList".md5(rand()),"
	mkdir -p /m23/root-only/serverBackups
	cd /m23/root-only/serverBackups
	ls | sort -r | xargs du | tr -s '[:blank:]' | egrep -v \"\.$\"","root",false);

	$lines = explode("\n",$ret);
	$nr = 0;

	foreach ($lines as $line)
	{
		//Don't process the line if it is empty
		if (strlen($line) == 0)
			continue;

		//Split size from the date in the output from "du"
		$sizeDate = explode("\t",$line);

		//Split the date into year, month, day, hour and minute
		$YMDHM = explode("-",$sizeDate[1]);

		//Store the size
		$out[$nr]['size'] = $sizeDate[0];

		//Store the name of the backup directory
		$out[$nr]['name'] = $sizeDate[1];

		//Calculate the un*x timestamp
		$out[$nr]['ts'] = mktime($YMDHM[3], $YMDHM[4], 0, $YMDHM[1], $YMDHM[2], $YMDHM[0]);
		$nr++;
	}

	return($out);
}





/**
**name SERVERBACKUP_rmBackup($name)
**description Removes server backup.
**parameter name: Name of the backup (that is a in form of YYYY-MM-DD-HH-MM)
**/
function SERVERBACKUP_rmBackup($name)
{
	//Remove black hat's absolute pathes ;-)
	$name = basename($name);

	//Get the sizes and dates of the backups
	$ret = SERVER_runInBackground("rmBackup-$name","cd /m23/root-only/serverBackups
	rm -r $name","root",false);
}





/**
**name SERVERBACKUP_backupOverviewDialog()
**description Shows a dialog with overview of all existing server backups with possibility for deletion.
**/
function SERVERBACKUP_backupOverviewDialog()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$backups = SERVERBACKUP_getBackupList();
	

	HTML_showTableHeader(true,"subtable2");
	HTML_showTableHeading($I18N_date,"$I18N_size (MB)", "");
	
	foreach ($backups as $backup)
	{
		$deleteButton = "BUT_$backup[ts]";
		
		if (HTML_submit($deleteButton,$I18N_delete))
			SERVERBACKUP_rmBackup($backup['name']);
		else
			HTML_showTableRow(strftime($I18N_timeFormat,$backup['ts']), number_format($backup['size'] / 1000, 2), constant($deleteButton));
	}
	HTML_showTableEnd(true);
}

?>