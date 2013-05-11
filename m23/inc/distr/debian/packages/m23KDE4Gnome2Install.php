<?PHP
/*
Description: Parallel installation of KDE 4 and Gnome 2 desktop.
Priority:20
*/


function run($id)
{
	$server=getServerIP();

	$lang=getClientLanguage();

	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
	include('/m23/inc/distr/debian/clientConfigCommon.php');

	//Install Gnome 2
	GNOME_prepare();
	/* =====> */ MSR_statusBarIncCommand(1);
	GNOME_install($lang);
	/* =====> */ MSR_statusBarIncCommand(42);

	//Install KDE 4 with KDM login manager
	KDE_prepare();
	/* =====> */ MSR_statusBarIncCommand(1);
	KDE_install($lang, 4);
	/* =====> */ MSR_statusBarIncCommand(42);
	KDE_installLoginManager($lang,4);
	/* =====> */ MSR_statusBarIncCommand(14);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	executeNextWork();
}
?>
