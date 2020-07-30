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
	$result=DB_query($sql) or die ("SQL statement could not executed:".$sql);
	$line=mysqli_fetch_row($result);
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
apt-get update
apt-get --force-yes -y $aptCommand

if [ $? -eq 0 ]
then
".sendClientLogStatus("Update ($aptCommand)",true));

	sendClientStageStatus(STATUS_GREEN);
	sendClientStatus($id,"done");
echo('
else
');
	sendClientStageStatus(STATUS_CRITICAL);

echo(
	sendClientLogStatus("Update ($aptCommand)",false,true).
'
fi
');

	/* =====> */ MSR_statusBarIncCommand(100);
executeNextWork();
}
?>