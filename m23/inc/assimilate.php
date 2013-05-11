<?php
/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Contains functions for assimilation of clients
$*/





/**
**name ASSI_showClientAddDialog()
**description Shows a dialog for adding a client to assimilate.
**/
function ASSI_showClientAddDialog()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$clientName = HTML_input('ED_clientName', false, 20, 32);
	$ip = HTML_input('ED_ip', false, 17, 17);
	$password = HTML_input('ED_password', false, 16, 40);
	$user = HTML_input('ED_user', false, 16, 40);

	if (HTML_submit('BUT_save',$I18N_assimilate))
		ASSI_addClient($clientName, $ip, $password, $user);

	HTML_showTableHeader();
	HTML_showFormHeader();
	HTML_setPage('assimilate');

	HTML_showTableRow($I18N_client_name, ED_clientName." ($I18N_eg Test01)");
	HTML_showTableRow($I18N_ip, ED_ip." ($I18N_eg 192.168.0.5)");
	HTML_showTableRow($I18N_UbuntuUserIfUbuntuSystem, ED_user);
	HTML_showTableRow($I18N_rootPasswordOrUbuntuUserPassword, ED_password);
	HTML_showTableRow('',BUT_save);

	HTML_showFormEnd();
	HTML_showTableEnd();
};





/**
**name ASSI_addClient($client,$ip)
**description Adds needed data for assimilating a client.
**parameter client: name of the client
**parameter ip: IP of the client
**parameter password: root password on Debian systems or combines user/root password on Ubuntu systems
**parameter ubuntuuser: name of the Ubuntu user or empty if a Debian system is meant.
**/
function ASSI_addClient($client,$ip,$password,$ubuntuUser)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$data['client'] = $client;
	$data['ip'] = $ip;
	$data['newgroup'] = "default";
	$data['rootpassword'] = $password;

	$err = CLIENT_addClient($data,"",CLIENT_ADD_TYPE_assimilate,false);

	if (strlen($err) == 0)
		{
			MSG_showInfo($I18N_client_added);
			echo("<br>");
			if (!empty($password))
				CLIENT_plinkFetchJob($client,$password,"assimilate",$ubuntuUser);
		}
	else
		{
			MSG_showError($err);
			echo("<br>");
		}
};





/**
**name ASSI_addUbuntuRoot()
**description Enables the root account in Ubuntu if a Ubuntu installation is found.
**/
function ASSI_addUbuntuRoot()
{
	echo("
#Enables the root account in Ubuntu if a Ubuntu installation is found.
	if [ `grep -i ubuntu /etc/issue -c` -gt 0 ]
	then
		pw=`cut -d':' -f2 /etc/shadow | sort -u | tail -n1`
		sed \"s#root:\!:#root:\$pw:#\" /etc/shadow > /tmp/shadow
		cat /tmp/shadow > /etc/shadow
		rm /tmp/shadow
	fi
	");
}





/**
**name ASSI_showClientAddDialog()
**description sets the last modified time of a client
**parameter id: id of the client
**parameter client: name of the client
**/
function ASSI_prepareClient()
{
	include_once("/m23/data+scripts/packages/m23CommonInstallRoutines.php");
	include_once("/m23/inc/distr/debian/clientConfigCommon.php");

	$clientParams = CLIENT_getAskingParams();
	$clientOptions = CLIENT_getAllAskingOptions();

	echo("
	export PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/bin/X11

	export DEBIAN_FRONTEND=noninteractive

	".EDIT_addIfNotExists("/etc/apt/sources.list","m23.sourceforge.net/m23debs","deb http://m23.sourceforge.net/m23debs/ ./").
	"
	wget -T1 -t1 -q http://m23.sourceforge.net/m23-Sign-Key.asc -O - | apt-key add -

	apt-get update

	apt-get -y --force-yes install wget screen sed ssh parted gawk hwsetup hwdata-knoppix m23hwscanner dmidecode m23-initscripts finger debconf-utils");

	CLCFG_fetchm23BasicTools("");
	CIR_writeClientID($clientParams);
	CLCFG_copySSLCert("");

	CLCFG_setAuthorized_keys(getServerIP(),"/packages/baseSys/authorized_keys");

	CLCFG_writeM23fetchjob();

	ASSI_addUbuntuRoot();
	CLCFG_createScreenRC();
};
?>