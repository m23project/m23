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

// print("<pre>");
// print("</pre>\n");
	HTML_showTableEnd();
	
	
	$a = ip2longSafe('192.168.1.1');
	var_dump($a);
	
	$b = ip2long('192.168.1.1');
	var_dump($b);

	HTML_showFormEnd();
?>