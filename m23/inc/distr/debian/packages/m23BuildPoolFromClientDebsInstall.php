<?PHP
/*
Description:Builds a pool from the Debian packages present on the given client.
Priority:99
*/

include ('/m23/inc/distr/debian/clientConfigCommon.php');
include ('/m23/inc/distr/debian/packages.php');

$GLOBALS["m23_language"] = 'en';



function run($id)
{
	MSR_buildPoolFromClientDebsCMD();

	PKG_ncTarDebsFromClientToServer_Client();

	/* =====> */ MSR_statusBarIncCommand(100);

	sendClientStatus($id,"done");
};
?>
