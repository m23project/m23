<?PHP
/*
Description: Sends package status information to the server
Priority:25
*/
function run($id)
{
	/* =====> */ MSR_statusBarIncCommand(10);

	HS_statusFileCommand();
	/* =====> */ MSR_statusBarIncCommand(90);

	sendClientStatus($id,"done");
	executeNextWork();
};
?>