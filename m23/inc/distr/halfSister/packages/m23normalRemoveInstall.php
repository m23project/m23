<?PHP
/*
Description: Removes normal packages
Priority:25
*/

function run($id)
{
	include('/m23/inc/distr/debian/clientConfigCommon.php');

	$sql="SELECT normalPackage FROM `clientjobs` WHERE id=$id";
	$result=DB_query($sql) or die ("Could not execute SQL statement:".$sql);

	/* =====> */ MSR_statusBarIncCommand(1);

	$line=mysqli_fetch_row($result);
	sendClientStageStatus(STATUS_BLUE);
	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_deinstalling_packages);

	HS_pkgDeinstall($line[0]);

	/* =====> */ MSR_statusBarIncCommand(99);

	sendClientStageStatus(STATUS_GREEN);
	sendClientStatus($id,"done");
	executeNextWork();
}
?>