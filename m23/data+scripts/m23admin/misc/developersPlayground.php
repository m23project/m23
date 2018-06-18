<span class="title">Developer's playground</span>


<?PHP
//	include_once('/m23/inc/distr/debian/clientConfigCommon.php');
	include_once('/m23/inc/messageReceive.php');
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');
	HTML_showFormHeader();
	HTML_showTableHeader();
	HTML_setPage("developersPlayground");
	
	include_once('/m23/inc/distr/debian/packages.php');
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	CHECK_FW(CC_statusBarName, $I18N_client_added);
	
	print(serialize(CHECK_str($I18N_client_added)));
	
	
// 	print('<h2>'.serialize(CHECK_ip('192.168.1.256')).'</h2>');
	
// 	DB_changeAllCollations('latin1_general_ci');
	
/*	$CFDiskIOO = new CFDiskIO('TUXEDO-laptop');
	$EFIBootPartDev = $CFDiskIOO->getEFIBootPartDev();
	print($EFIBootPartDev);*/
	
	

	
// 	$dn = "cn=test,cn=computers,dc=test,dc=intranet";
// print(UCS_getFirstElementFromDN($dn));

// 	print_r2(preg_split('/[,=]/', $dn));
	
	
	
// 	print('<h2>'.UCS_getGenericNetworkName(24, '192.168.1.0').'</h2>');
	
	
// 	print_r2(UCS_getClientLDAPInfo('Lager-Spectra01'));
	
// 	PKG_recountAllClientPackages();
	exit(0);
	

	for ($i = 0; $i < 10; $i++)
		$items["k$i"] = "p$i";

// 	$wahl = HTML_selection('SEL_mehr', $items, SELTYPE_selection, true, false, false, "", 5);

	$wahl = HTML_storableMultiSelection('SEL_mehr', 'mehr', $items, SELTYPE_selection, 5, true, false, $storePointer);
	
	HTML_submit('BUT_But', 'Klick');
	
	
	print(SEL_mehr.BUT_But);
	print_r2($wahl);
	print_r2($storePointer);

// print("<pre>");
// print("</pre>\n");
	HTML_showTableEnd();
	HTML_showFormEnd();
?>