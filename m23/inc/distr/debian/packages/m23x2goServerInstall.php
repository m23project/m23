<?PHP
/*
Description: Installs the x2go server.
Priority:30
*/
function run($id)
{
 // DebianVersionSpecific

 $lang=getClientLanguage();
 include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
 include('/m23/inc/distr/debian/clientConfigCommon.php');
 
 CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_installing_x2go_server);
echo("

apt-key adv --recv-keys --keyserver keys.gnupg.net E1F958385BFE2B6E
mkdir -p /etc/apt/sources.list.d

if [ $(grep -c 'Debian GNU/Linux 9' /etc/issue) -gt 0 ]
then
	echo 'deb http://packages.x2go.org/debian stretch main' > /etc/apt/sources.list.d/x2go.list
fi

if [ $(grep -c 'Debian GNU/Linux 8' /etc/issue) -gt 0 ]
then
	echo 'deb http://packages.x2go.org/debian jessie main' > /etc/apt/sources.list.d/x2go.list
fi

if [ $(grep -c 'Debian GNU/Linux 7' /etc/issue) -gt 0 ]
then
	echo 'deb http://packages.x2go.org/debian wheezy main' > /etc/apt/sources.list.d/x2go.list
fi

if [ $(grep -i 'Debian GNU/Linux 6.0' /etc/issue -c) -gt 0 ]
then
	echo 'deb http://packages.x2go.org/debian squeeze main' > /etc/apt/sources.list.d/x2go.list
fi

apt-get update
");

CLCFG_aptGet('install', 'x2go-keyring x2goserver x2goserver-xsession');

echo("
if [ -f /etc/init.d/x2goserver ]
then
	".sendClientLogStatus("x2go server installed",true)."
else
	".sendClientLogStatus("x2go server installed",false)."
fi
");

/* =====> */ MSR_statusBarIncCommand(90);

VM_CloudStackSendSetVisualURL();

/* =====> */ MSR_statusBarIncCommand(10);


sendClientStatus($id,"done");
executeNextWork();
}
?>