<span class="title">Developer's playground</span>


<?PHP
//	include_once('/m23/inc/distr/debian/clientConfigCommon.php');
	include_once('/m23/inc/messageReceive.php');
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');
	HTML_showFormHeader();
	HTML_showTableHeader();
	HTML_setPage("developersPlayground");
	
	include_once('/m23/inc/distr/debian/packages.php');
	
// 	include_once('/m23/inc/autoTest.php');
	include_once('/m23/inc/CFDiskIO.php');
	include_once('/m23/inc/CFDiskBasic.php');
	include_once('/m23/inc/CFDiskGUI.php');
	include_once('/m23/inc/CFirewall.php');
	
// 	print(serialize(CRON_isEntryPresent($identifier)));
	print(CLIENT_getNextFreeIp());
	exit(0);

// 	print(serialize(CSYSTEMPROXY_getAptGetProxyParamter()));


// 	function test($in)
// 	{
// 		return(true);
// 	}
// 



/*	$CClientListerO = new CClientLister();
	$CClientListerO->addKeyValueStoreFilter('schl', 'wert');*/
// 	$CClientListerO->setOutputColumns(CClientLister::COLUMN_CONTINUOUS_NUMBER, CClientLister::COLUMN_STATUS, CClientLister::COLUMN_CLIENT);

// 	$out = array();
// 	while ($clientInfo = $CClientListerO->getClient())
// 	{
// 		$out[$clientInfo['id']] = $clientInfo;
// 	}
// 	
// 	print_r($out);

// 	$clientO = new CClient('d8lo-neu', CClient::CHECKMODE_MUSTEXIST);
// 	$clientO->startAutoUpdate(CAutoUpdate::UPDATE_NORMAL);
// 	$clientO->stopAutoUpdate();
// 	$clientO->checkAutoUpdate();
	
	$CAutoUpdateO = new CAutoUpdate();
/*	$CAutoUpdateO->activateSet(1);
	print(serialize($CAutoUpdateO->isTimeToRunNow(1)));*/
// 	print_r($CAutoUpdateO->getRunningClients());
// 	$CAutoUpdateO->run();


print("<pre>");

// 	CLIENT_startLiveScreenRecording('m23lm18');
	

	// print_r(CSystemProxy::getProxySettingsArray());
// 	$OSystemProxy = new CSystemProxy();
// 	$OSystemProxy->showProxyDialog();
// 	
// 	CSYSTEMPROXY_getEnvironmentVariables();

// 	print_r(explodeAssoc('?', 'arch?instPart?mbrPart?swapPart?desktop?distr?release?packagesource?kernel?disableSSLCertCheck?disableSudoRootLogin?installX2goserver?uefiActive?amd64??/dev/sda??Debian8Mate?debian?jessie?jessieo?linux-image-amd64?0?0?0?0'));

// 	print_r($CAutoUpdateO->getAllSets());
	print('<h1>SET:'.$CAutoUpdateO->activateNextSet().'</h1>');
	
	$CAutoUpdateO->showAutoUpdateManager();

print("</pre>\n");
	HTML_showTableEnd();
	HTML_showFormEnd();
?>