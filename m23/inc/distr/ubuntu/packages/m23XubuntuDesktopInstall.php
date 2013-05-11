<?PHP
/*
Description: Xubuntu Desktop
Priority:20
*/

function run($id)
{
	$server=getServerIP();

	$lang=getClientLanguage();

	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
	include('/m23/inc/distr/ubuntu/clientConfigCommon.php');

	$lV = I18N_getLangVars($lang);

	CLCFG_dialogInfoBox($I18N_client_installation,$I18N_client_status,$I18N_installingXubuntuDesktop);

echo("
export DEBIAN_FRONTEND=noninteractive\n

apt-get update 2>&1 | tee -a /tmp/m23sourceupdate.log


#apt-get -y --force-yes install xubuntu-desktop 2>&1 ; echo $? > /tmp/apt-err | tee /tmp/m23XubuntuDesktop.log
#if test `cat /tmp/apt-err` -eq 0

(");

CLCFG_aptGet("install", "xubuntu-desktop");

/* =====> */ MSR_statusBarIncCommand(75);

CLCFG_aptGet("install", "language-support-writing-$lV[packagelang]");
CLCFG_aptGet("install", "language-support-$lV[packagelang]");
CLCFG_aptGet("install", "`check-language-support -l $lV[packagelang]`");

/* =====> */ MSR_statusBarIncCommand(20);

echo (") | tee -a /tmp/m23XubuntuDesktop.log

if [ `cat /tmp/m23apt.ret` -eq 0 ]
then
	".sendClientLogStatus("Xubuntu desktop installed",true)."
else
	".sendClientLogStatus("Xubuntu desktop installed",false,true)."
fi

");


MSR_logCommand("/tmp/m23sourceupdate.log");

MSR_logCommand("/tmp/m23XubuntuDesktop.log");

/* =====> */ MSR_statusBarIncCommand(5);

sendClientStatus($id,"done");
sendClientStageStatus(STATUS_GREEN);
echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");

executeNextWork();
}
?>
