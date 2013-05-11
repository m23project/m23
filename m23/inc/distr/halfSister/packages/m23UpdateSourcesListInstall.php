<?PHP
/*
Description: Writes the package sources list for the client's package manager.
Priority:12
*/
function run($id)
{
	include_once("/m23/inc/distr/halfSister/clientConfig.php");

	HS_setSourcesList(CLIENT_getClientName());
	/* =====> */ MSR_statusBarIncCommand(100);
	sendClientStatus($id,"done");
	executeNextWork();
}
?>