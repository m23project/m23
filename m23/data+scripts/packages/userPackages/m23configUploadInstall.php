<?PHP
/*
Description: Enter your description here
Priority: Enter the priority number here (scripts with lower numbers get executed earlier)
*/

include ("/m23/data+scripts/packages/m23CommonInstallRoutines.php");
include ("/m23/inc/distr/debian/clientConfigCommon.php");

function run($id)
{
	$serverIP=getServerIP();
	echo("wget https://$serverIP/configs/allconfig.tb2 -O /tmp/allconfig.tb2
	cd /
	tar xfj /tmp/allconfig.tb2");

	sendClientStatus($id,"done");
	executeNextWork();
};


?>