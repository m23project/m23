<span class="title">Developer's playground</span>
<?PHP
	include_once('/m23/inc/distr/debian/clientConfigCommon.php');
	include_once('/m23/inc/messageReceive.php');
	HTML_showFormHeader();
// 	HTML_showTableHeader();
	HTML_setPage("developersPlayground");
	
	$lang = 'de';
	$lv = I18N_getLangVars($lang);
	
	
	foreach ($lv as $var => $val)
	{
		$val = str_replace('utf', 'UTF', $val);
		$val = str_replace('UTF8', 'UTF-8', $val);
		$lv[$var] = $val;
	}
	
	print_r2($lv);
	
	
// 	print(DHCP_calcPXEIP('10.10.150.212'));
	exit(0);
	
	
	
	$poolFromClientGUIO = new CPoolFromClientGUI('m23-ubuntu');
	$objectStorage = new CObjectStorage('m23-ubuntu', $poolFromClientGUIO, true);
	$poolFromClientGUIO->downloadPackagesAndCreatePool();

	

/*// 	$poolFromClientGUIO = new CPoolFromClientGUI('m23-ubuntu');
// 	$objectStorage = new CObjectStorage('m23-ubuntu', $poolFromClientGUIO);

// 	$objectStorage = new CObjectStorage('m23-ubuntu', 'CPoolFromClientGUI');
	
	$objectStorage = new CObjectStorage('m23-ubuntu', new CPoolFromClientGUI('m23-ubuntu'), true);
	$poolFromClientGUIO = $objectStorage->getObject();
// 	$poolFromClientGUIO->incStatus();
	
	$objectStorageManager = new CObjectStorageManager();
	
	$objectStorageManager->getByIdent('m23-ubuntu');
	$objectStorageManager->showList();


// 
// 	print_r(get_class($poolFromClientGUIO));

	exit(1);

// 	print($poolFromClientGUIO->getStatusHumanReadable());
	print_r(CHECK_text2db(serialize($poolFromClientGUIO)));

	exit(1);

	include_once("/m23/inc/distr/debian/packages.php");
	print(serialize(PKG_getDebootStrapBasePackages('squeeze')));*/
	

	if (!isset($_SESSION['poolOGUI']))
	{
		print('NEU');
		$_SESSION['poolOGUI'] = new CPoolGUI();
	}
	
	
// 	$testO = new CPool('test');
// 
// 	HTML_AJAXAutoSubmit('AJAXBUT_testJS', '/m23admin/poolAJAXLogs.php?cmd=getPoolSize&pool='.urlencode($testO->getPoolName()));
// 	HTML_submit('BUT_testJS','testjs', AJAXBUT_testJS);
// 
// 	print(BUT_testJS);

	
	print('<tr><td>');
	
	$_SESSION['poolOGUI']->show();
	
	print('</td></tr>');

// $MessageManagerO = new CMessageManager();
// 
// $MessageManagerO->addWarningMessage('1. Warnung');
// $MessageManagerO->addWarningMessage('2. Warnung');
// $MessageManagerO->addWarningMessage('3. Warnung');
// 
// $MessageManagerO->addInfoMessage('1. Information');
// $MessageManagerO->addInfoMessage('2. Information');
// $MessageManagerO->addInfoMessage('3. Information');
// 
// $MessageManagerO->addErrorMessage('1. Fehler');
// $MessageManagerO->addErrorMessage('2. Fehler');
// $MessageManagerO->addErrorMessage('3. Fehler');
// 
// $MessageManagerO->popErrorMessagesHTML();
// $MessageManagerO->popWarningMessagesHTML();
// 
// print(serialize($MessageManagerO->showMessages()));

// if (isset($_SESSION['clientO']))
// {
// 	print("SESS");
// 	$cl = $_SESSION['clientO'];
// }
// else
// {
// 	$cl = new CClient('cajbcjksbdakjd');
// 	$_SESSION['clientO'] = $cl;
// }

// $clientO = new CClient('asdasd');

// $CIPRanges = new CIPRanges();

// print(DHCP_getNetmaskOfDynamicRanges('192.168.1.27'));


// print("<pre>\n");
// while ($cl = $CClientListerO->getClient())
// 	print_r($cl);
// print("</pre>\n");


// 	$cl->client = HTML_input('ED_client', $cl->client);
// 	HTML_submit('BUT_start','Start');
// 
// 
// 
// 	HTML_showTableHeader();
// 	HTML_showTableRow(ED_client, BUT_start);
// 	HTML_showTableEnd();

print("<pre>\n");
// 	print_r($CIPRanges->getAllLockedIPsInt());
print("</pre>\n");
// 	HTML_showTableEnd();
	HTML_showFormEnd();
?>