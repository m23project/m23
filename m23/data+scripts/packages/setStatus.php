<?PHP
/*
		Description: Sets the status of a package.
*/


	include('/m23/inc/db.php');
	include('/m23/inc/checks.php');
	include('/m23/inc/remotevar.php');
	include_once('/m23/inc/capture.php');
	include_once('/m23/inc/dhcp.php');
	include_once('/m23/inc/vm.php');
	include_once('/m23/inc/client.php');

	include_once('/m23/inc/html.php');
	include_once('/m23/inc/CMessageManager.php');
	include_once('/m23/inc/CChecks.php');
	include_once('/m23/inc/CClient.php');

	if (file_exists('/m23/inc/m23shared/m23shared.php')) include_once('/m23/inc/m23shared/m23shared.php');

	session_start();

	dbConnect();
	
	$status = $_GET['status'];

	CHECK_FW(CC_jobstatus, $status, CC_id, $_GET['id']);
	$sql="UPDATE clientjobs SET status='".$status."' WHERE id=".$_GET['id'].";";

	DB_query($sql); //FW ok
?>
