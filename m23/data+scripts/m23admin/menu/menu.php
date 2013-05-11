<br>
<form method="GET" action="index.php">
<center>
<?PHP
	if (isset($_GET['LB_language']))
	$GLOBALS["m23_language"] = $_GET['LB_language'];

	I18N_listWebinterfaceLanguages($GLOBALS["m23_language"]);
?>

<?php HTML_setPage($m23_page); ?>

<input type="hidden" name="m23_language" value="<?PHP echo($GLOBALS["m23_language"]); ?>">
<input type="submit" name="BUT_lang" value="OK">
</center>
</form>

<?PHP
 //get the manual according to the language
 switch ($GLOBALS['m23_language'])
 	{
		case "de" :
			{
				$manual_url="/m23manual/de/index.html";
				$qlang="deu";
				break;
			};
		case "fr" : $manual_url="/m23manual/fr/index.html"; break;
		default:
			{
				$manual_url="/m23manual/en/index.html";
				$qlang="eng";
			};
	};

SERVER_dhcpServerInNetWarn();
SERVER_dynamicIPWarn();
SERVER_rootFreeSpace();
SERVER_tmpNotWritable();
CLIENT_listCriticalClients();
CAPTURE_showMessageBox();
?>

<ul class="navmenu">
<?php 
	MENU_startGroup($I18N_server);
		
		MENU_showEntry($I18N_home,"index.php","/gfx/home_mini.png");
		if (!$_SESSION['m23Shared']) MENU_showEntry($I18N_serverSettings,"index.php?page=serverSettings",
			"/gfx/settings_mini.png");
		if ($_SESSION['m23Shared']) MENU_showEntry($I18N_customerCenter,"index.php?page=customerCenter",
			"/gfx/settings_mini.png");
		MENU_showEntry($I18N_m23RemoteAdministrationService,"index.php?page=m23RemoteAdministrationService","/gfx/m23RemoteAdministrationService-mini.png");
// 		PLG_listMenuPlugins("/m23/data+scripts/m23admin/server/");
	MENU_endGroup();

	MENU_startGroup($I18N_clients);
		MENU_showEntry($I18N_overview,"index.php?page=clientsoverview",
			"/gfx/overview-mini.png");
		MENU_showEntry($I18N_add,"index.php?page=addclient&clearSession=1",
			"/gfx/status/red.png");
		MENU_showEntry($I18N_setup,"index.php?page=clientsoverview&action=setup",
			"/gfx/status/yellow.png");
		MENU_showEntry($I18N_delete,"index.php?page=clientsoverview&action=delete",
			"/gfx/mini_trash.png");
		if (!$_SESSION['m23Shared'])  MENU_showEntry($I18N_assimilate,"index.php?page=assimilate",
			"/gfx/assimilate-mini.png");
// 		PLG_listMenuPlugins("/m23/data+scripts/m23admin/clients/");
	MENU_endGroup();

	if (!$_SESSION['m23Shared'])
	{
		MENU_startGroup($I18N_VMclients);
			MENU_showEntry($I18N_createVM,"index.php?page=addvmclient&clearSession=1",
				"/gfx/status/red.png");
		MENU_endGroup();
	}

	MENU_startGroup($I18N_groups);
		MENU_showEntry($I18N_overview,"index.php?page=groupsoverview",
			"/gfx/overview-mini.png");
		MENU_showEntry($I18N_add,"index.php?page=creategroup","/gfx/add-mini.png");
// 		PLG_listMenuPlugins("/m23/data+scripts/m23admin/groups/");
	MENU_endGroup();

	MENU_startGroup($I18N_packages);
		MENU_showEntry($I18N_install,"index.php?page=clientsoverview&action=install",
			"/gfx/status/green.png");
		MENU_showEntry($I18N_deinstall,"index.php?page=clientsoverview&action=deinstall",
			"/gfx/deinstall-mini.png");
		MENU_showEntry($I18N_update,"index.php?page=clientsoverview&action=update",
			"/gfx/update_mini.png");
		MENU_showEntry($I18N_poolBuilder,"index.php?page=poolBuilder",
			"/gfx/update_mini.png");
		if (!$_SESSION['m23Shared']) MENU_showEntry($I18N_scriptEditor,"index.php?page=scriptEditor",
			"/gfx/scriptEditor-mini.png");
		if (!$_SESSION['m23Shared'])  MENU_showEntry($I18N_packageBuilder,"index.php?page=packageBuilder",
			"/gfx/update_mini.png");
		MENU_showEntry($I18N_packageSources,"index.php?page=clientsourceslist",
			"/gfx/package-mini.png");
		MENU_showEntry($I18N_editPackageSelection,
			"index.php?page=installpackages&action=packageSelection",
			"/gfx/packageSelection-mini.png");

// 		PLG_listMenuPlugins("/m23/data+scripts/m23admin/packages/"); 
	MENU_endGroup();

	if (!$_SESSION['m23Shared'])
	{
		MENU_startGroup($I18N_massTools);
			MENU_showEntry($I18N_clientBuilder,"index.php?page=addclient&action=clientBuilder&clearSession=1",
				"/gfx/clientBuilder-mini.png");
			MENU_showEntry($I18N_massInstall,"index.php?page=clientsoverview&action=massInstall","/gfx/massInstall-mini.png");
// 			PLG_listMenuPlugins("/m23/data+scripts/m23admin/masstools/");
		MENU_endGroup();


		MENU_startGroup($I18N_tools);
			MENU_showEntry($I18N_make_bootdisk,"index.php?page=makeBootDisk",
				"/gfx/disk-mini.png");
			MENU_showEntry($I18N_make_bootcd,"index.php?page=makeBootCD","/gfx/cdrom-mini.png");

// 			PLG_listMenuPlugins("/m23/data+scripts/m23admin/tools/");
		MENU_endGroup();


/*		MENU_startGroup($I18N_plugins);
			MENU_showEntry($I18N_overview,"index.php?page=plgoverview",
				"/gfx/overview-mini.png");
			MENU_showEntry($I18N_install,"index.php?page=plginstall","/gfx/install-mini.png");
		MENU_endGroup();*/
	}


	MENU_startGroup($I18N_support);
		MENU_showEntry($I18N_support,"index.php?page=support","/gfx/help-mini.png");
		$bugText="!!!$I18N_report_a_bug!!!";
		MENU_showEntry($bugText,"http://m23.sourceforge.net/phpBB2",
			"/gfx/bug-mini.png");
		MENU_showEntry($I18N_subscribeNewsletter,
			"http://lists.sourceforge.net/mailman/listinfo/m23-news",
			"/gfx/newsletter-mini.png");
		MENU_showEntry($I18N_m23questionaire,HTML_getQuestionnaireURL(),"/gfx/questionaire-mini.png");
		MENU_showEntry($I18N_manual,$manual_url,"/gfx/book-mini.png");
		$devGuideText="Development Guide";
		MENU_showEntry($devGuideText,"/devguide/index.html","/gfx/book-mini.png");
	MENU_endGroup();
	?>
</ul>