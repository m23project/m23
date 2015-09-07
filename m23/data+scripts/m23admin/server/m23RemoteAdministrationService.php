<?
	echo('<span class="title">'.$I18N_m23RemoteAdministrationService.'</span> <img src="/gfx/m23RemoteAdministrationService-mini.png"><br><br>');

	if (RAS_isInstalled())
	{
		RAS_showStartStopRemove();
	}

	//Check again, because RAS_showStartStopRemove could have RAS removed
	if (!RAS_isInstalled())
		RAS_showAccountDataImport();

	//Check again, because RAS_showAccountDataImport could have RAS installed
	if (!RAS_isInstalled())
		RAS_showRegistration();

	if (RAS_isInstalled())
	{
		$helpPage = 'RASInstalled';
		RAS_chatWindow();
	}
	else
		$helpPage = 'RASNotInstalled';

	help_showhelp($helpPage);
?>