<?PHP
/*
Description: Script for installing the proprietary ATI/AMD graphic card driver.
Priority: 25
*/

include ("/m23/data+scripts/packages/m23CommonInstallRoutines.php");
include ("/m23/inc/distr/debian/clientConfigCommon.php");

function run($id)
{
	$sip=getServerIP();

	echo("wget http://$sip/extraDebs/fglrx.tb2 -O /tmp/fglrx.tb2
cd /tmp
tar xfvj /tmp/fglrx.tb2
dpkg -i --force-all /tmp/fglrx*.deb
rm /tmp/fglrx*
".
		EDIT_searchLineNumber("/etc/X11/xorg.conf",'Configured Video Device').
		EDIT_insertAfterLineNumber("/etc/X11/xorg.conf", SED_foundLine,'Driver		"fglrx"').
'echo fglrx >> /etc/modules');

	sendClientStatus($id,"done");
	executeNextWork();
};
?>