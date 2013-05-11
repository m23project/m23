<?PHP
/*
Description: Kubuntu Desktop
Priority:20
*/

function run($id)
{
	$server=getServerIP();
	
	$lang=getClientLanguage();
	
	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
	include('/m23/inc/distr/ubuntu/clientConfigCommon.php');

	$lV = I18N_getLangVars($lang);

	CLCFG_dialogInfoBox($I18N_client_installation,$I18N_client_status,$I18N_installingKubuntuDesktop);

echo("
export DEBIAN_FRONTEND=noninteractive\n

apt-get update 2>&1 | tee -a /tmp/m23sourceupdate.log

langPkg=`apt-cache search kde-i18n-$lV[packagelang] | cut -d' ' -f1`
if test -z \$langPkg
then
	langPkg=`apt-cache search language-pack-kde-$lV[packagelang] | cut -d' ' -f1`
fi

#Add the kde-l10n package if found
l10nPkg=`apt-cache search kde-l10n-$lV[packagelang] | cut -d' ' -f1`
if [ \$l10nPkg ]
then
	langPkg=\"\$langPkg \$l10nPkg\"
fi



#apt-get -y -m --force-yes install \$langPkg kubuntu-desktop 2>&1 ; echo $? > /tmp/apt-err | tee /tmp/m23UbuntuDesktop.log

(");

CLCFG_aptGet("install", "\$langPkg kubuntu-desktop");

echo (") | tee -a /tmp/m23UbuntuDesktop.log

if [ `cat /tmp/m23apt.ret` -eq 0 ]
then
	".sendClientLogStatus("KDE installed",true)."
else
	".sendClientLogStatus("KDE installed",false,true)."
fi

");


CLCFG_aptGet("install", "m23-ksplash");
CLCFG_aptGet("install", "language-support-writing-$lV[packagelang]");
CLCFG_aptGet("install", "language-support-$lV[packagelang]");
CLCFG_aptGet("install", "`check-language-support -l $lV[packagelang]`");

// apt-get -y -m --force-yes install m23-ksplash
// 
// apt-get -y -m --force-yes install language-support-writing-$lV[packagelang]
// apt-get -y -m --force-yes install language-support-$lV[packagelang]
// apt-get -y -m --force-yes install `check-language-support -l $lV[packagelang]`

echo("
/usr/share/locales/install-language-pack $lV[packagelang]

#Check if KDE 4 is used and if yes install the m23 KDE 4 wallpaper
if [ `dpkg --get-selections | grep kdelibs5 -c` -gt 0 ]
then
");
	CLCFG_aptGet("install", "m23-kde4-wallpaper");

// 	apt-get -y -m --force-yes install m23-kde4-wallpaper
echo("
fi

");

CLCFG_aptGet("install", "libxine1-ffmpeg libavcodec52 libavformat52 libpostproc51 libswscale0 libk3b6-extracodecs libmp3lame0 libtunepimp5-mp3");

/* =====> */ MSR_statusBarIncCommand(25);

KDE_install($lang, 4);
/* =====> */ MSR_statusBarIncCommand(60);


KDE_installLoginManager($lang,4);
/* =====> */ MSR_statusBarIncCommand(3);

CLCFG_installApplicationLanguagePackages($lang);
/* =====> */ MSR_statusBarIncCommand(10);

CLCFG_disableAvahiDaemon();

//CLCFG_configUpstartForNormalUsage();

/* =====> */ MSR_statusBarIncCommand(2);

MSR_logCommand("/tmp/m23sourceupdate.log");

MSR_logCommand("/tmp/m23UbuntuDesktop.log");

sendClientStatus($id,"done");
sendClientStageStatus(STATUS_GREEN);
echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");


sendClientStageStatus(STATUS_GREEN);
executeNextWork();
}
?>