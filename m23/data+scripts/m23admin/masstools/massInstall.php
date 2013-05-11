<?php
	
	if (!isset($_POST['step']))
		$step = 0;
	else
		$step = $_POST['step'];

	$client = $_GET['client'];
	$id = $_GET['id'];

	//generate the varname for the translation
	$I18Nvarname="I18N_MIstep$step";
		
	echo("<span class=\"title\">
		$I18N_massInstall (".$$I18Nvarname.")
	</span><br><br>
	");

	//fetch the settings if the values should be entered, generated, or kept	
	if (!empty($_POST[EGKparamStr]))
		{//fetch from the associated array
			$EGKparams=explodeAssoc("?#?",$_POST[EGKparamStr]);
			$EGKparamStr = $_POST[EGKparamStr];
		}
	else
		$EGKparams = array();

	//add parameters for selecting the enter source (by file, by hand)
	if (!empty($_POST[FileHandVars]))
		{
			$fileHandVars = explode("?#?",$_POST[FileHandVars]);

			for ($i=0; $i < count($fileHandVars)-1; $i++)
				{
					$EGKparams[str_replace("SEL_Source","FH_",$fileHandVars[$i])]=$_POST[$fileHandVars[$i]];
				};
		};



	echo("<FORM action=\"index.php?page=massInstall&client=$client&id=$id\" method=\"POST\" enctype=\"multipart/form-data\">");

	switch ($step)
		{
			case 0: //select, if the properties should be entered, generated or kept
				{
					$helpPage="mi_step0";
					$step=0;
					$LAB_submit=$I18N_save;

					if (!empty($_POST[BUT_submit0]))
						{
							$EGKparams[client]=$_POST[RB_client];
							$EGKparams[office]=$_POST[RB_office];
							$EGKparams[group]=$_POST[RB_group];
							$EGKparams[distr]=$_POST[RB_distr];
							$EGKparams[packageSource]=$_POST[RB_packageSource];
							$EGKparams[forename]=$_POST[RB_forename];
							$EGKparams[familyname]=$_POST[RB_familyname];
							$EGKparams[email]=$_POST[RB_email];
							$EGKparams[mac]=$_POST[RB_mac];
							$EGKparams[ip]=$_POST[RB_ip];
							$EGKparams[netmask]=$_POST[RB_netmask];
							$EGKparams[gateway]=$_POST[RB_gateway];
							$EGKparams[dns1]=$_POST[RB_dns1];
							$EGKparams[dns2]=$_POST[RB_dns2];
							$EGKparams[firstlogin]=$_POST[RB_firstlogin];
							$EGKparams[rootlogin]=$_POST[RB_rootlogin];
							$EGKparams[addNewLocalLogin]=$_POST[RB_addNewLocalLogin];
							$EGKparams[ldaptype]=$_POST[RB_ldaptype];
							$EGKparams[userID]=$_POST[RB_userID];
							$EGKparams[groupID]=$_POST[RB_groupID];
							$EGKparams[ldapserver]=$_POST[RB_ldapserver];
							$EGKparams[nfshomeserver]=$_POST[RB_nfshomeserver];
							$EGKparams[login]=$_POST[RB_login];
							$EGKparams[loginGenerationMethod]=$_POST[RB_loginGenerationMethod];
							$EGKparams[loginBaseName]=$_POST[ED_loginBaseName];
							$EGKparams[loginStartNumber]=$_POST[ED_loginStartNumber];
							$EGKparams[timeZone]=$_POST[RB_timeZone];
							$EGKparams[getSystemtimeByNTP]=$_POST[RB_getSystemtimeByNTP];

							MSG_showInfo($I18N_data_saved,$GLOBALS["m23_language"]);
							$step=1;
							$LAB_submit="$I18N_nextStep ($I18N_MIstep1)";
							CAPTURE_captureAll(0,"step 0: Select value generation method");
						}
					else
						CLIENT_showGeneralInfo($id,true);
						
					break;
				};

			case 1: //select, if the data should be entered from file or by hand
				{
					$hidden=MASS_showFileHandDialog($EGKparams);
					$LAB_submit="$I18N_nextStep ($I18N_MIstep2)";
					$helpPage="mi_step1";
					$step=2;
					CAPTURE_captureAll(1,"step 1: Select data source");
					break;
				};
				
			case 2: //assign fields of the DB file to the keys
				{
					$helpPage="mi_step2";

					//get the keys and amount of all "by file" properties
					$fileHandAmount = MASS_getXProperties($EGKparams,"f",$pre="FH_");

					if ($fileHandAmount[amount] == 0)
						{ //there are no properties that should get data from file
							$step = 3;
							$LAB_submit="$I18N_nextStep ($I18N_MIstep3)";
							MSG_showInfo($I18N_noDataSourceNeeded,$GLOBALS["m23_language"]);
							break;
						};

					MASS_showFileFormatDialog($EGKparams);

					$LAB_submit=$I18N_save;

					if (!empty($_POST[BUT_submit2]))
						{ //submit button clicked
							if (!empty($_POST[DBfileName]))
								{ //no db file selected
									$errMsg = MASS_checkAndSaveFields(&$EGKparams);
		
									if (!empty($errMsg))
										MSG_showError($errMsg,$GLOBALS["m23_language"]);
									else
										{ //all ok, proceed to next page
											$step = 3;
											$LAB_submit="$I18N_nextStep ($I18N_MIstep3)";
											MSG_showInfo($I18N_data_saved,$GLOBALS["m23_language"]);
											$go="f";
										};
								}
							else
								MSG_showInfo($I18N_pleaseUploadDBFile,$GLOBALS["m23_language"]);
						}
						
					CAPTURE_captureAll(2,"step 2: Select data source/assign columns");
					break;
				};

			case 3: //show page with generators
				{
					$LAB_submit=$I18N_save;
					$helpPage="mi_step3";
					$step = 3;

					if (!empty($_POST[BUT_submit3]) && $_POST[go]=="t")
						{
							MASS_saveGeneratorOptions(&$EGKparams);
							MSG_showInfo($I18N_data_saved,$GLOBALS["m23_language"]);
							$LAB_submit="$I18N_nextStep ($I18N_MIstep4)";
							$step = 4;
							$go="f";
						}
					else
						{
							$genratePropertiesAmount = MASS_getXProperties($EGKparams,"g");

							if ($genratePropertiesAmount[amount] == 0)
								{
									MSG_showInfo($I18N_noGeneratorOptionsNeeded,$GLOBALS["m23_language"]);
									$LAB_submit="$I18N_nextStep ($I18N_MIstep4)";
									$step = 4;
									$go="f";
								}
							else
								{
									MASS_showGeneratorOptions($EGKparams);
									$go="t";
								};
						}

					CAPTURE_captureAll(3,"step 3: Generator options");

					break;
				};

			case 4: //show page with table to enter missing or change values
				{
					$helpPage="mi_step4";
					$step = 4;
					$go="t";
					$LAB_submit=$I18N_save;
					
					if (!empty($_POST[BUT_submit4]) && $_POST[go]=="t")
						{
							$msg=MASS_startInstall($EGKparams);
							MSG_showInfo("$I18N_client_creation_status $msg",$m23_language);
							$LAB_submit="XXX";
							$helpPage = false;
						}
					else
						MASS_showOverview($EGKparams);
						
					CAPTURE_captureAll(4,"step 4: Enter missing values/overview");
					break;
				};
		};

	$EGKparamStr = implodeAssoc("?#?",$EGKparams);
	
	echo("
	$hidden
	<input type=\"hidden\" name=\"go\" value=\"$go\">
	<input type=\"hidden\" name=\"step\" value=\"$step\">
	<input type=\"hidden\" name=\"EGKparamStr\" value=\"$EGKparamStr\">	
	");
	
	if ($LAB_submit!="XXX")
		echo("<INPUT type=\"submit\" value=\"$LAB_submit\" name=\"BUT_submit$step\"><br>");
	else
		echo("<br>");

	if ($helpPage !== false)
		help_showhelp($helpPage,$m23_language);
?>

</FORM>