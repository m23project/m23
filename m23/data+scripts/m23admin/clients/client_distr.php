<?PHP
	//Wraps the descriptions to a given number of characters
	$wordwrapsize=50;

	if ($step != 1)
		$step = 0;
	
	if ($captureLoad==1)
		//get the step from the captured GET array
		$step = $_POST['step'];
	else
		//overwrite the clientname only, if it's not given in the url
		$client = $_POST['client'];

	$CFDiskGUIO = new CFDiskGUI($client);

	//get all drives that can be found on the client to let the user choose the drive to install the MBR in
	$MBRdriveList = $CFDiskGUIO->getDrivesAndPartitions(false, false);

	//check for the distribution
	$distr = $_POST['distr'];
	$release = $_POST['release'];

	if (isset($_POST['SEL_MBRpart']))
		$mbrPart = $_POST['SEL_MBRpart'];
	else
		$mbrPart = $_POST['mbrPart'];

	//fall back to the default
	if ((!isset($distr)) || (empty($distr)))
		$distr = "debian";

	$desktop = $_POST['SEL_desktop'];

	$instPart = $CFDiskGUIO->getInstPartDev();
	$swapPart = $CFDiskGUIO->getSwapPartDev();

	//Add the installation partition to the list of drives that can be used to install the MBR on
	$MBRdriveList = array_unique(array_merge($MBRdriveList,array($instPart)));

	//Make sure, the MDs are at the end.
	$MBRdriveList = FDISK_mdToEndOfArray($MBRdriveList);

	$packageSelection = PKG_multiPackageSelectionsSelection('SEL_packageSelection',$packageSelection,"-");

	$options = CLIENT_getAllOptions($client);
	$arch = $options['arch'];

	$sourcename=$_POST['SEL_sourcename'];

// 	CPoolFromClientGUI::DEFINE_checkboxForAddingm23BuildPoolFromClientPackage('CB_addingm23BuildPoolFromClientPackage', $client);
	CPoolFromClientDebsGUI::DEFINE_checkboxForAddingm23BuildPoolFromClientDebsPackage('CB_addingm23BuildPoolFromClientDebsPackage', $client);

//load preferences form db
	if (isset($_POST['BUT_load_preference']))
		{
			$distr		= $SEL_distr=PREF_getValue($LST_preference, "distr");
			$desktop	= PREF_getValue($LST_preference, "desktop");
			$arch		= PREF_getValue($LST_preference, "arch");
			$sourcename	= PREF_getValue($LST_preference, "packagesource");
			$distr		= SRCLST_getValue($sourcename,"distr");
			$release	= SRCLST_getValue($sourcename,"release");
			$packageSelection = PREF_getValue($LST_preference, "packageSelection");

			$options = PREF_getAllValues($LST_preference, $options);

			$ED_prefName=$LST_preference;
		}

	if (isset($_POST['BUT_selectSourcesList']))
		{
			$sourcename = $_POST['SEL_sourcename'];
			$distr=SRCLST_getValue($sourcename,"distr");
			$release=SRCLST_getValue($sourcename,"release");
			$step = 1;
		};
	
	if (isset($_POST['BUT_refresh']) || isset($_POST['BUT_step2A']) || isset($_POST['BUT_step2B']))
		{
			$step = 2;
			CAPTURE_captureAll($step,"select client distribution");
		};

	if (strlen($distr)>0)
		{
			include_once("/m23/inc/distr/$distr/clientInstall.php");
			include_once("/m23/inc/distr/$distr/clientConfig.php");
		};


//save preferences to db
	if (isset($_POST['BUT_save_preference']))
		{
			PREF_putAllOptions($ED_prefName,$options);

			PREF_putValue($ED_prefName, "desktop",$desktop);
			PREF_putValue($ED_prefName, "packagesource",$sourcename);
			PREF_putValue($ED_prefName, "packageSelection",$packageSelection);
		}

//install the distribution
	if (isset($_POST['BUT_install']) && !SRCLST_clientUsesEfiButSourcesListDoesntSupportEfi($client, $sourcename))
		{
			//set options
			$options['instPart']		= $instPart;
			$options['mbrPart']			= $mbrPart;
			$options['swapPart']		= $swapPart;
			$options['desktop'] 		= $desktop;
			$options['distr']			= $distr;
			$options['release']			= $release;
			$options['packagesource']	= $sourcename;

			if (is_array($packageSelection))
			{
				foreach ($packageSelection as $pkgSel)
					PKG_addPackageSelection($client,$pkgSel,"orig",$distr);
			}
			else
				PKG_addPackageSelection($client,$packageSelection,"orig",$distr);

			PKG_acceptJobs($client,true);

			$options = CLCFG_addDistributionSpecificOptions($options);

			CLIENT_setAllOptions($client,$options);

			DISTR_startInstall($client,$desktop,$instPart,$swapPart);

			MSG_showInfo("$I18N_data_saved
			<ul>
				<li><b>$I18N_distribution</b>: $distr</li>
				<li><b>$I18N_release</b>: $release</li>
				<li><b>$I18N_userInterface</b>: $desktop</li>
			</ul>
			");

			CLIENT_HTMLBackToDetails($client,CLIENT_getId($client),'realTimeStatus');

			$step=-1;
		}

	include_once("/m23/inc/distr/$distr/clientConfig.php");

	//get all distribution values
	$distrValues = DISTR_getDescriptionValues($distr);

	//check if there is a logo file and generate HTML code
	if (isset($distrValues['Logo']))
		$logoHTML = "<img src=\"".$distrValues['Logo']."\">";

	//check if there is a description on the selected language
	$distrDescription = DISTR_geti18nValue($GLOBALS['m23_language'],'Description',$distrValues);
	
	$title="$client : $I18N_select_client_distribution";
	
	//data has just been saved
	if ($step==-1)
		$title="";

?>


<span class="title"> <?PHP echo($title); ?> </span><br><br>

<?
	HTML_showFormHeader();
	HTML_setPage("clientdistr");
	$arch = SRCLST_showAlternativeArchitectureSelection($sourcename, $arch, $client);
?>
<input type="hidden" name="distr" value="<?PHP echo($distr);?>">
<input type="hidden" name="client" value="<?PHP echo($client);?>">
<input type="hidden" name="swapPart" value="<?PHP echo($swapPart);?>">
<input type="hidden" name="instPart" value="<?PHP echo($instPart);?>">
<input type="hidden" name="step" value="<?PHP echo($step);?>">
<input type="hidden" name="client" value="<?PHP echo($client);?>">



<?PHP 
if ($step >= 0)
{
if ($distrValues['Name'] == "Ubuntu")
	MSG_showWarning($I18N_ubuntuWarning);

SRCLST_showErrorIfClientUsesEfiButSourcesListDoesntSupportEfi($client, $sourcename);

HTML_showTableHeader();


echo ("
			<tr>
				<td colspan=\"3\"><br>
					<center>
						$logoHTML<br><br>
						$distrValues[Name]<br><br>
						$I18N_description: $distrDescription<br><br>
						$I18N_release: ".DISTR_releaseVersionTranslator($release)."
					</center>
				</td>
			</tr>

			<!--End of distribtion information -->
			<tr><td colspan=\"3\"><center><hr></center></td></tr>


			<tr> <!--LOAD/DELETE preferences-->
				<td>$I18N_preferences</td>
				<td>
					<select name=\"LST_preference\" size=\"1\">");
					PREF_getClientPreferences($LST_preference);
echo("				</select>
				</td>
				<td>
					<input type=\"submit\" name=\"BUT_load_preference\" value=\"$I18N_load\">&nbsp;
					<input type=\"submit\" name=\"BUT_delete_preference\" value=\"$I18N_delete\">
				</td>
			</tr>


			<tr> <!--SAVE/ADD preferences-->
				<td>$I18N_preferences</td>
				<td>
					<input type=\"text\" name=\"ED_prefName\" value=\"$ED_prefName\" size=16 maxlength=200>
				</td>
				<td>
					<input type=\"submit\" name=\"BUT_save_preference\" value=\"$I18N_save\">
				</td>
			</tr>

			<tr>
				<td>$I18N_packageSources</td>
				<td>".SRCLST_genSelection("SEL_sourcename", $sourcename, "*")."
				</td>
				<td>
					<input type=\"submit\" name=\"BUT_selectSourcesList\" value=\"$I18N_select\">
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
					".SRCLST_showDesktopsSel($sourcename,"SEL_desktop",$desktop)."
				</td>
				<td valign=\"top\">".
				nl2br(wordwrap(DISTR_getDesktopDescription($distr, $desktop),$wordwrapsize)).
				"</td>
			</tr>

			<tr>
				<td colspan=\"3\">
					<center><input type=\"submit\" name=\"BUT_refresh\" value=\"$I18N_select\"></center>
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
				<td colspan=\"2\">
					".SEL_packageSelection."
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
					".HTML_listSelection("SEL_MBRpart",$MBRdriveList,$mbrPart)."
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

echo("					".CLIENT_options2HiddenForm($options)."
				</td>
			</tr>

			<!--End of GUI selection -->
			<tr><td colspan=\"3\"><center><hr></center></td></tr>

			<tr>
				<td colspan=\"3\">
					<center>
						<input type=\"submit\" name=\"BUT_refresh\" value=\"$I18N_refresh\">&nbsp;&nbsp;
						<input type=\"submit\" name=\"BUT_install\" value=\"$I18N_install_distribution\" $disableInstall>
					</center>
				</td>
			</tr>
");
};

if ($step >= 0)
	HTML_showTableEnd();
?>

<input type="hidden" name="clientPartitions" value="<?php echo $clientPartitions?>">
<input type="hidden" name="sourcename" value="<?php echo $sourcename?>">
<input type="hidden" name="release" value="<?php echo $release?>">
<input type="hidden" name="distr" value="<?php echo $distr?>">
<input type="hidden" name="mbrPart" value="<?PHP echo($mbrPart);?>">
</form>

<?PHP
	HTML_showFormEnd();
	help_showhelp("client_distr");
?>
