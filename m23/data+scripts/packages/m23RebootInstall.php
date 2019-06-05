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

	echo("
# For busybox v1.21.0
# Note: there is some kind of race condition.
# Firing up two consecutive /bin/poweroff commands with a sleep in between
# seems to be crucial.

echo \"Firing up first reboot command\"
reboot > /dev/null 2>&1

sleep 1
echo \"Firing up second reboot command\"
reboot -f > /dev/null 2>&1

echo \"Sleeping for 5 seconds\"
sleep 5

echo \"We never should have made the way upto this position in the script!\"
echo \"Nevertheless, type a key to continue.\"
read somekey

echo \"Firing up last reboot command\"
/bin/reboot -f > /dev/null 2>&1

/sbin/reboot -f > /dev/null 2>&1

");
}
?>
