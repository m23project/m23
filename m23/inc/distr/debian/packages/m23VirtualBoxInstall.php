<?PHP
/*
Description: Script for installing the VirtualBox OSE virtualisation solution on an m23 client
Priority:25
*/
function run($id)
{
	$serverIP = getServerIP();

	echo ("#Set the m23 server IP for the m23-vbox package
cat >> /tmp/debconfm23-vbox << \"EOF\"
m23-vbox m23-vbox/m23server string $serverIP
EOF

debconf-set-selections /tmp/debconfm23-vbox

#Check if the source for the m23 server packages is in sources.list
if [ `grep -c m23.sourceforge.net/m23inst /etc/apt/sources.list` -eq 0 ]
then
	#Add if if it is nonexistent
	echo \"deb http://m23.sourceforge.net/m23inst/ ./\" >> /etc/apt/sources.list
fi

export DEBIAN_FRONTEND=noninteractive
apt-get --force-yes -y update
apt-get --force-yes -y install m23-vbox
");
	/* =====> */ MSR_statusBarIncCommand(100);

	sendClientStatus($id,"done");
	executeNextWork();
}
?>