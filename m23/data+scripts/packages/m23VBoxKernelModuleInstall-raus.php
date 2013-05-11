<?PHP
/*
Description:Compiles the VirtualBox guest module
Priority:45
*/

include ('m23CommonInstallRoutines.php');
include ('/m23/inc/distr/debian/clientConfigCommon.php');

function run($id)
{
	$serverIP = getServerIP();

	echo("
if [ `lspci | grep -c VirtualBox` -gt 0 ]
then
	if [ `dpkg --get-selections | grep virtualbox-ose-guest-source -c` -gt 0 ] && [ `dpkg --get-selections | grep virtualbox-ose-guest-x11 -c` -gt 0 ]
	then
		dpkg-reconfigure virtualbox-ose-guest-source
	else
		arch=`uname -m | sed 's/x86_64/amd64/' | sed 's/i[3-9].*/x86/'`
		wget http://$serverIP/extraDebs/VBoxLinuxAdditions-\$arch.run -O /tmp/VBoxLinuxAdditions.run

		if [ $? -eq 0 ]
		then
			chmod +x /tmp/VBoxLinuxAdditions.run
			");
			CLCFG_aptGet("install","bzip2 linux-headers-`uname -r` build-essential");
echo("
			cd /tmp
			./VBoxLinuxAdditions.run
			rm /etc/X11/xorg.conf 2> /dev/null
			/sbin/m23-xorg.conf-generator.sh
		fi
	fi
fi
	
	
	\n");

	sendClientStatus($id,"done");

	executeNextWork();
};
?>