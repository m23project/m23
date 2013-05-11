<?PHP
/*
Description: Removes normal Debian packages
Priority:25
*/

function run($id)
{
	$sql="SELECT normalPackage FROM `clientjobs` WHERE id=$id";
	$result=mysql_query($sql) or die ("SQL-Befehl konnte nicht ausgef¸hrt werden:".$sql);

	/* =====> */ MSR_statusBarIncCommand(1);

	$line=mysql_fetch_row($result);
	sendClientStageStatus(STATUS_BLUE);
	echo("
			export DEBIAN_FRONTEND=noninteractive
			apt-get --force-yes -y remove $line[0] --purge\n");

	/* =====> */ MSR_statusBarIncCommand(99);

	sendClientStageStatus(STATUS_GREEN);
	sendClientStatus($id,"done");
	executeNextWork();
}
?>