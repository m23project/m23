<?PHP
/*
Description:Adds a new user on halfSister.
Priority:25
*/

function run($id)
{
	$accountInfo = unserialize(PKG_getPackageParams($id));

	$uid = !empty($accountInfo['uid']) ? $accountInfo['uid'] : '';
	$gid = !empty($accountInfo['gid']) ? $accountInfo['gid'] : '';

	HS_sysAddUser($accountInfo['login'], $accountInfo['firstpw'], $uid, $gid);
	/* =====> */ MSR_statusBarIncCommand(100);

	sendClientStatus($id,"done");
	executeNextWork();
};
?>
