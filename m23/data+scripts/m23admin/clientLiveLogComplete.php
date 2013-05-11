<?php
	header('Content-Type: text/plain');

	include('/m23/inc/client.php');
	include('/m23/inc/checks.php');
	include('/m23/inc/db.php');
	include('/m23/inc/capture.php');
	
	dbConnect();

	//Check, if a client name is given
	if (isset($_GET['client']{1}) && CLIENT_exists($_GET['client']))
		$client = $_GET['client'];
	else
		die("");

	//Get the name of the log file
	$log = CLIENT_touchLiveLogFile($client);

	//Check for the log
	if (file_exists($log))
	{
		echo(file_get_contents($log));
	}
?>