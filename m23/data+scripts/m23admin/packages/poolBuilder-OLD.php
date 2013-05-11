<?php
	HTML_showFormHeader();
	$step=$_POST[step];

	if (empty($step))
		$step=0; //choose the pool type
	
	//the Packages* are created => show the info dialog
	if (SERVER_runningInBackground("m23poolBuilder"))
		$step=2;

	$poolName = $_POST[poolName];

	//create a new pool
	if (isset($_POST[BUT_addPool]))
		{
			$poolName = $_POST[ED_poolname];
			$poolName = POOL_create($poolName,$_POST[RB_pooltype],$_POST[RB_arch]);
		};
	
	//deletes the selected pool
	if (isset($_POST[BUT_deletePool]))
		{
			POOL_delete($_POST[SEL_poolname]);
			$poolName = "";
		}

	//loads a pool
	if (isset($_POST[BUT_loadPool]))
		{
			$poolName = $_POST[SEL_poolname];
			$_SESSION['preferenceForceHTMLReloadValues'] = true;
		}

	//save changes in the description or the type of the pool
	if (isset($_POST[BUT_saveChanges]))
		{
			POOL_setProperty($poolName,"description",$_POST['TA_description']);
			POOL_setProperty($poolName,"type",$_POST['RB_pooltype']);
			POOL_setProperty($poolName,"arch",$_POST['RB_arch']);
		};

	//set step according the number of the clicked button
	for ($i=1; $i <= 5; $i++)
		if (isset($_POST["BUT_step".$i]))
			$step=$i;

	$poolType=POOL_getProperty($poolName,"type");
	
	//check if user wants to continue without selecting a pool
	if (isset($_POST["BUT_step1"]) && empty($poolName))
	{
		MSG_showError($I18N_noPoolSelected);
		$step=0;
	};

	//create the pool index
	if (isset($_POST["BUT_step2"]))
		POOL_makeRepository($poolName);

	//check if a package download is running and pin to step 4
	if (SERVER_runningInBackground("downloadPoolPackages"))
		$step=4;

	//get the extra heading for the current step
	$heading=$I18N_poolStep["$step$poolType"];
	if (empty($heading))
		$heading=$I18N_poolStep[$step];

echo ("<span class=\"title\">$I18N_poolBuilder ($heading)</span><br><br>");
HTML_setPage('poolBuilder');

	switch ($step)
		{
			case 0:
				{
					POOL_showLoadDeleteCreate($poolName);
					$helpPage="poolBuilderCreateEditDelete";
					CAPTURE_captureAll($step,"$helpPage",true);
					break;
				}
			case 1:
				{
					if (POOL_getProperty($poolName,"type")=="cd")
						{
							POOL_showReadCD($poolName);
							$helpPage="poolBuilderReadCD";
							CAPTURE_captureAll(($step+11),"$helpPage",true);
						}
					else
						{
							SRCLST_showEditor($poolName);
							$helpPage="poolBuilderSelectPackageSourcesAndPackages";
							CAPTURE_captureAll(($step+10),"$helpPage",true);
						};
					break;
				}
			case 2:
				{
					POOL_showCreatePackageIndex($poolName);
					$helpPage="poolBuilderCreateIndex";
					CAPTURE_captureAll($step,"$helpPage",true);
					break;
				};
			case 3:
				{
					$helpPage="poolBuilderStartDownload";
					POOL_prepare($poolName,$_POST[release],$_POST[distr],$_POST[RB_arch]);
					CAPTURE_captureAll($step,"$helpPage",false);
					POOL_download($poolName,$_POST[distr],$_POST[sourcelist],$_POST[TA_packageList],$_POST[release],$_POST[CB_downloadBasePackages] == "yes",$_POST[RB_arch]);
					break;
				};
			case 4:
				{
					POOL_showDownloadStatus($poolName);
					$helpPage="poolBuilderDownloadStatus";
					CAPTURE_captureAll($step,"$helpPage",true);
					break;
				};
			case 5:
				{
					POOL_showSourcesList($poolName);
					$helpPage="poolBuilderShowSourcesList";
					CAPTURE_captureAll($step,"$helpPage",true);
					break;
				};
		}
?>

<input type="hidden" name="step" value="<?php echo($step);?>">
<input type="hidden" name="poolName" value="<?php echo($poolName);?>">

<?PHP
	HTML_showFormEnd();
	help_showhelp($helpPage);
?>
