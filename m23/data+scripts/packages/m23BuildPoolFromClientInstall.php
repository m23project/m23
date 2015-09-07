<?PHP
/*
Description: Builds a pool (on the m23 server) from the packages installed on the client.
Priority:99
*/


function run($id)
{
	include_once('/m23/inc/CMessageManager.php');
	include_once('/m23/inc/CChecks.php');
	include_once('/m23/inc/CClient.php');
	include_once('/m23/inc/CClientLister.php');
	include_once('/m23/inc/CPoolLister.php');
	include_once('/m23/inc/CPool.php');
	include_once('/m23/inc/CPoolGUI.php');
	include_once('/m23/inc/CPoolFromClientGUI.php');
	include_once('/m23/inc/CObjectStorageManager.php');
	include_once('/m23/inc/CObjectStorage.php');

	$GLOBALS["m23_language"] = 'en';

	$client = CLIENT_getClientName();

	$poolFromClientGUIO = new CPoolFromClientGUI($client);
	$poolFromClientGUIO->saveInObjectStorage();

	sendClientStatus($id,"done");

	executeNextWork();
}
?>