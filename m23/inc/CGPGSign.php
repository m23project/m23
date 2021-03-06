<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Class for managing GPG keys and signing messages.
$*/

class CGPGSign extends CChecks
{
	private $gpgID = NULL, $storeMode, $gpgKeyList, $errorHandlingType;

	// Modi of operation
	const MODE_LOAD = 0;
	const MODE_SAVE = 1;

	// Ways of handling critical errors
	const ERR_DIE = 0;
	const ERR_MSGEXIT = 1;

	const CONFIGFILE = '/m23/root-only/CGPGSign.conf';
	const POOLSIGNKEYFILE = '/m23/data+scripts/packages/baseSys/m23serverPoolSignKey.asc';





/**
**name CGPGSign::__construct($mode)
**description Constructor for new CGPGSign objects.
**parameter mode: Save a (new) configuration file or load a (required) configuration file.
**/
	public function __construct($mode, $errorHandlingType = CGPGSign::ERR_MSGEXIT)
	{
		$this->errorHandlingType = $errorHandlingType;
	
		// Get the list of GPG secret keys
		$this->gpgKeyList = MAIL_getGpgKeyList(true);
		$this->setStoreMode($mode);
		$this->loadConfigFile();
	}





/**
**name CGPGSign::getKeySelectionDialog()
**description Generates a dialog to choose the GPG used for signing the pools.
**/
	public function getKeySelectionDialog()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Selection with all know private GPG keys
		$privGPGKeyID = HTML_selection('SEL_showKeySelectionGpgKey', MAIL_getGpgKeyList(true), SELTYPE_selection, true, $this->getGPGID(true));

		if (HTML_submit('BUT_showKeySelectionUseGpgKey', $I18N_select))
		{
			if ($this->checkKey($privGPGKeyID))
			{
				$this->setGPGID($privGPGKeyID);
				$this->addInfoMessage($I18N_privatePoolGPGSignKeySelected);
				$this->exportPublicSignKey();
			}
			else
				$this->addErrorMessage($I18N_givenGPGIdIsNotValidAsPublicAndPrivateKey);

			$this->showMessages();
		}

		return("
		<table>
			<tr>
				<td colspan=\"2\">$I18N_currentlyUsedGPGKey: ".$this->getKeyInfo()."</td>
			</tr>
			<tr>
				<td>".SEL_showKeySelectionGpgKey."</td>
				<td>".BUT_showKeySelectionUseGpgKey."</td>
			</tr>
			<tr>
				<td colspan=\"2\">
					<div align=\"right\"><a href=\"index.php?page=manageGPGKeys\"><img src=\"/gfx/gpg-mini.png\" border=0>$I18N_manageGPGKeys</a></div>
				</td>
			</tr>
		</table>
		");
	}





/**
**name CGPGSign::showWarningAndDie($internalMsg, $userMsg)
**description Shows an "internal" warning message or a message for the m23 administrator and destroys the object afterwards.
**parameter internalMsg: Internal error message text.
**parameter userMsg: Warning message for the m23 administrator.
**/
	private function showWarningAndDie($internalMsg, $userMsg)
	{
		switch ($this->errorHandlingType)
		{
			case CGPGSign::ERR_MSGEXIT:
				MSG_showWarning($userMsg);
				die('');
				break;
			
			default:
				die("$internalMsg");
				break;
		}
	}





/**
**name CGPGSign::exportPublicSignKey()
**description Exports the public key to the webserver directory.
**parameter true, if the file was exported, othwerwise false.
**/
	public function exportPublicSignKey()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Get the public sign key
		$publicKeyASC = MAIL_gpgGettKey($this->getGPGID());

		// Check, if it was fetched
		if (is_bool($publicKeyASC)) return(false);

		// Check, if the key has a valid length
		if (strlen($publicKeyASC) < 1000) return(false);

		// Write it to the webserver directory
		SERVER_putFileContents(CGPGSign::POOLSIGNKEYFILE, $publicKeyASC, '555', HELPER_getApacheUser());

		$this->addInfoMessage($I18N_publicPoolGPGSignKeyExported);

		return(true);
	}





/**
**name CGPGSign::checkKey(privKeyID)
**description Checks, if the given GPG is valid as public and private key.
**parameter privKeyID: ID of the GPG key.
**returns: true, if the GPG is valid as public and private key, otherwise false.
**/
	public function checkKey($privKeyID)
	{
		$ret = MAIL_gpgCheckKey($privKeyID, true) && MAIL_gpgCheckKey($privKeyID, false);
	
		return($ret);
	}





/**
**name CGPGSign::getKeyInfo()
**description Gets information about the used GPG key.
**returns: Information about the used GPG key.
**/
	public function getKeyInfo()
	{
		$keyID = $this->getGPGID(true);
	
		if (!is_null($keyID))
			return($this->gpgKeyList[$keyID]);
		else
			return('');
	}





/**
**name CGPGSign::gpgSignDetached($inFile, $outFile)
**description Creates a detached signature file for a given private GPG key ID and input file.
**parameter inFile: The file to create a signature for.
**parameter outFile: The file with the detached signature.
**returns: true, if the signature file was created and the input file exists, otherwise false.
**/
	public function gpgSignDetached($inFile, $outFile)
	{
		if (!$this->hasConfigFile()) return(false);

		SERVER_deleteFile($outFile);

		SERVER_runInBackground(uniqid('gpgSignDetached'), "cat '$inFile' | sudo -u ".CONF_GPG_USER." gpg --default-key 0x".$this->getGPGID()." --no-options --detach-sign --armor --textmode --digest-algo SHA256 > '$outFile'", 'root', false);

		return(file_exists($outFile));
	}





/**
**name CGPGSign::gpgSignClear($inFile, $outFile)
**description Creates a clear text signature file for a given private GPG key ID and input file.
**parameter inFile: The file to create a signature for.
**parameter outFile: The file with the detached signature.
**returns: true, if the signature file was created and the input file exists, otherwise false.
**/
	public function gpgSignClear($inFile, $outFile)
	{
		if (!$this->hasConfigFile()) return(false);

		SERVER_deleteFile($outFile);

		SERVER_runInBackground(uniqid('gpgSignClear'), "cat '$inFile' | sudo -u ".CONF_GPG_USER." gpg --default-key 0x".$this->getGPGID()." -a -s --clearsign  --digest-algo SHA256 > '$outFile'", 'root', false);

		return(file_exists($outFile));
	}





/**
**name CGPGSign::hasConfigFile()
**description Checks, if the config file exists.
**returns true, if the config file is present.
**/
	public function hasConfigFile()
	{
		return(SERVER_fileExists(CGPGSign::CONFIGFILE));
	}





/**
**name CGPGSign::loadConfigFile()
**description Loads the config file.
**/
	private function loadConfigFile()
	{
		if ($this->hasConfigFile())
			$this->setGPGID(SERVER_getFileContents(CGPGSign::CONFIGFILE));
	}





/**
**name CGPGSign::writeConfigFile()
**description Writes the config file.
**/
	private function writeConfigFile()
	{
		SERVER_putFileContents(CGPGSign::CONFIGFILE, $this->getGPGID());
	}





/**
**name CGPGSign::setGPGID($id)
**description Sets the GPG ID to use.
**/
	public function setGPGID($id)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$id = trim($id);
		
		if (empty($id))
			return(false);
		
		if ((strlen($id) == 8) && (preg_match("![^A-F0-9]!", $id) == 0))
		{
			$allPrivateGPGKeys = array_keys($this->gpgKeyList);

			if (!in_array($id, $allPrivateGPGKeys))
				$this->showWarningAndDie("ERROR: setGPGID: No private GPG key for the ID ($id)", $I18N_noPrivateGPG);
			
			$this->gpgID = $id;
		}
		else
			die("ERROR: setGPGID: GPG ID ($id) has invalid format!");
	}





/**
**name CGPGSign::getGPGID($allowReturnNull = false)
**description Gets the GPG ID to use.
**parameter allowReturnNull: Set to true, if NULL may be returned as ID (eg. there is no config file).
**returns GPG ID to use or dies, if no ID is set.
**/
	private function getGPGID($allowReturnNull = false)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if (is_null($this->gpgID) && !$allowReturnNull)
			$this->showWarningAndDie("ERROR: getGPGID: GPG ID is not set!", $I18N_noPrivateGPG);
		return($this->gpgID);
	}





/**
**name CGPGSign::setStoreMode($mode)
**description Sets the configuration file store or load mode.
**parameter mode: Configuration file store or load mode.
**/
	private function setStoreMode($mode)
	{
		if (!in_array($mode, array(CGPGSign::MODE_LOAD, CGPGSign::MODE_SAVE)))
			die("CGPGSign::__construct: Mode ($mode) invalid!");
		
		$this->storeMode = $mode;
	}





/**
**name CGPGSign::getStoreMode()
**description Gets the configuration file store or load mode.
**returns mode: Configuration file store or load mode.
**/
	private function getStoreMode()
	{
		return($this->storeMode);
	}





/**
**name CClient::__destruct()
**description Destructor for a CGPGSign object.
**/
	function __destruct()
	{
		switch ($this->getStoreMode())
		{
			case CGPGSign::MODE_SAVE:
				$this->writeConfigFile();
			break;
		}
	}
}

?>