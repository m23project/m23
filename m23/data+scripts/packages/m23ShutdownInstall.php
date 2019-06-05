<?PHP
/*
Description: Halts the computer
Priority:100
*/

function run($id)
{
	sendClientStatus($id,"done");
	/* =====> */ MSR_statusBarIncCommand(100);

	DHCP_activateBoot(CLIENT_getClientName(), false);

	echo("

# /sbin/poweroff > /dev/null 2>&1
# /sbin/poweroff -f > /dev/null 2>&1
# /sbin/halt > /dev/null 2>&1
# /sbin/halt -f > /dev/null 2>&1
# /sbin/shutdown -h now > /dev/null 2>&1
# /sbin/shutdown -t now -f > /dev/null 2>&1
# /sbin/shutdown > /dev/null 2>&1

# For busybox v1.21.0
# Note: there is some kind of race condition.
# Firing up two consecutive /bin/poweroff commands with a sleep in between
# seems to be crucial.

echo \"Firing up first poweroff command\"
poweroff > /dev/null 2>&1

sleep 1
echo \"Firing up second poweroff command\"
poweroff -f > /dev/null 2>&1

sleep 1
echo \"Firing up first halt command\"
/sbin/halt &> /dev/null

sleep 1
echo \"Firing up second halt command\"
/sbin/halt -f &> /dev/null

sleep 1
echo \"Firing up first shutdown command\"
/sbin/shutdown -t now -f &> /dev/null

sleep 1
echo \"Firing up second shutdown command\"
/sbin/shutdown -f &> /dev/null

sleep 1
echo \"Firing up third shutdown command\"
/sbin/shutdown &> /dev/null

echo \"Sleeping for 5 seconds\"
sleep 5

echo \"We never should have made the way upto this position in the script!\"
echo \"Nevertheless, type a key to continue.\"
read somekey

echo \"Firing up last poweroff command\"
/bin/poweroff -f > /dev/null 2>&1

/sbin/poweroff -f > /dev/null 2>&1

 ");

	DHCP_activateBoot(CLIENT_getClientName(), false);
}
?>
