<?PHP
/*
Description: sets a status
Priority:30
*/

function run($id)
{
	sendClientStageStatus(STATUS_GREEN);
	/* =====> */ MSR_statusBarIncCommand(100);

	sendClientStatus($id,"done");
	executeNextWork();
}
?>
