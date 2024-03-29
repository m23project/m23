<?PHP
/*
Description: Linux Mint 11 Desktop
Priority:20
*/

function run($id)
{
	$server=getServerIP();
	
	$lang=getClientLanguage();
	
	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
	include('/m23/inc/distr/ubuntu/clientConfigCommon.php');

	$lV = I18N_getLangVars($lang);

	CLCFG_dialogInfoBox($I18N_client_installation,$I18N_client_status,$I18N_installingMintKDEDesktop);


echo("
export DEBIAN_FRONTEND=noninteractive\n

apt-get update 2>&1 | tee -a /tmp/m23sourceupdate.log

apt-get -y -m --force-yes install linuxmint-keyring

langPkg=`apt-cache search kde-i18n-$lV[packagelang] | cut -d' ' -f1`
if [ -z \$langPkg ]
then
	langPkg=`apt-cache search language-pack-kde-$lV[packagelang] | cut -d' ' -f1`
fi

#Add the kde-l10n package if found
l10nPkg=`apt-cache search kde-l10n-$lV[packagelang] | cut -d' ' -f1`
if [ \$l10nPkg ]
then
	langPkg=\"\$langPkg \$l10nPkg\"
fi

apt-get -y -m --force-yes install \$langPkg kubuntu-desktop 2>&1 ; echo $? > /tmp/apt-err | tee /tmp/m23UbuntuDesktop.log

if [ `cat /tmp/apt-err` -eq 0 ]
then
	".sendClientLogStatus("KDE installed",true,false)."
else
	".sendClientLogStatus("KDE installed",false,false)."
fi

apt-get -y -m --force-yes install m23-ksplash

apt-get -y -m --force-yes install language-support-writing-$lV[packagelang]
apt-get -y -m --force-yes install language-support-$lV[packagelang]
apt-get -y -m --force-yes install `check-language-support -l $lV[packagelang]`
/usr/share/locales/install-language-pack $lV[packagelang]

#Check if KDE 4 is used and if yes install the m23 KDE 4 wallpaper
if [ `dpkg --get-selections | grep kdelibs5 -c` -gt 0 ]
then
	apt-get -y -m --force-yes install m23-kde4-wallpaper
fi

#Install extra multimedia codecs
apt-get -y -m --force-yes install libxine1-ffmpeg libavcodec52 libavformat52 libpostproc51 libswscale0 libk3b6-extracodecs libmp3lame0 libtunepimp5-mp3

#Special settings for Mint 9 KDE
apt-get -y -m --force-yes install mint-common mint-artwork-kde plymouth-theme-mint-kde

#mint-configuration-kde

mv /sbin/start /sbin/start.bak
ln -s /bin/true /sbin/start

");

/* =====> */ MSR_statusBarIncCommand(25);

KDE_install($lang, 4, false);
/* =====> */ MSR_statusBarIncCommand(60);

CLCFG_disableAvahiDaemon();

//CLCFG_configUpstartForNormalUsage();

echo("\napt-get -y -m install -f\n");

KDE_installLoginManager($lang,4);
/* =====> */ MSR_statusBarIncCommand(3);

CLCFG_installApplicationLanguagePackages($lang);
/* =====> */ MSR_statusBarIncCommand(10);


/* =====> */ MSR_statusBarIncCommand(2);

MSR_logCommand("/tmp/m23sourceupdate.log");

MSR_logCommand("/tmp/m23UbuntuDesktop.log");

sendClientStatus($id,"done");
sendClientStageStatus(STATUS_GREEN);
echo("

rm /tmp/*.sh

rm /tmp/*.php

rm /sbin/start

mv /sbin/start.bak /sbin/start

\n\n");


sendClientStageStatus(STATUS_GREEN);
executeNextWork();
}
?>