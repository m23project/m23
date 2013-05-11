<?
	//Include the files needed for getting the language of the interface only
/*
	include("/m23/inc/html.php");
	include("/m23/inc/help.php");
	include("/m23/inc/checks.php");
	include("/m23/inc/message.php");
	include("/m23/inc/capture.php");
	include("/m23/inc/preferences.php");*/
	include("/m23/inc/checks.php");
	include("/m23/inc/remotevar.php");
	include("/m23/inc/db.php");
	include("/m23/inc/mail.php");
	include("/m23/inc/server.php");
	if (file_exists('/m23/inc/m23shared/m23shared.php'))
		include('/m23/inc/m23shared/m23shared.php');
	else
		die("m23@web not found!");

	$user = urldecode($_GET['user']);
	$code = urldecode($_GET['code']);

	m23SHARED_activate($user, $code);
?>