<?PHP
/*
Description: Ubuntu Desktop
Priority:20
*/

function run($id)
{
	$server=getServerIP();

	$lang=getClientLanguage();

	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
	include('/m23/inc/distr/ubuntu/clientConfigCommon.php');

	$lV = I18N_getLangVars($lang);

	CLCFG_dialogInfoBox($I18N_client_installation,$I18N_client_status,$I18N_installingUbuntuDesktop);

echo("
export DEBIAN_FRONTEND=noninteractive\n

apt-get update 2>&1 | tee -a /tmp/m23sourceupdate.log

#apt-get -y --force-yes install ubuntu-desktop 2>&1 ; echo $? > /tmp/apt-err | tee /tmp/m23UbuntuDesktop.log

#Added another round for Ubuntu's \"hash sum mismatch\" errors, that occurr randomly
#if [ `cat /tmp/apt-err` -ne 0 ]
#then
#	apt-get -y --force-yes install ubuntu-desktop 2>&1 ; echo $? > /tmp/apt-err | tee /tmp/m23UbuntuDesktop.log
#fi

(");

CLCFG_aptGet("install", "ubuntu-desktop");
/* =====> */ MSR_statusBarIncCommand(50);

echo (") | tee -a /tmp/m23UbuntuDesktop.log

if [ `cat /tmp/m23apt.ret` -eq 0 ]
then
	".sendClientLogStatus("Ubuntu desktop installed",true)."
else
	".sendClientLogStatus("Ubuntu desktop installed",false,true)."
fi

#install language pack
(");

CLCFG_aptGet("install", "language-pack-gnome-$lV[packagelang]");

echo(") | tee -a /tmp/m23UbuntuDesktop.log

#apt-get --force-yes -y install language-pack-gnome-$lV[packagelang] 2>&1 ; echo $? > /tmp/apt-err | tee /tmp/m23UbuntuDesktop.log

gconftool-2 --direct --config-source xml:readwrite:/etc/gconf/gconf.xml.default --type string --set /desktop/gnome/background/picture_filename /usr/m23/kde/m23background.png
#gconftool-2 --direct --config-source xml:readwrite:/etc/gconf/gconf.xml.mandatory --type string --set /desktop/gnome/background/picture_filename /usr/m23/kde/m23background.png

");
/* =====> */ MSR_statusBarIncCommand(25);

GNOME_install($lang);
/* =====> */ MSR_statusBarIncCommand(10);

CLCFG_installApplicationLanguagePackages($lang);

/* =====> */ MSR_statusBarIncCommand(10);

MSR_logCommand("/tmp/m23sourceupdate.log");

MSR_logCommand("/tmp/m23UbuntuDesktop.log");

//CLCFG_configUpstartForNormalUsage();
/* =====> */ MSR_statusBarIncCommand(5);

sendClientStatus($id,"done");
sendClientStageStatus(STATUS_GREEN);
echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");

executeNextWork();
}
?>
