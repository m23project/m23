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

	print(serialize(CSYSTEMPROXY_getAptGetProxyParamter()));


// 	function test($in)
// 	{
// 		return(true);
// 	}
// 


	$data['macts'] = '222222222222';
	$data['ipts'] = '192.168.1.166';
	$data['info_mpId'] = 23;
	$data['client'] = 'm23demoClNt23';


	$CClientO = new CClient($data['client']);
	$CClientO->setKeyValueStore('macts', $data['macts'], checkMAC, $I18N_macts_invalid.'הה');
	$CClientO->setKeyValueStore('ipts', $data['ipts'], CC_ip, $I18N_ipts_invalid);
	$CClientO->setKeyValueStore('info_mpId', $data['info_mpId'], CC_id, $I18N_info_mpId_invalid);
	
	$CClientO->save();

	$CClientO->showMessages();

	print("macts: \"".$CClientO->getKeyValueStore('macts')."\", ipts: \"".$CClientO->getKeyValueStore('ipts')."\", info_mpId: \"".$CClientO->getKeyValueStore('info_mpId')."\"\n");


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

print("<pre>");

	// print_r(CSystemProxy::getProxySettingsArray());
// 	$OSystemProxy = new CSystemProxy();
// 	$OSystemProxy->showProxyDialog();
// 	
// 	CSYSTEMPROXY_getEnvironmentVariables();

print("</pre>\n");
	HTML_showTableEnd();
	HTML_showFormEnd();
?>