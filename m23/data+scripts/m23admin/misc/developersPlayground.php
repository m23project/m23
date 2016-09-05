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

print("<pre>");

	// print_r(CSystemProxy::getProxySettingsArray());
// 	$OSystemProxy = new CSystemProxy();
// 	$OSystemProxy->showProxyDialog();
// 	
// 	CSYSTEMPROXY_getEnvironmentVariables();

	print_r(PKG_getDuplicatedIdenticalJobs('zusammenfassen'));
	PKG_removeDuplicatedIdenticalJobs('zusammenfassen');
	print_r(PKG_getDuplicatedIdenticalJobs('zusammenfassen'));

print("</pre>\n");
	HTML_showTableEnd();
	HTML_showFormEnd();
?>