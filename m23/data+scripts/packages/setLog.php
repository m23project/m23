<?PHP
	include('/m23/inc/db.php');
	include('/m23/inc/checks.php');
	include('/m23/inc/remotevar.php');
	include('/m23/inc/client.php');
	include('/m23/inc/helper.php');

	include_once('/m23/inc/html.php');
	include_once('/m23/inc/CMessageManager.php');
	include_once('/m23/inc/CChecks.php');
	include_once('/m23/inc/CClient.php');

	include_once('/m23/inc/capture.php');
	if (file_exists('/m23/inc/m23shared/m23shared.php')) include_once('/m23/inc/m23shared/m23shared.php');

	session_start();

	dbConnect();

	$clientName = CLIENT_getClientName();
	CHECK_FW(CC_clientname, $clientName);
	
	$sql="INSERT INTO clientlogs (`client` , `logtime` , `status`) VALUES ( '".$clientName."', '".time()."' , '".CHECK_text2db($_GET['status'])."');";

	DB_query($sql); //FW ok
?>
