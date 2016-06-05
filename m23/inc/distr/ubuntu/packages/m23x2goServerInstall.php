<?PHP
/*
Description: Installs the x2go server.
Priority:30
*/
function run($id)
{
	$lang=getClientLanguage();
	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
	include('/m23/inc/distr/ubuntu/clientConfigCommon.php');
	$x2goStopCmd = '/xTWOgoStopSniper';

	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_installing_x2go_server);
echo("

if [ $(lsb_release -c -s) = 'xenial' ]
then
	echo 'deb http://ppa.launchpad.net/x2go/stable/ubuntu xenial main' > /etc/apt/sources.list.d/x2go.list
	apt-get update
fi

if [ $(grep -i \"Ubuntu 14.04\" /etc/issue -c) -gt 0 ] || [ 'qiana' = $(lsb_release -c -s) ]
then
		echo 'deb http://ppa.launchpad.net/x2go/stable/ubuntu trusty main' > /etc/apt/sources.list.d/x2go.list
		apt-get update

cat >> $x2goStopCmd << \"EOF\"
#!/bin/bash
while `true`
do
	if [ $(ps -A | grep ' x2go' -c) -gt 0 ]
	then
		echo fertig >> $x2goStopCmd.log
		break
	fi
	date >> $x2goStopCmd.log
	sleep 1
done

(/etc/init.d/x2goserver stop 2>&1) >> $x2goStopCmd.log

(ps -A -o pid -o comm | sed 's/^ *//' | grep x2go | cut -d' ' -f1 | xargs -n1 kill -9 2>&1) >> $x2goStopCmd.log

EOF

chmod +x $x2goStopCmd

chmod 755 /var/run/screen

(screen -dmS xTWOgoStopSniper $x2goStopCmd 2>&1) >> $x2goStopCmd.screenlog

else
	if [ $(grep -i \"Ubuntu 12.04\" /etc/issue -c) -gt 0 ] || [ $(grep -i \"Linux Mint\" /etc/issue -c) -gt 0 ]
	then
		echo 'deb http://ppa.launchpad.net/x2go/stable/ubuntu precise main' > /etc/apt/sources.list.d/x2go.list
		apt-get update
	fi
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