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
	include("/m23/inc/distr/halfSister/clientInstall.php");
	include("/m23/inc/distr/halfSister/clientConfig.php");

	$server=getServerIP();
	$pkgParams=PKG_getPackageParams($id);
	$pkgParams=explodeAssoc("###",$pkgParams);
	
	$clParams=CLIENT_getAskingParams();
	$clientOptions=CLIENT_getAllAskingOptions();

	//if a new username or password is set, it gets executed
	HS_sysChangeUser($clientOptions['login'], $pkgParams['firstpw'],$pkgParams['login']);

	//write hostname
	if (array_key_exists("client",$pkgParams))
		HS_wrapper('netSetHostname', $pkgParams['client']);

	//write ip, netmask and gateway
	if (array_key_exists("ip",$pkgParams) || array_key_exists("netmask",$pkgParams) || array_key_exists("gateway",$pkgParams))
	{
		foreach (explode('#','ip#netmask#gateway') as $key)
			if (empty($pkgParams[$key]))
				$$key=$clParams[$key];
			else
				$$key=$pkgParams[$key];

		HS_wrapper('netSetIPNetmask', $ip, $netmask);
		HS_wrapper('netSetGateway', $gateway);
	};


	//set DNS servers
	if (array_key_exists("dns1",$pkgParams) || array_key_exists("dns2",$pkgParams))
	{
		HS_wrapper('netSetDNS', $pkgParams['dns1']);
	}


	//write proxy settings
	if (array_key_exists("packageProxy",$pkgParams) || array_key_exists("packagePort",$pkgParams))
	{
		foreach (explode('#','packageProxy#packagePort') as $key)
			if (empty($pkgParams[$key]))
				$$key=$clParams[$key];
			else
				$$key=$pkgParams[$key];

		$proxyOptions['packageProxy'] = $packageProxy;
		$proxyOptions['packagePort'] = $packagePort;

		HS_setPackageProxy($proxyOptions);
	};


	//change the root password
	if (array_key_exists("rootpassword",$pkgParams))
		HS_sysSetRootPW($pkgParams['rootpassword']);

	//set the nfs home server
	if (array_key_exists("nfshomeserver",$pkgParams))
		HS_netEnableNFSHome($pkgParams['nfshomeserver']);

	//enables ldap
	if (array_key_exists("ldaptype",$pkgParams) || array_key_exists("ldapserver",$pkgParams) ||
		array_key_exists("userID",$pkgParams) || array_key_exists("groupID",$pkgParams))
		HS_netEnableLDAP($clientOptions);

	//enables local logins
	if (array_key_exists("addNewLocalLogin",$pkgParams))
		{
			$login=$clientOptions['login'];
			if (empty($login))
				$login=$clParams['name'];
			
			HS_sysAddUser($login, $clientParams);
		}

	//set the time zone
	if (array_key_exists("timeZone",$pkgParams))
		HS_sysSetTimeZone($pkgParams['timeZone']);

	//generate wget command to make the changes on the client side
	MSR_clientChangeCommand($id);

	//mark job as done
	sendClientStatus($id,"done");

	executeNextWork();
};
?>