<?php

class CPoolFromClientGUI extends CPoolGUI
{
	protected $importPoolName = null;
	protected $clientName = null;
	protected $status = CObjectStorage::COSSTATUS_waiting;
	const DOWNLOAD_TO_POOL = 12000;
	const MAKE_REPOSITORY = 12001;
	const REPOSITORY_CREATED = 12002;





/**
**name CPoolFromClientGUI::DEFINE_checkboxForAddingm23BuildPoolFromClientPackage($htmlName, $clientName)
**description Shows a checkbox, that adds a m23BuildPoolFromClient job when checked.
**parameter htmlName: Name of the HTML element and constant.
**parameter clientName: Name of the client, the pool should be build from.
**/
	static public function DEFINE_checkboxForAddingm23BuildPoolFromClientPackage($htmlName, $clientName)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if (HTML_checkBox($htmlName, $I18N_poolFromClient))
			PKG_addJob($clientName, 'm23BuildPoolFromClient', PKG_getSpecialPackagePriority('m23BuildPoolFromClient'),"");
	}





/**
**name CPoolFromClientGUI::setImportPoolName($clientName)
**description Sets the name of this pool by the client name.
**parameter clientName: Name of the client, the pool is build from.
**/
	protected function setImportPoolName($clientName)
	{
		$this->importPoolName = 'Build_from_'.$clientName;
		$this->clientName = $clientName;
	}





/**
**name CPoolFromClientGUI::getImportPoolName()
**description Returns the name of this pool.
**returns The name of this pool.
**/
	public function getImportPoolName()
	{
		return($this->importPoolName);
	}





/**
**name CPoolFromClientGUI::__construct($clientName)
**description Constructor for new CPoolFromClientGUI objects. The object creates a new pool that stores all packages that are needed to install the client.
**parameter clientName: Name of the client to create the pool from.
**/
	public function __construct($clientName, $type = CPoolLister::POOL_TYPE_DOWNLOAD)
	{
		//Create a new client object
		$clientO = new CClient($clientName, CClient::CHECKMODE_MUSTEXIST);

		//Set the pool names
		$this->setImportPoolName($clientName);

		//Create a basic pool
		parent::__construct($this->getImportPoolName(), $type, $clientO->getArch());

		//Set distribution and release
		$this->setPoolDistribution($clientO->getDistribution());
		$this->setPoolRelease($clientO->getRelease());
		
		$installedPackageList = $clientO->getClientPackages('', false, DEBPKGSTAT_installed);

		//Set the list of packages to download
		$this->setPoolImportedPackageList($installedPackageList);

		//Create a package selection
		PKG_addPackageToPackageselection($this->getImportPoolName(), 'm23normal', '', $installedPackageList, 0, 25);

		//Don't download base packages
		$this->setPoolDownloadBasePackages(false);

		//Load the sources list
		$this->setPoolImportedFromSourceslist(SRCLST_loadSourceList($clientO->getSourcesList()));
	}





/**
**name CPoolFromClientGUI::getCOSStatusHumanReadable()
**description Translates the status code (COSSTATUS_*) into human readable word(s).
**returns Human readable word(s) representing the status code.
**/
	public function getCOSStatusHumanReadable()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		switch ($this->status)
		{
			case CPoolFromClientGUI::DOWNLOAD_TO_POOL:
				return($I18N_packageDownloadIsRunning.' ('.$this->getPoolSize().' MB)');
			case CPoolFromClientGUI::MAKE_REPOSITORY:
				return($I18N_packageIndexCreationIsRunning);
			default:
				return($I18N_doneIdle);
		}
	}





/**
**name CPoolFromClientGUI::getCOSStatus()
**description Gets the status code (COSSTATUS_*).
**returns Status code of this object.
**/
	public function getCOSStatus()
	{
		return($this->status);
	}





/**
**name CPoolFromClientGUI::runCOSLoop()
**description Function that is called on every run of CObjectStorageManager::getAllObjectsByRes.
**/
	public function runCOSLoop()
	{
		if ($this->isDownloadRunning())
			$this->status = CPoolFromClientGUI::DOWNLOAD_TO_POOL;
		elseif ($this->isConvertPackagesToRepositoryRunning())
			$this->status = CPoolFromClientGUI::MAKE_REPOSITORY;
		else
			$this->status = CPoolFromClientGUI::REPOSITORY_CREATED;
	}





/**
**name CPoolFromClientGUI::saveInObjectStorage()
**description Saves this object in the object storage.
**/
	public function saveInObjectStorage()
	{
		$objectStorage = new CObjectStorage($this->clientName, $this, true);
	}
}

?>