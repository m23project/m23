<?PHP
/*
Description:Adds a new users.
Priority:25
*/

include ('m23CommonInstallRoutines.php');
include ('/m23/inc/distr/debian/clientConfigCommon.php');

function run($id)
{
	$accountInfo = unserialize(PKG_getPackageParams($id));

//generate commands for adding the user account on the client
	$groups[0]="audio";
	$groups[1]="floppy";
	$groups[2]="cdrom";
	$groups[3]="video";
	$groups[4]="users";
	$groups[5]="lpadmin";
	$groups[6]="plugdev";
	$groups[7]="sudo";

// 	$login=$clientOptions['login'];
// 	if (empty($login))
// 		$login=$clientParams['name'];

	CLCFG_addUser($accountInfo['login'], $accountInfo['firstpw'], $accountInfo['groups']);
	/* =====> */ MSR_statusBarIncCommand(100);

	sendClientStatus($id,"done");
	executeNextWork();
};
?>
