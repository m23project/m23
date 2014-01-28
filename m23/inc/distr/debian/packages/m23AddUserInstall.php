<?PHP
/*
Description:Adds a new user on Debian/Ubuntu.
Priority:125
*/

include ('/m23/data+scripts/packages/m23CommonInstallRoutines.php');
include ('/m23/inc/distr/debian/clientConfigCommon.php');

function run($id)
{
	$accountInfo = unserialize(PKG_getPackageParams($id));

	$uid = !empty($accountInfo['uid']) ? $accountInfo['uid'] : '';
	$gid = !empty($accountInfo['gid']) ? $accountInfo['gid'] : '';

	CLCFG_addUser($accountInfo['login'], $accountInfo['firstpw'], $accountInfo['groups'], $uid, $gid);
	/* =====> */ MSR_statusBarIncCommand(100);

	sendClientStatus($id,"done");
	executeNextWork();
};
?>
