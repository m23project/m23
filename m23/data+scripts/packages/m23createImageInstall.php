<?PHP
/*
Description: Creates an image from the client
Priority: 10
*/

include ('m23CommonInstallRoutines.php');

function run($id)
{
	include('/m23/inc/distr/debian/clientConfigCommon.php');
	include('/m23/inc/dhcp.php');

	$serverIP=getServerIP();

//get all parameters for the imaging job
	$imgparams=unserialize(stripslashes(PKG_getPackageParams($id)));

	CIR_detectSCSI();

//sets the ssh authorized_file for remote login into the clients
	CLCFG_setAuthorized_keys($serverIP,"/packages/baseSys/authorized_keys");

	CIR_enableDropbear();

	CIR_setDateAndTimeTemorarily();

	CLCFG_copySSLCert("");

	IMG_serverCreate($imgparams['trans'],$imgparams['imagename'],$imgparams['port']);

	IMG_clientCreate($imgparams['trans'],$imgparams['form'],$imgparams['compr'],$imgparams['param'],$imgparams['server'],$imgparams['port']);

	MSR_genSendCommand("/tmp/m23ImagerSize","m23ImagerSize&imagename=".urlencode($imgparams['imagename']));

	IMG_storeMBR($imgparams['param'], $imgparams['imagename']);

	DHCP_activateBoot(CLIENT_getClientName(), true);

	sendClientStatus($id,"done");

	executeNextWork();
}
?>
