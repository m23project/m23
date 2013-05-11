<?PHP
	include('/m23/inc/db.php');
	include('/m23/inc/remotevar.php');
	include('/m23/inc/client.php');
	include('/m23/inc/packages.php');
	include('/m23/inc/messageReceive.php');
	include_once('/m23/inc/capture.php');
	include_once('/m23/inc/html.php'); //for status bar
	include("/m23/inc/sourceslist.php");
	include("/m23/inc/ldap.php");
	include("/m23/inc/edit.php");
	include("/m23/inc/fdisk.php");
	include("/m23/inc/helper.php");
	include("/m23/inc/groups.php");
	include("/m23/inc/distr.php");
	include("/m23/inc/imaging.php");
	include("/m23/inc/vm.php");
	include("/m23/inc/checks.php");
	include("/m23/inc/server.php");
	if (file_exists('/m23/inc/m23shared/m23shared.php')) include_once('/m23/inc/m23shared/m23shared.php');

	session_start();

	dbConnect();

	MSR_decodeMessage();
?>