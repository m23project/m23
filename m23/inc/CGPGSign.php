<?php

class CGPGSign extends CChecks
{
	private $gpgID = NULL, $storeMode, $gpgKeyList;

	// Modi of the 
	const MODE_LOAD = 0;
	const MODE_SAVE = 1;
	
	const CONFIGFILE = '/m23/root-only/CGPGSign.conf';
	const POOLSIGNKEYFILE = '/m23/data+scripts/packages/baseSys/m23serverPoolSignKey.asc';





/**
**name CGPGSign::__construct($mode)
**description Constructor for new CGPGSign objects.
**parameter mode: Save a (new) configuration file or load a (required) configuration file.
**/
	public function __construct($mode)
	{
		// Get the list of GPG secret keys
		$this->gpgKeyList = MAIL_getGpgKeyList(true);
		$this->setStoreMode($mode);
		$this->loadConfigFile();
	}





/**
**name CGPGSign::exportPublicSignKey()
**description Exports the public key to the webserver directory.
**parameter true, if the file was exported, othwerwise false.
**/
	public function exportPublicSignKey()
	{
		// Get the public sign key
		$publicKeyASC = MAIL_gpgGettKey($this->getGPGID());

		// Check, if it was fetched
		if (is_bool($publicKeyASC)) return(false);

		// Check, if the key has a valid length
		if (strlen($publicKeyASC) < 2000) return(false);

		// Write it to the webserver directory
		SERVER_putFileContents(CGPGSign::POOLSIGNKEYFILE, $publicKeyASC, '555', HELPER_getApacheUser());

		return(true);
	}





/**
**name CGPGSign::checkKey()
**description Checks, if the GPG is valid as public and private key.
**returns: true, if the GPG is valid as public and private key, otherwise false.
**/
	public function checkKey()
	{
		return(MAIL_gpgCheckKey($this->getGPGID(), true) && MAIL_gpgCheckKey($this->getGPGID(), false));
	}





/**
**name CGPGSign::getKeyInfo()
**description Gets information about the used GPG key.
**returns: Information about the used GPG key.
**/
	public function getKeyInfo()
	{
		if ($this->hasConfigFile())
			return($this->gpgKeyList[$this->getGPGID()]);
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
		return(MAIL_gpgSignDetached($this->getGPGID(), $inFile, $outFile));
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
		return(MAIL_gpgSignClear($this->getGPGID(), $inFile, $outFile));
	}





/**
**name CGPGSign::hasConfigFile()
**description Checks, if the config file exists.
**returns true, if the config file is present.
**/
	public function hasConfigFile()
	{
		return(file_exists(CGPGSign::CONFIGFILE));
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
		$id = trim($id);
		if ((strlen($id) == 8) && (preg_match("![^A-F0-9]!", $id) == 0))
		{
			$allPrivateGPGKeys = array_keys($this->gpgKeyList);

			if (!in_array($id, $allPrivateGPGKeys))
				die("ERROR: setGPGID: No private GPG key for the ID ($id)");
			
			$this->gpgID = $id;
		}
		else
			die("ERROR: setGPGID: GPG ID ($id) has invalid format!");
	}





/**
**name CGPGSign::getGPGID()
**description Gets the GPG ID to use.
**returns GPG ID to use or dies, if no ID is set.
**/
	private function getGPGID()
	{
		if (is_null($this->gpgID))
			die("ERROR: getGPGID: GPG ID ($id) is invalid!");
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
		print("__destruct()".$this->getStoreMode());
	
		switch ($this->getStoreMode())
		{
			case CGPGSign::MODE_SAVE:
				$this->writeConfigFile();
			break;
		}
	}
}

?>