<?PHP
/*
	Description: Sets the status of a client.
*/

	include('/m23/inc/checks.php');
	include('/m23/inc/db.php');
	include('/m23/inc/remotevar.php');
	include('/m23/inc/dhcp.php');
	include('/m23/inc/client.php');
	include('/m23/inc/helper.php');
	include_once('/m23/inc/capture.php');
	include_once('/m23/inc/vm.php');

	include_once('/m23/inc/html.php');
	include_once('/m23/inc/CMessageManager.php');
	include_once('/m23/inc/CChecks.php');
	include_once('/m23/inc/CClient.php');
	include_once('/m23/inc/server.php');

	if (file_exists('/m23/inc/m23shared/m23shared.php')) include_once('/m23/inc/m23shared/m23shared.php');

	session_start();

	dbConnect();

	CHECK_FW(CC_status,$_GET['status']);
	$sql="UPDATE clients SET status='".$_GET['status']."' WHERE client='".CLIENT_getClientName()."';";
	DB_query($sql); //FW ok
?>
