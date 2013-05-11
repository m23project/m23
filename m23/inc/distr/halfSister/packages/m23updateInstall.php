<?PHP
/*
Description: Updates the system
Priority:25
*/
function run($id)
{
	$sql="SELECT client,params FROM `clientjobs` WHERE id=$id";
	$result=mysql_query($sql) or die ("SQL statement could not executed:".$sql);
	$line=mysql_fetch_row($result);
	sendClientStageStatus(STATUS_BLUE);
	
	$arr=explodeAssoc("?#?",$line[1]);

	if ($arr['type']=="complete")
		HS_pkgFullUpdate();
	else
		HS_normalUpdate();

	/* =====> */ MSR_statusBarIncCommand(100);

	sendClientStageStatus(STATUS_GREEN);
	sendClientStatus($id,"done");
	executeNextWork();
}
?>