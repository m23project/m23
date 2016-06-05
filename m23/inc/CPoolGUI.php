<?php

class CPoolGUI extends CPool
{
	const POOLDIALOG_START = 0;
	const POOLDIALOG_COPYDOWNLOADPACKAGES = 1;
	const POOLDIALOG_MAKEREPOSITORY = 2;
	const POOLDIALOG_SHOWDOWNLOADSTATUS = 4;
	
	private $page = CPoolGUI::POOLDIALOG_START, $helpPage = null;


// 	public function getStatusHumanReadable()
// 	{
// 		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
// 		switch ($this->page)
// 		{
// 			case CPoolGUI::POOLDIALOG_SHOWDOWNLOADSTATUS:
// 				return($I18N_packageDownloadIsRunning);
// 			case CPoolGUI::POOLDIALOG_MAKEREPOSITORY:
// 				return($I18N_packageIndexCreationIsRunning);
// 			default:
// 				return($I18N_doneIdle);
// 		}
// 	}



/**
**name CPoolGUI::show()
**description Shows the start dialog for creating, adding, deleting and changing pools.
**/
	public function show()
	{
		$HTMLOutputBuffer = HTML_getOutputBuffer();
		$pageBefore = $this->page;
	
		// Button and other elements are defined in SRCLST_showEditor
		if (HTML_submitCheck('BUT_step3'))
		{
			$this->setPoolRelease($_POST['release']);
			$this->setPoolDistribution($_POST['distr']);
			$this->setPoolImportedFromSourceslist($_POST['sourcelist']);
			$this->setPoolImportedPackageList($_POST['TA_packageList']);
			$this->setPoolDownloadBasePackages($_POST['CB_downloadBasePackages'] == 'yes');
			$this->startDownloadToPool();
			$this->page = CPoolGUI::POOLDIALOG_SHOWDOWNLOADSTATUS;
		}

		switch ($this->page)
		{
			// Creates the Packages* files for the pool
			case CPoolGUI::POOLDIALOG_MAKEREPOSITORY:
			{
				$this->DIALOG_convertPackagesToRepositoryStatus();
				$this->helpPage = 'poolBuilderCreateIndex';
				break;
			}

			// Show the status of downloading the packages form the internet
			case CPoolGUI::POOLDIALOG_SHOWDOWNLOADSTATUS:
			{
				$this->helpPage = 'poolBuilderDownloadStatus';
				$this->DIALOG_showDownloadStatus();
				break;
			}

			// Decide to copy packages from CD/DVD or download them form the internet
			case CPoolGUI::POOLDIALOG_COPYDOWNLOADPACKAGES:
			{
				if ($this->getPoolType() == CPoolLister::POOL_TYPE_CD)
				{
					POOL_showReadCD($this->getPoolName());
					$this->helpPage = 'poolBuilderReadCD';
					CAPTURE_captureAll(($step+11),"$helpPage",true);
				}
				else
				{
					SRCLST_showEditor($this->getPoolName());
					$this->helpPage = 'poolBuilderSelectPackageSourcesAndPackages';
					CAPTURE_captureAll(($step+10),"$helpPage",true);
				};
				break;
			}

			// Load, create, delete pools and watch their status.
			default:
			case CPoolGUI::POOLDIALOG_START:
			{
				$this->DIALOG_start();
				$this->helpPage = 'poolBuilderCreateEditDelete';
				break;
			}
		}
		
		if ($pageBefore !== $this->page)
		{
			HTML_setOutputBuffer($HTMLOutputBuffer);
			$this->deleteAllMessages();
			$this->show();
		}
		else
		{
			$this->showMessages();
			$this->deleteAllMessages();
		}
	}






/**
**name CPoolGUI::getHelpPage()
**description Returns the current help page.
**returns Current help page.
**/
	public function getHelpPage()
	{
		if ($this->helpPage === null)
			die('ERROR: No helpPage set.');
		return($this->helpPage);
	}





/**
**name CPoolGUI::getHeading()
**description Returns the current heading.
**returns Current heading.
**/
	public function getHeading()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if ($this->page === null)
			die('ERROR: getHeading: No page set.');
		return($I18N_poolStep[$this->page]);
	}



private function DEFINE_importDirFiles($SEL_mountPoint, $BUT_mount)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	$mountPoints = HELPER_getFdiskMountPoints();
	$mountPoint = HTML_selection($SEL_mountPoint, $mountPoints, SELTYPE_selection);

	if (HTML_submit($BUT_mount, $I18N_mount))
	{
		
	}

}



/**
**name POOL_showReadCD($poolName)
**description shows a dialog for copying the CD contents to the pool
**parameter poolName: name of the pool
**/
function DIALOG_importDirFiles()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$this->DEFINE_importDirFiles('SEL_mountPoint', 'BUT_mount');

	$readLabel=$I18N_readDrive;

	if (file_exists("/m23/tmp/copyPoolPackages.sh"))
	{
		$readLabel=$I18N_checkDriveState;
		$butName="BUT_checkDrive";
		$disabledNext="disabled";
	}
	else
	{
		$readLabel=$I18N_readDrive;
		$butName="BUT_readDrive";
		$disabledNext="";
	};
	
	if (isset($_POST[BUT_readDrive]))
	{
		POOL_readCD($poolName,$firstDevice);
		$readLabel=$I18N_checkDriveState;
		$butName="BUT_checkDrive";
		$disabledNext="disabled";
	};

	HTML_showTableHeader();
	echo("
	<tr>
		<td colspan=\"2\"><span class=\"subhighlight\">$I18N_cdDrive</span></td>
	</tr>
	<tr>
		<td>
			".SEL_mountPoint."
		</td>
		<td>
			<INPUT type=\"submit\" name=\"$butName\" value=\"$readLabel\">
		<td>
	</tr>
	<tr>
		<td colspan=\"2\"><INPUT type=\"submit\" name=\"BUT_step5\" value=\"$I18N_nextStep ($I18N_poolStep[5])\" $disabledNext></td>
	</tr>
	<tr>
		<td colspan=\"2\">$I18N_poolSize: ".POOL_getSize($poolName)." MB</td>
	</tr>
	");
	HTML_showTableEnd();
}





/**
**name CPoolGUI::DEFINE_convertPackagesToRepositoryStatus($BUT_refresh, $BUT_step0, $LA_convertPackagesToRepositoryStatus)
**description Defines dialog elements for the status of the Packages*  and sources.list generation of the currently generated pool.
**parameter BUT_refresh: HTML constant name for the refresh button.
**parameter BUT_step0: HTML constant name for the go back to start button.
**parameter LA_convertPackagesToRepositoryStatus: HTML constant name for showing the conversation status.
**/
	private function DEFINE_convertPackagesToRepositoryStatus($BUT_refresh, $BUT_step0, $LA_convertPackagesToRepositoryStatus)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Check, if the back to start button is clicked => nothing left to do here
		if (HTML_submitCheck($BUT_step0))
		{
			$this->page = CPoolGUI::POOLDIALOG_START;
			return(false);
		}

		$AJAXBUT_refresh = HTML_AJAXAutoSubmit($BUT_refresh, '/m23admin/poolAJAXLogs.php?cmd=getconvertPackagesToRepositoryStatusRefreshClicked&pool='.urlencode($this->getPoolName()));
		$BUT_refreshClicked = HTML_submit($BUT_refresh, $I18N_refresh, constant($AJAXBUT_refresh));

		// If conversation is running add the suitable message and disable the back to start button
		if ($this->isConvertPackagesToRepositoryRunning())
		{
			$this->addInfoMessage($I18N_packageIndexCreationIsRunning);
			$disabled = 'disabled';
		}
		else
		{ // Conversation is NOT running
			
			if ($BUT_refreshClicked)
			{
				// Refresh button was clicked (by user or AJAX)
				$this->addInfoMessage($I18N_packageIndexCreationFinished);
				$disabled = '';
			}
			else
			{
				// This should be the state when the dilog is initially shown
				$this->convertPackagesToRepository();
				$this->addInfoMessage($I18N_packageIndexCreationStarted);
				$disabled = 'disabled';
			}
		}

		// Generate the back to start button (and disable it, when conversation is running)
		HTML_submitDefine($BUT_step0, "$I18N_next ($I18N_poolStep[0])", " $disabled");
		

		// Live log area showing the output of the package download tool
		HTML_liveLogArea($LA_convertPackagesToRepositoryStatus, 100, 20, '/m23admin/poolAJAXLogs.php?cmd=getConvertPackagesToRepositoryLogNewLines&pool='.urlencode($this->getPoolName()));
	}





/**
**name CPoolGUI::DIALOG_convertPackagesToRepositoryStatus()
**description Shows information (status of the Packages* generation, sources.list) about the currently generated pool.
**/
	private function DIALOG_convertPackagesToRepositoryStatus()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$this->DEFINE_convertPackagesToRepositoryStatus('BUT_refresh', 'BUT_step0', 'LA_convertPackagesToRepositoryStatus');

		echo('<br>');

// 				<span class="title">'.$I18N_packageIndexCreationStatus.'</span><br>'.
// 				LA_convertPackagesToRepositoryStatus.'
// 				<br><br>

		HTML_showTableHeader();
		echo ('
		<tr>
			<td>'.H_MESSAGEBOXPLACEHOLDER.'<br>
<span class="title">'.$I18N_packageSources.'</span><br>
				<textarea cols="100" rows="5" readonly>'.
				$this->getPoolSourceslist().'
				</textarea><br><br>
				<center>'.BUT_refresh.' '.BUT_step0.'</center>
			</td>
		</tr>');

		HTML_showTableEnd();
	}





/**
**name CPoolGUI::DEFINE_showDownloadStatus($BUT_step2, $BUT_refresh, $LA_downloadStatus, $SPAN_poolSize)
**description Defines HTML elements for the package download status of a pool.
**parameter BUT_step2: HTML constant name for the go to the pool generation dialog button.
**parameter BUT_refresh: HTML constant name for the refresh button.
**parameter LA_downloadStatus: HTML constant name for showing the download status.
**parameter SPAN_poolSize: HTML constant name for showing the size of the pool.
**/
	private function DEFINE_showDownloadStatus($BUT_step2, $BUT_refresh, $LA_downloadStatus, $SPAN_poolSize, $BUT_stopDownload)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Dis/Enable the next button and show the message according to whether the package download is running
		if ($this->isDownloadRunning())
		{
			$this->addInfoMessage($I18N_packageDownloadIsRunning);
			$disabled="disabled";
		}
		else
		{
			$this->addInfoMessage($I18N_packageDownloadIsFinished);
			$disabled="";
		};

		// Maybe enabled button to go to the repository making dialog
		
		if (HTML_submit($BUT_step2, "$I18N_nextStep ($I18N_poolStep[2])", $disabled))
			$this->page = CPoolGUI::POOLDIALOG_MAKEREPOSITORY;

		if (HTML_submit($BUT_stopDownload, $I18N_stopDownload))
		{
			$this->page = CPoolGUI::POOLDIALOG_MAKEREPOSITORY;
			$this->stopDownloadToPool();
		}

		$AJAXBUT_refresh = HTML_AJAXAutoSubmit($BUT_refresh, '/m23admin/poolAJAXLogs.php?cmd=getShowDownloadStatusRefreshClicked&pool='.urlencode($this->getPoolName()));
		HTML_submit($BUT_refresh, $I18N_refresh, constant($AJAXBUT_refresh));

		// Live log area showing the output of the package download tool
		HTML_liveLogArea($LA_downloadStatus, 100, 20, '/m23admin/poolAJAXLogs.php?cmd=getDownloadLogNewLines&pool='.urlencode($this->getPoolName()));

		HTML_liveSpan($SPAN_poolSize, '/m23admin/poolAJAXLogs.php?cmd=getPoolSize&pool='.urlencode($this->getPoolName()), $this->getPoolSize());
	}





/**
**name CPoolGUI::DIALOG_showDownloadStatus()
**description Shows the package download status of a pool.
**/
	private function DIALOG_showDownloadStatus()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$this->DEFINE_showDownloadStatus('BUT_step2', 'BUT_refreshshowDownloadStatus', 'LA_downloadStatus', 'SPAN_poolSize', 'BUT_stopDownload');

		echo('<br>');

		HTML_showTableHeader();
		echo ('
		<tr>
			<td>'.H_MESSAGEBOXPLACEHOLDER.'<br>
				<span class="title">'.$I18N_packageDownloadStatus.'</span><br>
				'.LA_downloadStatus.'<br><br>
				<center><span class="subhighlight">'.$I18N_poolSize.'</span><br><br>
				'.SPAN_poolSize.' MB<br><br>
				'.BUT_refreshshowDownloadStatus.'
				'.BUT_stopDownload.'
				'.BUT_step2.'
				</center>
			</td>
		</tr>');
		HTML_showTableEnd();
	}





/**
**name CPoolGUI::DIALOG_start()
**description Shows the start dialog for creating, adding, deleting and changing pools.
**/
	private function DIALOG_start()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$this->DEFINE_createBasicPool('ED_createPoolname', 'RB_createPooltype', 'RB_createPoolarch', 'BUT_createPool');
		$this->DEFINE_loadDeletePool('SEL_loadDeletePoolname', 'BUT_loadPool', 'BUT_deletePool');
		$this->DEFINE_changePoolDescription('TA_poolDescription', 'BUT_poolSaveChanges', 'LA_poolSourcesList');
		$this->DEFINE_nextStepCopyDownloadPackages('BUT_copyDownloadPackages');

		HTML_showTableHeader();

		echo('
			<tr><td colspan="4"><span class="title">'.$I18N_createPool.'</span></td></tr>
			<tr>
				<td><span class="subhighlight">'.$I18N_poolName.'</span></td>
				<td><span class="subhighlight">'.$I18N_poolType.'</span></td>
				<td><span class="subhighlight">'.$I18N_arch.'</span></td>
				<td></td>
			</tr>
			<tr>
				<td>'.ED_createPoolname.'</td>
				<td>'.RB_createPooltype.'</td>
				<td>'.RB_createPoolarch.'</td>
				<td>'.BUT_createPool.'</td>
			</tr>
			<tr><td colspan="4"><span class="title">'.$I18N_existingPool.'</span></td></tr>
			<tr>
				<td><span class="subhighlight">'.$I18N_poolName.'</span></td>
				<td colspan="3"></td>
			</tr>
			<tr>
				<td>'.SEL_loadDeletePoolname.'</td>
				<td colspan="2"></td>
				<td>'.BUT_loadPool.'<br><br>
				<!-- m23customPatchBegin type=del id=BUT_deletePool -->
				'.BUT_deletePool.'
				<!-- m23customPatchEnd id=BUT_deletePool -->
				</td>
			</tr>
			<tr><td colspan="4"><span class="title">'.$I18N_usedPool.': '.$this->getPoolName(true).'</span></td></tr>
			<tr><td colspan="4"><span class="subhighlight">'.$I18N_description.'</span></td></tr>
			<tr>
				<td colspan="3">'.TA_poolDescription.'</td>
				<td valign="bottom">
					<span class="subhighlight">'.$I18N_poolSize.'</span><br><br>
					'.$this->getPoolSize().' MB<br><br>
					<span class="subhighlight">'.$I18N_poolType.'</span><br><br>
					'.$this->getPoolType().'<br>
					<span class="subhighlight">'.$I18N_arch.'</span><br><br>
					'.$this->getPoolArch().'
					<br><br>
					<center>'.BUT_poolSaveChanges.'</center>
				</td>
			</tr>
			<tr><td colspan="4"><span class="subhighlight">'.$I18N_packageSources.'</span></td></tr>
			<tr><td colspan="4">'.LA_poolSourcesList.'</td></tr>
			<tr><td colspan="4" align="center">'.BUT_copyDownloadPackages.'</td></tr>
		');

		HTML_showTableEnd();
	}





/**
**name CPoolGUI::DEFINE_nextStepCopyDownloadPackages($BUT_copyDownloadPackages)
**description Defines a button for going to the next step (copy or download of packages).
**parameter BUT_copyDownloadPackages: HTML constant name for the copy or download of packages button.
**/
	private function DEFINE_nextStepCopyDownloadPackages($BUT_copyDownloadPackages)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if (HTML_submit($BUT_copyDownloadPackages, "$I18N_nextStep ($I18N_copyPackages / ".$I18N_poolStep["1download"].")"))
			$this->page = CPoolGUI::POOLDIALOG_COPYDOWNLOADPACKAGES;
	}





/**
**name CPoolGUI::DEFINE_changePoolDescription($TA_poolDescription, $BUT_poolSaveChanges, $LA_poolSourcesList)
**description Defines dialog elements for changing the pool description.
**parameter TA_poolDescription: HTML constant name for the pool description text box.
**parameter BUT_poolSaveChanges: HTML constant name for the pool saving button.
**parameter LA_poolSourcesList: HTML constant name for showing sourceslist of the pool.
**/
	private function DEFINE_changePoolDescription($TA_poolDescription, $BUT_poolSaveChanges, $LA_poolSourcesList)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$description = HTML_textArea($TA_poolDescription, 65, 12, $this->getPoolDescription());

		if (HTML_submit($BUT_poolSaveChanges, $I18N_save))
			$this->setPoolDescription($description);

		HTML_logArea($LA_poolSourcesList, 85, 5, $this->getPoolSourceslist());
	}





/**
**name CPoolGUI::DEFINE_loadDeletePool($SEL_loadDeletePoolname, $BUT_loadPool, $BUT_deletePool)
**description Defines dialog elements for loading or deleting a pool.
**parameter SEL_loadDeletePoolname: HTML constant name for the pool name.
**parameter BUT_loadPool: HTML constant name for the pool loading button.
**parameter BUT_deletePool: HTML constant name for the pool deletion button.
**/
	private function DEFINE_loadDeletePool($SEL_loadDeletePoolname, $BUT_loadPool, $BUT_deletePool)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Read the name of the selected pool
		$poolName = HTML_getElementValue($SEL_loadDeletePoolname, false, false);

		// Load the selected pool
		if (HTML_submit($BUT_loadPool,$I18N_load))
		{
			$this->setPoolName($poolName);
			$_SESSION['preferenceForceHTMLReloadValues'] = true;
		}

		// Delete the selected pool
		if (HTML_submit($BUT_deletePool,$I18N_delete))
			$this->destroyPool($poolName);

		// The list of currently available pools
		$poolNameList = CPoolLister::getPoolNames();
		$poolName = HTML_selection($SEL_loadDeletePoolname, $poolNameList, SELTYPE_selection);
	}





/**
**name CPoolGUI::DEFINE_createBasicPool($ED_createPoolname, $RB_createPooltype, $RB_createPoolarch, $BUT_createPool)
**description Defines dialog elements for creating a basic pool.
**parameter ED_createPoolname: HTML constant name for the pool name input field.
**parameter RB_createPooltype: HTML constant name for the pool type selection radio buttons.
**parameter RB_createPoolarch: HTML constant name for the pool architecture selection radio buttons.
**parameter BUT_createPool: HTML constant name for the pool creation button.
**/
	private function DEFINE_createBasicPool($ED_createPoolname, $RB_createPooltype, $RB_createPoolarch, $BUT_createPool)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

// 		$poolTypeList[CPoolLister::POOL_TYPE_CD] = $I18N_CDPool;
		$poolTypeList[CPoolLister::POOL_TYPE_DOWNLOAD] = $I18N_downloadPool;
		$poolType = HTML_selection($RB_createPooltype, $poolTypeList, SELTYPE_radio, true, CPoolLister::POOL_TYPE_DOWNLOAD);

		$poolArchList[CPoolLister::POOL_ARCH_I386] = CPoolLister::POOL_ARCH_I386;
		$poolArchList[CPoolLister::POOL_ARCH_AMD64] = CPoolLister::POOL_ARCH_AMD64;
		$poolArch = HTML_selection($RB_createPoolarch, $poolArchList, SELTYPE_radio, true, CPoolLister::POOL_ARCH_I386);

		$poolName = HTML_input($ED_createPoolname);

		if (HTML_submit($BUT_createPool, $I18N_add))
			$this->createBasicPool($poolName, $poolType, $poolArch);
	}
}

?>