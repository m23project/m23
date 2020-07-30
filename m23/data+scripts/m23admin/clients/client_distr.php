
<?PHP
	HTML_showFormHeader();
	HTML_setPage("clientdistr");


// Clientname
	$client = $_POST['client'];


// Step
	$step = (isset($_POST['step']) ? $_POST['step'] : 0);

// Overwrite clientname, if captureLoad is active
	if (isset($_GET['captureLoad']) && ($_GET['captureLoad'] == 1))
	{
		//get the step from the captured GET array
		$step = $_GET['step'];
		$client = $_GET['client'];
	}


	// Show title
		echo("<span class=\"title\">$client : $I18N_select_client_distribution</span><br><br>");


	HTML_waitAnimation('ANIM_wait', $I18N_pleaseWaitGettingKernelInformation, 40);

//Wraps the descriptions to a given number of characters
	$wordwrapsize=50;


// Client option array
	$options = CLIENT_getAllOptions($client);


// Package sourcename
	$options['sourcename'] = '';
	$sourcename = $options['packagesource'] = SRCLST_storableSelection('SEL_sourcename', '*', 'sourcename', $options['sourcename']);


// Get distribution and release from the name of the sources list
	$options['distr'] = SRCLST_getValue($sourcename,"distr");
	$options['release'] = SRCLST_getValue($sourcename,"release");


// Desktop
	$options['desktop'] = '';
	SRCLST_storableDesktopsSelection('SEL_desktop', $sourcename, 'desktop', $options['desktop']);


// Package selections
	$options['packageSelection'] = '';
	$packageSelection = PKG_storablePackageSelectionsSelection('SEL_packageSelection', 'packageSelection', $options['packageSelection']);
	unset($_SESSION['preferenceSpace']['packageselection']);


// MBR destination
	$CFDiskGUIO = new CFDiskGUI($client);

	$options['instPart'] = $CFDiskGUIO->getInstPartDev();
	$options['swapPart'] = $CFDiskGUIO->getSwapPartDev();

	//get all drives that can be found on the client to let the user choose the drive to install the MBR in
	$MBRdriveList = $CFDiskGUIO->getDrivesAndPartitions(false, false);

	//Add the installation partition to the list of drives that can be used to install the MBR on
	$MBRdriveList = array_unique(array_merge($MBRdriveList, array($options['instPart'])));

	//Make sure, the MDs are at the end.
	$MBRdriveList = FDISK_mdToEndOfArray($MBRdriveList);

	$options['mbrPart'] = '';
	HTML_storableSelection('SEL_MBRpart', 'mbrPart', $MBRdriveList, SELTYPE_selection, true, false, $options['mbrPart']);


// Extra options
	$options['buildPoolFromClientDebs'] = false;
	$buildPoolFromClientDebs = CPoolFromClientDebsGUI::DEFINE_storableCheckboxForAddingm23BuildPoolFromClientDebsPackage('CB_addingm23BuildPoolFromClientDebsPackage', $client, 'buildPoolFromClientDebs', $options['buildPoolFromClientDebs']);
/**********************************************************/
	
// 				= $release;


// 		PREF_putValue($ED_prefName, "packageSelection",$packageSelection);

// 		$sourcename	= PREF_getValue($LST_preference, "packagesource");
	


	HTML_submitDefine('BUT_refresh2', $I18N_refresh);


	if (HTML_submit('BUT_selectSourcesList', $I18N_select))
	{
		$step = 1;
	}

// 	isset($_POST['BUT_saveHSGSingleUbu']) || isset($_POST['BUT_saveHSGMultiUbu']) || isset($_POST['BUT_saveHSGSingleDeb']) || isset($_POST['BUT_saveHSGMultiDeb'])
	if (HTML_submit('BUT_refresh', $I18N_select, ANIM_waitOnClick))
	{
		$step = 2;
		CAPTURE_captureAll($step,"select client distribution");
	}

	if (strlen($options['distr'])>0)
	{
		include_once("/m23/inc/distr/$options[distr]/clientInstall.php");
		include_once("/m23/inc/distr/$options[distr]/clientConfig.php");
	}



// Check, if a kernel was selected
	if (HTML_submitCheck('BUT_install') && ('imaging' != $sourcename))
	{
		$distributionSpecificOptions = CLCFG_addDistributionSpecificOptions(array());
		if (!isset($distributionSpecificOptions['kernel']{1}))
		{
			MSG_showError($I18N_errorNoKernelSelected);
			$kernelOK = false;
		}
		else
			$kernelOK = true;
	}
	else
		$kernelOK = true;


// 	print_r2($options);

//install the distribution
	if (HTML_submitCheck('BUT_install') && $kernelOK && !SRCLST_clientUsesEfiButSourcesListDoesntSupportEfi($client, $sourcename))
	{
// 		var_dump($options);
	
		if (is_array($packageSelection))
		{
			foreach ($packageSelection as $pkgSel)
				PKG_addPackageSelection($client,$pkgSel,"orig",$options['distr']);
		}
		else
			PKG_addPackageSelection($client,$packageSelection,"orig",$options['distr']);

		PKG_acceptJobs($client,true);

		$options = CLCFG_addDistributionSpecificOptions($options);

		CLIENT_setAllOptions($client,$options);

		if (HELPER_isExecutedOnUCS())
			UCS_setClientDistrAndRelease($client, $options['distr'], $options['release']);

		DISTR_startInstall($client,$options['desktop'],$options['instPart'],$options['swapPart']);

		MSG_showInfo("$I18N_data_saved
		<ul>
			<li><b>$I18N_distribution</b>: $options[distr]</li>
			<li><b>$I18N_release</b>: $options[release]</li>
			<li><b>$I18N_userInterface</b>: $options[desktop]</li>
		</ul>
		");

		CLIENT_HTMLBackToDetails($client,CLIENT_getId($client),'realTimeStatus');

		$step=-1;

	}

	if (isset($options['distr']{1}) && file_exists("/m23/inc/distr/$options[distr]/clientConfig.php"))
		include_once("/m23/inc/distr/$options[distr]/clientConfig.php");

	//get all distribution values
	$distrValues = DISTR_getDescriptionValues($options['distr']);
	

	//check if there is a logo file and generate HTML code
	if (isset($distrValues['Logo']))
		$logoHTML = "<img src=\"".$distrValues['Logo']."\">";

	//check if there is a description on the selected language
	$distrDescription = DISTR_geti18nValue($GLOBALS['m23_language'],'Description',$distrValues);

	SRCLST_showAlternativeArchitectureSelection($sourcename, $options['arch'], $client);


if ($step >= 0)
{
// if ($distrValues['Name'] == "Ubuntu")
// 	MSG_showWarning($I18N_ubuntuWarning);

if ($distrValues['Name'] == "Imaging")
	MSG_showWarning($I18N_imagingWarning);


SRCLST_showErrorIfClientUsesEfiButSourcesListDoesntSupportEfi($client, $sourcename);

HTML_showTableHeader();


echo ("
			<tr>
				<td colspan=\"3\"><br>
					<center>
						$logoHTML<br><br>
						$distrValues[Name]<br><br>
						$I18N_description: $distrDescription<br><br>
						$I18N_release: ".DISTR_releaseVersionTranslator($options['release'])."
					</center>
				</td>
			</tr>

			<!--End of distribtion information -->
			<tr><td colspan=\"3\"><center><hr></center></td></tr>


			<tr>
				<td>$I18N_preferences</td>
				<td colspan=\"2\">");
					PREF_showPreferenceManager();



echo("			</td>
			</tr>
			<!-- RAUS -->
			<tr>
				<td>$I18N_packageSources</td>
				<td>".SEL_sourcename."
				</td>
				<td>
					".BUT_selectSourcesList."
				</td>
			</tr>
");
};



if ($step >= 1)
echo("
			<!--End of distribution/prefecrences selection -->
			<tr><td colspan=\"3\"><center><hr></center></td></tr>

			<tr>
				<td valign=\"top\">$I18N_userInterface</td>
				<td valign=\"top\">
					".SEL_desktop."
				</td>
				<td valign=\"top\">".
				nl2br(wordwrap(DISTR_getDesktopDescription($options['distr'], $options['desktop']), $wordwrapsize)).
				"</td>
			</tr>

			<tr>
				<td colspan=\"3\">
					<center>".BUT_refresh."</center>
					".ANIM_wait."
				</td>
			</tr>
");

if ($step >= 2)
{
echo("
			<!--End of GUI selection -->
			<tr><td colspan=\"3\"><center><hr></center></td></tr>

			<tr>
				<td colspan=\"3\">
");
			if (file_exists('/m23/inc/userGUIAddons/client_distr_PackageKernelSelection.php'))
				include('/m23/inc/userGUIAddons/client_distr_PackageKernelSelection.php');
echo("
					<span class=\"title\">
						<center>
							$I18N_packageSelectionToInstall
						</center>
					</span>
				</td>
			</tr>

			<tr>
				<td>$I18N_packageSelection</td>
				<td>
					<div class=\"selectcheckedicons\">
					".SEL_packageSelection."
					</div>
				</td>
				<td>
					".wordwrap($I18N_packageSelectionToBeInstalledWithDistribution_hint, 40, '<br>')."
				</td>
			</tr>

			<tr>
				<td>$I18N_extraOptions</td>
				<td colspan=\"2\">
					".CB_addingm23BuildPoolFromClientDebsPackage."
				</td>
			</tr>

			<tr>
				<td>$I18N_MBRTarget</td>
				<td colspan=\"2\">
					".SEL_MBRpart."
				</td>
			</tr>

			<tr>
				<td colspan=\"3\">
					<span class=\"title\">
						<center>
							$I18N_distributionSpecificOptions
						</center>
						</span>");

						$options2=$CLCFG_showDistributionSpecificOptions($options, $client);

						if ($options2 === false)
						{
							$options = array();
							$disableInstall = "disabled";
							MSG_showError($I18N_errorFetchingDistributionSpecificOptions);
						}
						else
						{
							$options = $options2;
							$disableInstall = "";
						}

					HTML_submitDefine('BUT_install', $I18N_install_distribution, $disableInstall);
//".CLIENT_options2HiddenForm($options)."
echo("					
				</td>
			</tr>

			<!--End of GUI selection -->
			<tr><td colspan=\"3\"><center><hr></center></td></tr>

			<tr>
				<td colspan=\"3\">
					<center>
						".BUT_refresh2."&nbsp;&nbsp;".BUT_install."
					</center>
				</td>
			</tr>
");
};

if ($step >= 0)
	HTML_showTableEnd();
	
echo(
	HTML_hiddenVar('step', $step, true).
	HTML_hiddenVar('client', $client)
);

// print_r2($_SESSION['preferenceSpace']);

	HTML_showFormEnd();
	help_showhelp("client_distr");
?>
