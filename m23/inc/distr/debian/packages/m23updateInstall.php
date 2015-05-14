<?PHP
/*
Description: Updates the system
Priority:25
*/
function run($id)
{
	include('/m23/inc/distr/debian/clientConfigCommon.php');
	$lang=getClientLanguage();

	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");

	$sql="SELECT client,params FROM `clientjobs` WHERE id=$id";
	$result=mysql_query($sql) or die ("SQL statement could not executed:".$sql);
	$line=mysql_fetch_row($result);
	sendClientStageStatus(STATUS_BLUE);
	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_updating_packages);

	$arr=explodeAssoc("?#?",$line[1]);
	$clientOptions=CLIENT_getAllOptions($line[0]);
	
	if ($arr['type']=="complete")
		$aptCommand="dist-upgrade";
	else
		$aptCommand="upgrade";
	echo("
export DEBIAN_FRONTEND=noninteractive
apt-get --force-yes -y $aptCommand\n");

	/* =====> */ MSR_statusBarIncCommand(100);

	sendClientStageStatus(STATUS_GREEN);
sendClientStatus($id,"done");
executeNextWork();
}
?>