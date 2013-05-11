<?PHP
/*
Description: Reboots a client
Priority:100
*/

function run($id)
{
	$clientParams = CLIENT_getAskingParams();

	/* =====> */ MSR_statusBarIncCommand(100);
	sendClientStatus($id,"done");

	DHCP_activateBoot(CLIENT_getClientName(), false);

	echo("/sbin/reboot -f; /sbin/reboot");
}
?>
