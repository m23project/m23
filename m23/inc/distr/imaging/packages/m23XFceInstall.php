<?PHP
/*
Description:XFce Desktop
Priority:20
*/

function run($id)
{
 $lang=getClientLanguage();

 include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");

echo("
export DEBIAN_FRONTEND=noninteractive\n

rm /etc/rc2.d/S99kdm\n

");

CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_installing_xfce);

$clientOptions=CLIENT_getAllAskingOptions();

if ($clientOptions['release']=="woody")
	$XFcepackages="xfce";
else
	$XFcepackages="xfce4 xfce4-utils";

echo("

apt-get update 2>&1 | tee -a /tmp/m23sourceupdate.log

apt-get --force-yes -y install $XFcepackages sudo 2>&1 | tee -a /tmp/m23xfce.log

rm /etc/sudoers

cat >> /etc/sudoers << \"SUDOERSEOF\"

Cmnd_Alias SHUTDOWN=/sbin/shutdown,/sbin/halt,/sbin/reboot

%users         ALL=NOPASSWD:SHUTDOWN

SUDOERSEOF

chmod 0440 /etc/sudoers

");

MSR_logCommand("/tmp/m23sourceupdate.log");

MSR_logCommand("/tmp/m23xfce.log");

sendClientStatus($id,"done");
sendClientStageStatus(STATUS_GREEN);

echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");

executeNextWork();
}
?>
