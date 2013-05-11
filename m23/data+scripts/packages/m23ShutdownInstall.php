<?PHP
/*
Description: Halts the computer
Priority:100
*/

function run($id)
{
	sendClientStatus($id,"done");
	/* =====> */ MSR_statusBarIncCommand(100);

	echo("

/sbin/poweroff 2> /dev/null

/sbin/poweroff -f 2> /dev/null

/sbin/halt 2> /dev/null

/sbin/halt -f 2> /dev/null

/sbin/shutdown -t now -f 2> /dev/null

/sbin/shutdown -f 2> /dev/null

/sbin/shutdown 2> /dev/null

 ");

	DHCP_activateBoot(CLIENT_getClientName(), false);
}
?>
