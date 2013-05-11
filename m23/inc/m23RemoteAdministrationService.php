<?php

define('RAS_services','www ssh');





/**
**name RAS_getTunnelPid($port)
**description Returns the PID of the tunnel that is opened on a given local port.
**parameter port: The local port.
**returns: PID of the tunnel.
**/
function RAS_getTunnelPid($port)
{
	return(exec("ps -Af | grep afclient | grep -v grep | grep '\-p $port' | tr -s '[:blank:]' | cut -d' ' -f2"));
}





/**
**name RAS_gethttpPassword()
**description Returns and stores the htaccess chat password to the m23 server.
**returns: The chat password.
**/
function RAS_gethttpPassword()
{
	
	if (RMV_exists4IP("httpPassword", "m23RemoteAdministrationService"))
		{
			$httpPassword = RMV_get4IP("httpPassword", "m23RemoteAdministrationService");
		}
	else
		{
			//Some simple salt at the beginning
			$pass = 'm23';

			//Run thru the services
			foreach (explode(' ',RAS_services) as $service)
			{
				//Get the parameters for starting the tunnel
				$line = SERVER_getFileContents(m23RASTunnelScript."-$service");
				//Get the "--pass " parameter and the fowllwing password
				preg_match('@(--pass )([^ ]*)@',$line, $allParamPass);
				//Add the new password to all passwords
				$pass .= $allParamPass[2];
			}

			//Hash it to get the final password
			$httpPassword = HELPER_md5x5($pass);

			RMV_set4IP("httpPassword", $httpPassword, "m23RemoteAdministrationService");
		}

	return($httpPassword);
}





/**
**name RAS_getChatUser()
**description Returns chat user to the m23 server.
**returns: The chat user.
**/
function RAS_getChatUser()
{
	return(RMV_get4IP("accountName", "m23RemoteAdministrationService"));
}





/**
**name RAS_chatWindow()
**description Shows the chat window for RAS.
**/
function RAS_chatWindow()
{
	$user = RAS_getChatUser();
	$httpPass = RAS_gethttpPassword();
	$chatPass = HELPER_md5x5($httpPass);
	
	echo('<iframe src="https://'.$user.':'.$httpPass.'@ras.goos-habermann.de:777/chat/?user='.$user.'&pass='.$chatPass.'" width="90%" height="450"></iframe>');
}





/**
**name RAS_writeTunnelScripts($afclientScripts)
**description Writes the RAS tunnel scripts.
**parameter afclientScripts: The command lines for apf-client to connect to www and ssh.
**returns: true on successfully import otherwise false.
**/
function RAS_writeTunnelScripts($afclientScripts)
{
	//Split the input by lines
	$lines = explode("\n", $afclientScripts);
	$ret = true;

	//Run thru the lines
	foreach ($lines as $line)
	{
		//Part the script from the service name (www or ssh)
		$scriptService = explode('#',$line);

		//Check if we got a service (in case of empty lines there is none)
		if (isset($scriptService[1]{1}))
			$ret = ($ret && SERVER_putFileContents(m23RASTunnelScript."-$scriptService[1]", "#!/bin/bash\n$scriptService[0]", '700'));
	}

	return($ret);
}





/**
**name RAS_showStartStopRemove()
**description Shows a dialog for starting, stopping and removing of RAS and status information.
**/
function RAS_showStartStopRemove()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	HTML_showFormHeader();




	//Start/Open the tunnels
	if (HTML_submit('BUT_start', $I18N_daemonStart))
	{
		RAS_start();
	}



	//Stop/Close/Kill the tunnels
	if (HTML_submit('BUT_stop', $I18N_daemonStop))
	{
		SERVER_killPID(RAS_getTunnelPid(80));
		SERVER_killPID(RAS_getTunnelPid(22));
	}



	//Remove RAS definitely
	if (HTML_submit('BUT_remove2', $I18N_deleteDefinitely))
	{
		RAS_remove();
	}
	//Show the dialog fore real deletion
	elseif (HTML_submit('BUT_remove', $I18N_remove))
	{
		HTML_showTableHeader(true);
		HTML_setPage('m23RemoteAdministrationService');
		HTML_submit('BUT_back', $I18N_back);

		echo('<tr><td>');
			MSG_showInfo($I18N_shouldTheRASAccountBeDeleted);
		echo('</td></tr>
			<tr><td align="center">'.BUT_remove2.BUT_back.'</td></tr>
		');

		HTML_showTableEnd(true);
	}
	else
	{
		//Begin the page
		echo('<span class="title">'.$I18N_RASStatus.'</span>');
		HTML_showTableHeader(true,'subtable2');
		HTML_setPage('m23RemoteAdministrationService');

		//Prepare buttons and status info
		if (RAS_isRunning())
			$button = BUT_stop;
		else
			$button = BUT_start.BUT_remove;

		$wwwStatus = RAS_tunnelOpenHTMLStatus('www');
		$sshStatus = RAS_tunnelOpenHTMLStatus('ssh');

		HTML_submit('BUT_refresh',$I18N_refresh);
		HTML_logArea('LOG_ssh', 50, 10, SERVER_getFileContents('/m23/log/afclient22.log'));
		HTML_logArea('LOG_www', 50, 10, SERVER_getFileContents('/m23/log/afclient80.log'));
	
		echo('
			<tr><td>'.$I18N_sshTunnel.'<br>'.LOG_ssh.'<br>'.$sshStatus.'</td><td>'.$I18N_wwwTunnel.'<br>'.LOG_www.'<br>'.$wwwStatus.'</td></tr>
			<tr><td colspan="2" align="center">
				<br>'.$I18N_status.': '.$status.'<br>
				<br>'.$button.BUT_refresh.'<br>
			</td></tr>
		');
		HTML_showTableEnd(true);
	}

	HTML_showFormEnd();
}





/**
**name RAS_tunnelOpenHTMLStatus($service)
**description Generates a HTML status line for a tunnel.
**parameter service: The name of the specific service.
**returns: A HTML status line for the tunnel.
**/
function RAS_tunnelOpenHTMLStatus($service)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	if (RAS_isRunning($service))
		$status = "<img src=\"/gfx/status/green.png\"> $I18N_tunnelOpen";
	else
		$status = "<img src=\"/gfx/status/red.png\"> $I18N_tunnelClosed";

	return($status);
}





/**
**name RAS_isRunning($serviceIn = false)
**description Checks if the RAS tunnels or a choosen tunnel are/is open.
**parameter serviceIn: false, if all services should be checked, or a specific service name.
**returns: true if the tunnel(s) is/are open otherwise false.
**/
function RAS_isRunning($serviceIn = false)
{
	$ret = false;

	//Check, if all services should be checked
	if ($serviceIn === false)
		$services = explode(' ',RAS_services);
	else
		$services = array($serviceIn);

	foreach ($services as $service)
		$ret = (SERVER_runningInBackground("RAS-$service") || $ret);

	return($ret);
}





/**
**name RAS_start()
**description Starts the RAS tunnels.
**/
function RAS_start()
{
	foreach (explode(' ',RAS_services) as $service)
	{
		$script = m23RASTunnelScript."-$service";
		SERVER_runInBackground("RAS-$service",$script);
	}
}





/**
**name RAS_showRegistration()
**description Shows the registration dialog for a new RAS account.
**/
function RAS_showRegistration()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	HTML_input('ED_eMail');
	HTML_input('ED_eMail2');
	HTML_input('ED_residentName');
	HTML_input('ED_street');
	HTML_input('ED_houseNumber');
	HTML_input('ED_postCode');
	HTML_input('ED_city');
	HTML_input('ED_serverNameOrIP',$_SERVER['SERVER_NAME']);
	HTML_textArea('TA_comment', 22, 6);
	HTML_submit('BUT_send',$I18N_sendToGoosHabermannDe);
	$randomKey = RAS_getRandomKey();
	$answer = HELPER_ucrc32(MAIL_getKeyFromeMailAddress($randomKey));


	echo('<span class="title">'.$I18N_RegisterNewm23RemoteAdministrationServiceAccount.'</span>
	<form method="post" action="https://ras.goos-habermann.de:777/m23RemoteAdministrationService-RequestKey.php">
	<input type="hidden" name="randomKey" value="'.$randomKey.'">
	<input type="hidden" name="answer" value="'.$answer.'">
	<input type="hidden" name="lang" value="'.$GLOBALS['m23_language'].'">
	');
	HTML_showTableHeader(true,'subtable2');


	echo('
		<tr><td><span class="subhighlight">'.$I18N_billingAddress.'</span></td><td></td></tr>
		<tr><td>'.$I18N_m23sharedResidentName.'</td><td>'.ED_residentName.'</td></tr>
		<tr><td>'.$I18N_m23sharedStreet.'</td><td>'.ED_street.'</td></tr>
		<tr><td>'.$I18N_m23sharedHouseNumber.'</td><td>'.ED_houseNumber.'</td></tr>
		<tr><td>'.$I18N_m23sharedPostCode.'</td><td>'.ED_postCode.'</td></tr>
		<tr><td>'.$I18N_m23sharedCity.'</td><td>'.ED_city.'</td></tr>
		<tr><td>'.$I18N_email.'</td><td>'.ED_eMail.'</td></tr>
		<tr><td>'.$I18N_repeated_email.'</td><td>'.ED_eMail2.'</td></tr>
		<tr><td>'.$I18N_serverNameOrIP.'</td><td>'.ED_serverNameOrIP.'</td></tr>
		<tr><td>'.$I18N_comment.'</td><td>'.TA_comment.'</td></tr>
		<tr>
			<td colspan="2" align="center"><br>'.BUT_send.'<br><br>
				<a href="https://ras.goos-habermann.de:777/securityLogo.html" target="_blank">'.$I18N_showSecurityLogoInstallCertificate.'</a><br>
			</td>
		</tr>
	');

	HTML_showTableEnd(true);
	echo('</form>');
}





/**
**name RAS_showAccountDataImport()
**description Shows a dialog for importing the RAS account data.
**/
function RAS_showAccountDataImport()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	HTML_showFormHeader();
	
	HTML_setPage('m23RemoteAdministrationService');

	$msg = HTML_textArea('TA_accountData', 75, 15);
	
	if (HTML_submit('BUT_import',$I18N_import))
		{
			//If the import of the accound data worked
			if (RAS_importMsg($msg))
			{
				//Install the APF client
				if (!SERVER_checkPackageInstalled('apf-client'))
					SERVER_installTool('apf-client');

				HTML_submit('BUT_next', $I18N_next);
			}
			else
				HTML_submit('BUT_next', $I18N_back);
			
			
			echo(BUT_next);
		}
	else
		{
			echo('<span class="title">'.$I18N_Importm23RemoteAdministrationServiceAccountData.'</span>');

			HTML_showTableHeader(true,'subtable2');
			echo('
				<tr><td>'.$I18N_m23RemoteAdministrationServiceAccountData.'</td><td>'.TA_accountData.'</td></tr>
				<tr><td colspan="2" align="center"><br>'.BUT_import.'<br></td></tr>
			');
			HTML_showTableEnd(true);
		}

	HTML_showFormEnd();
}





/**
**name RAS_remove()
**description Removes all RAS settings.
**/
function RAS_remove()
{
	SERVER_delAdmin('m23RASAdmin');
	SERVER_delLineFromFile('/root/.ssh/authorized_keys','m23service@goos-habermann.de');
	SERVER_deleteFile(m23RASTunnelScript.'-www');
	SERVER_deleteFile(m23RASTunnelScript.'-ssh');
	RMV_rm4IP("httpPassword", "m23RemoteAdministrationService");
	RMV_rm4IP("accountName", "m23RemoteAdministrationService");
}





/**
**name RAS_isInstalled()
**description Checks if RAS is installed.
**returns: true if it is installed otherwise false.
**/
function RAS_isInstalled()
{
	return(SERVER_fileExists(m23RASTunnelScript.'-www'));
}





/**
**name RAS_importMsg($msg)
**description Imports an account data block from pasted message.
**parameter msg: Complete eMail message containing the account data block.
**returns: true on successfully import otherwise false.
**/
function RAS_importMsg($msg)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$errMsg = $okMsg = '';
	$ret = true;

	//Get a clean account data block
	$msg = RAS_getMsg($msg);

	if (isset($msg{1}))
	{
		//Get the key
		$key = MAIL_getKeyFromeMailAddress(RAS_getRandomKey());

		//Get the unencrypted and uncompressed account data
		$accountData = unserialize(gzuncompress(MAIL_AESDecode($key, base64_decode($msg))));
	}

	//Check if the account data is correct
	if ($accountData['md5'] == md5($accountData['afclient'].$accountData['m23adminPass'].$accountData['sshKey'].$accountData['accountName']))
	{
		if (SERVER_addAdmin('m23RASAdmin', $accountData['m23adminPass']))
			$okMsg .= "&bull; $I18N_admin<span class=\"highlight\"> m23RASAdmin </span> $I18N_was_created.<br><br>";
		else
			$errMsg .= "&bull; <span class=\"highlight\"> m23RASAdmin </span>: $I18N_could_not_create_admin.<br><br>";

		if (SERVER_insertLineNumber('/root/.ssh/authorized_keys', 0, $accountData['sshKey']))
			$okMsg .= "&bull; $I18N_SSHKeyAddedToRootSSHauthorized_keys<br><br>";
		else
			$errMsg .= "&bull; $I18N_SSHKeyCouldNotBeAddedToRootSSHauthorized_keys";

		if (RAS_writeTunnelScripts($accountData['afclient']))
			$okMsg .= "&bull; $I18N_m23RemoteAdministrationServiceOpenTunnelScriptWritten<br><br>";
		else
			$errMsg .= "&bull; $I18N_m23RemoteAdministrationServiceOpenTunnelScripCouldNotBetWritten";

		//Set the account name for this server
		RMV_set4IP('accountName', $accountData['accountName'], "m23RemoteAdministrationService");
	}
	else
		$errMsg .= "&bull; $I18N_Corruptm23RemoteAdministrationServiceAccountData";

	if (isset($okMsg{1})) MSG_showInfo($okMsg);
	if (isset($errMsg{1}))
	{
		MSG_showError($errMsg);
		$ret = false;
	}

	return($ret);
}





/**
**name RAS_getMsg($msg)
**description Gets the account data block from pasted message.
**parameter msg: Complete eMail message containing the account data block.
**returns: Data block.
**/
function RAS_getMsg($msg)
{
	$lines = explode("\n",$msg);
	$msg = '';
	$start = false;

	foreach ($lines as $line)
	{
		if ($start && strpos($line,"####### m23 remote administration service - Account information end #######") !== false)
			return($msg);

		if ($start)
			$msg .= $line;

		if (!$start && strpos($line,"####### m23 remote administration service - Account information begin #####") !== false)
			$start = true;
	}

	return($msg);
}





/**
**name RAS_getRandomKey()
**description Generates a random key (once) for the m23 remote administration service and returns it on every call.
**returns: Random key for this server.
**/
function RAS_getRandomKey()
{
	if (RMV_exists4IP("randomKey", "m23RemoteAdministrationService"))
		{
			$randomKey = RMV_get4IP("randomKey", "m23RemoteAdministrationService");
		}
	else
		{
			$randomKey = HELPER_generateSalt(32);
			RMV_set4IP("randomKey", $randomKey, "m23RemoteAdministrationService");
		}

	return($randomKey);
}
?>