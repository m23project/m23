<?PHP
/*
Description: Ein Demonstrationsskript
Priority: 50
*/

include ("/m23/data+scripts/packages/m23CommonInstallRoutines.php");
include ("/m23/inc/distr/debian/clientConfigCommon.php");
function run($id)
{
	$clientName = CLIENT_getClientName();

	print('echo '.CLIENT_getDebconfDBValue($clientName, 'demo', 'demo/text'));

	sendClientStatus($id,"done");
	executeNextWork();
};
?>
