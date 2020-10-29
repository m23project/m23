<span class="title">Developer's playground</span>


<?PHP
//	include_once('/m23/inc/distr/debian/clientConfigCommon.php');
	include_once('/m23/inc/messageReceive.php');
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');
	include_once('/m23/inc/autoTest.php');
	HTML_showFormHeader();
	HTML_showTableHeader();
	HTML_setPage("developersPlayground");
	
	include_once('/m23/inc/distr/debian/packages.php');
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

print("<pre>");

print_r(SRCLST_getAppendToFile('LinuxMint 20 Ulyana'));


/*	var_dump(GRP_setSetting('default', 10, 'rebootClientAfterJobsIfNecessary24', 24));
	var_dump(GRP_setSetting('default', GRP_SETTING_TYPE_execWhenAllJobsFinished, GRP_SETTING_VAR_rebootClientAfterJobsIfNecessary, 1));
	var_dump(GRP_setSetting('test', GRP_SETTING_TYPE_execWhenAllJobsFinished, GRP_SETTING_VAR_rebootClientAfterJobsIfNecessary, 1));*/
	
	
// 	var_dump(GRP_unsetSetting('default', GRP_SETTING_TYPE_execWhenAllJobsFinished, GRP_SETTING_VAR_rebootClientAfterJobsIfNecessary));
	
// 	var_dump(GRP_getSetting('default', GRP_SETTING_TYPE_execWhenAllJobsFinished, 'rebootClientAfterJobsIfNecessary24'));

// 	var_dump(GRP_getSetting('default', 23, 'rebootClientAfterJobsIfNecessary22'));

// 	var_dump(GRP_getSettingsForClient('amd64-linuxmint'));
	

// $clientName = 'm23focal-mate';
// 
// 
// var_dump(PKG_getLastUpgradeTime($clientName));
// var_dump(is_null(PKG_getLastUpgradeTime($clientName)));


// $maxDelay = 12;

// print_r(PKG_getDelayedJobs($clientName, $maxDelay));
// print('DELAYamount:'. PKG_getDelayedJobsmount($clientName, $maxDelay).'<br>');

// print_r(PKG_getClientsWithDelayedUpdateJobs($maxDelay * 60));


// print_r(CLIENT_getClientsWithDelayedReboots($maxDelay * 60));
// print("<h3>$clientName</h3>");
// var_dump(CLIENT_isRebootDelayed($clientName,$maxDelay * 60));


// print(CLIENT_fetchBASHScriptFromServerAndRun(NULL, 'sshHttpsStatus.php'));


/*	$params = CLIENT_getParams('localhost');
	var_dump(($params['online'] & ONLINE_STATUS_ping) == ONLINE_STATUS_ping);*/
	
	

print("</pre>\n");
	HTML_showTableEnd();
	
// 	print('<h3>vorher</h3>');
// 	system('grep LOCKTest '.DHCPD_CONF_FILE);
// 	print('<h4>DHCPd</h4>');
// 	system('ps -A | grep dhcpd');
// 	
// 	DHCP_addClient('LOCKTest', '192.168.1.123', '255.255.255.0', '001122334455', CClient::BOOTTYPE_PXE, '192.168.1.5', false);
// 	print('<h3>nach DHCP_addClient</h3>');
// 	system('grep LOCKTest '.DHCPD_CONF_FILE);
// 	print('<h4>DHCPd</h4>');
// 	system('ps -A | grep dhcpd');
// 
// 	DHCP_rmClient('LOCKTest');
// 	print('<h3>nach DHCP_rmClient</h3>');
// 	system('grep LOCKTest '.DHCPD_CONF_FILE);
// 	print('<h4>DHCPd</h4>');
// 	system('ps -A | grep dhcpd');


	HTML_showFormEnd();
?>