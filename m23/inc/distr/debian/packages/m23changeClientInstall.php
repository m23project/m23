<?PHP
/*
 Description: Changes settings of the client.
 Priority: 5
*/


function run($id)
{
	$lang=getClientLanguage();

/*
The directory /m23/inc/distr/distname/ contains distribution spezific files with
functions for installing (clientInstall.php) and configuring (clientConfig.php) clients.
*/
	include("/m23/inc/distr/debian/clientInstall.php");
	include("/m23/inc/distr/debian/clientConfig.php");

	$server=getServerIP();
	$pkgParams=PKG_getPackageParams($id);
	$pkgParams=explodeAssoc("###",$pkgParams);
	
	$clParams=CLIENT_getAskingParams();
	$clientOptions=CLIENT_getAllAskingOptions();



	//if a new username or password is set, it gets executed
	CLCFG_changeUser($clientOptions['login'], $pkgParams['firstpw'],$pkgParams['login']);

	//write hostname
	if (array_key_exists("client",$pkgParams))
		CLCFG_hostname($pkgParams[client]);


	//write ip, netmask and gateway
	if (array_key_exists("ip",$pkgParams) || array_key_exists("netmask",$pkgParams) || array_key_exists("gateway",$pkgParams))
	{
		foreach (explode('#','ip#netmask#gateway') as $key)
			if (empty($pkgParams[$key]))
				$$key=$clParams[$key];
			else
				$$key=$pkgParams[$key];

		CLCFG_interfaces($ip,$gateway,$netmask);
	};


	//set DNS servers
	if (array_key_exists("dns1",$pkgParams) || array_key_exists("dns2",$pkgParams))
	{
		$DNSServers[0]=$pkgParams[dns1];
		$DNSServers[1]=$pkgParams[dns2];
		CLCFG_resolvConf($DNSServers);
	}


	//write proxy settings
	if (array_key_exists("packageProxy",$pkgParams) || array_key_exists("packagePort",$pkgParams))
	{
		foreach (explode('#','packageProxy#packagePort') as $key)
			if (empty($pkgParams[$key]))
				$$key=$clParams[$key];
			else
				$$key=$pkgParams[$key];

		CLCFG_aptConf($packageProxy,$packagePort);
	};


	//change the root password
	if (array_key_exists("rootpassword",$pkgParams))
		CLCFG_changeUser("root", $pkgParams['rootpassword']);
		//CLCFG_setRootPassword();

	//set the nfs home server
	if (array_key_exists("nfshomeserver",$pkgParams))
		CLCFG_enableNFSHome($pkgParams['nfshomeserver']);

	//enables ldap
	if (array_key_exists("ldaptype",$pkgParams) || array_key_exists("ldapserver",$pkgParams) || 	
		array_key_exists("userID",$pkgParams) || array_key_exists("groupID",$pkgParams))
		CLCFG_enableLDAP($clientOptions);

	//enables local logins
	if (array_key_exists("addNewLocalLogin",$pkgParams))
		{
			$groups[0]="audio";
			$groups[1]="floppy";
			$groups[2]="cdrom";
			$groups[3]="video";
			$groups[4]="users";
			$groups[5]="lpadmin";
			
			$login=$clientOptions['login'];
			if (empty($login))
				$login=$clParams['name'];
			CLCFG_addUser($login, $clientParams['firstpw'],$groups,"/usr/m23/skel/");
		}

	//set the time zone
	if (array_key_exists("timeZone",$pkgParams))
		CLCFG_setTimeZone($pkgParams[timeZone]);

	//generate wget command to make the changes on the client side
	MSR_clientChangeCommand($id);

	//mark job as done
	sendClientStatus($id,"done");

	executeNextWork();
};
?>