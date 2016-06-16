<?php

class CPool extends CChecks
{
	private $poolName = null, $poolDir = null;





/**
**name CPool::__construct($poolName = null, $poolType = null, $poolArch = null)
**description Constructor for new CPool objects that loads existing pools or creates a new basic pool.
**parameter poolName: Name of the pool (if a pool with the given name exists => load)
**parameter poolType: Type of the pool (POOL_TYPE_CD or CPoolLister::POOL_TYPE_DOWNLOAD).
**parameter poolArch: Architecture of the pool (POOL_ARCH_I386 or CPoolLister::POOL_ARCH_AMD64).
**/

	public function __construct($poolName = null, $poolType = null, $poolArch = null)
	{
		//Check, if a pool with the given name exists => load
		if (($poolName !== null) && CPoolLister::poolExists($poolName))
			$this->setPoolName($poolName);
		else
		{
		//If it doesn't exists => create
			if (($poolType !== null) && ($poolArch !== null))
				$this->createBasicPool($poolName, $poolType, $poolArch);
		}
	}





/**
**name CPool::signRelease()
**description Signs the Release file as Release.gpg and InRelease.
**returns: Name the log file.
**/
	protected function signRelease()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Result variable for both signing attempts
		$res = true;

		$GPGSign = new CGPGSign(CGPGSign::MODE_LOAD);

		// Sign in both ways
		$poolDir = $this->getPoolDir();
		$res &= $GPGSign->gpgSignDetached("$poolDir/Release", "$poolDir/Release.gpg");
		$res &= $GPGSign->gpgSignClear("$poolDir/Release", "$poolDir/InRelease");

		if ($res)
			$this->addInfoMessage($I18N_releaseFilesSignedSucessfully);
		else
			$this->addErrorMessage($I18N_errorSigningReleaseFiles);
	}





/**
**name CPool::getConvertPackagesToRepositoryLogName()
**description Returns the full file name of the convert packages to repository log file.
**returns: Name the log file.
**/
	public function getConvertPackagesToRepositoryLogName()
	{
		return($this->getPoolDir().'/convertPackagesToRepository.log');
	}





/**
**name CPool::getConvertPackagesToRepositoryLogNewLines()
**description Gets the last (new) lines of the (growing) convert packages to repository log file.
**returns: UTF8-encoded new lines of the log file.
**/
	public function getConvertPackagesToRepositoryLogNewLines()
	{
		return(HELPER_getNewLogLines($this->getConvertPackagesToRepositoryLogName(),'getConvertPackagesToRepositoryLogNewLines'.$this->getPoolName()));
	}





/**
**name CPool::isConvertPackagesToRepositoryRunning()
**description Checks if the conversation of downloaded packages to a repository is running.
**returns: true, if it is running, otherwise false.
**/
	public function isConvertPackagesToRepositoryRunning()
	{
		return($this->isPackageTaskRunning('convertPackagesToRepository', 'convertPackagesToRepository'));
	}





/**
**name CPool::convertPackagesToRepository($returnCommands = false, $runInScreen = true)
**description Generates a package source from packages stored in one directory.
**parameter returnCommands: If set to true, the commands for downloading the packages will be returned instead of executed.
**parameter runInScreen: Set to true if the execution should be done in "screen". False executes it under the normal BASH.
**returns Commands for creating the package source when $returnCommands is true, true when the screen session for creating the package source is started and false on errors.
**/
	public function convertPackagesToRepository($returnCommands = false, $runInScreen = true)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$poolDir = $this->getPoolDir();
		$poolName = $this->getPoolName();
		$logFile = $this->getConvertPackagesToRepositoryLogName();
		
		$this->checkForDistributionSpecificPackageFunction('PKG_convertPackagesToRepository', $I18N_thisDistributionHasNoPackagesToPoolConvertingFunctionDefined);

		if (!$this->hasErrors())
		{
			//Get the commands for transforming the downloaded packages to a pool
			$cmds = PKG_convertPackagesToRepository($poolDir, $logFile, $poolName, $sourceslist);

			//write sources list for this pool
			$this->setPoolSourceslist($sourceslist);

			if ($returnCommands)
				return($this->addPoolStatusFileCommand('convertPackagesToRepository').$cmds.$this->addPoolStatusFileCommand('done'));
			else
			{
				//Run the commands
				SERVER_runInBackground('convertPackagesToRepository', $cmds, 'root', $runInScreen);
				return(true);
			}
		}
		else
			return(false);
	}





/**
**name CPool::isPackageTaskRunning($singleScreenName, $statusFileContentsToCheck)
**description Checks if a packages task (download to the pool or creating the pool from downloaded files) is running.
**parameter singleScreenName: Name of the single screen, that is used when downloading and creation of the pool are two seperate screen sessions.
parameter statusFileContentsToCheck: The contents of the status file to check, when downloading and creation of the pool are done in one combined screen sessions.
**returns: true, if the task is running, otherwise false.
**/
	private function isPackageTaskRunning($singleScreenName, $statusFileContentsToCheck)
	{
		if (SERVER_runningInBackground($singleScreenName))
			return(true);
		elseif (SERVER_runningInBackground('downloadPackagesAndCreatePool') && ($this->getPoolStatusFileContents() == $statusFileContentsToCheck))
			return(true);
		else
			return(false);
	}





/**
**name CPool::isDownloadRunning()
**description Checks if a download of packages to the pool is running.
**returns: true, if download is running, otherwise false.
**/
	public function isDownloadRunning()
	{
		return($this->isPackageTaskRunning('downloadPoolPackages', 'startDownloadToPool'));
	}





/**
**name CPool::resetDownloadLog()
**description Deletes the aptDownload.log file and resets the line number of the last read line.
**/
	protected function resetDownloadLog()
	{
		SERVER_deleteFile($this->getPoolDir().'/aptDownload.log');
		HELPER_resetNewLogLines('getDownloadLogNewLines'.$this->getPoolName());
	}





/**
**name CPool::getDownloadLogNewLines()
**description Gets the last (new) lines of the (growing) download log file.
**returns: UTF8-encoded new lines of the log file.
**/
	public function getDownloadLogNewLines()
	{
		return(HELPER_getNewLogLines($this->getPoolDir().'/aptDownload.log','getDownloadLogNewLines'.$this->getPoolName()));
	}





/**
**name CPool::getDownloadLogContents()
**description Gets the contents of the download log file.
**returns: Contents of the download log file.
**/
	public function getDownloadLogContents()
	{
		return(HELPER_getFileContents($this->getPoolDir().'/aptDownload.log'));
	}





/**
**name CPool::getPoolImportedFromSourceslist()
**description Gets the complete sourceslist that was used to download the packages into the pool.
**returns: Sourceslist that was used to download the packages into the pool.
**/
	public function getPoolImportedFromSourceslist()
	{
		return($this->getProperty('importedFromImportedFromSourceslist'));
	}





/**
**name CPool::setPoolImportedFromSourceslist($importedFromImportedFromSourceslist)
**description Sets the complete sourceslist that was used to download the packages into the pool.
**parameter importedFromImportedFromSourceslist: Complete sourceslist that was used to download the packages into the pool.
**/
	public function setPoolImportedFromSourceslist($importedFromImportedFromSourceslist)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$importedFromImportedFromSourceslist = trim($importedFromImportedFromSourceslist);

		if (empty($importedFromImportedFromSourceslist))
			$this->addErrorMessage($I18N_sourcesListIsEmpty);
		else
			$this->setProperty('importedFromImportedFromSourceslist', $importedFromImportedFromSourceslist);
	}





/**
**name CPool::hasPoolDownloadBasePackages()
**description Checks, if base packages should be downloaded.
**returns: true, if base packages should be downloaded otherwise false.
**/
	public function hasPoolDownloadBasePackages()
	{
		return($this->getProperty('downloadBasePackages') == 'yes');
	}





/**
**name CPool::setPoolDownloadBasePackages($downloadBasePackages)
**description Sets, if base packages should be downloaded.
**parameter downloadBasePackages: true, when base packages should be downloaded otherwise false.
**/
	public function setPoolDownloadBasePackages($downloadBasePackages)
	{
		if ($downloadBasePackages === true)
			$downloadBasePackages = 'yes';
		else
			$downloadBasePackages = 'no';
		
		$this->setProperty('downloadBasePackages', $downloadBasePackages);
	}





/**
**name CPool::getPoolImportedPackageList()
**description Gets the list of packages that were downloaded (or have to be downloaded) into the pool.
**returns: PackageList of the pool.
**/
	public function getPoolImportedPackageList()
	{
		return($this->getProperty('importedPackageList'));
	}





/**
**name CPool::setPoolImportedPackageList($packageList)
**description Sets the list of packages that were downloaded (or have to be downloaded) into the pool.
**parameter packageList: PackageList of the pool.
**/
	public function setPoolImportedPackageList($packageList)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$packageList = trim($packageList);

		if (empty($packageList))
			$this->addErrorMessage($I18N_packagesListIsEmpty);
		else
			$this->setProperty('importedPackageList', $packageList);
	}





/**
**name CPool::getPoolDistribution()
**description Gets the distribution value of the pool.
**returns: Distribution of the pool.
**/
	public function getPoolDistribution()
	{
		return($this->getProperty('distribution'));
	}





/**
**name CPool::setPoolDistribution($distribution)
**description Sets the distribution value of the pool.
**parameter distribution: Distribution of the pool.
**/
	public function setPoolDistribution($distribution)
	{
		$this->setProperty('distribution', $distribution);
	}





/**
**name CPool::createBasicPool($poolName, $poolType, $poolArch)
**description Sets the name, type and architecture of the pool and creates the pool directory.
**parameter poolName: Name of the pool.
**parameter poolType: Type of the pool (POOL_TYPE_CD or CPoolLister::POOL_TYPE_DOWNLOAD).
**parameter poolArch: Architecture of the pool (POOL_ARCH_I386 or CPoolLister::POOL_ARCH_AMD64).
**/
	public function createBasicPool($poolName, $poolType, $poolArch)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if (CPoolLister::poolExists($poolName))
		{
			$this->addErrorMessage($I18N_poolWithGivenNameAlreadyExists);
			return(false);
		}
		else
		{
			$this->setPoolName($poolName);
			$this->setPoolType($poolType);
			$this->setPoolArch($poolArch);
			return(true);
		}
	}





/**
**name CPool::getPoolDir()
**description Gets the directory of the pool.
**returns: Directory of the pool.
**/
	public function getPoolDir()
	{
		if ($this->poolDir === null)
			die('ERROR: No pool directory set.');
		return($this->poolDir);
	}





/**
**name CPool::setPoolName($poolName)
**description Sets the name of the pool and create the pool directory.
**parameter poolName: Name of the pool.
**/
	public function setPoolName($poolName)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if ($this->checkPoolName($poolName))
		{
			$this->poolName = $poolName;

			$this->poolDir = CPoolLister::POOL_DIR.'/'.$this->poolName;

			if (!is_dir($this->getPoolDir()))
				SERVER_multiMkDir($this->getPoolDir(), 0700);

			return(true);
		}
		else
		{
			$this->addInfoMessage($I18N_poolNameInvalid);
			return(false);
		}
	}







/**
**name CPool::getPoolName($returnEmptyIfNull = false)
**description Gets the name of the pool.
**parameter returnEmptyIfNull: Returns an empty string, if $this->poolName is null.
**returns: Name of the pool.
**/
	public function getPoolName($returnEmptyIfNull = false)
	{
		if ($this->poolName === null)
		{
			if ($returnEmptyIfNull)
				return('');
			else
				die('ERROR: No pool name set.');
		}
		return($this->poolName);
	}





/**
**name CPool::getPoolSourceslist()
**description Gets the sourceslist value of the pool.
**returns: Sourceslist of the pool.
**/
	public function getPoolSourceslist()
	{
		return($this->getProperty('sourceslist'));
	}





/**
**name CPool::setPoolSourceslist($sourceslist)
**description Sets the sourceslist value of the pool.
**parameter sourceslist: Sourceslist of the pool.
**/
	public function setPoolSourceslist($sourceslist)
	{
		$this->setProperty('sourceslist', $sourceslist);
	}





/**
**name CPool::getPoolDescription()
**description Gets the description value of the pool.
**returns: Description of the pool.
**/
	public function getPoolDescription()
	{
		return($this->getProperty('description'));
	}





/**
**name CPool::setPoolDescription($description)
**description Sets the description value of the pool.
**parameter description: Description of the pool.
**/
	public function setPoolDescription($description)
	{
		$this->setProperty('description', $description);
	}
	



/**
**name CPool::getPoolRelease()
**description Gets the release value of the pool.
**returns: Release of the pool.
**/
	public function getPoolRelease()
	{
		return($this->getProperty('release'));
	}





/**
**name CPool::setPoolRelease($release)
**description Sets the release value of the pool.
**parameter release: Release of the pool.
**/
	public function setPoolRelease($release)
	{
		$this->setProperty('release', $release);
	}





/**
**name CPool::getPoolType()
**description Gets the type value of the pool.
**returns: Type of the pool.
**/
	public function getPoolType()
	{
		return($this->getProperty('type'));
	}





/**
**name CPool::setPoolType($type)
**description Sets the type value of the pool.
**parameter type: Type of the pool (POOL_TYPE_CD or CPoolLister::POOL_TYPE_DOWNLOAD or CPoolLister::POOL_TYPE_USECLIENTDEBS).
**/
	public function setPoolType($type)
	{
		if ((CPoolLister::POOL_TYPE_CD == $type) || (CPoolLister::POOL_TYPE_DOWNLOAD == $type) || (CPoolLister::POOL_TYPE_USECLIENTDEBS == $type))
			return($this->setProperty('type', $type));
		else
			die('ERROR: Invalid pool type: '.$type);
	}





/**
**name CPool::getPoolArch()
**description Gets the architecture value of the pool.
**returns: Architecture of the pool.
**/
	public function getPoolArch()
	{
		return($this->getProperty('arch'));
	}





/**
**name CPool::setPoolArch($arch)
**description Sets the architecture value of the pool.
**parameter arch: Architecture of the pool (POOL_ARCH_I386 or CPoolLister::POOL_ARCH_AMD64).
**/
	public function setPoolArch($arch)
	{
		if ((CPoolLister::POOL_ARCH_I386 == $arch) || (CPoolLister::POOL_ARCH_AMD64 == $arch))
			return($this->setProperty('arch', $arch));
		else
			die('ERROR: Invalid pool arch: '.$arch);
	}





/**
**name CPool::setProperty($property, $value)
**description Writes the contents of a property file.
**parameter property: name of the pool property
**parameter value: value to write in the pool property file
**/
	private function setProperty($property, $value)
	{
		$poolFile = $this->getPoolDir()."/$property.m23pool";
		$file = fopen($poolFile,"w");
		fwrite($file,$value);
		fclose($file);
	}





/**
**name CPool::getProperty($property)
**description Reads the contents of a property file.
**parameter property: Name of the pool property
**returns Contents of a property file
**/
	private function getProperty($property)
	{
		if ($this->poolDir === null)
			return("");
		else
		{
			$poolFile = $this->getPoolDir()."/$property.m23pool";
			if (file_exists($poolFile))
				{
					$file = fopen($poolFile,"r");
					$out = fread($file,100000);
					fclose($file);
					return($out);
				}
			else
				return("");
		}
	}





/**
**name CPool::getPoolSize()
**description Calculates the disk usage of a pool.
**returns Size of the pool in MB
**/
	public function getPoolSize()
	{
		if ($this->poolDir !== null)
		{
			$size=exec("cd ".$this->getPoolDir()."; du | tail -n1");
			$size/=1024;
			return(sprintf("%.2f",$size));
		}
		else
			return(0);
	}





/**
**name CPool::destroyPool($poolName = null)
**description Deletes the pool
**parameter poolName: Name of the pool (can optionally be set here)
**/
	public function destroyPool($poolName = null)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if ($poolName !== null)
			$this->setPoolName($poolName);

		// Try to delete the pool
		exec('sudo rm -r '.$this->getPoolDir(), $outArray, $retCode);

		if ($retCode === 0)
			$this->addInfoMessage($I18N_poolDeleted);
		else
			$this->addErrorMessage($I18N_poolCouldNotBeDeleted);

		// Make the pool invalid
		$this->poolName = null;
		$this->poolDir = null;
	}





/**
**name CPool::checkForDistributionSpecificPackageFunction($fkt, $errorMsg)
**description Checks for a distribution specific package function in the distribution's packages.php file and generates an error message in case it cannot be found.
**parameter fkt: Name of the function to check for.
**parameter errorMsg: Error message to add, if the function cannot be found.
**return true if the function exists, otherwise false.
**/
	private function checkForDistributionSpecificPackageFunction($fkt, $errorMsg)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Check, if there is a packages include file and the function for downloading packages to the pool for this distribution is existing
		if (file_exists('/m23/inc/distr/'.$this->getPoolDistribution().'/packages.php'))
		{
			include_once('/m23/inc/distr/'.$this->getPoolDistribution().'/packages.php');

			if (!function_exists($fkt))
			{
				$this->addErrorMessage($errorMsg);
				return(false);
			}
		}
		else
		{
			$this->addErrorMessage($I18N_thisDistributionHasNoPackageFunctionsDefined);
			return(false);
		}

		return(true);
	}





/**
**name CPool::preparePool()
**description Prepares the pool to make it able to store software packages.
**returns false on errors, true on success.
**/
	function preparePool()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$this->checkForDistributionSpecificPackageFunction('PKG_preparePool', $I18N_distrHasNoFunctionForPreparingAPool);
	
		// Check, if there are errors (some can be generated by set functions)
		if (!$this->hasErrors())
		{
			PKG_preparePool($this->getPoolRelease(), $this->getPoolDistribution(), $this->getPoolArch(), $this->getPoolName(), $this->getPoolDir());
			return(true);
		}
		else
			return(false);
	}






/**
**name CPool::stopDownloadToPool()
**description Stops the download of packages to the pool.
**/
	function stopDownloadToPool()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		$this->addInfoMessage($I18N_downloadAborted);

		SERVER_deleteFile($this->getPoolDir().'/lock');

		SERVER_killBackgroundJob('downloadPoolPackages');
	}




/**
**name CPool::downloadDebsFromClient($client, $returnCommands = false)
**description Checks, if all pre-requirements for downloading packages to the pool are satisfied. Then starts the routine to download the packages directly from the client.
**parameter clientName: Name of the client to download the packages from.
**parameter returnCommands: If set to true, the commands for downloading the packages will be returned instead of executed.
**returns true, if the download was started otherwise false.
**/
	function downloadDebsFromClient($clientName, $returnCommands = false)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$this->preparePool();
		$this->checkForDistributionSpecificPackageFunction('PKG_ncTarDebsFromClientToServer_Server', $I18N_distrHasNoFunctionToDownloadPackages);
	
		// Check, if there are errors (some can be generated by set functions)
		if (!$this->hasErrors())
		{
			// Start download of the packages
			$cmds = PKG_ncTarDebsFromClientToServer_Server($this->getPoolDir());

			$this->addInfoMessage($I18N_packageDownloadStarted);
			
			if ($returnCommands)
				return($this->addPoolStatusFileCommand('startDownloadToPool').$cmds);
			else
				SERVER_runInBackground("downloadPoolPackages",$cmds);

			return(true);
		}
		else
			return(false);
	}





/**
**name CPool::startDownloadToPool($returnCommands = false)
**description Checks, if all pre-requirements for downloading packages to the pool are satisfied. Then starts the distribution specific download routine.
**parameter returnCommands: If set to true, the commands for downloading the packages will be returned instead of executed.
**returns true, if the download was started otherwise false.
**/
	function startDownloadToPool($returnCommands = false)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$this->preparePool();
		$this->checkForDistributionSpecificPackageFunction('PKG_downloadPool', $I18N_distrHasNoFunctionToDownloadPackages);

		// Check, if there are errors (some can be generated by set functions)
		if (!$this->hasErrors())
		{
			// Add the list of GUI-selected packages
			$packagesArr[0] = $this->getPoolImportedPackageList();
	
			// Maybe add the list of distribution specific base packages
			if ($this->hasPoolDownloadBasePackages())
			{
				$this->checkForDistributionSpecificPackageFunction('PKG_getDebootStrapBasePackages', $I18N_distrHasNoFunctionForGettingBasePackages);
				
				$debootStrapBasePackages = PKG_getDebootStrapBasePackages($this->getPoolRelease());
				
				if (!$this->hasErrors() && is_string($debootStrapBasePackages))
					$packagesArr[1] = $debootStrapBasePackages;
			}

			// Start download of the packages
			$cmds = PKG_downloadPool($this->getPoolDir(), $this->getPoolImportedFromSourceslist(), $packagesArr, $this->getPoolArch(), $this->getPoolRelease());
			
// 			file_put_contents ('/tmp/startDownloadToPool', $cmds);

			
			$this->addInfoMessage($I18N_packageDownloadStarted);
			
			if ($returnCommands)
				return($this->addPoolStatusFileCommand('startDownloadToPool').$cmds);
			else
				SERVER_runInBackground("downloadPoolPackages",$cmds);

			return(true);
		}
		else
			return(false);
	}





/**
**name CPool::getPoolStatusFileName()
**description Returns the name of the pool status file.
**returns Name of the pool status file.
**/
	private function getPoolStatusFileName()
	{
		return($this->getPoolDir().'/m23StatusFile.info');
	}





/**
**name CPool::addPoolStatusFileCommand($status)
**description Generates BASH code that sets a status in the pool status file.
**parameter status: Status to set in the file.
**returns BASH code that sets a status in the pool status file.
**/
	private function addPoolStatusFileCommand($status)
	{
		$statusFile = $this->getPoolStatusFileName();
		return("\necho '$status' > '$statusFile'\n");
	}





/**
**name CPool::getPoolStatusFileContents()
**description Gets the contents of the pool status file.
**returns Contents of the pool status file.
**/
	private function getPoolStatusFileContents()
	{
		return(trim(HELPER_getFileContents($this->getPoolStatusFileName())));
	}





/**
**name CPool::downloadPackagesAndCreatePool($clientName = '')
**description Downloads packages and creates a pool from them in one combined screen session.
**parameter clientName: Name of the client (only needed when downloadDebsFromClient is used)
**/
	function downloadPackagesAndCreatePool($clientName = '')
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
		$type = $this->getPoolType();

		if (CPoolLister::POOL_TYPE_DOWNLOAD == $type)
			$cmds = $this->startDownloadToPool(true)."\n".$this->convertPackagesToRepository(true);
		elseif (CPoolLister::POOL_TYPE_USECLIENTDEBS == $type)
			$cmds = $this->downloadDebsFromClient($clientName, true)."\n".$this->convertPackagesToRepository(true);
		else
			die('ERROR: downloadPackagesAndCreatePool: The pool with the type '.$type.' cannot be used');

		SERVER_runInBackground('downloadPackagesAndCreatePool', $cmds);

		$this->addInfoMessage($I18N_creationOfPoolAndPackageSelectionFromThisClientStarted);
	}
}

?>