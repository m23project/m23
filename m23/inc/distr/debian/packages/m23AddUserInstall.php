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

//m23customPatchBegin type=change id=skipCreateUserBegin
//m23customPatchEnd id=skipCreateUserBegin

if (isset($accountInfo['groupsUbuntu']))
{
	echo('
	'.BASH_ifDetectDebian.'
	then
	');
		CLCFG_addUser($accountInfo['login'], $accountInfo['firstpw'], $accountInfo['groupsDebian'], $uid, $gid);
	echo('
	fi

	'.BASH_ifDetectUbuntu.'
	then
	');
		CLCFG_addUser($accountInfo['login'], $accountInfo['firstpw'], $accountInfo['groupsUbuntu'], $uid, $gid);
	echo('
	fi
	');
}
	else
		CLCFG_addUser($accountInfo['login'], $accountInfo['firstpw'], $accountInfo['groups'], $uid, $gid);


//m23customPatchBegin type=change id=skipCreateUserEnd
//m23customPatchEnd id=skipCreateUserEnd
	/* =====> */ MSR_statusBarIncCommand(100);
	
	echo('
	export DEBIAN_FRONTEND=noninteractive
	dpkg-reconfigure libpam-runtime
	');
	
	CLCFG_disableAptSystemdDaily();

	sendClientStatus($id,"done");
	executeNextWork();
};
?>