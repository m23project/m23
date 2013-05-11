<?PHP
/*
Description: gnome2 Desktop
Priority:20
*/



function run($id)
{
	include_once('/m23/inc/distr/debian/clientConfigCommon.php');
	
	$lang = getClientLanguage();

	GNOME_prepare();
	/* =====> */ MSR_statusBarIncCommand(25);

	GNOME_install($lang);
	/* =====> */ MSR_statusBarIncCommand(50);

	GNOME_installLoginManager($lang);
	/* =====> */ MSR_statusBarIncCommand(25);

	echo ('echo "<?xml version="1.0"?>
<gconf>
</gconf>" > /etc/gconf/gconf.xml.mandatory/%gconf-tree.xml
');

	MSR_logCommand("/tmp/m23sourceupdate.log");

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");

	executeNextWork();
}
?>