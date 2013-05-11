<?php
	session_start();

	include('/m23/inc/client.php');
	include('/m23/inc/checks.php');
	include('/m23/inc/db.php');
	include('/m23/inc/capture.php');
	include('/m23/inc/helper.php');

	dbConnect();

	//Check, if a client name is given
	if (isset($_GET['client']{1}) && CLIENT_exists($_GET['client']))
		$client = $_GET['client'];
	else
		die("");

	//Get the name of the log file
	$log = CLIENT_touchLiveLogFile($client);

	echo(HELPER_getNewLogLines($log, $client));
?>