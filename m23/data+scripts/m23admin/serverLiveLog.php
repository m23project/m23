<?php
	session_start();

	include('/m23/inc/client.php');
	include('/m23/inc/checks.php');
	include('/m23/inc/db.php');
	include('/m23/inc/capture.php');
	include('/m23/inc/helper.php');
	include('/m23/inc/server.php');

	dbConnect();
	
	$screen = basename($_GET['screen']);

	//Check, if the screen name is set.
	if (!isset($screen{1}))
		die('');

	$log = SERVER_logLocalScreenSessionToFile($screen);

	echo(HELPER_getNewLogLines($log, "ServerScreen_$screen"));
?>