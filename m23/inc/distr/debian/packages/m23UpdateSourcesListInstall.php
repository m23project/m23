<?PHP
/*
Description:Updatet /etc/apt/sources.list
Priority:12
*/
function run($id)
{
	include_once("/m23/inc/distr/debian/clientConfig.php");
	CLCFG_sourceslist(getClientIP(),CLIENT_getClientName(),getServerIP());
	/* =====> */ MSR_statusBarIncCommand(100);
	sendClientStatus($id,"done");
	executeNextWork();
}
?>