<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: GUI class for building pools from client packages.
$*/

class CPoolFromClientDebsGUI extends CPoolFromClientGUI
{
/**
**name CPoolFromClientDebsGUI::__construct($clientName)
**description Constructor for new CPoolFromClientDebsGUI objects. The object creates a new pool that stores all packages that are needed to install the client.
**parameter clientName: Name of the client to create the pool from.
**/
	public function __construct($clientName)
	{
		//Create a new client object
		$clientO = new CClient($clientName, CClient::CHECKMODE_MUSTEXIST);

		//Set the pool names
		$this->setImportPoolName($clientName);

		//Create a basic pool
		parent::__construct($clientName, CPoolLister::POOL_TYPE_USECLIENTDEBS);

		//Set the type again, because setting it about the paren constructor doesn't work
		$this->setPoolType(CPoolLister::POOL_TYPE_USECLIENTDEBS);

		//Set distribution and release
		$this->setPoolDistribution($clientO->getDistribution());
		$this->setPoolRelease($clientO->getRelease());

		//Create a package selection
		PKG_addPackageToPackageselection($this->getImportPoolName(), 'm23normal', '', $installedPackageList, 0, 25);
	}





/**
**name CPoolFromClientDebsGUI::addm23BuildPoolFromClientDebsJob($clientName)
**description Adds a m23BuildPoolFromClientDebs job to the client.
**parameter clientName: Name of the client, the pool should be build from.
**/
	static private function addm23BuildPoolFromClientDebsJob($clientName)
	{
		PKG_addJob($clientName, 'm23BuildPoolFromClientDebs', PKG_getSpecialPackagePriority('m23BuildPoolFromClientDebs'),"");
	}





/**
**name CPoolFromClientDebsGUI::DEFINE_checkboxForAddingm23BuildPoolFromClientDebsPackage($htmlName, $clientName)
**description Defines a checkbox, that adds a m23BuildPoolFromClientDebs job when checked.
**parameter htmlName: Name of the HTML element and constant.
**parameter clientName: Name of the client, the pool should be build from.
**/
	static public function DEFINE_checkboxForAddingm23BuildPoolFromClientDebsPackage($htmlName, $clientName)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if (HTML_checkBox($htmlName, $I18N_poolFromClient))
			CPoolFromClientDebsGUI::addm23BuildPoolFromClientDebsJob($clientName);
	}

	static public function addm23BuildPoolFromClientDebsJobAndStart($clientName)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		CPoolFromClientDebsGUI::addm23BuildPoolFromClientDebsJob($clientName);
		CLIENT_startInstall($clientName);
		MSG_showInfo($I18N_m23BuildPoolFromClientDebsJobWasAdded);
	}

}
?>