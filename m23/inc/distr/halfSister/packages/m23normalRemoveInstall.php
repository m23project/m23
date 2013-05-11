<?PHP
/*
Description: Removes normal packages
Priority:25
*/

function run($id)
{
	$sql="SELECT normalPackage FROM `clientjobs` WHERE id=$id";
	$result=mysql_query($sql) or die ("SQL-Befehl konnte nicht ausgef¸hrt werden:".$sql);

	/* =====> */ MSR_statusBarIncCommand(1);

	$line=mysql_fetch_row($result);
	sendClientStageStatus(STATUS_BLUE);

	HS_pkgDeinstall($line[0]);

	/* =====> */ MSR_statusBarIncCommand(99);

	sendClientStageStatus(STATUS_GREEN);
	sendClientStatus($id,"done");
	executeNextWork();
}
?>