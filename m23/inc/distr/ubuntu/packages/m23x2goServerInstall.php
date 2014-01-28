<?PHP
/*
Description:XFree86 or XOrg base system
Priority:30
*/
function run($id)
{
 $lang=getClientLanguage();
 include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
 include('/m23/inc/distr/ubuntu/clientConfigCommon.php');
 
 CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_installing_x2go_server);
echo("

if [ $(grep -i \"Ubuntu\" /etc/issue -c) -gt 0 ] || [ $(grep -i \"Linux Mint\" /etc/issue -c) -gt 0 ]
then
	echo 'deb http://ppa.launchpad.net/x2go/stable/ubuntu precise main' > /etc/apt/sources.list.d/x2go.list
	apt-get update
fi
");

CLCFG_aptGet('install', 'x2goserver');

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
