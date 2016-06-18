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


	function test($in)
	{
		return(true);
	}

	$CClientO = new CClient('m23demoClNt23');
	$CClientO->setKeyValueStore('schl', 'wert', test, 'kaputt');
	print($CClientO->getKeyValueStore('schl'));
	$CClientO->showMessages();


print("<pre>");


print("</pre>\n");
	HTML_showTableEnd();
	HTML_showFormEnd();
?>