<?

include_once('mailConf.php');





/**
**name MAIL_getKeyFromeMailAddress($eMail)
**description Generates an MD5 key from an eMail address.
**parameter eMail: eMail to use as input for the hashing.
**returns Key generated from the eMail.
**/
function MAIL_getKeyFromeMailAddress($eMail)
{
	return(md5(sha1($eMail."m23")."m23"));
}





/**
**name MAIL_AESencode($key,$text)
**description AES encryptes a message with a key.
**parameter key: The passphrase to encode the message with.
**parameter text: The message to encode.
**returns The encrypted message.
**/
function MAIL_AESencode($key,$text)
{
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv);
	return($crypttext);
}





/**
**name MAIL_AESDecode($key, $ctext)
**description AES decryptes a crypted message with a key.
**parameter key: The passphrase to encode the message with.
**parameter cText: The crypted message to decode.
**returns The decrypted message.
**/
function MAIL_AESDecode($key, $ctext)
{
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $ctext, MCRYPT_MODE_ECB, $iv);
	return($decrypttext);
}





/**
**name MAIL_sendAESMail($eMail, $subject, $text)
**description Sends an AES encrypted eMail to a crypt mail gateway.
**parameter eMail: eMail address of the recipient.
**parameter subject: The subject of the eMail.
**parameter text: The eMail message.
**/
function MAIL_sendAESMail($eMail, $subject, $text, $header)
{
	include("/m23/inc/mailConf.php");

	//Get the message ID from the server
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, sendURL."?cmd=code");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // DO NOT RETURN THE CONTENTS OF THE CALL
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // DO NOT follow any redirects
	curl_setopt($ch, CURLOPT_HEADER, false);  // DO NOT RETURN HTTP HEADERS
	$msgID = curl_exec($ch);
	curl_close($ch);

	//Calculate the cryped message ID that can only be known by the client and the server
	$cmsgID = md5(CryptMailerSalt.$msgID);

	//Generate a random salt for this transfer
	$randSalt = md5(mt_rand() * mt_rand());

	//Generate the passphrase for this transfer
	$key = md5(CryptMailerSalt.$randSalt);

	//Store all eMail data into an array
	$data = serialize(array('t' => $text, 'm' => $eMail, 's' => $subject, 'h' => $header));

	//Calculate the MD5 of the serialized array
	$md5 = md5($data);
	$cdata = urlencode(MAIL_AESencode($key, $data));

	//Send the encrypted data via curl API
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, sendURL);
	curl_setopt($ch, CURLOPT_POST, true);
	$data = array('cryptText' => $cryptText, 'md5' => $md5, 'randSalt' => $randSalt, 'cdata' => $cdata, 'cmsgID' => $cmsgID, 'msgID' => $msgID);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
	$Rec_Data = curl_exec($ch);
	curl_close($ch);
}





/**
**name MAIL_attach($file, &$header, $message, $fileName = "")
**description Attaches a file to the message body of the mail and changes the mail header.
**parameter file: The file with full path to attact.
**parameter header: The original header that will be modified.
**parameter message: The text message.
**parameter fileName: Alternate file name for the attacement as it should be seen by the eMail client.
**/
function MAIL_attach($file, &$header, $message, $fileName = "")
{
	//Generate unique ID for the eMail
	$messageID = md5(uniqid(rand()));

	if (is_file($file))
		{
			//Extract the file name from the full path
			$fileName = basename($file);
			$attachment = fread(fopen($file, "r"), filesize($file));
		}
	else
		{
			$attachment = $file;
		}

	// Das sind die Kopfzeilen der Multipart Mail
	$header.= "MIME-Version: 1.0\n";
	$header.= "Content-Type: multipart/mixed; boundary = \"$messageID\"\n";

	//Write block with the message part
	$out = "--".$messageID."\n";
	$out.= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
	$out.= "Content-Transfer-Encoding: 8bit\n\n";
	$out.= "$message\n";

	//Write next block with the attachement
	$out.= "--".$messageID."\n";
	$out.= "Content-Type: ".mime_content_type($file)."; name=\"$fileName\"\n";
	$out.= "Content-Transfer-Encoding: base64\n";
	$out.= "Content-Disposition: attachment; filename=\"$fileName\"\n\n";
	$out.= chunk_split(base64_encode($attachment))."\n";
	$out.= "--".$messageID."--\n";
	
	return($out);
}





/**
**name MAIL_getHeader($from)
**description Generates a mail header with sender and reply-to field, mail software and a BCC to send a copy to the admin.
**parameter from: The sender's eMail address
**returns: Complete mail header.
**/
function MAIL_getHeader($from)
{
	return("From: $from\n".
	"Bcc: ".CONF_MAIL_adminMail."\n".
	"Reply-To: $from\n" .
	'X-Mailer: '.CONF_MAIL_mailer."\n");
}





/**
**name MAIL_gpgMail($message,$eMail)
**description Encrypts a message with GPG for a given eMail address.
**parameter message: The message text to encrypt.
**parameter eMail: The eMail address to search the GPG key for and to encrypt to.
**returns: Encrypted message or false if there were errors.
**/
function MAIL_gpgMail($message,$eMail)
{
	$tmpfname = tempnam("/tmp", "gpgMail");

	//Write a temporary BASH file that encrypts the message
	$handle = fopen($tmpfname, "w");
	fwrite($handle, 'echo -n '.escapeshellarg($message).' | sudo -u '.CONF_GPG_USER.' gpg --homedir '.CONF_GPG_HOME.' --trust-model always --batch --no-tty --yes --comment "'.CONF_GPG_COMMENT.'" --digest-algo sha1 -a -e -s -r "'.$eMail.'" --no-use-agent');
	fclose($handle);

	//Execute the BASH script
	$enc = shell_exec("sh $tmpfname");

	//Delete it
	unlink($tmpfname);

	//if the message is long enough it should be encrypted correctly
	if (strlen($enc) > 250)
		return($enc);
	else
		return(false);
}





/**
**name MAIL_getGpgKeyList()
**description Gets the list of known GPG keys/identities.
**returns: Associative array with key ID as key and the identity with the key information as value.
**/
function MAIL_getGpgKeyList()
{
	//get the list of all known GPG keys
	exec('sudo -u '.CONF_GPG_USER.' gpg --homedir '.CONF_GPG_HOME.' --list-keys',$lines,$retCode);

	$nr=0;
	$keyNr = 0;

	//Run thru the lines
	foreach($lines as $line)
	{
		//Check if the line begibs with "uid","pub" or "sub"
		foreach (array("uid","pub","sub") as $search)
		{
			if (strpos($line,$search) === 0)
			{
				/*
					remove variable and spaces at the beginning of the line
					e.g. "pub   1024D/13DDAB1B 2009-11-12"
					becomes "1024D/13DDAB1B 2009-11-12"
				*/
				$line = preg_replace('/^'.$search.'[ \t]+/', '', $line);

				//If it is not "uid" it is a key
				if ($search != "uid")
					//Store the key with key strength, key ID and expiration date
					$tmp[$nr]['key'][$keyNr++] = $line;
				else
					//Store the user ID of this key
					$tmp[$nr]['uid'] = $line;
				break;
			}
		}

		//If it is an empty line the next key follows
		if (strlen($line) === 0)
		{
			$nr++;
			$keyNr = 0;
		}
	}

	if (is_array($tmp))
	{
		//Run thru the identities
		foreach ($tmp as $identity)
		{
			//Run thru the keys
			foreach ($identity['key'] as $key)
			{
				//Split the key strength, key ID and expiration date
				$strengthKeyidDate = preg_split('/[\/ ]+/', $key);
				//Use only the key ID as key and the identity with the key information as value
				$out[$strengthKeyidDate[1]] = $identity['uid'].' '.$key;
			}
		}

		return($out);
	}
		return(array());
}





/**
**name MAIL_importGPGKey($gpgkey)
**description Imports an GPG key into the bunch of GPG keys.
**returns: True on sucess otherwise false.
**/
function MAIL_importGPGKey($gpgkey)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//if there is no (or a too short GPG key) return and allow the further processing of the other values
	if (strlen($gpgkey) < 250)
	{
		MSG_showError($I18N_gpgKeyInvalid_tooShort);
		return(false);
	}

	//try to get the fingerprint from the public key in "$gpgkey"
	exec('echo '.escapeshellarg($gpgkey).' | sudo -u '.CONF_GPG_USER.' gpg --homedir '.CONF_GPG_HOME.' --with-fingerprint',$lines,$retCode);

	if ($retCode != 0)
		{
			MSG_showError($I18N_gpgKeyInvalid_noFingerprintFound);
			return(false);
		}

	//try to import the new public key
	exec('echo '.escapeshellarg($gpgkey).' | sudo -u '.CONF_GPG_USER.' gpg --homedir '.CONF_GPG_HOME.' --batch --import',$dontCare,$retCode);

	if (!($retCode === 0))
		{
			//there was an error importing the key. This may be caused by an corrupted or false public key
			MSG_showError($I18N_gpgKeyInvalid_couldNotImport);
			return(false);
		}

	MSG_showInfo($I18N_gpgKeyImportedSucessfully);
	//if we are here everything should be ok.
	return(true);
};





/**
**name MAIL_deleteGPGKey($keyID)
**description Deletes an GPG key from the bunch of GPG keys.
**parameter keyID: The ID of the GPG key to delete.
**returns: True on sucess otherwise false.
**/
function MAIL_deleteGPGKey($keyID)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	exec('sudo -u '.CONF_GPG_USER.' gpg --homedir '.CONF_GPG_HOME.' --batch --yes --delete-keys '.$keyID,$dontCare,$retCode);
	if ($retCode != 0)
		{
			MSG_showError($I18N_gpgKeyCouldNotBeDeleted);
			return(false);
		}
	else
		{
			MSG_showInfo($I18N_gpgKeyDeletedSucessfully);
			return(true);
		}
}





/**
**name MAIL_manageGPGKeysDialog()
**description Shows a dialog for importing and deleting GPG keys.
**/
function MAIL_manageGPGKeysDialog($showTable = true)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Create dialog element for copy&pasting the GPG key
	$gpgKey = HTML_textArea('TA_gpg', 65, 10);

	if (HTML_submit("BUT_importGPGKey",$I18N_importGPGKey))
		MAIL_importGPGKey($gpgKey);

	//Create selection for choosing the key to delete
	$gpgKeyToDelete = $_POST["SEL_gpgKeyToDelete"];

	if (HTML_submit("BUT_deleteGPGKey",$I18N_delete))
		MAIL_deleteGPGKey($gpgKeyToDelete);
	
	//Create the dialog element for choosing the key to delete AFTER the import/delete oprations
	HTML_selection("SEL_gpgKeyToDelete", MAIL_getGpgKeyList(), SELTYPE_selection, false);

	if ($showTable)
		HTML_showTableHeader(true,"subtable2");
	else
		HTML_showTableHeading("<br>$I18N_manageGPGKeys","");
	HTML_showTableRow(TA_gpg, BUT_importGPGKey);
	HTML_showTableRow(SEL_gpgKeyToDelete, BUT_deleteGPGKey);
	if ($showTable) HTML_showTableEnd(true);
}





/**
**name MAIL_sendMail($eMail, $message, $subject, $file = "", $from = CONF_MAIL_defaultFrom)
**description Sends a mail, that may be GPG encrypted and contain an attachement via the cryptmail gateway.
**parameter eMail: eMail address of the recipient.
**parameter message: The message text.
**parameter subject: The subject of the eMail.
**parameter file: The file name (with full path) to attach or empty if no file should be attached.
**parameter from: The sender's email address.
**/
function MAIL_sendMail($eMail, $message, $subject, $file = "", $from = CONF_MAIL_defaultFrom)
{
	//Set some basic settings into the mail header
	$header = MAIL_getHeader($from);

	//Check if a file shoud get attached
	if (isset($file{1}))
		$message = MAIL_attach($file, $header, $message);
	else
		{
			$enc = MAIL_gpgMail($message, $eMail);
			if ($enc !== false)
				$message = $enc;
		}

	MAIL_sendAESMail($eMail, $subject, $message, $header);
}





/**
**name MAIL_cryptMailServer()
**description Server part for sending AES mails.
**/
function MAIL_cryptMailServer()
{
	//Check if one the needed constants is defined. If not, the configuration file is not included
	if (constant("CryptMailerDBPWD") === NULL)
		die("Configuration file not included!");

/*
	CREATE DATABASE `cryptMailer` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
	USE cryptMailer;
	CREATE TABLE `codes` (
	`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`code` VARCHAR( 32 ) NOT NULL ,
	UNIQUE (
	`code`
	)
	) TYPE = MYISAM ;
	GRANT SELECT , INSERT , DELETE ON `cryptMailer` . * TO 'cryptMailer'@'localhost';
*/



	//Simple connection to the DB
	function dbConnect()
	{
		$dbConnection=mysql_connect("localhost","cryptMailer",CryptMailerDBPWD)
			or die ("Could not connect to database server!");

		mysql_select_db("cryptMailer",$dbConnection)
			or die ("Could not select database!");
	}

	//Simple query function
	function DB_query($sql)
	{
		$result = mysql_query($sql)
			or die ("DB_query: Could not execute SQL statement: $sql ERROR:".mysql_error());
		return($result);
	}

	dbConnect();

	//Only return the message ID and add it to the DB
	if ($_GET['cmd'] == "code")
	{
		$msgID = md5(mt_rand() * mt_rand());
		$cmsgID = md5(CryptMailerSalt.$msgID);
		DB_query("INSERT INTO `codes` ( `code` ) VALUES ( '$cmsgID' )");
		echo($msgID);
		exit(0);
	}

	//Get the message ID back from the client that was once created by the server
	$msgID = $_POST['msgID'];

	//Try to delete the message code from the list found by the MD5 sum of the real code and the salt
	//Both client and server build the crypted message ID and should calculate the same result
	$res = DB_query("DELETE FROM `codes` WHERE `code` = '$_POST[cmsgID]'");

	//If there could be deleted a row, then the code from the client was valid
	if (mysql_affected_rows() > 0)
	{
		//Get random salt for this transfer
		$randSalt = $_POST['randSalt'];
	
		//Generate the passphrase for this transfer
		$key = md5(CryptMailerSalt.$randSalt);

		//convert back the data into an array
		$a = unserialize(MAIL_AESDecode($key, urldecode($_POST['cdata'])));
		$md5 = md5(serialize($a));
	
		//Check if MD5 of decoded data is idenically to the MD5 of the original message
		if ( $md5 != $_POST['md5'])
			die("Message corrupt");
	
		//Send the mail in the end
		mail($a['m'], $a['s'], $a['t'], $a['h']);
	}
}


?>