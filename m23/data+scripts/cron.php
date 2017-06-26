<?php

//Include the files needed for getting the language of the interface only
include("/m23/inc/db.php");
include("/m23/inc/html.php");
include("/m23/inc/i18n.php");
include("/m23/inc/help.php");
include("/m23/inc/helper.php");
include("/m23/inc/groups.php");
include("/m23/inc/checks.php");
include("/m23/inc/message.php");
include("/m23/inc/capture.php");
include("/m23/inc/remotevar.php");
include("/m23/inc/preferences.php");
include("/m23/inc/mail.php");
include("/m23/inc/server.php");
include("/m23/inc/packages.php");
include("/m23/inc/client.php");
include("/m23/inc/cronSecret.php");
include_once('/m23/inc/CMessageManager.php');
include_once('/m23/inc/CChecks.php');
include_once('/m23/inc/CAutoUpdate.php');
include_once('/m23/inc/CClient.php');
include_once('/m23/inc/CClientLister.php');

if (file_exists('/m23/inc/m23shared/m23shared.php'))
{
	include_once('/m23/inc/m23shared/m23shared.php');
	include_once('/m23/inc/m23shared/m23sharedConf.php');
}

$t = (time() - (time() % 5));
$code = md5(CONF_CRON_SECRET.$t);

//Basic security to prohibit unauthorized access.
if (($_GET['code'] != $code) || ($_SERVER['HTTP_HOST'] != "127.0.0.1") || ($_SERVER['REMOTE_ADDR'] != "127.0.0.1"))
{
	echo("Unauthorized");
	exit(2);
}

//Check if the needed command is given
if (!isset($_GET['cmd']))
{
	echo("No command given");
	exit(1);
}

dbconnect();

session_start();

$m23_language = "en";
$GLOBALS["m23_language"] = $m23_language;

//Include the language file
include("/m23/inc/i18n/".$m23_language."/m23base.php");

switch ($_GET['cmd'])
{
	case "m23SHARED_sendAllBillMails":
		m23SHARED_sendAllBillMails();
		break;

	case "CAutoUpdate.run":
		$CAutoUpdateO = new CAutoUpdate();
		$CAutoUpdateO->run();
		break;

// 	case "SERVER_startBackup":
// 		SERVER_startBackup();
// 		break;

	default:
		exit(23);
}
?>